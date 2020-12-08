<?php
vc_map(
	array(
		"name" => __("ZO Countdown", 'cmstheme'),
	    "base" => "zo_countdown",
	    "class" => "vc-zo-countdown",
		"content_element" => true,
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
		    array(
			    "type" => "textfield",
			    "heading" => __("Extra Class",'cmstheme'),
			    "param_name" => "class",
			    "group" => __("Genaral", 'cmstheme'),
			    "description" => __('Enter the extra class', 'cmstheme'),
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Day",'cmstheme'),
			    "param_name" => "day",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
			    "description" => __('Enter the Day', 'cmstheme'),
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Month",'cmstheme'),
			    "param_name" => "month",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
			    "description" => __('Enter the month', 'cmstheme')
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Year",'cmstheme'),
			    "param_name" => "year",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
			    "description" => __('Enter the Year', 'cmstheme')
		    ),
		    array(
			    "type" => "colorpicker",
			    "heading" => __("Time Color",'cmstheme'),
			    "param_name" => "time_color",
				"std"  => "",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-6 vc_column",
		    ),
		    array(
			    "type" => "colorpicker",
			    "heading" => __("Label Color",'cmstheme'),
			    "param_name" => "label_color",
				"std"  => "",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-6 vc_column",
		    ),
			array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "admin_label" => true,
	            "heading" => __("Template",'cmstheme'),
	            "shortcode" => "zo_countdown",
	            "group" => __("Template", 'cmstheme'),
	        ),
	    )
	)
);

global $countdown;
$countdown = array();
class WPBakeryShortCode_zo_countdown extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'class' => '',
			'day' => '31',
			'month' => '12',
			'year' => '2020',
			'time_color' => '',
			'label_color' => '',
			'zo_template' => 'zo_countdown.php'
		), $atts);
		$html_id = zoHtmlID('zo-countdown');
		wp_enqueue_script('zo-countdown');
		$atts['html_id'] = $html_id;
		$atts['template'] = 'template-' . str_replace('.php','',$atts['zo_template']);
		return parent::content($atts, $content);
	}
}
