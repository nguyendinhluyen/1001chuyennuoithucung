<?php

$News = new News();
$news_key = '';
if (isset($_GET['news_key'])) {
    $news_key = $_GET['news_key'];
}

if ($news_key == '') {
    $news_key = $News->getFistRowsOfIntroduceByCategory();
} else {
    $news_key = $News->getDetailofIntroduceByCategory($news_key);
}

$news_detail = $News->getDetailNews_Introduce($news_key);
if (empty($news_detail['newsintroduce_content'])) {
    $news_detail['newsintroduce_name'] = "NanaPet";
    $news_detail['newsintroduce_content'] = 'Hiện đang cập nhật ... </br>';
}

// Title page
if (empty($title_page)) {
    if (!empty($news_detail['newsintroduce_name'])) {
        $title_page = $news_detail['newsintroduce_name'];
    } else {
        $title_page = "Giới thiệu";
    }
}

// Description
if (empty($description)) {
    $description = $title_page;
}

// Keywords
if (empty($keywords)) {
    $keywords = $title_page;
}

$breadcrumbs_path = '<a href="{linkS}">'.$pageName.'</a>';
if ($news_key != '') {
    $breadcrumbs_path .= ' &raquo; ' . '<a href="{linkS}gioi-thieu">Giới Thiệu</a>';
    $breadcrumbs_path .= ' &raquo; ' . $news_detail['newsintroduce_name'];
} else {
    $breadcrumbs_path .= ' &raquo; ' . 'Giới thiệu';
}

// Link Reference
for ($i = 1; $i < 100; $i++) {
    if ($i < 10) {
        $news_detail['newsintroduce_content'] = str_replace('begin' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $news_detail['newsintroduce_content']);
        $news_detail['newsintroduce_content'] = str_replace('end' . $i, '</A>', $news_detail['newsintroduce_content']);
        $news_detail['newsintroduce_content'] = str_replace('beginreference' . $i, '<A name="section' . $i . '"style="color:#000">', $news_detail['newsintroduce_content']);
        $news_detail['newsintroduce_content'] = str_replace('endreference' . $i, '</A>', $news_detail['newsintroduce_content']);
    } else {
        $news_detail['newsintroduce_content'] = str_replace('begin0' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $news_detail['newsintroduce_content']);
        $news_detail['newsintroduce_content'] = str_replace('end0' . $i, '</A>', $news_detail['newsintroduce_content']);
        $news_detail['newsintroduce_content'] = str_replace('beginreference0' . $i, '<A name="section' . $i . '"style="color:#000">', $news_detail['newsintroduce_content']);
        $news_detail['newsintroduce_content'] = str_replace('endreference0' . $i, '</A>', $news_detail['newsintroduce_content']);
    }
}

//Thay cho toppage
$news_detail['newsintroduce_content'] = str_replace('toppage', '<A href="#section0" style="text-decoration:underline;">'
        . '<span style="outline:none">Về đầu trang</span> </A>', $news_detail['newsintroduce_content']);
$content = $xtemplate->load('introduce_bootstrap');
$content = $xtemplate->replace($content, array(
    'tieude' => $news_detail['newsintroduce_name'],
    'noidung' => $news_detail['newsintroduce_content'],
    'category' => $category
        ));
?>