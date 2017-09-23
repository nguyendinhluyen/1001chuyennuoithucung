<?php

$title = $arr_lang['addcat'];
$id = intval($_GET['id']);
$check_do = 'checked';
$btn = $arr_lang['add_cat'];
$panel = $arr_lang['add_cat'];
$update = 0;
if (check_valid_libary($id)) { //fill data on textbox
    $title = $arr_lang['updatecat'];
    $btn = $arr_lang['update'];
    $panel = $arr_lang['update_cat'];
    $update = 1;
    $sql = "SELECT categorieslibary_name,
                        descriptionlibary,
                        keywordslibary,
                        parentlibary_id,
                        sortlibary_order,
                        categorieslibary_status ,
                        title_category
                FROM categorieslibary 
                WHERE categorieslibary_id = '" . $id . "'";
    $mysql->setQuery($sql);
    $row = $mysql->loadOneRow();
    $catname = output($row['categorieslibary_name']);
    $parent_id = $row['parentlibary_id'];
    $keywords = $row['keywordslibary'];
    $description = $row['descriptionlibary'];
    $catname_old = $catname;
    $catorder = $row['sortlibary_order'];
    $check_do = ($row['categorieslibary_status'] == '1') ? 'checked' : '';
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
        $level = getLevel_libary($parent_id) + 1;
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

    if (check_cats_name_libary(input($catname), $id)) {
        $error = $arr_lang['err_cat_name_valid'] . ' !';
        $catname = $catname_old;
    }

    if (empty($error)) {
        include(_CLASS . 'cache.php');
        $cache = new cache();
        $cache->flush(_HOME . 'home/cache/');
        // Update
        if ($update == 1) {
            $sql = "UPDATE categorieslibary 
                        SET categorieslibary_name = '" . input($catname)
                    . "',keywordslibary='" . $keywords
                    . "',descriptionlibary='" . $description
                    . "',categorieslibary_key = '" . input($catkey)
                    . "',parentlibary_id = " . intval($parent_id)
                    . ",levellibary ='" . $level
                    . "',sortlibary_order = '" . $catorder
                    . "',categorieslibary_status = '" . $status
                    . "',title_category = '" . $title_category
                    . "',modifiedlibary_date = " . time() .
                    " WHERE categorieslibary_id = " . $id . "";
            $mysql->setQuery($sql);
            $mysql->query();
            if ($_GET['order'] != "") {
                header('location:./?show=catalogue_libary&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
            } else {
                header('location:./?show=catalogue_libary&p=' . intval($_GET['p']));
            }
        }

        // Insert
        else {
            $sql = "INSERT INTO categorieslibary(categorieslibary_name,
                                    keywordslibary,
                                    descriptionlibary,
                                    parentlibary_id,
                                    levellibary,
                                    sortlibary_order,
                                    categorieslibary_status,
                                    title_category,
                                    datelibary_added,
                                    languagelibary)
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
            $mysql->setQuery("UPDATE categorieslibary SET categorieslibary_key ='" . input($catkey) . "' WHERE categorieslibary_id='" . $id . "'");
            $mysql->query();
            if ($_GET['order'] != "") {
                header('location:./?show=catalogue_libary&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
            } else {
                header('location:./?show=catalogue_libary&p=' . intval($_GET['p']));
            }
        }
    }
}

$xtemplate->path = 'com_catalogue_libary/';
$content = $xtemplate->load('CatalogueOpt');
$content = $xtemplate->replace($content, array(
    'lag_cats_name' => $arr_lang['cat_name'],
    'keywords' => $keywords,
    'description' => $description,
    'add_cat' => $panel,
    'lag_order' => $arr_lang['order'],
    'dl_subcats' => dl_subcats_libary($parent_id, 200),
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