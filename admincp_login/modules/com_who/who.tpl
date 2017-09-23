<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style="text-indent:10px;line-height:20px">{title}</div>
    <div class = "content_con">
        <div style="margin:10px">
            <p><label>Đang online : </label><b>{online}</b></p>
            <p><label>Lượt truy cập thứ : </label><b>{visitor}</b></p>
            <p><label>Kỷ lục : </label><b>{MaxOnline}</b> lượt truy cập vào ngày {timeMaxOnline}</p>
            <p><label>&nbsp;</label><b>{MaxOnline2}</b> khách cùng truy cập vào website lúc {timeMaxOnline2}</p>
        </div>
        <div style='padding:5px;background-color:#f5f5f5;text-align:center;font-weight:bold;float:left'>
            <div style="float:left;width:770px">{danhsachonline}</div><input style="float:left" type="submit" name="ViewAll" value="Xem tất cả" class="button" />
        </div>
        <div style = "float:left">
            <div class = "title" style = 'width:851px'>
                <div class = "con_title" style = "width:40px;text-align:center">STT</div>
                <div class = "con_title" style = "width:100px;text-align:center">IP</div>
                <div class = "con_title" style = "width:380px">Referer address</div>
                <div class = "con_title" style = "width:330px;border:0px">Trang xem hiện tại</div>
            </div>
            <div>
                <!--BEGINLIST_WHO-->
                <!--BEGIN_WHO-->
                <div class = "con_list_con" style = "width:40px;background-color:{color};height:30px;text-align:center">{stt}</div>
                <div class = "con_list_con" style = "width:100px;background-color:{color};height:30px;text-align:center"><a href='./?show=iba&ip={gip_address}'>{ip_address}</a></div>
                <div class = "con_list_con" style = "width:380px;background-color:{color};height:30px;overflow:hidden">{refurl}</div>
                <div class = "con_list_con" style = "width:330px;background-color:{color};height:30px;overflow:hidden">{user_host}</div>
                <div class ='clear'></div>
                <!--END_WHO-->
                <!--ENDLIST_WHO-->
            </div>
        </div>
    </div>
</form>