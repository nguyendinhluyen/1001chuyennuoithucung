<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script src="../jscript/jQColorPicker/jquery.js" type="text/javascript"></script>
<script src="../jscript/jQColorPicker/ifx.js" type="text/javascript"></script>
<script src="../jscript/jQColorPicker/idrop.js" type="text/javascript"></script>
<script src="../jscript/jQColorPicker/idrag.js" type="text/javascript"></script>
<script src="../jscript/jQColorPicker/iutil.js" type="text/javascript"></script>
<script src="../jscript/jQColorPicker/islider.js" type="text/javascript"></script>
<script src="../jscript/jQColorPicker/color_picker/color_picker.js" type="text/javascript"></script>
<link href="../jscript/jQColorPicker/color_picker/color_picker.css" rel="stylesheet" type="text/css">
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<div class = "title" style='text-indent:10px'>{title}</div>
<div id = "content_con" style='padding-left:5px'>
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <!---General config--->
        <div id='config_right'>
            <div style='float:left;'>
                <div class='conf_title'>Cấu hình chung</div>
                <hr style='border:1px #ccc solid'>
            </div>
            <div style="clear:both; padding-top: 20px">
                <b>Banner chính</b>
            </div>
            <div class ='err'>{error}</div>
            <table>
                <tr>
                    <td>                                                                      
                        <label>  Banner 1</label>                      
                        <div style="margin-top: 20px">
                            <a href="?show=config&action=del&id=banner_1" 
                               onclick="return confirm('Bạn muốn xóa Banner 1?');"> 
                                <b style="text-align:center; color:#00F">Xóa</b></a>
                        </div>
                    </td>
                    <td style="padding-right:20px; padding-top: 40px">                                                                      
                        <img src="../../layout/images/logo/banner/{banner_1}" width="305" 
                             height="90"/>
                        <div align="center">
                            {banner_1}
                        </div>
                        <p align="center">
                            <input type = 'text'
                                   name = 'href_banner' 
                                   class ='fieldinput' 
                                   value ='{href_banner}'
                                   placeholder = "Đường dẫn banner 1">
                        </p>
                    </td>
                    <td>
                        <input type = 'file' name = 'banner_1'/> 
                    </td>
                </tr>   
                <tr>
                    <td>                       
                        <label>  Banner 2</label>
                        <div style="margin-top: 20px">
                            <a href="?show=config&action=del&id=banner_2" 
                               onclick="return confirm('Bạn muốn xóa Banner 2?');"> 
                                <b style="text-align:center; color:#00F">Xóa</b></a>
                        </div>
                    </td>
                    <td style="padding-right:20px; padding-top: 40px">                                                                      
                        <img src="../../layout/images/logo/banner/{banner_2}" width="305" 
                             height="100"/>
                        <div align="center">
                            {banner_2}
                        </div>
                        <p align="center">
                            <input type = 'text' 
                                   name = 'href_banner_2' 
                                   class ='fieldinput' 
                                   value ='{href_banner_2}'
                                   placeholder = "Đường dẫn banner 2">
                        </p>
                    </td>
                    <td>                       
                        <input type = 'file' name = 'banner_2'/> 
                    </td>
                </tr>
                <tr>
                    <td>                                                                      
                        <label>  Banner 3</label>                      
                        <div style="margin-top: 20px">
                            <a href="?show=config&action=del&id=banner_3" 
                               onclick="return confirm('Bạn muốn xóa Banner 3?');"> 
                                <b style="text-align:center; color:#00F">Xóa</b></a>
                        </div>
                    </td>
                    <td style="padding-right:20px; padding-top: 40px">                                                                      
                        <img src="../../layout/images/logo/banner/{banner_3}" width="305" 
                             height="100"/>
                        <div align="center">
                            {banner_3}
                        </div>
                        <p align="center">
                            <input type = 'text' 
                                   name = 'href_banner_3' 
                                   class ='fieldinput' 
                                   value ='{href_banner_3}'
                                   placeholder = "Đường dẫn banner 3">
                        </p>
                    </td>
                    <td>
                        <input type = 'file' name = 'banner_3'/>
                    </td>
                </tr>  
                <tr>
                    <td>                                                                      
                        <label>  Banner 4</label>                      
                        <div style="margin-top: 20px">
                            <a href="?show=config&action=del&id=banner_4" 
                               onclick="return confirm('Bạn muốn xóa Banner 4?');"> 
                                <b style="text-align:center; color:#00F">Xóa</b></a>
                        </div>
                    </td>
                    <td style="padding-right:20px; padding-top: 40px">                                                                      
                        <img src="../../layout/images/logo/banner/{banner_4}" width="305"
                             height="100"/>
                        <div align="center">
                            {banner_4}
                        </div>
                        <p align="center">
                            <input type = 'text' 
                                   name = 'href_banner_4' 
                                   class ='fieldinput' 
                                   value ='{href_banner_4}'
                                   placeholder = "Đường dẫn banner 4">
                        </p>
                    </td>
                    <td>
                        <input type = 'file' name = 'banner_4'/> 
                    </td>
                </tr> 
                <tr>
                    <td>                                                                      
                        <label>  Banner 5</label>
                        <div style="margin-top: 20px">
                            <a href="?show=config&action=del&id=banner_5" 
                               onclick="return confirm('Bạn muốn xóa Banner 5?');"> 
                                <b style="text-align:center; color:#00F">Xóa</b></a>
                        </div>
                    </td>
                    <td style="padding-right:20px; padding-top: 40px">                                                                      
                        <img src="../../layout/images/logo/banner/{banner_5}" width="305"
                             height="100"/>
                        <div align="center">
                            {banner_5}
                        </div>
                        <p align="center">
                            <input type = 'text' 
                                   name = 'href_banner_5' 
                                   class ='fieldinput' 
                                   value ='{href_banner_5}'
                                   placeholder = "Đường dẫn banner 5">
                        </p>
                    </td>
                    <td>
                        <input type = 'file' name = 'banner_5'/> 
                    </td>
                </tr> 
            </table>

            <!--Banner library-->
            <p>
                <label><b>Banner trái thư viện 1</b></label>
            </p>
            <div class ='err'>{error_1}</div>
            </br>
            <table>
                <tr>
                    <td>                                                                      
                        <label>Banner left 1</label>
                        </br>
                        </br>
                       	<a href="?show=config&action=del&id=banner_left_1_1" onclick="return confirm('Bạn muốn xóa Banner left 1?');"> 
                            <b style="text-align:center; color:#00F">Xóa</b></a>
                    </td>
                    <td style="padding-right:20px">                                                                      
                        <img src="../../layout/images/logo/banner_left_1/{banner_left_1_1}" width="100" 
                             height="200"/>
                        <p align="center">
                            {banner_left_1_1}
                        </p>
                    </td>
                    <td>
                        <input type = 'file' name = 'banner_left_1_1'/> 
                    </td>
                </tr>   
                <tr> 
                    <td>                       
                        <label>Banner left 2</label>  
                        </br>
                        </br>
                       	<a href="?show=config&action=del&id=banner_left_1_2" onclick="return confirm('Bạn muốn xóa Banner left 2?');"> 
                            <b style="text-align:center; color:#00F">Xóa</b></a>                      
                    </td>
                    <td style="padding-right:20px">                                                                      
                        <img src="../../layout/images/logo/banner_left_1/{banner_left_1_2}" width="100" 
                             height="200"/>
                        <p align="center">
                            {banner_left_1_2}
                        </p>
                    </td>
                    <td>                       
                        <input type = 'file' name = 'banner_left_1_2'/> 
                    </td>
                </tr>
                <tr> 
                    <td>                       
                        <label>Banner left 3</label>                        
                        </br>
                        </br>
                       	<a href="?show=config&action=del&id=banner_left_1_3" onclick="return confirm('Bạn muốn xóa Banner left 3?');"> 
                            <b style="text-align:center; color:#00F">Xóa</b></a>
                    </td>

                    <td style="padding-right:20px">                                                                      
                        <img src="../../layout/images/logo/banner_left_1/{banner_left_1_3}" width="100" 
                             height="200" />
                        <p align="center">
                            {banner_left_1_3}
                        </p>
                    </td>

                    <td>                       
                        <input type = 'file' name = 'banner_left_1_3'/> 
                    </td>

                </tr>
                <tr> 
                    <td>                       
                        <label>Banner left 4</label> 
                        </br>
                        </br>
                       	<a href="?show=config&action=del&id=banner_left_1_4" onclick="return confirm('Bạn muốn xóa Banner left 4?');"> 
                            <b style="text-align:center; color:#00F">Xóa</b></a>                       
                    </td>
                    <td style="padding-right:20px">                                                                      
                        <img src="../../layout/images/logo/banner_left_1/{banner_left_1_4}" width="100" 
                             height="200" />
                        <p align="center">
                            {banner_left_1_4}
                        </p>
                    </td>
                    <td>                       
                        <input type = 'file' name = 'banner_left_1_4'/> 
                    </td>
                </tr>
                <tr> 
                    <td>                       
                        <label>Banner left 5</label>   
                        </br>
                        </br>
                       	<a href="?show=config&action=del&id=banner_left_1_5" onclick="return confirm('Bạn muốn xóa Banner left 5?');"> 
                            <b style="text-align:center; color:#00F">Xóa</b></a>                     
                    </td>
                    <td style="padding-right:20px">                                                                      
                        <img src="../../layout/images/logo/banner_left_1/{banner_left_1_5}" width="100" 
                             height="200"/>
                        <p align="center">
                            {banner_left_1_5}
                        </p>
                    </td>
                    <td>                      
                        <input type = 'file' name = 'banner_left_1_5'/>
                    </td>
                </tr>
            </table>

            <!--<p>
                <label><b>Banner trái thư viện 2</b></label>
            </p>	  
            <div class ='err'>{error_2}</div>	
            </br>
            <table>
                <tr>
                    <td>                                                                      
                        <label>Banner left 1</label>
                        </br>
                        </br>
                       	<a href="?show=config&action=del&id=banner_left_2_1" onclick="return confirm('Bạn muốn xóa Banner left 1?');"> 
                            <b style="text-align:center; color:#00F">Xóa</b></a>       
                    </td>
                    <td style="padding-right:20px">                                                                      
                        <img src="../../layout/images/logo/banner_left_2/{banner_left_2_1}" width="100" 
                             height="200"/>
                        <p align="center">
            {banner_left_2_1}
        </p>
    </td>
    <td>
        <input type = 'file' name = 'banner_left_2_1'/> 
    </td>
