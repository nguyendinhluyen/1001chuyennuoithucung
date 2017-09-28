<?php

class News {

    public static function getNewsOfProduct($products_key) {
        $product = GetOneRow('products_id'
                , 'products'
                , 'products_key = "' . $products_key . '"');
        $id_news = GetRows('id_news'
                , 'relation_news_product'
                , 'id_product = ' . $product['products_id'] . " limit 5");
        if (!empty($id_news)) {
            $news_list = "";
            for ($i = 0; $i < count($id_news) - 1; $i++) {
                $news_list .= $id_news[$i]['id_news'] . ",";
            }
            $news_list .= $id_news[count($id_news) - 1]['id_news'];
            $news_info = GetRows('news_name,
                                  news_image,
                                  news_key,
                                  news_id'
                    , 'news'
                    , 'news_id IN (' . $news_list . ")");
            return $news_info;
        }
    }

    public static function getProductOfNews($news_key) {
        $news = GetOneRow('news_id'
                , 'news'
                , 'news_key = "' . $news_key . '"');
        $id_products = GetRows('id_product'
                , 'relation_news_product'
                , 'id_news = ' . $news['news_id'] . " limit 10");
        if (!empty($id_products)) {
            $products_list = "";
            for ($i = 0; $i < count($id_products) - 1; $i++) {
                $products_list .= $id_products[$i]['id_product'] . ",";
            }
            $products_list .= $id_products[count($id_products) - 1]['id_product'];
            $products_info = GetRows('products_name,
                                      products_image,
                                      products_key,
                                      products_id'
                    , 'products'
                    , 'products_id IN (' . $products_list . ")");
            return $products_info;
        }
    }

    public static function getDetailofHelpByCategory($newskey) {
        $category = GetOneRow('categorieshelp_id'
                , 'categorieshelp'
                , 'categorieshelp_key = "' . $newskey . '"');
        $news_help = GetOneRow('news_key'
                , 'news'
                , 'help_flag = 1 AND menu = 0 AND news_catalogue = ' . $category['categorieshelp_id']);
        return $news_help['news_key'];
    }

    public static function getDetailofIntroduceByCategory($newskey) {
        $category = GetOneRow('categoriesintroduce_id'
                , 'categoriesintroduce'
                , 'categoriesintroduce_key = "' . $newskey . '"');
        $news_introduce = GetOneRow('newsintroduce_key'
                , 'news_introduce'
                , 'newsintroduce_catalogue = ' . $category['categoriesintroduce_id']);
        return $news_introduce['newsintroduce_key'];
    }

    public static function getDetailofAdoptionByCategory($newskey) {
        $category = GetOneRow('categoriesadoption_id'
                , 'categoriesadoption'
                , 'categoriesadoption_key = "' . $newskey . '"');
        $news_adoption = GetOneRow('newsadoption_key'
                , 'news_adoption'
                , 'newsadoption_catalogue = ' . $category['categoriesadoption_id']);
        return $news_adoption['newsadoption_key'];
    }

    public static function getFistRowsOfHelp() {
        $introduce = GetRowsOrderBy('news_key', 'news', 'help_flag = 1 and status = 1');
        return $introduce;
    }

