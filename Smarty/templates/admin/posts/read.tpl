{extends file="admin/layouts/base.tpl"}

{block name="title"}文章预览{/block}

{block name="heading"}
    <h3>文章预览</h3>
    <ul class="breadcrumb panel">
        <li><a href="{url URL="/admin"}"><i class="fa fa-home"></i> 主页</a></li>
        <li><a href="{url URL="/admin/posts"}">文章管理</a></li>
        <li class="active">文章预览</li>
    </ul>
{/block}

{block name="wrapper"}
    <div class="post-reader">
        <div class="article">
            <div><a href="{url URL="admin/posts/edit.php?id={$article.id}"}">编辑 <i class="fa fa-edit"></i></a></div>

            <div class="head">
                <h1>{$article.title}</h1>
                <h2>{$article.subtitle}</h2>

                <div class="article-info">
                    <p>发表人: {$article.author} | 发表时间: {$article.date} | 阅读量: {$article.hit} | 状态: {$article.status}</p>
                    <p>分类: {$article.category}</p>
                </div>
            </div>

            <div class="body">{$article.content}</div>
        </div>
    </div>
{/block}

{block name="style"}
    <style>
        .post-reader {
            border-radius: 2px;
            padding: 10px 20px;
            width: 1040px;
            /*margin: 0 auto;*/
            margin-bottom: 64px;
            background-color: #fff;
            box-shadow: 5px 5px 12px #666;
        }

        .article {
            margin-top: 10px;
        }

        .article .head {
            border-bottom: 2px solid #970f01;
            padding-bottom: 10px;
        }

        .article .head h1 {
            text-align: center;
            font-size: 40px;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .article .head h2 {
            text-align: center;
            font-size: 28px;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .article .head .article-info p {
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .article .body {
            padding: 10px 10px 0;
        }
    </style>
{/block}
