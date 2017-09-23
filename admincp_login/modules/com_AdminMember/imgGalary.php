<?php

//VI TRI THEM DIEU CHINH TIEN TE
function formatMoney($number, $fractional = false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

$title = "Quản lý Group Memeber";

if (($_GET['action'] == 'del') && (isset($_GET['id']))) {

    delete('GroupMember', 'idGroupMember=' . intval($_GET['id']));

    header('location:./?show=GroupMember&p=' . intval($_GET['p']));
}

$xtemplate->path = 'com_AdminMember/';

$content = $xtemplate->load('imgGalary');

$code_cats = $xtemplate->get_block_from_str($content, "SUPPORT");


//Phan trang

$p_now = intval($_GET ['p']);

$mysql->setQuery("Select * from GroupMember");

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

$orderby = "DisCount";

$sql = "Select * from GroupMember order by " . $orderby . " limit " . $limitvalue . ',' . $pp;

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$temp = '';

$begin = 0;

$end = $n;

for ($i = $begin; $i < $end; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'VIPCustomer_id' => $row[$i]['idGroupMember'],
        'VIPCusomer_name' => $row[$i]['NameGroupMember'],
        'VIPCusomer_Discount' => formatMoney($row[$i]['DisCount']) . '%',
        'galary_date' => date('G:i d/m/Y', $row[$i]['Date']),
        'color' => $color
    ));
}


$content = $xtemplate->assign_blocks_content($content, array("SUPPORT" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_page' => $arr_lang['page'],
    'page' => page_div("./?show=GroupMember&p=%d_pg", "10", ceil($numofpages), $page),
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'add' => $arr_lang['add'],
    'title' => $title
        ));
?>