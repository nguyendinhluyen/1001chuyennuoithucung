<style>
    a.product_name:hover, 
    a.product_name:link, 
    a.product_name:visited {
        text-decoration: none;
        color:#646464;
    }
    a.list_product_name:hover, 
    a.list_product_name:link, 
    a.list_product_name:visited {
        text-decoration: none;
    }
</style>
<div class="container">
    <div class="row" style="margin:0px">
        <div class="col-sx-12">
            <div class="hidden-lg" 
                 id="breakcrumb"
                 style="font-family: RobotoSlabRegular;
                 margin-top: 10px;
                 margin-bottom: 10px">{breadcrumbs_path}</div>
            <div class="hidden-xs hidden-sm hidden-md"
                 id="breakcrumb"
                 style="font-family: RobotoSlabRegular;
                 margin-top: 20px;
                 margin-bottom: 20px">{breadcrumbs_path}</div>
        </div>

        <div class ="col-sx-12">
            <div class="product_main">
                <!--BEGINLIST_PRODUCTS-->
                <!--BEGIN_PRODUCT-->
                <a class="list_product_name"
                   href="{linkS}{category}/{product_key}.htm"
                   style = "outline:none;">
                    <div class="product_detail"
                         style="width: 100%;
                         height: auto">
                        <img class="img-responsive center-block" 
                             src="{linkS}upload/product/thumb/{product_img}" 
                             width="100%"
                             alt="{product_name}"
                             style="cursor: pointer;
                             margin-bottom: 10px">
                    </div> 
                    <div class="product_tit col-xs-12"
                         style="height: 90px">
                        <div style="font-size: 14px;
                             color: #929292;
                             cursor: pointer;
                             font-family: RobotoSlabRegular;">{product_name}
                        </div>
                    </div>
                    <div class="product_price col-xs-12" 
                         style="cursor: pointer;
                         font-family:RobotoSlabRegular;
                         font-size: 14px;
                         padding-top: 0px;
                         padding-bottom: 0px">{encourage_price}
                    </div>
                    <div class="product_price col-xs-12"
                         style="cursor: pointer;
                         font-family:RobotoSlabRegular;
                         font-size: 14px;
                         color:black;
                         text-decoration:line-through;
                         padding-top: 0px;
                         padding-bottom: 0px">{product_price}
                    </div>
                </a>
                <!--END_PRODUCT-->
                <!--ENDLIST_PRODUCTS-->
                <!--BEGINLIST_PRODUCTS_MOBILES-->
                <!--ENDLIST_PRODUCTS_MOBILES-->
                <!--BEGINLIST_PRODUCTS_TABLETS-->
                <!--ENDLIST_PRODUCTS_TABLETS-->
            </div>
            <div class="pagination"
                 align="center"
                 style="margin-left: auto;
                 margin-right: auto;
                 font-size: 14px;
                 font-family: RobotoSlabRegular;
                 display: block;
                 clear:both;">{page}</div>
        </div>
    </div>
</div>