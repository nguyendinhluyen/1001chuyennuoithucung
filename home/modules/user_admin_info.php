<?php

$user_info = $xtemplate->load('user_admin_info_bootstrap');
$idadmin = input($_GET['idadmin']);
$row_ac = GetOneRow('user_name_visible,
                        name,
                        sex,
                        birthday,
                        avarta,
                        phone,
                        email,
                        address,
                        short_content,
                        facebook,
                        google,
                        twitter,
                        linkedin'
        , 'admin_control_user'
        , "idadmin_control_user = $idadmin");
if (empty($row_ac['avarta'])) {
    $row_ac['avarta'] = "default_author.png";
}
if (empty(trim($row_ac['name']))) {
    $row_ac['name'] = $row_ac['user_name_visible'];
}
if (empty(trim($row_ac['email']))) {
    $row_ac['email'] = "Đang cập nhật email";
}
if (empty(trim($row_ac['short_content']))) {
    $row_ac['short_content'] = "Đang cập nhật thông tin cá nhân.";
}

$user_info = $xtemplate->replace($user_info, array(
    'user_name_visible' => $row_ac['user_name_visible'],
    'avatar' => $row_ac['avarta'],
    'name' => $row_ac['name'],
    'email' => $row_ac['email'],
    'short_content' => $row_ac['short_content'],
    'display_user_info' => $display_user_info,
    'display_no_info' => $display_no_info,
    'facebook' => $row_ac['facebook'],
    'google' => $row_ac['google'],
    'twitter' => $row_ac['twitter'],
    'linkedin' => $row_ac['linkedin'],
        ));
$news = new News;
$libaries = $news->getAllNewsByAuthor($row_ac['user_name_visible']);
$total = count($libaries);

// Pagination
$pp = 10;
$p_now = intval($_GET ['page']);
$numofpages = $total / $pp;
$page = 0;

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

$begin = $limitvalue;
if ($numofpages != $p_now) {
    $end = $begin + $pp;
} else {
    $end = $total;
}

$block = $xtemplate->get_block_from_str($user_info, 'PROMOTION');
$tpl = '';
$n = count($libaries);
for ($i = $begin; $i < $end; $i++) {
    if ($libaries[$i]['news_name'] != "") {
        $date_array = split('-', $libaries[$i]['date_publisher']);
        $tpl.= $xtemplate->assign_vars($block, array(
            'news_name' => $libaries[$i]['news_name'],
            'news_short' => $libaries[$i]['news_shortcontent'],
            'news_key' => $libaries[$i]['news_key'],
            'news_image' => $libaries[$i]['news_image'],
            'date' => $date_array[2],
            'month' => $date_array[1],
            'year' => $date_array[0],
            'person_up' => 'Tác giả :&nbsp; '
            . '<b style= "font-family:RobotoSlabRegular; text-transform: uppercase;">'
            . $libaries[$i]['translator'] . '&nbsp;&nbsp;|&nbsp;&nbsp;</b>',
        ));
    }
}
$user_info = $xtemplate->assign_blocks_content($user_info, array(
    'PROMOTION' => $tpl
        ));

$user_info = $xtemplate->replace($user_info, array(
    'page' => pagination($linkS . 'cong-tac-vien/' . $idadmin . '.html/', ceil($numofpages), $page)
        ));

$breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
$breadcrumbs_path .= ' &raquo; ' . 'Thông Tin Cộng Tác Viên';
$title_page = 'Thông Tin Cộng Tác Viên';
$content = $user_info;
?>