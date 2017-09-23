<style>
    a.dang_ky:hover {
        text-decoration: none;
    }
</style>
<script language="javascript" type="text/javascript">
    function confirmChange(msg) {
        var r = confirm(msg);
        return r;
    }
</script>
<div class="col-xs-12" 
     style="padding: 0px;
     color: #ff00cc; 
     font-family: RobotoSlabRegular">THÔNG TIN THÚ CƯNG</div>
<!--BEGINLIST_PETS-->
<!--BEGIN_PET-->
<div class="col-xs-12" 
     style="padding-left: 0px; padding-right: 0px; font-family: RobotoSlabRegular">
    <hr/>
    <div class="col-xs-3" style="padding-left: 0px">
        <img src="{linkS}upload/avatar/{image_pet}" width="100%">
    </div>
    <div class="col-xs-9">
        <div><span style="font-size: 15px; color: red;">{tenpet}</span></div>
        <div class="pet_info">Ngày sinh: {ngaysinh}</div>
        <div class="pet_info">Loài: {loai}</div>    
        <div class="pet_info">Chiều cao: {chieucao} cm</div>    
        <div class="pet_info">Cân nặng: {cannang} kg</div>    
        <div class="pet_info">Màu sắc: {mausac}</div>
        <div class="pet_info">Giới tính: {gioitinh}</div>
        <div class="col-xs-12" style="padding-left: 0px">
            <a href="{linkS}cap-nhat-pet-{id_pet}.htm">Sửa</a>
            <span style="color:blue">|</span>
            <a href="{linkS}xoa-pet-{id_pet}.htm" 
               onclick="return confirmChange('Bạn muốn xóa?');">Xóa</a>
        </div>
    </div>
</div>
<!--END_PET-->
<!--ENDLIST_PETS-->
<div class="col-xs-12" style="padding-bottom: 20px; padding-left: 0px">
    <div style="margin-top: 10px">
        <a class="dang_ky" 
           href="{linkS}dang-ky-pet" 
           style="outline:none;
           float:left;
           background-color: #ff767c;
           border: none;
           color: #fff;
           font-family:PoetsenOne;
           -webkit-border-radius: 20px;
           -moz-border-radius: 20px;
           border-radius: 20px;
           padding: 5px 10px 5px ;
           font-size: 14px;">Thêm thú cưng</a>
    </div>
</div>