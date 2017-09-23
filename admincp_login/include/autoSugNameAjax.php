<?php

session_start();

$key = trim($_POST['queryString']);

if (isset($key{0})) {

    include("../../class/mysql.php");

    include("../../include/function.php");

    include("../../config.php");

    $obj_config = new config();

    $mysql = new mysql();

    $key = input($key);

    $mysql
            ->setQuery("SELECT name from user where name like '%" . $key . "%' limit 10");

    $result = $mysql->query();

    while ($row = mysql_fetch_assoc($result)) {

        echo '<li onClick="fill(\'' . $row['name'] . '\');">'
        . $row['name'] . '</li>';
    }
}
?>