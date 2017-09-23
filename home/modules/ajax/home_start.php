<?php

@session_start();
error_reporting(0);

define('ACTION_COMMENT', 'Bình luận sản phẩm');

include('../../../include/zlib.php');
include('../../../class/mysql.php');
include('../../../config.php');
include('../../../web_config.php');
$obj_config = new config();
$mysql = new mysql();
include("../../../include/lag_config.php");
include("home_func.php");
include("../../../include/function.php");
include("../../../class/visitor.php");
include("../../../class/iba.php");
include("../../../class/xtemplate.php");
$xtemplate = new Template();
$xtemplate->path = '';
$setcolor = GetConfig('textcolor');
$setThemes = GetConfig('themes');
$header = GetConfig('header');
$body = GetConfig('body');
$visitor = new visitor();
$iba = new iba();

include '../../model/Category.php'; //category
include '../../model/Product.php'; //product
include '../../model/News.php'; //news
include '../../model/CartModel.php';
include '../../model/User.php';
include '../../model/Score.php';
include '../../model/ImageSlider.php';
include '../../lib/common.php'; //news
include '../../lib/Cart.php'; //cart
//echo $visitor->online;
?>