<script type="text/javascript" src="../jscript/jQuery-1.4.2.js"></script>
<script language="JavaScript" src='../jscript/jquery.form.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
    $(function () {
        $("#publish_day").datepicker({dateFormat: 'yy-mm-dd',
                                       changeMonth:true,
                                       changeYear: true});
        $("#publish_day").datepicker("option", "showAnim", "slide");
    });
    function myFunction(schedule_date) {
        // Check bai da publish hay chua
        var current_day = document.getElementById("current_day").value;
        var current_publisher = document.getElementById("current_publisher").value;// 0: chua post; 1: da post
        if (current_publisher === "1") {
            alert("Bài này đã được đăng trên website! Không thể sửa ngày đăng bài!");
            document.getElementById("publish_day").value = current_day;
        } else {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var today = dd + '-' + mm + '-' + yyyy;
            var dateNow = Date.now();
            var dateSchedule = new Date(schedule_date);

            if ((new Date(dateNow).getTime()) >= (new Date(dateSchedule).getTime())) {
                alert("Ngày đăng bài viết phải sau ngày hôm nay: " + today);
                document.getElementById("publish_day").value = "";
            } else {
                // Check ton tai 2 bai/ngay
                var getUserId = function () {
                    userId = null;
                    $.ajax({
                        type: "POST",
                        url: "com_news/CheckNews.php",
                        data: {date:schedule_date},
                        async: false,
                        success: function (msg) {
                            userId = msg;
                        }
                    });
                    return userId;
                };
                var userId = getUserId();
                if (userId === "true") {
                    // Cho phep lay lai ngay hien tai                
                    if (current_day !== schedule_date) {
                        alert("Ngày " + schedule_date + " đã có 2 bài đăng ký. Vui lòng chọn ngày khác!");
                        document.getElementById("publish_day").value = "";
                    }
                } else if (userId !== "true" && userId !== "false") {
                    alert(userId);
                    document.getElementById("publish_day").value = "";
                }
            }
        }
    }

    function getProduct() {
        // Clear all data
        $("#product_list").empty();
        var name_product = document.getElementById('product_search').value.trim();
        var getProduct = function () {
            var array_product = new Array();
            $.ajax({
                type: "POST",
                url: "com_news/GetProduct.php",
                data: {name:name_product},
                async: false,
                dataType: "json",
                success: function (product) {
                    array_product = product;
                }
            });
            return array_product;
        };
        var products = getProduct();
        // Add data
        if (products.length > 0) {
            var list_product_display = '<input type="button" \n\
                                               class="button" \n\
                                               value="Thêm sp liên quan" \n\
                                               style="cursor:pointer; \n\
                                                      margin-bottom: 10px; \n\
                                                      height: 30px"\n\
                                               onclick="addProduct();">';

            for (i = 0; i < products.length; i++) {
                list_product_display += '<li style="line-height: 25px">'
                        + '<table><tr><td> <input type="checkbox" name="productId[]" id="'
                        + products[i]['products_id'] + '" value="'
                        + products[i]['products_id'] + '"></td>'
                        + '<td><img src="../../upload/product/thumb/' + products[i]['products_image']
                        + '" style="width:100px;height:100px"></td><td>'
                        + products[i]['products_name'] + "</td></tr></table></li>";

            }
        } else {
            list_product_display = '<li style="line-height: 25px;color: red">Không tìm thấy sản phẩm</li>';
        }
        $("#product_list").append(list_product_display);
    }

    function addProduct() {
        var selectedProduct = document.getElementsByName('productId[]');
        var list_product_display = "";
        for (var i = 0; i < selectedProduct.length; i++) {
            if (selectedProduct[i].checked) {
                var id_product = selectedProduct[i].value;
                var getProductDetail = function () {
                    var product_detail;
                    $.ajax({
                        type: "POST",
                        url: "com_news/GetProduct.php",
                        data: {id:id_product},
                        async: false,
                        dataType: "json",
                        success: function (product) {
                            product_detail = product;
                        }
                    });
                    return product_detail;
                };
                var product = getProductDetail();
                list_product_display += '<li style="line-height: 25px" id="item' + product[0]['products_id']
                        + '" value = "' + product[0]['products_id'] + '">'
                        + '<table><tr><td> <input type="checkbox" checked onclick="return false" name="itemProduct[]" id="'
                        + product[0]['products_id'] + '" value="'
                        + product[0]['products_id'] + '"></td><td>'
                        + product[0]['products_name']
                        + '</td><td><span style="color:red; cursor:pointer" onclick ="deleteItem(\'#item' + product[0]['products_id']
                        + '\');"> Xóa</span></td></tr></table><li>';
            }
        }
        $("#product_list_accept").append(list_product_display);

    }
    function deleteItem(id) {
        $(id).remove();
    }
    function resetProduct() {
        $("#product_list").empty();
        document.getElementById('product_search').value = "";
    }
