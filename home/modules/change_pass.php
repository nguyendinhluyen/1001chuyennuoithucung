<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (($_SESSION['username'] == '')) {
    $_SESSION['cart_login'] = 1;
    ?>
    <script>
        window.location = "<?php echo $linkS . 'dang-nhap'; ?>";
    </script>
    <?php
}
$user_info = $xtemplate->load('change_pass_bootstrap');
if (isset($_SESSION['username'])) {
    if (isset($_POST['submit'])) {
        $error = 0;
        $user = input($_SESSION['username'], 1);
        $pass_new = input($_POST['pass_new'], 1);
        $pass_confirm = input($_POST['pass_confirm'], 1);
        if (!empty($pass_new) && !empty($pass_confirm)) {
            $sql = '';
            if ($pass_new != $pass_confirm) {
                $error = 1;
                ?>
                <script>
                    alert('Mật khẩu xác nhận không chính xác.');
                    window.location = "doi-mat-khau";
                </script>
                <?php
            }
            $sql = "UPDATE user SET password ='" . md5($pass_new)
                    . "' WHERE email = '$user' AND status > -1";
            $mysql->setQuery($sql);
            if ($mysql->query()) {
                ?>
                <script>
                    alert('Đổi mật khẩu thành công.');
                    window.location = "thong-tin-tai-khoan";
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert('Vui lòng nhập đầy đủ mật khẩu mới.');
                window.location = "doi-mat-khau";
            </script>
            <?php
        }
    }
    $user = input($_SESSION['username'], 1);
    $row_ac = GetOneRow('email,
                        name,
                        avarta', 'user', "email = '$user' and status > -1");
    $scoreModel = new ScoreModel();

    //get level
    $user_type = $scoreModel->getLevelByUser($user);
    if ($user_type == '') {
        $user_type = 'Normal';
    }
    $user_info = $xtemplate->replace($user_info, array(
        'name' => $row_ac['name'],
        'level' => $user_type,
        'name_hello' => str_replace("(Chị) ", "", (str_replace("(Anh) ", "", $row_ac['name']))),
        'avatar' => ($row_ac['avarta'] != '') ? $row_ac['avarta'] : 'default.png',
    ));
    $content = $user_info;
} else {
    ?>
    <script>
        alert('Bạn chưa đăng nhập. Mời bạn đăng nhập');
        window.location = "dang-nhap";
    </script>
    <?php
}
$breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
$breadcrumbs_path .= ' &raquo; ' . 'Đổi Mật Khẩu';
$title_page = 'Đổi Mật Khẩu';
$content = $user_info;
?>

