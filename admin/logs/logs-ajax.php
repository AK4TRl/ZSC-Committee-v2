<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');

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
        $where = $where . "(`event` LIKE :_p{$idx})";
    }
    if ($bWhere == false) $where = "";

    // Make Order
    $order = "ORDER BY ";
    switch (intval($dir['column'])) {
        case 0:
            $order = $order . "id ";
            break;
        case 1:
            throw new Exception("不支持的操作");
            break;
        case 2:
            $order = $order . "date ";
            break;
        case 3:
            $order = $order . "flag ";
            break;
        default:
            $order = $order . "date ";
            break;
    }
    $order = $order . htmlspecialchars($dir['dir']);

    // Query
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);

    // Query1
    unset($stmt);
    $query0 = "SELECT COUNT(*) FROM `logs`";
    $stmt = $db->prepare($query0);
    $stmt->execute();
    $total = intval(($stmt->fetch())[0]);

    unset($stmt);
    $query1 = "SELECT COUNT(*) FROM `logs` " . $where;
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
    $query2 = "SELECT * FROM `logs` " . $where . " " . $order . " LIMIT :start, :length";
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
            'id' => $row['ID'],
            'event' => $row['event'],
            'date' => $row['date'],
            'level' => $row['level'],
            'flag' => boolval($row['flag']),
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
