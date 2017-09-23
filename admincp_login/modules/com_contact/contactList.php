<?php

$title = 'Danh sách khách hàng liên hệ';

$xtemplate->path = 'com_contact/';

if (isset($_POST['btndel'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $mysql->setQuery("delete from contact where id in (" . $id . ")");

    $mysql->query();

    header("location:./?show=contact");
} else if ($_GET['action'] == 'del') {

    $id = intval($_GET['id']);
    {

        $mysql->setQuery("delete from contact where id = '" . $id . "'");

        $mysql->query();

        header("location:./?show=contact");
    }
}

$content = $xtemplate->load('contactList');

$code_cats = $xtemplate->get_block_from_str($content, "CATALOGUE");

//Phan trang

$p_now = intval($_GET ['p']);

$mysql->setQuery("Select id from contact");

$mysql->query();

$total = $mysql->getNumRows();

$numofpages = $total / $pp;

if ($p_now <= 0) {

    $page = 1;
} else {

    if ($p_now <= ceil($numofpages))
        $page = $p_now;
    else
        $page = 1;
}

$limitvalue = $page * $pp - ($pp);

//end phan trang



$sql = "Select * from contact order by id desc limit " . $limitvalue . ',' . $pp;

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$temp = '';

for ($i = 0; $i < $n; ++$i) {

    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['id'],
        'custommer_name' => output($row[$i]['name']),
        'title_mail' => output($row[$i]['title']),
        'phone' => output($row[$i]['phone']),
        'email' => output($row[$i]['email']),
        'status' => getStatusOrder($row[$i]['status']),
        'date' => date('G:i d/m/Y', $row[$i]['date']),
        'color' => $color));
}

$content = $xtemplate->assign_blocks_content($content, array("CATALOGUE" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_order_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'lag_delete' => $arr_lang['del'],
    'lag_detail' => $arr_lang['detail'],
    'delete_check' => $arr_lang['del_check'],
    'status' => $arr_lang['status'],
    'del_confirm' => $arr_lang['del_confirm'],
    'lag_date_create' => 'Ngày gửi',
    'fullname' => $arr_lang['contact_fullname'],
    'address' => $arr_lang['contact_address'],
    'phone' => $arr_lang['phone'],
    'lag_del' => $arr_lang['delete'],
    'page' => page_div("./?show=contact&p=%d_pg&", "10", ceil($numofpages), $page),
        ));

function getStatusOrder($status) {

    if ($status == 1) {
        return '<i>Đã xem</i>';
    } else {
        return 'Chưa xem';
    }
}
?>



