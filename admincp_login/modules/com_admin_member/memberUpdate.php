<?php
$id = $_SESSION['admin'][5];
if (isset($id) && $id !== 0) {
    if (isset($_GET['success']) && $_GET['success'] === "true") {
        ?>
        <script>
            alert("Cập nhật thành công!");
        </script>
        <?php

    }    
    $row_ac = GetOneRow('user_name,
                        name,
                        sex,
                        birthday,
                        avarta,
                        phone,
                        email,
                        address,
                        short_content,
                        facebook,
                        google,
                        twitter,
                        linkedin', 'admin_control_user', "idadmin_control_user = '$id'");
    $selected1 = "";
    $selected2 = "";
    if ($row_ac['sex'] == 0) {
        $selected2 = "selected";
    }

    if ($row_ac['sex'] == 1) {
        $selected1 = "selected";
    }

    $adressformat = "";
    $selected4 = "selected";
    if (trim($row_ac['address']) != "") {
        list($text_address,
                $text_street,
                $text_ward,
                $text_chung_cu,
                $text_lau,
                $text_can_ho,
                $text_district,
                $text_city ) = split(' nanapet.com ', $row_ac['address']);

        $adressformat = $text_can_ho . ' ' . $text_lau . ' '
                . $text_chung_cu . ' - ' . $text_address . ' '
                . $text_street . ' ' . $text_ward . ' '
                . $text_district . ' ' . $text_city;

        $text_street = str_replace("Đường ", "", $text_street);
        $text_ward = str_replace("Phường ", "", $text_ward);
        $text_chung_cu = str_replace("Chung cư/Tòa nhà ", "", $text_chung_cu);
        $text_lau = str_replace("Lầu ", "", $text_lau);
        $text_can_ho = str_replace("Căn hộ ", "", $text_can_ho);
        if ($text_can_ho == "") {
            $adressformat = str_replace("Căn hộ  ", "", $adressformat);
        }

        if ($text_lau == "") {
            $adressformat = str_replace("Lầu  ", "", $adressformat);
        }

        if ($text_chung_cu == "") {
            $adressformat = str_replace("Chung cư/Tòa nhà  - ", "", $adressformat);
        }
        $selected4 = "";
        $selected5 = "selected";
    }
    $selected_city = "selected_" . $text_city;

    if (isset($_POST['cmd_submit_update_user'])) {
        $number_address = $_POST['text_edit_number_address'];
        $number_street = $_POST['text_edit_number_street'];
        $number_street = str_replace("Đường", "", $number_street);
        $number_ward = $_POST['text_edit_number_ward'];
        $number_ward = str_replace("Phường", "", $number_ward);
        $buildings = $_POST['text_edit_number_address_Chung_Cu'];
        $floor = $_POST['text_edit_floor_Chung_Cu'];
        $room = $_POST['text_edit_room_Chung_Cu'];
        $number_city = $_POST['list_city_buy'];
        $number_district = $_POST['list_district_buy'];
        $email = input($_POST['email'], 1);
        $short_content = input($_POST['short_content']);
        $facebook = input($_POST['facebook']);
        $google = input($_POST['google']);
        $twitter = input($_POST['twitter']);
        $linkedin = input($_POST['linkedin']);
        $error = "";

        $name = input($_POST['name'], 1);
        $phone = input($_POST['phone'], 1);
        $birthday = input(strtotime($_POST['birthday']), 1);

        $address = trim($number_address) .
                ' nanapet.com Đường ' . trim($number_street) .
                ' nanapet.com Phường ' . trim($number_ward) .
                '  nanapet.com Chung cư/Tòa nhà ' . trim($buildings) .
                ' nanapet.com Lầu ' . trim($floor) .
                ' nanapet.com Căn hộ ' . trim($room) .
                ' nanapet.com ' . $number_district .
                ' nanapet.com ' . $number_city;
        $sex = input($_POST['gender']);

        $sql = "UPDATE admin_control_user 
                    SET name ='" . $name . "',
                        email ='" . $email . "',
                        phone='" . $phone . "',
                        address='" . $address . "',
                        birthday ='" . $birthday . "',
                        short_content ='" . $short_content . "',
                        facebook ='" . $facebook . "',
                        google ='" . $google . "',
                        twitter ='" . $twitter . "',
                        linkedin ='" . $linkedin . "',
                        sex = " . $sex . "
                    WHERE idadmin_control_user = '$id'";
        $mysql->setQuery($sql);

        if ($mysql->query()) {
            //Resize and save img
            $image = renameFile($_FILES["avatar"]["name"], 'admin-nanapet-' . $id);
            if (move_uploaded_file($_FILES ["avatar"]["tmp_name"], '../../upload/avatar/' . $image)) {
                @imagejpeg(resize('../../upload/avatar/' . $image, 1000, 1000), '../../upload/avatar/' . $image);
                $sql_u = "UPDATE admin_control_user 
                              SET avarta = '" . $image . "' 
                              WHERE idadmin_control_user = '" . $id . "'";
                $mysql->setQuery($sql_u);
                $mysql->query();
            }
            header('location:./?show=admin_user_info&success=true');
        }
    }
} else {
    $none_block = "none";
}

$title = "Thông tin cá nhân";
$xtemplate->path = 'com_admin_member/';

$content = $xtemplate->load('memberUpdate');
$content = $xtemplate->replace($content, array(
    'title' => $title,
    'username' => $user,
    'phone' => $row_ac['phone'],
    'name' => $row_ac['name'],
    'email' => $row_ac['email'],
    'short_content' => $row_ac['short_content'],
    'facebook' => $row_ac['facebook'],
    'google' => $row_ac['google'],
    'twitter' => $row_ac['twitter'],
    'linkedin' => $row_ac['linkedin'],
    'text_address' => $text_address,
    'text_street' => $text_street,
    'text_ward' => $text_ward,
    $selected_city => "selected",
    'district_value' => $text_district,
    'selected_district ' => $selected4,
    'selected_district_value' => $selected5,
    'address' => $adressformat,
    'text_address_Chung_Cu' => $text_chung_cu,
    'text_edit_floor_Chung_Cu' => $text_lau,
    'text_edit_room_Chung_Cu' => $text_can_ho,
    'birthday' => date("d-m-Y", $row_ac['birthday']),
    'sex' => $row_ac['sex'],
    'avatar' => ($row_ac['avarta'] != '') ? $row_ac['avarta'] : 'default.png',
    'selected1' => $selected1,
    'selected2' => $selected2,
    'error' => $error,
    'visible_name' => $_SESSION['admin'][4],
    'none_block' => $none_block
    ));
?>