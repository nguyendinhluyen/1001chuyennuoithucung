<?php

function getOldProducts($lastest_products, $max_number_product, $config_name, $n_all_product, $condition) {
    // Get top lastest products
    $n_lastest_product = count($lastest_products);
    if ($n_lastest_product > $max_number_product) {
        $products = $lastest_products;
    } else {
        // Count number of old products
        $n_old_product = $max_number_product - $n_lastest_product;

        // Get index of previous products
        $Product = new Product();
        $old_pro = $Product->getPreviousLimitProduct($config_name);
        $start_limit_old_product = $old_pro[0]["config_value"];

        // Calculate end limit products
        $end_limit_old_product = $start_limit_old_product + $n_old_product;

        // Reset start limit old product in case show full product
        if (intval($end_limit_old_product + $max_number_product) > intval($n_all_product - $n_lastest_product)) {
            $end_limit_old_product = 0;
            $start_limit_old_product = 0;
        }

        // Update config limit products
        $date_added_pro = $old_pro[0]["date_added"];
        if ($date_added_pro != date('Y-m-d')) {
            $Product->updateLimitProduct($end_limit_old_product, $config_name);
        }

        // Load old products
        $old_products = $Product->getProductsLimitOrderById($start_limit_old_product
                , $n_old_product, $condition);
        $products = array_merge($lastest_products, $old_products);
    }
    return $products;
}

function getpercent($str1, $str2) {
    $encourage = (int) str_replace(".", "", $str1);
    $price = (int) str_replace(".", "", $str2);
    if ($encourage > $price) {
        $saleoff = round(($encourage - $price) / $encourage * 100);
    }
    $saleoff = $saleoff . '%';
    return $saleoff;
}

$disCountVIPCustomer = 0;
if (!empty($_SESSION['username'])) {
    // discount info
    $Discount_honorUser = $Product->getDiscountOfCustomer($_SESSION['username']);
    if (intval($Discount_honorUser) > 0) {
        $disCountVIPCustomer = (int) $Discount_honorUser;
    }
}

function getProducts($condition, $config_name, $n_display_product) {
    $Product = new Product();
    $week_days = 7;
    $lastest_best_sale_products = $Product->getProductsInWeek($week_days, $condition);
    $n_all_best_sale_product = $Product->countAllWithConditionProduct($condition);
    $products = getOldProducts($lastest_best_sale_products, $n_display_product
            , $config_name, $n_all_best_sale_product, $condition);
    return $products;
}

function showProducts(&$home, $areadisplay, $products, $displayofline, $total_display_product, $style = "float:left; padding-left: 40px") {
    $tpl = '';
    $tpl_temp = '<div class="row" id="product_home" style="' . $style . '">
                                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12" 
                                    style="padding:0px">
                                    <ul style="padding:0px">';
    global $xtemplate;
    $block = $xtemplate->get_block_from_str($home, $areadisplay);
    $flag = 0;
    $n = count($products);
    if ($n > $total_display_product) {
        $n = $total_display_product;
    }
    for ($i = 0; $i < $n; ++$i) {
        $flag ++;
        $price_encourage = $products[$i]['products_price'];
        $price_not_discount_product = "<div style='height:50px'> </div>";
        if ($products[$i]['product_encourage'] != '' && $products[$i]['p_type'] == '') {
            $price_not_discount_product = $products[$i]['products_price'];
            $price_encourage = (int) str_replace(".", "", $products[$i]['product_encourage']);
            $price_of_product = (int) str_replace(".", "", $price_not_discount_product);
            global $disCountVIPCustomer;
            $priceDiscountVIPCustomer = ($price_of_product * $disCountVIPCustomer) / 100;
            $priceVIPCustomer = $price_of_product - $priceDiscountVIPCustomer;
            if ($price_encourage > $priceVIPCustomer) {
                $priceVIPCustomer = round($priceVIPCustomer / 1000) * 1000;
                $price_encourage = common::convertIntToFormatMoney($priceVIPCustomer);
                $PromotionSale = '<span class="promotion">
                                                <span class="promotion_sale">-' . $disCountVIPCustomer
                        . '%' . '</span>
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

        $Category = new Category();
        $category_key = $Category->getCategoryKeyByProductID($products[$i]['products_id']);
        $tpl_temp .= $xtemplate->assign_vars($block, array(
            'product_img' => $products[$i]['products_image'],
            'product_name' => common::limitContent($products[$i]['products_name'], 100),
            'promotion_Sale' => $PromotionSale,
            'product_price' => $price_encourage,
            'price_not_discount_product' => $price_not_discount_product,
            'product_short' => common::limitContent($products[$i]['description'], 50),
            'product_key' => $products[$i]['products_key'],
            'category' => $category_key
        ));
        if ($flag % $displayofline == 0) {
            $tpl_temp .= ' </ul>';
            $tpl .= $tpl_temp . '</div></div>';
            $tpl_temp = '<div class="row" id="product_home" style="' . $style . '">
                                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12" 
                                             style="padding:0px">
                                            <ul style="padding:0px">';
        }
    }
    $home = $xtemplate->assign_blocks_content($home, array(
        $areadisplay => $tpl
    ));
}

function showNews(&$home, $areadisplay, $category) {
    $News = new News();
    $news = $News->getLastestNewsByCategory($category);
    $n = count($news);
    // Load news
    $tpl = '';
    $tpl_temp = '<div class="row" id="news_home">
                                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <ul>';
    global $xtemplate;
    $block = $xtemplate->get_block_from_str($home, $areadisplay);
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
            $tpl_temp = '<div class="row" id="product_home">
                                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <ul>';
        }
    }
    $home = $xtemplate->assign_blocks_content($home, array(
        $areadisplay => $tpl
    ));
}

