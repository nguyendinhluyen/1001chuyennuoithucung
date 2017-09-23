<?php

function getLevelByUser($user) {
    $GroupMember = GetOneRow("GroupMember", "user", "email = '" . $user . "'");

    if ($GroupMember['GroupMember'] == "Chưa là thành viên") {
        $honor = GetOneRow('user,honors', 'scores', "user = '" . $user . "'");

        return $honor['honors'];
    }
    return $GroupMember['GroupMember'];
}

function getScoreByUser($user) {

    $score = GetOneRow('user,score', 'scores', "user = '" . $user . "'");

    return $score['score'];
}

function getAwardScoreByUser($user) {
    $score = GetOneRow('user,scoreaward', 'scores', "user = '" . $user . "'");

    return $score['scoreaward'];
}

function getDiscountOfCustomer($user) {
    $honorUser_GroupMember = GetRows('GroupMember', 'user', 'email="' . $user . '"');

    if ($honorUser_GroupMember[0]['GroupMember'] != 'Chưa là thành viên') {

        $GroupMemberUser = GetRows('DisCount', 'GroupMember', 'NameGroupMember = "'
                . $honorUser_GroupMember[0]['GroupMember'] . '"');

        return $GroupMemberUser[0]['DisCount'];
    } else {
        $honorUser = GetRows('honors', 'scores', 'user = "' . $user . '"');

        if ($honorUser[0]['honors'] != 'normal' && $honorUser[0]['honors'] != 'Normal') {
            $Discount_honorUser = GetRows('Discount', 'VIPCustomer', 'NameVIPCustomer = "'
                    . $honorUser[0]['honors'] . '"');

            return $Discount_honorUser[0]['Discount'];
        }
    }

    return 0;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (check_id_user($id)) {
        $row_ac = GetOneRow('email,name,
								 phone,date,
								 last_login,
								 address,birthday,
								 yahoo,sex,
								 avarta', 'user', "id = '$id' and status > -1");

        //GET LEVEL

        $user = $row_ac['email'];

        $user_type = getLevelByUser($user);

        if (empty($user_type)) {
            $user_type = 'Normal';
        }

        //GET SCORE

        $GroupMember = GetOneRow("GroupMember", "user", "email = '" . $user . "'");

        $scoreUnused = 0;

        if ($GroupMember['GroupMember'] == "Chưa là thành viên") {
            $score = getScoreByUser($user);

            $awardscore = getAwardScoreByUser($user);

            if (empty($awardscore))
                $awardscore = 0;

            $listScoreUnused = GetRows('username , total', 'tbl_order', ' status = 0 AND username = "' . $user . '"');

            // Lay Price Of Unit

            $sql = "SELECT * FROM PriceOfUnit";

            $mysql->setQuery($sql);

            $PriceOfUnit = $mysql->loadAllRow();

            if (count($listScoreUnused) > 0) {
                for ($i = 0; $i < count($listScoreUnused); $i++) {
                    $listScoreUnused[$i]["total"] = str_replace('.', '', $listScoreUnused[$i]["total"]);
                    // ScoreUnused
                    $scoreUnused = $scoreUnused + floor(intval($listScoreUnused[$i]["total"]) / $PriceOfUnit[0]['PriceScore']);
                }
            }
        }

        if (empty($score)) {
            $score = 0;
        }

        $selected1 = "";

        $selected2 = "";

        $selected3 = "";

        if ($row_ac['sex'] == 0) {
            $selected2 = "selected";
        }

        if ($row_ac['sex'] == 1) {
            $selected1 = "selected";
        }

        $adressformat = "";

        $selected4 = "selected";

        if (trim($row_ac['address']) != "") {
            list($text_address, $text_street, $text_ward, $text_chung_cu, $text_lau, $text_can_ho, $text_district, $text_city ) = split(' nanapet.com ', $row_ac['address']);

            $adressformat = $text_can_ho . ' ' . $text_lau . ' '
                    . $text_chung_cu . ' - ' . $text_address . ' '
                    . $text_street . ' ' . $text_ward . ' '
                    . $text_district . ' ' . $text_city;

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

            $selected4 = "";

            $selected5 = "selected";
        }

        $selected_city = "selected_" . $text_city;

        $disCountVIPCustomer = 0;

        // LAY THONG TIN DUOC KHUYEN MAI CUA KHACH HANG

        $Discount_honorUser = getDiscountOfCustomer($user);

        if (intval($Discount_honorUser) > 0) {
            $disCountVIPCustomer = (int) $Discount_honorUser;
        }
    } else {
        header('location:./?show=memberList&p=' . intval($_GET ['p'])
                . '&full_name=' . $_GET['full_name']
                . '&email_memeber=' . $_GET['email_memeber']
                . '&phone_memeber=' . $_GET['phone_memeber']);
    }
}

if (isset($_POST['cmd_submit_update_user']) && isset($_GET['id'])) {

    $number_address = $_POST['text_edit_number_address'];

    $number_street = $_POST['text_edit_number_street'];

    $number_street = str_replace("Đường", "", $number_street);

    $number_ward = $_POST['text_edit_number_ward'];

    $number_ward = str_replace("Phường", "", $number_ward);

    $buildings = $_POST['text_edit_number_address_Chung_Cu'];

    $floor = $_POST['text_edit_floor_Chung_Cu'];

    $room = $_POST['text_edit_room_Chung_Cu'];

    $number_city = $_POST['list_city_buy'];

    $number_district = $_POST['list_district_buy'];

    $email = input($_POST['email'], 1);

    $error = "";

    if (empty($number_address) || empty($number_street) || empty($number_ward) || $number_city == 'Chưa chọn tỉnh/thành' || $number_district == 'Chưa chọn quận/huyện' || empty($email)) {
        $error = "Chưa điền đầy đủ thông tin địa chỉ hoặc địa chỉ email. Cập nhật thất bại !";
    } else {
        $name = input($_POST['name'], 1);

        $phone = input($_POST['phone'], 1);

        $birthday = input(strtotime($_POST['birthday']), 1);

        // VI TRI CAN CHINH SUA KHI UPDATE DIA CHI CAN HO
        $address = trim($number_address) .
                ' nanapet.com Đường ' . trim($number_street) .
                ' nanapet.com Phường ' . trim($number_ward) .
                '  nanapet.com Chung cư/Tòa nhà ' . trim($buildings) .
                ' nanapet.com Lầu ' . trim($floor) .
                ' nanapet.com Căn hộ ' . trim($room) .
                ' nanapet.com ' . $number_district .
                ' nanapet.com ' . $number_city;

        $yahoo = "";

        $sex = input($_POST['gender']);

        $row_scores_email_again = GetOneRow("id", "user", "email = '" . $email . "'");

        $row_exist_user_in_score = GetOneRow("id", "scores", "email = '" . $email . "'");

        $sql = '';

        if ($email != $user && empty($row_scores_email_again)) { // Check email moi co ton tai hay khong
            $sql = " UPDATE user 
						 SET name ='" . $name . "',
							 email ='" . $email . "',
							 phone='" . $phone . "',
							 address='" . $address . "',
							 birthday ='" . $birthday . "',
							 sex = " . $sex . ",
							 yahoo ='" . $yahoo . "',
							 update_flag = 1
						 WHERE id = '$id'
						 AND   status >-1";
        } else if ($email == $user) {
            $sql = " UPDATE user 
						 SET name ='" . $name . "',
							 email ='" . $email . "',
							 phone='" . $phone . "',
							 address='" . $address . "',
							 birthday ='" . $birthday . "',
							 sex = " . $sex . ",
							 yahoo ='" . $yahoo . "',
							 update_flag = 1
						 WHERE id = '$id'
						 AND   status >-1";
        } else {
            $error = "Email này đã có người sử dụng. Cập nhật thất bại!";
        }

        $mysql->setQuery($sql);

        if ($mysql->query() && empty($error)) {
            // Thay doi email trong scores khach hang trong truong hop cap nhat email moi

            $row_scores = GetOneRow("id", "scores", "user = '" . $user . "'");

            if ($email != $user) { // Check co thay doi email mới
                if (!empty($row_scores)) {
                    $sql_score = "UPDATE scores 
									  SET user = '" . $email . "' 
									  WHERE id = " . $row_scores['id'];

                    $mysql->setQuery($sql_score);

                    $mysql->query();
                }
            }

            // CAP NHAT AWARD_SCORE
            if (!empty($row_scores)) {
                $sql_score = "UPDATE scores 
								  SET scoreaward = " . $_POST['awardscore'] . " 
								  WHERE id = " . $row_scores['id'];

                $mysql->setQuery($sql_score);

                $mysql->query();
            } else if (empty($row_scores)) {
                $sql_score = "INSERT INTO scores (user,score,honors,fee4Ever,scorelevel,scoreaward)
								  VALUES ('" . $email . "'," .
                        "0," .
                        "'Normal'," .
                        "'0'," .
                        "0," .
                        $_POST['awardscore'] . ")";

                $mysql->setQuery($sql_score);

                $mysql->query();
            }

            $usInfo = GetOneRow('id', 'user', 'id = ' . $id . ' and status > -1');

            $image = renameFile($_FILES["avatar"]["name"], 'nanapet-' . $usInfo['id']);

            //Resize ảnh và di chuyển vào thư mục

            if (move_uploaded_file($_FILES ["avatar"]["tmp_name"], '../../upload/avatar/' . $image)) {
                @imagejpeg(resize('../../upload/avatar/' . $image, 100, 120), '../../upload/avatar/' . $image);

                $sql_u = "UPDATE user 
							  SET avarta = '" . $image . "' 
							  WHERE id = '" . $id . "' and status >-1";

                $mysql->setQuery($sql_u);

                $mysql->query();
            }

            header('location:./?show=memberList&p=' . intval($_GET ['p'])
                    . '&full_name=' . $_GET['full_name']
                    . '&email_memeber=' . $_GET['email_memeber']
                    . '&phone_memeber=' . $_GET['phone_memeber']);
        }
    }
}

$title = "Cập nhật thành viên";

$xtemplate->path = 'com_user/';

$content = $xtemplate->load('memberUpdate');

$content = $xtemplate->replace($content, array(
    'title' => 'Cập nhật thông tin thành viên',
    'username' => $user,
    'phone' => $row_ac['phone'],
    'name' => $row_ac['name'],
    'email' => $row_ac['email'],
    'text_address' => $text_address,
    'text_street' => $text_street,
    'text_ward' => $text_ward,
    $selected_city => "selected",
    'district_value' => $text_district,
    'selected_district ' => $selected4,
    'selected_district_value' => $selected5,
    'address' => $adressformat,
    'text_address_Chung_Cu' => $text_chung_cu,
    'text_edit_floor_Chung_Cu' => $text_lau,
    'text_edit_room_Chung_Cu' => $text_can_ho,
    'birthday' => date("d-m-Y", $row_ac['birthday']),
    'yahoo' => $row_ac['yahoo'],
    'sex' => $row_ac['sex'],
    'score' => $score,
    'awardscore' => $awardscore,
    'unusedscore' => $scoreUnused,
    'avatar' => ($row_ac['avarta'] != '') ? $row_ac['avarta'] : 'default.png',
    'level' => $user_type,
    'selected1' => $selected1,
    'selected2' => $selected2,
    'selected3' => $selected3,
    'discount_level' => $disCountVIPCustomer . '%',
    'error' => $error,
        ));
?>