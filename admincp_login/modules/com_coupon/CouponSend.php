<?php

function Get_html_mail_body($list_coupon, $custommer_name) {
    $temp = new Template();

    $temp->path = "com_coupon/";

    $body = $temp->load("mail_form_to_client");

    //css
    $table_style = 'table_style';

    $th_style = 'th_style';

    $td_style = 'td_style';

    preg_replace('#<!--BEGIN_' . $table_style . '(.*?)END_' . $table_style . '-->#se', '$table_style = stripslashes("\\1");', $body);

    preg_replace('#<!--BEGIN_' . $th_style . '(.*?)END_' . $th_style . '-->#se', '$th_style = stripslashes("\\1");', $body);

    preg_replace('#<!--BEGIN_' . $td_style . '(.*?)END_' . $td_style . '-->#se', '$td_style = stripslashes("\\1");', $body);

    $block = $temp->get_block_from_str($body, 'PRODUCT');

    $list_coupon_detail = "";

    $list_id_coupon = split(",", $list_coupon);

    foreach ($list_id_coupon as $val) {
        $mysql = new mysql();

        $sql = "SELECT *
                    FROM coupon
                    WHERE id_coupon = " . $val;

        $mysql->setQuery($sql);

        $coupon_result = $mysql->loadOneRow();

        $coupon_name = $coupon_result["name_coupon"];

        $coupon_code = $coupon_result["code_coupon"];

        $coupon_discount = $coupon_result["discount_coupon"];

        $coupon_bill = $coupon_result["begin_cost_coupon"] . "->" . $coupon_result["end_cost_coupon"];

        $coupon_deadline = $coupon_result["date_deadline_coupon"];

        $coupon_category = "";

        $coupon_detail = "";

        $block_val = array(
            'coupon_name' => $coupon_name,
            'coupon_code' => $coupon_code,
            'coupon_discount' => $coupon_discount,
            'coupon_bill' => $coupon_bill,
            'coupon_deadline' => $coupon_deadline,
            'coupon_category' => CatlistCouponSendMail($coupon_result["category_coupon"]),
        );

        $coupon_detail .= $temp->assign_vars($block, $block_val);

        $list_coupon_detail .= $coupon_detail;
    }

    $body = $temp->assign_blocks_content($body, array(
        'PRODUCTS' => $list_coupon_detail)
    );


    $body = $temp->assign_vars($body, array(
        'custommer_name' => $custommer_name,
        'table_style' => $table_style,
        'th_style' => $th_style,
        'td_style' => $td_style,
    ));
    return $body;
}

$error = "";

$xtemplate->path = 'com_coupon/';

$content = $xtemplate->load('CouponSend');

$title = 'Gửi khuyến mãi';

$panel = $title;

if (isset($_POST['send'])) {
    $name = input($_POST['name']);

    $email = input($_POST['email']);

    $address = input($_POST['address']);

    $phone = input($_POST['phone']);

    $list_coupon .= (count($_POST['option']) > 0) ? implode(',', $_POST['option']) : '';

    if (empty($name))
        $error.= '<li>Bạn chưa nhập tên người nhận.</li>';

    if (empty($email))
        $error.= '<li>Bạn chưa nhập email người nhận.</li>';

    if (empty($list_coupon))
        $error.= '<li>Bạn chưa chọn danh sách coupon</li>';

    if (empty($error)) {
        $category_coupon .= (count($_POST['option']) > 0) ? implode(',', $_POST['option']) : '';

        $mail_to = $email;

        $mail_name_to = $name;

        $mail_subject = "NanaPet - Gửi mã coupon khuyến mãi";

        $mail_body = Get_html_mail_body($category_coupon, $name);

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: ' . $mail_name_to . "\r\n";
        $headers .= 'From:' . 'http://nanapet.com/index.htm' . "\r\n";
        if (mail($mail_to, $mail_subject, $mail_body, $headers)) {
            $list_id_coupon = split(",", $list_coupon);

            foreach ($list_id_coupon as $val) {
                $sql = "UPDATE coupon
                            SET customer_email_coupon = '" . $email . "'" .
                        "WHERE id_coupon = " . $val;

                $mysql = new mysql();

                $mysql->setQuery($sql);

                $mysql->query();
            }
            ?>
            <script>
                window.alert("Hệ thống đã gửi coupon thành công.");
            </script>
            <?php

            header("location:./?show=coupon_list");
        }

        $error .= "Hệ thống gửi thất bại! Vui lòng kiểm tra thông tin khách hàng đầy đủ và thử lại!";
    }
}

