<!--Su dung de format tien -->
<script language=JavaScript src='../jscript/common.js'></script>
<script>
    // id_number So Thu Tu cua cac checkbox trong he thong
    function function_type(id_number) {
        // Lay thong check box luu tru
        var type_chk = "chkType[]" + id_number;
        chk_type_choose = document.getElementById(type_chk);
        // Lay thong tin doi tuong dc check
        var name_chk = "chkName[]" + id_number;
        chk_name_choose = document.getElementById(name_chk);
        id_product_type = "product_type" + String(id_number);
        var product_type = document.getElementById(id_product_type);
        if (chk_name_choose.checked === true && chk_type_choose.value !== '') {
            // Customize
            type_value = chk_type_choose.value;
            var n_type_value = type_value.split("---");
            product_type.innerHTML = '';
            // So luong loai (1 hop, 10 hop v.v...) cua cung mot san pham
            for (i = 0; i < n_type_value.length; i++) {
                // Dat ten id cho tung radio box rieng biet
                // id bao gom: Thu tu mon + vi tri radio(loai nao) + so luong loai  + Gia loai san pham
                // Lay gia san pham
                var i_price = n_type_value[i];
                string_id_number = String(id_number) + "-" + String(i) + "-" + String(n_type_value.length);
                if (i !== 0) {
                    // Gan gia loai cho tung check box (i_price[1])
                    product_type.innerHTML = product_type.innerHTML + '<b> <input type="radio" id="' + string_id_number + '"' + ' onclick = "function_define_check_box(' + '\'' + string_id_number + '\')"' + 'value = "' + i_price + '"/>' + n_type_value[i].replace('::', ' - ') + '</b></br>';
                } else {
                    // Gan gia loai cho tung check box (i_price)
                    product_type.innerHTML = product_type.innerHTML + '<b> <input type="radio" checked id="' + string_id_number + '"' + ' onclick = "function_define_check_box(' + '\'' + string_id_number + '\')"' + 'value = "' + i_price + '"/>' + n_type_value[i].replace('::', ' - ') + '</b></br>';
                }
            }
        } else {
            type_value = chk_type_choose.value;
            type_value = type_value.replace('::', ' - ');
            var n_type_value = type_value.split("---");
            product_type.innerHTML = n_type_value[0];
            if (chk_type_choose.value !== '') {
                //Quay tra lai gia ban dau khi bo check
                id_text_input_price = "price_pro[]" + String(id_number);
                var text_input_price = document.getElementById(id_text_input_price);
                var i_price = n_type_value[0].split(" - ");
                // Gia
                text_input_price.value = i_price[1];
                // Loai
                id_type_product = "type_product[]" + String(id_number);
                var text_type_product = document.getElementById(id_type_product);
                text_type_product.value = i_price[0];
            }
        }
    }
    function function_define_check_box(id_radio) {
        // Trong moi loai san pham chi cho mot check box duoc chon
        var n_id_radio = id_radio.split("-");
        // n_id_radio[0] = id_number: san pham la san pham nao
        // n_id_radio[1]: thu tu radio (loai) hien tai click
        // n_id_radio[2]: so radio (loai) cua mot san pham
        // n_id_radio[3]: gia radio (loai) cua mot san pham
        for (i = 0; i < parseInt(n_id_radio[2]); i++) {
            id_radio_type = n_id_radio[0] + "-" + i + "-" + n_id_radio[2];
            var radio_type = document.getElementById(id_radio_type);
            if (i !== parseInt(n_id_radio[1])) {
                radio_type.checked = false;
            } else {
                radio_type.checked = true;
                // Lay gia cua san pham								
                // Gan gia cua san pham cho tung text box
                // Can dat ten text box gia trung voi thu tu cua raido: n_id_radio[0] = id_number
                id_text_input_price = "price_pro[]" + String(n_id_radio[0]);
                var text_input_price = document.getElementById(id_text_input_price);
                // Gan gia tri moi khi chon
                var i_price = radio_type.value.split('::');
                text_input_price.value = i_price[1];
                // Gan gia tri loai khi them san pham 
                id_type_product = "type_product[]" + String(n_id_radio[0]);
                var text_type_product = document.getElementById(id_type_product);
                text_type_product.value = i_price[0];
            }
        }
    }
</script>

<div class = "title" style ="text-indent:10px">{detailorder}</div>
<div style="margin:10px">
    <p><b style="font-size:14px"> Người mua </b></p>
    <p style="float:left;width:150px;clear:both">{lagfullname} :</p><b>{fullName}</b><br style="clear:both">
    <p style="float:left;width:150px;clear:both">{lagaddress} :</p><b>{address}</b><br style="clear:both">
    <p style="float:left;width:150px;clear:both">Email :</p><b>{email}</b><br style="clear:both">
    <p style="float:left;width:150px;clear:both">Điện thoại :</p><b>{phone}</b><br style="clear:both">
    <br/>
    <p><b style="font-size:14px"> Người nhận </b></p>
    <p style="float:left;width:150px;clear:both">{lagfullname} :</p><b>{fullNamereceiver}</b><br style="clear:both">
    <p style="float:left;width:150px;clear:both">{lagaddress} :</p><b>{addressreceiver}</b><br style="clear:both">
    <p style="float:left;width:150px;clear:both">Điện thoại :</p><b>{phonereceiver}</b><br style="clear:both">
    <br/>
    <p><b style="font-size:14px"> Thông tin khác </b></p>
    <p style="float:left;width:150px;clear:both">Phương thức vận chuyển :</p><b>{transport}</b><br style="clear:both">
    <p style="float:left;width:150px;clear:both">Phí vận chuyển: </p><b>{feetransport}</b><br style="clear:both">
    <p style="float:left;width:150px;clear:both">Phương thức thanh toán: </p><b>{typeofcash}</b><br style="clear:both">
    <br/>
    <p><b style="font-size:14px"> Đơn hàng </b></p>
