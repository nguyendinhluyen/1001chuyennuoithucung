<?php

$cart_right = $xtemplate->load('cart_right_bootstrap');
$Product = new Product();
$blocks = $xtemplate->get_block_from_str($cart_right, 'LISTCART');
$i = 0;
$total = 0;
$cart_right_List = '';
$total_product = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $keys) {
        $rows_pro_detail = $Product->getProductsByProductKey($keys['product_key']);
        $p_price = $rows_pro_detail['products_price'];

        if ($keys['price'] != '') {
            $p_price = $keys['price'];
        }

        $description = '';
        $pro_des = '' . cut_string($rows_pro_detail['products_name'], 5) . '..';
        $tmp_cart = $xtemplate->assign_vars($blocks, array(
            'pro_name' => $pro_des,
            'price_unit' => $rows_pro_detail['price_unit'],
            'pro_quantity' => $keys['quantity'],
            'pro_price' => common::convertIntToFormatMoney(common::convertFormatMoneyToInt($p_price) * $keys['quantity']),
        ));
        $cart_right_List .= $tmp_cart;
        $total += common::convertFormatMoneyToInt($p_price) * $keys['quantity'];
        $total_product += $keys['quantity'];
        $total_price = common::convertIntToFormatMoney($total);
        $i++;
    }
}

$cart_right = $xtemplate->assign_blocks_content($cart_right, array(
    'LISTCART' => $cart_right_List,
        ));

if ($total_product == '') {
    $total_product = 0;
}

$cart_right = $xtemplate->assign_vars($cart_right, array(
    'quantity' => $total_product,
    'price_total' => common::convertIntToFormatMoney($total),
    'cart_quan' => $total_product,
        ));
?>