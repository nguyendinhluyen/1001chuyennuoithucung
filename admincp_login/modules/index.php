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
    $accessControl = $_SESSION['admin'][3];
    switch ($show) {
        case 'admin_user_info':
            include('com_admin_member/memberUpdate.php');
            break;

        case 'logout':
            session_destroy();
            header("location:../index.php");
            break;

        // Category "Admin Control Panel"
        case 'report':
            if (strpos($accessControl, ';11;') !== false) {
                include('com_report/report.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Begin Category "Quản lý người dùng"
        case 'com_control_user_account':
            if (strpos($accessControl, ';12;') !== false) {
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
            if (strpos($accessControl, ';12;') !== false) {
                include('com_control_user_account/Opt_imgGalary.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        // End Category "Quản lý người dùng"

        // Category "Thống kê truy cập"
        case 'visitor':
            if (strpos($accessControl, ';13;') !== false) {
                include('com_visitor/visitor.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Category "Ai đang online"
        case 'who':
            if (strpos($accessControl, ';14;') !== false) {
                include('com_who/who.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Begin Category "Danh mục thư viện"
        case 'catalogue_libary':
            if (strpos($accessControl, ';21;') !== false) {
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
            if (strpos($accessControl, ';21;') !== false) {
                include('com_catalogue_libary/CatalogueOpt.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'catalogueTree_libary':
            if (strpos($accessControl, ';21;') !== false) {
                include('com_catalogue_libary/ListCatalogueTree.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        // End Category "Danh mục thư viện"

        // Begin Category "Bài viết thư viện"
        case 'newsList':
            if (strpos($accessControl, ';22;') !== false) {
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
            if (strpos($accessControl, ';22;') !== false) {
                include('com_news/OptNews.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        case 'checkSchedules':
            if (strpos($accessControl, ';22;') !== false) {
                include('com_news/CheckSchedules.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;
        // End Category "Bài viết thư viện"

        // Category "Cấm IP truy cập"
        case 'iba':
            if (strpos($accessControl, ';31;') !== false) {
                include('com_iba/iba.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

        // Category "Cập nhật Super Admin"
        case 'account':
            if (strpos($accessControl, ';32;') !== false) {
                include('com_account/account.php');
            } else {
                ?>
                <script>
                    alert("Bạn không được cấp quyền truy cập trang này!");
                </script>
                <?php

            }
            break;

//        case 'memberAccount':
//            include('com_user/addMember.php');
//            break;
//        case 'coupon_send':
//            include('com_coupon/CouponSend.php');
//            break;
//        case 'coupon_list':
//            include('com_coupon/CouponList.php');
//            break;
//        case 'coupon':
//            include('com_coupon/OptCoupon.php');            
//            break;
//        case 'catalogue_adoption':
//            include('com_catalogue_adoption/ListCatalogue.php');
//            break;
//        case 'CatalogueOpt_adoption':
//            include('com_catalogue_adoption/CatalogueOpt.php');
//            break;
//        case 'catalogueTree_adoption':
//            include('com_catalogue_adoption/ListCatalogueTree.php');
//            break;
//        case 'newsList_adoption':
//            include('com_news_adoption/NewsList.php');
//            break;
//        case 'OptNews_adoption':            
//            include('com_news_adoption/OptNews.php');
//            break;
//        case 'catalogue_introduce':        
//            include('com_catalogue_introduce/ListCatalogue.php');        
//            break;
//        case 'CatalogueOpt_introduce':
//            include('com_catalogue_introduce/CatalogueOpt.php');
//            break;
//        case 'catalogueTree_introduce':
//            include('com_catalogue_introduce/ListCatalogueTree.php');
//            break;
//        case 'newsList_introduce':            
//            include('com_news_introduce/NewsList.php');            
//            break;
//        case 'OptNews_introduce':            
//            include('com_news_introduce/OptNews.php');            
//            break;
//        case 'catalogueTree_help':
//            include('com_catalogue_help/ListCatalogueTree.php');
//            break;
//        case 'catalogue_help':            
//            include('com_catalogue_help/ListCatalogue.php');            
//            break;
//        case 'CatalogueOpt_help':            
//            include('com_catalogue_help/CatalogueOpt.php');            
//            break;
//        case 'newsList_help':
//            include('com_news_help/NewsList.php');
//            break;
//        case 'OptNews_help':
//            include('com_news_help/OptNews.php');
//            break;
//        case 'newsList_relax':
//            include('com_news_relax/NewsList.php');
//            break;
//        case 'OptNews_relax':
//            include('com_news_relax/OptNews.php');
//            break;        
//        case 'content':
//            include('com_content/content.php');
//            break;
//        case 'keywords':
//            include('com_keywords/keywords.php');
//            break;
//        case 'Optkeywords':
//            include('com_keywords/Optkeywords.php');
//            break;
//        case 'contact':
//            include('com_contact/contactList.php');
//            break;
//        case 'contactdetail':
//            include('com_contact/contactDetail.php');
//            break;        
//        case 'catalogue':
//            include('com_catalogue/ListCatalogue.php');            
//            break;
//        case 'catalogueTree':
//            include('com_catalogue/ListCatalogueTree.php');
//        case 'CatalogueOpt':
//            include('com_catalogue/CatalogueOpt.php');
//            break;
//        case 'product':
//            include('com_product/ProductList.php');
//            break;
//        case 'OptProduct':
//            include('com_product/OptProduct.php');
//            break;        
//        case 'khuyenmai':
//            include('com_product/khuyenmai.php');
//            break;        
//        case 'sanphambanchay':
//            include('com_product/sanphambanchay.php');
//            break;        
//        case 'imgGallery':
//            include('com_img_galary/imgGalary.php');
//            break;
//        case 'Opt_imgGallery':
//            include('com_img_galary/Opt_imgGalary.php');
//            break;
//        case 'order':
//            include('com_order/orderList.php');
//            break;
//        case 'orderdetail':
//            include('com_order/orderDetail.php');
//            break;
//        case 'edit_orderdetail':
//            include('com_order/Opt_imgGalary.php');
//            break;
//        case 'neworder':
//            include('com_order/neworder.php');
//            break;
//        case 'VIPCustomer':
//            include('com_VIPCustomer/imgGalary.php');
//            break;
//        case 'Opt_VipCusomer':
//            include('com_VIPCustomer/Opt_imgGalary.php');
//            break;
//        case 'feeMember':
//            include('com_Fee_GroupMember/FeeList.php');
//            break;
//        case 'GroupMember':
//            include('com_AdminMember/imgGalary.php');
//            break;
//        case 'Opt_GroupMember':
//            include('com_AdminMember/Opt_imgGalary.php');
//            break;
//        case 'ListGroupMember':
//            include('com_Fee_GroupMember/FeeListMember.php');
//            break;
//        case 'Ads':
//            include('com_ads/ListAds.php');
//            break;
//        case 'AdsOpt':
//            include('com_ads/AdsOpt.php');
//            break;
//        case 'memberList':
//            include('com_user/memberList.php');
//        case 'memberUpdate':
//            include('com_user/memberUpdate.php');
//            break;
//        case 'support':
//            include('com_support/SupportList.php');
//        case 'SupportOpt':
//            include('com_support/SupportOpt.php');
//            break;        
//        case 'config':
//            include('com_config/config.php');
//            break;
//
//        case 'comment':
//            include('com_product/ProductComment.php');
//            break;
//        case 'template':
//            include('com_template/template.php');
//            break;
//        case 'Opttemplate':
//            include('com_template/Opttemplate.php');
//            break;
//        case 'downloadOpt':
//            include('com_download/DownloadOpt.php');
//            break;
//        case 'downloadList':
//            include('com_download/ListDownload.php');
//            break;        
//        case 'CatalogueNewsList':
//            include('com_news/Catalogue_News_list.php');
//            break;
//        case 'CatalogueNewsOpt':
//            include('com_news/Catalogue_News_Opt.php');
//            break;       
//        case 'mail':
//            include('com_mail/mail.php');
//            break;
//        case 'mailAds':
//            include('com_mail/mailAds.php');
//            break;        
//        case 'wordsReplace':
//            include('com_word/word.php');
//            break;        
//        case 'webList':
//            include('com_web/webList.php');
//            break;
//        case 'Optweb':
//            include('com_web/Optweb.php');
//            break;
//        case 'memberScore':
//            include('com_user/memberScore.php');
//            break;
//        case 'sanphammoi':
//            include('com_product/sanphammoi.php');
//            break;
//        case 'NewsOpt':
//            include('com_news/NewsOpt.php');
//            break;
//        case 'productOpt':
//            include('com_product/ProductOpt.php');
//            break;
//        case 'memberListB':
//            include('com_user/memberListB.php');
//            break;
//        case 'memberGroup':
//            include('com_user/memberGroup.php');
//            break;
        default:
            include('com_report/admin_user_info.php');
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