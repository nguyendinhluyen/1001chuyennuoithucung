<style>
    .cart {
        border-top:1px solid #BCDDEE;
    }
    .cart td,.cart th {
        border-bottom:1px solid #BCDDEE;
        border-left:1px solid #BCDDEE;
        border-right:1px solid #BCDDEE;
        padding:3px;
    }
    .recycle_bin_empty { 
        background:url('{linkS}layout/images/recycle_bin_empty.png') no-repeat left center;
        text-indent:20px;
        padding:3px;
        border:2px solid #BCDDEE;
    }
    .order {
        padding:3px;
        border:2px solid #ccc;
        color:#999;
        text-indent:20px;
        background:url('{linkS}layout/images/shopping.png') no-repeat left center;
    }
    #cap-nhat {
        font-size: 14px;
        font-weight: 300;
    }
</style>
<script>
    String.prototype.replaceAll = function (strTarget, strSubString) {
        var strText = this;
        var intIndexOfMatch = strText.indexOf(strTarget);
        // Keep looping while an instance of the target string
        // still exists in the string.
        while (intIndexOfMatch !== -1) {
            // Relace out the current instance.
            strText = strText.replace(strTarget, strSubString);
            // Get the index of any next matching substring.
            intIndexOfMatch = strText.indexOf(strTarget);
        }
        // Return the updated string with ALL the target strings
        // replaced out with the new substring.
        return(strText);
    };

    function cart_finish_items() {
        // Kiem tra don han hon 0 VND
        var total_money_product = document.getElementById("total_money_product").innerHTML;
        total_money_product = total_money_product.replaceAll('.', '');
        total_money_product = total_money_product.replace(' VNĐ', '');
        if (parseFloat(total_money_product) > 0) {
            var code_coupon = document.getElementById("code_coupon").value;
            if (code_coupon !== "") {
                window.location = '{linkS}ket-thuc-mua-hang/' + code_coupon + '.html/';
            } else {
                window.location = '{linkS}ket-thuc-mua-hang';
            }
        } else {
            alert('Đơn hàng tối thiếu > 0 VNĐ');
        }
    }
    function myFunctionSubmit() {
        document.getElementById("code_coupon").required = true;
        if (document.getElementById("code_coupon").value === "") {
            document.getElementById("code_coupon").setCustomValidity("Vui lòng nhập coupon!");
        } else {
            document.getElementById("code_coupon").setCustomValidity("");
        }
    }
    function functionOninput() {
        document.getElementById("code_coupon").setCustomValidity("");
    }
