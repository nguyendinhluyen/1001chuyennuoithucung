<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
<script language="JavaScript" src='../jscript/jquery.form.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<style>
    .multiselect {
        width:350px;
        height:200px;
        border:solid 1px #c0c0c0;
        overflow-y:scroll;
    }
    .multiselect label {
        display:block;
    }
    .multiselect-on {
        color:#ffffff;
        background-color:#000099;
    }
</style>
<script language="JavaScript" type="text/javascript">
    jQuery.fn.multiselect = function () {
        $(this).each(function () {
            var checkboxes = $(this).find("input:checkbox");
            checkboxes.each(function () {
                var checkbox = $(this);
                // Highlight pre-selected checkboxes
                if (checkbox.prop("checked"))
                    checkbox.parent().addClass("multiselect-on");

                // Highlight checkboxes that the user selects	
                checkbox.click(function ()
                {
                    if (checkbox.prop("checked"))
                        checkbox.parent().addClass("multiselect-on");
                    else
                        checkbox.parent().removeClass("multiselect-on");
                });
            });
        });
    };
    $(function () {
        $(".multiselect").multiselect();
    });
    var count1 = 0;
    var count2 = 0;
    function insertOptionBeforeColor(pos) {
        var content = document.getElementById('color_name').value;
        var elSel = document.getElementById('color');
        var elOptNew = document.createElement('option');
        elOptNew.text = content;
        elOptNew.value = content;
        try {
            elSel.add(elOptNew, pos); //elOptOld); standards compliant; doesn't work in IE
        } catch (ex) {
            elSel.add(elOptNew, elSel.selectedIndex); // IE only
        }
    }

    function insertOptionBeforeType() {
        var content1 = document.getElementById('type_name').value;
        var content2 = document.getElementById('type_price').value;
        var elSel = document.getElementById('type');
        var elOptNew = document.createElement('option');
        elOptNew.text = content1 + "::" + content2;
        elOptNew.value = content1 + "::" + content2;
        try {
            elSel.add(elOptNew, 0);//elOptOld); standards compliant; doesn't work in IE
        } catch (ex) {
            elSel.add(elOptNew, elSel.selectedIndex); // IE only
        }
    }

    function removeOptionSelectedColor() {
        var elSel = document.getElementById('color');
        var i;
        for (i = elSel.length - 1; i >= 0; i--) {
            if (elSel.options[i].selected) {

                elSel.remove(i);
            }
        }
    }

    function removeOptionSelectedType() {
        var elSel = document.getElementById('type');
        var i;
        for (i = elSel.length - 1; i >= 0; i--) {
            if (elSel.options[i].selected) {

                elSel.remove(i);
            }
        }
    }

    function onSelectedColor() {
        var elSel = document.getElementById('color');
        var i;
        for (i = elSel.length - 1; i >= 0; i--) {
            if (elSel.options[i].selected) {
                document.getElementById('color_btn_del').disabled = false;
            } else {

            }
        }
    }

    function onSelectedType() {
        var elSel = document.getElementById('type');
        var i;
        for (i = elSel.length - 1; i >= 0; i--) {
            if (elSel.options[i].selected) {
                document.getElementById('type_btn_del').disabled = false;
            } else {

            }
        }
    }

    function appendOptionLast(num) {
        var elOptNew = document.createElement('option');
        elOptNew.text = 'Append' + num;
        elOptNew.value = 'append' + num;
        var elSel = document.getElementById('selectX');

        try {
            elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
        } catch (ex) {
            elSel.add(elOptNew); // IE only
        }
    }

    function removeOptionLast() {
        var elSel = document.getElementById('selectX');
        if (elSel.length > 0)
        {
            elSel.remove(elSel.length - 1);
        }
    }

    function editOptionColor() {
        var elSel = document.getElementById('color');
        var i;
        for (i = elSel.length - 1; i >= 0; i--) {
            if (elSel.options[i].selected) {
                if (document.getElementById('color_btn_edit').value == 'Sửa') {
                    document.getElementById('color_name').value = elSel.options[i].value;
                    document.getElementById('color_btn_edit').value = 'Lưu';
                } else {
                    elSel.options[i] = new Option(document.getElementById('color_name').value, document.getElementById('color_name').value);
                    document.getElementById('color_btn_edit').value = 'Sửa';
                }
            }
        }
    }

    function editOptionType() {
        var elSel = document.getElementById('type');
        var i;
        for (i = elSel.length - 1; i >= 0; i--) {
            if (elSel.options[i].selected) {
                if (document.getElementById('type_btn_edit').value == 'Sửa') {
                    var valueOp = elSel.options[i].value;
                    var splitOp = valueOp.split("::");
                    document.getElementById('type_name').value = splitOp[0];
                    document.getElementById('type_price').value = splitOp[1];
                    document.getElementById('type_btn_edit').value = 'Lưu';
                } else {
                    var name = document.getElementById('type_name').value;
                    var price = document.getElementById('type_price').value;
                    elSel.options[i] = new Option(name + '::' + price, name + '::' + price);
                    document.getElementById('type_btn_edit').value = 'Sửa';
                }
            }
        }
    }

    $(document).ready(function () {
        $("#show_list_img").html("{list_img}");
        $('#image_list').live('change', function () {
            $("#show_list_img").html('');
            $("#show_list_img").html('<img src="loader.gif" alt="Uploading...."/>');
            $("#frm_img").ajaxForm({
                target: '#show_list_img'
            }).submit();
        });
    });

    function deleteImg(id) {
        $.ajax({
            type: "GET",
            url: "com_product/delete_img.php",
            data: "id_product_detail=" + id + "&id_product=" + {id_product},
            success: function (msg) {
                $("#show_list_img").html('');
                $("#show_list_img").html(msg);
            }
        });
    }

    function submitForm2() {
        document.getElementById("txtdetail").value = oEdit1.getXHTMLBody();
        document.getElementById("product_detail_tacdung").value = oEdit2.getXHTMLBody();
        document.getElementById("product_detail_phuhopcho").value = oEdit3.getXHTMLBody();
        document.getElementById("product_detail_nguyenlieu_thanhphan").value = oEdit4.getXHTMLBody();
        document.getElementById("product_detail_phantichdambao").value = oEdit5.getXHTMLBody();
        document.getElementById("product_detail_huongdansudung").value = oEdit6.getXHTMLBody();
        document.getElementById("product_detail_huongdanbaoquan").value = oEdit7.getXHTMLBody();
        document.getElementById("product_detail_luuy").value = oEdit8.getXHTMLBody();
        document.getElementById("product_detail_khuyenkhich").value = oEdit9.getXHTMLBody();
        document.getElementById("product_detail_donggoi_thetich").value = oEdit10.getXHTMLBody();
        document.getElementById("product_detail_nhasanxuat").value = oEdit11.getXHTMLBody();
        document.getElementById("product_detail_xuatxu").value = oEdit12.getXHTMLBody();
    }

