<?php
$params = array(
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Progress Bar Color",'am-logistics'),
        "param_name" => "progressbar_color",
        "value" => array(
            "Default" => "0",
            "Primary Color" => "less-primary",
            "Secondary Color" => "less-secondary",
        ),
        'std' => '0',
        'template' => 'zo_progressbar--circle.php',
    ),
);
