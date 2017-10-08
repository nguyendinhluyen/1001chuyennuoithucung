<?php

$xtemplate->path = 'com_admin/';
$menu = $xtemplate->load('menu');
$accessControl = $_SESSION['admin'][3];
if (!empty($row)) {
    // Display sub-menu
    $arr_accessControl = explode(';', $accessControl);
    for ($i = 0; $i < count($arr_accessControl); $i++) {
        $display_i = "display_" . $arr_accessControl[$i];
        $menu = $xtemplate->replace($menu, array(
            $display_i => "display:block",
        ));
    }
    // Display main menu
    if (strpos($accessControl, ';11;') === false
            && strpos($accessControl, ';12;') === false
            && strpos($accessControl, ';13;') === false
            && strpos($accessControl, ';14;') === false) {
        $display_all_1 = "display: none";
    }
    if (strpos($accessControl, ';21;') === false
            && strpos($accessControl, ';22;') === false) {
        $display_all_2 = "display: none";
    }
    if (strpos($accessControl, ';31;') === false
            && strpos($accessControl, ';32;') === false ) {
        $display_all_3 = "display: none";
    }
}

$menu = $xtemplate->replace($menu, array(
    'llag' => ($_SESSION['lag'] == 'vi') ? 'en' : 'vi',
    'lang' => ($_SESSION['lag'] == 'vi') ? 'English' : 'Tiếng Việt',
    'information' => $arr_lang['information'],
    'navpro' => $arr_lang['navpro'],
    'cat_manage' => $arr_lang['cat_manage'],
    'product_manager' => $arr_lang['product_manager'],
    'pnew' => $arr_lang['pnew'],
    'sellers' => $arr_lang['sellers'],
    'newsmanger' => $arr_lang['newsmanger'],
    'news' => $arr_lang['news'],
    'custommer' => $arr_lang['custommer'],
    'supportCus' => $arr_lang['supportCus'],
    'ads' => $arr_lang['ads'],
    'config' => $arr_lang['config'],
    'order2' => $arr_lang['order2'],
    'logout' => $arr_lang['logout'],
    'view' => $arr_lang['view'],
    'config' => $arr_lang['config'],
    'changeacc' => "Cập nhật Super Admin",
    'logout_conf' => $arr_lang['logout_conf'],
    'display_all_1' => $display_all_1,
    'display_all_2' => $display_all_2,
    'display_all_3' => $display_all_3
));
?>