<?php

$connection = mysql_connect('localhost', 'nanapet_user', '-#cLp.SMaa0J');

if (!$connection) {
    die('Could not connect ');
}

$db = "nanapet_db";

if ($db != '' && !mysql_select_db($db, $connection)) {
    die('Die Database ');
}

$sql = "SELECT * FROM user";

$cursor = mysql_query($sql, $connection);

if (!$cursor) {
    echo("Query Table user error");
} else {
    while ($row = mysql_fetch_assoc($cursor)) {
        $array[] = $row;
    }

    mysql_free_result($cursor);

    $countUpdate = 0;

    for ($i = 0; $i < count($array); $i++) {
        $sql = "";

        $sql .= " UPDATE user SET GroupMember = 'Chưa là thành viên' WHERE id = '" . $array[$i]['id'] . "'";

        $cursor = mysql_query($sql, $connection);

        // Check update success or not
        if (!$cursor) {
            echo(" Update Error at id = ") . $array[$i]['id'] . " ; ";
        } else {
            $countUpdate ++;
        }

        mysql_free_result($cursor);
    }
    if ($countUpdate == count($array)) {
        echo("Update User total successful");
    }
}

mysql_close($connection);
?>