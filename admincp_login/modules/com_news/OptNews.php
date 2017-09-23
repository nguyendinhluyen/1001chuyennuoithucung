<?php

$error = '';
$text_disabled = '';
$scipt_editor = '<script>
                        var oEdit2 = new InnovaEditor("oEdit2");
                        oEdit2.arrStyle = [["BODY",false,"","font-family:Arial;font-size:12px;"]];
                        oEdit2.width="660";
                        oEdit2.height="50";
                        oEdit2.features=["FontName","FontSize","Hyperlink","|","Clean",
                                        "JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"];
                        oEdit2.cmdAssetManager="modalDialogShow(\'../assetmanager/assetmanager.php\',640,465)";
                        oEdit2.RENDER(document.getElementById("invdetail2").innerHTML);
                    </script>';

function CheckTonTaiBaiViet($news_key) {
    $sql = "SELECT news_name, news_key
                FROM news
                WHERE news_key = '" . $news_key . "'";
    $mysql = new mysql();
    $mysql->setQuery($sql);
    $mysql->query();
    $row = $mysql->loadOneRow();
    if (empty($row)) {
        return false;
    }
    return true;
}

if ($_SESSION['timeout'] + 0 < time()) {
    $title = 'Thêm bài viết';
    $imagesrc = _STYLE_IMG . 'noimages.gif';
    $id = intval($_GET['id']);
    $btn = $arr_lang['add'];
    $panel = $title;
    $update = 0;
    $txttranslator = $_SESSION['admin'][4];
    if (check_id_news($id)) {
        $update = 1;
        $btn = $arr_lang['update'];
        $panel = 'Cập nhật bài viết';
        $title = $panel;

        // Lay news_key de show trong text box
        $sql = "SELECT  news_name,
                            news_key,
                            news_image,
                            upgrade_news_catalogue,
                            news_source,
                            news_shortcontent,
                            news_content,
                            news_ordered,
                            resource,
                            author,
                            translator,
                            title_page,
                            meta_description,
                            status,
                            meta_keyword,
                            date_publisher,
                            flag_publisher
                    FROM news
                    WHERE news_id = '" . $id . "' AND language='" . $_SESSION['lag'] . "'";
        $mysql->setQuery($sql);
        $row = $mysql->loadOneRow();
        $news_title = output($row['news_name']);
        if (!empty($row['news_image'])) {
            $imagesrc = _UPLOAD_IMG_NEWS . $row['news_image'];
        }
        $source = output($row['news_source']);
        $decription = output($row['news_shortcontent']);
        $categories_id = $row['upgrade_news_catalogue'];
        $detail = output($row['news_content']);
        $txttranslator = output($row['translator']);
        $txtauthor = output($row['author']);
        $txttitle_page = output($row['title_page']);
        $txtmeta_description = output($row['meta_description']);
        $txtmeta_keyword = output($row['meta_keyword']);
        $detail2 = output($row['resource']);
        $date_publisher = output($row['date_publisher']);
        $current_day_publisher = output($row['date_publisher']);
        $old_news_key = $row['news_key'];
        $status_update = $row['status'];
        $current_publisher = $row['flag_publisher'];

        // Only superadmin can change date publish
        if ($_SESSION['admin'][0] == "dinhluyen" || $_SESSION['admin'][0] == "nanapet" || $_SESSION['admin'][0] == "hapham" || $_SESSION['admin'][0] == "annhy" || $_SESSION['admin'][0] == "bichngan") {
            $current_publisher = "0";
        }
        // Get value of relation
        $sql = "SELECT id_news, id_product
                    FROM relation_news_product
                    WHERE id_news = '" . $id . "'";

        $mysql->setQuery($sql);
        $row = $mysql->loadAllRow();
        $n = count($row);
        $product_list_update = "";
        for ($i = 0; $i < $n; ++$i) {
            $sql = "SELECT products_name, products_id
                        FROM products
                        WHERE products_id = '" . $row[$i]['id_product'] . "'";
            $mysql->setQuery($sql);
            $rowProduct = $mysql->loadAllRow();
            $product_list_update .= '<li style="line-height: 25px" id="item' . $rowProduct[0]['products_id']
                    . '" value = "' . $rowProduct[0]['products_id'] . '">'
                    . '<table><tr><td> <input type="checkbox" checked onclick="return false" name="itemProduct[]" id="'
                    . $rowProduct[0]['products_id'] . '" value="'
                    . $rowProduct[0]['products_id'] . '"></td><td>'
                    . $rowProduct[0]['products_name']
                    . '</td><td><span style="color:red; cursor:pointer" onclick ="deleteItem(\'#item' . $rowProduct[0]['products_id']
                    . '\');"> Xóa</span></td></tr></table><li>';
        }
    }
    if (isset($_POST['btnadd'])) {
        $news_title = output($_POST['txtname']);
        $news_key = vitoen($news_title, '-');
        $image = '';
        $source = output($_POST['txtsource']);
        $date_publisher = output($_POST['publish_day']);
        //$categories_id = $_POST['catlist'];
        $categories_id = ",";
        $categories_id .= (count($_POST['option']) > 0) ? implode(',', $_POST['option']) : '';
        $categories_id .= ",";
        $decription = output($_POST['decription']);
        $detail = output($_POST['txtdetail']);
        //$translator = $_POST['txttranslator'];
        $translator = $_SESSION['admin'][4];
        $author = $_POST['txtauthor'];
        $txttitle_page = $_POST['txttitle_page'];
        $txtmeta_description = $_POST['txtmeta_description'];
        $txtmeta_keyword = $_POST['txtmeta_keyword'];
        $linkReference = $_POST['txtdetail2'];
        $linkReference = str_replace("'", "\'", $linkReference);
        $news_ordered = (int) $_POST['txtsource'];
        if (empty($categories_id)) {
            $error.= '<li>Bạn chưa chọn danh mục bài viết</li>';
        }
        if (!isset($news_title{4})) {
            $error.= '<li>Tên bài viết quá ngắn</li>';
        }
        if (!isset($detail{19})) {
            $error.='<li>Nội dung bài viết quá ngắn</li>';
        }
        if (empty($date_publisher)) {
            $error.= '<li>Bạn chưa chọn ngày đăng bài trên website</li>';
        }

        $sql = "SELECT news_id FROM news WHERE date_publisher = '" . $date_publisher . "'";
        $mysql->setQuery($sql);
        $row = $mysql->loadAllRow();

        if (count($row) == 2 && $update != 1) {
            $error.= '<li>Ngày ' . $date_publisher . ' đã có 2 bài đăng ký. Vui lòng chọn ngày khác!</li>';
        } else if (count($row) == 2 && $update == 1) {
            if ($current_day_publisher !== $date_publisher) {
                $error.= '<li>Ngày ' . $date_publisher . ' đã có 2 bài đăng ký. Vui lòng chọn ngày khác!</li>';
            }
        }

        // Check news_key 						
        if (!isset($news_key{0})) {
            $error.= '<li> Chưa có tên bài viết </li>';
        }
        // Check link 
        // Insert
        if (CheckTonTaiBaiViet($news_key) == true && $update != 1) {
            $error.= '<li> Tên bài viết đã tồn tại, vui lòng chọn tên khác </li>';
        }
        // Update
        if (CheckTonTaiBaiViet($news_key) == true && $update == 1) {
            if ($news_key == $old_news_key) {
                
            } else {
                $error.= '<li> Tên bài viết đã tồn tại, vui lòng chọn tên khác </li>';
            }
        }
        if ($news_key == 'dich-vu-van-chuyen' || $news_key == 'cach-thuc-thanh-toan' || $news_key == 'huong-dan-mua-hang' || $news_key == 'cau-hoi-thuong-gap') {
            $error.= '<li> Tên bài viết "' . $news_key . '" đã được sử dụng trong trường hợp đặc biệt!
                Vui lòng chọn tên khác </li>';
        }
        if ($_FILES ["image"]["name"]) {
            //KIEM TRA FILE ANH
            if (!checkExtentFile($_FILES["image"]["name"], $imgExtent)) {
                $error.='<li>' . $arr_lang['err_checkExtent'] . ' ' . str_replace('|', ',', $imgExtent) . '</li>';
            } else {
                //Check image size
                if ($_FILES["image"]["size"] > $imgSize) {
                    $error.='<li>' . $arr_lang['err_size'] . ' > ' . formatsize($imgSize) . '</li>';
                }
            }
        } else {
            $image = 'default.jpg';
        }
        if (empty($error)) {
            // Update news
            if ($update == 1) {
                if ($translator !== "Đình Luyến" && $translator !== "NanaPet" && $translator !== "Hà Phạm"
                        // && $translator !== "Bích Nhi"
                        && $translator !== "Ngân Nguyễn") {
                    $sql = "UPDATE news
                                SET news_key ='" . $news_key . "',
                                    news_name='" . input($news_title) . "',
                                    news_source='" . $source . "',
                                    last_modified = " . time() . ",
                                    news_shortcontent='" . input($decription) . "',
                                    news_content='" . input($detail) . "',
                                    upgrade_news_catalogue= '" . $categories_id . "',
                                    resource='" . $linkReference . "',
                                    date_publisher='" . $date_publisher . "',    
                                    author='" . $author . "',
                                    title_page='" . $txttitle_page . "',
                                    meta_description='" . $txtmeta_description . "',
                                    meta_keyword='" . $txtmeta_keyword . "',
                                    translator='" . $translator . "'
                                WHERE news_id = '" . $id . "'";
                } else {
                    $sql = "UPDATE news
                                SET news_key ='" . $news_key . "',
                                    news_name='" . input($news_title) . "',
                                    news_source='" . $source . "',
                                    last_modified = " . time() . ",
                                    news_shortcontent='" . input($decription) . "',
                                    news_content='" . input($detail) . "',
                                    upgrade_news_catalogue= '" . $categories_id . "',
                                    resource='" . $linkReference . "',
                                    date_publisher='" . $date_publisher . "',
                                    author='" . $author . "',
                                    title_page='" . $txttitle_page . "',
                                    meta_description='" . $txtmeta_description . "',
                                    meta_keyword='" . $txtmeta_keyword . "'
                                WHERE news_id = '" . $id . "'";
                }
            }
            // Insert news
            else if ($update != 1) {
                $sql = "INSERT INTO 
                                news(news_key,
                                    news_name,
                                    news_source,
                                    date_added,
                                    news_shortcontent,
                                    news_content,
                                    upgrade_news_catalogue,
                                    language,
                                    title_page,
                                    meta_description,
                                    meta_keyword,
                                    resource,
                                    date_publisher,
                                    flag_publisher,
                                    author,
                                    translator,
                                    relax)
                         VALUES('" . $news_key . "','"
                        . input($news_title) . "','"
                        . $source . "',"
                        . time() . ",'"
                        . input($decription) . "','"
                        . input($detail) . "','"
                        . $categories_id . "','"
                        . $_SESSION['lag'] . "','"
                        . $txttitle_page . "','"
                        . $txtmeta_description . "','"
                        . $txtmeta_keyword . "','"
                        . $linkReference . "','"
                        . $date_publisher . "',"
                        . "0,'"
                        . $author . "','"
                        . $translator . "',"
                        . "0" . ")";
                $status_update = 1;
            }
            $mysql->setQuery($sql);
            if ($mysql->query()) {
                $lastId = mysql_insert_id();

                // Relation news_product
                $itemProduct = ",";
                $itemProduct .= (count($_POST['itemProduct']) > 0) ? implode(',', $_POST['itemProduct']) : '';
                $itemProduct .= ",";

                if ($image != "default.jpg") {
                    if ($update == 1) {
                        if (file_exists($imagesrc)) {
                            @unlink(_UPLOAD_IMG . $row['products_image']);
                            @unlink(_UPLOAD_IMG_THUMB . $row['products_image']);
                        }
                        $lastId = $id;
                    }
                    //Resize image
                    $image = renameFile($_FILES["image"]["name"], 'p-' . input($news_key) . '-' . $lastId);
                    move_uploaded_file($_FILES ["image"]["tmp_name"], _UPLOAD_IMG_NEWS_THUMB . $image);
                    imagejpeg(resize(_UPLOAD_IMG_NEWS_THUMB . $image, 1000, 1000), _UPLOAD_IMG_NEWS . $image);
                    $sql = "UPDATE news SET news_image = '" . $image . "' WHERE news_id = '" . $lastId . "'";
                    $mysql->setQuery($sql);
                    $mysql->query();
                }
                if ($update == 1) {
                    $lastId = $id;
                    $sql = "DELETE FROM news_category WHERE news_id = " . $lastId;
                    $mysql->setQuery($sql);
                    $mysql->query();
                    // Delete relation table
                    $sql = "DELETE FROM relation_news_product WHERE id_news = " . $lastId;
                    $mysql->setQuery($sql);
                    $mysql->query();
                }

                $categories_id_list = explode(",", $categories_id);
                $sql = "INSERT INTO news_category (news_id, category_id, status) VALUES ";
                for ($i = 0; $i < count($categories_id_list); $i++) {
                    if (!empty($categories_id_list[$i])) {
                        $sql .="(" . $lastId . "," . $categories_id_list[$i] . "," . $status_update . ")";
                        if ($i != (count($categories_id_list) - 2)) {
                            $sql .= ",";
                        }
                    }
                }
                $mysql->setQuery($sql);
                $mysql->query();

                // Add realtion news and product
                $itemProduct_list = explode(",", $itemProduct);
                $sql = "INSERT INTO relation_news_product (id_news, id_product) VALUES ";
                for ($i = 0; $i < count($itemProduct_list); $i++) {
                    if (!empty($itemProduct_list[$i])) {
                        $sql .="(" . $lastId . "," . $itemProduct_list[$i] . ")";
                        if ($i != (count($itemProduct_list) - 2)) {
                            $sql .= ",";
                        }
                    }
                }
                $mysql->setQuery($sql);
                $mysql->query();
                if ($_GET['order'] != '') {
                    header('location:./?show=newsList&p=' . $_GET['p'] . '&order=' . $_GET['order']);
                } else {
                    header('location:./?show=newsList&p=' . $_GET['p']);
                }
            } else {
                $error = '<ul class=err><b>' . 'Thêm mới/Cập nhật thất bại!' . '</b></ul>';
            }
            $_SESSION['timeout'] = time();
        } else {
            $error = '<ul class=err><b>' . $arr_lang['error'] . '</b>' . $error . '</ul>';
        }
    }

    $xtemplate->path = 'com_news/';
    $content = $xtemplate->load('OptNews');
    $content = $xtemplate->replace($content, array(
        'error' => $error,
        'cat_list' => upgrade_catlist_libary($categories_id),
        'imagesrc' => $imagesrc,
        'news_title' => 'Tiêu đề',
        'image' => $arr_lang['image'],
        'source' => 'Nguồn',
        'txtsource' => $source,
        'product_of_catalogue' => $arr_lang['product_of_catalogue'],
        'decription' => $arr_lang['decription'],
        'news_detail' => 'Chi tiết bài viết',
        'linkReference' => 'Link tham khảo',
        'translator' => 'Người dịch',
        'author' => 'Từ khóa bài viết',
        'reset' => $arr_lang['reset'],
        'btn' => $btn,
        'txtname' => $news_title,
        'txtprice' => $price,
        'txtdecripton' => $decription,
        'txtdetail' => $detail,
        'style_img' => $style_img,
        'style_discription' => $style_discription,
        'source_display' => $source_display,
        'news_ordered' => $news_ordered,
        'news_key_discription' => $news_key_discription,
        'text_disabled' => $text_disabled,
        'scipt_editor' => $scipt_editor,
        'txttranslator' => $txttranslator,
        'txtauthor' => $txtauthor,
        'txtdetail2' => $detail2,
        'txttitle_page' => $txttitle_page,
        'txtmeta_description' => $txtmeta_description,
        'txtmeta_keyword' => $txtmeta_keyword,
        'date_publisher' => $date_publisher,
        'current_day' => $date_publisher,
        'current_publisher' => $current_publisher,
        'product_list_update' => $product_list_update
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