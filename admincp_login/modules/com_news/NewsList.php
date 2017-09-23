<?php

if (isset($_POST['btnSearch'])) {
    $search_key = $_POST['search_name'];
    if (!empty($search_key)) {
        $_SESSION['QUERY_SEARCH'] = " AND news_name LIKE '%" . $search_key . "%' ";
        $_SESSION['QUERY_KEY_SEARCH'] = $search_key;
    } else {
        unset($_SESSION['QUERY_SEARCH']);
        unset($_SESSION['QUERY_KEY_SEARCH']);
    }

    if (!empty($_POST['begin_day']) && !empty($_POST['end_day'])) {
        $_SESSION['begin_day'] = $_POST['begin_day'];
        $_SESSION['end_day'] = $_POST['end_day'];
        $begin_day = input(strtotime($_SESSION['begin_day']), 1);
        $end_day = input(strtotime($_SESSION['end_day']), 1);
        $_SESSION['QUERY_DATE'] = " AND date_added BETWEEN " . $begin_day . " AND " . $end_day;
    } else {
        unset($_SESSION['QUERY_DATE']);
        unset($_SESSION['begin_day']);
        unset($_SESSION['end_day']);
    }
}

if (isset($_POST['memberlist'])) {
    if ($_POST['memberlist'] == 0) {
        unset($_SESSION['QUERY_MEMBER']);
        unset($_SESSION['CAT_MEMBER']);
    } else {
        $_SESSION['CAT_MEMBER'] = $_POST['memberlist'];
        $sql = "SELECT user_name_visible
                    FROM admin_control_user
                    WHERE idadmin_control_user = '" . $_SESSION['CAT_MEMBER'] . "'";
        $mysql->setQuery($sql);
        $result = $mysql->query();
        while ($row = mysql_fetch_assoc($result)) {
            $_SESSION['QUERY_MEMBER'] = " AND translator LIKE '" . $row['user_name_visible'] . "'";
        }
    }
}

if (isset($_POST['categorylibary'])) {
    if ($_POST['categorylibary'] == 0) {
        unset($_SESSION['QUERY_CATEGORY']);
        unset($_SESSION['CAT_ID']);
    } else {
        $news_list = "";
        $_SESSION['CAT_ID'] = $_POST['categorylibary'];
        $sql = "SELECT categorieslibary_id,
                           levellibary
                    FROM categorieslibary
                    WHERE categorieslibary_id = " . $_SESSION['CAT_ID'];
        $mysql->setQuery($sql);
        $categories_list = $mysql->loadOneRow();

        if ($categories_list['levellibary'] == 1) {
            $sql = "SELECT categorieslibary_id
                        FROM categorieslibary
                        WHERE categorieslibary_id = " . $categories_list['categorieslibary_id']
                    . " OR parentlibary_id = " . $categories_list['categorieslibary_id'];
            $mysql->setQuery($sql);
            $categories_list_2 = $mysql->loadAllRow();
            $categories_list_3 = "";
            for ($i = 0; $i < count($categories_list_2); $i++) {
                if ($i != count($categories_list_2) - 1) {
                    $categories_list_3 .= "category_id = " . $categories_list_2[$i]["categorieslibary_id"] . " OR ";
                } else {
                    $categories_list_3 .= "category_id = " . $categories_list_2[$i]["categorieslibary_id"];
                }
            }
            $sql = "SELECT news_id
                        FROM news_category
                        WHERE " . $categories_list_3 . " GROUP BY news_id ";
        } else {
            $sql = "SELECT news_id
                        FROM news_category
                        WHERE category_id = " . $_SESSION['CAT_ID'] . " GROUP BY news_id ";
        }

        $mysql->setQuery($sql);
        $news_list = $mysql->loadAllRow();
        $list_news_id = " AND ( ";
        for ($i = 0; $i < count($news_list); $i++) {
            if ($i != (count($news_list) - 1 )) {
                $list_news_id .= ' news_id = ' . $news_list[$i]['news_id'] . " OR ";
            } else {
                $list_news_id .= ' news_id = ' . $news_list[$i]['news_id'] . " )";
            }
        }
        $_SESSION['QUERY_CATEGORY'] = $list_news_id;
    }
}

