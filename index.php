<?php

require('setup.php');
require('functions.php');

// 首页轮播
$tBanners = json_decode(getConfig('banner_list'), true);
$banners = array();
foreach ($tBanners as $value) {
    array_push($banners, array(
        'text' => $value['title'],
        'url' => $value['link'],
        'image' => $value['img']
    ));
}
$smarty->assign('banner', json_encode($banners));

// 最新通知
$smarty->assign('notice', getNews(86));
$smarty->assign('moreNotice', 'tag.php?id=86');

// 最新动态
$smarty->assign('partNewsHot', json_decode(getConfig('hot_news'), true));
$smarty->assign('partNews', getNews(85, 14));

// 互动焦点
$smarty->assign('partFocusHot', json_decode(getConfig('hot_focus'), true));
$smarty->assign('partFocus', getNews(87, 14));

// 媒体聚焦
$smarty->assign('partMediaHot', json_decode(getConfig('hot_media'), true));
$smarty->assign('partMedia', getNews(88, 14));

$smarty->display('index.tpl');
