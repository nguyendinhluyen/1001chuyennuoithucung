<style>
    .td_check{
        width:30px;
        font-weight: bold;
        text-align: center;
    }
    .td_chitiet{
        width:100px;
        font-weight: bold;
    }
    .td_dacdiem{
        width:150px;
        font-weight: bold;
    }

    .td_giathanh{
        width:100px;
        font-weight: bold;
    }
    .td_khuyenmai{
        width:100px;
        font-weight: bold;
    }
    .td_soluong{
        width:70px;
        font-weight: bold;
    }
    .tr_top{
        background-color: #F4F4F4;
        height: 30px;
    }

</style>

<form name="fav" method="post">
    <table border="0" cellspacing = "0" paddingspacing = "0" style="text-align: center;">
        <tr class = "tr_top">
            <td class="td_check"><input type="checkbox" name="check_all" id="check_all" value="0" onclick="checkAll();"/></td>
            <td class="td_chitiet">Chi tiết</td>
            <td class="td_dacdiem">Đặc điểm</td>
            <td class="td_giathanh">Giá thành</td>
            <td class="td_khuyenmai">Khuyến mãi</td>
            <td class="td_soluong">Số lượng</td>
        </tr>
        <!--BEGINLIST_LISTFAVIROTE-->
        <!--BEGIN_LISTFAVIROTE-->

        <tr  valign="top">
            <td align="center"><input type="checkbox" name="check_fav[]" value="{id_fav}"/></td>
            <td><img src = "{linkS}upload/product/{img_product}" height="100px"/></td>
            <td style="padding-left: 10px;">{dacdiem}</td>
            <td>{giathanh}</td>
            <td>{khuyenmai}</td>
            <td>
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
            </td>
        </tr>
        <tr>
            <td colspan="6"><hr style="height: 1px;" /></td>
        </tr>
        <!--END_LISTFAVIROTE-->
        <!--ENDLIST_LISTFAVIROTE-->
    </table>
    <input type="submit" name="xoa" value="Xóa" onclick="return xoaFav();"/> <input type="submit" name="them" value="Thêm vào giỏ hàng" onclick="return addToCart();"/> <input type="submit" name="luu" value="Lưu"/>
</form>

<script>
    function xoaFav()
    {
        return confirm("Bạn thực chắc chắn muốn xóa");
    }
    function checkAll() {
        $('#check_all').click(function () {
            $("input[type=checkbox]").each(function () {
                if (this.checked == true) {
                    $("input[type=checkbox]").attr('checked', 'checked');
                } else {
                    $("input[type=checkbox]").attr('checked', false);
                }
            });
        });
    }
    function addToCart()
    {
        //return false;

        var n = $("input:checked").length;
        if (n == 0) {
            alert('Chưa chọn sản phẩm');
            return false;
        }
        return true;
    }

    $(document).ready(function () {
        var arrQuan = {arrQuan};
        var arrID = {arrID};
        $.each(arrID, function (i, val) {
            var namQuan = 'quantity' + val;
            $("#" + namQuan).val(arrQuan[i]);
        });
    });
</script>