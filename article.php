<?php

require('setup.php');
require('functions.php');

if (isset($_GET['id']))
    $id = $_GET['id'];
else
    die("<h1>拒绝访问. 文章ID非法</h1>");

session_start();
if (!isset($_SESSION['post-hit'])) {
    $_SESSION['post-hit'] = array();
}

try {
    // 对访客或低权限的用户判断是否有权阅读非公开文章
    if (!isset($_SESSION['power']) || ($_SESSION['power'] > 20)) {
        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stmt = $db->prepare("SELECT `post_status` FROM `posts` WHERE `ID` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if (($row = $stmt->fetch()) && ($row['post_status'] != 1)) {
            die("<h1>无权访问.</h1>");
        }
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}

if (isset($_SESSION['post-hit'][$id])) {
    if ((time() - $_SESSION['post-hit'][$id]) >= 3600) {
        $_SESSION['post-hit'][$id] = time();
        // Update hit number.
        UpdateHit($id);
    }
} else {
    $_SESSION['post-hit'][$id] = time();
    // Update hit number.
    UpdateHit($id);
}

$db = new PDO(DB_DSN, DB_USER, DB_PSW);

$stmt = $db->prepare("SELECT post_title,post_subtitle,post_content,post_author,post_date,post_modified,post_hit from  `posts` WHERE ID = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

$article = array();
if ($row = $stmt->fetch()) {
    $article['title'] = $row['post_title'];
    $article['subtitle'] = $row['post_subtitle'];
    $article['content'] = $row['post_content'];
    $article['author'] = getUserByID($row['post_author']);
    $article['date'] = $row['post_modified'];
    $article['hit'] = $row['post_hit'];
    $article['category'] = implode(" · ", getPostType($id));
} else {
    die("<h1>文章找不到了...</h1>");
}

$smarty->assign('article', $article);

$smarty->display('article.tpl');
