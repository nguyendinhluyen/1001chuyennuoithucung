<?php

error_reporting(0);

define('ACTION_ORDER', 'Đặt hàng');

define('ACTION_ORDER_FIRST', 'Đặt hàng lần đầu > 1.000.000');

define('ACTION_ORDER_BIRTHDAY', 'Đặt hàng ngày sinh nhật');

//Khai báo đường dẫn;

define('_INCLUDE', '../../include/');

define('_CLASS', '../../class/');

define('_HOME', '../../');

define('_UPLOAD', '../../layout/images/logo/');

define('_UPLOAD_BANNER', '../../layout/images/logo/banner/');

define('_UPLOAD_BANNER_LEFT_1', '../../layout/images/logo/banner_left_1/');

define('_UPLOAD_BANNER_LEFT_2', '../../layout/images/logo/banner_left_2/');

define('_UPLOAD_IMG', '../../upload/product/');

define('_UPLOAD_IMG_DETAIL', '../../upload/product_detail/');

define('_UPLOAD_TEMPLATE', '../../upload/template/');

define('_UPLOAD_TEMPLATE_IMG', '../../upload/template/images/');

define('_UPLOAD_FILE', '../../upload/file/');

define('_UPLOAD_IMG_THUMB', '../../upload/product/thumb/');

define('_UPLOAD_IMG_NEWS', '../../upload/news/');

define('_UPLOAD_IMG_NEWS_THUMB', '../../upload/news/thumb/');

define('_UPLOAD_AD', '../../upload/adver/');

define('_UPLOAD_AD_THUMB', '../../upload/adver/thumb/');

define('_UPLOAD_THUMB_WEBSITE', '../../upload/website/thumb/');

define('_UPLOAD_WEBSITE', '../../upload/website/');

define('_STYLE_IMG', '../style/images/');

define('_AVARTA', '../../wish/avarta/');

include(_INCLUDE . 'zlib.php');

include(_CLASS . 'mysql.php');

include(_HOME . 'config.php');

include("../config_admin.php");

$obj_config = new config();

$mysql = new mysql();

ob_start();
?>