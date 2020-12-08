(function ($) {
    $(document).ready(function () {
        $('.zo-grid-masonry').each(function () {
            var $this = $(this),
                $filter = $this.parent().find('.zo-grid-filter'),
                $sizer = $this.find('.shuffle__sizer');
            $this.imagesLoaded(function () {
                $this.shuffle({
                    itemSelector: '.zo-grid-item',
                    sizer: $sizer
                });
            });
            if ($filter) {
                $filter.find('a').click(function (e) {
                    e.preventDefault();
                    // set active class
                    $filter.find('a').removeClass('active');
                    $(this).addClass('active');
                    console.log(231);
                    
                    // get group name from clicked item
                    var groupName = $(this).attr('data-group');
                    console.log(groupName);
                    
                    // reshuffle grid
                    $(this).parent().closest('#zo-grid').find('.zo-grid-masonry').shuffle('shuffle', groupName);
                });
            }
        });
    });
})(jQuery);