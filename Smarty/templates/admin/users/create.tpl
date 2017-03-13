{extends file="admin/layouts/base.tpl"}

{block name="title"}创建用户{/block}

{block name="heading"}
    <h3>创建用户</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li><a href="{url URL="/admin/users/"}"> 用户管理</a></li>
        <li class="active">创建用户</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel">
        <div class="panel-body">
            <form action="" method="POST" onsubmit="return validator()">
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input id="username" class="form-control" name="username" type="text" value="{$resume.username}">
                </div>

                <div class="form-group">
                    <label for="password">密码</label>
                    <input id="password" class="form-control" name="password" type="password" value="{$resume.password}">
                </div>

                <div class="form-group">
                    <label for="confirm">确认密码</label>
                    <input id="confirm" class="form-control" name="confirm" type="password" value="{$resume.confirm}">
                </div>

                <div class="form-group">
                    <label for="nick">昵称</label>
                    <input id="nick" class="form-control" name="nick" type="text" value="{$resume.nick}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" name="email" type="email" value="{$resume.email}">
                </div>

                <div class="form-group">
                    <label for="level">权限</label>
                    <select class="form-control" name="level" id="level">
                        <option value="10" {if $resume.level==10}selected{/if}>管理员</option>
                        <option value="20" {if $resume.level==20}selected{/if}>编辑</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">创建</button>
                </div>
            </form>
        </div>
    </div>
{/block}

{block name="script"}
    <script>
        {literal}
        var validator;
        $(document).ready(function () {
            // username
            var username = $('#username');
            var v_username = function () {
                var tmp = username.val().trim();
                username.parent()[(tmp != "" && tmp.length >= 4) ? 'removeClass' : 'addClass']('has-error');
                return (tmp != "" && tmp.length >= 4);
            };
            username.on('keyup blur', v_username);
            // password
            var password = $('#password');
            var v_password = function () {
                var tmp = password.val().trim();
                password.parent()[(tmp != "" && tmp.length >= 6) ? 'removeClass' : 'addClass']('has-error');
                return (tmp != "" && tmp.length >= 6);
            };
            password.on('keyup blur', v_password);
            // confirm
            var confirm = $('#confirm');
            var v_confirm = function () {
                var tmp = confirm.val().trim();
                confirm.parent()[(tmp == password.val().trim()) ? 'removeClass' : 'addClass']('has-error');
                return (tmp == password.val().trim());
            };
            confirm.on('keyup blur', v_confirm);
            // confirm
            var nick = $('#nick');
            var v_nick = function () {
                var tmp = nick.val().trim();
                nick.parent()[(tmp != "" && tmp.length >= 6) ? 'removeClass' : 'addClass']('has-error');
                return (tmp != "" && tmp.length >= 6);
            };
            nick.on('keyup blur', v_nick);

            validator = function () {
                return !!(v_username() && v_password() && v_confirm() && v_nick());
            }
        });
        {/literal}
    </script>
{/block}
