<?php

$title = 'Thống kê truy cập webiste';

$xtemplate->path = 'com_visitor/';

$content = $xtemplate->load('visitor');

$block = $xtemplate->get_block_from_str($content, 'VISITOR');

$percent = "";

if (isset($_POST['visitor'])) {

    $visitor = $_POST['visitor'];
} else {
    $visitor = date('m', time());
}

$row = selectRow('*', 'visitor', "mon='" . $visitor . "' and year='" . date('Y', time()) . "'");

$max = GetOnef('max(visitor)', 'visitor', "mon='" . $visitor . "' and year='" . date('Y', time()) . "'");

$n = sizeof($row);

$xwidth = 300;

$i_visitor_old = 0; //so luot truy cap truoc thu i

$i_visitor = 0; //so luot truy cap thu i

$color = '';

for ($i = 0; $i < $n; ++$i) {

    $i_percent = 0;

    $i_visitor = $row[$i]['visitor'];

    $i_visitor_old = $row[$i - 1]['visitor'];

    $i_visitor_old = ($i_visitor_old == 0) ? '1' : $i_visitor_old;

    $width = round(($i_visitor * $xwidth) / $max);

    if ($i_visitor < $i_visitor_old) {

        $color = 'orange';

        $i_percent = (($i_visitor - $i_visitor_old) * 100) / $i_visitor_old;

        $i_percent = abs(round($i_percent, 2)) . " % ";
    } else {

        $color = 'green';

        $i_percent = (($i_visitor - $i_visitor_old) * 100) / $i_visitor_old;

        $i_percent = abs(round($i_percent, 2)) . " % ";
    }



    if ($i > 0) {

        if ($color == 'orange') {//giam
            $percent = " (<img style='vertical-align:middle' src='../style/images/down.png' style/>" . $i_percent . ')';
        } else {//tang va dung yen
            if ($i_visitor_old == $i_visitor) {//khong tang
                $percent = " (<img style='vertical-align:middle' src='../style/images/right.png'/> đứng yên)";
            } else {//tang
                $percent = " (<img style='vertical-align:middle' src='../style/images/up.png'/>" . $i_percent . ')';
            }
        }
    }

    $temp.=$xtemplate->assign_vars($block, array(
        'day_mon' => $row[$i]['day'],
        'visitor' => $row[$i]['visitor'],
        'color' => $color,
        'width' => $width,
        'percent' => $percent
    ));
}

$content = $xtemplate->assign_blocks_content($content, array('VISITOR' => $temp));

$content = $xtemplate->replace($content, array(
    'title' => $title,
    'dl_visitor' => dl_visitor($visitor)
        ));

//$script .= $xtemplate ->get_block_from_str($content,"SCRIPT");
//$content = $xtemplate ->assign_blocks_content($content,array("SCRIPT" => ''));
?>