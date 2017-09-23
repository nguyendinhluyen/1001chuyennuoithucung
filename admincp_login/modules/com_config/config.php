<?php

$title = $arr_lang['configweb'];
$error = "";
$xtemplate->path = 'com_config/';
$content = $xtemplate->load('config');

if (isset($_POST['btnSub'])) {
    $webtitle = $_POST['webtitle'];
    $txtkey = $_POST['txtkey'];
    $description = $_POST['description'];
    $txemail = $_POST['txemail'];
    $txtmailhost = $_POST['txtmailhost'];
    $mail_port = $_POST['mail_port'];
    $txtpassword = $_POST['txtpassword'];
    $rss = $_POST['rss'];
    $header = $_POST['header'];
    $body = $_POST['body'];
    $active = ($_POST['cbactive'] == 'on') ? '1' : '0';
    $cbspam = ($_POST['cbspam'] == 'on') ? '1' : '0';
    $myhexcode = $_POST['myhexcode'];
    $mail_admin = $_POST['mail_admin'];
    $href_banner = $_POST['href_banner'];
    $href_banner_2 = $_POST['href_banner_2'];
    $href_banner_3 = $_POST['href_banner_3'];
    $href_banner_4 = $_POST['href_banner_4'];
    $href_banner_5 = $_POST['href_banner_5'];
    $introduce = $_POST['introduce'];

    // Upload link banner
    SetConfig('href_banner', $href_banner);
    SetConfig('href_banner_2', $href_banner_2);
    SetConfig('href_banner_3', $href_banner_3);
    SetConfig('href_banner_4', $href_banner_4);
    SetConfig('href_banner_5', $href_banner_5);
    SetConfig('introduce', $introduce);

    // Check error upload logo
    $logo = $_FILES["logo"]["name"];
    if ($logo) {
        if ($_FILES["logo"]["error"] > 0) {
            echo "Error: " . $_FILES["logo"]["error"] . "<br>";
        } else {
            if (move_uploaded_file($_FILES ["logo"]["tmp_name"], _UPLOAD . $logo)) {
                SetConfig('logo', $logo);
            }
        }
    }

    $banner = $_FILES["banner_1"]["name"];
    $banner_2 = $_FILES["banner_2"]["name"];
    $banner_3 = $_FILES["banner_3"]["name"];
    $banner_4 = $_FILES["banner_4"]["name"];
    $banner_5 = $_FILES["banner_5"]["name"];

    // Check error upload banner_1		
    if ($banner) {
        if ($_FILES["banner_1"]["error"] > 0) {
            $error = "Error: " . $_FILES["banner_1"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER . $_FILES["banner_1"]["name"])) {
                $error = 'Tên "' . $_FILES["banner_1"]["name"] . '" đã tồn tại trên hệ thống. 
                            Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_1"]["tmp_name"], _UPLOAD_BANNER . $banner)) {
                    SetConfig('banner', $banner);
                }
            }
        }
    }

    // Check error upload banner_2						
    if ($banner_2) {
        if ($_FILES["banner_2"]["error"] > 0) {
            $error = "Error: " . $_FILES["banner_2"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER . $_FILES["banner_2"]["name"])) {
                $error = 'Tên "' . $_FILES["banner_2"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                               Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_2"]["tmp_name"], _UPLOAD_BANNER . $banner_2)) {
                    SetConfig('banner_2', $banner_2);
                }
            }
        }
    }

    // Check error upload banner_3							
    if ($banner_3) {
        if ($_FILES["banner_3"]["error"] > 0) {
            $error = "Error: " . $_FILES["banner_3"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER . $_FILES["banner_3"]["name"])) {
                $error = 'Tên "' . $_FILES["banner_3"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_3"]["tmp_name"], _UPLOAD_BANNER . $banner_3)) {
                    SetConfig('banner_3', $banner_3);
                }
            }
        }
    }

    // Check error upload banner_4							
    if ($banner_4) {
        if ($_FILES["banner_4"]["error"] > 0) {
            $error = "Error: " . $_FILES["banner_4"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER . $_FILES["banner_4"]["name"])) {
                $error = 'Tên "' . $_FILES["banner_4"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_4"]["tmp_name"], _UPLOAD_BANNER . $banner_4)) {
                    SetConfig('banner_4', $banner_4);
                }
            }
        }
    }

    // Check error upload banner_5							
    if ($banner_5) {
        if ($_FILES["banner_5"]["error"] > 0) {
            $error = "Error: " . $_FILES["banner_5"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER . $_FILES["banner_5"]["name"])) {
                $error = 'Tên "' . $_FILES["banner_5"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_5"]["tmp_name"], _UPLOAD_BANNER . $banner_5)) {
                    SetConfig('banner_5', $banner_5);
                }
            }
        }
    }

    // Left banner 1
    $banner_left_1_1 = $_FILES["banner_left_1_1"]["name"];
    $banner_left_1_2 = $_FILES["banner_left_1_2"]["name"];
    $banner_left_1_3 = $_FILES["banner_left_1_3"]["name"];
    $banner_left_1_4 = $_FILES["banner_left_1_4"]["name"];
    $banner_left_1_5 = $_FILES["banner_left_1_5"]["name"];

    $error_1 = '';

    // Check error upload banner_left_1_1							
    if ($banner_left_1_1) {
        if ($_FILES["banner_left_1_1"]["error"] > 0) {
            $error_1 = "Error: " . $_FILES["banner_left_1_1"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_1 . $_FILES["banner_left_1_1"]["name"])) {
                $error_1 = 'Tên "' . $_FILES["banner_left_1_1"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                      Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_1_1"]["tmp_name"], _UPLOAD_BANNER_LEFT_1 . $banner_left_1_1)) {
                    SetConfig('banner_left_1_1', $banner_left_1_1);
                }
            }
        }
    }

    // Check error upload banner_left_1_2
    if ($banner_left_1_2) {
        if ($_FILES["banner_left_1_2"]["error"] > 0) {
            $error_1 = "Error: " . $_FILES["banner_left_1_2"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_1 . $_FILES["banner_left_1_2"]["name"])) {
                $error_1 = 'Tên "' . $_FILES["banner_left_1_2"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                         Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_1_2"]["tmp_name"], _UPLOAD_BANNER_LEFT_1 . $banner_left_1_2)) {
                    SetConfig('banner_left_1_2', $banner_left_1_2);
                }
            }
        }
    }

    // Check error upload banner_left_1_3
    if ($banner_left_1_3) {
        if ($_FILES["banner_left_1_3"]["error"] > 0) {
            $error_1 = "Error: " . $_FILES["banner_left_1_3"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_1 . $_FILES["banner_left_1_3"]["name"])) {
                $error_1 = 'Tên "' . $_FILES["banner_left_1_3"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                        Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_1_3"]["tmp_name"], _UPLOAD_BANNER_LEFT_1 . $banner_left_1_3)) {
                    SetConfig('banner_left_1_3', $banner_left_1_3);
                }
            }
        }
    }

    // Check error upload banner_left_1_4
    if ($banner_left_1_4) {
        if ($_FILES["banner_left_1_4"]["error"] > 0) {
            $error_1 = "Error: " . $_FILES["banner_left_1_4"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_1 . $_FILES["banner_left_1_4"]["name"])) {
                $error_1 = 'Tên "' . $_FILES["banner_left_1_4"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                        Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_1_4"]["tmp_name"], _UPLOAD_BANNER_LEFT_1 . $banner_left_1_4)) {
                    SetConfig('banner_left_1_4', $banner_left_1_4);
                }
            }
        }
    }

    // Check error upload banner_left_1_5
    if ($banner_left_1_5) {
        if ($_FILES["banner_left_1_5"]["error"] > 0) {
            $error_1 = "Error: " . $_FILES["banner_left_1_5"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_1 . $_FILES["banner_left_1_5"]["name"])) {
                $error_1 = 'Tên "' . $_FILES["banner_left_1_5"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                      Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_1_5"]["tmp_name"], _UPLOAD_BANNER_LEFT_1 . $banner_left_1_5)) {
                    SetConfig('banner_left_1_5', $banner_left_1_5);
                }
            }
        }
    }

    // Left banner 2
    $banner_left_2_1 = $_FILES["banner_left_2_1"]["name"];
    $banner_left_2_2 = $_FILES["banner_left_2_2"]["name"];
    $banner_left_2_3 = $_FILES["banner_left_2_3"]["name"];
    $banner_left_2_4 = $_FILES["banner_left_2_4"]["name"];
    $banner_left_2_5 = $_FILES["banner_left_2_5"]["name"];

    $error_2 = '';

    // Check error upload banner_left_2_1							
    if ($banner_left_2_1) {
        if ($_FILES["banner_left_2_1"]["error"] > 0) {
            $error_2 = "Error: " . $_FILES["banner_left_2_1"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_2 . $_FILES["banner_left_2_1"]["name"])) {
                $error_2 = 'Tên "' . $_FILES["banner_left_2_1"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                        Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_2_1"]["tmp_name"], _UPLOAD_BANNER_LEFT_2 . $banner_left_2_1)) {
                    SetConfig('banner_left_2_1', $banner_left_2_1);
                }
            }
        }
    }

    // Check error upload banner_left_2_2
    if ($banner_left_2_2) {
        if ($_FILES["banner_left_2_2"]["error"] > 0) {
            $error_2 = "Error: " . $_FILES["banner_left_2_2"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_2 . $_FILES["banner_left_2_2"]["name"])) {
                $error_2 = 'Tên "' . $_FILES["banner_left_2_2"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                         Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_2_2"]["tmp_name"], _UPLOAD_BANNER_LEFT_2 . $banner_left_2_2)) {
                    SetConfig('banner_left_2_2', $banner_left_2_2);
                }
            }
        }
    }

    // Check error upload banner_left_2_3
    if ($banner_left_2_3) {
        if ($_FILES["banner_left_2_3"]["error"] > 0) {
            $error_2 = "Error: " . $_FILES["banner_left_2_3"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_2 . $_FILES["banner_left_2_3"]["name"])) {
                $error_2 = 'Tên "' . $_FILES["banner_left_2_3"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                        Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_2_3"]["tmp_name"], _UPLOAD_BANNER_LEFT_2 . $banner_left_2_3)) {
                    SetConfig('banner_left_2_3', $banner_left_2_3);
                }
            }
        }
    }

    // Check error upload banner_left_2_4
    if ($banner_left_2_4) {
        if ($_FILES["banner_left_2_4"]["error"] > 0) {
            $error_2 = "Error: " . $_FILES["banner_left_2_4"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_2 . $_FILES["banner_left_2_4"]["name"])) {
                $error_2 = 'Tên "' . $_FILES["banner_left_2_4"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                        Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_2_4"]["tmp_name"], _UPLOAD_BANNER_LEFT_2 . $banner_left_2_4)) {
                    SetConfig('banner_left_2_4', $banner_left_2_4);
                }
            }
        }
    }

    // Check error upload banner_left_2_5
    if ($banner_left_2_5) {
        if ($_FILES["banner_left_2_5"]["error"] > 0) {
            $error_2 = "Error: " . $_FILES["banner_left_2_5"]["error"] . "<br>";
        } else {
            if (file_exists(_UPLOAD_BANNER_LEFT_2 . $_FILES["banner_left_2_5"]["name"])) {
                $error_2 = 'Tên "' . $_FILES["banner_left_2_5"]["name"] . '" đã tồn tại trên hệ thống. 
                                                                                                                                                      Vui lòng đặt tên khác!' . '<br>';
            } else {
                if (move_uploaded_file($_FILES ["banner_left_2_5"]["tmp_name"], _UPLOAD_BANNER_LEFT_2 . $banner_left_2_5)) {
                    SetConfig('banner_left_2_5', $banner_left_2_5);
                }
            }
        }
    }

    SetConfig('active', $active);
    SetConfig('rss', $rss);
    SetConfig('anti_spam', $cbspam);
    SetConfig('header', input($header));
    SetConfig('body', input($body));

    if (isset($description{0})) {
        SetConfig('description', input($description));
    }

    if (isset($mail_admin{0})) {
        SetConfig('mail_admin', input($mail_admin));
    }

    if (isset($myhexcode{2})) {
        SetConfig('textcolor', $myhexcode);
    }

    if (isset($txtmailhost{2})) {
        SetConfig('mail_host', $txtmailhost);
    }

    if (isset($mail_port{0})) {
        SetConfig('mail_port', $mail_port);
    }

    if (isset($txtpassword{2})) {
        SetConfig('mail_password', $txtpassword);
    }

    if (isset($themes{0})) {
        SetConfig('themes', $themes);
    }

    if (isset($txemail{0})) {
        if (checkemail($txemail)) {
            SetConfig('email', input($txemail));
        }
    }
    header("location:./?show=config");
}

