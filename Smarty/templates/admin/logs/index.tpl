{extends file="admin/layouts/base.tpl"}

{block name="title"}日志管理{/block}

{block name="heading"}
    <h3>日志管理</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li class="active">日志管理</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel">
        <div class="panel-body">
            <table class="table table-bordered table-striped" id="logs-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>事件</th>
                    <th>时间</th>
                    <th>等级</th>
                    <th>状态</th>
                </tr>
                </thead>

                <tbody>

                </tbody>
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
    <script src="{url URL="admin/asset/libs/datatables/js/logs-table-init.js"}"></script>
{/block}
