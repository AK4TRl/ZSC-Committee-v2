<?php

require('setup.php');

$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$cnt = 0;
try {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT COUNT(*) AS 'cnt' FROM `msgs` WHERE `flag` = 1");
    $stmt->execute();
    $row = $stmt->fetch();
    $cnt = $row['cnt'];
} catch (Exception $ex) {
}

$tot = floor(($cnt + $limit - 1) / $limit);
$page = max(0, min($page, $tot));

$msgList = array();
try {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT `ID`,`user`,`title`,`stime` FROM `msgs` WHERE `flag` = 1 ORDER BY `stime` DESC LIMIT :page,:limit");
    $st = ($page - 1) * $limit;
    $stmt->bindParam(':page', $st, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        array_push($msgList, array(
            'author' => $row['user'],
            'title' => $row['title'],
            'id' => $row['ID'],
            'time' => $row['stime']
        ));
    }
} catch (Exception $ex) {
}

$smarty->assign('msg', $msgList);
$smarty->assign('page', $page);
$smarty->assign('tot', $tot);


$smarty->display('message.tpl');
