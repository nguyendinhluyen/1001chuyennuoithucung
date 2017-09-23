<style>
    .noidung_help img {
        display: block;
        width: 90%;
        margin-left: auto;
        margin-right: auto
    }
</style>
<div class ="container">
    <div class ="row">
        <div class="col-xs-12 col-md-3"
             style="padding-left: 20px">
            <img class="hidden-xs hidden-sm" 
                 alt="Hỗ trợ" 
                 src="{linkS}layout/bootstrap/images/ho_tro.png"
                 style="float: left;
                 clear: both; 
                 width: 90%;
                 margin-top: 30px;
                 margin-bottom: 20px;">{category}
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="hidden-xs hidden-sm" 
                 id="breakcrumb"
                 style="font-size:14px;
                 font-family: RobotoSlabRegular;
                 margin-top: 30px;
                 margin-bottom: 15px">{breadcrumbs_path}
            </div>                                                
            <div class="tieude_help" style="margin-bottom: 15px">
                <span style="font-size: 30px;
                      color: #0099FF;
                      font-family: PoetsenOne;">{tieude}</span>
            </div>
            <div class="noidung_help"
                 style="margin-bottom: 20px;
                 font-family: RobotoSlabLight;
                 line-height:25px;
                 font-size: 14px;
                 line-height: 25px">{noidung}
            </div>
        </div>
    </div>
</div>