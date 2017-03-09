<?php

require('setup.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("<h1>拒绝访问</h1>");
}

try {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);

    unset($stmt);
    $stmt = $db->prepare("SELECT `flag` FROM `msgs` WHERE `ID` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($row = $stmt->fetch()) {
        if ($row['flag'] == 0)
            die("<h1>拒绝访问</h1>");
    }

    unset($stmt);
    $stmt = $db->prepare("SELECT `user`,`stime`,`title`,`content` FROM `msgs` WHERE `ID` = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $msg = array();
    if ($row = $stmt->fetch()) {
        $msg['author'] = $row['user'];
        $msg['date'] = $row['stime'];
        $msg['title'] = $row['title'];
        $msg['content'] = $row['content'];
    } else {
        die ("<h1>拒绝访问!</h1>");
    }
    $smarty->assign('msg', $msg);
} catch (Exception $ex) {
    //
}

$smarty->display('read-message.tpl');