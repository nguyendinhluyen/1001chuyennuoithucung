<!--Su dung de format tien -->
<script language=JavaScript src='../jscript/common.js'></script>

<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:5px; font-size:14px"> <b>{title}</b></div>
    <p> 
        <b style="font-size:12px; margin-left:2px">Tiền / 1 Điểm : </b>
        <input type = "text" name = "PriceOfUnit" id = "PriceOfUnit" onkeyup="javascript:Money_CheckCorrect('PriceOfUnit');" value = "{PriceOfUnit}" style="width:100px"/>  
        <b>VNĐ</b> 
        <input class = "button"  type="submit" name="btnUpdate" value="Cập nhật" style="width: 75px; height:20px" onclick="return confirm('Bạn muốn cập nhật Tiền / 1 Điểm ?');"/></p>
</p>

<div style="margin-left:2px">{lag_page} : {page}</div>   
<p> </p>       
<div style = "float:left; margin-left:2px">
    <div class = "title" style = 'width:851px'>
        <div class = "con_title" style = "width:50px;text-align:center">
        </div>
        <div class = "con_title" style = "width:50px; margin-left:2px">{lag_delete}</div>

        <div class = "con_title" style = "width:50px">{lag_edit}</div>

        <div class = "con_title" style = "width:150px;">Tên danh hiệu</div>               	

        <div class = "con_title" style = "width:160px;">Mức điểm áp dụng</div>   				

        <div class = "con_title" style = "width:160px;">Chiết khấu (%)</div>     			

        <div class = "con_title" style = "width:140px;"></div>                                

        <div class = "con_title" style = "width:170px">Phí duy trì</div>                

        <div class = "con_title" style = "width:100px">Ngày thêm</div>                

    </div>
    <div>
        <!--BEGINLIST_SUPPORT-->
        <!--BEGIN_SUPPORT-->
        <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=VIPCustomer&action=del&id={VIPCustomer_id}&p={p}" onclick="return confirm('Bạn có muốn xóa ?');" style="margin-left:2px">{lag_delete}</a></div>

        <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=Opt_VipCusomer&id={VIPCustomer_id}&p={p}">{lag_edit}</a></div>

        <div class = "con_list_con" style = "width:150px;background-color:{color};height:30px;">{VIPCusomer_name}</div>

        <div class = "con_list_con" style = "width:160px;background-color:{color};height:30px;">{VIPCusomer_Score}</div>

        <div class = "con_list_con" style = "width:160px;background-color:{color};height:30px;">
            <span class="con_list_con" style="width:150px;background-color:{color};height:30px;">{VIPCusomer_Discount}</span>
        </div>

        <div class = "con_list_con" style = "width:170px;background-color:{color};height:30px"/>

        <div class = "con_list_con" style = "width:140px;background-color:{color};height:30px;">{VIPCusomer_FeeLevel}</div>

    </div>
    <div class = "con_list_con" style = "width:110px;background-color:{color};height:30px">{galary_date}</div>
    <div class ='clear'></div>
    <!--END_SUPPORT-->
    <!--ENDLIST_SUPPORT-->
</div>
<p> </p>
</div>

<input class = "button" type = "button" value = "{add}" onclick="window.location = './?show=Opt_VipCusomer'" style= "width: 75px; height:20px"/>

</form>
