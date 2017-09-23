<ul style = "padding-left: 15px" class="hidden-xs hidden-sm">
    <!--BEGINLIST_CATEGORY-->
    <!--BEGIN_CATEGORY-->

    <!--END_CATEGORY-->
    <!--ENDLIST_CATEGORY-->
    <li class="danhmuc_main">
        <a href="{linkS}gioi-thieu/tat-ca-thuong-hieu.htm" 
           style = "outline:none" 
           class="{id_brand_name_main}">{band_name_product}</a>
    </li>
</ul>
<!--Mobile-->
<div class="selected_category hidden-md hidden-lg" id="selected_category" 
     data-toggle="collapse">
    <img src="{linkS}layout/bootstrap/images/icon_category_mobile.png"
         data-toggle="collapse"
         href="#collapsecategoryparent"
         aria-expanded="false"
         aria-controls="collapsecategoryparent"
         width="30px"
         height="30px"
         style="margin-right:10px; cursor: pointer;">
    <span class="selected_category_text">{selected_category}</span>
</div>
<div class="danhmuc collapse" id="collapsecategoryparent">
    <ul style = "padding-left:0px">
        <!--BEGINLIST_CATEGORY-->
        <!--BEGIN_CATEGORY-->
        <li class="danhmuc_main col-xs-12"
            style="padding:0px; font-family: RobotoSlabBold">
            <a href="{linkS}gioi-thieu/{category_key}.htm" 
               style = "outline:none"
               class="{id_danhmuc_main}">{category_name}</a>
        </li>
        <!--END_CATEGORY-->
        <!--ENDLIST_CATEGORY-->
        <li class="danhmuc_main" style="font-family: RobotoSlabBold">
            <a href="{linkS}gioi-thieu/tat-ca-thuong-hieu.htm" 
               style = "outline:none" 
               class="{id_brand_name_main}">{band_name_product}</a>
        </li>
    </ul>
</div>
<!--End Mobile-->