<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
ob_start();
session_start();

if (isset($_SESSION['admin'])) {
    define('_INCLUDEA', '../include/');
    include(_INCLUDEA . "admin_start.php");
    include(_INCLUDE . "lag_config.php");
    include(_INCLUDE . "function.php");
    include(_INCLUDEA . "function_admin.php");
    include(_CLASS . "xtemplate.php");
    include(_INCLUDEA . "Product.php");

    $xtemplate = new Template();
    $show = input($_GET['show']);

    //Check session and save pic
    if (($show != 'OptProduct') && (isset($_SESSION['UFILE']))) {
        $arrfile = $_SESSION['UFILE'];
        $n = sizeof($arrfile);
        $tempArr = array();
        if ($n > 0) {
            foreach ($arrfile as $fvalue) {
                @unlink(_UPLOAD_FILE . $fvalue);
            }
        }
        unset($_SESSION['UFILE']);
    }

    include('com_admin/menu.php');
    switch ($show) {
        case 'logout':
            session_destroy();
            header("location:../index.php");
            break;

        case 'admin_user_info':
            include('com_admin_member/memberUpdate.php');
            break;

        case 'checkSchedules':
            if (strpos($_SESSION['admin'][3], ';18;') !== false) {
                include('com_news/CheckSchedules.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'memberAccount':
            if (strpos($_SESSION['admin'][3], ';22;') !== false) {
                include('com_user/addMember.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'coupon_send':
            if (strpos($_SESSION['admin'][3], ';35;') !== false) {
                include('com_coupon/CouponSend.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'coupon_list':
            if (strpos($_SESSION['admin'][3], ';35;') !== false) {
                include('com_coupon/CouponList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'coupon':
            if (strpos($_SESSION['admin'][3], ';35;') !== false) {
                include('com_coupon/OptCoupon.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogue_adoption':
            if (strpos($_SESSION['admin'][3], ';33;') !== false) {
                include('com_catalogue_adoption/ListCatalogue.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'CatalogueOpt_adoption':
            if (strpos($_SESSION['admin'][3], ';33;') !== false) {
                include('com_catalogue_adoption/CatalogueOpt.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogueTree_adoption':
            if (strpos($_SESSION['admin'][3], ';33;') !== false) {
                include('com_catalogue_adoption/ListCatalogueTree.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'newsList_adoption':
            if (strpos($_SESSION['admin'][3], ';34;') !== false) {
                include('com_news_adoption/NewsList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'OptNews_adoption':
            if (strpos($_SESSION['admin'][3], ';34;') !== false) {
                include('com_news_adoption/OptNews.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogue_introduce':
            if (strpos($_SESSION['admin'][3], ';19;') !== false) {
                include('com_catalogue_introduce/ListCatalogue.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'CatalogueOpt_introduce':
            if (strpos($_SESSION['admin'][3], ';19;') !== false) {
                include('com_catalogue_introduce/CatalogueOpt.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogueTree_introduce':
            if (strpos($_SESSION['admin'][3], ';19;') !== false) {
                include('com_catalogue_introduce/ListCatalogueTree.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'newsList_introduce':
            if (strpos($_SESSION['admin'][3], ';32;') !== false) {
                include('com_news_introduce/NewsList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'OptNews_introduce':
            if (strpos($_SESSION['admin'][3], ';32;') !== false) {
                include('com_news_introduce/OptNews.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogueTree_help':
            if (strpos($_SESSION['admin'][3], ';31;') !== false) {
                include('com_catalogue_help/ListCatalogueTree.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogue_help':
            if (strpos($_SESSION['admin'][3], ';31;') !== false) {
                include('com_catalogue_help/ListCatalogue.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'CatalogueOpt_help':
            if (strpos($_SESSION['admin'][3], ';31;') !== false) {
                include('com_catalogue_help/CatalogueOpt.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogueTree_libary':
            if (strpos($_SESSION['admin'][3], ';29;') !== false) {
                include('com_catalogue_libary/ListCatalogueTree.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogue_libary':
            if (strpos($_SESSION['admin'][3], ';29;') !== false) {
                include('com_catalogue_libary/ListCatalogue.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'CatalogueOpt_libary':
            if (strpos($_SESSION['admin'][3], ';29;') !== false) {
                include('com_catalogue_libary/CatalogueOpt.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Danh sach tin tuc			
        case 'newsList':
            if (strpos($_SESSION['admin'][3], ';18;') !== false) {
                include('com_news/NewsList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'OptNews_news':
            if (strpos($_SESSION['admin'][3], ';18;') !== false) {
                include('com_news/OptNews.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Tro giup					
        case 'newsList_help':
            if (strpos($_SESSION['admin'][3], ';20;') !== false) {
                include('com_news_help/NewsList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'OptNews_help':
            if (strpos($_SESSION['admin'][3], ';20;') !== false) {
                include('com_news_help/OptNews.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;


        // Giai tri
        case 'newsList_relax':
            if (strpos($_SESSION['admin'][3], ';30;') !== false) {
                include('com_news_relax/NewsList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'OptNews_relax':
            if (strpos($_SESSION['admin'][3], ';30;') !== false) {
                include('com_news_relax/OptNews.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;


        // Admin Control Panel
        case 'report':
            if (strpos($_SESSION['admin'][3], ';1;') !== false) {
                include('com_report/report.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Admin Control Users
        case 'com_control_user_account':
            if (strpos($_SESSION['admin'][3], ';2;') !== false) {
                include('com_control_user_account/imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'Opt_com_control_user_account':
            if (strpos($_SESSION['admin'][3], ';2;') !== false) {
                include('com_control_user_account/Opt_imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // General Information (Thong tin chung)
        case 'content':
            if (strpos($_SESSION['admin'][3], ';3;') !== false) {
                include('com_content/content.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Keywords (Quan ly tu khoa)	
        case 'keywords':
            if (strpos($_SESSION['admin'][3], ';4;') !== false) {
                include('com_keywords/keywords.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'Optkeywords':
            if (strpos($_SESSION['admin'][3], ';4;') !== false) {
                include('com_keywords/Optkeywords.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Statictis Vistors (Thong ke truy cap)
        case 'visitor':
            if (strpos($_SESSION['admin'][3], ';5;') !== false) {
                include('com_visitor/visitor.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Online Persons (Ai dang online)
        case 'who':
            if (strpos($_SESSION['admin'][3], ';6;') !== false) {
                include('com_who/who.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Contact (Lien he)				
        case 'contact':
            if (strpos($_SESSION['admin'][3], ';7;') !== false) {
                include('com_contact/contactList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'contactdetail':
            if (strpos($_SESSION['admin'][3], ';7;') !== false) {
                include('com_contact/contactDetail.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Catalogue (Danh mục)
        case 'catalogue':
            if (strpos($_SESSION['admin'][3], ';8;') !== false) {
                include('com_catalogue/ListCatalogue.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'catalogueTree':
            if (strpos($_SESSION['admin'][3], ';8;') !== false) {
                include('com_catalogue/ListCatalogueTree.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'CatalogueOpt':
            if (strpos($_SESSION['admin'][3], ';8;') !== false) {
                include('com_catalogue/CatalogueOpt.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Product (Danh sach san pham)
        case 'product':
            if (strpos($_SESSION['admin'][3], ';9;') !== false) {
                include('com_product/ProductList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'OptProduct':
            if (strpos($_SESSION['admin'][3], ';9;') !== false) {
                include('com_product/OptProduct.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        //San pham khuyen mai
        case 'khuyenmai':
            if (strpos($_SESSION['admin'][3], ';10;') !== false) {
                include('com_product/khuyenmai.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        //San pham ban chay
        case 'sanphambanchay':
            if (strpos($_SESSION['admin'][3], ';11;') !== false) {
                include('com_product/sanphambanchay.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Phi van chuyen
        case 'imgGallery':
            if (strpos($_SESSION['admin'][3], ';12;') !== false) {
                include('com_img_galary/imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'Opt_imgGallery':
            if (strpos($_SESSION['admin'][3], ';12;') !== false) {
                include('com_img_galary/Opt_imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Order from Customer (Danh sach hoa don)
        case 'order':
            if (strpos($_SESSION['admin'][3], ';13;') !== false) {
                include('com_order/orderList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'orderdetail':
            if (strpos($_SESSION['admin'][3], ';13;') !== false) {
                include('com_order/orderDetail.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'edit_orderdetail':
            if (strpos($_SESSION['admin'][3], ';13;') !== false) {
                include('com_order/Opt_imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'neworder':
            if (strpos($_SESSION['admin'][3], ';13;') !== false) {
                include('com_order/neworder.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // VIP Customer (Quan ly KHTT)
        case 'VIPCustomer':
            if (strpos($_SESSION['admin'][3], ';14;') !== false) {
                include('com_VIPCustomer/imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'Opt_VipCusomer':
            if (strpos($_SESSION['admin'][3], ';14;') !== false) {
                include('com_VIPCustomer/Opt_imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Fee Memeber (Danh sach phi KHTT)
        case 'feeMember':
            if (strpos($_SESSION['admin'][3], ';15;') !== false) {
                include('com_Fee_GroupMember/FeeList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Quan ly Group Member
        case 'GroupMember':
            if (strpos($_SESSION['admin'][3], ';16;') !== false) {
                include('com_AdminMember/imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'Opt_GroupMember':
            if (strpos($_SESSION['admin'][3], ';16;') !== false) {
                include('com_AdminMember/Opt_imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Danh sach GroupMember
        case 'ListGroupMember':
            if (strpos($_SESSION['admin'][3], ';17;') !== false) {
                include('com_Fee_GroupMember/FeeListMember.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Ads (Danh sach anh)
        case 'Ads':
            if (strpos($_SESSION['admin'][3], ';21;') !== false) {
                include('com_ads/ListAds.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'AdsOpt':
            if (strpos($_SESSION['admin'][3], ';21;') !== false) {
                include('com_ads/AdsOpt.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Danh sach tai khoan
        case 'memberList':
            if (strpos($_SESSION['admin'][3], ';22;') !== false) {
                include('com_user/memberList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'memberUpdate':
            if (strpos($_SESSION['admin'][3], ';22;') !== false) {
                include('com_user/memberUpdate.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Ho tro khach hang
        case 'support':
            if (strpos($_SESSION['admin'][3], ';23;') !== false) {
                include('com_support/SupportList.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        case 'SupportOpt':
            if (strpos($_SESSION['admin'][3], ';23;') !== false) {
                include('com_support/SupportOpt.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Cau hinh
        case 'config':
            if (strpos($_SESSION['admin'][3], ';25;') !== false) {
                include('com_config/config.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Cam IP truy cap
        case 'iba':
            if (strpos($_SESSION['admin'][3], ';26;') !== false) {
                include('com_iba/iba.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Cap Nhat Super Admin
        case 'account':
            if (strpos($_SESSION['admin'][3], ';27;') !== false) {
                include('com_account/account.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'comment':
//				include('com_product/ProductComment.php');
//				break;	
//			case 'template':
//				include('com_template/template.php');
//				break;
//			case 'Opttemplate':
//				include('com_template/Opttemplate.php');
//				break;			
//			case 'downloadOpt':
//				include('com_download/DownloadOpt.php');
//				break;
//			case 'downloadList':
//				include('com_download/ListDownload.php');
//				break;															
        // Catalogue News
        case 'CatalogueNewsList':
//				include('com_news/Catalogue_News_list.php');
//				break;
//			case 'CatalogueNewsOpt':
//				include('com_news/Catalogue_News_Opt.php');
//				break;						
        // Send mail
        case 'mail':
//				include('com_mail/mail.php');
//				break;		
//			case 'mailAds':
//				include('com_mail/mailAds.php');
//				break;								
        // Replace Word
        case 'wordsReplace':
//				include('com_word/word.php');
//				break;
        // Website
        case 'webList':
//				include('com_web/webList.php');
//				break;
//			case 'Optweb':
//				include('com_web/Optweb.php');
//				break;				
//			case 'memberScore':
//				include('com_user/memberScore.php');
//				break;																									
        case 'sanphammoi':
//				include('com_product/sanphammoi.php');
//				break;
        case 'NewsOpt':
//				include('com_news/NewsOpt.php');
//				break;
        case 'productOpt':
//				include('com_product/ProductOpt.php');
//				break;
        case 'memberListB':
//				include('com_user/memberListB.php');
//				break;
        case 'memberGroup':
//				include('com_user/memberGroup.php');
//				break;
        default:

            include('com_report/report.php');

            break;
    }

    $xtemplate->path = "com_admin/";

    $html = $xtemplate->load("index");

    $html = $xtemplate->replace($html, array(
        'title' => $title,
        'meta' => $meta,
        'script' => $script,
        'content' => $content,
        'menu' => $menu,
    ));

    $xtemplate->show($html);

    include(_INCLUDEA . "admin_end.php");
} else {
    $_SESSION['return'] = $_SERVER['QUERY_STRING'];

    header("location:../");
}
?>