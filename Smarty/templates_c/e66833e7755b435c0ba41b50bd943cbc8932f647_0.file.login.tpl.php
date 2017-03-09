<?php
/* Smarty version 3.1.30, created on 2017-03-09 09:37:46
  from "F:\PhpstormProjects\preview\test\Smarty\templates\admin\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c0b1ea769474_34098794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e66833e7755b435c0ba41b50bd943cbc8932f647' => 
    array (
      0 => 'F:\\PhpstormProjects\\preview\\test\\Smarty\\templates\\admin\\login.tpl',
      1 => 1489023458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c0b1ea769474_34098794 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once 'F:\\PhpstormProjects\\preview\\test\\libs\\plugins\\function.url.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Login</title>

    <link href="<?php echo smarty_function_url(array('URL'=>"asset/admin/css/style.css"),$_smarty_tpl);?>
" rel="stylesheet">
    <link href="<?php echo smarty_function_url(array('URL'=>"asset/admin/css/style-responsive.css"),$_smarty_tpl);?>
" rel="stylesheet">
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="" method="POST">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Sign In</h1>
            <img src="<?php echo smarty_function_url(array('URL'=>"asset/admin/images/login-logo.png"),$_smarty_tpl);?>
" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="User Name" autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password">

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <label class="checkbox">
                <span class="pull-right">
                    <a href="<?php echo smarty_function_url(array('URL'=>"/"),$_smarty_tpl);?>
">返回首页</a>
            </span>
            </label>
        </div>
    </form>

    <?php echo '<script'; ?>
 src="<?php echo smarty_function_url(array('URL'=>"asset/admin/js/jquery-1.10.2.min.js"),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo smarty_function_url(array('URL'=>"asset/admin/js/bootstrap.min.js"),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo smarty_function_url(array('URL'=>"asset/admin/js/modernizr.min.js"),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
</div>
</body>
</html>
<?php }
}