if (isset($_POST['tim'])) {
    $ten_s = input($_POST['ten']);

    $email_s = input($_POST['thudientu']);

    $phone_s = input($_POST['so_DT']);
}

if ($ten_s == "") {
    $ten_s = '_||_';
}

if ($email_s == "") {
    $email_s = '_||_';
}

if ($phone_s == "") {
    $phone_s = '_||_';
}

$sql_s = "SELECT *
              FROM user
              WHERE name like '%" . $ten_s . "%' OR email like '%" . $email_s . "%' OR phone like '%" . $phone_s . "%'";

$mysql->setQuery($sql_s);

$row = $mysql->loadAllRow();

$listusr = $xtemplate->get_block_from_str($content, "SEARCH");

$n = count($row);

$tpl = "";

for ($i = 0; $i < $n; $i++) {
    if ($row[$i]['address'] != "") {
        list($text_address,
                $text_street,
                $text_ward,
                $text_chung_cu,
                $text_lau,
                $text_can_ho,
                $text_district,
                $text_city ) = split(' nanapet.com ', $row[$i]['address']);

        $adressformat = $text_can_ho . ' ' . $text_lau . ' ' . $text_chung_cu . ' - ' . $text_address . ' ' . $text_street . ' ' . $text_ward . ' ' . $text_district . ' ' . $text_city;

        $text_street = str_replace("Đường ", "", $text_street);

        $text_ward = str_replace("Phường ", "", $text_ward);

        $text_chung_cu = str_replace("Chung cư/Tòa nhà ", "", $text_chung_cu);

        $text_lau = str_replace("Lầu ", "", $text_lau);

        $text_can_ho = str_replace("Căn hộ ", "", $text_can_ho);

        if ($text_can_ho == "") {
            $adressformat = str_replace("Căn hộ  ", "", $adressformat);
        }

        if ($text_lau == "") {
            $adressformat = str_replace("Lầu  ", "", $adressformat);
        }

        if ($text_chung_cu == "") {
            $adressformat = str_replace("Chung cư/Tòa nhà  - ", "", $adressformat);
        }
        $adressformat = $row[$i]['name'] . ', ' . $adressformat;
    } else {
        $adressformat = "";
    }

    $tpl .= $xtemplate->assign_vars($listusr, array(
        'hoten' => $row[$i]['name'],
        'mail' => $row[$i]['email'],
        'diachi' => $adressformat,
        'dienthoai' => $row[$i]['phone'],
        'id_user' => $row[$i]['id']
    ));
}

$content = $xtemplate->assign_blocks_content($content, array("SEARCH" => $tpl));

if (isset($_GET['id'])) {

    $sql_s = "SELECT *
                  FROM user
                  WHERE id = " . input($_GET['id']);

    $mysql->setQuery($sql_s);

    $usr = $mysql->loadOneRow();

    $name = $usr['name'];

    $email = $usr['email'];

    list($text_address, $text_street, $text_ward, $text_chung_cu, $text_lau, $text_can_ho, $text_district, $text_city ) = split(' nanapet.com ', $usr['address']);

    $adressformat_1 = $text_can_ho . ' ' . $text_lau . ' ' . $text_chung_cu . ' - ' . $text_address . ' ' . $text_street . ' ' . $text_ward . ' ' . $text_district . ' ' . $text_city;

    $text_street = str_replace("Đường ", "", $text_street);

    $text_ward = str_replace("Phường ", "", $text_ward);

    $text_chung_cu = str_replace("Chung cư/Tòa nhà ", "", $text_chung_cu);

    $text_lau = str_replace("Lầu ", "", $text_lau);

    $text_can_ho = str_replace("Căn hộ ", "", $text_can_ho);

    if ($text_can_ho == "") {
        $adressformat_1 = str_replace("Căn hộ  ", "", $adressformat_1);
    }

    if ($text_lau == "") {
        $adressformat_1 = str_replace("Lầu  ", "", $adressformat_1);
    }

    if ($text_chung_cu == "") {
        $adressformat_1 = str_replace("Chung cư/Tòa nhà  - ", "", $adressformat_1);
    }

    $adressformat_1 = $name . ', ' . $adressformat_1;

    $phone = $usr['phone'];
}

$content = $xtemplate->replace($content, array(
    'name' => $name,
    'email' => $email,
    'address' => $adressformat_1,
    'phone' => $phone,
    'error' => $error,
    'coupon_list' => CouponList(),
        ));
?>