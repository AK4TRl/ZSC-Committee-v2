<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');
require_once(dirname(__FILE__) . '/../../functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $imgPath = null;
        if (!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $tmpName = $_FILES['file']['tmp_name'];
            $desFolder = WEB_ROOT . '/files/upload/home/';
            if (!file_exists($desFolder)) {
                mkdirs($desFolder);
            }
            $fileExt = '';
            if (($dotPot = strrpos($_FILES['file']['name'], '.')) !== false) {
                $fileExt = substr($_FILES['file']['name'], $dotPot);
            }
            $fileName = sprintf("%04X%04X-%04X-%04X-%04X-%04X%04X%04X", rand(0, 0xFFFF), rand(0, 0xFFFF), rand(0, 0xFFFF), rand(0, 0xFFFF), rand(0, 0xFFFF), rand(0, 0xFFFF), rand(0, 0xFFFF), rand(0, 0xFFFF)) . $fileExt;
            $desName = $desFolder . $fileName;
            if (file_exists($tmpName)) {
                move_uploaded_file($tmpName, $desName);
                $imgPath = '/files/upload/home/' . $fileName;
            }
        }
        if ($imgPath == null) {
            if (($tmp = getConfig('hot_news')) != null) {
                $config = json_decode($tmp, true);
                $imgPath = $config['img'];
            }
            if ($imgPath == null) {
                $imgPath = "/asset/image/default.jpg";
            }
        }
        setConfig('hot_news', json_encode(array(
            'img' => $imgPath,
            'title' => $_POST['title'],
            'summary' => $_POST['summary'],
            'link' => $_POST['link']
        )));
    } catch (Exception $ex) {
        Log::error($ex->getMessage());
    }
}

$val = getConfig('hot_news');
$hot = null;
if ($val == null) {
    $hot = array(
        'img' => '/asset/image/default.jpg',
        'title' => '',
        'summary' => '',
        'link' => '',
    );
} else {
    $hot = json_decode($val, true);
}

$smarty->assign('hot', $hot);

$smarty->display('admin/home/news.tpl');
