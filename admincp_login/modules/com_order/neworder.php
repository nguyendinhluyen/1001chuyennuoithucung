<?php

$xtemplate->path = 'com_order/';

$content = $xtemplate->load('neworder');

if (isset($_POST['them'])) {

    $name = input($_POST['name']);

    $email = input($_POST['email']);

    $address = input($_POST['address']);

    $phone = input($_POST['phone']);

    $name_receiver = input($_POST['name_receiver']);

    $phone_receiver = input($_POST['phone_receiver']);

    $address_receiver = input($_POST['address_receiver']);

    $transport = $_POST['transport'];

    $fee = $_POST['fee'];

    $cash = $_POST['cash'];

    //$fax =  input($_POST['fax']);

    $arrIns = array('custommer_name' => $name,
        'custommer_email' => $email,
        'custommer_addtress' => $address,
        'custommer_phone' => $phone,
        'custommer_fax' => $fax,
        'custommer_comment' => '',
        'status' => 0,
        'order_date' => time(),
        'total' => 0,
        'username' => $email,
        'custommer_name_receiver' => $name_receiver,
        'custommer_address_receiver' => $address_receiver,
        'custommer_phone_receiver' => $phone_receiver,
        'fee_transport' => $transport . ': ' . $fee . ' VNĐ',
        'type_of_cash' => $cash,
    );

    $last_id = insert("tbl_order", $arrIns);

    header("location:./?show=orderdetail&id=" . $last_id);
}

$ten_s = '_||_';

$email_s = '_||_';

if (isset($_POST['tim'])) {
    $ten_s = input($_POST['ten']);

    $email_s = input($_POST['thudientu']);

    $phone_s = input($_POST['so_DT']);
}

if ($ten_s == "") {

    $ten_s = '_||_';
}

if ($email_s == "") {

    $email_s = '_||_';
}

if ($phone_s == "") {

    $phone_s = '_||_';
}


$sql_s = "select * from user where name like '%" . $ten_s . "%' or email like '%" . $email_s . "%' or phone like '%" . $phone_s . "%'";

$mysql->setQuery($sql_s);

$row = $mysql->loadAllRow();

//die($row);

$listusr = $xtemplate->get_block_from_str($content, "SEARCH");

$n = count($row);

$tpl = "";

for ($i = 0; $i < $n; $i++) {
    if ($row[$i]['address'] != "") {
        list($text_address, $text_street, $text_ward, $text_chung_cu, $text_lau, $text_can_ho, $text_district, $text_city ) = split(' nanapet.com ', $row[$i]['address']);

        $adressformat = $text_can_ho . ' ' . $text_lau . ' ' . $text_chung_cu . ' - ' . $text_address . ' ' . $text_street . ' ' . $text_ward . ' ' . $text_district . ' ' . $text_city;

        $text_street = str_replace("Đường ", "", $text_street);

        $text_ward = str_replace("Phường ", "", $text_ward);

        $text_chung_cu = str_replace("Chung cư/Tòa nhà ", "", $text_chung_cu);

        $text_lau = str_replace("Lầu ", "", $text_lau);

        $text_can_ho = str_replace("Căn hộ ", "", $text_can_ho);

        //$adressformat = str_replace("nanapet.com","",$row_ac['address']);					

        if ($text_can_ho == "") {
            $adressformat = str_replace("Căn hộ  ", "", $adressformat);
        }

        if ($text_lau == "") {
            $adressformat = str_replace("Lầu  ", "", $adressformat);
        }

        if ($text_chung_cu == "") {
            $adressformat = str_replace("Chung cư/Tòa nhà  - ", "", $adressformat);
        }
        $adressformat = $row[$i]['name'] . ', ' . $adressformat;
    } else {
        $adressformat = "";
    }

    $tpl .= $xtemplate->assign_vars($listusr, array(
        'hoten' => $row[$i]['name'],
        'mail' => $row[$i]['email'],
        'diachi' => $adressformat,
        'dienthoai' => $row[$i]['phone'],
        'sfax' => $row[$i]['fax'],
        'id_user' => $row[$i]['id']
    ));
}

$content = $xtemplate->assign_blocks_content($content, array("SEARCH" => $tpl));


