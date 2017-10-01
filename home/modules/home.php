<?php

// Load layout
$home = $xtemplate->load('home_bootstrap');
$news = new News();

// Load news dog
$keyword = "cac-giong-cho-79";
$newsdog = $news->getNewsListAllLibaryKeyWord($keyword);
$total = count($newsdog) <= 5 ? count($newsdog) : 5;
$blocknewsdog = $xtemplate->get_block_from_str($home, 'NEWSDOG');
$tplnewsdog = '';
for ($i = 0; $i < $total; ++$i) {
    $tplnewsdog .= $xtemplate->assign_vars($blocknewsdog, array(
        'news_name' => $newsdog[$i]['news_name'],
        'news_key' => $newsdog[$i]['news_key']
    ));
}

$home = $xtemplate->assign_blocks_content($home, array(
    'NEWSDOG' => $tplnewsdog
));


// Load medical news
$keyword = "tiem-chung-ngua-thu-y-72";
$medicals = $news->getNewsListAllLibaryMainKeyWord($keyword);
$total = count($medicals) <= 7 ? count($medicals) : 7;
$blockmedical = $xtemplate->get_block_from_str($home, 'MEDICAL');
$tplmedical = '';
for ($i = 0; $i < $total; ++$i) {
    $tplmedical .= $xtemplate->assign_vars($blockmedical, array(
        'news_name' => $medicals[$i]['news_name'],
        'news_key' => $medicals[$i]['news_key']
    ));
}

$home = $xtemplate->assign_blocks_content($home, array(
    'MEDICAL' => $tplmedical
));

// Load news cat
$keyword = "cac-giong-meo-80";
$newscat = $news->getNewsListAllLibaryKeyWord($keyword);
$total = count($newscat) <= 5 ? count($newscat) : 5;
$blocknewscat = $xtemplate->get_block_from_str($home, 'NEWSCAT');
$tplnewscat = '';
for ($i = 0; $i < $total; ++$i) {
    $tplnewscat .= $xtemplate->assign_vars($blocknewscat, array(
        'news_name' => $newscat[$i]['news_name'],
        'news_key' => $newscat[$i]['news_key']
    ));
}
$home = $xtemplate->assign_blocks_content($home, array(
    'NEWSCAT' => $tplnewscat
));

// Load top news
$libaries = $news->getTopNews();
$block = $xtemplate->get_block_from_str($home, 'NEWS');
$tpl = '';
for ($i = 0; $i < count($libaries); ++$i) {
    $author = $news->getInfoAuthor($libaries[$i]['translator']);
    $idadmin = $author['idadmin_control_user'];
    $tpl .= $xtemplate->assign_vars($block, array(
        'news_image' => $libaries[$i]['news_image'],
        'news_name' => $libaries[$i]['news_name'],
        'news_shortcontent' => $libaries[$i]['news_shortcontent'],
        'news_key' => $libaries[$i]['news_key'],
        'date_publisher' => $libaries[$i]['date_publisher'],
        'translator' => $libaries[$i]['translator'],
        'idadmin' => $idadmin
    ));
}
$home = $xtemplate->assign_blocks_content($home, array(
    'NEWS' => $tpl
));

$content = $home;

?>