<?php
include 'category.php';

function getpercent($str1, $str2) {
    $encourage = (int) str_replace(".", "", $str1);
    $price = (int) str_replace(".", "", $str2);
    if ($encourage > $price) {
        $saleoff = round(($encourage - $price) / $encourage * 100);
    }
    $saleoff = $saleoff . '%';
    return $saleoff;
}

$category_key = input($_GET['category_key']);
if (isset($_GET['category_sub_key'])) {
    $category_key = input($_GET['category_sub_key']);
}

$product = $xtemplate->load('product_bootstrap');
$Product = new Product();
$Category = new Category();
$disCountVIPCustomer = 0;

if ($_SESSION['username'] != '') {
    // Discount for customer
    $Discount_honorUser = $Product->getDiscountOfCustomer($_SESSION['username']);
    if (intval($Discount_honorUser) > 0) {
        $disCountVIPCustomer = (int) $Discount_honorUser;
    }
}

$linkPage = '';
$PromotionSale = '';
$breadcrumbs = $Category->getCategoryPath($category_key);
$breadcrumbs_path = '<a style = "outline:none" href="{linkS}">NanaPet</a> &raquo; '
        . '<a style = "outline:none" href="{linkS}san-pham/">Sản Phẩm</a>';

$page_now = intval($_GET['trang']);
// Title for page product SEO
if (empty($title_page)) {
    if (!empty($breadcrumbs[0]['name']) && (!isset($page_now) || $page_now == 1 || $page_now == 0)) {
        $title_page = $breadcrumbs[0]['name'];
    } else if (!empty($breadcrumbs[0]['name']) && isset($page_now)) {
        $title_page = $breadcrumbs[0]['name'] . " - trang $page_now";
    }
} else {
    if (isset($page_now) && $page_now != 0) {
        $title_page .= " - trang $page_now";
    }
}

// Description
if (empty($description)) {
    $description = $title_page;
} else {
    if (isset($page_now) && $page_now != 0) {
        $description .= " - trang $page_now";
    }
}

if (empty($keywords)) {
    $keywords = "thức ăn cho chó, thức ăn cho mèo";
}

$linkPage .= $breadcrumbs[0]['key'] . '/';
if ($category_key == 'sale-off') {
    $breadcrumbs_path .= ' &raquo; Sản phẩm giảm giá';
    $title_page = "Sản phẩm giảm giá";
    if (isset($page_now) && $page_now != 0) {
        $title_page .= " - trang $page_now";
    }
    $description = $title_page;
    $keywords = "thức ăn cho chó, thức ăn cho mèo";
    $linkPage = 'sale-off/';
}

//Get all products
$products_t = $Product->getProductsByCategoryKey($category_key);
$total = count($products_t);
if ($total === 0) {
    ?>
    <script>
        window.location = "<?php echo $linkS; ?>";
    </script>
    <?php
}

