<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

$connection = @mysql_connect('localhost', 'nanapet_user', '-#cLp.SMaa0J');

if (!$connection) {
    echo('Could not connect ');
}

$db = "nanapet_db";

if ($db != '' && !@mysql_select_db($db, $connection)) {
    echo('Die Database ');
}

$sql = "SELECT news_id,flag_publisher FROM news WHERE date_publisher = '"
        . date("Y-m-d", time())
        . "' AND relax = 0 "
        . "AND flag_publisher = 0 "
        . "ORDER BY date_added ASC";
$cursor = mysql_query($sql, $connection);

if (!$cursor) {
    echo("Query table news error");
} else {
    while ($row = mysql_fetch_assoc($cursor)) {
        $array[] = $row;
    }

    mysql_free_result($cursor);

    if (!empty($array)) {
        $sql = "UPDATE news SET flag_publisher = 1 WHERE relax = 0 AND news_id = " . $array[0]['news_id'];

        $cursor = mysql_query($sql, $connection);

        if (!$cursor) {
            echo(" UPDATE flag_publisher error at id = ") . $array[0]["news_id"];
        } else {
            echo("One news publish!");
        }
    } else {
        echo("Hôm nay không có bài nào được up lên website");
    }
}

echo("Update News Finish!");

mysql_close($connection);
?>