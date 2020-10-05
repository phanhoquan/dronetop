<?php
vc_map(
	array(
		"name" => __("ZO Particles", 'cmstheme'),
	    "base" => "zo_particles",
	    "class" => "vc-zo-particles",
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
			    "type" => "dropdown",
			    "heading" => __("Particles Type",'cmstheme'),
			    "param_name" => "particles_type",
				"value" => array(
					"Default" => "default",
					"Nasa" => "nasa",
					"Bubble" => "bubble",
					"Snow" => "snow",
				),
				'std' => 'Default',
			    "group" => __("Genaral", 'cmstheme'),
			    "description" => __('Select Particles type', 'cmstheme'),
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Height",'cmstheme'),
			    "param_name" => "height",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-8 vc_column",
			    "description" => __('Enter height for particles, ex: 100.', 'cmstheme')
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Unit height",'cmstheme'),
			    "param_name" => "unit_height",
				"edit_field_class" => "vc_col-sm-4 vc_column",
				"value" => array(
					"0" => "",
					"px" => "px",
					"%" => "%"
				),
				'std' => '',
			    "group" => __("Genaral", 'cmstheme'),
			    "description" => __('Enter Unit px or %.', 'cmstheme')
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Number Dot",'cmstheme'),
			    "param_name" => "number_dot",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
			    "description" => __('Enter the number of dot you want to show, ex: 50.', 'cmstheme'),
                'std' => '50',
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Size of Dot",'cmstheme'),
			    "param_name" => "size_dot",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
			    "description" => __('Enter the size of dot you want to show, ex: 2.', 'cmstheme'),
                'std' => '1',
		    ),
		    array(
			    "type" => "colorpicker",
			    "heading" => __("Dot Color",'cmstheme'),
			    "param_name" => "dot_color",
				"std"  => "#FFFFFF",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Line Distance",'cmstheme'),
			    "param_name" => "line_distance",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
			    "description" => __('Enter the number of line distance you want to show, ex: 50.', 'cmstheme'),
                'std' => '100',
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Size of Line",'cmstheme'),
			    "param_name" => "line_size",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
			    "description" => __('Enter the size of line you want to show, ex: 1.', 'cmstheme'),
                'std' => '0',
		    ),
		    array(
			    "type" => "colorpicker",
			    "heading" => __("Line Color",'cmstheme'),
			    "param_name" => "line_color",
				"std"  => "#FFFFFF",
			    "group" => __("Genaral", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-4 vc_column",
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Move Direction",'cmstheme'),
			    "param_name" => "move_direction",
				"edit_field_class" => "vc_col-sm-6 vc_column",
				"value" => array(
					"None" => "none",
					"Top" => "top",
					"Top Right" => "top-right",
					"Right" => "right",
					"Right Bottom" => "right-bottom",
					"Bottom" => "bottom",
					"Bottom Left" => "bottom-left",
					"Left" => "left",
					"Left Top" => "left-top",
				),
				'std' => 'None',
			    "group" => __("Action", 'cmstheme'),
			    "description" => __('Select move direction mode', 'cmstheme'),
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Move Speed",'cmstheme'),
			    "param_name" => "move_speed",
			    "group" => __("Action", 'cmstheme'),
				"edit_field_class" => "vc_col-sm-6 vc_column",
			    "description" => __('Enter the number of speed, ex: 1; 2;... 10', 'cmstheme'),
                'std' => '5',
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Hover mode",'cmstheme'),
			    "param_name" => "onhover_mode",
				"edit_field_class" => "vc_col-sm-6 vc_column",
				"value" => array(
					"None" => "none",
					"Grab" => "grab",
					"Bubble" => "bubble",
					"Repulse" => "repulse",
				),
				'std' => 'Repulse',
			    "group" => __("Action", 'cmstheme'),
			    "description" => __('Select hover mode', 'cmstheme'),
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Click mode",'cmstheme'),
			    "param_name" => "onclick_mode",
				"edit_field_class" => "vc_col-sm-6 vc_column",
				"value" => array(
					"None" => "none",
					"Push" => "push",
					"Remove" => "remove",
					"Bubble" => "bubble",
					"Repulse" => "repulse",
				),
				'std' => 'Push',
			    "group" => __("Action", 'cmstheme'),
			    "description" => __('Select click mode', 'cmstheme'),
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Shape type",'cmstheme'),
			    "param_name" => "shape_type",
				"value" => array(
					"Circle" => "circle",
					"Edge" => "edge",
					"Triangle" => "triangle",
					"Polygon" => "polygon",
					"Star" => "star",
				),
				'std' => 'Polygon',
			    "group" => __("Action", 'cmstheme'),
			    "description" => __('Select shape type [only for Bubble]', 'cmstheme'),
		    ),
			array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "admin_label" => true,
	            "heading" => __("Template",'cmstheme'),
	            "shortcode" => "zo_particles",
	            "group" => __("Templates", 'cmstheme'),
	        ),
	    )
	)
);

