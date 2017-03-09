<?php

require('setup.php');
require('functions.php');

$startTime = microtime(true);

$page = isset($GET['page']) ? $_GET['page'] : 1;
$keyword = isset($_GET['s']) ? $_GET['s'] : '';

$kwa = MySplit($keyword, " ");
$keyword = implode(" ", $kwa);
if (count($kwa) == 0)
    $kwa = array('');
$smarty->assign('keyword', $keyword);

try {
    // PDO database object
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);

    // Make query params
    $t_params = "";
    $st_params = "";
    $c_params = "";
    $i = 0;
    foreach ($kwa as $value) {
        if ($i != 0) {
            $t_params = $t_params . " AND";
            $st_params = $st_params . " AND";
            $c_params = $c_params . " AND";
        }
        $t_params = $t_params . " `post_title` LIKE (:_p$i)";
        $st_params = $st_params . " `post_subtitle` LIKE (:_p$i)";
        $c_params = $c_params . " `post_content` LIKE (:_p$i)";
        ++$i;
    }

    // Query article total number
    unset($stmt);
    $stmt = $db->prepare("SELECT count(*) as 'cnt' FROM `posts` WHERE `post_status` = 1 AND (($t_params) OR ($st_params) OR ($c_params))", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $i = 0;
    foreach ($kwa as $value) {
        $stmt->bindValue(":_p$i", '%' . $value . '%');
        ++$i;
    }

    $stmt->execute();

    $row = $stmt->fetch();
    $resCnt = $row['cnt'];
    $smarty->assign('total', $resCnt);

    // Calculate & make page breaking
    $pageNum = ceil($resCnt / SEARCH_PAGE_LMT);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = max(1, min($page, $pageNum));
    $startPage = ($page - 1) * SEARCH_PAGE_LMT;

    $smarty->assign('page', $page);

    // Query result
    unset($stmt);
    $stmt = $db->prepare("SELECT ID,post_title,post_content,post_author,post_modified FROM `posts` WHERE `post_status` = 1 AND (($t_params) OR ($st_params) OR ($c_params)) ORDER BY post_modified DESC LIMIT $startPage, " . SEARCH_PAGE_LMT, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $i = 0;
    foreach ($kwa as $value) {
        $stmt->bindValue(":_p$i", '%' . $value . '%');
        ++$i;
    }

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
} catch (Exception $ex) {
    //
}

// Use time
$smarty->assign('used', microtime(true) - $startTime);

$smarty->display('search.tpl');
