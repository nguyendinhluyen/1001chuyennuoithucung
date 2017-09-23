<div class = "title">{addsupport}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <div class = "img_show">
            <img src='../style/images/cat.png' width='60px'/>
        </div>
        <div style="float:left;padding-left:20px">
            <div class ='err'>{error}</div>
            <p>
                <label>{onlinename}</label><input type = 'text' name = 'txtname' class ='fieldinput' value ='{txtname}'>
            </p>
            <p>
                <label><b>Yahoo/Skype</b></label><input type = 'text' name = 'txtim' class ='fieldinput' value ='{txtim}'>
            </p>
            <p>
                <label>{phone}</label><input type = 'text' name = 'txtphone' class ='fieldinput' value ='{txtphone}'>
            </p>
            <p>
                <label>Email</label><input type = 'text' name = 'txtemail' class ='fieldinput' value ='{txtemail}'>
            </p>
            <p>
                <label>{order}</label><input type = 'text' name = 'txtorder' class ='fieldinput' value ='{txtorder}' maxlength ='3'>
            </p>
            <p><label>Skype</label><input style="margin-left:0px;" type = 'checkbox' name = 'check_skype' {check_skype}/></p>
            <p><label>{show} </label><input style="margin-left:0px;" type = 'checkbox' name = 'check_status' {check_status}/></p>

            <p>
                <label>&nbsp;</label><input class = "button" type = "submit" name = "btnsub" value = "Save"/>
                <input class = "button" type = "reset" value = "Reset"/>
            </p>
            <br/>
        </div>
    </form>
</div>