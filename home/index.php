<?php

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title_page = '1001 chuyện nuôi thú cưng';
$description = 'chuyện nuôi thú cưng';
$keywords = 'chuyện nuôi thú cưng';
$link_product_navigation = "";

include('home_start.php');
include('process/loadModel.php');
include('process/process_frame.php');
$html = $xtemplate->load('layout_bootstrap');
$chatlive = "";

$giohang = '{cart_right}';
$hidden = "";
$hiddenbannerleft = 'style="display: none;"';
$main_banner = '';

if (!empty($banner)) {
    $main_banner .= '<div><a href="' . $href_banner . '">'
            . '<img src="{linkS}layout/images/logo/banner/' . $banner . '"/></a></div>';
}
if (!empty($banner_2)) {
    $main_banner .= '<div><a href="' . $href_banner_2 . '">'
            . '<img src="{linkS}layout/images/logo/banner/' . $banner_2 . '"/></a></div>';
}
if (!empty($banner_3)) {
    $main_banner .= '<div><a href="' . $href_banner_3 . '">'
            . '<img src="{linkS}layout/images/logo/banner/' . $banner_3 . '"/></a></div>';
}
if (!empty($banner_4)) {
    $main_banner .= '<div><a href="' . $href_banner_4 . '">'
            . '<img src="{linkS}layout/images/logo/banner/' . $banner_4 . '"/></a></div>';
}
if (!empty($banner_5)) {
    $main_banner .= '<div><a href="' . $href_banner_5 . '">'
            . '<img src="{linkS}layout/images/logo/banner/' . $banner_5 . '"/></a></div>';
}

$left_banner_1 = '';
if (!empty($banner_left_1_1)) {
    $left_banner_1 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_1/' . $banner_left_1_1 . '"/>'
            . '</a>';
}

if (!empty($banner_left_1_2)) {
    $left_banner_1 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_1/' . $banner_left_1_2 . '"/>'
            . '</a>';
}

if (!empty($banner_left_1_3)) {
    $left_banner_1 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_1/' . $banner_left_1_3 . '"/>'
            . '</a>';
}

if (!empty($banner_left_1_4)) {
    $left_banner_1 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_1/' . $banner_left_1_4 . '"/>'
            . '</a>';
}

if (!empty($banner_left_1_5)) {
    $left_banner_1 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_1/' . $banner_left_1_5 . '"/>'
            . '</a>';
}

$left_banner_2 = '';
if (!empty($banner_left_2_1)) {
    $left_banner_2 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_2/' . $banner_left_2_1 . '"/>'
            . '</a>';
}
if (!empty($banner_left_2_2)) {
    $left_banner_2 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_2/' . $banner_left_2_2 . '"/>'
            . '</a>';
}
if (!empty($banner_left_2_3)) {
    $left_banner_2 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_2/' . $banner_left_2_3 . '"/>'
            . '</a>';
}
if (!empty($banner_left_2_4)) {
    $left_banner_2 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_2/' . $banner_left_2_4 . '"/>'
            . '</a>';
}
if (!empty($banner_left_2_5)) {
    $left_banner_2 .= '<a href="{linkS}">'
            . '<img src="{linkS}layout/images/logo/banner_left_2/' . $banner_left_2_5 . '"/>'
            . '</a>';
}

$left_facebook_box = "<div class='fb-like-box'
                                data-href='https://www.facebook.com/NanaPetOnline'
                                data-width='235'
                                data-height='315'
                                data-colorscheme='light'
                                data-show-faces='true'
                                data-header='true'
                                data-stream='false'
                                data-show-border='true'>
                            </div>";
$left_facebook_page_plugin = "<div class='fb-page' style='margin-top: 20px; margin-left: 10px'
                                        data-href='https://www.facebook.com/NanaPetOnline'
                                        data-small-header='false'
                                        data-adapt-container-width='true'
                                        data-hide-cover='false'
                                        data-show-facepile='true'
                                        data-show-posts='true'>
                                        <div class='fb-xfbml-parse-ignore'>
                                            <blockquote cite='https://www.facebook.com/NanaPetOnline'>
                                                <a href='https://www.facebook.com/NanaPetOnline'>NanaPet</a></blockquote></div>
                                    </div>";
switch ($show) {
    case 'cart-finish':
    case 'cart':
    case 'register':
    case 'login':
        $html = $xtemplate->replace($html, array(
            'chatlive' => "",
        ));
        break;

    case 'info':
        if (isset($_GET['flag']) && $_GET['flag'] == "3") {
            $hidden = 'style="display: none"';
            $category = $category_libary;
            $hiddenbannerleft = "style = 'margin-top:15px'";
        }
        $html = $xtemplate->replace($html, array(
            'hidden' => $hidden,
            'chatlive' => "",
        ));
        break;

    case 'info_detail':
        if (input($_GET['cate']) == 'doisongpets') {
            $hidden = 'style="display: none"';
            $category = $category_libary;
            $hiddenbannerleft = "style = 'margin-top:15px'";
        }

        $html = $xtemplate->replace($html, array(
            'hidden' => $hidden,
            'chatlive' => "",
        ));
        break;

    case 'info_detail_libary':
        if (input($_GET['cate']) == 'doisongpets') {
            $hidden = 'style="display: none"';
            $category = $category_libary;
            $hiddenbannerleft = "style = 'margin-top:15px'";
        }

        $html = $xtemplate->replace($html, array(
            'hidden' => $hidden,
            'chatlive' => "",
        ));
        break;

    default:
        $html = $xtemplate->replace($html, array(
            'chatlive' => $chatlive,
        ));
}

$html = $xtemplate->replace($html, array(
    'category' => !empty($category) ? $category : '',
    'hidden-banner-left' => $hiddenbannerleft,
    'product_typical_left' => $product_typical_left,
    'news_left' => $news_left,
    'content' => $content,
    'breadcrumbs_path' => !empty($breadcrumbs_path) ? $breadcrumbs_path : '',
    'acount' => $acount,
    'title' => $title_page,
    'introduce_nanapet' => $introduce_nanapet,
    'giohang' => $giohang,
    'cart_right' => $cart_right,
    'main_banner' => $main_banner,
    'left_banner_1' => $left_banner_1,
    'left_banner_2' => $left_banner_2,
    'introduce' => $introduce,
    'blog' => $blog,
    'home' => $home,
    'contact' => $contact,
    'logo_web' => $logo_web,
    'description' => $description,
    'keywords' => $keywords,
    'left_facebook_box' => $left_facebook_box,
    'linkSf' => $linkSf,
    'left_facebook_page_plugin' => $left_facebook_page_plugin,
    'script_product_detail' => !empty($script_product_detail) ? $script_product_detail : '',
    'link_product_navigation' => $link_product_navigation,
    'linkS' => $linkS,
    'header' => $header,
    'home_display' => $home_display
    ));
$xtemplate->show($html);
?>