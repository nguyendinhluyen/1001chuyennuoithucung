<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style = "font-size:14px;"> <b style="margin-left:5px">{lag_order_manager}</b></div>
    <p> </p>
    <div style="margin-left:5px"><b style="font-size:12px">{lag_page}</b> : {page}</div> 	
    <div  style="margin-right: 20px;margin-bottom: 10px;">
        <div align="left">
            <p> </p>
            <b style="margin-left:5px; font-size:12px; margin-right: 10px">Loại thành viên </b><select id = "boloc" onchange="changeSelect()" style="width: 150px; font-size:14px">
                {option_Type_Of_Customer}
            </select>
            <p style="font-size:12px; padding-left: 5px"><b>Phí thành viên : {fee_Member} VNĐ</b></p>
        </div>
    </div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:30px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:80px">Chọn</div>				
            <div class = "con_title" style = "width:250px">{fullname}</div>                				
            <div class = "con_title" style = "width:120px">{phone}</div>
            <div class = "con_title" style = "width:250px">Email</div>			                                 
            <div class = "con_title" style = "width:90px;border:0px">{status}</div>                                  
        </div>
        <div>
            <!--BEGINLIST_CATALOGUE-->
            <!--BEGIN_CATALOGUE-->
            <div class = "con_list_con" style = "width:30px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>				
            <div class = "con_list_con" style = "width:80px;background-color:{color};height:30px;"><a href='./?show=feeMember&action=del&id={id}&page={page_number}&loc={se_boloc}' onclick="return confirm('{fee_confirm}');">{lag_del}</a></div>                
            <div class = "con_list_con" style = "width:250px;background-color:{color};height:30px;">{custommer_name}</div>				
            <div class = "con_list_con" style = "width:120px;background-color:{color};height:30px;">{phone}</div>
            <div class = "con_list_con" style = "width:250px;background-color:{color};height:30px">{email}</div>
            <div class = "con_list_con" style = "width:121px;border:0px;background-color:{color};height:30px;color:#97061C">{status}</div>                
            <div class ='clear'></div>
            <!--END_CATALOGUE-->
            <!--ENDLIST_CATALOGUE-->
        </div>
    </div>

    <input class = "button" type = "submit" name = "btnAddFee" value = "Đóng phí" onclick="return confirm('{fee_confirm}');"/>

    <input class = "button" type = "submit" name = "btnRemoveFee" value = "{delivery}" onclick="return confirm('{remove_fee_confirm}');"/>       

</form>

<div id="page_now" style="display: none;">{page_now}</div>

<script>

    function changeSelect()
    {
        var sele = $('#boloc').val();
        var url = '{url_change}';
        url = url + "&loc=" + sele;
        location.href = url;
    }

    $(document).ready(function () {
        $("#boloc").val("{se_boloc}");
    });

</script>
