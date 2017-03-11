{extends file="admin/layouts/base.tpl"}

{block name="title"}分类{/block}

{block name="heading"}
    <h3>分类</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li><a href="{url URL="/admin/posts"}">文章管理</a></li>
        <li class="active">分类</li>
    </ul>
{/block}

{block name="wrapper"}
    <section class="panel">
        <div class="panel-body">
            <div>
                <table class="display table table-bordered table-responsive table-striped">
                    <thead>
                    <tr>
                        <th style="width: 128px">#</th>
                        <th>名称</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach item=item from=$category}
                        <tr>
                            <td><input class="form-control text-center" type="text" title="分类编号" name="id"
                                       value="{$item.id}" disabled></td>
                            <td><input class="form-control" type="text" title="" name="value" value="{$item.name}"
                                       placeholder="分类名称" maxlength="32"></td>
                            <td>
                                <button type="button" class="btn btn btn-info btn-block">更新标签 <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>

                    <tfoot>
                    <tr class="info">
                        <th><input type="hidden" name="id" value="new"></th>
                        <th><input class="form-control" type="text" title="添加标签" name="value" placeholder="新标签名称"
                                   maxlength="32"></th>
                        <th>
                            <button type="button" class="btn btn btn-primary btn-block">添加标签 <i
                                        class="fa fa-plus-circle"></i></button>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
{/block}

{block name="script"}
    <script>
        {literal}
        $(document).ready(function () {
            var body = $('table');
            var trs = body.find('tr');
            trs.each(function (idx, item) {
                $(item).find('button').click(function () {
                    var id = $(item).find('[name="id"]').val();
                    var value = $(item).find('[name="value"]').val();

                    if (value.trim() != "") {
                        var url = '/admin/posts/tags.php';
                        console.log(url);
                        $.ajax(url, {
                            type: "POST",
                            data: {
                                id: id,
                                value: value
                            },
                            success: function () {
                                history.go(0);
                            },
                            error: function () {
                                alert('出现未知错误');
                            }
                        });
                    }
                });
            });
        });
        {/literal}
    </script>
{/block}