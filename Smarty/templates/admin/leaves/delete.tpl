{extends file="admin/layouts/base.tpl"}

{block name="title"}删除留言{/block}

{block name="heading"}
    <h3>删除留言</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li><a href="{url URL="/admin/leaves"}">留言管理</a></li>
        <li class="active">删除留言</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h1>
                确定要删除该留言吗？这将不能恢复！
            </h1>
        </div>

        <div class="panel-body">
            <h2>标题: {$leave.title}</h2>

            <p>内容：{$leave.content}</p>
        </div>

        <div class="panel-footer">
            <form action="{url URL="admin/leaves/delete.php"}" method="POST">
                {* TODO: CSRF_TOKEN *}
                <input type="hidden" name="id" value="{$leave.id}">
                <button type="submit" class="btn btn-danger">删除 <i class="fa fa-trash-o"></i></button>
            </form>
        </div>
    </div>
{/block}
