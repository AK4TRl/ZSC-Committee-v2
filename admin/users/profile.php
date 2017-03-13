<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $confirm = trim($_POST['confirm']);

        $smarty->assign('nick', $username);
        if (strlen($username) < 4 && strlen($password) == 0) {
            $smarty->assign('error', '用户名不能少于4位');
        } else if (strlen($username) == 0 && strlen($password) != 0) {
            $db = new PDO(DB_DSN, DB_USER, DB_PSW);
            $stmt = $db->prepare('UPDATE `users` SET `user_psw`=:password WHERE `ID` = :id');
            $psw = crypt($password, SALT);
            $stmt->bindParam(':password', $psw, PDO::PARAM_STR);
            $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
            $stmt->execute();
        } else {
            if (strlen($password) != 0) {
                if (strlen($password) < 6) {
                    $smarty->assign('error', '密码不能少于6位');
                } else if ($password != $confirm) {
                    $smarty->assign('error', '两次密码不相同');
                } else {
                    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
                    $stmt = $db->prepare('UPDATE `users` SET `user_psw`=:password,`user_nick`=:nick WHERE `ID` = :id');
                    $psw = crypt($password, SALT);
                    $stmt->bindParam(':password', $psw, PDO::PARAM_STR);
                    $stmt->bindParam(':nick', $username, PDO::PARAM_STR);
                    $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
                    $stmt->execute();
                }
            } else {
                $db = new PDO(DB_DSN, DB_USER, DB_PSW);
                $stmt = $db->prepare('UPDATE `users` SET `user_nick`=:nick WHERE `ID` = :id');
                $stmt->bindParam(':nick', $username, PDO::PARAM_STR);
                $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
        }
    }
} catch (Exception $ex) {
    Log::error($ex->getMessage());
}

$smarty->display('admin/users/profile.tpl');
