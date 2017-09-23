<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
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
    <div class = "title">&nbsp;{title}</div>
    <div class = "content_con">
        <div style="float:left;padding-left:5px;width:840px">
            <p>{hello} <b>{username}</b> - {last_login_admin} : {last_login}</p>
            <P>
                <textarea name = "note" class ='textShortContent' style ='width:840px;height:150px'>{note}</textarea>
            </P>
            <input style ='margin-left:808px' type = 'submit' name = 'btnsave' value ='Save' class ='button'/>
            <p>
            <div style="display:none">
                {defaultText}
                <br />
                <input type="text" size="30" name = "searchfield" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" /><input type ='submit' name ='btnfindProduct' value ='Search' class ='button'/>
            </div>
            <div class="suggestionsBox" id="suggestions" style="display: none;">
                <img src="../style/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                <div class="suggestionList" id="autoSuggestionsList">
                    &nbsp;
                </div>
            </div>
            </p>
            <p>
            <p class ='title_report'>
                <b>Server</b></p>
            <p><b>Mysql : </b>{total_mysql}</p>
            <p><b>Servers : </b>{phpos} </p>
            <p><b>PHP Version : </b>{phpver} </p>
            <p><b>MySQL Version : </b>{mysqlver} </p>
            <p><b>GD base version :</b> {gdver} </p>
            </p>


            <p>
            <p class ='title_report'>
                <b>{hislogin}</b>
            </p>
            <div style ='float:left;width:30px'>&nbsp;</div>
            <div style ='float:left;width:100px'>Time</div>
            <div style ='float:left;width:100px'>IP</div>
            <div style ='float:left;width:600px'>Browser</div>
            <div class = 'clear'></div>
            <hr style = 'border:1px #ccc dotted;width:93%'/>
            <!--BEGINLIST_LOG-->
            <!--BEGIN_LOG-->
            <div style ='float:left;width:30px'>{number}</div>
            <div style ='float:left;width:100px'>{time}</div>
            <div style ='float:left;width:100px'>{IPAddress}</div>
            <div style ='float:left;width:600px'>{browser}</div>
            <div class = 'clear'></div>
            <!--END_LOG-->
            <!--ENDLIST_LOG-->
            <hr style = 'border:1px #ccc dotted;width:93%'/>
            </p>
            <input style ='margin-left:680px;float:left; display:none' type = 'submit' name = 'DelAll' value = 'Delete' class = 'button' onclick = "return confirm('{return_conf} ?');">
            <input style ='float:right; margin-right:27px'  type = 'submit' name = 'showAll' value = 'View' class = 'button'>
        </div>
    </div>
</form>