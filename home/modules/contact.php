<?php

if (isset($_POST['butSub'])) {
    $txtHoten = input($_POST['txtHoten']);
    $txtDienthoai = input($_POST['txtDienthoai']);
    $txtEmail = input($_POST['txtEmail']);
    $txtNoidung = input($_POST['txtNoidung']);
    if (!empty($txtHoten) && !empty($txtDienthoai) && !empty($txtEmail) && !empty($txtNoidung)) {
        $data = array(
            'name' => $txtHoten,
            'title' => substr($txtNoidung, 0, 20),
            'comment' => $txtNoidung,
            'phone' => $txtDienthoai,
            'email' => $txtEmail,
            'date' => time(),
            'ip' => $_SERVER['REMOTE_ADDR']
        );
        insert('contact', $data);
        $success = '<span style="font-size:14px;color:blue; '
                . 'font-family:RobotoSlabRegular; '
                . 'line-height: 25px;">'
                . 'Thông tin của bạn đã được gửi thành công, chúng tôi sẽ hồi âm cho bạn trong thời gian sớm nhất !'
                . '</span>';
    } else {
        ?>
        <script>
            alert("Vui lòng kiểm tra đầy đủ các thông tin!");
        </script>    
        <?php

    }
}
$breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
$breadcrumbs_path .= ' &raquo; ' . 'Liên Hệ';
$title_page = 'Liên Hệ';
$content = $xtemplate->load('contact_bootstrap');
$content = $xtemplate->replace($content, array(
    'success' => $success
        ));
?>