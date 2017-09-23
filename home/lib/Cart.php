<?php

class Cart {

    public $image;
    public $name;
    public $attribute;
    public $price;
    public $quantity;

    function addProduct($product_key, $color, $type, $price, $quantity, $update) {
        $quantity_old = 0;

        $flag = 0;

        $i = 0;

        foreach ($_SESSION['cart'] as $key) {
            if ($key['product_key'] == $product_key && $type == $key['type'] && $key['color'] == $color) {
                $quantity_old = $key['quantity'];

                $flag = 1;

                break;
            }

            $i++;
        }

        if ($flag == 0) {
            $_SESSION['cart'][] = array('product_key' => $product_key,
                'color' => $color,
                'type' => $type,
                'price' => $price,
                'quantity' => $quantity);

            $flag = 0;

            $quantity_old = 0;
        } else {
            $total = 0;

            if ($update == 1) {
                $total = $quantity;
            } else {
                $total = $quantity + $quantity_old;
            }

            $_SESSION['cart'][$i]['quantity'] = $total;

            $i = 0;

            $flag = 0;

            $quantity_old = 0;
        }

        $arr = array();

        $arr = $_SESSION['cart'];

        unset($_SESSION['cart']);

        foreach ($arr as $keys) {
            $_SESSION['cart'][] = $keys;
        }
    }

    function removeProduct($product_key, $product_type, $color) {

        $i = 0;

        $flag = 0;

        foreach ($_SESSION['cart'] as $key) {
            if ($key['product_key'] == $product_key && $key['type'] == $product_type) {
                $flag = 1;

                break;
            }
            $i++;
        }

        if ($flag == 1) {
            unset($_SESSION['cart'][$i]);
            $flag = 0;
        }

        $arr = array();

        $arr = $_SESSION['cart'];

        unset($_SESSION['cart']);

        foreach ($arr as $keys) {
            $_SESSION['cart'][] = $keys;
        }

        $i = 0;
    }

    function emptyProduct() {

        unset($_SESSION['cart']);
    }

    public function updateCart($order_id, $cart, $userInfo) {
        // KIEM TRA DON HANG DA GIAO HAY CHUA TRUOC KHI SUA DON HANG									

        global $mysql;

        $sql_de = "DELETE FROM order_detail WHERE id_order = " . $order_id;

        $mysql->setQuery($sql_de);

        if ($mysql->query()) {
            $product = new Product();

            $query = '';

            //Khiem
            //Thay doi cach parse gia san pham vao db				
            foreach ($cart as $val) {
                $pro = $product->getProductsByProductKey($val['product_key']);
                $price = $val['price'];
                $sql = "insert into order_detail";
                $sql .= "(id_order,product_key,product_name,product_type,product_color,product_price,product_quantity,status) ";
                $sql .= " values (";
                $sql .= $order_id;
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
            }
            unset($_SESSION['cart']);
        }

        $arrData = array("total" => $_SESSION['total_price']);

        update("tbl_order", $arrData, "id = " . $order_id);

        // Lay Price Of Unit		
        // 1 score = 50.000 VND
        $sql = "Select * from PriceOfUnit";

        $mysql->setQuery($sql);

        $PriceOfUnit = $mysql->loadAllRow();

        $sc = floor(intval(str_replace('.', '', $_SESSION['total_price'])) / $PriceOfUnit[0]['PriceScore']);

        updateScore($userInfo['email'], "addhistory", $sc, "Add Update Score Of Bill");
    }

    public function getOrderToCart($id_order) {
        if (isset($_SESSION['cart'])) {

            unset($_SESSION['cart']);
        }

        $orders = GetRows('id,id_order,product_name,product_key,product_type,product_color,product_price,product_quantity', 'order_detail', 'id_order = ' . $id_order);

        foreach ($orders as $order) {

            $_SESSION['cart'][] = array('product_key' => $order['product_key'],
                'color' => $order['product_color'],
                'type' => $order['product_type'],
                'price' => $order['product_price'],
                'quantity' => $order['product_quantity']);
        }
    }

    public function checkOrderOfUser($id_order, $user) {
        $orders = GetRows('id', 'tbl_order', 'id = ' . $id_order . ' and username = "' . $user . '"');

        if (empty($orders)) {
            return 0;
        }

        return 1;
    }

}

?>