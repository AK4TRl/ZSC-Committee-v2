<?php

session_start();
require_once(dirname(__FILE__) . '/../setup.php');
require_once(dirname(__FILE__) . '/utils/Log.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
        $username = $_POST['username'];
        $password = crypt($_POST['password'], SALT);

        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stmt = $db->prepare('SELECT `ID`, `user_login`, `user_nick`, `user_email`, `user_register`, `user_status`, `user_level` FROM `users` WHERE `user_login` = :username AND `user_psw` = :password');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetch()) {
            if (boolval($row['user_status']) == false) {
                Log::warn('用户' . $username . '登陆失败，原因是被禁用');
                die('用户被禁用');
            }

            $_SESSION['user'] = array(
                'id' => $row['ID'],
                'username' => $row['user_login'],
                'nick' => $row['user_nick'],
                'role' => $row['user_level'],
                'last-visit' => time()
            );

            Log::info('root 登陆系统');
            header('location: /admin/index.php');
        } else {
            Log::warn('用户' . $username . '登陆失败，原因用户名或密码错误');
        }
    }
} catch (Exception $ex) {
    Log::error($ex->getMessage());
}

$smarty->display('admin/login.tpl');
