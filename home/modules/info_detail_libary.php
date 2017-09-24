<?php

//function checkDisclamer($array_temp) {
//    // Load category Disclaimer
//    $list_disclaimer = array(60, 61, 62, 63, 64, 67, 68, 70, 71, 73, 74, 75);
//    for ($i = 1; $i < count($array_temp) - 1; $i++) {
//        if (in_array($array_temp[$i], $list_disclaimer)) {
//            return true;
//        }
//    }
//}

$news_key = input($_GET['news_key']);
$info = '';
$cate = input($_GET['cate']);
$news = new News();
$info = $xtemplate->load('info_detail_libary_bootstrap');
$promotionNews = $news->getDetailNews($news_key);
for ($i = 1; $i < 100; $i++) {
    if ($i < 10) {
        $promotionNews['news_content'] = str_replace('begin' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $promotionNews['news_content']);
        $promotionNews['news_content'] = str_replace('end' . $i, '</A>', $promotionNews['news_content']);
        $promotionNews['news_content'] = str_replace('beginreference' . $i, '<A name="section' . $i . '"style="color:#000">', $promotionNews['news_content']);
        $promotionNews['news_content'] = str_replace('endreference' . $i, '</A>', $promotionNews['news_content']);
    } else {
        $promotionNews['news_content'] = str_replace('begin0' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $promotionNews['news_content']);
        $promotionNews['news_content'] = str_replace('end0' . $i, '</A>', $promotionNews['news_content']);
        $promotionNews['news_content'] = str_replace('beginreference0' . $i, '<A name="section' . $i . '"style="color:#000">', $promotionNews['news_content']);
        $promotionNews['news_content'] = str_replace('endreference0' . $i, '</A>', $promotionNews['news_content']);
    }
}

//Thay cho toppage
$promotionNews['news_content'] = str_replace('toppage', '<A href="#section0" style="font-family:RobotoSlabRegular; color: #337ab7"> '
        . 'Về đầu trang </A>', $promotionNews['news_content']);
$promotionNews['resource'] = str_replace('beginnanapet', '<a href = "', $promotionNews['resource']);
$promotionNews['resource'] = str_replace('referencenanapet', '" target="_blank">', $promotionNews['resource']);
$promotionNews['resource'] = str_replace('endnanapet', '</a>', $promotionNews['resource']);

// Update for $title_page and meta
$title_page = $promotionNews['title_page'];
$description = $promotionNews['meta_description'];
$keywords = $promotionNews['meta_keyword'];
$array_date = split("-", $promotionNews['date_publisher']);

//Change font
$promotionNews['resource'] = str_replace('Arial', 'RobotoSlabLight', $promotionNews['resource']);

//Change size
$promotionNews['resource'] = str_replace('size="3"', 'style="font-size:15"', $promotionNews['resource']);
$promotionNews['resource'] = str_replace('size="2"', 'style="font-size:15px"', $promotionNews['resource']);
$promotionNews['news_content'] = str_replace('Arial', 'RobotoSlabLight', $promotionNews['news_content']);

//Change line height
$promotionNews['news_content'] = str_replace('size="2"', "", $promotionNews['news_content']);
$promotionNews['news_content'] = str_replace('size="3"', "", $promotionNews['news_content']);
$promotionNews['news_content'] = str_replace('line-height:1.5', 'line-height:2.0', $promotionNews['news_content']);
$promotionNews['news_content'] = str_replace('line-height: 1.5', 'line-height:2.0', $promotionNews['news_content']);
$promotionNews['news_content'] = str_replace('line-height:1.15', 'line-height:2.0', $promotionNews['news_content']);
$promotionNews['news_content'] = str_replace('line-height: 150%', 'line-height:2.0', $promotionNews['news_content']);
$promotionNews['news_content'] = str_replace('line-height:150%', 'line-height:2.0', $promotionNews['news_content']);
$promotionNews['news_content'] = str_replace('line-height: 18px', 'line-height:2.0', $promotionNews['news_content']);

