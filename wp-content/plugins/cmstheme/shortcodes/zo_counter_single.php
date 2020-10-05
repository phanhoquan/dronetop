<?php 
vc_map(
	array(
		"name" => __("ZO Single Counter", 'cmstheme'),
	    "base" => "zo_counter_single",
	    "class" => "vc-zo-counter",
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
	        /* Counters */
            array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",'cmstheme'),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counter Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title",'cmstheme'),
	            "param_name" => "title",
	            "value" => "",
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Counter Settings", 'cmstheme'),
	        ),
            array(
                "type" => "dropdown",
                "heading" => __("Title tag",'cmstheme'),
                "param_name" => "element",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value" => array(
                        "H1" => "h1",
                        "H2" => "h2",
                        "H3" => "h3",
                        "H4" => "h4",
                        "H5" => "h5",
                        "H6" => "h6"
                ),
                "std" => "h2",
                "description" => __('Select element tag.', 'cmstheme'),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Align",'cmstheme'),
	            "param_name" => "align",
                "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
	            "description" => __("Select title align.",'cmstheme'),
                "group" => __("Counter Settings", 'cmstheme'),
                'std' => 'center',
	        ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Font size",'cmstheme'),
			    "param_name" => "font_size",
			    "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "description" => __('Enter font size.', 'cmstheme')
		    ),
            array(
			    "type" => "textfield",
			    "heading" => __("Line height",'cmstheme'),
			    "param_name" => "line_height",
			    "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "description" => __('Enter line height.', 'cmstheme')
		    ),
            /* Start Icon */
            array(
                'type' => 'dropdown',
                'heading' => __( 'Icon libraries', 'cmstheme' ),
                'value' => array(
                    __( 'Font Awesome', 'cmstheme' ) => 'fontawesome',
                    __( 'Open Iconic', 'cmstheme' ) => 'openiconic',
                    __( 'Typicons', 'cmstheme' ) => 'typicons',
                    __( 'Entypo', 'cmstheme' ) => 'entypo',
                    __( 'Linecons', 'cmstheme' ) => 'linecons',
                    __( 'Pixel', 'cmstheme' ) => 'pixelicons',
                    __( 'P7 Stroke', 'cmstheme' ) => 'pe7stroke',
                    __( 'Et Line', 'cmstheme' ) => 'etline',
                    __( 'Themify', 'cmstheme' ) => 'themify',
                    __( 'Linear Icons', 'cmstheme' ) => 'linearicons'
                ),
                'std' => 'fontawesome',
                'param_name' => 'icon_type',
                'description' => __( 'Select icon library.', 'js_composer' ),
                "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_themify',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'themify',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'themify',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme')
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_fontawesome',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'fontawesome',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_openiconic',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'openiconic',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'openiconic',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_typicons',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'typicons',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'typicons',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_entypo',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'entypo',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'entypo',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_linecons',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'linecons',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'linecons',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_pixelicons',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'pixelicons',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'pixelicons',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_pe7stroke',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'pe7stroke',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'pe7stroke',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_etline',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'etline',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'etline',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_linearicons',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'linearicons',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'linearicons',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Counter Settings", 'cmstheme'),
            ),
            /* End Icon */
            array(
                "type" => "textfield",
                "heading" => __("Prefix",'cmstheme'),
                "param_name" => "prefix",
                "value" => "",
                "description" => __("",'cmstheme'),
                "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Counter Number",'cmstheme'),
	            "param_name" => "digit",
	            "value" => "69",
	            "description" => __("Enter number of counter (Integer: 1,2,3..)",'cmstheme'),
	            "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix",'cmstheme'),
	            "param_name" => "suffix",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
	        ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Decimal format",'cmstheme'),
	            "param_name" => "grouping",
	            "std" => "false",
	            "value" => array(
                    "True" => "true",
                    "False" => "false"
				),
	            "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Separator",'cmstheme'),
	            "param_name" => "separator",
	            "std" => ",",
	            "value" => array(
                    "Separator with ( , )" => ",",
                    "Separator with ( . )" => "."
				),
	            'dependency' => array(
	            	"element" => "grouping",
	            	"value" => "true"
	            	),
	            "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Start count type",'cmstheme'),
	            "param_name" => "type",
	            "value" => array(
	            	"Zero",
	            	"Random"
                ),
	            "group" => __("Counter Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
	        ),
            array(
                "type" => "textarea",
                "heading" => __("Content",'cmstheme'),
                "param_name" => "counter_content",
                "value" => "",
                "description" => __("",'cmstheme'),
                "group" => __("Counter Settings", 'cmstheme')
            ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Content Align",'cmstheme'),
	            "param_name" => "content_align",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
	            "description" => __("Select content align.",'cmstheme'),
                "group" => __("Counter Settings", 'cmstheme'),
                'std' => 'center',
	        ),
	        /* End Counters */
	    	array(
	            "type" => "zo_template",
	            "heading" => __("Shortcode Template",'cmstheme'),
	            "param_name" => "zo_template",
	            "shortcode" => "zo_counter_single",
	            "admin_label" => true,
	            "group" => __("Template", 'cmstheme'),
	        )
		)
	)
);
class WPBakeryShortCode_zo_counter_single extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'counter_content' => '',
			'grouping' => 'false',
			'separator' => ',',
			'content_align' => 'center',
            'icon_type' => 'fontawesome',
            'icon_fontawesome' => '',
            'icon_openiconic' => '',
            'icon_typicons' => '',
            'icon_entypoicons' => '',
            'icon_linecons' => '',
            'icon_entypo' => '',
            'icon_pe7stroke' => '',
            'icon_etline' => '',
            'icon_linearicons' => '',
			'class' => '',
            'element' => 'h2',
            'align' => 'center',
            'font_size' => '',
            'line_height' => '',
			'zo_template' => 'zo_counter_single.php'
		), $atts);
		$atts = array_merge($atts_extra,$atts);
		wp_register_script('counter', ZO_JS. 'counter.min.js', array('jquery'),'1.0.0',true);
		wp_register_script('counter-zo', ZO_JS. 'counter.zo.js', array('counter','waypoints'),'1.0.0',true);
		wp_enqueue_script('counter-zo');
        $html_id = zoHtmlID('zo-counter');

        if($atts['icon_type']=='pe7stroke'){
            wp_enqueue_style('zo-icon-pe7stroke', ZO_CSS. 'Pe-icon-7-stroke.css');
        }elseif($atts['icon_type']=='etline'){
            wp_enqueue_style('zo-icon-etline', ZO_CSS. 'et-line.css');
        }elseif($atts['icon_type']=='linearicons'){
            wp_enqueue_style('zo-icon-linearicons', ZO_CSS. 'linearicons.css');
        }elseif($atts['icon_type']=='themify'){
            wp_enqueue_style('zo-icon-themify', ZO_CSS. 'themify-icons.css');
        }else{
            vc_icon_element_fonts_enqueue( $atts['icon_type'] );
        }

        $atts['template'] = 'template-'.str_replace('.php','',$atts['zo_template']). ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}
