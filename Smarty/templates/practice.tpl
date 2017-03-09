{extends file="layouts/base.tpl"}

{block name="title"}社会实践{/block}

{block name="content"}
    <div class="container practice">
        <div class="side-left">
            <fieldset class="line-1">
                <legend>照片墙</legend>

                <div class="banner-practice">
                    <div class="banner">
                        <div class="banner-inner"></div>
                        <div class="btn-prev"></div>
                        <div class="btn-next"></div>
                    </div>
                </div>
            </fieldset>

            <span class="split"></span>

            <fieldset class="line-2">
                <legend>通知</legend>

                <ul class="links">
                    {foreach item=item from=$notify}
                        <li><a href="{url URL="article.php?id={$item.id}"}">{$item.title}</a></li>
                    {/foreach}
                </ul>
            </fieldset>
        </div>
        <div class="side-title">
            <h2>暑期社会实践</h2>
        </div>
        <div class="side-right">
            <fieldset class="line-1">
                <legend>最新报道</legend>

                <ul class="links">
                    {foreach item=item from=$news}
                        <li><a href="{url URL="article.php?id={$item.id}"}">{$item.title}</a></li>
                    {/foreach}
                </ul>
            </fieldset>

            <span class="split"></span>

            <fieldset class="line-2">
                <legend>相关下载</legend>

                <ul class="links">
                    {foreach item=item from=$downloads}
                        <li><a href="{url URL="article.php?id={$item.id}"}">{$item.title}</a></li>
                    {/foreach}
                </ul>
            </fieldset>
        </div>
    </div>
{/block}

{block name="script"}
    <script id="banner-data" type="application/json" class="json-inline">{$photos}</script>
    <script>
        (function () {
            var tmp = $('.banner-practice').find('.banner-inner').eq(0);
            var data = JSON.parse(document.getElementById('banner-data').innerText);
            data.forEach(function (item, idx) {
                var str = '<div class="item:active"><a href=":url"><div class="image"><span class="img-center"></span><img src=":image" alt=""></div><div class="text">:text</div></a></div>'
                    .replace(/:active/g, idx == 0 ? ' active' : '')
                    .replace(/:url/g, item.url)
                    .replace(/:text/g, item.text)
                    .replace(/:image/g, item.image);
                tmp.append(str);
            });

            new Banner('.banner-practice');
        })();
    </script>
{/block}