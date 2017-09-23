<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_user_manager}</div>
    <div>{lag_page} : {page}</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:60px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:70px">&nbsp;</div>
            <div class = "con_title" style = "width:100px">Username</div>
            <div class = "con_title" style = "width:210px">{address}</div>
            <div class = "con_title" style = "width:90px">{phone}</div>
            <div class = "con_title" style = "width:140px">Email</div>
            <div class = "con_title" style = "width:140px">Điểm tích lũy</div>
            <div class = "con_title" style = "width:100px;border:0px">{lag_date_create}</div>
            <div class = "con_title" style = "width:80px;border:0px">Ngày xóa</div>
        </div>
        <div>
            <!--BEGINLIST_LIST-->
            <!--BEGIN_LIST-->
            <div class = "con_list_con" style = "width:60px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:70px;background-color:{color};height:30px;"><a href='./?show=memberListB&action=restore&id={id}'>Phục hồi</a></div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;"><span style='color:{Gcolor}'>{username}</span></div>
            <div class = "con_list_con" style = "width:210px;background-color:{color};height:30px;">{address}</div>
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px;">{phone}</div>
            <div class = "con_list_con" style = "width:140px;background-color:{color};height:30px">{email}</div>
            <div class = "con_list_con" style = "width:100px;border:0px;background-color:{color};height:30px">{date}</div>
            <div class = "con_list_con" style = "width:80px;border:0px;background-color:{color};height:30px;color:#97061C">{date_delete}</div>
            <div class ='clear'></div>
            <!--END_LIST-->
            <!--ENDLIST_LIST-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btnrestore" value = "Phục hồi">
</form>
