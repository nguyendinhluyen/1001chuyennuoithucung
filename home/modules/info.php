<?php

$news = new News();

// Get news
if (!empty($_GET['choose'])) {
    $libaries = $news->getNewsListAllLibaryMainKeyWord($_GET['choose']);
} else if (!empty($_GET['choose2'])) {
    $libaries = $news->getNewsListAllLibaryKeyWord($_GET['choose2']);
} else {
    $libaries = $news->getNewsListAllLibary();
}
$total = count($libaries);

// Navigation
$pp = 10;
$p_now = !empty($_GET['page']) ? intval(input($_GET['page'])) : 0;
$numofpages = $total / $pp;
$page = 0;

if ($p_now <= 0) {
    $page = 1;
} else {
    if ($p_now <= ceil($numofpages)) {
        $page = $p_now;
    } else {
        $page = 1;
    }
}
$limitvalue = $page * $pp - ($pp);
// End navigation

$begin = $limitvalue;
if ($numofpages != $p_now) {
    $end = $begin + $pp;
} else {
    $end = $total;
}
$info = $xtemplate->load('libary_bootstrap');
$block = $xtemplate->get_block_from_str($info, 'PROMOTION');
$tpl = '';
$n = count($libaries);
for ($i = $begin; $i < $end; $i++) {
    if (!empty($libaries[$i]['news_name'])) {
        $info_author = News::getInfoAuthor($libaries[$i]['translator']);
        $idadmin = $info_author["idadmin_control_user"];
        $date_array = split('-', $libaries[$i]['date_publisher']);
        $tpl.= $xtemplate->assign_vars($block, array(
            'news_name' => $libaries[$i]['news_name'],
            'news_short' => $libaries[$i]['news_shortcontent'],
            'news_key' => $libaries[$i]['news_key'],
            'news_image' => $libaries[$i]['news_image'],
            'date' => $date_array[2],
            'month' => $date_array[1],
            'year' => $date_array[0],
            'person_up' => 'Tác giả :&nbsp; <a ref="nofollow" href="{linkS}cong-tac-vien/'
            . $idadmin . '.html/page=0">'
            . '<b style= "font-family:RobotoSlabRegular; text-transform: uppercase; color: #337ab7">'
            . $libaries[$i]['translator'] . '</a>&nbsp;&nbsp;|&nbsp;&nbsp;</b>',
        ));
    }
}
$breadcrumbs_path = '<a href="{linkS}">1001 Chuyện nuôi thú cưng</a>';
$breadcrumbs_path .= ' &raquo; ' . 'BLog';

// Title Page
if (empty($title_page)) {
    if (!empty($category_selected)) {
        $breadcrumbs_path .= ' &raquo; ' . $category_selected;
        if (!isset($p_now) || $p_now === 0 || $p_now === 1) {
            $title_page = $category_selected;
        } else {
            $title_page = $category_selected . " - trang $p_now";
        }
    } else {
        $category_selected = "Blog";
        if (!isset($p_now) || $p_now === 0 || $p_now === 1) {
            $title_page = 'BLog';
        } else {
            $title_page = 'Blog' . " - trang $p_now";
        }
    }
} else {
    if (isset($p_now) && $p_now !== 0 && $p_now !== 1) {
        $title_page .= " - trang $p_now";
    }
}

// Description
if (empty($description)) {
    $description = $title_page;
} else {
    if (isset($p_now) && $p_now != 0 && $p_now != 1) {
        $description .= " - trang $p_now";
    }
}

// Keywords
if (empty($keywords)) {
    $keywords = $title_page;
}

$info = $xtemplate->assign_blocks_content($info, array(
    'PROMOTION' => $tpl
        ));

$info = $xtemplate->replace($info, array(
    'category' => $category_libary,
    'category_selected' => $category_selected,
    'category_mobile' => $category_libary_mobile
        ));

if (!empty($_GET['choose'])) {
    $info = $xtemplate->replace($info, array(
        'page' => str_replace("page=", "trang-", pagination($linkS . "doi-song-pets/" . $_GET['choose'] . '/', ceil($numofpages), $page)),
    ));
} else if (!empty($_GET['choose2'])) {
    $info = $xtemplate->replace($info, array(
        'page' => str_replace("page=", "trang-", pagination($linkS . "doi-song-pets/" . $_GET['choose1'] . '/'
                        . $_GET['choose2'] . '/', ceil($numofpages), $page)),
    ));
} else {
    $info = $xtemplate->replace($info, array(
        'page' => str_replace("page=", "trang-", pagination($linkS . "doi-song-pets/", ceil($numofpages), $page)),
    ));
}

// Load relation read news
if (!empty($promotionNews)) {
    $array_temp = explode(',', $promotionNews['upgrade_news_catalogue']);
}

$relationNews = $news->getListNewsByCategory(41, 0, 5, "ASC");
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

$content = $info;
?>