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

<div class = "title">{title}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">

        <div  style="margin-left:5px;margin-right:5px">
            <p><label style="font-weight:bold;color:green;margin-bottom:3px; font-size:20px; margin-left:3px; width:auto">Tên sản phẩm</label><br style="clear:both"/>
                <input type="text" id ="input_name_product" name="input_name_product" value="{input_name_product}" style="width:200px;margin-left:3px " disabled="disabled"/></p>

            <p>{product_type}</p>

            <p><label style="font-weight:bold;color:green;margin-bottom:3px; margin-left:3px; margin-top:10px;font-size:12px">Số lượng <span style="color:#F00">*</span></label><br style="clear:both"/><input type="text" id ="quantity" name="quantity" value="{quantity}" onkeyup="javascript:Money_CheckCorrect('quantity');"/></p>

            <p><label style="font-weight:bold;color:green;margin-bottom:3px; margin-left:3px;margin-top:10px;font-size:12px">Giá sản phẩm <span style="color:#F00">*</span></label><br style="clear:both"/><input class="price_product" type="text" id="price_product" name="price_product" value="{price_product}" onkeyup="javascript:Money_CheckCorrect('price_product');"/><span style="font-size:14px">VNĐ</span></p>

            <p><br style="clear:both"/><input class="type_product" type="text" id="type_product" name="type_product" value="{type_product}" hidden="hidden" /></p>

            <p>&nbsp;</p>
            <input style="height:36px;border:1px solid #666;border:2px solid #ccc; margin-top:10px; margin-left: 200px; width:50px; font-weight:bold" type="submit" name="btnSave" value="Lưu"/></p>
            <div style="display:{display};">	
                <br style="clear:both"/>	
            </div>	
        </div>
    </form>
    <div style="clear:both"/></div>
<br/><br/>
</div>