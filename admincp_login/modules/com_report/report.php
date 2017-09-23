<?php

$title = 'Report';

$id = intval($_GET['id']);

$xtemplate->path = 'com_report/';

$content = $xtemplate->load('report');

$content = $xtemplate->replace($content, array(
    'title' => $title,
        ));

$adminFile = "./com_admin/note.log";

$adminLog = "./com_admin/login.log";

if (isset($_POST['btnsave'])) {
    if (file_exists($adminFile)) {
        $CF = fopen($adminFile, "w");

        $note = input($_POST['note']);

        fwrite($CF, $note);

        fclose($CF);
    } else {
        echo $arr_lag['findnotfile'] . ' ' . $adminFile;
        exit();
    }
} else if (isset($_POST['showAll'])) {

    $showAll = true;
} else if (isset($_POST['DelAll'])) {
    if (file_exists($adminLog)) {
        $CF = fopen($adminLog, "w");

        fwrite($CF, '');

        fclose($CF);
    } else {
        echo $arr_lag['findnotfile'] . ' ' . $adminLog;
        exit();
    }
} else if (isset($_POST['Delcache'])) {
    include(_CLASS . 'cache.php');

    $cache = new cache();

    $cid = $_POST['cache'];

    if (count($cid) > 0) {
        foreach ($cid as $c) {
            if ($c == 1) {
                $cache->flush(_HOME . 'home/cache/');
            }
        }
    }
} else if (isset($_POST['btnfindProduct']{1})) {
    header('location:./?show=product&keyword=' . $_POST['searchfield']);
}
if (file_exists($adminFile)) {
    $CF = fopen($adminFile, "r");

    $note = @fread($CF, filesize($adminFile));

    fclose($CF);
} else {
    echo $arr_lag['findnotfile'] . ' ' . $adminFile;
    exit();
}

if (function_exists('gd_info')) {
    $tmp_gd_info = gd_info();

    $gdver = $tmp_gd_info['GD Version'];
}

$mysqlver = @mysql_get_server_info();

$phpver = PHP_VERSION;

$phpos = PHP_OS;

$total_mysql = formatsize(total_mysql());

$content = $xtemplate->replace($content, array(
    'username' => $_SESSION['admin'][0],
    'last_login' => date('G:i:s d-m-Y', $_SESSION['admin'][2]),
    'note' => stripcslashes($note),
    'gdver' => $gdver,
    'mysqlver' => $mysqlver,
    'phpver' => $phpver,
    'phpos' => $phpos,
    'total_mysql' => $total_mysql,
    'cache_wish' => sizedir(_HOME . 'wish/cache/'),
    'cache_art' => sizedir(_HOME . 'art/cache/'),
    'cache_hmenu' => sizedir(_HOME . 'home/cache/'),
    'free_space' => formatsize(@disk_free_space(".")),
    'hello' => $arr_lang['hello'],
    'defaultText' => 'Tìm chủ đề',
    'last_login_admin' => $arr_lang['last_login_admin'],
    'hislogin' => $arr_lang['hislogin'],
    'return_conf' => $arr_lang['del_confirm'],
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$script = $xtemplate->replace($script, array(
    'suggestionText' => $suggestionText
        ));

$log = $xtemplate->get_block_from_str($content, "LOG");

if (file_exists($adminLog)) {
    $CF = fopen($adminLog, "r");

    $GetLog = @fread($CF, filesize($adminLog));

    fclose($CF);
} else {
    echo $arr_lag['findnotfile'] . ' ' . $adminLog;
    exit();
}

$GetLog = explode('/n', $GetLog);

$n = count($GetLog);

$c = 0;

$item_count = ($n > 5) ? ($n - 6) : 0;

if ($showAll == true) {
    $item_count = 0;
}
for ($i = $n - 2; $i >= $item_count; --$i) {
    ++$c;

    $exLog = explode('|N2|', $GetLog[$i]);

    $templog.= $xtemplate->assign_vars($log, array(
        'number' => ($c),
        'time' => date('G:i:s d/m/Y', $exLog[0]),
        'IPAddress' => $exLog[1],
        'browser' => $exLog[2],
    ));
}

$block_comment = $xtemplate->get_block_from_str($content, "COMMENT");

$row = GetRows('product_id,name,comment', 'guest_comment', '1=1 order by date desc limit 10');

$n = sizeof($row);

for ($i = 0; $i < $n; ++$i) {
    $pname = GetOnef('products_name', 'products', 'products_id=' . $row[$i]['product_id']);

    $temp_comment .= $xtemplate->assign_vars($block_comment, array(
        '_number' => ($i + 1),
        'pid' => $row[$i]['product_id'],
        '_title' => cut_string($pname, 20, '...'),
        '_title2' => $pname,
        '_name' => $row[$i]['name'],
        '_comment' => cut_string($row[$i]['comment'], 250, '...'),
    ));
}

$content = $xtemplate->assign_blocks_content($content, array(
    'SCRIPT' => '',
    'LOG' => $templog,
    'COMMENT' => $temp_comment,
        ));
?>