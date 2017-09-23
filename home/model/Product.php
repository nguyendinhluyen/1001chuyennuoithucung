<?php

class Product {

    public static function getDiscountOfCustomer($user) {
        $honorUser_GroupMember = GetRows('GroupMember', 'user', 'email="' . $user . '"');
        if ($honorUser_GroupMember[0]['GroupMember'] != 'Chưa là thành viên') {
            $GroupMemberUser = GetRows('DisCount', 'GroupMember', 'NameGroupMember = "'
                    . $honorUser_GroupMember[0]['GroupMember'] . '"');
            return $GroupMemberUser[0]['DisCount'];
        } else {
            $honorUser = GetRows('honors', 'scores', 'user = "' . $user . '"');
            if ($honorUser[0]['honors'] != 'normal' && $honorUser[0]['honors'] != 'Normal') {
                $Discount_honorUser = GetRows('DisCount', 'VIPCustomer', 'NameVIPCustomer = "'
                        . $honorUser[0]['honors'] . '"');
                return $Discount_honorUser[0]['DisCount'];
            }
        }
        return 0;
    }

    public static function levelOfCustomer($user) {
        $GroupMemberUser = GetRows('GroupMember', 'user', 'email="' . $user . '"');
        if ($GroupMemberUser[0]['GroupMember'] == 'Chưa là thành viên') {
            $honorUser = GetRows('honors', 'scores', 'user = "' . $user . '"');
            return $honorUser[0]['honors'];
        } else {
            return $GroupMemberUser[0]['GroupMember'];
        }
        return 0;
    }

    public static function getPriceOfUnit() {
        $products = GetRows('PriceScore', 'PriceOfUnit', '1=1');
        return $products;
    }

    public static function getGalaryTransportFee() {
        $galaryTransportFees = GetRows('galary_id,
                                            galary_district_name,
                                            galary_begin_price,
                                            galary_end_price,
                                            galary_fee'
                , 'img_galary'
                , '_delete = 0');
        return $galaryTransportFees;
    }

    public static function getProductsByCategoryKey($category_key) {
        if ($category_key == 'sale-off') {
            $products = GetRows('products_id', 'products', "products_status = '1' AND product_encourage <> ''");
        } else {
            $Category = new Category();
            $products = array();
            $list_where = '( ';
            $category = $Category->getCategoryByKey($category_key);

            if ($category['level'] == 1) {
                $category_list = GetRows('categories_id', 'categories', 'parent_id = ' . $category['categories_id'] .
                        ' OR categories_id = ' . $category['categories_id']);

                for ($i = 0; $i < count($category_list); $i++) {
                    if ($i != (count($category_list) - 1 )) {
                        $list_where .= ' category_id = ' . $category_list[$i]['categories_id'] . " OR ";
                    } else {
                        $list_where .= ' category_id = ' . $category_list[$i]['categories_id'] . " )";
                    }
                }
                $products = GetRows('product_id', 'product_category', $list_where . " AND status = '1' GROUP BY product_id");
            } else {
                $products = GetRows('product_id', 'product_category', "status = '1' AND category_id = " . $category['categories_id'] . " GROUP BY product_id");
            }
        }
        return $products;
    }