global $particles;
$particles = array();
class WPBakeryShortCode_zo_particles extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'class' => '',
			'particles_type' => 'default',
			'height' => '100%',
			'unit_height' => 'px',
			'dot_color' => '#fff',
			'number_dot' => '30',
			'size_dot' => '1',
			'line_color' => '#fff',
			'line_distance' => '100',
			'line_size' => '0',
			'onhover_mode' => 'repulse',
			'onclick_mode' => 'push',
			'move_direction' => 'none',
			'move_speed' => '5',
			'shape_type' => 'polygon',
			'zo_template' => 'zo_particles.php'
		), $atts);
		global $zo_carousel;
		$html_id = zoHtmlID('zo-particles');
         $particles[$html_id] = array(
			'id' => $html_id,
			'dot_color' => $atts['dot_color'],
			'line_color' => $atts['line_color'],
			'number_dot' => empty($atts['number_dot'])? 2: $atts['number_dot'],
			'size_dot' => empty($atts['size_dot'])? 2: $atts['size_dot'],
			'line_distance' => empty($atts['line_distance'])? 100: $atts['line_distance'],
			'line_size' => empty($atts['line_size'])? 1: $atts['line_size'],
			'onhover_mode' => empty($atts['onhover_mode'])? 'repulse' : $atts['onhover_mode'],
			'onclick_mode' => empty($atts['onclick_mode'])? 'push' : $atts['onclick_mode'],
			'move_direction' => empty($atts['move_direction'])? 'none' : $atts['move_direction'],
			'move_speed' => empty($atts['move_speed'])? '5' : $atts['move_speed'],
			'shape_type' => empty($atts['shape_type'])? 'polygon' : $atts['shape_type'],
		);
		wp_enqueue_script('particles-js', ZO_JS.'particles.js',array('jquery'),'1.0.0', true);
        if(!empty($atts['particles_type'])){
            if($atts['particles_type']=='default'){
                wp_enqueue_script('particles-tpl-js',ZO_JS.'particles-tpl.js',array('jquery'),'1.0.0', true);
                wp_localize_script('particles-tpl-js', "particles", $particles);
            }elseif($atts['particles_type']=='nasa'){
                wp_enqueue_script('particles-nasa-js',ZO_JS.'particles-nasa.js',array('jquery'),'1.0.0', true);
                wp_localize_script('particles-nasa-js', "particles", $particles);
            }elseif($atts['particles_type']=='bubble'){
                wp_enqueue_script('particles-bubble-js',ZO_JS.'particles-bubble.js',array('jquery'),'1.0.0', true);
                wp_localize_script('particles-bubble-js', "particles", $particles);
            }elseif($atts['particles_type']=='snow'){
                wp_enqueue_script('particles-snow-js',ZO_JS.'particles-snow.js',array('jquery'),'1.0.0', true);
                wp_localize_script('particles-snow-js', "particles", $particles);
            }
        }
		$atts['html_id'] = $html_id;
		$atts['template'] = 'template-' . str_replace('.php','',$atts['zo_template']);
		return parent::content($atts, $content);
	}
}