// Get relation products
//$display_realtion_product = 'style="display:none"';
//$list_products = $news->getProductOfNews($news_key);
//$relation_product = "";
//$relation_product_2 = "";
//$category = new Category();
//if (!empty($list_products)) {
//    $display_realtion_product = 'style="display:block"';
//    for ($i = 0; $i < 5; $i++) {
//        $category_product = $category->getCategoryKeyByProductID($list_products[$i]['products_id']);
//        if (!empty($category_product)) {
//            $relation_product .=
//                    '<td style="padding-right: 30px">'
//                    . '<table>'
//                    . '<tr><td>'
//                    . '<a class = "product_name" href="{linkS}' . $category_product . '/' . $list_products[$i]['products_key'] . '.htm" 
//                                       style = "color:#929292;">'
//                    . '<img src="{linkS}upload/product/thumb/' . $list_products[$i]['products_image'] . '"'
//                    . 'alt="{product_name}" style="width:140px;height:140px; cursor:pointer">'
//                    . '</a></td></tr>'
//                    . '<tr><td>'
//                    . '<a class = "product_name" href="{linkS}' . $category_product . '/' . $list_products[$i]['products_key'] . '.htm" 
//                                       style = "color:#929292;">'
//                    . '<div class="product_main_title" style="width: 140px; text-align: center">' . $list_products[$i]['products_name'] . '</a></div>'
//                    . '</td></tr>'
//                    . '</table>'
//                    . '</td>';
//        }
//    }
//    for ($i = 5; $i < 10; $i++) {
//        $category_product = $category->getCategoryKeyByProductID($list_products[$i]['products_id']);
//        if (!empty($category_product)) {
//            $relation_product_2 .=
//                    '<td style="padding-right: 30px; padding-top: 60px; padding-bottom: 20px">'
//                    . '<table>'
//                    . '<tr><td>'
//                    . '<a class = "product_name" href="{linkS}' . $category_product . '/' . $list_products[$i]['products_key'] . '.htm" 
//                                           style = "color:#929292;">'
//                    . '<img src="{linkS}upload/product/thumb/' . $list_products[$i]['products_image'] . '"'
//                    . 'alt="{product_name}" style="width:140px;height:140px; cursor:pointer">'
//                    . '</a></td></tr>'
//                    . '<tr><td>'
//                    . '<a class = "product_name" href="{linkS}' . $category_product . '/' . $list_products[$i]['products_key'] . '.htm" 
//                                           style = "color:#929292;">'
//                    . '<div class="product_main_title" style="width: 140px; text-align: center">' . $list_products[$i]['products_name'] . '</a></div>'
//                    . '</td></tr>'
//                    . '</table>'
//                    . '</td>';
//        }
//    }
//}

// List all category of news detail
$array_temp = explode(',', $promotionNews['upgrade_news_catalogue']);

// Load relation read news
$relationNews = $news->getListNewsByCategory($array_temp[1], 0, 5, "ASC", $news_key);
$n = count($relationNews);
$tpl = '';
$block = $xtemplate->get_block_from_str($info, 'NEWSCATEGORY');
for ($i = 0; $i < $n; ++$i) {
    $tpl.= $xtemplate->assign_vars($block, array(
        'news_image' => $relationNews[$i]['news_image'],
        'news_name' => $relationNews[$i]['news_name'],
        'news_key' => $relationNews[$i]['news_key']
    ));
}
$info = $xtemplate->assign_blocks_content($info, array(
    'NEWSCATEGORY' => $tpl
        ));

// Load relation CHUYEN MUC news 
$relationNews = $news->getListNewsByCategory($array_temp[1], 0, 5, "DESC", $news_key);
$n = count($relationNews);
$tpl = '';
$block = $xtemplate->get_block_from_str($info, 'NEWSCHUYENMUC');
for ($i = 0; $i < $n; ++$i) {
    $tpl.= $xtemplate->assign_vars($block, array(
        'news_name' => $relationNews[$i]['news_name'],
        'news_key' => $relationNews[$i]['news_key']
    ));
}
$info = $xtemplate->assign_blocks_content($info, array(
    'NEWSCHUYENMUC' => $tpl
        ));

// Load relation LASTEST news
$relationNews = $news->getLastestNews(1, 5);
$n = count($relationNews);
$tpl = '';
$block = $xtemplate->get_block_from_str($info, 'LASTETSNEWS');
for ($i = 0; $i < $n; ++$i) {
    $tpl.= $xtemplate->assign_vars($block, array(
        'news_name' => $relationNews[$i]['news_name'],
        'news_key' => $relationNews[$i]['news_key']
    ));
}
$info = $xtemplate->assign_blocks_content($info, array(
    'LASTETSNEWS' => $tpl
        ));

$info_author = $news->getInfoAuthor($promotionNews['translator']);
if (empty($info_author['avarta'])) {
    $info_author['avarta'] = "default_author.png";
}
if (empty($info_author['name'])) {
    $info_author['name'] = $promotionNews['translator'];
}
if (empty($info_author['short_content'])) {
    $info_author['short_content'] = "";
}
$list_news_relation = $news->getListNewsByAuthor($info_author['user_name_visible'], $promotionNews['news_name']);
$display_1 = "";
$display_2 = "";
$display_3 = "";
$display_4 = "";
$display_5 = "";
if (empty($list_news_relation[0]['news_name'])) {
    $display_1 = "style='display:none'";
}
if (empty($list_news_relation[1]['news_name'])) {
    $display_2 = "style='display:none'";
}
if (empty($list_news_relation[2]['news_name'])) {
    $display_3 = "style='display:none'";
}
if (empty($list_news_relation[3]['news_name'])) {
    $display_4 = "style='display:none'";
}
if (empty($list_news_relation[4]['news_name'])) {
    $display_5 = "style='display:none'";
}

