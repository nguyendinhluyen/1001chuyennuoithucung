<?php

// Title for page all product SEO
$title_page = '';
$page_now = !empty($_GET['trang']) ? intval(input($_GET['trang'])) : '';
if (!isset($page_now) || $page_now === 1 || $page_now === 0) {
    $title_page = 'Thương hiệu sản phẩm';
} else {
    $title_page = "Thương hiệu sản phẩm - trang $page_now";
}

// Description
$description = $title_page;
$breadcrumbs_path = '<a hadvref="{linkS}">NanaPet</a>';
$breadcrumbs_path .= ' &raquo; ' . '<a href="{linkS}gioi-thieu">Giới Thiệu</a>';
$breadcrumbs_path .= ' &raquo; Tất cả thương hiệu';

$elements = 'count(adver_id) as total_brands';
$from_table = 'ads';
$where = 'adver_status = 1';
$sql = "SELECT $elements FROM $from_table WHERE $where";
$brands = $mysql->query_command($sql);
$total = $brands[0]['total_brands'];

// Navigation
$p_now = 0;
$pp = 58;
if (!empty($page_now)) {
    $p_now = intval($page_now);
}
$numofpages = $total / $pp;
$page = 0;
if ($p_now == 0) {
    $page = 1;
} else {
    if ($p_now <= ceil($numofpages)) {
        $page = $p_now;
    } else {
        $page = 1;
    }
}
$limitvalue = ($page - 1) * $pp;
// End navigation

$linkPage = "gioi-thieu/tat-ca-thuong-hieu";
$nav_page = pagination($linkS . $linkPage . "/", ceil($numofpages), $page);
$nav_page = str_replace("page=", "trang-", $nav_page);

$elements = 'adver_id, adver_logo, adver_webname';
$from_table = 'ads';
$sql = "SELECT $elements FROM $from_table WHERE $where ORDER BY date_added DESC LIMIT $limitvalue, $pp";
$brands = $mysql->query_command($sql);
$n = count($brands);

// Bootstrap
$tpl = '';
$content = $xtemplate->load('all_brand_name_bootstrap');
$tpl_temp = '<div id="product_main">                           
                    <ul class="col-xs-12" style="padding:0px">';
$flag = 0;
$block = $xtemplate->get_block_from_str($content, 'PRODUCT');
for ($i = 0; $i < $n; ++$i) {
    $flag ++;
    $tpl_temp .= $xtemplate->assign_vars($block, array(
        'brand_img' => $brands[$i]['adver_logo'],
        'adver_id' => $brands[$i]['adver_id'],
        'brand_name' => $brands[$i]['adver_webname']
    ));

    if ($flag % 4 == 0 || $i > $n - 2) {
        $tpl_temp .= ' </ul>';
        $tpl .= $tpl_temp . '</div>';
        $tpl_temp = '<div id="product_main">                                   
                            <ul class="col-xs-12" style="padding:0px">';
    }
}

$content = $xtemplate->assign_blocks_content($content, array(
    'PRODUCTS' => $tpl,
        ));
$content = $xtemplate->replace($content, array(
    'page' => $nav_page,
    'category' => $category,
        ));
?>