</tr>   
<tr> 
    <td>                       
        <label>Banner left 2</label>
        </br>
        </br>
        <a href="?show=config&action=del&id=banner_left_2_2" onclick="return confirm('Bạn muốn xóa Banner left 2?');"> 
            <b style="text-align:center; color:#00F">Xóa</b></a>                           
    </td>
    <td style="padding-right:20px">                                                                      
        <img src="../../layout/images/logo/banner_left_2/{banner_left_2_2}" width="100" 
             height="200"/>
        <p align="center">
            {banner_left_2_2}
        </p>
    </td>
    <td>                       
        <input type = 'file' name = 'banner_left_2_2'/> 
    </td>
</tr>
<tr> 
    <td>                       
        <label>Banner left 3</label> 
        </br>
        </br>
        <a href="?show=config&action=del&id=banner_left_2_3" onclick="return confirm('Bạn muốn xóa Banner left 3?');"> 
            <b style="text-align:center; color:#00F">Xóa</b></a>                          
    </td>
    <td style="padding-right:20px">                                                                      
        <img src="../../layout/images/logo/banner_left_2/{banner_left_2_3}" width="100" 
             height="200"/>
        <p align="center">
            {banner_left_2_3}
        </p>
    </td>
    <td>                       
        <input type = 'file' name = 'banner_left_2_3'/> 
    </td>
