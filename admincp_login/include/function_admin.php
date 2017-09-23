<?php

function selectBrandProductNameList($brand_name) {
    global $mysql;
    $sql = "SELECT adver_id, adver_webname
            FROM ads
            WHERE adver_status = '1' OR adver_status = '0' ORDER BY adver_webname";
    $mysql->setQuery($sql);
    $result = $mysql->query();
    $flag_band_product_name = 0;
    $select = '<select name="brandnamelist" id="brandnamelist">';
    while ($row = mysql_fetch_assoc($result)) {
        if ($brand_name !== $row['adver_webname']) {
            $select .= '<option value = "' . $row['adver_webname']
                    . '">' . $row['adver_webname'] . '</option>';
        } else {
            $flag_band_product_name = 1;
            $select .= '<option value = "' . $row['adver_webname']
                    . '" selected="selected">' . $row['adver_webname'] . '</option>';
        }
    }
    if ($flag_band_product_name == 0) {
        $select .= '<option value = "' . $row['adver_webname']
                . '" selected="selected">' . $row['adver_webname'] . '</option>';
    }
    $select .= '</select>';
    return $select;
}

function selectRow($f, $table, $where) {
    global $mysql;
    $sql = "SELECT " . $f . " FROM " . $table . ' WHERE ' . $where;
    $mysql->setQuery($sql);
    $mysql->query();
    return $mysql->loadAllRow();
}

function deleteRow($table, $where) {
    global $mysql;
    $sql = "DELETE FROM " . $table . ' WHERE ' . $where;
    $mysql->setQuery($sql);
    $mysql->query();
}

function deleteImg($path, $arr_img, $f) {
    for ($i = 0; $i < count($arr_img); ++$i) {
        if (file_exists($path . $arr_img[$i][$f])) {
            @unlink($path . $arr_img[$i][$f]);
        }
    }
}

function countRow($f, $table, $where) {
    global $mysql;
    $sql = "SELECT " . $f . " FROM " . $table . ' WHERE ' . $where;
    $mysql->setQuery($sql);
    $mysql->query();
    return $mysql->getNumRows();
}

function getGroup($id, $width = 200) {
    global $mysql;
    $select = "<select name='group' style='width:" . $width . "px'>";
    $mysql->setQuery("select group_id,group_name from user_group");
    $result = $mysql->query();
    while ($row = mysql_fetch_assoc($result)) {
        if ($id == $row['group_id']) {
            $select .= "<option value='" . $row['group_id'] . "' selected>"
                    . $row['group_name'] . "</option>";
        } else {
            $select .= "<option value='" . $row['group_id'] . "'>"
                    . $row['group_name'] . "</option>";
        }
    }
    $select .= "</select>";
    return $select;
}

function check_cats_name($catname, $id, $parent_id) {
    return checkExit('categories_id', 'categories', "categories_name = '" . $catname
            . "' and language ='" . $_SESSION['lag']
            . "' and categories_id<>" . $id);
}

function check_cats_name_libary($catname, $id) {
    return checkExit('categorieslibary_id', 'categorieslibary', "categorieslibary_name = '" . $catname
            . "' AND languagelibary ='" . $_SESSION['lag']
            . "' AND categorieslibary_id <>" . $id);
}

function check_cats_name_help($catname, $id) {
    return checkExit('categorieshelp_id', 'categorieshelp', "categorieshelp_name = '" . $catname
            . "' AND languagehelp ='" . $_SESSION['lag']
            . "' AND categorieshelp_id <>" . $id);
}

function check_cats_name_introduce($catname, $id, $parent_id) {
    return checkExit('categoriesintroduce_id', 'categoriesintroduce', "categoriesintroduce_name = '" . $catname
            . "' AND languageintroduce ='" . $_SESSION['lag']
            . "' AND categoriesintroduce_id <>" . $id);
}

function check_cats_name_adoption($catname, $id) {
    return checkExit('categoriesadoption_id', 'categoriesadoption', "categoriesadoption_name = '" . $catname
            . "' AND languageadoption ='" . $_SESSION['lag']
            . "' AND categoriesadoption_id <>" . $id);
}

function check_cats_name_news($catname, $id) {
    return checkExit('categories_id', 'news_catalogue', "categories_name = '" . $catname . "' and language ='"
            . $_SESSION['lag'] . "' and categories_id<>" . $id);
}

function check_id_website($id) {
    return checkExit('id', 'website', "id = '" . $id . "'");
}

function check_valid($id) {
    return checkExit("categories_id", "categories", "categories_id = '" . $id
            . "' AND language ='" . $_SESSION['lag'] . "'");
}

function check_valid_libary($id) {
    return checkExit("categorieslibary_id", "categorieslibary", "categorieslibary_id = '" . $id
            . "' AND languagelibary ='" . $_SESSION['lag'] . "'");
}

function check_valid_help($id) {
    return checkExit("categorieshelp_id", "categorieshelp", "categorieshelp_id = '" . $id
            . "' AND languagehelp ='" . $_SESSION['lag'] . "'");
}

function check_valid_introduce($id) {
    return checkExit("categoriesintroduce_id", "categoriesintroduce", "categoriesintroduce_id = '" . $id
            . "' AND languageintroduce ='" . $_SESSION['lag'] . "'");
}

function check_valid_adoption($id) {
    return checkExit("categoriesadoption_id", "categoriesadoption", "categoriesadoption_id = '" . $id
            . "' AND languageadoption ='" . $_SESSION['lag'] . "'");
}

function check_id_user($id) {
    return checkExit('id', 'user', "id = '" . $id . "'");
}

function check_valid_cats_news($id) {
    return checkExit('categories_id', 'news_catalogue', "categories_id = '" . $id
            . "' and language ='" . $_SESSION['lag'] . "'");
}

function check_id_product($id) {
    return checkExit('products_id', 'products', "products_id  = '" . $id
            . "' and language ='" . $_SESSION['lag']
            . "'");
}

function check_id_news($id) {
    return checkExit('news_id', 'news', "news_id  = '" . $id
            . "' and language ='" . $_SESSION['lag'] . "'");
}

function check_id_news_introduce($id) {
    return checkExit('newsintroduce_id', 'news_introduce', "newsintroduce_id  = '" . $id
            . "' and languageintroduce ='" . $_SESSION['lag'] . "'");
}

function check_id_news_adoption($id) {
    return checkExit('newsadoption_id', 'news_adoption', "newsadoption_id  = '" . $id
            . "' and languageadoption ='" . $_SESSION['lag'] . "'");
}

function check_id_provider($id) {
    return checkExit('providers_id', 'support', 'providers_id = ' . $id);
}

function check_id_content($id) {
    return checkExit('content_id', 'contents', "content_id = '" . $id
            . "' and language ='" . $_SESSION['lag'] . "'");
}

