<?php

class Product {

    public static function getProductsByCategoryId($category_id) {

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and (categories_id in (select categories_id from  categories where parent_id=' . $category_id . ') or categories_id=' . $category_id . ')');

        return $products;
    }

    public static function getProductsByCategoryIdLimit($category_id, $limit_start, $limit_end) {

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and (categories_id in (select categories_id from  categories where parent_id=' . $category_id . ') or categories_id=' . $category_id . ') limit ' . $limit_start . ',' . $limit_end);

        return $products;
    }

    public static function getGalaryTransportFee() {
        $galaryTransportFees = GetRows('galary_id,galary_district_name,galary_begin_price,galary_end_price,galary_fee', 'img_galary', '_delete = 0');

        return $galaryTransportFees;
    }

    public static function getProductsByCategoryKey($category_id) {
        if ($category_id == 'sale-off') {
            $products = GetRows('products_id', 'products', "products_status = '1' AND product_encourage <> ''");
        } else {
            $Category = new Category();

            $products = array();

            $list_where = '( ';

            $category = $Category->getCategoryById($category_id);

            if ($category['level'] == 1) {
                $category_list = GetRows('categories_id', 'categories', 'parent_id = ' . $category['categories_id'] .
                        ' OR categories_id = ' . $category['categories_id']);
                for ($i = 0; $i < count($category_list); $i++) {
                    if ($i != (count($category_list) - 1 ))
                        $list_where .= ' category_id = ' . $category_list[$i]['categories_id'] . " OR ";
                    else
                        $list_where .= ' category_id = ' . $category_list[$i]['categories_id'] . " )";
                }

                $products = GetRows('product_id', 'product_category', $list_where . " AND status = '1' GROUP BY product_id");
            }
            else {
                $products = GetRows('product_id', 'product_category', "status = '1' AND category_id = " . $category['categories_id'] . " GROUP BY product_id");
            }
        }

        return $products;
    }

    public static function getProductsByCategoryKeyLimit($category_key, $limit_start, $limit_end) {

        if ($category_key == 'sale-off') {

            $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,p_encourage,categories_id,manufacturer', 'products', "products_status = 1 and product_encourage <> '' limit " . $limit_start . ',' . $limit_end);
        } else {

            $Category = new Category();

            $products = array();

            $category = $Category->getCategoryByKey($category_key); //echo $category['parent_id'];

            if ($category['level'] == 1) {

                $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and (categories_id in (select categories_id from  categories where parent_id=' . $category['categories_id'] . ') or categories_id=' . $category['categories_id'] . ') limit ' . $limit_start . ',' . $limit_end);
            } else {

                $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and categories_id=' . $category['categories_id'] . ' limit ' . $limit_start . ',' . $limit_end);
            }
        }

        return $products;
    }

    //order by

    public static function getProductsByCategoryKeyLimitOrderBy($category_key, $limit_start, $limit_end, $order_by_type = 1) {

        $order_by = 'products_name';

        $sort_type = "ASC";

        if ($order_by_type == 2) {

            $order_by = 'price';
        }

        if ($order_by_type == 3) {

            $order_by = 'price';

            $sort_type = 'DESC';
        }

        if ($order_by_type == 4) {

            $order_by = 'products_date_added';

            $sort_type = 'DESC';
        }



        if ($category_key == 'sale-off') {

            $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,CONVERT( products_price, DECIMAL ) AS price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,p_encourage,categories_id,manufacturer', 'products', "products_status = 1 and product_encourage <> '' order by " . $order_by . " " . $sort_type . " limit " . $limit_start . ',' . $limit_end);
        } else {

            $Category = new Category();

            $products = array();

            $category = $Category->getCategoryByKey($category_key); //echo $category['parent_id'];

            if ($category['level'] == 1) {

                $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,CONVERT( products_price, DECIMAL ) AS price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and (categories_id in (select categories_id from  categories where parent_id=' . $category['categories_id'] . ') or categories_id=' . $category['categories_id'] . ') order by ' . $order_by . " " . $sort_type . ' limit ' . $limit_start . ',' . $limit_end);
            } else {

                $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,CONVERT( products_price, DECIMAL ) AS price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and categories_id=' . $category['categories_id'] . ' order by ' . $order_by . " " . $sort_type . ' limit ' . $limit_start . ',' . $limit_end);
            }
        }

        return $products;
    }

