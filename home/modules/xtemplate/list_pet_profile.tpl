
<link rel="stylesheet" type="text/css" href="{linkS}layout/css/template.css" />
<link rel="stylesheet" type="text/css" href="{linkS}layout/css/jquery-ui-1.8.16.custom.css"/>
<script type="text/javascript" src="{linkS}layout/js/jquery-ui-1.8.16.custom.min.js"></script>

<style>
    .headtd{
        font-size: 14px;
        font-weight: bold;
        color: blue;
    }
    .pet_info{
        font-size: 14px;
        font-weight: normal;
        color: blue;
        text-align: right;
        padding-right: 20px;
    }
</style>

<script language="javascript" type="text/javascript">
    function confirmChange(msg) {
        var r = confirm(msg);
        return r;
    }

</script>

<div class="news_main" style="width: 530px;">
    <br/>
    <a href="{linkS}dang-ky-pet"><b>Thêm Pet</b></a>
    <table width="523px" border="1" cellspacing="0" cellpadding="0" >
        <tr>
            <td width="50px;" class="headtd" style="text-align: center;" >
                STT
            </td>
            <td class="headtd" align="center">
                Thông tin
            </td>
            <td class="headtd" width="100px;" align="center">
                Hình ảnh
            </td>
        </tr>
        <!--BEGINLIST_PETS-->
        <!--BEGIN_PET-->
        <tr>
            <td align="center">
                {stt}
            </td>

            <td align="center">
                <table border="0" width="350px">
                    <tr>
                        <td colspan="2" align="center"><b style="font-size: large; color: red;">{tenpet}</b> &nbsp;&nbsp;&nbsp;
                            <a href="{linkS}cap-nhat-pet-{id_pet}.htm">Sửa Pet</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{linkS}xoa-pet-{id_pet}.htm" onclick="return confirmChange('Bạn thực sự muốn xóa?');">Xóa Pet</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{linkS}dang-ky-pet">Thêm Pet</a>
                        </td>

                    </tr>
                    <tr>
                        <td class="pet_info" width="100px">Ngày sinh :</td>
                        <td>{ngaysinh}</td>
                    </tr>
                    <tr>
                        <td class="pet_info">Loài :</td>
                        <td>{loai}</td>
                    </tr>
                    <tr>
                        <td class="pet_info">Chiều cao :</td>
                        <td>{chieucao}</td>
                    </tr>
                    <tr>
                        <td class="pet_info">Cân nặng :</td>
                        <td>{cannang}</td>
                    </tr>
                    <tr>
                        <td class="pet_info">Màu sắc :</td>
                        <td>{mausac}</td>
                    </tr>
                    <tr>
                        <td class="pet_info">Giới tính :</td>
                        <td>{gioitinh}</td>
                    </tr>
                </table>
            </td>


            <td>
                <img alt="" src="{linkS}upload/avatar/{image_pet}" width="120px;" height="140px;">
            </td>
        </tr>
        <!--END_PET-->
        <!--ENDLIST_PETS-->

    </table>

</div>
