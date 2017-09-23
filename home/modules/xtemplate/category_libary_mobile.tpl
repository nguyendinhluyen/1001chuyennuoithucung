<div class="selected_category" 
     id="selected_category"
     data-toggle="collapse">
    <img src="{linkS}layout/bootstrap/images/icon_category_mobile.png"
         data-toggle="collapse"
         href="#collapsecategoryparent"
         aria-expanded="false"
         aria-controls="collapsecategoryparent"
         width="30px"
         height="30px"
         style="margin-right:10px; cursor: pointer">
    <span class="selected_category_text">{category_selected}</span>
</div>
<!--Begin mobile-->
<div class="danhmuc collapse" id="collapsecategoryparent">
    <ul style = "padding-left: 0px">
        <!--BEGINLIST_CATEGORY_MOBILE-->
        <!--BEGIN_CATEGORY_MOBILE-->
        <li class="danhmuc_main_mobile">
            <a href="{linkS}doi-song-pets/{category_key}/"
               style="outline: none; font-size: 14px; line-height: 25px; color: #275d72"
               class="{id_danhmuc_main}">{category_name} &nbsp<span class="caret"></span></a>
        </li>
        <!--END_CATEGORY_MOBILE-->
        <!--ENDLIST_CATEGORY_MOBILE-->
    </ul>
</div>