</script>

<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=JavaScript src='../jscript/common.js'></script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<pre id="invdetail" name="invdetail" style="display:none">
    {txtdetail}
</pre>    

<pre id="invdetail_tacdung" name="invdetail_tacdung" style="display:none">
    {invdetail_tacdung}
</pre>

<pre id="invdetail_phuhopcho" name="invdetail_phuhopcho" style="display:none">
    {invdetail_phuhopcho}
</pre>

<pre id="invdetail_nguyenlieu_thanhphan" name="invdetail_nguyenlieu_thanhphan" style="display:none">    
    {invdetail_nguyenlieu_thanhphan}
</pre>       

<pre id="invdetail_phantichdambao" name="invdetail_phantichdambao" style="display:none">
    {invdetail_phantichdambao}
</pre>

<pre id="invdetail_huongdansudung" name="invdetail_huongdansudung" style="display:none">
    {invdetail_huongdansudung}
</pre>

<pre id="invdetail_huongdanbaoquan" name="invdetail_huongdanbaoquan" style="display:none">    
    {invdetail_huongdanbaoquan}
</pre>

<pre id="invdetail_luuy" name="invdetail_luuy" style="display:none">    
    {invdetail_luuy}
</pre>

<pre id="invdetail_khuyenkhich" name="invdetail_khuyenkhich" style="display:none">    
    {invdetail_khuyenkhich}
