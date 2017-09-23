<ul style = "padding-left: 15px" class="hidden-xs hidden-sm">
    <!--BEGINLIST_CATEGORY-->
    <!--BEGIN_CATEGORY-->
    <li class="danhmuc_main">
        <a href="{linkS}tro-giup/{category_key}.html" 
           style="outline: none">{category_name}</a>
    </li>
    <!--BEGINLIST_SUBCATEGORY-->
    <!--BEGIN_SUBCATEGORY-->
    <li class="danhmuc_sub">
        <img src="{linkS}layout/bootstrap/images/pink_triangle.png"
             width="8px"
             height="10px"
             style="{img_danhmuc_sub_display}; margin-right: 3px">
        <a href="{linkS}tro-giup/{category_sub_key}.html"
           style="outline: none"
           class="{id_danhmuc_sub}">{category_sub_name}</a>
    </li>
    <!--END_SUBCATEGORY-->
    <!--ENDLIST_SUBCATEGORY-->
    <!--END_CATEGORY-->
    <!--ENDLIST_CATEGORY-->
</ul>
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
    <ul style="padding-left: 0px">
        <!--BEGINLIST_CATEGORY_MOBILE-->
        <!--BEGIN_CATEGORY_MOBILE-->
        <li class="danhmuc_main_mobile"
            data-toggle="collapse"
            href="#collapsecategory_{id_danhmuc_main}"
            aria-expanded="false"
            aria-controls="collapsecategory_{id_danhmuc_main}">
            <div href="{linkS}{category_key}/" 
                 style="outline:none; cursor: pointer"
                 class="{id_danhmuc_main}">{category_name} &nbsp<span class="caret"></span></div>
        </li>        
        <ul class="main_sub_mobile collapse" id="collapsecategory_{id_danhmuc_main}">
            <!--BEGINLIST_SUBCATEGORY_MOBILE-->
            <!--BEGIN_SUBCATEGORY_MOBILE-->
            <li class="danhmuc_sub" style="margin-left: 0px">
                <img src="{linkS}layout/bootstrap/images/pink_triangle.png"
                     width="8px"
                     height="10px"
                     style="{img_danhmuc_sub_display}; margin-right: 3px">
                <a href="{linkS}tro-giup/{category_sub_key}.html" 
                   style="outline: none" class="{id_danhmuc_sub}">{category_sub_name}</a>
            </li>
            <!--END_SUBCATEGORY_MOBILE-->
            <!--ENDLIST_SUBCATEGORY_MOBILE-->
        </ul>
        <!--END_CATEGORY_MOBILE-->
        <!--ENDLIST_CATEGORY_MOBILE-->
    </ul>
</div>