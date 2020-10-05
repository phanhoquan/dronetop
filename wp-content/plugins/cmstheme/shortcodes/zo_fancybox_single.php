<?php
vc_map(
	array(
		"name" => __("Zo Single Fancy Box", 'cmstheme'),
	    "base" => "zo_fancybox_single",
	    "class" => "vc-zo-fancy-boxes",
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
	        /* Start Icon */
	        array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",'cmstheme'),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("General Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'dropdown',
				'heading' => __( 'Icon Type', 'cmstheme' ),
                "edit_field_class" => "vc_col-sm-6 vc_column",
				'value' => array(
					__( 'Font Awesome', 'cmstheme' ) => 'fontawesome',
					__( 'Open Iconic', 'cmstheme' ) => 'openiconic',
					__( 'Typicons', 'cmstheme' ) => 'typicons',
					__( 'Entypo', 'cmstheme' ) => 'entypo',
					__( 'Linecons', 'cmstheme' ) => 'linecons',
					__( 'Pixel', 'cmstheme' ) => 'pixelicons',
					__( 'P7 Stroke', 'cmstheme' ) => 'pe7stroke',
                    __( 'Et Line', 'cmstheme' ) => 'etline',
                    __( 'Linear Icons', 'cmstheme' ) => 'linearicons',
                    __( 'Material Design Icons', 'cmstheme' ) => 'materialdesignicons',
                    __( 'Themify', 'cmstheme' ) => 'themify',
                    __( 'Upload Icon/Image', 'cmstheme' ) => 'upload'
				),
                'std' => 'fontawesome',
				'param_name' => 'icon_type',
				'description' => __( 'Select icon type.', 'cmstheme' ),
				"group" => __("General Settings", 'cmstheme')
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
                "group" => __("General Settings", 'cmstheme')
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
                "group" => __("General Settings", 'cmstheme')
            ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Icon Align",'cmstheme'),
	            "param_name" => "icon_align",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
	            "description" => __("Select Align type",'cmstheme'),
                "group" => __("General Settings", 'cmstheme'),
                'std' => 'left',
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
				"group" => __("General Settings", 'cmstheme')
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
				"group" => __("General Settings", 'cmstheme')
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
				"group" => __("General Settings", 'cmstheme')
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
				"group" => __("General Settings", 'cmstheme')
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
				"group" => __("General Settings", 'cmstheme')
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
				"group" => __("General Settings", 'cmstheme')
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
				"group" => __("General Settings", 'cmstheme')
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
                "group" => __("General Settings", 'cmstheme')
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
                "group" => __("General Settings", 'cmstheme')
            ),
            array(
	            "type" => "textfield",
	            "heading" => __("Icon Font Size",'cmstheme'),
	            "param_name" => "icon_font_size",
	            "description" => __("Select Font size for Icon (Number of Picxel: 10, 20, 30,...)",'cmstheme'),
                "group" => __("General Settings", 'cmstheme'),
                'value' => '50',
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => array('linearicons','etline','themify','openiconic','typicons','linecons','pixelicons','pe7stroke','fontawesome','materialdesignicons'),
                ),
	        ),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item",'cmstheme'),
	            "param_name" => "image",
	            "group" => __("General Settings", 'cmstheme'),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'upload',
                ),
                'description' => __( 'Upload your icon or image', 'cmstheme' ),
                "group" => __("General Settings", 'cmstheme')
	        ),
            array(
                "type" => "dropdown",
                "heading" => __("Image size",'cmstheme'),
                "param_name" => "image_size",
                "value" => array(
                        "Small" => "thumbnail",
                        "Medium" => "medium",
                        "Large" => "large",
                        "Full" => "full",
                        "Custom size" => "custom",
                ),
                "std" => "full",
                "description" => __("Select the Image size you want to re-size",'cmstheme'),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'upload',
                ),
                "group" => __("General Settings", 'cmstheme')
            ),
            array(
	            "type" => "textfield",
	            "heading" => __("Image Width",'cmstheme'),
	            "param_name" => "image_width",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => "200",
	            "description" => __("Input image width",'cmstheme'),
                "dependency" => array(
	            	"element" => "image_size",
	            	"value" => "custom"
                ),
                "group" => __("General Settings", 'cmstheme')
	        ),
            array(
	            "type" => "textfield",
	            "heading" => __("Image Height",'cmstheme'),
	            "param_name" => "image_height",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => "200",
	            "description" => __("Input image height",'cmstheme'),
                "dependency" => array(
	            	"element" => "image_size",
	            	"value" => "custom"
                ),
                "group" => __("General Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item",'cmstheme'),
	            "param_name" => "title_item",
	            "value" => "",
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("General Settings", 'cmstheme')
	        ),
            array(
                "type" => "dropdown",
                "heading" => __("Title Element",'cmstheme'),
                "param_name" => "title_element",
                "edit_field_class" => "vc_col-sm-6 vc_column",
                "value" => array(
                        "H2" => "h2",
                        "H3" => "h3",
                        "H4" => "h4",
                        "H5" => "h5",
                        "H6" => "h6"
                ),
                "std" => "h3",
                "group" => __("General Settings", 'cmstheme'),
                "description" => __("Select element tag",'cmstheme'),
            ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Title Align",'cmstheme'),
	            "param_name" => "title_align",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
	            "description" => __("Select Align type",'cmstheme'),
                "group" => __("General Settings", 'cmstheme'),
                'std' => 'left',
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item",'cmstheme'),
	            "param_name" => "content_item",
	            "group" => __("General Settings", 'cmstheme')
	        ),
			array(
	            "type" => "dropdown",
	            "heading" => __("Content Align",'cmstheme'),
	            "param_name" => "content_align",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
	            "description" => __("Select Align type",'cmstheme'),
                "group" => __("General Settings", 'cmstheme'),
                'std' => 'left',
	        ),
	        /* End Items */
            array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'cmstheme' ),
				'param_name' => 'link',
				'description' => __( 'Select or Input the URL', 'cmstheme' ),
                "group" => __("Link Settings", 'cmstheme'),
			),
            array(
	            "type" => "dropdown",
	            "heading" => __("Link in Icon",'cmstheme'),
	            "param_name" => "link_icon",
                "edit_field_class" => "vc_col-sm-4 vc_column",
	            "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                    ),
                "group" => __("Link Settings", 'cmstheme'),
                'std' => 'no',
	        ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Link in Title",'cmstheme'),
	            "param_name" => "link_title",
                "edit_field_class" => "vc_col-sm-4 vc_column",
	            "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                    ),
                "group" => __("Link Settings", 'cmstheme'),
                'std' => 'no',
	        ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Link in Content",'cmstheme'),
	            "param_name" => "link_content",
                "edit_field_class" => "vc_col-sm-4 vc_column",
	            "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                    ),
                "group" => __("Link Settings", 'cmstheme'),
                'std' => 'no',
	        ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Link Align",'cmstheme'),
	            "param_name" => "link_align",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
	            "description" => __("Select align content link",'cmstheme'),
                "group" => __("Link Settings", 'cmstheme'),
                'std' => 'left',
                'dependency' => array(
                    'element' => 'link_content',
                    'value' => 'yes',
                ),
	        ),
            array(
	            "type" => "textfield",
	            "heading" => __("Extra Class Link",'cmstheme'),
	            "param_name" => "link_class",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => "",
	            "description" => __("Set class style for content link",'cmstheme'),
	            "group" => __("Link Settings", 'cmstheme'),
                "dependency" => array(
	            	"element" => "link_content",
	            	"value" => "yes"
                ),
	        ),
	    	array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",'cmstheme'),
	            "shortcode" => "zo_fancybox_single",
	            "group" => __("Template", 'cmstheme'),
	        )
		)
	)
);
class WPBakeryShortCode_zo_fancybox_single extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'class' => '',
			'icon_type' => 'fontawesome',
            'icon_align' => 'left',
			'icon_fontawesome' => '',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypoicons' => '',
			'icon_linecons' => '',
			'icon_entypo' => '',
			'icon_pe7stroke' => '',
            'icon_etline' => '',
            'icon_linearicons' => '',
            'icon_font_size' => '50',
            'image' => '',
            'image_size' => 'none',
            'image_width' => '200',
            'image_height' => '200',
            'title_item' => '',
            'title_element' => 'h3',
            'title_align' => 'left',
			'content_item' => '',
			'content_align' => 'left',
			'link' => '',
            'link_icon' => 'no',
            'link_title' => 'no',
            'link_content' => 'no',
            'link_class' =>'',
            'link_align' =>'left',
			'zo_template' => 'zo_fancybox_single.php'
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
        }elseif($atts['icon_type']=='themify'){
            wp_enqueue_style('zo-icon-themify', ZO_CSS. 'themify-icons.css');
        }else{
	        vc_icon_element_fonts_enqueue( $atts['icon_type'] );
	    }
        $atts['template'] = 'template-'.str_replace('.php','',$atts['zo_template']) . ' ' . $atts['class'];
        $html_id = zoHtmlID('zo-fancybox-single');
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}
