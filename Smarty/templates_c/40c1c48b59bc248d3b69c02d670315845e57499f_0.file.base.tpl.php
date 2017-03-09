<?php
/* Smarty version 3.1.30, created on 2017-03-09 07:54:42
  from "/home/vagrant/Code/preview/test/Smarty/templates/layouts/base.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c10a4270acb5_20166002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40c1c48b59bc248d3b69c02d670315845e57499f' => 
    array (
      0 => '/home/vagrant/Code/preview/test/Smarty/templates/layouts/base.tpl',
      1 => 1489046081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c10a4270acb5_20166002 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once '/home/vagrant/Code/preview/test/libs/plugins/function.url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <link rel="icon" href="<?php echo smarty_function_url(array('URL'=>'asset/image/favicon.ico'),$_smarty_tpl);?>
">

    <title>电子科技大学中山学院团委 | <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_150028261858c10a4269d2f0_37243592', 'title');
?>
</title>

    <!-- Style Sheet -->
    <link rel="stylesheet" href="<?php echo smarty_function_url(array('URL'=>'asset/css/reset.css'),$_smarty_tpl);?>
">
    <link rel="stylesheet" href="<?php echo smarty_function_url(array('URL'=>'asset/css/style.css?_t=32'),$_smarty_tpl);?>
">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14699303958c10a426a6371_53916557', 'style-sheet');
?>


    <!-- JavaScript -->
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo smarty_function_url(array('URL'=>'asset/js/jquery-3.1.1.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo smarty_function_url(array('URL'=>'asset/js/main.js?'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13436371758c10a426b0fb8_76561846', 'preload-script');
?>

</head>
<body>
<nav class="navbar">
    <div class="container">
        <ul class="nav nav-left">
            <li><a href="<?php echo smarty_function_url(array('URL'=>'/'),$_smarty_tpl);?>
">首页</a></li>
            <li><a href="<?php echo smarty_function_url(array('URL'=>'/intro.php'),$_smarty_tpl);?>
">团委介绍</a></li>
            <li><a href="<?php echo smarty_function_url(array('URL'=>'/youth.php'),$_smarty_tpl);?>
">青年在线</a></li>
            <li><a href="<?php echo smarty_function_url(array('URL'=>'/practice.php'),$_smarty_tpl);?>
">社会实践</a></li>
            <li><a href="<?php echo smarty_function_url(array('URL'=>'/message.php'),$_smarty_tpl);?>
">留言板</a></li>
            <li><a href="<?php echo smarty_function_url(array('URL'=>'http://www.zsc.edu.cn/'),$_smarty_tpl);?>
">学校主页</a></li>
        </ul>

        <ul class="nav nav-right">
            <li>
                <div class="search clean-fix">
                    <form action="<?php echo smarty_function_url(array('URL'=>"search.php"),$_smarty_tpl);?>
">
                        <input name="s" class="search-text" type="text" title="搜索" placeholder="Search...">
                        <button class="search-btn" type="submit">搜索</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="header">
    <div class="container">
        <div class="header-logo">
            <img src="<?php echo smarty_function_url(array('URL'=>'asset/image/header-logo.png'),$_smarty_tpl);?>
" alt="共青团电子科技大学中山学院团委">
        </div>

        <div class="header-title">
            <img src="<?php echo smarty_function_url(array('URL'=>'asset/image/header-title.png'),$_smarty_tpl);?>
" alt="共青团电子科技大学中山学院团委">
        </div>
    </div>
</div>

<div class="content">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_145142435958c10a426f3952_03860933', 'content');
?>

</div>

<div class="qr-code">
    <div class="qr-small">
        <!--<img src="<?php echo smarty_function_url(array('URL'=>'asset/image/qr-small.png'),$_smarty_tpl);?>
" alt="点击查看二维码">-->
    </div>
    <div class="qr-main">
        <img src="<?php echo smarty_function_url(array('URL'=>'asset/image/qr-main.jpg'),$_smarty_tpl);?>
" alt="扫描二维码关注我们">
    </div>
</div>

<div class="footer">
    <div class="container">
        <p class="hr" style="width: 100%; border-bottom: 1px solid #970f01"></p>

        <p class="text-center">共青团电子科技大学中山学院委员会 | <a href="<?php echo smarty_function_url(array('URL'=>"admin"),$_smarty_tpl);?>
" style="color: #333">管理员入口</a></p>
        <p class="text-center copy-right">&copy; <a href="http://www.LiuACG.com">LiuACG</a></p>
    </div>
</div>

<!-- JavaScript -->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19454788358c10a42701318_50066926', 'script');
?>

</body>
</html>
<!-- Code & Design & Power by LiuACG ~ (www.LiuACG.com) -->
<?php }
/* {block 'title'} */
class Block_150028261858c10a4269d2f0_37243592 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Title<?php
}
}
/* {/block 'title'} */
/* {block 'style-sheet'} */
class Block_14699303958c10a426a6371_53916557 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'style-sheet'} */
/* {block 'preload-script'} */
class Block_13436371758c10a426b0fb8_76561846 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'preload-script'} */
/* {block 'content'} */
class Block_145142435958c10a426f3952_03860933 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'content'} */
/* {block 'script'} */
class Block_19454788358c10a42701318_50066926 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
