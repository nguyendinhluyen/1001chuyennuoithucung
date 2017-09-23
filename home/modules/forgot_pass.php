<?php

$forget_pass = $xtemplate->load('forgot_pass_bootstrap');

$breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';

$breadcrumbs_path .= ' &raquo; ' . 'Quên mật khẩu';

$title_page = 'Quên mật khẩu';

$msg = '';

$User = new User();

if (isset($_GET['ser_key'])) {

    $forget_pass = $xtemplate->replace($forget_pass, array(
        'display' => 'style = "display: none"',
    ));

    $ser_key = input($_GET['ser_key']);

    $usr_inf = $User->getUserInfoByActiveLink($ser_key);

    if (empty($usr_inf)) {
        $msg = "Không tồn tại thành viên hoặc link kích hoạt cho thành viên này trong hệ thống ! 
                    <br/>
                    <span style='text-align:center'> Trân trọng NanaPet Online</span>
                    <br/>";
        $forget_pass = $xtemplate->replace($forget_pass, array(
            'display_2' => 'style = "display: none"',
        ));
    } else {
        $forget_pass = $xtemplate->replace($forget_pass, array(
            'display_2' => 'style = "display: block"',
        ));

        $forget_pass = $xtemplate->replace($forget_pass, array(
            'user_name' => $usr_inf['name'],
        ));
    }
    if (isset($_POST['update_password']) && !empty($usr_inf)) {

        $email_got = $usr_inf['email'];

        $pass_got = input($_POST['new_pass']);

        $pass_got_2 = input($_POST['replay_new_pass']);

        if ($pass_got == $pass_got_2) {

            if ($User->updateAfterForgotPass($email_got, md5($pass_got))) {
                ?>
                <script>
                    alert("Cập nhật password mới thành công.");
                    window.location.href = 'http://nanapet.com/dang-nhap';
                </script>
                <?php

            } else {
                $msg = "Cập nhật password mới thất bại!";
            }
        } else {
            $msg = "Password nhập chưa trùng!";
        }
    }
} else {

    $forget_pass = $xtemplate->replace($forget_pass, array(
        'display_2' => 'style = "display: none"',
    ));
}
if (isset($_POST['forgot'])) {

    $email = input($_POST['email']);

    // Check email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $usr = $User->getUserInfo($email);

        if (!empty($usr['email'])) {

            $rad = rand(1111111111, 9999999999);

            $keylink = md5($rad) . md5($usr['email']) . md5(time());

            $tpl_mail = $xtemplate->load('forgot_pass_mail_bootstrap');

            $link_active = getFullDomain();

            $link_active .= $linkS . 'quen-mat-khau.html/' . $keylink;

            $tpl_mail = $xtemplate->replace($tpl_mail, array(
                'email' => $usr['name'],
                'link_active' => $link_active
            ));

            $mail_to = $usr['email'];

            $mail_name_to = $usr['name'];

            $mail_body = $tpl_mail;

            $mail_subject = "NanaPet thông báo: Thay đổi mật khẩu của " . $mail_name_to;

            // To send HTML mail, the Content-type header must be set
            $headers = 'MIME-Version: 1.0' . "\r\n";

            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
            $headers .= 'To: ' . $mail_name_to . "\r\n";

            $headers .= 'From:' . 'nanpet.com' . "\r\n";

            if (mail($mail_to, $mail_subject, $mail_body, $headers)) {
                //Active link
                $User->updateActiveLink($email, $keylink);

                $forget_pass = $xtemplate->replace($forget_pass, array(
                    'display' => 'style = "display: none"',
                    'msg' => "<span style='color: black'>
                                            NanaPet đã gửi mail xác nhận vào địa chỉ mail của bạn.
                                            <br/>
                                            Bạn vui lòng kiểm tra Inbox hoặc Spam trong hộp mail để nhận link kích hoạt nhé!
                                            <br/>                                            
                                            <br/>
                                        </span>"
                ));
            } else {
                $msg = "Hệ thống chưa gửi được mail xác nhận! Vui lòng thực hiện lại!";
            }
        } else {
            $msg = "Email bạn cung cấp không tồn tại trong hệ thống!";
        }
    } else {
        $msg = "Email bạn cung cấp không hợp lệ!";
    }
}

$forget_pass = $xtemplate->assign_vars($forget_pass, array(
    'msg' => $msg,
        ));

$content = $forget_pass;
?>