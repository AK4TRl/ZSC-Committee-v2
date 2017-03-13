<?php

session_start();

require_once(dirname(__FILE__) . '/../setup.php');
require_once(dirname(__FILE__) . '/utils/Log.php');

try {
    if (!isset($_SESSION['user'])) {
        header('location: /admin/login.php');
        return;
    }

    $user = $_SESSION['user'];
    if (($user['last-visit'] + 1440) < time()) {
        unset($_SESSION['user']);
        header('location: /admin/login.php');
        return;
    }
    // 更新最后访问时间
    $_SESSION['user']['last-visit'] = time();
    $smarty->assign('user', $user);

    // 通知
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stat = $db->prepare('SELECT `ID`, `event`, `date`, `level` FROM `logs` WHERE `flag` = 0 ORDER BY `date` DESC LIMIT 0, 10');
        $stat->execute();

        $notification = array();
        while ($row = $stat->fetch()) {
            array_push($notification, array(
                'id' => $row['ID'],
                'event' => $row['event'],
                'date' => $row['date'],
                'level' => $row['level']
            ));
        }
        $smarty->assign('notification', $notification);
    } catch (Exception $ex) {
        Log::error($ex);
    }
} catch (Exception $ex) {
    Log::error($ex);
}


