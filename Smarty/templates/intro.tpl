{extends file="layouts/base.tpl"}

{block name="title"}团委介绍{/block}

{block name="content"}
    <div class="container">
        <div class="intro clean-fix">
            <div class="side">
                <ul>
                    <li><a href="{url URL="intro.php?id=1"}">指导老师</a></li>
                    <li><a href="{url URL="intro.php?id=2"}">秘书处</a></li>
                    <li><a href="{url URL="intro.php?id=3"}">办公室</a></li>
                    <li><a href="{url URL="intro.php?id=4"}">宣传部</a></li>
                    <li><a href="{url URL="intro.php?id=5"}">组织部</a></li>
                    <li><a href="{url URL="intro.php?id=6"}">实践部</a></li>
                    <li><a href="{url URL="intro.php?id=7"}">调研部</a></li>
                    <li><a href="{url URL="intro.php?id=8"}">国旗部</a></li>
                    <li><a href="{url URL="intro.php?id=9"}">礼仪队</a></li>
                    <li><a href="{url URL="intro.php?id=10"}">广播台</a></li>
                </ul>
            </div>

            <div class="main">
                <div class="inner">
                    <h2>{$part.name}</h2>
                    <p>{$part.summary}</p>

                    <table>
                        <tbody>
                        {foreach item=item from=$part.member}
                            <tr>
                                <td>
                                    <div class="info" style="display: block;">
                                        <ul>
                                            <li>{$item.name}</li>
                                            <li>{$item.aca}</li>
                                            <li>{$item.class}</li>
                                            <li>{$item.job}</li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="image">
                                        {if isset($item.img)}
                                            <img src="{url URL=$item.img}" alt="{$part.name}-{$item.name}">
                                        {else}
                                            <img src="{url URL='asset/image/intro/default.jpg'}"
                                                 alt="{$part.name}-{$item.name}">
                                        {/if}
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{/block}