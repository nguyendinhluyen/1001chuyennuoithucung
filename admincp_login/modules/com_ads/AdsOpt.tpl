<!--BEGINLIST_FLASH-->
<!--BEGIN_FLASH-->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62px" height="100px">
    <param name="movie" value = "{logo}" />
    <param name="quality" value="high" />
    <param name="wmode" value="transparent"/>
    <embed src = "{logo}" quality = "high" type="application/x-shockwave-flash" WMODE="transparent" width="62px" height="100px" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<!--END_FLASH-->
<!--ENDLIST_FLASH-->
<script>
    function submitForm1() {
        document.getElementById("description_ads").value = oEdit1.getHTML();
    }
</script>

<div class = "title">{title}</div>
<div class = "content_con">
    <pre id="invdetail" name="invdetail" style="display:none">
        {description_ads}
    </pre>
    <form method='POST' enctype='multipart/form-data' id="frm" name="frm" onsubmit="submitForm1()">
        <input type="hidden" name="description_ads" id="description_ads"/>
        <div class = "img_show" style="width: 150px">
            {show_logo}
            <p style = 'text-align:center;width:150px'>
                <a href = '{view_adver}' target="_blank">
                    <img src = '../style/images/picon.gif'></a>
            </p>
        </div>

        <div style="float:left;padding-left:20px">
            <div class ='err' style ='margin-left:100px'>{error}</div>
            <p>
                <label><b>Tên thương hiệu</b></label>
                <input type = 'text' name = 'txtwebname' class ='fieldinput' value ='{txtwebname}'> 
                <font color ='red'>*</font>
            </p>
            <p>
                <label>File hình / flash</label>
                <input style="margin-left:0px" size = '29' type = 'file' name = 'fileAdver'/>
            </p>
            <p>
                <label>Mô tả ngắn</label>
                <br><br>
                <textarea name = "short_description"
                          cols = "79"
                          rows = "7">{short_description}</textarea>
            </p>
            <p>
                <label>Mô tả thương hiệu</label>
                <br><br>
                <script>
                    var oEdit1 = new InnovaEditor("oEdit1");
                    oEdit1.arrStyle = [["BODY", false, "", "font-family:Arial;font-size:12px;"]];
                    oEdit1.width = "580";
                    oEdit1.height = "580";
                    oEdit1.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
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
                <br>
            </p>
            <p>
                <label>Hiển thị</label>
                <input type = 'checkbox' name = 'cbstatus' {checked}/>
            </p>
            <p>
                <input class = "button" type = "submit" name = "btnSub" value = "Lưu" 
                       style="width: 50px; height: 25px"/>
            </p>
            <br/>
        </div>
    </form>
</div>