<script language=Javascript src="../jscript/overlib_mini.js"></script>
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">Quản lý trợ giúp</div>
    <div>{lag_page} : {page}</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center">
                <input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);" >
            </div>				
            <div class = "con_title" style = "width:50px">{lag_edit}</div>
            <div class = "con_title" style = "width:200px">{tieu_de}</div>
            <div class = "con_title" style = "width:190px">{thuoc_danh_muc}</div>				           
            <div class = "con_title" style = "width:70px">{lag_status}</div>              				                
            <div class = "con_title" style = "width:130px;border:0px">{date}</div>
            <div class = "con_title" style = "width:110px;border:0px">{date_modify}</div>
        </div>
        <div>
            <!--BEGINLIST_NEWS-->
            <!--BEGIN_NEWS-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center">
                <input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}" {chk_disabled}/>
            </div>	                             
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;">
                <a href="?show=OptNews_help&id={id}&p={p}&order={oderby}&opt={opt}">{lag_edit}</a>
            </div>
            <div class = "con_list_con" style = "width:200px;background-color:{color};height:30px;">{news_name}</div>
            <div class = "con_list_con" style = "width:190px;background-color:{color};height:30px;">
                <div>{news_catalogue}</div>
            </div>
            <div class = "con_list_con" style = "width:70px;background-color:{color};height:30px">{status}</div>
            <div class = "con_list_con" style = "width:130px;border:0px;background-color:{color};height:30px">{date_added}</div>
            <div class = "con_list_con" style = "width:161px;border:0px;background-color:{color};height:30px">{last_modified}</div>
            <div class ='clear'></div>
            <!--END_NEWS-->
            <!--ENDLIST_NEWS-->
        </div>
    </div>

    <input style="{style_display_btDelete}" 
           class = "button" 
           type = "submit" 
           name = "btndel" 
           value = "{delete_check}" {status} 
           onclick="return chkdelete('{del_confirm}');">

    <input style="{style_display_btAdd}" 
           class = "button" 
           type = "button" 
           value = "Thêm tin" {status} 
           onclick="window.location = './?show=OptNews_help&opt={opt}&p={p}&order={oderby}'">

    <input class="button" 
           style="display: none;" 
           type = "submit" 
           name = "btnNewswait" 
           value = "Tin đón đợi" 
           onclick = "return chkselected();">        
</form>
