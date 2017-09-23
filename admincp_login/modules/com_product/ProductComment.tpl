<div style="padding-left:10px;padding-bottom:10px">
    <p style='padding-left:10px;font-size:12px'>Bạn đang xem comment <b>{productname} ({totalcm})</b></p><br>
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <h3>User comment</h3>
        <!--BEGINLIST_CATALOGUE-->
        <!--BEGIN_CATALOGUE-->
        <div style="margin-left:5px">				
            <input type='checkbox' name="chk[]" value="{id}">
            <font style="color:#990000">[ <a href="./?show=memberUpdate&id={edituser}"><b>{nguoicomment}</b></a>  - {ngaycomment} - IP : {ip} ]</font>
            <p style='color:#000;margin-left:25px;overflow:hidden'> {noidung} </p>
        </div>
        <div class="clear" style="border-top:1px #ccc solid;margin-top:3px"></div>
        <!--END_CATALOGUE-->
        <!--ENDLIST_CATALOGUE-->


        <h3>Guest comment</h3>
        <!--BEGINLIST_CATALOGUE2-->
        <!--BEGIN_CATALOGUE2-->
        <div style="margin-left:5px">				
            <input type='checkbox' name="chk2[]" value="{id}">
            <font style="color:#990000">[ <b style='color:black;'>{nguoicomment}</b></a>  - {ngaycomment} - IP : {ip} ]</font>
            <p style='color:#000;margin-left:25px;overflow:hidden'> {noidung} </p>
        </div>
        <div class="clear" style="border-top:1px #ccc solid;margin-top:3px"></div>
        <!--END_CATALOGUE2-->
        <!--ENDLIST_CATALOGUE2-->

        <input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);">
        <input type ="submit" name="btndel" value ="Xóa chọn" class="button" onclick ="return confirm('Bạn có chắc là muốn xóa ?');">
        <input type ="button" name="back" value ="Quay lại" class="button" onclick="window.location = './?show=product'">
    </form>
</div>
