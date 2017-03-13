<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
        $id = $_POST['id'];
        $nick = $_POST['nick'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $level = $_POST['level'];

        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stmt = $db->prepare('UPDATE `users` SET `user_nick` = :nick, `user_email` = :email, `user_status` = :status, `user_level` = :level WHERE `id` = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nick', $nick, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':level', $level, PDO::PARAM_INT);
        $stmt->execute();
    }

    header('location: /admin/users/');
} catch (Exception $ex) {
    Log::error($ex);
}
