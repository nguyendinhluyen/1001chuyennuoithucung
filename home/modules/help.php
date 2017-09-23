<?php

$News = new News();
$news_key = '';
if (isset($_GET['news_key'])) {
    $news_key = $_GET['news_key'];
}
if (empty($news_key)) {
    $news_key = $News->getFistRowsOfHelpByCategory();
} else {
    $news_key = $News->getDetailofHelpByCategory($news_key);
}
$news_detail = $News->getDetailNews($news_key);
if (empty($news_detail['news_content'])) {
    $news_detail['news_name'] = "NanaPet";
    $news_detail['news_content'] = 'Hiện đang cập nhật ... </br>';
}
// title for SEO
if (empty($title_page)) {
    if (!empty($news_detail['news_name'])) {
        $title_page = $news_detail['news_name'];
    } else {
        $title_page = "Hỗ trợ";
    }
}

if (empty($description)) {
    $description = $title_page;
}
if (empty($keywords)) {
    $keywords = $title_page;
}
$breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
if ($news_key != '') {
    $breadcrumbs_path .= ' &raquo; ' . '<a href="{linkS}tro-giup">Hỗ Trợ</a>';
    $breadcrumbs_path .= ' &raquo; ' . $news_detail['news_name'];
} else {
    $breadcrumbs_path .= ' &raquo; ' . 'Hỗ Trợ';
}
//Link reference
for ($i = 1; $i < 100; $i++) {
    if ($i < 10) {
        $news_detail['news_content'] = str_replace('begin' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $news_detail['news_content']);
        $news_detail['news_content'] = str_replace('end' . $i, '</A>', $news_detail['news_content']);
        $news_detail['news_content'] = str_replace('beginreference' . $i, '<A name="section' . $i . '"style="color:#000">', $news_detail['news_content']);
        $news_detail['news_content'] = str_replace('endreference' . $i, '</A>', $news_detail['news_content']);
    } else {
        $news_detail['news_content'] = str_replace('begin0' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $news_detail['news_content']);
        $news_detail['news_content'] = str_replace('end0' . $i, '</A>', $news_detail['news_content']);
        $news_detail['news_content'] = str_replace('beginreference0' . $i, '<A name="section' . $i . '"style="color:#000">', $news_detail['news_content']);
        $news_detail['news_content'] = str_replace('endreference0' . $i, '</A>', $news_detail['news_content']);
    }
}
//toppage
$news_detail['news_content'] = str_replace('toppage', '<A href="#section0" style="outline:none"> '
        . 'Về đầu trang</A>', $news_detail['news_content']);
$content = $xtemplate->load('help_bootstrap');
$content = $xtemplate->replace($content, array(
    'tieude' => $news_detail['news_name'],
    'noidung' => $news_detail['news_content'],
    'category' => $category
        ));
?>