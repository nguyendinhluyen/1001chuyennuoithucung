<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

$connection = @mysql_connect('localhost', 'nanapet_user', '-#cLp.SMaa0J');

if (!$connection) {
    echo('Could not connect');
}

$db = "nanapet_db";

if ($db != '' && !@mysql_select_db($db, $connection)) {
    echo('Die Database ');
}

//product

/* $sql = "SELECT products_id, products_name FROM products";

  mysql_query("set names utf8"); // Get value of UTF8

  $cursor = mysql_query($sql, $connection);

  if(!$cursor)
  {
  echo("Query table Product error");
  }

  else
  {
  while ($row = mysql_fetch_assoc( $cursor ))
  {
  $array[] = $row;
  }

  mysql_free_result($cursor);

  for( $i = 0; $i < count($array) ; $i++ )
  {
  $products_key = vitoen($array[$i]['products_name'],'-').'-'.$array[$i]['products_id'];

  $sql = "";

  $sql .= " UPDATE products SET products_key = '" .$products_key. "' WHERE products_id = " .$array[$i]['products_id']. "; ";

  $cursor = mysql_query($sql, $connection);

  if(!$cursor)
  {
  echo(" UPDATE Erorr products_key at id = ").$array[$i]['products_id']."; ";
  }
  }
  } */

//category

/* $sql = "";

  $sql .= "SELECT categories_id, categories_name FROM categories";

  mysql_query("set names utf8"); // Get value of UTF8

  $cursor = mysql_query($sql, $connection);

  if(!$cursor)
  {
  echo("Query table categories error");
  }

  else
  {
  while ($row = mysql_fetch_assoc( $cursor ))
  {
  $array[] = $row;
  }

  mysql_free_result($cursor);

  for( $i = 0; $i < count($array) ; $i++ )
  {
  $categories_key = vitoen($array[$i]['categories_name'],'-').'-'.$array[$i]['categories_id'];

  $sql = "";

  $sql .= " UPDATE categories SET categories_key = '" .$categories_key. "' WHERE categories_id = " .$array[$i]['categories_id']. "; ";

  $cursor = mysql_query($sql, $connection);

  if(!$cursor)
  {
  echo(" UPDATE Erorr categories_key at id = ").$array[$i]['categories_id']."; ";
  }
  }
  } */

//category libary

$sql = "";

$sql .= "SELECT categorieslibary_id, categorieslibary_name FROM categorieslibary";

mysql_query("set names utf8"); // Get value of UTF8

$cursor = mysql_query($sql, $connection);

if (!$cursor) {
    echo("Query table categorieslibary error");
} else {
    while ($row = mysql_fetch_assoc($cursor)) {
        $array[] = $row;
    }

    mysql_free_result($cursor);

    for ($i = 0; $i < count($array); $i++) {
        $categorieslibary_key = vitoen($array[$i]['categorieslibary_name'], '-') . '-' . $array[$i]['categorieslibary_id'];

        $sql = "";

        $sql .= " UPDATE categorieslibary SET categorieslibary_key = '" . $categorieslibary_key . "' WHERE categorieslibary_id = " . $array[$i]['categorieslibary_id'] . "; ";

        $cursor = mysql_query($sql, $connection);

        if (!$cursor) {
            echo(" UPDATE Erorr categorieslibary_key at id = ") . $array[$i]['categorieslibary_id'] . "; ";
        }
    }
}

function vitoen($str, $type = '_') {
    $str = trim($str);

    $str = preg_replace("(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)", 'a', $str);

    $str = preg_replace("(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)", 'e', $str);

    $str = preg_replace("(ì|í|ị|ỉ|ĩ)", 'i', $str);

    $str = preg_replace("(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)", 'o', $str);

    $str = preg_replace("(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)", 'u', $str);

    $str = preg_replace("(ỳ|ý|ỵ|ỷ|ỹ)", 'y', $str);

    $str = preg_replace("(đ)", 'd', $str);

    $str = preg_replace("(A|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)", 'A', $str);

    $str = preg_replace("(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)", 'E', $str);

    $str = preg_replace("(Ì|Í|Ị|Ỉ|Ĩ)", 'I', $str);

    $str = preg_replace("(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)", 'O', $str);

    $str = preg_replace("(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)", 'U', $str);

    $str = preg_replace("(Ỳ|Ý|Ỵ|Ỷ|Ỹ)", 'Y', $str);

    $str = preg_replace("(Đ)", 'D', $str);

    $str = preg_replace("(!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|$|_)", "", $str);

    $str = preg_replace("( )", $type, $str);

    $str = preg_replace("(----------)", $type, $str);

    $str = preg_replace("(---------)", $type, $str);

    $str = preg_replace("(--------)", $type, $str);

    $str = preg_replace("(-------)", $type, $str);

    $str = preg_replace("(------)", $type, $str);

    $str = preg_replace("(-----)", $type, $str);

    $str = preg_replace("(----)", $type, $str);

    $str = preg_replace("(---)", $type, $str);

    $str = preg_replace("(--)", $type, $str);

    return strtolower($str);
}

echo("Update Link Finish!");

mysql_close($connection);
?>