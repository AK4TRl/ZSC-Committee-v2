/**
 * Created by LiuACG on 2017/3/11.
 */

$('#leaves-table').dataTable({
    "language": {"url": "/admin/asset/libs/datatables/js/zh-CN.lang.datatables.json"},
    "deferRender": true,
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": "/admin/leaves/leaves-ajax.php",
        "type": "POST"
    },
    "autoWidth": true,
    "columns": [
        {data: "author"},
        {
            data: "title",
            render: function (data, type, row) {
                return '<a href="read.php?id=' + row['id'] + '">' + data + '</a>';
            }
        },
        {data: "email"},
        {data: "ip"},
        {data: "date"},
        {
            data: "status",
            render: function (data, type, row) {
                if (data === true) {
                    return '<a href="switch.php?id=' + row['id'] + '&s=0" title="点击将该留言隐藏">公开</a>';
                }
                return '<a href="switch.php?id=' + row['id'] + '&s=1" title="点击将该留言公开">隐藏</a>';
            }
        },
        {
            data: "id",
            render: function (data, type, row) {
                return '<a href="delete.php?id=' + row['id'] + '" class="btn btn-xs btn-info btn-danger">删除 <i class="fa fa-trash-o"></i></a>'
            }
        }
    ],
    "columnDefs": [
        {"sortable": false, "targets": [6]}
    ],
    "sorting": [[4, 'desc']]
});