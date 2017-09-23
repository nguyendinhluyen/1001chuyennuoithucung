<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">Quản lý từ khóa</div>
    <div>{lag_page} : {page}</div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:20px">&nbsp;</div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>
            <div class = "con_title" style = "width:130px">Tên trang</div> 
            <div class = "con_title" style = "width:225px">Tiêu đề trang</div>
            <div class = "con_title" style = "width:425px">Từ khóa</div>
        </div>
        <div>
            <!--BEGINLIST_CATSNEWS-->
            <!--BEGIN_CATSNEWS-->
            <div class = "con_list_con" style = "width:20px;background-color:{color};height:30px;">&nbsp;</div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=Optkeywords&id={page_id}&p={p}">{lag_edit}</a></div>
            <div class = "con_list_con" style = "width:130px;background-color:{color};height:30px;">{page_title}</div>
            <div class = "con_list_con" style = "width:225px;background-color:{color};height:30px" title="{title2}">{title}</div>
            <div class = "con_list_con" style = "width:425px;background-color:{color};height:30px" title="{keywords2}">{keywords}</div>

            <div class ='clear'></div>
            <!--END_CATSNEWS-->
            <!--ENDLIST_CATSNEWS-->
        </div>
    </div>
</form>
