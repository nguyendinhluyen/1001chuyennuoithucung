<?php

$title = "Thêm phí vận chuyện";

$check_status = 'checked';

$id = intval($_GET['id']);

$update = 0;

$display = 'none';

if (isset($_GET['id'])) {

    $title = "Cập nhật phí vận chuyển";

    $update = 1;

    $row = GetOneRow('*', 'img_galary', 'galary_id=' . $id);

    $galary_district_name = $row['galary_district_name'];

    $galary_begin_price = $row['galary_begin_price'];

    $galary_end_price = $row['galary_end_price'];

    $galary_fee = $row['galary_fee'];

    $selected_city = "selected_" . $galary_district_name;

    if (empty($row)) {
        header('location:./?show=Opt_imgGallery');
    }
}

if (isset($_POST['btnSave'])) {

    $galary_district_name = $_POST['galary_district_name'];

    $galary_begin_price = $_POST['galary_begin_price'];

    $galary_end_price = $_POST['galary_end_price'];

    $galary_fee = $_POST['galary_fee'];

    // insert du lieu
    if ($update == 0) {

        $data = array(
            'galary_district_name' => $galary_district_name,
            'galary_begin_price' => $galary_begin_price, // Gia tien bat dau
            'galary_end_price' => $galary_end_price, // Gia tien ket thuc
            'galary_fee' => $galary_fee, // Chi phi van chuyen
            'galary_status' => 1,
            'galary_date' => time()
        );

        $lastID = insert('img_galary', $data);

        header('location:./?show=imgGallery&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    }

    // Cap nhat du lieu
    else {

        $data = array(
            'galary_district_name' => $galary_district_name,
            'galary_begin_price' => $galary_begin_price,
            'galary_end_price' => $galary_end_price,
            'galary_fee' => $galary_fee
        );

        update('img_galary', $data, 'galary_id=' . $id);

        header('location:./?show=imgGallery&order=' . $_GET['order'] . '&p=' . intval($_GET['p']));
    }
}

if ($update) {
    $display = 'block';
    $_SESSION['s_img_galary_id'] = $id;
} else {
    unset($_SESSION['s_img_galary_id']);
}


$xtemplate->path = 'com_img_galary/';

$content = $xtemplate->load('Opt_imgGalary');

$content = $xtemplate->replace($content, array(
    'title' => $title,
    'display' => $display,
    'galary_district_name' => $galary_district_name,
    'galary_begin_price' => $galary_begin_price,
    'galary_end_price' => $galary_end_price,
    'galary_fee' => $galary_fee,
    $selected_city => "selected",
    'session_id' => session_id()
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>