<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{title}</div>
    <div>{lag_page} : {page}</div>          
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center">
            </div>

            <div class = "con_title" style = "width:50px">{lag_delete}</div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>

            <div class = "con_title" style = "width:150px;"><a href = './?show=imgGallery&order=name&p={p}' style="text-decoration:underline">Quận (a->z)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=imgGallery&order=name_desc&p={p}'style = "text-decoration:underline">(z->a)</a></span></div>                

            <div class = "con_title" style = "width:160px;"><a href = './?show=imgGallery&order=price_begin_asc&p={p}'style = "text-decoration:underline"> Giá bắt đầu (tăng)</a><span>&nbsp&nbsp-&nbsp </span> <span><a href = './?show=imgGallery&order=price_begin_desc&p={p}'style = "text-decoration:underline">(giảm)</a> </span></div>   				

            <div class = "con_title" style = "width:160px;"><a href = './?show=imgGallery&order=price_end_asc&p={p}' style="text-decoration:underline">Giá kết thúc (tăng)</a><span>&nbsp&nbsp-&nbsp </span> <span><a href = './?show=imgGallery&order=price_end_desc&p={p}'style = "text-decoration:underline">(giảm)</a> </span></a></div>     			

            <div class = "con_title" style = "width:140px;"></div>                                

            <div class = "con_title" style = "width:170px"><a href = './?show=imgGallery&order=fee_ship_asc&p={p}' style="text-decoration:underline">Phí vận chuyển (tăng)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=imgGallery&order=fee_ship_desc&p={p}'style = "text-decoration:underline">(giảm)</a> </span> </div>                

            <div class = "con_title" style = "width:110px"><a href = './?show=imgGallery&order=dateadd&p={p}' style="text-decoration:underline">Ngày (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=imgGallery&order=dateadd_desc&p={p}'style = "text-decoration:underline">(mới)</a> </span></div>
        </div>

        <div>
            <!--BEGINLIST_SUPPORT-->
            <!--BEGIN_SUPPORT-->

            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=imgGallery&action=del&id={galary_id}&order={order_name}&p={p}" onclick="return confirm('Bạn có muốn xóa ?');">{lag_delete}</a></div>

            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=Opt_imgGallery&order={order_name}&id={galary_id}&p={p}">{lag_edit}</a></div>

            <div class = "con_list_con" style = "width:150px;background-color:{color};height:30px;">{galary_name}</div>

            <div class = "con_list_con" style = "width:160px;background-color:{color};height:30px;">{galary_key}</div>

            <div class = "con_list_con" style = "width:160px;background-color:{color};height:30px;">
                <span class="con_list_con" style="width:150px;background-color:{color};height:30px;">{galary_title}</span>
            </div>

            <div class = "con_list_con" style = "width:170px;background-color:{color};height:30px"/>

            <div class = "con_list_con" style = "width:140px;background-color:{color};height:30px;">{galary_keyword}</div>

        </div>
        <div class = "con_list_con" style = "width:110px;background-color:{color};height:30px">{galary_date}</div>
        <div class ='clear'></div>
        <!--END_SUPPORT-->
        <!--ENDLIST_SUPPORT-->
    </div>
</div>
<input class = "button" type = "button" value = "{add}" onclick="window.location = './?show=Opt_imgGallery&order={order_name}&p={page_number}'">

</form>
