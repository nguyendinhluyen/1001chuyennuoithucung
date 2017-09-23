<?php
if (($_SESSION['username'] == '')) {
    $_SESSION['cart_login'] = 1;
    ?>
    <script>
        window.location = "<?php echo $linkS . 'dang-nhap'; ?>";
    </script>
    <?php
}
$user_infomation = $xtemplate->load('user_infomation_bootstrap');
if (isset($_SESSION['username'])) {
    $Product = new Product();
    $user = $_SESSION['username'];
    $row_ac = GetOneRow('email,'
            . 'name,'
            . 'phone,'
            . 'date,last_login,'
            . 'address,birthday,'
            . 'yahoo,'
            . 'sex,'
            . 'avarta', 'user', "email = '$user' AND status >-1");
    $scoreModel = new ScoreModel();
    $score = $scoreModel->getScoreByUser($user);
    if ($score == 0 || $score == '') {
        $score = 'Chưa có';
    }
    $scoreModel = new ScoreModel();

    // Get level
    $user_type = $scoreModel->getLevelByUser($user);
    if ($user_type == '') {
        $user_type = 'Normal';
    }
    $user_infomation = $xtemplate->replace($user_infomation, array(
        'name' => $row_ac['name'],
        'name_hello' => str_replace("(Chị) ", "", str_replace("(Anh) ", "", $row_ac['name'])),
        'avatar' => ($row_ac['avarta'] != '') ? $row_ac['avarta'] : 'default.png',
        'level' => $user_type,
        'score' => $score,
    ));

    // List favorite
    if ($_GET['flg'] == 1) {
        $tieude = "SẢN PHẨM ƯA THÍCH";
        if (isset($_POST['xoa'])) {
            $id_fav = $_POST['check_fav'];
            foreach ($id_fav as $val) {
                delete('tbl_favorite', 'id = ' . $val);
            }
        }

        if (isset($_POST['them'])) {
            // Add to card
            $Cart = new Cart();
            $id_fav = input($_POST['check_fav']);
            foreach ($id_fav as $val) {
                $quantity = $_POST['quantity' . $val];
                $fav_info = GetOneRow('product_key,'
                        . 'product_type,'
                        . 'product_color,'
                        . 'product_price', 'tbl_favorite', ' id = ' . $val);
                //0 add; 1 edit
                $Cart->addProduct($fav_info['product_key'], $fav_info['product_color'], $fav_info['product_type'], $fav_info['product_price'], $quantity, 0);
            }
            header('Location: ' . $linkS . 'gio-hang');
        }

        if (isset($_POST['luu'])) {
            $id_fav = $_POST['check_fav'];
            foreach ($id_fav as $val) {
                $quantity = $_POST['quantity' . $val];
                $data = array('product_quantity' => $quantity);
                update('tbl_favorite', $data, 'id = ' . $val);
            }
        }

        $myfavorites = $Product->getMyFavoriteByEmail($_SESSION['username']);
        $tpl_favorite = $xtemplate->load('favorite_product_bootstrap');
        $blocks = $xtemplate->get_block_from_str($tpl_favorite, 'LISTFAVIROTE');
        $tpl_fav_temp = '';
        $arrQuan = '[';
        $arrID = '[';
        foreach ($myfavorites as $val) {
            $arrQuan .= $val['product_quantity'] . ',';
            $arrID .= $val['id'] . ',';
            $product_de = $Product->getProductsByProductKey($val['product_key']);
            if (!empty($product_de)) {
                $tmp_fav = $xtemplate->assign_vars($blocks, array(
                    'product_name' => $val['product_name'],
                    'id_fav' => $val['id'],
                    'img_product' => $product_de['products_image'],
                    //'dacdiem' => $val['product_type'] . '<br/>' . $val['product_color'],
                    'giathanh' => $val['product_price'],
                    'khuyenmai' => ($product_de['product_encourage'] != '') ? $product_de['product_encourage'] : "0",
                ));
                $tpl_fav_temp .= $tmp_fav;
            }
        }
        $arrQuan = substr($arrQuan, 0, strlen($arrQuan) - 1);
        $arrID = substr($arrID, 0, strlen($arrID) - 1);
        $arrQuan .= ']';
        $arrID .= ']';
        $tpl_favorite = $xtemplate->assign_blocks_content($tpl_favorite, array(
            'LISTFAVIROTE' => $tpl_fav_temp,
        ));
        $tpl_favorite = $xtemplate->replace($tpl_favorite, array(
            'arrQuan' => $arrQuan,
            'arrID' => $arrID
        ));
        $breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
        $breadcrumbs_path .= ' &raquo; ' . 'Sản phẩm ưa thích';
        $title_page = 'Sản phẩm ưa thích';
        $user_infomation = $xtemplate->replace($user_infomation, array(
            'content_infomation' => $tpl_favorite,
        ));
    }

    // History
    if ($_GET['flg'] == 2) {
        if (isset($_GET["id_order"])) {
            $id_order = $_GET["id_order"];
            delete("order_detail", "id_order = " . $id_order);
            delete("tbl_order", "id = " . $id_order);
        }

        $tieude = "ĐƠN HÀNG CỦA BẠN";
        $orderCart = $xtemplate->load('history_order_bootstrap');
        $user = $_SESSION['username'];
        $userS = new User();
        $orders = $userS->getOrderByUser($user);
        $block = $xtemplate->get_block_from_str($orderCart, 'ORDER');
        $tpl_temp = '';
        foreach ($orders as $value) {
            $edit_html = '';
            if ($value['status'] == 0) {
                $edit_html = '<div class="edit"><a target="_blank" href="'
                        . $linkS . 'gio-hang.html/edit/'
                        . $value['id'] . '">Sửa</a> | <a href="'
                        . $linkS . 'danh-sach-don-hang.d/'
                        . $value['id'] . '" onclick="return xoa();">Xóa</a></div>';
            }
            $tpl_temp .= $xtemplate->assign_vars($block, array(
                'madonhang' => $value['id'],
                'ngaydat' => date('Y-m-d', $value['order_date']),
                'tongtien' => $value['total'],
                'trangthai' => ($value['status'] == 1) ? 'Đã giao hàng' : 'Chưa giao hàng',
                'edit_html' => $edit_html,
            ));
        }
        $orderCart = $xtemplate->assign_blocks_content($orderCart, array(
            'ORDER' => $tpl_temp
        ));
        $orderCart = $xtemplate->replace($orderCart, array(
            'user' => $user,
        ));
        $breadcrumbs_path = '<a href="{linkS}">'.$pageName.'</a>';
        $breadcrumbs_path .= ' &raquo; ' . 'Đơn hàng của bạn';
        $title_page = 'Đơn hàng của bạn';
        $user_infomation = $xtemplate->replace($user_infomation, array(
            'content_infomation' => $orderCart,
        ));
    }

    // Pet list
    if ($_GET['flg'] == 3) {
        $tieude = "THÚ CƯNG CỦA BẠN";
        $finish = input($_GET['finish']);
        if (($_SESSION['username'] == '')) {
            header('Location: ' . $linkS . 'dang-nhap');
        }
        $Pet = new Pet();
        if (isset($_GET['del'])) {
            $id_pet = input($_GET['id_pet']);
            $Pet->removePet($id_pet);
            header('Location: ' . $linkS . 'thu-cung-cua-toi');
        }
        $re_pet_profile = $xtemplate->load('list_pet_profile_bootstrap');
        $breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
        $breadcrumbs_path .= ' &raquo; ' . 'Thú cưng của bạn';
        $title_page = 'Thú cưng của bạn';
        $blocks = $xtemplate->get_block_from_str($re_pet_profile, 'PET');
        $pets = $Pet->getListPetByUser($_SESSION['username']);
        $n = count($pets);
        $tpl_pets = '';
        foreach ($pets as $pet) {
            $sex = 'Đực';
            if ($pet['sex'] == '0') {
                $sex = 'Cái';
            }
            $tpl = $xtemplate->assign_vars($blocks, array(
                'tenpet' => $pet['name'],
                'loai' => $pet['species'],
                'ngaysinh' => date("d-m-Y", $pet['birthday']),
                'chieucao' => $pet['height'],
                'cannang' => $pet['weight'],
                'mausac' => $pet['color'],
                'image_pet' => $pet['image'],
                'gioitinh' => $sex,
                'id_pet' => $pet['id']
            ));
            $tpl_pets .= $tpl;
        }
        $re_pet_profile = $xtemplate->assign_blocks_content($re_pet_profile, array(
            'PETS' => $tpl_pets,
        ));
        $user_infomation = $xtemplate->replace($user_infomation, array(
            'content_infomation' => $re_pet_profile,
        ));
    }

    // List address
    if ($_GET['flg'] == 4) {
        $tieude = "SỔ ĐỊA CHỈ";
        if (isset($_GET['up'])) {
            if ($_GET['up'] == '2') {
                delete('tbl_contact_list', 'id = ' . $_GET['id_contact']);
                ?>
                <script>
                    window.location = "<?php echo $linkS . 'so-dia-chi'; ?>";
                </script>
                <?php
            }
            if (isset($_POST['save'])) {
                // Address information
                $number_address = $_POST['text_edit_number_address'];
                $number_street = $_POST['text_edit_number_street'];
                $number_ward = $_POST['text_edit_number_ward'];
                $number_ward = str_replace("Phường", "", $number_ward);
                $buildings = $_POST['text_edit_number_address_Chung_Cu'];
                $floor = $_POST['text_edit_floor_Chung_Cu'];
                $room = $_POST['text_edit_room_Chung_Cu'];
                $number_city = $_POST['list_city_buy'];
                $number_district = $_POST['list_district_buy'];
                if ($number_address == '' || $number_street == '' || $number_ward == '' || $number_city == 'Chưa chọn tỉnh/thành' || $number_district == 'Chưa chọn quận/huyện') {
                    $street = "";
                    $id_contact = $_GET['id_contact'];
                    $infAdd = GetOneRow('id,street,city,phone', 'tbl_contact_list', 'id = ' . $id_contact);
                    $contact_ed = $xtemplate->load('contact_ed_bootstrap');
                    list($text_address,
                            $text_street,
                            $text_ward,
                            $text_chung_cu,
                            $text_lau,
                            $text_can_ho,
                            $text_district,
                            $text_city) = split(' nanapet.com ', $infAdd['street']);
                    $text_street = str_replace("Đường ", "", $text_street);
                    $text_ward = str_replace("Phường ", "", $text_ward);
                    $selected_city = "selected_" . $text_city;
                    $text_chung_cu = str_replace("Chung cư/Tòa nhà ", "", $text_chung_cu);
                    $text_lau = str_replace("Lầu ", "", $text_lau);
                    $text_can_ho = str_replace("Căn hộ ", "", $text_can_ho);
                    $contact_ed = $xtemplate->replace($contact_ed, array(
                        'text_address' => $text_address,
                        'text_street' => $text_street,
                        'text_ward' => $text_ward,
                        'text_address_Chung_Cu' => $text_chung_cu,
                        'text_edit_floor_Chung_Cu' => $text_lau,
                        'text_edit_room_Chung_Cu' => $text_can_ho,
                        $selected_city => "selected",
                        'district_value' => $text_district,
                        'selected_district_value' => "selected",
                        'id_contact' => $id_contact,
                        'title_pag' => "Chưa điền / chọn đầy đủ thông tin địa chỉ."
                    ));
                    $user_infomation = $xtemplate->replace($user_infomation, array(
                        'content_infomation' => $contact_ed,
                    ));
                } else {
                    $street = trim($number_address)
                            . ' nanapet.com Đường ' . trim($number_street)
                            . ' nanapet.com Phường ' . trim($number_ward)
                            . '  nanapet.com Chung cư/Tòa nhà ' . trim($buildings)
                            . ' nanapet.com Lầu ' . trim($floor)
                            . ' nanapet.com Căn hộ ' . trim($room)
                            . ' nanapet.com ' . $number_district
                            . ' nanapet.com ' . $number_city;
                    $dataUp = array(
                        'street' => $street,
                        'city' => "",
                        'phone' => ""
                    );
                    $dataIns = array(
                        'street' => $street,
                        'city' => "",
                        'phone' => "",
                        'user' => $_SESSION['username'],
                    );
                    if ($_POST['id_contact'] != '') {
                        update('tbl_contact_list', $dataUp, 'id = ' . $_POST['id_contact']);
                        ?>
                        <script>
                            alert('Cập nhật địa chỉ thành công.');
                            window.location = "<?php echo $linkS . 'so-dia-chi'; ?>";
                        </script>
                        <?php
                    } else {
                        insert('tbl_contact_list', $dataIns);
                        ?>
                        <script>
                            alert('Thêm địa chỉ thành công.');
                            window.location = "<?php echo $linkS . 'so-dia-chi'; ?>";
                        </script>
                        <?php
                    }
                }
            }

            $id_contact = $_GET['id_contact'];
            $title_pag = "Thêm địa chỉ";
            if ($id_contact != '') {
                $title_pag = "Sửa địa chỉ";
                $infAdd = GetOneRow('id,street,city,phone', 'tbl_contact_list', 'id = ' . $id_contact);
            }
            $contact_ed = $xtemplate->load('contact_ed_bootstrap');
            list($text_address,
                    $text_street,
                    $text_ward,
                    $text_chung_cu,
                    $text_lau,
                    $text_can_ho,
                    $text_district,
                    $text_city) = split(' nanapet.com ', $infAdd['street']);
            $text_street = str_replace("Đường ", "", $text_street);
            $text_ward = str_replace("Phường ", "", $text_ward);
            $selected_city = "selected_" . $text_city;
            $text_chung_cu = str_replace("Chung cư/Tòa nhà ", "", $text_chung_cu);
            $text_lau = str_replace("Lầu ", "", $text_lau);
            $text_can_ho = str_replace("Căn hộ ", "", $text_can_ho);
            $contact_ed = $xtemplate->replace($contact_ed, array(
                'text_address' => $text_address,
                'text_street' => $text_street,
                'text_ward' => $text_ward,
                'district_value' => $text_district,
                'selected_district_value' => "selected",
                'text_address_Chung_Cu' => $text_chung_cu,
                'text_edit_floor_Chung_Cu' => $text_lau,
                'text_edit_room_Chung_Cu' => $text_can_ho,
                'id_contact' => $id_contact,
                'title_pag' => $title_pag,
                $selected_city => "selected"
            ));
            $user_infomation = $xtemplate->replace($user_infomation, array(
                'content_infomation' => $contact_ed,
            ));
        } else {
            $user = $_SESSION['username'];
            $contact_list = $xtemplate->load('contact_list_bootstrap');
            $listAdd1 = '';
            $listAdd2 = '';
            $listAdd = GetRows('id,street,city,phone', 'tbl_contact_list', 'user = "' . $user . '"');
            $n = count($listAdd);
            $ndiv2 = ceil($n / 2);
            for ($i = 0; $i < $n; $i++) {
                list($text_address,
                        $text_street,
                        $text_ward,
                        $text_chung_cu,
                        $text_lau,
                        $text_can_ho,
                        $text_district,
                        $text_city ) = split(' nanapet.com ', $listAdd[$i]['street']);
                $adressformat = $text_can_ho . ' '
                        . $text_lau . ' '
                        . $text_chung_cu . ' - '
                        . $text_address . ' '
                        . $text_street . ' '
                        . $text_ward . ' '
                        . $text_district . ' '
                        . $text_city;
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
                $listAdd[$i]['street'] = $adressformat;
                if ($i < $ndiv2) {
                    $tpl1 = '<div style="line-height:30px;
                                        width:100%;
                                        font-family: RobotoSlabRegular"> 
                                <div><b>Địa chỉ ' . ($i + 1) . '</b></div>
                                <div>' . $listAdd[$i]['street'] . '</div>
                                <div>' . $listAdd[$i]['city'] . '</div>
                                <div><a href="' . $linkS . 'sua-dia-chi.chm/'
                            . $listAdd[$i]['id']
                            . '">Chỉnh sửa</a> | <a onclick="return deleteContact();" href="xoa-dia-chi-'
                            . $listAdd[$i]['id'] . '.chm">Xóa</a></div>
                            </div>';
                    $listAdd1 .= $tpl1;
                } else {
                    $tpl2 = '<div style="line-height:30px;
                                        width:100%;
                                        font-family: RobotoSlabRegular"> 
                                <div><b>Địa chỉ ' . ($i + 1) . '</b></div>
                                <div>' . $listAdd[$i]['street'] . '</div>
                                <div>' . $listAdd[$i]['city'] . '</div>
                                <div><a href="' . $linkS . 'sua-dia-chi.chm/'
                            . $listAdd[$i]['id']
                            . '">Chỉnh sửa</a> | <a onclick="return deleteContact();" href="xoa-dia-chi-'
                            . $listAdd[$i]['id'] . '.chm">Xóa</a></div>    
                            </div>';
                    $listAdd2 .= $tpl2;
                }
            }
            $row_ac = GetOneRow('email,'
                    . 'name,'
                    . 'phone,'
                    . 'date,'
                    . 'last_login,'
                    . 'address,'
                    . 'birthday,'
                    . 'yahoo,'
                    . 'sex,'
                    . 'avarta'
                    , 'user'
                    , "email = '$user' AND status >-1");
            list($text_address,
                    $text_street,
                    $text_ward,
                    $text_chung_cu,
                    $text_lau,
                    $text_can_ho,
                    $text_district,
                    $text_city) = split(' nanapet.com ', $row_ac['address']);
            $adressformat = $text_can_ho . ' '
                    . $text_lau . ' '
                    . $text_chung_cu . ' - '
                    . $text_address . ' '
                    . $text_street . ' '
                    . $text_ward . ' '
                    . $text_district . ' '
                    . $text_city;
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
            $contact_list = $xtemplate->replace($contact_list, array(
                'name' => $row_ac['name'],
                'address' => $adressformat,
                'phone' => $row_ac['phone'],
                'listAdd1' => $listAdd1,
                'listAdd2' => $listAdd2
            ));
            $user_infomation = $xtemplate->replace($user_infomation, array(
                'content_infomation' => $contact_list,
            ));
        }
        $breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
        $breadcrumbs_path .= ' &raquo; ' . 'Sổ địa chỉ';
        $title_page = 'Sổ địa chỉ';
    }

    // List products
    if ($_GET['flg'] == 5) {
        $tieude = "SẢN PHẨM TÔI ĐÁNH GIÁ";
        $tplComment = $xtemplate->load('loadCommentUsr');
        $arrComment = GetRows('u.id_product,'
                . 'u.comment,'
                . 'u.date_comment,'
                . 'u.user,'
                . 'r.rate'
                , 'user_comment u, rate_product r'
                , 'u.user = "' . $_SESSION['username']
                . '" AND u.id_product = r.product_id '
                . 'AND u.user = r.user '
                . 'AND r.rate > 0 GROUP BY u.id_product ORDER BY u.date_comment DESC');
        $blockComment = $xtemplate->get_block_from_str($tplComment, 'COMMENT');
        $tpl = '';
        if (!empty($arrComment)) {
            $n = count($arrComment);
            for ($i = 0; $i < $n; $i++) {
                $rate = $arrComment[$i]['rate'];
                $rate_round = round($rate);
                $listrate = '';
                $m = $rate;
                if ($rate_round > $rate) {
                    $m = $rate_round - 1;
                }
                for ($j = 0; $j < $m; $j++) {
                    $listrate .= "<img src='" . $linkS . "layout/images/star.png' />";
                }
                if ($rate_round > $rate) {
                    $listrate .= "<img src='" . $linkS . "layout/images/star_half.png' />";
                }
                $product = GetOneRow('products_name'
                        , 'products'
                        , 'products_id = ' . $arrComment[$i]['id_product']);
                $name_date = $listrate . '<b> cho sản phẩm '
                        . $product['products_name']
                        . ' (ngày ' . date("d/m/Y", $arrComment[$i]['date_comment']) . ') </b>';
                $tpl.= $xtemplate->assign_vars($blockComment, array(
                    'name_date' => $name_date,
                    'comment' => $arrComment[$i]['comment'],
                ));
            }
        }
        $dataComment = $xtemplate->assign_blocks_content($tplComment, array(
            'COMMENT' => $tpl
        ));
        $user_infomation = $xtemplate->replace($user_infomation, array(
            'content_infomation' => $dataComment,
        ));
        $breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';
        $breadcrumbs_path .= ' &raquo; ' . 'Sản phẩm tôi đánh giá';
        $title_page = 'Sản phẩm tôi đánh giá';
    }
} else {
    ?>
    <script>
        alert('Bạn chưa đăng nhập. Mời bạn đăng nhập.');
        window.location = "dang-nhap";
    </script>
    <?php
}
$user_infomation = $xtemplate->replace($user_infomation, array(
    'tieude' => $tieude,
        ));
$content = $user_infomation;
?>