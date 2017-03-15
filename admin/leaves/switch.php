<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');

try {
    $id = $_GET['id'];
    $status = $_GET['s'];

    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare('UPDATE `msgs` SET `flag`=:status WHERE `ID` = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->execute();

    header('location:/admin/leaves');
} catch (Exception $ex) {
    Log::error($ex->getMessage());
}
