<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');
require_once(dirname(__FILE__) . '/../../functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
    try {
        $id = $_POST['id'];

        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stmt = $db->prepare('DELETE FROM `posts` WHERE `ID` = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $ex) {
        Log::error($ex->getMessage());
    }

    header('location:/admin/posts/');
} else {
    $id = $_GET['id'];

    $article = getPostByID($id);
    $smarty->assign('article', array(
        'id' => $id,
        'title' => $article['title']
    ));

    $smarty->display('admin/posts/delete.tpl');
}
