<!--BEGINLIST_FLASH-->
<!--BEGIN_FLASH-->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62px" height="100px">
    <param name="movie" value = "{logo}" />
    <param name="quality" value="high" />
    <param name="wmode" value="transparent"/>
    <embed src = "{logo}" quality = "high" type="application/x-shockwave-flash" WMODE="transparent" width="62px" height="100px" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<!--END_FLASH-->
<!--ENDLIST_FLASH-->
<div class = "title">{title}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <div class = "img_show">
            {show_logo}
            <p style = 'text-align:center;width:62px'><a href = '{view_adver}' target="_blank"><img src = '../style/images/picon.gif'></a></p>
        </div>

        <div style="float:left;padding-left:20px">
            <div class ='err' style ='margin-left:100px'>{error}</div>
            <p>
                <label><b>Tên file(TV)</b></label><input type = 'text' name = 'txtwebname' class ='fieldinput' value ='{txtwebname}'> <font color ='red'>*</font>
            </p>
            <p>
                <label><b>Tên file (EN)</b></label><input type = 'text' name = 'txtwebname_en' class ='fieldinput' value ='{txtwebname_en}'> <font color ='red'>*</font>
            </p>
            <p>
                <label>Địa chỉ liên kết</label><input type = 'text' name = 'txtlink' class ='fieldinput' value ='{txtlink}'>
            </p>
            <p>
                <label>File download</label><input style="margin-left:0px" size = '29' type = 'file' name = 'fileAdver'/>
            </p>
            <p style="display:none"><label>Kích thước </label><input type = "text" name = "txtwidth" size = "3" maxlength ="4" value ="{txtwidth}"> x <input type = "text" name = "txtheight" size = "3" maxlength ="4" value ="{txtheight}"> (px)</p>
            <p>
            <p style="display:none">
                <label>Thuộc danh mục</label>{pos_adver}
            </p>
            <p>
                <label>Mô tả ngắn<br /> (Tiếng việt)</label><textarea name="description_ads" cols="30" rows="3">{description_ads}</textarea>
            </p>
            <p>
                <label>Mô tả ngắn <br />(Tiếng Anh)</label><textarea name="description_ads_en" cols="30" rows="3">{description_ads_en}</textarea>
            </p>
            <p>
                <label>Sắp xếp</label><input name = 'txtorder' value = "{txtorder}" maxlength = '3' />
            </p>
            <p>
                <label>Hiển thị</label><input type = 'checkbox' name = 'cbstatus' {checked}/>
            </p>
            <label>&nbsp;</label><input class = "button" type = "submit" name = "btnSub" value = "Save"/>
            <input class = "button" type = "reset" value = "Reset"/>
            </p>
            <br/>
        </div>
    </form>
</div>