    public static function getProductsNew() {

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1  ORDER BY products_date_added DESC');

        return $products;
    }

    public static function getProductsPromotion() {

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', "products_status = 1 and product_encourage <> '' ORDER BY products_date_added DESC");

        return $products;
    }

    public static function getProductsBestSell() {

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and p_bestsell = 1 ORDER BY products_date_added DESC');

        return $products;
    }

    public static function getProductsNewLimit($limit_start, $limit_end) {

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 ORDER BY products_date_added DESC  limit ' . $limit_start . ',' . $limit_end);

        return $products;
    }

    public static function getProductsPromotionLimit($limit_start, $limit_end) {

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', "products_status = 1 and product_encourage <> '' ORDER BY products_date_added DESC  limit " . $limit_start . ',' . $limit_end);

        return $products;
    }

    public static function getProductsBestSellLimit($limit_start, $limit_end) {

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and p_bestsell = 1 ORDER BY products_date_added DESC  limit ' . $limit_start . ',' . $limit_end);

        return $products;
    }

    public static function getProductsByProductKey($product_key) {

        //VI TRI THEM
        $product = GetOneRow('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,p_encourage,categories_id,manufacturer,species,origin,manufacturer_link,status', 'products', "products_status = 1 and products_key = '" . $product_key . "'");

        return $product;
    }

