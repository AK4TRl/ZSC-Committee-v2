/**
 * Created by LiuACG on 2017/2/26.
 */

;$(function () {
    var resize = function() {
        var qr = document.getElementsByClassName('qr-code')[0];
        qr.style.top = ((window.innerHeight - 260) / 2) + 'px';
    };
    resize();

    window.onresize = resize;
});

var Banner = (function ($) {
    "use strict";

    function Banner(selector) {
        var _self = this;
        _self.selector = selector;
        _self.Init();
    }

    Banner.prototype.Init = function() {
        var _self = this;
        _self.content = $(_self.selector).eq(0);
        _self.items = $.makeArray(_self.content.find('.banner-inner > .item'));
        _self.cur = 0;

        _self.prev = _self.content.find('.btn-prev').eq(0);
        _self.prev.click(function () {
            _self.ChangeTo(_self.cur - 1, 'prev');
        });
        _self.next = _self.content.find('.btn-next').eq(0);
        _self.next.click(function () {
            _self.ChangeTo(_self.cur + 1, 'next');
        });
        _self.BeginInterval();
        $(_self.content).hover(function () {
            _self.StopInterval();
        }, function () {
            _self.BeginInterval();
        });
    };

    Banner.prototype.StopInterval = function () {
        var _self = this;
        clearInterval(_self.interval);
    };

    Banner.prototype.BeginInterval = function () {
        var _self = this;
        _self.interval = setInterval(function () {
            _self.ChangeTo(_self.cur + 1, 'next');
        }, 5000);
    };

    Banner.prototype.ChangeTo = function (idx, action) {
        var _self = this;
        var box = _self.content.find('.banner');
        if(box.hasClass('busy'))
            return;
        var items = _self.items;
        var cnt = items.length;
        if(cnt < 2) return;
        var active = _self.content.find('.banner-inner > .item.active')[0];
        var curIdx = items.indexOf(active);
        if(curIdx == -1) {
            $(items[0]).addClass('active');
            active = items[0];
            curIdx = 0;
        }
        var next = (idx + cnt) % cnt;
        if(next === curIdx) return;

        var dir;
        if(action === 'prev') {
            dir = 'right';
            action = 'prev';
        } else {
            dir = 'left';
            action = 'next';
        }

        $(items[next]).addClass(action);
        box.addClass('busy');

        setTimeout(function () {
            $(active).addClass(dir);
            $(items[next]).addClass(dir);

            setTimeout(function () {
                $(active).removeClass(dir).removeClass('active');
                $(items[next]).removeClass(dir).removeClass(action).addClass('active');
                _self.cur = idx;
                box.removeClass('busy');
            }, 700);
        }, 0);
    };

    return Banner;
}(jQuery));