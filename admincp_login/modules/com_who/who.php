<?php

$title = 'Ai đang online';

$meta = '<meta http-equiv="Refresh" content="20;url=./?show=who">';

$xtemplate->path = 'com_who/';

$content = $xtemplate->load('who');

$row = GetRows('*', 'visitor', '1=1');

$n = sizeof($row);

$MaxOnline = 0;

for ($i = 0; $i < $n; ++$i) {

    if ($row[$i]['visitor'] > $MaxOnline) {

        $MaxOnline = $row[$i]['visitor'];

        $timeMaxOnline = $row[$i]['day'] . ' tháng ' . $row[$i]['mon'] . ' năm ' . $row[$i]['year'];
    }

    $visitor+=$row[$i]['visitor'];
}

$content = $xtemplate->replace($content, array(
    'visitor' => $visitor,
    'MaxOnline' => $MaxOnline,
    'timeMaxOnline' => $timeMaxOnline,
    'title' => $title,
    'MaxOnline2' => GetConfig('MaxOnline'),
    'timeMaxOnline2' => date('G:i:s d/m/Y', GetConfig('timeMaxOnline'))
        ));

$block = $xtemplate->get_block_from_str($content, 'WHO');

$row = selectRow('ip_address,refurl,user_host', 'usersonline', 'timestamp>' . (time() - 300) . ' order by timestamp desc');

$n = sizeof($row);

if (isset($_POST['ViewAll'])) {

    $m = $n;

    $danhsachonline = 'Danh sách những khách đang truy cập website';
} else {

    $m = ($n > 10) ? 10 : $n;

    $danhsachonline = 'Danh sách 10 khách vừa truy cập website';
}

for ($i = 0; $i < $m; ++$i) {

    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.=$xtemplate->assign_vars($block, array(
        'ip_address' => $row[$i]['ip_address'],
        'gip_address' => $row[$i]['ip_address'],
        'color' => $color,
        'refurl' => $row[$i]['refurl'],
        'stt' => ($i + 1),
        'user_host' => $row[$i]['user_host']
    ));
}

$content = $xtemplate->replace($content, array(
    'online' => $n,
    'danhsachonline' => $danhsachonline
        ));

$content = $xtemplate->assign_blocks_content($content, array('WHO' => $temp));

//$script .= $xtemplate ->get_block_from_str($content,"SCRIPT");
//$content = $xtemplate ->assign_blocks_content($content,array("SCRIPT" => ''));
?>