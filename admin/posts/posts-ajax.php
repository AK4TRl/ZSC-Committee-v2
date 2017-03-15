<?php
/**
 * Created by PhpStorm.
 * User: LiuACG
 * Date: 2017/3/10
 * Time: 19:36
 */

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');
require_once(dirname(__FILE__) . '/../../functions.php');

function getPostStatus($status)
{
    switch ($status) {
        case 0:
            return "未发布";
        case 1:
            return "已发布";
        case 2:
            return "草稿";
        default:
            return "未知状态";
    }
}

try {
    $draw = $_POST['draw'];
    $dir['column'] = $_POST['order']['0']['column'];
    $dir['dir'] = $_POST['order'][0]['dir'];
    $start = intval($_POST['start']);
    $length = intval($_POST['length']);
    $search = $_POST['search']['value'];

    // Make Query String

    // Make Where
    $keywords = explode(" ", $search);
    $bWhere = false;
    $where = "WHERE ";
    for ($idx = 0; $idx < count($keywords); ++$idx) {
        if ($keywords[$idx] == '')
            continue;
        if ($idx != 0)
            $where = $where . " AND ";
        $bWhere = true;
        $where = $where . "(`post_title` LIKE :_p{$idx} OR `post_subtitle` LIKE :_p{$idx} OR `post_content` LIKE :_p{$idx})";
    }
    if ($bWhere == false) $where = "";

    // Make Order
    $order = "ORDER BY ";
    switch (intval($dir['column'])) {
        case 0:
            $order = $order . "ID ";
            break;
        case 1:
            $order = $order . "post_title ";
            break;
        case 2:
            $order = $order . "post_author ";
            break;
        case 3:
            throw new Exception("不支持的操作 ");
            break;
        case 4:
            $order = $order . "post_modified ";
            break;
        case 5:
            $order = $order . "post_status ";
            break;
        default:
            $order = $order . "post_title ";
            break;
    }
    $order = $order . htmlspecialchars($dir['dir']);

    // Query
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);

    // Query1
    unset($stmt);
    $query0 = "SELECT COUNT(*) FROM `posts`";
    $stmt = $db->prepare($query0);
    $stmt->execute();
    $total = intval(($stmt->fetch())[0]);

    unset($stmt);
    $query1 = "SELECT COUNT(*) FROM `posts` " . $where;
    $stmt = $db->prepare($query1);
    for ($idx = 0; $idx < count($keywords); ++$idx) {
        if ($keywords[$idx] == '')
            continue;
        $value = '%' . $keywords[$idx] . '%';
        $stmt->bindParam(":_p{$idx}", $value, PDO::PARAM_STR);
    }
    $stmt->execute();
    $filter = intval(($stmt->fetch())[0]);

    // Query2
    unset($stmt);
    $query2 = "SELECT * FROM `posts` " . $where . " " . $order . " LIMIT :start, :length";
    $stmt = $db->prepare($query2);
    for ($idx = 0; $idx < count($keywords); ++$idx) {
        if ($keywords[$idx] == '')
            continue;
        $value = '%' . $keywords[$idx] . '%';
        $stmt->bindParam(":_p{$idx}", $value, PDO::PARAM_STR);
    }
    $stmt->bindParam(":start", $start, PDO::PARAM_INT);
    $stmt->bindParam(":length", $length, PDO::PARAM_INT);
    $stmt->execute();

    $result = array();
    while ($row = $stmt->fetch()) {
        array_push($result, array(
            "id" => $row['ID'],
            "title" => $row['post_title'],
            "author" => getUserByID($row['post_author']),
            "category" => implode(" · ", getPostType($row['ID'])),
            "date" => $row['post_modified'],
            "status" => getPostStatus($row['post_status'])
        ));
    }

    echo json_encode(array(
        "draw" => $draw,
        "recordsTotal" => $total,
        "recordsFiltered" => $filter,
        "data" => $result
    ), JSON_UNESCAPED_UNICODE);
} catch (Exception $ex) {
    Log::error($ex->getMessage());
}
