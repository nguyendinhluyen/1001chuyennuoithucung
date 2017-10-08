<div class = "title">{title}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <div style="float:left;padding-left:20px">
            <div style="padding: 10px 0px 10px 0px; color: red">
                {note_change_admin}
            </div>
            <div class ='err' style = 'margin-left:100px'>{error}</div>
            <p><label>Tên đăng nhập {new}</label>
                <input type = 'text' name='loginusername' id='loginusername' value = "{loginusername}" class ='fieldinput'>
                <font color ='red'>*</font> ({5char})
            </p>
            <p><label>Tên hiển thị </label>
                <input type = 'text' name='saveusername' id='saveusername' value = "{saveusername}" class ='fieldinput'>
                <font color ='red'>*</font> ({5char})
            </p>
            <p style="margin-left:-4px; display:none; {display_change_pass}" >
                <input type="checkbox" id="id_check_change_pass" name="id_check_change_pass" onclick="check_change_pass()">Chọn để thay đổi password </input>
            </p>
            <p><label>Mật khẩu {new}</label>
                <input type = 'password' id = 'passwordNew' name = 'passwordNew' class ='fieldinput' onkeyup="updatePasswordStrength_new(this, 'passwdRating', {'text': 2});" {readonly}> <font color ='red'>*</font> ({5char})
            </p>
            <div id='passwdRating' style ='margin-left:100px'>
                <span id='ps-title'>{psecurity} </span>
                <div class='pass_bar' id='pass_bar'>
                    <div class='progress_bar_base'></div>
                </div>
                <div id='ps-rating' style="display: inline">0 {point}</div>
            </div>
            <p>
                <label>{reEnterpass}</label><input type = 'password' id = 'passwordNew2' name = 'passwordNew2' class ='fieldinput' {readonly}> <font color ='red'>*</font>
            </p>
            <table style="margin-left:-4px; margin-top:10px; margin-bottom:20px">
                <tr>
                    <td width="276">
                        <label style="float: right; width: 275px; cursor: pointer" for="check_all"><b>Tất cả các quyền</b></label>
                        <input type="checkbox" id="check_all" name="check_all" onclick="checked_all_event()">
                    </td>
                </tr>
                <tr>
                    <td width="276">
                        <label style="float: right; width: 275px; cursor: pointer" for="check_all_1"><b>Thông tin chung website</b></label>
                        <input type="checkbox" id="check_all_1" name="check_all_1" onclick="check_all_1_event()">
                    </td>
                </tr>
                <tr>
                    <td width="276" style="padding-left: 20px">
                        <label style="float: right; width: 255px; cursor: pointer" for="check_box_admin_11">Admin control paneL</label>
                        <input type="checkbox" id="check_box_admin_11" name="check_box_admin_11" {11} >
                    </td>
                    <td width="276">
                        <label style="float: right; width: 255px; cursor: pointer; color: red" for="check_box_admin_12">Quản lý người dùng</label>
                        <input type="checkbox" id="check_box_admin_12" name="check_box_admin_12" {12}>
                    </td>
                </tr>
                <tr>
                    <td width="276" style="padding-left: 20px">
                        <label style="float: right; width: 255px; cursor: pointer" for="check_box_admin_13">Thống kê truy cập</label>
                        <input type="checkbox" id="check_box_admin_13" name="check_box_admin_13" {13}>
                    </td>
                    <td width="276">
                        <label style="float: right; width: 255px; cursor: pointer" for="check_box_admin_14">Ai đang online</label>
                        <input type="checkbox" id="check_box_admin_14" name="check_box_admin_14" {14}>
                    </td>
                </tr>
                <tr>
                    <td width="276">
                        <label style="float: right; width: 275px; cursor: pointer" for="check_all_2"><b>Tin tức</b></label>
                        <input type="checkbox" id="check_all_2" name="check_all_2" onclick="check_all_2_event()">
                    </td>
                </tr>
                <tr>
                    <td width="276" style="padding-left: 20px">
                        <label style="float: right; width: 255px; cursor: pointer" for="check_box_admin_21">Danh mục thư viện</label>
                        <input type="checkbox" id="check_box_admin_21" name="check_box_admin_21" {21}>
                    </td>
                </tr>
                <tr>
                    <td width="276" style="padding-left: 20px">
                        <label style="float: right; width: 255px; cursor: pointer" for="check_box_admin_22">Bài viết thư viện</label>
                        <input type="checkbox" id="check_box_admin_22" name="check_box_admin_22" {22}>
                    </td>
                </tr>
                <tr>
                    <td width="276">
                        <label style="float: right; width: 275px; cursor: pointer" for="check_all_3"><b>Cấu hình website</b></label>
                        <input type="checkbox" id="check_all_3" name="check_all_3" onclick="check_all_3_event()">
                    </td>
                </tr>
                <tr>
                    <td width="188" style="padding-left: 20px">
                        <label style="float: right; width: 255px; cursor: pointer" for="check_box_admin_31">Cấm IP truy cập</label>
                        <input type="checkbox" id="check_box_admin_31" name="check_box_admin_31" {31}>
                    </td>
                </tr>
                <tr>
                    <td width="276" style="padding-left: 20px">
                        <label style="float: right; width: 255px; cursor: pointer; color:red" for="check_box_admin_32">Cập nhật Super Admin</label>
                        <input type="checkbox" id="check_box_admin_32" name="check_box_admin_32" {32}>
                    </td>
                </tr>
            </table>
            <input class="button" type="submit" name="btnSub" value="Lưu" style="margin-bottom: 20px"/>
        </div>
    </form>
