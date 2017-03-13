<?php

require_once ('../../setup.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
    $id = $_POST['id'];

    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare('DELETE FROM `msgs` WHERE `ID` = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header('location:/admin/leaves/');
} else {
    $id = $_GET['id'];

    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare('SELECT `title`, `content` FROM `msgs` WHERE `ID` = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if($row = $stmt->fetch()) {
        $smarty->assign('leave', array(
            'id' => $id,
            'title' => $row['title'],
            'content' => $row['content']
        ));
    }

    $smarty->display('admin/leaves/delete.tpl');
}
