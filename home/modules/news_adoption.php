<?php

$News = new News();

$news_key = '';

if (isset($_GET['news_key'])) {
    $news_key = $_GET['news_key'];
}

if ($news_key == '') {
    $news_key = $News->getFistRowsOfAdoptionByCategory();
} else {
    $news_key = $News->getDetailofAdoptionByCategory($news_key);
}

$news_detail = $News->getDetailNews_Adoption($news_key);

if (empty($news_detail['newsadoption_content'])) {
    $news_detail['newsadoption_content'] = 'Hiện đang cập nhật ... </br>';
}

$breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';

$title_page = 'Giới thiệu';

if ($news_key != '') {
    $breadcrumbs_path .= ' &raquo; ' . '<a href="{linkS}nhan-nuoi-pet">Nhận nuôi pet</a>';

    $breadcrumbs_path .= ' &raquo; ' . $news_detail['newsadoption_name'];
} else {
    $breadcrumbs_path .= ' &raquo; ' . 'Nhận nuôi pet';
}

//LINK REFERENCE

for ($i = 1; $i < 100; $i++) {
    if ($i < 10) {
        $news_detail['newsadoption_content'] = str_replace('begin' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $news_detail['newsadoption_content']);
        $news_detail['newsadoption_content'] = str_replace('end' . $i, '</A>', $news_detail['newsadoption_content']);
        $news_detail['newsadoption_content'] = str_replace('beginreference' . $i, '<A name="section' . $i . '"style="color:#000">', $news_detail['newsadoption_content']);
        $news_detail['newsadoption_content'] = str_replace('endreference' . $i, '</A>', $news_detail['newsadoption_content']);
    } else {
        $news_detail['newsadoption_content'] = str_replace('begin0' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $news_detail['newsadoption_content']);
        $news_detail['newsadoption_content'] = str_replace('end0' . $i, '</A>', $news_detail['newsadoption_content']);
        $news_detail['newsadoption_content'] = str_replace('beginreference0' . $i, '<A name="section' . $i . '"style="color:#000">', $news_detail['newsadoption_content']);
        $news_detail['newsadoption_content'] = str_replace('endreference0' . $i, '</A>', $news_detail['newsadoption_content']);
    }
}

//Thay cho toppage
$news_detail['newsadoption_content'] = str_replace('toppage', '<A href="#section0" style="text-decoration:underline"> <b>Về đầu trang</b> </A>', $news_detail['newsadoption_content']);

//Thay cho dau trang cuoi doan trang	
$news_detail['newsadoption_content'] = $news_detail['newsadoption_content'] . '<A href="#section0" style="text-decoration:underline" ><b>Về đầu trang</b></A>';

$content = $xtemplate->load('help');

$content = $xtemplate->replace($content, array(
    'tieude' => $news_detail['newsadoption_name'],
    'noidung' => $news_detail['newsadoption_content'],
        ));
?>