    //order by
    public static function getProductsByCategoryKeyLimitOrderBy($products_list, $category_key, $limit_start, $limit_end, $order_by_type = 1) {
        //$order_by = 'products_date_added';
        //$sort_type = "DESC";
        $order_by = "CAST(REPLACE (products_price,'.','')AS SIGNED)";
        $sort_type = 'ASC';
        if ($order_by_type == 2) {
            $order_by = 'products_name';
            $sort_type = "DESC";
        }

        if ($order_by_type == 3) {
            $order_by = "CAST(REPLACE (products_price,'.','')AS SIGNED)";
            $sort_type = 'ASC';
        }

        if ($order_by_type == 4) {
            $order_by = "CAST(REPLACE (products_price,'.','')AS SIGNED)";
            $sort_type = 'DESC';
        }

        if ($order_by_type == 5) {
            $order_by = 'products_date_added';
            $sort_type = 'DESC';
        }

        if ($category_key == 'sale-off') {
            $products = GetRows('products_id,
                                    products_key,
                                    products_name,
                                    keywords,
                                    description,
                                    products_description,
                                    product_detail,
                                    products_image,
                                    products_price,
                                    CONVERT( products_price, DECIMAL ) AS price,
                                    product_encourage,
                                    price_unit,
                                    p_attribute,
                                    p_type,
                                    p_unit,
                                    p_color,
                                    p_encourage,
                                    categories_id,
                                    manufacturer'
                    , 'products'
                    , "products_status = '1'
                                        AND product_encourage <> '' order by " . $order_by . " " . $sort_type . " limit " . $limit_start . ',' . $limit_end);
        } else {
            $Category = new Category();
            $products = array();
            $list_products_id = "( ";
            for ($i = 0; $i < count($products_list); $i++) {
                if ($i != (count($products_list) - 1 )) {
                    $list_products_id .= ' products_id = ' . $products_list[$i]['product_id'] . " OR ";
                } else {
                    $list_products_id .= ' products_id = ' . $products_list[$i]['product_id'] . " )";
                }
            }

            $products = GetRows('products_id,
                                       products_key,
                                       products_name,
                                       keywords,
                                       description,
                                       products_description,
                                       product_detail,
                                       products_image,
                                       products_price,
                                       CONVERT( products_price, DECIMAL ) AS price,
                                       product_encourage,
                                       price_unit,
                                       p_attribute,
                                       p_type,
                                       p_unit,
                                       p_color,
                                       categories_id,
                                       manufacturer'
                    , 'products'
                    , $list_products_id . " AND products_status = '1' " . ' ORDER BY ' . $order_by . " " . $sort_type . ' limit ' . $limit_start . ',' . $limit_end);
        }
        return $products;
    }

    public static function getProductsNew() {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , 'products_status = 1  ORDER BY products_date_added DESC');
        return $products;
    }

    public static function getProductsNewCount() {
        $products = GetRows('count(products_id) as total'
                , 'products'
                , 'products_status = 1  ORDER BY products_date_added DESC');
        return $products[0]['total'];
    }

