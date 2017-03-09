<?php
/* Smarty version 3.1.30, created on 2017-03-08 23:22:19
  from "F:\PhpstormProjects\preview\test\Smarty\templates\intro.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c021ab4d3557_27460583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ecb62432ef8f136d9ace76fdfda44efc2eb2c5c' => 
    array (
      0 => 'F:\\PhpstormProjects\\preview\\test\\Smarty\\templates\\intro.tpl',
      1 => 1488986534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/base.tpl' => 1,
  ),
),false)) {
function content_58c021ab4d3557_27460583 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once 'F:\\PhpstormProjects\\preview\\test\\libs\\plugins\\function.url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2559258c021ab354919_12857795', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2068958c021ab4cdcf8_18749142', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layouts/base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_2559258c021ab354919_12857795 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
团委介绍<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_2068958c021ab4cdcf8_18749142 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <div class="intro clean-fix">
            <div class="side">
                <ul>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=1"),$_smarty_tpl);?>
">指导老师</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=2"),$_smarty_tpl);?>
">秘书处</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=3"),$_smarty_tpl);?>
">办公室</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=4"),$_smarty_tpl);?>
">宣传部</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=5"),$_smarty_tpl);?>
">组织部</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=6"),$_smarty_tpl);?>
">实践部</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=7"),$_smarty_tpl);?>
">调研部</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=8"),$_smarty_tpl);?>
">国旗部</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=9"),$_smarty_tpl);?>
">礼仪队</a></li>
                    <li><a href="<?php echo smarty_function_url(array('URL'=>"intro.php?id=10"),$_smarty_tpl);?>
">广播台</a></li>
                </ul>
            </div>

            <div class="main">
                <div class="inner">
                    <h2><?php echo $_smarty_tpl->tpl_vars['part']->value['name'];?>
</h2>
                    <p><?php echo $_smarty_tpl->tpl_vars['part']->value['summary'];?>
</p>

                    <table>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['part']->value['member'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <tr>
                                <td>
                                    <div class="info" style="display: block;">
                                        <ul>
                                            <li><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</li>
                                            <li><?php echo $_smarty_tpl->tpl_vars['item']->value['aca'];?>
</li>
                                            <li><?php echo $_smarty_tpl->tpl_vars['item']->value['class'];?>
</li>
                                            <li><?php echo $_smarty_tpl->tpl_vars['item']->value['job'];?>
</li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="image">
                                        <?php if (isset($_smarty_tpl->tpl_vars['item']->value['img'])) {?>
                                            <img src="<?php echo smarty_function_url(array('URL'=>$_smarty_tpl->tpl_vars['item']->value['img']),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['part']->value['name'];?>
-<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                        <?php } else { ?>
                                            <img src="<?php echo smarty_function_url(array('URL'=>'asset/image/intro/default.jpg'),$_smarty_tpl);?>
"
                                                 alt="<?php echo $_smarty_tpl->tpl_vars['part']->value['name'];?>
-<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                        <?php }?>
                                    </div>
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
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
