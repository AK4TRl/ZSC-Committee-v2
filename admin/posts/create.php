<?php

require_once('../../setup.php');
require_once('../../functions.php');

$post = array(
    'id' => 'new',
);

$smarty->assign('post', $post);
$smarty->assign('tags', getTags());

$smarty->display('admin/posts/edit.tpl');
