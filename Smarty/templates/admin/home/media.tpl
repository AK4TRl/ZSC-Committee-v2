{extends file="admin/layouts/base.tpl"}

{block name="title"}首页媒体聚焦管理{/block}

{block name="heading"}
    <h3>首页媒体聚焦管理</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li class="active">首页媒体聚焦管理</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="panel">
        <div class="panel-body">
            <form action="{url URL="admin/home/media.php"}" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <input type="text" title="" name="title" class="form-control" placeholder="标题" maxlength="32" value="{$hot.title}">
                </div>

                <div class="form-group">
                    <textarea rows="4" name="summary" class="form-control" placeholder="摘要" maxlength="64"
                              style="resize: none">{$hot.summary}</textarea>
                </div>

                <div class="form-group">
                    <input type="text" title="" name="link" class="form-control" placeholder="链接" maxlength="1024" value="{$hot.link}">
                </div>

                <div id="file-preview" class="image" data-image-src="{url URL="{$hot.img}"}"></div>
                <div class="form-group">
                    <input id="file-uploader-1" type="file" name="file">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">更新</button>
                </div>
            </form>
        </div>
    </div>
{/block}

{block name="style"}
    <link href="//cdn.bootcss.com/bootstrap-fileinput/4.3.8/css/fileinput.min.css" rel="stylesheet">
    <style>
        .image {
            height: 300px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: left;
            margin-bottom: 20px;
        }
    </style>
{/block}

{block name="script"}
    <script src="//cdn.bootcss.com/bootstrap-fileinput/4.3.8/js/fileinput.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap-fileinput/4.3.8/js/locales/zh.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#file-preview').each(function () {
                $(this).css('background-image', 'url(' + $(this).attr('data-image-src') + ')');
            });

            $('#file-uploader-1').fileinput({
                showPreview: false,
                language: 'zh',
                allowedFileExtensions: ['png', 'jpg', 'jpeg', 'bmp', 'gif']
            });

            document.getElementById('file-uploader-1').onchange = function (evt) {
                // 如果浏览器不支持FileReader，则不处理
                if (!window.FileReader) {
                    alert('你的浏览器不支持文件预览');
                    return;
                }
                var files = evt.target.files;
                for (var i = 0, f; f = files[i]; i++) {
                    if (!f.type.match('image.*')) {
                        continue;
                    }
                    var reader = new FileReader();
                    reader.onload = (function () {
                        return function (e) {
                            // img 元素
                            document.getElementById('file-preview').style.backgroundImage = 'url(' + e.target.result + ')';
                        };
                    })(f);
                    reader.readAsDataURL(f);
                }
            }
        });
    </script>
{/block}
