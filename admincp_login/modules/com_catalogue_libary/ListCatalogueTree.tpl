<!--BEGINLIST_SCRIPT-->
<!--BEGIN_SCRIPT-->
<script src="../jscript/treemenu.js" type="text/javascript"></script>
<!--END_SCRIPT-->
<!--ENDLIST_SCRIPT-->
<div class = "title" style ="text-indent:10px">{cat_managertree}</div>
<div style = "margin-left:10px"><img src ="../style/images/folderopen.gif"><a href = "./?show=catalogue_libary">{viewlist}</a></div>
<div style = "margin-left:10px;padding-bottom:10px">
    <SCRIPT type=text/javascript>
        d = new dTree('d');
        d.add(0, -1, '<a href="javascript: d.openAll();"><font color="#000000">{expand}</font></a> | <a href="javascript: d.closeAll();"><font color="#000000">{collapse}</font></a>');
        {catsTree}
        document.write(d);
    </SCRIPT>
</div>
