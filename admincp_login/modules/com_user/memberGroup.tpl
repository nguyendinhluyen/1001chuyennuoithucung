<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">Quản lý nhóm</div>
    <div>Trang :[1]</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:50px">Xóa</div>
            <div class = "con_title" style = "width:50px">Sửa</div>
            <div class = "con_title" style = "width:230px">Tên nhóm</div>
            <div class = "con_title" style = "width:100px">Số thành viên</div>
            <div class = "con_title" style = "width:160px;border:0px">Ngày tạo</div>
            <div class = "con_title" style = "width:210px;border:0px">Ngày cập nhật</div>
        </div>
        <div>
            <!--BEGINLIST_GROUP-->
            <!--BEGIN_GROUP-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{group_id}"></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=memberGroup&action=del&id={group_id}" onclick="return confirm('{del_confirm} ?');">Xóa</a></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=OptmemberGroup&id={group_id}">Edit</a></div>
            <div class = "con_list_con" style = "width:230px;background-color:{color};height:30px;" id ="{id}"><span style='color:{Gcolor}'>{group_name}</span></div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;" id ="{id}_parent_name">{total_member}</div>
            <div class = "con_list_con" style = "width:160px;border:0px;background-color:{color};height:30px">{date}</div>
            <div class = "con_list_con" style = "width:210px;border:0px;background-color:{color};height:30px">{modifiled}</div>
            <div class ='clear'></div>
            <!--END_GROUP-->
            <!--ENDLIST_GROUP-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btndel" value = "Xóa chọn" onclick="return confirm('Bạn có chắc là muốn xóa ?');">
    <input class = "button" type = "button" value = "Thêm nhóm" onclick="window.location = './?show=OptmemberGroup'">
</form>
