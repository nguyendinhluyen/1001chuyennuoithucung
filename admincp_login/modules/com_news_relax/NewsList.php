<?php

// Xu ly nut xoa cho tat ca cac trang tin tuc

if (($_GET['action'] == 'del') && isset($_GET['id'])) {

    $id = intval($_GET['id']);

    delete_img_news($id);

    delete_news($id);

    header('location:./?show=newsList_relax');
}

// Xu ly nut del cho tat ca cac trang tin tuc

if (isset($_POST['btndel'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    delete_img_news($id);

    delete_news($id);

    header('location:./?show=newsList_relax');
}

// Xu ly nut Status cho tat ca cac trang tin tuc
else if (isset($_POST['btnStatus'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    Set_status_news($id);

    header('location:./?show=newsList_relax');
}

$title = 'Quản lý giải trí';

$xtemplate->path = 'com_news_relax/';

$content = $xtemplate->load('NewsList');

$code_cats = $xtemplate->get_block_from_str($content, "NEWS");

//Phan trang

$p_now = intval($_GET ['p']);

$mysql->setQuery("SELECT news_id FROM news WHERE relax = 1 AND language ='" . $lag . "'");

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

    case 'catalogue':

        $orderby = ' news_catalogue asc';

        break;

    case 'status':

        $orderby = ' status asc';

        break;

    case 'dateadd':

        $orderby = ' date_added asc';

        break;

    case 'dateadd_desc':

        $orderby = ' date_added desc';

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

$hide = '';

$opt = 0;

$sql = "SELECT 
				news_id,
				news_name,
				news_image,
				news_catalogue,
				status,
				date_added,
				last_modified 
			FROM news 
			WHERE language ='" . $_SESSION['lag'] . "' AND menu = 0 
												   AND help_flag = 0 
												   AND relax = 1 ORDER BY $orderby limit $limitvalue,$pp";

$style_display = "";

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
        'news_catalogue' => get_catsnews_name($row[$i]['news_catalogue']),
        'news_image' => $img,
        'status' => ($row[$i]['status'] == '1') ? $arr_lang['show'] : $arr_lang['hidden'],
        'date_added' => date('G:i d/m/Y', $row[$i]['date_added']),
        'last_modified' => ($row[$i]['last_modified'] == '0') ? '0' : date('G:i d/m/Y', $row[$i]['last_modified']),
        'color' => $color));
}

$content = $xtemplate->assign_blocks_content($content, array("NEWS" => $temp));

///////////////////////////////////////////////////////////////////////////////////////////

if ($_GET['opt'] == 2) {
    $thuocdanhmuc = "&nbsp;";

    $date = 'Ngày thêm';

    $date_modify = 'Lần sửa';

    $lag_status = 'Trạng thái';

    $content = $xtemplate->replace($content, array(
        'a' => 'Tiêu đề',
        'thuocdanhmuc' => $thuocdanhmuc,
        'lag_status' => $lag_status,
        'date' => $date,
        'date_modify' => $date_modify,
    ));
} else {
    $thuocdanhmuc = "<a href = './?show=newsList_relax&order=catalogue&p={p}' style = 'text-decoration:underline'>Thuộc danh mục</a>";

    $date = "<a href = './?show=newsList_relax&order=dateadd&p={p}'style = 'text-decoration:underline'>Ngày thêm (cũ)</a></a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=newsList_relax&order=dateadd_desc&p={p}' style ='text-decoration:underline'>(mới)</a></span>";

    $date_modify = "<a href = './?show=newsList_relax&order=datemodifiled&p={p}'style = 'text-decoration:underline'>Lần sửa (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=newsList_relax&order=datemodifiled_desc&p={p}' style ='text-decoration:underline'>(mới)</a></span>";

    $lag_status = "<a href = './?show=newsList_relax&order=status&p={p}'style='text-decoration:underline'>Trạng thái</a>";

    $content = $xtemplate->replace($content, array(
        'a' => '<a href = "./?show=newsList_relax&order=name&p={p}"style = "text-decoration:underline">Tiêu đề (a->z)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = "./?show=newsList_relax&order=name_desc&p={p}"style = "text-decoration:underline">(z->a)</a></span>',
        'thuocdanhmuc' => $thuocdanhmuc,
        'lag_status' => $lag_status,
        'date' => $date,
        'date_modify' => $date_modify,
    ));
}

/////////////////////////////////////////////////////////////////////////////////////////////////

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']), // Lay hoac gan gia tri cho p		
    'oderby' => $_GET['order'],
    'page' => page_div("./?show=newsList_relax&p=%d_pg&order=" . $_GET['order'], "10", ceil($numofpages), $page),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_date_create' => $arr_lang['date_added'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'delete_check' => $arr_lang['del_check'],
    'del_confirm' => $arr_lang['del_confirm'],
    'status' => $status,
    'hide' => $hide,
    'opt' => $opt,
    'style_display' => $style_display,
    //KHONG CO PHAN AN/HIEN THI TRONG TRO GIUP
    'style_display_btStatus' => $style_display_btStatus,
    'style_display_btAdd' => $style_display_btAdd,
    'style_display_btDelete' => $style_display_btDelete,
    chk_disabled_all => $chk_disabled,
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>