<?php

require('setup.php');
require('functions.php');

try {
    if (isset($_POST['name'])) {
        $name = @$_POST['name'];
        if (trim($name) == "") {
            throw new Exception("名字不能为空");
        }
    } else {
        throw new Exception("名字不能为空");
    }

    if (isset($_POST['mail'])) {
        $mail = @$_POST['mail'];
        if (trim($mail) == "")
            throw new Exception("邮箱地址不能为空");
        if (!preg_match('/[\w!#$%&\'*+\/=?^_`{|}~-]+(?:\.[\w!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?/', $mail)) {
            throw new Exception("非法的邮箱地址");
        }
    } else {
        throw new Exception("邮箱地址不能为空");
    }

    if (isset($_POST['title'])) {
        $title = @$_POST['title'];
        if (trim($title) == "")
            throw new Exception("标题不能为空");
    } else {
        throw new Exception("标题不能为空");
    }

    if (isset($_POST['content'])) {
        $content = @$_POST['content'];
        if (trim($content) == "")
            throw new Exception("正文不能为空");
    } else {
        throw new Exception("正文不能为空");
    }

    // 防XSS攻击
    $ip = htmlspecialchars(getIP());
    $name = htmlspecialchars($name);
    $mail = htmlspecialchars($mail);
    $title = htmlspecialchars($title);
    $content = htmlspecialchars($content);

    // 存入数据库
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare('INSERT INTO `msgs`(`ip`, `user`, `email`, `title`, `content`, `stime`, `flag`) VALUES (:ip,:user,:email,:title,:content,now(),false)');
    $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
    $stmt->bindParam(':user', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':content', $content, PDO::PARAM_STR);
    $stmt->execute();

    echo "<h1>留言成功! 请等待审核。</h1>";
    header('location:message.php');
} catch (Exception $ex) {
    echo "<h1>" . $ex->getMessage() . "</h1><br>";
    echo '<script type="application/javascript" charset="utf-8">history.go(-1);</script>';
}
