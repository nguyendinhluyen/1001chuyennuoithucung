<?php

// Load layout
$home = $xtemplate->load('home_bootstrap');

// Load top news
$news = new News();
$libaries = $news->getTopNews();

$block = $xtemplate->get_block_from_str($home, 'NEWS');
$tpl = '';
for ($i = 0; $i < count($libaries); ++$i) {
    $tpl .= $xtemplate->assign_vars($block, array(
        'news_image' => $libaries[$i]['news_image'],
        'news_name' => $libaries[$i]['news_name'],
        'news_shortcontent' => $libaries[$i]['news_shortcontent'],
        'news_key' => $libaries[$i]['news_key'],
        'date_publisher' => $libaries[$i]['date_publisher'],
        'translator' => $libaries[$i]['translator']
            
    ));
}
$home = $xtemplate->assign_blocks_content($home, array(
    'NEWS' => $tpl
));


$content = $home;
?>