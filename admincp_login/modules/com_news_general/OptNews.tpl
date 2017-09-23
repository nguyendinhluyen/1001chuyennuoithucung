<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->

<!--VI TRI THEM KHI DUNG BAT SU KIEN LIST BOX-->
<script>
    function display()
    {
        var dpt = document.getElementById("helplist");

        if (dpt.options[dpt.selectedIndex].value == 30)
        {
            document.getElementById("text_newskey").value = "dich-vu-van-chuyen";
            document.getElementById("text_newskey").disabled = true;
        } else if (dpt.options[dpt.selectedIndex].value == 31)
        {
            document.getElementById("text_newskey").value = "cach-thuc-thanh-toan";
            document.getElementById("text_newskey").disabled = true;
        } else if (dpt.options[dpt.selectedIndex].value == 32)
        {
            document.getElementById("text_newskey").value = "cau-hoi-thuong-gap";
            document.getElementById("text_newskey").disabled = true;
        } else if (dpt.options[dpt.selectedIndex].value == 33)
        {
            document.getElementById("text_newskey").value = "huong-dan-mua-hang";
            document.getElementById("text_newskey").disabled = true;
        } else
        {
            document.getElementById("text_newskey").value = '';
            document.getElementById("text_newskey").disabled = false;
        }
    }

    function submitForm1()
    {
        document.getElementById("txtdetail").value = oEdit1.getHTML();

        document.getElementById("txtdetail2").value = oEdit2.getHTML();
    }
</script>

<pre id="invdetail" name="invdetail" style="display:none">
    {txtdetail}
</pre>

<pre id="invdetail2" name="invdetail2" style="display:none">
    {txtdetail2}
</pre>


<div class = "title">{panel_add_update_product}</div>


<div class = "content_con">

    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm" onsubmit="submitForm1()">

        <input type="hidden" name="txtdetail" id="txtdetail"/>

        <input type="hidden" name="txtdetail2" id="txtdetail2"/>    

        <input type="hidden" name="opt" value="{opt}"/>

        <div {display_img} style ="float:left;width:150px">
            <p style = 'margin-left:65px;font-weight:bold'>{image}</p>
            <p style = "margin-left:45px">{ImgThumb} {ImgDel} <a href = '#' onclick = "javascript:history.back(1)"><img src='../style/images/back.gif'></a></p>
            <div class = "img_show" style = "width:135px">
                <img src='{imagesrc}' width='130px'/>
            </div>
        </div>

        <div style="float:left;padding-left:25px">
            <div style ="margin-left:103px;">{error}</div>

            <p><label><b>{news_title}</b></label><input size ='50' maxlength = '50' type = 'text' name = 'txtname' value ='{txtname}'>
            </p>        


            <p {style_kind_display}>
                <label><b> Loại: </b></label> {help_list}
            </p>

            <p {news_key_discription} ><label><b>{news_key}</b></label><input id='text_newskey' size ='50' maxlength = '50' type = 'text' name = 'txtnews_key' value ='{news_keys}' {text_disabled}>
            </p>

            <p {display_img}><label>{translator}</label><input size ='50' maxlength = '50' type = 'text' name = 'txttranslator' value ='{txttranslator}' id = 'txttranslator'/>
            </p>

            <p {style_img}>
                <label>{image}</label><input size ='50' name = 'image' type ="file" />
            </p>

            <p {source_display}>
                <label>Thứ tự: </label><input size ='2' type = 'text' name = 'txtsource' id="source" value ='{news_ordered}'/>
            </p>

            <p {style_display}>
                <label>{product_of_catalogue}</label>{cat_list}
            </p>
            <p {style_discription}>
                <label>{decription}</label>
                </br>
                </br>
                <textarea name = "decription" cols = "79" rows = "7">{txtdecripton}</textarea>

            </p>	
            <p>
                <label>{news_detail}</label>
                </br>
                </br>
                <script>
                    var oEdit1 = new InnovaEditor("oEdit1");
                    < !--font:12px Tahoma; -- >
                            oEdit1.arrStyle = [["BODY", false, "", "font-family:Times New Roman;font-size:12px;"]];
                            oEdit1.width = "660";
                    oEdit1.height = "600";
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
                    oEdit1.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,465)";
                    oEdit1.RENDER(document.getElementById("invdetail").innerHTML);

                </script>
            </p>

            </br>
            <p {display_img}>
                <b>{author}</b>
                </br>
                <input size ='104' maxlength = '100' type = 'text' name = 'txtauthor' value ='{txtauthor}' id = 'txtauthor'/>
            </p>


            <p {display_img}>				
                <b>{linkReference}</b>
                </br>
                <!--<p>Cấu trúc ghi link: <b>beginnanapet</b> http://nanapet.com/ <b>referencenanapet</b> Trang chủ Nanapet <b>endnanapet</b></p>-->
                </br>
                {scipt_editor}
            </p>

            <p {display_img} style="margin-top:10px">
                <b>Vùng dành cho SEO trong trang chi tiết bài viết (Các bạn viết bài không cần quan tâm nhé!)</b></br></br>			
                <b style="margin-top:10px">Title Page</b>
                </br>
                <input size ='104' maxlength = '100' type = 'text' name = 'txttitle_page' value ='{txttitle_page}' id = 'txttitle_page'/>
            </p>

            <p {display_img} style="margin-top:10px">        			
                <b style="margin-top:10px">Meta Description</b>
                </br>
                <input size ='104' maxlength = '100' type = 'text' name = 'txtmeta_description' value ='{txtmeta_description}' id = 'txtmeta_description'/>
            </p>

            <p {display_img} style="margin-top:10px">        			
                <b style="margin-top:10px">Meta Key Word</b>
                </br>
                <input size ='104' maxlength = '100' type = 'text' name = 'txtmeta_keyword' value ='{txtmeta_keyword}' id = 'txtmeta_keyword'/>
            </p>

            <p {style_display_add_button}>
                <label>&nbsp;</label><input class = "button" type = "submit" name = "btnadd" value = "{btn}"/>
                <span>
                    <input class = "button" type = "reset" value = "{reset}"/>
                </span>
            </p>
            <br/>
        </div>
    </form>
</div>