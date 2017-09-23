<?php

//VI TRI THEM DIEU CHINH TIEN TE
function formatMoney($number, $fractional = false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

$title = "Quản lý khách hàng thân thiết";

if (($_GET['action'] == 'del') && (isset($_GET['id']))) {

    delete('VIPCustomer', 'idVIPCustomer=' . intval($_GET['id']));

    header('location:./?show=VIPCustomer&p=' . intval($_GET['p']));
}

if (isset($_POST['btnUpdate'])) {
    $priceofunit = str_replace(".", "", $_POST['PriceOfUnit']);

    $priceofunit = intval($priceofunit);

    if ($priceofunit > 0) {

        $sql = "UPDATE PriceOfUnit SET PriceScore = " . $priceofunit . " WHERE idPriceOfUnit = 1";

        $mysql->setQuery($sql);

        if ($mysql->query()) {
            ?>
            <script>
                alert('Cập nhật Tiền / 1 Điểm thành công!')
            </script>
            <?php

        }
    } else {
        ?>
        <script>
            alert('Tiền / 1 Điểm >= 1! Cập nhật thất bại!')
        </script>
        <?php

    }
}

$xtemplate->path = 'com_VIPCustomer/';

$content = $xtemplate->load('imgGalary');

$code_cats = $xtemplate->get_block_from_str($content, "SUPPORT");


//Phan trang

$p_now = intval($_GET ['p']);

$mysql->setQuery("Select * from VIPCustomer");

$mysql->query();

$total = $mysql->getNumRows();

$numofpages = $total / $pp;

if ($p_now <= 0) {

    $page = 1;
} else {

    if ($p_now <= ceil($numofpages))
        $page = $p_now;
    else
        $page = 1;
}

$limitvalue = $page * $pp - ($pp);


//end phan trang	

$orderby = "Score";

$sql = "Select * from VIPCustomer order by " . $orderby . " limit " . $limitvalue . ',' . $pp;

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$temp = '';

$begin = 0;

$end = $n;

for ($i = $begin; $i < $end; ++$i) {
    $color = ($i % 2 == 0) ? '#d5d5d5' : '#e5e5e5';

    $temp.= $xtemplate->assign_vars($code_cats, array(
        'VIPCustomer_id' => $row[$i]['idVIPCustomer'],
        'VIPCusomer_name' => $row[$i]['NameVIPCustomer'],
        'VIPCusomer_Score' => formatMoney($row[$i]['Score']) . ' điểm',
        'VIPCusomer_Discount' => formatMoney($row[$i]['DisCount']) . '%',
        'VIPCusomer_FeeLevel' => formatMoney($row[$i]['FeeLevel']) . ' VNĐ',
        'galary_date' => date('G:i d/m/Y', $row[$i]['Date']),
        'color' => $color
    ));
}

// Lay gia tien
$sql = "Select * from PriceOfUnit";

$mysql->setQuery($sql);

$PriceOfUnit = $mysql->loadAllRow();

$content = $xtemplate->assign_blocks_content($content, array("SUPPORT" => $temp));

$content = $xtemplate->replace($content, array(
    'lag_page' => $arr_lang['page'],
    'page' => page_div("./?show=VIPCustomer&p=%d_pg", "10", ceil($numofpages), $page),
    'p' => ($_GET['p'] == '') ? '1' : intval($_GET['p']),
    'lag_delete' => $arr_lang['del'],
    'lag_edit' => $arr_lang['edit'],
    'lag_date_modifiled' => $arr_lang['date_modifiled'],
    'add' => $arr_lang['add'],
    'title' => $title,
    'PriceOfUnit' => formatMoney($PriceOfUnit[0]['PriceScore'])
        ));
?>