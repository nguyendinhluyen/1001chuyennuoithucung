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
            $.post("../include/autoSugNameAjax.php", {queryString: ""+inputString+""}, function (data) {
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
        position:absolute;
        float:left;
        top:150px;
        margin-left:175px;
        width:213px;
        background-color:#808080;
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
    <div class = "title" style ="text-indent:5px; font-size:14px"> <b>{lag_product_manager}</b></div>
    <p> </p>
    <div style="margin-left:5px; font-size:12px"> <b>{lag_page} : {page}</b></div>
    <div style="float:left;width:auto;margin:5px;padding-top:10px">
        <b style="font-size:12px; margin-right:50px"> {defaultText}</b>
        <input value = "{productKey}" type="text" size="30" name = "searchfield" id="inputString" onkeyup="lookup(this.value);" onblur="fill();"/>
        <input type ='submit' name ='btnfindMember' value ='Tìm kiếm' class ='button' style="width:70px; height:25px"/>
        <input type ='submit' name ='btnfindAll' value ='Tất cả' class ='button' style="width:70px; height:25px"/>

        <p>
            <b style="font-size:12px; margin-right:15px">Hãy chọn loại thành viên </b>
            <select id = "boloc" name = "boloc" onchange="changeSelect()" style="width: 150px; font-size:14px">
                {option_Name_Of_Group_Member}
            </select>
        </p>
    </div>

    <div class="suggestionsBox" id="suggestions" style="display: none;">

        <div class="suggestionList" id="autoSuggestionsList">
            &nbsp;
        </div>
    </div>
    <div style="clear:both"></div>
    <div style = "float:left">			                                    
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>				
            <div class = "con_title" style = "width:250px;">Họ và tên</div>
            <div class = "con_title" style = "width:120px">Điện thoại</div>
            <div class = "con_title" style = "width:256px;">Email</div>                
            <div class = "con_title" style = "width:175px;">Loại Group Member</div>

        </div>                                                            
        <div>
            <!--BEGINLIST_PRODUCT-->
            <!--BEGIN_PRODUCT-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>

            <div class = "con_list_con" style = "width:250px;background-color:{color};height:30px;">{name}</div>
            <div class = "con_list_con" style = "width:120px;background-color:{color};height:30px">{phone}</div>
            <div class = "con_list_con" style = "width:256px;border:0px;background-color:{color};height:30px">{email}</div>
            <div class = "con_list_con" style = "width:175px;border:0px;background-color:{color};height:30px">
                {type_of_group}
            </div>
            <div class ='clear'></div>
            <!--END_PRODUCT-->
            <!--ENDLIST_PRODUCT-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btnAddGroupMember" value = "Chọn thành viên" onclick="return confirm('{group_member_confirm}');" style="width:100px; height:25px; margin-top: 5px"/>

    <input class = "button" type = "submit" name = "btnRemoveGroupMember" value = "{removeGroupMember}" onclick="return confirm('{remove_member_confirm}');" style="width:100px; height:25px; top: 10px; margin-top: 5px"/>                                         
</form>

<div id=overDiv style="z-index: 1000; visibility: hidden; position: absolute; top: 586px" align=center></div>

