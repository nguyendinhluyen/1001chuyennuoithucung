<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style="text-indent:10px;line-height:20px">{title}</div>
    <div class = "content_con" style='padding:5px'>
        <div id='config_right' style='border:0px'>
            <p>
                <label><b>Thay từ</b><br><span>Nhập vào từ mà bạn muốn thay thế.Nó thường được sử dụng khi bạn cần thay thế các từ nào đó không cho phép đăng lên diễn đàn</span></label><input type = 'text' name = 'word' class ='fieldinput'>
            </p>
            <p>
                <label><b>Bằng từ</b><br></label><input type = 'text' name = 'replace' class ='fieldinput'>
            </p>
            <p>
                <label>&nbsp;</label><input type='submit' name='btnsubmit' value='Cập nhật' class='button'/>
            </p>
        </div>
        <div style='padding:5px;background-color:#f5f5f5;text-align:center;font-weight:bold'>Danh sách các từ thay thế</div>
        <div style = "float:left">
            <div class = "title" style = 'width:851px'>
                <div class = "con_title" style = "width:50px;text-align:center">ID</div>
                <div class = "con_title" style = "width:50px">Gở bỏ</div>
                <div class = "con_title" style = "width:330px">Từ gốc</div>
                <div class = "con_title" style = "width:330px;border:0px">Thay bằng</div>
                <div class = "con_title" style = "width:90px;border:0px">Ngày thêm</div>
            </div>
            <div>
                <!--BEGINLIST_WORD-->
                <!--BEGIN_WORD-->
                <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center">{id}</div>
                <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=wordsReplace&action=del&id={id}" onclick="return confirm('Bạn có chắc là muốn gỡ bỏ ?');">Gỡ bỏ</a></div>
                <div class = "con_list_con" style = "width:330px;background-color:{color};height:30px;">{word}</div>
                <div class = "con_list_con" style = "width:330px;background-color:{color};height:30px;">{replace}</div>
                <div class = "con_list_con" style = "width:90px;background-color:{color};height:30px;">{date}</div>
                <div class ='clear'></div>
                <!--END_WORD-->
                <!--ENDLIST_WORD-->
            </div>
        </div>
    </div>
</form>