    public static function getProductsPromotion() {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , "products_status = 1 AND product_encourage <> '' ORDER BY products_date_added DESC");
        return $products;
    }

    public static function getProductsLastestByCategory($product_category) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , 'products_status = 1 AND CONCAT(" ",upgrade_categories_id," ") LIKE "%,' . $product_category . ',%" ORDER BY products_date_added ASC LIMIT 0,6');
        return $products;
    }

    public static function getProductsNewLimit($limit_start, $limit_end) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , 'products_status = 1 ORDER BY products_id DESC limit ' . $limit_start . ',' . $limit_end);
        return $products;
    }

    public static function getProductsPromotionLimit($limit_start, $limit_end) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , "products_status = 1 AND product_encourage <> '' ORDER BY products_date_added DESC limit " . $limit_start . ',' . $limit_end);
        return $products;
    }

    public static function getProductsBestSellLimit($limit_start, $limit_end) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , 'products_status = 1 AND p_bestsell = 1 ORDER BY products_date_added DESC  limit ' . $limit_start . ',' . $limit_end);
        return $products;
    }

    public static function getProductsByProductKey($product_key) {
        $product = GetOneRow('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                p_encourage,
                                categories_id,
                                manufacturer,
                                species,
                                origin,
                                manufacturer_link,
                                status,
                                product_detail_tacdung,
                                product_detail_phuhopcho,
                                product_detail_nguyenlieu_thanhphan,
                                product_detail_phantichdambao,
                                product_detail_huongdansudung,
                                product_detail_huongdanbaoquan,
                                product_detail_luuy,
                                product_detail_khuyenkhich,
                                product_detail_donggoi_thetich,
                                product_detail_nhasanxuat,
                                product_detail_xuatxu,
                                upgrade_categories_id', 'products', "products_status = 1 AND products_key = '" . $product_key . "'");
        return $product;
    }

    public static function getProductsColor($product_color) {
        $result = array();
        $result = explode('---', $product_color);
        return $result;
    }

    public static function getProductsType($product_type) {
        $result = array();
        $result = explode('---', $product_type);
        $arrProType = array();
        foreach ($result as $val) {
            $arr = array();
            $arr = explode('::', $val);
            $arrType = array();
            $arrType['type'] = $arr[0];
            $arrType['price'] = $arr[1];
            $arrProType[] = $arrType;
        }
        return $arrProType;
    }

    public static function getProductPath($categories_key) {
        $result = array();
        $cate = GetOneRow('categories_id,
                            categories_name,
                            categories_key,
                            level,
                            parent_id'
                , 'categories'
                , "categories_key = '" . $categories_key . "'");
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
                    , "categories_id = " . $cate['parent_id']);
            $arr2 = array();
            $arr2['name'] = $cates['categories_name'];
            $arr2['key'] = $cates['categories_key'];
            $result[] = $arr2;
        }
        return $result;
    }

    public static function getProductsByKeySearch($key_search) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                p_encourage,manufacturer'
                , 'products'
                , "products_status = 1 AND products_name like '%" . $key_search . "%'");
        return $products;
    }

    public static function getProductsByKeySearchLimit($key_search, $limit_start, $limit_end) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                p_encourage,
                                manufacturer'
                , 'products'
                , "products_status = 1 AND products_name like '%" . $key_search . "%' limit " . $limit_start . ',' . $limit_end);

        return $products;
    }

    public function saveRate($product_id, $rate, $user) {
        global $mysql;
        $sql = "INSERT INTO rate_product (product_id,rate,user,rate_date) values (";
        $sql .= $product_id . ',';
        $sql .= $rate . ",'";
        $sql .= $user . "',";
        $sql .= time();
        $sql .= ")";
        $mysql->setQuery($sql);
        $mysql->query();
    }

    public function calculationRate($product_id) {
        $result = GetRows('rate,count(rate) as total, sum(rate) as sum', 'rate_product', "product_id = " . $product_id);
        return $result;
    }

    public function calculationAvgRate($product_id) {
        $result = GetRows('rate', 'rate_product', "product_id = " . $product_id);
        $rate = 0;
        if (!empty($result)) {
            $total = 0;
            foreach ($result as $val) {
                $total += $val['rate'];
            }
            $n = count($result);
            $rate = $total / $n;
        }
        return $rate;
    }

    public function countRate($product_id) {
        $result = GetOneRow('count(comment) as total'
                , 'user_comment'
                , "id_product = " . $product_id);
        return $result['total'];
    }

    public function getProductImagessByProductId($product_id) {
        $products = GetRows('id,
                                  product_id,
                                  image_path'
                , 'image_product'
                , 'product_id = ' . $product_id . ' order by id DESC limit 0,4');
        return $products;
    }

    public function resetPromotion() {
        global $mysql;
        $sql = "update products set product_encourage =''";
        $mysql->setQuery($sql);
        if ($mysql->query()) {
            SetConfig('time_encourage', '');
        }
    }

    public static function getProductsInfoNextByProductKey($product_key, $category_key = '') {
        $Cate = new Category();
        $cat = $Cate->getCategoryByKey($category_key);
        $cat_parent = GetOneRow('categories_id', 'categories', 'parent_id = ' . $cat['categories_id']);
        $pro_id = GetOneRow('products_id', 'products'
                , "products_key = '" . $product_key . "'");
        $category_product = GetOneRow('product_id', 'product_category'
                , 'category_id = ' . $cat['categories_id'] . ' AND product_id > ' . $pro_id['products_id']
                . " AND status = '1' GROUP BY product_id ORDER BY product_id ASC limit 0,1");
        $products = GetOneRow('products_id,
                                    products_key,
                                    products_name'
                , 'products'
                , 'products_status = 1 AND products_id = ' . $category_product['product_id']);
        return $products;
    }

    public static function getProductsInfoPrevByProductKey($product_key, $category_key = '') {
        $Cate = new Category();
        $cat = $Cate->getCategoryByKey($category_key);
        $cat_parent = GetOneRow('categories_id', 'categories', 'parent_id = ' . $cat['categories_id']);
        $pro_id = GetOneRow('products_id', 'products', "products_key = '" . $product_key . "'");
        $category_product = GetOneRow('product_id', 'product_category'
                , 'category_id = ' . $cat['categories_id'] . ' AND product_id < ' . $pro_id['products_id']
                . " AND status = '1' GROUP BY product_id ORDER BY product_id DESC limit 0,1");
        $products = GetOneRow('products_id,
                                    products_key,
                                    products_name'
                , 'products'
                , 'products_status = 1 AND products_id = ' . $category_product['product_id']);
        return $products;
    }

    public function getMyFavoriteByEmail($email) {
        $favorites = GetRows('id,
                                product_name,
                                product_key,
                                product_type,
                                product_color,
                                product_price,
                                product_quantity'
                , 'tbl_favorite'
                , "email = '" . $email . "'");
        return $favorites;
    }

    public function getCoupon($code_coupon) {
        $couponResult = GetOneRow('id_coupon,
                                    name_coupon,
                                    code_coupon,
                                    discount_coupon,
                                    begin_cost_coupon,
                                    end_cost_coupon,
                                    category_coupon,
                                    date_deadline_coupon'
                , 'coupon'
                , "code_coupon='" . $code_coupon . "' AND status_coupon = '1'");
        return $couponResult;
    }

    public static function getProductsLimitOrderById($limit_start, $limit_end, $condition) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , 'products_status=1 ' . $condition . ' ORDER BY products_id ASC LIMIT ' . $limit_start . ',' . $limit_end);
        return $products;
    }

    public static function getLastestProductsOnWeek($date_range) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , 'products_status=1 AND from_unixtime(products_date_added,"%Y-%m-%d") BETWEEN DATE(DATE_SUB(NOW(),INTERVAL ' . $date_range . ' DAY)) AND DATE(NOW()) ORDER BY products_id DESC');
        return $products;
    }

    public static function getProductsInWeek($date_range, $condition) {
        $products = GetRows('products_id,
                                products_key,
                                products_name,
                                keywords,
                                description,
                                products_description,
                                product_detail,
                                products_image,
                                products_price,
                                product_encourage,
                                price_unit,
                                p_attribute,
                                p_type,
                                p_unit,
                                p_color,
                                categories_id,
                                manufacturer'
                , 'products'
                , 'products_status = 1 ' . $condition
                . ' AND from_unixtime(products_date_added,"%Y-%m-%d") BETWEEN DATE(DATE_SUB(NOW(),INTERVAL ' . $date_range
                . ' DAY)) AND DATE(NOW())'
                . ' ORDER BY products_id DESC');
        return $products;
    }

    public static function getPreviousLimitProduct($config_name) {
        $config = GetRows('config_name,
                               config_value,
                               date_added'
                , 'config'
                , 'config_name="' . $config_name . '"');
        return $config;
    }

    public static function countAllProduct() {
        $products = GetRows('products_id'
                , 'products'
                , 'products_status = 1');
        return count($products);
    }

    public static function countAllWithConditionProduct($condition) {
        $products = GetRows('products_id'
                , 'products'
                , 'products_status = 1 ' . $condition);
        return count($products);
    }

    public static function updateLimitProduct($limitValue, $config_name) {
        global $mysql;
        $sql = "UPDATE config SET config_value ='" . $limitValue . "'" . " , date_added='" . date('Y-m-d') . "' WHERE config_name='" . $config_name . "'";
        $mysql->setQuery($sql);
        if ($mysql->query()) {
            return true;
        }
    }

}

?>