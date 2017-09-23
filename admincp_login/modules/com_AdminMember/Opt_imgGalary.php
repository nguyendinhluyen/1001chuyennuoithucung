<?php

//VI TRI THEM DIEU CHINH TIEN TE
function formatMoney($number, $fractional = false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

$title = "Group Member";

$id_sp = intval($_GET['id']);

$update = 0;

if (isset($_GET['id'])) {
    $title = "Cập nhật Group Member";

    $row = GetOneRow('*', 'GroupMember', 'idGroupMember=' . $id_sp);

    $update = 1;

    $name_GroupMember = $row['NameGroupMember'];

    $DisCount = $row['DisCount'];

    $id_GroupMember = $row['idGroupMember'];

    if (empty($row)) {
        header('location:./?show=GroupMember');
    }
}

if (isset($_POST['btnSave'])) {
    $name_GroupMember = $_POST['name_type_of_GroupMember'];

    $DisCount = $_POST['sale_level'];

    if ($name_GroupMember == "" || $DisCount == "") {
        ?>
        <script>

            alert("Báo lỗi! Chưa nhập đầy đủ thông tin Tên danh hiệu - Chiết khấu!");

        </script>

        <?php

    } else {
        if ($update == 0) {
            $data = array(
                'NameGroupMember' => $name_GroupMember,
                'DisCount' => $DisCount,
                'Date' => time()
            );

            $lastID = insert('GroupMember', $data);

            header('location:./?show=GroupMember&p=' . intval($_GET['p']));
        } else {
            $data = array(
                'NameGroupMember' => $name_GroupMember,
                'DisCount' => $DisCount,
            );

            update('GroupMember', $data, 'idGroupMember=' . $id_sp);

            header('location:./?show=GroupMember&p=' . intval($_GET['p']));
        }
    }
}

$xtemplate->path = 'com_AdminMember/';

$content = $xtemplate->load('Opt_imgGalary');

$content = $xtemplate->replace($content, array(
    'title' => $title,
    'name_type_of_GroupMember' => $name_GroupMember,
    'sale_level' => $DisCount,
        ));


$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>