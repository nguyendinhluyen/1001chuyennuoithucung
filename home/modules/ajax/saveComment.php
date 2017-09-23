<?php

include('home_start.php');

$user = input($_POST['user']);

if ($user != '') {
    $comment = input($_POST['comment']);

    if (strlen(trim($comment)) > 10) {

        $id_product = input($_POST['id_product']);

        $dataIns = array('id_product' => $id_product, 'comment' => $comment, 'date_comment' => time(), 'user' => $user);

        $id = insert('user_comment', $dataIns);

        if ($id > 0) {

            //$rateUs = GetOneRow("rate_date","rate_product","user = '".$user."' and product_id = ".$id_product." order by id desc limit 1");
            //$commentUs = GetOneRow("date_comment","user_comment","user = '".$user."' and id_product = ".$id_product." order by id limit 1");
            //if( abs($rateUs["rate_date"] - $commentUs['date_comment']) <= 1000)
            //{
            ////updateScore($user,"add",15,ACTION_COMMENT);
            //}
            //echo 'Cảm ơn bạn đã đánh giá sản phẩm.<br/> Nếu bạn chưa đánh giá sao cho sản phẩm, mời bạn đánh giá.';
        } else {
            echo "Gửi ý kiến đánh giá sản phẩm thất bại!";
        }
    } else {
        echo 'Bạn phải đánh giá hơn 10 ký tự!';
    }
} else {
    echo "Bạn phải đăng nhập để đánh giá sản phẩm!";
}
?>

