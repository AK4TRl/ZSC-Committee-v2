{extends file="layouts/base.tpl"}

{block name="title"}搜索：{$keyword}{/block}

{block name="content"}
    <div class="container">
        <div class="tags">
            <div class="tags-head">
                <h1>包含 '{$keyword}' 的文章 <span>(共{$total}条结果 - 用时{$used}s)</span></h1>
            </div>

            <div class="tags-body">
                <ul>
                    {foreach item=item from=$result}
                        <li>
                            <h2 class="article-title"><a href="{url URL="article.php?id={$item.id}"}">{$item.title}</a></h2>
                            <p class="article-preview">{$item.preview}</p>
                            <p class="article-info">发表人：{$item.author} | 发表在：{$item.date} | 分类：{$item.category}</p>
                        </li>
                    {/foreach}
                </ul>
            </div>

            <div class="tags-foot">
                <p><a href="{url URL="search.php?s={$keyword}&page={max(1, $page - 1)}"}">上一页</a> | <a
                            href="{url URL="search.php?s={$keyword}&page={min($total, $page + 1)}"}">下一页</a></p>
            </div>
        </div>
    </div>
{/block}