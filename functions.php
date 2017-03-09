<?php
/**
 * User: LiuACG
 * Date: 2016/6/7
 * Time: 15:06
 */

/**
 * 代替函数mb_***，实现Unicode子串串的拆分
 * @param $str <要拆分的字符串>
 * @param $start <开始位置>
 * @param $length <长度>
 * @return string <拆分后的字符串>
 */
function usubstr($str, $start, $length)
{
    $i = 0;
    //完整排除之前的UTF8字符
    while ($i < $start) {
        $ord = ord($str{$i});
        if ($ord < 192) {
            $i++;
        } elseif ($ord < 224) {
            $i += 2;
        } else {
            $i += 3;
        }
    }
    //开始截取
    $result = '';
    while ($i < $start + $length && $i < strlen($str)) {
        $ord = ord($str{$i});
        if ($ord < 192) {
            $result .= $str{$i};
            $i++;
        } elseif ($ord < 224) {
            $result .= $str{$i} . $str{$i + 1};
            $i += 2;
        } else {
            $result .= $str{$i} . $str{$i + 1} . $str{$i + 2};
            $i += 3;
        }
    }
    if ($i < strlen($str)) {
        $result .= '...';
    }
    return $result;
}

function MySplit($s, $spl)
{
    $tmp = explode($spl, $s);
    foreach ($tmp as $key => $val) {
        if (trim($val) == '')
            unset($tmp[$key]);
    }
    return array_unique($tmp);
}

/**
 * 通过用户ID查找用户名
 * @param $id <用户ID>
 * @return string <用户名>
 */
function getUserByID($id)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmtAuthor = $db->prepare("SELECT user_nick FROM `users` WHERE ID = :id");
    $stmtAuthor->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtAuthor->execute();
    $author = 'Unknown';
    if ($row = $stmtAuthor->fetch()) {
        $author = $row['user_nick'];
    }
    return $author;
}

/**
 * 通过文章ID获取该文章的所有分类ID
 * @param $id <文章ID>
 * @return array <分类ID>
 */
function getTermId($id)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT term_tax_id FROM `term_relationships` WHERE post_id = :id ORDER BY term_tax_id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $res = array();
    while ($row = $stmt->fetch()) {
        $res[] = $row['term_tax_id'];
    }
    return $res;
}

/**
 * 通过文章ID获取该文章的所有分类名称
 * @param $id <文章ID>
 * @return array <分类名称数组>
 */
function getPostType($id)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT `name` FROM `terms` WHERE term_id IN (SELECT `term_tax_id` FROM `term_relationships` WHERE post_id = :id) ORDER BY term_id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $res = array();
    while ($row = $stmt->fetch()) {
        $res[] = $row['name'];
    }
    if (count($res) == 0)
        $res[] = "未分类";
    return $res;
}

/**
 * 获取在分类ID为$sid下的$limit篇的文章ID和标题
 * @param $sid <分类ID>
 * @param int $limit <要获取的最大文章数>
 * @return array <文章的ID和标题>
 */
function getNews($sid, $limit = 10)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $db->exec("SET NAMES 'utf8';");
    $stmt = $db->prepare("SELECT `id`,`post_title` FROM `posts` WHERE `id` IN ( SELECT `post_id` FROM `term_relationships` WHERE `term_tax_id` = :id AND `post_status` = 1 ) ORDER BY `post_modified` DESC LIMIT 0, :limit");
	$stmt->bindParam(':id', $sid, PDO::PARAM_INT);
	$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
	$stmt->execute();
	$res = array();
	for ($i = 0; $row = $stmt->fetch(); ++$i) {
        $res[$i]['id'] = $row['id'];
        $res[$i]['title'] = $row['post_title'];
    }
    return $res;
}

/**
 * 更新文章的点击量
 * @param $id <文章ID>
 */
