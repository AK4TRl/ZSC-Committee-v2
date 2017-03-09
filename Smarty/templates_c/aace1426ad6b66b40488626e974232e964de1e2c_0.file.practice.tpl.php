<?php
/* Smarty version 3.1.30, created on 2017-03-09 13:25:53
  from "F:\PhpstormProjects\preview\test\Smarty\templates\practice.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c0e7617c3e86_88422536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aace1426ad6b66b40488626e974232e964de1e2c' => 
    array (
      0 => 'F:\\PhpstormProjects\\preview\\test\\Smarty\\templates\\practice.tpl',
      1 => 1489036949,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/base.tpl' => 1,
  ),
),false)) {
function content_58c0e7617c3e86_88422536 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once 'F:\\PhpstormProjects\\preview\\test\\libs\\plugins\\function.url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169658c0e76176efe4_86562116', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1698558c0e7617b6ba2_58371980', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_361458c0e7617c1443_50448853', "script");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layouts/base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_169658c0e76176efe4_86562116 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
社会实践<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1698558c0e7617b6ba2_58371980 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container practice">
        <div class="side-left">
            <fieldset class="line-1">
                <legend>照片墙</legend>

                <div class="banner-practice">
                    <div class="banner">
                        <div class="banner-inner"></div>
                        <div class="btn-prev"></div>
                        <div class="btn-next"></div>
                    </div>
                </div>
            </fieldset>

            <span class="split"></span>

            <fieldset class="line-2">
                <legend>通知</legend>

                <ul class="links">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notify']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <li><a href="<?php echo smarty_function_url(array('URL'=>"article.php?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </fieldset>
        </div>
        <div class="side-title">
            <h2>暑期社会实践</h2>
        </div>
        <div class="side-right">
            <fieldset class="line-1">
                <legend>最新报道</legend>

                <ul class="links">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['news']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <li><a href="<?php echo smarty_function_url(array('URL'=>"article.php?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </fieldset>

            <span class="split"></span>

            <fieldset class="line-2">
                <legend>相关下载</legend>

                <ul class="links">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['downloads']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <li><a href="<?php echo smarty_function_url(array('URL'=>"article.php?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </fieldset>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_361458c0e7617c1443_50448853 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 id="banner-data" type="application/json" class="json-inline"><?php echo $_smarty_tpl->tpl_vars['photos']->value;
echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        (function () {
            var tmp = $('.banner-practice').find('.banner-inner').eq(0);
            var data = JSON.parse(document.getElementById('banner-data').innerText);
            data.forEach(function (item, idx) {
                var str = '<div class="item:active"><a href=":url"><div class="image"><span class="img-center"></span><img src=":image" alt=""></div><div class="text">:text</div></a></div>'
                    .replace(/:active/g, idx == 0 ? ' active' : '')
                    .replace(/:url/g, item.url)
                    .replace(/:text/g, item.text)
                    .replace(/:image/g, item.image);
                tmp.append(str);
            });

            new Banner('.banner-practice');
        })();
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
