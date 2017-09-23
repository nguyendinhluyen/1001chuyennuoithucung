<?php

$title = 'Danh sách thành viên';

$xtemplate->path = 'com_Fee_GroupMember/';

$content = $xtemplate->load('FeeListMember');

$code_cats = $xtemplate->get_block_from_str($content, "PRODUCT");

$where = " 1=1 ";

$username = "";

$option_Name_Of_Group_Member = "";

$sql = "SELECT NameGroupMember FROM GroupMember";

$mysql->setQuery($sql);

$rowName = $mysql->loadAllRow();

if (count($rowName) > 0) {
    for ($i = 0; $i < count($rowName); $i++) {
        $option_Name_Of_Group_Member .= '<option value = "' . $rowName[$i]['NameGroupMember'] . '">' . $rowName[$i]['NameGroupMember'] . '</option>';
    }
}

if (isset($_POST['btnAddGroupMember'])) {
    $id = $_POST['chk'];

    $n = count($id);

    if ($_POST["boloc"] != "") {
        for ($i = 0; $i < $n; $i++) {
            $sql = "UPDATE user SET GroupMember = '" . $_POST["boloc"] . "' WHERE id = " . $id[$i];

            $mysql->setQuery($sql);

            $mysql->query();
        }
    }

    if ($_POST['searchfield'] != "") {
        $where .= " AND name LIKE '%" . $_POST['searchfield'] . "%'";
    }
} else if (isset($_POST['btnRemoveGroupMember'])) {
    $id = $_POST['chk'];

    $n = count($id);

    for ($i = 0; $i < $n; ++$i) {

        $sql = "UPDATE user SET GroupMember = 'Chưa là thành viên' WHERE id = " . $id[$i];

        $mysql->setQuery($sql);

        $mysql->query();
    }

    if ($_POST['searchfield'] != "") {
        $where .= " AND name LIKE '%" . $_POST['searchfield'] . "%'";
    }
} else if (isset($_POST['btnfindMember'])) {
    if ($_POST['searchfield'] != "") {
        $username = $_POST['searchfield'];

        $where .= " AND name LIKE '%" . $username . "%'";
    }
} else if (isset($_POST['btnfindAll'])) {

    $_POST['searchfield'] = "";

    $where = " 1=1 ";
}

//Phan trang		

$p_now = intval($_GET ['p']);

$sql = "SELECT * FROM  user WHERE status <> -1 AND " . $where . "  ORDER BY date DESC";

$mysql->setQuery($sql);

$mysql->query();

$total = $mysql->getNumRows();

$row = $mysql->loadAllRow();

$numofpages = $total / $pp;

if ($p_now <= 0) {
    $page = 1;
} else {
    if ($p_now <= ceil($numofpages))
        $page = $p_now;
    else
        $page = 1;
}

$n = count($row);

$begin = ($page - 1) * $pp;

$end = $page * $pp;

if ($page == ceil($numofpages)) {
    $end = count($row);
}

$temp = '';
//end phan trang																														

for ($i = $begin; $i < $end; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['id'],
        'name' => $row[$i]['name'],
        'phone' => $row[$i]['phone'],
        'email' => $row[$i]['email'],
        'type_of_group' => $row[$i]['GroupMember'],
        'color' => $color));
}

$content = $xtemplate->assign_blocks_content($content, array("PRODUCT" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_product_manager' => $title,
    'suggestionText' => $suggestionText,
    'defaultText' => 'Tìm tên thành viên',
    'productKey' => ($_POST['searchfield'] == '') ? $_GET['keyword'] : $_POST['searchfield'],
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'oderby' => $_GET['order'],
    'page' => page_div("./?show=ListGroupMember&p=%d_pg", "10", ceil($numofpages), $page),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'catlist' => cat_fillter($_SESSION['CATID']),
    'group_member_confirm' => 'Thêm thành viên?',
    'ofcatalogue' => $arr_lang['ofcatalogue'],
    'removeGroupMember' => 'Hủy thành viên',
    'remove_member_confirm' => 'Hủy thành viên?',
    'ppromotions' => $arr_lang['ppromotions'],
    'pnew' => $arr_lang['pnew'],
    'sellers' => $arr_lang['sellers'],
    'option_Name_Of_Group_Member' => $option_Name_Of_Group_Member,
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>