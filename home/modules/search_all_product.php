<?php

$title_page = 'Tất cả sản phẩm';
$breadcrumbs_path = '<a href="{linkS}">Trang chủ</a>';
$breadcrumbs_path .= ' &raquo; Tất cả sản phẩm';

// Get total products
global $mysql;
$idbrand = input($_GET['brandkey']);
$elements = 'count(products_id) AS total_products';
$from_table = 'products';
if (!empty($idbrand)) {
    $brand = GetOneRow("adver_webname"
            , "ads"
            , 'adver_id=' . intval($idbrand));
    $where = "products_status = 1 "
            . "AND manufacturer = '" . $brand['adver_webname'] . "'";
} else {
    $where = "products_status = 1 AND CONCAT(' ',products_name,' ') LIKE '% "
            . $_SESSION['search_key'] . " %'";
}
$sql = "SELECT $elements FROM $from_table WHERE $where";
$products = $mysql->query_command($sql);
$total = intval($products[0]['total_products']);
// End total products
// Pagination
$pp = 30;
$p_now = intval($_GET['page']);
$numofpages = $total / $pp;
$page = 0;
if ($p_now <= 0) {
    $page = 1;
} else {
    if ($p_now <= ceil($numofpages)) {
        $page = $p_now;
    } else {
        $page = 1;
    }
}
$limitvalue = $page * $pp - ($pp);
// End pagination
// Load all products
$elements = 'products_id,
            products_image,
            products_name,
            products_key,
            products_price,
            product_encourage';
$from_table = 'products';
if (!empty($idbrand)) {
    $where = "products_status = 1 "
            . "AND manufacturer = '" . $brand['adver_webname'] . "'";
} else {
    $where = "products_status = 1 AND CONCAT(' ',products_name,' ') LIKE '% "
            . $_SESSION['search_key'] . " %' ORDER BY products_date_added DESC";
}
$sql = "SELECT $elements FROM $from_table WHERE $where LIMIT $limitvalue,$pp";
// End load all products
// Load searching layout
$template = $xtemplate->load('search_all_product_bootstrap');
$products = $mysql->query_command($sql);
$sum_product = count($products);
$tpl = '';
$tpl_temp = '<ul class="col-sm-12 hidden-xs" style="padding: 0px">';
$tpl_temp_mobile = '<ul class="col-xs-12 hidden-sm hidden-md hidden-lg" style="padding: 0px">';
$tpl_temp_tablet = '<ul class="col-xs-12 hidden-xs hidden-lg" style="padding: 0px">';
$block = $xtemplate->get_block_from_str($template, 'PRODUCT');

// Discount VIP
$disCountVIPCustomer = 0;
if (!empty($_SESSION['username'])) {
    $Product = new Product();
    $discount_honorUser = $Product->getDiscountOfCustomer($_SESSION['username']);
    if (intval($discount_honorUser) > 0) {
        $disCountVIPCustomer = (int) $discount_honorUser;
    }
}

// Show products
$Category = new Category();
$flag = 0;
for ($i = 0; $i < $sum_product; ++$i) {
    $flag ++;
    $encourage = '';
    if (intval($products[$i]['products_price']) > 0) {
        $pro_price = $products[$i]['products_price'] . ' VNĐ';
    } else {
        $pro_price = "";
    }

    if (!empty($products[$i]['product_encourage']) && intval($products[$i]['product_encourage']) > 0 && $products[$i]['p_type'] == '') {
        if ($disCountVIPCustomer != 0) {
            $encourage_price = 0;
            $price_of_product = (int) str_replace(".", "", $products[$i]['products_price']);
            $price_encourage = (int) str_replace(".", "", $products[$i]['product_encourage']);
            $priceDiscountVIPCustomer = ($price_of_product * $disCountVIPCustomer) / 100;
            $priceVIPCustomer = $price_of_product - $priceDiscountVIPCustomer;
            if ($price_encourage > $priceVIPCustomer) {
                $priceVIPCustomer = round($priceVIPCustomer / 1000) * 1000;
                $encourage_price = common::convertIntToFormatMoney($priceVIPCustomer) . ' VNĐ';
            } else {
                $encourage_price = $products[$i]['product_encourage'] . ' VNĐ';
            }
        } else {
            $encourage_price = $products[$i]['product_encourage'] . ' VNĐ';
        }
    } else {
        $encourage_price = $pro_price;
        $pro_price = "";
    }
    $category_key = $Category->getCategoryKeyByProductKey($products[$i]['products_key']);
    $tpl_temp .= '<li class="hidden-xs hidden-sm hidden-md col-lg-2">';
    $tpl_temp_mobile .= '<li class="col-xs-6 hidden-sm hidden-md hidden-lg">';
    $tpl_temp_tablet .= '<li class="col-sm-3 hidden-xs hidden-lg">';
    $var_tpl_temp = $xtemplate->assign_vars($block, array(
        'product_img' => $products[$i]['products_image'],
        'product_name' => $products[$i]['products_name'],
        'product_key' => $products[$i]['products_key'],
        'product_price' => $pro_price,
        'category' => $category_key,
        'encourage_price' => $encourage_price
    ));
    $tpl_temp .= $var_tpl_temp . '</li>';
    $tpl_temp_mobile .= $var_tpl_temp . '</li>';
    $tpl_temp_tablet .= $var_tpl_temp . '</li>';
    // desktop
    if ($flag % 6 == 0 || $i == $sum_product - 1) {
        $tpl_temp .= '</ul>';
        $tpl .= $tpl_temp;
        $tpl_temp = '<ul class="col-xs-12 hidden-xs hidden-sm hidden-md" style="padding: 0px">';
    }
    // mobile
    if ($flag % 2 == 0 || $i == $sum_product - 1) {
        $tpl_temp_mobile .= '</ul>';
        $tpl_mobile .= $tpl_temp_mobile;
        $tpl_temp_mobile = '<ul class="col-xs-12 hidden-sm hidden-md hidden-lg" style="padding: 0px">';
    }
    // tablet
    if ($flag % 4 == 0 || $i == $sum_product - 1) {
        $tpl_temp_tablet .= '</ul>';
        $tpl_tablet .= $tpl_temp_tablet;
        $tpl_temp_tablet = '<ul class="col-xs-12 hidden-xs hidden-lg" style="padding: 0px">';
    }
}
$template = $xtemplate->assign_blocks_content($template, array(
    'PRODUCTS' => $tpl
        ));
$template = $xtemplate->assign_blocks_content($template, array(
    'PRODUCTS_MOBILES' => $tpl_mobile
        ));
$template = $xtemplate->assign_blocks_content($template, array(
    'PRODUCTS_TABLETS' => $tpl_tablet
        ));
if (!empty($idbrand)) {
    $template = $xtemplate->replace($template, array(
        'page' => str_replace("page=", "trang-"
                , pagination($linkS . "tat-ca-thuong-hieu/" . $idbrand . "/", ceil($numofpages), $page)),
    ));
} else {
    $template = $xtemplate->replace($template, array(
        'page' => str_replace("page=", "trang-"
                , pagination($linkS . "tim-kiem/tat-ca-san-pham/", ceil($numofpages), $page)),
    ));
}
$content = $template;
?>