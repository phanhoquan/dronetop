(function($, window) {
    'use strict';
    window.zoMasonry = window.zoMasonry || {};
    var breakpoints = {
        lg_cols: 'all and (min-width: 1200px)',
        md_cols: 'all and (min-width: 992px) and (max-width: 1199px)',
        sm_cols: 'all and (min-width: 768px) and (max-width: 991px)',
        xs_cols: 'all and (max-width: 767px)'
    };
    window.zoMasonry.resize = true;
    window.zoMasonry.window_w = 0;
    window.zoMasonry.resizeHandle = null;

    var resizeEvent = function() {
        $('.zo-masonry').each(function() {
            var grid = $(this);
            var uuid = $(this).closest('.zo-masonry-wrapper').attr('id');
            var cols = 1;
            $.each(breakpoints, function(screen, query) {
                if (window.matchMedia(query).matches) {
                    cols = parseInt(window.zoMasonry[uuid][screen]);
                }
            });
            var colWidth = Math.round(($(grid).width() - ((cols - 1) * window.zoMasonry[uuid].margin)) / cols);
            var colHeight = Math.round(colWidth / window.zoMasonry[uuid].ratio);
            if($(this).find('.zo-masonry-sizer').length == 0){
                $(this).append($('<div class="zo-masonry-sizer"></div>'));
            }
            $(this).find('.zo-masonry-sizer').css({
                width: colWidth,
                margin: window.zoMasonry[uuid].margin
            });
            window.zoMasonry[uuid].itemWidth = colWidth;
            window.zoMasonry[uuid].itemHeight = colHeight;
            $(grid).find('.zo-masonry-item').each(function() {
                var multiplier_w = $(this).attr('class').match(/item-w(\d+)/) !== null ? $(this).attr('class').match(/item-w(\d+)/)[1] : false;
                var multiplier_h = $(this).attr('class').match(/item-h(\d+)/) !== null ? $(this).attr('class').match(/item-h(\d+)/)[1] : false;
                if (multiplier_w !== false && multiplier_h !== false) {
                    multiplier_w = multiplier_w > cols ? cols : multiplier_w;
                    multiplier_h = cols == 1 ? 1 : multiplier_h;
                    $(this).css({
                        width: Math.ceil(colWidth * multiplier_w + (multiplier_w - 1) * window.zoMasonry[uuid].margin),
                        height: colHeight * multiplier_h + (multiplier_h - 1) * window.zoMasonry[uuid].margin
                    });
                } else {
                    $(this).width(Math.ceil(colWidth));
                }
                $(this).css({
                    marginBottom: window.zoMasonry[uuid].margin
                });
            });
            $(grid).width($(grid).width() + 12);
            $(grid).shuffle('update').on('update', function() {
                $(this).shuffle('update');
            });
            $(grid).width('auto');
        });
    };

    $(document).ready(function() {
        $('.zo-masonry-wrapper').each(function() {
            var grid = $(this).find('.zo-masonry');
            var filter = $(this).find('.zo-masonry-filter');
            var sizer = $(this).find('.zo-masonry-sizer');
            if (sizer.length == 0) {
                sizer = $('<div class="zo-masonry-sizer"></div>').appendTo(grid);
            }
            grid.shuffle({
                itemSelector: '.zo-masonry-item',
                sizer: sizer,
                speed: 500
            });
            filter.find('a').each(function() {
                $(this).click(function(e) {
                    e.preventDefault();
                    filter.find('a').removeClass('active');
                    $(this).addClass('active');
                    var filter_by = $(this).data('group');
                    grid.shuffle('shuffle', function($el, shuffle) {
                        return $.inArray(filter_by, $el.data('groups')) !== -1;
                    });
                });
            });
        });
        resizeEvent();
        $(window).on('load resize', function(e) {
            if ($(window).width() == window.zoMasonry.window_w)
                return false;
            window.zoMasonry.window_w = $(window).width();
            /* Disable update when resize */
            clearTimeout(window.zoMasonry.resizeHandle);
            window.zoMasonry.resizeHandle = setTimeout(function() {
                resizeEvent();
            }, 500);
        });
    });
})(jQuery, window);