function UpdateHit($id)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("UPDATE `posts` SET post_hit = post_hit + 1 WHERE ID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

/**
 * Helper函数，构建弹出对话框
 * @param $msg <需要显示的消息>
 */
function alertMsg($msg)
{
    echo '<script type="text/javascript" charset="UTF-8">alert("' . $msg . '")</script>';
}

/**
 * @param $msg
 */
function confirmMsg($msg) {
    echo '<script type="text/javascript" charset="UTF-8">confirm("' . $msg . '")</script>';
}

/**
 * 获取某一状态，关键字，分类下的文章数
 * @param $status <文章状态, 0：未发布，1：已发布，2：草稿>
 * @param $keyword <关键字，支持一个关键字>
 * @param $taxId <分类ID>
 * @return null|integer <符合条件的文章数量>
 */
function getPostCount($status, $keyword, $taxId)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $cmd = "SELECT COUNT(*) AS `cnt` FROM `posts`";
    $flag = false;
    if ($status != -1) {
        if (!$flag) {
            $cmd = $cmd . " WHERE";
            $flag = true;
        }
        $cmd = $cmd . " `post_status` = :status";
    }
    if (trim($keyword) != '') {
        if (!$flag) {
            $cmd = $cmd . " WHERE";
            $flag = true;
        } else {
            $cmd = $cmd . " AND";
        }
        $cmd = $cmd . " (`post_title` LIKE :m_key OR `post_subtitle` LIKE :m_key OR `post_content` LIKE :m_key)";
    }
    if ($taxId != 0) {
        if (!$flag) {
            $cmd = $cmd . " WHERE";
        } else {
            $cmd = $cmd . " AND";
        }
        $cmd = $cmd . " `ID` IN ( SELECT `post_id` FROM `term_relationships` WHERE `term_tax_id` = :taxId)";
    }
    $stmt = $db->prepare($cmd);
    if ($status != -1) {
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    }
    if (trim($keyword) != '') {
        $m_key = '%' . trim($keyword) . '%';
        $stmt->bindParam(':m_key', $m_key, PDO::PARAM_STR);
    }
    if ($taxId != 0) {
        $stmt->bindParam(':taxId', $taxId, PDO::PARAM_INT);
    }
    $stmt->execute();
    $res = null;
    if ($row = $stmt->fetch()) {
        $res = $row['cnt'];
    }
    return $res;
}

/**
 * 获取某一状态，关键字，分类下的文章，并且分页
 * @param $status <文章状态, 0：未发布，1：已发布，2：草稿>
 * @param $keyword <关键字，支持一个关键字>
 * @param $taxId <分类ID>
 * @param int $page <页数>
 * @param int $lmt <每页显示最大数目>
 * @return array <文章的内容>
 */
function getPostResult($status, $keyword, $taxId, $page = 0, $lmt = 10)
{
    $startPos = $page * $lmt;
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $cmd = "SELECT * FROM `posts`";
    $flag = false;
    if ($status != -1) {
        if (!$flag) {
            $cmd = $cmd . " WHERE";
            $flag = true;
        }
        $cmd = $cmd . " `post_status` = :status";
    }
    if (trim($keyword) != '') {
        if (!$flag) {
            $cmd = $cmd . " WHERE";
            $flag = true;
        } else {
            $cmd = $cmd . " AND";
        }
        $cmd = $cmd . " (`post_title` LIKE :m_key OR `post_subtitle` LIKE :m_key OR `post_content` LIKE :m_key)";
    }
    if ($taxId != 0) {
        if (!$flag) {
            $cmd = $cmd . " WHERE";
        } else {
            $cmd = $cmd . " AND";
        }
        $cmd = $cmd . " `ID` IN ( SELECT `post_id` FROM `term_relationships` WHERE `term_tax_id` = :taxId)";
    }
    $cmd = $cmd . ' ORDER BY `ID` DESC LIMIT :stPos, :limit';
    $stmt = $db->prepare($cmd);
    if ($status != -1) {
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    }
    if (trim($keyword) != '') {
        $m_key = '%' . trim($keyword) . '%';
        $stmt->bindParam(':m_key', $m_key, PDO::PARAM_STR);
    }
    if ($taxId != 0) {
        $stmt->bindParam(':taxId', $taxId, PDO::PARAM_INT);
    }
    $stmt->bindParam(':stPos', $startPos, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $lmt, PDO::PARAM_INT);

    $stmt->execute();
    $res = array();
    for ($i = 0; $row = $stmt->fetch(); ++$i) {
        $res[$i]['id'] = $row['ID'];
        $res[$i]['title'] = $row['post_title'];
        $res[$i]['author'] = getUserByID($row['post_author']);
        $res[$i]['tag'] = implode(",", getPostType($row['ID']));
		$mydate = explode(" ", $row['post_modified']);
        $res[$i]['date'] = $mydate[0];
        switch ($row['post_status']) {
            case 0:
                $res[$i]['status'] = "未发布";
                break;
            case 1:
                $res[$i]['status'] = "已发布";
                break;
            case 2:
                $res[$i]['status'] = "草稿";
                break;
            default:
                $res[$i]['status'] = "未知状态";
                break;
        };
    }
    return $res;
}

