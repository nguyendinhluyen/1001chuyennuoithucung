<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<pre id="content_content" name="content_content" style="display:none">
    {txtcontent}
</pre>
<div class = "title">{title}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm" onsubmit="submitForm()">
        <input type="hidden" name="txtcontent" id="txtcontent">
        <div style="float:left;padding-left:20px">
            <p>
                <label><b>{selectcontent}</b></label>{dlcontent} <input type = 'button' value = '{move}' class ='button' onclick="javascript:window.location = './?show=content&id=' + dlcontent.value">
            </p>
            <!--BEGINLIST_CONTENT-->
            <!--BEGIN_CONTENT-->
            <p>
                <label>{content}</label>
                <script>
                    var oEdit1 = new InnovaEditor("oEdit1");
                    oEdit1.arrStyle = [["BODY", false, "", "font:10px verdana,arial,sans-serif;"]];

                    oEdit1.width = "810";
                    oEdit1.height = 300;
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

                    //oEdit1.cmdAssetManager="modalDialogShow('/Editor/assetmanager/assetmanager.php',640,465)";
                    oEdit1.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,465)";
                    oEdit1.RENDER(document.getElementById("content_content").innerHTML);
                </script>

            <p>

                <label>&nbsp;</label><input class = "button" type = "submit" name = "btnSub" value = "Save"/>
                <input class = "button" type = "reset" value = "Reset"/>
            </p>
            <!--END_CONTENT-->
            <!--ENDLIST_CONTENT-->
            <br/>
        </div>
    </form>
</div>