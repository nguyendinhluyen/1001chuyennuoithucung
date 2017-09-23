<script type="text/javascript">
    function xoa() {
        return confirm("Bạn thực chắc chắn muốn xóa");
    }
</script>
<p align="center"
   style="color: #ff00cc; font-size: 15px">
    Lịch sử mua hàng
</p>
<table width="100%" style="font-size: 14px">
    <tr>
        <td style ="padding:10px 0px 10px 0px;">Mã đơn hàng</td>
        <td style ="padding:10px 20px 10px 20px;">Ngày đặt hàng</td>
        <td style ="padding:10px 20px 10px 20px;">Tổng tiền</td>
        <td style ="padding:10px 20px 10px 20px;">Trạng thái</td>
        <td style ="padding:10px 20px 10px 20px;">Thao tác</td>
    </tr>
    <!--BEGINLIST_ORDER-->
    <!--BEGIN_ORDER-->			
    <tr>
        <td style="text-align: center; padding: 10px">
            <div class="show">
                <a href="{madonhang}">{madonhang}</a>
            </div>
        </td>
        <td style="text-align: center; padding: 10px">{ngaydat}</td>
        <td style="text-align: right;">{tongtien} VNĐ</td>
        <td style="text-align: center;padding: 10px">{trangthai}</td>
        <td style="text-align: center;padding: 10px">{edit_html}</td>
    </tr>
    <!--END_ORDER-->
    <!--ENDLIST_ORDER-->
</table>




