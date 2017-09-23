<script>
    function checkSubmitForm() {
        document.getElementById("email").required = true;
        if (document.getElementById('email').value === "") {
            document.getElementById('email').setCustomValidity('Vui lòng địa chỉ email!');
        } else {
            document.getElementById('email').setCustomValidity('');
        }
    }
    function checkSubmitFormRePass() {
        document.getElementById("new_pass").required = true;
        if (document.getElementById('new_pass').value === "") {
            document.getElementById('new_pass').setCustomValidity('Vui lòng mật khẩu mới!');
        } else {
            document.getElementById('new_pass').setCustomValidity('');
            document.getElementById("replay_new_pass").required = true;
            if (document.getElementById('replay_new_pass').value === "") {
                document.getElementById('replay_new_pass').setCustomValidity('Vui lòng xác nhận lại mật khẩu!');
            } else {
                document.getElementById('replay_new_pass').setCustomValidity('');
            }
        }
    }
    function myKeyDown() {
        document.getElementById('email').setCustomValidity('');
        document.getElementById('replay_new_pass').setCustomValidity('');
        document.getElementById('new_pass').setCustomValidity('');
    }
</script> 
<div class="container">
    <div class ="row">
        <div class ="col-sx-12 col-sm-12 col-md-12 col-lg-12" 
             style="padding-left: 50px">
            <div id="breakcrumb"
                 style="font-family: RobotoSlabRegular;
                 margin-top: 30px">
                {breadcrumbs_path}
            </div> 
            <div style="padding-top: 20px; 
                 padding-bottom: 10px">
                <div style="text-align: center">
                    <div style="color: #2A1FFF; 
                         font-size:17px;
                         font-family:RobotoSlabRegular">
                        KHÔI PHỤC MẬT KHẨU
                    </div>
                </div>
            </div>
            <form method="post" 
                  name="forgotpass">	
                <div style="font-family: RobotoSlabLight; 
                     text-align: center; 
                     line-height: 25px; 
                     font-size:14px;">
                    <div style="margin-bottom: 5px">
                        <span style="color:red; font-family: RobotoSlabLight; ">
                            {msg}
                        </span>
                    </div>
                    <div {display}>
                        <span>
                            Nếu bạn quên mật khẩu, hãy điền email của bạn vào ô bên dưới và nhấn lấy lại mật khẩu.
                            <br/>Bạn sẽ nhận được link kích hoạt lại mật khẩu.
                        </span>
                    </div>          
                    <div {display}>   
                        <div style="float:left; 
                             line-height: 40px; 
                             margin-right: 10px;
                             margin-bottom: 20px; 
                             margin-top: 20px"
                             class="col-md-offset-3 col-lg-offset-3">
                            Email: 
                        </div>
                        <div style="float:left; margin-right: 20px">                            
                            <input  type="text" 
                                    id="email"
                                    name="email"                                    
                                    maxlength="50"
                                    class="form-control"
                                    onkeydown="myKeyDown();"
                                    style ="-webkit-border-radius: 15px;
                                    -moz-border-radius: 15px;
                                    border-radius: 15px;
                                    height: 40px;
                                    outline:none;
                                    padding: 5px;
                                    font-family: RobotoSlabRegular;
                                    font-size: 14px;
                                    border: 1px solid #ddd;
                                    font-weight: lighter;
                                    color: #adadad;
                                    margin-bottom: 20px; 
                                    margin-top: 20px;
                                    width: 350px"/>
                        </div>
                        <div style="float:left;">                            
                            <input  type="submit"                                      
                                    value="Lấy lại mật khẩu" 
                                    name="forgot"
                                    onclick="checkSubmitForm();"
                                    style="-webkit-border-radius: 20px;
                                    -moz-border-radius: 20px;
                                    border-radius: 20px;
                                    outline:none;
                                    float:right;
                                    background-color: #ff767c;
                                    border: none;
                                    color: #fff;
                                    font-family:PoetsenOne;
                                    padding: 10px; 
                                    margin-bottom: 20px; 
                                    margin-top: 20px"/>
                        </div>                        
                    </div>
                    <div {display_2}>
                        <div style="color: royalblue;">
                            Chào, {user_name}
                        </div>
                        <div style="clear:both;
                             padding-bottom: 50px; 
                             margin-top: 20px;"
                             class="col-md-offset-3 col-lg-offset-3">
                            <div style="float:left;                                         
                                 line-height: 40px;
                                 text-align: left"
                                 class="col-lg-2">
                                Mật khẩu mới:  
                            </div>
                            <div style="float:left;"> 
                                <input type="password" 
                                       id="new_pass"
                                       class="form-control"
                                       onkeydown="myKeyDown();"
                                       name="new_pass"
                                       maxlength="20"
                                       style ="-webkit-border-radius: 15px;
                                       -moz-border-radius: 15px;
                                       border-radius: 15px;
                                       height: 40px;
                                       outline:none;
                                       padding: 5px;
                                       font-family: RobotoSlabRegular;
                                       font-size: 14px;
                                       border: 1px solid #ddd;
                                       font-weight: lighter;
                                       color: #adadad;                                                                                                
                                       width: 280px"/>
                            </div>
                        </div>
                        <div style="clear:both" 
                             class="col-md-offset-3 col-lg-offset-3">
                            <div style="float:left;                                         
                                 line-height: 40px;
                                 text-align: left"
                                 class="col-lg-2"> 
                                Xác nhận lại: 
                            </div>
                            <div style="float:left;">
                                <input  type="password"
                                        id="replay_new_pass"
                                        name="replay_new_pass"
                                        maxlength="20"
                                        onkeydown="myKeyDown();"
                                        class= "form-control"
                                        style= "-webkit-border-radius: 15px;
                                        -moz-border-radius: 15px;
                                        border-radius: 15px;
                                        height: 40px;
                                        outline:none;
                                        padding: 5px;
                                        font-family: RobotoSlabRegular;
                                        font-size: 14px;
                                        border: 1px solid #ddd;
                                        font-weight: lighter;
                                        color: #adadad;                                                                                                
                                        width: 280px"/>
                            </div>                            
                        </div>                         
                        <div style="clear:both">
                            <input type="submit"  
                                   onclick="checkSubmitFormRePass();"
                                   value="Cập nhật mật khẩu" 
                                   name="update_password"
                                   style="-webkit-border-radius: 20px;
                                   -moz-border-radius: 20px;
                                   border-radius: 20px;
                                   outline:none;                                           
                                   background-color: #ff767c;
                                   border: none;
                                   color: #fff;
                                   font-family:PoetsenOne;
                                   padding: 10px; 
                                   margin-bottom: 20px; 
                                   margin-top: 20px"/>                       
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>        
</div><!-- end product -->