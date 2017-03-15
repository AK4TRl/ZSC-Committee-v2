{extends file="admin/layouts/base.tpl"}

{block name="title"}首页轮播管理{/block}

{block name="heading"}
    <h3>首页轮播管理</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li class="active">首页轮播管理</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel">
        <div class="panel-body">
            <form action="" method="POST">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 96px;">排序</th>
                        <th>标题</th>
                        <th>链接</th>
                        <th>图片链接</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach $data as $item}
                        <tr>
                            <td>
                                <input title="排序" placeholder="排序" class="form-control text-center" type="text"
                                       value="{$item.id}" name="data[{$item@index}][id]" maxlength="2">
                            </td>
                            <td>
                                <input title="标题" placeholder="标题" class="form-control" type="text"
                                       value="{$item.title}" name="data[{$item@index}][title]">
                            </td>
                            <td>
                                <input title="链接" placeholder="链接" class="form-control" type="text"
                                       value="{$item.link}" name="data[{$item@index}][link]">
                            </td>
                            <td>
                                <input title="图片链接" placeholder="图片链接" class="form-control" type="text"
                                       value="{$item.img}" name="data[{$item@index}][img]">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-block">删除 <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                    <tfoot>
                    <tr class="bg-info">
                        <th>
                            <input title="排序" placeholder="排序" class="form-control text-center" type="text"
                                   name="new[id]">
                        </th>
                        <th>
                            <input title="标题" placeholder="标题" class="form-control" type="text" name="new[title]">
                        </th>
                        <th>
                            <input title="链接" placeholder="链接" class="form-control" type="text" name="new[link]">
                        </th>
                        <th>
                            <input title="图片链接" placeholder="图片链接" class="form-control" type="text"
                                   name="new[img]">
                        </th>
                        <th>
                            <button type="submit" class="btn btn-primary btn-block" name="action" value="new">添加 <i
                                        class="fa fa-plus-circle"></i>
                            </button>
                        </th>
                    </tr>
                    </tfoot>
                </table>

                <button type="submit" class="btn btn-primary btn-block">更新 <i class="fa fa-upload"></i></button>
            </form>
        </div>

        <div class="panel-footer">
            {if isset($debug)}
                {var_dump($debug)}
            {/if}
        </div>
    </div>
{/block}

{block name="script"}
    <script>
        $(document).ready(function () {
            $('tbody tr button[type="button"]').each(function (idx, item) {
                $(item).click(function () {
                    $(item).parent().parent().remove();
                });
            });
        });
    </script>
{/block}
