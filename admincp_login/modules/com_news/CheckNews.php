<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
if (!empty($_POST["date"])) {
    //$connection  = @mysql_connect('localhost', 'root', '');
    $connection = @mysql_connect('localhost', 'nanapet_user', '-#cLp.SMaa0J');
    mysql_set_charset('utf8', $connection);
    if (!$connection) {
        echo('Không kết nối được dữ liệu');
    }
    $db = "nanapet_db";
    if ($db != '' && !@mysql_select_db($db, $connection)) {
        echo('Dữ liệu NanaPet bị lỗi');
    }
    $sql = "SELECT news_id
                FROM news
                WHERE date_publisher = '" . $_POST["date"] . "'";
    $cursor = mysql_query($sql, $connection);
    if (!$cursor) {
        echo("Không truy cập được dữ liệu bài viết");
    } else {
        while ($row = mysql_fetch_assoc($cursor)) {
            $array[] = $row;
        }
        mysql_free_result($cursor);
        if (!empty($array)) {
            if (count($array) > 1) {
                echo("true");
            } else {
                echo ("false");
            }
        } else {
            echo ("false");
        }
    }
} else {
    echo("Chưa chọn ngày đăng bài!");
}
?>