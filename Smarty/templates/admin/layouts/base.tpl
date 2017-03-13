<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="{url URL="asset/image/favicon.ico"}">

    <title>中山学院团委后台管理 | {block name="title"}Title{/block}</title>

    <link href="{url URL="admin/asset/css/style.css"}" rel="stylesheet">
    <link href="{url URL="admin/asset/css/style-responsive.css"}" rel="stylesheet">
    {block name="style"}{/block}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    {*<!--[if lt IE 9]>
    <script src="{url URL="admin/asset/js/html5shiv.js"}"></script>
    <script src="{url URL="admin/asset/js/respond.min.js"}"></script>
    <![endif]-->*}
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="{url URL="/"}"><img src="{url URL="admin/asset/images/logo.png"}" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="{url URL="/"}"><img src="{url URL="admin/asset/images/logo_icon.png"}" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <h5 class="left-nav-title">账户信息</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="#"><i class="fa fa-user"></i> <span>个人资料</span></a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> <span>设置</span></a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            {include file="admin/layouts/menu.tpl"}
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content">

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            {if (isset($notification) && is_array($notification) && (count($notification) > 0))}
                                <span class="badge">{count($notification)}</span>
                            {/if}
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">服务器运行日志</h5>
                            <ul class="dropdown-list normal-list">
                                {if (isset($notification) && is_array($notification) && (count($notification) > 0))}
                                    {foreach $notification as $item}
                                        <li class="new">
                                            <a href="">
                                                {if $item.level == 0}
                                                    <span class="label label-info"><i class="fa fa-bolt"></i></span>
                                                {elseif $item.level == 1}
                                                    <span class="label label-warning"><i class="fa fa-bolt"></i></span>
                                                {elseif $item.level == 2}
                                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                                {elseif $item.level == 3}
                                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                                {elseif $item.level == 4}
                                                    <span class="label label-primary"><i class="fa fa-bolt"></i></span>
                                                {/if}
                                                <span class="name">{$item.event}  </span>
                                                <em class="small">{intval((time() - strtotime($item.date)) / 100)}
                                                    mins</em>
                                            </a>
                                        </li>
                                    {/foreach}
                                {else}
                                    <li class="new">暂无通知</li>
                                {/if}
                                <li class="new"><a href="{url URL="admin/logs/"}">查看所有日志</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="{url URL="admin/asset/images/avatar.jpg"}" alt=""/>
                            {$user.nick}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            {*<li><a href="#"><i class="fa fa-user"></i> 个人资料</a></li>*}
                            <li><a href="{url URL="admin/users/profile.php"}"><i class="fa fa-cog"></i> 设置</a></li>
                            <li><a href="{url URL="admin/logout.php"}"><i class="fa fa-sign-out"></i> 退出</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            {block name="heading"}{/block}
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            {block name="wrapper"}Body contents goes here{/block}
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer class="sticky-footer">
            2017 &copy; LiuACG
        </footer>
        <!--footer section end-->

    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="{url URL="admin/asset/js/jquery-1.10.2.min.js"}"></script>
<script src="{url URL="admin/asset/js/jquery-ui-1.9.2.custom.min.js"}"></script>
<script src="{url URL="admin/asset/js/jquery-migrate-1.2.1.min.js"}"></script>
<script src="{url URL="admin/asset/js/bootstrap.min.js"}"></script>
<script src="{url URL="admin/asset/js/modernizr.min.js"}"></script>
<script src="{url URL="admin/asset/js/jquery.nicescroll.js"}"></script>

<!--common scripts for all pages-->
<script src="{url URL="admin/asset/js/scripts.js"}"></script>
{block name="script"}{/block}

</body>
</html>
