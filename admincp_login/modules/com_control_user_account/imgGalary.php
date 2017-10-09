<?php

$title = "Quản lý người dùng";
// Delete
if (($_GET['action'] == 'del') && (isset($_GET['id']))) { 
    update('admin_control_user', array('deleted' => '1'), 'idadmin_control_user='.$_GET['id']);
}
$xtemplate->path = 'com_control_user_account/';
$content = $xtemplate->load('imgGalary');
$code_cats = $xtemplate->get_block_from_str($content, "SUPPORT");

// Pagination
$p_now = intval($_GET ['p']);
$mysql->setQuery("SELECT * FROM admin_control_user WHERE deleted = 0");
$mysql->query();
$total = $mysql->getNumRows();
$numofpages = $total / $pp;
if ($p_now <= 0) {
    $page = 1;
} else {
    if ($p_now <= ceil($numofpages)) {
        $page = $p_now;
    } else {
        $page = 1;
    }
}
$limitvalue = $page * $pp - ($pp);
//End pagination

switch ($_GET['order']) {
    case 'name':
        $orderby = 'user_name asc';
        break;
    case 'name_desc':
        $orderby = 'user_name desc';
        break;
    case 'type_of_user':
        $orderby = 'type_of_user asc';
        break;
    case 'type_of_user_desc':
        $orderby = 'type_of_user desc';
        break;
    case 'dateadd':
        $orderby = 'dateadd asc';
        break;
    case 'dateadd_desc':
        $orderby = 'dateadd desc';
        break;
    default:
        $orderby = 'dateadd desc';
        break;
}

$sql = "SELECT * FROM admin_control_user WHERE deleted = 0 ORDER BY " . $orderby . " limit " . $limitvalue . ',' . $pp;
$mysql->setQuery($sql);
$row = $mysql->loadAllRow();
$n = count($row);
$temp = '';
$begin = 0;
$end = $n;
for ($i = $begin; $i < $end; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';
    $temp.= $xtemplate->assign_vars($code_cats, array(
        'galary_id' => $row[$i]['idadmin_control_user'],
        'galary_name' => $row[$i]['user_name'],
        'galary_keyword' => $row[$i]['type_of_user'],
        'galary_date' => date('G:i:s d/m/Y', $row[$i]['dateadd']),
        'color' => $color
    ));
}
$content = $xtemplate->assign_blocks_content($content, array("SUPPORT" => $temp));
$content = $xtemplate->replace($content, array(
    'lag_page' => $arr_lang['page'],
    'page' => page_div("./?show=com_control_user_account&order=" 
            . $_GET['order'] . "&p=%d_pg", "10", ceil($numofpages), $page),
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'add' => $arr_lang['add'],
    'title' => $title,
    'order_name' => $_GET['order'],
    'page_number' => $_GET['p'],
    ));
?>