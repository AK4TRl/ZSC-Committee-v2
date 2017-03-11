{extends file="admin/layouts/base.tpl"}

{block name="title"}留言管理{/block}

{block name="heading"}
    <h3>留言管理</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li class="active">留言管理</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel">
        <div class="panel-body">
            <table class="table table-bordered" id="leaves-table">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>标题</th>
                    <th>电子邮箱地址</th>
                    <th>IP地址</th>
                    <th>时间</th>
                    <th>状态</th>
                    <th></th>
                </tr>
                </thead>

                <tbody></tbody>
            </table>
        </div>
    </div>
{/block}

{block name="style"}
    <!-- posts table -->
    <link href="{url URL="admin/asset/libs/datatables/css/dataTables.bootstrap.css"}" rel="stylesheet">
{/block}

{block name="script"}
    <!-- posts table -->
    <script src="{url URL="admin/asset/libs/datatables/js/jquery.dataTables.js"}"></script>
    <script src="{url URL="admin/asset/libs/datatables/js/dataTables.bootstrap.js"}"></script>
    <script src="{url URL="admin/asset/libs/datatables/js/leaves-table-init.js"}"></script>
{/block}
