<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
<script language="JavaScript" src='../jscript/jquery.form.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
    $(function () {
        $("#begin_day").datepicker({dateFormat: 'dd-mm-yy',
                                    changeMonth:true,
                                    changeYear: true});
    });
    $(function () {
        $("#end_day").datepicker({dateFormat: 'dd-mm-yy',
                                    changeMonth:true,
                                    changeYear: true});
    });
</script>

<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=Javascript src="../jscript/overlib_mini.js"></script>
<style>
    .multiselect{
        width:170px;
        height:45px;
        border:solid 1px #c0c0c0;
        overflow-y:scroll;
        overflow-x:hidden;
    }
    .multiselect label{
        display:block;
    }
    .multiselect-on{
        color:#ffffff;
        background-color:#000099;
    }
</style>
<script language="JavaScript" type="text/javascript">
    jQuery.fn.multiselect = function () {
        $(this).each(function () {
            var checkboxes = $(this).find("input:checkbox");
            checkboxes.each(function () {
                var checkbox = $(this);
                // Highlight pre-selected checkboxes
                if (checkbox.prop("checked"))
                    checkbox.parent().addClass("multiselect-on");

                // Highlight checkboxes that the user selects
                checkbox.click(function ()
                {
                    if (checkbox.prop("checked"))
                        checkbox.parent().addClass("multiselect-on");
                    else
                        checkbox.parent().removeClass("multiselect-on");
                });
            });
        });
    };
    $(function () {
        $(".multiselect").multiselect();
    });
</script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm"> 
    <div class = "title" style ="text-indent:10px">Quản lý tin tức</div>
    <div>
        <table>
            <tr>
                <td colspan="4"> 
                    {lag_page} : {page}                   
                </td>
            </tr>			
            <tr>    
                <td style="width: 100px">
                    Bộ lọc Copywriters
                </td>
                <td >
                    {memberuserlist}
                </td>
                <td style="width: 100px">
                    &nbsp; Bộ lọc Danh mục
                </td>
                <td>
                    {catlist}
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 100px;">
                    Từ ngày
                </td>
                <td>
                    <input id="begin_day"
                           name="begin_day"
                           type="text"
                           value="{begin_day}"
                           style="margin-bottom:0px; width:115px;"/>
                </td>
                <td style="width: 101px">
                    &nbsp; Đến ngày
                </td>
                <td>
                    <input id="end_day"
                           name="end_day"
                           type="text"
                           value="{end_day}"
                           style="margin-bottom:0px; width:115px;"/>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 100px">
                    Tìm tên bài viết
                </td>
                <td>
                    <input type="text"
                           name="search_name"
                           style = "width: 344px; margin-right: 30px"
                           maxlength="100"
                           value = "{value_search_name}"/>
                </td>
                <td>
                    <input style="width:70px; height:25px;"
                           class = "button"
                           type = "submit"
                           name = "btnSearch"
                           value = "Tìm kiếm"/>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="./?show=checkSchedules" 
                       style="color:blue; text-decoration: underline" 
                       target="_blank"> Xem lịch đăng bài </a> 
                </td>             
            </tr>
        </table>
    </div>    
    <br/>
    <input style="width:80px; height: 25px;{display_delete}"
           class = "button"
           accept=""type = "submit"
           name = "btndel"
           value = "{delete_check}" {status}
           onclick="return chkdelete('{del_confirm}');">

    <input style="width:80px; height: 25px"
           accept=""class = "button"
           type = "button"
           value = "Thêm tin" {status}
           onclick="window.location = './?show=OptNews_news&opt={opt}&p={p}&order={oderby}'">

    <input style="width:80px; height: 25px"
           class = "button"
           type = "submit"
           name = "btnStatus"
           value = "Ẩn/hiển thị"
           onclick = "return chkselected();">

    <input style="width:125px; height: 25px;{display_publish}}"
           class = "button"
           type = "submit"
           name = "btnPublish"
           value = "Đăng bài/Không đăng"
           onclick = "return chkselected();">

    <br/>
    <div style = "float:left;">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center">
                <input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);" >
            </div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>
            <div class = "con_title" style = "width:200px">{a}</div>
            <!--<div class = "con_title" style = "width:90px">Hình ảnh</div>-->
            <div class = "con_title" style = "width:130px">Đã đăng website?</div>
            <div class = "con_title" style = "width:140px;">{thuocdanhmuc}</div>
            <div class = "con_title" style = "width:70px">{lag_status}</div>
            <div class = "con_title" style = "width:130px;border:0px">{date}</div>
            <div class = "con_title" style = "width:80px;border:0px">Trên website</div>
            <!--<div class = "con_title" style = "width:110px;border:0px">{date_modify}</div>-->
        </div>
        <div>
            <!--BEGINLIST_NEWS-->
            <!--BEGIN_NEWS-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:50px;text-align:center">
                <input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}" {chk_disabled} />
            </div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:50px;">
                <a href="?show=OptNews_news&id={id}&p={p}&order={oderby}&opt={opt}">{lag_edit}</a>
            </div>
            <div class = "con_list_con" style = "width:200px;background-color:{color};height:50px;">{news_name}</div>
            <!--<div class = "con_list_con" style = "width:50px;background-color:{color};height:50px;">{news_image}</div>-->
            <div class = "con_list_con" style = "width:90px;background-color:{color};height:50px;">{flag_publish}</div>
            <div class = "con_list_con" style = "width:180px;background-color:{color};height:50px;">
                <div style="{style_display}">{news_catalogue}</div>
            </div>
            <div class = "con_list_con" style = "width:70px;background-color:{color};height:50px">{status}</div>
            <div class = "con_list_con" style = "width:130px;border:0px;background-color:{color};height:50px">{date_added}</div>
            <!--<div class = "con_list_con" style = "width:120px;border:0px;background-color:{color};height:50px">{last_modified}</div>-->
            <div class = "con_list_con" style = "width:80px;border:0px;background-color:{color};height:50px">
                <a href="{link_preview}" style = "color:blue; text-decoration: underline" 
                   target="_blank">Xem trước</a>
            </div>
            <div class ='clear'></div>
            <!--END_NEWS-->
            <!--ENDLIST_NEWS-->
        </div>
    </div>        
</form>                   
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>