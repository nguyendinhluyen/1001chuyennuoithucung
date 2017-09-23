<style>
    .cart
    {
        border-top:1px solid #BCDDEE;
    }
    .cart td,.cart th
    {
        border-bottom:1px solid #BCDDEE;
        border-left:1px solid #BCDDEE;
        border-right:1px solid #BCDDEE;
        padding:3px;
    }
    .recycle_bin_empty
    {
        background:url('{linkS}layout/images/recycle_bin_empty.png') no-repeat left center;
        text-indent:20px;
        padding:3px;
        border:2px solid #BCDDEE
    }
    .order
    {
        padding:3px;
        border:2px solid #ccc;
        color:#999;
        text-indent:20px;
        background:url('{linkS}layout/images/shopping.png') no-repeat left center;

    }
    #cap-nhat
    {
        font-size: 16px;
        font-weight: 300;
    }
</style>
<script>
    String.prototype.replaceAll = function (
            strTarget, // The substring you want to replace
            strSubString // The string you want to replace in.
            ) {
        var strText = this;
        var intIndexOfMatch = strText.indexOf(strTarget);

        // Keep looping while an instance of the target string
        // still exists in the string.
        while (intIndexOfMatch != -1) {
            // Relace out the current instance.
            strText = strText.replace(strTarget, strSubString)

            // Get the index of any next matching substring.
            intIndexOfMatch = strText.indexOf(strTarget);
        }

        // Return the updated string with ALL the target strings
        // replaced out with the new substring.
        return(strText);
    }

    function cart_finish_items()
    {
        // Kiem tra don han hon 200.000 VND
        var total_money_product = document.getElementById("total_money_product").innerHTML;
        total_money_product = total_money_product.replaceAll('.', '');
        total_money_product = total_money_product.replace(' VNĐ', '');
        if (parseFloat(total_money_product) >= 200000)
        {
            var code_coupon = document.getElementById("code_coupon").value;
            if (code_coupon != "")
                window.location = '{linkS}ket-thuc-mua-hang/' + code_coupon + '.html/';
            else
                window.location = '{linkS}ket-thuc-mua-hang';
        } else
        {
            alert('Đơn hàng tối thiếu >= 200.000 VNĐ');
        }
    }
