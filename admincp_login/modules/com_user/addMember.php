<?php

if (isset($_POST['cmd_submit_update_user'])) {
    $error = "";

    $sex = "1";

    $sex = input($_POST['gender']);

    $name = input($_POST['name'], 1);

    $email = input($_POST['email'], 1);

    $phone = input($_POST['phone'], 1);

    $password = input($_POST['password']);

    $repassword = input($_POST['repassword']);

    if (empty($name))
        $error .= "Chưa nhập họ tên" . "</br>";

    if (empty($email))
        $error .= "Chưa nhập email" . "</br>";

    if (empty($phone))
        $error .= "Chưa nhập số điện thoại" . "</br>";

    if (empty($password))
        $error .= "Chưa nhập password" . "</br>";

    if (empty($repassword))
        $error .= "Chưa nhập lại password" . "</br>";

    if ($password != $repassword)
        $error .= "Password nhập lại chưa chính xác." . "</br>";

    $row_account = "";

    $row_account = GetOneRow('email', 'user', "email ='" . $email . "'");
    if (!empty($row_account['email'])) {
        $error .= "Email đã có người sử dụng." . "</br>";
    }

    if (empty($error)) {
        if ($sex == "0")
            $name = "(Chị) " . $name;
        else
            $name = "(Anh) " . $name;

        $sql = "INSERT INTO user (sex,name,email,phone,password,status,date,update_flag,birthday_flag,GroupMember)
						      VALUES ('" . $sex . "'," .
                "'" . $name . "'," .
                "'" . $email . "'," .
                "'" . $phone . "'," .
                "'" . md5($password) . "'," .
                "'0'" . "," .
                "'" . time() . "'," .
                "'0'" . "," .
                "'0'" . "," .
                "'Chưa là thành viên'" .
                ")";

        $mysql->setQuery($sql);

        if ($mysql->query()) {
            header('location:./?show=memberList&full_name=*&email_memeber=*&phone_memeber=*');
        }
    }
}

$xtemplate->path = 'com_user/';

$content = $xtemplate->load('addMember');

$title = 'Thêm tài khoản khách hàng';

$content = $xtemplate->replace($content, array(
    'title' => 'Thêm tài khoản khách hàng',
    'error' => $error,
        ));
?>