<?php
	$params = array(
        array(
			"type" => "dropdown",
			"heading" => esc_html__ ( 'Styles', 'am-logistics' ),
			"param_name" => "heading_style",
			"value" => array(
                "Plain" => "",
                "Leadline" => "zo-heading-leadline",
                "Underline" => "zo-heading-underline",
                "Breakline Top" => "zo-heading-breakline-top",
                "Breakline Bottom" => "zo-heading-breakline-bottom",
                "Border" => "zo-heading-border",
                "Fill Full Color" => "zo-heading-fill",
                "Fill Inline Block Color" => "zo-heading-fill-block",
			),
			"description" => 'Custom style for heading',
			"group" => esc_html__("General Settings", 'am-logistics'),
            "template" => array(
            )
        ),
        array(
			"type" => "colorpicker",
			"heading" => esc_html__("Border Color",'am-logistics'),
			"param_name" => "heading_border_color",
			"value" => "transparent",
            "description" => 'Set color for heading border, default is #e5e5e5. This is appearing when style border selecting [Leadline, Underline]',
		),
        array(
			"type" => "colorpicker",
			"heading" => esc_html__("Highlight Border Color",'am-logistics'),
			"param_name" => "heading_highlight_border_color",
			"value" => "transparent",
            "description" => 'Set color for heading highlight border, default is primary color. This is appearing when style border selecting [Leadline, Underline, Border]',
		),
        array(
			"type" => "colorpicker",
			"heading" => esc_html__("Fill Color",'am-logistics'),
			"param_name" => "heading_fill_color",
			"value" => "transparent",
            "description" => 'Set color background heading, default is primary color. This is appearing when style fill selecting',
		),
    );
