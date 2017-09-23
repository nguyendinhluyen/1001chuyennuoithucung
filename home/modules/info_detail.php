<?php

$news_key = input($_GET['news_key']);
$info = '';
$cate = input($_GET['cate']);
$news = new News();
$info = $xtemplate->load('info_detail');
$promotionNews = $news->getDetailNews($news_key);

// CHO DUONG LINK REFERENCE		
// Dung cho noi dung
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
$promotionNews['news_content'] = str_replace('toppage', '<A href="#section0" style="text-decoration:underline"> <b>Về đầu trang</b> </A>', $promotionNews['news_content']);

//Thay cho dau trang cuoi doan trang
$promotionNews['news_content'] = $promotionNews['news_content'] . '<br><A href="#section0" style="text-decoration:underline" ><b>Về đầu trang</b></A></br>';
$info = $xtemplate->replace($info, array(
    'news_name' => $promotionNews['news_name'],
    'news_content' => $promotionNews['news_content'],
        ));

switch ($cate) {
    case 'khuyenmai':
        $promotion_active = 'promotion_active';
        $bread = "Khuyến mãi";
        $link = "{linkS}khuyen-mai";
        break;

    case 'thugian':
        $relax_active = 'relax_active';
        $bread = "Thư giãn";
        $link = "{linkS}thu-gian";
        break;

    case 'doisongpets':
        $library_active = 'library_active';
        $bread = "Thư viện";
        $link = "{linkS}doi-song-pets";
        break;
}

$breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
if ($news_key != '') {
    $breadcrumbs_path .= ' &raquo; <a href="' . $link . '">' . $bread . '</a>' . '&raquo; &nbsp;' . $promotionNews['news_name'];
} else {
    $breadcrumbs_path .= ' &raquo; ' . $bread;
}

$content = $info;
?>