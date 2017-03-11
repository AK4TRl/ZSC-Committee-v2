{extends file="admin/layouts/base.tpl"}

{block name="title"}查看留言{/block}

{block name="heading"}
    <h3>查看留言</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li><a href="{url URL="/admin/leaves"}"> 留言管理</a></li>
        <li class="active">查看留言</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel">
        <div class="panel-body">
            <dl>
                <dt>标题</dt>
                <dd>{$leave.title}</dd>

                <dt>姓名</dt>
                <dd>{$leave.author}</dd>

                <dt>邮箱地址</dt>
                <dd>{$leave.email}</dd>

                <dt>IP地址</dt>
                <dd>{$leave.ip}</dd>

                <dt>留言时间</dt>
                <dd>{$leave.date}</dd>

                <dt>状态</dt>
                <dd>{$leave.status}</dd>

                <dt>内容</dt>
                <dd>{$leave.content}</dd>
            </dl>
        </div>
    </div>
{/block}
