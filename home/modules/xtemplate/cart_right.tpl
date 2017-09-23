<div class="cart_score">
    {cart_quan}
</div>
<div style="margin-left: -10px;">
    <table border = "0">
        <tr>
            <td align="center" colspan="3" style="font-family: Arial;
                font-size: 10px;
                color: white">
                <b>BẠN ĐANG CÓ {quantity} SP</b>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div id="cart_box" style="height:auto;
                     max-height:140px;
                     width: 134px;">   
                </div>
                <!--BEGINLIST_LISTCART-->
                <!--BEGIN_LISTCART-->
                <table width="116px" border="0">
                    <tr>
                        <td class="name-cart" style="font-family: Arial;
                            font-size: 10px;
                            color: white">
                            {pro_name}
                        </td>
                        <td class="quantity-cart" style="font-family: Arial;
                            font-size: 10px;
                            color: white;
                            width:10px">
                            x {pro_quantity} =
                        </td>
                        <td class="price-cart" style="font-family: Arial;
                            font-size: 10px;
                            color: white">
                            {pro_price}
                        </td>
                    </tr>
                </table>
                <!--END_LISTCART-->
                <!--ENDLIST_LISTCART--> 
            </td>
        </tr>

        <tr>
            <td colspan="3" style="font-family: Arial;
                font-size: 10px;
                color: white;">
                --------------------------------
            </td>
        </tr>
        <tr>
            <td class="name-cart"
                align="left"
                style="font-family: Arial;
                font-size: 11px;
                color: white">
                &nbsp;&nbsp;&nbsp;&nbsp;TOTAL
            </td>
            <td colspan="2"
                align="right"
                style=" font-family: Arial;
                font-size: 10px;
                color: white">
                {price_total}&nbsp;&nbsp;
            </td>
        </tr>
    </table>
</div>
<script>
    $('#cart_box').lionbars();
</script>