</script>
<style>
    .multiselect{
        width:350px;
        height:200px;
        border:solid 1px #c0c0c0;
        overflow-y:scroll;
    }
    .multiselect label{
        display:block;
    }
    .multiselect-on {
        color:#ffffff;
        background-color:#000099;
    }
</style>
<script language="JavaScript" type="text/javascript">
    jQuery.fn.multiselect = function () {
        $(this).each(function () {
            var checkboxes = $(this).find("input:checkbox");
            checkboxes.each(function () {
                var checkbox = $(this);
                // Highlight pre-selected checkboxes
                if (checkbox.prop("checked"))
                    checkbox.parent().addClass("multiselect-on");
                // Highlight checkboxes that the user selects
                checkbox.click(function () {
                    if (checkbox.prop("checked"))
                        checkbox.parent().addClass("multiselect-on");
                    else
                        checkbox.parent().removeClass("multiselect-on");
                });
            });
        });
    };
    $(function () {
        $(".multiselect").multiselect();
    });
</script>

<script>
    function submitForm1() {
        document.getElementById("txtdetail").value = oEdit1.getHTML();
        document.getElementById("txtdetail2").value = oEdit2.getHTML();
    }
</script>
<pre id="invdetail" name="invdetail" style="display:none">
    {txtdetail}
</pre>
<pre id="invdetail2" name="invdetail2" style="display:none">
    {txtdetail2}
