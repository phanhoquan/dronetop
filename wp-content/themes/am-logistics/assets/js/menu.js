(function ($) {
    "use strict";
    $(document).ready(function(){

        var $menu = $('.nav-menu');
        $menu.find('ul.sub-menu > li').each(function(){
            var $submenu = $(this).find('>ul');
            if($submenu.length == 1){
                $(this).hover(function(){
                    if($submenu.offset().left + $submenu.width() > $(window).width()){
                        $submenu.addClass('back');
                    }else if($submenu.offset().left < 0){
                        $submenu.addClass('back');
                    }
                }, function(){
                    $submenu.removeClass('back');
                });
            }
        });

        /* Menu drop down*/
        $('.nav-menu li.menu-item-has-children').append('<span class="zo-menu-toggle"><i class="fa fa-angle-down"></i></span>');
        $('.zo-menu-toggle').click(function(){
			$(this).toggleClass('close');
            $(this).prev().toggleClass('submenu-open');
        });

		/**
		 * Mobile menu
		 *
		 * Show or hide mobile menu.
		 * @author ZoTheme
		 * @since 1.0.0
		 */
		$('body').on('click', '#zo-menu-mobile', function(){
			$('body').toggleClass('disable-scroll');
			$(this).toggleClass('close');
			var navigation = $(this).parent().find('.zo-header-navigation');
			navigation.toggleClass('show-menu');
		});

		$('body').on('click', '.zo-header-close', function(){
			$('body').toggleClass('disable-header-vertical');
			$(this).toggleClass('open');
			$(window).trigger('resize');
		});


		$('body').on('click', 'a.zo-collapsed-button', function(){
			$(this).toggleClass('close');
			$('.zo-collapsed-menu').toggleClass('active');
		});

    });
})(jQuery);
