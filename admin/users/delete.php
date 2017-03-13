<?php

require_once('../../setup.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
        $id = $_POST['id'];

        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stmt = $db->prepare('DELETE FROM `users` WHERE `id` = :id');
        $stmt->execute();
    }

    header('location: /admin/users/');
} catch (Exception $ex) {
    // TODO
}
