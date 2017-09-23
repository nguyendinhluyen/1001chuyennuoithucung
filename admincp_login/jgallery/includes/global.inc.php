<?
$gTableName = "records";
$gPosfield="recordListingID";
$gUploadDir="../../upload/gallery/";
$gArrMessage=array();
function add_notice_message($str)
{
global $arr_notice_messages;
if(!is_array($arr_notice_messages)) $arr_notice_messages=array();
array_push($arr_notice_messages, "<li>$str</li>");
}

?>