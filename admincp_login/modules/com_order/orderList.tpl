<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_order_manager}</div>
    <div>{lag_page} : {page}</div> 
    <div  style="margin-right: 20px;margin-bottom: 10px;">
        <div align="left">
            <a href="./?show=neworder"  class="button">Thêm đơn hàng</a>
            Bộ lọc <select id="boloc" onchange="changeSelect()">
                <option value="0">Tất cả</option>
                <option value="1">Đã giao</option>
                <option value="2">Chưa giao</option>
            </select>
        </div>
    </div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:30px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:30px">{lag_delete}</div>
            <div class = "con_title" style = "width:60px">{lag_detail}</div>
            <div class = "con_title" style = "width:150px"><a href = './?show=order&order=name' style="text-decoration:underline">{fullname} (a->z)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=order&order=name_desc'style = "text-decoration:underline">(z->a)</a></span></div>                				
            <div class = "con_title" style = "width:110px">{phone}</div>
            <div class = "con_title" style = "width:160px;">Email</div>
            <div class = "con_title" style = "width:100px;border:0px"><a href = './?show=order&order=orderdate' style="text-decoration:underline">Ngày (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=order&order=orderdate_desc'style = "text-decoration:underline">(mới)</a></span></div>
            <div class = "con_title" style = "width:75px;border:0px"><a href = './?show=order&order=status'style='text-decoration:underline'>{status}</a></div>
            <div class = "con_title" style = "width:135px"><a href = './?show=order&order=orderbill' style="text-decoration:underline">Hóa đơn (tăng)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=order&order=orderbill_desc'style = "text-decoration:underline">(giảm)</a></span> </div>
        </div>
        <div>
            <!--BEGINLIST_CATALOGUE-->
            <!--BEGIN_CATALOGUE-->
            <div class = "con_list_con" style = "width:30px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:30px;background-color:{color};height:30px;">
                <a href='./?show=order&action=del&id={id}' onclick="return confirm('Bạn muốn xóa?');">{lag_del}</a></div>
            <div class = "con_list_con" style = "width:60px;background-color:{color};height:30px;">
                <input type ="button" onclick="javascript:window.location = './?show=orderdetail&id={id}'" class="button" value="{lag_detail}" /></div>
            <div class = "con_list_con" style = "width:150px;background-color:{color};height:30px;">{custommer_name}</div>
            <div class = "con_list_con" style = "width:110px;background-color:{color};height:30px;">{phone}</div>
            <div class = "con_list_con" style = "width:160px;background-color:{color};height:30px">{email}</div>
            <div class = "con_list_con" style = "width:100px;border:0px;background-color:{color};height:30px">{date}</div>
            <div class = "con_list_con" style = "width:75px;border:0px;background-color:{color};height:30px;color:#97061C">{status}</div>
            <div class = "con_list_con" style = "width:135px;background-color:{color};height:30px;">{custommer_bill}</div>
            <div class ='clear'></div>
            <!--END_CATALOGUE-->
            <!--ENDLIST_CATALOGUE-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btndel" value = "{delete_check}" onclick="return confirm('{del_confirm}?');"/>
    <input class = "button" type = "submit" name = "btnaccept" value = "{delivery}"/>       
</form>
<div id="page_now" style="display: none;">{page_now}</div>
<script>
    function changeSelect() {
        var sele = $('#boloc').val();
        var url = '{url_change}';
        url = url + "&loc=" + sele;
        location.href = url;

    }
    $(document).ready(function () {
        $("#boloc").val("{se_boloc}");
    });
</script>
