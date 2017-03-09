{extends file="layouts/base.tpl"}

{block name="title"}青年在线{/block}

{block name="content"}
    <div class="container">
        <table class="poster">
            <tr>
                <td>
                    <div class="poster-image">
                        <img src="{url URL="asset/image/youth/theYoungLogo5.png" }"/>
                    </div>
                </td>
            <tr>
            <tr>
                <td>
                    <div class="tip-bar">
                        <span class="text">你可以通过右方的按钮下载《青年》杂志</span>
                        <span class="text"><a href="http://www2.zsc.edu.cn/ytw/images/youth/青年第五期.pdf">电子科技大学中山学院院刊《青年》PFD档在线阅读：点击阅读</a></span>
                        <span class="download">
                            <a href="http://download.adobe.com/pub/adobe/reader/win/7x/7.0.5/chs/AdbeRdr705_chs_full.exe">
                                <img src="{url URL="asset/image/youth/pdfdownload.gif" }"/>
                            </a>
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="previous">
                        <tbody>
                        <tr>
                            <td colspan="5">
                                <img src="{url URL="asset/image/youth/oldPeriodical.png" }"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="book-item">
                                <a href="#"><img src="{url URL="asset/image/youth/tuandaihui.jpg" }"/></a>
                            </td>
                            <td class="book-item">
                                <a href="#"><img src="{url URL="asset/image/youth/theYoung3.jpg" }"/></a>
                            </td>
                            <td class="book-item">
                                <a href="#"><img src="{url URL="asset/image/youth/theYoung2.jpg" }"/></a>
                            </td>
                            <td class="book-item">
                                <a href="#"><img src="{url URL="asset/image/youth/theYoung1.jpg" }"/></a>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><a href="#">团代会专刊</a></td>
                            <td><a href="#">青年第三期</a></td>
                            <td><a href="#">青年第二期</a></td>
                            <td><a href="#">青年第一期</a></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
{/block}
