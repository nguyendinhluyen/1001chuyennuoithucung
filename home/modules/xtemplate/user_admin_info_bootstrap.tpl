<style>
    a:hover, a:link {
        text-decoration: none;
    }
</style>
<div class="container">
    <div class="col-xs-12 hidden-xs hidden-sm hidden-md"
         style="padding-left: 0px">
        <div id="breakcrumb"
             style="font-family: RobotoSlabRegular;
             font-size:14px;
             margin-top: 30px;
             margin-bottom: 25px">{breadcrumbs_path}</div>
    </div>    
    <div class="row">
        <div class="col-xs-12 col-lg-3"
             style="margin-top: 20px; 
             margin-bottom: 20px">
            <img alt="{name}"
                 class="img-circle hidden-xs hidden-sm hidden-md"
                 src="{linkS}upload/avatar/{avatar}"
                 style="width: 100%; 
                 display: block;
                 margin-left: auto;
                 margin-right: auto"
                 title="{name}">
            <img alt="{name}"
                 class="img-circle hidden-lg"
                 src="{linkS}upload/avatar/{avatar}"
                 style="width: 50%; 
                 display: block;
                 margin-left: auto;
                 margin-right: auto"
                 title="{name}">
        </div>
        <div class="col-xs-12 col-md-9"
             style="font-family:PoetsenOne;
             font-size: 25px;
             line-height: 30px;
             color: #8f8f8f">
            <div>{name}</div>
            <div style="margin-top: 10px; margin-bottom: 10px">
                <a href="{facebook}" target="blank">
                    <img alt="facebook"
                         src="{linkS}layout/bootstrap/images/facebook_grey.png"
                         title="Facebook {name}"
                         height="35px"></a>
                <a href="{google}" target="blank">
                    <img alt="google+"
                         src="{linkS}layout/bootstrap/images/google_grey.png"
                         title="Google+ {name}"
                         height="35px"></a>
                <a href="{twitter}" target="blank">
                    <img alt="twitter"
                         src="{linkS}layout/bootstrap/images/twitter_grey.png"
                         title="Twitter {name}"
                         height="35px"></a>
                <a href="{linkedin}" target="blank">
                    <img alt="linkedIn" 
                         src="{linkS}layout/bootstrap/images/linkedin_grey.png"
                         title="Linkedin {name}"
                         height="35px"></a>
            </div>            
            <div style="clear: both; 
                 font-family: RobotoSlabLight; 
                 font-size: 15px; 
                 line-height: 40px; 
                 color:#8f8f8f;
                 margin-bottom: 10px">
                <img alt="email"
                     src="{linkS}layout/bootstrap/images/email.png">
                {email}
            </div>
            <div style="clear: both;
                 line-height: 25px;
                 font-size: 14px;
                 font-family: RobotoSlabLight;
                 text-align: justify">{short_content}</div>
        </div>
    </div>    
</div>
<div class="container">
    <div class="news_main">
        <!--BEGINLIST_PROMOTION-->
        <!--BEGIN_PROMOTION-->
        <hr style="color: #b0aaaa; 
            clear: both;
            margin-top: 30px">
        <div class="col-xs-12" style="padding: 0px">
            <h2 class="contentheading"
                style="padding-bottom:10px">
                <a href="{linkS}doi-song-pets/{news_key}.htm"
                   style="color:#000;
                   font-size:23px;
                   font-family:PoetsenOne;
                   outline: none">{news_name}</a>
            </h2>
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
            <h4 class="col-xs-6 col-sm-3"
                style="padding-left: 0px">
                <a href="{linkS}doi-song-pets/{news_key}.htm" 
                   class="previews">
                    <img alt="{news_name}"
                         src="{linkS}upload/news/{news_image}"
                         width="100%"
                         style="-moz-border-radius:20px; 
                         -webkit-border-radius:20px;
                         border-radius: 20px;
                         margin-top: 10px;
                         padding-left: 0px"/></a>
            </h4>
            <h3 class="col-xs-6 col-sm-9"
                style="text-align: justify;
                font-family: RobotoSlabLight;
                font-size: 14px;
                line-height: 23px;
                margin-top: 20px;
                padding: 0px">{news_short}</h3>            
        </div>  

        <!--END_PROMOTION-->
        <!--ENDLIST_PROMOTION-->
    </div>
    <div class="pagination col-xs-12"
         align="center" 
         style="margin-left: auto;
         margin-right: auto;
         font-size:14px;
         font-family:RobotoSlabRegular;
         display:block;
         margin-bottom: 20px">{page}</div>
</div>