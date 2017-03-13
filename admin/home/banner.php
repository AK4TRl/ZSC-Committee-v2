<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');
require_once(dirname(__FILE__) . '/../../functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $data = $_POST['data'];

        if (isset($_POST['action']) && $_POST['action'] == 'new') {
            array_push($data, array(
                'id' => $_POST['new']['id'],
                'title' => $_POST['new']['title'],
                'link' => $_POST['new']['link'],
                'img' => $_POST['new']['img']
            ));
        }
        sort($data);
        // Bubble Sort
        $cnt = count($data);
        $cmp = function ($a, $b) {
            if (is_numeric($a['id']) && is_numeric($b['id']))
                return $a['id'] < $b['id'];
            if (is_numeric($a['id']))
                return true;
            return false;
        };
        for ($i = 1; $i < $cnt; ++$i) {
            for ($j = 0; $j < $cnt - $i; ++$j) {
                if (!$cmp($data[$j], $data[$j + 1])) {
                    $tmp = $data[$j + 1];
                    $data[$j + 1] = $data[$j];
                    $data[$j] = $tmp;
                }
            }
        }

        Log::info('用户' . $user['username'] . '修改了首页轮播');
        setConfig('banner_list', json_encode($data));
    } catch (Exception $ex) {
        Log::error($ex->getMessage());
    }
}
if (($res = getConfig('banner_list')) == null) {
    $res = json_encode(array(
        'id' => 1,
        'title' => '默认标题',
        'link' => '',
        'img' => '/asset/image/default.jpg'
    ));
}
$result = json_decode($res, true);

$smarty->assign('data', $result);

$smarty->display('admin/home/banner.tpl');
