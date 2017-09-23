<form name="fav" method="post">
    <div class="hidden-xs col-sm-12" style="text-align: left; padding-left: 0px">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">Hình ảnh</div>
        <div class="col-sm-4">Sản phẩm</div>
        <div class="col-sm-2">Giá</div>
        <div class="col-sm-2">Khuyến mãi</div>
        <div class="col-sm-1">SL</div>
    </div>
    <!--BEGINLIST_LISTFAVIROTE-->
    <!--BEGIN_LISTFAVIROTE-->        
    <div class="col-sm-1" style="padding-left: 0px"> 
        <input type="checkbox"
               name="check_fav[]"
               value="{id_fav}"
               style="margin-right: 15px"></div>
    <div class="col-sm-2" style="padding-left: 0px">
        <img src = "{linkS}upload/product/{img_product}" height="100px"></div>
    <div class="col-sm-4">{product_name}</div>
    <div class="col-sm-2">{giathanh}</div>
    <div class="col-sm-2" style="padding-left: 0px">{khuyenmai}</div>
    <div class="col-sm-1" style="padding-left: 0px">
        <select name='quantity{id_fav}' id='quantity{id_fav}'>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>                
    <!--END_LISTFAVIROTE-->
    <!--ENDLIST_LISTFAVIROTE-->    
    <div class="col-xs-12">
        <input type="submit"
               name="them"
               value="Thêm vào giỏ hàng" 
               onclick="return addToCart();"
               style="-webkit-border-radius:20px;
               -moz-border-radius:20px;
               outline:none;
               background-color:#ff767c;
               border:none;
               color:#fff;
               font-family:PoetsenOne;
               border-radius:20px;
               padding:5px;
               width:150px;
               font-size:14px;
               margin-top:15px;
               margin-bottom:20px">
        <input type="submit" 
               name="xoa" 
               value="Xóa" 
               onclick="return xoaFav();"
               style="-webkit-border-radius:20px;
               -moz-border-radius:20px;
               outline:none;
               background-color:#ff767c;
               border:none;
               color:#fff;
               font-family:PoetsenOne;
               border-radius:20px;
               padding:5px;
               width:70px;
               font-size:14px;
               margin-right:10px">
    </div>
</form>
<script>
    function xoaFav() {
        return confirm("Bạn muốn xóa?");
    }
    function addToCart() {
        var n = $("input:checked").length;
        if (n === 0) {
            alert('Chưa chọn sản phẩm');
            return false;
        }
        return true;
    }
    $(document).ready(function () {
        var arrQuan ={arrQuan};
        var arrID ={arrID};
        $.each(arrID, function (i, val) {
            var namQuan = 'quantity' + val;
            $("#" + namQuan).val(arrQuan[i]);
        });
    });
</script>