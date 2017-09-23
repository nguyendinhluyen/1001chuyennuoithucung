<?php

$error = '';

$text_disabled = '';

$help_flag = 1;

$categories_id = -1;

$scipt_editor = '<script>                
                        var oEdit2 = new InnovaEditor("oEdit2");		
                        oEdit2.arrStyle = [["BODY",false,"",""]];				
                        oEdit2.width="660";
                        oEdit2.height="50";
                        oEdit2.features=[
                                "Paragraph","FontName","FontSize","Hyperlink","|",
                                "JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"];		
                        oEdit2.cmdAssetManager="modalDialogShow(\'../assetmanager/assetmanager.php\',640,465)";
                        oEdit2.RENDER(document.getElementById("invdetail2").innerHTML);
                    </script>';

//KIEM TRA BAI THEM HOAC SUA KHONG DC TRUNG TEN BAI DA TON TAI TRONG "TRO GIUP"
function CheckTonTaiBaiViet($news_key) {
    $sql = "SELECT 
                    news_name, 
                    news_key,
                    news_catalogue
                FROM 
                    news
                WHERE news_key = '" . $news_key . "'";

    $mysql = new mysql();

    $mysql->setQuery($sql);

    $mysql->query();

    $row = $mysql->loadOneRow();

    if ($row == 0) {
        return false; // Ko co bai dat ten news_key trung
    }

    return true; // Co bai dat ten news_key trung
}

