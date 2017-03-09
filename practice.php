<?php

require('setup.php');
require('functions.php');

// 照片墙
$tPhotos = getNews(120, 10);
$photos = array();
foreach ($tPhotos as $value) {
    array_push($photos, array(
        'url' => "article.php?id={$value['id']}",
        'text' => $value['title'],
        'image' => getPostFirstImage($value['id'])
    ));
}
$smarty->assign('photos', json_encode($photos));

// 最新报道
$smarty->assign('news', getNews(118, 11));

// 相关下载
$smarty->assign('downloads', getNews(119, 11));

// 通知
$smarty->assign('notify', getNews(121, 11));

$smarty->display('practice.tpl');
