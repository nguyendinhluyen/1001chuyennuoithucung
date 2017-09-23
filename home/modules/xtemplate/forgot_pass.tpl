<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div> 
    <div class="news_main" style="padding-top: 30px;">

        <div align="center" style="padding: 20px;
             width:550px;
             border:1px solid #D4D4D4;
             border-radius:15px 15px 15px 15px;
             background: papayawhip">
            <div class="bold-grey" style="padding-top: -90px; color: #2A1FFF; font-size:17px; font-weight:bold">KHÔI PHỤC MẬT KHẨU</div><br/>
            <form method="post" name="forgotpass" >	    
                <table border = "0">
                    <tr> 	
                        <td colspan="2">
                            <font color="red">
                            <b style="font-size:13px;">{msg}</b></font>
                        </td>	
                    </tr>            
                    <tr {display}> 
                        <td colspan="3">Nếu bạn quên mật khẩu, hãy điền email của bạn vào ô bên dưới và nhấn lấy lại mật khẩu.</br> Bạn sẽ nhận được mail thông qua link kích hoạt xác nhận lấy lại mật khẩu</td>
                    </tr>
                    <tr {display}>
                        <td style="padding-top: 20px">
                            <div style="font-size: 12px; color: royalblue">Email : &nbsp; </div>
                        </td>
                        <td style="padding-top: 20px" width="300px">
                            <input type="text" 
                                   id="email" 
                                   name="email" 
                                   style="width: 340px"
                                   maxlength="50"/></td>
                        <td style="vertical-align:middle;padding-top: 20px"> &nbsp;&nbsp;
                            <input type="submit"  
                                   style="color: royalblue" 
                                   value="Lấy lại mật khẩu" 
                                   name="forgot"/>
                        </td>
                    </tr>                  	    	
                </table>  
                <table {display_2}>
                    <tr {display_2}>
                        <td colspan="2" style="padding-top: 10px">
                            <div style="font-size: 12px; color: royalblue">
                                Chào, {user_name}
                            </div>
                            <br>
                        </td>
                        </td>    
                    </tr>
                    <tr {display_2}> 				            
                        <td style="padding-top: 10px">
                            <div style="font-size: 12px; 
                                 color: royalblue;
                                 width: 100px">
                                Mật khẩu mới 
                            </div>
                        </td>                
                        <td>
                            :&nbsp;&nbsp;<input style="padding-top: 10px;width: 200px" 
                                                type="password" 
                                                id="new_pass" 
                                                name="new_pass" 
                                                maxlength="20"/></td>
                        </td>                
                    </tr>
                    <tr {display_2}> 				
                        <td style="padding-top: 10px">
                            <div style="font-size: 12px; 
                                 color: royalblue;
                                 width: 100px">
                                Nhập lại mật khẩu
                            </div>
                        </td>                
                        <td>
                            :&nbsp;&nbsp;<input style="padding-top: 10px; width: 200px" 
                                                type="password" 
                                                id="replay_new_pass" 
                                                name="replay_new_pass" 
                                                maxlength="20"/></td>
                        </td> 
                        <td style="vertical-align:middle;"> &nbsp;&nbsp;
                            <input style = "padding-top:5px; padding-bottom:5px;color: royalblue"
                                   type="submit"  
                                   value="Cập nhật mật khẩu" 
                                   name="update_password"/>
                        </td>              
                    </tr>          
                </table>
            </form>
        </div>

    </div><!-- end product_main -->
</div><!-- end product -->