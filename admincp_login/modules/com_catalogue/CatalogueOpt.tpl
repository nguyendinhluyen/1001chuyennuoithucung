<div class = "title">{add_cat}</div>
<div class = "content_con">
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm">
        <div class = "img_show">
            <img src='../style/images/cat.png' width='60px'/>
        </div>
        <div style="float:left;padding-left:20px">
            <div class ='err' style ='margin-left:100px'>{error}</div>
            <p>
                <label><b>{lag_cats_name}</b></label>
                <input type = 'text' name = 'txtcats_name' class ='fieldinput' value ='{txt_cats_name}'> 
                <font color ='red'>*</font>
            </p>
            <p>
                <label><b>Title</b></label>
                <input type = 'text' name = 'title_category' class ='fieldinput' value ='{title_category}'> 
                <font color ='red'>*</font>
            </p>
            <p>
                <label><b>Keywords</b></label>
                <textarea rows="5"   
                          id="keywords"
                          name ="keywords"
                          style = "outline:none;
                          height: 100px;
                          width: 500px;
                          text-align:left;">{keywords}</textarea>
                <font color ='red'>*</font>
            </p>
            <p>
                <label><b>Description</b></label>
                <textarea rows="5"   
                          id="description"
                          name ="description"
                          style = "outline:none;
                          height: 100px;
                          width: 500px;
                          text-align:left;">{description}</textarea>
                <font color ='red'>*</font>
            </p>
            <p>
                <label><b>Nội dung SEO</b></label>
                <textarea rows="5"   
                          id="txtSEO"
                          name ="txtSEO"
                          style = "outline:none;
                          height: 100px;
                          width: 500px;
                          text-align:left;">{text_seo}</textarea>
            </p>
            <p>
                <label>{lag_order}</label>
                <input type = 'text' name = 'txtcats_order' class ='fieldinput' value ='{txt_cats_order}'>
            </p>
            <p>
                <label>{ofcatalogue}</label>{dl_subcats}
            </p>
            <p>
                <label>{lag_show}</label>
                <input style="margin-left:0px;" type = 'checkbox' name = 'chkb_status' {check_do}/></p>
            <p style="margin-bottom: 50px">
                <label>&nbsp;</label>
                <input class = "button" type = "submit" name = "btnadd" value = "{btn}"/>
                <input class = "button" type = "reset" value = "{reset}"/>
            </p>
        </div>
    </form>
</div>