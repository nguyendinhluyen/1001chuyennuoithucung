<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

error_reporting(0);

if (!empty($_POST["email"]) && !empty($_POST["name"])) {
    $connection = @mysql_connect('localhost', 'nanapet_user', '-#cLp.SMaa0J');

    mysql_set_charset('utf8', $connection);

    if (!$connection) {
        echo('Không kết nối được dữ liệu');
    }

    $db = "nanapet_db";

    if ($db != '' && !@mysql_select_db($db, $connection)) {
        echo('Dữ liệu Nanapet bị lỗi');
    }

    $sql = "SELECT id,
                       email,
                       name
                FROM user
                WHERE email = '" . $_POST["email"] . "' AND status > -1";

    $cursor = mysql_query($sql, $connection);

    if (!$cursor) {
        echo("Không truy cập được dữ liệu");
    } else {
        while ($row = mysql_fetch_assoc($cursor)) {
            $array = $row;
        }

        mysql_free_result($cursor);

        ob_start();

        session_start();

        unset($_SESSION['username']);

        unset($_SESSION['name']);

        if (!empty($array["email"]) && $array["email"] != "") {
            $_SESSION['username'] = $_POST["email"];

            $_SESSION['name'] = $array["name"];

            echo("Đăng nhập thành công.");
        } else {
            $_SESSION['username'] = $_POST["email"];

            if ($_POST["gender"] == "male") {
                $_SESSION['name'] = "(Anh) " . $_POST["name"];

                $sex = "1";
            } else if ($_POST["gender"] == "female") {
                $_SESSION['name'] = "(Chị) " . $_POST["name"];

                $sex = "0";
            } else {
                $_SESSION['name'] = "(Anh) " . $_POST["name"];

                $sex = "1";
            }
            $password = "nanapet-facebook" . $_POST["email"] . "123";

            list($m, $d, $y) = split("/", $_POST["birthday"]);

            if (checkdate($m, $d, $y)) {
                $sql = "INSERT INTO user (sex,
                                              name,
                                              email,
                                              birthday,
                                              phone,
                                              password,
                                              status,
                                              date,
                                              update_flag,
                                              birthday_flag,
                                              GroupMember)
                                    VALUES ('" . $sex . "'," .
                        "'" . $_SESSION['name'] . "'," .
                        "'" . $_POST["email"] . "'," .
                        "'" . strtotime($_POST["birthday"]) . "'," .
                        "' '," .
                        "'" . md5($password) . "'," .
                        "'0'" . "," .
                        "'" . time() . "'," .
                        "'0'" . "," .
                        "'0'" . "," .
                        "'Chưa là thành viên'" .
                        ")";
            } else {
                $sql = "INSERT INTO user (sex,
                                              name,
                                              email,
                                              phone,
                                              password,
                                              status,
                                              date,
                                              update_flag,
                                              birthday_flag,
                                              GroupMember)
                                    VALUES ('" . $sex . "'," .
                        "'" . $_SESSION['name'] . "'," .
                        "'" . $_POST["email"] . "'," .
                        "' '," .
                        "'" . md5($password) . "'," .
                        "'0'" . "," .
                        "'" . time() . "'," .
                        "'0'" . "," .
                        "'0'" . "," .
                        "'Chưa là thành viên'" .
                        ")";
            }

            $cursor = mysql_query($sql, $connection);

            if (!$cursor) {
                echo(" Thêm thông tin khách hàng thất bại");
            } else {
                $sql = "SELECT id
                            FROM user
                            WHERE email = '" . $_POST["email"] . "' AND status > -1";

                $cursor = mysql_query($sql, $connection);

                if (!$cursor) {
                    echo("Không truy cập được dữ liệu " . $_POST["email"]);
                } else {
                    while ($row = mysql_fetch_assoc($cursor)) {
                        $array_2 = $row;
                    }
                    if (!empty($array_2["id"])) {
                        echo("Đăng nhập thành công.");
                    }
                }
            }
        }
    }
} else {
    echo("Đăng nhập thất bại.");
}
?>