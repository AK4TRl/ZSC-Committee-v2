<?php
/* Smarty version 3.1.30, created on 2017-03-09 07:30:50
  from "/home/vagrant/Code/preview/test/Smarty/templates/read-message.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c104aadbcb75_26800044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f0f193bc9f032122fcea168399e7c4c49944813' => 
    array (
      0 => '/home/vagrant/Code/preview/test/Smarty/templates/read-message.tpl',
      1 => 1489044644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/base.tpl' => 1,
  ),
),false)) {
function content_58c104aadbcb75_26800044 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_172382969258c104aadaf5c4_41067007', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16773828958c104aadbb473_74385980', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layouts/base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_172382969258c104aadaf5c4_41067007 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['msg']->value['title'];
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_16773828958c104aadbb473_74385980 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <div class="article">
            <div class="head">
                <h1><?php echo $_smarty_tpl->tpl_vars['msg']->value['title'];?>
</h1>

                <div class="article-info">
                    <p>发表人: <?php echo $_smarty_tpl->tpl_vars['msg']->value['author'];?>
 | 发表时间: <?php echo $_smarty_tpl->tpl_vars['msg']->value['date'];?>
</p>
                </div>
            </div>

            <div class="body">
                <p style="text-indent: 2em"><?php echo $_smarty_tpl->tpl_vars['msg']->value['content'];?>
</p>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
