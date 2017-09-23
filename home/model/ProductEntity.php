<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @Entity
 * @Table(name="products")
 */
class Products {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $products_id;

    function getProducts_id() {
        return $this->products_id;
    }

    function setProducts_id($products_id) {
        $this->products_id = $products_id;
    }

    private $products_name;

    function getProducts_name() {
        return $this->products_name;
    }

    function setProducts_name($products_name) {
        $this->products_name = $products_name;
    }

//    private $keywords;    
//    private $description;
//    private $products_key;    
//    private $products_image;        
//    private $view_count;
//    private $products_price;
//    private $product_encourage;
//    private $price_unit;
//    private $manufacturer;
//    private $manufacturer_link;
//    private $origin;
//    private $p_type;
//    private $p_unit;
//    private $p_attribute;
//    private $p_color;
//    private $products_date_added;
//    private $modified_date;
//    private $products_status;
//    private $products_ordered;
//    private $products_description;
//    private $description_ads_vi;
//    private $product_detail;
//    private $categories_id;
//    private $p_new;
//    private $p_bestsell;
//    private $p_encourage;
//    private $language;
//    private $username;
//    private $sort_order;
//    private $recycle_bin;
//    private $species;
//    private $status;
//    private $product_detail_tacdung;
//    private $product_detail_phuhopcho;
//    private $product_detail_nguyenlieu_thanhphan;
//    private $product_detail_phantichdambao;
//    private $product_detail_huongdansudung;
//    private $product_detail_huongdanbaoquan;
//    private $product_detail_luuy;
//    private $product_detail_khuyenkhich;
//    private $product_detail_donggoi_thetich;
//    private $product_detail_nhasanxuat;
//    private $product_detail_xuatxu;
//    private $upgrade_categories_id;       
}
