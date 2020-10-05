<?php
	$params = array(
        array(
			"type" => "dropdown",
			"heading" => esc_html__ ( 'Show Category', 'am-logistics' ),
			"param_name" => "cat_show",
			"value" => array(
                "Yes" => "true",
                "No" => "false"
			),
			"description" => '',
			"group" => esc_html__("General Settings", 'am-logistics'),
            "template" => array(
                'zo_grid--cat_posts.php'
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'am-logistics'),
            "param_name" => "cat_title",
            "value" => "",
            "description" => esc_html__("Title for Category",'am-logistics'),
            "group" => esc_html__("General Settings", 'am-logistics'),
            "template" => array(
                'zo_grid--cat_posts.php'
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("URL",'am-logistics'),
            "param_name" => "cat_url",
            "value" => "",
            "description" => esc_html__("Link to Category",'am-logistics'),
            "group" => esc_html__("General Settings", 'am-logistics'),
            "template" => array(
                'zo_grid--cat_posts.php'
            )
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description",'am-logistics'),
            "param_name" => "cat_description",
            "value" => "",
            "description" => esc_html__("Description for Category",'am-logistics'),
            "group" => esc_html__("General Settings", 'am-logistics'),
            "template" => array(
                'zo_grid--cat_posts.php'
            )
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Animation", 'am-logistics'),
            "admin_label" => true,
            "param_name" => "animation",
            "value" => array(
                "None" => "",
                "bounce" => "bounce",
                "flash" => "flash",
                "pulse" => "pulse",
                "rubberBand" => "rubberBand",
                "shake" => "shake",
                "swing" => "swing",
                "tada" => "tada",
                "wobble" => "wobble",
                "jello" => "jello",
                "bounceIn" => "bounceIn",
                "bounceInDown" => "bounceInDown",
                "bounceInLeft" => "bounceInLeft",
                "bounceInRight" => "bounceInRight",
                "bounceInUp" => "bounceInUp",
                "fadeIn" => "fadeIn",
                "fadeInDown" => "fadeInDown",
                "fadeInDownBig" => "fadeInDownBig",
                "fadeInLeft" => "fadeInLeft",
                "fadeInLeftBig" => "fadeInLeftBig",
                "fadeInRight" => "fadeInRight",
                "fadeInRightBig" => "fadeInRightBig",
                "fadeInUp" => "fadeInUp",
                "fadeInUpBig" => "fadeInUpBig",
                "flip" => "flip",
                "flipInX" => "flipInX",
                "flipInY" => "flipInY",
                "lightSpeedIn" => "lightSpeedIn",
                "lightSpeedOut" => "lightSpeedOut",
                "rotateIn" => "rotateIn",
                "rotateInDownLeft" => "rotateInDownLeft",
                "rotateInDownRight" => "rotateInDownRight",
                "rotateInUpLeft" => "rotateInUpLeft",
                "rotateInUpRight" => "rotateInUpRight",
                "slideInUp" => "slideInUp",
                "slideInDown" => "slideInDown",
                "slideInLeft" => "slideInLeft",
                "slideInRight" => "slideInRight",
                "zoomIn" => "zoomIn",
                "zoomInDown" => "zoomInDown",
                "zoomInLeft" => "zoomInLeft",
                "zoomInRight" => "zoomInRight",
                "zoomInUp" => "zoomInUp",
                "rollIn" => "rollIn",
            ),
            'description' => esc_html__('View animation effect at https://daneden.github.io/animate.css/', 'am-logistics')
        ),
	);
