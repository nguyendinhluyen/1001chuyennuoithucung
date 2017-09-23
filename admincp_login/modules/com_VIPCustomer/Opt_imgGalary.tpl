<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<link href="../jgallery/jss/style.css" rel="stylesheet" type="text/css" />
<link href="../jgallery/jss/default.css" rel="stylesheet" type="text/css" />
<link href="../jgallery/jss/messages.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jgallery/jss/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../jgallery/jss/jquery-ui-1.7.1.custom.min.js"></script>
<script src="../jgallery/jss/alert/jquery.alerts.js" type="text/javascript"></script>
<link href="../jgallery/jss/alert/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

<!--Su dung de format tien -->
<script language=JavaScript src='../jscript/common.js'></script>
<script>

    function function_type_product(pro_type_price)
    {
        n = pro_type_price.split(':');
        // Gan gia tri cho doi tuong loai va gia 
        var type_product = document.getElementById("type_product");
        type_product.value = n[0];

        var price_product = document.getElementById("price_product");
        price_product.value = n[1];
    }

</script>

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->

<div class = "title"> <span style="margin-left:5px; font-size:14px"><b>{title}</b></span></div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">

        <div  style="margin-left:5px;margin-right:5px">
            <p>
            <p>
                <label style="font-weight:bold;color:green;margin-bottom:3px; top:10px;font-size:20px; margin-left:3px; width:auto">Khách Hàng Thân Thiết</label><br style="clear:both"/>


            <p><label style="font-weight:bold;color:green;margin-bottom:3px; margin-left:3px; margin-top:10px;font-size:12px; width:auto">Tên danh hiệu<span style="color:#F00">*</span></label><br style="clear:both"/><input type="text" style = "width: 200px; margin-left:2px" id ="name_type_of_Customer" name="name_type_of_Customer" value="{name_type_of_Customer}" /></p>

            <p><label style="font-weight:bold;color:green;margin-bottom:3px; margin-left:3px;margin-top:10px;font-size:12px; width: auto">Mức điểm áp dụng <span style="color:#F00">*</span></label><br style="clear:both"/><input class="score_level" type="text" id="score_level" name="score_level" value="{score_level}" onkeyup="javascript:Money_CheckCorrect('score_level');"/><span style="font-size:14px">điểm</span></p>

            <p><label style="font-weight:bold;color:green;margin-bottom:3px; margin-left:3px;margin-top:10px;font-size:12px; width: auto">Chiết khấu (%) <span style="color:#F00">*</span></label><br style="clear:both"/><input class="sale_level" type="text" id="sale_level" name="sale_level" value="{sale_level}" onkeyup="javascript:Money_CheckCorrect('sale_level');"/><span style="font-size:14px">%</span></p>

            <p><label style="font-weight:bold;color:green;margin-bottom:3px; margin-left:3px;margin-top:10px;font-size:12px; width: auto">Phí duy trì <span style="color:#F00">*</span></label><br style="clear:both"/><input class="fee_level" type="text" id="fee_level" name="fee_level" value="{fee_level}" onkeyup="javascript:Money_CheckCorrect('fee_level');"/><span style="font-size:14px">VNĐ</span></p>

            <p>&nbsp;</p>
            <input style="height:36px;border:1px solid #666;border:2px solid #ccc; margin-top:10px; margin-left: 200px; width:50px; font-weight:bold" type="submit" name="btnSave" value="Lưu"/></p>
            <div>	
                <br style="clear:both"/>	
            </div>	
        </div>
    </form>
    <div style="clear:both"/></div>
<br/><br/>
</div>