/**
 * 通过ID获取文章内容
 * @param $id <文章ID>
 * @return array <该文章的内容>
 */
function getPostByID($id)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT * FROM `posts` WHERE `ID` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $res = array();
    if ($row = $stmt->fetch()) {
        $res['id'] = $row['ID'];
        $res['title'] = $row['post_title'];
        $res['subtitle'] = $row['post_subtitle'];
        $res['content'] = $row['post_content'];
        $res['status'] = $row['post_status'];
        $res['psw'] = $row['post_password'];
    }
    return $res;
}

/**
 * 获取所有的分类
 * @return array <分类的ID和名称>
 */
function getTags()
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT `term_id`,`name` FROM `terms`");
    $stmt->execute();
    $res = array();
    for ($i = 0; $row = $stmt->fetch(); ++$i) {
        $res[$i]['id'] = $row['term_id'];
        $res[$i]['name'] = $row['name'];
    }
    return $res;
}

/**
 * 获取所有的消息
 * @return array <消息的所有信息>
 */
function getMsg()
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $res = array();
    $stmt = $db->prepare("SELECT * FROM `msgs` ORDER BY `stime` DESC");
    $stmt->execute();
    for ($i = 0; $row = $stmt->fetch(); ++$i) {
        $res[$i]['id'] = $row['ID'];
        $res[$i]['ip'] = $row['ip'];
        $res[$i]['user'] = $row['user'];
        $res[$i]['mail'] = $row['email'];
        $res[$i]['title'] = $row['title'];
        $res[$i]['date'] = $row['stime'];
        $res[$i]['status'] = $row['flag'];
    }
    return $res;
}

/**
 * 获取配置信息
 * @param $key <配置名>
 * @return $value <配置值>
 */
function getConfig($key)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT `value` FROM `configs` WHERE `key` = :key");
    $stmt->bindParam(':key', $key, PDO::PARAM_STR);
    $stmt->execute();
    $res = null;
    if ($row = $stmt->fetch()) {
        $res = $row['value'];
    }
    return $res;
}

/**
 * 删除配置
 * @param $key <配置名>
 */
function delConfig($key)
{
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("DELETE FROM `configs` WHERE `key` = :key");
    $stmt->bindParam(':key', $key, PDO::PARAM_STR);
    $stmt->execute();
}

/**
 * 设置配置信息
 * @param $key <配置名>
 * @param $value <值>
 */
function setConfig($key, $value)
{
    delConfig($key);
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("INSERT INTO `configs`(`key`, `value`) VALUES (:key, :val)");
    $stmt->bindParam(':key', $key, PDO::PARAM_STR);
    $stmt->bindParam(':val', $value, PDO::PARAM_STR);
    $stmt->execute();
}

/**
 * 递归创建目录
 * @param $dir
 * @param int $mode
 * @return bool
 */
function mkdirs($dir, $mode = 0777)
{
    if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
    if (!mkdirs(dirname($dir), $mode)) return FALSE;
    return @mkdir($dir, $mode);
}

/**
 * 获取所有的用户信息
 * @return array
 */
function getUserList() {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT `ID`,`user_login`,`user_nick`,`user_email`,`user_status`,`user_level` FROM `users`");
    $stmt->execute();
    $res = array();
    for ($i = 0; ($row = $stmt->fetch()); ++$i) {
        $res[$i]['id'] = $row['ID'];
        $res[$i]['name'] = $row['user_login'];
        $res[$i]['nick'] = $row['user_nick'];
        $res[$i]['mail'] = $row['user_email'];
        $res[$i]['status'] = $row['user_status'];
        $res[$i]['power'] = $row['user_level'];
    }
    return $res;
}

/**
 * 锁定一个文章ID
 * @return string
 */
function lockPostId() {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $lockKey = md5(rand());
    $stmt = $db->prepare("INSERT INTO `posts`(`post_author`, `post_date`, `post_modified`, `post_title`, `post_subtitle`, `post_content`, `post_status`) VALUES (1, NOW(), NOW(), :key, NULL, NULL, 2)");
    $stmt->bindParam(':key', $lockKey, PDO::PARAM_STR);
    $stmt->execute();
    return $lockKey;
}

