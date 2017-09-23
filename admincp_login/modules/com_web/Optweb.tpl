<div class = "title">{title}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm" onsubmit="submitForm2()">
        <div class = "img_show" style ="width:60px">
            {show_logo}
            <p style = 'text-align:center;width:62px'><a href = '{view_adver}' ><img src = '../style/images/picon.gif'></a></p>
        </div>

        <div style="float:left;padding-left:20px">
            <div class ='err' style ='margin-left:100px'>{error}</div>
            <p>
                <label><b>Khách hàng</b></label><input type = 'text' name = 'txtwebname' class ='fieldinput' value ='{txtwebname}'> <font color ='red'>*</font>
            </p>
            <p>
                <label>Địa chỉ liên kết</label><input type = 'text' name = 'linkweb' class ='fieldinput' value ='{linkweb}'> <font color ='red'>*</font>
            </p>
            <p style='display:none'>
                <label><b>Keywords</b></label><input type = 'text' name = 'keywords' class ='fieldinput' value ='{keywords}'> <font color ='red'>*</font>
            </p>
            <p style='display:none'>
                <label><b>Description</b></label><input type = 'text' name = 'description' class ='fieldinput' value ='{description}'> <font color ='red'>*</font>
            </p>

            <p>
                <label>Hình ảnh</label><input style="margin-left:0px" size = '29' type = 'file' name = 'fileAdver'/>
            </p>
            <p>
                <label>Giới thiệu ngắn</label><textarea name = "website_decription" cols = "67" rows = "5">{website_decription}</textarea>

            </p>

            <p>
                <label>Sắp xếp</label><input name = 'txtorder' value = "{txtorder}" maxlength = '3' />
            </p>
            <label>&nbsp;</label><input class = "button" type = "submit" name = "btnSub" value = "Submit"/>
            <input class = "button" type = "reset" value = "Reset"/>

            <br/>
        </div>
    </form>
</div>