// Navigation
// Total products display
$pp = 24;
$p_now = 0;
if (isset($page_now)) {
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

if (isset($_GET['order_by'])) {
    $order_by = input($_GET['order_by']);
    $_SESSION['order_by'] = $order_by;
}

$products = $Product->getProductsByCategoryKeyLimitOrderBy($products_t, $category_key, $limitvalue, $pp, $_SESSION['order_by']);
$n = count($products);
$tpl = '';

// Bootstrap
$tpl_temp = '<div class="row" id="product_main">
                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul style ="margin-left: -43px">';
$block = $xtemplate->get_block_from_str($product, 'PRODUCT');
$flag = 0;
for ($i = 0; $i < $n; ++$i) {
    $flag ++;
    $price_encourage = $products[$i]['products_price'];
    $price_not_discount_product = "";
    if ($products[$i]['product_encourage'] != '' && $products[$i]['p_type'] == '') {
        $price_not_discount_product = $products[$i]['products_price'];
        $price_encourage = (int) str_replace(".", "", $products[$i]['product_encourage']);
        $price_of_product = (int) str_replace(".", "", $price_not_discount_product);
        $priceDiscountVIPCustomer = ($price_of_product * $disCountVIPCustomer) / 100;
        $priceVIPCustomer = $price_of_product - $priceDiscountVIPCustomer;

        if ($price_encourage > $priceVIPCustomer) {
            $priceVIPCustomer = round($priceVIPCustomer / 1000);
            $priceVIPCustomer = $priceVIPCustomer * 1000;
            $price_encourage = common::convertIntToFormatMoney($priceVIPCustomer);
            $PromotionSale = '<span class="promotion">
                                        <span class="promotion_sale">-' . $disCountVIPCustomer . '%' . '</span>
                                    </span>';
        } else {
            $price_encourage = common::convertIntToFormatMoney($price_encourage);
            $percent = getpercent($products[$i]['products_price'], $price_encourage);
            $PromotionSale = '<span class="promotion">
                                        <span class="promotion_sale">-' . $percent . '</span>
                                    </span>';
        }
        $price_not_discount_product = $price_not_discount_product . " VNĐ";
    } else {
        $PromotionSale = '';
    }

    $tpl_temp .= $xtemplate->assign_vars($block, array(
        'product_img' => $products[$i]['products_image'],
        'product_name' => cut_string($products[$i]['products_name'], 100),
        'product_name_nocut' => $products[$i]['products_name'],
        'promotion_Sale' => $PromotionSale,
        'product_price' => $price_encourage,
        'product_price_old' => $price_not_discount_product,
        'product_short' => common::limitContent($products[$i]['products_description'], 40),
        'product_key' => $products[$i]['products_key'],
        'category' => $category_key
    ));

    if ($flag % 4 == 0 || $i > $n - 2) {
        $tpl_temp .= ' </ul>';
        $tpl .= $tpl_temp . '</div></div>';
        $tpl_temp = '<div class="row" id="product_main">
                                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <ul style ="margin-left: -43px">';
    }
}

$product = $xtemplate->assign_blocks_content($product, array(
    'PRODUCTS' => $tpl
        ));

$url = getFullUrlNotParameter();
$url .= '/';
$url1 = $url . 'order/';

// Product SEO 
$nav_page = pagination($linkS . $linkPage, ceil($numofpages), $page);
$nav_page = str_replace("page=", "trang-", $nav_page);
// End product SEO
// Load dog news
$News = new News();
$news = $News->getNewsNewest("4");
$n = count($news);

// Load news
$tpl = '';
$tpl_temp = '<div class="row" id="news_home">
                    <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul>';

$block = $xtemplate->get_block_from_str($product, 'NEWS');
$flag = 0;
for ($i = 0; $i < $n; ++$i) {
    $flag ++;
    $tpl_temp .= $xtemplate->assign_vars($block, array(
        'news_name' => $news[$i]['news_name'],
        'news_key' => $news[$i]['news_key'],
        'news_image' => $news[$i]['news_image'],
    ));

    if ($flag % 4 == 0) {
        $tpl_temp .= ' </ul>';
        $tpl .= $tpl_temp . '</div></div>';
    }
}

$product = $xtemplate->assign_blocks_content($product, array(
    'NEWS' => $tpl
        ));

//List advs
$arrAdvs = GetRows('adver_id,adver_logo,adver_link', 'ads', "adver_status = 1");
$list_advs = '';
foreach ($arrAdvs as $adv) {
    $list_advs .= '<div>'
            . '<a rel="nofollow" target="_blank" style = "outline: none" href="{linkS}thuong-hieu/'
            . $adv['adver_id'] . '">'
            . '<img alt="' . $adv['adver_webname'] . '" src="{linkS}upload/adver/thumb/'
            . $adv['adver_logo'] . '" width = "90px" height= "70px"/>'
            . '</a> '
            . '</div>';
}

// Pagination product for SEO 
// Please check index.php for more info $link_product_navigation
if (ceil($numofpages) > 1) {
    if ($page == 1) {
        // First page
        $showpage = $page + 1;
        $link_product_navigation .= "<link rel='canonical' href='" . $linkS . $linkPage . "'/>";
        $link_product_navigation .= "<link rel='next' href='" . $linkS . $linkPage . "trang-$showpage'/>";
    } else if ($page > 1 && $page < ceil($numofpages)) {
        // From page 2 of product
        $showprepage = $page - 1;
        $shownextpage = $page + 1;
        $link_product_navigation .= "<link rel='prev' href='" . $linkS . $linkPage . "trang-$showprepage'/>";
        $link_product_navigation .= "<link rel='next' href='" . $linkS . $linkPage . "trang-$shownextpage'/>";
        $link_product_navigation .= "<meta name='robots' content='noindex,follow'/>";
    } else {
        // Last page
        $showprepage = $page - 1;
        $link_product_navigation .= "<link rel='prev' href='" . $linkS . $linkPage . "trang-$showprepage'/>";
        $link_product_navigation .= "<meta name='robots' content='noindex,follow'/>";
    }
}

if (empty($text_seo)) {
    $display_seo = "display:none";
} else {
    $display_seo = "display:block";
}
$product = $xtemplate->replace($product, array(
    'page' => $nav_page,
    'url' => $url,
    'url1' => $url1,
    'quannum' => $_SESSION['pp_quan'],
    'order_by' => $_SESSION['order_by'],
    'total_product' => $total,
    'self_total' => ((($page - 1) * $pp) + 1)
    . ' - ' . (((($page - 1) * $pp + $pp) <= $total) ? (($page - 1) * $pp + $pp) : $total),
    'category' => $category,
    'list_advs' => $list_advs,
    'category_name' => $category_name,
    'display_seo' => $display_seo,
    'text_seo' => $text_seo // Check category.php for SEO
        ));
$content = $product;
?>