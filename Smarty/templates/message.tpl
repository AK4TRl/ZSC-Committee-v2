{extends file="layouts/base.tpl"}

{block name="title"}留言板{/block}

{block name="content"}
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
                    {foreach item=item from=$msg}
                        <tr>
                            <td>{$item.author}</td>
                            <td><a href="{url URL="read-message.php?id={$item.id}"}">{$item.title}</a></td>
                            <td>{$item.time}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>

            <div class="msg-footer clean-fix">
                <div style="float: right">
                    <a href="{url URL="message.php?page={max($page - 1, 1)}"}">&laquo;</a>
                    <a>第{$page}页 / 共{$tot}页</a>
                    <a href="{url URL="message.php?page={min($page + 1, $tot)}"}">&raquo;</a>
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
                        {* 后面维护的同学麻烦加一个表单检查 *}
                        <form action="{url URL="record-message.php"}" method="post">
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
{/block}

{block name="script"}
    <script>
        (function () {
            $('.popup-msg-editor').click(function () {
                $('.msg-modal').show();
            });

            $('.msg-modal .close').click(function () {
                $('.msg-modal').hide();
            });
        }());
    </script>
{/block}