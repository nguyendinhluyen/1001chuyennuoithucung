<?php

$title = $arr_lang['changacc'];

$adminFile = "./com_admin/adminFile.log";
$CF = fopen($adminFile, "r");
$arrnow = fread($CF, filesize($adminFile));
fclose($CF);
$arrnow = explode(':', $arrnow);

if (isset($_POST['btnSub'])) {
    $txtpassword = output($_POST['txtpassword']);

    $usernameNew = output($_POST['usernameNew']);

    $passwordNew = output($_POST['passwordNew']);

    $passwordNew2 = output($_POST['passwordNew2']);

    if (!isset($txtpassword{0})) {
        $error.='<li>' . $arr_lang['err_enter_pass'] . '</li>';
    } else if ($txtpassword == $_SESSION['admin'][1]) {
        if (isset($usernameNew{0})) {
            if (isset($usernameNew{4})) {

                $NewName = md5(base64_encode(md5($usernameNew)));

                $_SESSION['admin'][0] = $usernameNew;
            } else {
                $error.='<li>' . $arr_lang['err_user_is_short'] . '</li>';
            }
        }

        if (isset($passwordNew{0})) {

            if (isset($passwordNew{4})) {

                if ($passwordNew == $passwordNew2) {
                    $NewPass = md5(base64_encode(md5($passwordNew)));

                    $_SESSION['admin'][1] = $passwordNew;
                } else {
                    $error.='<li>' . $arr_lang['err_reenter_pass'] . '</li>';
                }
            } else {

                $error.='<li>' . $arr_lang['err_pass_is_short'] . '</li>';
            }
        }
    } else {

        $error.= '<li>' . $arr_lang['err_pass_not'] . '</li>';
    }

    if (empty($error)) {
        $NewName = (!empty($NewName)) ? $NewName : md5(base64_encode(md5($_SESSION['admin'][0])));

        $NewPass = (!empty($NewPass)) ? $NewPass : md5(base64_encode(md5($_SESSION['admin'][1])));

        $arr_new_admin = $NewName . ':' . $NewPass . ':' . $_SESSION['admin'][2];

        $adminFile = "./com_admin/adminFile.log";

        $CF = fopen($adminFile, "w");

        fwrite($CF, $arr_new_admin);

        fclose($CF);

        $error .= 'Cập nhật thành công';
    } else {
        $error = '<ul>' . $error . '</ul>';
    }
}

$xtemplate->path = 'com_account/';

$content = $xtemplate->load('account');

$content = $xtemplate->replace($content, array(
    'title' => $title,
    'note_change_admin' => $arr_lang['note_change_admin'],
    'new' => $arr_lang['new'],
    '5char' => $arr_lang['5char'],
    'psecurity' => $arr_lang['psecurity'],
    'point' => $arr_lang['point'],
    'reEnterpass' => $arr_lang['reEnterpass'],
    'usernameNew' => $usernameNew,
    'username' => $arrnow[0],
    'error' => $error,
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>