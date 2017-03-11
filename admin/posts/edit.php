<?php

require_once('../../setup.php');
require_once('../../functions.php');

$post = null;
$category = null;

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
    try {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $content = $_POST['content'];
        $status = $_POST['status'];
        $category = isset($_POST['tags']) ? $_POST['tags'] : null;

        if($id == 'new') {
            $db = new PDO(DB_DSN, DB_USER, DB_PSW);
            $stmt = $db->prepare('INSERT INTO `posts`(`post_author`, `post_date`, `post_modified`, `post_title`, `post_subtitle`, `post_content`, `post_status`) VALUES(:author, NOW(), NOW(), :title, :subtitle, :content, :status)');
            // TODO: post author
            $author = 3;
            $stmt->bindParam(':author', $author, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->execute();
            $id = $db->lastInsertId();
        } else {
            $db = new PDO(DB_DSN, DB_USER, DB_PSW);
            $stmt = $db->prepare('UPDATE `posts` SET `post_author` = :author, `post_title` = :title, `post_subtitle` = :subtitle, `post_content` = :content, `post_status` = :status, `post_modified` = NOW() WHERE `ID` = :id');
            // TODO: post author
            $author = 3;
            $stmt->bindParam(':author', $author, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->execute();
        }

        $tagsList = array();
        if($category != null) {
            foreach ($category as $value) {
                if (preg_match('/__new_tag__(:<name>.*?)__/', $value, $matches)) {
                    $tagName = $matches["name"];
                    $tagId = getIdByTagName($tagName);
                    if ($tagId == null) {
                        $tagId = addNewTag($tagName);
                    }
                    $tagsList[intval($tagId)] = getNameByTagId(intval($tagId));
                } else {
                    $tagsList[intval($value)] = getNameByTagId(intval($value));
                }
            }
            array_unique($tagsList);
            updatePostTags($id, $tagsList);
        }

        $category = array();
        foreach ($tagsList as $key => $value) {
            array_push($category, array(
                'id' => $key,
                'name' => $value
            ));
        }

        $post = array(
            'id' => $id,
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
            'status' => $status
        );
    } catch (Exception $ex) {
        // TODO: log
    }
} else {
    try {
        if (isset($_GET) && isset($_GET['id'])) {
            $id = $_GET['id'];
            $article = getPostByID($id);

            $post = array(
                'id' => $_GET['id'],
                'title' => $article['title'],
                'subtitle' => $article['subtitle'],
                'content' => $article['content'],
                'status' => $article['status']
            );

            $category = getPostTags($id);
        } else {
            throw new Exception("没有找到该文章");
        }
    } catch (Exception $ex) {
        // TODO: log
        die($ex->getMessage());
    }
}

$smarty->assign('post', $post);
$smarty->assign('category', json_encode($category));
$smarty->assign('tags', getTags());

$smarty->display('admin/posts/edit.tpl');
