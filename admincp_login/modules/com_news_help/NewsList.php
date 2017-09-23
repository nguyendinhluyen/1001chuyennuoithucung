<?php

// Xu ly nut xoa cho tat ca cac trang tin tuc	
if (($_GET['action'] == 'del') && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    delete_img_news($id);

    delete_news($id);

    if ($_GET['order'] != '') {
        header('location:./?show=newsList_help&opt=2&p=' . $_GET['p'] . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=newsList_help&opt=2&p=' . $_GET['p']);
    }
}

// Xu ly nut del cho tat ca cac trang tin tuc	
if (isset($_POST['btndel'])) {
    if (count($_POST['chk']) > 0 && $_GET['opt'] == '2') {
        $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

        delete_img_news($id);

        delete_news($id);

        if ($_GET['order'] != '') {
            header('location:./?show=newsList_help&opt=2&p=' . $_GET['p'] . '&order=' . $_GET['order']);
        } else {
            header('location:./?show=newsList_help&opt=2&p=' . $_GET['p']);
        }
    } else {
        ?>
        <script>

            alert("Chưa chọn đối tượng để xóa! Vui lòng chọn lại! ");

        </script>							
        <?php

    }
}

//Button Status 	
else if (isset($_POST['btnStatus'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';

    Set_status_news($id);

    if ($_GET['order'] != '') {
        header('location:./?show=newsList_help&opt=2&p=' . $_GET['p'] . '&order=' . $_GET['order']);
    } else {
        header('location:./?show=newsList_help&opt=2&p=' . $_GET['p']);
    }
}

$title = 'Quản lý trợ giúp';

$xtemplate->path = 'com_news_help/';

$content = $xtemplate->load('NewsList');

$code_cats = $xtemplate->get_block_from_str($content, "NEWS");

//Phan trang

$p_now = intval($_GET ['p']);

$mysql->setQuery("SELECT news_id 
                        FROM news 
                        WHERE language ='" . $lag . "'");

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

//end phan trang

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

$sql = "SELECT 
                news_id,
                news_name,					
                news_catalogue,
                status,
                date_added,
                last_modified 
            FROM 
                news 
            WHERE 
                language ='" . $_SESSION['lag'] . "' AND help_flag = 1 ORDER BY date_added DESC";

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$temp = '';

for ($i = 0; $i < $n; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'id' => $row[$i]['news_id'],
        'news_name' => $row[$i]['news_name'],
        'news_catalogue' => get_cats_name_help($row[$i]['news_catalogue']),
        'status' => ($row[$i]['status'] == '1') ? $arr_lang['show'] : $arr_lang['hidden'],
        'date_added' => date('G:i d/m/Y', $row[$i]['date_added']),
        'last_modified' => ($row[$i]['last_modified'] == '') ? '0' : date('G:i d/m/Y', $row[$i]['last_modified']),
        'color' => $color,
    ));
}

$content = $xtemplate->assign_blocks_content($content, array("NEWS" => $temp));

$date = 'Ngày thêm';

$date_modify = 'Ngày sửa';

$lag_status = 'Trạng thái';

$content = $xtemplate->replace($content, array(
    'tieu_de' => 'Tiêu đề',
    'thuoc_danh_muc' => 'Thuộc danh mục',
    'lag_status' => $lag_status,
    'date' => $date,
    'date_modify' => $date_modify,
    'lag_page' => $arr_lang['page'],
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'oderby' => $_GET['order'],
    'page' => page_div("./?show=newsList_help&opt=2&p=%d_pg&order=" . $_GET['order'], "10", ceil($numofpages), $page),
    'lag_edit' => $arr_lang['edit'],
    'delete_check' => $arr_lang['del_check'],
    'del_confirm' => $arr_lang['del_confirm'],
    'status' => $status,
    'opt' => $opt,
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>