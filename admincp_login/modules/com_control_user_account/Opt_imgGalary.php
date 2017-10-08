<?php

function checkedCategory($checktype, $numbercategory) {
    $string_checked_box_id = '';
    for ($j = 1; $j <= $numbercategory; $j++) {
        $checked_box_id = "check_box_admin_" . $checktype;
        $checked_box_id .= $j;
        if (isset($_POST[$checked_box_id])) {
            $arr_checked_box = explode("_", $checked_box_id);
            $string_checked_box_id .= $arr_checked_box[count($arr_checked_box) - 1] . ";";
        }
    }
    return $string_checked_box_id;
}

$title = "&nbsp; Thêm thành viên";
$id = intval($_GET['id']);
$update = 0;
$new = "";
$loginusername = "";
$passwordNew = "";
$checked_box_save = "";
$display_change_pass = "";
$readonly = "";
if (isset($_GET['id'])) {
    $title = "&nbsp; Cập nhật thành viên";
    $update = 1;
    $new = "mới";
    $row = GetOneRow('user_name, checked_box_save,user_name_visible'
            , 'admin_control_user', 'idadmin_control_user =' . $id);
    $loginusername = $row['user_name'];
    $checked_box_save = $row['checked_box_save'];
    $usernamevisible = $row['user_name_visible'];
    $display_change_pass = "display:block";
    $readonly = "readonly";
    if (empty($row)) {
        header('location:./?show=Opt_com_control_user_account');
    }
}

if (isset($_POST['btnSub'])) {
    $string_checked_box_id = "";
    // Category "Thông tin chung website"
    $string_checked_box_id .= checkedCategory(1, 4);
    // Category "Tin tức"
    $string_checked_box_id .= checkedCategory(2, 2);
    // Category "Cấu hình website"
    $string_checked_box_id .= checkedCategory(3, 2);

    $loginusername = $_POST['loginusername'];
    $usernamevisible = $_POST['saveusername'];
    $passwordNew = $_POST['passwordNew'];
    $passwordNew2 = $_POST['passwordNew2'];
    $HashPassword = md5(base64_encode(md5($passwordNew)));
    $adminFile = "./com_admin/adminFile.log";
    $CF = fopen($adminFile, "r");
    $arrnow = fread($CF, filesize($adminFile));
    fclose($CF);
    $arrnow = explode(':', $arrnow);
    // Insert
    if ($update == 0) {
        if (isset($loginusername{4}) AND isset($usernamevisible{4})) {
            $row = GetOneRow('user_name', 'admin_control_user', 'user_name="' . $loginusername . '"');
            if (empty($row) && $arrnow [0] != md5(base64_encode(md5($loginusername)))) {
                //Check password length
                if (isset($passwordNew{4}) AND ! empty($passwordNew)) {
                    //Check password retype
                    if ($passwordNew == $passwordNew2) {
                        $data = array(
                            'user_name' => $loginusername,
                            'type_of_user' => 'user',
                            'user_name_visible' => $usernamevisible,
                            'password' => $HashPassword,
                            'dateadd' => time(),
                            'checked_box_save' => $string_checked_box_id
                        );
                        $lastID = insert('admin_control_user', $data);
                        header('location:./?show=com_control_user_account&order='
                                . $_GET['order'] . '&p=' . intval($_GET['p']));
                    } else {
                        $error = "Mật khẩu và mật khẩu nhập lại không trùng!";
                    }
                } else {
                    $error = "Mật khẩu quá ngắn!";
                }
            } else {
                $error = "Tên đăng nhập này đã có người sử dụng!";
            }
        } else {
            $error = "Tên đăng nhập hoặc tên hiển thị quá ngắn!";
        }
    }

    // Update
    else {
        if (isset($loginusername{4}) AND isset($usernamevisible{4})) {
            $row = GetOneRow('user_name', 'admin_control_user', 'user_name="' . $loginusername . '"' . " AND idadmin_control_user!=" . $id);

            if (empty($row) && $arrnow[0] != md5(base64_encode(md5($loginusername)))) {
                // Check update password
                if (isset($_POST['id_check_change_pass'])) {
                    if (isset($passwordNew{4})) {
                        if ($passwordNew == $passwordNew2) {
                            $data = array(
                                'user_name' => $loginusername,
                                'user_name_visible' => $usernamevisible,
                                'type_of_user' => 'user',
                                'password' => $HashPassword,
                                'dateadd' => time(),
                                'checked_box_save' => $string_checked_box_id
                            );
                            update('admin_control_user', $data, 'idadmin_control_user = ' . $id);
                            header('location:./?show=com_control_user_account&order='
                                    . $_GET['order'] . '&p=' . intval($_GET['p']));
                        } else {
                            $error = "Mật khẩu và mật khẩu nhập lại không trùng!";
                        }
                    } else {
                        $error = "Mật khẩu quá ngắn!";
                    }
                } else {
                    $data = array(
                        'user_name' => $loginusername,
                        'user_name_visible' => $usernamevisible,
                        'checked_box_save' => $string_checked_box_id
                    );
                    update('admin_control_user', $data, 'idadmin_control_user = ' . $id);
                    header('location:./?show=com_control_user_account&order='
                            . $_GET['order'] . '&p=' . intval($_GET['p']));
                }
            } else {
                $error = "Tên đăng nhập này đã có người sử dụng!";
            }
        } else {
            $error = "Tên đăng nhập hoặc tên hiển thị quá ngắn!";
        }
    }
}

$xtemplate->path = 'com_control_user_account/';
$content = $xtemplate->load('Opt_imgGalary');
$content = $xtemplate->replace($content, array(
    'title' => $title,
    'note_change_admin' => $arr_lang['note_change_admin'],
    'new' => $new,
    '5char' => $arr_lang['5char'],
    'psecurity' => $arr_lang['psecurity'],
    'point' => $arr_lang['point'],
    'reEnterpass' => $arr_lang['reEnterpass'],
    'loginusername' => $loginusername,
    'passwordNew' => $passwordNew,
    'error' => $error,
    'display_change_pass' => $display_change_pass,
    'readonly' => $readonly,
    'saveusername' => $usernamevisible
        ));

if ($update == 1) {
    if ($checked_box_save != "") {
        $array_checked_box_save = split(';', $checked_box_save);
        for ($i = 0; $i < count($array_checked_box_save) - 1; $i++) {
            $content = $xtemplate->replace($content, array(
                $array_checked_box_save[$i] => 'checked',
            ));
        }
    }
}
?>