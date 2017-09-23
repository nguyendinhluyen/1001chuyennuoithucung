<?php

include('home_start.php');
$id_product = $_POST['id_product'];
$rate = $_POST['rate'];
$user_name = $_POST['user_name'];
$arrData = array(
    'product_id' => $id_product,
    'rate' => $rate,
    'user' => $user_name,
    'rate_date' => time(),
);
insert('rate_product', $arrData);
echo 'Hệ thống đã lưu trữ đánh giá của bạn!';
?>

