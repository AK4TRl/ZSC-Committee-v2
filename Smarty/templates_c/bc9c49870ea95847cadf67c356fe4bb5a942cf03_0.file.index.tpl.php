<?php
/* Smarty version 3.1.30, created on 2017-03-09 06:00:32
  from "/home/vagrant/Code/preview/test/Smarty/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c0ef80df8174_71594492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc9c49870ea95847cadf67c356fe4bb5a942cf03' => 
    array (
      0 => '/home/vagrant/Code/preview/test/Smarty/templates/index.tpl',
      1 => 1489036419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/base.tpl' => 1,
  ),
),false)) {
function content_58c0ef80df8174_71594492 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once '/home/vagrant/Code/preview/test/libs/plugins/function.url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_184215298258c0ef80d1f775_38327950', 'title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_166277357458c0ef80df0760_76293774', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_66217960458c0ef80df7418_69473704', 'script');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layouts/base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'title'} */
class Block_184215298258c0ef80d1f775_38327950 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
首页<?php
}
}
/* {/block 'title'} */
/* {block "content"} */
class Block_166277357458c0ef80df0760_76293774 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container wrapper-1">
        <div class="banner-content">
            <div class="banner">
                <div class="banner-inner"></div>
                <div class="btn-prev"></div>
                <div class="btn-next"></div>
            </div>
        </div>

        <div class="notification">
            <div class="notify">
                <h2>最新通知 <span><a href="<?php echo $_smarty_tpl->tpl_vars['moreNotice']->value;?>
" title="更多">&raquo;</a></span></h2>
            </div>

            <div class="notify-body">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notice']->value, 'item');
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
            </div>

            <div class="more">
                <h2>相关链接</h2>

                <table>
                    <tr>
                        <td><a href="<?php echo smarty_function_url(array('URL'=>"tag.php?id=91"),$_smarty_tpl);?>
">资料下载</a></td>
                        <td><a href="<?php echo smarty_function_url(array('URL'=>"tag.php?id=92"),$_smarty_tpl);?>
">团情在线</a></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo smarty_function_url(array('URL'=>"tag.php?id=93"),$_smarty_tpl);?>
">理论学习</a></td>
                        <td><a href="<?php echo smarty_function_url(array('URL'=>"tag.php?id=90"),$_smarty_tpl);?>
">英豪榜</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container wrapper-2">
        <div class="tabs">
            <ul class="tabs-title">
                <li class="active">最新动态</li>
                <li>互动焦点</li>
                <li>媒体聚焦</li>
            </ul>

            <ul class="tabs-content">
                <li class="active">
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['partNewsHot']->value['link'];
$_prefixVariable1=ob_get_clean();
echo smarty_function_url(array('URL'=>$_prefixVariable1),$_smarty_tpl);?>
">
                        <div class="image">
                            <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['partNewsHot']->value['img'];
$_prefixVariable2=ob_get_clean();
echo smarty_function_url(array('URL'=>$_prefixVariable2),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['partNewsHot']->value['title'];?>
">
                        </div>

                        <div class="text">
                            <h3><?php echo $_smarty_tpl->tpl_vars['partNewsHot']->value['title'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['partNewsHot']->value['summary'];?>
</p>
                        </div>
                    </a>

                    <div class="links">
                        <ul>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partNews']->value, 'item');
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

                        <div class="more"><a href="<?php echo smarty_function_url(array('URL'=>"tag.php?id=85"),$_smarty_tpl);?>
"><span>更多&nbsp;&raquo;</span></a></div>
                    </div>
                </li>
                <li>
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['partFocusHot']->value['link'];
$_prefixVariable3=ob_get_clean();
echo smarty_function_url(array('URL'=>$_prefixVariable3),$_smarty_tpl);?>
">
                        <div class="image">
                            <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['partFocusHot']->value['img'];
$_prefixVariable4=ob_get_clean();
echo smarty_function_url(array('URL'=>$_prefixVariable4),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['partFocusHot']->value['title'];?>
">
                        </div>

                        <div class="text">
                            <h3><?php echo $_smarty_tpl->tpl_vars['partFocusHot']->value['title'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['partFocusHot']->value['summary'];?>
</p>
                        </div>
                    </a>

                    <div class="links">
                        <ul>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partMedia']->value, 'item');
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

                        <div class="more"><a href="<?php echo smarty_function_url(array('URL'=>"tag.php?id=87"),$_smarty_tpl);?>
"><span>更多&nbsp;&raquo;</span></a></div>
                    </div>
                </li>
                <li>
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['partMediaHot']->value['link'];
$_prefixVariable5=ob_get_clean();
echo smarty_function_url(array('URL'=>$_prefixVariable5),$_smarty_tpl);?>
">
                        <div class="image">
                            <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['partMediaHot']->value['img'];
$_prefixVariable6=ob_get_clean();
echo smarty_function_url(array('URL'=>$_prefixVariable6),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['partMediaHot']->value['title'];?>
">
                        </div>

                        <div class="text">
                            <h3><?php echo $_smarty_tpl->tpl_vars['partMediaHot']->value['title'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['partMediaHot']->value['summary'];?>
</p>
                        </div>
                    </a>

                    <div class="links">
                        <ul>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partFocus']->value, 'item');
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

                        <div class="more"><a href="<?php echo smarty_function_url(array('URL'=>"tag.php?id=88"),$_smarty_tpl);?>
"><span>更多&nbsp;&raquo;</span></a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_66217960458c0ef80df7418_69473704 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 id="banner-data" type="application/json" class="json-inline"><?php echo $_smarty_tpl->tpl_vars['banner']->value;
echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        (function () {
            var tmp = $('.banner-content').find('.banner-inner').eq(0);
            var data = JSON.parse(document.getElementById('banner-data').innerText);
            data.forEach(function (item, idx) {
                var str = '<div class="item:active"><a href=":url" title=":text"><div class="image"><span class="img-center"></span><img src=":image" alt=""></div><div class="text">:text</div></a></div>'
                    .replace(/:active/g, idx == 0 ? ' active' : '')
                    .replace(/:url/g, item.url)
                    .replace(/:text/g, item.text)
                    .replace(/:image/g, item.image);
                tmp.append(str);
            });

            new Banner('.banner-content');
        })();

        (function () {
            var tabs = $('.tabs > ul.tabs-title > li');
            var contents = $('.tabs > ul.tabs-content > li');

            tabs.each(function () {
                var cur = this;
                $(cur).hover(function () {
                    tabs.each(function () {
                        $(this).removeClass('active');
                    });
                    contents.each(function () {
                        $(this).removeClass('active');
                    });
                    $(cur).addClass('active');
                    contents.eq($.makeArray(tabs).indexOf(cur)).addClass('active');
                });
            });
        }());
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'script'} */
}
