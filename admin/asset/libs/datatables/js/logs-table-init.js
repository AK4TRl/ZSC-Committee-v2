/**
 * Created by LiuACG on 2017/3/13.
 */

$('#logs-table').dataTable({
    "language": {"url": "/admin/asset/libs/datatables/js/zh-CN.lang.datatables.json"},
    "deferRender": true,
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": "/admin/logs/logs-ajax.php",
        "type": "POST"
    },
    "autoWidth": true,
    "columns": [
        {data: "id"},
        {data: "event"},
        {data: "date"},
        {
            data: "level",
            render: function (data, type, row) {
                if (data == 0) return '信息 (INFO)';
                else if (data == 1) return '警告 (WARN)';
                else if (data == 2) return '错误 (ERROR)';
                else if (data == 3) return '致命错误 (FATAL)';
                else if (data == 4) return '调试 (DEBUG)';
                return '未知';
            }
        },
        {
            data: "flag",
            render: function (data, type, row) {
                return data ? '已处理' : '<a href="/admin/logs/read.php?id=' + row['id'] + '">待处理</a>';
            }
        }
    ],
    "columnDefs": [
        {"sortable": false, "targets": [1]}
    ],
    "sorting": [[2, 'desc']]
});