</div>
<div style = "float:left">
    <div class = "title" style = 'width:851px'>				
        <div class = "con_title" style = "width:35px" {hidden}>&nbsp;Xóa</div>
        <div class = "con_title" style = "width:35px" {hidden}>&nbsp;Sửa</div>                
        <div class = "con_title" style = "width:280px;text-indent:10px">{lagproductname}</div>
        <div class = "con_title" style = "width:170px">{lagamount}</div>
        <div class = "con_title" style = "width:180px">{lagprice}</div>
        <div class = "con_title" style = "width:150px">{lagtotal}</div>
    </div>
    <div>
        <!--BEGINLIST_CATALOGUE-->
        <!--BEGIN_CATALOGUE-->
        <div {hidden} class = "con_list_con" 
                      style = "width:50px;
                      background-color:{color};
                      height:30px;">
            <a href='./?show=orderdetail&id={id}&action=del&id_sp={id_sp}'>&nbsp;Xóa</a>
        </div>                 
        <div {hidden} class = "con_list_con" style = "width:50px;background-color:{color};height:30px;">
            <a href='./?show=edit_orderdetail&id_sp={id_sp}'>&nbsp;Sửa</a>
        </div>        
        <div class = "con_list_con" style = "width:250px;height:50px;">
            {productName} {productType}
        </div>
        <div class = "con_list_con" style = "width:170px;height:50px;">{quanty}</div>               
        <div class = "con_list_con" style = "width:180px;height:50px;">{price}</div>                
        <div class = "con_list_con" style = "width:150px;height:50px">{total}</div>
        <div class ='clear'></div>
        <!--END_CATALOGUE-->
        <!--ENDLIST_CATALOGUE-->
    </div>			
</div>
<div style="float: right;  
     margin-right: -750px; 
     clear:both; 
     margin-top: 10px">
    <b>Mã coupon: </b>
    <b style="color: red;">{code_coupon}</b>
    <br/>
    <br/>    
    <b>Giảm giá coupon: </b>
    <b style="color: red;">{discount_coupon}</b>
    <br/>    
    <br/>    
    <b>Tổng hóa đơn: </b>
    <b style="color: red;">{tongtien}</b>
    <span style="color:#F00;">
        <b>VNĐ</b>
    </span>
    <br/>    
    <p style="float:left;width:1000px;clear:both;">
    </p>
</div>
<hr style="color:red;"/>

<form name="timkiem">
    <input type="hidden" name="show" value="orderdetail"/>
    <input type="hidden" name="id" value="{order_id}"/>	
    <div style="float:left;width:500px;margin:5px;padding-top:100px">     
        <b>Thêm sản phẩm</b>                      
        <input value = "{name_search}"
               type="text" 
               size="20" 
               name = "searchfield" 
               id="inputString" 
               style="width:200px">	       
        <input type ='submit' 
               value ='Search' 
               class ='button' 
               style="width:70px; 
               height:24px">	               

    </div>
</form>

<form name="listsearch" method="post">    
    <input type="hidden" name="id" value="{order_id}">
    <div style="float:left;width:auto;margin:5px;padding-top:20px">	 
        <table style="width:700px" border="0">            
            {btnsubmit}
            <!--BEGINLIST_PRODUCT-->
            <!--BEGIN_PRODUCT-->            
            <tr>
                <td>
                    <input type="checkbox" 
                           id="chkName[]{i}"
                           name="chkName[]"
                           value="{id_pro}" {functions}/>
                    <input type="checkbox" 
                           hidden="hidden" 
                           value="{p_type}" 
                           id="chkType[]{i}"/>
                </td>
                <td style="width:200px">
                    <b>{name_pro}</b><br/>
                    {mota}
                </td>
                <td>
                    <img alt="" src="../../upload/product/thumb/{image_pro}" width="100px">
                </td>
                <td>
                    <input type="text" name="price_pro[]" 
                           id ="price_pro[]{i}" 
                           value="{price_pro}" 
                           size="8" 
                           onkeyup="javascript:Money_CheckCorrect('price_pro[]{i}');" 
                           style="width:100px">
                    <input type="text" 
                           name="type_product[]" 
                           id ="type_product[]{i}" 
                           hidden="hidden" 
                           value="{type_product}" 
                           size="8"  
                           style="width:100px">
                </td>                
                <td>
                    <input type="text" 
                           name="quantity[]" 
                           id="quantity[]{i}" 
                           value="1" 
                           size="4"
                           onkeyup="javascript:Money_CheckCorrect('quantity[]{i}');" 
                           style = "width:50px"/>
                </td>
                <td width="200px">
                    <span id = "product_type{i}">
                        {product_type}
                    </span>
                </td>                                
            <input type="hidden" name="key_pro[]"  value="{key_pro}">
            <input type="hidden" name="listid[]" value="{id_pro}">
            <input type="hidden" name="name_pro[]" value="{name_pro}">                                                                                
            </tr>
            <!--END_PRODUCT-->
            <!--ENDLIST_PRODUCT-->            
        </table>     

    </div>
</form>
