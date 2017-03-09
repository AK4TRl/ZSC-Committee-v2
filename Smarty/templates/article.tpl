{extends file="layouts/base.tpl"}

{block name="title"}{$article.title}{/block}

{block name="content"}
    <div class="container">
        <div class="article">
            <div class="head">
                <h1>{$article.title}</h1>
                <h2>{$article.subtitle}</h2>

                <div class="article-info">
                    <p>发表人: {$article.author} | 发表时间: {$article.date} | 阅读量: {$article.hit}</p>
                    <p>分类: {$article.category}</p>
                </div>
            </div>

            <div class="body">{$article.content}</div>
        </div>
    </div>
{/block}