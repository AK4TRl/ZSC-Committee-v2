<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');
require_once(dirname(__FILE__) . '/../../functions.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
    try {
        $id = $_POST['id'];
        $value = $_POST['value'];

        if ($id == 'new') {
            $db = new PDO(DB_DSN, DB_USER, DB_PSW);
            $stmt = $db->prepare('INSERT INTO `terms`(`name`, `slug`) VALUES (:name, :slug)');
            $stmt->bindParam(':name', $value, PDO::PARAM_STR);
            $stmt->bindParam(':slug', urlencode(strtoupper($value)), PDO::PARAM_STR);
            $stmt->execute();
        } else {
            $db = new PDO(DB_DSN, DB_USER, DB_PSW);
            $stmt = $db->prepare('UPDATE `terms` SET `name`=:name,`slug`=:slug WHERE `term_id` = :id');
            $stmt->bindParam(':name', $value, PDO::PARAM_STR);
            $stmt->bindParam(':slug', urlencode(strtoupper($value)), PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    } catch (Exception $ex) {
        Log::error($ex->getMessage());
    }
} else {
    $smarty->assign('category', getTags());

    $smarty->display('admin/posts/tags.tpl');
}
