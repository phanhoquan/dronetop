<?php
vc_map(array(
    "name" => 'ZO Google Map',
    "base" => "zo_googlemap",
    "icon" => "zo_icon_for_vc",
    "category" => __('ZoTheme Shortcodes', 'cmstheme'),
    "description" => __('Map API V3 Unlimited Style', 'cmstheme'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('API Key', 'cmstheme'),
            "param_name" => "api",
            "value" => '',
            "description" => __('Enter you api key of map, get key from (https://console.developers.google.com)', 'cmstheme')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Address', 'cmstheme'),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => __('Enter address of Map', 'cmstheme')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Coordinate', 'cmstheme'),
            "param_name" => "coordinate",
            "value" => '',
            "description" => __('Enter coordinate of Map, format input (latitude, longitude)', 'cmstheme')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Click Show Info window', 'cmstheme'),
            "param_name" => "infoclick",
            "value" => array(
                __("Yes, please", 'cmstheme') => true
            ),
            "description" => __('Click a marker and show info window (Default Show).', 'cmstheme')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Coordinate', 'cmstheme'),
            "param_name" => "markercoordinate",
            "value" => '',
            "description" => __('Enter marker coordinate of Map, format input (latitude, longitude)', 'cmstheme')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Title', 'cmstheme'),
            "param_name" => "markertitle",
            "value" => '',
            "description" => __('Enter Title Info windows for marker', 'cmstheme')
        ),
        array(
            "type" => "textarea",
            "heading" => __('Marker Description', 'cmstheme'),
            "param_name" => "markerdesc",
            "value" => '',
            "description" => __('Enter Description Info windows for marker', 'cmstheme')
        ),
        array(
            "type" => "attach_image",
            "heading" => __('Marker Icon', 'cmstheme'),
            "param_name" => "markericon",
            "value" => '',
            "description" => __('Select image icon for marker', 'cmstheme')
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Marker List', 'cmstheme'),
            "param_name" => "markerlist",
            "value" => '',
            "description" => __('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'cmstheme')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Info Window Max Width', 'cmstheme'),
            "param_name" => "infowidth",
            "value" => '200',
            "description" => __('Set max width for info window', 'cmstheme')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map Type", 'cmstheme'),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => __('Select the map type.', 'cmstheme')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style Template", 'cmstheme'),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Custom" => "custom",
                "Light Monochrome" => "light-monochrome",
                "Blue water" => "blue-water",
                "Midnight Commander" => "midnight-commander",
                "Paper" => "paper",
                "Red Hues" => "red-hues",
                "Hot Pink" => "hot-pink",
                "Gray Scale" => "grayscale",
                "Dark" => "dark",
            ),
			"dependency" => array(
				"element"=>"type",
				"value" => "ROADMAP"
			),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textarea",
            "heading" => __('Custom Template', 'cmstheme'),
            "param_name" => "content",
            "value" => '',
			"dependency" => array(
				"element"=>"style",
				"value" => "custom"
			),
            "description" => __('Get template from http://snazzymaps.com', 'cmstheme')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Zoom', 'cmstheme'),
            "param_name" => "zoom",
            "value" => '13',
            "description" => __('zoom level of map, default is 13', 'cmstheme')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Width', 'cmstheme'),
            "param_name" => "width",
            "value" => 'auto',
            "description" => __('Width of map without pixel, default is auto', 'cmstheme')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Height', 'cmstheme'),
            "param_name" => "height",
            "value" => '350px',
            "description" => __('Height of map without pixel, default is 350px', 'cmstheme')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scroll Wheel', 'cmstheme'),
            "param_name" => "scrollwheel",
            "value" => array(
                __("Yes, please", 'cmstheme') => true
            ),
            "description" => __('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'cmstheme')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Pan Control', 'cmstheme'),
            "param_name" => "pancontrol",
            "value" => array(
                __("Yes, please", 'cmstheme') => true
            ),
            "description" => __('Show or hide Pan control.', 'cmstheme')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Zoom Control', 'cmstheme'),
            "param_name" => "zoomcontrol",
            "value" => array(
                __("Yes, please", 'cmstheme') => true
            ),
            "description" => __('Show or hide Zoom Control.', 'cmstheme')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scale Control', 'cmstheme'),
            "param_name" => "scalecontrol",
            "value" => array(
                __("Yes, please", 'cmstheme') => true
            ),
            "description" => __('Show or hide Scale Control.', 'cmstheme')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Map Type Control', 'cmstheme'),
            "param_name" => "maptypecontrol",
            "value" => array(
                __("Yes, please", 'cmstheme') => true
            ),
            "description" => __('Show or hide Map Type Control.', 'cmstheme')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Street View Control', 'cmstheme'),
            "param_name" => "streetviewcontrol",
            "value" => array(
                __("Yes, please", 'cmstheme') => true
            ),
            "description" => __('Show or hide Street View Control.', 'cmstheme')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Over View Map Control', 'cmstheme'),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                __("Yes, please", 'cmstheme') => true
            ),
            "description" => __('Show or hide Over View Map Control.', 'cmstheme')
        )
    )
));

class WPBakeryShortCode_zo_googlemap extends ZoShortcode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
