<?php

$xtemplate->path = 'com_admin/';

$menu = $xtemplate->load('menu');

$array_checked_box_save = split(';', $_SESSION['admin'][3]);

if (!empty($row)) {
    for ($i = 0; $i < count($array_checked_box_save); $i++) {
        $display_i = "display_" . $array_checked_box_save[$i];

        $menu = $xtemplate->replace($menu, array(
            $display_i => "display:block",
        ));
    }

    if (strpos($_SESSION['admin'][3], ';1;') === false && strpos($_SESSION['admin'][3], ';2;') === false && strpos($_SESSION['admin'][3], ';3;') === false && strpos($_SESSION['admin'][3], ';4;') === false && strpos($_SESSION['admin'][3], ';5;') === false && strpos($_SESSION['admin'][3], ';6;') === false && strpos($_SESSION['admin'][3], ';7;') === false) {
        $display_all_1 = "display: none";
    }

    if (strpos($_SESSION['admin'][3], ';8;') === false && strpos($_SESSION['admin'][3], ';9;') === false && strpos($_SESSION['admin'][3], ';10;') === false && strpos($_SESSION['admin'][3], ';11;') === false && strpos($_SESSION['admin'][3], ';12;') === false) {
        $display_all_2 = "display: none";
    }

    if (strpos($_SESSION['admin'][3], ';13;') === false && strpos($_SESSION['admin'][3], ';14;') === false && strpos($_SESSION['admin'][3], ';15;') === false && strpos($_SESSION['admin'][3], ';16;') === false && strpos($_SESSION['admin'][3], ';17;') === false) {
        $display_all_3 = "display: none";
    }

    if (strpos($_SESSION['admin'][3], ';18;') === false && strpos($_SESSION['admin'][3], ';19;') === false && strpos($_SESSION['admin'][3], ';20;') === false && strpos($_SESSION['admin'][3], ';29;') === false && strpos($_SESSION['admin'][3], ';30;') === false && strpos($_SESSION['admin'][3], ';32;') === false && strpos($_SESSION['admin'][3], ';33;') === false && strpos($_SESSION['admin'][3], ';34;') === false) {
        $display_all_4 = "display: none";
    }

    if (strpos($_SESSION['admin'][3], ';21;') === false) {
        $display_all_5 = "display: none";
    }

    if (strpos($_SESSION['admin'][3], ';22;') === false) {
        $display_all_6 = "display: none";
    }

    if (strpos($_SESSION['admin'][3], ';23;') === false && strpos($_SESSION['admin'][3], ';24;') === false) {
        $display_all_7 = "display: none";
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
    'display_all_3' => $display_all_3,
    'display_all_4' => $display_all_4,
    'display_all_5' => $display_all_5,
    'display_all_6' => $display_all_6,
    'display_all_7' => $display_all_7,
        ));
?>