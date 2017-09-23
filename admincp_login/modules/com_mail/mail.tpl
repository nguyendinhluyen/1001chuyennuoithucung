<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style="text-indent:10px;line-height:20px">{title}</div>
    <div id='config_right' style='background-color:#F9F9F9'>
        <p>
            <label><b>Gởi đến</b><br><span>Bạn hãy danh sách các nhóm để gởi mail đến người dùng</span></label><input type = 'checkbox' name = 'user' {checked1}> Thành viên <input type = 'checkbox' name = 'guest' {checked2}> Khách comment
        </p>
        <p>
            <label><b>Tiêu đề</b><br><span>Tiêu đề email</span></label><input type='text' name='txttitle' value='{txttitle}'  class ='fieldinput' style='width:440px' />
        </p>
        <p style='height:200px'>
            <label><b>Nội dung</b><br><span>Nội dung mail mà bạn muốn gởi</span></label><textarea  name="mess" style='height:180px;width:440px'>{mess}</textarea>
        </p>
        <p>
            <label><b>Tùy chọn</b><br><span>Tùy chỉnh một số thay đổi</span></label><input type='checkbox' name='html' checked /> Bật/tắt html <input type='checkbox' name='sign' checked /> Đính kèm chữ ký
        </p>
    </div>
    <p><label style='width:370px'>&nbsp;</label><input type ='submit' name='btnsend' value='Gởi mail' class='button' /></p>
</form>
<br>