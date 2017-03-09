<?php
/* Smarty version 3.1.30, created on 2017-03-09 07:52:59
  from "/home/vagrant/Code/preview/test/Smarty/templates/message.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c109dbc39580_33801535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aab171d6c8d1486ef4c5cb222d17e5b7091d60a8' => 
    array (
      0 => '/home/vagrant/Code/preview/test/Smarty/templates/message.tpl',
      1 => 1489045934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/base.tpl' => 1,
  ),
),false)) {
function content_58c109dbc39580_33801535 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once '/home/vagrant/Code/preview/test/libs/plugins/function.url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_97249818558c109dbb78594_80061807', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_73711004158c109dbc2a465_95178924', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_184879307858c109dbc37933_76100034', "script");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layouts/base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_97249818558c109dbb78594_80061807 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
留言板<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_73711004158c109dbc2a465_95178924 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <div class="message">
            <div class="msg-header">
                <div>
                    <span class="popup-msg-editor">发表新留言</span>

                    <span>中山学院团委留言板</span>
                </div>
            </div>

            <div class="msg-body">
                <table>
                    <thead>
                    <tr>
                        <th class="post-author">发表人</th>
                        <th class="post-article">主题</th>
                        <th class="post-date">发表时间</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msg']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['author'];?>
</td>
                            <td><a href="<?php echo smarty_function_url(array('URL'=>"read-message.php?id=".((string)$_smarty_tpl->tpl_vars['item']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['time'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </tbody>
                </table>
            </div>

            <div class="msg-footer clean-fix">
                <div style="float: right">
                    <a href="<?php ob_start();
echo max($_smarty_tpl->tpl_vars['page']->value-1,1);
$_prefixVariable1=ob_get_clean();
echo smarty_function_url(array('URL'=>"message.php?page=".$_prefixVariable1),$_smarty_tpl);?>
">&laquo;</a>
                    <a>第<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
页 / 共<?php echo $_smarty_tpl->tpl_vars['tot']->value;?>
页</a>
                    <a href="<?php ob_start();
echo min($_smarty_tpl->tpl_vars['page']->value+1,$_smarty_tpl->tpl_vars['tot']->value);
$_prefixVariable2=ob_get_clean();
echo smarty_function_url(array('URL'=>"message.php?page=".$_prefixVariable2),$_smarty_tpl);?>
">&raquo;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="msg-modal">
        <div class="outer">
            <div class="middle">
                <div class="inner modal-content">
                    <div class="modal-header">发表新留言 | 必填项已用 * 标出 <span class="close">&times;</span></div>

                    <div class="edit-msg">
                        
                        <form action="<?php echo smarty_function_url(array('URL'=>"record-message.php"),$_smarty_tpl);?>
" method="post">
                            <ul>
                                <li><label for="name">姓名 <span class="must">*</span></label></li>
                                <li><input type="text" id="name" name="name"></li>

                                <li><label for="mail">电子邮箱 <span class="must">*</span></label></li>
                                <li><input type="text" id="mail" name="mail"></li>

                                <li><label for="title">主题 <span class="must">*</span></label></li>
                                <li><input type="text" id="title" name="title"></li>

                                <li><label for="content">正文 <span class="must">*</span></label></li>
                                <li><textarea id="content" name="content"></textarea></li>

                                <li><input type="reset" value="清空"></li>
                                <li><input type="submit" value="提交"></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_184879307858c109dbc37933_76100034 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        (function () {
            $('.popup-msg-editor').click(function () {
                $('.msg-modal').show();
            });

            $('.msg-modal .close').click(function () {
                $('.msg-modal').hide();
            });
        }());
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