function showDesktopLayout() {
    $html_desktop = '<li class="hidden-xs hidden-sm hidden-md">
                        <a class="list_product_name"
                           href="{linkS}{category}/{product_key}.htm"
                           style = "outline:none;">
                            <div class="product_detail">
                                <div class="product_name">
                                    <img alt="{product_name}" 
                                         src="{linkS}upload/product/{product_img}"
                                         width="140"
                                         height="140" 
                                         style = "margin-left:28px; cursor: pointer"/>
                                    <div class="textbox"  
                                         style = "padding-top: 65px; padding-left: 35px">
                                        <img alt="Xem chi tiết" 
                                             src="{linkS}layout/bootstrap/images/xem_chi_tiet.png"
                                             width="110px"
                                             style = "cursor: pointer; 
                                             margin-bottom: 5px">
                                    </div>                                                
                                </div>
                                <div class="product_tit">
                                    <div style="font-size: 14px; 
                                            cursor: pointer;                            
                                            font-family: RobotoSlabRegular;">
                                        {product_name}
                                    </div>
                                </div>
                                <div class="product_price" 
                                    style = "cursor: pointer;
                                        font-family:RobotoSlabRegular;
                                        font-size: 14px;">
                                    {product_price} VNĐ
                                </div>
                            </div>
                        </a>
                    </li>';
    return $html_desktop;
}

function showTabletLayout() {
    $html_tablet = '<li class="hidden-xs hidden-lg col-sm-3 col-md-3">
                        <a class="list_product_name"
                           href="{linkS}{category}/{product_key}.htm"
                           style = "outline:none;">
                            <div style="width:100%;">
                                <div style="margin-bottom:10px">
                                    <img class="img-responsive center-block"
                                        alt="{product_name}" 
                                        src="{linkS}upload/product/{product_img}"
                                        style="cursor:pointer; width:80%"/>
                                </div>
                                <div class="center-block"
                                    style="font-size:14px; 
                                        color:#929292;
                                        cursor:pointer;                            
                                        font-family:RobotoSlabRegular;
                                        text-align:center;
                                        margin-bottom:10px;
                                        height:60px">
                                    {product_name}
                                </div>
                                <div style="cursor:pointer;
                                        font-family:RobotoSlabRegular;
                                        font-size:14px;
                                        text-align:center;
                                        color:#fe5454;
                                        margin-bottom:20px">
                                    {product_price} VNĐ
                                </div>
                            </div>
                        </a>
                    </li>';
    return $html_tablet;
}

function showMobileLayout() {
    $html_mobile = '<li class="hidden-lg hidden-md hidden-sm col-xs-6">
                        <a class="list_product_name"
                           href="{linkS}{category}/{product_key}.htm"
                           style = "outline:none;">
                            <div style="width: 100%;">
                                <div style="margin-bottom: 10px">
                                    <img class="img-responsive center-block"
                                        alt="{product_name}" 
                                        src="{linkS}upload/product/{product_img}"
                                        style = "cursor: pointer; width: 80%"/>
                                </div>
                                <div class="center-block"
                                    style="font-size: 14px; 
                                        color: #929292;
                                        cursor: pointer;                            
                                        font-family: RobotoSlabRegular;
                                        text-align: center;
                                        margin-bottom: 10px;
                                        width: 80%;">
                                    {product_name}
                                </div>
                                <div style="cursor: pointer;
                                        font-family:RobotoSlabRegular;
                                        font-size: 14px;
                                        text-align: center;
                                        color: #fe5454;
                                        margin-bottom: 20px">
                                    {product_price} VNĐ
                                </div>
                            </div>
                        </a>
                    </li>';
    return $html_mobile;
}

