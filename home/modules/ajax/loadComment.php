<?php

include('home_start.php');

$id_product = input($_GET['id_product'], 1);

$arrComment = GetRows('DISTINCT comment,id_product, date_comment, user', 'user_comment', 'id_product = ' . $id_product . ' order by date_comment desc');

$tplComment = $xtemplate->load('loadComment');

$blockComment = $xtemplate->get_block_from_str($tplComment, 'COMMENT');

if (!empty($arrComment)) {

    $tpl = '';

    $n = count($arrComment);

    for ($i = 0; $i < $n; $i++) {
        $usr = GetOneRow('name', 'user', "email = '" . $arrComment[$i]['user'] . "' and status >=0");

        $tpl.= $xtemplate->assign_vars($blockComment, array(
            'name_date' => 'Thành viên: ' . $usr['name'] . ' ( ' . date("d-m-Y -- H:i:s", $arrComment[$i]['date_comment']) . ')',
            'comment' => $arrComment[$i]['comment'],
        ));
    }
}

$data = $xtemplate->assign_blocks_content($tplComment, array(
    'COMMENT' => $tpl
        ));

if (empty($arrComment)) {

    echo "Chưa có ý kiến nào cho sản phẩm";
} else {

    echo $data;
}
?>

