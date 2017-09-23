<?php

$error = '';

function createRandomString($string_length, $character_set) {
    $random_string = array();
    for ($i = 1; $i <= $string_length; $i++) {
        $rand_character = $character_set[rand(0, strlen($character_set) - 1)];
        $random_string[] = $rand_character;
    }
    shuffle($random_string);
    return implode('', $random_string);
}

function validUniqueString($string_collection, $new_string, $existing_strings = '') {
    if (!strlen($string_collection) && !strlen($existing_strings))
        return true;
    $combined_strings = $string_collection . ", " . $existing_strings;
    return (strlen(strpos($combined_strings, $new_string))) ? false : true;
}

function createRandomStringCollection($string_length, $number_of_strings, $character_set) {
    $existing_strings = "";

    $mysql = new mysql();

    $sql = "SELECT code_coupon
			    FROM coupon";

    $mysql->setQuery($sql);

    $row = $mysql->loadAllRow();

    $n = count($row);

    if ($n > 0) {
        for ($i = 0; $i < $n - 1; ++$i) {
            $existing_strings .=$row[$i]['code_coupon'] . ",";
        }
        $existing_strings .=$row[$n - 1]['code_coupon'];
    }

    $string_collection = '';

    for ($i = 1; $i <= $number_of_strings; $i++) {
        $random_string = createRandomString($string_length, $character_set);
        while (!validUniqueString($string_collection, $random_string, $existing_strings)) {
            $random_string = createRandomString($string_length, $character_set);
        }
        $string_collection .= (!strlen($string_collection)) ? $random_string : ", " . $random_string;
    }
    return $string_collection;
}

