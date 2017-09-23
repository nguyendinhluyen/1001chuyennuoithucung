<?php
$logout = input($_GET['out']);
if ($logout == 1) {
    unset($_SESSION['username']);
    unset($_SESSION['name']);
    unset($_SESSION['cart']);
    setcookie("UsNanapetCookie", "", time() - 3600);
    ?>
    <script>
        alert('Cảm ơn bạn đã ghé thăm!');
        window.location = '<?php echo $linkS; ?>';
    </script>
    <?php
    return;
}

$Users = new User();
$user = $_POST['username'];
$password = md5($_POST['passwd']);
$remember = $_POST['remember'];

if (!empty($_POST['username']) && !empty($_POST['passwd']) && isset($_POST['login'])) {
    $numrow = GetNumRow('email', 'user', "email ='$user' AND password = '$password' AND status > -1");
    if ($numrow > 0) {
        $_SESSION['username'] = $user;
        if ($remember == 1) {//remember pass
            include('../class/rsa.class.php');
            $RSA = new RSA();
            $keys = $RSA->generate_keys('9990454949', '9990450271');
            $Userencoded = $RSA->encrypt($user, $keys[1], $keys[0], 5);
            setcookie("UsNanapetCookie", $Userencoded, time() + 3600 * 24 * 100);
        }
        $usr_info = $Users->getUserInfo($_SESSION['username']);
        $_SESSION['name'] = $usr_info['name'];
        $sql = "update user set last_login  = " . time() . " where email = '$user'";
        $mysql->setQuery($sql);
        $mysql->query();
        if ($_SESSION['cart_login'] == 1) {
            unset($_SESSION['cart_login']);
        }
        ?>
        <script>
            alert('Đăng nhập thành công.');
            window.location = 'thong-tin-tai-khoan';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Tên đăng nhập hoặc mật khẩu không đúng. Mời bạn đăng nhập lại!');
            window.location = 'dang-nhap';
        </script>
        <?php
    }
} else if (!empty($_POST['usernameregistry']) && !empty($_POST['passwordregistry']) && !empty($_POST['passwordregistryagain']) && isset($_POST['registry'])) {
    $usernameregistry = input($_POST['usernameregistry'], 1);
    $passwordregistry = md5($_POST['passwordregistry']);
    $passwordregistryagain = md5($_POST['passwordregistryagain']);
    if ($passwordregistry === $passwordregistryagain) {
        $numrow = GetNumRow('username,email', 'user', "email = '$usernameregistry' AND status > -1");
        if ($numrow > 0) {
            ?>
            <script>
                alert('Email này đã có người đăng ký. Vui lòng chọn email khác!');
                window.location = 'dang-nhap';
            </script>
            <?php
        } else {
            $select_danhxung = "0";
            $phone = "";
            $sql = "INSERT INTO user(password,
                                         email,
                                         date,
                                         status,
                                         GroupMember)
                        VALUES ('" . $passwordregistry . "','"
                    . $usernameregistry . "',"
                    . time()
                    . ",0,'"
                    . "Chưa là thành viên" . "')";
            $mysql->setQuery($sql);
            if ($mysql->query()) {
                $_SESSION['username'] = $usernameregistry;
                $_SESSION['name'] = "";
                if ($_SESSION['cart_login'] == 1) {
                    unset($_SESSION['cart_login']);
                }
                ?>                
                <script>
                    alert('Đăng ký thành công.');
                    window.location = 'thong-tin-tai-khoan';
                </script>
                <?php
            } else {
                ?>                
                <script>
                    alert('Đăng ký thất bại. Vui lòng đăng ký lại!');
                    window.location = 'dang-nhap';
                </script>
                <?php
            }
        }
    } else {
        ?>
        <script>
            alert('Mật khẩu nhập lại không trùng!');
            window.location = 'dang-nhap';
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert('Vui lòng kiểm tra lại email và mật khẩu!');
        window.location = 'dang-nhap';
    </script>
    <?php
}
?>