{extends file="admin/layouts/base.tpl"}

{extends file="admin/layouts/base.tpl"}

{block name="title"}删除文章{/block}

{block name="heading"}
    <h3>删除文章</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li><a href="{url URL="/admin/posts"}">文章管理</a></li>
        <li class="active">删除文章</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h1>
                确定要删除该文章吗？这将不能恢复！
            </h1>
        </div>

        <div class="panel-body">
            <h2>标题: {$article.title}</h2>
        </div>

        <div class="panel-footer">
            <form action="{url URL="admin/posts/delete.php"}" method="POST">
                {* TODO: CSRF_TOKEN *}
                <input type="hidden" name="id" value="{$article.id}">
                <button type="submit" class="btn btn-danger">删除 <i class="fa fa-trash-o"></i></button>
            </form>
        </div>
    </div>
{/block}
