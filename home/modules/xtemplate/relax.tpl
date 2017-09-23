<style type="text/css">            
    #loading
    {
        width: 100%;
        position: absolute;
        top: 100px;
        left: 100px;
        margin-top:200px;				
    }
    #tab_container .pagination ul li.inactive,
    #tab_container .pagination ul li.inactive:hover{
        background-color:#ededed;
        color:#bababa;
        border:1px solid #bababa;
        cursor: default;
    }
    #tab_container .data ul li{
        list-style: none;
        font-family: verdana;
        margin: 5px 0 5px 0;
        color: #000;
        font-size: 13px;
    }

    #tab_container .pagination{
        width: 700px;
        height: 25px;
    }
    #tab_container .pagination ul li{
        list-style: none;
        float: left;
        border: 1px solid #006699;
        padding: 2px 6px 2px 6px;
        margin: 0 3px 0 3px;
        font-family: arial;
        font-size: 10px;
        color: #006699;
        font-weight: bold;
        background-color: #f2f2f2;
    }
    #tab_container .pagination ul li:hover{
        color: #fff;
        background-color: #006699;
        cursor: pointer;
    }
    .go_button
    {
        background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
    }
    .total
    {
        float:right;font-family:arial;color:#999;
    }
</style>


<script type="text/javascript">
    $(document).ready(function () {
        var selectedTab = 'tab4';
        $(".tab_content").hide();
        $("ul.tabs li:first").addClass("active").show();
        $(".tab_content:first").show();


        function loading_show() {
            $('#loading').html("<img src='{linkS}layout/images/loading.gif'/>").fadeIn('fast');
        }
        function loading_hide() {
            $('#loading').fadeOut('fast');
        }
        function loadData(page, tab) {
            loading_show();
            $.ajax
                    ({
                        type: "POST",
                        url: "{linkS}home/modules/ajax/loadData.php",
                        data: "page=" + page + "&tab=" + tab,
                        success: function (msg)
                        {
                            //$("#"+tab).ajaxComplete(function(event, request, settings)
                            //{
                            //loading_hide();
                            $("#" + tab).html(msg);
                            //});
                        }
                    });
        }

        function loadDataDetail(key, tab)
        {
            loading_show();
            $.ajax
                    ({
                        type: "POST",
                        url: "{linkS}home/modules/ajax/loadDataDetail.php?news_key=" + key,
                        data: "",
                        success: function (msg)
                        {
                                //$("#"+tab).ajaxComplete(function(event, request, settings)
                                // {
                                loading_hide();//alert(msg);
                                $("#" + tab).html(msg);
                                // });
                            }
                        });
            }


            //loadDataDetail();
            loadData(1, selectedTab);  // For first time page load default results


            $('#tab1 .pagination li.active').live('click', function (){;
    var page = $(this).attr('p');
    loadData(page,selectedTab);
                    
    }
            );
            $('#tab2 .pagination li.active').live('click', function () {
                var page = $(this).attr('p');
                loadData(page, selectedTab);

            });

            $('#tab3 .pagination li.active').live('click', function () {
                var page = $(this).attr('p');
                loadData(page, selectedTab);

            });
            $('#tab4 .pagination li.active').live('click', function () {
                var page = $(this).attr('p');
                loadData(page, selectedTab);
            });
            $('#tab5 .pagination li.active').live('click', function () {
                var page = $(this).attr('p');
                loadData(page, selectedTab);

            });
            $('#tab6 .pagination li.active').live('click', function () {
                var page = $(this).attr('p');
                loadData(page, selectedTab);
            });

            $('#tab7 .pagination li.active').live('click', function () {
                var page = $(this).attr('p');
                loadData(page, selectedTab);
            });


            $('#go_btn').live('click', function () {
                var page = parseInt($('.goto').val());
                var no_of_pages = parseInt($('.total').attr('a'));
                if (page != 0 && page <= no_of_pages) {
                    loadData(page, selectedTab);
                } else {
                    alert('Enter a PAGE between 1 and ' + no_of_pages);
                    $('.goto').val("").focus();
                    return false;
                }

            });

            $('ul.tabs li').live('click', function ()
            {
                //show or hide tab
                $("ul.tabs li").removeClass("active");
                $(this).addClass("active");
                $(".tab_content").hide();
                var activeTab = $(this).find("a").attr("href");
                $(activeTab).fadeIn();

                //end or hide tab
                //$('#'+selectedTab+ ' > *').html('');alert('jjj');
                //$("#"+selectedTab).remove(":contains('tab_content')");
                //alert('#'+selectedTab);
                //remove data
                $("#" + selectedTab).html('');
                //end remove data

                var loadTab = $(this).find("a").attr("href");
                var arr = loadTab.split('#');
                selectedTab = arr[1];

                //$("#"+tab).html(msg);
                //$('.tab_content').empty();
                loadData(1, arr[1]);
                return false;

            });

            $('.product_main a').live('click', function ()
            {
                var news_key = $(this).attr('href');
                loadDataDetail(news_key, selectedTab);
            });
        });

</script>

<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div> 

    <div class="col1_content">
        <div class="clear"></div> 
        <div id="detail3">
            <ul class="tabs">                                
                <li><a href="#tab4">Ảnh đẹp</a></li> <!--Thú ý-->
                <li><a href="#tab1">Game vui</a></li>
                <li><a href="#tab5">Thiệp điện tử</a></li> <!--Dinh dưỡng-->
                <li><a href="#tab6">Sách tham khảo</a></li>
                <li><a href="#tab3">Sách truyện</a></li> <!-- Sách chăm sóc chó mèo -->

                <li><a href="#tab7">Âm nhạc</a></li>
                <li><a href="#tab2">Phim</a></li>

            </ul>

            <div id="tab_container">
                <div id="tab4" class="tab_content">
                    {veterinary}
                </div>
                <div id="tab1" class="tab_content">
                    {games}
                    <div id="loading"></div>                                    
                </div>
                <div id="tab5" class="tab_content">
                    {nutrition}
                </div>
                <div id="tab6" class="tab_content">
                    {chuyendoday}
                </div>
                <div id="tab3" class="tab_content">
                    {pet}
                </div>

                <div id="tab7" class="tab_content">
                    {amnhac}
                </div>

                <div id="tab2" class="tab_content">
                    {films}
                </div>


            </div><!-- end tab_container -->

        </div><!-- end detail3 -->

    </div><!-- end col1_content -->

</div><!-- end product -->
