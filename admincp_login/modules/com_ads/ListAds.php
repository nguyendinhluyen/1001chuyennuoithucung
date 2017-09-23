<?php

if (($_GET['action'] == 'del') && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    delete_logo_ads($id);
    delete_ads($id);
    header('location:./?show=Ads&p=' . intval($_GET['p']));
} else if (isset($_POST['btndel'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
    delete_logo_ads($id);
    delete_ads($id);
    header('location:./?show=Ads&p=' . intval($_GET['p']));
} else if (isset($_POST['btnstatus'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
    Set_status_ads($id);
    header('location:./?show=Ads&p=' . intval($_GET['p']));
}

$title = 'Quản lý thương hiệu';
$xtemplate->path = 'com_ads/';
$content = $xtemplate->load('ListAds');
$code_adver = $xtemplate->get_block_from_str($content, "ADVER");

// Navigation
$p_now = intval($_GET ['p']);
$mysql->setQuery('SELECT adver_id FROM ads');
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
        $orderby = ' adver_webname';
        break;
    case 'status':
        $orderby = ' adver_status';
        break;
    case 'dateadd':
        $orderby = ' date_added';
        break;
    case 'datemodifiled':
        $orderby = ' date_modifile';
        break;
    default:
        $orderby = ' adver_id DESC';
        break;
}

$sql = "SELECT adver_id,"
        . "adver_webname,"
        . "adver_logo,"
        . "adver_order,"
        . "adver_status,"
        . "date_added,"
        . "date_modifile "
        . "FROM ads "
        . "WHERE 1=1 ORDER BY $orderby LIMIT $limitvalue,$pp";
$mysql->setQuery($sql);
$row = $mysql->loadAllRow();
$n = count($row);

$temp = '';
for ($i = 0; $i < $n; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';
    $logo = $row[$i]['adver_logo'];
    $logoThumb = _UPLOAD_AD_THUMB . $logo;
    if (!checkExtentFile($logo, 'swf|flv')) {
        $logo = ($logo == '') ? "<img src ='" . _STYLE_IMG
                . "picoff.gif'>" : "<a href ='$logoThumb'><img border=0 style=\"cursor:hand\" src=\""
                . _STYLE_IMG . "picon.gif\" onmouseover=\"this.src='" . _STYLE_IMG
                . "piconover.gif';return overlib('<div><table border=0 cellpadding=2 cellspacing=0><tr><td class=titleImg>Click to Thumbnails</td></tr><tr><td><img src=" . _UPLOAD_AD . $logo . "></a></td></tr></table></div>');\" onmouseout=\"this.src='" . _STYLE_IMG . "picon.gif';return nd();\"></a>";
    } else if (!checkExtentFile($logo, 'flv')) {
        $logo = "<a href ='$logoThumb'>Flash</a>";
    } else {
        $logo = "<a href ='$logoThumb'>Flv</a>";
    }

    $temp.= $xtemplate->assign_vars($code_adver, array(
        'id' => $row[$i]['adver_id'],
        'adver_webname' => $row[$i]['adver_webname'],
        'adver_logo' => $logo,
        'adver_order' => $row[$i]['adver_order'],
        'adver_status' => ($row[$i]['adver_status'] == '1') ? $arr_lang['show'] : '<i>' . $arr_lang['hidden'] . '</i>',
        'date_added' => date('G:i d/m/Y', $row[$i]['date_added']),
        'date_modifile' => ($row[$i]['date_modifile'] == 0) ? '0' : date('G:i d/m/Y', $row[$i]['date_modifile']),
        'color' => $color));
}
$content = $xtemplate->assign_blocks_content($content, array("ADVER" => $temp));
$content = $xtemplate->replace($content, array(
    'lag_ad_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'page' => page_div("./?show=Ads&p=%d_pg", "10", ceil($numofpages), $page),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_status' => $arr_lang['status'],
    'lag_date_create' => $arr_lang['date_added'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'delete_check' => $arr_lang['del_check'],
    'del_confirm' => $arr_lang['del_confirm'],
        ));
$script = $xtemplate->get_block_from_str($content, "SCRIPT");
$content = $xtemplate->assign_blocks_content($content, array('SCRIPT' => ''));
?>