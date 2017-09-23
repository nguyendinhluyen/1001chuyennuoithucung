<?php
$news = new News();
$user_name = $_SESSION['username'];
$hidden = '';

// Format Money
function formatMoney($number, $fractional = false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

function discountMoney($str1, $str2) {
    $encourage = (int) str_replace(".", "", $str1);
    $price = (int) str_replace(".", "", $str2);
    if ($encourage > $price) {
        $saleoff = $encourage - $price;
    }
    return formatMoney($saleoff);
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

function showRelationProducts(&$productdetail, $products, $disCountVIPCustomer, $area_display, $nb_each_line, $style) {
    $tpl = '';
    $tpl_temp = '<div id="product_home">
                                <div class = "col-xs-12">
                                    <ul style="' . $style . '">';
    global $xtemplate;
    $block = $xtemplate->get_block_from_str($productdetail, $area_display);
    $flag = 0;
    for ($i = 0; $i < count($products); ++$i) {
        $flag ++;
        $price_encourage = $products[$i]['products_price'];
        $price_not_discount_product = "<div style='height:50px'> </div>";
        if ($products[$i]['product_encourage'] != '' && $products[$i]['p_type'] == '') {
            $price_not_discount_product = $products[$i]['products_price'];
            $price_encourage = (int) str_replace(".", "", $products[$i]['product_encourage']);
            $price_of_product = (int) str_replace(".", "", $price_not_discount_product);
            $priceDiscountVIPCustomer = ($price_of_product * $disCountVIPCustomer) / 100;
            $priceVIPCustomer = $price_of_product - $priceDiscountVIPCustomer;
            if ($price_encourage > $priceVIPCustomer) {
                $priceVIPCustomer = round($priceVIPCustomer / 1000) * 1000;
                $price_encourage = common::convertIntToFormatMoney($priceVIPCustomer);
            } else {
                $price_encourage = common::convertIntToFormatMoney($price_encourage);
            }
            $price_not_discount_product = $price_not_discount_product . " VNĐ";
        }

        $Category = new Category();
        $category_key = $Category->getCategoryKeyByProductID($products[$i]['products_id']);
        $tpl_temp .= $xtemplate->assign_vars($block, array(
            'product_img' => $products[$i]['products_image'],
            'product_name' => common::limitContent($products[$i]['products_name'], 60),
            'product_price' => $price_encourage,
            'price_not_discount_product' => $price_not_discount_product,
            'product_short' => common::limitContent($products[$i]['description'], 50),
            'product_key' => $products[$i]['products_key'],
            'category' => $category_key
        ));

        if ($flag % $nb_each_line == 0) {
            $tpl_temp .= ' </ul>';
            $tpl .= $tpl_temp . '</div></div>';
            $tpl_temp = '<div id="product_home">
                                                <div class = "col-xs-12">
                                                    <ul style="' . $style . '">';
        }
    }
    $productdetail = $xtemplate->assign_blocks_content($productdetail, array(
        $area_display => $tpl
    ));
}

$product_key = input($_GET['product_key']);
$productdetail = $xtemplate->load('product_detail_bootstrap');
$Product = new Product();
$disCountVIPCustomer = 0;

if ($_SESSION['username'] != '') {
    // Get info discount for customer
    $Discount_honorUser = $Product->getDiscountOfCustomer($_SESSION['username']);
    if (intval($Discount_honorUser) > 0) {
        $disCountVIPCustomer = (int) $Discount_honorUser;
    }
}

$product_detail = $Product->getProductsByProductKey($product_key);
if (empty($product_detail) || !isset($product_detail)) {
    ?>
    <script>
        window.location = '<?php echo $linkS; ?>';
    </script>
    <?php
}

$proType = $Product->getProductsType($product_detail['p_type']);
$proColor = $Product->getProductsColor($product_detail['p_color']);

// Bread crumb
$breadcrumbs = $Product->getProductPath($_GET['category_key']);
$breadcrumbs_path = '';
$breadcrumbs_path .= '<a style = "outline:none" href="{linkS}">NanaPet</a> &raquo; '
        . '<a style = "outline:none" href="{linkS}san-pham/">Sản Phẩm</a>';
$k = count($breadcrumbs);
$title = array();
for ($i = $k; $i >= 0; $i--) {
    if ($breadcrumbs[$i]['name'] != '') {
        $title[] = $breadcrumbs[$i]['name'];
        $breadcrumbs_path .= ' &raquo; <a style = "outline:none" href="{linkS}'
                . $breadcrumbs[$i]['key'] . '/">' . $breadcrumbs[$i]['name'] . '</a>';
    }
}

$category_c = $breadcrumbs[0]['key'] . "/";
$breadcrumbs_path .= ' &raquo; ' . $product_detail['products_name'];

// Bread crumb mobile
$breadcrumbs_path_mobile = '';
$breadcrumbs_path_mobile .= '<a style = "outline:none" href="{linkS}">NanaPet</a>';
$breadcrumbs_path_mobile .= ' &raquo; <a style = "outline:none" href="{linkS}'
        . $breadcrumbs[$k - 1]['key'] . '/">' . $breadcrumbs[$k - 1]['name'] . '</a>';
$breadcrumbs_path_mobile .= ' &raquo; ' . $product_detail['products_name'];

// Title Page
$title_page = $product_detail['products_name'] . " | ";
$k = count($title);
for ($i = $k; $i >= 0; $i--) {
    if (!empty($title[$i])) {
        if ($i > 0) {
            $title_page .= $title[$i] . " | ";
        } else {
            $title_page .= $title[$i];
        }
    }
}

$n = count($proColor);
$m = count($proType);
$colorTemplate = '';
$p_attribute = $product_detail['p_attribute'];

if (empty($p_attribute)) {
    $p_attribute = "Đặc Điểm ";
}

if (!empty($proColor[0])) {
    $i = 0;
    foreach ($proColor as $val) {
        $colorTemplate .='<li>';
        if ($i == 0) {
            $colorTemplate .='<span style ="float:left; width: 250px">'
                    . $p_attribute
                    . '</span>';
            $colorTemplate .='<input type="radio"
                                                name="color"
                                                id="color"
                                                checked 
                                                align="left" value="' . $val . '" />'
                    . '&nbsp; <span>' . $val . '</span>';
        } else {
            $colorTemplate .= '<span style="width: 250px; float:left">&nbsp;</span>';
            $colorTemplate .= '<input type="radio"
                                        name="color"
                                        id="color"
                                        align="left"
                                        value="' . $val . '" />'
                    . '&nbsp; <span>' . $val . '</span>';
        }
        $colorTemplate .='</li>';
        $i ++;
    }
}

$typeTemplate = '';
if (!empty($proType[0]['price'])) {
    $i = 0;
    foreach ($proType as $val) {
        $pri = $val['price'];
        if ($pri == '') {
            $pri = $product_detail['products_price'];
        }
        $typeTemplate .='<ul style="padding-left: 0px; clear: both"><li>';
        if ($i == 0) {
            $typeTemplate .= '<span style="width: 250px; float:left">Loại </span>';
            $typeTemplate .= '<span width="10px;">'
                    . '<input type="radio" id="type" name="type" checked value="'
                    . $val['type'] . '::' . $pri . '" />'
                    . '&nbsp; ' . $val['type'] . '&nbsp; (=' . $pri . ')';
        } else {
            $typeTemplate .= '<span style="width: 250px; float:left">&nbsp;</span>';
            $typeTemplate .= '<span width="10px;">'
                    . '<input type="radio" id="type" name="type"  value="' . $val['type'] . '::' . $pri . '" />'
                    . '&nbsp; ' . $val['type'] . '&nbsp; (=' . $pri . ')';
        }
        $typeTemplate .='</li></ul>';
        $i++;
    }
}

$price_encourage = $product_detail['products_price'];

// discount for non-discount product
if (empty($product_detail['product_encourage']) && $disCountVIPCustomer > 0 && empty($product_detail['p_type'])) {
    $price_not_discount_product = $product_detail['products_price'];
    $price_of_product = (int) str_replace(".", "", $price_not_discount_product);
    $priceDiscountVIPCustomer = ($price_of_product * $disCountVIPCustomer) / 100;
    $priceVIPCustomer = round(($price_of_product - $priceDiscountVIPCustomer) / 1000) * 1000;
    $price_encourage = common::convertIntToFormatMoney($priceVIPCustomer);
    $price_saleoff = common::convertIntToFormatMoney($price_of_product - $priceVIPCustomer);
    $levelOfCustomer = $Product->levelOfCustomer($_SESSION['username']);

    if ($price_encourage == 0 || $price_encourage == "") {
        $price_encourage = "Liên hệ";
        $hidden = 'hidden = "hidden"';
        $disCountVIPCustomer = 0;
    } else {
        $price_encourage .= " VNĐ";
    }

    if ($product_detail['products_price'] == 0 || $product_detail['products_price'] == "") {
        $product_detail['products_price'] = "Liên hệ";
        $hidden = 'hidden = "hidden"';
        $disCountVIPCustomer = 0;
    } else {
        $product_detail['products_price'] .= " VNĐ";
    }

    if ($levelOfCustomer != 'normal' && $levelOfCustomer != 'Normal') {
        $khuyenmai = '<div class="col-xs-6" style = "color:#f24d23; font-size: 18px; padding:0px">
                            Giá khuyến mãi (' . $levelOfCustomer . ')</div>
                <div class="col-xs-6" style="color: #ED1B24; font-size:18px; padding:0px">' . $price_encourage . '</div>
                <div class="col-xs-6" style="padding:0px; clear:both">Giá sản phẩm</div>
                <div class="col-xs-6" style="text-decoration: line-through; padding:0px">' . $product_detail['products_price'] . '</div>
                <div class="col-xs-6" style="padding:0px">Tiết kiệm </div>' .
                '<div class="col-xs-6" style="padding:0px">' . $disCountVIPCustomer . '%</div>';
    }
    // Get price for SEO
    $price_java_script = $price_encourage;
} else if (!empty($product_detail['product_encourage']) && empty($product_detail['p_type'])) {
    $price_encourage = (int) str_replace(".", "", $product_detail['product_encourage']);
    $price_of_product = (int) str_replace(".", "", $product_detail['products_price']);
    $priceDiscountVIPCustomer = ($price_of_product * $disCountVIPCustomer) / 100;
    $priceVIPCustomer = $price_of_product - $priceDiscountVIPCustomer;
    if ($price_encourage > $priceVIPCustomer) {
        $priceVIPCustomer = round($priceVIPCustomer / 1000) * 1000;
        $price_encourage = common::convertIntToFormatMoney($priceVIPCustomer);
        $produce_discount = $disCountVIPCustomer . "%";
    } else {
        $price_encourage = common::convertIntToFormatMoney($price_encourage);
        $produce_discount = getpercent($product_detail['products_price'], $price_encourage);
    }

    $produce_save = discountMoney($product_detail['products_price'], $price_encourage);
    $levelOfCustomer = $Product->levelOfCustomer($_SESSION['username']);

    if ($price_encourage == 0 || $price_encourage == "") {
        $price_encourage = "Liên hệ";
        $hidden = 'hidden = "hidden"';
        $disCountVIPCustomer = 0;
    } else {
        $price_encourage .= " VNĐ";
    }

    if ($product_detail['products_price'] == 0 || $product_detail['products_price'] == "") {
        $product_detail['products_price'] = "Liên hệ";
        $hidden = 'hidden = "hidden"';
        $disCountVIPCustomer = 0;
    } else {
        $product_detail['products_price'] .= " VNĐ";
    }

    if ($levelOfCustomer != 'normal' && $levelOfCustomer != 'Normal' && !empty($levelOfCustomer)) {
        $khuyenmai = '<div class="col-xs-6" style = "color:#f24d23; font-size: 18px; padding:0px">
                            Giá khuyến mãi <span>(' . $levelOfCustomer . ')</span></div>
            <div class="col-xs-6" style="color:#f24d23; font-size:18px; padding:0px">' . $price_encourage . '</div>
            <div class="col-xs-6" style="padding:0px; clear:both">Giá sản phẩm</div>
            <div class="promotion col-xs-6" style="text-decoration: line-through; padding:0px">'
                . $product_detail['products_price'] . '</div>
            <div class="col-xs-6" style="padding:0px">Tiết kiệm</div>
            <div class="promotion col-xs-6" style="padding:0px">' . $produce_discount . '</div>';
    } else {
        $khuyenmai = '<div class="col-xs-6" style="color:#f24d23; font-size: 18px; padding:0px">Giá khuyến mãi </div>
            <div class="col-xs-6" style="color:#f24d23; font-size:18px; padding:0px">' . $price_encourage . '</div>
            <div class="col-xs-6" style="padding:0px"> Giá sản phẩm </div>
            <div class="col-xs-6" style="text-decoration: line-through; padding:0px">' . $product_detail['products_price'] . '</div>
            <div class="col-xs-6" style="padding:0px">Tiết kiệm</div>
            <div class="col-xs-6" style="padding:0px">' . $produce_discount . '</div>';
    }
    // Get price for SEO 
    $price_java_script = $price_encourage;
} else {
    if ($product_detail['products_price'] == 0 || $product_detail['products_price'] == "") {
        $product_detail['products_price'] = "Liên hệ";
        $hidden = 'hidden = "hidden"';
        $disCountVIPCustomer = 0;
    } else {
        $product_detail['products_price'] .= " VNĐ";
    }

    $khuyenmai = '<div class="col-xs-6" style="font-size: 18px; color:#f24d23; padding:0px">Giá sản phẩm</div>
                    <div class="col-xs-6" style="font-size: 18px; color:#f24d23; padding:0px">' . $product_detail['products_price'] . '</div>';
    // Get price for SEO
    $price_java_script = $product_detail['products_price'];
}

if ($product_detail['products_id'] > 0) {
    $imgs = $Product->getProductImagessByProductId($product_detail['products_id']);
    $k = count($imgs);
    $tpl_imgs = '';
    for ($p = 0; $p < $k; ++$p) {
        $tpl_imgs .= '<a href="' . $linkS . 'upload/product_detail/'
                . $imgs[$p]['image_path']
                . '" class="cloud-zoom-gallery" title="Red" rel="useZoom: \'zoom1\', smallImage: \''
                . $linkS . 'upload/product_detail/image.php?file='
                . $imgs[$p]['image_path'] . '&sizex=200\' "><img  src="'
                . $linkS . 'upload/product_detail/image.php?file='
                . $imgs[$p]['image_path'] . '&sizex=40&sizey=50" /></a>';
    }
    if ($k > 0) {
        $tpl_imgs = '<a href="' . $linkS . 'upload/product/thumb/'
                . $product_detail['products_image'] . '" class="cloud-zoom-gallery" title="Red" rel="useZoom: \'zoom1\', smallImage: \''
                . $linkS . 'upload/product/thumb/image.php?file='
                . $product_detail['products_image'] . '&sizex=200\' "><img  src="'
                . $linkS . 'upload/product/thumb/image.php?file='
                . $product_detail['products_image'] . '&sizex=40&sizey=50" /></a>'
                . $tpl_imgs;
    }
}

$category_key = input($_GET['category_key']);
$product_name_prev = $Product->getProductsInfoPrevByProductKey($product_key, $breadcrumbs[0]['key']);
$product_name_next = $Product->getProductsInfoNextByProductKey($product_key, $breadcrumbs[0]['key']);
$pro_price_nodot = common::convertFormatMoneyToInt($price_encourage);
$species = $product_detail['species'];
$img_catdog = '';
if ($species == '10') {
    $img_catdog = '<img src="{linkS}layout/images/animal_dog.png"/>';
}

if ($species == '01') {
    $img_catdog = '<img src="{linkS}layout/images/animal_cat.png"/>';
}

if ($species == '11') {
    $img_catdog = '<img src="{linkS}layout/images/animal_couple.png"/>';
}

//Favorite
$ua_thich = '';
if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
    $ua_thich = 'Thêm vào ưa thích';
}

$rate = $Product->calculationAvgRate($product_detail['products_id']);
$result_sum_count = $Product->calculationRate($product_detail['products_id']);
if ($result_sum_count[0]['sum'] == "") {
    $rate_sum = 0;
} else {
    $rate_sum = $result_sum_count[0]['sum'];
}

if ($result_sum_count[0]['total'] == "") {
    $rate_count = 0;
} else {
    $rate_count = $result_sum_count[0]['total'];
}

$rate_round = ceil($rate);
if ($rate_round > 0) {
    for ($j = 0; $j < $rate_round; $j++) {
        $listrate .= "<img src='" . $linkS . "layout/images/star.png' />";
    }
} else if ($rate == 0) {
    $listrate = '<span style="font-size: 14px; color: black">Chưa có đánh giá</span>';
}

$product_status = $product_detail['status'];
$product_status_name = '';
if ($product_status == 'Co Hang') {
    $product_status_name = 'Còn Hàng';
} else if ($product_status == 'Tam Thoi Het Hang') {
    $product_status_name = 'Hết Hàng';
    $hidden = 'hidden = "hidden"';
} else if ($product_status == 'Sap Co Hang') {
    $product_status_name = 'Sắp Có Hàng';
    $hidden = 'hidden = "hidden"';
} else if ($product_status == 'Dat Hang Truoc') {
    $product_status_name = 'Đặt Trước';
    $hidden = 'hidden = "hidden"';
} else {
    $product_status_name = 'Còn Hàng';
}

if (empty($product_detail['product_detail']) && empty($product_detail['product_detail_tacdung']) && empty($product_detail['product_detail_phuhopcho']) && empty($product_detail['product_detail_nguyenlieu_thanhphan']) && empty($product_detail['product_detail_phantichdambao']) && empty($product_detail['product_detail_huongdansudung']) && empty($product_detail['product_detail_huongdanbaoquan']) && empty($product_detail['product_detail_luuy']) && empty($product_detail['product_detail_khuyenkhich']) && empty($product_detail['product_detail_donggoi_thetich']) && empty($product_detail['product_detail_nhasanxuat']) && empty($product_detail['product_detail_xuatxu'])) {
    $product_detail['product_detail'] = "Chưa có thông tin chi tiết về sản phẩm "
            . $product_detail['products_name'];
}

$facebook_comment = '<table>
                            <tr>
                                <td>
                                    <span style="font-family:RobotoSlabRegular; 
                                                 font-size: 14px;                                                                                                  
                                                 float:left;">
                                        Đánh giá sản phẩm :&nbsp;&nbsp;                                        
                                    </span>                                    
                                </td>
                                <td>
                                    <div id="jqxRating" style="float:left; padding-top: 5px"/> 
                                </td>
                            </tr>
                        </table>    
                        <div style="padding-top:5px">                                                                      
                            <span style="font-family:RobotoSlabRegular;
                                        font-size:14px;                                                                                                
                                        width: 100%;">
                                Hãy cho ý kiến về sản phẩm
                            </span>	                                    
                        </div>							                                
                        <div class="fb-comments"
                                data-href="{linkSf}{link_san-pham}"
                                data-numposts="3"
                                data-width ="100%"
                                style="margin-left: -10px">
                        </div>';
$category_key = $_GET['category_key'];
$display_product_detail = "block";
$display_product_detail_tacdung = "block";
$display_product_detail_phuhopcho = "block";
$display_product_detail_nguyenlieu_thanhphan = "block";
$display_product_detail_phantichdambao = "block";
$display_product_detail_huongdansudung = "block";
$display_product_detail_huongdanbaoquan = "block";
$display_product_detail_luuy = "block";
$display_product_detail_khuyenkhich = "block";
$display_product_detail_donggoi_thetich = "block";
$display_product_detail_nhasanxuat = "block";
$display_product_detail_xuatxu = "block";

if (empty($product_detail['product_detail'])) {
    $display_product_detail = "none";
}
if (empty($product_detail['product_detail_tacdung'])) {
    $display_product_detail_tacdung = "none";
}
if (empty($product_detail['product_detail_phuhopcho'])) {
    $display_product_detail_phuhopcho = "none";
}
if (empty($product_detail['product_detail_nguyenlieu_thanhphan'])) {
    $display_product_detail_nguyenlieu_thanhphan = "none";
}
if (empty($product_detail['product_detail_phantichdambao'])) {
    $display_product_detail_phantichdambao = "none";
}
if (empty($product_detail['product_detail_huongdansudung'])) {
    $display_product_detail_huongdansudung = "none";
}
if (empty($product_detail['product_detail_huongdanbaoquan'])) {
    $display_product_detail_huongdanbaoquan = "none";
}
if (empty($product_detail['product_detail_luuy'])) {
    $display_product_detail_luuy = "none";
}
if (empty($product_detail['product_detail_khuyenkhich'])) {
    $display_product_detail_khuyenkhich = "none";
}
if (empty($product_detail['product_detail_donggoi_thetich'])) {
    $display_product_detail_donggoi_thetich = "none";
}
if (empty($product_detail['product_detail_nhasanxuat'])) {
    $display_product_detail_nhasanxuat = "none";
}
if (empty($product_detail['product_detail_xuatxu'])) {
    $display_product_detail_xuatxu = "none";
}

// Get relationship news
$list_news = $news->getNewsOfProduct($product_key);
$relation_news = "";
$display_realtion_news = 'style="display:none"';

if (!empty($list_news)) {
    $display_realtion_news = 'style="display:block; padding-bottom:45px"';
    for ($i = 0; $i < count($list_news); $i++) {
        $relation_news .= '<td style="padding-right: 42px">'
                . '<table>'
                . '<tr><td>'
                . '<a class = "news_name" href="{linkS}doi-song-pets/'
                . $list_news[$i]['news_key'] . '.htm" style = "color:#929292;">'
                . '<img src="{linkS}upload/news/' . $list_news[$i]['news_image'] . '"'
                . 'alt="{news_name}" style="width:180px;height:180px; cursor:pointer; border-radius: 10px">'
                . '</a></td></tr>'
                . '<tr><td>'
                . '<a class = "news_name" href="{linkS}doi-song-pets/' . $list_news[$i]['news_key'] . '.htm" 
                                                             style = "color:#929292;">'
                . '<div class="product_main_title" style="width: 180px; text-align: center; margin-top: 15px">'
                . $list_news[$i]['news_name'] . '</a></div>'
                . '</td></tr>'
                . '</table>'
                . '</td>';
    }
}

// begin relationship products
$products_t = $Product->getProductsByCategoryKey($_GET['category_key']);
$products = $Product->getProductsByCategoryKeyLimitOrderBy($products_t, $category_key
        , 0, 10, $_SESSION['order_by']);
$products_support = array_slice($products, 0, 4);
showRelationProducts($productdetail, $products_support, $disCountVIPCustomer, 'PRODUCTS_SUPPORT', 4, "padding:0px");
showRelationProducts($productdetail, $products_support, $disCountVIPCustomer, 'MOBILE_PRODUCTS_SUPPORT', 2, "padding:0px");
showRelationProducts($productdetail, $products_support, $disCountVIPCustomer, 'TABLET_PRODUCTS_SUPPORT', 4, "padding:0px");

showRelationProducts($productdetail, $products, $disCountVIPCustomer, 'PRODUCTS', 5);
showRelationProducts($productdetail, $products, $disCountVIPCustomer, 'MOBILE_PRODUCTS', 2, "padding:0px");
showRelationProducts($productdetail, $products, $disCountVIPCustomer, 'TABLET_PRODUCTS', 4, "padding:0px");
// end relationship products
// meta description
// remove all tags in text
$description = addslashes(strip_tags($product_detail['product_detail']));
$description = trim(preg_replace("/\r|\n/", "", $description));
$description = preg_replace("/[\t\s]+/", " ", $description);

if (empty($product_detail['manufacturer'])) {
    $product_detail['manufacturer'] = "Đang cập nhật";
}

if (empty($product_detail['origin'])) {
    $product_detail['origin'] = "Đang cập nhật";
}

// script for SEO
$price_java_script = str_replace(" VNĐ", "", $price_java_script);
$price_java_script = str_replace("Liên hệ", "", $price_java_script);
$script_product_detail = '<script type="application/ld+json"> {
        "@context": "http://schema.org/",
        "@type": "Product",
        "name": "' . $product_detail["products_name"] . '",
        "image": "{linkS}upload/product/' . $product_detail["products_image"] . '",
        "description": "' . $description . '", "brand": {
        "@type": "Thing",
        "name": "' . $product_detail["manufacturer"] . '" },
        "aggregateRating": { "@type": "AggregateRating", "ratingValue": "4.4", "reviewCount": "89"
        }, "offers": {
        "@type": "Offer",
        "priceCurrency": "VND",
        "price": "' . $price_java_script . '",
        "itemCondition": "http://schema.org/UsedCondition", "availability": "http://schema.org/InStock",
        "seller": {
        "@type": "Organization", "name": "NanaPet"
        } }
        } </script>';

