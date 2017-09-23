<?php

$title = $arr_lang['addcat'];
$id = intval($_GET['id']);
$check_do = 'checked';
$btn = $arr_lang['add_cat'];
$panel = $arr_lang['add_cat'];
$update = 0;
if (check_valid_adoption($id)) {
    $title = $arr_lang['updatecat'];
    $btn = $arr_lang['update'];
    $panel = $arr_lang['update_cat'];
    $update = 1;
    $sql = "SELECT categoriesadoption_name,
                        categoriesadoption_key,
                        descriptionadoption,
                        keywordsadoption,
                        parentadoption_id,
                        sortadoption_order,
                        categoriesadoption_status,
                        title_category
                FROM   categoriesadoption 
                WHERE  categoriesadoption_id = '" . $id . "'";
    $mysql->setQuery($sql);
    $row = $mysql->loadOneRow();
    $catname = output($row['categoriesadoption_name']);
    $parent_id = $row['parentadoption_id'];
    $keywords = $row['keywordsadoption'];
    $description = $row['descriptionadoption'];
    $catname_old = $catname;
    $catorder = $row['sortadoption_order'];
    $check_do = ($row['categoriesadoption_status'] == '1') ? 'checked' : '';
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
        $level = getLevel_adoption($parent_id) + 1;
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

    if (check_cats_name_adoption(input($catname), $id)) {
        $error = $arr_lang['err_cat_name_valid'] . ' !';
        $catname = $catname_old;
    }

    if (empty($error)) {
        include(_CLASS . 'cache.php');
        $cache = new cache();
        $cache->flush(_HOME . 'home/cache/');

        // update
        if ($update == 1) {
            $sql = "UPDATE categoriesadoption 
                        SET categoriesadoption_name = '" . input($catname)
                    . "',keywordsadoption='" . $keywords
                    . "',descriptionadoption='" . $description
                    . "',categoriesadoption_key = '" . $catkey
                    . "',parentadoption_id = " . intval($parent_id)
                    . ",leveladoption ='" . $level
                    . "',sortadoption_order = '" . $catorder
                    . "',categoriesadoption_status = '" . $status
                    . "',title_category = '" . $title_category
                    . "',modifiedadoption_date = " . time() .
                    " WHERE categoriesadoption_id = " . $id . "";
            $mysql->setQuery($sql);
            $mysql->query();
            if ($_GET['order'] != "") {
                header('location:./?show=catalogue_adoption&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
            } else {
                header('location:./?show=catalogue_adoption&p=' . intval($_GET['p']));
            }
        } else {
            // insert
            $sql = "INSERT INTO categoriesadoption(categoriesadoption_name,
                                    keywordsadoption,
                                    descriptionadoption,
                                    parentadoption_id,
                                    leveladoption,
                                    sortadoption_order,
                                    categoriesadoption_status,
                                    title_category,
                                    dateadoption_added,
                                    languageadoption)															
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
            $mysql->setQuery("UPDATE categoriesadoption
                        SET categoriesadoption_key ='" . input($catkey) .
                    "' WHERE categoriesadoption_id='" . $id . "'");
            $mysql->query();
            if ($_GET['order'] != "") {
                header('location:./?show=catalogue_adoption&p=' . intval($_GET['p']) . '&order=' . $_GET['order']);
            } else {
                header('location:./?show=catalogue_adoption&p=' . intval($_GET['p']));
            }
        }
    }
}

$xtemplate->path = 'com_catalogue_adoption/';
$content = $xtemplate->load('CatalogueOpt');
$content = $xtemplate->replace($content, array(
    'lag_cats_name' => $arr_lang['cat_name'],
    'keywords' => $keywords,
    'description' => $description,
    'add_cat' => $panel,
    'lag_order' => $arr_lang['order'],
    'dl_subcats' => dl_subcats_adoption($parent_id, 200),
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