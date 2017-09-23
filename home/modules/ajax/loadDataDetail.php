<?php

include('home_start.php');

$news_key = input($_GET['news_key']);



$data = $xtemplate->load('relax_detail');
;

//echo $tab;
//gioi-thie tab=1
//nhan-nuoi-pet tab=2
//thu-vien tab=3
//kuyen-mai tab=4
//thu-gian tab=5
//lien-he tab=6

$news = new News();



$infoData = $news->getDetailNews($news_key);

for ($i = 1; $i < 100; $i++) {
    if ($i < 10) {
        $infoData['news_content'] = str_replace('begin' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $infoData['news_content']);

        $infoData['news_content'] = str_replace('end' . $i, '</A>', $infoData['news_content']);
        $infoData['news_content'] = str_replace('beginreference' . $i, '<A name="section' . $i . '"style="color:#000">', $infoData['news_content']);
        $infoData['news_content'] = str_replace('endreference' . $i, '</A>', $infoData['news_content']);
    } else {
        $infoData['news_content'] = str_replace('begin0' . $i, '<A href="#section' . $i . '"style="color:#000; text-decoration:underline">', $infoData['news_content']);

        $infoData['news_content'] = str_replace('end0' . $i, '</A>', $infoData['news_content']);
        $infoData['news_content'] = str_replace('beginreference0' . $i, '<A name="section' . $i . '"style="color:#000">', $infoData['news_content']);
        $infoData['news_content'] = str_replace('endreference0' . $i, '</A>', $infoData['news_content']);
    }
}

//Thay cho toppage
$infoData['news_content'] = str_replace('toppage', '<A href="#section0" style="text-decoration:underline"> <b>Về đầu trang</b> </A>', $infoData['news_content']);

$infoData['news_content'] = $infoData['news_content'] . '<A href="#section0" style="text-decoration:underline" ><br><b>Về đầu trang</br></b></A>';

//$infoData['news_name'] = '<A name="section0">'.$infoData['news_name'].'</A>';


$data = $xtemplate->replace($data, array(
    'news_name' => $infoData['news_name'],
    'news_content' => $infoData['news_content'],
        ));



$msg = "<div class='data'><ul>" . 'hello  ajax' . "</ul></div>";

$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";

$total_string = "<span class='total' a='1'>Page <b>" . 3 . "</b> of <b>1</b></span>";

$msg = $msg . "</ul>" . 'ok' . "</div>";

echo $data; // = $data.' tag = '.$tab.' detail , news_key = '.$news_key;
?>