$more = "...";
if (empty(trim($info_author['short_content']))) {
    $more = "";
}

// Get chuyen muc
$array_temp[0] = 0;
$array_temp[count($array_temp) - 1] = 0;
$array_category = implode(',', $array_temp);
$info_category_news = $news->getInfoCategoryNews($array_category);
$chuyen_muc = "";
for ($i = 0; $i < count($info_category_news); $i++) {
    if ($i != count($info_category_news) - 1) {
        $chuyen_muc .= $info_category_news[$i]['categorieslibary_name'] . ", ";
    } else {
        $chuyen_muc .= $info_category_news[$i]['categorieslibary_name'];
    }
}

$disclaimer = "";
$display_disclaimer = "display:none";
$display_resource = "";
//if (checkDisclamer($array_temp) == true) {
//    $display_disclaimer = "";
//    $display_resource = "display:none";
//    $disclaimer = "NanaPet là trang thương mại điện tử chuyên cung cấp thức ăn và những
//                        sản phẩm liên quan cho chó mèo. Thông tin trên bài viết này là thông
//                        tin chung, mang tính chất tham khảo hoặc từ quan điểm của những chủ
//                        nuôi giàu kinh nghiệm. Do đó, không thể thay thế vai trò của bác sĩ
//                        thú ý trong từng trường hợp bệnh. Khi thú cưng bị bệnh hoặc gặp vấn đề
//                        sức khỏe, hãy mang bé đến bệnh viện thú y để được hỗ trợ tốt nhất.";
//}

$info = $xtemplate->replace($info, array(
    'disclaimer' => $disclaimer,
    'display_disclaimer' => $display_disclaimer,
    'display_resource' => $display_resource,
    'news_name' => $promotionNews['news_name'],
    'news_content' => $promotionNews['news_content'],
    'news_shortcontent' => $promotionNews['news_shortcontent'],
    'news_key' => "doi-song-pets/" . $promotionNews['news_key'],
    'news_name_twitter' => $promotionNews['news_name'] . " - ",
    'linkResource' => $promotionNews['resource'],
    'author' => $promotionNews['author'],
    'translator' => $promotionNews['translator'],
    'date_added' => "Ngày " . $array_date[2] . ", Tháng " . $array_date[1] . ", Năm " . $array_date[0],
    'category' => $category_libary,
//    'relation_product' => $relation_product,
//    'relation_product_2' => $relation_product_2,
//    'display_realtion_product' => $display_realtion_product,
    'avata' => $info_author['avarta'],
    'name' => $info_author['name'],
    'short_content' => common::limitContent($info_author['short_content'], 200) . $more,
    'idadmin' => $info_author['idadmin_control_user'],
    'relation_news_1' => $list_news_relation[0]['news_name'],
    'relation_news_key_1' => $list_news_relation[0]['news_key'],
    'relation_news_2' => $list_news_relation[1]['news_name'],
    'relation_news_key_2' => $list_news_relation[1]['news_key'],
    'relation_news_3' => $list_news_relation[2]['news_name'],
    'relation_news_key_3' => $list_news_relation[2]['news_key'],
    'relation_news_4' => $list_news_relation[3]['news_name'],
    'relation_news_key_4' => $list_news_relation[3]['news_key'],
    'relation_news_5' => $list_news_relation[4]['news_name'],
    'relation_news_key_5' => $list_news_relation[4]['news_key'],
    'display_1' => $display_1,
    'display_2' => $display_2,
    'display_3' => $display_3,
    'display_4' => $display_4,
    'display_5' => $display_5,
    'chuyen_muc' => $chuyen_muc,
    'facebook_news_image' => $promotionNews['news_image']
));
$library_active = 'library_active';
$bread = "Blog";
$link = "{linkS}doi-song-pets";
$breadcrumbs_path = '<a href="{linkS}">'.$pageName.'</a>';
if ($news_key != '') {
    $breadcrumbs_path .= ' &raquo; <a href="' . $link . '">' . $bread . '</a>' . '&nbsp;&raquo;&nbsp;' . $promotionNews['news_name'];
} else {
    $breadcrumbs_path .= ' &raquo; ' . $bread;
}
$content = $info;
?>