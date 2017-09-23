<script type="text/javascript">
    (function () {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/client:plusone.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();
    function signinCallback(authResult)
    {
        if (authResult['status']['signed_in'])
        {
            // Update the app to reflect a signed in user
            // Hide the sign-in button now that the user is authorized, for example:
            gapi.client.load('plus', 'v1', function ()
            {
                var request = gapi.client.plus.people.get(
                        {
                            'userId': 'me'
                        });
                request.execute(function (resp)
                {
                    var primaryEmail;
                    var nameUser;
                    var gender;
                    var birthday;
                    for (var i = 0; i < resp.emails.length; i++)
                    {
                        if (resp.emails[i].type === 'account')
                            primaryEmail = resp.emails[i].value;
                    }
                    nameUser = resp.displayName;
                    gender = resp.gender;
                    birthday = resp.birthday;
                    var getResult = function ()
                    {
                        result = null;
                        $.ajax({
                            type: "POST",
                            url: "{linkS}home/modules/ajax/SessionAjaxGmail.php",
                            data: {name: nameUser, email: primaryEmail, gender: gender, birthday:birthday},
                            async: false,
                            success: function (msg)
                            {
                                result = msg;
                            }
                        });
                        return result;
                    }
                    var result = getResult();
                    alert(result);
                    if (result === "Đăng nhập thành công.")
                        window.location = 'thong-tin-tai-khoan';
                    else
                        window.location = 'gmail-login';
                });
            });
        } else
        {
            // Update the app to reflect a signed out user
            // Possible error values:
            //   "user_signed_out" - User is signed-out
            //   "access_denied" - User denied access to your app
            //   "immediate_failed" - Could not automatically log in the user
            //   alert('Sign-in state: ' + authResult['error']);
        }
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
                        <div style="color: darkblue; font-size: 17px; font-weight:bold">Gmail Login - Nanapet</div>
                        <div style="margin-top:30px;">
                            <table width="330px">
                                <tr>
                                <div style="color: darkblue; font-size: 12px">Đăng nhập thông qua tài khoản Gmail - Nanapet <div>
                                        </tr>
                                        <tr>
                                        <div style="margin-top:20px;"></div>
                                        </tr>
                                        <tr>
                                        <div style="margin-left: 80px">
                                            <span id="signinButton">
                                                <span
                                                    class="g-signin"                                                  
                                                    data-callback="signinCallback"
                                                    data-clientid="1013527795357-j6ni5do1psd3pemq8khg9r6oams7fu9t.apps.googleusercontent.com"
                                                    data-cookiepolicy="single_host_origin"
                                                    data-requestvisibleactions="http://schema.org/AddAction"
                                                    data-scope="https://www.googleapis.com/auth/plus.profile.emails.read">
                                                </span>
                                            </span>
                                        </div>
                                        </tr>

                                        </table>
                                    </div>
                                </div>
                                <div id="right_box">
                                    <div style="color: darkblue; font-size: 17px; font-weight:bold; margin-left: -10px">Thông tin Gmail Login
                                    </div>
                                    <div style="width:205px; line-height:18px; padding-top:20px; padding-right:50px; margin-top: 10px; color: darkblue; font-size: 12px;">
                                        Chào mừng bạn đến với Nanapet Online!
                                        Hãy đăng nhập Nanapet thông qua tài khoản Gmail.
                                        </br> Mọi thắc mắc vui lòng hãy liên hệ Hotline 0933.103.203
                                    </div>
                                </div>
                        </div> <!-- end login_detail -->
                    </div><!-- end login -->
                    </form>
                </div><!-- end product_main -->
            </div><!-- end product -->
