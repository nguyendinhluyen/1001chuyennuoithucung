<table border="0" cellspacing = "0" paddingspacing = "0" style="width: 530px;">
    <tr class = "tr_top">
    <p></p>
    <td colspan="2" class="td_check"><b  style="color: #ff00cc;">ĐỊA CHỈ GIAO HÀNG CHÍNH</b></td>
</tr>
<tr class = "tr_top">
    <td colspan="2" class="td_check">
        <p> </p>
        <table>
            <tr>
                <td>{name}</td>
            </tr>
            <tr>
                <td>{address}</td>
            </tr>
            <tr>
                <td>{phone}</td>
            </tr>

            <tr>
                <td>
                    <!--<a id="show-panel" href="#" onclick="return false;">Chỉnh sửa</a>-->
                    <a href="{linkS}thong-tin-tai-khoan" >Chỉnh sửa</a>
                </td>
            </tr>

        </table>	
    </td>
</tr>


<tr class = "tr_top">
    <td><b style="color: #ff00cc;">ĐỊA CHỈ GIAO HÀNG KHÁC</b></td>
    <td><a href="{linkS}them-dia-chi.chm">Thêm địa chỉ giao hàng</a></td>
</tr>

<tr valign="top">
    <td>
        {listAdd1}
    </td>

    <td>
        {listAdd2}
    </td>
</tr>

</table>


<link rel="stylesheet" href="{linkS}layout/css/postfinal.css" type="text/css" />

<div id="lightbox-panel">

    <div align="right"><a id="close-panel" href="#" onclick="return false;"><img src="{linkS}layout/images/ico_close.gif"/></a></div>
    <div id="edit_contact" >
        <div style="text-align: center;"><b style="font-size: 16px; color: red;">Sửa địa chỉ giao hàng chính</b> </div><br/><br/>
        <form name="contact" method="post">
            <input type="hidden" name="id_contact" value="{id_contact}" />
            <table style="width: 530px;">
                <tr>
                    <td>
                        Họ tên :
                    </td>
                    <td>
                        <input type="text" name="name" value="{name}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Địa chỉ :
                    </td>
                    <td>
                        <input type="text" name="address" value="{address}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Điện thoại :
                    </td>
                    <td>
                        <input type="text" name="phone" value="{phone}"> 
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td align="center"> <input type="submit" name="save_main" value="Lưu"/></td>
                </tr>
            </table>
        </form>

    </div>

</div><!-- /lightbox-panel -->  

<div id="lightbox"> </div><!-- /lightbox -->    


<script>
    function deleteContact() {
        return confirm('Bạn thực sự muốn xóa?');
    }

    $("a#show-panel").click(function () {
        $("#lightbox, #lightbox-panel").fadeIn(300);
    });
    $("a#close-panel").click(function () {
        $("#lightbox, #lightbox-panel").fadeOut(300);
    });
</script>


