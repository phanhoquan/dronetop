<?php
$params = array(
    array(
        "type" => "dropdown",
        "heading" => esc_html__ ( 'Local Font', 'am-logistics' ),
        "param_name" => "local_font",
        "value" => array(
            "Theme Default" => "0",
            "Local Font 1" => "local-font-1",
            "Local Font 2" => "local-font-2",
        ),
        "std" => "0",
        "group" => esc_html__("General Settings", 'am-logistics'),
    ),
    array(
        "type" => "dropdown",
        "heading" => esc_html__ ( 'Background Style', 'am-logistics' ),
        "param_name" => "countdown_background",
        "value" => array(
            "Theme Default" => "0",
            "Primary Color" => "less-primary",
            "Secondary Color" => "less-secondary",
            "Black Color" => "less-black",
            "White Color" => "less-white",
        ),
        "std" => "0",
        "template" => 'zo_countdown--split.php',
    ),
);