$mysql->setQuery('SELECT config_name,config_value FROM config');
$result = $mysql->query();
$arr_config = array();
while ($row = mysql_fetch_assoc($result)) {
    $arr_config[$row['config_name']] = $row['config_value'];
}

$txtmailhost = output($arr_config['mail_host']);
$mail_port = output($arr_config['mail_port']);

$href_banner = output($arr_config['href_banner']);
$href_banner_2 = output($arr_config['href_banner_2']);
$href_banner_3 = output($arr_config['href_banner_3']);
$href_banner_4 = output($arr_config['href_banner_4']);
$href_banner_5 = output($arr_config['href_banner_5']);
$introduce = output($arr_config['introduce']);
$banner_1 = output($arr_config['banner']);
$banner_2 = output($arr_config['banner_2']);
$banner_3 = output($arr_config['banner_3']);
$banner_4 = output($arr_config['banner_4']);
$banner_5 = output($arr_config['banner_5']);

$banner_left_1_1 = output($arr_config['banner_left_1_1']);
$banner_left_1_2 = output($arr_config['banner_left_1_2']);
$banner_left_1_3 = output($arr_config['banner_left_1_3']);
$banner_left_1_4 = output($arr_config['banner_left_1_4']);
$banner_left_1_5 = output($arr_config['banner_left_1_5']);

