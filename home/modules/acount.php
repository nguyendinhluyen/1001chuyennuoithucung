<style>    
    #acount_menu ul {
        padding: 0;
        list-style: none;
        z-index: 999999;        
    }

    #acount_menu ul {
        position: absolute;
    }

    #acount_menu ul li {
        position: relative;
    }  

    #acount_menu ul li ul {
        display: block;
        background-color:#ffffff;
        width: 205px;
        border-color: #ede7e4;
        border-style: solid;
        border-width: 2px;        
        margin-left: -35px;
        border-radius: 15px;      
        height: 190px;
    }      

    #acount_menu ul li ul li a {
        color:#a88c79;
        margin-left: 30px;
        line-height: 30px;                        
    }

    #acount_menu ul li ul {
        display: none;        
    }

    #acount_menu ul li:hover ul {
        display: block;             
    }

</style>

<?php
$acount = " <div id='acount_menu' style = 'color: #a88c79; 
                                              font-size: 14px;
                                              font-family:RobotoSlabRegular;
                                              font-weight: 300;
                                              z-index: 999999;'>
                    <ul>
                        <li>                            
                            <a  class='hidden-xs hidden-sm'
                                href='#'
                                id = 'account'
                                style='color: #a88c79; 
                                outline:none'
                                rel='nofollow'> Tài khoản của bạn
                                <span>
                                    <img src='{linkS}layout/bootstrap/images/button_down.png'/>
                                </span>
                            </a>
                            <a class='visible-xs-block visible-sm-block' 
                               href='#' 
                               id = 'account' 
                               style = 'color: #a88c79;
                               outline:none'
                               rel='nofollow'> Tài khoản của bạn
                                <span>                                    
                                    <img src='{linkS}layout/bootstrap/images/button_down.png'/>
                                </span>
                            </a>
                            <ul>
                                <li style ='margin-top: 10px; margin-bottom:10px'>                                    
                                    <a  href='{linkS}dang-nhap' 
                                        style ='color: #83c6dc; 
                                                outline:none;'
                                        rel='nofollow'>
                                        Đăng ký / Đăng nhập
                                    </a>
                                    <div style = 'background-color:#c6c6c6;
                                                  height:1px;
                                                  margin-left:30px;
                                                  margin-right:30px'/>
                                </li>
                                <li>
                                    <a href='{linkS}thong-tin-tai-khoan' 
                                       style = 'outline: none'
                                       rel='nofollow'>Thông tin tài khoản</a>
                                </li>
                                <li>
                                    <a href='{linkS}so-dia-chi' 
                                       style = 'outline: none'
                                       rel='nofollow'>Sổ địa chỉ</a>
                                </li>
                                <li>
                                    <a href='{linkS}danh-sach-don-hang' 
                                       style = 'outline: none'
                                       rel='nofollow'>Đơn hàng của tôi</a>
                                </li>                                
                                <!--<li>
                                    <a href='{linkS}san-pham-ua-thich' 
                                       style = 'outline: none'
                                       rel='nofollow'>Sản phẩm ưa thích</a>
                                </li>-->
                                <li>
                                    <a href='{linkS}thu-cung-cua-toi' 
                                       style = 'outline: none'
                                       rel='nofollow'>Thú cưng của tôi</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>";


if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
    if (empty($_SESSION['name']) || $_SESSION['name'] == '') {
        $name_login = "Chào bạn, Anh/Chị";
    } else {
        $name_array = split(" ", $_SESSION['name']);

        $name_login = "Chào, " . substr($name_array[count($name_array) - 1], 0, 10);
    }
    $acount = "<div id='acount_menu' 
                    style = 'color:#a88c79;
                            font-size:14px;
                            font-family:RobotoSlabRegular;
                            font-weight: 300;
                            z-index: 99999'>
                    <ul>
                        <li>
                            <a href='#'
                                rel='nofollow'
                                id='account' 
                                style='color:#a88c79;
                                       outline:none'>
                                " . $name_login . "
                                <img src='{linkS}layout/bootstrap/images/button_down.png'/>
                            </a>
                            <ul>
                                <li style ='margin-top: 10px; margin-bottom:10px'>                                    
                                    <a href='{linkS}logout' 
                                       rel='nofollow'
                                       style='color: #83c6dc; 
                                              outline:none'>
                                       Đăng xuất tài khoản
                                    </a>
                                    <div style='background-color:#c6c6c6;
                                                height:1px;
                                                margin-left:30px;
                                                margin-right:37px'/>
                                </li>
                                <li>
                                    <a href='{linkS}thong-tin-tai-khoan' 
                                       style='outline: none'
                                       rel='nofollow'>Thông tin tài khoản</a>
                                </li>
                                <li>
                                    <a href='{linkS}so-dia-chi' 
                                       style='outline: none'
                                       rel='nofollow'>Sổ địa chỉ</a>
                                </li>
                                <li>
                                    <a href='{linkS}danh-sach-don-hang' 
                                       style='outline: none'
                                       rel='nofollow'>Đơn hàng của tôi</a>
                                </li>                                
                                <!--<li>
                                    <a href='{linkS}san-pham-ua-thich' 
                                       style='outline: none'
                                       rel='nofollow'>Sản phẩm ưa thích</a>
                                </li>-->
                                <li>
                                    <a href='{linkS}thu-cung-cua-toi' 
                                       style = 'outline: none'
                                       rel='nofollow'>Thú cưng của tôi</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>";
}
?>

