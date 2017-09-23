<?php

// Xu ly nut Status cho tat ca cac trang tin tuc

if (isset($_POST['btnStatus'])) {

    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    Set_status_news($id);

    if ($_GET['order'] != "") {
        header('location:./?show=newsList_opt_1&p=' . $_GET['p'] . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=newsList_opt_1&p=' . $_GET['p']);
    }
}

$title = 'Quản lý tin tức';

$xtemplate->path = 'com_news_general/';

$content = $xtemplate->load('NewsList_opt_1');

$code_cats = $xtemplate->get_block_from_str($content, "NEWS");

//Phan trang

$p_now = intval($_GET ['p']);

$mysql->setQuery("Select news_id from news where menu = 1 and language ='" . $lag . "'");

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

        $orderby = ' news_name asc';

        break;

    case 'name_desc':

        $orderby = ' news_name desc';

        break;

    case 'dateadd':

        $orderby = ' date_added asc';

        break;


    case 'dateadd_desc':

        $orderby = ' date_added desc';

        break;

    case 'status':

        $orderby = ' status asc';

        break;


    case 'datemodifiled':

        $orderby = ' last_modified asc';

        break;

    case 'datemodifiled_desc':

        $orderby = ' last_modified desc';

        break;

    default:

        $orderby = ' date_added desc';

        break;
}

$tag = 'a';

$hide = '';

$opt = 0;

$sql = "Select news_id,news_name,news_image,news_catalogue,status,date_added,last_modified from news where language ='" . $_SESSION['lag'] . "' and menu = 1 order by " . $orderby . " limit " . $limitvalue . ',' . $pp;


$style_display = "";

$thuocdanhmuc = "Thuộc danh mục";

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$temp = '';

for ($i = 0; $i < $n; ++$i) {

    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $img = $row[$i]['news_image'];

    $imgSrc = _UPLOAD_IMG_NEWS . $img;

    $imgThumb = _UPLOAD_IMG_NEWS_THUMB . $img;

    $img = ($img == '') ? "<img src ='" . _STYLE_IMG . "picoff.gif'>" : "<a href ='$imgThumb'><img border=0 style=\"cursor:hand\" src=\"" . _STYLE_IMG . "picon.gif\" onmouseover=\"this.src='" . _STYLE_IMG . "piconover.gif';return overlib('<div><table border=0 cellpadding=2 cellspacing=0><tr><td class=titleImg>Click to Thumbnails</td></tr><tr><td><img src=$imgSrc></a></td></tr></table></div>');\" onmouseout=\"this.src='" . _STYLE_IMG . "picon.gif';return nd();\"></a>";

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['news_id'],
        'news_name' => $row[$i]['news_name'],
        'news_image' => $img,
        'status' => ($row[$i]['status'] == '1') ? $arr_lang['show'] : $arr_lang['hidden'],
        'date_added' => date('h:i d/m/Y', $row[$i]['date_added']),
        'last_modified' => ($row[$i]['last_modified'] == '0') ? '0' : date('h:i d/m/Y', $row[$i]['last_modified']),
        'color' => $color));
}

$content = $xtemplate->assign_blocks_content($content, array("NEWS" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']), // Lay hoac gan gia tri cho p
    'oderby' => $_GET['order'],
    'page' => page_div("./?show=newsList_opt_1&p=%d_pg&order=" . $_GET['order'], "10", ceil($numofpages), $page),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_status' => $arr_lang['status'],
    'lag_date_create' => $arr_lang['date_added'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'status' => $status,
    'tag' => $tag,
    'hide' => $hide,
    'opt' => $opt,
    'style_display' => $style_display,
    'thuocdanhmuc' => $thuocdanhmuc,
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>