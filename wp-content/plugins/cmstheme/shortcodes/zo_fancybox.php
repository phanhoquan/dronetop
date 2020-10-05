<?php
vc_map(
	array(
		"name" => __("ZO Fancy Box", 'cmstheme'),
	    "base" => "zo_fancybox",
	    "class" => "vc-zo-fancy-boxes",
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
	    	array(
	            "type" => "textfield",
	            "heading" => __("Title",'cmstheme'),
	            "param_name" => "title",
	            "value" => "",
	            "description" => __("Title Of Fancy Icon Box",'cmstheme'),
	            "group" => __("General Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Description",'cmstheme'),
	            "param_name" => "description",
	            "value" => "",
	            "description" => __("Description Of Fancy Icon Box",'cmstheme'),
	            "group" => __("General Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Content Align",'cmstheme'),
	            "param_name" => "content_align",
	            "value" => array(
	            	"Default" => "default",
	            	"Left" => "left",
	            	"Right" => "right",
	            	"Center" => "center"
	            	),
	            "group" => __("General Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Select Number Cols",'cmstheme'),
	            "param_name" => "zo_cols",
	            "value" => array(
	            	"1 Column",
	            	"2 Columns",
	            	"3 Columns",
	            	"4 Columns",
	            	"6 Columns",
	            	),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        /* Start Items */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 1",'cmstheme'),
	            "param_name" => "heading_1",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 1', 'cmstheme' ),
				'param_name' => 'icon1',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Fancy Icon Settings", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 1",'cmstheme'),
	            "param_name" => "image1",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 1",'cmstheme'),
	            "param_name" => "title1",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "value" => "",
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 1",'cmstheme'),
	            "param_name" => "description1",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 1",'cmstheme'),
	            "param_name" => "button_link1",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 2",'cmstheme'),
	            "param_name" => "heading_2",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 2', 'cmstheme' ),
				'param_name' => 'icon2',
				'dependency' => array(
						"element"=>"zo_cols",
						"value"=>array(
							"2 Columns",
							"6 Columns",
							"4 Columns",
							"3 Columns",
						)
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Fancy Icon Settings", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 2",'cmstheme'),
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "param_name" => "image2",
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 2",'cmstheme'),
	            "param_name" => "title2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 2",'cmstheme'),
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "description2",
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 2",'cmstheme'),
	            "param_name" => "button_link2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 3",'cmstheme'),
	            "param_name" => "heading_3",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 3', 'cmstheme' ),
				'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
				'param_name' => 'icon3',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Fancy Icon Settings", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 3",'cmstheme'),
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "image3",
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 3",'cmstheme'),
	            "param_name" => "title3",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 3",'cmstheme'),
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "description3",
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 3",'cmstheme'),
	            "param_name" => "button_link3",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 4",'cmstheme'),
	            "param_name" => "heading_4",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 4', 'cmstheme' ),
				'param_name' => 'icon4',
				'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Fancy Icon Settings", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 4",'cmstheme'),
	            "param_name" => "image4",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 4",'cmstheme'),
	            "param_name" => "title4",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 4",'cmstheme'),
	            "param_name" => "description4",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 4",'cmstheme'),
	            "param_name" => "button_link4",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "description" => __("",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 6",'cmstheme'),
	            "param_name" => "heading_6",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>"6 Columns"
					),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 6', 'cmstheme' ),
				'param_name' => 'icon6',
				'dependency' => array(
					"element"=>"zo_cols",
					"value"=>"6 Columns"
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Fancy Icon Settings", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 6",'cmstheme'),
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>"6 Columns"
	            	),
	            "param_name" => "image6",
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 6",'cmstheme'),
	            "param_name" => "title6",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 6",'cmstheme'),
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>"6 Columns"
	            	),
	            "param_name" => "description6",
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 6",'cmstheme'),
	            "param_name" => "button_link6",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("",'cmstheme'),
	            "group" => __("Fancy Icon Settings", 'cmstheme')
	        ),
	        /* End Items */
	        array(
	            "type" => "dropdown",
	            "heading" => __("Button Type",'cmstheme'),
	            "param_name" => "button_type",
	            "value" => array(
	            	"Button" => "button",
	            	"Text" => "text"
	            	),
	            "group" => __("Buttons Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Text",'cmstheme'),
	            "param_name" => "button_text",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Buttons Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",'cmstheme'),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Template", 'cmstheme')
	        ),
	    	array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",'cmstheme'),
	            "shortcode" => "zo_fancybox",
	            "group" => __("Template", 'cmstheme'),
	        )
		)
	)
);
class WPBakeryShortCode_zo_fancybox extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'content_align' => 'default',
			'zo_cols' => '1 Column',
			'button_type'=> 'button',
			'button_text'=> '',
			'class' => '',
			'zo_template' => 'zo_fancybox.php'
			    ), $atts);
		$atts = array_merge($atts_extra,$atts);
        $html_id = zoHtmlID('zo-fancy-box');

        //set grid
        switch($atts['zo_cols']){
            case "1 Column":
                $item_class = "col-xs-12 col-sm-12 col-md-12 col-lg-12";
                break;
            case "2 Columns":
                $item_class = "col-xs-12 col-sm-6 col-md-6 col-lg-6";
                break;
            case "3 Columns":
                $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-4";
                break;
            case "4 Columns":
                $item_class = "col-xs-12 col-sm-6 col-md-3 col-lg-3";
                break;
            case "6 Columns":
                $item_class = "col-xs-12 col-sm-6 col-md-2 col-lg-2";
                break;
            default:
                $item_class = "";
                break;
        }
        $atts['template'] = 'template-'.str_replace('.php','',$atts['zo_template']). ' content-align-' . $atts['content_align'] . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
        $atts['item_class'] = $item_class;
		return parent::content($atts, $content);
	}
}
