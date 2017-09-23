<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
// localhost
/* $dbHost = '127.0.0.1:3306';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName = 'nanapet_db'; */

// nanapet server
$dbHost = 'localhost';
$dbUsername = 'nanapet_user';
$dbPassword = '-#cLp.SMaa0J';
$dbName = 'nanapet_db';

// connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// use for load utf8 query
$db->set_charset("utf8");

//get search term
$searchTerm = $_GET['term'];

//get matched data from product table
$query = $db->query("SELECT products_name FROM products WHERE products_status = '1' AND products_name LIKE '%"
        . $searchTerm . "%' ORDER BY products_name ASC LIMIT 25");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['products_name'];
}

//return json data
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>