<?php

//Format money
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

// THEM SAN PHAM VAO HOA DON
if (isset($_POST['themhoadon'])) {
    $arrSe = array();
    $arrListId = $_POST["listid"];
    $arrChkName = $_POST["chkName"];
    $m = count($arrChkName);
    $k = 0;
    for ($j = 0; $j < $m; $j++) {
        $n = count($arrListId);
        for ($i = 0; $i < $n; $i++) {
            if ($arrListId[$i] == $arrChkName[$j]) {
                $arrSe[$k] = $i;
                $k++;
            }
        }
    }
    $arrProKey = $_POST["key_pro"];
    $arrProName = $_POST["name_pro"];
    $arrProPrice = $_POST["price_pro"];
    $arrProQuantity = $_POST["quantity"];
    $arrProType = $_POST["type_product"];
    $price_total = 0;
    for ($i = 0; $i < $k; $i++) {
        $arrProQuantity[$arrSe[$i]] = str_replace('.', '', $arrProQuantity[$arrSe[$i]]);
        $arrIns = array(
            "id_order" => $_POST['id'],
            "product_key" => $arrProKey[$arrSe[$i]],
            "product_name" => $arrProName[$arrSe[$i]],
            "product_type" => $arrProType[$arrSe[$i]],
            "product_color" => '',
            "product_price" => $arrProPrice[$arrSe[$i]],
            "product_quantity" => $arrProQuantity[$arrSe[$i]],
            "status" => 0,
        );
        $sql = "SELECT *
                    FROM order_detail
                    WHERE product_key = '" . $arrProKey[$arrSe[$i]] . "' AND id_order = " . $_POST['id'];
        $mysql->setQuery($sql);
        $row = $mysql->loadOneRow();
        $i_price_product = $row['product_price'];
        $i_price_type = $row['product_type'];
        // Check ten trung, gia trung, loai trung thi moi add so luong
        if (!empty($row) AND $i_price_product == $arrProPrice[$arrSe[$i]] AND $i_price_type == $arrProType[$arrSe[$i]]) {
            $quan = $arrProQuantity[$arrSe[$i]];
            $aUp = array("product_quantity" => ($quan + $row['product_quantity']));
            update("order_detail", $aUp, "product_key = '" . $arrProKey[$arrSe[$i]] . "' AND id_order = " . $_POST['id']);
        } else {
            insert("order_detail", $arrIns);
        }
        $price_total = ($price_total + (convertFormatMoneyToInt($arrProPrice[$arrSe[$i]]) * $arrProQuantity[$arrSe[$i]]));
    }

    // Sum money
    $sql = "SELECT *
                FROM tbl_order
                WHERE  id = " . $_POST['id'];
    $mysql->setQuery($sql);
    $row_tbl_order = $mysql->loadOneRow();
    if (!empty($row_tbl_order)) {
        $newTotal = convertFormatMoneyToInt($row_tbl_order['total']);
        $arrUp = array("total" => convertIntToFormatMoney($newTotal + $price_total));
        update("tbl_order", $arrUp, "id = " . $_POST['id']);
    }
    header("location:./?show=orderdetail&id=" . $_POST['id']);
}
$title = $arr_lang['order_manage'];
if ($_GET["action"] == "del") {
    $id_sp = intval($_GET["id_sp"]);
    $mysql->setQuery("DELETE FROM order_detail WHERE id = '" . $id_sp . "'");
    $mysql->query();
    $sql = "SELECT *
                FROM order_detail
                WHERE id_order ='" . intval($_GET['id']) . "'";
    $mysql->setQuery($sql);
    $mysql->query();
    $row = $mysql->loadAllRow();
    $n = count($row);
    $total = 0;
    // Sum money
    for ($i = 0; $i < $n; ++$i) {
        $quanti = $row[$i]['product_quantity'];
        $price = $row[$i]['product_price'];
        $ketQua = str_replace(".", "", $price);
        $ketQua = $quanti * $ketQua;
        $total = $total + $ketQua;
    }
    $sql = "SELECT *
                FROM tbl_order
                WHERE id='" . intval($_GET['id']) . "'";
    $mysql->setQuery($sql);
    $row = $mysql->loadOneRow();
    $total = $total + round((intval(str_replace(" VNĐ", "", str_replace(".", "", $row['total_discount'])))) / 1000) * 1000;
    // Format money
    $total = formatMoney($total);
    $sql = "UPDATE tbl_order
                SET total = '" . $total . "' WHERE id='" . intval($_GET['id']) . "'";
    $mysql->setQuery($sql);
    $mysql->query();
    ?>
    <script>
        alert('Xóa thành công!');
    </script>
    <?php

} else if (isset($_POST['btndel'])) {
    $id = (count($_POST['chk']) > 0) ? implode($_POST['chk'], ',') : '';
}
$xtemplate->path = 'com_order/';
$content = $xtemplate->load('orderDetail');
$sql = "SELECT *
            FROM tbl_order
            WHERE id='" . intval($_GET['id']) . "'";
