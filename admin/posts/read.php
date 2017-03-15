<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');
require_once(dirname(__FILE__) . '/../../functions.php');

try {
    $id = $_GET['id'];

    $db = new PDO(DB_DSN, DB_USER, DB_PSW);

    $stmt = $db->prepare("SELECT ID,post_title,post_subtitle,post_content,post_author,post_date,post_modified,post_status,post_hit from `posts` WHERE ID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $article = array();
    if ($row = $stmt->fetch()) {
        $article['id'] = $row['ID'];
        $article['title'] = $row['post_title'];
        $article['subtitle'] = $row['post_subtitle'];
        $article['content'] = $row['post_content'];
        $article['author'] = getUserByID($row['post_author']);
        $article['date'] = $row['post_modified'];
        $article['hit'] = $row['post_hit'];
        $article['status'] = $row['post_status'];
        $article['category'] = implode(" · ", getPostType($id));
    } else {
        die("<h1>文章找不到了...</h1>");
    }

    switch (intval($article['status'])) {
        case 0:
            $article['status'] = "隐藏";
            break;
        case 1:
            $article['status'] = "公开";
            break;
        case 2:
            $article['status'] = "草稿";
            break;
    }

    $smarty->assign('article', $article);

    $smarty->display('admin/posts/read.tpl');
} catch (Exception $ex) {
    Log::error($ex->getMessage());
}
