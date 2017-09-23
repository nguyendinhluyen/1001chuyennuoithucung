<div class="title">{title}</div>
<div style="clear:both"></div>		                
<div class="user_right" style = "float:left; margin-left:5px">				
    <form method='POST' id = "frm" name = "frm" enctype='multipart/form-data'>		                                          
        <div class="newsPersonal updateUser" style="display: block;float:left">
            <div class="top_newsPersonal">
                <div class="ltop_newsPersonal"></div>
                <h2 class="lstitle" style=" margin-bottom:0px;                                                                                                         
                    height:30px; 
                    font-size:20px">
                    Thêm tài khoản khách hàng
                    <span id="hint_update_user"/>
                </h2>
                <p style="color:#F00; font-weight:bold">{error}</p>     
                </br>               
            </div>
            <div class="newsPersonal_inside">
                <div class="group_listing_input" id="group_listing_input">
                    <div class="listing_input">
                        <div class="post_label_container">
                            <label class="postLabel" style="width:120px;">
                                Danh xưng:
                            </label>
                        </div>
                        <select id="item_gender"
                                name="gender"
                                class="sex"
                                style="margin-bottom:10px;">
                            <option value="1">Anh</option>
                            <option value="0">Chị</option>
                        </select>
                    </div>
                    <div class="listing_input">
                        <div class="post_label_container">
                            <label class="postLabel" style="width: 122px;		
                                   margin-bottom:10px">
                                Họ & tên :
                                <span style="color:red"> * </span>
                            </label>
                        </div>
                        <input id="name" 
                               name="name" 
                               type="text" 
                               class="account_text_input required" 
                               style="width:215px; 
                               margin-bottom:10px;"
                               maxlength="70"/>
                    </div>	
                    <div class="listing_input">
                        <div class="post_label_container" style="clear:both">
                            <label class="postLabel" style="margin-bottom:10px;
                                   width:120px">
                                Email: 
                                <span style="color:red"> * </span>
                            </label>
                        </div>
                        <input id="email" 
                               name="email" 
                               type="text" 
                               style="margin-bottom:10px; 
                               margin-left:2px; 
                               width:215px;"
                               maxlength="40"/>                                    	
                    </div>                  
                    <div class="listing_input">
                        <div class="post_label_container">
                            <label class="postLabel" style="margin-bottom:10px; 
                                   width:122px">
                                Điện thoại:
                                <span style="color:red"> * </span>
                            </label>
                        </div>
                        <input id="phone" 
                               name="phone" 
                               type="text" 
                               style = "margin-bottom:10px; 
                               width:215px"/>
                    </div>                                                                                                                                                                                                                                                                                                                                                                             	                                                                                							
                    <div class="listing_input">
                        <label class="postLabel"
                               style="margin-bottom:10px;
                               width: 120px;">
                            Mật khẩu: 
                            <span style="color:red"> * </span>
                        </label>
                        <input id="password" 
                               name="password" 
                               type="password" 
                               style="margin-bottom:10px; 
                               margin-left:2px; 
                               width:215px;"
                               maxlength="50"/>                                           
                    </div>
                    <div class="listing_input">
                        <label class="postLabel"
                               style="margin-bottom:10px;
                               width: 120px;">
                            Nhập lại mật khẩu: 
                            <span style="color:red"> * </span>
                        </label>
                        <input id="repassword" 
                               name="repassword" 
                               type="password" 
                               style="margin-bottom:10px; 
                               margin-left:2px; 
                               width:215px;"
                               maxlength="50"/>                                           
                    </div>

                </div>							                   		
            </div>								                   
            <div class="button_listing_input"
                 style="float:right;
                 margin-top:10px;
                 margin-bottom:20px">
                <input id="cmd_submit_update_user"
                       name="cmd_submit_update_user"
                       class="button_update"
                       value="Thêm tài khoản"
                       type="submit"
                       style="font-size:15px; 
                       font-family:Cambria"/>
            </div>
        </div>
    </form>
</div>


