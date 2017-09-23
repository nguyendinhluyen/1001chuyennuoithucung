<?php

	$timeout = 1; //khoáº£ng thá»�i gian giá»¯a 2 láº§n up sáº£n pháº©m

	$pp = 1;//sá»‘ sáº£n pháº©m hiá»ƒn thá»‹

	$imgExtent = 'jpg|gif|png|jpeg';//file hÃ¬nh Ä‘Æ°á»£c phÃ©p upload

	$mediaExtent ='swf|flv';//file media Ä‘Æ°á»£c phÃ©p upload

	$imgSize = '512000';//dung lÆ°á»£ng hÃ¬nh cho phÃ©p

	$mediaSize = '1024000';//dung lÆ°á»£ng media cho phÃ©p

	$ImgW	= 140;//resize áº£nh theo width

	$upMedia = 2;

	$upImg = 5;

	$linkS ='/';
        $linkSf = 'http://1001chuyennuoithucung.com/';
	
	$server_name = 'http://1001chuyennuoithucung.com/';
	$SMTP_Host = "ssl://fpt02.bin.com.vn";
	$SMTP_Port = 465;
	$SMTP_account = "info@1001chuyennuoithucung.com";
	$SMTP_password = "123456";
	
	if($_SERVER['SERVER_NAME']=='118.69.195.172')
	{
		$server_name = 'http://1001chuyennuoithucung.com/';
	}
	//===========================================================
	if($_SERVER['SERVER_NAME']=='localhost' or $_SERVER['SERVER_NAME']=='118.69.195.172')
	{
		//$linkS ='/chuyennu/';
                $linkS ='/1001chuyennuoithucung/';
	}

?>