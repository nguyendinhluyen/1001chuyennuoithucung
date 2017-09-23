<?php

$CONST_TOTAL_MIN_DISPLAY = 0;
$CONST_TOTAL_MAX_DISPLAY = 15;
$breadcrumbs_path = '<a href="{linkS}">Trang chủ</a>';
$idbrand = intval(input($_GET['brandkey']));
$brand = GetOneRow("adver_webname, adver_logo, description_ads", "ads", 'adver_id=' . $idbrand);
$breadcrumbs_path .= ' &raquo; ' . $brand['adver_webname'];
$title_page = 'Thương hiệu ' . $brand['adver_webname'];
// Load product
$elements = 'products_id,
                products_image,
                products_name,
                products_key,
                products_price,
                product_encourage';
$from_table = 'products';
$where = "products_status = 1 "
        . "AND manufacturer = '" . $brand['adver_webname']
        . "' ORDER BY products_date_added DESC";
$sql = "SELECT $elements FROM $from_table WHERE $where LIMIT $CONST_TOTAL_MIN_DISPLAY, $CONST_TOTAL_MAX_DISPLAY";
global $mysql;
$products = $mysql->query_command($sql);
$sum_product = count($products);

$tpl = '';
$tpl_temp = '<ul>';
// Load searching layout
$template = $xtemplate->load('brand_name_bootstrap');
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
$flag = 0;
for ($i = 0; $i < $sum_product; ++$i) {
    $flag ++;
    if (intval($products[$i]['products_price']) > 0) {
        $pro_price = $products[$i]['products_price'] . ' VNĐ';
    } else {
        $pro_price = "";
    }

    if (!empty($products[$i]['product_encourage']) && intval($products[$i]['product_encourage']) > 0 && $products[$i]['p_type'] == '') {
        if ($disCountVIPCustomer != 0) {
            // Initialize values
            $encourage_price = 0;

            // Price orginal of product                
            $price_of_product = (int) str_replace(".", "", $products[$i]['products_price']);

            // Price encourage of product
            $price_encourage = (int) str_replace(".", "", $products[$i]['product_encourage']);

            $priceDiscountVIPCustomer = ($price_of_product * $disCountVIPCustomer) / 100;
            $priceVIPCustomer = $price_of_product - $priceDiscountVIPCustomer;
            if ($price_encourage > $priceVIPCustomer) {
                $priceVIPCustomer = round($priceVIPCustomer / 1000);
                $priceVIPCustomer = $priceVIPCustomer * 1000;
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

    $Category = new Category();
    $category_key = $Category->getCategoryKeyByProductKey($products[$i]['products_key']);
    $tpl_temp .= $xtemplate->assign_vars($block, array(
        'product_img' => $products[$i]['products_image'],
        'product_name' => $products[$i]['products_name'],
        'product_key' => $products[$i]['products_key'],
        'product_price' => $pro_price,
        'category' => $category_key,
        'encourage_price' => $encourage_price
    ));

    if ($flag % 5 == 0 || $i > $sum_product - 2) {
        $tpl_temp .= ' </ul>';
        $line = '<div class="line"> </div>';
        $tpl .= $tpl_temp . $line;
        $tpl_temp = '<ul>';
    }
}

$template = $xtemplate->assign_blocks_content($template, array(
    'PRODUCTS' => $tpl,
        ));

$elements = 'count(products_id) as total_products';
$from_table = 'products';
$where = "products_status = 1 "
        . "AND manufacturer = '" . $brand['adver_webname'] . "'";
$sql = "SELECT $elements FROM $from_table WHERE $where";
$products = $mysql->query_command($sql);
// Check should display more products
$link_all_product = "";
if ($products[0]['total_products'] > $CONST_TOTAL_MAX_DISPLAY) {
    $link_all_product = "<a href='{linkS}tat-ca-thuong-hieu/" . $idbrand . "/trang-1'>Xem tất cả >></a>";
}

$no_products = "";
if ($sum_product == 0) {
    $no_products = "Không có sản phẩm thuộc thương hiệu " . $brand['adver_webname'];
}
if ($sum_product != 0) {
    $display_no_product = "display:none";
}
$description_ads = $brand['description_ads'];
$template = $xtemplate->replace($template, array(
    'adver_webname' => $brand['adver_webname'],
    'adver_logo' => $brand['adver_logo'],
    'description_ads' => $description_ads,
    'link_all_product' => $link_all_product,
    'no_products' => $no_products,
    'display_no_product' => $display_no_product
        ));
$content = $template;
?>