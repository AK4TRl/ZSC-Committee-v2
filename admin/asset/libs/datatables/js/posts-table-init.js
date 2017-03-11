/**
 * Created by LiuACG on 2017/3/10.
 */

$('#posts-table').dataTable({
    "language": {"url": "/admin/asset/libs/datatables/js/zh-CN.lang.datatables.json"},
    "deferRender": true,
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": "/admin/posts/posts-ajax.php",
        "type": "POST"
    },
    "autoWidth": true,
    "columns": [
        {data: "id"},
        {
            data: "title", render: function (data, type, row) {
            return '<a href="edit.php?id=' + row['id'] + '">' + data + '</a>';
        }
        },
        {data: "author"},
        {data: "category"},
        {data: "date"},
        {data: "status"},
        {
            data: function (row, type, set) {
                return '<a href="read.php?id=' + row['id'] + '" class="btn btn-xs btn-info btn-info">预览 <i class="fa fa-trash-o"></i></a> | '
                     + '<a href="delete.php?id=' + row['id'] + '" class="btn btn-xs btn-info btn-danger">删除 <i class="fa fa-trash-o"></i></a>'
            }
        }
    ],
    "columnDefs": [
        {"sortable": false, "targets": [3, 5, 6]}
    ],
    "sorting": [[4, 'desc']]
});