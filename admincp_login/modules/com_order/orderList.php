<?php

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

$title = $arr_lang['order_manage'];
$xtemplate->path = 'com_order/';
if (isset($_POST['btnaccept'])) {
    $id = $_POST['chk'];
    $n = count($id);
    $sql = "SELECT * FROM PriceOfUnit";
    $mysql->setQuery($sql);
    $PriceOfUnit = $mysql->loadAllRow();
    for ($i = 0; $i < $n; ++$i) {
        $mysql->setQuery("SELECT * FROM tbl_order WHERE id ='" . $id[$i] . "' and status = 0");
        $mysql->query();
        $arr = $mysql->loadOneRow();

        // Check co duoc cong diem vao he thong hay khong	
        $sql = "SELECT GroupMember FROM user WHERE email ='" . $arr['username'] . "'";
        $mysql->setQuery($sql);
        $GroupMember = $mysql->loadAllRow();
        echo($GroupMember[0]['GroupMember']);
        if (count($arr) > 0 && $GroupMember[0]['GroupMember'] == 'Chưa là thành viên') {
            // Update score
            // 1 score = 50.000 VND
            $sc = floor(intval(convertFormatMoneyToInt($arr['total']) / $PriceOfUnit[0]['PriceScore']));
            updateScore($arr['username'], "add", $sc, "Add Score Of Bill");
        }
    }
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
    $mysql->setQuery("UPDATE tbl_order SET status = 1 WHERE id in (" . $id . ")");
    $mysql->query();
    header("location:./?show=order");
} else if (isset($_POST['btnadd_bill'])) {
    header("location:./?show=add_order");
} else if (isset($_POST['btndel'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
    $mysql->setQuery("delete from tbl_order where id in (" . $id . ")");
    $mysql->query();
    header("location:./?show=order");
} else if ($_GET['action'] == 'del') {
    $id = intval($_GET['id']);
    $mysql->setQuery("delete from tbl_order where id = '" . $id . "'");
    $mysql->query();
    $mysql->setQuery("delete from order_detail where id_order = '" . $id . "'");
    $mysql->query();
    header("location:./?show=order");
}
$content = $xtemplate->load('orderList');
$code_cats = $xtemplate->get_block_from_str($content, "CATALOGUE");
$se_boloc = 0;
$pp = 50;
if ($_GET['order'] != 'orderbill' && $_GET['order'] != 'orderbill_desc') {
    if (isset($_GET['loc'])) {
        $se_boloc = input($_GET['loc']);
    }
    // Pagination
    $p_now = intval($_GET ['p']);
    if ($se_boloc == 0) {
        $mysql->setQuery("SELECT id FROM tbl_order");
    }
    if ($se_boloc == 1) {
        $mysql->setQuery("SELECT id FROM tbl_order WHERE status = 1");
    }
    if ($se_boloc == 2) {
        $mysql->setQuery("SELECT id FROM tbl_order WHERE status = 0");
    }
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
    // End pagination

    switch ($_GET['order']) {
        case 'name':
            $orderby = 'custommer_name asc';
            break;
        case 'name_desc':
            $orderby = 'custommer_name desc';
            break;
        case 'orderdate':
            $orderby = 'order_date asc';
            break;
        case 'orderdate_desc':
            $orderby = 'order_date desc';
            break;
        case 'status':
            $orderby = 'status asc';
            break;
        default:
            $orderby = 'order_date desc ';
            break;
    }

    if ($se_boloc == 0) {
        $sql = "SELECT * FROM tbl_order ORDER BY "
                . $orderby . " LIMIT " . $limitvalue . ',' . $pp;
    }
    if ($se_boloc == 1) {
        $sql = "SELECT * FROM tbl_order WHERE status = 1 ORDER BY "
                . $orderby . " LIMIT " . $limitvalue . ',' . $pp;
    }
    if ($se_boloc == 2) {
        $sql = "SELECT * FROM tbl_order WHERE status = 0 ORDER BY "
                . $orderby . " LIMIT " . $limitvalue . ',' . $pp;
    }
    $mysql->setQuery($sql);
    $row = $mysql->loadAllRow();
    $n = count($row);
    $begin = 0;
    $end = $n;
    $temp = '';
} else {

    function orderByASC($data, $field) {
        $code = "return strnatcmp(\$a['$field'], \$b['$field']);";
        usort($data, create_function('$a,$b', $code));
        return $data;
    }

    if (isset($_GET['loc'])) {
        $se_boloc = input($_GET['loc']);
    }

    // Pagination
    $p_now = intval($_GET ['p']);
    if ($se_boloc == 0) {
        $mysql->setQuery("SELECT * FROM tbl_order");
    }
    if ($se_boloc == 1) {
        $mysql->setQuery("SELECT * FROM tbl_order WHERE status = 1");
    }
    if ($se_boloc == 2) {
        $mysql->setQuery("SELECT * FROM tbl_order WHERE status = 0");
    }
    $mysql->query();
    $total = $mysql->getNumRows();
    $row = $mysql->loadAllRow();
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
    // End pagination

    $n = count($row);
    $begin = ($page - 1) * $pp;
    $end = $page * $pp;
    if ($page == ceil($numofpages)) {
        $end = count($row);
    }
    $temp = '';

    if ($_GET['order'] == 'orderbill') {
        for ($i = 0; $i < $n; ++$i) {
            $row[$i]['total'] = str_replace(".", '', $row[$i]['total']);
            $row[$i]['total'] = floatval($row[$i]['total']);
        }
        $row = orderByASC($row, 'total');
        for ($i = $begin; $i < $end; ++$i) {
            $row[$i]['total'] = formatMoney($row[$i]['total']);
        }
    } else {
        for ($i = 0; $i < $n; ++$i) {
            $row[$i]['total'] = str_replace(".", '', $row[$i]['total']);
            $row[$i]['total'] = floatval($row[$i]['total']);
        }
        $row = orderByASC($row, 'total');
        $row = array_reverse($row);
        //Sau khi sap xep xong thi format lai tien
        for ($i = $begin; $i < $end; ++$i) {
            $row[$i]['total'] = formatMoney($row[$i]['total']);
        }
    }
}

for ($i = $begin; $i < $end; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';
    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['id'],
        'custommer_name' => output($row[$i]['custommer_name']),
        'custommer_bill' => output($row[$i]['total']) . ' VNĐ',
        'phone' => output($row[$i]['custommer_phone']),
        'email' => substr(output($row[$i]['custommer_email']), 0, 22) . "...",
        'status' => getStatusOrder($row[$i]['status']),
        'date' => date('G:i d/m/Y', $row[$i]['order_date']),
        'color' => $color));
}

