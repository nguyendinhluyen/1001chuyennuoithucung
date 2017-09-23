<?php

switch ($_GET['opt']) {

    case 'new':

        $opt = 'p_new';

        $title = 'Sản phẩm mới';

        break;

    case 'encourage':

        $opt = 'p_encourage';

        $title = 'Sản phẩm khuyến mãi';

        break;

    case 'bestsell':

        $opt = 'p_bestsell';

        $title = 'Sản phẩm đặc trưng';

        break;

    default:

        header("location:./?show=product");
}

if (($_GET['action'] == 'del') && isset($_GET['id'])) {

    $id = intval($_GET['id']);

    $sql = 'update products set ' . $opt . ' = 0 where products_id =' . $id;

    $mysql->setQuery($sql);

    $mysql->query();

    header('location:./?show=productOpt&opt=' . $_GET['opt'] . '&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
}

if (isset($_POST['btndel'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    $sql = "update products set $opt = 0 where products_id in (" . $id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    header('location:./?show=productOpt&opt=' . $_GET['opt'] . '&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
}

$xtemplate->path = 'com_product/';

$content = $xtemplate->load('ProductOpt');

$code_cats = $xtemplate->get_block_from_str($content, "PRODUCT");

//Phan trang

$p_now = intval($_GET ['p']);

$mysql->setQuery("Select products_id from products where language ='" . $_SESSION['lag'] . "' and " . $opt . "=1");

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

        $orderby = ' products_name';

        break;

    case 'catalogue':

        $orderby = ' categories_id';

        break;

    case 'status':

        $orderby = ' products_status';

        break;

    case 'dateadd':

        $orderby = ' products_date_added desc';

        break;

    case 'datemodifiled':

        $orderby = ' modified_date desc';

        break;

    default:

        $orderby = ' products_id desc';

        break;
}

$sql = "Select products_id,products_name,products_image,categories_id,products_status,products_date_added,modified_date from products where language ='" . $_SESSION['lag'] . "' and " . $opt . "=1 order by " . $orderby . " limit " . $limitvalue . ',' . $pp;

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$temp = '';

for ($i = 0; $i < $n; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $img = $row[$i]['products_image'];

    $imgSrc = _UPLOAD_IMG . $img;

    $imgThumb = _UPLOAD_IMG_THUMB . $img;

    $img = ($img == '') ? "<img src ='" . _STYLE_IMG . "picoff.gif'>" : "<a href ='$imgThumb'><img border=0 style=\"cursor:hand\" src=\"" . _STYLE_IMG . "picon.gif\" onmouseover=\"this.src='" . _STYLE_IMG . "piconover.gif';return overlib('<div><table border=0 cellpadding=2 cellspacing=0><tr><td class=titleImg>Click to Thumbnails</td></tr><tr><td><img src=$imgSrc></a></td></tr></table></div>');\" onmouseout=\"this.src='" . _STYLE_IMG . "picon.gif';return nd();\"></a>";

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['products_id'],
        'product_name' => $row[$i]['products_name'],
        'categories_id' => get_cats_name($row[$i]['categories_id']),
        'product_image' => $img,
        'products_status' => ($row[$i]['products_status'] == '1') ? $arr_lang['show'] : $arr_lang['hidden'],
        'date_added' => date('h:i d/m/Y', $row[$i]['products_date_added']),
        'modified_date' => ($row[$i]['modified_date'] == '0') ? '0' : date('h:i d/m/Y', $row[$i]['modified_date']),
        'color' => $color));
}

$content = $xtemplate->assign_blocks_content($content, array("PRODUCT" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'orderby' => $_GET['order'],
    'opt' => $_GET['opt'],
    'page' => page_div("./?show=productOpt&opt=" . $_GET['opt'] . "&p=%d_pg&order=" . $_GET['order'], "10", ceil($numofpages), $page),
    'lag_delete' => $arr_lang['del'],
    'lag_status' => $arr_lang['status'],
    'lag_date_create' => $arr_lang['date_added'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'delete_check' => $arr_lang['del_check'],
    'del_confirm' => $arr_lang['del_confirm'],
    'productname' => $arr_lang['product'],
    'ofcatalogue' => $arr_lang['ofcatalogue'],
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>