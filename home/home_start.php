<?php

ob_start();
session_start();
error_reporting(0);

define('MSG_SEND_FORGOT_PASS', 'Một email xác nhận việc lấy lại mật khẩu đã gửi, hãy check mail của bạn.');
define('MSG_SEND_FORGOT_PASS_SUCCESS', 'Mật khẩu mới đã được gủi tới email của bạn.');
define('MSG_ERROR_FORGOT_PASS', 'Không thể gửi mail, xin vui long thử lai.');
define('MSG_NOT_FORGOT_PASS', 'Lỗi! Link kích hoạt không có hiệu lực.');
define('ACTION_ORDER', 'Đặt hàng');
define('ACTION_ORDER_FIRST', 'Đặt hàng lần đầu > 1.000.000');
define('ACTION_REGISTER', 'Đăng ký tài khoản');
define('ACTION_UPDATEUSER', 'Hoàn thành profile');
define('ACTION_COMMENT', 'Bình luận sản phẩm');
define('ACTION_REGISTER_PET', 'Hoàn thành pet profile');
define('ACTION_BIRTHDAY', 'Happy birthday');
define('ACTION_NEWYEAR', 'Happy new year');

//include('../include/zlib.php');
include('../class/mysql.php');
include('../config.php');
include('../web_config.php');
$obj_config = new config();
$mysql = new mysql();
include("../include/lag_config.php");
include("home_func.php");
include("../include/function.php");
include("../class/visitor.php");
include("../class/iba.php");
include("../class/xtemplate.php");

$xtemplate = new Template();
$xtemplate->path = 'modules/xtemplate/';
$setcolor = GetConfig('textcolor');
$setThemes = GetConfig('themes');
$header = GetConfig('header');
$body = GetConfig('body');
$visitor = new visitor();
$iba = new iba();

if (!empty($_COOKIE["UsNanapetCookie"]) && !isset($_SESSION['username'])) {
    $cookie_usr = $_COOKIE["UsNanapetCookie"];

    include('../class/rsa.class.php');

    $RSA = new RSA();

    $keys = $RSA->generate_keys('9990454949', '9990450271');

    $Userdecoded = checkValues($RSA->decrypt($cookie_usr, $keys[2], $keys[0]));

    if (GetOnef('email', 'user', 'email="' . $Userdecoded . '" and status >-1')) {
        update('user', array('last_login' => time()), 'username="' . $Userdecoded . '"');

        $_SESSION['username'] = $Userdecoded;

        $usr_info = GetOneRow('name', 'user', 'email = "' . $_SESSION['username'] . '"');

        $_SESSION['name'] = $usr_info['name'];
    } else {
        setcookie("UsNanapetCookie", "", time() - 3600);
    }
}
?>