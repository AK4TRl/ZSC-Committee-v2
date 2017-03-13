<?php

require_once(dirname(__FILE__) . '/../../setup.php');
require_once(dirname(__FILE__) . '/../utils/admin.php');
require_once(dirname(__FILE__) . '/../../functions.php');

$post = array(
    'id' => 'new',
);

$smarty->assign('post', $post);
$smarty->assign('tags', getTags());

$smarty->display('admin/posts/edit.tpl');