/*
 * 通过锁获取文章ID
 */
function getPostIdByLock($lock) {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT `ID` FROM `posts` WHERE `post_title` = :key");
    $stmt->bindParam(':key', $lock, PDO::PARAM_STR);
    $stmt->execute();
    if($row = $stmt->fetch())
        return $row['ID'];
    die('Lock File Error.');
}

/**
 * 更新文章
 * @param $arr
 */
function updatePost($arr) {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("UPDATE `posts` SET `post_author` = :author, `post_title` = :title, `post_subtitle` = :subtitle, `post_content` = :content, `post_status` = :status, `post_password` = :psw, `post_modified` = NOW() WHERE `ID` = :id");
    $stmt->bindParam(':author', $arr['author'], PDO::PARAM_STR);
    $stmt->bindParam(':title', $arr['title'], PDO::PARAM_STR);
    $stmt->bindParam(':subtitle', $arr['subtitle'], PDO::PARAM_STR);
    $stmt->bindParam(':content', $arr['content'], PDO::PARAM_STR);
    $stmt->bindParam(':status', $arr['status'], PDO::PARAM_INT);
    $stmt->bindParam(':psw', $arr['psw'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $arr['id'], PDO::PARAM_INT);
    $stmt->execute();
}

function getIdByTagName($name) {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT `term_id` FROM `terms` WHERE `name` = :name");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    if($row = $stmt->fetch()) {
        return $row['term_id'];
    }
    return null;
}

function addNewTag($tag) {
    if(($res = getIdByTagName($tag)) != null)
        return $res;
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("INSERT INTO `terms`(`name`, `slug`) VALUE (:name, :slug)");
    $slug = urlencode(strtolower($tag));
    $stmt->bindParam(':name', $tag, PDO::PARAM_STR);
    $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
    $stmt->execute();
    return getIdByTagName($tag);
}

function removePostTags($articleId) {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("DELETE FROM `term_relationships` WHERE `post_id` = :id");
    $stmt->bindParam(':id', $articleId, PDO::PARAM_INT);
    $stmt->execute();
}

function updatePostTags($articleId, $arrTags) {
    removePostTags($articleId);
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("INSERT INTO `term_relationships` VALUE (:id, :termId)");
    $stmt->bindParam(':id', $articleId, PDO::PARAM_INT);
    foreach ($arrTags as $key=>$val) {
        $stmt->bindParam(':termId', $key, PDO::PARAM_INT);
        $stmt->execute();
    }
}

function getPostTags($articleId) {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("SELECT `term_id`,`name` FROM `terms` WHERE `term_id` IN (SELECT `term_tax_id` FROM `term_relationships` WHERE `post_id` = :id)");
    $stmt->bindParam(':id', $articleId, PDO::PARAM_INT);
    $stmt->execute();
    $res = array();
    for ($i = 0; $row = $stmt->fetch(); ++$i) {
        $res[$i]['id'] = $row['term_id'];
        $res[$i]['name'] = $row['name'];
    }
    return $res;
}
function deletePost($postId) {
    $db = new PDO(DB_DSN, DB_USER, DB_PSW);
    $stmt = $db->prepare("DELETE FROM `posts` WHERE `ID` = :id");
    $stmt->bindParam(':id', $postId, PDO::PARAM_INT);
    $stmt->execute();
}

function checkVisit($session, $acList) {
    if(!isset($session['userId'])) {
        header('Location:login.php');
        return false;
    }
    if((time() - $session['lastVisit']) > 7200) {
        session_destroy();
        header('Location:login.php');
        return false;
    }
    $session['laseVisit'] = time();
    if(in_array(-1, $acList)) {
        return true;
    }
    if(!in_array($session['power'], $acList)) {
        return false;
    }
    return true;
}

function getPostFirstImage($postId) {
    $post = getPostByID($postId);
    preg_match('/<img.*src="(.*)".*>/', $post['content'], $res);
    return $res[1];
}

function getIP()
{
    $unknown = 'unknown';
    $ip = "";
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if (false !== strpos($ip, ','))
        $ip = reset(explode(',', $ip));
    return $ip;
}