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

$title = "Khách hàng thân thiết";

$id_sp = intval($_GET['id']);

$update = 0;

if (isset($_GET['id'])) {
    $title = "Cập nhật Khách Hàng Thân Thiết";

    $row = GetOneRow('*', 'VIPCustomer', 'idVIPCustomer=' . $id_sp);

    $update = 1;

    $name_VIPCustomer = $row['NameVIPCustomer'];

    $Score = $row['Score'];

    $DisCount = $row['DisCount'];

    $FeeLevel = $row['FeeLevel'];

    $id_VIPCustomer = $row['idVIPCustomer'];

    if (empty($row)) {
        header('location:./?show=VIPCustomer');
    }
}

if (isset($_POST['btnSave'])) {
    $name_VIPCustomer = $_POST['name_type_of_Customer'];

    $Score = str_replace(".", "", $_POST['score_level']);

    $DisCount = $_POST['sale_level'];

    $FeeLevel = $_POST['fee_level'];

    if ($name_VIPCustomer == "" || $Score == "" || $DisCount == "" || $FeeLevel == "") {
        ?>
        <script>

            alert("Báo lỗi! Chưa nhập đầy đủ thông tin Tên danh hiệu - Mức điểm - Chiết khấu - Phí duy trì!");

        </script>

        <?php

    } else {
        if ($update == 0) {
            $data = array(
                'NameVIPCustomer' => $name_VIPCustomer,
                'Score' => $Score,
                'DisCount' => $DisCount,
                'FeeLevel' => $FeeLevel,
                'Date' => time()
            );

            $lastID = insert('VIPCustomer', $data);

            header('location:./?show=VIPCustomer&p=' . intval($_GET['p']));
        } else {
            $data = array(
                'NameVIPCustomer' => $name_VIPCustomer,
                'Score' => $Score,
                'DisCount' => $DisCount,
                'FeeLevel' => $FeeLevel,
            );

            update('VIPCustomer', $data, 'idVIPCustomer=' . $id_sp);

            header('location:./?show=VIPCustomer&p=' . intval($_GET['p']));
        }
    }
}

$xtemplate->path = 'com_VIPCustomer/';

$content = $xtemplate->load('Opt_imgGalary');

$content = $xtemplate->replace($content, array(
    'title' => $title,
    'name_type_of_Customer' => $name_VIPCustomer,
    'score_level' => formatMoney($Score),
    'sale_level' => $DisCount,
    'fee_level' => $FeeLevel,
        ));


$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>