</tr>
<tr> 
    <td>                       
        <label>Banner left 4</label> 
        </br>
        </br>
        <a href="?show=config&action=del&id=banner_left_2_4" onclick="return confirm('Bạn muốn xóa Banner left 4?');"> 
            <b style="text-align:center; color:#00F">Xóa</b></a>                          
    </td>
    <td style="padding-right:20px">                                                                      
        <img src="../../layout/images/logo/banner_left_2/{banner_left_2_4}" width="100" 
             height="200"/>
        <p align="center">
            {banner_left_2_4}
        </p>
    </td>
    <td>                       
        <input type = 'file' name = 'banner_left_2_4'/> 
    </td>
</tr>
<tr> 
    <td>                       
        <label>Banner left 5</label>                        
        </br>
        </br>
        <a href="?show=config&action=del&id=banner_left_2_5" onclick="return confirm('Bạn muốn xóa Banner left 5?');"> 
            <b style="text-align:center; color:#00F">Xóa</b></a>   
    </td>
    <td style="padding-right:20px">                                                                      
        <img src="../../layout/images/logo/banner_left_2/{banner_left_2_5}" width="100" 
             height="200"/>
        <p align="center">
            {banner_left_2_5}
        </p>
    </td>
    <td>                      
        <input type = 'file' name = 'banner_left_2_5'/>
    </td>