</pre>

<pre id="invdetail_donggoi_thetich" name="invdetail_donggoi_thetich" style="display:none">    
    {invdetail_donggoi_thetich}
</pre>

<pre id="invdetail_nhasanxuat" name="invdetail_nhasanxuat" style="display:none">    
    {invdetail_nhasanxuat}
</pre>

<pre id="invdetail_xuatxu" name="invdetail_xuatxu" style="display:none">    
    {invdetail_xuatxu}
</pre>

<div class = "title" style="font-family:Arial, Helvetica, sans-serif; 
     font-size:12px;">{panel_add_update_product} </div>
<div class = "content_con">        
    <div style ="float:left;width:20%; font-family:Arial, Helvetica, sans-serif; font-size:12px">
        <div style="margin-left:10px; margin-top:10px">
            <b> Hình ảnh </b>
            </br>
        </div>
        <div style = "width:135px; height:135px; margin-top:20px">
            {imagesrc}
        </div>
        <!-- <br/>
        <br/>
        <br/>
        <form method='POST' enctype='multipart/form-data' 
              id = "frm_img" 
              name = "frm_img" 
              action="com_product/ajax_up_list_img.php" >
            <p>
                <label style = "margin-top:-50px">&nbsp;&nbsp;&nbsp;Hình minh họa</label>
                <input size ='1' 
                       name ='image_list[]' 
                       id ='image_list' 
                       type ="file" 
                       multiple
                       style ="margin-left: 8px; margin-top:-12px"> </input>
            </p>
            <input type="hidden" 
                   name = "id_product" 
                   value="{id_product}"/>
        </form>-->
    </div>
    <form method='POST' enctype='multipart/form-data' 
          id = "frm" 
          name = "frm" 
          onsubmit="submitForm2()" 
          style="float:left; width:80%">
        <input type="hidden" name="txtdetail" id="txtdetail"> </input>
        <input type="hidden" name="product_detail_tacdung" id="product_detail_tacdung"> </input>
        <input type="hidden" name="product_detail_phuhopcho" id="product_detail_phuhopcho"> </input>
        <input type="hidden" name="product_detail_nguyenlieu_thanhphan" id="product_detail_nguyenlieu_thanhphan"> </input>
        <input type="hidden" name="product_detail_phantichdambao" id="product_detail_phantichdambao"> </input>
        <input type="hidden" name="product_detail_huongdansudung" id="product_detail_huongdansudung"> </input>
        <input type="hidden" name="product_detail_huongdanbaoquan" id="product_detail_huongdanbaoquan"> </input>
        <input type="hidden" name="product_detail_luuy" id="product_detail_luuy"> </input>
        <input type="hidden" name="product_detail_khuyenkhich" id="product_detail_khuyenkhich"> </input>
        <input type="hidden" name="product_detail_donggoi_thetich" id="product_detail_donggoi_thetich"> </input>
        <input type="hidden" name="product_detail_nhasanxuat" id="product_detail_nhasanxuat"> </input>
        <input type="hidden" name="product_detail_xuatxu" id="product_detail_xuatxu"> </input>
        <div style="float:left;padding-left:25px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">			
            {error}            
            <p>
                <label>
                    <b>Tên sản phẩm</b>
                </label>
                <input size ='50'
                       maxlength = '50'
                       type = 'text'
                       name = 'txtname'
                       value ="{txtname}"/>
            </p>
            <p>
                <label>
                    <b>Nhà sản xuất</b>
                </label>
                {select_brand_produc_name_list}
                <input type = 'text' 
                       name = 'txtnsx' 
                       value ="{txtnsx}" 
                       style="margin-left: 2px; width:120px;" readonly/>
            </p>
            <!--<p>
                <label>
                    <b>Link</b>
                </label>
                <input size ='50' 
                       maxlength = '255' 
                       type = 'text' 
                       name = 'txtlinknsx' 
                       value ='{txtlinknsx}' 
                       style="width:260px">
            </p>-->
            <p>
                <label><b>Xuất xứ</b></label>
                <input size ='50' 
                       maxlength = '50' 
                       type = 'text' 
                       name = 'txtXuatxu' 
                       value ='{txtXuatxu}'>
            </p>            
            <p>
                <label><b>Dành cho : </b> </label>        
                <input size ='50' 
                       type = "checkbox" 
                       name = 'chkChoMeo[]' 
                       value ='1' {check1}>	Chó 
                <input size ='50' 
                       type = "checkbox" 
                       name = 'chkChoMeo[]' 
                       value ='2' {check2}> Mèo            
            </p>            
            <p>
                <label>File/{image}</label>
                <input size ='50' name = 'image' type ="file" />
            </p>
            <!--<p>
                <div id="show_list_img" style="border: 1px solid; width: 480px;" >
                    <img width="60px;" height="80px;" src="../style/images/back.gif" />
                </div>
            </p>-->
            <p>
                <label>Giá sản phẩm</label>
                <input size ='20' 
                       type = 'text' 
                       name = 'txtprice' 
                       id="price" 
                       value ='{txtprice}' 
                       onkeyup="javascript:Money_CheckCorrect('price');"/>
                <select name='price_unit'>
                    <option value="VND" {vnd}>VND</option>
                    <!--<option value="USD" {usd}>USD</option>-->
                </select>
            </p>
            <p>
                <label>Giá khuyến mãi</label> 
                <input size ='30' 
                       type = 'text' 
                       name = 'khuyenmai' 
                       id = 'khuyenmai'  
                       value ='{khuyenmai}' 
                       onkeyup="javascript:Money_CheckCorrect('khuyenmai');">
            </p>
            <p>
                <label>{product_of_catalogue}</label>{cat_list}
            </p>            
            <p>
                <label>{product_of_commodity}</label>{commodity_list}
            </p>            
            <p>
                <label><b>Keywords</b></label>
                <input size ='50' 
                       maxlength = '50' 
                       type = 'text' 
                       name = 'keywords' 
                       value ='{keywords}'>
            </p>
            <p>
                <label><b>Description</b></label>
                <input size ='50' 
                       maxlength = '50' 
                       type = 'text' 
                       name = 'description' 
                       value ='{description}'>
            </p>
            <p>
                <label>Mô tả ngắn </label><br/>
                <textarea name = "products_description" 
                          cols = "66" 
                          rows = "5">{products_description}</textarea>                        
            </p>
            <p>
                <label>Thuộc tính </label></br>

            <table  border="1" cellpadding="0" cellspacing="0" width="84%">
                <tr>
                    <td width="40%" align="center">Đặc điểm</td>
                    <td td width="60%" align="center">Loại</td>
                </tr>
                <tr>
                    <td align="left" >
                        Tên thuộc tính : <input type="textbox" 
                                                id="attribute_name" 
                                                name="attribute_name" 
                                                value="{p_attribute}" 
                                                style="width:120px;"/><br/>
                        Giá trị : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="textbox" 
                               id="color_name" 
                               name="color_name" 
                               style="width:120px;"/><br/><br/>
                        <input type="button" 
                               name="color_btn_add" 
                               value="Thêm" 
                               onclick="insertOptionBeforeColor(0);" style="margin-left:40px;"/>
                        <input type="button" 
                               name="color_btn_edit" 
                               id="color_btn_edit" 
                               value="Sửa"
                               onclick="editOptionColor();" />
                        <input type="button" 
                               id="color_btn_del" 
                               name="color_btn_del" 
                               value="Xóa" 
                               onclick="removeOptionSelectedColor();"/>
                        <input type="hidden" 
                               id="attribute_name_h" 
                               name="attribute_name_h"
                               style="width:150px;"/><br/>
                    </td>

                    <td align="center" >
                        <br/>
                        Loại : <input type="textbox" 
                                      id="type_name" 
                                      name="type_name" 
                                      style="width:200px;"/><br/>
                        &nbsp;&nbsp;Giá : <input type="textbox" 
                                                 id="type_price" 
                                                 name="type_price" 
                                                 style="width:200px;" 
                                                 onkeyup="javascript:Money_CheckCorrect('type_price');"/><br/><br/>
                        <input type="button" 
                               name="type_btn_add" 
                               value="Thêm"
                               onclick="insertOptionBeforeType();"/>
                        <input type="button" 
                               name="type_btn_edit" 
                               id="type_btn_edit" 
                               value="Sửa" 
                               onclick="editOptionType();"/>
                        <input type="button" 
                               id="type_btn_del"
                               name="type_btn_del" 
                               value="Xóa"
                               onclick="removeOptionSelectedType();"/><br/><br/>
                    </td>
                </tr>
                <tr>
                    <td >			
                        <select name="color[]" id="color"  
                                multiple="multiple" 
                                style="width: 100%; height:100px;" 
                                onclick="onSelectedColor();">
                            {option_color}
                        </select>

                    </td>
                    <td>
                        <select name="type[]" 
                                id="type"  
                                multiple="multiple" 
                                style="width: 100%; height:100px;" 
                                onclick="onSelectedType();">
                            {option_type}
                        </select>
                    </td>
                </tr>
            </table>  
            </p>                                                                                                                       
            <p>            
                <label>1. Giới Thiệu </br> </br> &nbsp; &nbsp; Sản Phẩm</label></br></br></br>
                <script>
                    var oEdit1 = new InnovaEditor("oEdit1");
                    oEdit1.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit1.width = "550";
                    oEdit1.height = 500;
                    oEdit1.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit1.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit1.RENDER(document.getElementById("invdetail").innerHTML);
                </script>
            </p>

            <p>            
                <label>2. Tác Dụng</label></br>
                <script>
                    var oEdit2 = new InnovaEditor("oEdit2");
                    oEdit2.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit2.width = "550";
                    oEdit2.height = 200;
                    oEdit2.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit2.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit2.RENDER(document.getElementById("invdetail_tacdung").innerHTML);
                </script>
            </p>

            <p>            
                <label>3. Phù Hợp Cho</label></br>
                <script>
                    var oEdit3 = new InnovaEditor("oEdit3");
                    oEdit3.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit3.width = "550";
                    oEdit3.height = 200;
                    oEdit3.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit3.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit3.RENDER(document.getElementById("invdetail_phuhopcho").innerHTML);
                </script>
            </p>

            <p>            
                <label>4. Nguyên Liệu </br></br> &nbsp; &nbsp; Thành Phần </label></br></br></br>
                <script>
                    var oEdit4 = new InnovaEditor("oEdit4");
                    oEdit4.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit4.width = "550";
                    oEdit4.height = 200;
                    oEdit4.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit4.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit4.RENDER(document.getElementById("invdetail_nguyenlieu_thanhphan").innerHTML);
                </script>
            </p>

            <p>            
                <label>5. Phân Tích </br></br> &nbsp; &nbsp; Đảm Bảo </label></br></br></br>
                <script>
                    var oEdit5 = new InnovaEditor("oEdit5");
                    oEdit5.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit5.width = "550";
                    oEdit5.height = 200;
                    oEdit5.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit5.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit5.RENDER(document.getElementById("invdetail_phantichdambao").innerHTML);
                </script>
            </p>

            <p>            
                <label>6. Hướng Dẫn </br></br> &nbsp; &nbsp; Sử Dụng </label></br></br></br>
                <script>
                    var oEdit6 = new InnovaEditor("oEdit6");
                    oEdit6.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit6.width = "550";
                    oEdit6.height = 200;
                    oEdit6.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit6.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit6.RENDER(document.getElementById("invdetail_huongdansudung").innerHTML);
                </script>
            </p>

            <p>            
                <label>7. Hướng Dẫn </br></br> &nbsp; &nbsp; Bảo Quản </label></br></br></br>
                <script>
                    var oEdit7 = new InnovaEditor("oEdit7");
                    oEdit7.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit7.width = "550";
                    oEdit7.height = 200;
                    oEdit7.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit7.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit7.RENDER(document.getElementById("invdetail_huongdanbaoquan").innerHTML);
                </script>
            </p>

            <p>            
                <label>8. Lưu Ý </label></br>
                <script>
                    var oEdit8 = new InnovaEditor("oEdit8");
                    oEdit8.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit8.width = "550";
                    oEdit8.height = 200;
                    oEdit8.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit8.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit8.RENDER(document.getElementById("invdetail_luuy").innerHTML);
                </script>
            </p>

            <p>            
                <label>9. Khuyến Khích </label></br>
                <script>
                    var oEdit9 = new InnovaEditor("oEdit9");
                    oEdit9.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit9.width = "550";
                    oEdit9.height = 200;
                    oEdit9.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit9.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit9.RENDER(document.getElementById("invdetail_khuyenkhich").innerHTML);
                </script>
            </p>

            <p>            
                <label>10. Đóng Gói </br></br> &nbsp; &nbsp; &nbsp; &nbsp;Thể Tích</label></br></br></br>
                <script>
                    var oEdit10 = new InnovaEditor("oEdit10");
                    oEdit10.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit10.width = "550";
                    oEdit10.height = 200;
                    oEdit10.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit10.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit10.RENDER(document.getElementById("invdetail_donggoi_thetich").innerHTML);
                </script>
            </p>

            <p>            
                <label>11. Nhà Sản Xuất</label></br>
                <script>
                    var oEdit11 = new InnovaEditor("oEdit11");
                    oEdit11.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit11.width = "550";
                    oEdit11.height = 200;
                    oEdit11.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit11.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit11.RENDER(document.getElementById("invdetail_nhasanxuat").innerHTML);
                </script>
            </p>

            <p>            
                <label>12. Xuất Xứ</label></br>
                <script>
                    var oEdit12 = new InnovaEditor("oEdit12");
                    oEdit12.arrStyle = [["BODY", false, "", "font:12px arial;"]];
                    oEdit12.width = "550";
                    oEdit12.height = 200;
                    oEdit12.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                        "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                        "Form", "Clean", "ClearAll", "BRK",
                        "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                        "ParagraphFormatting", "CssText", "Styles", "|",
                        "Paragraph", "FontName", "FontSize", "|",
                        "Bold", "Italic",
                        "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                        "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                    oEdit12.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,200)";
                    oEdit12.RENDER(document.getElementById("invdetail_xuatxu").innerHTML);
                </script>
            </p>

            <div class="clear"></div>

            <p style="float:left;">
                <input class = "button" 
                       type = "submit" 
                       name = "btnadd" 
                       value = "{btn}"
                       onclick="selectAll();"/>
            </p>
            <br/>
        </div>

        <input type="hidden" name="submit_form" value="1">
    </form>
</div>

<script language="JavaScript" type="text/javascript">
    function selectAll() {
        var elSel = document.getElementById('color');
        var i;
        for (i = elSel.length - 1; i >= 0; i--) {
            elSel.options[i].selected = true;
        }
        var elSel1 = document.getElementById('type');
        var i;
        for (i = elSel1.length - 1; i >= 0; i--) {
            elSel1.options[i].selected = true;
        }
    }
</script>