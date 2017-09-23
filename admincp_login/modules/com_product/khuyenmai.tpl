<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
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


    $(document).ready(function () {
        $("#time_kuyenmai_ngay").val({time_kuyenmai_ngay});
        $("#time_kuyenmai_thang").val('{time_kuyenmai_thang}');
        $("#time_kuyenmai_nam").val({time_kuyenmai_nam});
        $("#time_kuyenmai_gio").val({time_kuyenmai_gio});
        $("#time_kuyenmai_phut").val({time_kuyenmai_phut});
        $("#time_count").hide();

    });

    function showEdit() {
        $("#time_count").show();
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

<div class = "title" style ="text-indent:10px">{lag_product_manager}</div>
<div>{lag_page} : {page}</div>
<br/>
<div align="left">

    Thời gian hết khuyến mãi : <b style="color: red">{time_khuyenmai}</b> &nbsp;&nbsp;&nbsp; <input type="button" name="edit_time"  id="edit_time" value="Sửa" class="button" onclick="showEdit();" {disabled}/> 
    <div id="time_count">
        <form method="post">

            Ngày 
            <select name='time_kuyenmai_ngay' id='time_kuyenmai_ngay'>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>

            Tháng 
            <select name='time_kuyenmai_thang' id='time_kuyenmai_thang'>
                <option value="Jan">Tháng 1</option>
                <option value="Feb">Tháng 2</option>
                <option value="Mar">Tháng 3</option>
                <option value="Apr">Tháng 4</option>
                <option value="May">Tháng 5</option>
                <option value="Jun">Tháng 6</option>
                <option value="Jul">Tháng 7</option>
                <option value="Aug">Tháng 8</option>
                <option value="Sep">Tháng 9</option>
                <option value="Oct">Tháng 10</option>
                <option value="Nov">Tháng 11</option>
                <option value="Dec">Tháng 12</option>
            </select>
            Năm
            <select name='time_kuyenmai_nam' id='time_kuyenmai_nam'>
                {list_nam}
            </select>
            Giờ
            <select name='time_kuyenmai_gio' id='time_kuyenmai_gio'>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
            </select>
            Phút
            <select name='time_kuyenmai_phut' id='time_kuyenmai_phut'>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">24</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
            </select>
            <input type="submit" value="Lưu" name="save_khuyenmai" class="button"/>
        </form>
    </div>
</div>
<form method='POST' enctype='multipart/form-data' id = "frm1" name = "frm1">
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

            <div class = "con_title" style = "width:200px;"><a href = './?show=khuyenmai&order=name&p={p}' style="text-decoration:underline">{productname} (a->z)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=khuyenmai&order=name_desc&p={p}'style = "text-decoration:underline">(z->a)</a></span></div>     

            <div class = "con_title" style = "width:80px">{image}</div>
            <div class = "con_title" style = "width:110px;text-decoration:underline"><a href = './?show=khuyenmai&order=catalogue&p={p}'>{ofcatalogue}</a></div>

            <div class = "con_title" style = "width:70px;"><a href = './?show=khuyenmai&order=status&p={p}'style='text-decoration:underline'>{lag_status}</a></div>

            <div class = "con_title" style = "width:130px;border:0px;"><a href = './?show=khuyenmai&order=dateadd&p={p}' style="text-decoration:underline">{lag_date_create} (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=khuyenmai&order=dateadd_desc&p={p}'style = "text-decoration:underline">(mới)</a></span></div>

            <div class = "con_title" style = "width:auto;text-decoration:underline"><a href = './?show=khuyenmai&order=price_desc&p={p}'>Giá Giảm </a></div>

            <div class = "con_title" style = "width:auto;text-decoration:none">&nbsp-&nbsp </div>

            <div class = "con_title" style = "width:auto;text-decoration:underline"><a href = './?show=khuyenmai&order=price_asc&p={p}'> Giá Tăng</a></div>


            <!--<div class = "con_title" style = "width:110px;border:0px"><input type="submit" name="btnsort" value="Sắp xếp" class="button" /></div>-->


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
            <div class = "con_list_con" style = "width:66px;background-color:{color};height:30px">{products_status}</div>
            <div class = "con_list_con" style = "width:135px;border:0px;background-color:{color};height:30px">{date_added}</div>				                

            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">
             <!--<input type="text" name="sort_order[]" value="{sort_order}" size="8" />
             <input type="hidden" name="products_id[]" value="{id}" />-->
                {encourprice_product}
            </div>

<!--<div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:30px">
<input type="text" name="sort_order[]" value="{sort_order}" size="8" />
<input type="hidden" name="products_id[]" value="{id}" />
</div>-->
            <div class ='clear'></div>
            <!--END_PRODUCT-->
            <!--ENDLIST_PRODUCT-->
        </div>
    </div>
    <input class = "button" style="display:none" type = "submit" name = "btndel" value = "{delete_check}" onclick="return chkdelete('{del_confirm}');">
    <input class = "button" style="display:none" type = "submit" name = "btnstatus" value = "{shi}" onclick = "return chkselected();">
    <input class = "button" style="display:none"  style="display:none" type = "submit" name = "btnnew" value = "Sản phẩm mới" onclick = "return chkselected();">
    <input class = "button"   type = "submit" name = "btnencour" value = "Bỏ chọn khuyến mãi" onclick = "return chkselected();">
    <input class = "button"  style="display:none" type = "submit" name = "btnbest" value = "Sản phẩm đặc trưng" onclick = "return chkselected();">
    <input class = "button" style="display:none" type = "button" value = "Thêm mới" onclick="window.location = './?show=OptProduct'">
</form>
<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>