$mysql->setQuery($sql);
$mysql->query();
$discount_coupon = 0;
$code_coupon = "";
if ($mysql->getNumRows() > 0) {
    $row = $mysql->loadOneRow();
    $total = $row['total'];
    $discount_coupon = $row['total_discount'];
    $code_coupon = $row['code_coupon'];
    list($typetransport, $money_transport) = split(':', $row['fee_transport']);
    if ($typetransport === "{txtfeetransport}") {
        $typetransport = "Chưa chọn phương thức vận chuyển";
        $money_transport = "Thông báo sau";
    }
    $content = $xtemplate->replace($content, array(
        'fullName' => $row['custommer_name'],
        'address' => $row['custommer_addtress'],
        'email' => $row['custommer_email'],
        'phone' => $row['custommer_phone'],
        'fax' => $row['custommer_fax'],
        'transport' => $typetransport,
        'feetransport' => $money_transport,
        'typeofcash' => $row['type_of_cash'],
        'fullNamereceiver' => $row['custommer_name_receiver'],
        'addressreceiver' => $row['custommer_address_receiver'],
        'phonereceiver' => $row['custommer_phone_receiver'],
        'lagfullname' => $arr_lang['contact_fullname'],
        'lagaddress' => $arr_lang['contact_address'],
        'detailorder' => $arr_lang['detailorder'],
        'lagproductname' => $arr_lang['product'],
        'lagamount' => $arr_lang['amount'],
        'lagprice' => $arr_lang['price'],
        'lagtotal' => $arr_lang['lagtotal'],
    ));

    // Check khach hang da duoc nhan uu dai diem se khoa chuc nang them/xoa/sua
    if ($row['status'] == 1) {
        $content = $xtemplate->replace($content, array(
            'hidden' => 'hidden="hidden"'
        ));
    }
    $sql = "SELECT *
                FROM order_detail
                WHERE id_order ='" . intval($_GET['id']) . "'";
    $mysql->setQuery($sql);
    $mysql->query();
    $row = $mysql->loadAllRow();
    $n = count($row);
    $temp = '';
    $code_cats = $xtemplate->get_block_from_str($content, "CATALOGUE");
    for ($i = 0; $i < $n; ++$i) {
        $quanti = $row[$i]['product_quantity'];
        $price = $row[$i]['product_price'];
        //Them Loai SanPham Vao
        $type = '';
        if ($row[$i]['product_type'] != '') {
            $type = $row[$i]['product_type'];
            $type = '(' . $type . ')';
        }
        //Thay doi cach parse gia tri vao file html
        $ketQua = str_replace(".", "", $price);
        $ketQua = $quanti * $ketQua;
        $ketQua = formatMoney($ketQua);
        $temp.= $xtemplate->assign_vars($code_cats, array(
            'id_sp' => $row[$i]['id'],
            'id' => $row[$i]['id_order'],
            'productName' => $row[$i]['product_name'],
            'productType' => $type,
            'quanty' => $quanti,
            'price' => $price . ' VNĐ',
            'total' => $ketQua . ' VNĐ',
        ));
    }
    $content = $xtemplate->assign_blocks_content($content, array("CATALOGUE" => $temp));
    // add pro order
    $order_id = intval($_GET['id']);
    $name_search = "";
    // Search product to add bill
    if (isset($_GET['searchfield'])) {
        $name_search = input($_GET['searchfield']);
    }

    if ($name_search == '') {
        $name_search = "    ";
    }
    $sql = "SELECT *
                FROM products
                WHERE products_name like '%" . $name_search . "%'";
    //end add order
    $mysql->setQuery($sql);
    $row = $mysql->loadAllRow();
    $n = count($row);
    $btnsubmit = "";
    $temp = '';
    $code_cats = $xtemplate->get_block_from_str($content, "PRODUCT");
    if ($n > 0) {
        $btnsubmit = '<input type ="submit" name="themhoadon" style="line-height: 25px"
                        value ="Thêm vào hóa đơn" class ="button"  onclick="' . "return confirm('Bạn có muốn thêm vào hóa đơn ?');" . '" />';
    }
    for ($i = 0; $i < $n; ++$i) {
        $img = $row[$i]['products_image'];
        $imgSrc = _UPLOAD_IMG . $img;
        $imgThumb = _UPLOAD_IMG_THUMB . $img;
        $price_pro = $row[$i]['products_price'];
        if ($row[$i]['product_encourage'] != '') {
            $price_pro = $row[$i]['product_encourage'];
        }
        $iparr = split("---", $row[$i]['p_type']);
        $type_product = split("::", $iparr[0]);
        $temp.= $xtemplate->assign_vars($code_cats, array(
            'id_pro' => $row[$i]['products_id'],
            'key_pro' => $row[$i]['products_key'],
            'name_pro' => $row[$i]['products_name'],
            'image_pro' => $img,
            'price_pro' => $price_pro,
            'mota' => $mota,
            'i' => $i,
            'product_type' => str_replace('::', ' - ', $iparr[0]),
            'functions' => 'onclick="function_type(\'' . $i . '\')" onchange="function()"',
            'p_type' => $row[$i]['p_type'],
            'type_product' => $type_product[0]
        ));
    }
    $content = $xtemplate->assign_blocks_content($content, array("PRODUCT" => $temp));
    $content = $xtemplate->replace($content, array(
        'tongtien' => $total,
        'discount_coupon' => $discount_coupon,
        'code_coupon' => $code_coupon,
        'order_id' => $order_id,
        'name_search' => trim($name_search),
        'btnsubmit' => $btnsubmit
    ));
} else {
    header("location:./?show=order");
}
?>