<style type="text/css">
    .contentheading a:hover {
        text-decoration:underline;
    }
</style>
<div class="container">    
    <div class="row">
        <div class="col-xs-12 hidden-lg">{category_mobile}</div>
        <div class="col-xs-12 col-lg-9">
            <div class="hidden-xs hidden-sm hidden-md"
                 id="breakcrumb" 
                 style="font-family: RobotoSlabRegular;
                 font-size: 14px;
                 margin-top: 30px;
                 margin-bottom: 20px">{breadcrumbs_path}
                <span style="float:right">
                    <div id='jqxComboBox'></div>
                </span>
            </div>
            <div class="news_main">
                <h1 style="margin-top: 10px;
                    font-size: 23px;
                    font-family:PoetsenOne;
                    color: #ff767c;
                    text-transform: uppercase">{category_selected}</h1>
                <!--BEGINLIST_PROMOTION-->
                <!--BEGIN_PROMOTION-->
                <div class="contentpaneopen">
                    <h2 class="contentheading" style="padding-bottom:10px">
                        <a  href="{linkS}doi-song-pets/{news_key}.htm" 
                            style="color:#000;
                            font-size:23px;
                            font-family:PoetsenOne;
                            outline: none">{news_name}</a>
                    </h2>
                    <div class="article-toolswrap">
                        <div class="article-tools clearfix">
                            <div class="article-meta"
                                 style="margin-bottom: 10px">
                                <span class="createby"
                                      style="color:#5b5b5b;
                                      font-size:13px;
                                      font-family:RobotoSlabLight;">
                                    {person_up}
                                    <span style ="color: #999999">Ngày {date}, Tháng {month}, Năm {year}</span>
                                </span>
                            </div>
                            <div class="fb-like" 
                                 data-href="{linkS}doi-song-pets/{news_key}.htm" 
                                 data-layout="button_count"
                                 data-action="like"
                                 data-show-faces="true" 
                                 data-share="true">
                            </div>  
                        </div>
                    </div>
                    <div class="article-content">
                        <div class="row">
                            <div class="col-xs-5 col-sm-3">
                                <h4>
                                    <a href="{linkS}doi-song-pets/{news_key}.htm"
                                       class="previews">
                                        <img class="img-responsive"
                                             alt="{news_name}"
                                             src="{linkS}upload/news/{news_image}" 
                                             width="100%"
                                             style="-moz-border-radius:20px; 
                                             -webkit-border-radius:20px;
                                             border-radius: 20px;
                                             margin-top: 10px"/>
                                    </a>
                                </h4> 
                            </div>
                            <div class="col-xs-7 col-sm-9"
                                 style="padding-left:0px">
                                <h3 style="text-align:justify;
                                    font-family:RobotoSlabLight;
                                    font-size:14px;
                                    line-height: 23px;
                                    margin-top:15px;">
                                    {news_short}</h3>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-bottom: 30px"/>
                </div>
                <p> </p>
                <!--END_PROMOTION-->
                <!--ENDLIST_PROMOTION-->
            </div><!-- end product_main -->
            <div class="pagination" 
                 align="center" 
                 style="margin-left: auto;
                 margin-right: auto;
                 font-size:14px;
                 margin-bottom: 20px;
                 font-family:RobotoSlabRegular;
                 display:block">{page}</div>
        </div>
        <div class="hidden-xs hidden-sm hidden-md col-lg-3" style="padding-right: 50px">
            <div>
                <img alt="bài viết đọc nhiều nhất"
                     src="{linkS}layout/bootstrap/images/doc_nhieu_nhat.png"
                     style="float: right; 
                     clear: both; 
                     width: 100%; 
                     margin-top: 30px;
                     margin-bottom: 25px;"/>
                <ul style = "padding-left: 15px; clear:both">
                    <!--BEGINLIST_NEWSCATEGORY-->
                    <!--BEGIN_NEWSCATEGORY-->
                    <a href="{linkS}doi-song-pets/{news_key}.htm">
                        <li class="danhmuc_main">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-md-6 col-lg-6">
                                    <img alt="{news_name}"
                                         src="{linkS}upload/news/{news_image}"
                                         width="100"
                                         height="100"
                                         style ="-moz-border-radius:10px; 
                                         -webkit-border-radius:10px;
                                         border-radius: 10px;
                                         margin-right: 10px"/>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <span  style="outline: none; 
                                           font-size: 14px;
                                           font-family: PoetsenOne;
                                           color: #848484;
                                           line-height: 20px">{news_name}</span>
                                </div>
                            </div>
                        </li>
                    </a>
                    <!--END_NEWSCATEGORY-->
                    <!--ENDLIST_NEWSCATEGORY-->
                </ul>
            </div>
            <img  alt="danh mục" 
                  src="{linkS}layout/bootstrap/images/danh_muc_blog.png"
                  style="float: right; 
                  clear: both; 
                  width: 100%;
                  margin-top: 30px;
                  margin-bottom: 20px;"/>
            {category}
            <div id="banner_left"
                 style="margin-left: 15px; 
                 margin-top: 15px">
                <div id="sliderBannerLeft">
                    <div id="SliderNameBannerLeft" class="SliderNameBannerLeft"
                         {left_banner_1}
                </div>
                <script type="text/javascript">
                    //fades,traight,swirl,snake
                    effectsDemo2_1 = 'fades,traight,swirl,snake';
                    var demoSlider_2_1 = Sliderman2.slider({container: 'SliderNameBannerLeft', 
                                                            width: 235, 
                                                            height: 500, 
                                                            effects: effectsDemo2_1,
                    display: {
                            autoplay: 3000,
                            loading: {background: '#000000', opacity: 0.5},
                            buttons: {hide: true, opacity: 1, 
                            prev: {className: 'SliderNamePrevBannerLeft', 
                            label: ''}, 
                            next: {className: 'SliderNameNextBannerLeft', label: ''}}
                    }
                    });
                </script>
            </div>
        </div>
        <!--<div style="margin-left: 5px;
             margin-bottom: 40px;
             width: 245px">{left_facebook_page_plugin}</div>-->
    </div>
</div>
</div>
</div>