$banner_left_2_1 = output($arr_config['banner_left_2_1']);
$banner_left_2_2 = output($arr_config['banner_left_2_2']);
$banner_left_2_3 = output($arr_config['banner_left_2_3']);
$banner_left_2_4 = output($arr_config['banner_left_2_4']);
$banner_left_2_5 = output($arr_config['banner_left_2_5']);

$logo = output($arr_config['logo']);
$txtpassword = output($arr_config['mail_password']);
$txemail = output($arr_config['email']);
$mail_admin = output($arr_config['mail_admin']);
$rss = output($arr_config['rss']);
$active = ($arr_config['active'] == '1') ? 'checked' : '';
$checked_spam = ($arr_config['anti_spam'] == '1') ? 'checked' : '';
$myhexcode = $arr_config['textcolor'];
$header = $arr_config['header'];
$body = $arr_config['body'];

if ($_GET['action'] == 'del') {
    if ($_GET['id'] == 'banner_1') {
        SetConfig('banner', "");
        unlink('../../layout/images/logo/banner/' . $banner_1);
    } else if ($_GET['id'] == 'banner_2') {
        SetConfig('banner_2', "");
        unlink('../../layout/images/logo/banner/' . $banner_2);
    } else if ($_GET['id'] == 'banner_3') {
        SetConfig('banner_3', "");
        unlink('../../layout/images/logo/banner/' . $banner_3);
    } else if ($_GET['id'] == 'banner_4') {
        SetConfig('banner_4', "");
        unlink('../../layout/images/logo/banner/' . $banner_4);
    } else if ($_GET['id'] == 'banner_5') {
        SetConfig('banner_5', "");
        unlink('../../layout/images/logo/banner/' . $banner_5);
    }

    if ($_GET['id'] == 'banner_left_1_1') {
        SetConfig('banner_left_1_1', "");
        unlink('../../layout/images/logo/banner_left_1/' . $banner_left_1_1);
    } else if ($_GET['id'] == 'banner_left_1_2') {
        SetConfig('banner_left_1_2', "");
        unlink('../../layout/images/logo/banner_left_1/' . $banner_left_1_2);
    } else if ($_GET['id'] == 'banner_left_1_3') {
        SetConfig('banner_left_1_3', "");
        unlink('../../layout/images/logo/banner_left_1/' . $banner_left_1_3);
    } else if ($_GET['id'] == 'banner_left_1_4') {
        SetConfig('banner_left_1_4', "");
        unlink('../../layout/images/logo/banner_left_1/' . $banner_left_1_4);
    } else if ($_GET['id'] == 'banner_left_1_5') {
        SetConfig('banner_left_1_5', "");
        unlink('../../layout/images/logo/banner_left_1/' . $banner_left_1_5);
    }

    if ($_GET['id'] == 'banner_left_2_1') {
        SetConfig('banner_left_2_1', "");
        unlink('../../layout/images/logo/banner_left_2/' . $banner_left_2_1);
    } else if ($_GET['id'] == 'banner_left_2_2') {
        SetConfig('banner_left_2_2', "");
        unlink('../../layout/images/logo/banner_left_2/' . $banner_left_2_2);
    } else if ($_GET['id'] == 'banner_left_2_3') {
        SetConfig('banner_left_2_3', "");
        unlink('../../layout/images/logo/banner_left_2/' . $banner_left_2_3);
    } else if ($_GET['id'] == 'banner_left_2_4') {
        SetConfig('banner_left_2_4', "");
        unlink('../../layout/images/logo/banner_left_2/' . $banner_left_2_4);
    } else if ($_GET['id'] == 'banner_left_2_5') {
        SetConfig('banner_left_2_5', "");
        unlink('../../layout/images/logo/banner_left_2/' . $banner_left_2_5);
    }
    header("location:./?show=config");
}