// Load layout
$home = $xtemplate->load('home_bootstrap');
$desktop_layout = showDesktopLayout();
$tablet_layout = showTabletLayout();
$mobile_layout = showMobileLayout();
$home = $xtemplate->replace($home, array(
    'desktop_layout' => $desktop_layout,
    'tablet_layout' => $tablet_layout,
    'mobile_layout' => $mobile_layout
        ));

// Begin combo ban chay nhat
$Product = new Product();
$condition_combo = " AND upgrade_categories_id LIKE '%,337,%' ";
$configname_combo = "pre_limit_combo_best_sale";
$totaldisplayproduct_combo = 5;
$products_combo = getProducts($condition_combo, $configname_combo, $totaldisplayproduct_combo);
$areadisplay_combo = 'BESTCOMBOPRODUCTS';
showProducts($home, $areadisplay_combo, $products_combo, $totaldisplayproduct_combo, $totaldisplayproduct_combo);
// End combo ban chay nhat
// Begin combo ban chay nhat tablet
$totaldisplayproduct_combo_tablet = 4;
$displayofline_tablet = 4;
$products_combo_tablet = array_slice($products_combo, 0, 4);
$areadisplay_combo_tablet = 'BESTCOMBOPRODUCTS_TABLET';
showProducts($home, $areadisplay_combo_tablet, $products_combo_tablet, $displayofline_tablet, $totaldisplayproduct_combo_tablet, "");
// End combo ban chay nhat tablet
// Begin combo ban chay nhat mobile
$totaldisplayproduct_mobile_short = 4;
$displayofline_mobile = 2;
$products_combo_mobile = array_slice($products_combo, 0, 4);
$areadisplay_combo_mobile = 'BESTCOMBOPRODUCTS_MOBILE';
showProducts($home, $areadisplay_combo_mobile, $products_combo_mobile, $displayofline_mobile, $totaldisplayproduct_mobile_short, "");
// End combo ban chay nhat mobile
// Begin san pham ban chay
$condition_bestsale = " AND p_bestsell = 1 ";
$configname_bestsale = "pre_limit_product";
$totaldisplayproduct_bestsale = 10;
$products_bestsale = getProducts($condition_bestsale, $configname_bestsale, $totaldisplayproduct_bestsale);
$areadisplay_bestsale = 'HOTPRODUCTSNEW';
$displayofline_bestsale = 5;
showProducts($home, $areadisplay_bestsale, $products_bestsale, $displayofline_bestsale, $totaldisplayproduct_bestsale);
// End san pham ban chay
// Begin combo ban chay nhat tablet
$totaldisplayproduct_bestsale_tablet = 8;
$products_bestsale_tablet = array_slice($products_bestsale, 0, 8);
$areadisplay_bestsale_tablet = 'HOTPRODUCTSNEW_TABLET';
showProducts($home, $areadisplay_bestsale_tablet, $products_bestsale_tablet, $displayofline_tablet, $totaldisplayproduct_bestsale_tablet, "");
// End combo ban chay nhat tablet
// Begin san pham ban chay nhat mobile
$totaldisplayproduct_mobile = 8;
$products_bestsale_mobile = array_slice($products_bestsale, 0, 8);
$areadisplay_bestsale_mobile = 'HOTPRODUCTSNEW_MOBILE';
showProducts($home, $areadisplay_bestsale_mobile, $products_bestsale_mobile, $displayofline_mobile, $totaldisplayproduct_mobile, "");
// End san pham ban chay nhat mobile
// Begin dog - 10: Dog, 01: Cat
$condition_dog = " AND species='10' ";
$configname_dog = "pre_limit_product_dog";
$totaldisplayproduct_dog = 8;
$products_dog = getProducts($condition_dog, $configname_dog, $totaldisplayproduct_dog);
$products_dog_desktop = array_slice($products_dog, 0, 6);
$areadisplay_dog = 'DOGPRODUCTSNEW';
$displayofline_dog = 3;
showProducts($home, $areadisplay_dog, $products_dog_desktop, $displayofline_dog, $totaldisplayproduct_dog, "float:right");
// End dog
// Begin danh cho cun cung tablet
$products_dog_tablet = array_slice($products_dog, 0, 8);
$areadisplay_dog_tablet = 'DOGPRODUCTSNEW_TABLET';
showProducts($home, $areadisplay_dog_tablet, $products_dog_tablet, $displayofline_tablet, $totaldisplayproduct_bestsale_tablet, "");
// End danh cho cun cung tablet
// Begin danh cho cun cung mobile
$products_dog_mobile = array_slice($products_dog, 0, 8);
$areadisplay_dog_mobile = 'DOGPRODUCTSNEW_MOBILE';
showProducts($home, $areadisplay_dog_mobile, $products_dog_mobile, $displayofline_mobile, $totaldisplayproduct_mobile, "");
// End danh cho cun cung mobile
// Load Dog news
showNews($home, 'DOGNEWS', "27");

