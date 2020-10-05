<?php
/**
 * Array presets.
 *
 * @return multitype:multitype:string
 * @author Fox
 */
function zo_presets()
{
    return array(
        'primary_color',
        'secondary_color',
        'link_color',
		'preset_menu_color',
		'preset_menu_child_color',
		'gradient_color',
		'sticky_menu_color_first_level',
		'sticky_menu_color_sub_level',
		'header_top_link_color',
		'footer_link_color',
    );
}

/**
 * Load presets script.
 */
add_action('admin_enqueue_scripts', 'zo_presets_scripts');

function zo_presets_scripts()
{
    if (isset($_REQUEST['page']) && $_REQUEST['page'] == '_options') {
        wp_enqueue_script('zo-presets', get_template_directory_uri() . '/inc/options/js/presets.js', 'jquery', '1.0.0', TRUE);
        wp_localize_script('zo-presets', 'data_presets', array('ajaxurl' => esc_url(admin_url('admin-ajax.php'))));
    }
}

/**
 * Redux saved.
 * Save options generate presets.
 *
 * @author Fox
 */

add_action("redux/options/logistics_data/saved", 'zo_preset_save_options');

function zo_preset_save_options()
{
    global $logistics_data;

    $theme_info = wp_get_theme();

    if (isset($logistics_data['presets_color'])) {

        $preset_name = "_zo_data_preset_" . do_shortcode($logistics_data['presets_color']);

        $preset_data = array();

        $preset_items = zo_presets();
        foreach ($preset_items as $value) {
            if(!empty($logistics_data[$value]))
                $preset_data[$value] = $logistics_data[$value];
        }

        $preset_data = json_encode($preset_data);
        /* update options. */
        update_option($preset_name, $preset_data);
    }
}

/**
 * Ajax get preset options.
 *
 * @author Fox
 */

add_action('wp_ajax_zo_get_preset_options', 'zo_get_preset_options_callback');

function zo_get_preset_options_callback()
{
    header('Content-Type: application/json');

    $preset = ! empty($_REQUEST['preset']) ? $_REQUEST['preset'] : '0';

    $theme_info = wp_get_theme();

    $preset = get_option("_zo_data_preset_" . do_shortcode($preset), null);

    die($preset);
}

