<html>
    <header>
        <!--BEGIN_table_style border="1" cellpadding="0" cellspacing="0"  END_table_style-->

        <!--BEGIN_th_style align="center"  height="50" width= "70" bgcolor="#06C7C6" END_th_style-->

        <!--BEGIN_td_style height="50" width= "70" END_td_style-->

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
        Chào <font color="#FFCC33">{custommer_name}</font>,<br>
        Chúc mừng bạn đã nhận được coupon khuyến mãi từ Nanapet Online.<br>
        Hãy mua hàng và sử dụng coupon khuyến mãi khi đặt hàng online bạn nhé!<br>
        <br>
        <strong>THÔNG TIN COUPON KHUYẾN MÃI </strong> <br><br>
        <table {table_style} width="850px">

            <br>
            <table {table_style} width="1000px">
                <tr>
                    <th {th_style}><font size="+1">Tên coupon</font></th>
                    <th {th_style}><font size="+1">Mã coupon</font></th>
                    <th {th_style}><font size="+1">Giảm giá (%)</font></th>
                    <th {th_style}><font size="+1">Hóa đơn được sử dụng (VNĐ)</font></th>
                    <th {th_style}><font size="+1">Ngày hết hạn</font></th>
                    <th style = "width: 200px; background:#06C7C6; text-align:center; text-wrap:normal "><font size="+1">Danh mục được sử dụng</font></th>
                </tr>
                <!--BEGINLIST_PRODUCTS-->
                <!--BEGIN_PRODUCT-->
                <tr>
                    <td {td_style} align="center">{coupon_name}</td>        
                    <td {td_style} align="center">{coupon_code}</td>
                    <td {td_style} align="center">{coupon_discount}</td>
                    <td {td_style} align="center">{coupon_bill}</td>
                    <td {td_style} align="center">{coupon_deadline}</td>
                    <td {td_style} align="justify">{coupon_category}</td>
                </tr>
                <!--END_PRODUCT-->
                <!--ENDLIST_PRODUCTS-->

            </table>
            <br>
            <br>
            <br>
            Nếu bạn gặp phải bất cứ thắc mắc hoặc rắc rối nào, đừng ngần ngại liên hệ với NanaPet qua hotline <br>
            0933.103.203 hoặc email support@nanapet.com.<br>
            Một lần nữa, cám ơn bạn đã tin dùng NanaPet.<br>
            Chúc bé yêu nhà bạn luôn khỏe mạnh và năng động. <br><br>
            <h4><p align="right">NanaPet Online Shop</p></h4><br>
            </body>
            </html>