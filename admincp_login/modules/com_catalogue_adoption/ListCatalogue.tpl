<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script src="../jscript/prototype.js" type="text/javascript"></script>
<script>
    var url = '../include/EditAjax.php';
    Event.observe(window, 'load', init, false);

    function init()
    {
    {makeEditable}
    }

    // opt=1:name;2:order;3:status;4:parent_name
    function makeEditable(id, opt)
    {
                    Event.observe(id, 'click', function (){edit($(id),$(opt))}, false
                    );
                    Event.observe(id, 'mouseover', function (){showAsEditable($(id))}, false);
                    Event.observe(id, 'mouseout', function (){showAsEditable($(id), true)}, false
                    );
                }

                function edit(obj, opt)
                {
                    Element.hide(obj);
                    var textarea = "";
                    if (opt == 1)
                    {
                        textarea = '<div style=float:left;width:168px id="' + obj.id + '_editor"><input id="' + obj.id + '_name" name="' + obj.id + '" value = "' + trim(obj.innerHTML) + '"' + 'style=height:28px;width:168px;border:1px' + '>';
                    } else if (opt == 2)
                    {
                        textarea = '<div style=float:left;width:68px id="' + obj.id + '_editor"><input id="' + obj.id + '_order" name="' + obj.id + '" value = "' + trim(obj.innerHTML) + '"' + 'style=height:28px;width:68px;border:1px' + '>';
                    } else if (opt == 3)
                    {
                        textarea = '<div style=float:left;width:88px; id="' + obj.id + '_editor"><select id="' + obj.id + '_status" name="' + obj.id + '" style="height:28px;width:88px"><option value=' + '1' + '>Hiển thị</option><option value=' + '0' + '>Ẩn đi</option></select>';
                    } else if (opt == 4)
                    {
                                textarea = "<div style=float:left;width:168px; id=" + obj.id + '_editor' + ">{dl_subcats}";
                            }
                            var button = '<div style="align:center;position:absolute"><input id="' + obj.id + '_save" type="button" value="Save" class ="button" /> <input id="' + obj.id + '_cancel" type="button" value="Cancel" class ="button" /></div></div>';
                            new Insertion.After(obj, textarea + button);
                            Event.observe(obj.id + '_save', 'click', function (){saveChanges(obj,opt)}, false
                            );
                            Event.observe(obj.id + '_cancel', 'click', function (){cleanUp(obj)}, false
                            );
                        }

                        function showAsEditable(obj, clear) {
                            if (!clear) {
                                Element.addClassName(obj, 'editable');
                            } else {
                                Element.removeClassName(obj, 'editable');
                            }
                        }

                        function saveChanges(obj, opt) {
                                    var new_content = "";
                                    if (opt == 1)
                                        new_content = document.getElementById(obj.id + '_name').value;
                                    else if (opt == 2)
                                        new_content = document.getElementById(obj.id + '_order').value;
                                    else if (opt == 3)
                                        new_content = document.getElementById(obj.id + '_status').value;
                                    else if (opt == 4)
                                        new_content = document.getElementById('dl_subcats').value;
                                    obj.innerHTML = "Saving...";
                                    cleanUp(obj, true);

                                    var success = function (t){editComplete(t, obj);}
                                    var failure = function (t){editFailed(t, obj);}
                                    var pars = 'id=' + obj.id + '&opt=' + opt + '&content=' + new_content;
                                    var myAjax = new Ajax.Request(url, {method:'post', postBody:pars, onSuccess:success, onFailure:failure});

                                }

                                function cleanUp(obj, keepEditable)
                                {
                                    Element.remove(obj.id + '_editor');
                                    Element.show(obj);
                                    if (!keepEditable)
                                        showAsEditable(obj, true);
                                }

                                function editComplete(t, obj) {
                                    obj.innerHTML = t.responseText;
                                    showAsEditable(obj, true);
                                }

                                function editFailed(t, obj) {
                                    obj.innerHTML = 'Sorry, the update failed.';
                                    cleanUp(obj);
                                }


                                function trim(inputString) {

                                    if (typeof inputString != "string") {
                                        return inputString;
                                    }
                                    var retValue = inputString;
                                    var ch = retValue.substring(0, 1);

                                    while (ch == " ") {
                                        retValue = retValue.substring(1, retValue.length);
                                        ch = retValue.substring(0, 1);
                                    }
                                    ch = retValue.substring(retValue.length - 1, retValue.length);

                                    while (ch == " ") {
                                        retValue = retValue.substring(0, retValue.length - 1);
                                        ch = retValue.substring(retValue.length - 1, retValue.length);
                                    }

                                    while (retValue.indexOf("  ") != -1) {
                                        retValue = retValue.substring(0, retValue.indexOf("  ")) + retValue.substring(retValue.indexOf("  ") + 1, retValue.length);
                                    }
                                    return retValue;
                                }
