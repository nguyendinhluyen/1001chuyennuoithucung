<script type="text/javascript" src="{linkS}layout/js/jquery.form.js"></script>
<script type="text/javascript" src="{linkS}layout/js/expanding.js"></script> 
<script type='text/javascript' src='jquery-1.7.js'></script>

<style type="text/css">
    textarea 
    {
        background: transparent;
        font-family: Arial;
        font-style: italic;
        font-size:12px;
        width: 700px;	
        height: 100px;
        margin-bottom:20px;
        margin-top:10px;	
        box-shadow: 2px 2px 2px #B66B6B;
        color:#A00;
    }
    textarea, .textareaClone {	
        width: 99%;
    }
</style>


<form name="frmComment" id="frmComment" method="POST" action="{linkS}home/modules/ajax/saveComment.php">
    <table border="0" style="margin-left:-2px;">
        <tr>
            <td>
                <b style="margin-left:-2px; margin-right:450px; font-family:Cambria; color:#A00; font-size:15px">Nhận xét sản phẩm   </b>
            </td>

            <td>
                <div class="rating" data="10_{rate_data}_{email}"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" >			
                <textarea class='expanding' id = "comment"  name = "comment" placeholder=' Hãy gõ nhận xét của bạn!'></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"><div id="tar_comment" style="color: red;"></div></td>
       	</tr>
        <tr>        	
            <td align="right" colspan="2" style="margin-right:-10px" >
                <input type="button" name="send" id="send" class="send" value="Gửi ý kiến" style="font-family:Cambria; font-size:16px; color:#FFFBF0; font-weight:bold "/>                 
            </td>                                            
        </tr>
    </table>
    <input type="hidden" name="user" value="{user}" />
    <input type="hidden" name="id_product" value="{id_product}" />
</form>

<script>
    $('#send').live('click', function ()
    {
        $("#frmComment").ajaxForm({
            target: '#tar_comment',
            success: reloadComment,
        }).submit();
    });

    function reloadComment(responseText, statusText)
    {
        comment_id = document.getElementById("comment");
        comment_id.value = "";
        loadComment({id_product});
    }
</script>	 