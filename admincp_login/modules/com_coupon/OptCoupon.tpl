<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
<script language="JavaScript" src='../jscript/jquery.form.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--Su dung de format tien -->
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
        width:350px;
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

<div class = "title">Coupon khách hàng</div>

<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm" onsubmit="submitForm1()">  	
        <div style="float:left;padding-left:25px">
            <div style="color:#F00">{error}</div>		
            <p>
                <label style="width:170px">
                    <b>Mã khuyến mãi</b>
                    <span style="color:#F00">*</span>
                </label>
                <input size ='50'
                       maxlength = '10'
                       type = 'text'
                       name = 'code_coupon'
                       value ='{code_coupon}'/>
            </p>
            <p>
                <label style="width:170px">
                    <b>Tên khuyến mãi</b>
                    <span style="color:#F00">*</span>
                </label>
                <input size ='50'
                       maxlength = '50'
                       type = 'text'
                       name = 'name_coupon'
                       value ='{name_coupon}'
                       id = 'name_coupon_code'/>
            </p>           	 
            <p>
                <label style="width:170px" >
                    <b>Giảm giá (%)</b>
                    <span style="color:#F00">*</span>
                </label>
                <input size ='50'
                       type = 'text'
                       name = 'discount_coupon'
                       value ='{discount_coupon}'
                       onkeyup="javascript:Money_CheckCorrect('discount_coupon');"
                       id = 'discount_coupon'
                       maxlength="3"/>
            </p>     	
            <p>
                <label style="width:170px">
                    <b>Điều kiện giá hóa đơn từ</b>
                    <span style="color:#F00">*</span>
                </label>
                <input size ='50'
                       maxlength = '50'
                       type = 'text'
                       name = 'begin_cost_coupon'
                       value ='{begin_cost_coupon}'
                       onkeyup="javascript:Money_CheckCorrect('begin_cost_coupon');"
                       id = 'begin_cost_coupon'/>
            </p>    
            <p>
                <label style="width:170px;">
                    <b>đến</b>
                    <span style="color:#F00">*</span>
                </label>
                <input size ='50'
                       maxlength = '50'
                       type = 'text'
                       name = 'end_cost_coupon'
                       value ='{end_cost_coupon}'
                       onkeyup="javascript:Money_CheckCorrect('end_cost_coupon');"
                       id = 'end_cost_coupon'/>
            </p>
            <p>
                <label style="width:170px">
                    <b>Ngày hết hạn  </b>
                    <span style="color:#F00">*</span>
                </label>
                <input size ='50'
                       maxlength = '50'
                       type = 'text'
                       name = 'date_deadline_coupon'
                       id = 'date_deadline_coupon'
                       value ='{date_deadline_coupon}'/>
            </p>
            <p>
                <label style="width:170px;">
                    <b>Trạng thái</b>
                    <span style="color:#F00">*</span>
                </label>
                <select name = "status_coupon">
                    <option value="1" {selected1}>Sử dụng</option>
                    <option value="2" {selected2}>Đã sử dụng</option>
                </select>
            </p>

            <p>	
                <label style="width:170px;">
                    <b>Áp dụng cho </b>
                    <span style="color:#F00">*</span>
                </label>
                {cat_list}
            </p>
            <p>
                <label style="width:170px;">
                    <b>Chú thích kèm theo: </b>
                </label>
                </br>
                </br>
                <textarea name = "note_coupon"            
                          cols = "79"
                          rows = "7">{note_coupon}
                </textarea>
            </p>
            </br>
            <p {style_display_clone}>
                <label style="width:170px;">
                    <b>Số lượng sao chép</b>
                </label>
                <select name = "clone_coupon" style="width: 100px">
                    <option value="0">0</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                </select>
            </p>
            </br>
            <p {style_display_customer}>
                <label style="width:170px; clear: both">
                    <b>Khách hàng nhận khuyến mãi: </b>
                </label>
                <span>&nbsp{customer_email_coupon}</span>
            </p>
            </br>
            </br>
            </br>
            <p>
                <input class = "button" type = "submit" name = "btnadd" value = "{btnadd}"/>
            </p>
            <br/>
        </div>
    </form>
</div>