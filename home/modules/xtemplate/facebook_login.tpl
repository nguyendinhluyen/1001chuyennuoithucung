<script>
    // This is called with the results from from FB.getLoginStatus().

    function statusChangeCallback(response)
    {
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected')
        {
            // Logged into your app and Facebook.
            testAPI();
        } else if (response.status === 'not_authorized')
        {
            // The person is logged into Facebook, but not your app.
            //alert("Vui lòng đăng nhập vào app")
        } else
        {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            //alert("Vui lòng đăng nhập vào Facebook")
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState()
    {
        FB.getLoginStatus(function (response)
        {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function ()
    {
        FB.init({
            appId: '1491869401059003',
            cookie: true, // enable cookies to allow the server to access the session
            xfbml: true, // parse social plugins on this page
            version: 'v2.1' // use version 2.1
        });
        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.
        //FB.getLoginStatus(function(response)
        //{
        //  statusChangeCallback(response);
        //});
    };

    // Load the SDK asynchronously
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI()
    {
        var userName = null;

        var birthday = "";

        FB.api('/me', function (response)
        {
            var getUserId = function ()
            {
                userId = null;
                $.ajax({
                    type: "POST",
                    url: "{linkS}home/modules/ajax/SessionAjax.php",
                    data: {id:response.id, name: response.name, email: response.email, gender: response.gender,birthday: response.birthday},
                    async: false,
                    success: function (msg)
                    {
                        userId = msg;
                    }
                });
                return userId;
            }
            var userId = getUserId();
            alert(userId);
            if (userId === "Đăng nhập thành công.")
                window.location = 'thong-tin-tai-khoan';
            else
                window.location = 'facebook-login';
        });
    }
</script>

<div id="product">
    <div id="breakcrumb">{breadcrumbs_path}</div>
    &nbsp;
    <div class="product_main">
        <div style="clear:both"></div>
        <form action="{linkS}process-login" method="post" name="com-login" id="com-form-login">
            <div id="dangnhap" style="">
                <div id="login_detail">
                    <div id="left_box">
                        <div style="color: darkblue; font-size: 17px; font-weight:bold">Facebook Login - Nanapet</div>
                        <div style="margin-top:30px;">
                            <table width="330px">
                                <tr>
                                <div style="color: darkblue; font-size: 12px">Đăng nhập thông qua tài khoản Facebook - Nanapet <div>
                                        </tr>
                                        <tr>
                                        <div style="margin-top:20px;"></div>
                                        </tr>
                                        <tr>
                                        <div style="margin-left: 80px">
                                            <fb:login-button scope="public_profile,email,user_birthday" 
                                                             onlogin="checkLoginState();" 
                                                             data-size="xlarge">
                                            </fb:login-button>
                                        </div>
                                        </tr>
                                        </table>
                                    </div>

                                </div>
                                <div id="right_box">
                                    <div style="color: darkblue; 
                                         font-size: 17px; 
                                         font-weight:bold; 
                                         margin-left: -10px">Thông tin Facebook Login
                                    </div>
                                    <div style="width:205px; 
                                         line-height:18px; 
                                         padding-top:20px; 
                                         padding-right:50px; 
                                         margin-top: 10px; 
                                         color: darkblue; 
                                         font-size: 12px;">
                                        Chào mừng bạn đến với Nanapet Online!
                                        Hãy đăng nhập Nanapet thông qua tài khoản Facebook.
                                        </br> Mọi thắc mắc vui lòng hãy liên hệ Hotline 0933.103.203
                                    </div>
                                </div>
                        </div> <!-- end login_detail -->

                    </div><!-- end login -->
                    </form>
                </div><!-- end product_main -->
            </div><!-- end product -->
