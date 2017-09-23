<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
<script language="JavaScript" src='../jscript/jquery.form.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language=JavaScript src='../jscript/common.js'></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script>
    $(function ()
    {
        $("#date_deadline_coupon").datepicker({dateFormat: 'dd-mm-yy',
                                               changeMonth:true,
                                               changeYear: true});
    });
</script>

<style>
    .multiselect
    {
        width:451px;
        height:200px;
        border:solid 1px #c0c0c0;
        overflow-y:scroll;
    }
    .multiselect label
    {
        display:block;
    }
    .multiselect-on
    {
        color:#ffffff;
        background-color:#000099;
    }
</style>

<script language="JavaScript" type="text/javascript">

    jQuery.fn.multiselect = function ()
    {
        $(this).each(function ()
        {
            var checkboxes = $(this).find("input:checkbox");
            checkboxes.each(function ()
            {
                var checkbox = $(this);
                // Highlight pre-selected checkboxes
                if (checkbox.prop("checked"))
                    checkbox.parent().addClass("multiselect-on");

                // Highlight checkboxes that the user selects
                checkbox.click(function ()
                {
                    if (checkbox.prop("checked"))
                    {
                        checkbox.parent().addClass("multiselect-on");

                        if (checkbox.attr("name") == "all")
                        {
                            $('#multiselect input[type="checkbox"]').prop('checked', this.checked);
                            $('#multiselect input[type="checkbox"]').parent().addClass("multiselect-on");
                        }
                    } else
                    {
                        checkbox.parent().removeClass("multiselect-on");

                        if (checkbox.attr("name") == "all")
                        {
                            $('#multiselect input[type="checkbox"]').prop('checked', false);
                            $('#multiselect input[type="checkbox"]').parent().removeClass("multiselect-on");
                        }
                    }
                });
            });
        });
    };

    $(function ()
    {
        $(".multiselect").multiselect();
    });

</script>
<div class = "title" style ="text-indent:10px">Gửi khuyến mãi</div>
<form method="post">
    <table border="0">
        <tr>
            <td colspan="3">
                <b style="font-size:20px;
                   margin-left:3px">Thông tin người nhận khuyến mãi</b>
            </td>

        </tr>

        <tr >
            <td colspan="3" style="color:#F00">
                <p >{error}</p>
            </td>
        </tr>

        <tr>
            <td  style="width:100px">
                <b>Họ tên:</b>
                <span style="color:#F00">*</span>
            </td>
            <td>
                <input type="text"
                       name="name"
                       id="name"
                       value="{name}"
                       style = "width:450px"/>&nbsp;
            </td>
        </tr>

        <tr>
            <td>
                <b>Email:</b>
                <span style="color:#F00">*</span>
            </td>
            <td>
                <input type="text"
                       name="email"
                       id="email"
                       value="{email}"
                       style = "width:450px"/>
            </td>
        </tr>

        <tr>
            <td>
                <b>Địa chỉ:</b>
            </td>
            <td>
                <input type="text"
                       name="address"
                       id="address"
                       value="{address}"
                       style = "width:450px"/>
            </td>
        </tr>

        <tr>
            <td>
                <b>Điện thoại:</b>
            </td>
            <td>
                <input type="text"
                       name="phone"
                       id="phone"
                       value="{phone}"
                       style = "width:450px"/>
            </td>
        </tr>

        <tr>
            <td>
                <p>
                    <label>
                        <b>Danh sách </b>
                        <span style="color:#F00">*</span>
                    </label>
                </p>
            </td>
            <td>
                {coupon_list}
            </td>
        </tr>

        <tr>
            <td>
            </td>
            <td align="right">
                <input type="submit" style = "width:150px;
                       height:27px;
                       font-size:14px;
                       margin-top:10px;
                       margin-bottom:10px;
                       font-weight:bold"
                       class="button"
                       name="send"
                       value="Gửi khuyến mãi"
                       onclick="return confirm('Bạn muốn gửi khuyến mãi ?');" />
            </td>
        </tr>
    </table>

</form>
<hr/>
<form method="post" name="search">
    <table>
        <tr>
            <td>Họ tên:</td>
            <td><input type="text" name="ten" "></td>
            <td>Email:</td>
            <td><input type="text" name="thudientu" "></td>
            <td>Số ĐT:</td>            
            <td><input type="text" name="so_DT" " id = "so_DT"></td>
            <td><input type="submit"
                       class="button"
                       name="tim"
                       value="Tìm"
                       style="width:50px;
                       height:25px;
                       font-size:15px;
                       font-weight:bold"/> </td>
        </tr>
    </table>
</form>

<form method="post" name="searchchon">
    <table width="auto">
        <tr style="background:#D3D3D3">
            <td style="width:300px">Họ tên</td>
            <td style="width:200px">Email</td>
            <td style="width:600px">Địa chỉ</td>
            <td style="width:100px">Điện thoại</td>			
            <td style="width:70px">Chọn</td>		
        </tr>
        <!--BEGINLIST_SEARCH-->
        <!--BEGIN_SEARCH-->
        <tr>
            <td>{hoten}</td>
            <td>{mail}</td>
            <td style="height:50px">{diachi}</td>
            <td>{dienthoai}</td>			
            <td>
                <input type="button"
                       class="button"
                       name="chon"
                       value="Chọn"
                       onclick="window.location = './?show=coupon_send&id={id_user}'"
                       style =  "width:70px;
                       height:25px;
                       font-weight:bold;
                       font-size:14px"/>
            </td>
        </tr>
        <!--END_SEARCH-->
        <!--ENDLIST_SEARCH-->
    </table>
</form>