</pre>
<div class = "title">Thư viện bài viết</div>
<div class = "content_con">    
    <form method='POST' enctype='multipart/form-data' id = "frm" name = "frm" onsubmit="submitForm1()">
        <input type="hidden" name="txtdetail" id="txtdetail"/>
        <input type="hidden" name="txtdetail2" id="txtdetail2"/>        
        <input type="hidden" name="opt" value="{opt}"/>
        <div style ="float:left;width:150px">
            <p style = 'margin-left:65px;font-weight:bold'>{image}</p>
            <div class = "img_show" style = "width:135px">
                <img src='{imagesrc}' width='130px'/>
            </div>
        </div>
        <div style="float:left;padding-left:25px">
            <div style ="margin-left:103px;">{error}</div>		
            <p>
                <label><b>{news_title}</b></label>
                <input size ='50'
                       maxlength = '50'
                       type = 'text'
                       name = 'txtname'
                       value ='{txtname}'>
            </p>
            <p>
                <label>{translator}</label>
                <input size ='50'
                       maxlength = '50'
                       type = 'text'
                       name = 'txttranslator'
                       value ='{txttranslator}'
                       id = 'txttranslator'
                       readonly>
            </p>
            <p>
                <label>{image}</label>
                <input size ='50' name = 'image' type ="file">
            </p>
            <p>
                <label>Thuộc danh mục</label>
                {cat_list}
            </p>
            <p>
                <label>{decription}</label>
                <br/>
                <br/>
                <textarea name = "decription"
                          cols = "79"
                          rows = "7"
                          maxlength="450">{txtdecripton}</textarea>
            </p>
            <p>
                <label>{news_detail}</label>
                <br/>
                <br/>
                <script>
                    var oEdit1 = new InnovaEditor("oEdit1");                    
                        oEdit1.arrStyle = [["BODY", false, "", "font-family:Arial;font-size:12px;"]];
                        oEdit1.width = "660";
                        oEdit1.height = "600";
                        oEdit1.features = ["FullScreen", "Search",
                            "Cut", "Copy", "Paste", "PasteWord", "PasteText", "|", "Undo", "Redo", "|",
                            "ForeColor", "BackColor", "|", "Bookmark", "Hyperlink",
                            "CustomTag", "HTMLSource", "BRK", "Indent", "Outdent", "LTR", "RTL", "|", "Image", "Flash", "Media", "|", "InternalLink", "CustomObject", "|",
                            "Table", "Guidelines", "Absolute", "|", "Characters", "Line",
                            "Form", "Clean", "ClearAll", "BRK",
                            "StyleAndFormatting", "TextFormatting", "ListFormatting", "BoxFormatting",
                            "ParagraphFormatting", "CssText", "Styles", "|",
                            "Paragraph", "FontName", "FontSize", "|",
                            "Bold", "Italic",
                            "Underline", "Strikethrough", "|", "Superscript", "Subscript", "|",
                            "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull"];
                        oEdit1.cmdAssetManager = "modalDialogShow('../assetmanager/assetmanager.php',640,465)";
                        oEdit1.RENDER(document.getElementById("invdetail").innerHTML);
                </script>
            </p>
            <br/>
            <p>
                <b>{author}</b>
                <br/>
                <input size ='89'
                       maxlength = '100'
                       type = 'text'
                       name = 'txtauthor'
                       value ='{txtauthor}'
                       id = 'txtauthor'/>
            </p>
            <p>
                <b>{linkReference}</b>
                <br/>
                <br/>
                {scipt_editor}
            </p>        
            <p style="margin-top:10px">
                <b>Vùng dành cho SEO trong trang chi tiết bài viết</b></br></br>			
                <b style="margin-top:10px">Title Page</b>
                <br/>
                <input size ='89'
                       maxlength = '100'
                       type = 'text'
                       name = 'txttitle_page'
                       value ='{txttitle_page}'
                       id = 'txttitle_page'>
            </p>        
            <p style="margin-top:10px">
                <b style="margin-top:10px">Meta Description</b>
                <br/>
                <input size ='89'
                       maxlength = '100'
                       type = 'text'
                       name = 'txtmeta_description'
                       value ='{txtmeta_description}'
                       id = 'txtmeta_description'/>
            </p>        
            <p style="margin-top:10px">
                <b style="margin-top:10px">Meta Key Word</b>
                <br/>
                <input size ='89'
                       maxlength = '100'
                       type = 'text'
                       name = 'txtmeta_keyword'
                       value ='{txtmeta_keyword}'
                       id = 'txtmeta_keyword'>
            </p>                    
            <p>
                <br/>
                <b>Chọn ngày đăng bài viết trên website (yy-mm-dd)</b>                
                <br/>
                <input id="publish_day"
                       name="publish_day"
                       type="text"
                       value="{date_publisher}"
                       style="margin-bottom:0px; width:125px;"
                       onchange="myFunction(this.value)"/>		            
                <span> 
                    <a href="./?show=checkSchedules" style="color:blue; text-decoration: underline" target="_blank"> 
                        Xem lịch đăng bài 
                    </a> 
                </span>
            </p>
            <br/>
            <p>                      
                <b>Danh sách sản phẩm liên quan</b>
            <div style="float:left;
                 width:auto;
                 padding-top:10px;
                 clear:both">
                <ul id="product_list_update">
                    {product_list_update}
                </ul>
                <ul id="product_list_accept">
                </ul>
            </div>
            </p>
            <br/>
            <p style="clear:both">                      
                <input class = "button" 
                       type = "submit" 
                       name = "btnadd" 
                       value = "{btn}" 
                       style="height: 30px; 
                       width: 80px;
                       cursor: pointer;
                       margin-top: 10px"/>
            </p>
            <br/>        
            <input type = "text" id = "current_day" class = "current_day" value ="{current_day}" hidden="true">
            <input type = "text" id = "current_publisher" class = "current_publisher" value ="{current_publisher}" hidden="true">
            <div style="float:left;
                 width:500px;                        
                 padding-top:5px">
                <b>Sản phẩm liên quan</b>
                <input value = ""
                       type="text" 
                       size="20" 
                       name = "product_search"
                       id="product_search" 
                       style="width:200px;">	       
                <input name ='search' 
                       value="Tìm kiếm"
                       onclick="getProduct()"
                       class ='button' 
                       type="button"
                       style="width:70px; 
                       height:24px;
                       text-align:center;
                       cursor: pointer;">	  
                <input name ='reset' 
                       value="Reset"
                       onclick="resetProduct()"
                       class ='button' 
                       type="button"
                       style="width:70px; 
                       height:24px;
                       text-align:center;
                       cursor: pointer;">	  
            </div>
            <input type="hidden" name="id" value="{order_id}">
            <div style="float:left;
                 width:auto;
                 padding-top:10px;
                 clear:both">
                <ul id="product_list">                    
                </ul>
            </div>
        </div>
    </form>
</div>