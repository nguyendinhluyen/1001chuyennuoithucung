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

$title = "Chỉnh sửa chi tiết đơn hàng";

$id_sp = intval($_GET['id_sp']);

$update = 0;

$display = 'none';

if (isset($_GET['id_sp'])) {
    $title = "Cập nhật chi tiết hóa đơn";

    //$update = 1;

    $row = GetOneRow('*', 'order_detail', 'id=' . $id_sp);

    $input_name_product = $row['product_name'];

    $product_type = $row['product_type'];

    $quantity = $row['product_quantity'];

    $price_product = $row['product_price'];

    $product_key = $row['product_key'];

    $id_oderdetail = $row['id_order'];

    // Lay thong tin san pham

    $Product = new Product();

    // NOTE
    // Do san pham dc them co the co trong hoa don cu nen lay toan bo san pham
    $product_detail = $Product->getProductsByProductKey_2($product_key);

    $proType = $Product->getProductsType($product_detail['p_type']);

    $typeTemplate = '';

    if ($proType[0]['price'] != null) {

        $typeTemplate .= '<tr style="vertical-align:top;">
	
								<td class="sp_info1"><span style="font-weight:bold;color:green;margin-bottom:10px; margin-left:3px;margin-top:20px; font-size:12px" >Loại : </span></td>
	
								<td class="sp_info2"><span class="promotion1">';

        $typeTemplate .='<table border="0" cellpadding="5px" cellspacing="0" style="width:170px;margin-top:20px; margin-left:10px; height:auto" align="left>"';

        $i = 0;

        foreach ($proType as $val) {

            $pri = $val['price'];

            if ($pri == '') {
                $pri = $product_detail['products_price'];
            }

            $typeTemplate .='<tr style="margin-top:20px"><td>';

            if (trim($val['type']) == trim($product_type)) {
                $typeTemplate .=$val['type'] . ' (=' . $pri . ')' . '&nbsp;</td> <td width="10px;"><input type="radio"  id="type" name="type" checked onchange = "function_type_product(\'' . trim($val['type']) . ':' . $val['price'] . '\')" value="' . $val['type'] . '::' . $pri . '" />';
            } else {
                $typeTemplate .=$val['type'] . ' (=' . $pri . ')' . '&nbsp;</td> <td width="10px;"><input type="radio" id="type" name="type" onchange = "function_type_product(\'' . trim($val['type']) . ':' . $val['price'] . '\')" value="' . $val['type'] . '::' . $pri . '" />';
            }

            $i++;

            $typeTemplate .='</td></tr>';
        }

        $typeTemplate .='</table>';

        $typeTemplate .= '</span></td></tr>';
    }

    if (empty($row)) {
        header('location:./?show=order');
    }
}

if (isset($_POST['btnSave'])) {
    $product_quantity = str_replace('.', '', $_POST['quantity']);

    $product_price = $_POST['price_product'];

    $type_product = $_POST['type_product'];


    // Cap nhat du lieu		
    $data = array(
        'product_quantity' => $product_quantity,
        'product_price' => $product_price,
        'product_type' => $type_product,
    );
    update('order_detail', $data, 'id=' . $id_sp);
    // Tinh lai tien cho tong hoa don khi thay doi so luong va don gia

    $sql = "SELECT *
		        FROM order_detail
		        WHERE id_order ='" . $id_oderdetail . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $row = $mysql->loadAllRow();

    $n = count($row);

    $total = 0;

    for ($i = 0; $i < $n; ++$i) {
        $quanti = $row[$i]['product_quantity'];

        $price = $row[$i]['product_price'];

        $ketQua = str_replace(".", "", $price);

        $ketQua = $quanti * $ketQua;

        $total = $total + $ketQua;
    }
    // Format lai dong tien

    $sql = "SELECT *
	            FROM tbl_order
	            WHERE id='" . $id_oderdetail . "'";

    $mysql->setQuery($sql);

    $row = $mysql->loadOneRow();

    $total = $total + round((intval(str_replace(" VNĐ", "", str_replace(".", "", $row['total_discount'])))) / 1000) * 1000;

    $total = formatMoney($total);

    $sql = "UPDATE tbl_order
		        SET total = '" . $total . "' WHERE id='" . $id_oderdetail . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    header('location:./?show=orderdetail&id=' . $id_oderdetail);
}

$xtemplate->path = 'com_order/';

$content = $xtemplate->load('Opt_imgGalary');

$content = $xtemplate->replace($content, array(
    'title' => $title,
    'display' => $display,
    'input_name_product' => $input_name_product,
    'product_type' => $typeTemplate,
    'quantity' => $quantity,
    'price_product' => $price_product,
    'type_product' => $product_type,
        ));


$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>