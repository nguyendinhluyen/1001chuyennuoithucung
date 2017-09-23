<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Control Panel - Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            {refresh}
            <link rel="Shortcut Icon" href="icon.ico"> 
                <link href = "style/css/style.css" rel="stylesheet" type="text/css">
                    </head>
                    <body>
                        <div id = 'frmlogin'>
                            <form method="post" enctype='multipart/form-data' id = "frm" name = "frm">
                                <div style = "border:1px #006AAA solid;width:250px">
                                    <div class = 'title' style ='font-weight:bold;line-height:20px;text-align:center'>
                                        Đăng nhập hệ thống
                                    </div>
                                    <div style ='padding:5px'>
                                        {error}
                                        <p>
                                            <label>Tên đăng nhập :</label>
                                            <input style ='width:120px' class ='fieldinput' type = "text" name = "username"/>
                                        </p>
                                        <p>
                                            <label>Mật khẩu : </label>
                                            <input style ='width:120px' class ='fieldinput' type = "password" name = "password"/>
                                        </p>
                                        <label>&nbsp;</label>
                                        <input class ='button' type = "submit" name = "btnlogin" value = "Đăng nhập" {disabled}/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </body>
                    </html>