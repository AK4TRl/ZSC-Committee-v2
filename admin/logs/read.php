<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');

try {
    $id = $_GET['id'];

    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare('UPDATE `logs` SET `flag` = 1 WHERE `ID` = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header('location: /admin/logs/');
} catch (Exception $ex) {
    Log::error($ex->getMessage());
}
