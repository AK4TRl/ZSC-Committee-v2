<?php
/* Smarty version 3.1.30, created on 2017-03-08 14:08:38
  from "F:\PhpstormProjects\preview\test\Smarty\templates\admin\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bf9fe698fb62_61735327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '735d73c21376d6c2bdb77295c6d96560074724c0' => 
    array (
      0 => 'F:\\PhpstormProjects\\preview\\test\\Smarty\\templates\\admin\\index.tpl',
      1 => 1488953317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58bf9fe698fb62_61735327 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once 'F:\\PhpstormProjects\\preview\\test\\libs\\plugins\\function.url.php';
$_smarty_tpl->compiled->nocache_hash = '1976258bf9fe690b129_94124414';
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>Document</title>
</head>
<body>
<h1>Admin Index Page <?php echo $_smarty_tpl->tpl_vars['hello']->value;?>
 <?php echo smarty_function_url(array('url'=>'233'),$_smarty_tpl);?>
</h1>
</body>
</html><?php }
}
