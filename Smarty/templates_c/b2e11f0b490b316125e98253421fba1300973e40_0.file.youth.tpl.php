<?php
/* Smarty version 3.1.30, created on 2017-03-08 23:13:41
  from "F:\PhpstormProjects\preview\test\Smarty\templates\youth.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c01fa5dedf74_71486696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2e11f0b490b316125e98253421fba1300973e40' => 
    array (
      0 => 'F:\\PhpstormProjects\\preview\\test\\Smarty\\templates\\youth.tpl',
      1 => 1488960927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/base.tpl' => 1,
  ),
),false)) {
function content_58c01fa5dedf74_71486696 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_url')) require_once 'F:\\PhpstormProjects\\preview\\test\\libs\\plugins\\function.url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1942258c01fa5dbfff3_87870985', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_863958c01fa5de8ed4_94388916', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layouts/base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_1942258c01fa5dbfff3_87870985 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
青年在线<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_863958c01fa5de8ed4_94388916 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <table class="poster">
            <tr>
                <td>
                    <div class="poster-image">
                        <img src="<?php echo smarty_function_url(array('URL'=>"asset/image/youth/theYoungLogo5.png"),$_smarty_tpl);?>
"/>
                    </div>
                </td>
            <tr>
            <tr>
                <td>
                    <div class="tip-bar">
                        <span class="text">你可以通过右方的按钮下载《青年》杂志</span>
                        <span class="text"><a href="http://www2.zsc.edu.cn/ytw/images/youth/青年第五期.pdf">电子科技大学中山学院院刊《青年》PFD档在线阅读：点击阅读</a></span>
                        <span class="download">
                            <a href="http://download.adobe.com/pub/adobe/reader/win/7x/7.0.5/chs/AdbeRdr705_chs_full.exe">
                                <img src="<?php echo smarty_function_url(array('URL'=>"asset/image/youth/pdfdownload.gif"),$_smarty_tpl);?>
"/>
                            </a>
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="previous">
                        <tbody>
                        <tr>
                            <td colspan="5">
                                <img src="<?php echo smarty_function_url(array('URL'=>"asset/image/youth/oldPeriodical.png"),$_smarty_tpl);?>
"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="book-item">
                                <a href="#"><img src="<?php echo smarty_function_url(array('URL'=>"asset/image/youth/tuandaihui.jpg"),$_smarty_tpl);?>
"/></a>
                            </td>
                            <td class="book-item">
                                <a href="#"><img src="<?php echo smarty_function_url(array('URL'=>"asset/image/youth/theYoung3.jpg"),$_smarty_tpl);?>
"/></a>
                            </td>
                            <td class="book-item">
                                <a href="#"><img src="<?php echo smarty_function_url(array('URL'=>"asset/image/youth/theYoung2.jpg"),$_smarty_tpl);?>
"/></a>
                            </td>
                            <td class="book-item">
                                <a href="#"><img src="<?php echo smarty_function_url(array('URL'=>"asset/image/youth/theYoung1.jpg"),$_smarty_tpl);?>
"/></a>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><a href="#">团代会专刊</a></td>
                            <td><a href="#">青年第三期</a></td>
                            <td><a href="#">青年第二期</a></td>
                            <td><a href="#">青年第一期</a></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
<?php
}
}
/* {/block "content"} */
}
