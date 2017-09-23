<?php

class Category {

    public static function getCategoriesParent() {
        $categories = GetRows('categories_key,
                            categories_id,
                            categories_name,
                            text_seo,
                            title_category,
                            description,
                            keywords'
                , 'categories'
                , 'categories_status = 1 AND level=1 ORDER BY sort_order ASC');
        return $categories;
    }

    public static function getCategoriesParent_help() {
        $categories = GetRows('categorieshelp_key,
                            categorieshelp_id,
                            categorieshelp_name,
                            title_category,
                            descriptionhelp,
                            keywordshelp'
                , 'categorieshelp'
                , 'categorieshelp_status = 1 AND levelhelp = 1 ORDER BY sorthelp_order ASC');
        return $categories;
    }

    public static function getCategoriesParent_introduce() {
        $categories = GetRows('categoriesintroduce_key,
                            categoriesintroduce_id,
                            categoriesintroduce_name,
                            title_category,
                            keywordsintroduce,
                            descriptionintroduce'
                , 'categoriesintroduce'
                , 'categoriesintroduce_status = 1 AND levelintroduce = 1 ORDER BY sortintroduce_order ASC');
        return $categories;
    }

    public static function getCategoriesParent_adoption() {
        $categories = GetRows('categoriesadoption_key,
                            categoriesadoption_id,
                            categoriesadoption_name,
                            keywordsadoption'
                , 'categoriesadoption'
                , 'categoriesadoption_status = 1 AND leveladoption = 1 ORDER BY sortadoption_order ASC');
        return $categories;
    }

    public static function getCategoriesParent_libary() {
        $categories = GetRows('categorieslibary_key,
                            categorieslibary_id,
                            categorieslibary_name,
                            title_category,
                            keywordslibary,
                            descriptionlibary'
                , 'categorieslibary'
                , 'categorieslibary_status = 1 AND levellibary = 1 ORDER BY sortlibary_order ASC');
        return $categories;
    }

    public static function getCategoriesSub_help($id_category_parent) {
        $categories_sub = GetRows('categorieshelp_key,
                                categorieshelp_id,
                                categorieshelp_name,
                                title_category,
                                keywordshelp,
                                descriptionhelp'
                , 'categorieshelp'
                , 'categorieshelp_status = 1 AND levelhelp = 2
                            AND parenthelp_id = ' . $id_category_parent . ' ORDER BY sorthelp_order ASC');
        return $categories_sub;
    }

    public static function getCategoriesSub_introduce($id_category_parent) {
        $categories_sub = GetRows('categoriesintroduce_key,
                                categoriesintroduce_id,
                                categoriesintroduce_name,
                                title_category,
                                keywordsintroduce,
                                descriptionintroduce'
                , 'categoriesintroduce'
                , 'categoriesintroduce_status = 1 AND levelintroduce = 2
                            AND parentintroduce_id = ' . $id_category_parent
                . ' ORDER BY sortintroduce_order ASC');
        return $categories_sub;
    }

    public static function getCategoriesSub_adoption($id_category_parent) {
        $categories_sub = GetRows('categoriesadoption_key,
                                categoriesadoption_id,
                                categoriesadoption_name,
                                keywordsadoption'
                , 'categoriesadoption'
                , 'categoriesadoption_status = 1 AND leveladoption = 2
                            AND parentadoption_id = ' . $id_category_parent
                . ' ORDER BY sortadoption_order ASC');
        return $categories_sub;
    }

    public static function getCategoriesSub($id_category_parent) {
        $categories_sub = GetRows('categories_key,
                                categories_id,
                                categories_name,
                                keywords,
                                description,
                                categories_key,
                                text_seo,
                                title_category'
                , 'categories'
                , 'categories_status = 1 AND  level = 2
                            AND parent_id = ' . $id_category_parent . ' ORDER BY sort_order ASC');
        return $categories_sub;
    }

    public static function getCategoriesSub_libary($id_category_parent) {

        $categories_sub = GetRows('categorieslibary_key,
                                categorieslibary_id,
                                categorieslibary_name,
                                title_category,
                                keywordslibary,
                                descriptionlibary'
                , 'categorieslibary'
                , 'categorieslibary_status = 1 AND levellibary=2
                            AND parentlibary_id = ' . $id_category_parent . ' ORDER BY sortlibary_order ASC');
        return $categories_sub;
    }

    public static function getCategoryByKey($category_key) {
        $category = GetOneRow('categories_id,
                            categories_name,
                            categories_key,
                            level,
                            parent_id,
                            text_seo'
                , 'categories'
                , "categories_status = 1 AND categories_key ='" . $category_key . "'");
        return $category;
    }

    public static function getCategoryById($category_id) {
        $category = GetOneRow('categories_id,
                            categories_name,
                            categories_key,
                            level,
                            text_seo'
                , 'categories'
                , "categories_status = 1 AND categories_id =" . $category_id);
        return $category;
    }

    public static function getCategoryIdByKey($category_key) {
        $category = GetOneRow('categories_id,
                            categories_name,
                            categories_key,
                            level,
                            text_seo'
                , 'categories'
                , "categories_status = 1 AND categories_key ='" . $category_key . "'");
        return $category['categories_id'];
    }

    public static function getCategoryNameByKey($category_key) {
        $category = GetOneRow('categories_id,
                            categories_name,
                            categories_key,
                            level,
                            parent_id,
                            text_seo'
                , 'categories'
                , "categories_status = 1 AND categories_key ='" . $category_key . "'");
        return $category['categories_name'];
    }

    public static function getCategoryKeyByProductID($product_id) {
        $product = GetRows('category_id', 'product_category', 'product_id = '
                . $product_id . ' GROUP BY category_id ORDER BY category_id ASC ');
        $category_id = $product[0]['category_id'];
        $category = GetOneRow('categories_key', 'categories', 'categories_id = ' . $category_id);
        return $category['categories_key'];
    }

    public static function getCategoryKeyByProductKey($product_key) {
        $product = GetOneRow('categories_id', 'products', 'products_key = "' . $product_key . '"');
        $category_id = $product['categories_id'];
        $category = GetOneRow('categories_key', 'categories', 'categories_id = ' . $category_id);
        return $category['categories_key'];
    }

    public static function getCategoryPath($category_key) {
        $result = array();
        $cate = GetOneRow('categories_id,
                        categories_name,
                        categories_key,
                        level,
                        parent_id'
                , 'categories'
                , "categories_status = 1 AND categories_key ='" . $category_key . "'");
        $arr = array();
        $arr['name'] = $cate['categories_name'];
        $arr['key'] = $cate['categories_key'];
        $result[] = $arr;
        if ($cate['parent_id'] > 0) {
            $cates = GetOneRow('categories_id,
                            categories_name,
                            categories_key,
                            level,
                            parent_id'
                    , 'categories'
                    , "categories_status = 1 AND categories_id =" . $cate['parent_id']);
            $arr2 = array();
            $arr2['name'] = $cates['categories_name'];
            $arr2['key'] = $cates['categories_key'];
            $result[] = $arr2;
        }
        return $result;
    }

}

?>