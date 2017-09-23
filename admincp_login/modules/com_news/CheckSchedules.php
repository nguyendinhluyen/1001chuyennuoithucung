<?php

$title = 'Quản lý lịch những bài sắp đăng website';
$xtemplate->path = 'com_news/';
$content = $xtemplate->load('CheckSchedules');
$code_cats = $xtemplate->get_block_from_str($content, "NEWS");
$p_now = intval($_GET ['p']);
$sql = "SELECT  news_id
                FROM news
                WHERE language ='" . $_SESSION['lag']
        . "' AND menu = 0
                        AND relax = 0
                        AND flag_publisher = 0";
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
$hide = '';
$opt = 0;
$orderby = 'date_publisher DESC';
$sql = "SELECT  news_id,
                    news_name,
                    news_image,
                    news_catalogue,
                    upgrade_news_catalogue,
                    status,
                    date_added,
                    last_modified,
                    flag_publisher,
                    date_publisher,
                    news_key
            FROM news
            WHERE language ='" . $_SESSION['lag']
        . "' AND menu = 0
                        AND relax = 0
                        AND flag_publisher = 0"
        . " ORDER BY " . $orderby . " limit " . $limitvalue . "," . $pp;
$style_display = "";
$mysql->setQuery($sql);
$row = $mysql->loadAllRow();
$n = count($row);
$temp = '';
for ($i = 0; $i < $n; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';
    $flag_publish = "";
    if ($row[$i]['flag_publisher'] == "0") {
        $flag_publish = "Chưa đăng";
    } else if ($row[$i]['flag_publisher'] == "1") {
        $flag_publish = "Đã đăng";
    }

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'news_name' => $row[$i]['news_name'],
        'status' => ($row[$i]['status'] == '1') ? $arr_lang['show'] : $arr_lang['hidden'],
        'color' => $color,
        'flag_publish' => $flag_publish,
        'date_publisher' => $row[$i]['date_publisher'],
        'link_preview' => '/doi-song-pets/' . $row[$i]['news_key'] . ".htm",
    ));
}
$content = $xtemplate->assign_blocks_content($content, array("NEWS" => $temp));
$content = $xtemplate->replace($content, array(
    'thuocdanhmuc' => $thuocdanhmuc,
    'lag_status' => $lag_status,
    'date' => $date,
    'date_modify' => $date_modify,
        ));

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'page' => page_div("./?show=checkSchedules&p=%d_pg&order=" . $_GET['order'], "10"
            , ceil($numofpages), $page),
    'opt' => $opt,
        ));
$script = $xtemplate->get_block_from_str($content, "SCRIPT");
$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>