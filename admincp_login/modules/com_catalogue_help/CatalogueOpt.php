<?php

$title = $arr_lang['addcat'];
$id = intval($_GET['id']);
$check_do = 'checked';
$btn = $arr_lang['add_cat'];
$panel = $arr_lang['add_cat'];
$update = 0;
if (check_valid_help($id)) {
    $title = $arr_lang['updatecat'];
    $btn = $arr_lang['update'];
    $panel = $arr_lang['update_cat'];
    $update = 1;
    $sql = "SELECT categorieshelp_name,
                    categorieshelp_key,
                    descriptionhelp,
                    keywordshelp,
                    parenthelp_id,
                    sorthelp_order,
                    categorieshelp_status,
                    title_category
                FROM categorieshelp 
                WHERE categorieshelp_id = '" . $id . "'";
    $mysql->setQuery($sql);
    $row = $mysql->loadOneRow();
    $catname = output($row['categorieshelp_name']);
    $parent_id = $row['parenthelp_id'];
    $keywords = $row['keywordshelp'];
    $description = $row['descriptionhelp'];
    $catname_old = $catname;
    $catorder = $row['sorthelp_order'];
    $check_do = ($row['categorieshelp_status'] == '1') ? 'checked' : '';
    $title_category = $row['title_category'];
}

if (isset($_POST['btnadd'])) {
    $catname = output($_POST['txtcats_name']);
    $catorder = intval($_POST['txtcats_order']);
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $parent_id = intval($_POST['dl_subcats']);
    $title_category = $_POST['title_category'];

    if ($parent_id != 0) {
        $level = getLevel_help($parent_id) + 1;
    } else {
        $level = 1;
    }

    if ($_POST['chkb_status'] != 'on') {
        $check_do = '';
        $status = '0';
    } else {
        $status = '1';
    }

    $catkey = vitoen($catname, '-');
    if (!isset($catname{1})) {
        $error = $arr_lang['err_cat_name_short'] . ' !<br>';
    }

    if (check_cats_name_help(input($catname), $id)) {
        $error = $arr_lang['err_cat_name_valid'] . ' !';
        $catname = $catname_old;
    }

    if (empty($error)) {
        include(_CLASS . 'cache.php');
        $cache = new cache();
        $cache->flush(_HOME . 'home/cache/');
        // update
        if ($update == 1) {
            if ($id == 30) {
                $catkey = 'dich-vu-van-chuyen';
            } else if ($id == 31) {
                $catkey = 'cach-thuc-thanh-toan';
            } else if ($id == 32) {
                $catkey = 'cau-hoi-thuong-gap';
            } else if ($id == 33) {
                $catkey = 'huong-dan-mua-hang';
            } else {
                $catkey = input($catkey);
            }

            $sql = "UPDATE categorieshelp 
                        SET categorieshelp_name = '" . input($catname)
                    . "',keywordshelp='" . $keywords
                    . "',descriptionhelp='" . $description
                    . "',categorieshelp_key = '" . $catkey
                    . "',parenthelp_id = " . intval($parent_id)
                    . ",levelhelp ='" . $level
                    . "',sorthelp_order = '" . $catorder
                    . "',categorieshelp_status = '" . $status
                    . "',title_category = '" . $title_category
                    . "',modifiedhelp_date = " . time() .
                    " WHERE categorieshelp_id = " . $id . "";
            $mysql->setQuery($sql);
            $mysql->query();
            if ($_GET['order'] != "") {
                header('location:./?show=catalogue_help&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
            } else {
                header('location:./?show=catalogue_help&p=' . intval($_GET['p']));
            }
        } else {
            $sql = "INSERT INTO categorieshelp(categorieshelp_name,
                                    keywordshelp,
                                    descriptionhelp,
                                    parenthelp_id,
                                    levelhelp,
                                    sorthelp_order,
                                    categorieshelp_status,
                                    title_category,
                                    datehelp_added,
                                    languagehelp)
                        VALUES('" . input($catname) . "','"
                    . $keywords . "','"
                    . $description . "',"
                    . intval($parent_id) . ",'"
                    . intval($level) . "',"
                    . $catorder . ","
                    . $status . ",'"
                    . $title_category . "',"
                    . time() . ",'"
                    . $_SESSION['lag'] . "')";
            $mysql->setQuery($sql);
            $mysql->query();
            $id = $mysql->lastId;
            $mysql->setQuery("UPDATE categorieshelp 
                                SET categorieshelp_key ='" . input($catkey) .
                    "' WHERE categorieshelp_id='" . $id . "'");
            $mysql->query();
            if ($_GET['order'] != "") {
                header('location:./?show=catalogue_help&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
            } else {
                header('location:./?show=catalogue_help&p=' . intval($_GET['p']));
            }
        }
    }
}

$xtemplate->path = 'com_catalogue_help/';
$content = $xtemplate->load('CatalogueOpt');
$content = $xtemplate->replace($content, array(
    'lag_cats_name' => $arr_lang['cat_name'],
    'keywords' => $keywords,
    'description' => $description,
    'add_cat' => $panel,
    'lag_order' => $arr_lang['order'],
    'dl_subcats' => dl_subcats_help($parent_id, 200),
    'reset' => $arr_lang['reset'],
    'lag_show' => $arr_lang['show'],
    'btn' => $btn,
    'txt_cats_name' => output($catname),
    'txt_cats_order' => $catorder,
    'check_do' => $check_do,
    'ofcatalogue' => $arr_lang['ofcatalogue'],
    'error' => $error,
    'title_category' => $title_category
        ));
?>