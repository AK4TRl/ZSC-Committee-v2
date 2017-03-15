{extends file="admin/layouts/base.tpl"}

{block name="title"}设置{/block}

{block name="heading"}
    <h3>设置</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li class="active">设置</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel">
        <div class="panel-body">
            {if isset($error)}
                <div class="alert alert-danger">{$error}</div>
            {/if}
            {* TODO: JavaScript验证表单 *}
            <form action="{url URL="admin/users/profile.php"}" method="POST">
                <div class="form-group">
                    <input class="form-control" name="username" title="" placeholder="用户名 (Nick)" type="text"
                           maxlength="32" {if isset($username)}value="{$username}"{/if}>
                </div>

                <div class="form-group">
                    <input class="form-control" name="password" title="" placeholder="密码" type="password"
                           maxlength="32">
                </div>

                <div class="form-group">
                    <input class="form-control" name="confirm" title="" placeholder="确认密码" type="password"
                           maxlength="32">
                </div>

                <button type="submit" class="btn btn-block btn-primary">保存</button>
            </form>
        </div>
    </div>
{/block}
