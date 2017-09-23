<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=Javascript src="../jscript/overlib_mini.js"></script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_ad_manager}</div>
    <div>{lag_page} : {page}</div>
    <div style = "float:left; margin-top: 10px;">
        <input class = "button" type = "submit" name = "btndel" value = "{delete_check}" onclick="return confirm('{del_confirm} ?');">
        <input class = "button" type = "submit" name = "btnstatus" value = "Ẩn/hiện" onclick = "return chkselected();">
        <input class = "button" type = "button" value = "Thêm mới" onclick="window.location = './?show=AdsOpt'">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:50px">{lag_delete}</div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>
            <div class = "con_title" style = "width:280px"><a href = './?show=Ads&order=name'>Tên thương hiệu</a></div>
            <div class = "con_title" style = "width:50px">Logo</div>
            <div class = "con_title" style = "width:60px">Sắp xếp</div>
            <div class = "con_title" style = "width:90px"><a href = './?show=Ads&order=status'>{lag_status}</a></div>
            <div class = "con_title" style = "width:110px;border:0px"><a href = './?show=Ads&order=dateadd'>{lag_date_create}</a></div>
            <div class = "con_title" style = "width:110px;border:0px"><a href = './?show=Ads&order=datemodifiled'>{lag_date_modifiled}</a></div>
        </div>
        <div>
            <!--BEGINLIST_ADVER-->
            <!--BEGIN_ADVER-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=Ads&action=del&id={id}&p={p}" onclick="return confirm('{del_confirm} ?');">{lag_delete}</a></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=AdsOpt&id={id}&p={p}">{lag_edit}</a></div>
            <div class = "con_list_con" style = "width:280px;background-color:{color};height:30px;">{adver_webname}</div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px">{adver_logo}</div>
            <div class = "con_list_con" style = "width:60px;background-color:{color};height:30px;">{adver_order}</div>

            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px">{adver_status}</div>
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">{date_added}</div>
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">{date_modifile}</div>
            <div class ='clear'></div>
            <!--END_ADVER-->
            <!--ENDLIST_ADVER-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btndel" value = "{delete_check}" onclick="return confirm('{del_confirm} ?');">
    <input class = "button" type = "submit" name = "btnstatus" value = "Ẩn/hiện" onclick = "return chkselected();">
    <input class = "button" type = "button" value = "Thêm mới" onclick="window.location = './?show=AdsOpt'">
</form>
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>