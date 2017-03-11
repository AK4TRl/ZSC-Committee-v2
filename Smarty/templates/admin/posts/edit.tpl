{extends file="admin/layouts/base.tpl"}

{block name="title"}编辑文章{/block}

{block name="heading"}
    <h3>编辑文章</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li><a href="{url URL="/admin/posts"}">文章管理</a></li>
        <li class="active">编辑文章</li>
    </ul>
{/block}

{block name="wrapper"}
    <section class="panel panel-default">
        <form action="{url URL="admin/posts/edit.php"}" method="POST">
            {* TODO: CSRF_TOKEN *}
            {*<input type="hidden" name="CSRF_TOKEN" value="{$csrf_token}" >*}
            <input type="hidden" name="id" {if isset($post.id)}value="{$post.id}"{/if}>

            <div class="panel-body">
                <!-- 加载编辑器的容器 -->
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="标题"
                           {if isset($post.title)}value="{$post.title}"{/if}/>
                </div>
                <div class="form-group">
                    <input type="text" name="subtitle" class="form-control" placeholder="副标题 (可以为空)"
                           {if isset($post.subtitle)}value="{$post.subtitle}"{/if}/>
                </div>
                <script id="post-content" name="content" type="text/plain">{if isset($post.content)}{$post.content}{/if}</script>
            </div>

            <div class="panel-footer">
                <div class="panel panel-info">
                    <div class="panel-heading">标签 (Tips: 点击标签可删除)</div>

                    <div id="tags-box" class="panel-body"></div>

                    <div class="panel-footer">
                        <div class="input-group col-md-6 col-lg-3">
                            <div class="input-group-btn dropup">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    选择分类 <span class="caret"></span></button>
                                <ul id="tags-selector" class="dropdown-menu">
                                    {foreach item=item from=$tags}
                                        <li data-tag-id="{$item.id}"><a>{$item.name}</a></li>
                                    {/foreach}
                                </ul>
                            </div>
                            <input id="tag-input" type="text" title="分类名称" class="form-control" placeholder="分类名称"
                                   maxlength="32">
                            <div class="input-group-btn">
                                <button id="tag-add" class="btn btn-default" type="button">
                                    添加分类 <i class="fa fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-inline">
                    <button type="submit" class="btn btn-primary">发布</button>
                    <select class="form-control" name="status" title="状态">
                        <option value="0" {if (isset($post.status) && $post.status == 0)}selected{/if}>隐藏</option>
                        <option value="1" {if (isset($post.status) && $post.status == 1) || !isset($post.status)}selected{/if}>公开</option>
                        <option value="2" {if (isset($post.status) && $post.status == 2)}selected{/if}>草稿</option>
                    </select>
                </div>
            </div>
        </form>
    </section>
{/block}

{block name="style"}
    <style>
        .tag-item {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .tag-item:hover:after {
            content: ' \f057';
            font-family: FontAwesome;
        }
    </style>
{/block}

{block name="script"}
    <script type="text/javascript" src="{url URL="admin/asset/libs/ueditor/ueditor.config.js"}"></script>
    <script type="text/javascript" src="{url URL="admin/asset/libs/ueditor/ueditor.all.js"}"></script>
    <script id="json-category" type="application/json">{if isset($category)}{$category}{else}[]{/if}</script>
    <script type="text/javascript">
        {literal}
        $(document).ready(function () {
            "use strict";
            var editor = UE.getEditor('post-content');

            var tagsBox = $('#tags-box');
            var data = JSON.parse($('#json-category').text(), true);
            data.forEach(function (item) {
                var tag = $('<button type="button" class="btn btn-default tag-item">' + item.name + '</button>');
                tag.append($('<input type="hidden" name="tags[]" value="' + item.id + '" >'));
                tag.click(function () {
                    $(this).remove();
                });
                tagsBox.append(tag);
            });

            $('#tags-selector').find('li').each(function (idx, item) {
                $(this).click(function () {
                    var tag = $('<button type="button" class="btn btn-default tag-item">' + $(item).text() + '</button>');
                    tag.append($('<input type="hidden" name="tags[]" value="' + $(item).attr('data-tag-id') + '" >'));
                    tag.click(function () {
                        $(this).remove();
                    });
                    tagsBox.append(tag);
                });
            });

            $('#tag-add').click(function () {
                var input = $('#tag-input');
                var value = input.val();
                if (value.trim() != "") {
                    var tag = $('<button type="button" class="btn btn-default tag-item">' + value.trim() + '</button>');
                    tag.append($('<input type="hidden" name="tags[]" value="__new_tag__' + value.trim() + '__" >'));
                    tag.click(function () {
                        $(this).remove();
                    });
                    input.val('');
                    tagsBox.append(tag);
                }
            });
        });
        {/literal}
    </script>
{/block}
