<?php

$category = $xtemplate->load('category_help');
$Cate = new Category();
$categories = $Cate->getCategoriesParent_help();

$n = count($categories);
$tpl = '';
$block = $xtemplate->get_block_from_str($category, 'CATEGORY');
for ($i = 0; $i < $n; ++$i) {
    $categories_sub = $Cate->getCategoriesSub_help($categories[$i]['categorieshelp_id']);
    $m = count($categories_sub);
    if ($m > 0) {
        // Parent category
        $tpl.= $xtemplate->assign_vars($block, array(
            'category_name' => $categories[$i]['categorieshelp_name'],
            'category_key' => $categories_sub[0]['categorieshelp_key']
        ));
    } else {
        $tpl.= $xtemplate->assign_vars($block, array(
            'category_name' => $categories[$i]['categorieshelp_name'],
            'category_key' => $categories[$i]['categorieshelp_key'],
        ));
    }

    $block_sub = $xtemplate->get_block_from_str($category, 'SUBCATEGORY');
    $tpl2 = '';
    if ($m > 0) {
        for ($j = 0; $j < $m; ++$j) {
            $tpl2.= $xtemplate->assign_vars($block_sub, array(
                'category_sub_name' => $categories_sub[$j]['categorieshelp_name'],
                'category_sub_key' => $categories_sub[$j]['categorieshelp_key'],
                'category_key' => $categories[$i]['categorieshelp_key'],
            ));
        }
    }
    $tpl = $xtemplate->assign_blocks_content($tpl, array(
        'SUBCATEGORY' => $tpl2
    ));
}
$category = $xtemplate->assign_blocks_content($category, array(
    'CATEGORY' => $tpl
        ));
?>