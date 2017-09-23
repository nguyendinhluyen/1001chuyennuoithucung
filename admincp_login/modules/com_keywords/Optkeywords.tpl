<div class = "title">Cập nhật từ khóa</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">

        <div style="float:left;padding-left:20px">
            <div class ='err'>{error}</div>
            <p>
                <label>Tên trang</label><input size="93" type = 'text' name = 'page_title'  value ='{page_title}' readonly="readonly">
            </p>
            <p>
                <label>Title</label><input size="93" type = 'text' name = 'title' value ='{title}'>
            </p>
            <p>
                <label>Keywords</label><textarea name = 'keywords' cols="70" rows="3">{keywords}</textarea>
            </p>
            <p>
                <label>Description</label><textarea name = 'description' cols="70" rows="7">{description}</textarea>
            </p>
            <p>
                <label>&nbsp;</label><input class = "button" type = "submit" name = "btnsubmit" value = "Cập nhật"/>
                <input class = "button" type = "reset" value = "Reset"/>
            </p>
            <br/>
        </div>
    </form>
</div>