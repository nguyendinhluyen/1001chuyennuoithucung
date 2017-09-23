<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=Javascript src="../jscript/overlib_mini.js"></script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">Quản lý tin tức</div>
    <div>{lag_page} : {page}</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);" {chk_disabled_all}></div>

            <div class = "con_title" style = "width:50px">{lag_edit}</div>
            <div class = "con_title" style = "width:200px">{a}</div>
            <div class = "con_title" style = "width:90px">Hình ảnh</div>				
            <div class = "con_title" style = "width:100px;">{thuocdanhmuc}</div>                
            <div class = "con_title" style = "width:70px">{lag_status}</div>              				                
            <div class = "con_title" style = "width:130px;border:0px">{date}</div>
            <div class = "con_title" style = "width:110px;border:0px">{date_modify}</div>
        </div>
        <div>
            <!--BEGINLIST_NEWS-->
            <!--BEGIN_NEWS-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}" {chk_disabled} /></div>	                             
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=OptNews_relax&id={id}&p={p}&order={oderby}&opt={opt}">{lag_edit}</a></div>
            <div class = "con_list_con" style = "width:200px;background-color:{color};height:30px;">{news_name}</div>
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px;">{news_image}</div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;"><div style="{style_display}">{news_catalogue}</div></div>
            <div class = "con_list_con" style = "width:70px;background-color:{color};height:30px">{status}</div>
            <div class = "con_list_con" style = "width:130px;border:0px;background-color:{color};height:30px">{date_added}</div>
            <div class = "con_list_con" style = "width:161px;border:0px;background-color:{color};height:30px">{last_modified}</div>
            <div class ='clear'></div>
            <!--END_NEWS-->
            <!--ENDLIST_NEWS-->
        </div>
    </div>
    <input style="{style_display_btDelete}" class = "button" type = "submit" name = "btndel" value = "{delete_check}" {status} onclick="return chkdelete('{del_confirm}');">

    <input style="{style_display_btAdd}" class = "button" type = "button" value = "Thêm tin" {status} onclick="window.location = './?show=OptNews_relax&opt={opt}&p={p}&order={oderby}'">    

    <input style="{style_display_btStatus}" class = "button" type = "submit" name = "btnStatus" value = "Ẩn/hiển thị" onclick = "return chkselected();">
</form>
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>