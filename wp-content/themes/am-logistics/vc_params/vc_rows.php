<?php
/**
 * Add row params
 *
 * @author CmsTheme
 * @since 1.0.0
 */
vc_remove_param("vc_row", 'gap');

vc_add_param('vc_row', array(
	'type' => 'dropdown',
	'heading' => __("Overlay Color", 'am-logistics'),
	'param_name' => 'overlay_row',
	'value' => array(
		'No' => '',
		'Yes' => 'yes'
	),
	'group' => 'Design Options'
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __('Color', 'am-logistics'),
	"param_name" => "row_overlay_color",
	'group' => 'Design Options',
	"dependency" => array(
		"element" => "overlay_row",
		"value" => array(
			"yes"
		)
	),
	"description" => ''
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Animation", 'am-logistics'),
	"admin_label" => true,
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"bounce" => "bounce",
		"flash" => "flash",
		"pulse" => "pulse",
		"rubberBand" => "rubberBand",
		"shake" => "shake",
		"swing" => "swing",
		"tada" => "tada",
		"wobble" => "wobble",
		"jello" => "jello",
		"bounceIn" => "bounceIn",
		"bounceInDown" => "bounceInDown",
		"bounceInLeft" => "bounceInLeft",
		"bounceInRight" => "bounceInRight",
		"bounceInUp" => "bounceInUp",
		"fadeIn" => "fadeIn",
		"fadeInDown" => "fadeInDown",
		"fadeInDownBig" => "fadeInDownBig",
		"fadeInLeft" => "fadeInLeft",
		"fadeInLeftBig" => "fadeInLeftBig",
		"fadeInRight" => "fadeInRight",
		"fadeInRightBig" => "fadeInRightBig",
		"fadeInUp" => "fadeInUp",
		"fadeInUpBig" => "fadeInUpBig",
		"flip" => "flip",
		"flipInX" => "flipInX",
		"flipInY" => "flipInY",
		"lightSpeedIn" => "lightSpeedIn",
		"lightSpeedOut" => "lightSpeedOut",
		"rotateIn" => "rotateIn",
		"rotateInDownLeft" => "rotateInDownLeft",
		"rotateInDownRight" => "rotateInDownRight",
		"rotateInUpLeft" => "rotateInUpLeft",
		"rotateInUpRight" => "rotateInUpRight",
		"slideInUp" => "slideInUp",
		"slideInDown" => "slideInDown",
		"slideInLeft" => "slideInLeft",
		"slideInRight" => "slideInRight",
		"zoomIn" => "zoomIn",
		"zoomInDown" => "zoomInDown",
		"zoomInLeft" => "zoomInLeft",
		"zoomInRight" => "zoomInRight",
		"zoomInUp" => "zoomInUp",
		"rollIn" => "rollIn",
	),
	'description' => esc_html__('View animation effect at https://daneden.github.io/animate.css/', 'am-logistics')
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__('Animation Delay', 'am-logistics'),
	"param_name" => "animation_delay",
	"value" => "0",
	"dependency" => array(
		"element" => "animation",
		"not_empty" => true,
	),
	"description" => esc_html__('Delay before the animation starts. Ex: 200ms, 0.5s, 1s...', 'am-logistics')
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Background Position", 'am-logistics'),
	"param_name" => "background_position",
	"value" => array(
		"Theme Default" => "",
		"Left Top" => "left top",
		"Left Center" => "left center",
		"Left Bottom" => "left bottom",
		"Right Top" => "right top",
		"Right Center" => "right center",
		"Right Bottom" => "right bottom",
		"Center Top" => "center top",
		"Center Center" => "center center",
		"Center Bottom" => "center bottom"
	),
	"group" => 'Design Options',
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Background Attachment", 'am-logistics'),
	"admin_label" => true,
	"param_name" => "background_attachment",
	"value" => array(
		"Theme Default" => "",
		"Scroll" => "scroll",
		"Fixed" => "fixed",
		"Local" => "local"
	),
	"group" => 'Design Options',
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Row Margin Responsive", 'am-logistics'),
	"admin_label" => true,
	"param_name" => "row_margin",
	"value" => array(
		"Default" => "",
		"Style 01" => "zo-vc-row-margin-01",
		"Style 02" => "zo-vc-row-margin-02",
		"Style 03" => "zo-vc-row-margin-03",
	),
	"group" => 'Design Options',
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Row Padding Responsive", 'am-logistics'),
	"admin_label" => true,
	"param_name" => "row_padding",
	"value" => array(
		"Default" => "",
		"Style 01" => "zo-vc-row-padding-01",
		"Style 02" => "zo-vc-row-padding-02",
		"Style 03" => "zo-vc-row-padding-03",
	),
	"group" => 'Design Options',
));
