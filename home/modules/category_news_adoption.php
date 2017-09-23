<?php

$category = $xtemplate->load('category_news_adoption');

$Cate = new Category();

$categories = $Cate->getCategoriesParent_adoption();

$n = count($categories);

$tpl = '';

$block = $xtemplate->get_block_from_str($category, 'CATEGORY');

for ($i = 0; $i < $n; ++$i) {
    $categories_sub = $Cate->getCategoriesSub_adoption($categories[$i]['categoriesadoption_id']);

    $m = count($categories_sub);

    if ($m > 0) {
        //Thu muc cha co duong link con dau tien
        $tpl.= $xtemplate->assign_vars($block, array(
            'category_name' => $categories[$i]['categoriesadoption_name'],
            'category_key' => $categories_sub[0]['categorieshadoption_key']
        ));
    } else {
        $tpl.= $xtemplate->assign_vars($block, array(
            'category_name' => $categories[$i]['categoriesadoption_name'],
            'category_key' => $categories[$i]['categoriesadoption_key'],
        ));
    }

    $block_sub = $xtemplate->get_block_from_str($category, 'SUBCATEGORY');


    $tpl2 = '';

    if ($m > 0) {
        for ($j = 0; $j < $m; ++$j) {
            $tpl2.= $xtemplate->assign_vars($block_sub, array(
                'category_sub_name' => $categories_sub[$j]['categoriesadoption_name'],
                'category_sub_key' => $categories_sub[$j]['categoriesadoption_key'],
                'category_key' => $categories[$i]['categoriesadoption_key'],
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