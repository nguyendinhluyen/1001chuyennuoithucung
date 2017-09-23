<?php

$category_key = !empty($_GET['choose']) ? input($_GET['choose']) : '';
if (isset($_GET['choose2'])) {
    $category_key = input($_GET['choose2']);
}
$category_libary = $xtemplate->load('category_libary');
$category_libary_mobile = $xtemplate->load('category_libary_mobile');
$Cate = new Category();
$categories = $Cate->getCategoriesParent_libary();
$n_categories = count($categories);
$tpl = '';
$tpl_mobile = '';
$block = $xtemplate->get_block_from_str($category_libary, 'CATEGORY');
$block_mobile = $xtemplate->get_block_from_str($category_libary_mobile, 'CATEGORY_MOBILE');
$title_page = "Blog";
$description = "Những bài viết cho chó và mèo";
$keywords = "bài viết chó, bài viết mèo, bài viết cún con, bài viết mèo con";
for ($i = 0; $i < $n_categories; ++$i) {
    if ($i != 0) {
        $tpl .= "<hr style = 'margin-top: 10px;"
                . "margin-bottom: 10px;"
                . "border-width:1px;"
                . "border-color:#79afc4; width:98%; float:left'>";
        $tpl_mobile .= "<hr style = 'margin-top: 10px;"
                . "margin-bottom: 10px;"
                . "border-width:1px;"
                . "border-color:#79afc4; width:98%; float:left'>";
    }
    // Check the selected category
    $id_danhmuc_main = $categories[$i]['categorieslibary_id'];
    if ($category_key === $categories[$i]['categorieslibary_key']) {
        $id_danhmuc_main = "selected";
        $category_selected = $categories[$i]['categorieslibary_name'];
        $title_page = $categories[$i]['title_category'];
        $description = $categories[$i]['descriptionlibary'];
        $keywords = $categories[$i]['keywordslibary'];
    }
    $tpl .= $xtemplate->assign_vars($block, array(
        'category_name' => $categories[$i]['categorieslibary_name'],
        'category_key' => $categories[$i]['categorieslibary_key'],
        'id_danhmuc_main' => $id_danhmuc_main
    ));
    $tpl_mobile.= $xtemplate->assign_vars($block_mobile, array(
        'category_name' => $categories[$i]['categorieslibary_name'],
        'category_key' => $categories[$i]['categorieslibary_key'],
        'id_danhmuc_main' => $id_danhmuc_main
    ));

    $block_sub = $xtemplate->get_block_from_str($category_libary, 'SUBCATEGORY');
    $categories_sub = $Cate->getCategoriesSub_libary($categories[$i]['categorieslibary_id']);
    $n_categories_sub = count($categories_sub);
    $tpl2 = '';
    $tpl2_mobile = '';
    for ($j = 0; $j < $n_categories_sub; ++$j) {
        // Check the selected category
        $id_danhmuc_sub = $categories_sub[$j]['categorieslibary_id'];
        $img_danhmuc_sub_display = "display:none";
        if ($category_key === $categories_sub[$j]['categorieslibary_key']) {
            $id_danhmuc_sub = "selected";
            $img_danhmuc_sub_display = " display:inline; margin-left: -15px";
            $category_selected = $categories_sub[$j]['categorieslibary_name'];
            $title_page = $categories_sub[$j]['title_category'];
            $description = $categories_sub[$j]['descriptionlibary'];
            $keywords = $categories_sub[$j]['keywordslibary'];
        }
        $tpl2 .= $xtemplate->assign_vars($block_sub, array(
            'category_sub_name' => $categories_sub[$j]['categorieslibary_name'],
            'category_sub_key' => $categories_sub[$j]['categorieslibary_key'],
            'category_key' => $categories[$i]['categorieslibary_key'],
            'id_danhmuc_sub' => $id_danhmuc_sub,
            'img_danhmuc_sub_display' => $img_danhmuc_sub_display
        ));
    }

    $tpl = $xtemplate->assign_blocks_content($tpl, array(
        'SUBCATEGORY' => $tpl2
    ));
}

$category_libary = $xtemplate->assign_blocks_content($category_libary, array(
    'CATEGORY' => $tpl
        ));
$category_libary_mobile = $xtemplate->assign_blocks_content($category_libary_mobile, array(
    'CATEGORY_MOBILE' => $tpl_mobile
        ));

// load selected category
if (empty($category_selected)) {
    $category_selected = "BLog";
}
$category_libary = $xtemplate->assign_vars($category_libary, array(
    'category_selected' => $category_selected
        ));
$category_libary_mobile = $xtemplate->assign_vars($category_libary_mobile, array(
    'category_selected' => $category_selected
        ));
?>