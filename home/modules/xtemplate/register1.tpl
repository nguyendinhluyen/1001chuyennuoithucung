<link rel="stylesheet" type="text/css" href="{linkS}layout/css/template.css" />
<link rel="stylesheet" type="text/css" href="{linkS}layout/css/jquery-ui-1.8.16.custom.css"/>
<script type="text/javascript" src="{linkS}layout/js/jquery-ui-1.8.16.custom.min.js"></script>
<meta charset="utf-8"/>
<title>Dang ky thanh vien</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"/>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script>
    $(function ()
    {
        $("#birth_day_filed").datepicker({dateFormat: 'dd-mm-yy', 
                                           changeMonth:true, 
                                           changeYear: true});
    });
</script>           
<script language="javascript" type="text/javascript">
    function submitregistration()
    {
        var form = document.adminForm;
        var isvalid = true;

        //Email
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(form.email.value)))
        {
            alert('Vui lòng nhập đúng địa chỉ email.');
            return false;
        }

        //Password            
        passregex = /^\S[\S ]{2,98}\S$/;
        if (form.password.value.length < 6)
        {
            alert("Vui lòng nhập đúng mật khẩu. Không khoảng trắng, 6 ký tự trở lên và sử dụng 0-9,a-z,A-Z");
            return false;
        } else if (form.password2.value == "")
        {
            alert("Vui lòng kiểm tra nhập lại mật khẩu.");
            return false;
        } else if (!passregex.test(form.password.value))
        {
            alert("Vui lòng nhập đúng Mật khẩu. Không khoảng trắng, có hơn 6 ký tự và là các ký tự 0-9,a-z,A-Z");
            return false;
        }

        if ((form.password.value != "") && (form.password.value != form.password2.value))
        {
            alert("Mật khẩu không đúng, hãy thử lại.");
            return false;
        }

        if (form.check_agree.checked == false)
        {
            alert("Chưa check vào check box. Hãy click.");
            return false;
        }

        return isvalid;
    }
</script>
<body>
    <div id="product">
        <div id="breakcrumb">{breadcrumbs_path}</div>                     
        <div class="news_main">	
            <div class="ndchitiet_left">       
                </br>                                        
                <!--START_form_register-->
                <form action="{linkS}process-register" 
                      method="POST" 
                      name="adminForm" 
                      enctype="multipart/form-data">
                    <div class="main_register">
                        <fieldset class="fieldset_reg_info" style="width:50%">
                            <legend style="font-size:15px; font-weight:500">Thông tin cá nhân</legend>
                            <table width="100%" class="user-forms">                               
                                <tr>									
                                    <td width="260px">
                                        <div class="font11"> 
                                            Email
                                            <span class="red">*</span> 
                                        </div>                                    
                                        <input type="text"  
                                               id="email_field" 
                                               name="email" 
                                               class="input_reg_2" 
                                               maxlength = "49"
                                               style="margin-bottom:10px"/>                   
                                    </td>                                     
                                </tr>                                                       
                                <tr>
                                    <td>
                                        <div class="font11">
                                            Mật khẩu 
                                            <span class="red">*</span>
                                            <span  id="hint_password">(Ít nhất có 6 ký tự, bao gồn a-z và 0-9)</span></div>
                                        <input type="password" 
                                               id="password_field" 
                                               name="password" 
                                               class="input_reg_2" 
                                               maxlength = "49"
                                               style="margin-bottom:10px"/>
                                    </td>                                    
                                </tr>    
                                <tr>                                    
                                    <td>
                                        <div class="font11">
                                            Nhập lại mật khẩu 
                                            <span class="red">*</span>
                                            <span class="warning red-bold" 
                                                  id="hint_repassword"></span>
                                        </div>
                                        <input type="password" 
                                               id="password2_field" 
                                               name="password2" 
                                               class="input_reg_2" 
                                               maxlength = "49"/>
                                    </td>
                                </tr>                                                              	
                                <tr>                                	
                                    <td height="50px"> 										
                                        <input type="checkbox" 
                                               width="100px" 
                                               name="check_agree" 
                                               value="check" 
                                               checked 
                                               style="height:11px;">
                                        Nhận thông tin khuyến mãi, quà tặng qua email - Nanapet
                                        </input>                                                  
                                    </td>
                                </tr>   
                                <tr> 
                                    <td>
                                        <button class="submit-button-orange" 
                                                type="submit" 
                                                onClick="return(submitregistration());"></button>
                                    </td>                
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                </form>
                <center>
                    <img src="{linkS}layout/images/arthritis_in_dogs_2.jpg"/>
                </center>
                <!--END_form_register-->
            </div>				
        </div>
    </div>
</body>
