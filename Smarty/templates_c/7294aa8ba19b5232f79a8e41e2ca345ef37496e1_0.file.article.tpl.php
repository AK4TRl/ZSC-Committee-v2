<?php
/* Smarty version 3.1.30, created on 2017-03-09 06:34:47
  from "/home/vagrant/Code/preview/test/Smarty/templates/article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c0f7871f8362_08413815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7294aa8ba19b5232f79a8e41e2ca345ef37496e1' => 
    array (
      0 => '/home/vagrant/Code/preview/test/Smarty/templates/article.tpl',
      1 => 1489041256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/base.tpl' => 1,
  ),
),false)) {
function content_58c0f7871f8362_08413815 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_161190992258c0f7871e3424_12398362', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_116861073058c0f7871f7379_61877989', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layouts/base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_161190992258c0f7871e3424_12398362 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['article']->value['title'];
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_116861073058c0f7871f7379_61877989 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <div class="article">
            <div class="head">
                <h1><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h1>
                <h2><?php echo $_smarty_tpl->tpl_vars['article']->value['subtitle'];?>
</h2>

                <div class="article-info">
                    <p>发表人: <?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
 | 发表时间: <?php echo $_smarty_tpl->tpl_vars['article']->value['date'];?>
 | 阅读量: <?php echo $_smarty_tpl->tpl_vars['article']->value['hit'];?>
</p>
                    <p>分类: <?php echo $_smarty_tpl->tpl_vars['article']->value['category'];?>
</p>
                </div>
            </div>

            <div class="body"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
