	
<link rel="stylesheet" type="text/css" href="{linkS}layout/css/template.css" />
<link rel="stylesheet" type="text/css" href="{linkS}layout/css/jquery-ui-1.8.16.custom.css"/>
<script type="text/javascript" src="{linkS}layout/js/jquery-ui-1.8.16.custom.min.js"></script>

<script language="javascript" type="text/javascript">

    function isInt(num)
    {
        if (parseInt(num) == num)
        {
            return true;
        }
        return false;
    }
    function isFloat(num)
    {
        if (parseFloat(num) == num)
        {
            return true;
        }
        return false;
    }
    function isTrue(num)
    {
        if (isInt(num) || isFloat(num))
        {
            return true;
        }
        return false;
    }

    function submitregistration() {
        //alert('hh');
        var form = document.petprofile;
        var isvalid = true;
        //var required_fields = new Array('username','middle_name','phone_2','address_1','agreed');

        if (form.name.value == '') {
            alert('Vui lòng nhập tên Pet của bạn.');
            return false;
        }
        if (form.birthday.value == '') {
            alert('Vui lòng nhập đúng ngày sinh Pet.');
            return false;
        }
        if (form.species.value == '') {
            alert('Vui lòng nhập đúng loài Pet.');
            return false;
        }
        if (form.mausac.value == '') {
            alert('Vui lòng nhập đúng màu sắc Pet.');
            return false;
        }
        if (form.chieucao.value == '') {
            alert('Vui lòng nhập đúng chiều cao Pet.');
            return false;
        }
        if (!isTrue(form.chieucao.value)) {
            alert('Vui lòng nhập đúng dd chiều cao Pet.');
            return false;
        }

        if (form.cannang.value == '') {
            alert('Vui lòng nhập đúng câng nặng Pet.');
            return false;
        }
        if (!isTrue(form.cannang.value)) {
            alert('Vui lòng nhập đúng dd chiều cao Pet.');
            return false;
        }

        if (!isvalid) {
            alert("Hãy chắc là đã hoàn thành mẫu và chính xác.");
        }
        return isvalid;
    }
</script>
<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div> 

    <div class="news_main">

        <div class="user_left">

            <table style="text-align: center;" border="0px;">
                <tr><td>Ảnh Pet</td></tr>
                <tr><td><img alt="" src="{linkS}upload/avatar/{img_pet}" width="120px" height="140px;"></td></tr>
            </table>
        </div>


        <div class="user_right">

            <h2 class="title_register">CẬP NHẬT PET PROFILE</h2>

            <!--START_form_register-->

            <form method="POST" name="petprofile" enctype="multipart/form-data">

                <div class="main_register">

                    <fieldset class="fieldset_reg_info"><legend>Thông tin pet</legend>

                        <table border="0px" width="100%" class="user-forms">

                            <tr>

                                <td width="260px"><div class="font11">Tên gọi </div>

                                    <input type="text" id="name" name="name" value="{name}" class="input_reg" />

                                </td>


                                <td><div class="font11">Ngày sinh:</div>
                                    <input type="text" id="birthday" name="birthday"  value="{birthday}"  class="input_reg" />

                                </td>


                            </tr>

                            <tr>

                                <td><div class="font11">Loài</div>

                                    <input type="text" id="species" name="species"  value="{species}"  class="input_reg" />

                                </td>
                                <td><div class="font11">Màu sắc<span class="red"></span></div>

                                    <input type="text" id="mausac" name="mausac"  value="{mausac}"  class="input_reg" />
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="font11">Chiều cao (cm)<span class="red"></span></div>
                                    <input type="text" id="chieucao" name="chieucao"  value="{chieucao}"  class="input_reg" />
                                </td>
                                <td><div class="font11">Cân nặng (kg)<span class="red"></span></div>

                                    <input type="text" id="cannang" name="cannang"  value="{cannang}"  class="input_reg" />
                                </td>

                            </tr>
                            <tr>
                                <td><div class="font11">Giới tính <span class="red"></span></div>
                                    <select name='sex' id='sex' >
                                        <option value="1">Đực</option>
                                        <option value="0">Cái</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="font11">Hình ảnh<span class="red"></span></div>
                                    <input type="file" name="petimage" class="input_reg" />
                                </td>
                            </tr>

                        </table>

                    </fieldset>

                    <input type="hidden" name="ac" value="register" />

                </div>
                <button class="submit-button-orange" type="submit" name='submit' onclick="return(submitregistration());"></button>
            </form>
            <center><img src="{linkS}layout/images/arthritis_in_dogs_2.jpg"></center>
            <!--END_form_register-->

        </div>

    </div>
</div>
<script>
    $(function () {
        $("#birthday").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>