<?php

function loadCartList(&$cart, $areadisplay, $linkS, $Product) {
    global $xtemplate;
    $blocks = $xtemplate->get_block_from_str($cart, $areadisplay);
    if (isset($_SESSION['cart'])) {
        global $total;
        $total = 0;
        $cartList = '';
        $i = 0;
        $Category = new Category();
        $list_product = "";
        foreach ($_SESSION['cart'] as $keys) {
            $rows_pro_detail = $Product->getProductsByProductKey($keys['product_key']);
            $category_key = $Category->getCategoryKeyByProductKey($keys['product_key']);
            if ($keys['price'] != '') {
                $p_price = $keys['price'];
            }

            if ($keys['color'] != '') {
                $color_des = "<li style = 'margin-top: 5px'><span style= 'font-family:RobotoSlabRegular;font-size: 11px; width:65px;'>" .
                        $rows_pro_detail['p_attribute'] . ":&nbsp;</span> <b style ='font-family:RobotoSlabRegular;font-size:12px'>" .
                        $keys['color'] . "</b>&nbsp;</li>";
            }

            if ($keys['type'] != '') {
                $type_des = "<li style = 'margin-top: 5px'><span style= 'font-family:RobotoSlabRegular;font-size: 11px; width:65px;'>Loại:</span> "
                        . "<b style ='font-family:RobotoSlabRegular;font-size:12px'>" . $keys['type'] . "</b>&nbsp;</li>";
            }

            $sua_don_hang = '';

            if (isset($_SESSION['order_id']) && $_SESSION['order_id'] > 0) {
                $sua_don_hang = '<b style="color: red;">Bạn đang ở chế độ sửa đơn hàng số ' .
                        $_SESSION['order_id'] . '</b>&nbsp;&nbsp;<a href="' .
                        $linkS . 'reset-update.chm">Hủy</a>';
            }

            $tmp_cart = $xtemplate->assign_vars($blocks, array(
                'product_image' => $rows_pro_detail['products_image'],
                'product_name' => $rows_pro_detail['products_name'],
                'price' => $p_price,
                'product_key' => $rows_pro_detail['products_key'],
                'price_unit' => "VNĐ",
                'product_id' => $rows_pro_detail['products_id'],
                'quantity' => $keys['quantity'],
                'total_one' => common::convertIntToFormatMoney(common::convertFormatMoneyToInt($p_price) * $keys['quantity']),
                'type' => $keys['type'],
                'color' => $keys['color'],
                'color_des' => $color_des,
                'type_des' => $type_des,
                'stt' => $i,
                'category' => $category_key,
                'stt_item' => ($i)
            ));
            $cartList .= $tmp_cart;
            $total += common::convertFormatMoneyToInt($p_price) * $keys['quantity'];
            $i++;
            $list_product .= $rows_pro_detail['products_name'] . ',';
        }
    }

    $_SESSION['total_price'] = common::convertIntToFormatMoney($total);
    if (count($_SESSION['cart']) == 0) {
        $cart = '<div class="container">
                    <div class = "row">        
                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div style="font-size:17px; 
                                        font-family: RobotoSlabRegular;
                                        margin-top: 150px;
                                        margin-bottom: 150px">
                                <center>
                                    <i>Hiện chưa có sản phẩm nào trong giỏ hàng của bạn.</i>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>';

        $cart.= '<script type="text/javascript">
                    $(document).ready(function(){
                    $.ajax({
                            type: "POST",
                            url: "{linkS}home/modules/ajax/cart_right.php",
                            data: {},
                            success: function(data){
                                    $("#main-cart").html(data);
                            }
                        });
                    });
                </script>';
    }
    $cart = $xtemplate->assign_blocks_content($cart, array(
        $areadisplay => $cartList
    ));
}

