<?php

// Check link thuong hieu san pham
$fullUrl = explode("/", $_SERVER['REQUEST_URI']);
$id_brand_name_main = '';
if (isset($fullUrl[2])) {
    if ($fullUrl[2] === "tat-ca-thuong-hieu.htm" || $fullUrl[2] === "tat-ca-thuong-hieu") {
        $id_brand_name_main = "selected";
        $selected_category = "TẤT CẢ THƯƠNG HIỆU";
    }
}

$news_key = !empty($_GET['news_key']) ? input($_GET['news_key']) : '';
if (empty($news_key)) {
    $news_key = $News->getFistRowsOfIntroduceByCategory();
}

$category = $xtemplate->load('category_news_introduce');
$Cate = new Category();
$categories = $Cate->getCategoriesParent_introduce();
$n = count($categories);
$tpl = '';
$block = $xtemplate->get_block_from_str($category, 'CATEGORY');
for ($i = 0; $i < $n; ++$i) {
    if ($i != 0) {
        $tpl .= "<hr style = 'margin-top: 10px;"
                . "margin-bottom: 10px;"
                . "border-width:1px;"
                . "border-color:#79afc4; width:95%; float:left'>";
    }

    // Check the selected category
    $id_danhmuc_main = $categories[$i]['categoriesintroduce_id'];
    if ($news_key == $categories[$i]['categoriesintroduce_key']) {
        if (empty($id_brand_name_main)) {
            $id_danhmuc_main = "selected";
            $selected_category = $categories[$i]['categoriesintroduce_name'];
        }
        $title_page = $categories[$i]['title_category'];
        $description = $categories[$i]['descriptionintroduce'];
        $keywords = $categories[$i]['keywordsintroduce'];
    }

    $tpl.= $xtemplate->assign_vars($block, array(
        'category_name' => $categories[$i]['categoriesintroduce_name'],
        'category_key' => $categories[$i]['categoriesintroduce_key'],
        'id_danhmuc_main' => $id_danhmuc_main,
    ));
}
$tpl .= "<hr style = 'margin-top: 10px;"
        . "margin-bottom: 10px;"
        . "border-width:1px;"
        . "border-color:#79afc4; width:95%; float:left'>";
$category = $xtemplate->assign_blocks_content($category, array(
    'CATEGORY' => $tpl
        ));

$category = $xtemplate->replace($category, array(
    'id_brand_name_main' => $id_brand_name_main,
    'band_name_product' => "Thương hiệu sản phẩm",
    'selected_category' => $selected_category
        ));
?>