</script>
<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div> 
    <div class="cart-main">
        <div id="che-bas-item-table">

            <br/>
            <div>{sua_don_hang}</div>
            <form action="{linkS}gio-hang" method="post">
                <table id="che-bas-shopping-cart-items" cellpadding="0" width="100%" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <th class="stt_cart_header">
                            </th>
                            <th class="che-bas-cart-heading-image">&nbsp;</th>
                            <th class="che-bas-cart-heading-description">Sản phẩm</th>
                            <th class="che-bas-cart-heading-item-price">Giá</th>
                            <th class="che-bas-cart-heading-qty">Số lượng</th>
                            <th class="che-bas-cart-heading-total-price">Tổng tiền</th>
                        </tr>
                    </tbody>
                    <tbody>
                        <!--BEGINLIST_LISTCART-->
                        <!--BEGIN_LISTCART-->
                        <tr>
                            <td class="stt_cart"><input type="checkbox" name="check_cart[]" value="{stt_item}"/></td>
                            <td class="che-bas-item-image-cell">
                                <input name="itemIndex_0" type="hidden" value="0">		
                                <a tabindex="-1" href="{linkS}{category}/{product_key}.htm" onclick="">
                                    <img class="item-img" src="{linkS}upload/product/{product_image}" alt="METALLIC ROUCHED LACE DRESS">
                                </a>
                            </td>
                            <td class="che-bas-item-cell" style="padding-right: 20px">
                                <a class="che-bas-item-name" tabindex="-1" href="{linkS}{category}/{product_key}.htm" onclick="">{product_name}
                                </a>
                                <ul>	
                                    {color_des}
                                    {type_des}
                                    <li>
                                        <a class="glo-tex-normal" href="{linkS}{category}/{product_key}.htm" onclick="">Xem</a>&nbsp;
                                    </li>
                                </ul>
                                <div class="glo-clr"><!--  --></div>
                            </td>				
                            <td class="che-bas-item-cell che-bas-item-p">
                                {price} {price_unit}
                            </td>
                            <td class="che-bas-item-cell">								
                                <input type="text" 
                                       title="Cập nhật số lượng trong giỏ" 
                                       class="glo-form" 
                                       style="width:28px;height:16px" 
                                       size="4" 
                                       maxlength="4" 
                                       name="quantity[]" 
                                       value="{quantity}" />
                                <input type="hidden" name="product_key[]" value="{product_key}"/> 
                                <input type="hidden" name="type[]" value="{type}"/> 
                                <input type="hidden" name="color[]" value="{color}"/> 
                                <input type="hidden" name="prices[]" value="{price}"/> 				   
                                <div class="glo-clr"><!--  --></div>
                            </td>
                            <td class="che-bas-item-price-cell che-bas-item-p">						
                                {total_one} {price_unit}
                            </td>
                        </tr>
                        <tr style="display: none; ">
                            <td colspan="5" class="che-bas-item-cell" style="height:15px;
                                border-top:0px; 
                                border-bottom:0px; 
                                padding:0px;">&nbsp;					
                            </td>
                            <td class="che-bas-item-price-cell" style="border-top:0px; 
                                border-bottom:0px; 
                                padding:0px;">&nbsp;					
                            </td>
                        </tr>
                        <!--END_LISTCART-->
                        <!--ENDLIST_LISTCART-->	
                    </tbody>
                </table>
                <div style="float: left; margin-top:-20px">
                    <br/>
                    <p id = "title_coupon" {display_code_coupon}>Nhập mã coupon khuyến mãi (nếu có)</p>
                    <p id = "title_coupon" {display}>{message_result}</p>    	        	
                    <div id="div_coupon" >    		
                        <input type="text" 
                               id ="code_coupon" 
                               name = "code_coupon" 
                               style="width:232px; text-transform:uppercase"
                               value = "{coupon_code}"
                               maxlength="10"/>
                        <input type="submit" name="check_coupon" value="Kiểm tra coupon" />
                    </div>       
                    </br>
                    <input type="submit" 
                           class="recycle_bin_empty" 
                           name="deleteItem"  
                           value="Xóa sản phẩm" 
                           onclick="return confirmDelete();"/>
                    <input class="order"  
                           type="button" 
                           value="Tiếp tục mua hàng" 
                           onclick="window.location = '{linkS}index.htm'"/>                
                    <input class="order" 
                           style="color: red" 
                           type="button" 
                           value="ĐẶT HÀNG" 
                           onclick="cart_finish_items()"/>            
                    <br>
                    <br>    
                    <a class="nganluong" 
                       style="margin-right:15px" 
                       target="_blank" 
                       href="https://www.nganluong.vn/button_payment.php?receiver=support@nanapet.com&amp;product_name={list_product}&amp;price={total_price}&amp;return_url=http://nanapet.com"><img src="https://www.nganluong.vn/data/images/merchant/button/btn-paynow-125.png" width="100px" border="0" title="Thanh toán trực tuyến AN TOÀN và ĐƯỢC BẢO VỆ, sử dụng thẻ ngân hàng trong và ngoài nước hoặc nhiều hình thức tiện lợi khác.Được bảo hộ &amp; cấp phép bởi NGÂN HÀNG NHÀ NƯỚC, ví điện tử duy nhất được cộng đồng ƯA THÍCH NHẤT 2 năm liên tiếp, Bộ Thông tin Truyền thông trao giải thưởng Sao Khuê."></a>
                    <a class="baokim" 
                       style="margin-right:15px" 
                       href="https://www.baokim.vn/payment/customize_payment/product?business=support@nanapet.com&product_name={list_product}&product_price={total_price}&product_quantity=1&total_amount={total_price}" target="_blank"><img src="https://www.baokim.vn/application/uploads/buttons/btn_safety_payment_3.png" alt="Thanh toán an toàn với Bảo Kim !" width="100px" height="55px" border="1" title="Thanh toán trực tuyến an toàn dùng tài khoản Ngân hàng (VietcomBank, TechcomBank, Đông Á, VietinBank, Quân Đội, VIB, SHB,... và thẻ Quốc tế (Visa, Master Card...) qua Cổng thanh toán trực tuyến BảoKim.vn" ></a>        
                </div>
                <div id="che-bas-bottom-right-wrapper" style="width:320px; margin-top:10px; padding-right:7px">
                    <div id="che-bas-order-summary-outer" style="width:320px">
                        <div id="che-bas-order-summary-inner" style="width:320px">
                            <dl>
                                <dt id="cap-nhat"> Nếu thay đổi số lượng hãy </dt>
                                <dd> <input  type="submit"  name="updateQuan" value="Cập nhật số lượng" />
                                </dd>
                            </dl>					
                            <dl>
                                <dt id="che-bas-estimated-total">Tổng tiền mua hàng:</dt>
                                <dd id = 'total_money_product'>{total} VNĐ
                                </dd>
                            </dl>					
                            <div class="glo-clr"><!--  --></div>
                            <br/>
                            <br/>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>

</form>

<script type="text/javascript">

    $(document).ready(function () {
        /* $.ajax({
         type: "POST",
         url: "{linkS}home/modules/ajax/cart_right.php",
         data: {"emty":"{emty_cart}"},
         success: function(data)
         {
         $("#main-cart").html(data);
         }
         }); */
    });
    function submitformDetele(formname)
    {
        document.forms[formname].submit();
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
    function confirmDelete()
    {
        return confirm("Bạn thực chắc chắn muốn xóa");
    }
</script>
