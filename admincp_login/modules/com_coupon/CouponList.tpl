<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
<script language="JavaScript" src='../jscript/jquery.form.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=Javascript src="../jscript/overlib_mini.js"></script>

<style>
    .multiselect
    {
        width:170px;
        height:45px;
        border:solid 1px #c0c0c0;
        overflow-y:scroll;
        overflow-x:hidden;
    }
    .multiselect label
    {
        display:block;
    }
    .multiselect-on
    {
        color:#ffffff;
        background-color:#000099;
    }
</style>

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">Quản lý coupon</div>
    <div>{lag_page} : {page}</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center">
                <input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);" >
            </div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>
            <div class = "con_title" style = "width:100px">Tên KM</div>
            <div class = "con_title" style = "width:100px">Mã KM</div>
            <div class = "con_title" style = "width:180px;">Danh mục áp dụng</div>
            <div class = "con_title" style = "width:90px;">Ngày hết hạn</div>
            <div class = "con_title" style = "width:90px">Trạng thái</div>
            <div class = "con_title" style = "width:95px;border:0px">Ngày thêm</div>
            <div class = "con_title" style = "width:95px;border:0px">Khách hàng</div>
        </div>
        <div>
            <!--BEGINLIST_NEWS-->
            <!--BEGIN_NEWS-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:50px;text-align:center">
                <input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}" {chk_disabled} />
            </div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:50px;">
                <a href="?show=coupon&id_coupon={id}&p={p}&order={oderby}">{lag_edit}</a>
            </div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:50px;">
                {coupon_name}
            </div>
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:50px;">
                {code_coupon}
            </div>
            <div class = "con_list_con" style = "width:180px;background-color:{color};height:50px;">
                {coupon_catalogue}
            </div>
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:50px">
                {date_deadline_coupon}
            </div>

            <div class = "con_list_con" style = "width:90px;background-color:{color};height:50px">
                {coupon_status}
            </div>
            <div class = "con_list_con" style = "width:95px;border:0px;background-color:{color};height:50px">
                {date_added}
            </div>
            <div class = "con_list_con" style = "width:95px;border:0px;background-color:{color};height:50px">
                {customer_email_coupon}
            </div>
            <div class ='clear'></div>
            <!--END_NEWS-->
            <!--ENDLIST_NEWS-->
        </div>
    </div>
    <input class = "button"
           type = "submit"
           name = "btndel"
           value = "Xóa coupon" {status}
           onclick="return chkdelete('{del_confirm}');"/>

    <input class = "button"
           type = "button"
           value = "Thêm coupon" {status}
           onclick="window.location = './?show=coupon&p={p}&order={oderby}'"/>

    <input class = "button"
           type = "submit"
           name = "btnStatus"
           value = "Sử dụng/Đã sử dụng"
           onclick = "return chkselected();">
    <input
        class = "button"
        type = "button"
        name = "btnCouponSend"
        value = "Gửi coupon cho khách hàng"
        style="width: 150px; text-align: center"
        onclick="window.location = './?show=coupon_send'"/>
</form>
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>