<div class = "container">
    <div class ="row">
        <div class="col-xs-12 col-md-3">
            <img class="hidden-xs hidden-sm" 
                 alt="giới thiệu" 
                 src="{linkS}layout/bootstrap/images/gioi_thieu.png"
                 style="clear: both;
                 width: 90%;
                 margin-top: 20px;
                 margin-bottom: 20px">
            {category}
            <a href="{linkS}lien-he" class="hidden-xs hidden-sm">
                <img alt="liên hệ"
                     src="{linkS}layout/bootstrap/images/product_contact.png"
                     style="float: left;
                     clear: both;
                     margin-top: 10px;
                     margin-bottom: 40px;
                     margin-left: 15px"></a>
        </div> 
        <div class="col-xs-12 col-md-9"
             style="padding-left: 10px;
             padding-right: 0px">
            <div class="hidden-xs hidden-sm"
                 id="breakcrumb"
                 style="font-size:14px;
                 font-family: RobotoSlabRegular;
                 margin-top: 40px;
                 margin-bottom: 20px">{breadcrumbs_path}
            </div>
            <div class="product_main">
                <!--BEGINLIST_PRODUCTS-->
                <!--BEGIN_PRODUCT-->
                <li class="col-xs-6 col-sm-3"
                    style="padding-left:0px">
                    <h4>
                        <a href="{linkS}thuong-hieu/{adver_id}" 
                           target="_blank"  
                           class="img-responsive">
                            <img src="{linkS}upload/adver/thumb/{brand_img}"
                                 alt="{brand_name}"
                                 width="100%"
                                 style="display: block; 
                                 margin-top: 20px"/>
                        </a>
                    </h4>
                </li>
                <!--END_PRODUCT-->
                <!--ENDLIST_PRODUCTS-->
            </div>
            <!-- BEGIN PAGE NAVIGATION -->
            <div align="center">
                <div class="pagination" align="center" 
                     style="margin-left: auto;
                     margin-right: auto;
                     font-size:14px;
                     font-family:RobotoSlabRegular;
                     margin-top: 10px;
                     margin-bottom: 10px">{page}
                </div> 
            </div>
            <!-- END PAGE NAVIGATION -->
        </div>
    </div>
</div>