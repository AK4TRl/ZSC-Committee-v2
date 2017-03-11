{extends file="admin/layouts/base.tpl"}

{block name="title"}文章管理{/block}

{block name="heading"}
    <h3>文章管理</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li class="active">文章管理</li>
    </ul>
{/block}

{block name="wrapper"}
    <section class="panel">
        <header class="panel-heading">
            <a href="{url URL="admin/posts/create.php"}" class="btn btn-xs" type="button">新文章 <i
                        class="fa fa-plus-circle"></i></a>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <table class="display table table-bordered table-striped" id="posts-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>分类</th>
                        <th style="max-width: 140px">时间</th>
                        <th style="max-width: 80px">状态</th>
                        <th style="max-width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </section>
{/block}

{block name="style"}
    <!-- posts table -->
    <link href="{url URL="admin/asset/libs/datatables/css/dataTables.bootstrap.css"}" rel="stylesheet">
{/block}

{block name="script"}
    <!-- posts table -->
    <script src="{url URL="admin/asset/libs/datatables/js/jquery.dataTables.js"}"></script>
    <script src="{url URL="admin/asset/libs/datatables/js/dataTables.bootstrap.js"}"></script>
    <script src="{url URL="admin/asset/libs/datatables/js/posts-table-init.js"}"></script>
{/block}