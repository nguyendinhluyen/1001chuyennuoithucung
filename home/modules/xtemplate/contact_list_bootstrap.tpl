<style> 
    a.dang_ky:hover {
        /*Trick for none hover underline*/
        text-decoration: none !important;
    }
</style>
<div style="color: #ff00cc;
     font-size: 14px; line-height: 30px">ĐỊA CHỈ GIAO HÀNG CHÍNH</div>
<div>{name}</div>
<div>{address}</div>
<div>{phone}</div>
</div>
<div style="padding-top: 10px">
    <span style="color: #ff00cc; 
          font-size: 14px;">ĐỊA CHỈ GIAO HÀNG KHÁC</span>
</div>    
<div>
    {listAdd1}
</div>
<div>
    {listAdd2}
</div>
<div style="margin-top: 10px; padding-bottom: 70px"> 
    <a class="dang_ky" 
       href="{linkS}them-dia-chi.chm" 
       style="-webkit-border-radius: 20px;
       -moz-border-radius: 20px;
       outline: none;
       float: left;
       background-color: #ff767c;
       border: none;
       color: #fff;
       font-family:PoetsenOne;
       border-radius: 20px;
       padding: 5px 10px 5px 10px; 
       font-size: 14px;">Thêm địa chỉ mới</a>
</div>        
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