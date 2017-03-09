{extends file='layouts/base.tpl'}

{block name='title'}首页{/block}

{block name="content"}
    <div class="container wrapper-1">
        <div class="banner-content">
            <div class="banner">
                <div class="banner-inner"></div>
                <div class="btn-prev"></div>
                <div class="btn-next"></div>
            </div>
        </div>

        <div class="notification">
            <div class="notify">
                <h2>最新通知 <span><a href="{$moreNotice}" title="更多">&raquo;</a></span></h2>
            </div>

            <div class="notify-body">
                <ul>
                    {foreach item=item from=$notice}
                        <li><a href="{url URL="article.php?id={$item.id}"}">{$item.title}</a></li>
                    {/foreach}
                </ul>
            </div>

            <div class="more">
                <h2>相关链接</h2>

                <table>
                    <tr>
                        <td><a href="{url URL="tag.php?id=91"}">资料下载</a></td>
                        <td><a href="{url URL="tag.php?id=92"}">团情在线</a></td>
                    </tr>
                    <tr>
                        <td><a href="{url URL="tag.php?id=93"}">理论学习</a></td>
                        <td><a href="{url URL="tag.php?id=90"}">英豪榜</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container wrapper-2">
        <div class="tabs">
            <ul class="tabs-title">
                <li class="active">最新动态</li>
                <li>互动焦点</li>
                <li>媒体聚焦</li>
            </ul>

            <ul class="tabs-content">
                <li class="active">
                    <a href="{url URL={$partNewsHot.link}}">
                        <div class="image">
                            <img src="{url URL={$partNewsHot.img}}" title="{$partNewsHot.title}">
                        </div>

                        <div class="text">
                            <h3>{$partNewsHot.title}</h3>
                            <p>{$partNewsHot.summary}</p>
                        </div>
                    </a>

                    <div class="links">
                        <ul>
                            {foreach item=item from=$partNews}
                                <li><a href="{url URL="article.php?id={$item.id}"}">{$item.title}</a></li>
                            {/foreach}
                        </ul>

                        <div class="more"><a href="{url URL="tag.php?id=85"}"><span>更多&nbsp;&raquo;</span></a></div>
                    </div>
                </li>
                <li>
                    <a href="{url URL={$partFocusHot.link}}">
                        <div class="image">
                            <img src="{url URL={$partFocusHot.img}}" title="{$partFocusHot.title}">
                        </div>

                        <div class="text">
                            <h3>{$partFocusHot.title}</h3>
                            <p>{$partFocusHot.summary}</p>
                        </div>
                    </a>

                    <div class="links">
                        <ul>
                            {foreach item=item from=$partMedia}
                                <li><a href="{url URL="article.php?id={$item.id}"}">{$item.title}</a></li>
                            {/foreach}
                        </ul>

                        <div class="more"><a href="{url URL="tag.php?id=87"}"><span>更多&nbsp;&raquo;</span></a></div>
                    </div>
                </li>
                <li>
                    <a href="{url URL={$partMediaHot.link}}">
                        <div class="image">
                            <img src="{url URL={$partMediaHot.img}}" title="{$partMediaHot.title}">
                        </div>

                        <div class="text">
                            <h3>{$partMediaHot.title}</h3>
                            <p>{$partMediaHot.summary}</p>
                        </div>
                    </a>

                    <div class="links">
                        <ul>
                            {foreach item=item from=$partFocus}
                                <li><a href="{url URL="article.php?id={$item.id}"}">{$item.title}</a></li>
                            {/foreach}
                        </ul>

                        <div class="more"><a href="{url URL="tag.php?id=88"}"><span>更多&nbsp;&raquo;</span></a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
{/block}

{block name='script'}
    <script id="banner-data" type="application/json" class="json-inline">{$banner}</script>
    <script>
        (function () {
            var tmp = $('.banner-content').find('.banner-inner').eq(0);
            var data = JSON.parse(document.getElementById('banner-data').innerText);
            data.forEach(function (item, idx) {
                var str = '<div class="item:active"><a href=":url" title=":text"><div class="image"><span class="img-center"></span><img src=":image" alt=""></div><div class="text">:text</div></a></div>'
                    .replace(/:active/g, idx == 0 ? ' active' : '')
                    .replace(/:url/g, item.url)
                    .replace(/:text/g, item.text)
                    .replace(/:image/g, item.image);
                tmp.append(str);
            });

            new Banner('.banner-content');
        })();

        (function () {
            var tabs = $('.tabs > ul.tabs-title > li');
            var contents = $('.tabs > ul.tabs-content > li');

            tabs.each(function () {
                var cur = this;
                $(cur).hover(function () {
                    tabs.each(function () {
                        $(this).removeClass('active');
                    });
                    contents.each(function () {
                        $(this).removeClass('active');
                    });
                    $(cur).addClass('active');
                    contents.eq($.makeArray(tabs).indexOf(cur)).addClass('active');
                });
            });
        }());
    </script>
{/block}