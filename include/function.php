<?php

// check for SQL injection
function input($string, $html = 0) {
    $string = trim($string);
    $string = str_replace('&amp;', '&', $string);
    $string = str_replace('&lt;', '<', $string);
    $string = str_replace('&gt;', '>', $string);
    $string = str_replace('&nbsp;', ' ', $string);
    $string = str_replace('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '\t', $string);

    if (get_magic_quotes_gpc()) {
        //$string = mysql_real_escape_string(stripslashes($string));
        $string = stripslashes($string);
    } else {
        //$string = mysql_real_escape_string($string);
    }

    if (!empty($html)) {
        $string = htmlspecialchars($string);
    }

    return $string;
}

function output($string, $replace = 0) {
    if ($replace != 0) {
        global $mysql;
        $row = GetRows('word,_replace', 'word_replace', '1=1');
        $n = count($row);

        for ($i = 0; $i < $n; ++$i) {
            $string = str_replace($row [$i] ['word'], $row [$i] ['_replace'], $string);
        }
    }

    return stripslashes($string);
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

// load all rows
function GetRows($f, $t, $w, $s = 0) {
    global $mysql;
    $sql = 'SELECT ' . $f . ' FROM ' . $t . ' WHERE ' . $w;
    if ($s == 1) {
        echo $sql;
    }
    $mysql->setQuery($sql);
    return $mysql->loadAllRow();
}

//Lay thong tin theo orderby
function GetRowsOrderBy($f, $t, $w, $s = 0) {
    global $mysql;
    $sql = 'SELECT ' . $f . ' FROM ' . $t . ' WHERE ' . $w . ' ORDER BY news_ordered';
    if ($s == 1) {
        echo $sql;
    }
    $mysql->setQuery($sql);
    return $mysql->loadAllRow();
}

// Lay 1 dong du lieu
function GetOneRow($f, $t, $w, $s = 0) {
    global $mysql;
    $sql = 'SELECT ' . $f . ' FROM ' . $t . ' WHERE ' . $w;
    if ($s) {
        echo $sql;
    }
    $mysql->setQuery($sql);
    return $mysql->loadOneRow();
}

function GetOnef($f, $t, $w) {
    global $mysql;
    $sql = 'SELECT ' . $f . ' FROM ' . $t . ' WHERE ' . $w;
    $mysql->setQuery($sql);
    $row = $mysql->loadOneRow();
    return $row [$f];
}

// lay so luong row 
function GetNumRow($f, $t, $w) {
    global $mysql;
    $sql = 'SELECT ' . $f . ' FROM ' . $t . ' WHERE ' . $w;
    $mysql->setQuery($sql);
    $mysql->query();
    return $mysql->getNumRows();
}

function checkExit($f, $table, $where) {
    global $mysql;
    $sql = "SELECT " . $f . " FROM " . $table . " WHERE " . $where;
    $mysql->setQuery($sql);
    $mysql->query();
    if ($mysql->getNumRows() > 0) {
        return true;
    }
    return false;
}

// insert du lieu
function insert($table, $d) {
    global $mysql;
    $value = '';
    $f = '';
    $n = sizeof($d);
    if ($n > 0) {
        foreach ($d as $data => $v) {
            $f .= $data . ',';
            $vl .= "'" . $v . "',";
        }

        $f = rtrim($f, ',');
        $vl = rtrim($vl, ',');
        $sql = 'INSERT INTO ' . $table . "(" . $f . ") VALUES (" . $vl . ")";
        $mysql->setQuery($sql);
        $mysql->query();
        return $mysql->lastId;
    }
}

// xoa du lieu
function delete($table, $where) {
    global $mysql;
    $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;
    $mysql->setQuery($sql);
    return $mysql->query();
}

function update($table, $data, $where) {
    global $mysql;
    $set = '';
    foreach ($data as $d => $v) {
        $set .= $d . "='" . $v . "',";
    }
    $set = rtrim($set, ',');
    $sql = 'UPDATE ' . $table . ' SET ' . $set . ' WHERE ' . $where;
    $mysql->setQuery($sql);
    $mysql->query();
}

function GetAds($pos, $class1 = '', $class2 = ''
, $orderby = 'order by adver_order', $limit = '', $aclass = '', $rel = '') {
    $ad = '';
    $key = '';
    global $linkS, $mysql;
    $tdw = $linkS;
    $sql = "SELECT adver_webname, adver_logo, adver_link, description_ads, description_ads_en, adver_width, adver_height "
            . "FROM ads "
            . "WHERE adver_pos='" . $pos . "' and adver_status=1 " . $orderby . " " . $limit;
    $mysql->setQuery($sql);
    $result = $mysql->query();
    $i = 0;

    while ($row = mysql_fetch_assoc($result)) {
        if (($css == '12') and ( $i == 2)) {
            $style = '';
        }
        $width = ($row ['adver_width'] == 0) ? 'auto' : $row ['adver_width'];
        $height = ($row ['adver_height'] == 0) ? 'auto' : $row ['adver_height'];
        if (!checkExtentFile($row ['adver_logo'], 'swf|flv')) {
            if ($rel) {
                $ar_class = '';
                if ($i == 0) {
                    $ar_class = ' class="show" ';
                }
                $description_ads = ($_SESSION ['lag'] == 'vi') ? $row ['description_ads'] : $row ['description_ads_en'];
                $rel = ' rel="<h3>' . $row ['adver_webname'] . '</h3>' . $description_ads . '"';
                ++$i;
            }
            $ad .= $class1 . "<a " . $aclass . $ar_class . " href='" . $row ['adver_link'] . "' target=_blank><img " . $rel . $style . " src='" . $tdw . "upload/adver/thumb/" . $row ['adver_logo'] . "' title='" . $row ['adver_webname'] . "' alt='" . $row ['adver_webname'] . "' height='" . $height . "px' width='" . $width . "px'></a>" . $class2;
        } else if (checkExtentFile($row ['adver_logo'], 'swf')) {
            $ad .= $class1 . "<OBJECT classid=clsid:D27CDB6E-AE6D-11CF-96B8-444553540000a codeBase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0 height='" . $height . "' id='obj5' width='" . $width . "' border='0'>

                                    <PARAM NAME='movie' VALUE='" . $tdw . "upload/adver/thumb/" . $row ['adver_logo'] . "'>

                                    <PARAM NAME='quality' VALUE='High'>

                                    <PARAM NAME='wmode' VALUE='transparent'>

                            <embed src='" . $tdw . "upload/adver/thumb/" . $row ['adver_logo'] . "' 

                            pluginspage='http://www.macromedia.com/go/getflashplayer' 

                            type='application/x-shockwave-flash' name='obj5' width='" . $width . "' 

                            height='" . $height . "' quality='High' wmode='transparent'></OBJECT>" . $class2;
        } else {
            $ad .= $class1 . "<embed src='" . $tdw . "media/mediaplayer.swf' width='" . $width . "' height='" . $height . "'  type='application/x-shockwave-flash' id='MediaPlayer' name='MediaPlayer' quality='high' allowscriptaccess='always' allowfullscreen='true' wmode='transparent' flashvars='width=" . $width . "&amp;height=" . $height . "&amp;mute=true&amp;file=" . $tdw . "upload/adver/thumb/" . $row ['adver_logo'] . "&amp;' play='false'>" . $class2;
        }
    }
    return $ad;
}

// Kiem tra email
function checkemail($email) {
    $regex = "([a-z0-9_\.\-]+)" . // name

            "@" . // at

            "([a-z0-9\.\-]+){2,255}" . // domain & possibly subdomains

            "\." . // period

            "([a-z]+){2,10}"; // domain extension

    $eregi = eregi_replace($regex, '', $email);

    return empty($eregi) ? true : false;
}

// Kiem tra so
function checknumber($object) {
    if (!isset($object)) {
        return false;
    }

    $match = '^[+-]?\d+(?:\.\d+)?(?:[Ee][+-]?\d+)?$';

    return (preg_match('|' . $match . '|', $object));
}

function checkExtentFile($file_name, $extent_file) {
    return (!preg_match("/\\.(" . $extent_file . ")$/", strtolower($file_name))) ? false : true;
}

function renamefile($file_name, $key = '') {
    $file_name = strtolower($file_name);

    $extent = preg_split("/\\./", $file_name);

    if ($key == '') {
        $randFilename = uniqid("file_");
    } else {
        $randFilename = $key;
    }

    $newfile = $randFilename . "." . $extent [count($extent) - 1];

    return $newfile;
}

// Resize hinh anh
function resize($image, $x, $y = NULL, $wm = NULL, $wml = 'br') {
    if (!file_exists($image)) {
        return false;
    }

    $images = array();

    if ($wm !== '' && $wm !== NULL && file_exists($wm)) {
        $images ['wmimg'] = $wm;
    }

    $images ['img'] = $image;

    foreach ($images as $key => $value) {
        $type = substr($value, strrpos($value, '.'));

        if (stristr($type, 'i')) {
            $$key = imagecreatefromgif($value);
        }

        if (stristr($type, 'j')) {
            $$key = imagecreatefromjpeg($value);
        }

        if (stristr($type, 'n')) {
            $$key = imagecreatefrompng($value);
        }
    }

    $size = array();

    if ($y === '' || $y === NULL) {
        $size ['x'] = imageSX($img);

        $size ['y'] = imageSY($img);

        if ($size ['x'] >= $size ['y']) {
            $size ['dest_x'] = $x;

            $size ['dest_y'] = ceil($size ['y'] * ($x / $size ['x']));
        } else {
            $size ['dest_y'] = $x;

            $size ['dest_x'] = ceil($size ['x'] * ($x / $size ['y']));
        }

        $dest = imageCreatetruecolor($size ['dest_x'], $size ['dest_y']);
    } else {
        $dest = imagecreatetrueColor($x, $y);

        $size ['x'] = imageSX($img);

        $size ['y'] = imageSY($img);

        $size ['dest_x'] = $x;

        $size ['dest_y'] = $y;
    }

    imagecopyresized($dest, $img, 0, 0, 0, 0, $size ['dest_x'], $size ['dest_y'], $size ['x'], $size ['y']);

    if (isset($wmimg)) {
        $size ['wmx'] = imageSX($wmimg);

        $size ['wmy'] = imageSY($wmimg);

        $size ['wmh'] = strtolower($wml {0}) === 'b' ? ($size ['dest_y'] - $size ['wmy'] - 2) : 2;

        $size ['wmw'] = strtolower($wml {1}) === 'r' ? ($size ['dest_x'] - $size ['wmx'] - 2) : 2;

        imagecopy($dest, $wmimg, $size ['wmw'], $size ['wmh'], 0, 0, $size ['wmx'], $size ['wmy']);

        imagedestroy($wmimg);
    }

    imagedestroy($img);

    return $dest;
}

// Format size
function formatsize($file_size) {
    if ($file_size >= 1073741824) {
        $file_size = round($file_size / 1073741824 * 100) / 100 . " Gb";
    } else if ($file_size >= 1048576) {
        $file_size = round($file_size / 1048576 * 100) / 100 . " Mb";
    } else if ($file_size >= 1024) {
        $file_size = round($file_size / 1024 * 100) / 100 . " Kb";
    } else {
        $file_size = $file_size . " b";
    }

    return $file_size;
}

function sizedir($path) {
    $size = 0;

    $dir = @opendir($path);

    if ($dir) {
        while (($file = readdir($dir)) !== false) {
            $size += filesize($path . $file);
        }

        closedir($dir);

        return formatsize($size);
    } else {
        return 0;
    }
}

// Phân trang
function page_div($link, $offset, $numofpages, $page) {
    $numofpages = ceil($numofpages);

    $pagesstart = ceil($page - $offset);

    $pagesend = ceil($page + $offset);

    if ($page != "1" && ceil($numofpages) != "0") {
        $show = str_replace('%d_pg', ceil($page - 1), "<a href=" . $link . "><b><<</b></a>&nbsp;");
    }

    for ($i = 1; $i <= $numofpages; $i ++) {
        if ($pagesstart <= $i && $pagesend >= $i) {
            if ($i == $page) {
                $show .= "<b>[$i]</b>&nbsp;";
            } else {
                $show .= str_replace('%d_pg', "$i", '<a href="' . $link . '"><b>' . $i . '</b></a>&nbsp; ');
            }
        }
    }

    if (ceil($numofpages) == "0") {
        $show .= "[$i]";
    }

    if ($page != ceil($numofpages) && ceil($numofpages) != "0") {
        $show .= str_replace('%d_pg', ceil($page + 1), '<a href="' . $link . '"><b>>></b></a>');
    }

    return $show;
}

function pagination($self, $numofpages, $page_num) {
    $page_pagination = '';
    if ($numofpages > '1') {
        $range = 4;
        $range_min = ($range % 2 == 0) ? ($range / 2) - 1 : ($range - 1) / 2;
        $range_max = ($range % 2 == 0) ? $range_min + 1 : $range_min;
        $page_min = $page_num - $range_min;
        $page_max = $page_num + $range_max;
        $page_min = ($page_min < 1) ? 1 : $page_min;
        $page_max = ($page_max < ($page_min + $range - 1)) ? $page_min + $range - 1 : $page_max;
        if ($page_max > $numofpages) {
            $page_min = ($page_min > 1) ? $numofpages - $range + 1 : 1;
            $page_max = $numofpages;
        }

        $page_min = ($page_min < 1) ? 1 : $page_min;
        if (($page_num > ($range - $range_min)) && ($numofpages > $range)) {
            $page_pagination .= '<a title="Ban đầu" style = "outline:none" href="' . $self . 'page=1">1</a> ';
            $page_pagination .= '<a style = "outline:none"">...</a> ';
        }

        if ($page_num == 3 && $page_max > 4) {
            $page_pagination .= '<a title="Ban đầu" style = "outline:none" href="' . $self . 'page=1">1</a> ';
        }

//        if ($page_num != 1) {
//            $page_pagination .= '<a style="outline:none" href="' . $self . 'page=' . ($page_num - 1) . '">Trang trước</a> ';
//        }

        for ($i = $page_min; $i <= $page_max; $i ++) {
            if ($i == $page_num) {
                $page_pagination .= "<span class='current'>" . $i . '</span> ';
            } else {
                $page_pagination .= '<a style = "outline:none" href="' . $self . 'page=' . $i . '">' . $i . '</a> ';
            }
        }

        if ($page_num < $numofpages - 3) {
            // $page_pagination .= ' <a style = "outline:none" href="' . $self . 'page=' . ($page_num + 1) . '">Tiếp theo</a>';
            $page_pagination .= ' <a style = "outline:none">...</a>';
        }

        if (($page_num < ($numofpages - $range_max)) && ($numofpages > $range)) {
            $page_pagination .= ' <a style = "outline:none" title="Kết thúc" href="' . $self . 'page=' . $numofpages . '">' . $numofpages . '</a> ';
        }

        // $page_pagination = "<span class='sotrang'>Trang " . $page_num . "/" . $numofpages . "</span>" . ' ' . $page_pagination;
    }
    return $page_pagination;
}

function pagination_multipage($self, $numofpages, $page_num, $current_page, $other = '') {
    if ($numofpages > '1') {
        $range = 4;

        $range_min = ($range % 2 == 0) ? ($range / 2) - 1 : ($range - 1) / 2;

        $range_max = ($range % 2 == 0) ? $range_min + 1 : $range_min;

        $page_min = $page_num - $range_min;

        $page_max = $page_num + $range_max;

        $page_min = ($page_min < 1) ? 1 : $page_min;

        $page_max = ($page_max < ($page_min + $range - 1)) ? $page_min + $range - 1 : $page_max;

        if ($page_max > $numofpages) {
            $page_min = ($page_min > 1) ? $numofpages - $range + 1 : 1;

            $page_max = $numofpages;
        }

        $page_min = ($page_min < 1) ? 1 : $page_min;

        if (($page_num > ($range - $range_min)) && ($numofpages > $range)) {
            if ($other == '') {
                $page_pagination .= '<a title="Ban đầu" href="' . $self . '' . $current_page . '=1">Ban đầu</a> ';
            } else {
                $page_pagination .= '<a title="Ban đầu" href="' . $self . '' . $current_page . '=1' . $other . '">Ban đầu</a> ';
            }
        }

        if ($page_num != 1) {
            if ($other == '') {
                $page_pagination .= '<a href="' . $self . '' . $current_page . '=' . ($page_num - 1) . '">Trang trước</a> ';
            } else {
                $page_pagination .= '<a href="' . $self . '' . $current_page . '=' . ($page_num - 1) . '' . $other . '">Trang trước</a> ';
            }
        }

        for ($i = $page_min; $i <= $page_max; $i ++) {
            if ($i == $page_num) {
                $page_pagination .= "<span class='current'>" . $i . '</span> ';
            } else if ($other == '') {
                $page_pagination .= '<a href="' . $self . '' . $current_page . '=' . $i . '">' . $i . '</a> ';
            } else {
                $page_pagination .= '<a href="' . $self . '' . $current_page . '=' . $i . '' . $other . '">' . $i . '</a> ';
            }
        }

        if ($page_num < $numofpages) {
            if ($other == '') {
                $page_pagination .= ' <a href="' . $self . '' . $current_page . '=' . ($page_num + 1) . '">Tiếp theo</a>';
            } else {
                $page_pagination .= ' <a href="' . $self . '' . $current_page . '=' . ($page_num + 1) . '' . $other . '">Tiếp theo</a>';
            }
        }

        if (($page_num < ($numofpages - $range_max)) && ($numofpages > $range)) {
            if ($other == '') {
                $page_pagination .= ' <a title="Kết thúc" href="' . $self . '' . $current_page . '=' . $numofpages . '">Kết thúc</a> ';
            } else {
                $page_pagination .= ' <a title="Kết thúc" href="' . $self . '' . $current_page . '=' . $numofpages . '' . $other . '">Kết thúc</a> ';
            }
        }
        $page_pagination = "<span class='sotrang'>Trang " . $page_num . "/" . $numofpages . "</span>" . ' ' . $page_pagination;
    }

    return $page_pagination;
}

function cut_string($str, $len, $more = '') {
    $str = stripcslashes($str);

    if ($str == "" || $str == NULL) {
        return $str;
    }

    if (is_array($str)) {
        return $str;
    }

    $str = trim($str);

    if (strlen($str) <= $len) {
        return $str;
    }

    $str = substr($str, 0, $len);

    if ($str != "") {
        if (!substr_count($str, " ")) {
            if ($more) {
                $str .= " ...";
            }
            return $str;
        }

        while (strlen($str) && ($str [strlen($str) - 1] != " ")) {
            $str = substr($str, 0, - 1);
        }

        $str = substr($str, 0, - 1);

        if ($more) {
            $str .= " ...";
        }
    }

    return $str;
}

function GetConfig($config_name) {
    global $mysql;

    $mysql->setQuery("SELECT config_value FROM config WHERE config_name='" . $config_name . "'");

    $row = $mysql->loadOneRow();

    return $row ['config_value'];
}

function SetConfig($name, $value) {
    global $mysql;

    $sql = "update config set config_value = '" . $value . "' WHERE config_name = '" . $name . "'";

    $mysql->setQuery($sql);

    $mysql->query();
}

function sendmail($from, $to, $subject, $body) {
    $header = "MIME-Version: 1.0 \r\n";

    $header .= "Content-type: text/html; charset=utf-8 \r\n";

    $header .= "From: $from \r\n";

    $header .= "To: $to \r\n";

    $header .= "Subject: $subject \r\n";

    return false;
}

function sendmail_smtp($from, $to, $subject, $body) {
    return mail_smtp($from, $to, $subject, $body, 1);
}

function mail_smtp($from, $to, $subject, $body, $html = 0) {
    require_once ("smtp.php");

    $smtp = new smtp_class ();

    $smtp->host_name = "localhost"; /*
     * Change this variable to the address of the
     * SMTP server to relay, like
     * "smtp.myisp.com"

     *                                  */
    $smtp->localhost = "localhost"; /* Your computer address */

    $smtp->direct_delivery = 0; /*
     * Set to 1 to deliver directly to the recepient
     * SMTP server
     */

    $smtp->timeout = 10; /*
     * Set to the number of seconds wait for a successful
     * connection to the SMTP server
     */

    $smtp->data_timeout = 0; /*
     * Set to the number seconds wait for sending or
     * retrieving data from the SMTP server. Set to 0 to
     * use the same defined in the timeout variable
     */
    $smtp->debug = 0; /*
     * Set to 1 to output the communication with the SMTP
     * server
     */

    $smtp->html_debug = 1; /* Set to 1 to format the debug output as HTML */

    $mailHost = GetConfig("mail_host");

    $mailOutUser = GetConfig("email");

    $mailOutPassword = GetConfig("mail_password");

    $smtp->pop3_auth_host = $mailHost; /*
     * Set to the POP3 authentication host if
     * your SMTP server requires prior POP3
     * authentication
     */
    $smtp->user = $mailOutUser; /*
     * Set to the user name if the server requires
     * authetication
     */
    $smtp->realm = ""; /*
     * Set to the authetication realm, usually the
     * authentication user e-mail domain
     */
    $smtp->password = $mailOutPassword; /* Set to the authetication password */

    $smtp->workstation = ""; /* Workstation name for NTLM authentication */

    $smtp->authentication_mechanism = "";

    /*
     * Specify a SASL authentication method
     * like LOGIN, PLAIN, CRAM-MD5, NTLM,
     * etc.. Leave it empty to make the
     * class negotiate if necessary        
     * If you need to use the direct delivery mode and this is running under
     * Windows or any other platform that does not have enabled the MX
     * resolution function GetMXRR() , you need to include code that emulates
     * that function so the class knows which SMTP server it should connect
     * to deliver the message directly to the recipient SMTP server.
     */
    if ($smtp->direct_delivery) {
        if (!function_exists("GetMXRR")) {
            /*
             * If possible specify in this array the address of at least on
             * local DNS that may be queried from your network.
             */

            $_NAMESERVERS = array();

            include ("getmxrr.php");
        }

        /*
         * If GetMXRR function is available but it is not functional, to use the
         * direct delivery mode, you may use a replacement function.
         */
        /*
          else
          {

          $_NAMESERVERS=array();

          if(count($_NAMESERVERS)==0)

          Unset($_NAMESERVERS);

          include("rrcompat.php");

          $smtp->getmxrr="_getmxrr";
          }
         */
    }

    $header = "";

    if ($html == 0) {
        $header = array(
            "From: $from",
            "To: $to",
            "Subject: $subject",
            "Date: " . strftime("%a, %d %b %Y %H:%M:%S %Z")
        );
    } else {
        $header = array(
            "MIME-Version: 1.0",
            "Content-type: text/html; charset=utf-8",
            "From: $from",
            "To: $to",
            "Subject: $subject",
            "Date: " . strftime("%a, %d %b %Y %H:%M:%S %Z")
        );
    }

    $ret = $smtp->SendMessage($from, array(
        $to
            ), $header, $body);

    return $ret;
}

function sendmail_phpmailer($from, $to, $subject, $body) {
    $mailHost = GetConfig("mail_host");

    $mailOutUser = GetConfig("email");

    $mailOutPassword = GetConfig("mail_password");

    define('PATH', dirname(__FILE__));

    // include_once ('phpmailer/mimeDecode.php');

    include_once ('phpmailer/phpmailer.class.php');

    include_once ("phpmailer/XmlParse.class.php");

    define("SERVER_MAIL", $mailHost);

    define("SMTP_PORT", 25); // 587 or 465 or localhost with default 25

    define("SMTP_AUTH", true);

    define("SMTP_AUTH_USER", $mailOutUser);

    define("SMTP_AUTH_PWD", $mailOutPassword);

    define("SMTP_SECURE", ''); // "ssl" or "tls"

    define("SMTP_TIMEOUT", 30);

    $config ['IsSMTP'] = true;

    // ================================================================
    $host = SERVER_MAIL;

    $port = defined('SMTP_PORT') ? SMTP_PORT : 25;

    $phpmailer = new PHPMailer ();

    $phpmailer->Subject = $subject;

    $phpmailer->Body = $body;

    $phpmailer->From = $from;

    $phpmailer->FromName = $to;

    $phpmailer->AddAddress($to);

    $phpmailer->Host = $host;

    $phpmailer->Port = $port;

    // $phpmailer->CharSet = $strCharset;

    $phpmailer->SMTPAuth = defined('SMTP_AUTH') ? SMTP_AUTH : false;

    $phpmailer->Username = defined('SMTP_AUTH_USER') ? SMTP_AUTH_USER : '';

    $phpmailer->Password = defined('SMTP_AUTH_PWD') ? SMTP_AUTH_PWD : '';

    $phpmailer->SMTPSecure = defined('SMTP_SECURE') ? SMTP_SECURE : '';

    $phpmailer->Timeout = defined('SMTP_TIMEOUT') ? SMTP_TIMEOUT : '';

    if ($config ['IsSMTP']) {
        $phpmailer->IsSMTP();
    } else {
        $phpmailer->IsMail();
    }

    $ret = $phpmailer->send();

    if ($ret) {
        return true;
    }
    return false;
}

function mail_contact_to_client_phpmailer($name_to, $to, $body, $subject) {
    $mailHost = GetConfig("mail_host");

    $mailOutUser = GetConfig("email");

    $mailOutPassword = GetConfig("mail_password");

    define('PATH', dirname(__FILE__));

    // include_once ('phpmailer/mimeDecode.php');

    include_once ('phpmailer/phpmailer.class.php');

    include_once ("phpmailer/XmlParse.class.php");

    define("SERVER_MAIL", $mailHost);

    define("SMTP_PORT", 25); // 587 or 465 or localhost with default 25

    define("SMTP_AUTH", true);

    define("SMTP_AUTH_USER", $mailOutUser);

    define("SMTP_AUTH_PWD", $mailOutPassword);

    define("SMTP_SECURE", ''); // "ssl" or "tls"

    define("SMTP_TIMEOUT", 30);

    $config ['IsSMTP'] = true;

    $host = SERVER_MAIL;

    $port = defined('SMTP_PORT') ? SMTP_PORT : 25;

    $phpmailer = new PHPMailer ();

    $phpmailer->Subject = $subject;

    $phpmailer->Body = $body;

    $phpmailer->From = $mailHost;

    $phpmailer->FromName = "NanaPet";

    $phpmailer->AddAddress($to, $name_to);

    $phpmailer->Host = $host;

    $phpmailer->Port = $port;

    // $phpmailer->CharSet = $strCharset;

    $phpmailer->SMTPAuth = defined('SMTP_AUTH') ? SMTP_AUTH : false;

    $phpmailer->Username = defined('SMTP_AUTH_USER') ? SMTP_AUTH_USER : '';

    $phpmailer->Password = defined('SMTP_AUTH_PWD') ? SMTP_AUTH_PWD : '';

    $phpmailer->SMTPSecure = defined('SMTP_SECURE') ? SMTP_SECURE : '';

    $phpmailer->Timeout = defined('SMTP_TIMEOUT') ? SMTP_TIMEOUT : '';

    if ($config ['IsSMTP']) {
        $phpmailer->IsSMTP();
    } else {
        $phpmailer->IsMail();
    }

    $ret = $phpmailer->send();

    if ($ret) {
        return true;
    }
    return false;
}

function mail_contact_to_client($name_to, $to, $body, $subject) {
    $webmaster_email = GetConfig("mail_host"); // Reply to this email ID

    $header = "MIME-Version: 1.0 \r\n";

    $header .= "Content-type: text/html; charset=utf-8 \r\n";

    $header .= "From: $webmaster_email \r\n";

    $header .= "To: $to \r\n";

    $header .= "Subject: $subject \r\n";

    if (mail($to, $subject, $body, $header)) {
        return true;
    }
    return false;
}

function mail_contact_to_client_smtp($name_to, $to, $body, $subject) {
    require ("phpmailer/class.phpmailer.php");

    $webmaster_email = GetConfig("mail_admin"); // Reply to this email ID

    $mail = new PHPMailer ();

    global $SMTP_account;

    global $SMTP_password;

    global $SMTP_Host;

    global $SMTP_Port;

    $from = $webmaster_email;

    $fromName = "Nanapet";

    $mail->IsSMTP();

    $mail->Host = $SMTP_Host;

    $mail->Port = $SMTP_Port;

    $mail->SMTPAuth = true;

    $mail->Username = $SMTP_account;

    $mail->Password = $SMTP_password;

    $mail->From = $from;

    $mail->FromName = $fromName;

    $mail->AddAddress($to, $name_to);

    $mail->AddReplyTo($from, $fromName);

    $mail->WordWrap = 50;

    $mail->IsHTML(true);

    $mail->Subject = $subject;

    $mail->Body = $body;

    $mail->AltBody = "This is the text-only body";

    if (!$mail->Send()) {
        return false;
    }
    return true;
}

function mail_contact_to_admin_smtp($name_to, $to, $body, $subject) {
    //require ("phpmailer/class.phpmailer.php");

    $webmaster_email = GetConfig("mail_admin"); // Reply to this email ID

    $mail = new PHPMailer ();

    global $SMTP_Host;

    global $SMTP_Port;

    global $SMTP_account;

    global $SMTP_password;

    $from = $webmaster_email;

    $fromName = "NanaPet";

    $mail->IsSMTP();

    $mail->Host = $SMTP_Host;

    $mail->Port = $SMTP_Port;

    $mail->SMTPAuth = true;

    $mail->Username = $SMTP_account;

    $mail->Password = $SMTP_password;

    $mail->From = $from;

    $mail->FromName = $fromName;

    $mail->AddAddress($to, $name_to);

    $mail->AddReplyTo($from, $fromName);

    $mail->WordWrap = 50;

    $mail->IsHTML(true);

    $mail->Subject = $subject;

    $mail->Body = $body;

    $mail->AltBody = "This is the text-only body";

    if (!$mail->Send()) {
        return false;
    }
    return true;
}

function mail_contact_from_client_to_admin_smtp($from, $from_name, $name_to, $to, $body, $subject) {
    require ("phpmailer/class.phpmailer.php");

    $webmaster_email = GetConfig("mail_admin"); // Reply to this email ID

    $mail = new PHPMailer ();

    global $SMTP_Host;

    global $SMTP_Port;

    global $SMTP_account;

    global $SMTP_password;

    $mail->IsSMTP();

    $mail->Host = $SMTP_Host;

    $mail->Port = $SMTP_Port;

    $mail->SMTPAuth = true;

    $mail->Username = $SMTP_account;

    $mail->Password = $SMTP_password;

    $mail->From = $from;

    $mail->FromName = $from_name;

    $mail->AddAddress($to, $name_to);

    $mail->AddReplyTo($from, $from_name);

    $mail->WordWrap = 50;

    $mail->IsHTML(true);

    $mail->Subject = $subject;

    $mail->Body = $body;

    $mail->AltBody = "This is the text-only body";

    if (!$mail->Send()) {
        return false;
    }
    return true;
}

function getFullUrl() {

    /**
     * * check for https **
     */
    $protocol = $_SERVER ['HTTPS'] == 'on' ? 'https' : 'http';

    /**
     * * return the full address **
     */
    return $protocol . '://' . $_SERVER ['HTTP_HOST'] . $_SERVER ['REQUEST_URI'];
}

function getFullUrlNotParameter() {
    $url = getFullUrl();

    $arr = split('[\?]', $url);

    $arr = split('/order', $arr [0]);

    $arr = split('/page', $arr [0]);

    $curl = $arr [0];

    $arr = split('//', $curl);

    $start = $arr [0] . '//';

    $arr = split('/', $arr [1]);

    $n = count($arr);

    $self = '';

    for ($i = 0; $i < $n; ++$i) {
        if ($i < ($n - 1)) {
            $self .= $arr [$i] . '/';
        } else {
            if (!ctype_digit($arr [$i])) {
                $self .= $arr [$i];
            }
        }
    }

    $end_url = $start . $self;

    return $end_url;
}

function getFullDomain() {
    /**
     * * check for https **
     */
    $protocol = $_SERVER ['HTTPS'] == 'on' ? 'https' : 'http';

    /**
     * * return the full address **
     */
    return $protocol . '://' . $_SERVER ['HTTP_HOST'];
}

function checkValues($value) {
    $value = trim($value);

    if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }

    $value = strtr($value, array_flip(get_html_translation_table(HTML_ENTITIES)));

    $value = strip_tags($value);

    $value = mysql_real_escape_string($value);

    $value = htmlspecialchars($value);

    return $value;
}

function convertToDate($stringDate) {
    $arrTime = split(',', $stringDate);

    $thangngay = $arrTime [0];

    $namgio = $arrTime [1];

    $arrTime = split(' ', $thangngay);

    $ngay = $arrTime [1];

    $thang = $arrTime [0];

    $arrTime = split(' ', $namgio);

    $nam = $arrTime [1];

    $giophut = $arrTime [2];

    $arrTime = split(':', $giophut);

    $gio = $arrTime [0];

    $phut = $arrTime [1];

    if ($thang == 'Jan') {
        $thang_num = 1;
    }

    if ($thang == 'Feb') {
        $thang_num = 2;
    }

    if ($thang == 'Mar') {
        $thang_num = 3;
    }

    if ($thang == 'Apr') {
        $thang_num = 4;
    }

    if ($thang == 'May') {
        $thang_num = 5;
    }

    if ($thang == 'Jun') {
        $thang_num = 6;
    }

    if ($thang == 'Jul') {
        $thang_num = 7;
    }

    if ($thang == 'Aug') {
        $thang_num = 8;
    }

    if ($thang == 'Sep') {
        $thang_num = 9;
    }

    if ($thang == 'Oct') {
        $thang_num = 10;
    }

    if ($thang == 'Nov') {
        $thang_num = 11;
    }

    if ($thang == 'Dec') {
        $thang_num = 12;
    }

    $datetime = new DateTime ();

    $datetime->setDate($nam, $thang_num, $ngay);

    $datetime->setTime($gio, $phut, '0');

    return $datetime;
}

function getDateNow() {
    $today = getdate();

    $nam = $today ['year'];

    $thang = $today ['mon'];

    $ngay = $today ['mday'];

    $gio = $today ['hours'];

    $phut = $today ['minutes'];

    $datetime = new DateTime();

    $datetime->setDate($nam, $thang, $ngay);

    $datetime->setTime($gio, $phut, '0');

    return $datetime;
}

function updateScore($user, $action, $score, $comment) {
    if ($action == "addhistory") {
        $arrIns = array
            (
            "user" => $user,
            "action" => $action,
            "score" => $score,
            "action_date" => time(),
            "comment" => $comment
        );

        insert("tbl_history_score", $arrIns);
    } else {
        $usrScore = GetOneRow("score", "scores", "user = '" . $user . "'");

        $arrIns = array
            (
            "user" => $user,
            "action" => $action,
            "score" => $score,
            "action_date" => time(),
            "comment" => $comment
        );

        if (empty($usrScore)) {
            $arrInsNew = array
                (
                "user" => $user,
                "score" => $score,
                "honors" => "Normal",
                "fee4Ever" => "0",
                "scorelevel" => "0"
            );

            insert("scores", $arrInsNew);

            insert("tbl_history_score", $arrIns);
        } else {
            $arrUp = array
                (
                "score" => ($score + $usrScore ["score"]),
                "user" => $user
            );

            update("scores", $arrUp, "user='" . $user . "'");

            insert("tbl_history_score", $arrIns);
        }
    }
}

?>