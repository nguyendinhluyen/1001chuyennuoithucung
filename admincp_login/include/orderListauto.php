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

$sql = "SELECT * FROM scores";

$cursor = mysql_query($sql, $connection);

if (!$cursor) {
    echo("Query Table Scores error");
} else {
    while ($row = mysql_fetch_assoc($cursor)) {
        $array[] = $row;
    }

    mysql_free_result($cursor);

    $sqlVIPCustomer = "SELECT * FROM VIPCustomer ORDER BY Score DESC";

    $cursorVIPCustomer = mysql_query($sqlVIPCustomer, $connection);

    if (!$cursorVIPCustomer) {
        echo("Query Table VIPCustomer error");
    } else {
        while ($rowVIPCustomer = mysql_fetch_assoc($cursorVIPCustomer)) {
            $arrayVIPCustomer[] = $rowVIPCustomer;
        }

        mysql_free_result($cursorVIPCustomer);
    }

    if (count($arrayVIPCustomer) > 0 && count($array) > 0) {
        for ($i = 0; $i < count($array); $i++) {
            $lag = 0;

            $j = 0;

            while ($j < count($arrayVIPCustomer)):

                if ($lag == 0) {
                    if (empty($array[$i]['score']))
                        $array[$i]['score'] = 0;

                    if (empty($array[$i]['scorelevel']))
                        $array[$i]['scorelevel'] = 0;

                    if (empty($array[$i]['scoreaward']))
                        $array[$i]['scoreaward'] = 0;

                    $sql = "";

                    $newScore = $array[$i]['score'] + $array[$i]['scoreaward'];

                    $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";

                    $cursor = mysql_query($sql, $connection);

                    if (!$cursor) {
                        echo(" UPDATE scores + scoreaward error at id = ") . $array[$i]['id'] . " ; ";
                    }

                    $sql = "";

                    $sql .= " UPDATE scores SET scoreaward = 0 WHERE id = " . $array[$i]['id'] . " ;";

                    $cursor = mysql_query($sql, $connection);

                    if (!$cursor) {
                        echo(" UPDATE scoreaward error at id = ") . $array[$i]['id'] . " ; ";
                    }

                    if (( $array[$i]['score'] + $array[$i]['scorelevel'] + $array[$i]['scoreaward']) >= $arrayVIPCustomer[$j]['Score'] && $array[$i]['fee4Ever'] == $arrayVIPCustomer[$j]['FeeLevel']) {
                        $lag = 1;

                        $sql = "";

                        $sql .= " UPDATE scores SET honors = '" . $arrayVIPCustomer[$j]['NameVIPCustomer'] . "' WHERE id = " . $array[$i]['id'] . " ;";

                        $cursor = mysql_query($sql, $connection);

                        if (!$cursor) {
                            echo(" UPDATE honors error at id = ") . $array[$i]['id'] . " ; ";
                        }

                        $sql = "";

                        $sql .= " UPDATE scores SET scorelevel =  " . $arrayVIPCustomer[$j]['Score'] . " WHERE id = " . $array[$i]['id'] . " ;";

                        $cursor = mysql_query($sql, $connection);

                        if (!$cursor) {
                            echo(" UPDATE scorelevel error at id = ") . $array[$i]['id'] . " ; ";
                        }

                        $sql = "";

                        unset($newScore);

                        $newScore = ($array[$i]['score'] + $array[$i]['scorelevel'] + $array[$i]['scoreaward']) - $arrayVIPCustomer[$j]['Score'];

                        $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";

                        $cursor = mysql_query($sql, $connection);

                        if (!$cursor) {
                            echo(" UPDATE score error at id = ") . $array[$i]['id'] . " ; ";
                        }
                    }
                }

                $j++;

            endwhile;
        }
    }
}

// UPDATE SCORE FOR NANAPET BIRTHDAY

