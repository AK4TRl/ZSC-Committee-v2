<?php

require_once('../../setup.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $confirm = trim($_POST['confirm']);
        $nick = trim($_POST['nick']);
        $email = trim($_POST['email']);
        $level = intval($_POST['level']);

        if ((strlen($username) < 6)
            || (strlen($password) < 6)
            || ($password != $confirm)
            || (strlen($nick) < 6)
            || ($level != 10 && $level != 20)
        ) {
            $smarty->assign('resume', array(
                'username' => $username,
                'password' => $password,
                'confirm' => $confirm,
                'nick' => $nick,
                'email' => $email,
                'level' => $level
            ));
        } else {
            $db = new PDO(DB_DSN, DB_USER, DB_PSW);
            $stmt = $db->prepare('INSERT INTO `users`(`user_login`, `user_psw`, `user_nick`, `user_email`, `user_register`, `user_status`, `user_level`) VALUES (:username, :password, :nick, :email, NOW(), 0, :level)');
            $stmt->bindValue(':username', htmlspecialchars($username), PDO::PARAM_STR);
            $stmt->bindValue(':password', htmlspecialchars($password), PDO::PARAM_STR);
            $stmt->bindValue(':nick', htmlspecialchars($nick), PDO::PARAM_STR);
            $stmt->bindValue(':email', htmlspecialchars($email), PDO::PARAM_STR);
            $stmt->bindValue(':level', htmlspecialchars($level), PDO::PARAM_INT);
            $stmt->execute();

            header('location: /admin/users/');
        }
    } else {
        $smarty->assign('resume', array(
            'username' => '',
            'password' => '',
            'confirm' => '',
            'nick' => '',
            'email' => '',
            'level' => 20
        ));

        $smarty->display('admin/users/create.tpl');
    }
} catch (Exception $ex) {
    // TODO
}

