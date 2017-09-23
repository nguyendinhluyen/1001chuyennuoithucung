<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            {meta}
            <link rel="Shortcut Icon" href="icon.ico"> 
                <link href = "../style/css/style.css" rel="stylesheet" type="text/css">
                    <title>{title} - Control Panel</title>
                    <script language = "javascript" src="../jscript/jscript.js"></script>
                    {script}
                    <script type="text/javascript" src="../../layout/js/jquery.js"></script>   
                    <script type="text/javascript" src="../../layout/js/jquery.maskedinput.js"></script>   
                    </head>
                    <script>
                        jQuery(function ($) {
                            $('#phone').mask('(999) 999 - 9999?9',
                        {placeholder:" "});
                            $('#phone_memeber').mask('(9?99) 999 - 99999',
                        {placeholder:" "});
                            $('#phone_receiver').mask('(9?99) 999 - 99999',
                        {placeholder:" "});
                            $('#so_DT').mask('(9?99) 999 - 99999',
                        {placeholder:" "});
                        });
                    </script>
                    <body>
                        <div id = "wrapper">
                            <div id = "header">
                                Powered by Nguyen Dinh Luyen - luyen.nguyen.itbb@jvn.edu.vn - 0165 618 5047
                            </div>
                            <div id = "menu_left">
                                {menu}
                            </div>
                            <div id = "content">
                                {content}
                            </div>
                            <div class = "clear"></div>
                            <div id = "footer">Copyright 2014 &copy; Powered by Nguyen Dinh Luyen - luyen.nguyen.itbb@jvn.edu.vn - 0165 618 5047</div>
                            <div class = "clear"></div>
                        </div>
                    </body>
                    </html>