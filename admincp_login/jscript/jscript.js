///////////////////////////////////////////////////////////////////////////////
//                                                                           //
//   Program Name         : JScript for web	 		                         //
//   Release Version      : 2.0                                              //
//   Program Author       : Center Road Corporation.                         //
//   Supplied by          : ngoho88@yahoo.com.vn                             //
//   Packaged by          : CRV Team.                                        //
//   Distribution         : Script for web application.						 //
//                                                                           //
//                       CRV Team `2007 - `2008.                             //
///////////////////////////////////////////////////////////////////////////////
function chkallClick(o) {
    var form = document.frm;
    for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].type == "checkbox" && form.elements[i].name != "chkall") {
            form.elements[i].checked = document.frm.chkall.checked;
        }
    }
}
function chkselected()
{
    var form = document.frm;
    for (var i = 0; i < form.elements.length; i++)
    {
        if (form.elements[i].type == "checkbox")
        {
            if (form.elements[i].checked == true)
            {
                return true;
            }
        }
    }
    return false;
}
function chkdelete(text)
{
    var form = document.frm;
    for (var i = 0; i < form.elements.length; i++)
    {
        if (form.elements[i].type == "checkbox")
        {
            if (form.elements[i].checked == true)
            {
                return confirm(text + ' ?');
            }
        }
    }
    return false;
}
function numberRequired(inputObject) {
    var keyInput = window.event.keyCode;
    shiftOn = (window.event.shiftKey);
    if ((!shiftOn) && (keyInput == 8) || (keyInput == 9) || (keyInput == 35) || (keyInput == 36) || (keyInput == 37) || (keyInput == 39) || (keyInput == 46) || (keyInput >= 48 && keyInput <= 57) || (keyInput >= 96 && keyInput <= 105)) {
        return true;
    } else {
        window.event.returnValue = false;
        return false;
    }
}
function submitForm() {
    document.forms.frm.elements.txtcontent.value = oEdit1.getHTMLBody();
    document.forms.frm.submit();
}
function submitForm2() {
    document.forms.frm.elements.txtdetail.value = oEdit1.getHTMLBody();
    document.forms.frm.submit();
}