</script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
    <div class = "title" style ="text-indent:10px">{lag_cat_manager}</div>
    <div>{lag_page} : {nav_page}</div>
    <div><img src ="../style/images/folderopen.gif">
        <a href = "./?show=catalogueTree_adoption">{viewastree}</a>
    </div>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>
            <div class = "con_title" style = "width:50px;text-align:center"><input style ='margin-left:3px' type="checkbox" name="chkall" onclick="chkallClick(this);"></div>
            <div class = "con_title" style = "width:50px">{lag_delete}</div>
            <div class = "con_title" style = "width:50px">{lag_edit}</div>				
            <div class = "con_title" style = "width:170px ;">
                <a href = './?show=catalogue_adoption&order=name&p={p}' style="text-decoration:underline">{lag_cats_name}(a->z)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=catalogue_adoption&order=name_desc&p={p}'style = "text-decoration:underline">(z->a)</a> </span></div>
            <div class = "con_title" style = "width:170px;"><a href = './?show=catalogue_adoption&order=catalogue_adoption&p={p}' style="text-decoration:underline">{ofcatalogue}</a><span>&nbsp&nbsp&nbsp </span><span><a href = './?show=catalogue_adoption&order=catalogue_adoption_desc&p={p}'style = "text-decoration:underline"></a> </span></div>
            <div class = "con_title" style = "width:55px">                  
                {lag_order}
            </div>				
            <div class = "con_title" style = "width:65px;"><a href = './?show=catalogue_adoption&order=status&p={p}'style='text-decoration:underline'>{lag_status}</a></div>				                
            <div class = "con_title" style = "width:141px;border:0px;"><a href = './?show=catalogue_adoption&order=dateadd&p={p}' style="text-decoration:underline">{lag_date_create} (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=catalogue_adoption&order=dateadd_desc&p={p}'style = "text-decoration:underline">(mới)</a> </span></div>                                                
            <div class = "con_title" style = "width:100px;border:0px;"><a href = './?show=catalogue_adoption&order=datemodifiled&p={p}' style="text-decoration:underline">Sửa (cũ)</a><span>&nbsp&nbsp-&nbsp </span><span><a href = './?show=catalogue_adoption&order=datemodifiled_desc&p={p}'style = "text-decoration:underline">(mới)</a> </span></div>
        </div>
        <div>
            <!--BEGINLIST_CATALOGUE-->
            <!--BEGIN_CATALOGUE-->
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;text-align:center"><input style ='margin-top:8px' type="checkbox" name="chk[]" value="{id}"></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=catalogue_adoption&action=del&id={id}&p={p}&order={orderby}" onclick="return confirm('{del_confirm} ?');">{lag_delete}</a></div>
            <div class = "con_list_con" style = "width:50px;background-color:{color};height:30px;"><a href="./?show=CatalogueOpt_adoption&id={id}&p={p}&order={orderby}">{lag_edit}</a></div>
            <div class = "con_list_con" style = "width:170px;background-color:{color};height:30px;" id ="{id}">{cat_name}</div>
            <div class = "con_list_con" style = "width:170px;background-color:{color};height:30px;" id ="{id}_parent_name">{parent_name}</div>
            <div class = "con_list_con" style = "width:55px;background-color:{color};height:30px;" id ="{id}_order">{order}</div>
            <div class = "con_list_con" style = "width:65px;background-color:{color};height:30px" id ="{id}_status">{status}</div>
            <div class = "con_list_con" style = "width:140px;border:0px;background-color:{color};height:30px">{date_create}</div>
            <div class = "con_list_con" style = "width:100px;border:0px;background-color:{color};height:30px">{date_modifiled}</div>
            <div class ='clear'></div>
            <!--END_CATALOGUE-->
            <!--ENDLIST_CATALOGUE-->
        </div>
    </div>
    <input class = "button" type = "submit" name = "btndel" value = "{delete_check}" onclick="return confirm('{del_confirm}?');">
    <input class = "button" type = "submit" name = "btnstatus" value = "{shi}" onclick = "return chkselected();">
    <input class = "button" type = "button" value = "{add_cat}" onclick="window.location = './?show=CatalogueOpt_adoption{type_of_order}&p={page}'">
</form>
