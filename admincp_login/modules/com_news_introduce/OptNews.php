<?php

$error = '';

//KIEM TRA BAI THEM HOAC SUA KHONG DC TRUNG TEN BAI DA TON TAI TRONG "TRO GIUP"
function CheckTonTaiBaiViet($news_key) {
    $sql = "SELECT newsintroduce_name, 
					   newsintroduce_key,
					   newsintroduce_catalogue 
				FROM 
					   news_introduce 
				WHERE  newsintroduce_key = '" . $news_key . "'";

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
    $title = 'Thêm giới thiệu';

    $id = intval($_GET['id']);

    $btn = $arr_lang['add'];

    $panel = $title;

    $update = 0;

    if (check_id_news_introduce($id)) { //fill data on textbox : check_valid($id)
        $update = 1;

        $btn = $arr_lang['update'];

        $panel = 'Cập nhật giới thiệu';

        $title = $panel;

        // LAY news_key de show trong text box
        $sql = "SELECT newsintroduce_name,
						   newsintroduce_key,
						   newsintroduce_catalogue,						   
						   newsintroduce_content
					FROM   news_introduce 
					WHERE  newsintroduce_id = '" . $id . "' AND languageintroduce='" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql);

        $row = $mysql->loadOneRow();

        $news_title = output($row['newsintroduce_name']);

        $categories_id = intval($row['newsintroduce_catalogue']);

        $detail = output($row['newsintroduce_content']);

        $old_news_key = $row['newsintroduce_key'];
    }

    //KIEM TRA BAI THEM HOAC SUA CO TRUNG TEN VOI TEN CUA BAI NAO DA TON TAI KHONG

    if (isset($_POST['btnadd'])) {
        $news_title = output($_POST['txtname']);

        $categories_id = $_POST['catlist'];

        $news_key = vitoen($news_title, '-');

        $detail = output($_POST['txtdetail']);

        if (!isset($news_title{4}))
            $error.= '<li>Tên bài giới thiệu quá ngắn</li>';

        if (!isset($categories_id{0}))
            $error.= '<li>Bạn chưa chọn danh mục tin giới thiệu</li>';

        if (!isset($news_key{0})) {
            $error.= '<li> Chưa có tên tin giới thiệu </li>';
        }

        if (!isset($detail{10}))
            $error.='<li>Nội dung bài giới thiệu quá ngắn</li>';

        // TRUONG HOP THEM 			

        if (CheckTonTaiBaiViet($news_key) == true && $update != 1) {

            $error.= '<li> Tên bài viết đã tồn tại, vui lòng chọn tên khác </li>';
        }

        // TRUONG HOP UPDATE 

        if (CheckTonTaiBaiViet($news_key) == true && $update == 1) {
            if ($news_key == $old_news_key) {
                
            } else
                $error.= '<li> Tên link đã tồn tại, vui lòng chọn tên khác </li>';
        }

        $categories_id = intval($_POST['catlist']);

        if (empty($error)) {
            if ($update == 1) { //UPDATE
                $sql = "UPDATE 	news_introduce 
							SET		newsintroduce_key ='" . $news_key
                        . "',newsintroduce_name='" . input($news_title)
                        . "',lastintroduce_modified=" . time()
                        . ",newsintroduce_content='" . input($detail)
                        . "',newsintroduce_catalogue=" . $categories_id . "																	
							WHERE newsintroduce_id = '" . $id . "'";
            } else if ($update != 1) { // INSERT
                $sql = "INSERT INTO news_introduce(  newsintroduce_key,
													 	 newsintroduce_name,
														 dateintroduce_added,
														 newsintroduce_content,
														 newsintroduce_catalogue,
														 languageintroduce) 
												VALUES ('" . $news_key . "','"
                        . input($news_title) . "',"
                        . time() . ",'"
                        . input($detail) . "',"
                        . $categories_id . ",'"
                        . $_SESSION['lag'] . "')";
            }

            $mysql->setQuery($sql);

            $mysql->query();

            $_SESSION['timeout'] = time();

            if ($_GET['order'] != '') {
                header('location:./?show=newsList_introduce&p=' . $_GET['p'] . '&order=' . $_GET['order']);
            } else {
                header('location:./?show=newsList_introduce&p=' . $_GET['p']);
            }
        } else {
            $error = '<ul class=err><b>' . $arr_lang['error'] . '</b>' . $error . '</ul>';
        }
    }

    $xtemplate->path = 'com_news_introduce/';

    $content = $xtemplate->load('OptNews');

    $content = $xtemplate->replace($content, array(
        'error' => $error,
        'help_list' => catlist_introduce($categories_id), // admincp/include/function_admin.php						
        'panel_add_update_product' => $panel,
        'news_key' => 'Link',
        'news_title' => 'Tiêu đề',
        'news_detail' => 'Chi tiết giới thiệu',
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
    if ($_GET['order'] != '') {
        header('location:./?show=newsList_introduce&p=' . $_GET['p'] . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=newsList_introduce&p=' . $_GET['p']);
    }
}
?>