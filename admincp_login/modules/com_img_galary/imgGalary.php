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

$title = "Phí vận chuyển";

if (($_GET['action'] == 'del') && (isset($_GET['id']))) {
    delete('records', 'img_galary_id=' . intval($_GET['id']));

    delete('img_galary', 'galary_id=' . intval($_GET['id']));
} else if (isset($_POST['btndel'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    delete('records', 'img_galary_id in(' . intval($_GET['id']) . ')');

    delete('img_galary', 'galary_id in(' . intval($_GET['id']) . ')');

    header('location:./?show=imgGallery&p=' . intval($_GET['p']));
} else if (isset($_POST['btnSort'])) {

    $galary_sort = $_POST['galary_sort'];

    $galary_id = $_POST['galary_id'];

    for ($i = 0; $i < count($galary_id); ++$i) {

        update('img_galary', array('galary_sort' => $galary_sort[$i]), 'galary_id=' . $galary_id[$i]);
    }

    header('location:./?show=imgGallery&p=' . intval($_GET['p']));
} else if (isset($_GET['gid'])) {


    $id = $_GET['gid'];

    SetStatus('galary_id', 'galary_status', 'img_galary', 'galary_id in (' . $id . ')');

    header('location:./?show=imgGallery&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
} else if (isset($_POST['btnstatus'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    SetStatus('galary_id', 'galary_status', 'img_galary', 'galary_id in (' . $id . ')');

    header('location:./?show=imgGallery&p=' . intval($_GET['p']));
}

$xtemplate->path = 'com_img_galary/';

$content = $xtemplate->load('imgGalary');

$code_cats = $xtemplate->get_block_from_str($content, "SUPPORT");


if ($_GET['order'] != 'price_begin_asc' && $_GET['order'] != 'price_end_asc' && $_GET['order'] != 'fee_ship_asc' && $_GET['order'] != 'price_begin_desc' && $_GET['order'] != 'price_end_desc' && $_GET['order'] != 'fee_ship_desc') {

    //Phan trang

    $p_now = intval($_GET ['p']);

    $mysql->setQuery("Select * from img_galary");

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
    switch ($_GET['order']) {

        case 'name':

            $orderby = 'galary_district_name asc';

            break;

        case 'name_desc':

            $orderby = 'galary_district_name desc';

            break;

        case 'dateadd':

            $orderby = 'galary_date asc';

            break;

        case 'dateadd_desc':

            $orderby = 'galary_date desc';

            break;
        default:

            $orderby = ' galary_district_name asc';

            break;
    }

    $sql = "Select * from img_galary order by " . $orderby . " limit " . $limitvalue . ',' . $pp;

    $mysql->setQuery($sql);

    $row = $mysql->loadAllRow();

    $n = count($row);

    $temp = '';

    $begin = 0;

    $end = $n;
} else {

    function orderByASC($data, $field) {
        $code = "return strnatcmp(\$a['$field'], \$b['$field']);";
        usort($data, create_function('$a,$b', $code));
        return $data;
    }

    //Phan trang

    $p_now = intval($_GET ['p']);

    $sql = "Select * from img_galary";

    $mysql->setQuery($sql);

    $mysql->query();

    $total = $mysql->getNumRows();

    $row = $mysql->loadAllRow();

    $numofpages = $total / $pp;

    if ($p_now <= 0) {
        $page = 1;
    } else {
        if ($p_now <= ceil($numofpages))
            $page = $p_now;
        else
            $page = 1;
    }

    //end phan trang																														

    $temp = '';

    $begin = ($page - 1) * $pp;

    $end = $page * $pp;

    if ($page == ceil($numofpages)) {
        $end = count($row);
    }

    $n = count($row);

    if ($_GET['order'] == 'price_begin_asc') {
        for ($i = 0; $i < $n; ++$i) {
            $row[$i]['galary_begin_price'] = str_replace(".", '', $row[$i]['galary_begin_price']);
            $row[$i]['galary_begin_price'] = floatval($row[$i]['galary_begin_price']);
        }
        $row = orderByASC($row, 'galary_begin_price');
        //Sau khi sap xep xong thi format lai tien
        for ($i = $begin; $i < $end; ++$i) {
            $row[$i]['galary_begin_price'] = formatMoney($row[$i]['galary_begin_price']);
        }
    } else if ($_GET['order'] == 'price_end_asc') {
        for ($i = 0; $i < $n; ++$i) {
            $row[$i]['galary_end_price'] = str_replace(".", '', $row[$i]['galary_end_price']);
            $row[$i]['galary_end_price'] = floatval($row[$i]['galary_end_price']);
        }
        $row = orderByASC($row, 'galary_end_price');
        //Sau khi sap xep xong thi format lai tien
        for ($i = $begin; $i < $end; ++$i) {
            $row[$i]['galary_end_price'] = formatMoney($row[$i]['galary_end_price']);
        }
    } else if ($_GET['order'] == 'fee_ship_asc') {
        for ($i = 0; $i < $n; ++$i) {
            $row[$i]['galary_fee'] = str_replace(".", '', $row[$i]['galary_fee']);
            $row[$i]['galary_fee'] = floatval($row[$i]['galary_fee']);
        }
        $row = orderByASC($row, 'galary_fee');
        //Sau khi sap xep xong thi format lai tien
        for ($i = $begin; $i < $end; ++$i) {
            $row[$i]['galary_fee'] = formatMoney($row[$i]['galary_fee']);
        }
    } else if ($_GET['order'] == 'price_begin_desc') {
        for ($i = 0; $i < $n; ++$i) {
            $row[$i]['galary_begin_price'] = str_replace(".", '', $row[$i]['galary_begin_price']);
            $row[$i]['galary_begin_price'] = floatval($row[$i]['galary_begin_price']);
        }

        $row = orderByASC($row, 'galary_begin_price');
        $row = array_reverse($row);
        //Sau khi sap xep xong thi format lai tien
        for ($i = $begin; $i < $end; ++$i) {
            $row[$i]['galary_begin_price'] = formatMoney($row[$i]['galary_begin_price']);
        }
    } else if ($_GET['order'] == 'price_end_desc') {
        for ($i = 0; $i < $n; ++$i) {
            $row[$i]['galary_end_price'] = str_replace(".", '', $row[$i]['galary_end_price']);
            $row[$i]['galary_end_price'] = floatval($row[$i]['galary_end_price']);
        }

        $row = orderByASC($row, 'galary_end_price');
        $row = array_reverse($row);
        //Sau khi sap xep xong thi format lai tien
        for ($i = $begin; $i < $end; ++$i) {
            $row[$i]['galary_end_price'] = formatMoney($row[$i]['galary_end_price']);
        }
    } else if ($_GET['order'] == 'fee_ship_desc') {
        for ($i = 0; $i < $n; ++$i) {
            $row[$i]['galary_fee'] = str_replace(".", '', $row[$i]['galary_fee']);
            $row[$i]['galary_fee'] = floatval($row[$i]['galary_fee']);
        }

        $row = orderByASC($row, 'galary_fee');
        $row = array_reverse($row);
        //Sau khi sap xep xong thi format lai tien
        for ($i = $begin; $i < $end; ++$i) {
            $row[$i]['galary_fee'] = formatMoney($row[$i]['galary_fee']);
        }
    }
}



for ($i = $begin; $i < $end; ++$i) {

    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'galary_id' => $row[$i]['galary_id'],
        'galary_name' => $row[$i]['galary_district_name'],
        'galary_date' => date('G:i d/m/Y', $row[$i]['galary_date']),
        'galary_key' => $row[$i]['galary_begin_price'] . ' VNĐ',
        'galary_title' => $row[$i]['galary_end_price'] . ' VNĐ',
        'galary_keyword' => $row[$i]['galary_fee'] . ' VNĐ',
        'color' => $color
    ));
}

$content = $xtemplate->assign_blocks_content($content, array("SUPPORT" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_page' => $arr_lang['page'],
    'page' => page_div("./?show=imgGallery&order=" . $_GET['order'] . "&p=%d_pg", "10", ceil($numofpages), $page),
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_status' => $arr_lang['status'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'delete_check' => $arr_lang['del_check'],
    'lag_order' => $arr_lang['order'],
    'del_confirm' => $arr_lang['del_confirm'],
    'shi' => $arr_lang['shi'],
    'add' => $arr_lang['add'],
    'title' => $title,
    'order_name' => $_GET['order'],
    'page_number' => $_GET['p'],
        ));

function check_status($status, $id) {

    if (empty($status)) {

        return '<a href="./?show=imgGallery&p=' . $_GET['p'] . '&order=' . $_GET['order'] . '&gid=' . $id . '"><img style="margin-left:17px" src="../style/images/notick.png"/></a>';
    } else {

        return '<a href="./?show=imgGallery&p=' . $_GET['p'] . '&order=' . $_GET['order'] . '&gid=' . $id . '"><img style="margin-left:20px"  src="../style/images/tick.png"/></a>';
    }
}

?>