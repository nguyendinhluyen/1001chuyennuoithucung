<?php

class CategoryProduct {

    public function generateCategory($template) {
        $category_key = !empty($_GET['category_key']) ? input($_GET['category_key']) : '';
        if (isset($_GET['category_sub_key'])) {
            $category_key = input($_GET['category_sub_key']);
        }
        global $xtemplate;
        $category = $xtemplate->load($template);
        $Cate = new Category();
        $categories = $Cate->getCategoriesParent();
        $n = count($categories);
        $tpl = '';
        $block = $xtemplate->get_block_from_str($category, 'CATEGORY');
        $selected_category = 'Tất cả sản phẩm';
        $text_seo = '';
        $title_page = '';
        $description = '';
        $keywords = '';

        for ($i = 0; $i < $n; ++$i) {
            if ($i != 0) {
                $tpl .= "<hr style='margin-top: 10px;"
                        . "border-width:1px;"
                        . "border-color:#79afc4; width:100%; float:left'>";
            }
            // Check the selected category
            $id_danhmuc_main = $categories[$i]['categories_id'];
            if ($category_key === $categories[$i]['categories_key']) {
                $id_danhmuc_main = "selected";
                $text_seo = $categories[$i]['text_seo'];
                $title_page = $categories[$i]['title_category'];
                $description = $categories[$i]['description'];
                $keywords = $categories[$i]['keywords'];
            }

            $tpl.= $xtemplate->assign_vars($block, array(
                'category_name' => $categories[$i]['categories_name'],
                'category_key' => $categories[$i]['categories_key'],
                'id_danhmuc_main' => $id_danhmuc_main
            ));

            $block_sub = $xtemplate->get_block_from_str($category, 'SUBCATEGORY');
            $categories_sub = $Cate->getCategoriesSub($categories[$i]['categories_id']);
            $m = count($categories_sub);
            $tpl2 = '';
            for ($j = 0; $j < $m; ++$j) {
                // Check the selected category
                $id_danhmuc_sub = $categories_sub[$j]['categories_id'];
                $img_danhmuc_sub_display = "display:none";
                if ($category_key === $categories_sub[$j]['categories_key']) {
                    $id_danhmuc_sub = "selected";
                    $selected_category = $categories_sub[$j]['categories_name'];
                    $img_danhmuc_sub_display = " display:inline; margin-left: -15px";
                    $text_seo = $categories_sub[$j]['text_seo'];
                    $title_page = $categories_sub[$j]['title_category'];
                    $description = $categories_sub[$j]['description'];
                    $keywords = $categories_sub[$j]['keywords'];
                }

                $tpl2.= $xtemplate->assign_vars($block_sub, array(
                    'category_sub_name' => $categories_sub[$j]['categories_name'],
                    'category_sub_key' => $categories_sub[$j]['categories_key'],
                    'category_key' => $categories[$i]['categories_key'],
                    'id_danhmuc_sub' => $id_danhmuc_sub,
                    'img_danhmuc_sub_display' => $img_danhmuc_sub_display,
                ));
            }
            $tpl = $xtemplate->assign_blocks_content($tpl, array(
                'SUBCATEGORY' => $tpl2
            ));
        }

        $sale_off = "";
        if ($category_key === "sale-off") {
            $sale_off = "selected";
            $selected_category = "Sale Off - Mua Ngay Kẻo Lỡ";
        }
        $tpl .= "<hr style='margin-top: 10px;"
                . "border-width:1px;"
                . "border-color:#79afc4; width:100%; float:left'>"
                . '<li class="danhmuc_main"><a href="{linkS}sale-off/" class="'
                . $sale_off . '">Sale Off - Mua Ngay Kẻo Lỡ</a></li>';
        $category = $xtemplate->assign_blocks_content($category, array(
            'CATEGORY' => $tpl,
        ));
        $category = $xtemplate->replace($category, array(
            'selected_category' => $selected_category
        ));
        $data = array($category, $text_seo, $title_page, $description, $keywords);
        return $data;
    }

}

?>