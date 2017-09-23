<style>
    .noidung_help img {
        display: block;
        width: 90%;
        margin-left: auto;
        margin-right: auto
    }
</style>
<div class="container">
    <div class="row">   
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
        <div class ="col-xs-12 col-md-9">
            <div class="hidden-xs hidden-sm"
                 id="breakcrumb"
                 style="font-size:14px;
                 font-family: RobotoSlabRegular;
                 margin-top: 40px;
                 margin-bottom: 20px">{breadcrumbs_path}</div>
            <form method="post" name="contact" id="contact" enctype="multipart/form-data">
                <div class="tieude_help" style = "margin-bottom: 15px; ">
                    <span style="font-size: 30px; 
                          color: #0099FF; 
                          font-family: PoetsenOne;">{tieude}</span>
                </div>                         
                <div class="noidung_help"
                     style="margin-bottom: 20px;
                     font-family: RobotoSlabLight;
                     font-size: 14px;
                     line-height: 25px">{noidung}</div>
                <div class="col-sm-12 hidden-xs"
                     style="margin-bottom: 50px;
                     margin-top: 20px">
                    <div class="col-xs-6">
                        <div class="center-block" 
                             style="background-color:#ff767c;
                             padding: 10px;
                             font-size: 15px;
                             -moz-border-radius:10px;
                             -webkit-border-radius:10px;
                             border-radius: 10px;
                             text-align: center;
                             width: 50%;
                             font-family: RobotoSlabRegular;
                             float:right">
                            <a href="{linkS}san-pham/" style="color: #ffffff;">Mua Sản Phẩm</a></div>
                    </div>
                    <div class="col-xs-6">
                        <div class="center-block"
                             style="background-color:#ff767c;
                             font-size: 15px;
                             padding: 10px;
                             -moz-border-radius:10px;
                             -webkit-border-radius:10px;
                             border-radius: 10px;
                             text-align: center;
                             width: 50%;
                             font-family: RobotoSlabRegular;
                             float:left">
                            <a href="{linkS}doi-song-pets" style="color: #ffffff;">Đời Sống Pet</a></div>
                    </div>
                </div>
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg"
                     style="margin-bottom: 50px;
                     margin-top: 20px;
                     padding:0px">
                    <div class="col-xs-6" style="padding:0px">
                        <div class="center-block" 
                             style="background-color:#ff767c;
                             padding: 10px;
                             font-size: 15px;
                             -moz-border-radius:10px;
                             -webkit-border-radius:10px;
                             border-radius: 10px;
                             text-align: center;
                             width: 100%;
                             font-family: RobotoSlabRegular;
                             float:right">
                            <a href="{linkS}san-pham/" style="color: #ffffff;">Mua Sản Phẩm</a></div>
                    </div>
                    <div class="col-xs-6" style="padding-right: 0px">
                        <div class="center-block"
                             style="background-color:#ff767c;
                             font-size: 15px;
                             padding: 10px;
                             -moz-border-radius:10px;
                             -webkit-border-radius:10px;
                             border-radius: 10px;
                             text-align: center;
                             width: 100%;
                             font-family: RobotoSlabRegular;
                             float:left">
                            <a href="{linkS}doi-song-pets" style="color: #ffffff;">Đời Sống Pet</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>