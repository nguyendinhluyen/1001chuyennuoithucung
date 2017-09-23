
<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=javascript>
    var pass_strength_phrases =
            {
                0: '0 điểm',
                10: '1 điểm',
                20: '2 điểm',
                30: '3 điểm',
                40: '4 điểm',
                50: '5 điểm',
                60: '6 điểm',
                70: '7 điểm',
                80: '8 điểm',
                90: '9 điểm',
                100: '10 điểm'
            };

    function check_change_pass()
    {
        if (document.getElementById('id_check_change_pass').checked)
        {
            document.getElementById('passwordNew').readOnly = false;
            document.getElementById('passwordNew2').readOnly = false;
        } else
        {
            document.getElementById('passwordNew').readOnly = true;
            document.getElementById('passwordNew2').readOnly = true;
        }
    }

    function checked_all_event()
    {
        if (document.getElementById('check_all').checked)
        {
            for (i = 1; i < 36; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }

            for (i = 1; i < 9; i++)
            {
                var checked_id = "check_all_" + i;
                document.getElementById(checked_id).checked = true;
            }
        } else
        {
            for (i = 1; i < 36; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }

            for (i = 1; i < 9; i++)
            {
                var checked_id = "check_all_" + i;
                document.getElementById(checked_id).checked = false;
            }
        }
    }

    function check_all_1_event()
    {
        if (document.getElementById('check_all_1').checked)
        {
            for (i = 1; i < 8; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }
        } else
        {
            for (i = 1; i < 8; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }
        }
    }

    function check_all_2_event()
    {
        if (document.getElementById('check_all_2').checked)
        {
            for (i = 8; i < 13; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }
        } else
        {
            for (i = 8; i < 13; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }
        }
    }

    function check_all_3_event()
    {
        if (document.getElementById('check_all_3').checked)
        {
            for (i = 13; i < 18; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }
            var checked_id = "check_box_admin_35";
            document.getElementById(checked_id).checked = true;
        } else
        {
            for (i = 13; i < 18; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }
            var checked_id = "check_box_admin_35";
            document.getElementById(checked_id).checked = false;
        }
    }

    function check_all_4_event()
    {
        if (document.getElementById('check_all_4').checked)
        {
            for (i = 18; i < 21; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }
            var checked_id = "check_box_admin_29";
            document.getElementById(checked_id).checked = true;
            var checked_id = "check_box_admin_30";
            document.getElementById(checked_id).checked = true;
            var checked_id = "check_box_admin_31";
            document.getElementById(checked_id).checked = true;
            var checked_id = "check_box_admin_32";
            document.getElementById(checked_id).checked = true;
            var checked_id = "check_box_admin_33";
            document.getElementById(checked_id).checked = true;
            var checked_id = "check_box_admin_34";
            document.getElementById(checked_id).checked = true;
        } else
        {
            for (i = 18; i < 21; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }
            var checked_id = "check_box_admin_29";
            document.getElementById(checked_id).checked = false;
            var checked_id = "check_box_admin_30";
            document.getElementById(checked_id).checked = false;
            var checked_id = "check_box_admin_31";
            document.getElementById(checked_id).checked = false;
            var checked_id = "check_box_admin_32";
            document.getElementById(checked_id).checked = false;
            var checked_id = "check_box_admin_33";
            document.getElementById(checked_id).checked = false;
            var checked_id = "check_box_admin_34";
            document.getElementById(checked_id).checked = false;
        }
    }

    function check_all_5_event()
    {
        if (document.getElementById('check_all_5').checked)
        {
            for (i = 21; i < 22; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }
        } else
        {
            for (i = 21; i < 22; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }
        }
    }

    function check_all_6_event()
    {
        if (document.getElementById('check_all_6').checked)
        {
            for (i = 22; i < 23; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }
        } else
        {
            for (i = 22; i < 23; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }
        }
    }

    function check_all_7_event()
    {
        if (document.getElementById('check_all_7').checked)
        {
            for (i = 23; i < 25; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }
        } else
        {
            for (i = 23; i < 25; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }
        }
    }

    function check_all_8_event()
    {
        if (document.getElementById('check_all_8').checked)
        {
            for (i = 25; i < 30; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = true;
            }
        } else
        {
            for (i = 25; i < 30; i++)
            {
                var checked_id = "check_box_admin_" + i;
                document.getElementById(checked_id).checked = false;
            }
        }
    }

</script>
<script language=javascript src="../jscript/password_strength_optimized.js"></script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->

