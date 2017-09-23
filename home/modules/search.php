<?php

$title_page = 'Tìm kiếm';
$breadcrumbs_path = '<a href="{linkS}">Trang chủ</a>';
$breadcrumbs_path .= ' &raquo; Tìm kiếm';
if (isset($_POST["submit"])) {
    if (isset($_SESSION['search_key'])) {
        unset($_SESSION['search_key']);
        unset($_SESSION['orginal_search_key']);
    }
    $_SESSION['search_key'] = addslashes(input($_POST['search_box']));
    $_SESSION['orginal_search_key'] = $_POST['search_box'];
    header('Location: ' . $linkS . 'tim-kiem/trang-1');
}

// Load product
$elements = 'products_id,
            products_image,
            products_name,
            products_key,
            products_price,
            product_encourage';
$from_table = 'products';
$where = "products_status = 1 AND CONCAT(' ',products_name,' ') LIKE '% "
        . $_SESSION['search_key'] . " %' ORDER BY products_date_added DESC";
$sql = "SELECT $elements FROM $from_table WHERE $where LIMIT 0, 12";
global $mysql;
$products = $mysql->query_command($sql);
$sum_product = count($products);

$Category = new Category();
if ($sum_product == 1) {
    $category_key = $Category->getCategoryKeyByProductKey($products[0]['products_key']);
    header('Location: ' . $linkS . $category_key . "/" . $products[0]['products_key'] . ".htm");
    exit;
}
$tpl = '';
$tpl_mobile = '';
$tpl_tablet = '';
$tpl_temp = '<ul class="col-sm-12 hidden-xs" style="padding: 0px">';
$tpl_temp_mobile = '<ul class="col-xs-12 hidden-sm hidden-md hidden-lg" style="padding: 0px">';
$tpl_temp_tablet = '<ul class="col-xs-12 hidden-xs hidden-lg" style="padding: 0px">';
// Load searching layout
$template = $xtemplate->load('search_bootstrap');
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

$elements = 'news_id,
        MATCH(news_name, news_content) AGAINST("' . $_SESSION['search_key'] . '") AS score';
$from_table = 'news';
$where = 'status=1 AND (flag_publisher=1 OR help_flag=1) AND MATCH(news_name, news_content) AGAINST ("'
        . $_SESSION['search_key'] . '") ORDER BY score DESC';
$sql = 'SELECT ' . $elements . ' FROM ' . $from_table . ' WHERE ' . $where;
$listnews = $mysql->query_command($sql);
$total = count($listnews);
if ($total == 0) {
    $elements = 'news_id';
    $where = "status = 1 AND (flag_publisher=1 OR help_flag=1) AND CONCAT(' ',news_name,' ') LIKE '% "
            . $_SESSION['search_key'] . " %'";
    $sql = 'SELECT ' . $elements . ' FROM ' . $from_table . ' WHERE ' . $where;
    $listnews = $mysql->query_command($sql);
    $total = count($listnews);
}

// Pagination
$pp = 12;
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
// Load news searching
// Using Full Text MySQL
$elements = 'news_id,
            news_key,
            news_name,
            news_shortcontent,
            help_flag,
            flag_publisher, MATCH(news_name, news_content) AGAINST("' . $_SESSION['search_key'] . '") AS score';
$where = 'status=1 AND (flag_publisher=1 OR help_flag=1) AND MATCH(news_name, news_content) AGAINST ("'
        . $_SESSION['search_key'] . '") ORDER BY score DESC';
$sql = 'SELECT ' . $elements
        . ' FROM ' . $from_table
        . ' WHERE ' . $where . ' LIMIT ' . $limitvalue . ',' . $pp;
$listnews = $mysql->query_command($sql);
$sum_news = count($listnews);

// Using LIKE MySQL
if ($sum_news == 0) {
    $elements = 'news_id,
                news_key,
                news_name,
                news_shortcontent,
                help_flag,
                flag_publisher';
    $where = "status = 1 AND (flag_publisher=1 OR help_flag=1) AND CONCAT(' ',news_name,' ') LIKE '% "
            . $_SESSION['search_key'] . " %' ORDER BY date_added DESC";
    $sql = 'SELECT ' . $elements
            . ' FROM ' . $from_table
            . ' WHERE '
            . $where . ' LIMIT ' . $limitvalue . ',' . $pp;
    $listnews = $mysql->query_command($sql);
    $sum_news = count($listnews);
}
$tpl = '';
$tpl_temp = '<ul style="padding-left:0px;">';
$block = $xtemplate->get_block_from_str($template, 'NEWS');
for ($i = 0; $i < $sum_news; ++$i) {
    if ($listnews[$i]['help_flag'] == 1) {
        $news_category = "tro-giup";
        $linkHelp = ".html";
    } elseif ($listnews[$i]['flag_publisher'] == 1) {
        $news_category = "doi-song-pets";
        $linkHelp = "";
    }
    $tpl_temp .= $xtemplate->assign_vars($block, array(
        'news_name' => common::limitContent($listnews[$i]['news_name'], 100),
        'news_key' => $listnews[$i]['news_key'] . $linkHelp,
        'news_content' => common::limitContent($listnews[$i]['news_shortcontent'], 250) . " ...",
        'news_category' => $news_category
    ));
    $tpl_temp .= ' </ul>';
    $line = '<div class="line"> </div>';
    $tpl .= $tpl_temp . $line;
    $tpl_temp = '<ul style="padding-left:0px;">';
}
$template = $xtemplate->assign_blocks_content($template, array(
    'NEWS' => $tpl
        ));

// Display result
if ($sum_product == 0 || intval($p_now) >= 2) {
    $display_realtion_product = 'style="display:none"';
}
if ($sum_news == 0) {
    $display_realtion_news = 'style="display:none"';
}
$display_no_relation = 'style="display:none"';
if ($sum_news == 0 && $sum_product == 0) {
    $display_no_relation = 'style="display:block"';
}
$key_not_found = $_SESSION['orginal_search_key'];
$template = $xtemplate->replace($template, array(
    'display_realtion_product' => $display_realtion_product,
    'display_realtion_news' => $display_realtion_news,
    'display_no_relation' => $display_no_relation,
    'search_key' => $key_not_found,
    'page' => str_replace("page=", "trang-", pagination($linkS . "tim-kiem/", ceil($numofpages), $page)),
        ));
$content = $template;
?>