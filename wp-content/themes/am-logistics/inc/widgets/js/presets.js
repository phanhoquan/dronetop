jQuery(document).ready(function ($) {
	"use strict";

	/* Body layout */
	var body_layout = $.cookie("body_layout");
	if (body_layout == '1') {
		$('body').addClass('zo-boxed').removeClass('zo-wide');
	}
	$('.layout').change(function (e) {
		var layout = $(this).val();
		if (layout == '1') {
			$('body').addClass('zo-boxed').removeClass('zo-wide');
		} else {
			$('body').addClass('zo-wide').removeClass('zo-boxed');
		}
		$.cookie('body_layout', layout, {
			expires: 1,
			path: '/'
		});
        $(window).trigger('resize');
	});
	/* Body layout */

	/* Pattern */
	var pattern_cookie = $.cookie("bg_body_layout_boxed");
	if (pattern_cookie != null) {
		$('body.zo-boxed').addClass('pattern' + pattern_cookie);
	}
	$('.pattern a').click(function (e) {
		if (pattern_cookie != null) {
			$('body.zo-boxed').removeClass('pattern' + pattern_cookie);
		}
		var pattern = $(this).attr('id');
		$(this).addClass('active').siblings().removeClass('active');
		$('body.zo-boxed').addClass('pattern' + pattern);
		$.cookie('bg_body_layout_boxed', pattern, {
			expires: 1,
			path: '/'
		});
		pattern_cookie = pattern;
	});

	$('.style-toggle').click(function () {
		if ($('#style_selector').hasClass('active')) {
			$('#style_selector').removeClass('active');
		} else {
			$('#style_selector').addClass('active');
		}
	});

    var id_tag_link = null;

    $('.predefined a').click(function(e) {

        if(id_tag_link != null){
            $('#'+id_tag_link).remove();
        }
        var preset = $(this).attr('id');
        var color = $(this).attr('data-color');
        var link = null;
		$('.style-toggle').css('background',color);

		/* Change Css */
        if(preset != '1'){
			link =  ZOPreset.theme_url + '/assets/css/presets-'+preset+'.css?ver=1.0.0';
            id_tag_link = 'presets-' + preset;
        }else{
            link =  ZOPreset.theme_url + '/assets/css/static.css?ver=1.0.0';
        }
        var $head = $("head");
        var $headlinklast = $head.find("link[rel='stylesheet']:last");
        var linkElement = "<link id='" +id_tag_link+ "' rel='stylesheet' href='" +link+ "' type='text/css' media='all'>";
        if ($headlinklast.length){
            $headlinklast.after(linkElement);
        } else {
            $head.append(linkElement);
            $('link[title=mystyle]')[0].disabled=true;
        }

		/* Set Image logo */
		//$('#zo-header-logo img').attr('src', ZOPreset.theme_url + '/inc/selector/images/logo/logo-' +preset+ '.png');


        $(this).addClass('active').siblings().removeClass('active');
    });

});