if (date("d-m", time()) == '21-06') {
    $sql = "";

    $sql .= "SELECT email FROM user WHERE status > -1 ";

    $cursor = mysql_query($sql, $connection);

    if (!$cursor) {
        echo("Query Table user for Happy Nanapet Birthday error");
    } else {
        while ($row = mysql_fetch_assoc($cursor)) {
            $array_user_happy_nanapet[] = $row;
        }

        mysql_free_result($cursor);

        for ($i = 0; $i < count($array_user_happy_nanapet); $i++) {
            $sql = "";

            $sql .= "SELECT user,scoreaward FROM scores WHERE user ='" . $array_user_happy_nanapet[$i]['email'] . "'";

            $cursor = mysql_query($sql, $connection);

            if (!$cursor) {
                echo("Query Table scores for Nanapet Birthday error");
            } else {
                unset($array_user_score_happy_nanapet);

                while ($row = mysql_fetch_assoc($cursor)) {
                    $array_user_score_happy_nanapet[] = $row;
                }

                mysql_free_result($cursor);

                if (isset($array_user_score_happy_nanapet)) {
                    if (empty($array_user_score_happy_nanapet[0]['scoreaward'])) {
                        $array_user_score_happy_nanapet[0]['scoreaward'] = 0;
                    }

                    $array_user_score_happy_nanapet[0]['scoreaward'] = intval($array_user_score_happy_nanapet[0]['scoreaward']) + 3;

                    $sql = "";

                    $sql .= "UPDATE scores SET scoreaward = " . $array_user_score_happy_nanapet[0]['scoreaward']
                            . " WHERE user = '" . $array_user_happy_nanapet[$i]['email'] . "'";

                    $cursor = mysql_query($sql, $connection);

                    if (!$cursor) {
                        echo("UPDATE scores for Happy Nanapet Birthday error");
                    }
                } else {
                    $sql = "";

                    $sql .= "INSERT INTO scores(user,score,honors,fee4Ever,scorelevel,scoreaward,scorebirthday) 
										
								  VALUES ('" . $array_user_happy_nanapet[$i]['email'] . "',0,'Normal','0',0,3,0)";

                    $cursor = mysql_query($sql, $connection);

                    if (!$cursor) {
                        echo("INSERT scores for Happy Nanapet Birthday error");
                    }
                }
            }
        }
    }
}

// UPDATE SCORE FOR BIRTHDAY						

$sql = "";

echo("Hôm nay " . date("Y-m-d H:i:s", time()) . " ");

$sql .= "SELECT email,birthday FROM user WHERE status > -1 AND '" .
        date("d-m", time()) . "' = " . "DATE_FORMAT(FROM_UNIXTIME(birthday),'%d-%m')";

$cursor = mysql_query($sql, $connection);

// CAP NHAT DIEM SINH NHAT CHO KHACH HANG
if (!$cursor) {
    echo("Query Table user error");
} else {
    while ($row = mysql_fetch_assoc($cursor)) {
        $array_user_info[] = $row;
    }

    mysql_free_result($cursor);

    for ($i = 0; $i < count($array_user_info); $i++) {
        $sql = "";

        $sql .= "SELECT user,scoreaward,scorebirthday FROM scores WHERE user ='" . $array_user_info[$i]['email'] . "'";

        $cursor = mysql_query($sql, $connection);

        echo('Sinh nhật của ');

        echo($array_user_info[$i]['email'] . " ");

        if (!$cursor) {
            echo("Query table scores error");
        } else {
            unset($array_user_score);

            while ($row = mysql_fetch_assoc($cursor)) {
                $array_user_score[] = $row;
            }

            mysql_free_result($cursor);

            if (isset($array_user_score)) {
                if (empty($array_user_score[0]['scorebirthday']) || $array_user_score[0]['scorebirthday'] != 1) {
                    if (empty($array_user_score[0]['scoreaward'])) {
                        $array_user_score[0]['scoreaward'] = 0;
                    }

                    $array_user_score[0]['scoreaward'] = intval($array_user_score[0]['scoreaward']) + 5;

                    $sql = "";

                    $sql .= "UPDATE scores SET scoreaward = " . $array_user_score[0]['scoreaward']
                            . ", scorebirthday = 1 WHERE user = '" . $array_user_info[$i]['email'] . "'";

                    $cursor = mysql_query($sql, $connection);

                    //DANH SACH THANH VIEN SINH NHAT

                    echo("Update Birthday có dữ liệu ");

                    echo(date('d-m', $array_user_info[$i]['birthday']) . " ");

                    echo($array_user_info[$i]['email']);

                    echo('<--->');

                    if (!$cursor) {
                        echo("UPDATE scores for scorebirthday error");
                    }
                }
            } else {
                $sql = "";

                $sql .= "INSERT INTO scores(user,score,honors,fee4Ever,scorelevel,scoreaward,scorebirthday) 
										
								  VALUES ('" . $array_user_info[$i]['email'] . "',0,'Normal','0',0,5,1)";

                $cursor = mysql_query($sql, $connection);

                if (!$cursor) {
                    echo("INSERT scores for scorebirthday error");
                }

                echo("Update Birthday ko có dữ liệu ");

                echo(date('d-m', $array_user_info[$i]['birthday']) . " ");

                echo($array_user_info[$i]['email']);

                echo('<--->');
            }
        }
    }
}

echo("Update Finish!");

mysql_close($connection);
?>