<script type="text/javascript">
    $(document).ready(function () {
        $(".tab_content").hide();
        $("ul.tabs li:first").addClass("active").show();
        $(".tab_content:first").show();
        $("ul.tabs li").click(function ()
        {
            $("ul.tabs li").removeClass("active");
            $(this).addClass("active");
            $(".tab_content").hide();

            var activeTab = $(this).find("a").attr("href");
            $(activeTab).fadeIn();
            return false;
        });

    });
</script>

<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div> 

    <div class="col1_content">
        <div class="clear"></div> 
        <div id="detail3">

            <ul class="tabs">
                <li><a href="#tab1">{titlegioithieu}</a></li>
                <li><a href="#tab2">{titlediendanyeudongvat}</a></li>                               
            </ul>

            <div id="tab_container">
                <div id="tab1" class="tab_content" style="text-align:justify">
                    {gioithieu}
                </div>

                <div id="tab2" class="tab_content" style="text-align:justify">
                    {diendanyeudongvat}
                </div>


            </div><!-- end tab_container -->

        </div><!-- end detail3 -->

    </div><!-- end col1_content -->

</div><!-- end product -->
