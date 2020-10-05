<?php
vc_map(
	array(
		"name" => __("ZO Carousel Fancy Box", 'cmstheme'),
	    "base" => "zo_carousel_fancybox",
	    "class" => "vc-zo-carousel-fancy-boxes",
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
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
	            "heading" => __("Select Number Items",'cmstheme'),
	            "param_name" => "zo_cols",
	            "value" => array(
	            	"1", "2", "3", "4", "5", "6", "7", "8", "9", "10"
	            ),
	            "group" => __("Number Items", 'cmstheme')
	        ),
			
	        /* Start Items 1 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 1",'cmstheme'),
	            "param_name" => "heading_1",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"1", "2", "3", "4", "5", "6", "7", "8", "9", "10"
					)
	            ),
	            "group" => __("Number Items", 'cmstheme')
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
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"1", "2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 1",'cmstheme'),
	            "param_name" => "image1",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"1", "2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 1",'cmstheme'),
	            "param_name" => "title1",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"1", "2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "value" => "",
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 1",'cmstheme'),
	            "param_name" => "description1",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"1", "2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 1",'cmstheme'),
	            "param_name" => "button_link1",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"1", "2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
			/* End item 1 */
			
			/* Start item 2 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 2",'cmstheme'),
	            "param_name" => "heading_2",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 2', 'cmstheme' ),
				'param_name' => 'icon2',
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 2",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "param_name" => "image2",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 2",'cmstheme'),
	            "param_name" => "title2",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 2",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "param_name" => "description2",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 2",'cmstheme'),
	            "param_name" => "button_link2",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2", "3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
			/* End item 2 */
			
			/* Strat item 3 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 3",'cmstheme'),
	            "param_name" => "heading_3",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 3', 'cmstheme' ),
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
				'param_name' => 'icon3',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 3",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "param_name" => "image3",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 3",'cmstheme'),
	            "param_name" => "title3",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 3",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "param_name" => "description3",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 3",'cmstheme'),
	            "param_name" => "button_link3",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"3", "4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
			/* End item 3 */
			
			/* Start item 4 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 4",'cmstheme'),
	            "param_name" => "heading_4",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 4', 'cmstheme' ),
				'param_name' => 'icon4',
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"4", "5", "6", "7", "8", "9", "10"
					),
				),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 4",'cmstheme'),
	            "param_name" => "image4",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 4",'cmstheme'),
	            "param_name" => "title4",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 4",'cmstheme'),
	            "param_name" => "description4",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 4",'cmstheme'),
	            "param_name" => "button_link4",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"4", "5", "6", "7", "8", "9", "10"
					),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
			/* End item 4 */
			
			/* Start item 5 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 5",'cmstheme'),
	            "param_name" => "heading_5",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 5', 'cmstheme' ),
				'param_name' => 'icon5',
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"5", "6", "7", "8", "9", "10"
					),
				),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 5",'cmstheme'),
	            "param_name" => "image5",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 5",'cmstheme'),
	            "param_name" => "title5",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"5", "6", "7", "8", "9", "10"
					),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 5",'cmstheme'),
	            "param_name" => "description5",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"5", "6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 5",'cmstheme'),
	            "param_name" => "button_link5",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"5", "6", "7", "8", "9", "10"
					),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
			/* End item 5 */
			
			/* Start item 6 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 6",'cmstheme'),
	            "param_name" => "heading_6",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6", "7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 6', 'cmstheme' ),
				'param_name' => 'icon6',
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6", "7", "8", "9", "10"
					),
				),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 6",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6", "7", "8", "9", "10"
					),
				),
	            "param_name" => "image6",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 6",'cmstheme'),
	            "param_name" => "title6",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6", "7", "8", "9", "10"
					),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 6",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6", "7", "8", "9", "10"
					),
				),
	            "param_name" => "description6",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 6",'cmstheme'),
	            "param_name" => "button_link6",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6", "7", "8", "9", "10"
					),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        /* End Item 6 */
			
			/* Start item 7 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 7",'cmstheme'),
	            "param_name" => "heading_7",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"7", "8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 7', 'cmstheme' ),
				'param_name' => 'icon7',
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"7", "8", "9", "10"
					),
				),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 7",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"7", "8", "9", "10"
					),
				),
	            "param_name" => "image7",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 7",'cmstheme'),
	            "param_name" => "title7",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"7", "8", "9", "10"
					),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 7",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"7", "8", "9", "10"
					),
				),
	            "param_name" => "description7",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 7",'cmstheme'),
	            "param_name" => "button_link7",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"7", "8", "9", "10"
					),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        /* End Item 7 */
			
			/* Start item 8 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 8",'cmstheme'),
	            "param_name" => "heading_8",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"8", "9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 8', 'cmstheme' ),
				'param_name' => 'icon8',
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"8", "9", "10"
					),
				),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 8",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"8", "9", "10"
					),
				),
	            "param_name" => "image8",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 8",'cmstheme'),
	            "param_name" => "title8",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"8", "9", "10"
					),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 8",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"8", "9", "10"
					),
				),
	            "param_name" => "description8",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 8",'cmstheme'),
	            "param_name" => "button_link8",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"8", "9", "10"
					),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        /* End Item 8 */
			
			/* Start item 9 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 9",'cmstheme'),
	            "param_name" => "heading_9",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"9", "10"
					),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 9', 'cmstheme' ),
				'param_name' => 'icon9',
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"9", "10"
					),
				),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 9",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"9", "10"
					),
				),
	            "param_name" => "image9",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 9",'cmstheme'),
	            "param_name" => "title9",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"9", "10"
					),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 9",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"9", "10"
					),
				),
	            "param_name" => "description9",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 9",'cmstheme'),
	            "param_name" => "button_link9",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"9", "10"
					),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        /* End Item 9 */
			
			/* Start item 10 */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 10",'cmstheme'),
	            "param_name" => "heading_10",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=> array( "10" ),
				),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 10', 'cmstheme' ),
				'param_name' => 'icon10',
				"dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=> array( "10" ),
				),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Number Items", 'cmstheme')
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 10",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=> array( "10" ),
				),
	            "param_name" => "image10",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 10",'cmstheme'),
	            "param_name" => "title10",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=> array( "10" ),
				),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 10",'cmstheme'),
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=> array( "10" ),
				),
	            "param_name" => "description10",
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 10",'cmstheme'),
	            "param_name" => "button_link10",
	            "value" => "",
	            "dependency" => array(
	            	"element"=>"zo_cols",
	            	"value"=> array( "10" ),
				),
	            "description" => __("",'cmstheme'),
	            "group" => __("Number Items", 'cmstheme')
	        ),
	        /* End Item 10 */
			
			/* Start Group Carousel Settings */
			array(
                "type" => "dropdown",
                "heading" => __("XSmall Devices",'cmstheme'),
                "param_name" => "xsmall_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 1,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Small Devices",'cmstheme'),
                "param_name" => "small_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 2,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Medium Devices",'cmstheme'),
                "param_name" => "medium_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 3,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Large Devices",'cmstheme'),
                "param_name" => "large_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 4,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "textfield",
                "heading" => __("Margin Items",'cmstheme'),
                "param_name" => "margin",
                "value" => "10",
                "description" => __("",'cmstheme'),
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Loop Items",'cmstheme'),
                "param_name" => "loop",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Mouse Drag",'cmstheme'),
                "param_name" => "mousedrag",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Touch Drag",'cmstheme'),
                "param_name" => "touchdrag",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Show Nav",'cmstheme'),
                "param_name" => "nav",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Show Dots",'cmstheme'),
                "param_name" => "dots",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Center",'cmstheme'),
                "param_name" => "center",
                "value" => array(
                    "False" => 0,
                    "True" => 1
                ),
                'std' => 0,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Auto Play",'cmstheme'),
                "param_name" => "autoplay",
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "textfield",
                "heading" => __("Auto Play TimeOut",'cmstheme'),
                "param_name" => "autoplaytimeout",
                "value" => "5000",
                "dependency" => array(
                    "element"=>"autoplay",
                    "value" => 1
                ),
                "description" => __("",'cmstheme'),
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "textfield",
                "heading" => __("Smart Speed",'cmstheme'),
                "param_name" => "smartspeed",
                "value" => "1000",
                "description" => __("Speed scroll of each item",'cmstheme'),
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Pause On Hover",'cmstheme'),
                "param_name" => "autoplayhoverpause",
                "dependency" => array(
                    "element"=>"autoplay",
                    "value" => 1
                ),
                "value" => array(
                    "True" => 1,
                    "False" => 0
                ),
                'std' => 1,
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Left Arrow', 'cmstheme' ),
                'param_name' => 'left_arrow',
                'value' => 'fa fa-arrow-left',
                'settings' => array(
                    'emptyIcon' => 0, // default 1, display an "EMPTY" icon?
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Carousel Settings", 'cmstheme')
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Right Arrow', 'cmstheme' ),
                'param_name' => 'right_arrow',
                'value' => 'fa fa-arrow-right',
                'settings' => array(
                    'emptyIcon' => 0, // default 1, display an "EMPTY" icon?
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'description' => __( 'Select icon from library.', 'cmstheme' ),
                "group" => __("Carousel Settings", 'cmstheme')
            ),
			/* End Group Carousel Settings */
			
			/* Group Template */
			array(
                "type" => "dropdown",
                "heading" => __("Button Type",'cmstheme'),
                "param_name" => "button_type",
                "value" => array("Button" => 1, "Text" =>2 ),
                "std" => 1,
                "group" => __("Template", 'cmstheme')
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Text",'cmstheme'),
	            "param_name" => "button_text",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Template", 'cmstheme')
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
	            "type" => "zo_template_img",
	            "param_name" => "zo_template",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",'cmstheme'),
	            "shortcode" => "zo_carousel_fancybox",
	            "group" => __("Template", 'cmstheme'),
	        ),
		)
	)
);

