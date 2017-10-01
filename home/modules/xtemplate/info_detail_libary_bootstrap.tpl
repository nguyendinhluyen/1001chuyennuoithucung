<style>
    a:hover, a:link{
        text-decoration: none;
    }
    #sharefacebook_icon a img{
        opacity: 0.8;
    }
    #sharefacebook_icon a:hover img {
        opacity: 1;
    }
    #sharefacebook_icon a:hover {
        text-decoration: none;
    }
    #sharefacebook_icon a:active {
        text-decoration: none;
    }
    #sharefacebook_icon a:link {
        text-decoration: none;
    }
    #ShareButton{
        padding-bottom: 10px;
    }
    #stretch{
        padding-bottom: 10px;
    }
    #line{
        height:1px;
        margin-left: 100px;
        margin-right: 100px;
        color:#CCF;
        box-shadow: 0 0 2px #B0ACFB;
        margin-bottom: 10px;
        -moz-box-shadow: 0 0 2px #B0ACFB;
        -webkit-box-shadow: 0 0 2px#B0ACFB;
    }
    #twitter-widget-0{
        width:80px !important;
    }    
    .fb_iframe_widget_fluid {
        display: inline-block !important;
    }
    .article-content-container img {
        width: 90%;
        display:block;
        margin-left: auto;
        margin-right: auto
    }
