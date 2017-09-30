<?php
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

//toppage
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

// Load relation news 
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

$info = $xtemplate->replace($info, array(   
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