    public static function getProductsByProductKey_2($product_key) {

        //VI TRI THEM
        $product = GetOneRow('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,p_encourage,categories_id,manufacturer,species,origin,manufacturer_link,status', 'products', "products_key = '" . $product_key . "'");

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

    public static function getProductPath($product_key) {

        $result = array();

        $category = GetOneRow('categories_id'
                , 'products'
                , "products_key ='" . $product_key . "'");

        $cate = GetOneRow('categories_id,
		                   categories_name,
		                   categories_key,
		                   level,
		                   parent_id'
                , 'categories'
                , "categories_id =" . $category['categories_id']);

        $arr = array();

        $arr['name'] = $cate['categories_name'];

        $arr['key'] = $cate['categories_key'];

        $result[] = $arr;

        if ($cate['parent_id'] > 0) {

            $cates = GetOneRow('categories_id,
			                    categories_name,
			                    categories_key,
			                    level,
			                    parent_id', 'categories', "categories_id =" . $cate['parent_id']);

            $arr2 = array();

            $arr2['name'] = $cates['categories_name'];

            $arr2['key'] = $cates['categories_key'];

            $result[] = $arr2;
        }

        return $result;
    }

    //search

    public static function getProductsByKeySearch($key_search) {

        // 		$Category =  new Category();
        // 		$products = array();
        // 		$category = $Category->getCategoryByKey($category_key);//echo $category['parent_id'];
        // 		if($category['level'] == 1){
        // 			$products   = GetRows('products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,price_unit,p_type,p_unit,p_color,categories_id','products','categories_id in (select categories_id from  categories where parent_id='.$category['categories_id'].') or categories_id='.$category['categories_id'].' limit '.$limit_start.','.$limit_end);
        // 		}
        // 		else{
        // 			$products   = GetRows('products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,price_unit,p_type,p_unit,p_color,categories_id','products','categories_id='.$category['categories_id'].' limit '.$limit_start.','.$limit_end);
        // 		}

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,p_encourage,manufacturer', 'products', "products_status = 1 and products_name like '%" . $key_search . "%'");

        return $products;
    }

    //search

    public static function getProductsByKeySearchLimit($key_search, $limit_start, $limit_end) {

// 		$Category =  new Category();
// 		$products = array();
// 		$category = $Category->getCategoryByKey($category_key);//echo $category['parent_id'];
// 		if($category['level'] == 1){
// 			$products   = GetRows('products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,price_unit,p_type,p_unit,p_color,categories_id','products','categories_id in (select categories_id from  categories where parent_id='.$category['categories_id'].') or categories_id='.$category['categories_id'].' limit '.$limit_start.','.$limit_end);
// 		}
// 		else{
// 			$products   = GetRows('products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,price_unit,p_type,p_unit,p_color,categories_id','products','categories_id='.$category['categories_id'].' limit '.$limit_start.','.$limit_end);
// 		}

        $products = GetRows('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,p_encourage,manufacturer', 'products', "products_status = 1 and products_name like '%" . $key_search . "%' limit " . $limit_start . ',' . $limit_end);

        return $products;
    }

    public function saveRate($product_id, $rate, $user) {

        global $mysql;

        $sql = "insert into rate_product (product_id,rate,user,rate_date) values (";

        $sql .= $product_id . ',';

        $sql .= $rate . ",'";

        $sql .= $user . "',";

        $sql .= time();

        $sql .= ")";

        $mysql->setQuery($sql);

        $mysql->query();
    }

    public function calculationRate($product_id) {

        $result = GetRows('rate,count(rate) as total', 'rate_product', "product_id = " . $product_id . " group by rate");

        return $result;
    }

    public function calculationAvgRate($product_id) {

        $result = GetRows('rate', 'rate_product', "product_id = " . $product_id); //print_r($result);

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

        $result = GetOneRow('count(comment) as total', 'user_comment', "id_product = " . $product_id);

        return $result['total'];
    }

    public function getProductImagessByProductId($product_id) {

        $products = GetRows('id,product_id,image_path', 'image_product', 'product_id = ' . $product_id . ' order by id DESC limit 0,4');

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

        $pro_id = GetOneRow('products_id', 'products', "products_key = '" . $product_key . "'");

        //if($cat['level'] == 1 && empty($cat_parent)){
        //$products  = GetOneRow('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer','products','products_status = 1 and products_id > '.$pro_id['products_id'].' and categories_id in (select categories_id from categories where parent_id = '.$cat['categories_id'].') order by products_id ASC limit 0,1');
        //}
        //else {

        $products = GetOneRow('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and products_id > ' . $pro_id['products_id'] . ' and categories_id = ' . $cat['categories_id'] . ' order by products_id ASC limit 0,1');

        //}

        return $products;
    }

    public static function getProductsInfoPrevByProductKey($product_key, $category_key = '') {

        $Cate = new Category();

        $cat = $Cate->getCategoryByKey($category_key);

        $cat_parent = GetOneRow('categories_id', 'categories', 'parent_id = ' . $cat['categories_id']);

        $pro_id = GetOneRow('products_id', 'products', "products_key = '" . $product_key . "'");

        //if($cat['level'] == 1 && empty($cat_parent)){
        //$products  = GetOneRow('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer','products','products_status = 1 and products_id < '.$pro_id['products_id'].' and categories_id in (select categories_id from categories where parent_id = '.$cat['categories_id'].') order by products_id ASC limit 0,1');
        //}
        //else {

        $products = GetOneRow('products_id,products_key,products_name,keywords,description,products_description,product_detail,products_image,products_price,product_encourage,price_unit,p_attribute,p_type,p_unit,p_color,categories_id,manufacturer', 'products', 'products_status = 1 and products_id < ' . $pro_id['products_id'] . ' and categories_id = ' . $cat['categories_id'] . ' order by products_id DESC limit 0,1');

        //}

        return $products;
    }

    public function getMyFavoriteByEmail($email) {

        $favorites = GetRows('id,product_name,product_key,product_type,product_color,product_price,product_quantity', 'tbl_favorite', "email = '" . $email . "'");

        return $favorites;
    }

}

?>