function getLevel($id) {
    global $mysql;
    $mysql->setQuery("SELECT level 
                    FROM categories 
                    WHERE categories_id='" . $id . "'");
    $mysql->query();
    $row = $mysql->loadOneRow();
    return $row['level'];
}

function getLevel_libary($id) {
    global $mysql;
    $mysql->setQuery("SELECT levellibary
                    FROM categorieslibary
                    WHERE categorieslibary_id = '" . $id . "'");
    $mysql->query();
    $row = $mysql->loadOneRow();
    return $row['levellibary'];
}

function getLevel_help($id) {
    global $mysql;
    $mysql->setQuery("SELECT levelhelp 
                    FROM categorieshelp 
                    WHERE categorieshelp_id='" . $id . "'");
    $mysql->query();
    $row = $mysql->loadOneRow();
    return $row['levelhelp'];
}

function getLevel_introduce($id) {
    global $mysql;
    $mysql->setQuery("SELECT levelintroduce 
                    FROM categoriesintroduce 
                    WHERE categoriesintroduce_id ='" . $id . "'");
    $mysql->query();
    $row = $mysql->loadOneRow();
    return $row['levelintroduce'];
}

function getLevel_adoption($id) {
    global $mysql;
    $mysql->setQuery("SELECT leveladoption
                    FROM categoriesadoption
                    WHERE categoriesadoption_id ='" . $id . "'");
    $mysql->query();
    $row = $mysql->loadOneRow();
    return $row['leveladoption'];
}

function checkuser($username, $id) {

    return checkExit('username', 'user', "id <>'" . $id . "' and username ='" . $username . "'");
}

function check_id_game($id) {

    return checkExit('adver_id', 'game', 'adver_id = ' . $id);
}

function check_id_adver($id) {

    return checkExit('adver_id', 'adver', 'adver_id = ' . $id);
}

function check_id_adver2($id) {

    return checkExit('adver_id', 'ads', 'adver_id = ' . $id);
}

function listpost($id = '') {
    $arr_pos = array('1' => 'Bên trái', '2' => 'Bên phải');

    if (!empty($id)) {
        return $arr_pos[$id];
    } else
        return $arr_pos;
}

function catalogue_pos($id) {
    $arr_pos = listpost();

    $select = "<select name ='pos'>";

    $n = count($arr_pos);

    for ($i = 1; $i <= $n; ++$i) {
        if ($id == $i) {
            $select .= "<option value='" . $i . "' selected>" . $arr_pos[$i]
                    . "</option>";
        } else {
            $select .= "<option value='" . $i . "'>" . $arr_pos[$i]
                    . "</option>";
        }
    }

    $select .= "</select>";

    return $select;
}

function catlist($id) {
    global $mysql;

    $sql = "SELECT categories_id,categories_name 
			FROM categories 
			WHERE level = 1 AND language = '"
            . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'catlist' id = 'catlist' size='10' style='width:335px' ";

    while ($row = mysql_fetch_assoc($result)) {

        $sql2 = "SELECT categories_id,categories_name 
				 FROM categories 
				 WHERE level = 2 AND parent_id ='" . $row['categories_id']
                . "' and language = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            $select .= "<optgroup label='" . $row['categories_name'] . "'>";

            while ($row2 = mysql_fetch_assoc($result2)) {
                if ($id == $row2['categories_id'])
                    $select .= "<option value ='" . $row2['categories_id'] . "' selected>"
                            . $row2['categories_name'] .
                            "</option>";
                else
                    $select .= "<option value ='" . $row2['categories_id'] . "'>"
                            . $row2['categories_name'] .
                            "</option>";
            }

            $select .= "</optgroup>";
        }
        else {
            if ($id == $row['categories_id'])
                $select .= "<option value ='" . $row['categories_id'] . "' selected>"
                        . $row['categories_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row['categories_id'] . "'>"
                        . $row['categories_name'] .
                        "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function CatlistUpgrade($id) {
    $array_category = split(",", $id);
    global $mysql;
    $sql = "SELECT categories_id , categories_name 
            FROM categories 
            WHERE level = 1 AND categories_status = '1'
                            AND language = '" . $_SESSION['lag'] . "' ORDER BY sort_order ASC";
    $mysql->setQuery($sql);
    $result = $mysql->query();
    $select = "<div class='multiselect'>";
    while ($row = mysql_fetch_assoc($result)) {
        $sql2 = "SELECT categories_id,categories_name 
                FROM categories 
                WHERE level = 2 AND categories_status = '1'
                                AND parent_id ='" . $row['categories_id']
                . "' AND language = '" . $_SESSION['lag'] . "' ORDER BY sort_order ASC";
        $mysql->setQuery($sql2);
        $result2 = $mysql->query();
        if (mysql_num_rows($result2) > 0) {
            $select .= "<label style='width:350px'> <b>" . $row['categories_name'] . "</b></label>";
            while ($row2 = mysql_fetch_assoc($result2)) {
                $flag = 0;
                for ($i = 0; $i < count($array_category); $i++) {
                    if ($array_category[$i] == $row2['categories_id']) {
                        $select .= "<label style = 'width:300px'>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input checked type='checkbox' 										  
                                               name='option[]' 
                                               value='" . $row2['categories_id'] . "'/>" .
                                $row2['categories_name']
                                . "</label> ";
                        $flag = 1;
                    }
                }
                if ($flag == 0) {
                    $select .="<label style = 'width:300px'>	
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='checkbox' 										  
                                       name='option[]' 
                                       value='" . $row2['categories_id'] . "'/>" .
                            $row2['categories_name']
                            . "</label> ";
                }
            }
        } else {
            $flag = 0;
            for ($i = 0; $i < count($array_category); $i++) {
                if ($array_category[$i] == $row['categories_id']) {
                    $select .= "<label style = 'width:300px'>	
                        <input checked type='checkbox' 										  
                                   name='option[]' 
                                   value='" . $row['categories_id'] . "'/>" .
                            "<b>" . $row['categories_name'] . "</b>"
                            . "</label> ";
                    $flag = 1;
                }
            }

            if ($flag == 0) {
                $select .= "<label style = 'width:300px'>	
                        <input type='checkbox' 										  
                                   name='option[]' 
                                   value='" . $row['categories_id'] . "'/>" .
                        "<b>" . $row['categories_name'] . "</b>"
                        . "</label> ";
            }
        }
    }
    $select .= "</div>";
    return $select;
}

function CatlistCoupon($id) {
    $array_category = split(",", $id);

    global $mysql;

    $sql = "SELECT categories_id , categories_name
			FROM categories
			WHERE level = 1 AND categories_status = '1' AND language = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<div class='multiselect' id='multiselect'> ";

    $select .= "<label style = 'width:300px'>
                    <input type='checkbox'
                           name='all'
                           value='all'
                           id = 'all'/>" . "<b>Tất cả</b>" . "</label>"
            . "</label> ";
    while ($row = mysql_fetch_assoc($result)) {
        $sql2 = "SELECT categories_id,categories_name
				 FROM categories
				 WHERE level = 2 AND categories_status = '1' AND parent_id ='" . $row['categories_id']
                . "' AND language = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        $flag = 1;
        if (mysql_num_rows($result2) > 0) {
            $select .= "<label style='width:350px'> <b>" . $row['categories_name'] . "</b></label>";

            while ($row2 = mysql_fetch_assoc($result2)) {
                $flag = 0;

                for ($i = 0; $i < count($array_category); $i++) {
                    if ($array_category[$i] == $row2['categories_id']) {
                        $select .= "<label style = 'width:300px'>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input checked type='checkbox'
											   name ='option[]'
											   id = 'option[]'
											   value='" . $row2['categories_id'] . "'/>" .
                                $row2['categories_name']
                                . "</label> ";
                        $flag = 1;
                    }
                }

                if ($flag == 0) {
                    $select .="<label style = 'width:300px'>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type='checkbox'
										   name='option[]'
										   value='" . $row2['categories_id'] . "'/>" .
                            $row2['categories_name']
                            . "</label> ";
                }
            }
        } else {
            $flag = 0;

            for ($i = 0; $i < count($array_category); $i++) {
                if ($array_category[$i] == $row['categories_id']) {
                    $select .= "<label style = 'width:300px'>
									<input checked type='checkbox'
										   name='option[]'
										   value='" . $row['categories_id'] . "'/>" .
                            "<b>" . $row['categories_name'] . "</b>"
                            . "</label> ";
                    $flag = 1;
                }
            }

            if ($flag == 0) {
                $select .= "<label style = 'width:300px'>
								<input type='checkbox'
									   name='option[]'
									   value='" . $row['categories_id'] . "'/>" .
                        "<b>" . $row['categories_name'] . "</b>"
                        . "</label> ";
            }
        }
    }

    $select .= "</div>";

    return $select;
}

function CouponList() {
    global $mysql;

    $sql = "SELECT id_coupon ,
                   name_coupon,
                   code_coupon
			FROM coupon
			WHERE status_coupon='1' AND (customer_email_coupon IS NULL OR customer_email_coupon ='')";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<div class='multiselect' id='multiselect'> ";

    $select .= "<label style = 'width:300px'>
                    <input type='checkbox'
                           name='all'
                           value='all'
                           id = 'all'/>" . "<b>Tất cả</b>" . "</label>"
            . "</label> ";
    while ($row = mysql_fetch_assoc($result)) {

        $select .= "<label style = 'width:300px'>
                        <input type='checkbox'
                               name='option[]'
                               value='" . $row['id_coupon'] . "'/>" .
                $row['name_coupon'] . " - Mã " . $row['code_coupon']
                . "</label> ";
    }

    $select .= "</div>";

    return $select;
}

function CatlistUpgrade_2($id) {
    $array_category = split(",", $id);

    global $mysql;

    $sql = "SELECT categories_id , categories_name
			FROM categories
			WHERE level = 1 AND categories_status = '1' AND language = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<div class='multiselect'>";

    while ($row = mysql_fetch_assoc($result)) {
        $flag = true;

        $sql2 = "SELECT categories_id,categories_name
				 FROM categories
				 WHERE level = 2 AND categories_status = '1' AND parent_id ='" . $row['categories_id']
                . "' AND language = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            while ($row2 = mysql_fetch_assoc($result2)) {
                for ($i = 0; $i < count($array_category); $i++) {
                    if ($array_category[$i] == $row2['categories_id']) {
                        if ($flag == true) {
                            $select .= "<label style='width:300px'> <b>" . $row['categories_name'] . "</b></label>";

                            $flag = false;
                        }
                        $select .= "<label style = 'width:300px'>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .
                                $row2['categories_name']
                                . "</label> ";
                    }
                }
            }
        } else {
            for ($i = 0; $i < count($array_category); $i++) {
                if ($array_category[$i] == $row['categories_id']) {
                    $select .= "<label style = 'width:300px'>" .
                            "<b>" . $row['categories_name'] . "</b>"
                            . "</label> ";
                }
            }
        }
    }

    $select .= "</div>";

    return $select;
}

function CatlistNoCheckBox($id) {
    $array_category = split(",", $id);

    global $mysql;

    $sql = "SELECT categories_id , categories_name
			FROM categories
			WHERE level = 1 AND language = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<div class='multiselect'>";

    while ($row = mysql_fetch_assoc($result)) {
        $flag = true;

        $sql2 = "SELECT categories_id,categories_name
				 FROM categories
				 WHERE level = 2 AND parent_id ='" . $row['categories_id']
                . "' and language = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            while ($row2 = mysql_fetch_assoc($result2)) {
                for ($i = 0; $i < count($array_category); $i++) {
                    if ($array_category[$i] == $row2['categories_id']) {
                        if ($flag == true) {
                            $select .= "<label style='width:300px'> <b>" . $row['categories_name'] . "</b></label>";

                            $flag = false;
                        }
                        $select .= "<label style = 'width:300px'>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .
                                $row2['categories_name']
                                . "</label> ";
                    }
                }
            }
        } else {
            for ($i = 0; $i < count($array_category); $i++) {
                if ($array_category[$i] == $row['categories_id']) {
                    $select .= "<label style = 'width:300px'>" .
                            "<b>" . $row['categories_name'] . "</b>"
                            . "</label> ";
                }
            }
        }
    }

    $select .= "</div>";

    return $select;
}

function CatlistCouponSendMail($id) {
    $array_category = split(",", $id);

    global $mysql;

    $sql = "SELECT categories_id , categories_name
			FROM categories
			WHERE level = 1 AND language = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<div class='multiselect'>";

    while ($row = mysql_fetch_assoc($result)) {
        $flag = true;

        $sql2 = "SELECT categories_id,categories_name
				 FROM categories
				 WHERE level = 2 AND parent_id ='" . $row['categories_id']
                . "' AND language = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            while ($row2 = mysql_fetch_assoc($result2)) {
                for ($i = 0; $i < count($array_category); $i++) {
                    if ($array_category[$i] == $row2['categories_id']) {
                        if ($flag == true) {
                            $select .= "<label style='width:auto'>" . $row['categories_name'] . "</label>" . " ";

                            $flag = false;
                        }
                        $select .= "<label style = 'width:auto'>"
                                . $row2['categories_name']
                                . "</label>" . " ";
                    }
                }
            }
        } else {
            for ($i = 0; $i < count($array_category); $i++) {
                if ($array_category[$i] == $row['categories_id']) {
                    $select .= "<label style = 'width:auto'>"
                            . $row['categories_name']
                            . "</label>" . " ";
                }
            }
        }
    }

    $select .= "</div>";

    return $select;
}

function catlist_libary($id) {
    global $mysql;

    $sql = "SELECT 
					categorieslibary_id,
					categorieslibary_name 
			FROM 
					categorieslibary 
			WHERE 
					levellibary = 1 AND languagelibary = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'catlist' id = 'catlist'>";

    while ($row = mysql_fetch_assoc($result)) {
        $sql2 = "SELECT
						categorieslibary_id,
						categorieslibary_name
				FROM
						categorieslibary 
				WHERE 	levellibary = 2
						AND parentlibary_id ='" . $row['categorieslibary_id'] . "'
						AND languagelibary = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            $select .= "<optgroup label='" . $row['categorieslibary_name'] . "'>";

            while ($row2 = mysql_fetch_assoc($result2)) {
                if ($id == $row2['categorieslibary_id'])
                    $select .= "<option value ='" . $row2['categorieslibary_id']
                            . "' selected>" . $row2['categorieslibary_name']
                            . "</option>";
                else
                    $select .= "<option value ='" . $row2['categorieslibary_id']
                            . "'>" . $row2['categorieslibary_name'] . "</option>";
            }

            $select .= "</optgroup>";
        }
        else {
            if ($id == $row['categorieslibary_id'])
                $select .= "<option value ='" . $row['categorieslibary_id']
                        . "' selected>" . $row['categorieslibary_name'] . "</option>";
            else
                $select .= "<option value ='" . $row['categorieslibary_id'] . "'>"
                        . $row['categorieslibary_name'] . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function filter_catlist_libary($category_id) {
    $option = "<option value ='0' selected>=== Tất cả ===</option>";

    global $mysql;

    $sql = "SELECT categorieslibary_id ,
                   categorieslibary_name
			FROM categorieslibary
			WHERE levellibary = 1 AND categorieslibary_status = '1'
			                      AND languagelibary = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name ='categorylibary' id ='categorylibary' onchange ='form.submit()' >" . $option;

    while ($row = mysql_fetch_assoc($result)) {
        $sql2 = "SELECT categorieslibary_id,categorieslibary_name
				 FROM categorieslibary
				 WHERE levellibary = 2 AND categorieslibary_status = '1'
				                       AND parentlibary_id ='" . $row['categorieslibary_id']
                . "' AND languagelibary = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            if ($category_id == $row['categorieslibary_id'])
                $select .= "<option value ='" . $row['categorieslibary_id'] . "' selected>"
                        . $row['categorieslibary_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row['categorieslibary_id'] . "'>"
                        . $row['categorieslibary_name']
                        . "</option>";

            while ($row2 = mysql_fetch_assoc($result2)) {
                if ($category_id == $row2['categorieslibary_id']) {
                    $select .="<option value ='" . $row2['categorieslibary_id'] . "' selected>&nbsp;&nbsp;"
                            . $row2['categorieslibary_name']
                            . "</option> ";
                } else {
                    $select .="<option value ='" . $row2['categorieslibary_id'] . "'>&nbsp;&nbsp;"
                            . $row2['categorieslibary_name']
                            . "</option> ";
                }
            }
        } else {
            if ($category_id == $row['categorieslibary_id']) {
                $select .= "<option value ='" . $row['categorieslibary_id'] . "' selected>"
                        . $row['categorieslibary_name']
                        . "</option> ";
            } else {
                $select .= "<option value ='" . $row['categorieslibary_id'] . "'>"
                        . $row['categorieslibary_name']
                        . "</option> ";
            }
        }
    }

    $select .= "</select>";

    return $select;
}

function upgrade_catlist_libary($id) {
    $array_category = split(",", $id);

    global $mysql;

    $sql = "SELECT categorieslibary_id , categorieslibary_name
			FROM categorieslibary
			WHERE levellibary = 1 AND  categorieslibary_status = '1'
			                      AND languagelibary = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<div class='multiselect'>";

    while ($row = mysql_fetch_assoc($result)) {
        $sql2 = "SELECT categorieslibary_id,categorieslibary_name
				 FROM categorieslibary
				 WHERE levellibary = 2 AND  categorieslibary_status = '1'
				                       AND parentlibary_id ='" . $row['categorieslibary_id']
                . "' AND languagelibary = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            $select .= "<label style='width:350px'> <b>" . $row['categorieslibary_name'] . "</b></label>";

            while ($row2 = mysql_fetch_assoc($result2)) {
                $flag = 0;

                for ($i = 0; $i < count($array_category); $i++) {
                    if ($array_category[$i] == $row2['categorieslibary_id']) {
                        $select .= "<label style = 'width:300px'>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input checked type='checkbox'
											   name='option[]'
											   value='" . $row2['categorieslibary_id'] . "'/>" .
                                $row2['categorieslibary_name']
                                . "</label> ";
                        $flag = 1;
                    }
                }

                if ($flag == 0) {
                    $select .="<label style = 'width:300px'>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type='checkbox'
										   name='option[]'
										   value='" . $row2['categorieslibary_id'] . "'/>" .
                            $row2['categorieslibary_name']
                            . "</label> ";
                }
            }
        } else {
            $flag = 0;

            for ($i = 0; $i < count($array_category); $i++) {
                if ($array_category[$i] == $row['categorieslibary_id']) {
                    $select .= "<label style = 'width:300px'>
									<input checked type='checkbox'
										   name='option[]'
										   value='" . $row['categorieslibary_id'] . "'/>" .
                            "<b>" . $row['categorieslibary_name'] . "</b>"
                            . "</label> ";
                    $flag = 1;
                }
            }

            if ($flag == 0) {
                $select .= "<label style = 'width:300px'>
								<input type='checkbox'
									   name='option[]'
									   value='" . $row['categorieslibary_id'] . "'/>" .
                        "<b>" . $row['categorieslibary_name'] . "</b>"
                        . "</label> ";
            }
        }
    }

    $select .= "</div>";

    return $select;
}

function upgrade_catlist_libary_2($id) {
    $array_category = split(",", $id);

    global $mysql;

    $sql = "SELECT categorieslibary_id , categorieslibary_name
			FROM categorieslibary
			WHERE levellibary = 1 AND  categorieslibary_status = '1'
			                      AND languagelibary = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<div class='multiselect'>";

    while ($row = mysql_fetch_assoc($result)) {
        $flag = true;

        $sql2 = "SELECT categorieslibary_id , categorieslibary_name
				 FROM categorieslibary
				 WHERE levellibary = 2 AND  categorieslibary_status = '1'
				                       AND parentlibary_id = " . $row['categorieslibary_id']
                . " AND languagelibary = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            while ($row2 = mysql_fetch_assoc($result2)) {
                for ($i = 0; $i < count($array_category); $i++) {
                    if ($array_category[$i] == $row2['categorieslibary_id']) {
                        if ($flag == true) {
                            $select .= "<label style='width:300px'> <b>" . $row['categorieslibary_name'] . "</b></label>";

                            $flag = false;
                        }
                        $select .= "<label style = 'width:300px'>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .
                                $row2['categorieslibary_name']
                                . "</label> ";
                    }
                }
            }
        } else {
            for ($i = 0; $i < count($array_category); $i++) {
                if ($array_category[$i] == $row['categorieslibary_id']) {
                    $select .= "<label style = 'width:300px'>" .
                            "<b>" . $row['categorieslibary_name'] . "</b>"
                            . "</label> ";
                }
            }
        }
    }

    $select .= "</div>";

    return $select;
}

