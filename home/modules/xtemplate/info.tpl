<script type="text/javascript">
    $(document).ready(function () {
            function loading_show(){alert('kjkkk');
                    $('#loading').html("<img src=layout/images/loading.gif'/>").fadeIn('fast');
    }
            function loading_hide() {
                $('#loading').fadeOut('fast');
            }
            function loadData(page) {
                loading_show();
                $.ajax
                        ({
                            type: "GET",
                            url: "ajax/loadhData.php",
                            data: "page=" + page,
                            success: function (msg)
                            {
                                $("#tab1").ajaxComplete(function (event, request, settings)
                                {
                                    //loading_hide();//alert(msg);
                                    $("#tab1").html(msg);
                                });
                            }
                        });
            }
            loadData(1);  // For first time page load default results
            $('#tab1 .pagination li.active').live('click', function () {
                var page = $(this).attr('p');
                loadData(page);

            });
            $('#go_btn').live('click', function () {
                var page = parseInt($('.goto').val());
                var no_of_pages = parseInt($('.total').attr('a'));
                if (page != 0 && page <= no_of_pages) {
                    loadData(page);
                } else {
                    alert('Enter a PAGE between 1 and ' + no_of_pages);
                    $('.goto').val("").focus();
                    return false;
                }

            });
        });
</script>        
<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div> 

    <div class="col1_content">
        <div class="clear"></div> 
        <div id="detail3">
            <ul class="tabs">
                <li><a href="#tab1">GIới thiệu</a></li>
                <li><a href="#tab2">Alo</a></li>
                <li><a href="#tab3">GIới thiệu 3</a></li>
                <li><a href="#tab4">Alo 8</a></li>
            </ul>

            <div id="tab_container">
                <div id="tab1" class="tab_content">
                    <div class="data"></div>
                    <div class="pagination"></div>
                    {info1}
                </div>

                <div id="tab2" class="tab_content">
                    {info2}
                </div>
                <div id="tab3" class="tab_content">
                    {info3}
                </div>

                <div id="tab4" class="tab_content">
                    {info4}
                </div>

            </div><!-- end tab_container -->

        </div><!-- end detail3 -->

    </div><!-- end col1_content -->

</div><!-- end product -->
