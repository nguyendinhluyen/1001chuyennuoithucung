<?php

$news_key = input($_GET['news_key']);
if (empty($news_key)) {
    $news_key = $News->getFistRowsOfHelpByCategory();
}
$category = $xtemplate->load('category_help');
$Cate = new Category();
$categories = $Cate->getCategoriesParent_help();
$n_categories = count($categories);
$tpl = '';
$tpl_mobile = '';
$block = $xtemplate->get_block_from_str($category, 'CATEGORY');
$block_mobile = $xtemplate->get_block_from_str($category, 'CATEGORY_MOBILE');
for ($i = 0; $i < $n_categories; ++$i) {
    $categories_sub = $Cate->getCategoriesSub_help($categories[$i]['categorieshelp_id']);
    $n_categories_sub = count($categories_sub);
    if ($i != 0) {
        $tpl .= "<hr style = 'margin-top: 10px;"
                . "margin-bottom: 10px;"
                . "border-width:1px;"
                . "border-color:#79afc4; width:95%; float:left'>";
        $tpl_mobile .= "<hr style = 'margin-top: 10px;"
                . "margin-bottom: 10px;"
                . "border-width:1px;"
                . "border-color:#79afc4; width:95%; float:left'>";
    }
    if ($n_categories_sub > 0) {
        // Parent has the children category
        $tpl.= $xtemplate->assign_vars($block, array(
            'category_name' => $categories[$i]['categorieshelp_name'],
            'category_key' => $categories_sub[0]['categorieshelp_key'],
            'id_danhmuc_main' => $categories[$i]['categorieshelp_id']
        ));
        $tpl_mobile.= $xtemplate->assign_vars($block_mobile, array(
            'category_name' => $categories[$i]['categorieshelp_name'],
            'category_key' => $categories_sub[0]['categorieshelp_key'],
            'id_danhmuc_main' => $categories[$i]['categorieshelp_id']
        ));
    } else {
        $tpl.= $xtemplate->assign_vars($block, array(
            'category_name' => $categories[$i]['categorieshelp_name'],
            'category_key' => $categories[$i]['categorieshelp_key']
        ));
        $tpl_mobile.= $xtemplate->assign_vars($block_mobile, array(
            'category_name' => $categories[$i]['categorieshelp_name'],
            'category_key' => $categories[$i]['categorieshelp_key']
        ));
    }
    $block_sub = $xtemplate->get_block_from_str($category, 'SUBCATEGORY');
    $block_sub_mobile = $xtemplate->get_block_from_str($category, 'SUBCATEGORY_MOBILE');
    $tpl2 = '';
    $tpl2_mobile = '';
    if ($n_categories_sub > 0) {
        for ($j = 0; $j < $n_categories_sub; ++$j) {
            $id_danhmuc_sub = $categories_sub[$j]['categorieshelp_id'];
            $img_danhmuc_sub_display = "display:none";
            $img_danhmuc_sub_mobile_display = "display:none";
            if ($news_key == $categories_sub[$j]['categorieshelp_key']) {
                $id_danhmuc_sub = "selected";
                $selected_category = $categories_sub[$j]['categorieshelp_name'];
                $img_danhmuc_sub_display = " display:inline; margin-left: -15px";
                $title_page = $categories_sub[$j]['title_category'];
                $description = $categories_sub[$j]['descriptionhelp'];
                $keywords = $categories_sub[$j]['keywordshelp'];
            }

            $tpl2.= $xtemplate->assign_vars($block_sub, array(
                'category_sub_name' => $categories_sub[$j]['categorieshelp_name'],
                'category_sub_key' => $categories_sub[$j]['categorieshelp_key'],
                'category_key' => $categories[$icategory]['categorieshelp_key'],
                'id_danhmuc_sub' => $id_danhmuc_sub,
                'img_danhmuc_sub_display' => $img_danhmuc_sub_display
            ));
            $tpl2_mobile.= $xtemplate->assign_vars($block_sub_mobile, array(
                'category_sub_name' => $categories_sub[$j]['categorieshelp_name'],
                'category_sub_key' => $categories_sub[$j]['categorieshelp_key'],
                'category_key' => $categories[$i]['categorieshelp_key'],
                'id_danhmuc_sub' => $id_danhmuc_sub,
                'img_danhmuc_sub_display' => $img_danhmuc_sub_mobile_display
            ));
        }
    }
    $tpl = $xtemplate->assign_blocks_content($tpl, array(
        'SUBCATEGORY' => $tpl2
    ));
    $tpl_mobile = $xtemplate->assign_blocks_content($tpl_mobile, array(
        'SUBCATEGORY_MOBILE' => $tpl2_mobile
    ));
}
$category = $xtemplate->assign_blocks_content($category, array(
    'CATEGORY' => $tpl
        ));
$category = $xtemplate->assign_blocks_content($category, array(
    'CATEGORY_MOBILE' => $tpl_mobile
        ));
$category = $xtemplate->assign_vars($category, array(
    'selected_category' => $selected_category
        ));
?>