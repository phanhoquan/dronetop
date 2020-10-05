jQuery(document).ready(function($) {
	"use strict";

	/* select preset. */
	$(".redux-main").on("click", "#logistics_data-presets_color ul li", function() {
		/* get presets. */
		var presets = $(this).find('input').val();
		/* get data */
		$.post(data_presets.ajaxurl, {
			'action' : 'zo_get_preset_options',
			'preset' : presets,
		}, function(response) {
			/* set data. */
			if(response){
				zo_set_presets(response);
			}
		});
	});

	function zo_set_presets(presets) {
		"use strict";

		$.each(presets, function(key, val) {
			if(key == "main_logo") {
				/* Set Image Info */
				$('#smof_data-' + key + ' .upload').val(val.url);
				$('#smof_data-' + key + ' .upload-id').val(val.id);
				$('#smof_data-' + key + ' .upload-height').val(val.height);
				$('#smof_data-' + key + ' .upload-width').val(val.width);
				$('#smof_data-' + key + ' .upload-thumbnail').val(val.thumbnail);
				$('#smof_data-' + key + ' .screenshot img').attr('href', val.url);
				$('#smof_data-' + key + ' #image_' + key ).attr('src', val.url);

			} else if(key == 'link_color' || key =='preset_menu_color' || key =='preset_menu_child_color' || key =='gradient_color' || key =='sticky_menu_color_first_level' || key =='sticky_menu_color_sub_level' || key =='header_top_link_color' || key =='footer_link_color') {
                var regular = $('#' + key + '-regular');
                regular.val(val.regular);
                regular.trigger("change");

                var hover = $('#' + key + '-hover');
                hover.val(val.hover);
                hover.trigger("change");

                var active = $('#' + key + '-active');
                active.val(val.active);
                active.trigger("change");

            } else {
				/* Color Info */
				var item = $('#smof_data-' + key);
				var item_view = $('#smof_data-' + key + ' .sp-preview-inner');

                var color = $('#' + key + '-color');
				if(!$.isPlainObject(val)){
					color.val(val);
					color.trigger("change");
				} else {
					/* rbga. */
					if(val['rgba'] != undefined && val['rgba'] != '' && val['color'] != undefined && val['color'] != ''){
						item.find('input.redux-color-rgba').attr('value', val.color).attr('data-color', val.rgba).attr('data-current-color', val.color);
						$('input#' + key + '-color').val(val.color);
						$('input#' + key + '-rgba').val(val.rgba);
						$('input#' + key + '-alpha').val(val.alpha);
						item_view.css("background-color", val.rgba);
					} else {
						item_view.attr("style", null);
						item.find('input.redux-color-rgba').attr('value', "").attr('data-color', "").attr('data-current-color', "");
						$('input#' + key + '-color').val("");
						$('input#' + key + '-rgba').val("");
						$('input#' + key + '-alpha').val("");
					}
				}
				/* bg hex. */
				if (val['background-color'] != undefined && val['background-color'] != '') {
					color.val(val['background-color']);
					color.trigger("change");
				}
			}
		});
	}
});
