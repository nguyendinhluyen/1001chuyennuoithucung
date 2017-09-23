<?php

class CartModel {

    public static function saveOrder($cart, $userInfo) {
        $lastId = -1;

        if (count($cart) > 0) {
            $discount = str_replace('.', '', $userInfo['total_discount']);

            $discount = str_replace(' VNĐ', '', $discount);

            $user = new User();

            $product = new Product();

            $total = common::convertIntToFormatMoney(
                            round((common::convertFormatMoneyToInt($_SESSION['total_price']) + intval($discount)) / 1000) * 1000);

            global $mysql;

            $sql = "insert into tbl_order ";
            // VI TRI THEM CAC THUOC TINH CAN LUU TRU
            $sql .= "(username,
			          custommer_name,
			          custommer_email,
			          custommer_addtress,
			          custommer_phone,
			          custommer_fax,
			          custommer_comment,
			          status,
			          order_date,
			          total,
			          custommer_name_receiver,
			          custommer_address_receiver,
			          custommer_phone_receiver,
			          fee_transport,
			          type_of_cash,
			          total_product_transport,
			          total_discount,
			          code_coupon,
			          total_product)";

            $sql .= " values ('";
            $sql .= $_SESSION['username'];
            $sql .= "','";
            $sql .= $userInfo['name'];
            $sql .= "','";
            $sql .= $userInfo['email'];
            $sql .= "','";
            $sql .= $userInfo['address'];
            $sql .= "','";
            $sql .= $userInfo['phone'];
            $sql .= "','";
            $sql .= '';
            $sql .= "','";
            $sql .= "',0";
            $sql .= ",'";
            $sql .= time();
            $sql .= "','";
            $sql .= $total;
            $sql .= "','";
            $sql .= $userInfo['namereceiver'];
            $sql .= "','";
            $sql .= $userInfo['addressreceiver'];
            $sql .= "','";
            $sql .= $userInfo['phonereceiver'];
            $sql .= "','";
            $sql .= $userInfo['feetransport'];
            $sql .= "','";
            $sql .= $userInfo['typeofcash'];
            $sql .= "','";
            $sql .= $userInfo['totalproductfee'];
            $sql .= "','";
            $sql .= $userInfo['total_discount'];
            $sql .= "','";
            $sql .= $userInfo['code_coupon'];
            $sql .= "','";
            $sql .= $_SESSION['total_price'];
            $sql .= "')";

            $mysql->setQuery($sql);

            if ($mysql->query()) {
                $lastId = mysql_insert_id();

                foreach ($cart as $val) {
                    $pro = $product->getProductsByProductKey($val['product_key']);
                    $price = $val['price'];
                    $sql = "insert into order_detail ";
                    $sql .= "(id_order,
					          product_key,
					          product_name,
					          product_type,
					          product_color,
					          product_price,
					          product_quantity,
					          status) ";
                    $sql .= " values (";
                    $sql .= $lastId;
                    $sql .= ",'";
                    $sql .= $pro['products_key'];
                    $sql .= "','";
                    $sql .= $pro['products_name'];
                    $sql .= "','";
                    $sql .= $val['type'];
                    $sql .= "','";
                    $sql .= $val['color'];
                    $sql .= "','";
                    $sql .= $price;
                    $sql .= "','";
                    $sql .= $val['quantity'];
                    $sql .= "',0";
                    $sql .= ")";

                    $mysql->setQuery($sql);

                    $mysql->query();

                    $sql = "UPDATE coupon
                            SET status_coupon = '2'
                            WHERE code_coupon ='" . $userInfo['code_coupon'] . "'";

                    $mysql->setQuery($sql);

                    $mysql->query();
                }

                // Cap nhat diem chua duoc su dung vao history 				
                // 1 score = 50.000 VND
                $sql = "SELECT * FROM PriceOfUnit";

                $mysql->setQuery($sql);

                $PriceOfUnit = $mysql->loadAllRow();

                $sc = floor(intval(str_replace('.', '', $_SESSION['total_price'])) + intval($discount) / $PriceOfUnit[0]['PriceScore']);

                updateScore($userInfo['email'], "addhistory", $sc, "Add History Score Of Bill");

                unset($_SESSION['cart']);
            }
        }
        return $lastId;
    }

    function Get_html_mail_body($cart, $userInfo, $account_user, $time, $order_id, $note, $tpl_filename) {
        $temp = new Template();

        $temp->path = "modules/xtemplate/";

        $body = $temp->load($tpl_filename);

        //css
        $table_style = 'table_style';

        $th_style = 'th_style';

        $td_style = 'td_style';

        preg_replace('#<!--BEGIN_' . $table_style . '(.*?)END_' . $table_style . '-->#se', '$table_style = stripslashes("\\1");', $body);

        preg_replace('#<!--BEGIN_' . $th_style . '(.*?)END_' . $th_style . '-->#se', '$th_style = stripslashes("\\1");', $body);

        preg_replace('#<!--BEGIN_' . $td_style . '(.*?)END_' . $td_style . '-->#se', '$td_style = stripslashes("\\1");', $body);

        $custommer_name = $userInfo['name'];

        $orderID = $order_id;

        $day = $time;

        // gan gia tri cho bang thong tin don hang
        $buyer_name = $userInfo['name'];
        ;

        $buyer_address = $userInfo['address'];

        $buyer_numberphone = $userInfo['phone'];

        $buyer_country = "Việt Nam";

        $receiver_name = $userInfo['namereceiver'];

        $receiver_address = $userInfo['addressreceiver'];

        $receiver_numberphone = $userInfo['phonereceiver'];

        $receiver_country = "Việt Nam";

        // VI TRI SUA	
        list($typetransport, $money_transport) = split(':', $userInfo['feetransport']);

        $transport_fee = $money_transport;

        $transport_fee_number = $money_transport;

        $payment_method = $userInfo['typeofcash'];

        $transport_method = $typetransport;

        // gan thong tin cho bang chi tiet don hang
        $product = new Product();

        $block = $temp->get_block_from_str($body, 'PRODUCT');

        $list_product_detail = "";

        $total_amount = 0;

        $total_price = 0;

        $cost = 0;

        $discount = 0;

        foreach ($cart as $val) {
            $product_detail = "";

            $pro = $product->getProductsByProductKey($val['product_key']);

            $price = common::convertFormatMoneyToInt($pro['products_price']);

            if ($pro['product_encourage'] != null && $pro['product_encourage'] != '') {
                $price = common::convertFormatMoneyToInt($pro['product_encourage']);
            }

            if ($val['price'] != '') {
                $price = common::convertFormatMoneyToInt($val['price']);
            }

            $quantity = intval($val['quantity']);

            $product_cost = $quantity * $price;

            $product_name = $pro['products_name'];

            if ($val['type'] != null && $val['type'] != '') {
                $product_name .= ' -- ' . $val['type'];
            }
            $block_val = array(
                'product_img' => $pro['products_image'],
                'product_name' => $product_name,
                'product_price' => common::convertIntToFormatMoney($price),
                'product_amount' => $val['quantity'],
                'product_total' => common::convertIntToFormatMoney($product_cost),
            );

            $product_detail .= $temp->assign_vars($block, $block_val);

            $total_amount += intval($val['quantity']);

            $total_price += $product_cost;

            $list_product_detail .= $product_detail;
        }

        $score = 0;

        $discount = str_replace('.', '', $userInfo['total_discount']);

        $discount = intval(str_replace(' VNĐ', '', $discount));

        $PriceOfUnit = $product->getPriceOfUnit();

        $score = floor(( $total_price + $discount) / $PriceOfUnit[0]['PriceScore']);

        $cost = $userInfo['totalproductfee'];

        $body = $temp->assign_blocks_content($body, array(
            'PRODUCTS' => $list_product_detail));
        global $server_name;

        $body = $temp->assign_vars($body, array(
            'table_style' => $table_style,
            'th_style' => $th_style,
            'td_style' => $td_style,
            'custommer_name' => $custommer_name,
            'orderID' => $orderID,
            'day' => $day,
            'buyer_name' => $buyer_name,
            'buyer_address' => $buyer_address,
            'buyer_country' => $buyer_country,
            'buyer_numberphone' => $buyer_numberphone,
            'receiver_name' => $receiver_name,
            'receiver_address' => $receiver_address,
            'receiver_country' => $receiver_country,
            'receiver_numberphone' => $receiver_numberphone,
            'transport_method' => $transport_method,
            'transport_fee' => $transport_fee,
            'transport_fee_number' => $transport_fee_number,
            'payment_method' => $payment_method,
            'note' => $note,
            'total_amount' => $total_amount,
            'total_price' => common::convertIntToFormatMoney($total_price),
            'score' => $score,
            'discount' => $userInfo['total_discount'],
            'cost' => $cost,
            'linkS' => $server_name,
        ));
        return $body;
    }

}

?>