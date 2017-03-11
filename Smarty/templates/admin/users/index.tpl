{extends file="admin/layouts/base.tpl"}

{block name="title"}用户管理{/block}

{block name="heading"}
    <h3>用户管理</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li class="active">用户管理</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel">
        <div class="panel-heading">
            <a class="btn btn-xs" href="{url URL="admin/users/create.php"}">添加新用户 <i class="fa fa-plus-circle"></i></a>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center" style="width: 72px">#</th>
                    <th>用户名</th>
                    <th>名称</th>
                    <th>邮箱地址</th>
                    <th>状态</th>
                    <th>权限</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                {foreach item=item from=$users}
                    <tr>
                        <td><input name="id" class="form-control text-center" title="用户ID" type="text"
                                   value="{$item.id}" disabled></td>
                        <td><input class="form-control" title="用户名" type="text" value="{$item.login}" disabled></td>
                        <td><input name="nick" class="form-control" title="名称" type="text" value="{$item.nick}"></td>
                        <td><input name="email" class="form-control" title="邮箱地址" type="text" value="{$item.email}">
                        </td>
                        <td>
                            <select class="form-control" name="status" title="状态" {if $item.level == 0}disabled{/if}>
                                <option value="0" {if $item.status == 0}selected{/if}>禁用</option>
                                <option value="1" {if $item.status == 1}selected{/if}>启用</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="level" title="权限" {if $item.level == 0}disabled{/if}>
                                {if $item.level == 0}
                                    <option value="0" {if $item.level == 0}selected{/if}>超级管理员</option>
                                {else}
                                    <option value="10" {if $item.level == 10}selected{/if}>管理员</option>
                                    <option value="20" {if $item.level == 20}selected{/if}>编辑</option>
                                {/if}
                            </select>
                        </td>
                        <td>
                            <a data-update class="btn btn-info">更新</a>
                            | <a data-delete class="btn btn-danger" {if $item.level == 0}disabled{/if}>删除</a>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
{/block}

{block name="script"}
    <script>
        {literal}
        $(document).ready(function () {
            $('table tbody').find('tr').each(function (idx, item) {
                $(item).find('td a[data-update]').click(function () {
                    var url = "/admin/users/update.php";
                    $.ajax(url, {
                        data: {
                            "id": $(item).find('input[name="id"]').val(),
                            "nick": $(item).find('input[name="nick"]').val(),
                            "email": $(item).find('input[name="email"]').val(),
                            "status": $(item).find('select[name="status"]').val(),
                            "level": $(item).find('select[name="level"]').val()
                        },
                        type: "POST",
                        success: function () {
                            history.go(0);
                        },
                        error: function () {
                            alert('修改失败，服务器出现错误');
                        }
                    });
                });
                $(item).find('td a[data-delete]').click(function () {
                    if (confirm('确定要删除该用户吗？')) {
                        var url = "/admin/users/delete.php";
                        $.ajax(url, {
                            data: {
                                "id": $(item).find('input[name="id"]').val()
                            },
                            type: "POST",
                            success: function (data) {
                                console.log(data);
                                history.go(0);
                            },
                            error: function () {
                                alert('修改失败，服务器出现错误');
                            }
                        });
                    }
                });
            });
        });
        {/literal}
    </script>
{/block}