if (($_GET['action'] == 'del') && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    delete_img_news($id);
    delete_news($id);

    if ($_GET['order'] != '') {
        header('location:./?show=newsList&p=' . $_GET['p'] . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=newsList&p=' . $_GET['p']);
    }
}

if (isset($_POST['btndel'])) {
    if (count($_POST['chk']) > 0) {
        $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
        delete_img_news($id);
        delete_news($id);
        $sql = "DELETE FROM news_category WHERE news_id IN (" . $id . ")";
        $mysql->setQuery($sql);
        $mysql->query();
        if ($_GET['order'] != '') {
            header('location:./?show=newsList&p=' . $_GET['p'] . '&order=' . $_GET['order']);
        } else {
            header('location:./?show=newsList&p=' . $_GET['p']);
        }
    }
} else if (isset($_POST['btnStatus'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
    Set_status_news_2($id);
    if ($_GET['order'] != "") {
        header('location:./?show=newsList&p=' . $_GET['p'] . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=newsList&p=' . $_GET['p']);
    }
} else if (isset($_POST['btnPublish'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
    Set_publish_news($id);
    if ($_GET['order'] != "") {
        header('location:./?show=newsList&p=' . $_GET['p'] . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=newsList&p=' . $_GET['p']);
    }
}

$title = 'Quản lý tin tức';
$xtemplate->path = 'com_news/';
$content = $xtemplate->load('NewsList');
$code_cats = $xtemplate->get_block_from_str($content, "NEWS");
$p_now = intval($_GET ['p']);
$sql = "SELECT  news_id
            FROM news
            WHERE language ='" . $_SESSION['lag']
        . "' AND menu = 0
                                AND relax = 0" . $_SESSION['QUERY_MEMBER']
        . $_SESSION['QUERY_CATEGORY']
        . $_SESSION['QUERY_SEARCH']
        . $_SESSION['QUERY_DATE'];
$mysql->setQuery($sql);
$mysql->query();
$total = $mysql->getNumRows();

$numofpages = $total / $pp;
if ($p_now <= 0) {
    $page = 1;
} else {
    if ($p_now <= ceil($numofpages)) {
        $page = $p_now;
    } else {
        $page = 1;
    }
}

$limitvalue = $page * $pp - ($pp);
switch ($_GET['order']) {
    case 'name':
        $orderby = ' news_name asc';
        break;
    case 'name_desc':
        $orderby = ' news_name desc';
        break;
    case 'catalogue':
        $orderby = ' news_catalogue asc';
        break;
    case 'status':
        $orderby = ' status asc';
        break;
    case 'dateadd':
        $orderby = ' date_added asc';
        break;
    case 'dateadd_desc':
        $orderby = ' date_added desc';
        break;
    case 'datemodifiled':
        $orderby = ' last_modified asc';
        break;
    case 'datemodifiled_desc':
        $orderby = ' last_modified desc';
        break;
    default:
        $orderby = ' date_added desc';
        break;
}

$hide = '';
$opt = 0;
$sql = "SELECT  news_id,
                    news_name,
                    news_image,
                    news_catalogue,
                    upgrade_news_catalogue,
                    status,
                    date_added,
                    last_modified,
                    flag_publisher,
                    date_publisher,
                    news_key
                    FROM news
                    WHERE language ='" . $_SESSION['lag'] . "' AND menu = 0 AND relax = 0"
        . $_SESSION['QUERY_MEMBER']
        . $_SESSION['QUERY_CATEGORY']
        . $_SESSION['QUERY_SEARCH']
        . $_SESSION['QUERY_DATE']
        . " ORDER BY " . $orderby . " limit " . $limitvalue . "," . $pp;
$style_display = "";
$mysql->setQuery($sql);
$row = $mysql->loadAllRow();
$n = count($row);
$temp = '';
for ($i = 0; $i < $n; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';
    $img = $row[$i]['news_image'];
    $imgSrc = _UPLOAD_IMG_NEWS . $img;
    $imgThumb = _UPLOAD_IMG_NEWS_THUMB . $img;
    $img = ($img == '') ? "<img src ='" . _STYLE_IMG . "picoff.gif'>" : "<a href ='$imgThumb'>
                           <img border=0 style=\"cursor:hand\" src=\"" . _STYLE_IMG
            . "picon.gif\" onmouseover=\"this.src='" . _STYLE_IMG
            . "piconover.gif';return overlib('<div><table border=0 cellpadding=2 cellspacing=0><tr><td class=titleImg>Click to Thumbnails</td></tr><tr><td><img src=$imgSrc></a></td></tr></table></div>');\" onmouseout=\"this.src='" . _STYLE_IMG
            . "picon.gif';return nd();\"></a>";
    $flag_publish = "";

    if ($row[$i]['flag_publisher'] == "0") {
        $flag_publish = "Chưa đăng";
    } else if ($row[$i]['flag_publisher'] == "1") {
        $flag_publish = "Đã đăng";
    }

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['news_id'],
        'news_name' => $row[$i]['news_name'],
        'news_catalogue' => upgrade_catlist_libary_2($row[$i]['upgrade_news_catalogue']),
        'news_image' => $img,
        'status' => ($row[$i]['status'] == '1') ? $arr_lang['show'] : $arr_lang['hidden'],
        'date_added' => date('G:i d/m/Y', $row[$i]['date_added']),
        'last_modified' => ($row[$i]['last_modified'] == '') ? '0' : date('G:i d/m/Y', $row[$i]['last_modified']),
        'color' => $color,
        'flag_publish' => $flag_publish,
        'link_preview' => '/doi-song-pets/' . $row[$i]['news_key'] . ".htm"
    ));
}

$content = $xtemplate->assign_blocks_content($content, array("NEWS" => $temp));
$thuocdanhmuc = "Thuộc danh mục";
$date = "<a href = './?show=newsList&order=dateadd&p={p}'style = 'text-decoration:underline'>Thêm (cũ)</a>
             <span>&nbsp&nbsp-&nbsp </span>
             <span>
                <a href = './?show=newsList&order=dateadd_desc&p={p}' style ='text-decoration:underline'>(mới)</a>
             </span>";
$date_modify = "<a href = './?show=newsList&order=datemodifiled&p={p}'style = 'text-decoration:underline'>Sửa (cũ)</a>
                    <span>&nbsp&nbsp-&nbsp </span>
                    <span><a href = './?show=newsList&order=datemodifiled_desc&p={p}' style ='text-decoration:underline'>(mới)</a></span>";
$lag_status = "<a href = './?show=newsList&order=status&p={p}'style='text-decoration:underline'>Trạng thái</a>";
$content = $xtemplate->replace($content, array(
    'thuocdanhmuc' => $thuocdanhmuc,
    'lag_status' => $lag_status,
    'date' => $date,
    'date_modify' => $date_modify,
    'a' => '<a href = "./?show=newsList&order=name&p={p}"style = "text-decoration:underline">Tiêu đề (a->z)</a>
                            <span>&nbsp&nbsp-&nbsp </span>
                            <span><a href = "./?show=newsList&order=name_desc&p={p}"style = "text-decoration:underline">(z->a)</a></span>'
        ));

if ($_SESSION['admin'][0] == 'dinhluyen' || $_SESSION['admin'][0] == 'adminnanapet' || $_SESSION['admin'][0] == 'hapham') {
    $display_publish = "";
    $display_delete = "";
} else {
    $display_publish = "display:none";
    $display_delete = "display:none";
}

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'oderby' => $_GET['order'],
    'page' => page_div("./?show=newsList&p=%d_pg&order="
            . $_GET['order'], "10", ceil($numofpages), $page),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_date_create' => $arr_lang['date_added'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'delete_check' => $arr_lang['del_check'],
    'del_confirm' => $arr_lang['del_confirm'],
    'status' => $status,
    'hide' => $hide,
    'opt' => $opt,
    'style_display' => $style_display,
    'memberuserlist' => memberUserList($_SESSION['CAT_MEMBER']),
    'catlist' => filter_catlist_libary($_SESSION['CAT_ID']),
    'value_search_name' => $_SESSION['QUERY_KEY_SEARCH'],
    'begin_day' => $_SESSION['begin_day'],
    'end_day' => $_SESSION['end_day'],
    'display_publish' => $display_publish,
    'display_delete' => $display_delete
        ));
$script = $xtemplate->get_block_from_str($content, "SCRIPT");
$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>