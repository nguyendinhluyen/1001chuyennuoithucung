<link rel="stylesheet" type="text/css" href="{linkS}layout/css/template.css" />
<link rel="stylesheet" type="text/css" href="{linkS}layout/css/jquery-ui-1.8.16.custom.css"/>
<script type="text/javascript" src="{linkS}layout/js/jquery-ui-1.8.16.custom.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div id="breakcrumb" class="hidden-xs hidden-sm"
                 style="font-family: RobotoSlabRegular;
                 font-size:14px;
                 margin-top: 20px;
                 margin-bottom: 15px">{breadcrumbs_path}</div>
            <div class="news_main">
                <div class="col-xs-12 hidden-md hidden-lg" 
                     style="padding-left: 0px; margin-bottom: 10px; margin-top: 10px">
                    <img src="{linkS}layout/bootstrap/images/icon_category_mobile.png"
                         data-toggle="collapse"
                         href="#collapsinfo"
                         aria-expanded="false"
                         aria-controls="collapsinfo"
                         width="30px"
                         height="30px"
                         style="margin-right:10px; cursor: pointer;"> 
                    <span style="font-family: RobotoSlabBold; 
                          font-size: 15px; 
                          vertical-align: middle;">{tieude}</span>
                </div>
                <div class="collapse col-xs-12" id="collapsinfo" 
                     style="padding: 0px; line-height: 35px">
                    <ul style="font-family: RobotoSlabBold;
                        padding-left: 0px">
                        <li><a href="{linkS}thong-tin-tai-khoan" 
                               style="color: #000" rel='nofollow'>THÔNG TIN CỦA BẠN</a></li>
                        <li><a href="{linkS}so-dia-chi" 
                               style="color: #000" rel='nofollow'>SỔ ĐỊA CHỈ</a></li>
                        <li><a href="{linkS}danh-sach-don-hang" 
                               style="color: #000" rel='nofollow'>ĐƠN HÀNG CỦA BẠN</a></li>
                        <li><a href="{linkS}thu-cung-cua-toi" 
                               style="color: #000" rel='nofollow'>THÚ CƯNG CỦA BẠN</a></li>
                        <li><a href="{linkS}doi-mat-khau" 
                               style="color: #000" rel='nofollow'>ĐỔI MẬT KHẨU</a></li>
                        <li><a href="{linkS}logout" 
                               style="" rel='nofollow'>ĐĂNG XUẤT</a></li>
                        <li><hr></li>
                    </ul>
                </div>  
                <div style="font-family:PoetsenOne;
                     font-size: 20px;
                     clear:both;
                     margin-bottom: 20px">
                    <span style="color: #989898">Xin chào, </span>
                    <span style="color: #019cfd">{name_hello}</span>
                </div>
                <!--Left Col-->
                <div class="hidden-xs hidden-sm col-md-3" 
                     style="padding-left: 0px;
                     padding-right: 50px;
                     padding-bottom: 50px;
                     font-family: RobotoSlabRegular;">
                    <div class="col-md-12"
                         style="padding:0px;
                         background-color: #f2fbff;
                         -webkit-border-radius:25px;
                         -moz-border-radius:25px;
                         border-radius:25px;
                         -webkit-box-shadow: 0px 10px 10px -5px rgba(146,159,165,1);
                         -moz-box-shadow: 0px 10px 10px -5px rgba(146,159,165,1);
                         box-shadow: 0px 10px 10px -5px rgba(146,159,165,1);">
                        <div class="col-md-12" style="padding:0px">
                            <img alt="{name_hello}"
                                 src="{linkS}upload/avatar/{avatar}" 
                                 width="100%"
                                 style="-webkit-border-radius:25px;
                                 -moz-border-radius:25px;
                                 border-radius:25px;
                                 margin-bottom: 20px">
                        </div>
                        <div class="col-md-12">
                            <img alt="thông tin tài khoản"
                                 src="{linkS}layout/bootstrap/images/thong_tin_tai_khoan_1.png" 
                                 height="20px">
                            <a href="{linkS}thong-tin-tai-khoan"
                               style="font-family: RobotoSlabLight; 
                               font-size: 14px;
                               margin-left: 10px;
                               line-height: 35px;
                               padding-top: 10px;
                               color: #000">Thông tin của bạn</a>
                        </div>    
                        <div class="col-md-12">
                            <img alt="sổ địa chỉ"
                                 src="{linkS}layout/bootstrap/images/thong_tin_tai_khoan_2.png" 
                                 height="20px">
                            <a href="{linkS}so-dia-chi"
                               style="font-family: RobotoSlabLight; 
                               font-size: 14px; 
                               margin-left: 10px;
                               line-height: 35px;
                               color: #000">Sổ địa chỉ</a>
                        </div>
                        <div class="col-md-12">
                            <img alt="đơn hàng" 
                                 src="{linkS}layout/bootstrap/images/thong_tin_tai_khoan_3.png" 
                                 height="20px">
                            <a href="{linkS}danh-sach-don-hang"
                               style="font-family: RobotoSlabLight; 
                               font-size: 14px; 
                               margin-left: 10px;
                               line-height: 35px;
                               color: #000">Đơn hàng của tôi</a>
                       <!--<a href="{linkS}san-pham-danh-gia">
                           Sản phẩm ưa thích
                       </a>-->
                        </div>
                        <!--<div class="col-md-12">
                              <img alt="sản phẩm ưa thích"
                                   src="{linkS}layout/bootstrap/images/thong_tin_tai_khoan_4.png" 
                                   height="20px">
                              <a href="{linkS}san-pham-ua-thich"
                                 style="font-family: RobotoSlabLight; 
                                 font-size: 14px; 
                                 margin-left: 10px;
                                 line-height: 35px;
                                 color: #000">Sản phẩm ưa thích</a>
                        </div>-->
                        <div class="col-md-12">
                            <img alt="thú cưng"
                                 src="{linkS}layout/bootstrap/images/thong_tin_tai_khoan_5.png" 
                                 height="20px">
                            <a href="{linkS}thu-cung-cua-toi"
                               style="font-family: RobotoSlabLight; 
                               font-size: 14px; 
                               margin-left: 5px;
                               line-height: 35px;
                               color: #000">Thú cưng của tôi</a>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 30px">
                            <hr style = "border-color: #93a4ac; border-width: 1px;">
                            <img alt="mật khẩu" 
                                 src="{linkS}layout/bootstrap/images/thong_tin_tai_khoan_6.png" 
                                 height="20px">
                            <a href="{linkS}doi-mat-khau"
                               style="font-family: RobotoSlabLight; 
                               font-size: 14px; 
                               margin-left: 10px;
                               line-height: 20px;
                               color: #000;
                               padding-bottom: 30px">Đổi mật khẩu</a>
                        </div>
                    </div>      
                </div>                
                <!-- End left column-->
                <!-- Right column-->
                <div class="col-xs-12 col-md-9"
                     style="padding:0px;
                     font-family: RobotoSlabRegular;
                     line-height: 30px">
                    <div style="font-size: 17px; margin-bottom: 10px">{tieude}</div>
                    <div style="font-size: 14px;">
                        Tên đăng nhập: <span style ="color:blue">{name}</span>
                    </div>
                    <div style="font-size: 14px;">
                        Thành viên: <span style ="color:red">{level}</span>
                    </div>
                    <div style="font-family: RobotoSlabRegular;">{content_infomation}</div>
                </div>
                <!-- End right column-->
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#birthday").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>			