$display = "style='display:none'";
$display_code_coupon = "style='color:#F00; display:block'";
if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
    //GET DISCOUNT USER		
    $Product = new Product();
    $disCountVIPCustomer = 0;
    if ($_SESSION['username'] != '') {
        $Discount_honorUser = $Product->getDiscountOfCustomer($_SESSION['username']);
        if (intval($Discount_honorUser) > 0) {
            $disCountVIPCustomer = (int) $Discount_honorUser;
        }
    }

    $Cart = new Cart();
    // Edit cart
    // Check order has delivered or not
    if (isset($_GET['order_id'])) {
        if ($_GET['order_id'] > 0) {
            if (($_SESSION['username'] == '')) {
                $_SESSION['cart_login'] = 1;
                ?>
                <script>
                    window.location = "<?php echo $linkS . 'dang-nhap'; ?>";
                </script>                                                
                <?php
            } else {
                if ($Cart->checkOrderOfUser($_GET['order_id'], $_SESSION['username']) == 1) {
                    $Cart->getOrderToCart($_GET['order_id']);
                    $_SESSION['order_id'] = $_GET['order_id'];
                }
            }
        }
    }
    //End edit cart
    //Delete item cart
    if (isset($_POST['deleteItem'])) {
        $proItemStt = ($_POST['check_cart']);
        $proKey = ($_POST['product_key']);
        $proType = ($_POST['type']);
        $proColor = ($_POST['color']);
        foreach ($proItemStt as $val) {
            $Cart->removeProduct($proKey[$val], $proType[$val], $proColor[$val]);
        }
    }
    //End delete item cart

    if (isset($_POST['check_coupon'])) {
        $coudeCoupon = $_POST['code_coupon'];
        $Product = new Product();
        $coupon = $Product->getCoupon($coudeCoupon);
        $begin_cost_coupon = common::convertFormatMoneyToInt($coupon["begin_cost_coupon"]);
        $end_cost_coupon = common::convertFormatMoneyToInt($coupon["end_cost_coupon"]);
        $total_money = common::convertFormatMoneyToInt($_SESSION['total_price']);

        if (!empty($coupon['discount_coupon']) && $begin_cost_coupon <= $total_money && $total_money <= $end_cost_coupon) {
            $date_now = date('d-m-Y', time());
            $date1 = new DateTime($date_now);
            $date2 = new DateTime($coupon['date_deadline_coupon']);
            if ($date1 <= $date2) {
                $display = "style='color:#F00; display:block'";
                $display_code_coupon = "style='display:none'";
                $message_result = "<br><span>Giá trị coupon: -" . $coupon['discount_coupon'] . "</span>% <span style = 'color:blue'></span>" .
                        "<br><span style ='padding-top: 10px'> Hãy ĐẶT HÀNG để sử dụng coupon này nhé! </span>";
                $coupon_code = $coupon['code_coupon'];
            } else {
                $display = "style='color:#F00; display:block'";
                $display_code_coupon = "style='display:none'";
                $message_result = "Coupon không đúng hoặc đã hết hạn
                                <br> hoặc tổng giá trị đơn hàng không phù hợp bạn nhé!
                                <br> Vui lòng nhập mã coupon khác!";
            }
        } else {
            $display = "style='color:#F00; display:block'";
            $display_code_coupon = "style='display:none'";
            $message_result = "Coupon không đúng hoặc đã hết hạn
                            <br> hoặc tổng giá trị đơn hàng không phù hợp bạn nhé!
                            <br> Vui lòng nhập mã coupon khác!";
        }
    }

    //update quantity item cart
    if (isset($_POST['updateQuan'])) {
        $proKey = ($_POST['product_key']);
        $proType = ($_POST['type']);
        $proColor = ($_POST['color']);
        $quantity = ($_POST['quantity']);
        $prices = ($_POST['prices']);
        $n = count($proKey);
        for ($i = 0; $i < $n; ++$i) {
            $Cart->addProduct($proKey[$i], $proColor[$i], $proType[$i], $prices[$i], $quantity[$i], 1); //0 add; 1 edit
        }
    }
    //end update quantity item cart

    $product_key = input($_GET['product_key']);
    $quantity = input($_POST['quantity']);

    //type and price
    $typeS = input($_POST['type']);
    $color = input($_POST['color']);
    $add = input($_GET['add']);
    $empty = input($_GET['em']);

    //get edit
    $edit = input($_GET['edit']);

    //get delete
    $del = input($_GET['del']);

    //array type and price
    $arType = explode('::', $typeS);
    $type = $arType[0];
    $price = $arType[1];

    if ($price == '') {
        $product_detail = $Product->getProductsByProductKey($product_key);
        $price = $product_detail['products_price'];

        // GIAM GIA CHO NHUNG SAN PHAM KHONG DUOC GIAM GIA
        if ($product_detail['product_encourage'] == '' && $disCountVIPCustomer > 0) {
            $price_not_discount_product = $product_detail['products_price'];
            $price_of_product = (int) str_replace(".", "", $price_not_discount_product);
            $priceDiscountVIPCustomer = $price_of_product * ($disCountVIPCustomer / 100);
            $priceVIPCustomer = round(($price_of_product - $priceDiscountVIPCustomer) / 1000) * 1000;
            $price_encourage = common::convertIntToFormatMoney($priceVIPCustomer);
            $price = $price_encourage;
        } else if ($product_detail['product_encourage'] != '') {
            $price_not_discount_product = $product_detail['products_price'];
            $price_encourage = (int) str_replace(".", "", $product_detail['product_encourage']);
            $price_of_product = (int) str_replace(".", "", $price_not_discount_product);
            $priceDiscountVIPCustomer = $price_of_product * ($disCountVIPCustomer / 100);
            $priceVIPCustomer = $price_of_product - $priceDiscountVIPCustomer;
            if ($price_encourage > $priceVIPCustomer) {
                $priceVIPCustomer = round($priceVIPCustomer / 1000) * 1000;
                $price_encourage = common::convertIntToFormatMoney($priceVIPCustomer);
            } else {
                $price_encourage = common::convertIntToFormatMoney($price_encourage);
            }
            $price = $price_encourage;
        }
    }

    //remove cart
    if ($del == 1) {
        $Cart->removeProduct($product_key, $type, $color);
    }

    //edit cart
    $flag = 0;
    if ($edit == 1) {
        $flag = 1;
    }
    if ($edit == 1 || $add == 'add') {
        $Cart->addProduct($product_key, $color, $type, $price, $quantity, $flag);
    }
    $emty_cart = 0;
    if ($empty == 1) {
        $Cart->emptyProduct();
        $emty_cart = 1;
    }


    // load layout
    $cart = $xtemplate->load('cart_bootstrap');
    loadCartList($cart, "LISTCART", $linkS, $Product);
    loadCartList($cart, "MOBILE_LISTCART", $linkS, $Product);
    $cart = $xtemplate->replace($cart, array(
        'total' => common::convertIntToFormatMoney($total),
        'price_unit' => 'VNĐ',
        'sua_don_hang' => $sua_don_hang,
        'emty_cart' => $emty_cart,
        'list_product' => ($list_product),
        'total_price' => $total,
        'display' => $display,
        'message_result' => $message_result,
        'display_code_coupon' => $display_code_coupon,
        'coupon_code' => $coupon_code
    ));
    $breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
    $breadcrumbs_path .= ' &raquo; ' . 'Giỏ hàng';
    $title_page = 'Giỏ hàng';
    $content = $cart;
} else {
    ?>
    <script>
        window.location = "<?php echo $linkS . 'dang-nhap'; ?>";
    </script>
    <?php
}
?>