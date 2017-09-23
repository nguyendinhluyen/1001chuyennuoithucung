<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

$connection = @mysql_connect('localhost', 'nanapet_user', '-#cLp.SMaa0J');

if (!$connection) {
    die('Could not connect ');
}

$db = "nanapet_db";

if ($db != '' && !@mysql_select_db($db, $connection)) {
    die('Die Database ');
}

$sql = "SELECT * FROM scores";

$cursor = mysql_query($sql, $connection);

if (!$cursor) {
    echo("Query Table scores error");
} else {
    unset($array);

    while ($row = mysql_fetch_assoc($cursor)) {
        $array[] = $row;
    }

    mysql_free_result($cursor);

    $countUpdate = 0;

    for ($i = 0; $i < count($array); $i++) {
        $sql = "";

        $newScore = floor($array[$i]['score'] / 10);

        $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";

        $cursor = mysql_query($sql, $connection);

        // Check update success or not
        if (!$cursor) {
            echo(" UPDATE Error at id = ") . $array[$i]['id'] . " ; ";
        } else {
            $countUpdate ++;
        }
    }
    if ($countUpdate == count($array)) {
        echo("Update Score total successful");
    }
}

// RESET ALL SCOREBIRTHDAY = 0 HAPPY NEW YEAR	

$sql = "";

$sql .= "SELECT id FROM scores";

$cursor = mysql_query($sql, $connection);

if (!$cursor) {
    echo("Query Table scores error");
} else {
    unset($array);

    while ($row = mysql_fetch_assoc($cursor)) {
        $array[] = $row;
    }

    mysql_free_result($cursor);

    $countUpdate = 0;

    for ($i = 0; $i < count($array); $i++) {
        $sql = "";

        $sql .= " UPDATE scores SET scorebirthday = 0 WHERE id = " . $array[$i]['id'] . " ;";

        $cursor = mysql_query($sql, $connection);

        // Check update success or not

        if (!$cursor) {
            echo(" UPDATE scorebirthday Error at id = ") . $array[$i]['id'] . " ; ";
        } else {
            $countUpdate ++;
        }
    }

    if ($countUpdate == count($array)) {
        echo("Update score Happy New Year total successful ");
    }
}

// UPDATE SCORE FOR HAPPY NEW YEAR

$sql = "";

$sql .= "SELECT email FROM user WHERE status > -1 ";

$cursor = mysql_query($sql, $connection);

if (!$cursor) {
    echo("Query Table user for Happy New Year error");
} else {
    while ($row = mysql_fetch_assoc($cursor)) {
        $array_user_happy_new_year[] = $row;
    }

    mysql_free_result($cursor);

    for ($i = 0; $i < count($array_user_happy_new_year); $i++) {
        $sql = "";

        $sql .= "SELECT user,scoreaward FROM scores WHERE user ='" . $array_user_happy_new_year[$i]['email'] . "'";

        $cursor = mysql_query($sql, $connection);

        if (!$cursor) {
            echo("Query Table scores for Happy New Year error");
        } else {
            unset($array_user_score_happy_new_year);

            while ($row = mysql_fetch_assoc($cursor)) {
                $array_user_score_happy_new_year[] = $row;
            }

            mysql_free_result($cursor);

            if (isset($array_user_score_happy_new_year)) {
                if (empty($array_user_score_happy_new_year[0]['scoreaward'])) {
                    $array_user_score_happy_new_year[0]['scoreaward'] = 0;
                }

                $array_user_score_happy_new_year[0]['scoreaward'] = intval($array_user_score_happy_new_year[0]['scoreaward']) + 3;

                $sql = "";

                $sql .= "UPDATE scores SET scoreaward = " . $array_user_score_happy_new_year[0]['scoreaward']
                        . " WHERE user = '" . $array_user_happy_new_year[$i]['email'] . "'";

                $cursor = mysql_query($sql, $connection);

                if (!$cursor) {
                    echo("UPDATE scores for Happy New Year error");
                }
            } else {
                $sql = "";

                $sql .= "INSERT INTO scores(user,score,honors,fee4Ever,scorelevel,scoreaward,scorebirthday) 
										
							  VALUES ('" . $array_user_happy_new_year[$i]['email'] . "',0,'Normal','0',0,3,0)";

                $cursor = mysql_query($sql, $connection);

                if (!$cursor) {
                    echo("INSERT scores for Happy New Year error");
                }
            }
        }
    }
}

mysql_close($connection);
?>