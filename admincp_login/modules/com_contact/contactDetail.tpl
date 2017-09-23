<pre id="MoTaChiTiet" name="MoTaChiTiet" style="display:none">
    {noidunglienhe}
</pre>
<script language="javascript">
    function submitForm() {
        document.forms.frm.elements.txtChiTiet.value = oEdit1.getHTMLBody();
        document.forms.frm.submit();
    }
</script>
<div class = "title" style ="text-indent:10px">Chi tiết liên hệ/góp ý</div>
<div style="margin:10px">
    <p style="float:left;width:100px;clear:both">Họ tên :</p><b>{name}</b><br style="clear:both">
    <p style="float:left;width:100px;clear:both">Email :</p><b>{email}</b><br style="clear:both">
    <p style="float:left;width:100px;clear:both">Điện thoại :</p><b>{phone}</b><br style="clear:both">
    <p style="float:left;width:100px;clear:both">IP :</p><b>{ip}</b><br style="clear:both">
    <p style="float:left;width:100px;clear:both">Tiêu đề :</p><b>{title_mail}</b><br style="clear:both">

    <p style="float:left;width:100px;clear:both"><b>Nội dung  :</b></p>{comment}<br style="clear:both">

</div>
<div style = "float:left">
    <div>
        <img style="margin-left:20px" src="../style/images/mail-reply-48-Icon.png"/>
        <br style="clear:both">
        <div style="padding-left:40px;padding-bottom:10px">
            <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm" onsubmit="return submitForm();">
                <input type="hidden" name="txtnoidunglienhe" id="txtnoidunglienhe">
                <p style="float:left;width:100px;clear:both">Người nhận :</p><input size="60px" type="text" value="{email}" name="sender"/><br style="clear:both">
                <p style="float:left;width:100px;clear:both">Tiêu đề :</p><input size="60px" value="{title_mail}"  type="text" name="title_mail"/><br style="clear:both">
                <p style="float:left;width:100px;clear:both">Nội dung :</p>
                <script>
                    var oEdit1 = new InnovaEditor("oEdit1");
                    oEdit1.arrStyle = [["BODY", false, "", "font:12px verdana,arial,sans-serif;"]];
                    oEdit1.width = "800";
                    oEdit1.height = 300;
                    oEdit1.features = ["FullScreen", "Search",
                        "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                        "ForeColor", "BackColor", "Image", "|", "Bookmark", "Hyperlink",
                        "CustomTag", "HTMLSource", "BRK", "Numbering", "Bullets", "|", "Indent", "Outdent", "LTR", "RTL", "|", "|",
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
                    oEdit1.RENDER(document.getElementById("MoTaChiTiet").innerHTML);
                </script>
                <p><label style='width:0px'>&nbsp;</label><input type ='submit' name='btnsend' value='Gởi mail' class='button' /> <input type ='button' name='back' value='Quay lại' onclick="window.location = './?show=contact'" class='button' /></p>
            </form>

            <br style="clear:both">
        </div>

    </div>
</div>