// Begin cat - 10: Dog, 01: Cat
$condition_cat = " AND species='01' ";
$configname_cat = "pre_limit_product_cat";
$totaldisplayproduct_cat = 8;
$products_cat = getProducts($condition_cat, $configname_cat, $totaldisplayproduct_cat);
$products_cat_desktop = array_slice($products_cat, 0, 6);
$areadisplay_cat = 'CATPRODUCTSNEW';
$displayofline_cat = 3;
showProducts($home, $areadisplay_cat, $products_cat_desktop, $displayofline_cat, $totaldisplayproduct_cat, "float:right");
// End cat
// Begin danh cho meo cung tablet
$products_cat_tablet = array_slice($products_cat, 0, 8);
$areadisplay_cat_tablet = 'CATPRODUCTSNEW_TABLET';
showProducts($home, $areadisplay_cat_tablet, $products_cat_tablet, $displayofline_tablet, $totaldisplayproduct_bestsale_tablet, "");
// End danh cho cun cung tablet
// Begin danh cho meo cung mobile
$products_cat_mobile = array_slice($products_cat, 0, 8);
$areadisplay_cat_mobile = 'CATPRODUCTSNEW_MOBILE';
showProducts($home, $areadisplay_cat_mobile, $products_cat_mobile, $displayofline_mobile, $totaldisplayproduct_mobile, "");
// End danh cho meo cung mobile
// Load cat news
showNews($home, 'CATNEWS', "28");

// Begin tu thuoc phong than
$condition_medicine = " AND CONCAT(' ',upgrade_categories_id,' ') LIKE '%,271,%'";
$configname_medicine = "pre_limit_product_medicine";
$totaldisplayproduct_medicine = 5;
$products_medicine = getProducts($condition_medicine, $configname_medicine, $totaldisplayproduct_medicine);
$areadisplay_medicine = 'MEDICINEPRODUCTSNEW';
showProducts($home, $areadisplay_medicine, $products_medicine, $totaldisplayproduct_medicine, $totaldisplayproduct_medicine);
// End tu thuoc phong than
// Begin tu thuoc phong than tablet
$products_medicine_tablet = array_slice($products_medicine, 0, 4);
$areadisplay_medicine_tablet = 'MEDICINEPRODUCTSNEW_TABLET';
showProducts($home, $areadisplay_medicine_tablet, $products_medicine_tablet, $displayofline_tablet, $totaldisplayproduct_combo_tablet, "");
// End tu thuoc phong than tablet
// Begin tu thuoc phong than mobile
$products_medicine_mobile = array_slice($products_medicine, 0, 4);
$areadisplay_medicine_mobile = 'MEDICINEPRODUCTSNEW_MOBILE';
showProducts($home, $areadisplay_medicine_mobile, $products_medicine_mobile, $displayofline_mobile, $totaldisplayproduct_mobile_short, "");
// End tu thuoc phong than mobile
// List advs home
$arrAdvs = GetRows('adver_id, adver_logo, adver_webname'
        , 'ads'
        , "adver_status = 1");
$list_advs = '';
foreach ($arrAdvs as $adv) {
    $list_advs .= '<div>'
            . '<a rel="nofollow" target="_blank" style = "outline: none" href="{linkS}thuong-hieu/'
            . $adv['adver_id'] . '">'
            . '<img alt="' . $adv['adver_webname'] . '" src="{linkS}upload/adver/thumb/'
            . $adv['adver_logo'] . '" width = "100px" height= "75px"/>'
            . '</a> '
            . '</div>';
}
$home = $xtemplate->replace($home, array('list_advs' => $list_advs));
$content = $home;
?>