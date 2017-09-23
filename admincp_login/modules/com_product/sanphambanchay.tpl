<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script language=Javascript src="../jscript/overlib_mini.js"></script>
<script type="text/javascript" src="../jscript/searchfield/jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
    function lookup(inputString) {
        if (inputString.length == 0) {
            // Hide the suggestion box.
            $('#suggestions').hide();
        } else {
            $.post("../include/autoSugAjax.php", {queryString: ""+inputString+""}, function (data) {
                if (data.length > 0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').html(data);
                }
            });
        }
    } // lookup

    function fill(thisValue) {
        $('#inputString').val(thisValue);
        setTimeout("$('#suggestions').hide();", 200);
    }
</script>
<style type="text/css">

    h3 {
        margin: 0px;
        padding: 0px;	
    }

    .suggestionsBox {
        position: relative;
        left: 0px;
        margin: 10px 0px 0px 0px;
        width: 200px;
        background-color: #212427;
        -moz-border-radius: 7px;
        -webkit-border-radius: 7px;
        border: 2px solid #000;	
        color: #fff;
    }

    .suggestionList {
        margin: 0px;
        padding: 0px;
    }

    .suggestionList li {

        margin: 0px 0px 3px 0px;
        padding: 3px;
        cursor: pointer;
    }

    .suggestionList li:hover {
        background-color: #659CD8;
    }
</style>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_product_manager}</div>
    <div>{lag_page} : {page}</div>
    <div style="float:left;width:450px;margin:5px;padding-top:20px">
        <b>{defaultText}</b>
        <input value = "{productKey}" type="text" size="20" name = "searchfield" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" /><input type ='submit' name ='btnfindProduct' value ='Search' class ='button'/>
    </div>
    <div class="suggestionsBox" id="suggestions" style="display: none;">
        <img src="../style/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
        <div class="suggestionList" id="autoSuggestionsList">
            &nbsp;
        </div>
    </div>
    <div style="margin:5px;padding-top:20px;float:left">Bộ lọc : {catlist}</div>
    <div style="clear:both"></div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:50px">{lag_delete}</div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>				
            <div class = "con_title" style = "width:200px;"><a href = './?show=sanphambanchay&order=name&p={p}' style="text-decoration:underline">{productname} (a->z)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=sanphambanchay&order=name_desc&p={p}'style = "text-decoration:underline">(z->a)</a></span></div>                
            <div class = "con_title" style = "width:80px">{image}</div>
            <div class = "con_title" style = "width:110px;text-decoration:underline"><a href = './?show=sanphambanchay&order=catalogue&p={p}'>{ofcatalogue}</a></div>				
            <div class = "con_title" style = "width:70px;"><a href = './?show=sanphambanchay&order=status&p={p}'style='text-decoration:underline'>{lag_status}</a></div>                
            <div class = "con_title" style = "width:130px;border:0px;"><a href = './?show=sanphambanchay&order=dateadd&p={p}' style="text-decoration:underline">{lag_date_create} (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=sanphambanchay&order=dateadd_desc&p={p}'style = "text-decoration:underline">(mới)</a></span></div>
            <div class = "con_title" style = "width:auto;text-decoration:underline"><a href = './?show=sanphambanchay&order=price_desc&p={p}'>Giá Giảm </a></div>                
            <div class = "con_title" style = "width:auto;text-decoration:none">&nbsp-&nbsp </div>
            <div class = "con_title" style = "width:auto;text-decoration:underline"><a href = './?show=sanphambanchay&order=price_asc&p={p}'> Giá Tăng</a></div>                 				
        </div>
        <div>
            <!--BEGINLIST_PRODUCT-->
            <!--BEGIN_PRODUCT-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=product&action=del&id={id}&p={p}&order={oderby}" onclick="return confirm('{del_confirm} ?');">{lag_delete}</a></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="?show=OptProduct&id={id}&p={p}&order={oderby}">{lag_edit}</a></div>
            <div class = "con_list_con" style = "width:200px;background-color:{color};height:30px;">{product_name}</div>
            <div class = "con_list_con" style = "width:80px;background-color:{color};height:30px;">{product_image}</div>
            <div class = "con_list_con" style = "width:110px;background-color:{color};height:30px;">{categories_id}</div>
            <div class = "con_list_con" style = "width:70px;background-color:{color};height:30px">{products_status}</div>
            <div class = "con_list_con" style = "width:130px;border:0px;background-color:{color};height:30px">{date_added}</div>				                                                             	
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">               
                {price_best_product}                
            </div>                                
            <div class ='clear'></div>
            <!--END_PRODUCT-->
            <!--ENDLIST_PRODUCT-->
        </div>
    </div>
    <input class = "button" style="display:none" type = "submit" name = "btndel" value = "{delete_check}" onclick="return chkdelete('{del_confirm}');">
    <input class = "button" style="display:none" type = "submit" name = "btnstatus" value = "{shi}" onclick = "return chkselected();">
    <input class = "button"  type = "submit" name = "btnencour" value = "Bỏ chọn sản phẩm bán chạy" onclick = "return chkselected();">
    <input class = "button"  style="display:none" type = "submit" name = "btnbest" value = "Sản phẩm đặc trưng" onclick = "return chkselected();">
    <input class = "button" style="display:none" type = "button" value = "Thêm mới" onclick="window.location = './?show=OptProduct'">
</form>
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>