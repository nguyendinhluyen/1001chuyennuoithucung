<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_user_manager}</div>
    <div style="margin-top:10px; margin-bottom:10px">
        <span>&nbsp; Họ và tên: </span><input type="text" size ="25" maxlength = "100" value = "{full_name}" name = "full_name"/>        
        <span>&nbsp; Email: </span><input type="text" size ="25" maxlength = "100" value = "{email_memeber}" name = "email_memeber"/>        
       	<span>&nbsp; Số điện thoại: </span><input type="text" size ="25" maxlength = "100" value = "{phone_memeber}" name = "phone_memeber" id="phone_memeber"/>
        <div> <br/></div>
        <input type = "submit" size ="25" name = "search_members" 
               value="Tìm kiếm" 
               style= "float:right; margin-right:30px"/>
        <input type = "submit" size ="25" name = "all_members" width="50px" 
               value="Tất cả thành viên" 
               style= "float:right; margin-right:18px"/>
    </div>

    <div style="margin-bottom:10px">&nbsp; {lag_page} : {page}</div>
    <div style = "float:left">            
        <input style="submit"
               class = "button"
               type = "button"
               value = "Thêm tài khoản"
               onclick="window.location = './?show=memberAccount'">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:30px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <!--<div class = "con_title" style = "width:30px">{lag_delete}</div>-->
            <div class = "con_title" style = "width:30px">&nbsp;</div>
            <div class = "con_title" style = "width:60px">&nbsp;</div>
            <div class = "con_title" style = "width:120px">Username</div>
            <div class = "con_title" style = "width:195px">{address}</div>
            <div class = "con_title" style = "width:100px">{phone}</div>
            <div class = "con_title" style = "width:150px">Email</div>
            <div class = "con_title" style = "width:100px;border:0px">{lag_date_create}</div>
            <div class = "con_title" style = "width:65px;border:0px">{status}</div>
        </div>
        <div>
            <!--BEGINLIST_LIST-->
            <!--BEGIN_LIST-->
            <div class = 'line'>
                <div class = "con_list_con" style = "width:30px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>                
                <div class = "con_list_con" style = "width:30px;background-color:{color};height:30px;">
                    <!--<a href='./?show=memberList&action=del&id={id}&p={page_number}&full_name={full_name}&email_memeber={email_memeber}&phone_memeber={phone_memeber}' onclick="return confirm('{del_confirm}?');">{lag_del}</a>-->
               	</div>
                <div class = "con_list_con" style = "width:60px;background-color:{color};height:30px;">
                    <a href='./?show=memberUpdate&id={id}&p={page_number}&full_name={full_name}&email_memeber={email_memeber}&phone_memeber={phone_memeber}'>{update}</a>
                </div>
                <div class = "con_list_con" style = "width:110px;background-color:{color};height:30px;">
                    <a href='./?show=memberUpdate&id={id}&p={page_number}'><span style='color:{Gcolor}; width:700px; display:block;'>{username}</span></a>
                </div>
                <div class = "con_list_con" style = "width:10px;background-color:{color};height:30px;">
                </div>
                <div class = "con_list_con" style = "width:195px;background-color:{color};height:30px;">{address}</div>
                <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;">{phone}</div>
                <div class = "con_list_con" style = "width:150px;background-color:{color};height:30px">{email}</div>
                <div class = "con_list_con" style = "width:100px;border:0px;background-color:{color};height:30px">{date}</div>
                <div class = "con_list_con" style = "width:65px;border:0px;background-color:{color};height:30px;color:#97061C">{status}</div>
                <div class ='clear'></div>
            </div>
            <!--END_LIST-->
            <!--ENDLIST_LIST-->
        </div>
    </div>
    <!--<input class = "button" 
           type = "submit" 
           name = "btndel" 
           value = "{delete_check}" onclick="return confirm('{del_confirm}?');">-->
    <input style="submit"
           class = "button"
           type = "button"
           value = "Thêm tài khoản" 
           onclick="window.location = './?show=memberAccount'">
</form>
