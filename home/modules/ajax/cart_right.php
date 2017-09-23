<?php

include('home_start.php');
$cart_right = $xtemplate->load('cart_right');
$Product = new Product();
$Cart = new News();
$emty_cart = $_POST["emty"];
if ($emty_cart == 1) {
    $Cart->emptyProduct();
}

$blocks = $xtemplate->get_block_from_str($cart_right, 'LISTCART');
$i = 0;
$total = 0;
$cart_right_List = '';
foreach ($_SESSION['cart'] as $keys) {
    $rows_pro_detail = $Product->getProductsByProductKey($keys['product_key']);
    //$category_key = $Category->getCategoryKeyByProductKey($keys['product_key']);
    $p_price = $rows_pro_detail['products_price'];
    if ($keys['price'] != '') {
        $p_price = $keys['price'];
    }

    $description = '';
    $pro_des = '' . cut_string($rows_pro_detail['products_name'], 5) . '..';
    if ($keys['color'] != '') {
        //$pro_des .= "<br>".$keys['color'];
    }
    if ($keys['type'] != '') {
        //$pro_des .= "<br>".$keys['type'];
    }

    $tmp_cart = $xtemplate->assign_vars($blocks, array(
        //'product_image' => $rows_pro_detail['products_image'],
        //'pro_price'   		=> $p_price,
        //'product_key' 	=> $rows_pro_detail['products_key'],
        'pro_name' => $pro_des,
        'price_unit' => $rows_pro_detail['price_unit'],
        //'product_id' 	=> $rows_pro_detail['products_id'],
        'pro_quantity' => $keys['quantity'],
        'pro_price' => common::convertIntToFormatMoney(common::convertFormatMoneyToInt($p_price) * $keys['quantity']),
            //'description'	=> $description,
            //'type'			=> $keys['type'],
            //'color'			=> $keys['color'],
            //'color_des'		=> $color_des,
            //'type_des'		=> $type_des,
            //'stt'			=>  $i,
            //'category'		=> $category_key
    ));
    $cart_right_List .= $tmp_cart;
    $total += common::convertFormatMoneyToInt($p_price) * $keys['quantity'];
    $total_product += $keys['quantity']; //public
    $total_price = common::convertIntToFormatMoney($total); //public
    $i++;
}

$cart_right = $xtemplate->assign_blocks_content($cart_right, array(
    'LISTCART' => $cart_right_List,
        ));
if ($total_product == '') {
    $total_product = 0;
}
$cart_right = $xtemplate->assign_vars($cart_right, array('quantity' => $total_product,
    'price_total' => common::convertIntToFormatMoney($total),
    'cart_quan' => $total_product > 9 ? $total_product : "0" . $total_product
        ));
echo $cart_right;
?>