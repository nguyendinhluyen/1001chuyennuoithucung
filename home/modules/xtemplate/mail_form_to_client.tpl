<html>
    <header>
        <!--BEGIN_table_style border="1" cellpadding="0" cellspacing="0"  END_table_style-->

        <!--BEGIN_th_style align="center"  height="50" bgcolor="#06C7C6" END_th_style-->

        <!--BEGIN_td_style height="50" END_td_style-->

        <!--BEGIN_td_product_style border-width: 1px;
            padding: 1px;
            border-style: inset;
            border-color: gray;
            background-color: white;
            -moz-border-radius: ; END_td_product_style-->

        <!--<style type="text/css">
        table.sample {
                border-width: 1px;
                border-spacing: 2px;
                border-style: outset;
                border-color: #C63;
                border-collapse: inherit;
                background-color: white;
        }
        table.sample th {
                border-width: 1px;
                padding: 1px;
                border-style: inset;
                border-color: gray;
                background-color: #96D6E9;
                color: white;
                -moz-border-radius: ;
        }
        table.sample td {
                border-width: 1px;
                padding: 1px;
                border-style: inset;
                border-color: gray;
                background-color: white;
                alignment-adjust:middle;
                -moz-border-radius: ;
        }
        </style>-->
    </header>
    <body>
        Chào bạn, <font color="#FFCC33">{custommer_name}</font>, <br>
        Cám ơn bạn đã đặt hàng tại NanaPet <br>
        Hiện đơn hàng của bạn đang được NanaPet xử lý và sắp xếp giao hàng trong thời gian sớm nhất.<br>
        <br>
        <strong>THÔNG TIN ĐƠN HÀNG </strong><font color="#FFCC33">#{orderID} ({day})</font> <br><br>
        <table {table_style} width="750px">
            <tr>
                <th {th_style}><font size="+1" color="#FFFFFF">Thông tin người mua hàng</font>

                </th>
                <th {th_style}><font size="+1" color="#FFFFFF">Thông tin người nhận hàng </font>       </th>
            </tr>
            <tr>
                <td {td_style}>
                    {buyer_name} <br><br>
                    {buyer_address} <br><br>
                    {buyer_country} <br><br>
                    {buyer_numberphone} <br>
                </td>
                <td {td_style}>
                    {receiver_name} <br><br>
                    {receiver_address} <br><br>
                    {receiver_country} <br><br>
                    {receiver_numberphone} <br>
                </td>
            </tr>
            <tr>
                <td {td_style} colspan="2">
                    <br>
                    <p>Phương thức vận chuyển: {transport_method}<br><br>
                        Phí vận chuyển: {transport_fee}<br><br>
                        Phương thức thanh toán: {payment_method}<br><br>
                        Ghi chú đơn hàng: {note}<br>
                    </p>
                </td>
            </tr>
        </table>
        <br>
        <table {table_style} width="750px">
            <tr>
                <th {th_style}><font size="+1" color="#FFFFFF">Tên sản phẩm</font></th>

                <th {th_style}><font size="+1" color="#FFFFFF">Đơn giá</font></th>
                <th {th_style}><font size="+1" color="#FFFFFF">S/Lượng</font></th>
                <th {th_style}><font size="+1" color="#FFFFFF">Thành tiền</font></th>
            </tr>
            <!--BEGINLIST_PRODUCTS-->
            <!--BEGIN_PRODUCT-->
            <tr>
                <td {td_style} align="center">{product_name}</td>        
                <td {td_style} align="center">{product_price}</td>
                <td {td_style} align="center">{product_amount}</td>
                <td {td_style} align="center">{product_total}</td>
            </tr>
            <!--END_PRODUCT-->
            <!--ENDLIST_PRODUCTS-->
            <tr>
                <td {td_style} colspan="2" align="right">Tổng&nbsp;</td>
                <td {td_style} align="center">{total_amount}</td>
                <td {td_style} align="center">+ {total_price} VNĐ</td>
            </tr>
            <tr>
                <td {td_style} colspan="3" align="right">Số điểm nhận được&nbsp;</td>
                <td {td_style} align="center">+ {score} điểm</td>
            </tr>
            <tr>
                <td {td_style} colspan="3" align="right">Phí giao hàng&nbsp;</td>
                <td {td_style} align="center">+ {transport_fee_number}</td>
            </tr>
            <tr>
                <td {td_style} colspan="3" align="right">Giảm giá coupon&nbsp;</td>
                <td {td_style} align="center">{discount}</td>
            </tr>
            <tr>
                <td {td_style} colspan="3" align="right">Tổng đơn hàng&nbsp;</td>
                <td {td_style} align="center">{cost}</td>
            </tr>
        </table>
        <br>
        Để quản lý, kiểm tra hoặc điều chỉnh đơn hàng, bạn click vào <a href="{linkS}gio-hang.html/edit/{orderID}">đây</a> nha. <br><br>
        Bạn gặp phải thắc mắc về đơn hàng ư, hãy tham khảo mục <a href="{linkS}tro-giup">Trợ Giúp</a> bạn nhé. <br>
        Nếu bạn gặp phải bất cứ thắc mắc hoặc rắc rối nào, đừng ngần ngại liên hệ với NanaPet qua hotline <br> <br>
        0933.103.203 hoặc email support@nanapet.com.<br>
        Một lần nữa, cám ơn bạn đã đặt hàng tại NanaPet.<br>
        Chúc bé yêu nhà bạn luôn khỏe mạnh và năng động. <br><br>
        <h4><p align="right">NanaPet Online Shop</p></h4><br>
    </body>
</html>