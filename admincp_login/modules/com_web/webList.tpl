<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=Javascript src="../jscript/overlib_mini.js"></script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_ad_manager}</div>
    <div>Trang : {page}</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:50px">Xóa</div>
            <div class = "con_title" style = "width:50px">Sửa</div>
            <div class = "con_title" style = "width:180px"><a href = './?show=webList&order=name'>Khách hàng</a></div>
            <div class = "con_title" style = "width:80px">Hình ảnh</div>
            <div class = "con_title" style = "width:110px">Sắp xếp</div>
            <div class = "con_title" style = "width:110px"><a href = './?show=webList&order=status'>Trạng thái</a></div>
            <div class = "con_title" style = "width:110px;border:0px"><a href = './?show=webList&order=dateadd'>Ngày thêm</a></div>
            <div class = "con_title" style = "width:110px;border:0px"><a href = './?show=webList&order=datemodifiled'>Lần sửa sau cùng</a></div>
        </div>
        <div>
            <!--BEGINLIST_WEBISTE-->
            <!--BEGIN_WEBISTE-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=webList&action=del&id={id}&p={p}" onclick="return confirm('Bạn có chắc là muốn xóa ?');">Xóa</a></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=Optweb&id={id}&p={p}">Sửa</a></div>
            <div class = "con_list_con" style = "width:180px;background-color:{color};height:30px;">{webname}</div>
            <div class = "con_list_con" style = "width:80px;background-color:{color};height:30px">{image}</div>
            <div class = "con_list_con" style = "width:110px;background-color:{color};height:30px;">{order}</div>
            <div class = "con_list_con" style = "width:110px;background-color:{color};height:30px">{status}</div>
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">{date_added}</div>
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">{date_modifile}</div>
            <div class ='clear'></div>
            <!--END_WEBISTE-->
            <!--ENDLIST_WEBISTE-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btndel" value = "Xóa chọn" onclick="return confirm('Bạn có chắc là muốn xóa ?');">
    <input class = "button" type = "submit" name = "btnstatus" value = "Ẩn/hiện" onclick = "return chkselected();">
    <input class = "button" type = "submit" name = "typical" value = "Khách hàng tiêu biểu">
    <input class = "button" type = "button" value = "Thêm" onclick="window.location = './?show=Optweb'">
</form>
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>