<?php

$error = '';

$text_disabled = '';

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
    $sql = "select news_name news_key from news where news_key = '" . $news_key . "'";

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
    $help_flag = 0;

    $opt = 0;

    //KHONG CHO HIEN THI DANH SACH: PHUONG THUC VAN CHUYEN ... TRONG TRANG "DANH SACH TIN TUC"

    if (($_GET['opt'] == 0) || isset($_POST['order']) && $_POST['opt'] == 0 || ($_GET['opt'] == 1)) {
        $help_flag = 0;

        $opt = 1;

        //Khong cho phep hien thi thong tin nay

        $style_kind = 'style="display: none;"';

        $source_display = 'style="display: none;"';
    }

    //KHONG CHO HIEN THI DANH SACH CÁC LOẠI: TRUYEN , THIEP DIEN TU VA UP HINH ANH TRONG "TIN TUC CHUNG"

    if (isset($_GET['order']) && $_GET['opt'] == 1) {
        $help_flag = 0;

        $opt = 3;

        //Khong cho phep hien thi thong tin nay

        $style_display = 'style="display: none;"';

        $style_img = 'style="display: none;"';

        $style_display_add_button = 'style="display: block;"';

        $source_display = 'style="display: none;"';

        $news_key_discription = 'style="display: none;"';

        $display_img = 'style="display: none;"';

        $style_discription = 'style="display: none;"';

        $scipt_editor = "";
    }

    //KHONG CHO HIEN THI DANH SACH CÁC LOẠI: TRUYEN , THIEP DIEN TU VA UP HINH ANH TRONG "TRO GIUP"

    if ((isset($_GET['opt']) && $_GET['opt'] == 2) || isset($_POST['opt']) && $_POST['opt'] == 2) {

        $help_flag = 1;

        $opt = 2;

        //Khong cho phep hien thi thong tin nay

        $style_display = 'style="display: none;"';

        $style_img = 'style="display: none;"';

        $style_discription = 'style="display: none;"';

        $display_img = 'style="display: none;"';

        $scipt_editor = "";
    }

    $title = 'Thêm tin tức';

    $id = intval($_GET['id']);

    $btn = $arr_lang['add'];

    $panel = $title;

    $imagesrc = _STYLE_IMG . 'noimages.gif';

    $update = 0;

    //VI TRI THEM
    $catalogue = -1;

    if (check_id_news($id)) { //fill data on textbox : check_valid($id)
        $update = 1;

        $btn = $arr_lang['update'];

        $panel = 'Cập nhật tin tức';

        $title = $panel;

        // LAY news_key de show trong text box
        $sql = "SELECT news_name,news_key,news_image,news_catalogue,
						   news_source,news_shortcontent,news_content,
						   news_ordered,resource,author,translator,
						   title_page, meta_description, meta_keyword
					FROM news 
					WHERE news_id = '" . $id . "' and language='" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql);

        $row = $mysql->loadOneRow();

        $news_title = output($row['news_name']);

        //VI TRI THEM
        $catalogue = $row['news_catalogue'];

        if (!empty($row['news_image'])) {
            $imagesrc = _UPLOAD_IMG_NEWS . $row['news_image'];

            $ImgDel = "<img src='" . _STYLE_IMG . "delete.gif'>";

            $ImgThumb = "<img src='" . _STYLE_IMG . "piconover.gif'>";
        }

        $source = output($row['news_source']);

        $decription = output($row['news_shortcontent']);

        $categories_id = $row['news_catalogue'];

        $detail = output($row['news_content']);

        $txttranslator = output($row['translator']);

        $txtauthor = output($row['author']);

        $txttitle_page = output($row['title_page']);

        $txtmeta_description = output($row['meta_description']);

        $txtmeta_keyword = output($row['meta_keyword']);

        $detail2 = output($row['resource']);

        // VI TRI THEM THU TU

        $news_ordered = $row['news_ordered'];

        //VI TRI LAY DU LIEU  news_key

        $news_key = $row['news_key'];

        $old_news_key = $row['news_key'];

        if ((int) $categories_id == 30) {
            $text_disabled = 'disabled';
        } else if ((int) $categories_id == 31) {
            $text_disabled = 'disabled';
        } else if ((int) $categories_id == 32) {
            $text_disabled = 'disabled';
        } else if ((int) $categories_id == 33) {
            $text_disabled = 'disabled';
        }
    }

    //KIEM TRA BAI THEM HOAC SUA CO TRUNG TEN VOI TEN CUA BAI NAO DA TON TAI KHONG

    if (isset($_POST['btnadd'])) {

        $news_title = output($_POST['txtname']);

        $news_key = vitoen($news_title, '-');

        $image = '';

        $source = output($_POST['txtsource']);

        $categories_id = $_POST['catlist'];

        $decription = output($_POST['decription']);

        $detail = output($_POST['txtdetail']);

        $translator = $_POST['txttranslator'];

        $author = $_POST['txtauthor'];

        $txttitle_page = $_POST['txttitle_page'];

        $txtmeta_description = $_POST['txtmeta_description'];

        $txtmeta_keyword = $_POST['txtmeta_keyword'];

        $linkReference = $_POST['txtdetail2'];

        // VI TRI THEM CHO THU TU

        $test_news_ordered = $_POST['txtsource'];

        $news_ordered = (int) $_POST['txtsource'];

        // VI TRI THEM CHO news_key

        $news_key = $_POST['txtnews_key'];

        if (!isset($categories_id{0}))
            $error.= '<li>Bạn chưa chọn danh mục tin tức</li>';

        if (!isset($news_title{4}))
            $error.= '<li>Tiêu đề tin tức quá ngắn</li>';

        if (!isset($detail{19}))
            $error.='<li>Nội dung tin tức quá ngắn</li>';

        // KIEM TRA VU THEM news_key va news_ordered

        if ((isset($_GET['opt']) && $_GET['opt'] == 2) || isset($_POST['opt']) && $_POST['opt'] == 2) {
            if (!isset($test_news_ordered{0}))
                $error.= '<li>Chưa có thứ tự</li>';
        }

        if (!isset($news_key{0})) {
            if ($_POST['helplist'] == 30) {
                
            } else if ($_POST['helplist'] == 31) {
                
            } else if ($_POST['helplist'] == 32) {
                
            } else if ($_POST['helplist'] == 33) {
                
            } else
                $error.= '<li> Chưa có tên đường link </li>';
        }

        //KIEM TRA DUONG LINK DA TON TAI
        // TRUONG HOP THEM BAI VIET				

        if (CheckTonTaiBaiViet($news_key) == true && $update != 1) {

            $error.= '<li> Tên đường link đã tồn tại, vui lòng chọn tên khác </li>';
        }

        // TRUONG HOP UPDATE BAI VIET
        if (CheckTonTaiBaiViet($news_key) == true && $update == 1) {

            if ($news_key == $old_news_key) {
                
            } else
                $error.= '<li> Tên link đã tồn tại, vui lòng chọn tên khác </li>';
        }

        if ($news_key == 'dich-vu-van-chuyen' || $news_key == 'cach-thuc-thanh-toan' || $news_key == 'huong-dan-mua-hang' || $news_key == 'cau-hoi-thuong-gap') {
            $error.= '<li> Tên link "' . $news_key . '" đã được sử dụng trong trường hợp đặc biệt!
														Vui lòng chọn tên khác </li>';
        }


        if ($_FILES ["image"]["name"]) {
            //KIEM TRA FILE ANH
            if (!checkExtentFile($_FILES["image"]["name"], $imgExtent)) {
                $error.='<li>' . $arr_lang['err_checkExtent'] . ' ' . str_replace('|', ',', $imgExtent) . '</li>';
            } else {
                //KIEM TRA DUNG LUONG ANH
                if ($_FILES["image"]["size"] > $imgSize) {
                    $error.='<li>' . $arr_lang['err_size'] . ' > ' . formatsize($imgSize) . '</li>';
                }
            }
        } else {
            $image = 'default.jpg';
        }

        if (empty($error)) {
            // VI TRI SUA CHI DANH CHO UPDATE
            if ($update == 1 && $help_flag != 1) { //Update cho DANH SACH TIN TUC
                //VI TRI SUA CHO DUONG LINK				
                $sql = "UPDATE news 
							 SET news_key ='" . $news_key
                        . "',news_name='" . input($news_title)
                        . "',news_source='" . $source
                        . "',last_modified=" . time()
                        . ",news_shortcontent='" . input($decription)
                        . "',news_content='" . input($detail)
                        . "',news_catalogue='" . $categories_id
                        . "',help_flag = " . $help_flag
                        . ",resource='" . $linkReference
                        . "', author='" . $author
                        . "', title_page='" . $txttitle_page
                        . "', meta_description='" . $txtmeta_description
                        . "', meta_keyword='" . $txtmeta_keyword
                        . "', translator='" . $translator . "' 
							WHERE news_id = '" . $id . "'";
            }

            //VI TRI THEM: KHI CHINH SUA TRONG "TRO GIUP"
            else if ($update == 1 && $help_flag == 1) { //update
                $catalogue_id = $_POST['helplist'];

                if ($catalogue_id == 30) {
                    //VAN CHUYEN, CATALOGUE = 30
                    $sql = "UPDATE news 
								SET news_key ='" . "dich-vu-van-chuyen"
                            . "',news_name='" . input($news_title)
                            . "',news_source='" . $source
                            . "',last_modified=" . time()
                            . ",news_shortcontent='" . input($decription)
                            . "',news_content='" . input($detail)
                            . "',news_catalogue='" . $catalogue_id
                            . "', help_flag = " . $help_flag
                            . ", news_ordered = " . $news_ordered . " 
								WHERE news_id = '" . $id . "'";

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 0 
										WHERE idKindHelp = '" . $catalogue . "'";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 1 
										WHERE idKindHelp = 30";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                } else if ($catalogue_id == 31) {
                    //THANH TOAN
                    $sql = "UPDATE news 
								SET news_key ='" . "cach-thuc-thanh-toan"
                            . "',news_name='" . input($news_title)
                            . "',news_source='" . $source
                            . "',last_modified=" . time()
                            . ",news_shortcontent='" . input($decription)
                            . "',news_content='" . input($detail)
                            . "',news_catalogue='" . $catalogue_id
                            . "', help_flag = " . $help_flag
                            . ", news_ordered = " . $news_ordered . " 
								WHERE news_id = '" . $id . "'";

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 0 
										WHERE idKindHelp = '" . $catalogue . "'";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 1 
										WHERE idKindHelp = 31";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                } else if ($catalogue_id == 32) {
                    //CAU HOI THUONG GAP
                    $sql = "UPDATE news 
								SET news_key ='" . "cau-hoi-thuong-gap"
                            . "',news_name='" . input($news_title)
                            . "',news_source='" . $source
                            . "',last_modified=" . time()
                            . ",news_shortcontent='" . input($decription)
                            . "',news_content='" . input($detail)
                            . "',news_catalogue='" . $catalogue_id
                            . "', help_flag = " . $help_flag
                            . ", news_ordered = " . $news_ordered . " 
								WHERE news_id = '" . $id . "'";

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 0 
										WHERE idKindHelp = '" . $catalogue . "'";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 1 
										WHERE idKindHelp = 32";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                } else if ($catalogue_id == 33) {
                    //HUONG DAN MUA HANG					
                    $sql = "UPDATE news 
								SET news_key ='" . "huong-dan-mua-hang"
                            . "',news_name='" . input($news_title)
                            . "',news_source='" . $source
                            . "',last_modified=" . time()
                            . ",news_shortcontent='" . input($decription)
                            . "',news_content='" . input($detail)
                            . "',news_catalogue='" . $catalogue_id
                            . "', help_flag = " . $help_flag
                            . ", news_ordered = " . $news_ordered . " 
								WHERE news_id = '" . $id . "'";

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 0 
										WHERE idKindHelp = '" . $catalogue . "'";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 1 
										WHERE idKindHelp = 33";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                }

                // Truong hop 34
                else {
                    // VI TRI CHINH SUA DUONG LINK
                    $sql = "UPDATE news 
								SET news_key ='" . $news_key
                            . "',news_name='" . input($news_title)
                            . "',news_source='" . $source
                            . "',last_modified=" . time()
                            . ",news_shortcontent='" . input($decription)
                            . "',news_content='" . input($detail)
                            . "',news_catalogue='" . $catalogue_id
                            . "', help_flag = " . $help_flag
                            . ", news_ordered = " . $news_ordered . " 
								WHERE news_id = '" . $id . "'";

                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 0 
										WHERE idKindHelp = '" . $catalogue . "'";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                }
            }

            // VI TRI SUA CHO INSERT "TRO GIUP"
            else if ($update != 1 && $help_flag == 1) {
                $catalogue_id = $_POST['helplist'];

                if ($catalogue_id == 30) {
                    // VAN CHUYEN, CATALOGUE = 30
                    $sql = "INSERT INTO news(news_key,news_name,news_source,date_added,
												 news_shortcontent,news_content,news_catalogue,
												 language,help_flag,news_ordered) 
										 VALUES ('dich-vu-van-chuyen','" . input($news_title) . "','" . $source . "'," . time() . ",'"
                            . input($decription) . "','" . input($detail) . "'," . $catalogue_id . ",'"
                            . $_SESSION['lag'] . "'," . $help_flag . "," . $news_ordered . ")";

                    // DANH DAU FLAG TRONG KIND HELP
                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 1 
										WHERE idKindHelp = 30";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                } else if ($catalogue_id == 31) {
                    //THANH TOAN
                    $sql = "INSERT INTO news(news_key,news_name,news_source,
												date_added,news_shortcontent,
												news_content,news_catalogue,
												language,help_flag
												,news_ordered) 
									      VALUES('cach-thuc-thanh-toan','" . input($news_title) . "','" . $source . "',"
                            . time() . ",'" . input($decription) . "','"
                            . input($detail) . "'," . $catalogue_id . ",'"
                            . $_SESSION['lag'] . "'," . $help_flag . ","
                            . $news_ordered . ")";

                    // DANH DAU FLAG TRONG KIND HELP
                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 1 
										WHERE idKindHelp = 31";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                } else if ($catalogue_id == 32) {
                    //CAU HOI THUONG GAP
                    $sql = "INSERT INTO news(news_key,news_name,news_source,
												date_added,news_shortcontent,news_content,
												news_catalogue,language,help_flag,
												news_ordered) 
										  VALUES('cau-hoi-thuong-gap','" . input($news_title) . "','" . $source . "',"
                            . time() . ",'" . input($decription) . "','" . input($detail) . "',"
                            . $catalogue_id . ",'" . $_SESSION['lag'] . "'," . $help_flag . ","
                            . $news_ordered . ")";

                    // DANH DAU FLAG TRONG KIND HELP
                    $sqlKindHelp = "UPDATE KindHelp 
										SET flag = 1 
										WHERE idKindHelp = 32";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                } else if ($catalogue_id == 33) {
                    //THANH TOAN
                    $sql = "INSERT INTO news(news_key,news_name,news_source,
												 date_added,news_shortcontent,news_content,
												 news_catalogue,language,help_flag,
												 news_ordered) 
										  VALUES('huong-dan-mua-hang','" . input($news_title) . "','" . $source . "',"
                            . time() . ",'" . input($decription) . "','" . input($detail) . "',"
                            . $catalogue_id . ",'" . $_SESSION['lag'] . "'," . $help_flag . ","
                            . $news_ordered . ")";

                    // DANH DAU FLAG TRONG KIND HELP
                    $sqlKindHelp = "UPDATE KindHelp
										SET flag = 1
										WHERE idKindHelp = 33";

                    $mysql->setQuery($sqlKindHelp);

                    $mysql->query();
                } else {
                    // VI TRI SUA CHO DUONG LINK
                    $sql = "INSERT INTO news(news_key,news_name,news_source,
											     date_added,news_shortcontent,news_content,
												 news_catalogue,language,help_flag,
												 news_ordered) 
										 VALUES ('" . $news_key . "','" . input($news_title) . "','" . $source . "',"
                            . time() . ",'" . input($decription) . "','" . input($detail) . "',"
                            . $catalogue_id . ",'" . $_SESSION['lag'] . "'," . $help_flag . ","
                            . $news_ordered . ")";
                }
            }

            //VI TRI SUA CHO INSERT KHONG PHAI LA PHAN TRO GIUP
            else if ($update != 1 && $help_flag != 1) {
                //VI TRI SUA CHO THEM LINK
                $sql = "INSERT INTO news(news_key,news_name,news_source,
											 date_added,news_shortcontent,news_content,
											 news_catalogue,language,help_flag,
											 title_page,meta_description,meta_keyword,
											 resource,author,translator) 
								      VALUES('" . $news_key . "','" . input($news_title) . "','" . $source . "',"
                        . time() . ",'" . input($decription) . "','" . input($detail) . "',"
                        . $categories_id . ",'" . $_SESSION['lag'] . "'," . $help_flag . ",'"
                        . $txttitle_page . "','" . $txtmeta_description . "','" . $txtmeta_keyword . "','"
                        . $linkReference . "','" . $author . "','" . $translator . "')";
            }

            $mysql->setQuery($sql);

            if ($mysql->query()) {

                $lastId = mysql_insert_id();

                if ($image != "default.jpg") {

                    if ($update == 1) {//update image
                        if (file_exists($imagesrc)) {

                            @unlink($imagesrc);

                            @unlink(_UPLOAD_IMG_NEWS_THUMB . $row['news_image']);
                        }

                        $lastId = $id;
                    }

                    //Resize ảnh và di chuyển vào thư mục

                    $image = renameFile($_FILES["image"]["name"], 'p-' . input($news_key) . '-' . $lastId); //Đổi tên hình

                    move_uploaded_file($_FILES ["image"]["tmp_name"], _UPLOAD_IMG_NEWS_THUMB . $image);

                    imagejpeg(resize(_UPLOAD_IMG_NEWS_THUMB . $image, $ImgW), _UPLOAD_IMG_NEWS . $image);

                    $sql = "update news set news_image = '" . $image . "' where news_id = '" . $lastId . "'";

                    $mysql->setQuery($sql);

                    $mysql->query();
                }

                if ($update == 1) {
                    $lastId = $id;
                }

                $catalogue_id = $_POST['helplist'];
            }

            $_SESSION['timeout'] = time();

            // VI TRI THEM			
            // SAU KHI CAP NHAT VA INSERT THI QUAY TRO LAI DUNG TRANG LOAI DANH SACH TIN TUC NAO				

            if ($opt == 1) {
                if ($_GET['order'] != '') {
                    header('location:./?show=newsList&p=' . $_GET['p'] . '&order=' . $_GET['order']);
                } else {
                    header('location:./?show=newsList&p=' . $_GET['p']);
                }
            } else if ($opt == 2) {
                header('location:./?show=newsList&opt=2');
            } else if ($opt == 3) {
                header('location:./?show=newsList_opt_1');
            }
        } else {
            $error = '<ul class=err><b>' . $arr_lang['error'] . '</b>' . $error . '</ul>';
        }
    }

    $xtemplate->path = 'com_news_general/';

    $content = $xtemplate->load('OptNews');

    //VI TRI THEM		
    //Chinh sua: Dich vu van chuyen
    if ($catalogue == 30)
        $help_id = 0;

    //Chinh sua: Cach thuc thanh toan
    else if ($catalogue == 31)
        $help_id = 1;

    //Chinh sua: Cau hoi thuong gap
    else if ($catalogue == 32)
        $help_id = 2;

    //Chinh sua: Huong dan mua hang
    else if ($catalogue == 33)
        $help_id = 3;

    //Chinh sua: Khac ...
    else if ($catalogue == 34)
        $help_id = 4;
    else
        $help_id = 5;


    $content = $xtemplate->replace($content, array(
        'error' => $error,
        'cat_list' => cat_news_list($categories_id), // admincp/include/function_admin.php
        //VI TRI THEM
        'help_list' => helplist($help_id), // admincp/include/function_admin.php
        'imagesrc' => $imagesrc,
        'ImgThumb' => $ImgThumb,
        'ImgDel' => $ImgDel,
        'panel_add_update_product' => $panel,
        'news_title' => 'Tiêu đề',
        'image' => $arr_lang['image'],
        'source' => 'Nguồn',
        'txtsource' => $source,
        'product_of_catalogue' => $arr_lang['product_of_catalogue'],
        'decription' => $arr_lang['decription'],
        'news_detail' => 'Chi tiết tin tức',
        'linkReference' => 'Link tham khảo',
        'translator' => 'Người dịch',
        'author' => 'Từ khóa bài viết',
        'reset' => $arr_lang['reset'],
        'btn' => $btn,
        'txtname' => $news_title,
        'txtprice' => $price,
        'txtdecripton' => $decription,
        'txtdetail' => $detail,
        'style_display' => $style_display,
        //VI TRI THEM
        'style_kind_display' => $style_kind,
        'style_img' => $style_img,
        'style_discription' => $style_discription,
        'style_display_add_button' => $style_display_add_button,
        'source_display' => $source_display,
        // VI TRI THEM THU TU
        'news_ordered' => $news_ordered,
        'news_key_discription' => $news_key_discription,
        // VI TRI THEM DUONG LINK
        'news_key' => 'Đường link',
        'news_keys' => $news_key,
        'text_disabled' => $text_disabled,
        'display_img' => $display_img,
        'scipt_editor' => $scipt_editor,
        'txttranslator' => $txttranslator,
        'txtauthor' => $txtauthor,
        'txtdetail2' => $detail2,
        'txttitle_page' => $txttitle_page,
        'txtmeta_description' => $txtmeta_description,
        'txtmeta_keyword' => $txtmeta_description,
    ));

    $script = $xtemplate->get_block_from_str($content, "SCRIPT");

    if (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE")) {
        $script .= "<script language=JavaScript src='../inv/scripts/editor.js'></script>";
    } else {

        $script .= "<script language=JavaScript src='../inv/scripts/moz/editor.js'></script>";
    }

    $content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
} else {
    header("location:./?show=newsList");
}
?>