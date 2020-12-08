<?php 
vc_map(
	array(
		"name" => __("ZO Counter", 'cmstheme'),
	    "base" => "zo_counter",
	    "class" => "vc-zo-counter",
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
	    	array(
	            "type" => "textfield",
	            "heading" => __("Title",'cmstheme'),
	            "param_name" => "title",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("General Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Description",'cmstheme'),
	            "param_name" => "description",
	            "value" => "",
	            "description" => __("",'cmstheme'),
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
	            	"5 Columns",
	            	"6 Columns",
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        /* Counters */
	        array(
	            "type" => "dropdown",
	            "heading" => __("Using Grouping",'cmstheme'),
	            "param_name" => "grouping",
	            "std" => "false",
	            "value" => array(
				"True" => "true",
				"False" => "false"
				),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Separator",'cmstheme'),
	            "param_name" => "separator",
	            "value" => ",",
	            'dependency' => array(
	            	"element"=>"grouping",
	            	"value"=>array(
						"true"
						)
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 1",'cmstheme'),
	            "param_name" => "heading_1",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
                        "5 Columns",
                        "4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 1",'cmstheme'),
	            "param_name" => "title1",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"5 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "value" => "",
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 1",'cmstheme'),
	            "param_name" => "type1",
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"5 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 1', 'cmstheme' ),
				'param_name' => 'icon1',
	            'value' => '',
                'dependency' => array(
                    "element"=>"zo_cols",
                    "value"=>array(
                        "2 Columns",
                        "6 Columns",
                        "4 Columns",
                        "5 Columns",
                        "3 Columns",
                        "1 Column"
                    )
                ),
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Counters Settings", 'cmstheme')
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 1",'cmstheme'),
	            "param_name" => "digit1",
	            "value" => "69",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 1",'cmstheme'),
                "param_name" => "prefix1",
                'dependency' => array(
                    "element"=>"zo_cols",
                    "value"=>array(
                        "2 Columns",
                        "6 Columns",
                        "4 Columns",
                        "5 Columns",
                        "3 Columns",
                        "1 Column"
                    )
                ),
                "value" => "",
                "description" => __("",'cmstheme'),
                "group" => __("Counters Settings", 'cmstheme')
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 1",'cmstheme'),
	            "param_name" => "suffix1",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"5 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Description 1",'cmstheme'),
                "param_name" => "description1",
                'dependency' => array(
                    "element"=>"zo_cols",
                    "value"=>array(
                        "2 Columns",
                        "6 Columns",
                        "5 Columns",
                        "4 Columns",
                        "3 Columns",
                        "1 Column"
                    )
                ),
                "value" => "",
                "description" => __("",'cmstheme'),
                "group" => __("Counters Settings", 'cmstheme')
            ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 2",'cmstheme'),
	            "param_name" => "heading_2",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 2",'cmstheme'),
	            "param_name" => "title2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 2",'cmstheme'),
	            "param_name" => "type2",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 2', 'cmstheme' ),
				'param_name' => 'icon2',
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
						"5 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Counters Settings", 'cmstheme')
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 2",'cmstheme'),
	            "param_name" => "digit2",
	            "value" => "69",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 2",'cmstheme'),
                "param_name" => "prefix2",
                "value" => "",
                'dependency' => array(
                    "element"=>"zo_cols",
                    "value"=>array(
                        "2 Columns",
                        "6 Columns",
                        "4 Columns",
                        "5 Columns",
                        "3 Columns",
                    )
                ),
                "description" => __("",'cmstheme'),
                "group" => __("Counters Settings", 'cmstheme')
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 2",'cmstheme'),
	            "param_name" => "suffix2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 2",'cmstheme'),
	            "param_name" => "description2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 3",'cmstheme'),
	            "param_name" => "heading_3",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 3",'cmstheme'),
	            "param_name" => "title3",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 3",'cmstheme'),
	            "param_name" => "type3",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 3', 'cmstheme' ),
				'param_name' => 'icon3',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Counters Settings", 'cmstheme')
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 3",'cmstheme'),
	            "param_name" => "digit3",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "value" => "69",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 3",'cmstheme'),
                "param_name" => "prefix3",
                'dependency' => array(
                    "element"=>"zo_cols",
                    "value"=>array(
                        "6 Columns",
                        "4 Columns",
                        "5 Columns",
                        "3 Columns",
                    )
                ),
                "value" => "",
                "description" => __("",'cmstheme'),
                "group" => __("Counters Settings", 'cmstheme')
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 3",'cmstheme'),
	            "param_name" => "suffix3",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 3",'cmstheme'),
	            "param_name" => "description3",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"5 Columns",
						"3 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 4",'cmstheme'),
	            "param_name" => "heading_4",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns",
						"4 Columns",
						)
					),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 4",'cmstheme'),
	            "param_name" => "title4",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"5 Columns",
						"4 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 4",'cmstheme'),
	            "param_name" => "type4",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns",
						"4 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 4', 'cmstheme' ),
				'param_name' => 'icon4',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"5 Columns",
						"4 Columns",
						)
					),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Counters Settings", 'cmstheme')
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 4",'cmstheme'),
	            "param_name" => "digit4",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns",
						"4 Columns",
						)
					),
	            "value" => "69",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 4",'cmstheme'),
                "param_name" => "prefix4",
                'dependency' => array(
                    "element"=>"zo_cols",
                    "value"=>array(
                        "6 Columns",
                        "5 Columns",
                        "4 Columns",
                    )
                ),
                "value" => "",
                "description" => __("",'cmstheme'),
                "group" => __("Counters Settings", 'cmstheme')
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 4",'cmstheme'),
	            "param_name" => "suffix4",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns",
						"4 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 4",'cmstheme'),
	            "param_name" => "description4",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns",
						"4 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 5",'cmstheme'),
	            "param_name" => "heading_5",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns"
						)
					),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 5",'cmstheme'),
	            "param_name" => "title5",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"5 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 5",'cmstheme'),
	            "param_name" => "type5",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns"
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 5', 'cmstheme' ),
				'param_name' => 'icon5',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						"5 Columns"
						)
					),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Counters Settings", 'cmstheme')
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 5",'cmstheme'),
	            "param_name" => "digit5",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns"
						)
					),
	            "value" => "69",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Prefix 5",'cmstheme'),
                "param_name" => "prefix5",
                'dependency' => array(
                    "element"=>"zo_cols",
                    "value"=>array(
                        "6 Columns",
                        "5 Columns"
                    )
                ),
                "value" => "",
                "description" => __("",'cmstheme'),
                "group" => __("Counters Settings", 'cmstheme')
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 5",'cmstheme'),
	            "param_name" => "suffix5",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns"
						)
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 5",'cmstheme'),
	            "param_name" => "description5",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>array(
						"6 Columns",
						"5 Columns"
						)
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 6",'cmstheme'),
	            "param_name" => "heading_6",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>"6 Columns"
					),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 6",'cmstheme'),
	            "param_name" => "title6",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("Title Of Item",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 6",'cmstheme'),
	            "param_name" => "type6",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>"6 Columns"
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 6', 'cmstheme' ),
				'param_name' => 'icon6',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"zo_cols",
	            	"value"=>array(
						"6 Columns",
						)
					),
				'description' => __( 'Select icon from library.', 'cmstheme' ),
				"group" => __("Counters Settings", 'cmstheme')
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 6",'cmstheme'),
	            "param_name" => "digit6",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>"6 Columns"
					),
	            "value" => "69",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix 6",'cmstheme'),
	            "param_name" => "prefix6",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>"6 Columns"
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 6",'cmstheme'),
	            "param_name" => "suffix6",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>"6 Columns"
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Description 6",'cmstheme'),
	            "param_name" => "description6",
	            'dependency' => array(
					"element"=>"zo_cols",
					"value"=>"6 Columns"
					),
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Counters Settings", 'cmstheme')
	        ),
	        /* End Counters */
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
	            "heading" => __("Shortcode Template",'cmstheme'),
	            "param_name" => "zo_template",
	            "shortcode" => "zo_counter",
	            "admin_label" => true,
	            "group" => __("Template", 'cmstheme'),
	        )
		)
	)
);
class WPBakeryShortCode_zo_counter extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'grouping' => 'false',
			'separator' => ',',
			'content_align' => 'default',
			'zo_cols' => '1 Column',
			'class' => '',
			'zo_template' => 'zo_counter.php'
		), $atts);
		$atts = array_merge($atts_extra,$atts);
		wp_register_script('counter', ZO_JS. 'counter.min.js', array('jquery'),'1.0.0',true);
		wp_register_script('counter-zo', ZO_JS. 'counter.zo.js', array('counter','waypoints'),'1.0.0',true);
		wp_enqueue_script('counter-zo');
        $html_id = zoHtmlID('zo-counter');
        //set grid
        switch($atts['zo_cols']){
            case "1 Column":
                $item_class = "";
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
            case "5 Columns":
                $item_class = "col-xs-12 col-sm-6 col-md-2-zo col-lg-2-zo";
                break;
            case "6 Columns":
                $item_class = "col-xs-12 col-sm-6 col-md-2 col-lg-2";
                break;
            default:
                $item_class = "";
                break;
        }

        $class = ($atts['class']) ? $atts['class']:'';
        $atts['template'] = 'template-'.str_replace('.php','',$atts['zo_template']). ' content-align-' . $atts['content_align'] . ' '. $class;
        $atts['html_id'] = $html_id;
        $atts['item_class'] = $item_class;
		return parent::content($atts, $content);
	}
}