function catlist_help($id) {
    global $mysql;

    $sql = "SELECT 
					categorieshelp_id,
					categorieshelp_name
			FROM 
					categorieshelp 
			WHERE 
					levelhelp = 1 AND languagehelp = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'catlist' id = 'catlist' onchange='display()'>";

    while ($row = mysql_fetch_assoc($result)) {
        $sql2 = "SELECT
						categorieshelp_id,
						categorieshelp_name
				FROM
						categorieshelp 
				WHERE 	levelhelp = 2
						AND parenthelp_id ='" . $row['categorieshelp_id'] . "'
						AND languagehelp = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            $select .= "<optgroup label='" . $row['categorieshelp_name'] . "'>";

            while ($row2 = mysql_fetch_assoc($result2)) {
                if ($id == $row2['categorieshelp_id'])
                    $select .= "<option value ='" . $row2['categorieshelp_id']
                            . "' selected>" . $row2['categorieshelp_name']
                            . "</option>";
                else
                    $select .= "<option value ='" . $row2['categorieshelp_id']
                            . "'>" . $row2['categorieshelp_name'] . "</option>";
            }

            $select .= "</optgroup>";
        }
        else {
            if ($id == $row['categorieshelp_id'])
                $select .= "<option value ='" . $row['categorieshelp_id']
                        . "' selected>" . $row['categorieshelp_name'] . "</option>";
            else
                $select .= "<option value ='" . $row['categorieshelp_id'] . "'>"
                        . $row['categorieshelp_name'] . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function catlist_introduce($id) {
    global $mysql;

    $sql = "SELECT 
					categoriesintroduce_id,
					categoriesintroduce_name
			FROM 
					categoriesintroduce 
			WHERE 	
					levelintroduce = 1 AND languageintroduce = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'catlist' id = 'catlist'>";

    while ($row = mysql_fetch_assoc($result)) {
        $sql2 = "SELECT
						categoriesintroduce_id,
						categoriesintroduce_name
				FROM
						categoriesintroduce 
				WHERE 	levelintroduce = 2
						AND parentintroduce_id ='" . $row['categoriesintroduce_id'] . "'
						AND languageintroduce = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            $select .= "<optgroup label='" . $row['categoriesintroduce_name'] . "'>";

            while ($row2 = mysql_fetch_assoc($result2)) {
                if ($id == $row2['categoriesintroduce_id'])
                    $select .= "<option value ='" . $row2['categoriesintroduce_id']
                            . "' selected>" . $row2['categoriesintroduce_name']
                            . "</option>";
                else
                    $select .= "<option value ='" . $row2['categoriesintroduce_id']
                            . "'>" . $row2['categoriesintroduce_name'] . "</option>";
            }

            $select .= "</optgroup>";
        }
        else {
            if ($id == $row['categoriesintroduce_id'])
                $select .= "<option value ='" . $row['categoriesintroduce_id']
                        . "' selected>" . $row['categoriesintroduce_name'] . "</option>";
            else
                $select .= "<option value ='" . $row['categoriesintroduce_id'] . "'>"
                        . $row['categoriesintroduce_name'] . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function catlist_adoption($id) {
    global $mysql;

    $sql = "SELECT 
					categoriesadoption_id,
					categoriesadoption_name
			FROM 
					categoriesadoption 
			WHERE 	
					leveladoption = 1 AND languageadoption = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'catlist' id = 'catlist'>";

    while ($row = mysql_fetch_assoc($result)) {
        $sql2 = "SELECT
						categoriesadoption_id,
						categoriesadoption_name
				FROM
						categoriesadoption 
				WHERE 	leveladoption = 2
						AND parentadoption_id ='" . $row['categoriesadoption_id'] . "'
						AND languageadoption = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        if (mysql_num_rows($result2) > 0) {
            $select .= "<optgroup label='" . $row['categoriesadoption_name'] . "'>";

            while ($row2 = mysql_fetch_assoc($result2)) {
                if ($id == $row2['categoriesadoption_id'])
                    $select .= "<option value ='" . $row2['categoriesadoption_id']
                            . "' selected>" . $row2['categoriesadoption_name']
                            . "</option>";
                else
                    $select .= "<option value ='" . $row2['categoriesadoption_id']
                            . "'>" . $row2['categoriesadoption_name'] . "</option>";
            }

            $select .= "</optgroup>";
        }
        else {
            if ($id == $row['categoriesadoption_id'])
                $select .= "<option value ='" . $row['categoriesadoption_id']
                        . "' selected>" . $row['categoriesadoption_name'] . "</option>";
            else
                $select .= "<option value ='" . $row['categoriesadoption_id'] . "'>"
                        . $row['categoriesadoption_name'] . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

//VI TRI THEM
function helplist($id) {
    //CHON TAT CA CAC MUC CHUA DUOC HIEN THI	
    // Chinh sua Dich vu van chuyen
    if ($id == 0) {
        $sql = "SELECT idKindHelp, nameKindHelp, flag 
				FROM KindHelp 
				WHERE flag = 0 or idKindHelp = 30";

        global $mysql;

        $mysql->setQuery($sql);

        $result = $mysql->query();

        $select = '<select name="helplist" id="helplist" onchange="display()">';

        while ($row = mysql_fetch_assoc($result)) {
            if ($row['idKindHelp'] != 30)
                $select .= '<option value ="' . $row['idKindHelp'] . '">' . $row['nameKindHelp'] . '</option>';
            else if ($row['idKindHelp'] == 30)
                $select .= '<option value ="' . $row['idKindHelp'] . '"selected' . '>' . $row['nameKindHelp'] . '</option>';
        }
    }

    // Chinh sua Cach thuc thanh toan
    else if ($id == 1) {
        $sql = "SELECT idKindHelp, nameKindHelp, flag 
				FROM KindHelp 
				WHERE flag = 0 or idKindHelp = 31";

        global $mysql;

        $mysql->setQuery($sql);

        $result = $mysql->query();

        $select = '<select name="helplist" id="helplist" onchange="display()">';

        while ($row = mysql_fetch_assoc($result)) {
            if ($row['idKindHelp'] != 31)
                $select .= '<option value ="' . $row['idKindHelp'] . '">' . $row['nameKindHelp'] . '</option>';

            else if ($row['idKindHelp'] == 31)
                $select .= '<option value ="' . $row['idKindHelp'] . '"selected>' . $row['nameKindHelp'] . '</option>';
        }
    }

    // Chinh sua Cau hoi thuong gap
    else if ($id == 2) {
        $sql = "select idKindHelp, nameKindHelp, flag from KindHelp where flag = 0 or idKindHelp = 32";

        global $mysql;

        $mysql->setQuery($sql);

        $result = $mysql->query();

        $select = '<select name="helplist" id="helplist" onchange="display()">';

        while ($row = mysql_fetch_assoc($result)) {
            if ($row['idKindHelp'] != 32)
                $select .= '<option value ="' . $row['idKindHelp'] . '">' . $row['nameKindHelp'] . '</option>';
            else if ($row['idKindHelp'] == 32)
                $select .= '<option value ="' . $row['idKindHelp'] . '"selected>' . $row['nameKindHelp'] . '</option>';
        }
    }

    // Chinh sua Huong dan mua hang
    else if ($id == 3) {
        $sql = "select idKindHelp, nameKindHelp, flag from KindHelp where flag = 0 or idKindHelp = 33";

        global $mysql;

        $mysql->setQuery($sql);

        $result = $mysql->query();

        $select = '<select name="helplist" id="helplist" onchange="display()">';

        while ($row = mysql_fetch_assoc($result)) {
            if ($row['idKindHelp'] != 33)
                $select .= '<option value ="' . $row['idKindHelp'] . '">' . $row['nameKindHelp'] . '</option>';
            else if ($row['idKindHelp'] == 33)
                $select .= '<option value ="' . $row['idKindHelp'] . '"selected>' . $row['nameKindHelp'] . '</option>';
        }
    }

    else if ($id == 4) {
        $sql = "select idKindHelp, nameKindHelp, flag from KindHelp where flag = 0 or idKindHelp = 34";

        global $mysql;

        $mysql->setQuery($sql);

        $result = $mysql->query();

        $select = '<select name="helplist" id="helplist" onchange="display()">';

        while ($row = mysql_fetch_assoc($result)) {
            if ($row['idKindHelp'] != 34)
                $select .= '<option value ="' . $row['idKindHelp'] . '">' . $row['nameKindHelp'] . '</option>';
            else if ($row['idKindHelp'] == 34)
                $select .= '<option value ="' . $row['idKindHelp'] . '"selected>' . $row['nameKindHelp'] . '</option>';
        }
    }

    //SU DUNG KHI ADD TIN TUC
    else {
        $sql = "select idKindHelp, nameKindHelp, flag from KindHelp where flag = 0 or idKindHelp= 34 order by idKindHelp DESC";

        global $mysql;

        $mysql->setQuery($sql);

        $result = $mysql->query();

        $select = '<select name="helplist" id="helplist" onchange="display()">';

        while ($row = mysql_fetch_assoc($result)) {
            $select .= '<option value = "' . $row['idKindHelp'] . '">' . $row['nameKindHelp'] . '</option>';
        }
    }
    $select .= '</select>';
    return $select;
}

function commoditylist($id) {
    $select = '<select name="commoditylist" id="commoditylist">';
    // Co hang
    if ($id == 0) {
        $select .= '<option value = "0" selected="selected"> Còn Hàng </option>';
        $select .= '<option value = "1"> Hết Hàng </option>';
        $select .= '<option value = "2"> Sắp Có Hàng </option>';
        $select .= '<option value = "4"> Đặt Trước </option>';
        $select .= '</select>';
    }

    // Tam thoi het hang	
    else if ($id == 1) {
        $select .= '<option value = "0"> Còn Hàng </option>';
        $select .= '<option value = "1" selected="selected"> Hết Hàng </option>';
        $select .= '<option value = "2"> Sắp Có Hàng </option>';
        $select .= '<option value = "4"> Đặt Trước </option>';
        $select .= '</select>';
    }

    // Sap co hang
    else if ($id == 2) {
        $select .= '<option value = "0"> Còn Hàng </option>';
        $select .= '<option value = "1"> Hết Hàng </option>';
        $select .= '<option value = "2" selected="selected"> Sắp Có Hàng </option>';
        $select .= '<option value = "4"> Đặt Trước </option>';
        $select .= '</select>';
    }

    //Dat hang truoc
    else if ($id == 4) {
        $select .= '<option value = "0"> Còn Hàng </option>';
        $select .= '<option value = "1"> Hết Hàng </option>';
        $select .= '<option value = "2"> Sắp Có Hàng </option>';
        $select .= '<option value = "4" selected = "selected"> Đặt Trước </option>';
        $select .= '</select>';
    }

    //Con lai mac dinh co hang
    else {
        $select .= '<option value = "0" selected="selected"> Còn Hàng </option>';
        $select .= '<option value = "1"> Hết Hàng </option>';
        $select .= '<option value = "2"> Sắp Có Hàng </option>';
        $select .= '<option value = "4"> Đặt Trước </option>';
        $select .= '</select>';
    }
    return $select;
}

function catlist_web($id) {

    global $mysql;

    $sql = "select categories_id,categories_name from categories where categories_id=201 and language = '"
            . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'catlist' id = 'catlist'>";

    while ($row = mysql_fetch_assoc($result)) {

        $select .= "<optgroup label='" . $row['categories_name'] . "'>";

        $sql2 = "select categories_id,categories_name from categories where parent_id ='"
                . $row['categories_id'] . "' and language = '"
                . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        while ($row2 = mysql_fetch_assoc($result2)) {

            if ($id == $row2['categories_id'])
                $select .= "<option value ='" . $row2['categories_id']
                        . "' selected>" . $row2['categories_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row2['categories_id'] . "'>"
                        . $row2['categories_name'] . "</option>";
        }

        $select .= "</optgroup>";
    }

    $select .= '</select>';

    return $select;
}

function catlist_ads($id) {

    global $mysql;

    $sql = "select categories_id,categories_name from categories where level = 1 and language = '"
            . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'catlist' id = 'catlist'>";

    if ($id == 0) {

        $select .= "<option value ='1-0' selected>Trang chá»§</option>";
    } else {

        $select .= "<option value ='1-0'>Trang chá»§</option>";
    }

    while ($row = mysql_fetch_assoc($result)) {

        $select .= "<optgroup label='" . $row['categories_name'] . "'>";

        $sql2 = "select categories_id,categories_name from categories where level = 2 and parent_id ='"
                . $row['categories_id'] . "' and language = '"
                . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        while ($row2 = mysql_fetch_assoc($result2)) {

            if ($id == $row2['categories_id'])
                $select .= "<option value ='" . $row2['categories_id']
                        . "-1' selected>===" . $row2['categories_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row2['categories_id']
                        . "-1'>===" . $row2['categories_name'] . "</option>";
        }

        $select .= "</optgroup>";
    }

    $select .= '</select>';

    return $select;
}

function LoadAllCatalogue($id) {

    $catlist = "<select name ='catlist'>";

    global $mysql;

    $sql = "Select categories_id,categories_name from categories where language ='"
            . $_SESSION['lag'] . "' and parent_id =0";

    $mysql->setQuery($sql);

    $row = $mysql->loadAllRow();

    $sql = "Select parent_id,categories_id,categories_name from categories where language ='"
            . $_SESSION['lag'] . "' and parent_id <>0";

    $mysql->setQuery($sql);

    $parent = $mysql->loadAllRow();

    $n = count($row);

    $m = count($parent);

    for ($i = 0; $i < $n; ++$i) {

        if ($id == $row[$i]['categories_id']) {

            $catlist .= "<option value = '" . $row[$i]['categories_id']
                    . "' selected>" . $row[$i]['categories_name'] . "</option>";
        } else {

            $catlist .= "<option value = '" . $row[$i]['categories_id'] . "'>"
                    . $row[$i]['categories_name'] . "</option>";
        }

        for ($j = 0; $j < $m; ++$j) {

            if ($row[$i]['categories_id'] == $parent[$j]['parent_id']) {

                if ($id == $parent[$j]['categories_id']) {

                    $catlist .= "<option value = '"
                            . $parent[$j]['categories_id']
                            . "' selected>======"
                            . $parent[$j]['categories_name'] . "</option>";
                } else {

                    $catlist .= "<option value = '"
                            . $parent[$j]['categories_id'] . "'>======"
                            . $parent[$j]['categories_name'] . "</option>";
                }
            }
        }
    }

    $catlist .= '</select>';

    return $catlist;
}

function cat_news_list($id) {

    $catlist = "<select name ='catlist'>";

    global $mysql;

    $sql = "SELECT categories_id,categories_name 
			FROM news_catalogue 
			WHERE language ='" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $row = $mysql->loadAllRow();

    $n = count($row);

    for ($i = 0; $i < $n; ++$i) {

        if ($id == $row[$i]['categories_id']) {
            $catlist .= "<option value = '" . $row[$i]['categories_id']
                    . "' selected>" . $row[$i]['categories_name'] . "</option>";
        } else {
            $catlist .= "<option value = '" . $row[$i]['categories_id'] . "'>"
                    . $row[$i]['categories_name'] . '</option>';
        }
    }

    $catlist .= '</select>';

    return $catlist;
}

function get_total_product($id) {

    return countRow('products_id', 'products', "categories_id =" . intval($id));
}

function dl_subcats($id = '', $width = 100) {

    global $mysql;

    $sql = "select categories_id,categories_name from categories where level = 1 and language = '"
            . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'dl_subcats' id = 'dl_subcats' style = 'width:"
            . $width . "'>";

    $select .="<option value = '0'>-- Danh mục gốc --</option>";

    while ($row = mysql_fetch_assoc($result)) {

        if ($id == $row['categories_id'])
            $select .= "<option value ='" . $row['categories_id']
                    . "' selected>" . $row['categories_name'] . "</option>";
        else
            $select .= "<option value ='" . $row['categories_id'] . "'>"
                    . $row['categories_name'] . "</option>";



        $sql2 = "select categories_id,categories_name from categories where level = 2 and parent_id ='"
                . $row['categories_id'] . "' and language = '"
                . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        while ($row2 = mysql_fetch_assoc($result2)) {

            if ($id == $row2['categories_id'])
                $select .= "<option value ='" . $row2['categories_id']
                        . "' selected>===" . $row2['categories_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row2['categories_id']
                        . "'>===" . $row2['categories_name'] . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function dl_subcats_libary($id = '', $width = 100) {

    global $mysql;

    $sql = "SELECT 
				categorieslibary_id,categorieslibary_name 
			FROM 
				categorieslibary 
			WHERE 
				levellibary = 1 and languagelibary = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'dl_subcats' id = 'dl_subcats' style = 'width:" . $width . "'>";

    $select .="<option value = '0'>-- Danh mục gốc --</option>";

    while ($row = mysql_fetch_assoc($result)) {
        if ($id == $row['categorieslibary_id'])
            $select .= "<option value ='" . $row['categorieslibary_id']
                    . "'selected>" . $row['categorieslibary_name'] . "</option>";
        else
            $select .= "<option value ='" . $row['categorieslibary_id'] . "'>"
                    . $row['categorieslibary_name'] . "</option>";

        $sql2 = "SELECT 
						categorieslibary_id,categorieslibary_name 
				 FROM 
				 		categorieslibary
				 WHERE 
				 		levellibary = 2 and parentlibary_id ='"
                . $row['categorieslibary_id'] . "' and languagelibary = '"
                . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        while ($row2 = mysql_fetch_assoc($result2)) {

            if ($id == $row2['categorieslibary_id'])
                $select .= "<option value ='" . $row2['categorieslibary_id']
                        . "' selected>===" . $row2['categorieslibary_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row2['categorieslibary_id']
                        . "'>===" . $row2['categorieslibary_name'] . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function dl_subcats_help($id = '', $width = 100) {
    global $mysql;

    $sql = "SELECT 
				categorieshelp_id,categorieshelp_name
			FROM
				categorieshelp
			WHERE 
				levelhelp = 1 and languagehelp = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'dl_subcats' id = 'dl_subcats' style = 'width:" . $width . "'>";

    $select .="<option value = '0'>-- Danh mục gốc --</option>";

    while ($row = mysql_fetch_assoc($result)) {
        if ($id == $row['categorieshelp_id'])
            $select .= "<option value ='" . $row['categorieshelp_id']
                    . "'selected>" . $row['categorieshelp_name'] . "</option>";
        else
            $select .= "<option value ='" . $row['categorieshelp_id'] . "'>"
                    . $row['categorieshelp_name'] . "</option>";

        $sql2 = "SELECT 
						categorieshelp_id,categorieshelp_name 
				 FROM 
				 		categorieshelp
				 WHERE 
				 		levelhelp = 2 and parenthelp_id ='"
                . $row['categorieshelp_id'] . "' and languagehelp = '"
                . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        while ($row2 = mysql_fetch_assoc($result2)) {

            if ($id == $row2['categorieshelp_id'])
                $select .= "<option value ='" . $row2['categorieshelp_id']
                        . "' selected>===" . $row2['categorieshelp_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row2['categorieshelp_id']
                        . "'>===" . $row2['categorieshelp_name'] . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function dl_subcats_introduce($id = '', $width = 100) {
    $select = "<select name = 'dl_subcats' id = 'dl_subcats' style = 'width:" . $width . "'>";
    $select .="<option value = '0'>-- Danh mục gốc --</option>";
    $select .= '</select>';
    return $select;
}

function dl_subcats_adoption($id = '', $width = 100) {
    global $mysql;

    $sql = "SELECT categoriesadoption_id,categoriesadoption_name
            FROM categoriesadoption
            WHERE leveladoption = 1 and languageadoption = '" . $_SESSION['lag'] . "'";
    $mysql->setQuery($sql);
    $result = $mysql->query();
    $select = "<select name = 'dl_subcats' id = 'dl_subcats' style = 'width:" . $width . "'>";
    $select .="<option value = '0'>-- Danh mục gốc --</option>";
    while ($row = mysql_fetch_assoc($result)) {
        if ($id == $row['categoriesadoption_id'])
            $select .= "<option value ='" . $row['categoriesadoption_id']
                    . "'selected>" . $row['categoriesadoption_name'] . "</option>";
        else
            $select .= "<option value ='" . $row['categoriesadoption_id'] . "'>"
                    . $row['categoriesadoption_name'] . "</option>";

        $sql2 = "SELECT 
						categoriesadoption_id,categoriesadoption_name 
				 FROM 
				 		categoriesadoption
				 WHERE 
				 		leveladoption = 2 and parentadoption_id ='"
                . $row['categoriesadoption_id'] . "' and languageadoption = '"
                . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        while ($row2 = mysql_fetch_assoc($result2)) {

            if ($id == $row2['categoriesadoption_id'])
                $select .= "<option value ='" . $row2['categoriesadoption_id']
                        . "' selected>===" . $row2['categoriesadoption_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row2['categoriesadoption_id']
                        . "'>===" . $row2['categoriesadoption_name'] . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function get_parent_name($id) {

    global $mysql;

    $sql = "select categories_name from categories where categories_id = "
            . intval($id);

    $mysql->setQuery($sql);

    $mysql->query();

    if ($mysql->getNumRows() > 0) {

        $row = $mysql->loadOneRow();

        return $row['categories_name'];
    } else {

        return 0;
    }
}

function get_parent_name_libary($id) {

    global $mysql;

    $sql = "SELECT categorieslibary_name 
			FROM categorieslibary 
			WHERE categorieslibary_id = " . intval($id);

    $mysql->setQuery($sql);

    $mysql->query();

    if ($mysql->getNumRows() > 0) {
        $row = $mysql->loadOneRow();

        return $row['categorieslibary_name'];
    } else {
        return 0;
    }
}

function get_parent_name_help($id) {

    global $mysql;

    $sql = "SELECT categorieshelp_name 
			FROM categorieshelp 
			WHERE categorieshelp_id = " . intval($id);

    $mysql->setQuery($sql);

    $mysql->query();

    if ($mysql->getNumRows() > 0) {
        $row = $mysql->loadOneRow();

        return $row['categorieshelp_name'];
    } else {
        return 0;
    }
}

function get_parent_name_introduce($id) {

    global $mysql;

    $sql = "SELECT categoriesintroduce_name 
			FROM categoriesintroduce 
			WHERE categoriesintroduce_id = " . intval($id);

    $mysql->setQuery($sql);

    $mysql->query();

    if ($mysql->getNumRows() > 0) {
        $row = $mysql->loadOneRow();

        return $row['categoriesintroduce_name'];
    } else {
        return 0;
    }
}

function get_parent_name_adoption($id) {

    global $mysql;

    $sql = "SELECT categoriesadoption_name 
			FROM categoriesadoption 
			WHERE categoriesadoption_id = " . intval($id);

    $mysql->setQuery($sql);

    $mysql->query();

    if ($mysql->getNumRows() > 0) {
        $row = $mysql->loadOneRow();

        return $row['categoriesadoption_name'];
    } else {
        return 0;
    }
}

function get_cats_name($id) {

    global $mysql;

    $sql = "select categories_name from categories where categories_id = '"
            . intval($id) . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadOneRow();

    return $arr['categories_name'];
}

function get_cats_name_libary($id) {
    global $mysql;

    $sql = "SELECT 
					categorieslibary_name 
			FROM 
					categorieslibary 
			WHERE 
					categorieslibary_id = '" . intval($id) . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadOneRow();

    return $arr['categorieslibary_name'];
}

function get_cats_name_help($id) {
    global $mysql;

    $sql = "SELECT 
					categorieshelp_name	 
			FROM 
					categorieshelp 
			WHERE 
					categorieshelp_id = '" . intval($id) . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadOneRow();

    return $arr['categorieshelp_name'];
}

function get_cats_name_introduce($id) {
    global $mysql;

    $sql = "SELECT 
					categoriesintroduce_name	 
			FROM 
					categoriesintroduce 
			WHERE 
					categoriesintroduce_id = '" . intval($id) . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadOneRow();

    return $arr['categoriesintroduce_name'];
}

function get_cats_name_adoption($id) {
    global $mysql;

    $sql = "SELECT 
					categoriesadoption_name	 
			FROM 
					categoriesadoption 
			WHERE 
					categoriesadoption_id = '" . intval($id) . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadOneRow();

    return $arr['categoriesadoption_name'];
}

function get_catsnews_name($id) {

    global $mysql;

    $sql = "select categories_name from news_catalogue where categories_id = '"
            . intval($id) . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadOneRow();

    return $arr['categories_name'];
}

//Xoa hinh anh

function delete_img($arr_id, $template = '') {

    global $mysql;

    if (!empty($arr_id)) {

        $sql = "select products_image from products where products_id in ("
                . $arr_id . ")";

        $mysql->setQuery($sql);

        $result = $mysql->query();

        if ($result) {

            while ($row = mysql_fetch_assoc($result)) {

                $img = $row['products_image'];

                if (file_exists(_UPLOAD_IMG . $img)) {

                    @unlink(_UPLOAD_IMG . $img);
                }

                if (file_exists(_UPLOAD_IMG_THUMB . $img)) {

                    @unlink(_UPLOAD_IMG_THUMB . $img);
                }
            }
        }
    }
}

function delete_img_webiste($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {

        $sql = "select image from website where id in (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $result = $mysql->query();

        if ($result) {

            while ($row = mysql_fetch_assoc($result)) {

                $img = $row['image'];

                if (file_exists(_UPLOAD_WEBSITE . $img)) {

                    @unlink(_UPLOAD_WEBSITE . $img);
                }

                if (file_exists(_UPLOAD_THUMB_WEBSITE . $img)) {

                    @unlink(_UPLOAD_THUMB_WEBSITE . $img);
                }
            }
        }
    }
}

//Xoa san pham

function delete_product($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {

        /* $sql = "DELETE FROM guest_comment WHERE product_id IN(" . $arr_id . ")";

          $mysql->setQuery($sql);

          $mysql->query(); */

        $sql = "DELETE FROM products WHERE products_id IN (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $mysql->query();

        $sql = "DELETE FROM product_category WHERE product_id IN (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

//Xoa danh sach tin tuc

function delete_img_news($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {

        $sql = "select news_image from news where news_id in (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $result = $mysql->query();

        if ($result) {

            while ($row = mysql_fetch_assoc($result)) {

                $img = $row['news_image'];

                if (file_exists(_UPLOAD_IMG_NEWS . $img)) {

                    @unlink(_UPLOAD_IMG_NEWS . $img);
                }

                if (file_exists(_UPLOAD_IMG_NEWS_THUMB . $img)) {

                    @unlink(_UPLOAD_IMG_NEWS_THUMB . $img);
                }
            }
        }
    }
}

//Xoa tin tuc
function delete_news($arr_id) {
    global $mysql;
    if (!empty($arr_id)) {
        // Kiem tra tin thuoc loai nao de xoa trong ban KindHelp
        $sql = "DELETE
                FROM news
                WHERE news_id IN (" . $arr_id . ")";
        $mysql->setQuery($sql);
        $row = $mysql->loadOneRow();
        $catalogue = $row['news_catalogue'];
        if ($catalogue == 30 || $catalogue == 31 || $catalogue == 32 || $catalogue == 33) {
            $sqlKindHelp = "UPDATE KindHelp SET flag = 0 WHERE idKindHelp = '" . $catalogue . "'";
            $mysql->setQuery($sqlKindHelp);
            $mysql->query();
        }
        // Delete relation news and product
        $sqlKindHelp = "DELETE FROM relation_news_product WHERE id_news IN (" . $arr_id . ")";
        $mysql->setQuery($sqlKindHelp);
        $mysql->query();
    }
}

function delete_news_introduce($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {
        $sql = "DELETE FROM news_introduce WHERE newsintroduce_id in (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function delete_news_adoption($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {
        $sql = "DELETE
				FROM news_adoption
				WHERE newsadoption_id in (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function delete_img_news_in_cats($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {

        $sql = "select news_image from news where news_catalogue in ("
                . $arr_id . ")";

        $mysql->setQuery($sql);

        $result = $mysql->query();

        if ($result) {

            while ($row = mysql_fetch_assoc($result)) {

                $img = $row['news_image'];

                if (file_exists(_UPLOAD_IMG_NEWS . $img)) {

                    @unlink(_UPLOAD_IMG_NEWS . $img);
                }

                if (file_exists(_UPLOAD_IMG_NEWS_THUMB . $img)) {

                    @unlink(_UPLOAD_IMG_NEWS_THUMB . $img);
                }
            }
        }
    }
}

function delete_news_in_cats($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {
        $sql = "delete from news where news_catalogue in (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function Set_status_news($arr_id) {

    SetStatus('news_id', 'status', 'news', 'news_id in (' . $arr_id . ')');
}

function Set_publish_news($arr_id) {
    SetStatus('news_id', 'flag_publisher', 'news', 'news_id in (' . $arr_id . ')');
}

function Set_status_news_2($arr_id) {
    SetStatus('news_id', 'status', 'news', 'news_id in (' . $arr_id . ')');

    global $mysql;

    $sql = "SELECT news_id, status
            FROM news
            WHERE news_id IN (" . $arr_id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    $row = $mysql->loadAllRow();

    for ($i = 0; $i < count($row); ++$i) {
        if ($row[$i]['status'] == '1') {
            $sql = "UPDATE news_category
                    SET status = '1'
                    WHERE news_id = " . $row[$i]['news_id'];
        } else if ($row[$i]['status'] == '0') {
            $sql = "UPDATE news_category
                    SET status = '0'
                    WHERE news_id = " . $row[$i]['news_id'];
        }

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function Set_status_coupon($arr_id) {
    SetStatusCoupon('id_coupon', 'status_coupon', 'coupon', 'id_coupon in (' . $arr_id . ')');
}

function Set_status_news_introduce($arr_id) {

    SetStatus('newsintroduce_id', 'statusintroduce', 'news_introduce', 'newsintroduce_id in (' . $arr_id . ')');
}

function Set_status_news_adoption($arr_id) {

    SetStatus('newsadoption_id', 'statusadoption', 'news_adoption', 'newsadoption_id in (' . $arr_id . ')');
}

function Set_status_cats_news($arr_id) {

    SetStatus('categories_id', 'categories_status', 'news_catalogue', 'categories_id in (' . $arr_id . ')');
}

function Set_status_support($arr_id) {

    SetStatus('providers_id', 'providers_status', 'support', 'providers_id in (' . $arr_id . ')');
}

function Set_status_catalogue($arr_id) {

    SetStatus('categories_id', 'categories_status', 'categories', 'categories_id in (' . $arr_id . ')');
}

function Set_status_catalogue_libary($arr_id) {

    SetStatus('categorieslibary_id', 'categorieslibary_status', 'categorieslibary', 'categorieslibary_id in (' . $arr_id . ')');
}

function Set_status_catalogue_help($arr_id) {

    SetStatus('categorieshelp_id', 'categorieshelp_status', 'categorieshelp', 'categorieshelp_id in (' . $arr_id . ')');
}

function Set_status_catalogue_introduce($arr_id) {

    SetStatus('categoriesintroduce_id', 'categoriesintroduce_status', 'categoriesintroduce', 'categoriesintroduce_id in (' . $arr_id . ')');
}

function Set_status_catalogue_adoption($arr_id) {

    SetStatus('categoriesadoption_id', 'categoriesadoption_status', 'categoriesadoption', 'categoriesadoption_id in (' . $arr_id . ')');
}

function Set_status_product($arr_id) {

    SetStatus('products_id', 'products_status', 'products', 'products_id in (' . $arr_id . ')');

    global $mysql;

    $sql = "SELECT products_id, products_status 
			FROM products 
			WHERE products_id IN (" . $arr_id . ")";

    $mysql->setQuery($sql);

    $mysql->query();

    $row = $mysql->loadAllRow();

    for ($i = 0; $i < count($row); ++$i) {
        if ($row[$i]['products_status'] == '1') {
            $sql = "UPDATE product_category
					SET status = 1
					WHERE product_id = " . $row[$i]['products_id'];
        } else if ($row[$i]['products_status'] == '0') {
            $sql = "UPDATE product_category
					SET status = 0
					WHERE product_id = " . $row[$i]['products_id'];
        }

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function SetStatus($id, $status, $table, $where) {
    global $mysql;

    if (!empty($id)) {
        $sql = "select " . $id . "," . $status . " from " . $table . " where "
                . $where;

        $mysql->setQuery($sql);

        $result = $mysql->query();

        $row = $mysql->loadAllRow();

        $n = count($row);

        for ($i = 0; $i < $n; ++$i) {

            if ($row[$i][$status] == '0') {
                $sql = "update " . $table . " set " . $status . " = 1 where "
                        . $id . " ='" . $row[$i][$id] . "'";
            } else {

                $sql = "update " . $table . " set " . $status . " = 0 where "
                        . $id . " ='" . $row[$i][$id] . "'";
            }

            $mysql->setQuery($sql);

            $mysql->query();
        }
    }
}

function SetStatusCoupon($id, $status, $table, $where) {
    global $mysql;

    if (!empty($id)) {
        $sql = "SELECT " . $id . "," . $status . " FROM " . $table . " WHERE "
                . $where;

        $mysql->setQuery($sql);

        $result = $mysql->query();

        $row = $mysql->loadAllRow();

        $n = count($row);

        for ($i = 0; $i < $n; ++$i) {

            if ($row[$i][$status] == '2') {
                $sql = "UPDATE " . $table . " SET " . $status . " = 1 WHERE "
                        . $id . " ='" . $row[$i][$id] . "'";
            } else {

                $sql = "UPDATE " . $table . " SET " . $status . " = 2 WHERE "
                        . $id . " ='" . $row[$i][$id] . "'";
            }

            $mysql->setQuery($sql);

            $mysql->query();
        }
    }
}

function Set_news_waitting($arr_id) {
    global $mysql;

    if (!empty($arr_id)) {
        $sql = "update news set news_wait=1 where news_id in (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function delete_product_in_cat($arr_id) {
    global $mysql;

    if (!empty($arr_id)) {
        $sql = "DELETE FROM products WHERE categories_id in (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function delete_productImg_in_cat($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {

        $sql = "select products_image from products where categories_id in ("
                . $arr_id . ")";

        $mysql->setQuery($sql);

        $result = $mysql->query();

        if ($result) {

            while ($row = mysql_fetch_assoc($result)) {

                $img = $row['products_image'];

                if (file_exists(_UPLOAD_IMG . $img)) {

                    @unlink(_UPLOAD_IMG . $img);
                }

                if (file_exists(_UPLOAD_IMG_THUMB . $img)) {

                    @unlink(_UPLOAD_IMG_THUMB . $img);
                }
            }
        }
    }
}

//Xoa danh muc
function delete_cats($arr_id) {
    global $mysql;

    $sql = 'delete from categories where categories_id in (' . $arr_id . ')';

    $mysql->setQuery($sql);

    $mysql->query();
}

//end
//Xoa danh muc libary
function delete_cats_libary($arr_id) {

    global $mysql;

    $sql = 'DELETE 
			FROM categorieslibary 
			WHERE categorieslibary_id in (' . $arr_id . ')';

    $mysql->setQuery($sql);

    $mysql->query();
}

//end

function delete_cats_help($arr_id) {

    global $mysql;

    $sql = 'DELETE 
			FROM categorieshelp 
			WHERE categorieshelp_id != "30" 
				  AND categorieshelp_id != "31" 
				  AND categorieshelp_id != "32"
				  AND categorieshelp_id != "33"				
				  AND categorieshelp_id in (' . $arr_id . ')';

    $mysql->setQuery($sql);

    $mysql->query();
}

function delete_cats_introduce($arr_id) {

    global $mysql;

    $sql = 'DELETE 
			FROM categoriesintroduce 
			WHERE categoriesintroduce_id in (' . $arr_id . ')';

    $mysql->setQuery($sql);

    $mysql->query();
}

function delete_cats_adoption($arr_id) {

    global $mysql;

    $sql = 'DELETE 
			FROM categoriesadoption
			WHERE categoriesadoption_id in (' . $arr_id . ')';

    $mysql->setQuery($sql);

    $mysql->query();
}

//Xoa danh muc tin tuc
function delete_cats_news($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {

        $sql = 'delete from news_catalogue where categories_id in (' . $arr_id
                . ')';

        $mysql->setQuery($sql);

        $mysql->query();

        delete_img_news_in_cats($arr_id);

        delete_news_in_cats($arr_id);
    }
}

//adver 

function delete_logo($arr_id) {

    global $mysql;

    if (!empty($arr_id)) {

        $sql = "select adver_logo from adver where adver_id in (" . $arr_id
                . ")";

        $mysql->setQuery($sql);

        $result = $mysql->query();

        while ($row = mysql_fetch_assoc($result)) {

            $logo = $row['adver_logo'];

            if (file_exists(_UPLOAD_AD . $logo)) {

                @unlink(_UPLOAD_AD . $logo);
            }

            if (file_exists(_UPLOAD_AD_THUMB . $logo)) {

                @unlink(_UPLOAD_AD_THUMB . $logo);
            }
        }
    }
}

function delete_adver($arr_id) {
    global $mysql;

    if (!empty($arr_id)) {
        $sql = "delete from adver where adver_id in (" . $arr_id . ")";

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function Set_status_adver($arr_id) {
    global $mysql;

    $sql = "select adver_id,adver_status from adver where adver_id in ("
            . $arr_id . ")";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $row = $mysql->loadAllRow();

    $n = count($row);

    for ($i = 0; $i < $n; ++$i) {
        if ($row[$i]['adver_status'] == '0') {

            $sql = "update adver set adver_status = 1 where adver_id ='"
                    . $row[$i]['adver_id'] . "'";
        } else {
            $sql = "update adver set adver_status = 0 where adver_id ='"
                    . $row[$i]['adver_id'] . "'";
        }

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function Set_status_game($arr_id) {

    global $mysql;

    $sql = "select adver_id,adver_status from game where adver_id in ("
            . $arr_id . ")";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $row = $mysql->loadAllRow();

    $n = count($row);

    for ($i = 0; $i < $n; ++$i) {
        if ($row[$i]['adver_status'] == '0') {
            $sql = "update game set adver_status = 1 where adver_id ='"
                    . $row[$i]['adver_id'] . "'";
        } else {
            $sql = "update game set adver_status = 0 where adver_id ='"
                    . $row[$i]['adver_id'] . "'";
        }

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function get_adver_cats_name($id = '', $page_id = '') {
    global $mysql;

    if (($id == 1) and ( $page_id == 0)) {
        return 'Trang chá»§ ';
    }

    $sql = "select categories_name from categories where categories_id  = '"
            . intval($id) . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadOneRow();

    return $arr['categories_name'];
}

function delete_file_game($arr_id) {
    global $mysql;

    $sql = "select adver_logo from game where adver_id in (" . $arr_id . ")";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    while ($row = mysql_fetch_assoc($result)) {

        $logo = $row['adver_logo'];

        if (file_exists(_UPLOAD_GAME . $logo)) {

            @unlink(_UPLOAD_GAME . $logo);
        }
    }
}

function delete_game($arr_id) {
    global $mysql;

    $sql = "delete from game where adver_id in (" . $arr_id . ")";

    $mysql->setQuery($sql);

    $mysql->query();
}

//ads  quang cao

function delete_logo_ads($arr_id) {
    global $mysql;

    $sql = "select adver_logo from ads where adver_id in (" . $arr_id . ")";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    while ($row = mysql_fetch_assoc($result)) {
        $logo = $row['adver_logo'];

        if (file_exists(_UPLOAD_AD . $logo)) {
            @unlink(_UPLOAD_AD . $logo);
        }

        if (file_exists(_UPLOAD_AD_THUMB . $logo)) {
            @unlink(_UPLOAD_AD_THUMB . $logo);
        }
    }
}

function delete_ads($arr_id) {
    global $mysql;

    $sql = "delete from ads where adver_id in (" . $arr_id . ")";

    $mysql->setQuery($sql);

    $mysql->query();
}

function Set_status_ads($arr_id) {
    global $mysql;

    $sql = "select adver_id,adver_status from ads where adver_id in ("
            . $arr_id . ")";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $row = $mysql->loadAllRow();

    $n = count($row);

    for ($i = 0; $i < $n; ++$i) {

        if ($row[$i]['adver_status'] == '0') {

            $sql = "update ads set adver_status = 1 where adver_id ='"
                    . $row[$i]['adver_id'] . "'";
        } else {

            $sql = "update ads set adver_status = 0 where adver_id ='"
                    . $row[$i]['adver_id'] . "'";
        }

        $mysql->setQuery($sql);

        $mysql->query();
    }
}

function check_file_update_allow($id, $ext) {
    global $mysql;

    $mysql->setQuery("select adver_logo from ads where adver_pos='" . $id . "'");

    $result = $mysql->query();

    $i = 0;

    while ($row = mysql_fetch_assoc($result)) {

        if (checkExtentFile($row['adver_logo'], $ext)) {

            ++$i;
        }
    }

    return $i;
}

function dlcontent($id) {

    global $mysql;

    $sql = "select content_id,content_name from contents where language = '"
            . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $select = "<select name = 'dlcontent' id = 'dlcontent'>";

    while ($row = mysql_fetch_assoc($result)) {

        if ($id == $row['content_id'])
            $select .= "<option value ='" . $row['content_id'] . "' selected>"
                    . $row['content_name'] . "</option>";
        else
            $select .= "<option value ='" . $row['content_id'] . "'>"
                    . $row['content_name'] . "</option>";
    }

    $select .= '</select>';

    return $select;
}

//Xoa thanh vien

function deteleUser($id) {

    global $mysql;

    if (!empty($id)) {
        $mysql->setQuery("update user set status ='-1',date_delete='" . time() . "' where id in(" . $id . ")");

        $mysql->query();
    }
}

function restoreUser($id) {

    global $mysql;

    if (!empty($id)) {

        $mysql->setQuery("update user set status ='1' where id in(" . $id . ")");

        $mysql->query();
    }
}

function total_topic($username) {

    global $mysql;

    $mysql
            ->setQuery(
                    "select products_id from products where username ='"
                    . $username . "'");

    $mysql->query();

    return $mysql->getNumRows();
}

function total_mysql() {

    global $obj_config;

    $size = 0;

    $mysql = new mysql();

    $mysql->setQuery("SHOW TABLE STATUS FROM " . $obj_config->db);

    $result = $mysql->query();

    while ($row = mysql_fetch_assoc($result)) {

        $size += $row['Data_length'] + $row['Index_length'];
    }

    return $size;
}

//-->

function style($path, $c, $w = '200') {

    $dir = opendir($path);

    $style = array();

    while (($file = readdir($dir)) !== false) {

        if (is_dir($path . $file) and $file != '.' and $file != '..') {

            $style[] = $file;
        }
    }

    closedir($dir);

    $select = "<select name='themes' style='width:" . $w . "px'>";

    foreach ($style as $themes) {

        if ($c == $themes) {

            $select .= "<option value='" . $themes . "' selected>" . $themes
                    . "</option>";
        } else {

            $select .= "<option value='" . $themes . "'>" . $themes
                    . "</option>";
        }
    }

    $select .= "</select>";

    return $select;
}

function dl_visitor($value, $width = 120) {

    $select = "<select onchange='form.submit()' name='visitor' style='width:"
            . $width . "px'>";

    global $mysql;

    $row = selectRow('mon', 'visitor', "year='" . date('Y', time()) . "' group by mon  order by mon");

    foreach ($row as $k) {

        if ($value == $k['mon']) {

            $select .= "<option value='" . $k['mon'] . "' selected> Tháng "
                    . $k['mon'] . "</option>";
        } else {

            $select .= "<option value='" . $k['mon'] . "'> Tháng " . $k['mon']
                    . "</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function memberUserList($id) {
    $option = "<option value ='0' selected>=== Tất cả ===</option>";

    $submit = " onchange ='form.submit()' ";

    $select = "<select " . $submit
            . " name = 'memberlist' id = 'memberlist' style = 'width:120px"
            . "'>" . $option;

    global $mysql;

    $sql = "SELECT idadmin_control_user,user_name_visible
	        FROM admin_control_user";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    while ($row = mysql_fetch_assoc($result)) {
        if (!empty($row['user_name_visible'])) {
            if ($id == $row['idadmin_control_user']) {
                $select .= "<option value ='" . $row['idadmin_control_user'] . "' selected>"
                        . $row['user_name_visible'] . "</option>";
            } else {
                $select .= "<option value ='" . $row['idadmin_control_user'] . "'>"
                        . $row['user_name_visible'] . "</option>";
            }
        }
    }

    return $select;
}

function cat_fillter($id) {
    global $mysql;

    $submit = " onchange ='form.submit()' ";

    if ($id == 0) {
        $option = "<option value ='0' selected>=== Xem tất cả ==</option>";
    } else {
        $option = "<option value ='0' selected>=== Xem tất cả ==</option>";
    }

    $sql = "SELECT categories_id,categories_name
	        FROM categories
	        WHERE level = 1  AND language = '" . $_SESSION['lag'] . "'";

    $mysql->setQuery($sql);

    $result = $mysql->query();

    $width = 250;

    $select = "<select " . $submit
            . " name = 'catlist' id = 'catlist' style = 'width:" . $width
            . "'>" . $option;

    while ($row = mysql_fetch_assoc($result)) {
        if ($id == $row['categories_id'])
            $select .= "<option value ='" . $row['categories_id']
                    . "' selected>" . $row['categories_name'] . "</option>";
        else
            $select .= "<option value ='" . $row['categories_id'] . "'>"
                    . $row['categories_name'] . "</option>";

        $sql2 = "SELECT categories_id,categories_name
		         FROM categories
		         WHERE level = 2 AND parent_id ='" . $row['categories_id']
                . "' AND language = '" . $_SESSION['lag'] . "'";

        $mysql->setQuery($sql2);

        $result2 = $mysql->query();

        while ($row2 = mysql_fetch_assoc($result2)) {
            if ($id == $row2['categories_id'])
                $select .= "<option value ='" . $row2['categories_id']
                        . "' selected>===" . $row2['categories_name']
                        . "</option>";
            else
                $select .= "<option value ='" . $row2['categories_id']
                        . "'>===" . $row2['categories_name'] . "</option>";

            $sql3 = "SELECT categories_id,categories_name
			         FROM categories
			         WHERE level = 3 AND parent_id ='" . $row2['categories_id']
                    . "' AND language = '" . $_SESSION['lag'] . "'";

            $mysql->setQuery($sql3);

            $result3 = $mysql->query();

            while ($row3 = mysql_fetch_assoc($result3)) {
                if ($id == $row3['categories_id'])
                    $select .= "<option value ='" . $row3['categories_id']
                            . "' selected>--------" . $row3['categories_name']
                            . "</option>";
                else
                    $select .= "<option value ='" . $row3['categories_id']
                            . "'>--------" . $row3['categories_name']
                            . "</option>";
            }
        }
    }

    $select .= '</select>';

    return $select;
}

function pos_adver($id = '') {

    global $mysql;

    $name = 'name_' . $_SESSION['lag'];

    $sql = "select id,$name from cats_adver";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadAllRow();

    $n = count($arr);

    $select = "<select name = 'pos_adver'>";

    for ($i = 0; $i < $n; $i++) {

        if ($id == $arr[$i]['id'])
            $select .= "<option value ='" . $arr[$i]['id'] . "' selected>"
                    . $arr[$i][$name] . "</option>";
        else
            $select .= "<option value ='" . $arr[$i]['id'] . "'>"
                    . $arr[$i][$name] . "</option>";
    }

    $select .= '</select>';

    return $select;
}

function get_adver_pos_name($id = '') {

    global $mysql;

    $name = 'name_' . $_SESSION['lag'];

    $sql = "select $name from cats_adver where id = '" . intval($id) . "'";

    $mysql->setQuery($sql);

    $mysql->query();

    $arr = $mysql->loadOneRow();



    if (empty($arr[$name])) {

        $sql = "select categories_name from categories where categories_id = '"
                . str_replace('c-', '', $id) . "'";

        $mysql->setQuery($sql);

        $mysql->query();

        $arr = $mysql->loadOneRow();

        return $arr['categories_name'];
    }

    return $arr[$name];
}

function convertIntToFormatMoney($str) {

    $strm = number_format($str);

    $arrC = array(',');

    $arrB = array('.');

    $strm = str_replace($arrC, $arrB, $strm);

    return $strm;
}

function convertFormatMoneyToInt($str) {

    $arrC = array('.');

    $arrB = array('');

    $strm = str_replace($arrC, $arrB, $str);

    return $strm;
}

?>