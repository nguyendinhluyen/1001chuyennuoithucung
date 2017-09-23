<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_order_manager}</div>
    <div>{lag_page} : {page}</div>

    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:30px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:30px">{lag_delete}</div>
            <div class = "con_title" style = "width:90px">{lag_detail}</div>
            <div class = "con_title" style = "width:120px">{fullname}</div>
            <div class = "con_title" style = "width:170px">Tiêu đề</div>
            <div class = "con_title" style = "width:90px">{phone}</div>
            <div class = "con_title" style = "width:140px">Email</div>
            <div class = "con_title" style = "width:100px;border:0px">{lag_date_create}</div>
            <div class = "con_title" style = "width:80px;border:0px">{status}</div>
        </div>
        <div>
            <!--BEGINLIST_CATALOGUE-->
            <!--BEGIN_CATALOGUE-->
            <div class = "con_list_con" style = "width:30px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:30px;background-color:{color};height:30px;"><a href='./?show=contact&action=del&id={id}'>{lag_del}</a></div>
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px;">
                <input type ="button" onclick="javascript:window.location = './?show=contactdetail&id={id}'" class="button" value="{lag_detail}" /></div>
            <div class = "con_list_con" style = "width:120px;background-color:{color};height:30px;">{custommer_name}</div>
            <div class = "con_list_con" style = "width:170px;background-color:{color};height:30px;">{title_mail}</div>
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px;">{phone}</div>
            <div class = "con_list_con" style = "width:140px;background-color:{color};height:30px">{email}</div>
            <div class = "con_list_con" style = "width:100px;border:0px;background-color:{color};height:30px">{date}</div>
            <div class = "con_list_con" style = "width:80px;border:0px;background-color:{color};height:30px;color:#97061C">{status}</div>
            <div class ='clear'></div>
            <!--END_CATALOGUE-->
            <!--ENDLIST_CATALOGUE-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btndel" value = "{delete_check}" onclick="return confirm('{del_confirm}?');">
</form>
