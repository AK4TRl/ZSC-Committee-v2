<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <link rel="icon" href="{url URL='asset/image/favicon.ico'}">

    <title>电子科技大学中山学院团委 | {block name='title'}Title{/block}</title>

    <!-- Style Sheet -->
    <link rel="stylesheet" href="{url URL='asset/css/reset.css' }">
    <link rel="stylesheet" href="{url URL='asset/css/style.css?_t=32' }">
    {block name='style-sheet'}{/block}

    <!-- JavaScript -->
    <script type="text/javascript" src="{url URL='asset/js/jquery-3.1.1.js' }"></script>
    <script type="text/javascript" src="{url URL='asset/js/main.js?' }"></script>
    {block name='preload-script'}{/block}
</head>
<body>
<nav class="navbar">
    <div class="container">
        <ul class="nav nav-left">
            <li><a href="{url URL='/' }">首页</a></li>
            <li><a href="{url URL='/intro.php' }">团委介绍</a></li>
            <li><a href="{url URL='/youth.php' }">青年在线</a></li>
            <li><a href="{url URL='/practice.php' }">社会实践</a></li>
            <li><a href="{url URL='/message.php' }">留言板</a></li>
            <li><a href="{url URL='http://www.zsc.edu.cn/' }">学校主页</a></li>
        </ul>

        <ul class="nav nav-right">
            <li>
                <div class="search clean-fix">
                    <form action="{url URL="search.php"}">
                        <input name="s" class="search-text" type="text" title="搜索" placeholder="Search...">
                        <button class="search-btn" type="submit">搜索</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="header">
    <div class="container">
        <div class="header-logo">
            <img src="{url URL='asset/image/header-logo.png' }" alt="共青团电子科技大学中山学院团委">
        </div>

        <div class="header-title">
            <img src="{url URL='asset/image/header-title.png' }" alt="共青团电子科技大学中山学院团委">
        </div>
    </div>
</div>

<div class="content">
    {block name='content'}{/block}
</div>

<div class="qr-code">
    <div class="qr-small">
        <!--<img src="{url URL='asset/image/qr-small.png' }" alt="点击查看二维码">-->
    </div>
    <div class="qr-main">
        <img src="{url URL='asset/image/qr-main.jpg' }" alt="扫描二维码关注我们">
    </div>
</div>

<div class="footer">
    <div class="container">
        <p class="hr" style="width: 100%; border-bottom: 1px solid #970f01"></p>

        <p class="text-center">共青团电子科技大学中山学院委员会 | <a href="{url URL="admin"}" style="color: #333">管理员入口</a></p>
        <p class="text-center copy-right">&copy; <a href="http://www.LiuACG.com">LiuACG</a></p>
    </div>
</div>

<!-- JavaScript -->
{block name='script'}{/block}
</body>
</html>
<!-- Code & Design & Power by LiuACG ~ (www.LiuACG.com) -->