    public static function getFistRowsOfHelpByCategory() {
        $category = GetRows('categorieshelp_id'
                , 'categorieshelp'
                , 'levelhelp = 1 ORDER BY sorthelp_order ASC');

        if (!empty($category)) {
            $news_help = GetOneRow('news_key'
                    , 'news'
                    , 'help_flag = 1 
                                    AND menu = 0 
                                    AND news_catalogue = ' . $category[0]['categorieshelp_id']);

            if (!empty($news_help)) {
                return $news_help['news_key'];
            } else if (empty($news_help)) {
                $news_help_child = GetRows('categorieshelp_id'
                        , 'categorieshelp'
                        , 'levelhelp = 2 AND parenthelp_id = '
                        . $category[0]['categorieshelp_id'] . ' ORDER BY sorthelp_order ASC');
                $news_help = GetOneRow('news_key'
                        , 'news'
                        , 'help_flag = 1
                                    AND menu = 0
                                    AND news_catalogue = ' . $news_help_child[0]['categorieshelp_id']);
                return $news_help['news_key'];
            }
        }
        return -1;
    }

    public static function getFistRowsOfIntroduceByCategory() {
        $category = GetRows('categoriesintroduce_id'
                , 'categoriesintroduce'
                , 'levelintroduce = 1 ORDER BY sortintroduce_order ASC');
        if (!empty($category)) {
            $news_introduce = GetOneRow('newsintroduce_key'
                    , 'news_introduce'
                    , 'newsintroduce_catalogue = ' . $category[0]['categoriesintroduce_id']);
            if (!empty($news_introduce)) {
                return $news_introduce['newsintroduce_key'];
            } else if (empty($news_introduce)) {
                $news_introduce_child = GetRows('categoriesintroduce_id'
                        , 'categoriesintroduce'
                        , 'levelintroduce = 2 AND parentintroduce_id = '
                        . $category[0]['categoriesintroduce_id'] . ' ORDER BY sortintroduce_order ASC');
                $news_introduce = GetOneRow('newsintroduce_key'
                        , 'news_introduce'
                        , 'newsintroduce_catalogue = ' . $news_introduce_child[0]['categoriesintroduce_id']);
                return $news_introduce['newsintroduce_key'];
            }
        }
        return -1;
    }

    public static function getFistRowsOfAdoptionByCategory() {
        $category = GetRows('categoriesadoption_id'
                , 'categoriesadoption'
                , 'leveladoption = 1 ORDER BY sortadoption_order ASC');
        if (!empty($category)) {
            $news_adoption = GetOneRow('newsadoption_key'
                    , 'news_adoption'
                    , 'newsadoption_catalogue = ' . $category[0]['categoriesadoption_id']);
            if (!empty($news_adoption)) {
                return $news_adoption['newsadoption_key'];
            } else if (empty($news_adoption)) {
                $news_adoption_child = GetRows('categoriesadoption_id'
                        , 'categoriesadoption'
                        , 'leveladoption = 2 AND parentadoption_id = '
                        . $category[0]['categoriesadoption_id'] . ' ORDER BY sortadoption_order ASC');
                $news_adoption = GetOneRow('newsadoption_key'
                        , 'news_adoption'
                        , 'newsadoption_catalogue = ' . $news_adoption_child[0]['categoriesadoption_id']);
                return $news_adoption['newsadoption_key'];
            }
        }
        return -1;
    }

    public static function getIntroduce() {
        $introduce = GetRows('news_name,
                              news_image,
                              news_shortcontent,
                              news_content,
                              news_key'
                , 'news'
                , "(news_key= 'gioi-thieu-chung-58' or news_key= 'thuong-mai-dien-tu-59') and status=1");
        return $introduce;
    }

    public static function getContact() {
        $contact = GetRows('news_name,
                           news_image,
                           news_shortcontent,
                           news_content,
                           news_key'
                , 'news'
                , "(news_key= 'gop-y-lien-he-68') AND status=1");
        return $contact;
    }

    public static function getCartHelp() {
        $contact = GetRows('news_name,
                            news_image,
                            news_shortcontent,
                            news_content,
                            news_key'
                , 'news'
                , "(news_key= 'huong-dan-mua-hang-62') AND status=1");
        return $contact;
    }

    public static function getFAQ() {
        $contact = GetRows('news_name,news_image,news_shortcontent,news_content,news_key', 'news', "(news_key= 'cau-hoi-thuong-gap-65') and status=1");
        return $contact;
    }

    // van chuyen
    public static function getVanChuyen() {
        $contact = GetRows('news_name,news_image,news_shortcontent,news_content,news_key', 'news', "(news_key= 'dich-vu-van-chuyen-63') and status=1");
        return $contact;
    }

    // thanh toan
    public static function getCoupon() {
        $contact = GetRows('news_name,news_image,news_shortcontent,news_content,news_key', 'news', "(news_key= 'cach-thuc-thanh-toan-64') and status=1");
        return $contact;
    }

    public static function getPet() {
        $introduce = GetRows('news_name,news_image,news_shortcontent,news_content,news_key', 'news', "(news_key= 'gioi-thieu-pet-60' or news_key= 'dien-dan-yeu-dong-vat-61') and status=1");
        return $introduce;
    }

    public static function getNewsListPromotion() {
        $introduce = GetRows('news_name
                                ,news_image
                                ,news_shortcontent
                                ,news_content
                                ,news_key'
                , 'news', 'news_catalogue = 21 AND status = 1 
                                                             AND menu = 0 
                                                             AND relax = 1');
        return $introduce;
    }

    public static function getNewsListPromotionLimit($start, $numberRec) {
        $introduce = GetRows('news_name
                            ,news_image
                            ,news_shortcontent
                            ,news_content
                            ,news_key'
                , 'news'
                , 'news_catalogue = 21 AND status = 1 
                            AND menu = 0 
                            AND relax = 1 limit ' . $start . ',' . $numberRec);
        return $introduce;
    }

    public static function getNewsListGame() {
        $introduce = GetRows('news_name
                                                      ,news_image
                                                      ,news_shortcontent
                                                      ,news_content
                                                      ,news_key'
                , 'news'
                , 'news_catalogue = 23 AND status = 1 
                                                                                                    AND menu = 0
                                                                                                    AND relax = 1');
        return $introduce;
    }

    public static function getNewsListGameLimit($start, $numberRec) {
        $introduce = GetRows('news_name
                                                      ,news_image
                                                      ,news_shortcontent
                                                      ,news_content
                                                      ,news_key'
                , 'news'
                , 'news_catalogue = 23 AND status = 1 
                                                                                                    AND menu = 0 
                                                                                                    AND relax = 1 limit ' . $start . ',' . $numberRec);
        return $introduce;
    }

    public static function getNewsListFilm() {
        $introduce = GetRows('news_name
                                                     ,news_image
                                                     ,news_shortcontent
                                                     ,news_content
                                                     ,news_key'
                , 'news', 'news_catalogue = 24 AND status = 1
                                                                                                              AND menu = 0
                                                                                                              AND relax = 1');
        return $introduce;
    }

    public static function getNewsListFilmLimit($start, $numberRec) {
        $introduce = GetRows('news_name
                                                     ,news_image
                                                     ,news_shortcontent
                                                     ,news_content
                                                     ,news_key'
                , 'news'
                , 'news_catalogue = 24 AND status = 1 
                                                                                               AND menu = 0 
                                                                                               AND relax = 1 limit ' . $start . ',' . $numberRec);
        return $introduce;
    }

    public static function getNewsListPet() {
        $introduce = GetRows('news_name
                                                     ,news_image
                                                     ,news_shortcontent
                                                     ,news_content
                                                     ,news_key'
                , 'news'
                , 'news_catalogue = 17 AND status = 1 
                                                                                               AND menu = 0 
                                                                                               AND relax = 1');
        return $introduce;
    }

    public static function getNewsListPetLimit($start, $numberRec) {
        $introduce = GetRows('news_name
                                                     ,news_image
                                                     ,news_shortcontent
                                                     ,news_content
                                                     ,news_key'
                , 'news'
                , "news_catalogue = 17 AND status = 1 
                                                                                               AND menu = 0 
                                                                                               AND relax = 1 limit " . $start . "," . $numberRec);
        return $introduce;
    }

    public static function getNewsListVeterinary() {
        $introduce = GetRows('news_name
                                                      ,news_image
                                                      ,news_shortcontent
                                                      ,news_content
                                                      ,news_key'
                , 'news'
                , 'news_catalogue = 19 AND status=1 AND menu = 0 AND relax = 1');
        return $introduce;
    }

    public static function getNewsListVeterinaryLimit($start, $numberRec) {
        $introduce = GetRows('news_name,
                                                      news_image,
                                                      news_shortcontent,
                                                      news_content,
                                                      news_key', 'news', 'news_catalogue = 19 AND status=1 
                                                                                               AND menu = 0 
                                                                                               AND relax = 1 limit ' . $start . ',' . $numberRec);
        return $introduce;
    }

    public static function getNewsListNutrition() {
        $introduce = GetRows('news_name
                                                      ,news_image
                                                      ,news_shortcontent
                                                      ,news_content
                                                      ,news_key'
                , 'news'
                , 'news_catalogue = 18 AND status = 1 
                                                                                                    AND menu = 0 
                                                                                                    AND relax = 1');
        return $introduce;
    }

    public static function getNewsListNutritionLimit($start, $numberRec) {
        $introduce = GetRows('news_name
                                                     ,news_image
                                                     ,news_shortcontent
                                                     ,news_content
                                                     ,news_key'
                , 'news'
                , 'news_catalogue = 18 AND status=1 
                                                                                               AND menu = 0 
                                                                                               AND relax = 1 limit ' . $start . ',' . $numberRec);
        return $introduce;
    }

    //chuyen do day
    public static function getNewsListChuyenDoDay() {
        $introduce = GetRows('news_name
                                                      ,news_image
                                                      ,news_shortcontent
                                                      ,news_content
                                                      ,news_key'
                , 'news', 'news_catalogue = 20 AND status = 1 
                                                    AND menu = 0 
                                                    AND relax = 1');
        return $introduce;
    }

    //chuyen do day
    public static function getNewsListChuyenDoDayLimit($start, $numberRec) {
        $introduce = GetRows('news_name
                                                      ,news_image
                                                      ,news_shortcontent
                                                      ,news_content
                                                      ,news_key'
                , 'news'
                , 'news_catalogue = 20 AND status=1 
                                                    AND menu = 0 
                                                    AND relax = 1 limit ' . $start . ',' . $numberRec);
        return $introduce;
    }

    //Am nhac
    public static function getNewsListAmNhac() {
        $introduce = GetRows('news_name
                                                      ,news_image
                                                      ,news_shortcontent
                                                      ,news_content
                                                      ,news_key'
                , 'news'
                , 'news_catalogue = 26 AND status = 1 
                                                    AND menu = 0
                                                    AND relax = 1');
        return $introduce;
    }

    public static function getNewsListAmNhacLimit($start, $numberRec) {
        $introduce = GetRows('news_name
                                                     ,news_image
                                                     ,news_shortcontent
                                                     ,news_content
                                                     ,news_key'
                , 'news'
                , 'news_catalogue = 26 AND status = 1 
                                                    AND menu = 0 
                                                    AND relax = 1 limit ' . $start . ',' . $numberRec);
        return $introduce;
    }

    // Doi song pets
    // Lay danh sach bai viet cho thu muc chinh
    public static function getNewsListAllLibaryMainKeyWord($keyword) {
        $categoriesparentlibary_id = GetRows('categorieslibary_id'
                , 'categorieslibary'
                , 'categorieslibary_key = "' . $keyword . '"');

        $categorieslibary_id = GetRows('categorieslibary_id'
                , 'categorieslibary'
                , 'parentlibary_id = ' . $categoriesparentlibary_id[0]['categorieslibary_id']);

        $categorieslibarylist_id = $categoriesparentlibary_id[0]['categorieslibary_id'];

        if (!empty($categorieslibary_id)) {
            $categorieslibarylist_id .= ',';

            for ($i = 0; $i < count($categorieslibary_id) - 1; $i++) {
                $categorieslibarylist_id .= $categorieslibary_id[$i]['categorieslibary_id'] . ',';
            }

            $categorieslibarylist_id .= $categorieslibary_id[count($categorieslibary_id) - 1]['categorieslibary_id'];
        }

        $news_list_id = GetRows('news_id'
                , 'news_category'
                , 'status = 1
                            AND category_id IN (' . $categorieslibarylist_id . ') GROUP BY news_id');
        $news_list_id_2 = "";

        if (!empty($news_list_id)) {
            for ($i = 0; $i < count($news_list_id) - 1; $i++) {
                $news_list_id_2 .= $news_list_id[$i]['news_id'] . ',';
            }

            $news_list_id_2 .= $news_list_id[count($news_list_id) - 1]['news_id'];
        }

        $introduce = GetRows('news_name,
                                news_image,
                                news_shortcontent,
                                news_content,
                                news_key,
                                date_added,
                                translator,
                                date_publisher'
                , 'news'
                , 'flag_publisher = 1 AND relax = 0 AND status = 1
                                            AND news_id IN (' . $news_list_id_2 . ") "
                . "ORDER BY date_publisher DESC");
        return $introduce;
    }

    public static function getNewsListAllLibaryKeyWord($keyword) {
        $categorieslibary_id = GetRows('categorieslibary_id'
                , 'categorieslibary'
                , 'categorieslibary_key = "' . $keyword . '"');

        $news_list_id = GetRows('news_id'
                , 'news_category'
                , 'status = 1
                            AND category_id IN (' . $categorieslibary_id[0]['categorieslibary_id'] . ') GROUP BY news_id');
        $news_list_id_2 = "";

        if (!empty($news_list_id)) {
            for ($i = 0; $i < count($news_list_id) - 1; $i++) {
                $news_list_id_2 .= $news_list_id[$i]['news_id'] . ',';
            }

            $news_list_id_2 .= $news_list_id[count($news_list_id) - 1]['news_id'];
        }

        $introduce = GetRows('news_name,
                                news_image,
                                news_shortcontent,
                                news_content,
                                news_key,
                                date_added,
                                translator,
                                date_publisher'
                , 'news'
                , 'flag_publisher = 1 AND relax = 0 AND status = 1
                                                        AND news_id IN (' . $news_list_id_2 . ") "
                . "ORDER BY date_publisher DESC");
        return $introduce;
    }

    public static function getNewsListAllLibary() {
        $introduce = GetRows('news_name,
                                news_image,
                                news_shortcontent,
                                news_content,
                                news_key,
                                date_added,
                                translator,
                                date_publisher'
                , 'news'
                , "flag_publisher = 1 AND relax = 0 AND status = 1
                                                    ORDER BY date_publisher DESC");
        return $introduce;
    }
    
    public static function getTopNews() {
        $introduce = GetRows('news_name,
                            news_image,
                            news_shortcontent,
                            news_content,
                            news_key,
                            date_added,
                            translator,
                            date_publisher'
                , 'news'
                , "flag_publisher = 1 AND relax = 0 AND status = 1
                ORDER BY date_publisher DESC LIMIT 0,6");
        return $introduce;
    }

    public static function getNewsListAllLibaryDog() {
        $introduce = GetRows('news_name,
                                news_image,
                                news_shortcontent,
                                news_content,
                                news_key,
                                date_added,
                                translator,
                                date_publisher'
                , 'news'
                , "flag_publisher = 1 AND relax = 0 AND help_flag = 0  
                                                        AND status=1 
                                                        AND menu = 0 
                                                        AND (news_name LIKE '%cho%' OR news_name LIKE '%cun%')
                                                        AND news_name NOT LIKE '%meo%' 
                                                        ORDER BY date_publisher DESC");
        return $introduce;
    }

    public static function getNewsListAllLibaryCat() {
        $introduce = GetRows('news_name,
                                news_image,
                                news_shortcontent,
                                news_content,
                                news_key,
                                date_added,
                                translator,
                                date_publisher'
                , 'news'
                , "flag_publisher = 1 AND  relax = 0 AND help_flag = 0 
                                                        AND status=1 
                                                        AND menu = 0 
                                                        AND news_name LIKE '%meo%' 
                                                        ORDER BY date_publisher DESC");
        return $introduce;
    }

    public static function getDetailNews($news_key) {
        $info = GetOneRow('news_name,
                            news_image,
                            news_shortcontent,
                            news_content,
                            news_key,
                            author,
                            resource,
                            translator,
                            date_added,
                            title_page, 
                            meta_description,
                            meta_keyword,
                            upgrade_news_catalogue,
                            date_publisher', 'news', "news_key = '" . $news_key . "'");
        return $info;
    }

    public static function getDetailNews_Introduce($news_key) {
        $info = GetOneRow('newsintroduce_name,
                        newsintroduce_content,
                        newsintroduce_key,						  
                        dateintroduce_added'
                , 'news_introduce'
                , "newsintroduce_key = '" . $news_key . "'");
        return $info;
    }

    public static function getDetailNews_Adoption($news_key) {
        $info = GetOneRow('newsadoption_name,
                                               newsadoption_content,
                                               newsadoption_key,						  
                                               dateadoption_added'
                , 'news_adoption'
                , "newsadoption_key = '" . $news_key . "'");
        return $info;
    }

    public static function getNewsNewest($numberNews) {
        $info = GetRows('news_name,
                        news_catalogue,
                        news_image,
                        news_shortcontent,
                        news_content,
                        news_key,
                        help_flag,
                        date_publisher,
                        relax'
                , 'news'
                , " flag_publisher = '1' AND relax = '0' AND status = '1' "
                . "ORDER BY date_publisher DESC limit 0," . $numberNews);
        return $info;
    }

    public static function getNews() {
        $info = GetRows('news_name,news_image,news_shortcontent,news_content,news_key', 'news', "menu = 0 and help = 0");
        return $info;
    }

    public static function getHelp() {
        $info = GetRowsOrderBy('news_name,news_image,news_shortcontent,news_content,news_key', 'news', "menu = 0 and help_flag = 1 and status = 1");
        return $info;
    }

    //Dinh duong
    public static function getNewsListDinhDuong() {
        $introduce = GetRows('news_name,news_image,news_shortcontent,news_content,news_key,date_added,translator', 'news', "news_catalogue = 27 and status=1 and menu = 0 ORDER BY date_added DESC");
        return $introduce;
    }

    public static function getNewsListDinhDuongLimit($start, $numberRec) {
        $introduce = GetRows('news_name,news_image,news_shortcontent,news_content,news_key,date_added,translator', 'news', "news_catalogue = 27 and status=1 and menu = 0 limit " . $start . "," . $numberRec);
        return $introduce;
    }

    //Cham soc
    public static function getNewsListChamSoc() {
        $introduce = GetRows('news_name,news_image,news_shortcontent,news_content,news_key,date_added,translator', 'news', "news_catalogue = 28 and status=1 and menu = 0 ORDER BY date_added DESC");
        return $introduce;
    }

    public static function getNewsListChamSocLimit($start, $numberRec) {
        $introduce = GetRows('news_name,news_image,news_shortcontent,news_content,news_key,date_added,translator', 'news', "news_catalogue = 28 and status=1 and menu = 0 limit " . $start . "," . $numberRec);
        return $introduce;
    }

    //Thu y
    public static function getNewsListThuY() {
        $introduce = GetRows('news_name,news_image,news_shortcontent,news_content,news_key,date_added,translator', 'news', "news_catalogue = 29 and status=1 and menu = 0 ORDER BY date_added DESC");
        return $introduce;
    }

    public static function getNewsListThuYLimit($start, $numberRec) {
        $introduce = GetRows('news_name,news_image,news_shortcontent,news_content,news_key,date_added,translator', 'news', "news_catalogue = 29 and status=1 and menu = 0 limit " . $start . "," . $numberRec);
        return $introduce;
    }

    // Get lastest news
    public static function getLastestNewsOnWeek($date_range) {
        $news = GetRows('news_name,
                        news_catalogue,
                        news_image,
                        news_shortcontent,
                        news_content,
                        news_key,
                        help_flag,
                        date_publisher'
                , 'news'
                , 'flag_publisher="1" '
                . 'AND relax="0" '
                . 'AND status="1" '
                . 'AND from_unixtime(date_added,"%Y-%m-%d") BETWEEN DATE(DATE_SUB(NOW(),INTERVAL ' . $date_range . ' DAY)) AND DATE(NOW()) ORDER BY news_id DESC');
        return $news;
    }

    // Get lastest news
    public static function getLastestNewsByCategory($news_category) {
        $news = GetRows('news_name,
                            news_catalogue,
                            news_image,
                            news_shortcontent,
                            news_content,
                            news_key,
                            help_flag,
                            date_publisher'
                , 'news'
                , 'flag_publisher="1" '
                . 'AND relax="0" '
                . 'AND status="1" '
                . 'AND news_catalogue= "' . $news_category
                . '" ORDER BY news_id DESC LIMIT 0,4');
        return $news;
    }

    public static function getPreviousLimitNews() {
        $config = GetRows('config_name,
                               config_value,
                               date_added'
                , 'config'
                , 'config_name="pre_limit_news"');
        return $config;
    }

    public static function countAllNews() {
        $news = GetRows('news_id'
                , 'news'
                , 'flag_publisher="1" AND relax="0" AND status = "1"');
        return count($news);
    }

    public static function updateLimitNews($limitValue) {
        global $mysql;
        $sql = "UPDATE config SET config_value ='" . $limitValue . "'" . " , date_added='" . date('Y-m-d') . "' WHERE config_name='pre_limit_news'";
        $mysql->setQuery($sql);
        if ($mysql->query()) {
            return true;
        }
    }

    public static function getNewsLimitOrderById($limit_start, $limit_end) {
        $news = GetRows('news_name,
                            news_catalogue,
                            news_image,
                            news_shortcontent,
                            news_content,
                            news_key,
                            help_flag,
                            date_publisher'
                , 'news'
                , " flag_publisher = '1' AND relax = '0' AND status = '1' "
                . "ORDER BY news_id ASC limit " . $limit_start . ',' . $limit_end);
        return $news;
    }

    public static function getListNewsByCategory($news_category, $limit_start, $limit_end, $orderby, $news_key = '') {
        $news = GetRows('news_name,
                            news_catalogue,
                            news_image,
                            news_shortcontent,
                            news_content,
                            news_key,
                            help_flag,
                            date_publisher'
                , 'news'
                , 'flag_publisher="1" '
                . 'AND relax="0" '
                . 'AND status="1" '
                . 'AND news_key != "' . $news_key . '" '
                . 'AND CONCAT(" ",upgrade_news_catalogue," ") LIKE "%,' . $news_category
                . ',%" ORDER BY news_id ' . $orderby . ' LIMIT ' . $limit_start . ',' . $limit_end);
        return $news;
    }

    public static function getLastestNews($limit_start, $limit_end) {
        $news = GetRows('news_name,
                            news_key,
                            date_publisher'
                , 'news'
                , "flag_publisher = 1 AND relax = 0 AND status = 1
                            ORDER BY date_publisher DESC LIMIT " . $limit_start . "," . $limit_end);
        return $news;
    }

    public static function getInfoAuthor($author) {
        $info_author = GetOneRow('idadmin_control_user,
                                    user_name_visible,
                                    name,
                                    sex,
                                    birthday,
                                    phone,
                                    email,
                                    address,
                                    short_content,
                                    avarta'
                , 'admin_control_user'
                , "user_name_visible='" . $author . "'");
        return $info_author;
    }

    public static function getListNewsByAuthor($author, $except_news_name) {
        $news = GetRows('news_name,
                            news_catalogue,
                            news_image,
                            news_shortcontent,
                            news_content,
                            news_key,
                            help_flag,
                            date_publisher'
                , 'news'
                , 'flag_publisher="1" '
                . 'AND relax="0" '
                . 'AND status="1" '
                . 'AND translator="' . $author . '" '
                . 'AND news_name != "' . $except_news_name . '" '
                . 'ORDER BY news_id LIMIT 0,5');
        return $news;
    }

    public static function getInfoCategoryNews($array_category) {
        $info_category = GetRows('categorieslibary_name'
                , 'categorieslibary'
                , "categorieslibary_id IN (" . $array_category . ")");
        return $info_category;
    }

    public static function getAllNewsByAuthor($author) {
        $news = GetRows('news_name,
                            news_catalogue,
                            news_image,
                            news_shortcontent,
                            news_content,
                            news_key,
                            help_flag,
                            date_publisher,
                            translator'
                , 'news'
                , 'flag_publisher="1" '
                . 'AND relax="0" '
                . 'AND status="1" '
                . 'AND translator="' . $author . '" '
                . 'ORDER BY news_id');
        return $news;
    }

}

?>