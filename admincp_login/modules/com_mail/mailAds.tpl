<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<div class = "title" style="text-indent:10px;line-height:20px">{title}</div>
{view}
<div id='config_right' style='background-color:#F9F9F9'>
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <p style='height:200px'>
            <label><b>Danh sách các email</b><br><span>Nhập các email mà bạn muốn gửi,phân cách nhau bằng dấu ;</span></label><textarea  name="mailList" style='height:180px;width:440px'>{mailList}</textarea>
        </p>
</div>
<p><label style='width:370px'>&nbsp;</label><input type ='submit' name='btnsend' value='Gởi mail' class='button' />
    <input type ='submit' name='btnview' value='Xem trước' class='button' />
</p>
</form>
<br>