// Add brand product
$brand_product = GetOneRow("adver_id, short_description"
        , "ads"
        , "adver_webname ='" . $product_detail['manufacturer'] . "'");
$brand_short_description = $brand_product['short_description'];
if (empty($brand_short_description)) {
    $display_brand_short_description = "none";
} else {
    $display_brand_short_description = "block";
}

$link_brand_product = "";
if (!empty($brand_product['adver_id'])) {
    $link_brand_product = "{linkS}thuong-hieu/" . $brand_product['adver_id'];
}
// End brand product


$productdetail = $xtemplate->replace($productdetail, array(
    'form_comment' => $facebook_comment,
    'link_san-pham' => $category_key . "/" . $product_detail['products_key'] . ".htm",
    'khuyenmai' => $khuyenmai,
    'product_name' => $product_detail['products_name'],
    'product_image' => $product_detail['products_image'],
    'product_detail' => $product_detail['product_detail'],
    'product_detail_tacdung' => $product_detail['product_detail_tacdung'],
    'product_detail_phuhopcho' => $product_detail['product_detail_phuhopcho'],
    'product_detail_nguyenlieu_thanhphan' => $product_detail['product_detail_nguyenlieu_thanhphan'],
    'product_detail_phantichdambao' => $product_detail['product_detail_phantichdambao'],
    'product_detail_huongdansudung' => $product_detail['product_detail_huongdansudung'],
    'product_detail_huongdanbaoquan' => $product_detail['product_detail_huongdanbaoquan'],
    'product_detail_luuy' => $product_detail['product_detail_luuy'],
    'product_detail_khuyenkhich' => $product_detail['product_detail_khuyenkhich'],
    'product_detail_donggoi_thetich' => $product_detail['product_detail_donggoi_thetich'],
    'product_detail_nhasanxuat' => $product_detail['product_detail_nhasanxuat'],
    'product_detail_xuatxu' => $product_detail['product_detail_xuatxu'],
    'display_product_detail' => $display_product_detail,
    'display_product_detail_tacdung' => $display_product_detail_tacdung,
    'display_product_detail_phuhopcho' => $display_product_detail_phuhopcho,
    'display_product_detail_nguyenlieu_thanhphan' => $display_product_detail_nguyenlieu_thanhphan,
    'display_product_detail_phantichdambao' => $display_product_detail_phantichdambao,
    'display_product_detail_huongdansudung' => $display_product_detail_huongdansudung,
    'display_product_detail_huongdanbaoquan' => $display_product_detail_huongdanbaoquan,
    'display_product_detail_luuy' => $display_product_detail_luuy,
    'display_product_detail_khuyenkhich' => $display_product_detail_khuyenkhich,
    'display_product_detail_donggoi_thetich' => $display_product_detail_donggoi_thetich,
    'display_product_detail_nhasanxuat' => $display_product_detail_nhasanxuat,
    'display_product_detail_xuatxu' => $display_product_detail_xuatxu,
    'product_price' => $price_encourage,
    'product_save' => discountMoney(($product_detail['products_price']), ($price_encourage)),
    'product_discount' => getpercent(($product_detail['products_price']), ($price_encourage)),
    'product_color' => $colorTemplate,
    'product_type' => $typeTemplate,
    'p_unit' => $product_detail['p_unit'],
    'product_key' => $product_detail['products_key'],
    'rate_data' => $product_detail['products_id'],
    'category' => $category_c,
    'nsx' => $product_detail['manufacturer'],
    'total_amount' => $pro_price_nodot,
    'product_price_nodot' => $pro_price_nodot,
    'product_quantity' => '1',
    'count_rates' => $listrate,
    'list_img_product' => $tpl_imgs,
    'product_name_prev' => $pre_name,
    'product_name_next' => $next_name,
    'img_catdog' => $img_catdog,
    'email' => $_SESSION['username'],
    'them_vao_ua_thich' => $ua_thich,
    'user' => $_SESSION['username'],
    'id_product' => $product_detail['products_id'],
    'xuatxu' => $product_detail['origin'],
    'linknsx' => $link_brand_product,
    'status' => $product_status_name,
    'hidden' => $hidden,
    'user_name' => $user_name,
    'rate_sum' => $rate_sum,
    'rate_count' => $rate_count,
    'category' => $category,
    'relation_news' => $relation_news,
    'display_realtion_news' => $display_realtion_news,
    'display_brand_short_description' => $display_brand_short_description,
    'brand_short_description' => $brand_short_description,
    'breadcrumbs_path_mobile' => $breadcrumbs_path_mobile
        ));
$content = $productdetail;
?>