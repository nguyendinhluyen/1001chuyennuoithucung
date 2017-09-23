<!--Su dung de format tien -->
<script language=JavaScript src='../jscript/common.js'></script>

<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:5px; font-size:14px"> <b>{title}</b></div>	            	
    <div style="margin-left:2px">{lag_page} : {page}</div>   
    <p> </p>       
    <div style = "float:left; margin-left:2px">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center">
            </div>
            <div class = "con_title" style = "width:50px; margin-left:2px">{lag_delete}</div>

            <div class = "con_title" style = "width:50px">{lag_edit}</div>

            <div class = "con_title" style = "width:150px;">Tên danh hiệu</div>               	

            <div class = "con_title" style = "width:160px;"></div>   				

            <div class = "con_title" style = "width:160px;">Chiết khấu (%)</div>     			

            <div class = "con_title" style = "width:140px;"></div>                                

            <div class = "con_title" style = "width:170px"></div>                

            <div class = "con_title" style = "width:100px">Ngày thêm</div>                

        </div>
        <div>
            <!--BEGINLIST_SUPPORT-->
            <!--BEGIN_SUPPORT-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=GroupMember&action=del&id={VIPCustomer_id}&p={p}" onclick="return confirm('Bạn có muốn xóa ?');" style="margin-left:2px">{lag_delete}</a></div>

            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=Opt_GroupMember&id={VIPCustomer_id}&p={p}">{lag_edit}</a></div>

            <div class = "con_list_con" style = "width:150px;background-color:{color};height:30px;">{VIPCusomer_name}</div>

            <div class = "con_list_con" style = "width:160px;background-color:{color};height:30px;">{VIPCusomer_Discount}</div>

            <div class = "con_list_con" style = "width:110px;background-color:{color};height:30px">{galary_date}</div>


            <div class = "con_list_con" style = "width:120px;background-color:{color};height:30px;"></div>

            <div class = "con_list_con" style = "width:120px;background-color:{color};height:30px;"></div>

            <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px"></div>

            <div class ='clear'></div>
            <!--END_SUPPORT-->
            <!--ENDLIST_SUPPORT-->
        </div>
        <p> </p>
    </div>

    <input class = "button" type = "button" value = "{add}" onclick="window.location = './?show=Opt_GroupMember'" style= "width: 75px; height:20px"/>

</form>
