<?php

class mysql {

    var $_sql = '';
    var $_connection = '';
    var $_cursor = null;
    var $lastId = '';
    var $display_error = false;

    function mysql() {
        global $obj_config;

        $this->display_error = $obj_config->display_error;

        $this->_connection = @mysql_connect($obj_config->host, $obj_config->user, $obj_config->password);

        if (!$this->_connection) {
            $this->display_error(mysql_error(), mysql_errno());
        }

        $db = $obj_config->db;

        if ($db != '' && !mysql_select_db($db, $this->_connection)) {
            $this->display_error(mysql_error(), mysql_errno());
        }
        mysql_query("set names utf8");
    }

    function setQuery($sql) {
        $this->_sql = $sql;
    }

    function query() {
        $this->_cursor = mysql_query($this->_sql, $this->_connection);
        $this->lastId = mysql_insert_id();
        if (!$this->_cursor) {
            $this->display_error(mysql_error(), mysql_errno(), $this->_sql);
        }
        return $this->_cursor;
    }

//====================================================================
//Khiem
//ham xử lý các truy van sql tu dinh nghia lenh truy van
    function query_command($command) {
        $cur = mysql_query($command, $this->_connection);
        $array = array();
        while ($row = mysql_fetch_assoc($cur)) {
            $array[] = $row;
        }
        mysql_free_result($cur);
        return $array;
    }

//=====================================================================
    function loadAllRow() {
        if (!($cur = $this->query())) {
            return null;
        }
        $array = array();

        while ($row = mysql_fetch_assoc($cur)) {
            $array[] = $row;
        }

        mysql_free_result($cur);

        return $array;
    }

    function loadOneRow() {

        if (!($cur = $this->query())) {

            return null;
        }

        $row = mysql_fetch_assoc($cur);

        return $row;
    }

    //=================================================

    function loadRow() {

        if (!($cur = $this->query())) {

            return null;
        }

        $ret = null;

        if ($row = mysql_fetch_row($cur)) {

            $ret = $row[0];
        }

        mysql_free_result($cur);

        return $ret;
    }

    function loadRowList($key = '') {

        if (!($cur = $this->query())) {

            return null;
        }

        $array = array();

        while ($row = mysql_fetch_array($cur)) {

            if ($key) {

                $array[$row[$key]] = $row;
            } else {

                $array[] = $row;
            }
        }

        mysql_free_result($cur);

        return $array;
    }

    function getNumRows() {

        return mysql_num_rows($this->_cursor);
    }

    function loadArrayField($numinarray = 0) {

        if (!($cur = $this->query())) {

            return null;
        }

        $array = array();

        while ($row = mysql_fetch_row($cur)) {

            $array[] = $row[$numinarray];
        }

        mysql_free_result($cur);

        return $array;
    }

    function disconnect() {

        mysql_close($this->_connection);
    }

    function escape_data($data) {

        if (ini_get('magic_quotes_gpc')) {

            $data = stripslashes($data);
        }

        return mysql_real_escape_string($data);
    }

    function display_error($error, $error_num, $query = '') {

        if (!$this->display_error) {
            return;
        }

        $trans = array(
            'Unknown column' => 'KhÃ´ng tá»“n táº¡i cá»™t',
            'Unknown database' => 'KhÃ´ng tá»“n táº¡i database',
            'in' => 'trong',
            'field list' => 'danh sÃ¡ch',
            'Unknown MySQL server host' => 'KhÃ´ng thá»ƒ káº¿t ná»‘i vá»›i server',
            "Can't connect to MySQL server on" => 'KhÃ´ng thá»ƒ káº¿t ná»‘i CSDL MySQL server ',
        );

        foreach ($trans as $key => $val) {

            $error = str_replace($key, $val, $error);
        }

        echo '<?xml version="1.0" encoding="iso-8859-1"?>

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

		<html xmlns="http://www.w3.org/1999/xhtml">

		<head>

		<title>Lá»—i</title>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<style type="text/css">

		<!--

		body {

			font-family: Verdana, Arial, Helvetica, sans-serif;

			font-size: 12px;

			font-style: normal;

			color: #000000;

		}

		-->

		</style>

		</head>

		<body>

			<div style="width:780px;margin: 0 auto">

			<div style="font-size:16px;color:red;font-weight:bold;text-decoration:blink">Lá»—i MySQL!</div> 

			------------------------<br /><br />

			<u>Lá»—i gáº·p pháº£i</u> :

			<br />

				<strong>' . $error . '</strong>



			<br /><br />

			</strong><u>Lá»—i sá»‘</u> :

			<br />

				<strong>' . $error_num . '</strong>

			<br />



			<p style="width:450px">Náº¿u nhÆ° báº¡n gáº·p pháº£i lá»—i nÃ y xin vui lÃ²ng bÃ¡o cho ban quáº£n trá»‹ website qua email <b>noho501@gmail.com</b> hoáº·c ym : <img border="0" src="http://mail.opi.yahoo.com/online?u=ngoho88&m=g&t=0" align="left"><a class="a7" href="ymsgr:sendIM?ngoho88">ngoho88</a> hoáº·c sá»‘ Ä‘iá»‡n thoáº¡i 098 72 77 329, xin cÃ¡m Æ¡n báº¡n ráº¥t nhiá»�u !

			</p>

			<textarea name="" rows="10" cols="52" wrap="virtual">' . $query . '</textarea><br />

		</div>

		</body>

		</html>';

        exit();
    }

}

?>