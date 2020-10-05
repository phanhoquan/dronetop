<?php
vc_map(
	array(
		"name" => __("ZO Button", 'cmstheme'),
	    "base" => "zo_button",
	    "class" => "vc-zo-button",
		"content_element" => true,
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
            array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",'cmstheme'),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("Enter CSS class you want apply for the button",'cmstheme'),
	            "group" => __("Button Settings", 'cmstheme'),
	        ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Text",'cmstheme'),
			    "param_name" => "text",
			    "value" => "",
			    "group" => __("Button Settings", 'cmstheme'),
			    "description" => __('Text on the button', 'cmstheme')
		    ),
            array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'cmstheme' ),
				'param_name' => 'link',
				'description' => __( 'Add link to button.', 'cmstheme' ),
                "group" => __("Button Settings", 'cmstheme'),
			),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Align",'cmstheme'),
			    "param_name" => "align",
				"value" => array(
				    "Left" => "left",
				    "Center" => "center",
				    "Right" => "right",
			    ),
                'std' => 'center',
			    "group" => __("Button Settings", 'cmstheme'),
			    "description" => __('Select button alignment.', 'cmstheme'),
		    ),
            array(
			    "type" => "textfield",
			    "heading" => __("Padding Top",'cmstheme'),
			    "param_name" => "padding_top",
			    "value" => "0",
			    "group" => __("Button Settings", 'cmstheme'),
			    "description" => __('Default 10', 'cmstheme'),
                "edit_field_class" => "vc_col-sm-3 vc_column",
		    ),
            array(
			    "type" => "textfield",
			    "heading" => __("Padding Right",'cmstheme'),
			    "param_name" => "padding_right",
			    "value" => "0",
			    "group" => __("Button Settings", 'cmstheme'),
			    "description" => __('Default 20', 'cmstheme'),
                "edit_field_class" => "vc_col-sm-3 vc_column",
		    ),
            array(
			    "type" => "textfield",
			    "heading" => __("Padding Bottom",'cmstheme'),
			    "param_name" => "padding_bottom",
			    "value" => "0",
			    "group" => __("Button Settings", 'cmstheme'),
			    "description" => __('Default 10', 'cmstheme'),
                "edit_field_class" => "vc_col-sm-3 vc_column",
		    ),
            array(
			    "type" => "textfield",
			    "heading" => __("Padding Left",'cmstheme'),
			    "param_name" => "padding_left",
			    "value" => "0",
			    "group" => __("Button Settings", 'cmstheme'),
			    "description" => __('Default 20', 'cmstheme'),
                "edit_field_class" => "vc_col-sm-3 vc_column",
		    ),
            array(
			    "type" => "dropdown",
			    "heading" => __("Add Icon?",'cmstheme'),
			    "param_name" => "is_icon",
			    "value" => array(
				    "Yes" => "yes",
				    "No" => "no",
			    ),
                "edit_field_class" => "vc_col-sm-6 vc_column",
			    "group" => __("Button Settings", 'cmstheme'),
			    "description" => __('Add icon to the button', 'cmstheme'),
                'std' => 'no',
		    ),
            array(
			    "type" => "dropdown",
			    "heading" => __("Icon Align",'cmstheme'),
			    "param_name" => "icon_align",
				"value" => array(
				    "Left" => "left",
				    "Right" => "right",
			    ),
                'std' => 'left',
			    "group" => __("Button Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-6 vc_column",
                'dependency' => array(
                    'element' => 'is_icon',
                    'value' => 'yes',
                ),
		    ),
            array(
				'type' => 'dropdown',
				'heading' => __( 'Icon Type', 'cmstheme' ),
				'param_name' => 'icon_type',
                "edit_field_class" => "vc_col-sm-6 vc_column",
				'value' => array(
					__( 'Font Awesome', 'cmstheme' ) => 'fontawesome',
					__( 'Open Iconic', 'cmstheme' ) => 'openiconic',
					__( 'Typicons', 'cmstheme' ) => 'typicons',
					__( 'Entypo', 'cmstheme' ) => 'entypo',
					__( 'Linecons', 'cmstheme' ) => 'linecons',
					__( 'Material Design Icons', 'cmstheme' ) => 'materialdesignicons',
					__( 'Pixel', 'cmstheme' ) => 'pixelicons',
					__( 'P7 Stroke', 'cmstheme' ) => 'pe7stroke',
                    __( 'Et Line', 'cmstheme' ) => 'etline',
                    __( 'Linear Icons', 'cmstheme' ) => 'linearicons'
				),
                'std' => 'fontawesome',
				'description' => __( 'Select icon type.', 'cmstheme' ),
                'dependency' => array(
                    'element' => 'is_icon',
                    'value' => 'yes',
                ),
				"group" => __("Button Settings", 'cmstheme')
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
				"group" => __("Button Settings", 'cmstheme')
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
				"group" => __("Button Settings", 'cmstheme')
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
				"group" => __("Button Settings", 'cmstheme')
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
				"group" => __("Button Settings", 'cmstheme')
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
				"group" => __("Button Settings", 'cmstheme')
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
				"group" => __("Button Settings", 'cmstheme')
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
				"group" => __("Button Settings", 'cmstheme')
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
                "group" => __("Button Settings", 'cmstheme')
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
                "group" => __("Button Settings", 'cmstheme')
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon Item', 'cmstheme' ),
                'param_name' => 'icon_materialdesignicons',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'materialdesignicons',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'materialdesignicons',
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Button Settings", 'cmstheme')
            ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Color",'cmstheme'),
			    "param_name" => "button_style",
				"value" => array(
				    "Primary Button" => "primary",
				    "Secondary Button" => "secondary",
				    "Gradient Button" => "gradient",
				    "Custom Color" => "custom",
			    ),
                'std' => 'custom',
			    "group" => __("Button Style", 'cmstheme'),
			    "description" => __('Select button color [setting from theme option, or custom color].', 'cmstheme'),
		    ),
            array(
                "type" => "colorpicker",
                "heading" => __("Bacground Color",'cmstheme'),
                "param_name" => "bg_color",
                "value" => "",
                'description' => __( '', 'cmstheme' ),
                "group" => __("Button Style", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-6 vc_column",
                'dependency' => array(
                    'element' => 'button_style',
                    'value' => 'custom',
                ),
            ),
            array(
                "type" => "colorpicker",
                "heading" => __("Bacground Hover Color",'cmstheme'),
                "param_name" => "bg_hover_color",
                "value" => "",
                'description' => __( '', 'cmstheme' ),
                "group" => __("Button Style", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-6 vc_column",
                'dependency' => array(
                    'element' => 'button_style',
                    'value' => 'custom',
                ),
            ),
            array(
                "type" => "colorpicker",
                "heading" => __("Font Color",'cmstheme'),
                "param_name" => "text_color",
                "value" => "",
                'description' => __( '', 'cmstheme' ),
                "group" => __("Button Style", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-6 vc_column",
                'dependency' => array(
                    'element' => 'button_style',
                    'value' => 'custom',
                ),
            ),
            array(
                "type" => "colorpicker",
                "heading" => __("Font Hover Color",'cmstheme'),
                "param_name" => "text_hover_color",
                "value" => "",
                'description' => __( '', 'cmstheme' ),
                "group" => __("Button Style", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-6 vc_column",
                'dependency' => array(
                    'element' => 'button_style',
                    'value' => 'custom',
                ),
            ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Size",'cmstheme'),
			    "param_name" => "button_size",
				"value" => array(
				    "Tiny" => "tiny",
				    "Small" => "small",
				    "Medium" => "medium",
				    "Large" => "large",
				    "Giant" => "giant",
			    ),
                'std' => 'medium',
			    "group" => __("Button Style", 'cmstheme'),
			    "description" => __('Select button size [setting from theme option].', 'cmstheme'),
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Font Weight",'cmstheme'),
			    "param_name" => "font_weight",
				"value" => array(
				    "Unset" => "0",
				    "Book 300" => "300",
				    "Normal 400" => "400",
				    "Semi-Bold" => "600",
				    "Bold" => "700",
				    "Extra Bold" => "800",
			    ),
                'std' => '0',
			    "group" => __("Button Style", 'cmstheme'),
			    "description" => __('Select Font Weight Style', 'cmstheme'),
		    ),
            array(
	            "type" => "textfield",
	            "heading" => __("Border Radius",'cmstheme'),
	            "param_name" => "radius",
	            "value" => "0",
	            "description" => __("Enter the number of border radius [In Pixel, such as 2, 3, 4...]",'cmstheme'),
	            "group" => __("Button Style", 'cmstheme'),
	        ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Border Width",'cmstheme'),
			    "param_name" => "stroke",
				"value" => array(
				    "NONE" => "0",
				    "1 PX" => "1",
				    "2 PX" => "2",
				    "3 PX" => "3",
				    "4 PX" => "4",
				    "5 PX" => "5",
				    "6 PX" => "6",
			    ),
                'std' => '0',
			    "group" => __("Button Style", 'cmstheme'),
			    "description" => __('Select Border number', 'cmstheme'),
		    ),
            array(
                "type" => "colorpicker",
                "heading" => __("Border Color",'cmstheme'),
                "param_name" => "stroke_color",
                "value" => "",
                'description' => __( '', 'cmstheme' ),
                "group" => __("Button Style", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-6 vc_column",
            ),
            array(
                "type" => "colorpicker",
                "heading" => __("Border Hover Color",'cmstheme'),
                "param_name" => "stroke_hover_color",
                "value" => "",
                'description' => __( '', 'cmstheme' ),
                "group" => __("Button Style", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-6 vc_column",
            ),
			array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "admin_label" => true,
	            "heading" => __("Template",'cmstheme'),
	            "shortcode" => "zo_button",
	            "group" => __("Templates", 'cmstheme'),
	        ),
	    )
	)
);

class WPBakeryShortCode_zo_button extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
            'class' => '',
			'text' => 'Zo Button',
			'link' => '',
			'align'=> 'center',
            'is_icon' => 'no',
            'icon_align' => 'left',
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
            'padding_top' => '0',
			'padding_right' => '0',
            'padding_bottom' => '0',
            'padding_left' => '0',
            'button_style' => 'custom',
            'bg_color' => '',
            'bg_hover_color' => '',
            'text_color' => '',
            'text_hover_color' => '',
            'button_size' => 'medium',
            'radius' => '0',
            'stroke' => '0',
            'stroke_color' => '',
            'stroke_hover_color' => '',
            'font_weight' => '0',
			'zo_template' => 'zo_button.php'
		), $atts);
		$atts = array_merge($atts_extra,$atts);
		if($atts['icon_type']=='pe7stroke'){
	        wp_enqueue_style('zo-icon-pe7stroke', ZO_CSS. 'Pe-icon-7-stroke.css');
	    }elseif($atts['icon_type']=='etline'){
            wp_enqueue_style('zo-icon-etline', ZO_CSS. 'et-line.css');
        }elseif($atts['icon_type']=='linearicons'){
            wp_enqueue_style('zo-icon-linearicons', ZO_CSS. 'linearicons.css');
        }elseif($atts['icon_type']=='materialdesignicons'){
            wp_enqueue_style('zo-icon-materialdesignicons', ZO_CSS. 'materialdesignicons.css');
        }else{
	        vc_icon_element_fonts_enqueue( $atts['icon_type'] );
	    }
        if($atts_extra['button_style']=='custom'){
            $atts['button_style'] = 'custom';
        }else{
            $atts['button_style'] = 'btn-' . $atts_extra['button_style'];
        }
		$html_id = zoHtmlID('zo-button');
		$atts['html_id'] = $html_id;
		$atts['template'] = 'template-' . str_replace('.php','',$atts['zo_template']);
		return parent::content($atts, $content);
	}
}
