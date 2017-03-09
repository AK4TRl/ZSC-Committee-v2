{extends file="layouts/base.tpl"}

{block name="title"}{$msg.title}{/block}

{block name="content"}
    <div class="container">
        <div class="article">
            <div class="head">
                <h1>{$msg.title}</h1>

                <div class="article-info">
                    <p>发表人: {$msg.author} | 发表时间: {$msg.date}</p>
                </div>
            </div>

            <div class="body">
                <p style="text-indent: 2em">{$msg.content}</p>
            </div>
        </div>
    </div>
{/block}
