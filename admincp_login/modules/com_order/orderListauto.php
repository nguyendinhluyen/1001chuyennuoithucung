<?php

$connection = mysql_connect('localhost', 'nanapet_user', '-#cLp.SMaa0J');

if (!$connection) {
    die('Could not connect ');
}

$db = "nanapet_db";

if ($db != '' && !mysql_select_db($db, $connection)) {
    die('Die Database ');
}

$sql = "select * from scores";

$cursor = mysql_query($sql, $connection);

if (!$cursor) {
    echo("Query Table scores error");
} else {
    while ($row = mysql_fetch_assoc($cursor)) {
        $array[] = $row;
    }

    mysql_free_result($cursor);

    $countUpdate = 0;

    for ($i = 0; $i < count($array); $i++) {
        $sql = "";

        // Update honor depend on score
        // Petlover	150 (= 7,500,000)
        // Petadorer 220 (= 11,000,000)
        // Petaholic 300 (= 15,000,000)
        // Pet4Ever = Petalohic + Phí hằng năm (500,000vnđ)

        if ($array[$i]['honors'] == 'normal' || $array[$i]['honors'] == 'Normal') {
            if ($array[$i]['score'] / 300 >= 1 & $array[$i]['fee4Ever'] == "500.000") {
                $sql .= " UPDATE scores SET honors = 'Pet4Ever' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 300) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            } else if ($array[$i]['score'] / 300 >= 1 & $array[$i]['fee4Ever'] == "0") {
                $sql .= " UPDATE scores SET honors = 'Petaholic' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 300) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            } else if ($array[$i]['score'] / 220 >= 1) {
                $sql .= " UPDATE scores SET honors = 'Petadorer' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 220) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            } else if ($array[$i]['score'] / 150 >= 1) {
                $sql .= " UPDATE scores SET honors = 'Petlover' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 150) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            } else {
                $newScore = floor(($array[$i]['score'] - 0) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            }
        } else if ($array[$i]['honors'] == 'Petlover') {
            if ($array[$i]['score'] / 300 >= 1 & $array[$i]['fee4Ever'] == "500.000") {
                $sql .= " UPDATE scores SET honors = 'Pet4Ever' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 300) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                echo($sql);
                $cursor = mysql_query($sql, $connection);
            } else if ($array[$i]['score'] / 300 >= 1 & $array[$i]['fee4Ever'] == "0") {
                $sql .= " UPDATE scores SET honors = 'Petaholic' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 300) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            } else if ($array[$i]['score'] / 220 >= 1) {
                $sql .= " UPDATE scores SET honors = 'Petadorer' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 220) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            } else {
                $newScore = floor(($array[$i]['score'] - 0) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            }
        } else if ($array[$i]['honors'] == 'Petadorer') {
            if ($array[$i]['score'] / 300 >= 1 & $array[$i]['fee4Ever'] == "500.000") {
                $sql .= " UPDATE scores SET honors = 'Pet4Ever' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 300) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                echo($sql);
                $cursor = mysql_query($sql, $connection);
            } else if ($array[$i]['score'] / 300 >= 1 & $array[$i]['fee4Ever'] == "0") {
                $sql .= " UPDATE scores SET honors = 'Petaholic' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 300) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            } else {
                $newScore = floor(($array[$i]['score'] - 0) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            }
        } else if ($array[$i]['honors'] == 'Petaholic') {
            if ($array[$i]['fee4Ever'] == "500.000") {
                $sql .= " UPDATE scores SET honors = 'Pet4Ever' WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
                $sql = "";
                $newScore = floor(($array[$i]['score'] - 0) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            } else {
                $newScore = floor(($array[$i]['score'] - 0) / 10);
                $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
                $cursor = mysql_query($sql, $connection);
            }
        } else if ($array[$i]['honors'] == 'Pet4Ever') {
            $newScore = floor(($array[$i]['score'] - 0) / 10);
            $sql .= " UPDATE scores SET score =  " . $newScore . " WHERE id = " . $array[$i]['id'] . " ;";
            $cursor = mysql_query($sql, $connection);
        }

        // Check update success or not
        if (!$cursor) {
            echo(" Update Error at id = ") . $array[$i]['id'] . " ; ";
        } else {
            $countUpdate ++;
        }

        mysql_fetch_assoc($cursor);
    }
    if ($countUpdate == count($array)) {
        echo("Update total successful");
    }
}

mysql_close($connection);
?>



