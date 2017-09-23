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

if (isset($_POST['save_khuyenmai'])) {// update ngay khuyen mai
    $nam = $_POST['time_kuyenmai_nam'];

    $thang = $_POST['time_kuyenmai_thang'];

    $ngay = $_POST['time_kuyenmai_ngay'];

    $gio = $_POST['time_kuyenmai_gio'];

    $phut = $_POST['time_kuyenmai_phut'];

    $date_khuyenmai = $thang . " " . $ngay . ", " . $nam . " " . $gio . ":" . $phut;

    SetConfig('time_encourage', $date_khuyenmai);
}



if (($_GET['action'] == 'del') && isset($_GET['id'])) {

    $id = intval($_GET['id']);

    delete_img($id);

    delete_product($id);

    header('location:./?show=khuyenmai&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
} else if ((isset($_POST['searchfield']{1})) || (isset($_GET['keyword']{1}))) {

    $temp = ($_POST['searchfield'] == '') ? $_GET['keyword'] : $_POST['searchfield'];

    $keyword = input($temp);

    $where = "and products_name like '%" . $keyword . "%'";
}

if (isset($_POST['btndel'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    delete_img($id);

    delete_product($id);

    header('location:./?show=khuyenmai&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
} else if (isset($_POST['btnencour'])) { // product encourage
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $sql = "update products set product_encourage  = ''  where products_id in (" . $id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    if ($_GET['order'] != "") {
        header('location:./?show=khuyenmai&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=khuyenmai&p=' . intval($_GET['p']));
    }
} else if (isset($_POST['btnnew'])) { // product new
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $sql = "update products set p_new = 1 where products_id in (" . $id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    header('location:./?show=khuyenmai&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
} else if (isset($_POST['btnbest'])) { //product best seller
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $sql = "update products set p_bestsell = 1  where products_id in (" . $id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    header('location:./?show=khuyenmai&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
} else if (isset($_POST['btnsort'])) {

    $id = $_POST['products_id'];

    $sort = $_POST['sort_order'];

    $n = count($id);

    for ($i = 0; $i < $n; ++$i) {

        $data = array(
            'sort_order' => $sort[$i]
        );

        update('products', $data, 'products_id="' . $id[$i] . '"');
    }
} else if (isset($_POST['btnstatus'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    Set_status_product($id);

    header('location:./?show=khuyenmai&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
} else if (isset($_POST['catlist'])) {

    if ($_POST['catlist'] == 0) {

        unset($_SESSION['QUERY_P']);

        unset($_SESSION['CATID']);
    } else {

        $catlist = $_POST['catlist'];

        $_SESSION['CATID'] = $catlist;

        $where = " and categories_id ='" . $catlist . "' ";

        if (!GetOnef('products_id', 'products', 'categories_id="' . $catlist . '"')) {

            $where = " and categories_id in (select categories_id from categories where parent_id='" . $catlist . "' and 	product_encourage <> '')";
        }

        $_SESSION['QUERY_P'] = $where;

        $where = '';
    }
}

$title = 'Danh sách sản phẩm';

$xtemplate->path = 'com_product/';

$content = $xtemplate->load('khuyenmai');

$code_cats = $xtemplate->get_block_from_str($content, "PRODUCT");





/////////////////////////////////////////////////////////////////////////

if ($_GET['order'] != 'price_asc' && $_GET['order'] != 'price_desc') {

    //Phan trang

    $p_now = intval($_GET ['p']);

    $sql = "Select products_id from products where language='" . $_SESSION['lag'] . "' " . $where . $_SESSION['QUERY_P'] . " and product_encourage <> ''";

    $mysql->setQuery($sql);

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

            $orderby = ' products_name asc';

            break;

        case 'name_desc':

            $orderby = ' products_name desc';

            break;


        case 'catalogue':

            $orderby = ' categories_id';

            break;

        case 'status':

            $orderby = ' products_status asc';

            break;

        case 'dateadd':

            $orderby = ' products_date_added asc';

            break;

        case 'dateadd desc':

            $orderby = ' products_date_added desc';

            break;

        case 'datemodifiled':

            $orderby = ' modified_date desc';

            break;

        default:

            $orderby = ' products_id desc';

            break;
    }

    $sql = "Select * from products where language='" . $_SESSION['lag'] . "' " . $where . $_SESSION['QUERY_P'] . " and product_encourage <> '' order by $orderby limit $limitvalue,$pp";

    //echo $sql;

    $mysql->setQuery($sql);

    $row = $mysql->loadAllRow();

    $n = count($row);

    $disabled = '';

    if ($n == 0) {

        SetConfig('time_encourage', '');

        $disabled = 'disabled="disabled"';
    }

    $temp = '';

    $begin = 0;

    $end = $n;

    //Lay gia khuyen mai lam gia chinh cho san pham
    for ($i = 0; $i < $n; ++$i) {
        if ($row[$i]['product_encourage'] != "") {
            $row[$i]['products_price'] = $row[$i]['product_encourage'];
        }
    }
}

//////////////////////////////////////////////////////////////
else {

    function orderByASC($data, $field) {
        $code = "return strnatcmp(\$a['$field'], \$b['$field']);";
        usort($data, create_function('$a,$b', $code));
        return $data;
    }

    //Phan trang

    $p_now = intval($_GET ['p']);

    $sql = "Select * from products where language='" . $_SESSION['lag'] . "' " . $where . $_SESSION['QUERY_P'] . " and product_encourage <> ''";

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

    $disabled = '';

    if ($n == 0) {

        SetConfig('time_encourage', '');

        $disabled = 'disabled="disabled"';
    }

    $temp = '';

    $begin = ($page - 1) * $pp;

    $end = $page * $pp;

    if ($page == ceil($numofpages)) {
        $end = count($row);
    }

    $n = count($row);

    for ($i = 0; $i < $n; ++$i) {
        if ($row[$i]['product_encourage'] != "") {
            $row[$i]['products_price'] = $row[$i]['product_encourage'];
        }
        $row[$i]['products_price'] = str_replace(".", '', $row[$i]['products_price']);
        $row[$i]['products_price'] = floatval($row[$i]['products_price']);
    }
    if ($_GET['order'] != 'price_desc')
        $row = orderByASC($row, 'products_price');
    else {
        $row = orderByASC($row, 'products_price');
        $row = array_reverse($row);
    }

    // Sau khi sap xep xong format lai tien
    for ($i = $begin; $i < $end; ++$i) {
        $row[$i]['products_price'] = formatMoney($row[$i]['products_price']);
    }
}


for ($i = $begin; $i < $end; ++$i) {

    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $img = $row[$i]['products_image'];

    $imgSrc = _UPLOAD_IMG . $img;

    $imgThumb = _UPLOAD_IMG_THUMB . $img;



    if (!empty($img) and ! checkExtentFile($img, $imgExtent)) {

        $img = '<a href="' . _UPLOAD_IMG_THUMB . $img . '">File</a>';
    } else {

        $img = ($img == '') ? "<img src ='" . _STYLE_IMG . "picoff.gif'>" : "<a href ='$imgThumb'><img border=0 style=\"cursor:hand\" src=\"" . _STYLE_IMG . "picon.gif\" onmouseover=\"this.src='" . _STYLE_IMG . "piconover.gif';return overlib('<div><table border=0 cellpadding=2 cellspacing=0><tr><td class=titleImg>Click to Thumbnails</td></tr><tr><td><img src=$imgSrc></a></td></tr></table></div>');\" onmouseout=\"this.src='" . _STYLE_IMG . "picon.gif';return nd();\"></a>";
    }

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['products_id'],
        'product_name' => cut_string($row[$i]['products_name'], 40),
        'categories_id' => get_cats_name($row[$i]['categories_id']),
        'product_image' => $img,
        'sort_order' => $row[$i]['sort_order'],
        'products_status' => ($row[$i]['products_status'] == '1') ? $arr_lang['show'] : '<i>' . $arr_lang['hidden'] . '</i>',
        'date_added' => date('G:i d/m/Y', $row[$i]['products_date_added']),
        'modified_date' => ($row[$i]['modified_date'] == '0') ? '0' : date('G:i d/m/Y', $row[$i]['modified_date']),
        'encourprice_product' => $row[$i]['products_price'] . ' VNĐ',
        'color' => $color));
}



$today = getdate();

$nam_s = $today['year'];

$ngay = '1';

$thang = '1';

$nam = $nam_s;

$gio = '0';

$phut = '0';



$list_nam = '<option value="' . $nam_s . '">' . $nam_s . '</option>';

$list_nam .= '<option value="' . ($nam_s + 1) . '">' . ($nam_s + 1) . '</option>';

$list_nam .= '<option value="' . ($nam_s + 2) . '">' . ($nam_s + 2) . '</option>';

$list_nam .= '<option value="' . ($nam_s + 3) . '">' . ($nam_s + 3) . '</option>';

$time_sale = GetOnef('config_value', 'config', 'config_name="time_encourage"');

if ($time_sale == '') {

    $time_sale = "Không có khuyến mãi";
} else {

    //$time_sale = "Không có khuyến mãi";

    $arrTime = split(',', $time_sale);

    $thangngay = $arrTime[0];

    $namgio = $arrTime[1];

    $arrTime = split(' ', $thangngay);

    $ngay = $arrTime[1];

    $thang = $arrTime[0];

    $arrTime = split(' ', $namgio);

    $nam = $arrTime[1];

    $giophut = $arrTime[2];

    $arrTime = split(':', $giophut);

    $gio = $arrTime[0];

    $phut = $arrTime[1];



    if ($thang == 'Jan') {

        $thang_num = 1;
    }

    if ($thang == 'Feb') {

        $thang_num = 2;
    }

    if ($thang == 'Mar') {

        $thang_num = 3;
    }

    if ($thang == 'Apr') {

        $thang_num = 4;
    }

    if ($thang == 'May') {

        $thang_num = 5;
    }

    if ($thang == 'Jun') {

        $thang_num = 6;
    }

    if ($thang == 'Jul') {

        $thang_num = 7;
    }

    if ($thang == 'Aug') {

        $thang_num = 8;
    }

    if ($thang == 'Sep') {

        $thang_num = 9;
    }

    if ($thang == 'Oct') {

        $thang_num = 10;
    }

    if ($thang == 'Nov') {

        $thang_num = 11;
    }

    if ($thang == 'Dec') {

        $thang_num = 12;
    }



    $time_sale = "Ngày " . $ngay . ' tháng ' . $thang_num . ' năm ' . $nam . ' - ' . $gio . ' giờ ' . $phut . ' phút';
}



$content = $xtemplate->assign_blocks_content($content, array("PRODUCT" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'suggestionText' => $suggestionText,
    'defaultText' => 'Tìm sản phẩm',
    'productKey' => ($_POST['searchfield'] == '') ? $_GET['keyword'] : $_POST['searchfield'],
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'oderby' => $_GET['order'],
    'page' => page_div("./?show=khuyenmai&p=%d_pg&order=" . $_GET['order'], "10", ceil($numofpages), $page),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'catlist' => cat_fillter($_SESSION['CATID']),
    'lag_status' => $arr_lang['status'],
    'lag_date_create' => $arr_lang['date_added'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'delete_check' => $arr_lang['del_check'],
    'del_confirm' => $arr_lang['del_confirm'],
    'productname' => 'Tiêu đề',
    'image' => $arr_lang['image'],
    'ofcatalogue' => $arr_lang['ofcatalogue'],
    'shi' => $arr_lang['shi'],
    'ppromotions' => $arr_lang['ppromotions'],
    'pnew' => $arr_lang['pnew'],
    'sellers' => $arr_lang['sellers'],
    'list_nam' => $list_nam,
    'time_khuyenmai' => $time_sale,
    'time_kuyenmai_ngay' => $ngay,
    'time_kuyenmai_thang' => $thang,
    'time_kuyenmai_nam' => $nam,
    'time_kuyenmai_gio' => $gio,
    'time_kuyenmai_phut' => $phut,
    'disabled' => $disabled,
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>