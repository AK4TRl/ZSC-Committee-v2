<?php
/* Smarty version 3.1.30, created on 2017-03-09 07:58:55
  from "/home/vagrant/Code/preview/test/Smarty/templates/tag.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c10b3fe45834_16967654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ad211b9e26e9cafb95b2b828a87728a6067998d' => 
    array (
      0 => '/home/vagrant/Code/preview/test/Smarty/templates/tag.tpl',
      1 => 1489046301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/base.tpl' => 1,
  ),
),false)) {
function content_58c10b3fe45834_16967654 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once '/home/vagrant/Code/preview/test/libs/plugins/function.url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18926159758c10b3fdecc10_09344975', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_70211579858c10b3fe443f7_89313660', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layouts/base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_18926159758c10b3fdecc10_09344975 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
分类：<?php echo $_smarty_tpl->tpl_vars['category']->value;
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_70211579858c10b3fe443f7_89313660 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <div class="tags">
            <div class="tags-head">
                <h1>分类为 '<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
' 的文章 <span>(共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
条结果)</span></h1>
            </div>

            <div class="tags-body">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <li>
                            <h2 class="article-title"><a href="<?php echo smarty_function_url(array('URL'=>"article.php?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2>
                            <p class="article-preview"><?php echo $_smarty_tpl->tpl_vars['item']->value['preview'];?>
</p>
                            <p class="article-info">发表人：<?php echo $_smarty_tpl->tpl_vars['item']->value['author'];?>
 | 发表在：<?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
 | 分类：<?php echo $_smarty_tpl->tpl_vars['item']->value['category'];?>
</p>
                        </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </div>

            <div class="tags-foot">
                <p><a href="<?php ob_start();
echo max(1,$_smarty_tpl->tpl_vars['page']->value-1);
$_prefixVariable1=ob_get_clean();
echo smarty_function_url(array('URL'=>"tag.php?id=".((string)$_smarty_tpl->tpl_vars['id']->value)."&page=".$_prefixVariable1),$_smarty_tpl);?>
">上一页</a> | <a
                            href="<?php ob_start();
echo min($_smarty_tpl->tpl_vars['total']->value,$_smarty_tpl->tpl_vars['page']->value+1);
$_prefixVariable2=ob_get_clean();
echo smarty_function_url(array('URL'=>"tag.php?id=".((string)$_smarty_tpl->tpl_vars['id']->value)."&page=".$_prefixVariable2),$_smarty_tpl);?>
">下一页</a></p>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
