<?php

$title = $arr_lang['cat_manage'];
if (($_GET['action'] == 'del') && (isset($_GET['id']))) {
    include(_CLASS . 'cache.php');
    $cache = new cache();
    $cache->flush(_HOME . 'home/cache/');
    delete_cats(intval($_GET['id']));
    header('location:./?show=catalogue&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
} else if (isset($_POST['btndel'])) {
    include(_CLASS . 'cache.php');
    $cache = new cache();
    $cache->flush(_HOME . 'home/cache/');
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
    delete_cats($id);
    if ($_GET['order'] != "") {
        header('location:./?show=catalogue&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    } else {
        header('location:./?show=catalogue&p=' . intval($_GET['p']));
    }
} else if (isset($_POST['btnstatus'])) {
    include(_CLASS . 'cache.php');
    $cache = new cache();
    $cache->flush(_HOME . 'home/cache/');
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
    Set_status_catalogue($id);
    if ($_GET['order'] != "") {
        header('location:./?show=catalogue&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    } else {
        header('location:./?show=catalogue&p=' . intval($_GET['p']));
    }
}
$xtemplate->path = 'com_catalogue/';
$content = $xtemplate->load('ListCatalogue');
$code_cats = $xtemplate->get_block_from_str($content, "CATALOGUE");

// Navigation
$p_now = intval($_GET ['p']);
$mysql->setQuery("SELECT categories_id FROM categories WHERE language ='"
        . $_SESSION['lag'] . "'");
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
// End navigation

switch ($_GET['order']) {
    case 'name':
        $orderby = ' categories_name asc';
        break;

    case 'name_desc':
        $orderby = ' categories_name desc';
        break;

    case 'catalogue':
        $orderby = ' parent_id asc';
        break;

    case 'catalogue_desc':
        $orderby = ' parent_id desc';
        break;

    case 'status':
        $orderby = ' categories_status asc';
        break;

    case 'dateadd':
        $orderby = ' date_added asc';
        break;

    case 'dateadd_desc':
        $orderby = ' date_added desc';
        break;

    case 'datemodifiled':
        $orderby = ' modified_date asc';
        break;

    case 'datemodifiled_desc':
        $orderby = ' modified_date desc';
        break;

    default:
        $orderby = ' date_added desc';
        break;
}

$sql = "SELECT * FROM categories WHERE language ='"
        . $_SESSION['lag'] . "' order by " . $orderby . " limit " . $limitvalue . "," . $pp;
$mysql->setQuery($sql);
$row = $mysql->loadAllRow();
$n = count($row);
$temp = '';

for ($i = 0; $i < $n; ++$i) {
    $id = $row[$i]['categories_id'];
    $parent_name = get_parent_name($row[$i]['parent_id']);
    $makeEditable.="makeEditable('" . $id . "',1);";
    $makeEditable.="makeEditable('" . $id . "_status',3);";
    $makeEditable.="makeEditable('" . $id . "_order',2);";
    $makeEditable.="makeEditable('" . $id . "_parent_name',4);";
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';
    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $id,
        'cat_name' => output($row[$i]['categories_name']),
        'parent_name' => ($parent_name == '0') ? $arr_lang['root_cats'] : $parent_name,
        'order' => $row[$i]['sort_order'],
        'status' => ($row[$i]['categories_status'] == '1') ? $arr_lang['show'] : '<i>' . $arr_lang['hidden'] . '</i>',
        'date_create' => date('G:i d/m/Y', $row[$i]['date_added']),
        'date_modifiled' => ($row[$i]['modified_date'] == '0') ? '0' : date('G:i d/m/Y', $row[$i]['modified_date']),
        'color' => $color));
}

if ($_GET['order'] != "") {
    $type_of_order = '&order=' . $_GET['order'];
} else {
    $type_of_order = '';
}

$content = $xtemplate->assign_blocks_content($content, array("CATALOGUE" => $temp));
$content = $xtemplate->replace($content, array(
    'lag_cat_manager' => $arr_lang['cat_manage'],
    'lag_page' => $arr_lang['page'],
    'nav_page' => page_div("./?show=catalogue&p=%d_pg&order="
            . $_GET['order'], "10", ceil($numofpages), $page),
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'orderby' => $_GET['order'],
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_cats_name' => $arr_lang['cat_name'],
    'makeEditable' => $makeEditable,
    'dl_subcats' => dl_subcats('', 168),
    'lag_status' => $arr_lang['status'],
    'lag_date_create' => $arr_lang['date_added'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'delete_check' => $arr_lang['del_check'],
    'add_cat' => $arr_lang['add_cat'],
    'lag_order' => $arr_lang['order'],
    'del_confirm' => $arr_lang['del_confirm'],
    'viewastree' => $arr_lang['viewastree'],
    'ofcatalogue' => $arr_lang['ofcatalogue'],
    'shi' => $arr_lang['shi'],
    'type_of_order' => $type_of_order,
    'page' => $page,
        ));
$script = $xtemplate->get_block_from_str($content, "SCRIPT");
$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>