if (isset($_GET['id'])) {

    $sql_s = "select * from user where id = " . input($_GET['id']);

    $mysql->setQuery($sql_s);

    $usr = $mysql->loadOneRow();

    //$usr = getUserInfo(input($_GET['id']));

    $name = $usr['name'];

    $email = $usr['email'];

    //$address = str_replace('nanapet.com ','',$usr['address']);

    list($text_address, $text_street, $text_ward, $text_chung_cu, $text_lau, $text_can_ho, $text_district, $text_city ) = split(' nanapet.com ', $usr['address']);

    $adressformat_1 = $text_can_ho . ' ' . $text_lau . ' ' . $text_chung_cu . ' - ' . $text_address . ' ' . $text_street . ' ' . $text_ward . ' ' . $text_district . ' ' . $text_city;

    $text_street = str_replace("Đường ", "", $text_street);

    $text_ward = str_replace("Phường ", "", $text_ward);

    $text_chung_cu = str_replace("Chung cư/Tòa nhà ", "", $text_chung_cu);

    $text_lau = str_replace("Lầu ", "", $text_lau);

    $text_can_ho = str_replace("Căn hộ ", "", $text_can_ho);

    //$adressformat = str_replace("nanapet.com","",$row_ac['address']);					

    if ($text_can_ho == "") {
        $adressformat_1 = str_replace("Căn hộ  ", "", $adressformat_1);
    }

    if ($text_lau == "") {
        $adressformat_1 = str_replace("Lầu  ", "", $adressformat_1);
    }

    if ($text_chung_cu == "") {
        $adressformat_1 = str_replace("Chung cư/Tòa nhà  - ", "", $adressformat_1);
    }

    $adressformat_1 = $name . ', ' . $adressformat_1;

    $phone = $usr['phone'];

    $fax = $usr['fax'];


    // Lay toan bo dia chi trong so dia chi chinh hoac trong so dia chi

    $select = "";
    // Dia chi chinh
    if ($usr['address'] != '') {
        $select .= '<option selected="selected">' . trim($adressformat_1) . '</option>';
    }
    // Dia chi trong danh sach dia chi	
    // Trong bang tbl_contact_list
    $listAdd = GetRows('id,street,city,phone', 'tbl_contact_list', 'user = "' . $email . '"');
    if (count($listAdd) != 0) { // Neu co dia chi moi add vao
        for ($i = 0; $i < count($listAdd); $i++) {

            list($text_address, $text_street, $text_ward, $text_chung_cu, $text_lau, $text_can_ho, $text_district, $text_city ) = split(' nanapet.com ', $listAdd[$i]['street']);

            $adressformat = $text_can_ho . ' ' . $text_lau . ' ' . $text_chung_cu . ' - ' . $text_address . ' ' . $text_street . ' ' . $text_ward . ' ' . $text_district . ' ' . $text_city;

            $text_street = str_replace("Đường ", "", $text_street);

            $text_ward = str_replace("Phường ", "", $text_ward);

            $text_chung_cu = str_replace("Chung cư/Tòa nhà ", "", $text_chung_cu);

            $text_lau = str_replace("Lầu ", "", $text_lau);

            $text_can_ho = str_replace("Căn hộ ", "", $text_can_ho);

            //$adressformat = str_replace("nanapet.com","",$row_ac['address']);					

            if ($text_can_ho == "") {
                $adressformat = str_replace("Căn hộ  ", "", $adressformat);
            }

            if ($text_lau == "") {
                $adressformat = str_replace("Lầu  ", "", $adressformat);
            }

            if ($text_chung_cu == "") {
                $adressformat = str_replace("Chung cư/Tòa nhà  - ", "", $adressformat);
            }
            $listAdd[$i]['street'] = $adressformat;

            $select .= '<option>' . trim($name) . ', ' . trim($listAdd[$i]['street']) . ' ' . trim($listAdd[$i]['city']) . '</option>';
        }
    }
}

$content = $xtemplate->replace($content, array(
    'name' => $name,
    'email' => $email,
    'address' => $adressformat_1,
    'phone' => $phone,
    'fax' => $fax,
    'name_receiver' => $name,
    'phone_receiver' => $phone,
    'address_receiver' => $adressformat_1,
    'list_address' => $select,
        ));
?>