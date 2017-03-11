<?php

require_once('../../setup.php');

try {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare('SELECT `ID`, `user_login`, `user_nick`, `user_email`, `user_status`, `user_level` FROM `users`');
    $stmt->execute();

    $users = array();
    while ($row = $stmt->fetch()) {
        array_push($users, array(
            'id' => $row['ID'],
            'login' => $row['user_login'],
            'nick' => $row['user_nick'],
            'email' => $row['user_email'],
            'status' => $row['user_status'],
            'level' => $row['user_level']
        ));
    }

    $smarty->assign('users', $users);
} catch (PDOException $ex) {
    // TODO
} catch (Exception $ex) {
    // TODO
}

$smarty->display('admin/users/index.tpl');
