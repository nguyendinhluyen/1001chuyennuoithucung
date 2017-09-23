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

if (($_GET['action'] == 'del') && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    delete_img($id);

    delete_product($id);

    if ($_GET['order'] != "") {
        header('location:./?show=product&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    } else {
        header('location:./?show=product&p=' . intval($_GET['p']));
    }
}

if (isset($_POST['btnfindProduct'])) {
    if (empty($_POST['searchfield']) || $_POST['searchfield'] == "") {
        unset($_SESSION['QUERY_S']);

        $_SESSION['QUERY_KEY_S'] = "";
    } else {
        $temp = ($_POST['searchfield'] == '') ? $_GET['keyword'] : $_POST['searchfield'];

        unset($_SESSION['QUERY_S']);

        $keyword = input($temp);

        $where = "AND products_name like '%" . $keyword . "%'";

        $_SESSION['QUERY_S'] = $where;

        $where = '';

        $_SESSION['QUERY_KEY_S'] = $_POST['searchfield'];
    }
}

if (isset($_POST['btndel'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    delete_img($id);

    delete_product($id);

    if ($_GET['order'] != "") {
        header('location:./?show=product&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    } else {
        header('location:./?show=product&p=' . intval($_GET['p']));
    }
}

if (isset($_POST['btnencour'])) { // product encourage
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $sql = "UPDATE products SET p_encourage = 1  WHERE products_id in (" . $id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    if ($_GET['order'] != "") {
        header('location:./?show=product&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    } else {
        header('location:./?show=product&p=' . intval($_GET['p']));
    }
}

if (isset($_POST['btnnew'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $sql = "UPDATE products SET p_new = 1 WHERE products_id in (" . $id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    if ($_GET['order'] != "") {
        header('location:./?show=product&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    } else {
        header('location:./?show=product&p=' . intval($_GET['p']));
    }
}

if (isset($_POST['btnbest'])) { //product best seller
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $sql = "UPDATE products SET p_bestsell = 1  WHERE products_id in (" . $id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    if ($_GET['order'] != "") {
        header('location:./?show=product&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    } else {
        header('location:./?show=product&p=' . intval($_GET['p']));
    }
}

if (isset($_POST['btnstatus'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    Set_status_product($id);

    if ($_GET['order'] != "") {
        header('location:./?show=product&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    } else {
        header('location:./?show=product&p=' . intval($_GET['p']));
    }
}

if (isset($_POST['catlist'])) {
    if (empty($_POST['searchfield']) || $_POST['searchfield'] == "") {
        unset($_SESSION['QUERY_S']);
    }
    if ($_POST['catlist'] == 0) {
        unset($_SESSION['QUERY_P']);

        unset($_SESSION['CATID']);
    } else {
        $products_list = "";

        $catlist = $_POST['catlist'];

        $_SESSION['CATID'] = $catlist;

        $sql = "SELECT categories_id, level
					FROM categories
					WHERE categories_id = " . $catlist;

        $mysql->setQuery($sql);

        $categories_list = $mysql->loadOneRow();

        if ($categories_list['level'] == 1) {
            $sql = "SELECT categories_id
					    FROM categories
					    WHERE categories_id = " . $categories_list['categories_id']
                    . " OR parent_id = " . $categories_list['categories_id'];

            $mysql->setQuery($sql);

            $categories_list_2 = $mysql->loadAllRow();

            $categories_list_3 = "";

            for ($i = 0; $i < count($categories_list_2); $i++) {
                if ($i != count($categories_list_2) - 1)
                    $categories_list_3 .= "category_id = " . $categories_list_2[$i]["categories_id"] . " OR ";
                else
                    $categories_list_3 .= "category_id = " . $categories_list_2[$i]["categories_id"];
            }

            $sql = "SELECT product_id
					    FROM product_category
					    WHERE " . $categories_list_3 . " GROUP BY product_id ";
        }
        else {
            $sql = "SELECT product_id
					    FROM product_category
					    WHERE category_id = " . $catlist . " GROUP BY product_id ";
        }

        $mysql->setQuery($sql);

        $products_list = $mysql->loadAllRow();

        $list_products_id = " AND ( ";

        for ($i = 0; $i < count($products_list); $i++) {

            if ($i != (count($products_list) - 1 ))
                $list_products_id .= ' products_id = ' . $products_list[$i]['product_id'] . " OR ";
            else
                $list_products_id .= ' products_id = ' . $products_list[$i]['product_id'];
        }
        $list_products_id .= ")";


        $where = $list_products_id;

        $_SESSION['QUERY_P'] = $where;

        $where = '';
    }
}

$title = 'Danh sách sản phẩm';

$xtemplate->path = 'com_product/';

$content = $xtemplate->load('ProductList');

$code_cats = $xtemplate->get_block_from_str($content, "PRODUCT");

if ($_GET['order'] != 'price_asc' && $_GET['order'] != 'price_desc') {
    $p_now = intval($_GET ['p']);

    $sql = "SELECT products_id 
				FROM products 
				WHERE language='" . $_SESSION['lag'] . "' " . $_SESSION['QUERY_S'] . $_SESSION['QUERY_P'];

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

    switch ($_GET['order']) {
        case 'name':

            $orderby = ' products_name asc';

            break;

        case 'name_desc':

            $orderby = ' products_name desc';

            break;

        case 'status':

            $orderby = ' products_status asc';

            break;

        case 'dateadd':

            $orderby = ' products_date_added asc';

            break;
        case 'dateadd_desc':

            $orderby = ' products_date_added desc';

            break;

        case 'datemodifiled':

            $orderby = ' modified_date desc';

            break;

        default:

            $orderby = ' products_id desc';

            break;
    }

    $sql = "SELECT * 
            FROM products 
            WHERE language='" . $_SESSION['lag'] . "' " . $_SESSION['QUERY_S'] . $_SESSION['QUERY_P']
            . " ORDER BY $orderby limit $limitvalue,$pp";

    $mysql->setQuery($sql);

    $row = $mysql->loadAllRow();

    $n = count($row);

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

//VI TRI THEM DIEU CHINH SAP XEP TANG DAN HOAC GIAM DAN THEO GIA
else {

    function orderByASC($data, $field) {
        $code = "return strnatcmp(\$a['$field'], \$b['$field']);";
        usort($data, create_function('$a,$b', $code));
        return $data;
    }

    //Phan trang

    $p_now = intval($_GET ['p']);

    $sql = "SELECT * 
				FROM products 
				WHERE language='" . $_SESSION['lag'] . "' " . $_SESSION['QUERY_S'] . $_SESSION['QUERY_P'];

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
        'categories_id' => CatlistUpgrade_2($row[$i]['upgrade_categories_id']),
        'product_image' => $img,
        'sort_order' => $row[$i]['sort_order'],
        'products_status' => ($row[$i]['products_status'] == '1') ? $arr_lang['show'] : '<i>' . $arr_lang['hidden'] . '</i>',
        'date_added' => date('G:i d/m/Y', $row[$i]['products_date_added']),
        'modified_date' => ($row[$i]['modified_date'] == '0') ? '0' : date('G:i d/m/Y', $row[$i]['modified_date']),
        'price_product' => $row[$i]['products_price'] . ' VNĐ',
        'color' => $color
    ));
}

$content = $xtemplate->assign_blocks_content($content, array("PRODUCT" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'suggestionText' => $suggestionText,
    'defaultText' => 'Tìm thông tin sản phẩm : ',
    'productKey' => $_SESSION['QUERY_KEY_S'],
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'oderby' => $_GET['order'],
    'page' => page_div("./?show=product&p=%d_pg&order=" . $_GET['order'], "10", ceil($numofpages), $page),
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
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");
$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>