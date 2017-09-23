<?php

$title = 'Quản lý phí thành viên';

$xtemplate->path = 'com_Fee_GroupMember/';

$content = $xtemplate->load('FeeList');

$code_cats = $xtemplate->get_block_from_str($content, "CATALOGUE");

$se_boloc = "";

if (isset($_GET['loc'])) {

    $se_boloc = input($_GET['loc']);
}

// Lay danh sach cac VIPCusomer co thu phi hoat dong

$sql = "SELECT * FROM VIPCustomer";

$mysql->setQuery($sql);

$rowFee = $mysql->loadAllRow();

$option_Type_Of_Customer = "";

$first_Oject = "";

$first_Fee = "";

if (count($rowFee) > 0) {
    for ($i = 0; $i < count($rowFee); $i++) {
        if ($rowFee[$i]['FeeLevel'] != '0') {
            for ($j = 0; $j < count($rowFee); $j++) {
                if ($rowFee[$i]['Score'] == $rowFee[$j]['Score'] && $rowFee[$i]['NameVIPCustomer'] != $rowFee[$j]['NameVIPCustomer']) {
                    $option_Type_Of_Customer.= '<option value = "' . $rowFee[$j]['NameVIPCustomer'] . '">' . $rowFee[$j]['NameVIPCustomer'] . '</option>';
                    if ($first_Oject == "" && $first_Fee == "") {
                        $first_Oject = $rowFee[$j]['NameVIPCustomer'];

                        $first_Fee = $rowFee[$i]['FeeLevel'];
                    }
                }
            }
        }
    }
} else {
    $option_Type_Of_Customer.= '<option value = "9999"> Không có dữ liệu </option>';
}

if ($se_boloc != "") {
    $first_Oject = $se_boloc;

    // Tim diem cua level hien tai
    for ($i = 0; $i < count($rowFee); $i++) {
        if ($rowFee[$i]['NameVIPCustomer'] == $first_Oject) {
            $score_level = $rowFee[$i]['Score'];
        }
    }

    // Tim muc phi phai dong de nang cap level moi
    for ($i = 0; $i < count($rowFee); $i++) {
        if ($score_level == $rowFee[$i]['Score'] && $rowFee[$i]['NameVIPCustomer'] != $first_Oject) {
            $first_Fee = $rowFee[$i]['FeeLevel'];
        }
    }
}

// Lay danh sach thanh vien phai dong phi va khong thuoc Group Member		
$sql = "SELECT sc.id as SC_id, sc.fee4Ever,ur.name, ur.phone, ur.email FROM scores sc, user ur WHERE sc.honors = '" . $first_Oject . "' AND ur.email = sc.user AND ur.GroupMember = 'Chưa là thành viên'";

$mysql->setQuery($sql);

$mysql->query();

$total = $mysql->getNumRows();

$row = $mysql->loadAllRow();

//Phan trang

$pp = 30;

$p_now = intval($_GET ['p']);

$numofpages = $total / $pp;

if ($p_now <= 0) {
    $page = 1;
} else {
    if ($p_now <= ceil($numofpages))
        $page = $p_now;
    else
        $page = 1;
}

$n = count($row);

$begin = ($page - 1) * $pp;

$end = $page * $pp;

//end phan trang							

if ($page == ceil($numofpages)) {
    $end = count($row);
}

$temp = '';

if ($n > 0) {
    for ($i = $begin; $i < $end; ++$i) {
        $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

        $user_status = "Chưa đóng phí";

        if ($row[$i]['fee4Ever'] != "" && $row[$i]['fee4Ever'] != 0) {
            $user_status = "Đã đóng phí";
        }

        $temp.= $xtemplate->assign_vars($code_cats, array(
            'id' => $row[$i]['SC_id'],
            'custommer_name' => output($row[$i]['name']),
            'phone' => output($row[$i]['phone']),
            'email' => output($row[$i]['email']),
            'status' => $user_status,
            'color' => $color));
    }
}

if ($_GET['action'] == 'del') {

    $id = intval($_GET['id']);

    if ($id != "") {
        $sql = " UPDATE scores SET fee4Ever = '" . $first_Fee . "' WHERE id = '" . $id . "'";

        $mysql->setQuery($sql);

        $mysql->query();
    }

    $page = "location:./?show=feeMember&p=" . $_GET ['page'] . "&loc=" . $se_boloc;

    header($page);
} else if (isset($_POST['btnAddFee'])) {

    $id = $_POST['chk'];

    $n = count($id);

    for ($i = 0; $i < $n; ++$i) {

        $sql = " UPDATE scores SET fee4Ever = '" . $first_Fee . "' WHERE id = '" . $id[$i] . "'";

        $mysql->setQuery($sql);

        $mysql->query();
    }

    $page = "location:./?show=feeMember&p=" . $page . "&loc=" . $se_boloc;

    header($page);
} else if (isset($_POST['btnRemoveFee'])) {
    $id = $_POST['chk'];

    $n = count($id);

    for ($i = 0; $i < $n; ++$i) {

        $sql = " UPDATE scores SET fee4Ever = 0 WHERE id = '" . $id[$i] . "'";

        $mysql->setQuery($sql);

        $mysql->query();
    }

    $page = "location:./?show=feeMember&p=" . $page . "&loc=" . $se_boloc;

    header($page);
}

/* * * check for https ** */

$protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';

/* * * return the full address ** */

$protocol .= '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$arrPro = split("&loc", $protocol);

$protocol = $arrPro[0];

$content = $xtemplate->assign_blocks_content($content, array("CATALOGUE" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_order_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'status' => $arr_lang['status'],
    'lag_order' => $arr_lang['order'],
    'fee_confirm' => "Đóng phí thành viên?",
    'remove_fee_confirm' => "Chưa đóng phí thành viên?",
    'lag_date_create' => $arr_lang['date_added'],
    'fullname' => $arr_lang['contact_fullname'],
    'address' => $arr_lang['contact_address'],
    'phone' => $arr_lang['phone'],
    'lag_del' => "Đóng phí",
    'delivery' => "Chưa đóng phí",
    'url_change' => $protocol,
    'page_now' => $page,
    'se_boloc' => $se_boloc,
    'page' => page_div("./?show=feeMember&p=%d_pg&loc=" . $se_boloc, "10", ceil($numofpages), $page),
    'option_Type_Of_Customer' => $option_Type_Of_Customer,
    'fee_Member' => $first_Fee,
    'page_number' => $page,
        ));
?>