</div>
<script language=javascript>
    var pass_strength_phrases = {
        0: '0 điểm',
        10: '1 điểm',
        20: '2 điểm',
        30: '3 điểm',
        40: '4 điểm',
        50: '5 điểm',
        60: '6 điểm',
        70: '7 điểm',
        80: '8 điểm',
        90: '9 điểm',
        100: '10 điểm'
    };
    function check_change_pass() {
        if (document.getElementById('id_check_change_pass').checked) {
            document.getElementById('passwordNew').readOnly = false;
            document.getElementById('passwordNew2').readOnly = false;
        } else {
            document.getElementById('passwordNew').readOnly = true;
            document.getElementById('passwordNew2').readOnly = true;
        }
    }
    function checked_all_event() {
        if (document.getElementById('check_all').checked) {
            document.getElementById('check_all_1').checked = true;
            document.getElementById('check_all_2').checked = true;
            document.getElementById('check_all_3').checked = true;
        } else {
            document.getElementById('check_all_1').checked = false;
            document.getElementById('check_all_2').checked = false;
            document.getElementById('check_all_3').checked = false;
        }
        check_all_1_event();
        check_all_2_event();
        check_all_3_event();
    }

    function check_all_1_event() {
        if (document.getElementById('check_all_1').checked) {
            check(1, 4);
        } else {
            uncheck(1, 4);
        }
    }

    function check_all_2_event() {
        if (document.getElementById('check_all_2').checked) {
            check(2, 2);
        } else {
            uncheck(2, 2);
        }
    }

    function check_all_3_event() {
        if (document.getElementById('check_all_3').checked) {
            check(3, 2);
        } else {
            uncheck(3, 2);
        }
    }

    // Checked checkbox
    function check(checktype, numbercategory) {
        for (i = 1; i <= numbercategory; i++) {
            var checked_id = "check_box_admin_" + checktype + i;
            document.getElementById(checked_id).checked = true;
        }
        document.getElementById("check_all_" + checktype).checked = true;
    }

    // Unchecked checkbox
    function uncheck(checktype, numbercategory) {
        for (i = 1; i <= numbercategory; i++) {
            var checked_id = "check_box_admin_" + checktype + i;
            document.getElementById(checked_id).checked = false;
        }
        document.getElementById("check_all_" + checktype).checked = false;
    }

</script>
<script language=javascript src="../jscript/password_strength_optimized.js"></script>