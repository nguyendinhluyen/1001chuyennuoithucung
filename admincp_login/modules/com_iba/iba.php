<?php

if (isset($_POST['btnsubmit'])) {

    $ip = $_POST['ip'];

    $reason = $_POST['reason'];

    $time = time() + $_POST['time'];

    if (isset($ip{8})) {

        $data = array('ip' => $ip, 'reason' => $reason, 'date' => time(), 'time' => $time);

        insert('ip_based_access', $data);

        header('location:./?show=iba');
    }
} else if ($_GET['action'] == 'del') {

    deleteRow('ip_based_access', 'id=' . intval($_GET['id']));

    header('location:./?show=iba');
} else if (isset($_GET['ip'])) {

    $get_ip = $_GET['ip'];
}

delete('ip_based_access', "time <" . time());

$title = 'Danh sách các Ip bị cấm truy cập website';

$xtemplate->path = 'com_iba/';

$content = $xtemplate->load('iba');

$content = $xtemplate->replace($content, array('title' => $title, 'get_ip' => $get_ip));

$block = $xtemplate->get_block_from_str($content, 'IP');

$row = selectRow('*', 'ip_based_access', '1=1');

$n = sizeof($row);

for ($i = 0; $i < $n; ++$i) {

    $temp.=$xtemplate->assign_vars($block, array(
        'id' => $row[$i]['id'],
        'time' => ($row[$i]['time'] - time()),
        'reason' => $row[$i]['reason'],
        'ip' => $row[$i]['ip'],
        'date' => date('d-m-Y', $row[$i]['date'])
    ));
}

$content = $xtemplate->assign_blocks_content($content, array('IP' => $temp));

//$script .= $xtemplate ->get_block_from_str($content,"SCRIPT");
//$content = $xtemplate ->assign_blocks_content($content,array("SCRIPT" => ''));
?>