//KHOANG THOI GIAN DUOC CAP NHAT SAU LAN CAP NHAT TRUOC DO
if ($_SESSION['timeout'] + 0 < time()) {
    $title = 'Thêm tin tức';

    $id = intval($_GET['id']);

    $btn = $arr_lang['add'];

    $panel = $title;

    $update = 0;

    if (check_id_news($id)) { //fill data on textbox : check_valid($id)
        $update = 1;

        $btn = $arr_lang['update'];

        $panel = 'Cập nhật tin tức';

        $title = $panel;

        // LAY news_key de show trong text box
        $sql = "SELECT 
                        news_name,
                        news_key,
                        news_catalogue,						   
                        news_content,
                        resource
                    FROM news 
                    WHERE news_id = '" . $id . "' and language='" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql);

        $row = $mysql->loadOneRow();

        $news_title = output($row['news_name']);

        $categories_id = intval($row['news_catalogue']);

        $detail = output($row['news_content']);

        $detail2 = output($row['resource']);

        $old_news_key = $row['news_key'];

        if ($categories_id == 30 || $categories_id == 31 || $categories_id == 32 || $categories_id == 33) {
            $text_disabled = 'disabled';
        } else {
            $text_disabled = '';
        }
    }

    //KIEM TRA BAI THEM HOAC SUA CO TRUNG TEN VOI TEN CUA BAI NAO DA TON TAI KHONG
    if (isset($_POST['btnadd'])) {
        $news_title = output($_POST['txtname']);

        $categories_id = $_POST['catlist'];

        $news_key = vitoen($news_title, '-');

        $detail = output($_POST['txtdetail']);

        if (!isset($news_title{4})) {
            $error.= '<li>Tiêu đề tin tức quá ngắn</li>';
        }

        if (!isset($categories_id{0})) {
            $error.= '<li>Bạn chưa chọn danh mục tin tức</li>';
        }

        if (!isset($news_key{0})) {
            if ($categories_id == 30 || $categories_id == 31 || $categories_id == 32 || $categories_id == 33) {
                
            } else {
                $error .= '<li> Chưa có tên bài viết </li>';
            }
        }

        if (!isset($detail{10})) {
            $error.='<li>Nội dung bài viết quá ngắn</li>';
        }

        //KIEM TRA DUONG LINK DA TON TAI
        // TRUONG HOP THEM BAI VIET
        if (CheckTonTaiBaiViet($news_key) == true && $update != 1) {
            $error.= '<li> Tên bài viết trợ giúp đã tồn tại, vui lòng chọn tên khác </li>';
        }

        // TRUONG HOP UPDATE BAI VIET
        if (CheckTonTaiBaiViet($news_key) == true && $update == 1) {
            if ($news_key == $old_news_key) {
                
            } else {
                $error.= '<li> Tên bài viết trợ giúp đã tồn tại, vui lòng chọn tên khác </li>';
            }
        }

        /* if($news_key == 'dich-vu-van-chuyen'
          || $news_key == 'cach-thuc-thanh-toan'
          || $news_key == 'huong-dan-mua-hang'
          || $news_key == 'cau-hoi-thuong-gap')
          {
          $error.= '<li> Tên bài viết "'.$news_key.'" đã được sử dụng trong trường hợp đặc biệt!'
          . ' Vui lòng chọn tên khác </li>';
          } */

        $categories_id = intval($_POST['catlist']);

        if (empty($error)) {
            if ($update == 1) { //UPDATE
                if ($categories_id == 30) {
                    $news_key = "dich-vu-van-chuyen";

                    if (CheckTonTaiBaiViet($news_key) == true) {
                        if ($news_key == $old_news_key) {
                            
                        } else {
                            $error.= '<li style="color:red"><b> Lỗi <br/> Dịch vụ vận chuyển đã tồn tại!</b></li>';

                            $text_disabled = 'disabled';
                        }
                    }

                    $sql = "UPDATE news 
                                SET news_key ='" . "dich-vu-van-chuyen"
                            . "',news_name='" . input($news_title)
                            . "',last_modified=" . time()
                            . ",news_content='" . input($detail)
                            . "',news_catalogue=" . $categories_id
                            . ",help_flag = " . $help_flag . "																		
                                WHERE news_id = '" . $id . "'";
                } else if ($categories_id == 31) {
                    $news_key = "cach-thuc-thanh-toan";

                    if (CheckTonTaiBaiViet($news_key) == true) {
                        if ($news_key == $old_news_key) {
                            
                        } else {
                            $error.= '<li style="color:red"><b> Lỗi <br/> Cách thức thanh toán đã tồn tại!</b></li>';

                            $text_disabled = 'disabled';
                        }
                    }

                    $sql = "UPDATE news 
                                SET news_key ='" . "cach-thuc-thanh-toan"
                            . "',news_name='" . input($news_title)
                            . "',last_modified=" . time()
                            . ",news_content='" . input($detail)
                            . "',news_catalogue=" . $categories_id
                            . ",help_flag = " . $help_flag . "																		
                                WHERE news_id = '" . $id . "'";
                } else if ($categories_id == 32) {
                    $news_key = "cau-hoi-thuong-gap";

                    if (CheckTonTaiBaiViet($news_key) == true) {
                        if ($news_key == $old_news_key) {
                            
                        } else {
                            $error.= '<li style="color:red"><b> Lỗi <br/> Câu hỏi thường gặp đã tồn tại!</b></li>';

                            $text_disabled = 'disabled';
                        }
                    }

                    $sql = "UPDATE news 
                                SET news_key ='" . "cau-hoi-thuong-gap"
                            . "',news_name='" . input($news_title)
                            . "',last_modified=" . time()
                            . ",news_content='" . input($detail)
                            . "',news_catalogue=" . $categories_id
                            . ",help_flag = " . $help_flag . "
                                WHERE news_id = '" . $id . "'";
                } else if ($categories_id == 33) {
                    $news_key = "huong-dan-mua-hang";

                    if (CheckTonTaiBaiViet($news_key) == true) {
                        if ($news_key == $old_news_key) {
                            
                        } else {
                            $error.= '<li style="color:red"><b> Lỗi <br/> Huớng dẫn mua hàng đã tồn tại!</b></li>';

                            $text_disabled = 'disabled';
                        }
                    }

                    $sql = "UPDATE news 
                                SET news_key ='" . "huong-dan-mua-hang"
                            . "',news_name='" . input($news_title)
                            . "',last_modified=" . time()
                            . ",news_content='" . input($detail)
                            . "',news_catalogue=" . $categories_id
                            . ",help_flag = " . $help_flag . "																		
                                WHERE news_id = '" . $id . "'";
                }

                // Truong hop khac ...
                else {
                    $sql = "UPDATE news 
                                    SET news_key ='" . $news_key
                            . "',news_name='" . input($news_title)
                            . "',last_modified=" . time()
                            . ",news_content='" . input($detail)
                            . "',news_catalogue=" . $categories_id
                            . ",help_flag = " . $help_flag . "																		
                                    WHERE news_id = '" . $id . "'";
                }
            }
            //INSERT "TRO GIUP"
            else if ($update != 1) {
                if ($categories_id == 30) {
                    $news_key = 'dich-vu-van-chuyen';

                    if (CheckTonTaiBaiViet($news_key) == true) {
                        $error.= '<li style="color:red"><b> Lỗi <br/> Dịch vụ vận chuyển đã tồn tại! </b> </li>';

                        $text_disabled = 'disabled';
                    }

                    $sql = "INSERT INTO news(news_key,
                                                news_name,
                                                date_added,
                                                news_content,
                                                news_catalogue,
                                                language,
                                                help_flag) 
                                VALUES ('dich-vu-van-chuyen','"
                            . input($news_title) . "',"
                            . time() . ",'"
                            . input($detail) . "',"
                            . $categories_id . ",'"
                            . $_SESSION['lag'] . "',"
                            . $help_flag . ")";
                } else if ($categories_id == 31) {
                    $news_key = 'cach-thuc-thanh-toan';

                    if (CheckTonTaiBaiViet($news_key) == true) {
                        $error.= '<li style="color:red"><b> Lỗi <br/> Cách thức thanh toán đã tồn tại!</b></li>';

                        $text_disabled = 'disabled';
                    }

                    $sql = "INSERT INTO news(news_key,
                                                news_name,
                                                date_added,
                                                news_content,
                                                news_catalogue,
                                                language,
                                                help_flag) 
                                VALUES ('cach-thuc-thanh-toan','"
                            . input($news_title) . "',"
                            . time() . ",'"
                            . input($detail) . "',"
                            . $categories_id . ",'"
                            . $_SESSION['lag'] . "',"
                            . $help_flag . ")";
                } else if ($categories_id == 32) {
                    $news_key = 'cau-hoi-thuong-gap';

                    if (CheckTonTaiBaiViet($news_key) == true) {
                        $error.= '<li style="color:red"><b> Lỗi <br/> Câu hỏi thường gặp đã tồn tại!</b></li>';

                        $text_disabled = 'disabled';
                    }

                    $sql = "INSERT INTO news(news_key,
                                                news_name,
                                                date_added,
                                                news_content,
                                                news_catalogue,
                                                language,
                                                help_flag) 
                                VALUES ('cau-hoi-thuong-gap','"
                            . input($news_title) . "',"
                            . time() . ",'"
                            . input($detail) . "',"
                            . $categories_id . ",'"
                            . $_SESSION['lag'] . "',"
                            . $help_flag . ")";
                } else if ($categories_id == 33) {
                    $news_key = 'huong-dan-mua-hang';

                    if (CheckTonTaiBaiViet($news_key) == true) {
                        $error.= '<li style="color:red"><b> Lỗi <br/> Hướng dẫn mua hàng đã tồn tại!</b></li>';

                        $text_disabled = 'disabled';
                    }

                    $sql = "INSERT INTO news(news_key,
                                            news_name,
                                            date_added,
                                            news_content,
                                            news_catalogue,
                                            language,
                                            help_flag) 
                                VALUES ('huong-dan-mua-hang','"
                            . input($news_title) . "',"
                            . time() . ",'"
                            . input($detail) . "',"
                            . $categories_id . ",'"
                            . $_SESSION['lag'] . "',"
                            . $help_flag . ")";
                } else {
                    $sql = "INSERT INTO news(news_key,
                                            news_name,
                                            date_added,
                                            news_content,
                                            news_catalogue,
                                            language,
                                            help_flag) 
                                VALUES ('" . $news_key . "','"
                            . input($news_title) . "',"
                            . time() . ",'"
                            . input($detail) . "',"
                            . $categories_id . ",'"
                            . $_SESSION['lag'] . "',"
                            . $help_flag . ")";
                }
            }

            if (empty($error)) {
                $mysql->setQuery($sql);

                $mysql->query();

                $_SESSION['timeout'] = time();

                header('location:./?show=newsList_help&opt=2');
            }
        } else {
            $error = '<ul class=err><b>' . $arr_lang['error'] . '</b>' . $error . '</ul>';
        }
    }

    if ($categories_id == -1) {
        $text_disabled = 'disabled';

        $news_key = 'huong-dan-mua-hang';
    }

    $xtemplate->path = 'com_news_help/';

    $content = $xtemplate->load('OptNews');

    $content = $xtemplate->replace($content, array(
        'error' => $error,
        //'help_list'                   => helplist($help_id), 		
        'help_list' => catlist_help($categories_id), // admincp/include/function_admin.php						
        'panel_add_update_product' => $panel,
        'news_key' => 'Link',
        'news_title' => 'Tiêu đề',
        'news_detail' => 'Chi tiết trợ giúp',
        'reset' => $arr_lang['reset'],
        'btn' => $btn,
        'txtname' => $news_title,
        'txtdetail' => $detail,
        'text_disabled' => $text_disabled,
    ));

    $script = $xtemplate->get_block_from_str($content, "SCRIPT");

    if (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE")) {
        $script .= "<script language=JavaScript src='../inv/scripts/editor.js'></script>";
    } else {
        $script .= "<script language=JavaScript src='../inv/scripts/moz/editor.js'></script>";
    }

    $content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
} else {
    header("location:./?show=newsList_help&opt=2");
}
?>