$content = $xtemplate->replace($content, array(
    'colorweb' => $arr_lang['colorweb'],
    'checked_spam' => $checked_spam,
    'txtmailhost' => $txtmailhost,
    'mail_port' => $mail_port,
    'checked' => $active,
    'title' => 'Cấu hình website',
    'txtpassword' => $txtpassword,
    'txemail' => $txemail,
    //'banner' => $banner,
    'banner_1' => $banner_1,
    'banner_2' => $banner_2,
    'banner_3' => $banner_3,
    'banner_4' => $banner_4,
    'banner_5' => $banner_5,
    'banner_left_1_1' => $banner_left_1_1,
    'banner_left_1_2' => $banner_left_1_2,
    'banner_left_1_3' => $banner_left_1_3,
    'banner_left_1_4' => $banner_left_1_4,
    'banner_left_1_5' => $banner_left_1_5,
    'banner_left_2_1' => $banner_left_2_1,
    'banner_left_2_2' => $banner_left_2_2,
    'banner_left_2_3' => $banner_left_2_3,
    'banner_left_2_4' => $banner_left_2_4,
    'banner_left_2_5' => $banner_left_2_5,
    'logo' => $logo,
    'rss' => $rss,
    'myhexcode' => $myhexcode,
    'header' => $header,
    'description' => $description,
    'mail_admin' => $mail_admin,
    'body' => $body,
    'background' => 'background-color:#' . $myhexcode,
    'error' => $error,
    'error_1' => $error_1,
    'error_2' => $error_2,
    'href_banner' => $href_banner,
    'href_banner_2' => $href_banner_2,
    'href_banner_3' => $href_banner_3,
    'href_banner_4' => $href_banner_4,
    'href_banner_5' => $href_banner_5,
    'introduce' => $introduce
        ));

$script .= $xtemplate->get_block_from_str($content, "SCRIPT");
$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>