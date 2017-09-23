<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
error_reporting(0);
ob_start();
define('_INC1', '../include/');
define('_INC2', '../class/');
define('_INC3', '../');
include(_INC1 . 'function.php');
include(_INC2 . 'mysql.php');
include(_INC3 . 'config.php');

$obj_config = new config();
$mysql = new mysql();

if (!isset($_SESSION)) {
    session_write_close();
    session_start();
} else {
    session_start();
}

if (isset($_SESSION['admin'])) {
    header('location:./modules/');
} else {
    if (($_COOKIE['login'] > 3) && ($_SESSION['timewait'] > time())) {
        $disabled = 'disabled';
        $time = $_SESSION['timewait'] - time();
        $error = "<p style = 'color:red;text-align:center'>Bạn đã đăng nhập sai 3 lần , <b>"
                . $time . "s</b> sau bạn mới đăng nhập lại được</p>";
        $refresh = "<meta http-equiv = 'refresh' content = '" . $time . ";url=./'>";
    } else if (isset($_POST['btnlogin'])) {
        $visible_user_name = "";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $row = GetOneRow('idadmin_control_user, user_name, datemodify, checked_box_save, user_name_visible'
                , 'admin_control_user'
                , 'user_name="' . $username . '" AND password = "' . md5(base64_encode(md5($password))) . '"');
        $adminFile = "./modules/com_admin/adminFile.log";
        $CF = fopen($adminFile, "r");
        $arr = fread($CF, filesize($adminFile));
        fclose($CF);
        $arr = explode(':', $arr);
        $slectedVi = ($_POST['dllang'] == 'vi') ? 'selected' : '';
        $slectedEn = ($_POST['dllang'] == 'en') ? 'selected' : '';

        if ((md5(base64_encode(md5($username))) == $arr[0]) && (md5(base64_encode(md5($password))) == $arr[1])) {
            $accescontrol = ';1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23;24;25;26;27;28;29;30;31;32;33;34;35;';
            $visible_user_name = "NanaPet";
            $_SESSION['admin'] = array($username, $password, $arr[2], $accescontrol, $visible_user_name, 0);
            $_SESSION['lag'] = $_POST['dllang'];
            $arr = md5(base64_encode(md5($username))) . ':'
                    . md5(base64_encode(md5($password))) . ':' . time();
            $CF = fopen($adminFile, "w");
            fwrite($CF, $arr);
            fclose($CF);
            $return = $_SESSION['return'];
            unset($_SESSION['return']);
            unset($_SESSION['timewait']);
            setcookie('login', 1, -1);
            header('location:./modules/?' . $return);
        } else if (!empty($row) && (md5(base64_encode(md5($username))) != $arr[0])) {
            $visible_user_name = $row['user_name_visible'];
            if (empty($row['datemodify'])) {
                $_SESSION['admin'] = array($username, $password, time(), $row['checked_box_save'], $visible_user_name,
                    $row['idadmin_control_user']);
            } else {
                $_SESSION['admin'] = array($username, $password, $row['datemodify'], $row['checked_box_save'], $visible_user_name,
                    $row['idadmin_control_user']);
            }

            $data = array(
                'datemodify' => time(),
            );

            update('admin_control_user', $data, 'idadmin_control_user=' . $row['idadmin_control_user']);
            $_SESSION['lag'] = $_POST['dllang'];
            $return = $_SESSION['return'];
            unset($_SESSION['return']);
            unset($_SESSION['timewait']);
            setcookie('login', 1, -1);
            header('location:./modules/?' . $return);
        } else {
            if (!isset($_COOKIE['login'])) {
                setcookie('login', 1);
            } else {
                setcookie('login', $_COOKIE['login'] + 1);
                $_SESSION['timewait'] = time() + 60;
            }
            $pathLog = "./modules/com_admin/login.log";
            $textLog = time() . '|N2|' . $_SERVER['REMOTE_ADDR'] . '|N2|'
                    . $_SERVER['HTTP_USER_AGENT'] . '/n';
            $CF = fopen($pathLog, "a+");
            fwrite($CF, $textLog);
            fclose($CF);
            $error = "<p style = 'color:red;text-align:center'>Tên đăng nhập/mật khẩu không chính xác</p>";
        }
    }
    include('../class/xtemplate.php');
    $xtemplate = new Template();
    $xtemplate->path = 'modules/com_admin/';
    $content = $xtemplate->load('login');
    $content = $xtemplate->replace($content, array(
        'slectedVi' => $slectedVi,
        'slectedEn' => $slectedEn,
        'disabled' => $disabled,
        'error' => $error,
        'refresh' => $refresh
    ));
    $xtemplate->show($content);
}
?>