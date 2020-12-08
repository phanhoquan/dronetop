<?php
vc_map(
	array(
		"name" => __("Zo Heading", 'cmstheme'),
	    "base" => "zo_heading",
	    "class" => "zo-heading",
		"content_element" => true,
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
            array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",'cmstheme'),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Heading Settings", 'cmstheme')
	        ),
		    array(
			    "type" => "textarea",
			    "heading" => __("Text",'cmstheme'),
			    "param_name" => "text",
			    "value" => "",
			    "group" => __("Heading Settings", 'cmstheme'),
			    "description" => __('Text of Heading.', 'cmstheme')
		    ),
            array(
                "type" => "dropdown",
                "heading" => __("Element tag",'cmstheme'),
                "param_name" => "element",
                "edit_field_class" => "vc_col-sm-2 vc_column",
                "value" => array(
                        "H1" => "h1",
                        "H2" => "h2",
                        "H3" => "h3",
                        "H4" => "h4",
                        "H5" => "h5",
                        "H6" => "h6"
                ),
                "std" => "h2",
                "group" => __("Heading Settings", 'cmstheme'),
            ),
            array(
                "type" => "colorpicker",
                "heading" => __("Color",'cmstheme'),
                "param_name" => "heading_color",
                "value" => "",
                'description' => __( '', 'cmstheme' ),
                "group" => __("Heading Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
            ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Align",'cmstheme'),
	            "param_name" => "align",
                "edit_field_class" => "vc_col-sm-2 vc_column",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
                "group" => __("Heading Settings", 'cmstheme'),
                'std' => 'left',
	        ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Font size",'cmstheme'),
			    "param_name" => "font_size",
			    "group" => __("Heading Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-2 vc_column",
		    ),
            array(
			    "type" => "textfield",
			    "heading" => __("Line height",'cmstheme'),
			    "param_name" => "line_height",
			    "group" => __("Heading Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-2 vc_column",
		    ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Add Sub heading?",'cmstheme'),
	            "param_name" => "is_sub",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                    ),
                "group" => __("Heading Settings", 'cmstheme'),
                'std' => 'no',
	        ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Position",'cmstheme'),
	            "param_name" => "sub_position",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Above" => "above",
                    "Bellow" => "bellow",
                    ),
                "group" => __("Heading Settings", 'cmstheme'),
                'std' => 'bellow',
                'dependency' => array(
                    'element' => 'is_sub',
                    'value' => 'yes',
                ),
	        ),
            array(
			    "type" => "textarea",
			    "heading" => __("Sub Text",'cmstheme'),
			    "param_name" => "sub_text",
			    "value" => "",
			    "group" => __("Heading Settings", 'cmstheme'),
			    "description" => __('Text of Sub Heading.', 'cmstheme'),
                'dependency' => array(
                    'element' => 'is_sub',
                    'value' => 'yes',
                ),
		    ),
            array(
                "type" => "dropdown",
                "heading" => __("Element tag",'cmstheme'),
                "param_name" => "sub_element",
                "edit_field_class" => "vc_col-sm-2 vc_column",
                "value" => array(
                        "H1" => "h1",
                        "H2" => "h2",
                        "H3" => "h3",
                        "H4" => "h4",
                        "H5" => "h5",
                        "H6" => "h6",
                        "DIV" => "div",
                        "P" => "p"
                ),
                "std" => "h2",
                "description" => __('Select element tag.', 'cmstheme'),
                "group" => __("Heading Settings", 'cmstheme'),
                'dependency' => array(
                    'element' => 'is_sub',
                    'value' => 'yes',
                ),
            ),
            array(
                "type" => "colorpicker",
                "heading" => __("Color",'cmstheme'),
                "param_name" => "sub_color",
                "value" => "",
                'description' => __( '', 'cmstheme' ),
                "group" => __("Heading Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-4 vc_column",
                'dependency' => array(
                    'element' => 'is_sub',
                    'value' => 'yes',
                ),
            ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Align",'cmstheme'),
	            "param_name" => "sub_align",
                "edit_field_class" => "vc_col-sm-2 vc_column",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
                "group" => __("Heading Settings", 'cmstheme'),
                'std' => 'left',
                'dependency' => array(
                    'element' => 'is_sub',
                    'value' => 'yes',
                ),
	        ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Font size",'cmstheme'),
			    "param_name" => "sub_font_size",
			    "group" => __("Heading Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-2 vc_column",
                'dependency' => array(
                    'element' => 'is_sub',
                    'value' => 'yes',
                ),
		    ),
            array(
			    "type" => "textfield",
			    "heading" => __("Line height",'cmstheme'),
			    "param_name" => "sub_line_height",
			    "group" => __("Heading Settings", 'cmstheme'),
                "edit_field_class" => "vc_col-sm-2 vc_column",
                'dependency' => array(
                    'element' => 'is_sub',
                    'value' => 'yes',
                ),
		    ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Add title number?",'cmstheme'),
	            "param_name" => "is_title",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                    ),
                "group" => __("Heading Settings", 'cmstheme'),
                'std' => 'no',
                "description" => __('Extra field for heading', 'cmstheme'),
	        ),
            array(
	            "type" => "textfield",
	            "heading" => __("Title Number",'cmstheme'),
	            "param_name" => "title_number",
                "edit_field_class" => "vc_col-sm-6 vc_column",
                "group" => __("Heading Settings", 'cmstheme'),
                'dependency' => array(
                    'element' => 'is_title',
                    'value' => 'yes',
                ),
                "description" => __('Enter the title number', 'cmstheme'),
	        ),
            array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'cmstheme' ),
				'param_name' => 'link',
				'description' => __( 'Add link to custom heading.', 'cmstheme' ),
                "group" => __("Link Settings", 'cmstheme'),
			),
            array(
	            "type" => "dropdown",
	            "heading" => __("Link in Heading?",'cmstheme'),
	            "param_name" => "link_heading",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                    ),
                "group" => __("Link Settings", 'cmstheme'),
                'std' => 'no',
	        ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Show Link Button?",'cmstheme'),
	            "param_name" => "link_button",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                    ),
                "group" => __("Link Settings", 'cmstheme'),
                'std' => 'no',
	        ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Link Button Align",'cmstheme'),
	            "param_name" => "link_button_align",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                    ),
	            "description" => __("Select align link button",'cmstheme'),
                "group" => __("Link Settings", 'cmstheme'),
                'std' => 'left',
                'dependency' => array(
                    'element' => 'link_button',
                    'value' => 'yes',
                ),
	        ),
            array(
	            "type" => "textfield",
	            "heading" => __("Extra Class Link",'cmstheme'),
	            "param_name" => "link_button_class",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => "",
	            "description" => __("Set class style for link button",'cmstheme'),
	            "group" => __("Link Settings", 'cmstheme'),
                "dependency" => array(
	            	"element" => "link_button",
	            	"value" => "yes"
                ),
	        ),
			array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "admin_label" => true,
	            "heading" => __("Template",'cmstheme'),
	            "shortcode" => "zo_heading",
	            "group" => __("Template", 'cmstheme'),
	        ),
	    )
	)
);

class WPBakeryShortCode_zo_heading extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'class' => '',
			'text' => 'Custom Heading',
			'element' => 'h2',
			'heading_color' => '',
			'sub_color' => '',
			'font_size' => '',
			'line_height'=> '',
			'align'=> 'left',
            'is_sub'=> 'no',
            'sub_position'=> 'bellow',
            'sub_text' => '',
			'sub_element' => 'h2',
			'sub_font_size' => '',
			'sub_line_height'=> '',
			'sub_align'=> 'left',
            'is_title' => 'no',
            'title_number' => '',
            'link' => '',
            'link_heading' => 'no',
            'link_button' => 'no',
            'link_button_align' => 'left',
            'link_button_class' => '',
			'zo_template' => 'zo_heading.php'
		), $atts);
		$atts = array_merge($atts_extra,$atts);
		$html_id = zoHtmlID('zo-heading');
		$atts['html_id'] = $html_id;
		$atts['template'] = 'template-' . str_replace('.php','',$atts['zo_template']);
		return parent::content($atts, $content);
	}
}
