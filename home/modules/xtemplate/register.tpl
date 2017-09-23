<link rel="stylesheet" type="text/css" href="{linkS}layout/css/template.css" />
<link rel="stylesheet" type="text/css" href="{linkS}layout/css/jquery-ui-1.8.16.custom.css"/>
<script type="text/javascript" src="{linkS}layout/js/jquery-ui-1.8.16.custom.min.js"></script>

<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div> 

    <div class="news_main">

        <script language="javascript" type="text/javascript">//<![CDATA[
            function submitregistration() {
                var form = document.adminForm;
                var r = new RegExp("[\<|\>|\"|'|\%|\;|\(|\)|\&|\+|\-]", "i");
                var isvalid = true;
                var required_fields = new Array('username', 'title', 'middle_name', 'phone_2', 'address_1', 'agreed');
                for (var i = 0; i < required_fields.length; i++) {
                    formelement = eval('form.' + required_fields[i]);

                    if (!formelement) {
                        formelement = document.getElementById(required_fields[i] + '_field0');
                        var loopIds = true;
                    }
                    if (!formelement) {
                        continue;
                    }
                    if (formelement.type == 'radio' || formelement.type == 'checkbox') {
                        if (loopIds) {
                            var rOptions = new Array();
                            for (var j = 0; j < 30; j++) {
                                rOptions[j] = document.getElementById(required_fields[i] + '_field' + j);
                                if (!rOptions[j]) {
                                    break;
                                }
                            }
                        } else {
                            var rOptions = form[formelement.getAttribute('name')];
                        }
                        var rChecked = 0;
                        if (rOptions.length > 1) {
                            for (var r = 0; r < rOptions.length; r++) {
                                if (!rOptions[r]) {
                                    continue;
                                }
                                if (rOptions[r].checked) {
                                    rChecked = 1;
                                }
                            }
                        } else {
                            if (formelement.checked) {
                                rChecked = 1;
                            }
                        }
                        if (rChecked == 0) {
                            document.getElementById(required_fields[i] + '_div').className += ' missing';
                            isvalid = false;
                        } else if (document.getElementById(required_fields[i] + '_div').className == 'formLabel missing') {
                            document.getElementById(required_fields[i] + '_div').className = 'formLabel';
                        }
                    } else if (formelement.options) {
                        if (formelement.selectedIndex.value == '') {
                            document.getElementById(required_fields[i] + '_div').className += ' missing';
                            isvalid = false;
                        } else if (document.getElementById(required_fields[i] + '_div').className == 'formLabel missing') {
                            document.getElementById(required_fields[i] + '_div').className = 'formLabel';
                        }
                    } else {
                        if (formelement.value == '') {
                            document.getElementById(required_fields[i] + '_div').className += ' missing';
                            isvalid = false;
                        } else if (document.getElementById(required_fields[i] + '_div').className == 'formLabel missing') {
                            document.getElementById(required_fields[i] + '_div').className = 'formLabel';
                        }
                    }
                }

                if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(form.email.value))) {
                    alert('Vui lòng nhập đúng địa chỉ thư điện tử.');
                    return false;
                }
                if ((r.exec(form.username.value) || form.username.value.length < 3)) {
                    alert("Vui lòng nhập đúng Tài khoản.  Không khoảng trắng, có hơn 2 ký tự và là các ký tự 0-9,a-z,A-Z");
                    return false;
                }
                passregex = /^\S[\S ]{2,98}\S$/;
                if (form.password.value.length < 6) {
                    alert("Vui lòng nhập đúng mật khẩu.  Không khoảng trắng, 6 ký tự trở lên và sử dụng 0-9,a-z,A-Z");
                    return false;
                } else if (form.password2.value == "") {
                    alert("Vui lòng kiểm tra lại mật khẩu.");
                    return false;
                } else if (!passregex.test(form.password.value)) {
                    alert("Vui lòng nhập đúng Mật khẩu.  Không khoảng trắng, có hơn 6 ký tự và là các ký tự 0-9,a-z,A-Z");
                    return false;
                }
                if ((form.password.value != "") && (form.password.value != form.password2.value)) {
                    alert("Mật khẩu không đúng, hãy thử lại.");
                    return false;
                }
                if (!form.agreed.checked) {
                    alert("Vui lòng chấp nhận các điều khoản của chúng tôi.");
                    return false;
                }
                if (!isvalid) {
                    alert("Hãy chắc là đã hoàn thành mẫu và chính xác.");
                }
                return isvalid;
            }
            //]]>
        </script><form action="{linkS}process-register" method="POST" name="adminForm">

            <div style="width:90%;"><div style="padding:5px;text-align:center;"><strong>(* = Y&ecirc;u c&#7847;u)</strong></div><fieldset>
                    <legend class="sectiontableheader">Th&ocirc;ng tin kh&aacute;ch h&agrave;ng</legend>
                    <input type="hidden" id="register_account" name="register_account" value="1" src=""/><div id="username_div" class="formLabel "><label for="username_field">T&agrave;i kho&#7843;n</label><strong>* </strong> </div>
                    <div class="formField" id="username_input">
                        <input type="text" id="username_field" name="username" size="30" value="" class="inputbox" maxlength="25" src=""/>
                        <br/></div>
                    <br style="clear:both;"/><div id="email_div" class="formLabel "><label for="email_field">Email</label><strong>* </strong> </div>
                    <div class="formField" id="email_input">
                        <input type="text" id="email_field" name="email" size="30" value="" class="inputbox" maxlength="100" src=""/>
                        <br/></div>
                    <br style="clear:both;"/><div id="password_div" class="formLabel "><label for="password_field">M&#7853;t kh&#7849;u</label><strong>* </strong> </div>
                    <div class="formField" id="password_input">
                        <input type="password" id="password_field" name="password" size="30" class="inputbox" src=""/>
                        <br/></div>
                    <br style="clear:both;"/><div id="password2_div" class="formLabel "><label for="password2_field">Confirmed password</label><strong>* </strong> </div>
                    <div class="formField" id="password2_input">
                        <input type="password" id="password2_field" name="password2" size="30" class="inputbox" src=""/>
                        <br/></div>
                    <br style="clear:both;"/></fieldset>
                <fieldset>
                    <legend class="sectiontableheader">Th&ocirc;ng tin kh&aacute;ch h&agrave;ng</legend>
                    <div id="title_div" class="formLabel "><label for="title_field">Mr/Ms</label><strong>* </strong> </div>
                    <div class="formField" id="title_input">
                        <select class="inputbox" name="title" id="title_field">
                            <option value="-1">Không xác định</option>
                            <option value="1">Ông</option>
                            <option value="0">Bà</option>
                        </select>
                        <br/></div>
                    <br style="clear:both;"/><div id="middle_name_div" class="formLabel "><label for="middle_name_field">Name</label><strong>* </strong> </div>
                    <div class="formField" id="middle_name_input">
                        <input type="text" id="middle_name_field" name="middle_name" size="30" value="" class="inputbox" maxlength="32" src=""/>
                        <br/></div>
                    <br style="clear:both;"/><div id="vm_birthday_div" class="formLabel "><label for="vm_birthday_field">Ng&agrave;y Sinh</label> </div>
                    <div class="formField" id="vm_birthday_input">





                        <input type="text" id="vm_birthday_field" name="vm_birthday" size="0" value="" class="inputbox" src=""/>
                        <br/></div>
                    <br style="clear:both;"/><div id="phone_2_div" class="formLabel "><label for="phone_2_field">Mobile</label><strong>* </strong> </div>
                    <div class="formField" id="phone_2_input">
                        <input type="text" id="phone_2_field" name="phone_2" size="30" value="" class="inputbox" maxlength="32" src=""/>
                        <br/></div>
                    <br style="clear:both;"/><div id="address_1_div" class="formLabel "><label for="address_1_field">Add</label><strong>* </strong> </div>
                    <div class="formField" id="address_1_input">
                        <input type="text" id="address_1_field" name="address_1" size="30" value="" class="inputbox" maxlength="64" src=""/>
                        <br/></div>
                    <br style="clear:both;"/></fieldset>
                <fieldset>
                    <legend class="sectiontableheader">&#272;&#259;ng k&yacute;</legend>
                    <div id="agreed_div" class="formLabel "><label for="agreed_field"><script type="text/javascript">//<![CDATA[
                        document.write('<label for="agreed_field">* Khi đăng ký, tức là bạn đã chấp nhận các điều khoản do nanapet quy định.</label>');
                        //]]></script>
                            <noscript>
                            <label for="agreed_field">T&ocirc;i ch&#7845;p nh&#7853;n c&aacute;c &#273;i&#7873;u kho&#7843;n</label>
                            <a target="_blank" href="http://www.nanapet.com/index.php?option=com_virtuemart&amp;page=shop.tos" title="T&ocirc;i ch&#7845;p nh&#7853;n c&aacute;c &#273;i&#7873;u kho&#7843;n">
                                (C&aacute;c &#273;i&#7873;u kho&#7843;n)
                            </a></noscript></label><strong>* </strong> </div>
                    <div class="formField" id="agreed_input">
                        <input type="checkbox" id="agreed_field" name="agreed" value="1" class="inputbox" src=""/><br/></div>
                    <br style="clear:both;"/></fieldset>
            </div>
            <div align="center"><input type="hidden" name="remember" value="yes" src=""/>
                <input type="submit" value="&#272;&#259;ng k&yacute;" class="button" onclick="return(submitregistration());" src=""/>
            </div>

            <input type="hidden" name="show" value="process_register">
            <input type="hidden" name="Itemid" value="11" src=""/>
            <input type="hidden" name="gid" value="0" src=""/>
            <input type="hidden" name="id" value="0" src=""/>
            <input type="hidden" name="user_id" value="0" src=""/>
            <input type="hidden" name="option" value="com_virtuemart" src=""/>
            <input type="hidden" name="853b323c485210f9b9fa8d309dd73ef2" value="1" src=""/>
            <input type="hidden" name="useractivation" value="1" src=""/>
            <input type="hidden" name="func" value="shopperadd" src=""/>
            <input type="hidden" name="page" value="checkout.index" src=""/>
        </form>
        <div id="statusBox" style="text-align:center;display:none;visibility:hidden;"></div>


    </div><!-- end product_main -->

</div><!-- end product -->


<script>
    $(function () {
        $("#vm_birthday_field").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
