(function($, window) {
    "use strict";
    window.zoMasonry = window.zoMasonry || {};
    $(document).ready(function() {
        var loading = $('<div>', {
            class: 'pageload-overlay'
        });
        $('body').append(loading);
        $('.zo-masonry').each(function() {
            var grid = $(this);
            var uuid = $(this).closest('.zo-masonry-wrapper').attr('id');
            var shuffle = grid.data('shuffle');
            var view = $(this).attr('id');
            grid.find('.zo-masonry-item').addClass('x').resizable({
                start: function() {
                    grid.data('resize', false);
                    window.zoMasonry.resize = false;
                },
                resize: function() {
                    grid.width(grid.width() + 12);
                    grid.shuffle('update');
                    grid.width('auto');
                    grid.data('resize', true);
                },
                stop: function(event, ui) {
                    $('body').addClass('zoMasonry-loading');
                    var w = Math.round(ui.size.width + window.zoMasonry[uuid].margin) / (window.zoMasonry[uuid].margin+window.zoMasonry[uuid].itemWidth);
                    var h = Math.round(ui.size.height + window.zoMasonry[uuid].margin) / (window.zoMasonry[uuid].margin+window.zoMasonry[uuid].itemHeight);
                    var pid = $(ui.element).data('id');
                    var item = $(ui.element).data('index');
                    $(this).data({
                        gridWidth: w,
                        gridHeight: h
                    });
                    $.ajax({
                        method: 'post',
                        url: zo_admin.ajaxurl,
                        dataType: 'json',
                        data: {
                            action: 'zo_masonry_save',
                            pid: pid,
                            id: uuid,
                            item: item,
                            width: w,
                            height: h
                        },
                        success: function(data, response) {
                            if (data.status == 200 && data.msg == 'success') {
                                $('body').removeClass('zoMasonry-loading');
                            } else {
                                $('body').removeClass('zoMasonry-loading');
                                alert('Error. Data could not be save.')
                            }
                        }
                    })
                }
            });
            $(grid).on('layout.shuffle', function() {
                $(grid).find('.zo-masonry-item').resizable('option', {
                    grid: [window.zoMasonry[uuid].itemWidth + window.zoMasonry[uuid].margin, window.zoMasonry[uuid].itemHeight + window.zoMasonry[uuid].margin],
                    maxWidth: grid.width() + 10
                });
            });
        });
    });
})(jQuery, window);
