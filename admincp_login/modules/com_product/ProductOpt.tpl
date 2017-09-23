<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=Javascript src="../jscript/overlib_mini.js"></script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_product_manager}</div>
    <div>{lag_page} : {page}</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:50px">{lag_delete}</div>
            <div class = "con_title" style = "width:250px"><a href = './?show=productOpt&opt={opt}&order=name&p={p}'>{productname}</a></div>
            <div class = "con_title" style = "width:90px">Hình ảnh</div>
            <div class = "con_title" style = "width:100px"><a href = './?show=productOpt&opt={opt}&order=catalogue&p={p}'>{ofcatalogue}</a></div>
            <div class = "con_title" style = "width:90px"><a href = './?show=productOpt&opt={opt}&order=status&p={p}'>{lag_status}</a></div>
            <div class = "con_title" style = "width:110px;border:0px"><a href = './?show=productOpt&opt={opt}&order=dateadd&p={p}'>{lag_date_create}</a></div>
            <div class = "con_title" style = "width:110px;border:0px"><a href = './?show=productOpt&opt={opt}&order=datemodifiled&p={p}'>{lag_date_modifiled}</a></div>
        </div>
        <div>
            <!--BEGINLIST_PRODUCT-->
            <!--BEGIN_PRODUCT-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=productOpt&opt={opt}&action=del&id={id}&p={p}&order={orderby}" onclick="return confirm('{del_confirm} ?');">{lag_delete}</a></div>
            <div class = "con_list_con" style = "width:250px;background-color:{color};height:30px;">{product_name}</div>
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px;">{product_image}</div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;">{categories_id}</div>
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px">{products_status}</div>
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">{date_added}</div>
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">{modified_date}</div>
            <div class ='clear'></div>
            <!--END_PRODUCT-->
            <!--ENDLIST_PRODUCT-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btndel" value = "{delete_check}" onclick="return chkdelete('{del_confirm}');">
</form>
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>