<style>
    a.product_name:hover, a.product_name:link, a.product_name:visited {
        text-decoration: none;
        color:#646464;
    }
    a.list_product_name:hover, a.list_product_name:link, a.list_product_name:visited {
        text-decoration: none;        
    }
    .product_detail{
        position: relative;
        overflow: hidden;
        height: 270px;        
    }
    .product_detail .textbox {
        width:180px;
        height:205px;
        position:absolute;
        top:0;
        left:0;
        margin-top:-215px;
        border-radius:15px;
        background-color: #66d0f1;
        border-style:solid;
        border-width: 10px;
        border-color: #e0f8ff;
    }       
    .product_detail:hover .textbox {
        margin-top:0;
    }   
    .textbox {
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
        cursor: pointer;        
    }
</style>
<div class="container" 
     style="padding-left: 50px; padding-right: 50px">
    <div class="row">
        <div class="col-lg-12">
            <div id="breakcrumb"
                 style="font-family: RobotoSlabRegular;
                 margin-top: 30px;
                 margin-bottom: 20px;
                 font-size: 14px">
                {breadcrumbs_path}
            </div>
        </div>

        <div class ="col-lg-12" style="margin-bottom: 20px">
            <div class ="col-lg-4" style="padding-left: 0px">
                <img alt="{adver_webname}" src="{linkS}upload/adver/thumb/{adver_logo}" 
                     width = "250"
                     height="200"/>
            </div>
            <div class ="col-lg-8" 
                 style="font-family: RobotoSlabLight; ">
                <h1 style="font-size: 14px !important;">{description_ads}</h1>
            </div>
        </div>

        <div class ="col-lg-12" style="margin-bottom: 20px">            
            <hr style = "margin-top: 10px;
                margin-bottom: 10px;
                border-width:1px;
                border-color:#eee;
                width:100%;
                float:left;
                margin-bottom: 60px">
            <div class="product_main" {display_realtion_product}>
                <!--BEGINLIST_PRODUCTS-->
                <!--BEGIN_PRODUCT-->
                <li>
                    <a class = "list_product_name"
                       href="{linkS}{category}/{product_key}.htm"
                       style = "outline:none;">
                        <div class="product_detail"
                             style="width: 205px; 
                             margin-left: -3px; 
                             margin-bottom: 30px"> 
                            <div class="product_col" style="height:500px">
                                <img src="{linkS}upload/product/thumb/{product_img}" 
                                     width="125"
                                     height="125" 
                                     alt="{product_name}"
                                     style = "margin-left: 25px;
                                     cursor: pointer;
                                     margin-bottom: 10px">
                                <div class="textbox"  
                                     style = "padding-top: 60px; padding-left: 25px">
                                    <img alt="Xem chi tiết" 
                                         src="{linkS}layout/bootstrap/images/xem_chi_tiet.png"
                                         width="110px"
                                         style = "cursor: pointer; 
                                         margin-bottom: 5px">
                                </div>
                                <div class="product_tit">
                                    <div style="font-size: 14px;
                                         color: #929292;
                                         cursor: pointer;                            
                                         font-family: RobotoSlabRegular;
                                         width: 180px">
                                        {product_name}
                                    </div>
                                </div>
                                <div class="product_price" 
                                     style=" cursor: pointer;
                                     font-family:RobotoSlabRegular;
                                     font-size: 14px;
                                     margin-top: 5px;
                                     width: 180px">
                                    {encourage_price}
                                </div>

                                <div class="product_price" 
                                     style=" cursor: pointer;
                                     font-family:RobotoSlabRegular;
                                     font-size: 14px;
                                     margin-top: -15px;
                                     color:black;
                                     text-decoration:line-through;
                                     width: 180px">
                                    {product_price}
                                </div>                            
                            </div>
                        </div>
                    </a>
                </li>
                <!--END_PRODUCT-->
                <!--ENDLIST_PRODUCTS-->
                <div class="col-lg-12">
                    <div style="font-family: RobotoSlabRegular;
                         font-size: 17px;
                         margin-bottom: 50px;
                         text-align: center;
                         {display_no_product}">
                        {no_products}
                    </div>
                </div>

                <hr style = "margin-top: 10px;
                    margin-bottom: 10px;
                    border-width:1px;
                    border-color:#eee;
                    width:100%;
                    float:left;
                    margin-bottom: 40px">
                <div class="col-lg-12">
                    <div style="float: right; 
                         font-family: RobotoSlabRegular;
                         font-size: 14px;
                         margin-top: -5px;
                         margin-bottom: 20px;
                         ">
                        {link_all_product}
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>    