</script>
<div class="container">
    <div class ="row">
        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="cart-main hidden-sm hidden-xs"
                 style="padding-top: 30px;">
                <div id="breakcrumb" 
                     style="font-size:14px; 
                     font-family: RobotoSlabRegular; margin-bottom: 30px">
                    {breadcrumbs_path}
                </div>
                <div id="che-bas-item-table">
                    <div>{sua_don_hang}</div>
                    <form action="{linkS}gio-hang" method="post">
                        <table
                            id="che-bas-shopping-cart-items" 
                            width="100%">
                            <tbody>
                                <tr>
                                    <th class="stt_cart_header"></th>
                                    <th class="che-bas-cart-heading-image">&nbsp;</th>
                                    <th class="che-bas-cart-heading-description">&nbsp;&nbsp;SẢN PHẨM</th>
                                    <th class="che-bas-cart-heading-item-price">GIÁ</th>
                                    <th class="che-bas-cart-heading-qty">SỐ LƯỢNG</th>
                                    <th class="che-bas-cart-heading-total-price" style = "padding-left: 28px">TỔNG TIỀN</th>
                                </tr>
                            </tbody>
                            <tbody>
                                <!--BEGINLIST_LISTCART-->
                                <!--BEGIN_LISTCART-->
                                <tr>
                                    <td class="stt_cart">
                                        <input type="checkbox" name="check_cart[]" value="{stt_item}" 
                                               style ="width: 30px; height: 15px; outline:none; ">
                                    </td>
                                    <td class="che-bas-item-image-cell">
                                        <input name="itemIndex_0" type="hidden" value="0">		
                                        <a tabindex="-1" 
                                           href="{linkS}{category}/{product_key}.htm">
                                            <img class="item-img hidden-xs hidden-sm" 
                                                 src="{linkS}upload/product/{product_image}" 
                                                 alt="{product_name}">
                                        </a>
                                    </td>
                                    <td class="che-bas-item-cell" style="padding-right: 10px">
                                        <a class="che-bas-item-name" 
                                           tabindex="-1"
                                           href="{linkS}{category}/{product_key}.htm" 
                                           style = "outline:none">{product_name}
                                        </a>
                                        <ul>	                                                                                        
                                            {color_des}                                                
                                            {type_des}                                                                                            
                                        </ul>
                                    </td>				
                                    <td class="che-bas-item-money">
                                        {price} {price_unit}
                                    </td>
                                    <td class="che-bas-item-so-luong">								
                                        <input  type="text"                                                                                                                                              
                                                size="4" 
                                                maxlength="2" 
                                                class ="form-control"
                                                name="quantity[]" 
                                                value="{quantity}"                                               
                                                style = "-webkit-border-radius: 10px;
                                                -moz-border-radius: 10px;
                                                border-radius: 10px;                                                        
                                                outline:none;                                                                                                                
                                                font-size: 14px;                                            
                                                border: 1px solid #ddd;
                                                font-weight: lighter;                                                        
                                                width:50px;
                                                height:35px;
                                                text-align: center;">                                        
                                        <input type="hidden" name="product_key[]" value="{product_key}"> 
                                        <input type="hidden" name="type[]" value="{type}"> 
                                        <input type="hidden" name="color[]" value="{color}"> 
                                        <input type="hidden" name="prices[]" value="{price}"> 				   
                                        <div class="glo-clr"><!--  --></div>
                                    </td>
                                    <td class="che-bas-item-total">						
                                        {total_one} {price_unit}
                                    </td>
                                </tr>
                                <tr style="display: none; ">
                                    <td colspan="5" 
                                        class="che-bas-item-cell" 
                                        style=" height:15px;
                                        border-top:0px; 
                                        border-bottom:0px; 
                                        padding:0px;">&nbsp;					
                                    </td>
                                    <td class="che-bas-item-price-cell" 
                                        style="border-top:0px; 
                                        border-bottom:0px; 
                                        padding:0px;">&nbsp;					
                                    </td>
                                </tr>
                                <!--END_LISTCART-->
                                <!--ENDLIST_LISTCART-->	
                            </tbody>
                        </table>                                      
                        <div class="row" style="margin-top:20px">
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7"
                                 style="margin-top: 20px">                                
                                <p id = "title_coupon" {display_code_coupon}>
                                    <span style = "font-family:RobotoSlabLight;
                                          font-size: 14px;">
                                        Nhập mã coupon khuyến mãi
                                    </span>
                                </p>
                                <p id = "title_coupon" {display}>
                                    <span style = "font-family:RobotoSlabLight; 
                                          font-size: 14px;
                                          line-height: 22px">
                                        {message_result}
                                    </span>
                                </p>    	        	
                                <div style="float:left; 
                                     margin-right: 72px">
                                    <input type="text" 
                                           id ="code_coupon"
                                           name = "code_coupon"   
                                           oninput="functionOninput();"
                                           class ="form-control"                                            
                                           style = "-webkit-border-radius: 10px;
                                           -moz-border-radius: 10px;
                                           border-radius: 10px;
                                           height: 40px;
                                           outline:none;
                                           padding: 5px;
                                           font-family: RobotoSlabRegular;
                                           font-size: 14px;                                            
                                           border: 1px solid #ddd;
                                           font-weight: lighter;
                                           color: #adadad;
                                           width: 130%"
                                           value = "{coupon_code}"
                                           maxlength="20">
                                </div>                 
                                <div style="float:left">
                                    <input  type="submit"
                                            name="check_coupon"
                                            onclick="myFunctionSubmit();"
                                            class ="check_coupon"
                                            value="Kiểm tra Coupon"
                                            style="-webkit-border-radius: 20px;
                                            -moz-border-radius: 20px;
                                            border-radius: 20px;
                                            outline:none;
                                            float:right;                                                 
                                            background-color: #ff767c;
                                            border: none;
                                            color: #fff;
                                            font-family:PoetsenOne;                                                 
                                            padding: 10px;">
                                </div>
                                <div id="div_order"
                                     style = "float:left; 
                                     margin-top: 20px;
                                     margin-bottom: 50px">
                                    <input type="submit"
                                           class="recycle_bin_empty"
                                           name="deleteItem"                                           
                                           value="Xóa Sản Phẩm"                                           
                                           onclick="return confirmDelete();"
                                           style="-webkit-border-radius: 10px;
                                           -moz-border-radius: 10px;
                                           border-radius: 10px;
                                           color:#ff767c;
                                           font-size: 14px;                                                  
                                           outline:none;
                                           font-family:PoetsenOne;  
                                           padding:6px;
                                           margin-right:3px">
                                    <input class="order"
                                           type="button"                                           
                                           value="Tiếp Tục Mua Hàng"
                                           onclick="window.location = '{linkS}san-pham/'"
                                           style="-webkit-border-radius: 10px;
                                           -moz-border-radius: 10px;
                                           border-radius: 10px;
                                           color:blue;
                                           font-size: 14px;                                                  
                                           outline:none;
                                           font-family:PoetsenOne;  
                                           padding:6px;
                                           margin-right:3px">
                                    <input class="order"                                           
                                           type="button"                                       
                                           value="Đặt Hàng"
                                           onclick="cart_finish_items();"
                                           style="-webkit-border-radius: 10px;
                                           -moz-border-radius: 10px;
                                           border-radius: 10px;
                                           color:#ff767c;
                                           font-size: 14px;                                                  
                                           outline:none;
                                           font-family:PoetsenOne;  
                                           padding:6px">            
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                <div id="che-bas-order-summary-outer">
                                    <div id="che-bas-order-summary-inner" 
                                         style="padding-top: 20px">
                                        <div style="padding-left: 20px">
                                            <span style="width: 50%; display: inline-block">
                                                Thay đổi số lượng hãy :
                                            </span>
                                            <span> 
                                                <input type="submit" 
                                                       name="updateQuan" 
                                                       class ="updateQuan"
                                                       value="Cập nhật số lượng"
                                                       style="-webkit-border-radius: 20px;
                                                       -moz-border-radius: 20px;
                                                       outline:none;
                                                       background-color: #ff767c;
                                                       border: none;
                                                       color: #fff;
                                                       font-family:PoetsenOne;
                                                       border-radius: 20px;
                                                       padding: 10px;">
                                            </span>  
                                        </div>            
                                        <div style="padding-top: 20px; padding-left: 20px">
                                            <span style="width: 50%; display: inline-block">
                                                Tổng số tiền mua hàng :
                                            </span>
                                            <span id="total_money_product"
                                                  style="font-family:RobotoSlabBold">
                                                {total} VNĐ
                                            </span>
                                        </div>					                            
                                    </div>
                                </div>
                            </div>
                        </div>                                                       
                    </form>
                </div>
            </div>
            <div class="cart-main hidden-lg hidden-md">
                <div id="breakcrumb" 
                     style="font-size:14px; 
                     font-family: RobotoSlabRegular;">
                    {breadcrumbs_path}
                </div>
                <div>{sua_don_hang}</div>
                <form action="{linkS}gio-hang" method="post">
                    <!--BEGINLIST_MOBILE_LISTCART-->
                    <!--BEGIN_MOBILE_LISTCART-->
                    <div class="col-xs-12" style="padding:0px; font-family: RobotoSlabRegular">
                        <hr style="background-color: #ff767c">
                        <div class="col-xs-1" style="padding:0px">
                            <input type="checkbox" name="check_cart[]" value="{stt_item}" 
                                   style ="outline:none; ">
                        </div>
                        <div class="col-xs-4 col-sm-3" style="padding:0px">
                            <input name="itemIndex_0" type="hidden" value="0">
                            <a tabindex="-1" href="{linkS}{category}/{product_key}.htm">
                                <img class="img-responsive"
                                     src="{linkS}upload/product/{product_image}" 
                                     alt="{product_name}">
                            </a>
                        </div>
                        <div class="col-xs-7 col-sm-8">
                            <a class="che-bas-item-name" 
                               tabindex="-1"
                               href="{linkS}{category}/{product_key}.htm" 
                               style = "outline:none">{product_name}
                            </a>
                            <ul style="padding:0px">	      
                                {color_des}                                                
                                {type_des}                                                                    
                            </ul>
                            <div>Giá: {price} {price_unit}</div>
                            <div>Số lượng: <input type="text"                                                 
                                                  size="4" 
                                                  maxlength="2" 
                                                  class ="form-control"
                                                  name="quantity[]" 
                                                  value="{quantity}"                        
                                                  style = "-webkit-border-radius: 10px;
                                                  -moz-border-radius: 10px;
                                                  border-radius: 10px;                            
                                                  outline:none;                                               
                                                  font-size: 14px;                                            
                                                  border: 1px solid #ddd;
                                                  font-weight: lighter;                                    
                                                  width:50px;
                                                  height:35px;
                                                  text-align: center;
                                                  display:inline-block;
                                                  font-family: RobotoSlabBold">  
                            </div>
                            <div>Tổng tiền: {total_one} {price_unit}</div>
                        </div>
                        <input type="hidden" name="product_key[]" value="{product_key}"> 
                        <input type="hidden" name="type[]" value="{type}"> 
                        <input type="hidden" name="color[]" value="{color}"> 
                        <input type="hidden" name="prices[]" value="{price}">
                    </div>
                    <!--END_MOBILE_LISTCART-->
                    <!--ENDLIST_MOBILE_LISTCART-->

                    <!--BEGIN TABLET CONFIG-->
                    <div class="col-xs-12" style="padding:0px">
                        <hr style="background-color: #ff767c">
                    </div>
                    <div class="hidden-xs col-sm-6">
                        <p id = "title_coupon" {display_code_coupon}>
                            <span style = "font-family:RobotoSlabLight;
                                  font-size: 14px;">
                                Nhập mã coupon khuyến mãi
                            </span>
                        </p>
                        <p id = "title_coupon" {display}>
                            <span style = "font-family:RobotoSlabLight; 
                                  font-size: 14px;
                                  line-height: 22px">
                                {message_result}
                            </span>
                        </p>    	        	
                        <input type="text" 
                               id ="code_coupon"
                               name = "code_coupon"   
                               oninput="functionOninput();"
                               class ="form-control"                                            
                               style = "-webkit-border-radius: 10px;
                               -moz-border-radius: 10px;
                               border-radius: 10px;
                               height: 40px;
                               outline:none;
                               padding: 5px;
                               font-family: RobotoSlabRegular;
                               font-size: 14px;                                            
                               border: 1px solid #ddd;
                               font-weight: lighter;
                               color: #adadad;
                               width: 50%;
                               display: inline-block;"
                               value = "{coupon_code}"
                               maxlength="20">
                        <input  type="submit"
                                name="check_coupon"
                                onclick="myFunctionSubmit();"
                                class ="check_coupon"
                                value="Kiểm tra Coupon"
                                style="-webkit-border-radius: 20px;
                                -moz-border-radius: 20px;
                                border-radius: 20px;
                                outline:none;
                                background-color: #ff767c;
                                border: none;
                                color: #fff;
                                font-family:PoetsenOne;                                                 
                                padding: 10px;
                                float:right">
                        <div id="div_order"
                             style="float:left; 
                             margin-top: 20px;
                             margin-bottom: 50px">
                            <input type="submit"
                                   class="recycle_bin_empty"
                                   name="deleteItem"                                           
                                   value="Xóa"
                                   onclick="return confirmDelete();"
                                   style="-webkit-border-radius: 10px;
                                   -moz-border-radius: 10px;
                                   border-radius: 10px;
                                   color:#ff767c;
                                   font-size: 14px;                                                  
                                   outline:none;
                                   font-family:PoetsenOne;  
                                   padding:6px;
                                   margin-right:3px">
                            <input class="order"
                                   type="button"                                           
                                   value="Tiếp Tục Mua Hàng"
                                   onclick="window.location = '{linkS}san-pham/'"
                                   style="-webkit-border-radius: 10px;
                                   -moz-border-radius: 10px;
                                   border-radius: 10px;
                                   color:blue;
                                   font-size: 14px;                                                  
                                   outline:none;
                                   font-family:PoetsenOne;  
                                   padding:6px;
                                   margin-right:3px">
                            <input class="order"                                           
                                   type="button"                                       
                                   value="Đặt Hàng"
                                   onclick="cart_finish_items();"
                                   style="-webkit-border-radius: 10px;
                                   -moz-border-radius: 10px;
                                   border-radius: 10px;
                                   color:#ff767c;
                                   font-size: 14px;                                                  
                                   outline:none;
                                   font-family:PoetsenOne;  
                                   padding:6px">            
                        </div>
                    </div>
                    <div class="hidden-xs col-sm-6"
                         style="font-family:RobotoSlabBold;
                         font-size: 15px; 
                         padding: 0px">
                        <span style="width: 50%; 
                              display: inline-block">
                            Thay đổi số lượng hãy :
                        </span>
                        <span> 
                            <input type="submit" 
                                   name="updateQuan" 
                                   class ="updateQuan"
                                   value="Cập nhật số lượng"
                                   style="-webkit-border-radius: 20px;
                                   -moz-border-radius: 20px;
                                   background-color: #ff767c;
                                   border: none;
                                   color: #fff;
                                   font-family:PoetsenOne;
                                   border-radius: 20px;
                                   padding: 10px;">
                        </span>  
                        <span style="width: 50%; display: inline-block; margin-top: 10px">
                            Tổng số tiền mua hàng :
                        </span>
                        <span id="total_money_product" style="margin-left: 10px">
                            {total} VNĐ
                        </span>
                    </div>
                    <!--END TABLET CONFIG-->

                    <!--BEGIN MOBILE CONFIG-->
                    <div class="hidden-sm">
                        <p id = "title_coupon" {display_code_coupon}>
                            <span style = "font-family:RobotoSlabLight;
                                  font-size: 14px;">
                                Nhập mã coupon khuyến mãi
                            </span>
                        </p>
                        <p id = "title_coupon" {display}>
                            <span style = "font-family:RobotoSlabLight; 
                                  font-size: 14px;
                                  line-height: 22px">
                                {message_result}
                            </span>
                        </p>                
                        <input type="text" 
                               id ="code_coupon"
                               name = "code_coupon"   
                               oninput="functionOninput();"
                               class ="form-control"                                            
                               style = "-webkit-border-radius: 10px;
                               -moz-border-radius: 10px;
                               border-radius: 10px;
                               height: 35px;
                               outline:none;
                               padding: 5px;
                               font-family: RobotoSlabRegular;
                               font-size: 14px;                                            
                               border: 1px solid #ddd;
                               font-weight: lighter;
                               color: #adadad;
                               width: 50%;
                               display: inline-block;"
                               value = "{coupon_code}"
                               maxlength="20">
                        <input  type="submit"
                                name="check_coupon"
                                onclick="myFunctionSubmit();"
                                class ="check_coupon"
                                value="Kiểm tra Coupon"
                                style="-webkit-border-radius: 20px;
                                -moz-border-radius: 20px;
                                border-radius: 20px;
                                outline:none;
                                background-color: #ff767c;
                                border: none;
                                color: #fff;
                                font-family:PoetsenOne;                                                 
                                padding: 5px;">
                        <div id="div_order"
                             style="float:left; 
                             margin-top: 20px;
                             margin-bottom: 10px">
                            <input type="submit"
                                   class="recycle_bin_empty"
                                   name="deleteItem"                                           
                                   value="Xóa"
                                   onclick="return confirmDelete();"
                                   style="-webkit-border-radius: 10px;
                                   -moz-border-radius: 10px;
                                   border-radius: 10px;
                                   color:#ff767c;
                                   font-size: 14px;                                                  
                                   outline:none;
                                   font-family:PoetsenOne;  
                                   padding:6px;
                                   margin-right:3px">
                            <input class="order"
                                   type="button"                                           
                                   value="Mua Hàng"
                                   onclick="window.location = '{linkS}san-pham/'"
                                   style="-webkit-border-radius: 10px;
                                   -moz-border-radius: 10px;
                                   border-radius: 10px;
                                   color:blue;
                                   font-size: 14px;                                                  
                                   outline:none;
                                   font-family:PoetsenOne;  
                                   padding:6px;
                                   margin-right:3px">
                            <input class="order"                                           
                                   type="button"                                       
                                   value="Đặt Hàng"
                                   onclick="cart_finish_items();"
                                   style="-webkit-border-radius: 10px;
                                   -moz-border-radius: 10px;
                                   border-radius: 10px;
                                   color:#ff767c;
                                   font-size: 14px;                                                  
                                   outline:none;
                                   font-family:PoetsenOne;  
                                   padding:6px">            
                        </div>
                    </div>
                    <div class="hidden-sm"
                         style="font-family:RobotoSlabBold;
                         font-size: 15px; 
                         padding: 0px;
                         margin-top: 80px;
                         margin-bottom: 30px">
                        <span style="width: 50%; display: inline-block;">
                            Tổng số tiền hàng:
                        </span>
                        <span id="total_money_product" style="margin-left: 10px">
                            {total} VNĐ
                        </span>
                        <span style="width: 50%; 
                              display: inline-block;
                              margin-top: 20px">
                            Thay đổi số lượng:
                        </span>
                        <span> 
                            <input type="submit" 
                                   name="updateQuan" 
                                   class ="updateQuan"
                                   value="Cập nhật số lượng"
                                   style="-webkit-border-radius: 20px;
                                   -moz-border-radius: 20px;
                                   background-color: #ff767c;
                                   border: none;
                                   color: #fff;
                                   font-family:PoetsenOne;
                                   border-radius: 20px;
                                   padding: 5px;">
                        </span>  
                    </div>
                    <!--END MOBILE CONFIG-->                      
                </form>
            </div>    
        </div> <!--END COL 12-->
    </div> <!--END ROW-->          
</div>

<script type="text/javascript">
    function submitformDetele(formname) {
        document.forms[formname].submit();
    }
    function checkAll() {
        $('#check_all').click(function () {
            $("input[type=checkbox]").each(function () {
                if (this.checked === true) {
                    $("input[type=checkbox]").attr('checked', 'checked');
                } else {
                    $("input[type=checkbox]").attr('checked', false);
                }
            });
        });
    }
    function confirmDelete() {
        return confirm("Bạn muốn xóa sản phẩm?");
    }
</script>
