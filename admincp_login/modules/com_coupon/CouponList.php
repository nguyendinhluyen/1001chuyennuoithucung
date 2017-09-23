<?php

if (isset($_POST['btndel'])) {
    if (count($_POST['chk']) > 0) {
        $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

        $sql = "DELETE FROM coupon WHERE id_coupon IN (" . $id . ")";

        $mysql->setQuery($sql);

        $mysql->query();

        if ($_GET['order'] != '') {
            header('location:./?show=coupon_list&p=' . $_GET['p'] . '&order=' . $_GET['order']);
        } else {
            header('location:./?show=coupon_list&p=' . $_GET['p']);
        }
    }
} else if (isset($_POST['btnStatus'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    Set_status_coupon($id);

    if ($_GET['order'] != "") {
        header('location:./?show=coupon_list&p=' . $_GET['p'] . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=coupon_list&p=' . $_GET['p']);
    }
}

$title = 'Quản lý coupon';

$xtemplate->path = 'com_coupon/';

$content = $xtemplate->load('CouponList');

$code_cats = $xtemplate->get_block_from_str($content, "NEWS");

//Phan trang
$p_now = intval($_GET ['p']);

$mysql->setQuery("SELECT id_coupon
	                    FROM coupon
	                    WHERE 1=1");

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

$order_code = $_GET ['order'];

switch ($order_code) {
    case 'name':

        $orderby = ' name_coupon ASC';

        break;

    case 'name_desc':

        $orderby = ' name_coupon DESC';

        break;


    case 'status':

        $orderby = ' status_coupon ASC';

        break;

    case 'dateadd':

        $orderby = ' date_added_coupon ASC';

        break;

    case 'dateadd_desc':

        $orderby = ' date_added_coupon DESC';

        break;

    case 'datemodifiled':

        $orderby = ' date_update_coupon ASC';

        break;

    case 'datemodifiled_desc':

        $orderby = ' date_update_coupon DESC';

        break;

    default:

        $orderby = ' date_added_coupon DESC';

        break;
}

$sql = "SELECT  id_coupon,
					code_coupon,
					name_coupon,
					discount_coupon,
					begin_cost_coupon,
					end_cost_coupon,
					status_coupon,
					category_coupon,
					note_coupon,
					date_deadline_coupon,
					date_added_coupon,
					date_update_coupon,
					customer_email_coupon
			FROM coupon
			WHERE 1=1 ORDER BY " . $orderby . " limit " . $limitvalue . "," . $pp;

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$temp = '';

for ($i = 0; $i < $n; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['id_coupon'],
        'coupon_name' => $row[$i]['name_coupon'],
        'code_coupon' => $row[$i]['code_coupon'],
        'coupon_catalogue' => CatlistNoCheckBox($row[$i]['category_coupon']),
        'date_deadline_coupon' => $row[$i]['date_deadline_coupon'],
        'coupon_status' => ($row[$i]['status_coupon'] == '1') ? "Sử dụng" : "Đã sử dụng",
        'date_added' => date('G:i d/m/Y', $row[$i]['date_added_coupon']),
        'customer_email_coupon' => substr($row[$i]['customer_email_coupon'], 0, 10) . "...@...",
        'color' => $color)
    );
}

$content = $xtemplate->assign_blocks_content($content, array("NEWS" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'oderby' => $_GET['order'],
    'page' => page_div("./?show=coupon_list&p=%d_pg&order=" . $_GET['order'], "10", ceil($numofpages), $page),
    'lag_edit' => $arr_lang['edit'],
    'del_confirm' => $arr_lang['del_confirm'],
        ));
?>