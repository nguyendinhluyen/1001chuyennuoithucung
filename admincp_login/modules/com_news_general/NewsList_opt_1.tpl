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
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:50px">{lag_delete}</div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>
            <div class = "con_title" style = "width:200px"><a href = './?show=newsList_opt_1&order=name&p={p}' style = "text-decoration:underline">Tiêu đề (a->z)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=newsList_opt_1&order=name_desc&p={p}'style = "text-decoration:underline">(z->a)</a></span></div>                
            <div class = "con_title" style = "width:170px">Hình ảnh</div>				                
            <div class = "con_title" style = "width:90px"><a href = './?show=newsList_opt_1&order=status&p={p}'style='text-decoration:underline'>{lag_status}</a></div>                
            <div class = "con_title" style = "width:130px;border:0px"><a href = './?show=newsList_opt_1&order=dateadd&p={p}' style = "text-decoration:underline">{lag_date_create} (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=newsList_opt_1&order=dateadd_desc&p={p}'style = "text-decoration:underline">(mới)</a></span></div>
            <div class = "con_title" style = "width:110px;border:0px"><a href = './?show=newsList_opt_1&order=datemodifiled&p={p}' style = "text-decoration:underline">Lần sữa (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=newsList_opt_1&order=datemodifiled_desc&p={p}'style = "text-decoration:underline">(mới)</a></span></div>
        </div>
        <div>
            <!--BEGINLIST_NEWS-->
            <!--BEGIN_NEWS-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;">{lag_delete}</div>                
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=OptNews_general&id={id}&p={p}&order={oderby}&opt=1">{lag_edit}</a></div>
            <div class = "con_list_con" style = "width:200px;background-color:{color};height:30px;">{news_name}</div>
            <div class = "con_list_con" style = "width:170px;background-color:{color};height:30px;">{news_image}</div>				
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px">{status}</div>
            <div class = "con_list_con" style = "width:130px;border:0px;background-color:{color};height:30px">{date_added}</div>
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">{last_modified}</div>
            <div class ='clear'></div>
            <!--END_NEWS-->
            <!--ENDLIST_NEWS-->
        </div>
    </div>	
    <input style="{style_display_btStatus}" class = "button" type = "submit" name = "btnStatus" value = "Ẩn/hiển thị" onclick = "return chkselected();">
</form>
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>