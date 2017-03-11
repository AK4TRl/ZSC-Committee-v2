<?php

require_once('../../setup.php');

try {
    $id = $_GET['id'];

    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare('SELECT `ID`, `ip`, `user`, `email`, `title`, `content`, `stime`, `flag` FROM `msgs` WHERE `ID` = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $leave = array();
    if($row = $stmt->fetch()) {
        $leave = array(
            'id' => $row['ID'],
            'author' => $row['user'],
            'ip' => $row['ip'],
            'email' => $row['email'],
            'title' => $row['title'],
            'content' => $row['content'],
            'date' => $row['stime'],
            'status' => boolval($row['flag']) ? "显示" : "隐藏"
        );
    }
    $smarty->assign('leave', $leave);

    $smarty->display('admin/leaves/read.tpl');
} catch (Exception $ex) {
    // TODO:
}