</style>
<div class="container">
    <div class ="row">
        <div class="col-sx-12 col-lg-9">
            <div id="breakcrumb"
                 class="hidden-xs hidden-sm hidden-md"
                 style="font-family: RobotoSlabRegular;
                 font-size:14px;
                 margin-top: 30px;
                 margin-bottom: 15px">{breadcrumbs_path}</div>
            <!--Main content page-->
            <div class="news_main_libary">
                <h1 class="contentheading"
                    style="font-family:PoetsenOne;
                    font-size: 30px;
                    margin-top: 20px;
                    margin-bottom: 10px">{news_name}</h1>
                <div style="margin-bottom:10px;
                     color:black;
                     font-size:14px;
                     font-family: RobotoSlabRegular">
                    <span style="color:#999999;
                          font-family:RobotoSlabLight">{date_added}</span>
                </div>
                <div style="color:blue;
                     font-size:14px;
                     font-family:RobotoSlabRegular;
                     margin-top:20px">
                    <span style="color:black;">Chuyên Mục:&nbsp;</span>
                    <span style="text-decoration: none;
                          line-height: 20px;
                          color: #999999">{chuyen_muc}</span>
                </div>
                <div style="color:blue;
                     font-size:14px;
                     font-family:RobotoSlabRegular;
                     margin-top: 10px">
                    <span style="color:black;">Từ khóa bài viết:&nbsp;</span>
                    <span style="text-decoration: none;
                          line-height: 20px;
                          color: #999999">{author}</span>
                </div>
                <div style="margin-top:10px;
                     padding-left: 0px"
                     class="col-lg-8">
                    <span class="fb-like"
                          data-href="{linkSf}{news_key}.htm"
                          data-layout="button_count"
                          data-action="like"
                          data-show-faces="false"
                          data-share="false">
                    </span>
                    <span class="g-plusone" data-size="medium"></span>
                    <span>
                        <a href="{linkSf}{news_key}.htm" class="twitter-share-button">Tweet</a>
                    </span>
                </div>
                <div style="text-align: right;
                     padding-right: 0px;
                     padding-bottom: 20px"
                     class="hidden-xs hidden-sm hidden-md col-lg-4">
                    <span id="sharefacebook_icon"
                          style="margin-right:5px">
                        <a  target="_blank"
                            href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]={linkSf}&amp;p[images][0]={linkSf}upload/news/{facebook_news_image}&amp;p[title]={news_name}+&amp;p[summary]={news_shortcontent}"                                                                                             
                            ref="nofollow">
                            <img alt="facebook"
                                 src="{linkS}layout/images/facebook-icon.png"
                                 title="Chia sẻ Facebook"
                                 width="40px"/>
                        </a>
                    </span>
                    <span id="sharefacebook_icon"
                          style="margin-right:5px">
                        <a  href="https://plus.google.com/share?url={linkSf}{news_key}.htm"
                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                                            ;
                                            return false;"
                            ref="nofollow">
                            <img alt="google+"
                                 src="{linkS}layout/images/google-plus-icon.png"
                                 title="Chia sẻ Google+"
                                 width="40px"/>
                        </a>
                    </span>
                    <span id="sharefacebook_icon"
                          style="margin-right:5px">
                        <a href="https://twitter.com/intent/tweet?text={news_name_twitter}&url={linkSf}{news_key}.htm&related=episod"
                           ref="nofollow">
                            <img alt="tweet"
                                 src="{linkS}layout/images/twitter-icon.png"
                                 title="Chia sẻ Tweet"
                                 width="40px"/>
                        </a>
                    </span>
                    <span id="sharefacebook_icon">
                        <a href="http://www.linkedin.com/shareArticle?mini=true&url={linkSf}{news_key}.htm&title={news_name}&summary={news_shortcontent}&source=nanapet.com"
                           onclick="NewWindow(this.href, 'template_window', '550', '400', 'yes', 'center');
                                   return false"
                           onfocus="this.blur()"
                           target="_blank"
                           rel="nofollow">
                            <img alt="linkedIn"
                                 src="{linkS}layout/images/linkedIn-icon.png"
                                 title="Chia sẻ LinkedIn"
                                 width="40px"/>
                        </a>
                    </span>
                </div>
                <div class="row">
                    <hr style="color: #999999;
                        margin-left: 15px;
                        margin-right: 15px;
                        clear: both">
                    <div class="col-sx-6 col-md-3">
                        <a href="{linkS}cong-tac-vien/{idadmin}.html/page=0"
                           ref="nofollow">
                            <img class="img-circle hidden-xs hidden-sm"
                                 alt="{name}"
                                 src="{linkS}upload/avatar/{avata}"
                                 style="width: 100%;
                                 clear: both;
                                 display: block;
                                 margin-left: auto;
                                 margin-right: auto">
                            <img class="img-circle hidden-md hidden-lg"
                                 alt="{name}"
                                 src="{linkS}upload/avatar/{avata}"
                                 style="width: 30%;
                                 clear: both;
                                 display: block;
                                 margin-left: auto;
                                 margin-right: auto">
                        </a>
                        <div style="font-family: PoetsenOne;
                             text-align: center;
                             font-size: 17px;
                             line-height: 30px;
                             margin-top: 10px">
                            <a style="color: black; text-transform: uppercase"
                               href="{linkS}cong-tac-vien/{idadmin}.html/page=0"
                               ref="nofollow">{name}
                            </a>
                        </div>
                        <div style="text-transform: uppercase;
                             font-family:RobotoSlabRegular;
                             text-align: center;
                             color: #8f8f8f;
                             margin-bottom: 20px">
                            Copywriter
                        </div>
                        <div style="font-family: RobotoSlabLight;
                             text-align: center;
                             font-size: 14px;
                             line-height: 25px;
                             padding-bottom: 10px">
                            {short_content}
                        </div>
                        <div {display_1}>
                            <span>
                                <img alt="blue point"
                                     src="{linkS}layout/bootstrap/images/bluePoint.png"
                                     style="width: 15px; margin-right: 10px">
                            </span>
                            <span>
                                <a style="font-family: RobotoSlabRegular;
                                   text-align: justify;
                                   font-size: 14px;
                                   line-height: 25px;"
                                   href="{linkS}doi-song-pets/{relation_news_key_1}.htm">{relation_news_1}</a>
                            </span>
                        </div>
                        <div {display_2}>
                            <span>
                                <img alt="blue point"
                                     src="{linkS}layout/bootstrap/images/bluePoint.png"
                                     style="width: 15px; margin-right: 10px">
                            </span>
                            <span>
                                <a style="font-family: RobotoSlabRegular;
                                   text-align: justify;
                                   font-size: 14px;
                                   line-height: 25px;"
                                   href="{linkS}doi-song-pets/{relation_news_key_2}.htm">{relation_news_2}</a>
                            </span>
                        </div>
                        <div {display_3}>
                            <span>
                                <img alt="blue point"
                                     src="{linkS}layout/bootstrap/images/bluePoint.png"
                                     style="width: 15px; margin-right: 10px">
                            </span>
                            <span>
                                <a style="font-family: RobotoSlabRegular;
                                   text-align: justify;
                                   font-size: 14px;
                                   line-height: 25px;"
                                   href="{linkS}doi-song-pets/{relation_news_key_3}.htm">{relation_news_3}</a>
                            </span>
                        </div>
                        <div {display_4}>
                            <span>
                                <img alt="blue point"
                                     src="{linkS}layout/bootstrap/images/bluePoint.png"
                                     style="width: 15px; margin-right: 10px">
                            </span>
                            <span>
                                <a  style="font-family: RobotoSlabRegular;
                                    text-align: justify;
                                    font-size: 14px;
                                    line-height: 25px;"
                                    href="{linkS}doi-song-pets/{relation_news_key_4}.htm">{relation_news_4}</a>
                            </span>
                        </div>
                        <div {display_5}>
                            <span>
                                <img alt="blue point"
                                     src="{linkS}layout/bootstrap/images/bluePoint.png"
                                     style="width: 15px; margin-right: 10px">
                            </span>
                            <span>
                                <a style="font-family: RobotoSlabRegular;
                                   text-align: justify;
                                   font-size: 14px;
                                   line-height: 25px"
                                   href="{linkS}doi-song-pets/{relation_news_key_5}.htm">{relation_news_5}</a>
                            </span>
                        </div>
                    </div>
                    <div class="article-content col-sm-12 col-md-9"
                         style="line-height:25px;
                         font-size: 14px;
                         padding-top: 5px;">
                        <span class="article-content-container"
                              style="text-align:justify;
                              font-family:RobotoSlabRegular;">
                            {news_content}
                        </span>
                        <div style="margin-bottom:10px;
                             padding-top:10px;
                             color:#7F1F00;
                             font-size:14px;
                             font-family:RobotoSlabRegular">
                            <div style="text-align:left;">                                
                                <hr style="margin-top: 0.5em;
                                    margin-bottom: 0.5em;
                                    margin-left: auto;
                                    margin-right: auto;
                                    color: #999999;">
                                <div style="color:black;
                                     font-size:14px;
                                     width: 100%;
                                     line-height: 35px">
                                    Nguồn tham khảo:&nbsp;
                                </div>
                                <div style="font-size:14px;
                                     color:#337ab7;
                                     line-height:25px;">
                                    {linkResource}
                                </div>
                            </div>
                            <hr style="margin-top: 0.5em;
                                margin-bottom: 0.5em;
                                margin-left: auto;
                                margin-right: auto;
                                color: #999999">
                            <div class="col-sm-12 col-sx-12 col-md-8 col-lg-8"
                                 style="padding-left: 0px; margin-top: 10px">
                                <span class="fb-like"
                                      data-href="{linkSf}{news_key}.htm"
                                      data-layout="button_count"
                                      data-action="like"
                                      data-show-faces="false"
                                      data-share="false">
                                </span>
                                <span class="g-plusone" data-size="medium" ></span>
                                <span>
                                    <a href="{linkSf}{news_key}.htm" class="twitter-share-button">Tweet</a>
                                </span>
                            </div>
                            <div class="hidden-xs hidden-sm col-md-4"
                                 style="padding-right:0px;
                                 text-align: right">
                                <div style="margin-bottom: 10px; margin-top: 10px">
                                    <span id = "sharefacebook_icon"
                                          style = "margin-right:5px">
                                        <a  target="_blank"
                                            href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]={linkSf}&amp;p[images][0]={linkSf}upload/news/{facebook_news_image}&amp;p[title]={news_name}+&amp;p[summary]={news_shortcontent}"
                                            ref="nofollow">
                                            <img alt="facebook"
                                                 src="{linkS}layout/images/facebook-icon.png"
                                                 title="Chia sẻ Facebook"
                                                 width="40px"/>
                                        </a>
                                    </span>
                                    <span id = "sharefacebook_icon"
                                          style = "margin-right:5px">
                                        <a  href="https://plus.google.com/share?url={linkSf}{news_key}.htm"
                                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                                                    ;
                                                    return false;"
                                            ref="nofollow">
                                            <img alt="google+"
                                                 src="{linkS}layout/images/google-plus-icon.png"
                                                 title="Chia sẻ Google+"
                                                 width="40px"/>
                                        </a>
                                    </span>
                                    <span id = "sharefacebook_icon"
                                          style = "margin-right:5px">
                                        <a href="https://twitter.com/intent/tweet?text={news_name_twitter}&url={linkSf}{news_key}.htm&related=episod"
                                           ref="nofollow">
                                            <img alt="tweet"
                                                 src="{linkS}layout/images/twitter-icon.png"
                                                 title="Chia sẻ Tweet"
                                                 width="40px"/>
                                        </a>
                                    </span>
                                    <span id = "sharefacebook_icon">
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url={linkSf}{news_key}.htm&title={news_name}&summary={news_shortcontent}&source=nanapet.com"
                                           onclick="NewWindow(this.href, 'template_window', '550', '400', 'yes', 'center');
                                                   return false"
                                           onfocus="this.blur()"
                                           target="_blank"
                                           rel="nofollow" >
                                            <img alt="linkedIn"
                                                 src="{linkS}layout/images/linkedIn-icon.png"
                                                 title="Chia sẻ LinkedIn"
                                                 width="40px"/>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id = "stretch">                    
                    <div class="relation_chuyen_muc row">
                        <div class="col-lg-6 col-md-6">
                            <hr style="margin-top: 10px;
                                margin-bottom: 5px;
                                margin-left: auto;
                                margin-right: auto;
                                color: #999999">
                            <div style="background-color: #f1fdfb;
                                 padding-top: 10px;
                                 padding-bottom: 10px;
                                 margin-bottom: 15px;
                                 color: #48817a;
                                 font-size: 14px;
                                 font-family: RobotoSlabRegular;
                                 clear:both;
                                 padding-left: 10px">BÀI CÙNG CHUYÊN MỤC</div>
                            <div>
                                <ul style = "padding-left: 0px; clear:both">
                                    <!--BEGINLIST_NEWSCHUYENMUC-->
                                    <!--BEGIN_NEWSCHUYENMUC-->
                                    <li class="danhmuc_main">
                                        <a href="{linkS}doi-song-pets/{news_key}.htm"
                                           style="outline: none;
                                           font-size: 14px;
                                           font-family: RobotoSlabLight;
                                           color: black;
                                           text-transform: initial;
                                           color: #337ab7">
                                            {news_name}
                                        </a>
                                    </li>
                                    <!--END_NEWSCHUYENMUC-->
                                    <!--ENDLIST_NEWSCHUYENMUC-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <hr style="margin-top: 10px;
                                margin-bottom: 5px;
                                margin-left: auto;
                                margin-right: auto;
                                color: #999999">
                            <div style="background-color: #f1fdfb;
                                 padding-top: 10px;
                                 padding-bottom: 10px;
                                 margin-bottom: 15px">
                                <span style="color: #48817a;
                                      font-size: 14px;
                                      font-family: RobotoSlabRegular;
                                      margin-left: 10px;">BÀI MỚI ĐĂNG</span>
                            </div>
                            <div>
                                <ul style = "padding-left: 0px; clear:both">
                                    <!--BEGINLIST_LASTETSNEWS-->
                                    <!--BEGIN_LASTETSNEWS-->
                                    <li class="danhmuc_main">
                                        <a href="{linkS}doi-song-pets/{news_key}.htm"
                                           style="outline: none;
                                           font-size: 14px;
                                           font-family: RobotoSlabLight;
                                           color: black;
                                           text-transform: initial;
                                           color: #337ab7">{news_name}</a>
                                    </li>
                                    <!--END_LASTETSNEWS-->
                                    <!--ENDLIST_LASTETSNEWS-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-xs hidden-sm hidden-md">
                        <hr style="margin-top: 10px;
                            margin-bottom: 5px;
                            margin-left: auto;
                            margin-right: auto;
                            color: #999999;">
                        <div style="background-color: #f1fdfb; padding-top: 10px; padding-bottom: 10px">
                            <span style="color: #48817a;
                                  font-size: 14px;
                                  font-family: RobotoSlabRegular;
                                  margin-left: 10px;">THẢO LUẬN BÀI VIẾT</span>
                        </div>
                        <div class="fb-comments"
                             data-href="{linkSf}{news_key}.htm"
                             data-numposts="5"
                             data-width ="810">
                        </div>
                    </div>
                </div>
            </div><!-- end product_main -->
            <!--End main content page-->
        </div>
        <div class="hidden-xs hidden-sm hidden-md col-lg-3">
            <div>
                <img alt="đọc nhiều nhất"
                     src="{linkS}layout/bootstrap/images/doc_nhieu_nhat.png"
                     style="float: right;
                     clear: both;
                     width: 100%;
                     margin-top: 30px;
                     margin-bottom: 5px;"/>
                <ul style = "padding-left: 15px; clear:both">
                    <!--BEGINLIST_NEWSCATEGORY-->
                    <!--BEGIN_NEWSCATEGORY-->
                    <a href="{linkS}doi-song-pets/{news_key}.htm">
                        <li class="danhmuc_main">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img alt="{news_name}"
                                         src="{linkS}upload/news/{news_image}"
                                         width="100"
                                         height="90"
                                         style ="-moz-border-radius:10px;
                                         -webkit-border-radius:10px;
                                         border-radius: 10px;
                                         margin-top: 20px;
                                         margin-right: 10px"/>
                                </div>
                                <div class="col-lg-6" style="margin-top: 15px">
                                    <span style="outline: none;
                                          font-size: 14px;
                                          font-family: PoetsenOne;
                                          color: #848484;
                                          line-height: 25px;">
                                        {news_name}
                                    </span>
                                </div>
                            </div>
                        </li>
                    </a>
                    <!--END_NEWSCATEGORY-->
                    <!--ENDLIST_NEWSCATEGORY-->
                </ul>
            </div>
            <img alt="danh mục"
                 src="{linkS}layout/bootstrap/images/danh_muc_blog.png"
                 style="float: right;
                 clear: both;
                 width: 100%;
                 margin-top: 30px;
                 margin-bottom: 20px;"/>{category}
            <div id="banner_left" style="margin-left: 15px; margin-top: 15px">
                <div id="sliderBannerLeft">
                    <div id="SliderNameBannerLeft" class="SliderNameBannerLeft">
                        {left_banner_1}
                    </div>
                    <script type="text/javascript">
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

        </div>
    </div>
</div><!-- end blog -->
<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer>
    {lang: 'vi'}
</script>
<script>
    !function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id))
        {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');
</script>

<script src="//platform.linkedin.com/in.js" type="text/javascript">
    lang: en_US
</script>