// check for https
$protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';

// return the full address
$protocol .= '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$arrPro = split("&loc", $protocol);
$protocol = $arrPro[0];
$content = $xtemplate->assign_blocks_content($content, array("CATALOGUE" => $temp));
$content = $xtemplate->replace($content, array(
    'lag_order_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'lag_delete' => $arr_lang['del'],
    'lag_detail' => $arr_lang['detail'],
    'delete_check' => $arr_lang['del_check'],
    'status' => $arr_lang['status'],
    'lag_order' => $arr_lang['order'],
    'del_confirm' => $arr_lang['del_confirm'],
    'lag_date_create' => $arr_lang['date_added'],
    'fullname' => $arr_lang['contact_fullname'],
    'address' => $arr_lang['contact_address'],
    'phone' => $arr_lang['phone'],
    'lag_del' => $arr_lang['delete'],
    'delivery' => $arr_lang['delivery'],
    'url_change' => $protocol,
    'page_now' => $page,
    'se_boloc' => $se_boloc,
    'page' => page_div("./?show=order&p=%d_pg&loc=" . $se_boloc, "10", ceil($numofpages), $page),
        ));

function getStatusOrder($status) {
    if ($_SESSION['lag'] == 'vi') {
        if ($status == 1) {
            return '<i>Đã giao</i>';
        } else {
            return 'Chưa giao';
        }
    } else {
        if ($status == 1) {
            return '<i>Đã giao</i>';
        } else {
            return 'Chưa giao';
        }
    }
}

?>