<div class="cart_score">{cart_quan}</div>
<div style="margin-left: -10px;">
    <table border = "0">  <!-- border = "1" cellspacing="0" cellspadding="0"  -->
        <tr>
            <td align="center" colspan="3"><font><b>BẠN ĐANG CÓ {quantity} SP</b></font></td>
        </tr>
        <tr>
            <td colspan="3">
                <div id="cart_box" style="height:auto;max-height:140px; width: 134px;">
                    <!--BEGINLIST_LISTCART-->
                    <!--BEGIN_LISTCART-->
                    <table width="116px" border="0">
                        <tr>
                            <td class="name-cart">{pro_name}</td>
                            <td class="quantity-cart">x {pro_quantity} = </td>
                            <td class="price-cart">{pro_price}</td>
                        </tr>
                    </table>
                    <!--END_LISTCART-->
                    <!--ENDLIST_LISTCART--> 
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">----------------------------</td>
        </tr>
        <tr>
            <td class="name-cart" align="left">&nbsp;&nbsp;&nbsp;&nbsp;TOTAL</td>
            <td colspan="2" align="right">{price_total}&nbsp;&nbsp;</td>
        </tr>
    </table>
</div>
<script>
    $('#cart_box').lionbars();
</script>