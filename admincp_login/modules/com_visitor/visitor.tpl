<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->

<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style="text-indent:10px;line-height:20px">{title}</div>
    <div class = "content_con" style='padding:5px'>
        <p><label><b>Thống kê trong : </b></label>{dl_visitor} </p>
        <div style='margin-top:10px'>
            <!--BEGINLIST_VISITOR-->
            <!--BEGIN_VISITOR-->
            <div style='float:left;height:40px'>
                <div class='visitor_day'>Ngày {day_mon}</div><div class='visitor_result' style='background-image:url(../style/images/poll/poll_body_{color}.png);width:{width}px'></div><div class='visitor_header' style='background-image:url(../style/images/poll/poll_header_{color}.png);width:5px'></div><div class='visitor'>{visitor} lượt truy cập {percent}</div>
            </div>
            <div class='clear'></div>
            <!--END_VISITOR-->
            <!--ENDLIST_VISITOR-->

        </div>
    </div>
</form>