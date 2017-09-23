<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{title}</div>
    <div>{lag_page} : {page}</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:50px">{lag_delete}</div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>
            <div class = "con_title" style = "width:100px">{onlinename}</div>
            <div class = "con_title" style = "width:100px">Yahoo/Skype</div>
            <div class = "con_title" style = "width:100px">{phone}</div>
            <div class = "con_title" style = "width:140px">Email</div>
            <div class = "con_title" style = "width:60px">{lag_order}</div>
            <div class = "con_title" style = "width:100px;border:0px">{status}</div>
            <div class = "con_title" style = "width:100px;border:0px">{lag_date_modifiled}</div>
        </div>
        <div>
            <!--BEGINLIST_SUPPORT-->
            <!--BEGIN_SUPPORT-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{providers_id}"></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=support&action=del&id={providers_id}&p={p}" onclick="return confirm('{del_confirm} ?');">{lag_delete}</a></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=SupportOpt&id={providers_id}&p={p}">{lag_edit}</a></div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;">{providers_name}</div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;">{providers_im}</div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;">{providers_phone}</div>
            <div class = "con_list_con" style = "width:140px;background-color:{color};height:30px">{providers_email}</div>
            <div class = "con_list_con" style = "width:60px;background-color:{color};height:30px">{providers_order}</div>
            <div class = "con_list_con" style = "width:100px;border:0px;background-color:{color};height:30px">{providers_status}</div>
            <div class = "con_list_con" style = "width:100px;border:0px;background-color:{color};height:30px">{modified_date}</div>
            <div class ='clear'></div>
            <!--END_SUPPORT-->
            <!--ENDLIST_SUPPORT-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btndel" value = "{delete_check}" onclick="return confirm('{del_confirm}?');">
    <input class = "button" type = "submit" name = "btnstatus" value = "{shi}" onclick = "return chkselected();">
    <input class = "button" type = "button" value = "{add}" onclick="window.location = './?show=SupportOpt'">
</form>
