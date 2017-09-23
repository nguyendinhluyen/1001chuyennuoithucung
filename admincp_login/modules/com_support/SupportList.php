<?php

$title = $arr_lang['supportCus'];

if (($_GET['action'] == 'del') && (isset($_GET['id']))) {

    $mysql->setQuery('Delete from support where providers_id =' . intval($_GET['id']));

    $mysql->query();

    header('location:./?show=support&p=' . intval($_GET['p']));
} else if (isset($_POST['btndel'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $mysql->setQuery('Delete from support where providers_id in(' . $id . ')');

    $mysql->query();

    header('location:./?show=support&p=' . intval($_GET['p']));
} else if (isset($_POST['btnstatus'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    Set_status_support($id);

    header('location:./?show=support&p=' . intval($_GET['p']));
}

$xtemplate->path = 'com_support/';

$content = $xtemplate->load('SupportList');

$code_cats = $xtemplate->get_block_from_str($content, "SUPPORT");

//Phan trang

$p_now = intval($_GET ['p']);

$mysql->setQuery("Select providers_id from support where language ='" . $_SESSION['lag'] . "'");

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

$sql = "Select providers_id,providers_name,providers_im,providers_phone,providers_email,providers_order,providers_status,modified_date from support where language ='" . $_SESSION['lag'] . "' order by providers_order limit $limitvalue,$pp";

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$temp = '';

for ($i = 0; $i < $n; ++$i) {

    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'providers_id' => $row[$i]['providers_id'],
        'providers_name' => $row[$i]['providers_name'],
        'providers_im' => $row[$i]['providers_im'],
        'providers_phone' => $row[$i]['providers_phone'],
        'providers_email' => $row[$i]['providers_email'],
        'providers_order' => $row[$i]['providers_order'],
        'providers_status' => ($row[$i]['providers_status'] == '1') ? $arr_lang['show'] : '<i>' . $arr_lang['hidden'] . '</i>',
        'modified_date' => ($row[$i]['modified_date'] == '0') ? '0' : date('G:i d/m/Y', $row[$i]['modified_date']),
        'color' => $color));
}

$content = $xtemplate->assign_blocks_content($content, array("SUPPORT" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_page' => $arr_lang['page'],
    'page' => page_div("./?show=support&p=%d_pg", "10", ceil($numofpages), $page),
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_status' => $arr_lang['status'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'delete_check' => $arr_lang['del_check'],
    'lag_order' => $arr_lang['order'],
    'del_confirm' => $arr_lang['del_confirm'],
    'onlinename' => $arr_lang['onlinename'],
    'phone' => $arr_lang['phone'],
    'status' => $arr_lang['status'],
    'shi' => $arr_lang['shi'],
    'add' => $arr_lang['add'],
    'title' => $title,
        ));
?>