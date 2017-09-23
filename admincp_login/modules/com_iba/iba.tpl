<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style="text-indent:10px;line-height:20px">{title}</div>
    <div class = "content_con" style='padding:5px'>
        <div id='config_right' style='border:0px'>
            <p>
                <label><b>Địa chỉ IP</b><br><span>Bạn có thể thêm địa chỉ IP nào đó để ngăn chặn IP này truy cập vào website, nếu địa chỉ IP này làm hại cho website của bạn</span></label><input type = 'text' name = 'ip' value='{get_ip}' class ='fieldinput'>
            </p>
            <p>
                <label><b>Thời gian</b><br><span>Thời gian chặn IP này trong bao lâu ? (tính bằng giây)</span></label><input type = 'text' name = 'time' class ='fieldinput'>
            </p>
            <p style='height:70px'>
                <label><b>Lý do chặn</b><br></label><textarea name = 'reason' cols='23'></textarea>
            </p>
            <p>
                <label>&nbsp;</label><input type='submit' name='btnsubmit' value='Cập nhật' class='button'/>
            </p>
        </div>
        <div style='padding:5px;background-color:#f5f5f5;text-align:center;font-weight:bold'>Danh sách các IP đang bị chặn</div>
        <div style = "float:left">
            <div class = "title" style = 'width:851px'>
                <div class = "con_title" style = "width:50px;text-align:center">ID</div>
                <div class = "con_title" style = "width:50px">Gở bỏ</div>
                <div class = "con_title" style = "width:100px">Địa chỉ IP</div>
                <div class = "con_title" style = "width:100px">Thời gian</div>
                <div class = "con_title" style = "width:460px;border:0px">Lý do chặn</div>
                <div class = "con_title" style = "width:90px;border:0px">Ngày chặn</div>
            </div>
            <div>
                <!--BEGINLIST_IP-->
                <!--BEGIN_IP-->
                <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center">{id}</div>
                <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=iba&action=del&id={id}" onclick="return confirm('Bạn có chắc là muốn gỡ bỏ IP {ip} ?');">Gỡ bỏ</a></div>
                <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;">{ip}</div>
                <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;">{time}</div>
                <div class = "con_list_con" style = "width:460px;background-color:{color};height:30px;">{reason}</div>
                <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px;">{date}</div>
                <div class ='clear'></div>
                <!--END_IP-->
                <!--ENDLIST_IP-->
            </div>
        </div>
    </div>
</form>
