<form method='POST' enctype='multipart/form-data' id = "frm" name = "frm"> 
    <div class = "title" style ="text-indent:10px">Quản lý lịch những bài sắp đăng website</div>
    <div>
        {lag_page} : {page}                   
    </div>    
    </br>
    <div style = "float:left">
        <div class = "title" style = 'width:851px'>                        
            <div class = "con_title" style = "width:20px">&nbsp</div>        
            <div class = "con_title" style = "width:350px">Tiêu đề bài viết</div>            
            <div class = "con_title" style = "width:130px">Đã đăng website?</div>
            <div class = "con_title" style = "width:140px;">Ngày đăng bài (y/m/d)</div>
            <div class = "con_title" style = "width:100px">Trạng thái</div>            
            <div class = "con_title" style = "width:80px;">Trên website</div>
        </div>
        <div>
            <!--BEGINLIST_NEWS-->
            <!--BEGIN_NEWS-->         
            <div class = "con_list_con" style = "width:20px;background-color:{color};height:50px;">&nbsp</div>            
            <div class = "con_list_con" style = "width:350px;background-color:{color};height:50px;">{news_name}</div>            
            <div class = "con_list_con" style = "width:130px;background-color:{color};height:50px;">{flag_publish}</div>            
            <div class = "con_list_con" style = "width:140px;background-color:{color};height:50px">{date_publisher}</div>                        
            <div class = "con_list_con" style = "width:100px;background-color:{color};height:50px">{status}</div>                        
            <div class = "con_list_con" style = "width:110px;border:0px;background-color:{color};height:50px">
                <a href="{link_preview}" 
                   style = "color:blue; text-decoration: underline" 
                   target="_blank">Xem trước</a>
            </div>
            <div class ='clear'></div>
            <!--END_NEWS-->
            <!--ENDLIST_NEWS-->
        </div>
    </div>	
</form>
