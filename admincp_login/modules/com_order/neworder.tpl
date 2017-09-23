<script language=JavaScript src='../jscript/common.js'></script>
<script>
    function function_SameReceiver()
    {
        var checkbox_receiver = document.getElementById("checkbox_same_receiver");
        var name_receiver = document.getElementById("name_receiver");
        var address_receiver = document.getElementById("address_receiver");
        var phone_receiver = document.getElementById("phone_receiver");
        if (checkbox_receiver.checked == true)
        {
            var name = document.getElementById("name");
            name_receiver.value = name.value;
            var address = document.getElementById("address");
            address_receiver.value = address.value;
            var phone = document.getElementById("phone");
            phone_receiver.value = phone.value;
        } else
        {
            name_receiver.value = "";
            address_receiver.value = "";
            phone_receiver.value = "";
        }

    }

    function listbox_change_address_buy()
    {
        var selected_address = document.getElementById("list_address");
        var text_selected_address = selected_address.options[selected_address.selectedIndex].text;
        var address_receiver = document.getElementById("address_receiver");
        address_receiver.value = text_selected_address;
    }
</script>

<div class = "title" style ="text-indent:10px">Thêm hóa đơn</div>
<form method="post">
    <table border="0">

        <tr>
            <td colspan="3">
                <b style="font-size:20px; margin-left:3px">Thêm hóa đơn</b>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <b style="font-size:15px; margin-left:3px">Người mua</b>
            </td>

        </tr>

        <tr>
            <td>
            </td>
            <td  style="width:130px">
                Họ tên: 
            </td>
            <td>
                <input type="text" name="name" id="name"  value="{name}" style = "width:350px"/>&nbsp; 
            </td>

        </tr>

        <tr>
            <td>
            </td>
            <td>
                Email:
            </td>
            <td>
                <input type="text" name="email" id="email" value="{email}" style = "width:350px"/>
            </td>

        </tr>

        <tr>
            <td>
            </td>
            <td>
                Địa chỉ:
            </td>
            <td>
                <input type="text" name="address" id="address" value="{address}" style = "width:350px"/>
            </td>

        </tr>

        <tr>
            <td>
            </td>
            <td>
                Điện thoại:
            </td>
            <td>
                <input type="text" name="phone" id="phone" value="{phone}" style = "width:350px"/>
            </td>

        </tr>

        <!--<tr>
                <td>
                </td>
                <td>
                Fax:
                </td>
                <td>
                        <input type="text" name="fax" value="{fax}" style = "width:350px"/>
                </td>
                
        </tr>-->

        <tr>		
            <td colspan="3">			
                <b style="font-size:15px; margin-left:3px">Người nhận</b></br></br>           
                <input type="checkbox" name="checkbox_same_receiver" id = "checkbox_same_receiver" checked onclick ="function_SameReceiver()">Giống người mua</input>
            </td>
        </tr>

        <tr>
            <td>
            </td>
            <td  style="width:70px">
                Họ tên: 
            </td>
            <td>
                <input type="text" name="name_receiver" id="name_receiver" value="{name_receiver}" style = "width:350px"/>&nbsp; 
            </td>

        </tr>    	

        <tr>		
            <td>		
            </td>
            <td>
                Sổ địa chỉ:
            </td>        
            <td>			
                <div id="div_address_buy" >    	
                    <select id = "list_address" style = "width:355px" onchange="listbox_change_address_buy()">
                        {list_address}                    
                    </select>         
                </div>       
            </td>

        </tr>  
        <tr>		
            <td>		
            </td>
            <td>
                Địa chỉ:
            </td>        
            <td>
                <input type="text" name="address_receiver" id="address_receiver" value="{address_receiver}" style = "width:350px"/>
            </td>

        </tr>

        <tr>
            <td>
            </td>
            <td>
                Điện thoại:
            </td>
            <td>
                <input type="text" name="phone_receiver" id="phone_receiver" value="{phone_receiver}" style = "width:350px"/>
            </td>

        </tr>

        <tr>
            <td colspan="3">
                <b style="font-size:15px; margin-left:3px">Thông tin khác</b></br>
            </td>
        </tr>

        <tr>
            <td>
            </td>
            <td  style="width:120px">
                Phương thức vận chuyển : 
            </td>
            <td>
                <input type="text" name="transport" id="transport" value="Vận chuyển tận nhà" style = "width:350px"/>&nbsp; 
            </td>

        </tr>

        <tr>
            <td>
            </td>
            <td>
                Phí vận chuyển :
            </td>
            <td>
                <input type="text" name="fee" id ="fee" style = " width:350px" value="0" onkeyup="javascript:Money_CheckCorrect('fee');"/>

            </td>

        </tr>

        <tr>
            <td>
            </td>
            <td>
                Phương thức thanh toán :
            </td>
            <td>
                <input type="text" name="cash" id="cash" value="Thanh toán tiền mặt" style = "width:350px"/>
            </td>

        </tr>

        <tr>
            <td>
            </td>
            <td>
            </td>
            <td align="right">
                <input type="submit" style = "width:100px; height:27px; font-size:14px; margin-top:10px; margin-bottom:10px; font-weight:bold" class="button" name="them" value="Thêm" onclick="return confirm('Bạn muốn thêm hóa đơn ?');" /> 
            </td>

        </tr>

    </table>



</form>
<hr/>
<form method="post" name="search">
    <table>
        <tr>
            <td>Họ tên:</td>
            <td><input type="text" name="ten" value="{fax}"></td>
            <td>Email:</td>            
            <td><input type="text" name="thudientu" value="{fax}"></td>
            <td>Số ĐT:</td>            
            <td><input type="text" name="so_DT" value="{fax}" id = "so_DT"></td>            
            <td><input type="submit" class="button" name="tim" value="Tìm" style="width:50px; height:25px; font-size:15px; font-weight:bold"/> </td>
        </tr>
    </table>
</form>

<form method="post" name="searchchon">
    <table width="auto">
        <tr style="background:#D3D3D3">
            <td style="width:300px">Họ tên</td>
            <td style="width:200px">Email</td>
            <td style="width:600px">Địa chỉ</td>
            <td style="width:100px">Điện thoại</td>			
            <td style="width:70px">Chọn</td>		
        </tr>
        <!--BEGINLIST_SEARCH-->
        <!--BEGIN_SEARCH-->
        <tr>
            <td>{hoten}</td>
            <td>{mail}</td>
            <td style="height:50px">{diachi}</td>
            <td>{dienthoai}</td>			
            <td>
                <input type="button" class="button" name="chon" value="Chọn" onclick="window.location = './?show=neworder&id={id_user}'" style="width:70px; height:25px; font-weight:bold; font-size:14px"/>
            </td>
        </tr>
        <!--END_SEARCH-->
        <!--ENDLIST_SEARCH-->
    </table>
</form>