function CheckCouponCode($coupon_code) {
    $sql = "SELECT code_coupon
		        FROM coupon
		        WHERE code_coupon = '" . $coupon_code . "'";

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
    $id = intval($_GET['id_coupon']);

    $code_coupon = $_GET['code_coupon'];

    $btn = $arr_lang['add'];

    $title = 'Thêm coupon';

    $panel = $title;

    $update = 0;

    if (!empty($id)) {
        $panel = 'Cập nhật coupon';

        $title = $panel;

        $update = 1;

        $btn = $arr_lang['update'];

        // Get info Coupon
        $sql = "SELECT *
		            FROM coupon
		            WHERE id_coupon = '" . $id . "'";

        $mysql->setQuery($sql);

        $row = $mysql->loadOneRow();

        $id_coupon = output($row['id_coupon']);

        $code_coupon = output($row['code_coupon']);

        $name_coupon = output($row['name_coupon']);

        $discount_coupon = output($row['discount_coupon']);

        $begin_cost_coupon = output($row['begin_cost_coupon']);

        $end_cost_coupon = output($row['end_cost_coupon']);

        $status_coupon = output($row['status_coupon']);

        $category_coupon = output($row['category_coupon']);

        $note_coupon = output($row['note_coupon']);

        $date_deadline_coupon = output($row['date_deadline_coupon']);

        $customer_email_coupon = output($row['customer_email_coupon']);

        $style_display_clone = "style ='display:none'";
    } else {
        $character_set = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';

        $existing_strings = "NXC, BRL, CVN";

        $string_length = 10;

        $number_of_strings = 1;

        $code_coupon = createRandomStringCollection($string_length, $number_of_strings, $character_set);

        $style_display_customer = "style ='display:none'";
    }
    if (isset($_POST['btnadd'])) {
        $code_coupon = $_POST['code_coupon'];

        $name_coupon = $_POST['name_coupon'];

        $discount_coupon = $_POST['discount_coupon'];

        $begin_cost_coupon = $_POST['begin_cost_coupon'];

        $end_cost_coupon = $_POST['end_cost_coupon'];

        $date_deadline_coupon = $_POST['date_deadline_coupon'];

        $status_coupon = $_POST['status_coupon'];

        $note_coupon = $_POST['note_coupon'];

        $category_coupon = (count($_POST['option']) > 0) ? implode(',', $_POST['option']) : '';

        $clone_coupon = $_POST['clone_coupon'];

        if (empty($code_coupon))
            $error.= '<li>Bạn chưa nhập mã coupon</li>';

        if (empty($name_coupon))
            $error.= '<li>Bạn chưa nhập tên coupon</li>';

        if (empty($discount_coupon))
            $error.= '<li>Bạn chưa nhập % giảm coupon</li>';

        if (empty($begin_cost_coupon))
            $error.= '<li>Bạn chưa nhập hóa đơn bắt đầu được giảm</li>';

        if (empty($end_cost_coupon))
            $error.= '<li>Bạn chưa nhập hóa đơn kết thúc được giảm</li>';

        if (empty($date_deadline_coupon))
            $error.= '<li>Bạn chưa nhập ngày hết hạn</li>';

        if (empty($status_coupon))
            $error.= '<li>Bạn chưa chọn trạng thái coupon (Sử dụng/Ngừng sử dụng)</li>';

        if (empty($category_coupon))
            $error.= '<li>Bạn chưa chọn danh mục áp dụng cho</li>';

        if (CheckCouponCode($code_coupon) == true && $update != 1) {
            $error.= '<li> Mã coupon đã tồn tại! Vui lòng tạo mã mới </li>';
        }

        if (empty($error)) {
            if ($update == 1) {
                // Update Coupon Code
                $sql = "UPDATE coupon SET name_coupon = '" . $name_coupon . "'," .
                        "discount_coupon = '" . $discount_coupon . "'," .
                        "begin_cost_coupon = '" . $begin_cost_coupon . "'," .
                        "end_cost_coupon = '" . $end_cost_coupon . "'," .
                        "status_coupon = '" . $status_coupon . "'," .
                        "category_coupon = '" . $category_coupon . "'," .
                        "note_coupon = '" . $note_coupon . "'," .
                        "date_update_coupon = '" . time() . "'," .
                        "date_deadline_coupon = '" . $date_deadline_coupon . "'" .
                        "WHERE id_coupon = " . $id;
            } else if ($update != 1) {
                // Insert Coupon Code
                $sql = "INSERT INTO coupon(code_coupon,
					                           name_coupon,
					                           discount_coupon,
					                           begin_cost_coupon,
											   end_cost_coupon,
											   status_coupon,
											   category_coupon,
											   note_coupon,
											   date_added_coupon,
											   date_deadline_coupon)
								      VALUES('" . $code_coupon . "'," .
                        "'" . $name_coupon . "'," .
                        "'" . $discount_coupon . "'," .
                        "'" . $begin_cost_coupon . "'," .
                        "'" . $end_cost_coupon . "'," .
                        "'" . $status_coupon . "'," .
                        "'" . $category_coupon . "'," .
                        "'" . $note_coupon . "'," .
                        "'" . time() . "'," .
                        "'" . $date_deadline_coupon . "'"
                        . ")";
            }

            $mysql->setQuery($sql);

            $mysql->query();

            if ($clone_coupon > 0) {
                for ($i = 0; $i < $clone_coupon; $i++) {
                    $code_coupon = createRandomStringCollection($string_length, $number_of_strings, $character_set);
                    // Insert Coupon Code
                    $sql = "INSERT INTO coupon(code_coupon,
					                           name_coupon,
					                           discount_coupon,
					                           begin_cost_coupon,
											   end_cost_coupon,
											   status_coupon,
											   category_coupon,
											   note_coupon,
											   date_added_coupon,
											   date_deadline_coupon)
								      VALUES('" . $code_coupon . "'," .
                            "'" . $name_coupon . "'," .
                            "'" . $discount_coupon . "'," .
                            "'" . $begin_cost_coupon . "'," .
                            "'" . $end_cost_coupon . "'," .
                            "'" . $status_coupon . "'," .
                            "'" . $category_coupon . "'," .
                            "'" . $note_coupon . "'," .
                            "'" . time() . "'," .
                            "'" . $date_deadline_coupon . "'"
                            . ")";
                    $mysql->setQuery($sql);

                    $mysql->query();
                }
            }

            $_SESSION['timeout'] = time();

            if ($_GET['order'] != '') {
                header('location:./?show=coupon_list&p=' . $_GET['p'] . '&order=' . $_GET['order']);
            } else {
                header('location:./?show=coupon_list&p=' . $_GET['p']);
            }
        } else {
            $error = '<ul class=err><b>' . $arr_lang['error'] . '</b>' . $error . '</ul>';
        }
    }

    $xtemplate->path = 'com_coupon/';

    $content = $xtemplate->load('OptCoupon');

    if ($status_coupon == 2)
        $selected2 = "selected";
    else
        $selected1 = "selected";
    $content = $xtemplate->replace($content, array(
        'error' => $error,
        'cat_list' => CatlistCoupon($category_coupon),
        'btnadd' => $btn,
        'code_coupon' => $code_coupon,
        'name_coupon' => $name_coupon,
        'discount_coupon' => $discount_coupon,
        'begin_cost_coupon' => $begin_cost_coupon,
        'end_cost_coupon' => $end_cost_coupon,
        'selected1' => $selected1,
        'selected2' => $selected2,
        'note_coupon' => $note_coupon,
        'date_deadline_coupon' => $date_deadline_coupon,
        'style_display_clone' => $style_display_clone,
        'style_display_customer' => $style_display_customer,
        'customer_email_coupon' => $customer_email_coupon
    ));
}
else {
    header("location:./?show=coupon_list");
}
?>