<div class = "title">{title}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <div style="float:left;padding-left:20px">
            <br> </br>
            {note_change_admin}
            <br/><br/>	
            <div class ='err' style = 'margin-left:100px'>{error}</div>        
            <p>
                <label>Tên đăng nhập {new}</label>
                <input type = 'text' name='loginusername' id='loginusername' value = "{loginusername}" class ='fieldinput'> 
                <font color ='red'>*</font> ({5char})
            </p>

            <p>
                <label>Tên hiển thị </label>
                <input type = 'text' name='saveusername' id='saveusername' value = "{saveusername}" class ='fieldinput'> 
                <font color ='red'>*</font> ({5char})
            </p>

            <p style="margin-left:-4px; display:none; {display_change_pass}" >        
                <input type="checkbox" id="id_check_change_pass" name="id_check_change_pass" onclick="check_change_pass()"> Chọn để thay đổi password </input>
            </p>


            <p>			            
                <label>Mật khẩu {new}</label>
                <input type = 'password' id = 'passwordNew' name = 'passwordNew' class ='fieldinput' onkeyup="updatePasswordStrength_new(this, 'passwdRating', {'text': 2});" {readonly}> <font color ='red'>*</font> ({5char}) 
            </p>

            <p>
            <div id='passwdRating' style ='margin-left:100px''>
                <span id='ps-title'>{psecurity} </span>

                <div class='pass_bar' id='pass_bar'>
                    <div class='progress_bar_base'></div>
                </div>

                <div id='ps-rating' style="display: inline">0 {point}</div>
            </div>
            </p>
            <p>
                <label>{reEnterpass}</label><input type = 'password' id = 'passwordNew2' name = 'passwordNew2' class ='fieldinput' {readonly}> <font color ='red'>*</font>  
            </p>

            <table style="margin-left:-4px; margin-top:10px; margin-bottom:20px">		

                <tr>
                    <td  width="276">
                        <input type="checkbox" id="check_all" name="check_all" value="1" {check_all} onclick="checked_all_event()"> <b>Check all</b></input> 
                </tr>
                <tr>
                    <td width="276">
                        <input type="checkbox" id="check_all_1" name="check_all_1" value="1" onclick= "check_all_1_event()">
                        <b>Thông tin chung website</b></input>
                    </td>
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_1" name="check_box_admin_1" value="1" {checked_1} >Admin control panel</input> 
                    </td>
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_2" name="check_box_admin_2" value="2" {checked_2} ><span style="color:red">Admin Control Users </span></input> 
                    </td>          
                </tr>        
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_3" name="check_box_admin_3" value="1" {checked_3} >Thông tin chung</input> 
                    </td>
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_4" name="check_box_admin_4" value="2" {checked_4} >Quản lý từ khóa </input> 
                    </td>        
                </tr>        
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="check_box_admin_5" name="check_box_admin_5" value="1" {checked_5} >Thống kê truy cập</input> 
                    </td>
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_6" name="check_box_admin_6" value="2" {checked_6} >Ai đang online </input> 
                    </td>        
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="check_box_admin_7" name="check_box_admin_7" value="1" {checked_7}>Liên hệ</input> 
                    </td>             
                </tr>



                <tr>
                    <td>&nbsp;</td>
                </tr>        
                <tr>
                    <td width="276">
                        <input type="checkbox" id="check_all_2" name="check_all_2" value="1" onclick="check_all_2_event()"><b>Quản lý sản phẩm & phí vận chuyển</b></input> 
                    </td>
                </tr>           
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_8" name="check_box_admin_8" value="1" {checked_8} >Danh mục</input> 
                    </td>
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_9" name="check_box_admin_9" value="2" {checked_9} >Danh sách sản phẩm</input> 
                    </td>        
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_10" name="check_box_admin_10" value="1" {checked_10}>Sản phẩm khuyến mãi</input> 
                    </td>
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_11" name="check_box_admin_11" value="2" {checked_11}>Sản phẩm bán chạy </input> 
                    </td>        
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_12" name="check_box_admin_12" value="1" {checked_12} >Phí vận chuyển</input> 
                    </td>            
                </tr>



                <tr>
                    <td>&nbsp;</td>
                </tr>        
                <tr>
                    <td width="276">
                        <input type="checkbox" id="check_all_3" name="check_all_3" value="1" onclick="check_all_3_event()"><b>Hóa Đơn & Khách Hàng Thân Thiết</b>
                        </input>                </td>
                </tr>        
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_13" name="check_box_admin_13" value="1" {checked_13} >Danh sách hóa đơn</input> 
                    </td>
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_14" name="check_box_admin_14" value="2" {checked_14}>Quản lý KHTT </input> 
                    </td>        
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_15" name="check_box_admin_15" value="1" {checked_15}>Danh sách phí KHTT</input> 
                    </td>
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_16" name="check_box_admin_16" value="2" {checked_16}>Quản lý Group Member </input> 
                    </td>        
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_17" name="check_box_admin_17" value="1" {checked_17}>Danh sách Group Member</input> 
                    </td>    
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_35" name="check_box_admin_35" value="2" {checked_35}>Coupon </input>
                    </td>                    
                </tr>

                <tr>
                    <td>&nbsp;</td>
                </tr>        
                <tr>
                    <td width="276">
                        <input type="checkbox" id="check_all_4" name="check_all_4" value="1"  onclick="check_all_4_event()"> <b>Tin tức</b></input> 
                    </td>
                </tr>        
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_29" name="check_box_admin_29" value="1" {checked_29} >Danh mục thư viện</input> 
                    </td>

                    <td  width="188">                	
                        <input type="checkbox" id="check_box_admin_18" name="check_box_admin_18" value="1" {checked_18} >Bài viết thư viện</input> 
                    </td>

                </tr>
                <tr>
                    <td width="276">             
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_19" name="check_box_admin_19" value="2" {checked_19}>Danh mục giới thiệu</input> 
                    </td>        

                    <td width="276">                             
                        <input type="checkbox" id="check_box_admin_32" name="check_box_admin_32" value="2" {checked_32}>Bài viết giới thiệu</input> 
                    </td>                                   

                </tr>

                <tr>            
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_31" name="check_box_admin_31" value="1" {checked_31}>Danh mục trợ giúp</input> 
                    </td>     

                    <td  width="276">                	
                        <input type="checkbox" id="check_box_admin_20" name="check_box_admin_20" value="1" {checked_20}>Bài viết trợ giúp</input> 
                    </td>                                 
                </tr>                 

                <tr>            
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_33" name="check_box_admin_33" value="1" {checked_33}>Danh mục nhận nuôi</input> 
                    </td>     

                    <td  width="276">                	
                        <input type="checkbox" id="check_box_admin_34" name="check_box_admin_34" value="1" {checked_34}>Bài viết nhận nuôi</input> 
                    </td>                                 
                </tr>         

                <tr>                 	
                    <td width="276">                             
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_30" name="check_box_admin_30" value="2" {checked_30}>Giải trí</input> 
                    </td>       
                </tr>


                <tr>
                    <td>&nbsp;</td>
                </tr>        
                <tr>

                    <td width="276">
                        <input type="checkbox" id="check_all_5" name="check_all_5" value="1" onclick="check_all_5_event()" ><b>Thư viện ảnh</b></input> 
                    </td>
                </tr>        
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_21" name="check_box_admin_21" value="1" {checked_21}>Danh sách ảnh</input> 
                    </td>                   
                </tr>




                <tr>
                    <td>&nbsp;</td>
                </tr>        
                <tr>
                    <td width="276">
                        <input type="checkbox" id="check_all_6" name="check_all_6" value="1" onclick="check_all_6_event()" ><b>Tài khoản</b></input> 
                    </td>
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_22" name="check_box_admin_22" value="1" {checked_22}>Danh sách tài khoản</input> 
                    </td>            
                </tr>




                <tr>
                    <td>&nbsp;</td>
                </tr>        
                <tr>
                    <td width="276">
                        <input type="checkbox" id="check_all_7" name="check_all_7" value="1" onclick="check_all_7_event()" ><b>Khách hàng</b></input> 
                    </td>
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_23" name="check_box_admin_23" value="1" {checked_23}>Hỗ trợ khách hàng</input> 
                    </td>
                    <td width="188" style="display:none">             
                        <input type="checkbox" id="check_box_admin_24" name="check_box_admin_24" value="2" {checked_24}>Quảng cáo </input> 
                    </td>        
                </tr>




                <tr>
                    <td>&nbsp;</td>
                </tr>        
                <tr>
                    <td width="276">
                        <input type="checkbox" id="check_all_8" name="check_all_8" value="1" onclick="check_all_8_event()" ><b>Cấu hình website</b></input> 
                    </td>
                </tr>
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_25" name="check_box_admin_25" value="1" {checked_25}>Cấu hình</input> 
                    </td>
                    <td width="188">             
                        <input type="checkbox" id="check_box_admin_26" name="check_box_admin_26" value="2" {checked_26}>Cấm IP truy cập </input> 
                    </td>        
                </tr>            
                <tr>
                    <td  width="276">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="check_box_admin_27" name="check_box_admin_27" value="1" {checked_27}> <span style="color:red">Cập nhật Super Admin </spam></input> 
                    </td>
                    <td width="188" style="display:none">             
                        <input type="checkbox" id="check_box_admin_28" name="check_box_admin_28" value="2" {checked_28}>English </input> 
                    </td>        
                </tr>                    	
            </table>

            <p>
                <input class = "button" type="submit" name = "btnSub" value = "Lưu" />
            </p>
            <br/>
        </div>

    </form>
    <div style="clear:both"/></div>
<br/><br/>
</div>