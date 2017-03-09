<?php

require('setup.php');
require_once('functions.php');

if (isset($GET['page']))
    $page = $_GET['page'];
else
    $page = 1;

if (isset($_GET['id']))
    $id = $_GET['id'];
else
    die('<h1>非法操作!</h1>');

try {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);

    // Query category by `ID`
    unset($stmt);
    $stmt = $db->prepare("SELECT `name` FROM `terms` WHERE `term_id` = :termId");
    $stmt->bindParam(':termId', $id, PDO::PARAM_INT);
    $stmt->execute();
    $category = null;
    if ($row = $stmt->fetch()) {
        $category = $row['name'];
    } else {
        die('<h1>没有找到该分类</h1>');
    }
    $smarty->assign('category', $category);

    // Query article total number
    unset($stmt);
    $stmt = $db->prepare("SELECT COUNT(*) as `cnt` FROM `posts` WHERE ID IN ( SELECT post_id FROM `term_relationships` WHERE term_tax_id = :termId ) AND `post_status` = 1");
    $stmt->bindParam(':termId', $id, PDO::PARAM_INT);
    $stmt->execute();
    $tot = null;
    if ($row = $stmt->fetch()) {
        $tot = $row['cnt'];
    } else {
        die('<h1>数据库错误</h1>');
    }
    $smarty->assign('total', $tot);

    // Calculate & make page breaking
    $pageNum = ceil($tot / SEARCH_PAGE_LMT);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = max(1, min($page, $pageNum));
    $startPos = ($page - 1) * SEARCH_PAGE_LMT;

    // Query result
    unset($stmt);
    $stmt = $db->prepare("SELECT ID,post_title,post_content,post_author,post_modified FROM `posts` WHERE ID IN ( SELECT post_id FROM `term_relationships` WHERE term_tax_id = :termId ) AND `post_status` = 1 ORDER BY post_modified DESC LIMIT :startPos, :limit");
    $pageShowLmt = SEARCH_PAGE_LMT;
    $stmt->bindParam(':termId', $id, PDO::PARAM_INT);
    $stmt->bindParam(':startPos', $startPos, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $pageShowLmt, PDO::PARAM_INT);
    $stmt->execute();

    // Parse SQL result to array
    $result = array();
    while ($row = $stmt->fetch()) {
        array_push($result, array(
            'id' => $row['ID'],
            'title' => $row['post_title'],
            'preview' => usubstr(trim(strip_tags($row['post_content'])), 0, 512),
            'author' => getUserByID($row['post_author']),
            'date' => $row['post_modified'],
            'category' => implode(" · ", getPostType($row['ID']))
        ));
    }
    $smarty->assign('result', $result);
    $smarty->assign('page', $page);
    $smarty->assign('id', $id);
} catch (Exception $ex) {
    // do nothing
}

$smarty->display('tag.tpl');
