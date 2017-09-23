<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<link href="../jgallery/jss/style.css" rel="stylesheet" type="text/css" />
<link href="../jgallery/jss/default.css" rel="stylesheet" type="text/css" />
<link href="../jgallery/jss/messages.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jgallery/jss/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../jgallery/jss/jquery-ui-1.7.1.custom.min.js"></script>
<script src="../jgallery/jss/alert/jquery.alerts.js" type="text/javascript"></script>
<link href="../jgallery/jss/alert/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<!--Su dung de format tien -->
<script language=JavaScript src='../jscript/common.js'></script>
<script type="text/javascript">
    removeConfirm = "Bạn có chắc là muốn xóa ?";
</script>

<div class = "title">{title}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <div  style="margin-left:5px;margin-right:5px">
            <p>
                <label style="font-weight:bold;
                       color:green;
                       margin-bottom:3px;
                       font-size:20px;
                       margin-left:3px">
                    Quận
                </label>
                <br style="clear:both"/>
                <select id = "galary_district_name" name="galary_district_name" style="width: 150px; margin-left:3px">
                    <option value = "0">Chọn quận</option>
                    <option value = "Quận 1" {selected_Quận 1}>Quận 1</option>
                    <option value = "Quận 2" {selected_Quận 2}>Quận 2</option>
                    <option value = "Quận 3" {selected_Quận 3}>Quận 3</option>
                    <option value = "Quận 4" {selected_Quận 4}>Quận 4</option>
                    <option value = "Quận 5" {selected_Quận 5}>Quận 5</option>
                    <option value = "Quận 6" {selected_Quận 6}>Quận 6</option>
                    <option value = "Quận 7" {selected_Quận 7}>Quận 7</option>
                    <option value = "Quận 8" {selected_Quận 8}>Quận 8</option>
                    <option value = "Quận 9" {selected_Quận 9}>Quận 9</option>
                    <option value = "Quận 10" {selected_Quận 10}>Quận 10</option>
                    <option value = "Quận 11" {selected_Quận 11}>Quận 11</option>
                    <option value = "Quận 12" {selected_Quận 12}>Quận 12</option>
                    <option value = "Quận Thủ Đức" {selected_Quận Thủ Đức}>Quận Thủ Đức</option>
                    <option value = "Quận Gò Vấp" {selected_Quận Gò Vấp}>Quận Gò Vấp</option>
                    <option value = "Quận Bình Thạnh" {selected_Quận Bình Thạnh}>Quận Bình Thạnh</option>
                    <option value = "Quận Tân Bình" {selected_Quận Tân Bình}>Quận Tân Bình</option>
                    <option value = "Quận Tân Phú" {selected_Quận Tân Phú}>Quận Tân Phú</option>
                    <option value = "Quận Phú Nhuận" {selected_Quận Phú Nhuận}>Quận Phú Nhuận</option>
                    <option value = "Quận Bình Tân" {selected_Quận Bình Tân}>Quận Bình Tân</option>
                    <option value = "Huyện Củ Chi" {selected_Huyện Củ Chi}>Huyện Củ Chi</option>
                    <option value = "Huyện Hóc Môn" {selected_Huyện Hóc Môn}>Huyện Hóc Môn</option>
                    <option value = "Huyện Bình Chánh" {selected_Huyện Bình Chánh}>Huyện Bình Chánh</option>
                    <option value = "Huyện Nhà Bè" {selected_Huyện Nhà Bè}>Huyện Nhà Bè</option>
                    <option value = "Huyện Cần Giờ" {selected_Huyện Cần Giờ}>Huyện Cần Giờ</option>
                </select>
            </p>
            <p>
                <label style="font-weight:bold;
                       color:green;
                       margin-bottom:3px;
                       margin-left:3px;
                       margin-top:20px">Giá bắt đầu
                    <span style="color:#F00">*</span>
                </label><br style="clear:both"/>
                <input class="inputgallery"
                       type="text"
                       id ="galary_begin_price"
                       name="galary_begin_price"
                       value="{galary_begin_price}"onkeyup="javascript:Money_CheckCorrect('galary_begin_price');"/>
                <span style="font-size:14px">VNĐ</span>
                </select>

            </p>
            <p>
                <label style="font-weight:bold;color:green;margin-bottom:3px; margin-left:3px">
                    Giá kết thúc <span style="color:#F00">*</span>
                </label>
                <br style="clear:both"/>
                <input class="inputgallery"
                       type="text"
                       id="galary_end_price"
                       name="galary_end_price"
                       value="{galary_end_price}"
                       onkeyup="javascript:Money_CheckCorrect('galary_end_price');"/>
                <span style="font-size:14px">VNĐ</span>
            </p>
            <p>
                <label style="font-weight:bold;
                       color:green;
                       margin-bottom:3px;
                       margin-left:3px">Chi phí
                    <span style="color:#F00">*</span>
                </label><br style="clear:both"/>
                <input class="inputgallery"
                       type="text"
                       id="galary_fee"
                       name="galary_fee"
                       value="{galary_fee}"
                       onkeyup="javascript:Money_CheckCorrect('galary_fee');"/>
                <span style="font-size:14px">VNĐ</span>
            </p>
            <input style="height:36px;
                   border:1px solid #666;
                   border:2px solid #ccc;
                   margin-top:10px;
                   margin-left: 200px;
                   width:50px;
                   font-weight:bold"
                   type="submit"
                   name="btnSave"
                   value="Lưu"/></p>
            <div style="display:{display};">
                <br style="clear:both"/>
            </div>
        </div>
    </form>
    <div style="clear:both"/></div>
<br/><br/>
</div>