global $zo_carousel_fancybox;
$zo_carousel_fancybox = array();
class WPBakeryShortCode_zo_carousel_fancybox extends ZoShortcode{
	protected function content($atts, $content = null){
		//default value
        $atts_extra = shortcode_atts(array(
			'content_align' => 'default',
			'button_type'=> 'button',
			'button_text'=> '',
            'xsmall_items' => 1,
            'small_items' => 2,
            'medium_items' => 3,
            'large_items' => 4,
            'margin' => 0,
            'loop' => 1,
            'mousedrag' => 1,
            'touchdrag' => 1,
            'nav' => 1,
            'dots' => 1,
            'center' => 0,
            'autoplay' => 1,
            'autoplaytimeout' => '5000',
            'smartspeed' => '250',
            'autoplayhoverpause' => 1,
            'left_arrow' => 'fa fa-arrow-left',
            'right_arrow' => 'fa fa-arrow-right',
            'filter' => "false",
            'class' => '',
            'zo_template' => 'zo_carousel_fancybox.php',
        ), $atts);
		global $zo_carousel_fancybox;
		$atts = array_merge($atts_extra,$atts);
        $html_id = zoHtmlID('zo-carousel-fancybox');
		
        $atts['autoplaytimeout'] = isset($atts['autoplaytimeout']) ? (int)$atts['autoplaytimeout'] : 5000;
        $atts['smartspeed'] = isset($atts['smartspeed']) ? (int)$atts['smartspeed'] : 250;
        $left_arrow = isset($atts['left_arrow'])?$atts['left_arrow']:'fa fa-arrow-left';
        $right_arrow = isset($atts['right_arrow'])?$atts['right_arrow']:'fa fa-arrow-right';

		/* set carousel */
		wp_enqueue_style('owl-carousel',ZO_CSS . 'owl.carousel.min.css', '', '2.2.1', 'all');
		wp_enqueue_script('owl-carousel',ZO_JS.'owl.carousel.js', array('jquery'), '2.2.1', true);
		//wp_enqueue_script('owl-autoplay',ZO_JS.'owl.autoplay.js',array('jquery'),'2.0.0b', true);
		//wp_enqueue_script('owl-navigation',ZO_JS.'owl.navigation.js',array('jquery'),'2.0.0b', true);
		//wp_enqueue_script('owl-animate',ZO_JS.'owl.animate.js',array('jquery'),'2.0.0b', true);
		wp_enqueue_script('owl-carousel-zocarouselfancybox',ZO_JS.'owl.carousel.zocarouselfancybox.js',array('jquery'),'1.0.0', true);

		$zo_carousel_fancybox[$html_id] = array(
			'margin' => (int)$atts['margin'],
            'loop' => $atts['loop'] == 1 ? true : false,
            'mouseDrag' => $atts['mousedrag'] == 1 ? true : false,
            'touchDrag' => $atts['touchdrag'] == 1 ? true : false,
            'nav' => $atts['nav'] == 1 ? true : false,
            'dots' => $atts['dots'] == 1 ? true : false,
            'center' => $atts['center'] == 1 ? true : false,
            'autoplay' => $atts['autoplay'] == 1 ? true : false,
            'autoplayTimeout' => $atts['autoplaytimeout'],
            'smartSpeed' => $atts['smartspeed'],
            'autoplayHoverPause' => $atts['autoplayhoverpause'] == 1 ? true : false,
            'navText' => array('<i class="'.$left_arrow.'"></i>','<i class="'.$right_arrow.'"></i>'),
            'dotscontainer' => $html_id.' .zo-dots',
            'items' => (int)$atts['large_items'],
            'responsive' => array(
                0 => array(
                    "items" => (int)$atts['xsmall_items'],
                ),
                768 => array(
                    "items" => (int)$atts['small_items'],
                ),
                992 => array(
                    "items" => (int)$atts['medium_items'],
                ),
                1200 => array(
                    "items" => (int)$atts['large_items'],
                )
            )
		);
		wp_localize_script('owl-carousel-zocarouselfancybox', "zoCarouselFancyBox", $zo_carousel_fancybox);
		
        $atts['template'] = 'template-'.str_replace('.php','',$atts['zo_template']). ' content-align-' . $atts['content_align'] . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}