</tr>
</table>-->

            <p>
                <label><b>Email</b><br><span>Email này dùng để nhận thông tin góp ý từ người dùng , và dùng mail này để gởi thông tin đến người dùng</span></label><input type = 'text' name = 'mail_admin' class ='fieldinput' value ='{mail_admin}'>
            </p>

            <!--<p>
                <label><b>Rss</b><br><span>Tin tức RSS sẽ được lấy từ địa chỉ này</span></label><input type = 'text' name = 'rss' class ='fieldinput' value ='{rss}'>
            </p>-->
            <div style="float:left">
                </br>
                <label style="width:350px;float:left"><b>{colorweb}</b><br><span style="font-style:italic;color:#4D4040";>Làm mới web bằng cách thay đổi màu nền theo ý thích của bạn</span></label>
                <div style="float:left;width:65px;display:block">
                    <input type="text" name = "myhexcode" id="myhexcode" value = "{myhexcode}" style="width:60px;" readonly>
                </div>
                <div style="float:left">
                    <a href="javascript:void(0);" rel="colorpicker&objcode=myhexcode&objshow=myshowcolor&showrgb=1&okfunc=myokfunc" style="text-decoration:none;" ><div id="myshowcolor" style="width:60px;height:20px;border:1px solid black;{background}">&nbsp;</div></a></div>
                <script language="Javascript">
                    //init colorpicker:
                    $(document).ready(
                            function ()
                            {
                                $.ColorPicker.init();
                            }
                    );
                </script>
            </div>
            <div class ='clear'></div>
            <p>
                </br><label><b>Chống spam</b><br><span>Khi bật chức năng này webiste bạn sẽ được bảo vệ chống spam</span></label><input type = 'checkbox' name = 'cbspam' {checked_spam}>			
            </p>
            <div style='float:left'>
                </br>
                <div class='conf_title'>Cấu hình mail server</div>
                <hr style='border:1px #ccc solid'>
            </div>
            <div class ='clear'></div>
            <p>
                <label><b>Mail host</b> <br><span>Change this variable to the address of the SMTP server to relay, like "smtp.myisp.com"</span></label><input type = 'text' name = 'txtmailhost' class ='fieldinput' value ='{txtmailhost}'>
            </p>

            <p>
                <label><b>Mail Port</b> <br><span></span></label><input type = 'text' name = 'mail_port' class ='fieldinput' value ='{mail_port}'>
            </p>

            <p>
                <label><b>Mail user</b> <br><span>Set to the user name if the server requires authetication</span></label><input type = 'text' name = 'txemail' class ='fieldinput' value ='{txemail}'>
            </p>
            <p>
                <label><b>Password</b> <br><span>Set to the authetication password</span></label><input type = 'password' name = 'txtpassword' class ='fieldinput' value ='{txtpassword}'>
            </p>
            <p>
                <label><b>Giởi thiệu NanaPet (thẻ h1)</b> </label>
            </p>
            <textarea name="introduce" 
                      style='height:70px; width: 650px'
                      placeholder="Giới thiệu trang web">{introduce}</textarea>
            <div class ='clear'></div>
            <!--<div style='float:left'>
                    <div class='conf_title'>Cấu hình giao diện web</div>
                    <hr style='border:1px #ccc solid'>
            </div>
            <div class='clear'></div>
                    <p style='height:80px'>
                            <label><b>Header</b><br><span>Nơi bạn có thể đặt thêm các thuộc tính cho webite để làm web mình sinh động hơn</span> </label><textarea class='fieldinput' name="header" style='height:70px'>{header}</textarea>
                    </p>

                    <p style='height:80px'>
                            <label><b>Body</b><br><span>Nơi thực thi các đoạn mã bạn vừa đặt trên thẻ header</span> </label><textarea name="body" class='fieldinput' style='height:70px'>{body}</textarea>
                    </p>
            </div>-->
            <p>
                <input class = "button" 
                       type = "submit" 
                       name = "btnSub" 
                       value = "Lưu thông tin" 
                       style="margin-top: 20px"/>
            </p>
            <br/>
    </form>
</div>