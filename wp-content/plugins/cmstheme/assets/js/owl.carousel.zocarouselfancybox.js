(function ($) {
    "use strict";
	/**
     * Carousel FancyBox
	 *
     */
    $(document).ready(function () {
        $(".zo-carousel-fancyboxes-body").each(function () {
            var $this = $(this), slide_id = $this.attr('id'), slider_settings = zoCarouselFancyBox[slide_id];
            $this.addClass('owl-carousel owl-theme');
            $this.owlCarousel(slider_settings);
        });
    });
})(jQuery);