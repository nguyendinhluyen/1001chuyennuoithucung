<link rel="stylesheet" type="text/css" href="{linkS}layout/css/template.css" />
<link rel="stylesheet" type="text/css" href="{linkS}layout/css/jquery-ui-1.8.16.custom.css"/>
<script type="text/javascript" src="{linkS}layout/js/jquery-ui-1.8.16.custom.min.js"></script>

<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div>                   
    <div class="news_main">
        <div style="clear:both"></div>
        <div class="user_left">

            <table style="text-align: left;" border="0px;">
                <tr><td align="center">Ảnh đại diện</td></tr>
                <tr><td align="center"><img alt="" src="{linkS}upload/avatar/{avatar}" width="120px" height="140px;"></td></tr>
                <tr><td>&nbsp;</td></tr>

                <tr><td>
                        <div style="border-radius:7px;border: 1px solid #EAF3FE;;">
                            <div  style="background-color: #EAF3FE; height: 30px; font-size: 14px;">
                                <div style="padding: 5px;"><b>MENU CỦA BẠN</b></div>
                            </div>
                            <div>
                                <table cellspacing="0" cellpadding="0" width="100%" id="contact_form" border="0">
                                    <tr><td><a href="{linkS}thong-tin-tai-khoan">Thông tin tài khoản</a></td></tr>
                                    <tr><td><a href="{linkS}so-dia-chi">Sổ địa chỉ</a></td></tr>
                                    <tr><td><a href="{linkS}danh-sach-don-hang">Đơn hàng của tôi</a></td></tr>
                                    <tr><td><a href="{linkS}san-pham-danh-gia">Sản phẩm tôi đánh giá</a></td></tr>
                                    <tr><td><a href="{linkS}san-pham-ua-thich">Sản phẩm ưa thích</a></td></tr>
                                    <tr><td><a href="{linkS}pet-profile">Pet profile</a></td></tr>
                                </table>
                            </div> 
                        </div>

                    </td></tr>


                <!--  <tr><td>Ứng dụng miễn phí</td></tr>
                <tr><td>Đăng ký nhận thông báo</td></tr> -->
            </table>



        </div>


        <div class="user_right">
            <div class="newsPersonal updateUser" style="display: block; width: 540px;">
                <table border="0">
                    <tr>
                        <td>
                            <div class="top_newsPersonal" >

                                <div class="ltop_newsPersonal"></div>

                                <h2 class="lstitle">Thông tin chung <span id="hint_update_user"></span></h2>

                                <div class="rtop_newsPersonal"></div>

                            </div>
                            <div class="newsPersonal_inside">

                                <div class="group_listing_input" id="group_listing_input">



                                    <div class="listing_input">

                                        <div class="post_label_container">

                                            <label class="postLabel">Tên đăng nhập:</label>

                                        </div>

                                        <div class="post_label_container" style= "width:auto">

                                            <label class="postLabel" style= "width:auto; margin-left:0px">{name}</label>

                                        </div>

                                    </div>
                                    <div class="listing_input">

                                        <div class="post_label_container">

                                            <label class="postLabel">Thành viên :</label>

                                        </div>

                                        <div class="post_label_container">

                                            <label class="postLabel" style="width:auto; position:relative; float:left; color:#AA1F00; font-size:14px; font-family:Cambria"><b>{level}</b></label>

                                        </div>

                                    </div>



                                </div>								

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <div class="top_newsPersonal" >

                                <div class="ltop_newsPersonal"></div>

                                <h2 class="lstitle" style="top: 100px">{tieude}<span id="hint_update_user"></span></h2>

                                <div class="rtop_newsPersonal"></div>

                            </div>
                            <div class="newsPersonal_inside">

                                <div class="group_listing_input" style="padding: 0px; padding-left: 6px; margin-top: -12px; padding-top:20px">
                                    {content_infomation}
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>                

            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#birthday").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
