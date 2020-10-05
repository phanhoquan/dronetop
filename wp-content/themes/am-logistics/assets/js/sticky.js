(function($){
	'use strict';
	$('.header-sticky').each(function(){
        var $this = $(this);
        var $stick_wrapper = $('<div>').addClass('sticky-wrapper');
        $this.wrap($stick_wrapper);
        $this.affix({
          offset: {
            top: function () {
              var $return = $this.parent().offset().top - parseInt($('html').css('marginTop')) + 1;
              $('.header-sticky.affix').not($this).each(function () {
                if (($(this).hasClass('unsticky-mobile') && $(window).width() < 992) === false) {
                  $return = $return - $(this).parent().height();
                }
              });
              return $return;
            }
          }
        });
        $this.parent().height($this.height());
        $this.on('affixed.bs.affix', function () {
          $this.parent().height($this.height());
          $this.css({
            top: function () {
              var $return = parseInt($('html').css('marginTop'));
              $('.header-sticky.affix').not($this).each(function () {
                if (($(this).hasClass('unsticky-mobile') && $(window).width() < 992) === false) {
                  $return = $return + $(this).parent().height();
                }
              });
              return $return;
            }
          });
        });
        setTimeout(function () {
          if ($this.hasClass('affix')) {
            $this.trigger('affixed.bs.affix');
          }
        }, 1000);
	});
})(jQuery);
