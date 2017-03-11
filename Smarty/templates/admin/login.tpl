<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Login</title>

    <link href="{url URL="admin/asset/css/style.css"}" rel="stylesheet">
    <link href="{url URL="admin/asset/css/style-responsive.css"}" rel="stylesheet">
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="" method="POST">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Sign In</h1>
            <img src="{url URL="admin/asset/images/login-logo.png"}" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="User Name" autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password">

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <label class="checkbox">
                <span class="pull-right">
                    <a href="{url URL="/"}">返回首页</a>
            </span>
            </label>
        </div>
    </form>

    <script src="{url URL="admin/asset/js/jquery-1.10.2.min.js"}"></script>
    <script src="{url URL="admin/asset/js/bootstrap.min.js"}"></script>
    <script src="{url URL="admin/asset/js/modernizr.min.js"}"></script>
</div>
</body>
</html>
