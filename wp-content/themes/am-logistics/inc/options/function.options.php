<?php
global $logistics_base;
/* get local fonts. */
$local_fonts = is_admin() ? $logistics_base->getListLocalFontsName() : array();

/**
 * Layout
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Layout', 'am-logistics'),
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Controls the site layout.', 'am-logistics'),
            'id' => 'body_layout',
            'type' => 'button_set',
            'title' => esc_html__('Layout', 'am-logistics'),
            'default' => 'wide',
            'options' => array(
                'wide' => esc_html__('Wide', 'am-logistics'),
                'boxed' => esc_html__('Boxed', 'am-logistics'),
            )
        ),
        array(
            'title' => esc_html__('Site Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the overall site width. Enter value including any valid CSS unit, ex: 1200px. (minimun is standard bootstrap width)', 'am-logistics'),
            'id' => 'body_width',
            'type' => 'slider',
            "default" => 1200,
            "min" => 1170,
            "step" => 10,
            "max" => 1600,
            'display_value' => 'text',
        ),
        array(
            'id' => 'body_padding',
            'title' => esc_html__('Layout Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the padding for page content when using 100% site width or 100% width page layout. Enter value including any valid CSS unit, ex: 20px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '0px',
                'padding-right' => '0px',
                'padding-bottom' => '0px',
                'padding-left' => '0px',
                'units' => 'px',
            ),
            'required' => array(0 => 'body_layout', 1 => '=', 2 => 'wide')
        ),
        array(
            'id' => 'body_background',
            'type' => 'background',
            'title' => esc_html__('Body Background', 'am-logistics'),
            'subtitle' => esc_html__('Controls the background of the body. (It is also display in the outer background area in boxed mode.)', 'am-logistics'),
        ),
        array(
            'id' => 'body_boxed_background',
            'type' => 'background',
            'title' => esc_html__('Boxed Content Background', 'am-logistics'),
            'subtitle' => esc_html__('Controls the background of the outer background area in boxed mode.', 'am-logistics'),
        ),
        array(
            'title' => esc_html__('Main Sidebar Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'am-logistics'),
            'id' => 'body_sidebar_size',
            'type' => 'slider',
            "default" => 3,
            "min" => 3,
            "step" => 1,
            "max" => 6,
            'display_value' => 'label'
        ),
        array(
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => esc_html__('Enable Page Loading', 'am-logistics'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('Select Style Page Loadding.', 'am-logistics'),
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2',
                '3' => 'Style 3 - circle 1',
                '4' => 'Style 4 - circle 2',
                '5' => 'Style 5 - circle 3',
            ),
            'title' => esc_html__('Page Loadding Style', 'am-logistics'),
            'default' => 'style-1',
            'required' => array(0 => 'enable_page_loadding', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Select the Style Class', 'am-logistics'),
            'id' => 'page_class',
            'type' => 'select',
            'options' => array(
                '' => 'None',
                'less-blog' => 'Less Blog Style',
                'less-law' => 'Less Law',
                'less-restaurant' => 'Less Restaurant',
                'less-cleaning' => 'Less Cleaning',
                'less-equestrian' => 'Less Equestrian',
                'less-corporate' => 'Less Corporate',
            ),
            'title' => esc_html__('Layout Style', 'am-logistics'),
            'default' => '',
        )
    )
);


/**
 * Colors
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Colors', 'am-logistics'),
    'icon' => 'el el-brush',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Controls the main color scheme throughout the theme. Select a scheme and all color options will change to the defined selection.', 'am-logistics'),
            'id' => 'presets_color',
            'type' => 'image_select',
            'title' => esc_html__('Presets Color Scheme', 'am-logistics'),
            'default' => '0',
            'options' => array(
                '0' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-7.jpg',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the main highlight color throughout the theme.', 'am-logistics'),
            'id' => 'primary_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Primary Color', 'am-logistics'),
            'default' => '#d10024'
        ),
        array(
            'subtitle' => esc_html__('Controls the secondary highlight color throughout the theme.', 'am-logistics'),
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'am-logistics'),
            'default' => '#000000',
            'transparent' => false,
        ),
        array(
            'subtitle' => esc_html__('Controls the color of all text links.', 'am-logistics'),
            'id' => 'link_color',
            'type' => 'link_color',
            'title' => esc_html__('Link Color', 'am-logistics'),
            'output' => array('a'),
            'default' => array(
                'regular' => '#000000',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the color of first level for Primary menu by Preset color scheme', 'am-logistics'),
            'id' => 'preset_menu_color',
            'type' => 'link_color',
            'title' => esc_html__('Primary Menu Color', 'am-logistics'),
            'default' => array(
                'regular' => '#ffffff',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the color of child level for Primary menu by Preset color scheme', 'am-logistics'),
            'id' => 'preset_menu_child_color',
            'type' => 'link_color',
            'title' => esc_html__('Primary Submenu Color', 'am-logistics'),
            'default' => array(
                'regular' => '#ffffff',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the color of first level for Sticky menu by Preset color scheme', 'am-logistics'),
            'id' => 'sticky_menu_color_first_level',
            'type' => 'link_color',
            'title' => esc_html__('Sticky Menu First Level', 'am-logistics'),
            'default' => array(
                'regular' => '#ffffff',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the color of sub level for Sticky menu by Preset color scheme', 'am-logistics'),
            'id' => 'sticky_menu_color_sub_level',
            'type' => 'link_color',
            'title' => esc_html__('Sticky Menu Sub Level', 'am-logistics'),
            'default' => array(
                'regular' => '#ffffff',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the color for link of header top', 'am-logistics'),
            'id' => 'header_top_link_color',
            'type' => 'link_color',
            'title' => esc_html__('Header Top Link Color', 'am-logistics'),
            'default' => array(
                'regular' => '#FFFFFF',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'id' => 'footer_link_color',
            'type' => 'link_color',
            'title' => esc_html__('Footer Link Color', 'am-logistics'),
            'subtitle' => esc_html__('Controls the color for link of footer', 'am-logistics'),
            'default' => array(
                'regular' => '#cccccc',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the color for Gradient style, you have three colors to seting for gradient', 'am-logistics'),
            'id' => 'gradient_color',
            'type' => 'link_color',
            'title' => esc_html__('Gradient Color', 'am-logistics'),
            'default' => array(
                'regular' => '#39c7dd',
                'hover' => '#d10024',
                'active' => '#3975dd',
            )
        ),
    )
);

/**
 * Header Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Header', 'am-logistics'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Header Layouts', 'am-logistics'),
            'subtitle' => esc_html__('Select a header layout default. Foreach pages, you can change the layout by page option', 'am-logistics'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri() . '/assets/images/logistics-header-01.png',
            )
        ),
    )
);

$this->sections[] = array(
    'title' => esc_html__('Header Style 01', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'header_01_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Settings', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('This is the options you can change for Header Style 01, it\'s has sticky header.', 'am-logistics'),
        ),
        array(
            'id' => 'header_01_img',
            'title' => esc_html__('Default Layout', 'am-logistics'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri() . '/assets/images/logistics-header-01.png',
            )
        ),
        array(
            'subtitle' => esc_html__('Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'am-logistics'),
            'id' => 'header_01_wide_boxed',
            'type' => 'switch',
            'title' => esc_html__('Full Width (100%)', 'am-logistics'),
            'default' => false,
        ),
       
        array(
            'subtitle' => esc_html__('Turn on to have the header transparent', 'am-logistics'),
            'id' => 'header_01_transparent',
            'type' => 'switch',
            'title' => esc_html__('Header Transparent', 'am-logistics'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('Turn on to enable sticky header.', 'am-logistics'),
            'id' => 'header_01_sticky',
            'type' => 'switch',
            'title' => esc_html__('Enable Sticky Header', 'am-logistics'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for the Transparent header. This color appear when transparent header is activate by theme or page option', 'am-logistics'),
            'id' => 'header_01_transparent_bg_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Header Transparent Background Color', 'am-logistics'),
            'default' => array(
                'color' => '#000000',
                'alpha' => 0
            ),
        ),
        array(
            'subtitle' => esc_html__('Turn on to enable fully width background color.', 'am-logistics'),
            'id' => 'header_01_transparent_bg_color_full',
            'type' => 'switch',
            'title' => esc_html__('Full Background', 'am-logistics'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('Controls the border color for Transparent header.', 'am-logistics'),
            'id' => 'header_01_transparent_border_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Transparent Border Color', 'am-logistics'),
            'default' => array(
                'color' => 'rgba(255, 255, 255, 0)',
                'alpha' => 0
            ),
        ),
        array(
            'title' => esc_html__('Transparent Borders Top', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the Transparent border top, ex: 2px.', 'am-logistics'),
            'id' => 'header_01_transparent_border_top',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'label'
        ),
        array(
            'title' => esc_html__('Transparent Borders Bottom', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the Transparent border bottom, ex: 2px.', 'am-logistics'),
            'id' => 'header_01_transparent_border_bottom',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'label'
        ),
        array(
            'id' => 'header_01_transparent_padding',
            'title' => esc_html__('Header Transparent Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the header transparent. Enter values including any valid CSS unit, ex: 0px, 0px, 0px, 0px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '0px',
                'padding-right' => '0px',
                'padding-bottom' => '0px',
                'padding-left' => '0px',
                'units' => 'px',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the background color for the header.', 'am-logistics'),
            'id' => 'header_01_bg_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Header Background Color', 'am-logistics'),
            'default' => array(
                'color' => '#000000',
                'alpha' => 0
            ),
        ),
        array(
            'subtitle' => esc_html__('Select an image for the header background. If left empty, the header background color will be used.', 'am-logistics'),
            'id' => 'header_01_bg_image',
            'type' => 'background',
            'title' => esc_html__('Header Background Image', 'am-logistics'),
            'background-color' => false,
        ),
        array(
            'id' => 'header_01_padding',
            'title' => esc_html__('Header Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the header. Enter values including any valid CSS unit, ex: 0px, 0px, 0px, 0px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '0px',
                'padding-right' => '0px',
                'padding-bottom' => '0px',
                'padding-left' => '0px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'header_01_padding_large',
            'title' => esc_html__('Header Padding Large Screen', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the header. Apply for large screen (> 1700px)', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '0px',
                'padding-right' => '80px',
                'padding-bottom' => '0px',
                'padding-left' => '80px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'header_01_info_logo',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Logo Settings', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('The bellow is option of Logo you can change for Header Style 01', 'am-logistics'),
        ),
        array(
            'title' => esc_html__('Logo Position', 'am-logistics'),
            'subtitle' => esc_html__('Controls the logo position. "Center" only works on Header 4', 'am-logistics'),
            'id' => 'header_01_logo_position',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'am-logistics'),
                'right' => esc_html__('Right', 'am-logistics'),
            )
        ),
        array(
            'title' => esc_html__('Select Logo', 'am-logistics'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'am-logistics'),
            'id' => 'header_01_main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url' => get_template_directory_uri() . '/assets/images/logo.png'
            )
        ),
        array(
            'title' => esc_html__('Logo Area Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the logo area [In Pixel, such as 250px]', 'am-logistics'),
            'id' => 'header_01_logo_width',
            'type' => 'slider',
            "default" => 180,
            "min" => 30,
            "step" => 1,
            "max" => 600,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Logo Max Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the max hegith of the logo, width of the logo is auto', 'am-logistics'),
            'id' => 'header_01_logo_height',
            'type' => 'slider',
            "default" => 60,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label'
        ),
        array(
            'id' => 'header_01_logo_margin',
            'title' => esc_html__('Logo Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 25px, 50px, 25px, 0px..', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '0px',
                'margin-right' => '0px',
                'margin-bottom' => '5px',
                'margin-left' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'header_01_info_menu',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Menu Settings', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('The bellow is option of Menu you can change for Header Style 01', 'am-logistics'),
        ),
        array(
            'id' => 'header_01_menu_padding',
            'title' => esc_html__('Menu Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the left and right padding for the menu. Enter values including any valid CSS unit, ex: 25px, 25px', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'top' => false,
            'bottom' => false,
            'default' => array(
                'margin-right' => '0px',
                'margin-left' => '0px',
                'units' => 'px',
            )
        ),
        array(
            'title' => esc_html__('Menu Alignment', 'am-logistics'),
            'subtitle' => 'Controls the menu alignment.',
            'id' => 'header_01_menu_alignment',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'am-logistics'),
                'center' => esc_html__('Center', 'am-logistics'),
                'right' => esc_html__('Right', 'am-logistics'),
            ),
        ),
        array(
            'title' => esc_html__('Menu Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the menu height.', 'am-logistics'),
            'id' => 'header_01_menu_height',
            'type' => 'slider',
            "default" => 62,
            "min" => 40,
            "step" => 2,
            "max" => 300,
            'display_value' => 'label'
        ),
        array(
            'title' => esc_html__('Menu Item Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the right padding for menu text (left on RTL). In pixels.', 'am-logistics'),
            'id' => 'header_01_menu_item_padding',
            'type' => 'slider',
            "default" => 17,
            "min" => 10,
            "step" => 1,
            "max" => 100,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => esc_html__('Turn on to display arrow indicators next to parent level menu items.', 'am-logistics'),
            'id' => 'header_01_menu_indicator',
            'type' => 'switch',
            'title' => esc_html__('Menu Dropdown Indicator', 'am-logistics'),
            'default' => false,
        ),
        array(
            'id' => 'header_01_menu_typography_first_level',
            'type' => 'typography',
            'title' => esc_html__('Menu Typography - First Level', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '15px',
                'letter-spacing' => '1px',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-weight' => '700',
				'text-transform' => 'uppercase',
                'font-backup' => 'Arial, Helvetica, sans-serif',
            )
        ),
        array(
            'id' => 'header_01_menu_typography_sub_level',
            'type' => 'typography',
            'title' => esc_html__('Menu Typography - Sub Level', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'text-transform' => true,
            'units' => 'px',
            'default' => array(
                'font-size' => '16px',
                'letter-spacing' => '0px',
                'text-transform' => 'capitalize',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-weight' => '700',
                'font-backup' => 'Arial, Helvetica, sans-serif',
            )
        ),
        array(
            'subtitle' => esc_html__('Turn on to display sidebar on the Menu bar', 'am-logistics'),
            'id' => 'header_01_right_sidebar',
            'type' => 'switch',
            'title' => esc_html__('Right Sidebar?', 'am-logistics'),
            'default' => true,
        ),
        array(
            'title' => esc_html__('Right Sidebar Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls widht of the right sidebar on the Menu bar, if yuo have assigned a widget for that position', 'am-logistics'),
            'id' => 'header_01_right_sidebar_width',
            'type' => 'slider',
            "default" => 100,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label',
            'required' => array(0 => 'header_01_right_sidebar', 1 => '=', 2 => 1),
        ),
    ),
);

/* Header Sticky */
$this->sections[] = array(
    'title' => esc_html__('Header Sticky', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable sticky mode for menu Tablets.', 'am-logistics'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => esc_html__('Sticky Tablets', 'am-logistics'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('Enable sticky mode for menu Mobile.', 'am-logistics'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => esc_html__('Sticky Mobile', 'am-logistics'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for the sticky header.', 'am-logistics'),
            'id' => 'sticky_header_bg_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Sticky Header Background Color', 'am-logistics'),
            'default' => array(
                'color' => 'rgba(0, 0, 0, 0.94)',
                'alpha' => 1,
                'rgab' => 'rgba(255, 87, 34, 0.8)'
            ),
        ),
        array(
            'subtitle' => esc_html__('Select an image for the sticky header background. If left empty, the sticky header background color will be used.', 'am-logistics'),
            'id' => 'sticky_header_bg_image',
            'type' => 'background',
            'title' => esc_html__('Sticky Header Background Image', 'am-logistics'),
            'background-color' => 'false',
        ),
        array(
            'id' => 'sticky_header_padding',
            'title' => esc_html__('Sticky Header Padding', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '0px',
                'padding-right' => '0px',
                'padding-bottom' => '0px',
                'padding-left' => '0px',
                'units' => 'px',
            ),
        ),
        array(
            'title' => esc_html__('Select Sticky Logo', 'am-logistics'),
            'subtitle' => esc_html__('Select an image file for your sticky header logo.', 'am-logistics'),
            'id' => 'sticky_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url' => get_template_directory_uri() . '/assets/images/logo.png'
            ),
        ),
        array(
            'title' => esc_html__('Sticky Logo Max Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the max hegith of the logo, width of the logo is auto', 'am-logistics'),
            'id' => 'sticky_logo_height',
            'type' => 'slider',
            "default" => 45,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label',
        ),
        array(
            'id' => 'sticky_logo_margin',
            'title' => esc_html__('Sticky Logo Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 25px, 50px, 25px, 0px..', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '5px',
                'margin-right' => '0px',
                'margin-bottom' => '5px',
                'margin-left' => '15px',
                'units' => 'px',
            ),
        ),
        array(
            'title' => esc_html__('Sticky Menu Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the menu height.', 'am-logistics'),
            'id' => 'sticky_nav_height',
            'type' => 'slider',
            "default" => 62,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label',
        ),
        array(
            'title' => esc_html__('Sticky Menu Item Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the right padding for menu text (left on RTL). In pixels.', 'am-logistics'),
            'id' => 'sticky_nav_padding',
            'type' => 'slider',
            "default" => 17,
            "min" => 10,
            "step" => 1,
            "max" => 200,
            'display_value' => 'label',
        ),
        array(
            'subtitle' => esc_html__('Controls the color for the collapse icon on the sticky menu', 'am-logistics'),
            'id' => 'sticky_collapse_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Sticky Collapse Color', 'am-logistics'),
            'default' => '#333333'
        ),
        array(
            'id' => 'sticky_nav_typography_first_level',
            'type' => 'typography',
            'title' => esc_html__('Sticky Menu Typography - First Level', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'output' => array('.header-sticky.affix .menu-main-menu-container > ul > li > a '),
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '15px',
                'letter-spacing' => '1px',
                'text-transform' => 'uppercase',
                'font-family' => 'Arial, Helvetica, sans-serif',
            ),
        ),
        array(
            'id' => 'sticky_nav_typography_sub_level',
            'type' => 'typography',
            'title' => esc_html__('Sticky Menu Typography - Sub Level', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'text-transform' => true,
            'output' => array('.header-sticky.affix .menu-main-menu-container > li ul a ', '.menu-main-menu-container > ul > li ul a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '16px',
                'letter-spacing' => '0px',
                'text-transform' => 'capitalize',
                'font-family' => 'Arial, Helvetica, sans-serif',
            ),
        ),
    )
);

/* Header Phone */
$this->sections[] = array(
    'title' => esc_html__('Header Phone', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'header_phone_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Header Phone Settings', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('This is settings for Header Phone', 'am-logistics'),
        ),
        array(
            'title' => esc_html__('Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the height for header.', 'am-logistics'),
            'id' => 'header_phone_height',
            'type' => 'slider',
            "default" => 55,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Select Logo', 'am-logistics'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'am-logistics'),
            'id' => 'header_phone_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url' => get_template_directory_uri() . '/assets/images/logo.png'
            )
        ),
        array(
            'id' => 'header_phone_logo_margin',
            'title' => esc_html__('Header Logo Margin', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '',
                'margin-right' => '',
                'margin-bottom' => '',
                'margin-left' => '15px',
                'units' => 'px',
            ),
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for the header.', 'am-logistics'),
            'id' => 'header_phone_bg_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Header Phone Background', 'am-logistics'),
            'default' => array(
                'color' => '#ffffff',
                'alpha' => 1,
				'rgba'  => 'rgba(255, 255, 255, 0.01)'
            ),
        ),
        array(
            'subtitle' => esc_html__('Controls the color of icon', 'am-logistics'),
            'id' => 'header_phone_icon_color',
            'type' => 'link_color',
            'title' => esc_html__('Icon Color', 'am-logistics'),
            'default' => array(
                'regular' => '#121f36',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'title' => esc_html__('Open Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width for frame of navigation when it opened (zero it is full width)', 'am-logistics'),
            'id' => 'header_phone_frame_width',
            'type' => 'slider',
            "default" => 300,
            "min" => 0,
            "step" => 10,
            "max" => 980,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Open Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the height for frame of navigation when it opened (zero it is full height)', 'am-logistics'),
            'id' => 'header_phone_frame_height',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 10,
            "max" => 1000,
            'display_value' => 'text'
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for the navigation.', 'am-logistics'),
            'id' => 'header_phone_navigation_bg_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Header Navigation Background', 'am-logistics'),
            'default' => array(
                'color' => '#f5f5f5',
                'alpha' => 1,
				'rgba'  => 'rgba(245,245,245,1)'
            ),
        ),
        array(
            'id' => 'header_phone_navigation_padding',
            'title' => esc_html__('Header Navigation Padding', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '25px',
                'padding-right' => '25px',
                'padding-bottom' => '25px',
                'padding-left' => '25px',
                'units' => 'px',
            ),
        ),
		array(
			'id'       => 'header_phone_item_menu_border',
			'type'     => 'border',
			'title'    => esc_html__('Menu item border', 'am-logistics'),
			'default'  => array(
				'border-color'  => '',
				'border-style'  => 'none',
				'border-top' => '',
				'border-right' => '',
				'border-bottom' => '',
				'border-left' => ''
			)
		),
        array(
            'id' => 'header_phone_menu_first_level',
            'type' => 'typography',
            'title' => esc_html__('Menu Font First Level', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'font-style' => true,
			'color' => false,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'text-transform' => true,
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '1px',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-family' => 'Roboto',
                'font-weight' => '700',
				'line-height' => '40px',
				'text-transform' => 'uppercase',
				'text-align'  => 'left'
            ),
        ),
        array(
            'subtitle' => esc_html__('Controls the color of first level', 'am-logistics'),
            'id' => 'header_phone_first_level_color',
            'type' => 'link_color',
            'title' => esc_html__('Menu First Level Color', 'am-logistics'),
            'default' => array(
                'regular' => '#121f36',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'id' => 'header_phone_menu_sub_level',
            'type' => 'typography',
            'title' => esc_html__('Menu Font Sub Level', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'font-style' => true,
			'color' => false,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'text-transform' => true,
            'units' => 'px',
            'default' => array(
                'font-size' => '13px',
                'letter-spacing' => '0',
                'text-transform' => 'capitalize',
				'line-height' => '40px',
				'text-align'  => 'left',
				'font-family' => 'Roboto',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-weight' => '700',
            ),
        ),
        array(
            'subtitle' => esc_html__('Controls the color of sub level', 'am-logistics'),
            'id' => 'header_phone_sub_level_color',
            'type' => 'link_color',
            'title' => esc_html__('Menu Sub Level Color', 'am-logistics'),
            'default' => array(
                'regular' => '#121f36',
                'hover' => '#d10024',
                'active' => '#d10024',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for the sub menu.', 'am-logistics'),
            'id' => 'header_phone_sub_level_bg',
            'type' => 'color_rgba',
            'title' => esc_html__('Menu Sub Level Background Color', 'am-logistics'),
            'default' => array(
                'color' => '#fff',
                'alpha' => 0,
				'rgba'  => 'rgba(255,255,255,0)'
            ),
        ),
	)
);
/* Dropdown Menu */
$this->sections[] = array(
    'title' => esc_html__('Dropdown Menu', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'dropdown_menu_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Dropdown Memu Settings', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('This is settings for Dropdown menu', 'am-logistics'),
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for the dropdown menu.', 'am-logistics'),
            'id' => 'dropdown_menu_bg_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Dropdown Menu Background Color', 'am-logistics'),
            'default' => array(
                'color' => 'rgba(0, 0, 0, 0.94)',
                'alpha' => 1,
				'rgba'  => 'rgba(245,245,245,1)'
            ),
        ),
        array(
            'id' => 'dropdown_menu_padding',
            'title' => esc_html__('Dropdown Menu Padding', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '0px',
                'padding-right' => '0px',
                'padding-bottom' => '0px',
                'padding-left' => '0px',
                'units' => 'px',
            ),
        ),
        array(
            'subtitle' => esc_html__('Controls the border top color for dropdown menu. (Default is primary color)', 'am-logistics'),
            'id' => 'dropdown_menu_border_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Dropdown Border Color', 'am-logistics'),
            'default' => array(
                'color' => '',
                'alpha' => 0,
				'rgba'  => ''
            ),
        ),
        array(
            'title' => esc_html__('Dropdown Border Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the border width for dropdown menu.', 'am-logistics'),
            'id' => 'dropdown_menu_border_width',
            'type' => 'slider',
            "default" => 3,
            "min" => 0,
            "step" => 1,
            "max" => 30,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Dropdown Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the min width for dropdwon menu. (dropdown width is setting from menu builder)', 'am-logistics'),
            'id' => 'dropdown_menu_width',
            'type' => 'slider',
            "default" => 220,
            "min" => 200,
            "step" => 10,
            "max" => 700,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Line Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the line height for dropdwon menu item.', 'am-logistics'),
            'id' => 'dropdown_menu_line_height',
            'type' => 'slider',
            "default" => 40,
            "min" => 25,
            "step" => 1,
            "max" => 80,
            'display_value' => 'text'
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for menu item when hover.', 'am-logistics'),
            'id' => 'dropdown_menu_bg_color_item',
            'type' => 'color_rgba',
            'title' => esc_html__('Item Hover Background Color', 'am-logistics'),
            'default' => array(
                'color' => '#fff',
                'alpha' => 1,
				'rgba'  => 'rgba(255,255,255,1)'
            ),
        ),
        array(
            'subtitle' => esc_html__('Controls the border bottom color for menu item.', 'am-logistics'),
            'id' => 'dropdown_menu_border_color_item',
            'type' => 'color_rgba',
            'title' => esc_html__('Item Border Color', 'am-logistics'),
            'default' => array(
                'color' => '#cecece',
                'alpha' => 1,
				'rgba'  => 'rgba(206,206,206,1)'
            ),
        ),
        array(
            'title' => esc_html__('Item Border Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the border width for menu item.', 'am-logistics'),
            'id' => 'dropdown_menu_border_width_item',
            'type' => 'slider',
            "default" => 1,
            "min" => 0,
            "step" => 1,
            "max" => 10,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Dropdown Menu Alignment', 'am-logistics'),
            'subtitle' => 'Controls the alignment for dropdown menu.',
            'id' => 'dropdown_menu_alignment',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'am-logistics'),
                'center' => esc_html__('Center', 'am-logistics'),
                'right' => esc_html__('Right', 'am-logistics'),
            ),
        ),
	)
);

/**
 * Page Title
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Page Title & BC', 'am-logistics'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the page title area display at 100% width according to the window size. Turn off to follow site width.', 'am-logistics'),
            'id' => 'pt_width',
            'type' => 'switch',
            'title' => esc_html__('100% Page Title Width', 'am-logistics'),
            'default' => false,
        ),
        array(
            'id' => 'pt_layout',
            'title' => esc_html__('Page Title Layouts', 'am-logistics'),
            'subtitle' => esc_html__('Select a Page Title layout default. Foreach pages, you can change the layout by page option. Note: Style 02 only using background color [not allow background image]', 'am-logistics'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri() . '/assets/images/page-title.png',
            )
        ),
        array(
            'title' => esc_html__('Page Title Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the height of the page title bar on desktop. Enter value including any valid CSS unit, ex: 100px.', 'am-logistics'),
            'id' => 'pt_height',
            'type' => 'slider',
            "default" => 300,
            "min" => 1,
            "step" => 1,
            "max" => 800,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Page Title Mobile Height', 'am-logistics'),
            'subtitle' => esc_html__('Controls the height of the page title bar on mobile. Enter value including any valid CSS unit, ex: 70px.', 'am-logistics'),
            'id' => 'pt_mobile_height',
            'type' => 'slider',
            "default" => 160,
            "min" => 1,
            "step" => 1,
            "max" => 500,
            'display_value' => 'text'
        ),
        array(
            'id' => 'pt_background',
            'type' => 'background',
            'title' => esc_html__('Page Title Background', 'am-logistics'),
            'subtitle' => esc_html__('Controls the background of the page title.', 'am-logistics'),
            'default' => array(
                'background-color' => '#000000',
                'background-repeat' => 'no-repeat',
                'background-size' => 'cover',
				'background-image' => get_template_directory_uri() . '/assets/images/bg-page-title.jpg',
                'background-attachment' => '',
                'background-position' => 'center center',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the border colors top/bottom of the page title.', 'am-logistics'),
            'id' => 'pt_border_color',
            'type' => 'color',
            'title' => esc_html__('Page Title Borders Color', 'am-logistics'),
            'default' => '#e5e5e5',
        ),
        array(
            'title' => esc_html__('Page Title Borders Width Top', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the page title border top, ex: 2px.', 'am-logistics'),
            'id' => 'pt_border_width_top',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Page Title Borders Width Bottom', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the page title border bottom, ex: 2px.', 'am-logistics'),
            'id' => 'pt_border_width_bottom',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'text'
        ),
        array(
            'id' => 'pt_margin',
            'title' => esc_html__('Page Title Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the Page Title. Enter values including any valid CSS unit, ex: 0px, 0px, 80px, 0px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '0',
                'margin-right' => '0',
                'margin-bottom' => '80px',
                'margin-left' => '0',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'pt_margin_tablet',
            'title' => esc_html__('Page Title Margin Tablet', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the Page Title. Enter values including any valid CSS unit, ex: 0px, 0px, 80px, 0px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '0',
                'margin-right' => '0',
                'margin-bottom' => '60px',
                'margin-left' => '0',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'pt_margin_phone',
            'title' => esc_html__('Page Title Margin Phone', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the Page Title. Enter values including any valid CSS unit, ex: 0px, 0px, 80px, 0px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '0',
                'margin-right' => '0',
                'margin-bottom' => '40px',
                'margin-left' => '0',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'pt_parallax',
            'title' => esc_html__('Enable Header Parallax', 'am-logistics'),
            'type' => 'switch',
            'default' => false
        ),
    )
);
/* Page Title */
$this->sections[] = array(
    'title' => esc_html__('Page Title Text', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Page Title Text Alignment', 'am-logistics'),
            'subtitle' => esc_html__('Controls the page title bar text alignment.', 'am-logistics'),
            'id' => 'pt_alignment',
            'default' => 'center',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'am-logistics'),
                'center' => esc_html__('Center', 'am-logistics'),
                'right' => esc_html__('Right', 'am-logistics'),
            )
        ),
        array(
            'title' => esc_html__('Page Title Vertical Alignment', 'am-logistics'),
            'subtitle' => esc_html__('Controls the page title bar text alignment.', 'am-logistics'),
            'id' => 'pt_vertical_alignment',
            'default' => 'custom',
            'type' => 'button_set',
            'options' => array(
                'middle' => esc_html__('Middle', 'am-logistics'),
                'custom' => esc_html__('Custom Padding', 'am-logistics'),
            )
        ),
        array(
            'id' => 'pt_text_padding',
            'title' => esc_html__('Page Title Text Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for the Page Title Text. Enter values including any valid CSS unit, ex: 0px, 80px', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '130px',
                'padding-right' => '0px',
                'padding-bottom' => '30px',
                'padding-left' => '0px',
                'units' => 'px',
            ),
            'required' => array(0 => 'pt_vertical_alignment', 1 => '=', 2 => 'custom')
        ),
        array(
            'id' => 'pg_typography',
            'type' => 'typography',
            'title' => esc_html__('Page Title Typography', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-transform' => true,
            'letter-spacing' => true,
            'text-align' => false,
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with title text.', 'am-logistics'),
            'default' => array(
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '30px',
                'line-height' => '60px',
                'font-family' => 'Roboto',
                'font-weight' => '700',
                'color' => '#ffffff',
				'text-transform' => 'uppercase',
                'letter-spacing' => '1px',
            )
        ),
        array(
            'id' => 'pt_sub',
            'title' => 'Sub Title',
            'subtitle' => esc_html__('Enter the sub title you want displays in the bottom of Page Title.', 'am-logistics'),
            'type' => 'text',
            'default' => ''
        ),
        array(
            'id' => 'pg_sub_typography',
            'type' => 'typography',
            'title' => esc_html__('Sub Title Typography', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-transform' => true,
            'text-align' => false,
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with sub title.', 'am-logistics'),
            'default' => array(
				'font-family' => 'Roboto',
                'font-weight' => '700',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '14px',
				'text-transform' => 'uppercase',
				'color' => '#ffffff',
                'line-height' => '20px'
            )
        ),
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'title' => esc_html__('Breadcrumb', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Breadcrumbs Content Display', 'am-logistics'),
            'subtitle' => esc_html__('Controls what displays in the breadcrumbs area.(Page Title Sidebar config from Widget)', 'am-logistics'),
            'id' => 'pt_breadcrumb',
            'default' => 'breadcrumb',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'am-logistics'),
                'breadcrumb' => esc_html__('Breadcrumbs', 'am-logistics'),
                'sidebar' => esc_html__('Page Title Sidebar', 'am-logistics'),
            )
        ),
        array(
            'title' => esc_html__('Breadcrumbs Position', 'am-logistics'),
            'subtitle' => esc_html__('Controls where to displays in the Page Title area. (Symmetric is not avalaible when Page Title Alignment center)', 'am-logistics'),
            'id' => 'pt_breadcrumb_position',
            'default' => 'symmetric',
            'type' => 'button_set',
            'options' => array(
                'bellow' => esc_html__('Bellow', 'am-logistics'),
                'above' => esc_html__('Above', 'am-logistics'),
                'symmetric' => esc_html__('Symmetric', 'am-logistics'),
            ),
            'required' => array(0 => 'pt_breadcrumb', 1 => '!=', 2 => 'none')
        ),
        array(
            'subtitle' => esc_html__('Controls the text before the breadcrumb menu.', 'am-logistics'),
            'id' => 'breacrumb_prefix',
            'type' => 'text',
            'title' => esc_html__('Breadcrumbs Prefix', 'am-logistics'),
            'default' => 'Home',
            'required' => array(0 => 'pt_breadcrumb', 1 => '=', 2 => 'breadcrumb')
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => esc_html__('Breadcrumb Typography', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-align' => false,
            'text-transform' => true,
            'units' => 'px',
            'subtitle' => esc_html__('Controls the Typography for the breadcrumbs text.', 'am-logistics'),
            'default' => array(
                'color' => '#ffffff',
                'font-weight' => '700',
                'font-family' => 'Roboto',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '14px',
                'line-height' => '20px',
            ),
            'required' => array(0 => 'pt_breadcrumb', 1 => '=', 2 => 'breadcrumb')
        ),
    )
);



/**
 * Footer
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Footer', 'am-logistics'),
    'icon' => 'el el-th',
    'fields' => array(
        array(
            'title' => esc_html__('100% Footer Width', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to have the footer area display at 100% width according to the window size. Turn off to follow site width.', 'am-logistics'),
            'id' => 'footer_width',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'id' => 'footer_padding',
            'title' => esc_html__('Footer Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the footer. Enter values including any valid CSS unit, ex: 43px, 40px, 0px, 0px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '50px',
                'padding-right' => '0px',
                'padding-bottom' => '20px',
                'padding-left' => '0px',
                'units' => 'px',
            ),
        ),
        array(
            'id' => 'footer_background',
            'type' => 'background',
            'title' => esc_html__('Footer Background', 'am-logistics'),
            'subtitle' => esc_html__('Controls the background of the footer.', 'am-logistics'),
            'default' => array(
                'background-color' => '#15161d',
				'background-repeat' => 'no-repeat',
                'background-position' => 'center bottom',
				'background-image' =>  get_template_directory_uri() . '/assets/images/logictisc-background-footer.png'
            ),
        ),
        array(
            'subtitle' => esc_html__('Controls the border colors top of the Footer.', 'am-logistics'),
            'id' => 'footer_border_color',
            'type' => 'color',
            'title' => esc_html__('Footer Borders Color', 'am-logistics'),
            'default' => '#d10024',
        ),
        array(
            'title' => esc_html__('Footer Borders Width Top', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the Footer border top, ex: 2px.', 'am-logistics'),
            'id' => 'footer_border_width_top',
            'type' => 'slider',
            "default" => 3,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'label'
        ),
        array(
            'id' => 'footer_heading_typography',
            'type' => 'typography',
            'title' => esc_html__('Footer Headings Typography', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-align' => false,
            'text-transform' => true,
            'units' => 'px',
            'output' => array('#zo-footer-content h3'),
            'subtitle' => esc_html__('These settings control the typography for the footer headings.', 'am-logistics'),
            'default' => array(
                'text-transform' => 'capitalize',
                'color' => '#fff',
                'font-weight' => '700',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '24px',
                'line-height' => '22px',
            ),
            'required' => array(0 => 'footer_widgets', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of the footer font.', 'am-logistics'),
            'id' => 'footer_font_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Footer Font Color', 'am-logistics'),
            'default' => '#cccccc',
            'required' => array(0 => 'footer_widgets', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Enable back to top button.', 'am-logistics'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => esc_html__('Back To Top', 'am-logistics'),
            'default' => true,
        ),
    )
);

/* Footer content */
$this->sections[] = array(
    'title' => esc_html__('Footer Widgets', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to display footer widgets.', 'am-logistics'),
            'id' => 'footer_widgets',
            'type' => 'switch',
            'title' => esc_html__('Footer Widgets', 'am-logistics'),
            'default' => true,
        ),
        array(
            'title' => esc_html__('Number of Footer Columns', 'am-logistics'),
            'subtitle' => esc_html__('Controls the number of columns in the footer.', 'am-logistics'),
            'id' => 'footer_column',
            'type' => 'slider',
            "default" => 4,
            "min" => 1,
            "step" => 1,
            "max" => 6,
            'display_value' => 'label',
            'required' => array(0 => 'footer_widgets', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Size of column 1', 'am-logistics'),
            'subtitle' => esc_html__('Controls the size of column 1 (only for medium & large screen).', 'am-logistics'),
            'id' => 'footer_column_1',
            'type' => 'slider',
            "default" => 4,
            "min" => 1,
            "step" => 1,
            "max" => 12,
            'display_value' => 'label',
            'required' => array(0 => 'footer_widgets', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Size of column 2', 'am-logistics'),
            'subtitle' => esc_html__('Controls the size of column 2 (only for medium & large screen).', 'am-logistics'),
            'id' => 'footer_column_2',
            'type' => 'slider',
            "default" => 3,
            "min" => 1,
            "step" => 1,
            "max" => 12,
            'display_value' => 'label',
            'required' => array(0 => 'footer_column', 1 => '>', 2 => 1)
        ),
        array(
            'title' => esc_html__('Size of column 3', 'am-logistics'),
            'subtitle' => esc_html__('Controls the size of column 3 (only for medium & large screen).', 'am-logistics'),
            'id' => 'footer_column_3',
            'type' => 'slider',
            "default" => 5,
            "min" => 1,
            "step" => 1,
            "max" => 12,
            'display_value' => 'label',
            'required' => array(0 => 'footer_column', 1 => '>', 2 => 2)
        ),
        array(
            'title' => esc_html__('Size of column 4', 'am-logistics'),
            'subtitle' => esc_html__('Controls the size of column 4 (only for medium & large screen).', 'am-logistics'),
            'id' => 'footer_column_4',
            'type' => 'slider',
            "default" => 3,
            "min" => 1,
            "step" => 1,
            "max" => 12,
            'display_value' => 'label',
            'required' => array(0 => 'footer_column', 1 => '>', 2 => 3)
        ),
        array(
            'title' => esc_html__('Size of column 5', 'am-logistics'),
            'subtitle' => esc_html__('Controls the size of column 5 (only for medium & large screen).', 'am-logistics'),
            'id' => 'footer_column_5',
            'type' => 'slider',
            "default" => 3,
            "min" => 1,
            "step" => 1,
            "max" => 12,
            'display_value' => 'label',
            'required' => array(0 => 'footer_column', 1 => '>', 2 => 4)
        ),
        array(
            'title' => esc_html__('Size of column 6', 'am-logistics'),
            'subtitle' => esc_html__('Controls the size of column 6 (only for medium & large screen).', 'am-logistics'),
            'id' => 'footer_column_6',
            'type' => 'slider',
            "default" => 3,
            "min" => 1,
            "step" => 1,
            "max" => 12,
            'display_value' => 'label',
            'required' => array(0 => 'footer_column', 1 => '>', 2 => 5)
        ),
        array(
            'id' => 'footer_column_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Note:', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('Please make sure total of size for all column is 12', 'am-logistics'),
        ),
    )
);

/* Footer Copyright */
$this->sections[] = array(
    'title' => esc_html__('Footer Copyright', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to display the copyright bar.', 'am-logistics'),
            'id' => 'footer_copyright',
            'type' => 'switch',
            'title' => esc_html__('Copyright Bar', 'am-logistics'),
            'default' => true,
        ),
        array(
            'id' => 'footer_copyright_padding',
            'title' => esc_html__('Copyright Padding', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'subtitle' => esc_html__('Controls the top/bottom padding for the copyright area. Enter values including any valid CSS unit, ex: 20px, 15px.', 'am-logistics'),
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top' => '10px',
                'padding-bottom' => '10px',
                'units' => 'px',
            ),
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'footer_copyright_background',
            'type' => 'color',
            'transparent' => true,
            'title' => esc_html__('Copyright Background Color', 'am-logistics'),
            'subtitle' => esc_html__('Controls the background of the copyright.', 'am-logistics'),
            'default' => '#1e1f29',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the border colors top of the Copyright.', 'am-logistics'),
            'id' => 'footer_copyright_border_color',
            'type' => 'color',
            'title' => esc_html__('Copyright Borders Color', 'am-logistics'),
            'default' => '#d10024',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Copyright Borders Width Top', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the Copyright border top, ex: 2px.', 'am-logistics'),
            'id' => 'footer_copyright_border_width_top',
            'type' => 'slider',
            "default" => 3,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'label',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Copyright Alignment', 'am-logistics'),
            'subtitle' => esc_html__('Controls Copyright alignment.', 'am-logistics'),
            'id' => 'footer_copyright_alignment',
            'default' => 'center',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'am-logistics'),
                'center' => esc_html__('Center', 'am-logistics'),
                'right' => esc_html__('Right', 'am-logistics'),
            ),
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
		array(
            'title' => esc_html__('Copyright Borders Full Width', 'am-logistics'),
            'id' => 'copyright_border_full_width',
            'type' => 'switch',
            'subtitle' => esc_html__('Controls the border Copyright full width.', 'am-logistics'),
            'default' => true
        ),
        array(
            'id' => 'footer_copyright_text',
            'type' => 'textarea',
            'title' => esc_html__('Copyright Text', 'am-logistics'),
            'subtitle' => esc_html__('Enter the text that displays in the copyright bar. HTML markup can be used.', 'am-logistics'),
            'validate' => 'html_custom',
            'default' => '©Copyright <script>document.write(new Date().getFullYear());</script>   |   DroneTop1!, Made by <a href="https://dronetop1.com" target="_blank"> DroneTop1!</a>   |   All Rights Reserved.',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'target' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'script' => array()
            ),
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of the Copyright font.', 'am-logistics'),
            'id' => 'footer_copyright_font_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Copyright Font Color', 'am-logistics'),
            'default' => '#999999',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of the Copyright link font.', 'am-logistics'),
            'id' => 'footer_copyright_link_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Copyright Link Color', 'am-logistics'),
            'default' => '#ffffff',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'footer_copyright_extra',
            'type' => 'select',
            'title' => esc_html__('Copyright Extra Content', 'am-logistics'),
            'subtitle' => esc_html__('Controls the other info to displays in the copyright bar.', 'am-logistics'),
            'options' => array(
                '0' => 'None',
                '1' => 'Social Links',
                '2' => 'Copyright Extra Sidebar',
            ),
            'default' => '1',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Copyright Extra Position', 'am-logistics'),
            'subtitle' => esc_html__('Controls where to displays in the Copyright area. (Symmetric is not avalaible when Copyright Alignment center)', 'am-logistics'),
            'id' => 'footer_copyright_extra_position',
            'default' => 'symmetric',
            'type' => 'button_set',
            'options' => array(
                'above' => esc_html__('Above', 'am-logistics'),
                'bellow' => esc_html__('Bellow', 'am-logistics'),
                'symmetric' => esc_html__('Symmetric', 'am-logistics'),
            ),
            'required' => array(0 => 'footer_copyright_extra', 1 => 'is_larger', 2 => 0)
        ),
    )
);


/**
 * Typography
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Typography', 'am-logistics'),
    'icon' => 'el el-fontsize',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'output' => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#000000',
                'font-weight' => '700',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '14px',
                'line-height' => '25px',
            ),
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'am-logistics'),
            'desc' => esc_html__('No units were entered for font-size, falling back to using pixels. Saved value "0" and not "". No units were entered for letter-spacing, falling back to using pixels. Saved value "0" and not "".', 'am-logistics')
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1 Headers Typography', 'am-logistics'),
            'subtitle' => esc_html__('These settings control the typography for all H1 Headers.', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#393939',
                'font-weight' => '700',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '35px',
                'line-height' => '35px'
            )
        ),
        array(
            'id' => 'font_h1_margin',
            'title' => esc_html__('H1 Headers Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H1. Enter values including any valid CSS unit, ex: 0px, 15px..', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2 Headers Typography', 'am-logistics'),
            'subtitle' => esc_html__('These settings control the typography for all H2 Headers.', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#121f36',
                'font-weight' => '700',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '30px',
                'line-height' => '40px'
            )
        ),
        array(
            'id' => 'font_h2_margin',
            'title' => esc_html__('H2 Headers Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H2. Enter values including any valid CSS unit, ex: 0px, 15px..', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '5px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3 Headers Typography', 'am-logistics'),
            'subtitle' => esc_html__('These settings control the typography for all H3 Headers.', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#121f36',
                'font-weight' => '700',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '24px',
                'line-height' => '35px'
            )
        ),
        array(
            'id' => 'font_h3_margin',
            'title' => esc_html__('H3 Headers Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H3. Enter values including any valid CSS unit, ex: 0px, 15px..', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4 Headers Typography', 'am-logistics'),
            'subtitle' => esc_html__('These settings control the typography for all H4 Headers.', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#121f36',
                'font-weight' => '500',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '20px',
                'line-height' => '25px'
            )
        ),
        array(
            'id' => 'font_h4_margin',
            'title' => esc_html__('H4 Headers Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H4. Enter values including any valid CSS unit, ex: 0px, 15px..', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5 Headers Typography', 'am-logistics'),
            'subtitle' => esc_html__('These settings control the typography for all H5 Headers.', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#121f36',
                'font-weight' => '700',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '18px',
                'line-height' => '25px'
            )
        ),
        array(
            'id' => 'font_h5_margin',
            'title' => esc_html__('H5 Headers Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H5. Enter values including any valid CSS unit, ex: 0px, 15px..', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6 Headers Typography', 'am-logistics'),
            'subtitle' => esc_html__('These settings control the typography for all H6 Headers.', 'am-logistics'),
            'letter-spacing' => true,
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#121f36',
                'font-weight' => '700',
                'font-family' => 'Arial, Helvetica, sans-serif',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '16px',
                'line-height' => '25px'
            )
        ),
        array(
            'id' => 'font_h6_margin',
            'title' => esc_html__('H6 Headers Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H6. Enter values including any valid CSS unit, ex: 0px, 15px..', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
    )
);
/* Responsive headings */
$this->sections[] = array(
    'title' => esc_html__('Mobile Headings', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on for headings (H1 to H6) to change font size responsively on Mobile device.', 'am-logistics'),
            'id' => 'mobile_heading',
            'type' => 'switch',
            'title' => esc_html__('Mobile Headings Typography', 'am-logistics'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Mobile Headings Typography Sensitivity', 'am-logistics'),
            'subtitle' => esc_html__('Values below 100% decrease rate of resizing, values above 100% increase rate of resizing. (In percent)', 'am-logistics'),
            'id' => 'mobile_heading_sensitivity',
            'type' => 'slider',
            "default" => 70,
            "min" => 30,
            "step" => 5,
            "max" => 200,
            'display_value' => 'text',
            'required' => array(0 => 'mobile_heading', 1 => '=', 2 => 1)
        ),
        array(
            'id'       => 'mobile_heading_tags',
            'type'     => 'sortable',
            'title'    => esc_html__('Resize for?', 'am-logistics'),
            'subtitle' => esc_html__('Select the heading tag you want apply re-size function', 'am-logistics'),
            'mode'     => 'checkbox',
            'options'  => array(
                '1'     => 'H1',
                '2'     => 'H2',
                '3'     => 'H3',
                '4'     => 'H4',
                '5'     => 'H5',
                '6'     => 'H6',
            ),
            // For checkbox mode
            'default' => array(
                '1' => true,
                '2' => true,
                '3' => true,
                '4' => false,
                '5' => false,
                '6' => false,
            ),
            'required' => array(0 => 'mobile_heading', 1 => '=', 2 => 1),
        ),
    )
);
/* extra font. */
$this->sections[] = array(
    'title' => esc_html__('Extra Fonts', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Extra Font 1', 'am-logistics'),
            'subtitle' => esc_html__('Select a font to use throughout Typography settings', 'am-logistics'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align' => false,
            'line-height' => false,
            'font-size' => false,
            'font-weight' => false,
            'subsets' => false,
            'default' => array(
                'font-family' => 'Dosis'
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Elements', 'am-logistics'),
            'subtitle' => esc_html__('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', 'am-logistics'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'google-font-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => esc_html__('Extra Font 2', 'am-logistics'),
            'subtitle' => esc_html__('Select a font to use throughout Typography settings', 'am-logistics'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align' => false,
            'line-height' => false,
            'font-size' => false,
            'font-weight' => false,
            'subsets' => false,
            'default' => array(
                'font-family' => 'Oswald'
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Elements', 'am-logistics'),
            'subtitle' => esc_html__('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', 'am-logistics'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font2',
            'required' => array(
                0 => 'google-font-2',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => esc_html__('Extra Font 3', 'am-logistics'),
            'subtitle' => esc_html__('Select a font to use throughout Typography settings', 'am-logistics'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align' => false,
            'line-height' => false,
            'font-size' => false,
            'font-weight' => false,
            'subsets' => false,
            'default' => array(
                'font-family' => 'Roboto'
            )
        ),
        array(
            'id' => 'google-font-selector-3',
            'type' => 'textarea',
            'title' => esc_html__('Elements', 'am-logistics'),
            'subtitle' => esc_html__('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', 'am-logistics'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font3',
            'required' => array(
                0 => 'google-font-3',
                1 => '!=',
                2 => ''
            )
        ),
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => esc_html__('Local Fonts', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'local-fonts-1',
            'type' => 'select',
            'title' => esc_html__('Fonts 1', 'am-logistics'),
            'options' => $local_fonts,
            'default' => '',
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'am-logistics'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'am-logistics'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'local-fonts-2',
            'type' => 'select',
            'title' => esc_html__('Fonts 2', 'am-logistics'),
            'options' => $local_fonts,
            'default' => '',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Selector 2', 'am-logistics'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'am-logistics'),
            'validate' => 'no_html',
            'default' => '.zo_local_font_2',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);
$this->sections[] = array(
    'title' => esc_html__('Button', 'am-logistics'),
    'icon' => 'el el-minus',
    'fields' => array(
        array(
            'id' => 'btn_tiny_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Tiny Button', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('Setting Font and Spacing for Tiny button, output class is btn-tiny [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'btn_tiny_font',
            'type' => 'typography',
            'title' => esc_html__('Tiny Button Font', 'am-logistics'),
            'subtitle' => esc_html__('Controls the font styles for the Tiny button', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '12px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
                'line-height' => '20px',
                'font-family' => 'Roboto',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-weight' => 500,
            )
        ),
        array(
            'id' => 'btn_tiny_padding',
            'title' => esc_html__('Tiny Button Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 5px, 10px, 5px, 10px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '4px',
                'padding-right' => '15px',
                'padding-bottom' => '4px',
                'padding-left' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'btn_small_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Small Button', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('Setting Font and Spacing for Small button, output class is btn-small [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'btn_small_font',
            'type' => 'typography',
            'title' => esc_html__('Small Button Font', 'am-logistics'),
            'subtitle' => esc_html__('Controls the font styles for the Small button', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
                'line-height' => '20px',
                'font-family' => 'Roboto',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-weight' => 500,
            )
        ),
        array(
            'id' => 'btn_small_padding',
            'title' => esc_html__('Small Button Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 10px, 20px, 10px, 20px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '7px',
                'padding-right' => '20px',
                'padding-bottom' => '7px',
                'padding-left' => '20px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'btn_medium_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Medium Button', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('Setting Font and Spacing for Medium button, output class is btn-medium [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'btn_medium_font',
            'type' => 'typography',
            'title' => esc_html__('Medium Button Font', 'am-logistics'),
            'subtitle' => esc_html__('Controls the font styles for the Medium button', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '17px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
                'line-height' => '25px',
                'font-family' => 'Roboto',
                'font-weight' => 700,
                'font-backup' => 'Arial, Helvetica, sans-serif',
            )
        ),
        array(
            'id' => 'btn_medium_padding',
            'title' => esc_html__('Medium Button Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 10px, 20px, 10px, 20px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '8px',
                'padding-right' => '24px',
                'padding-bottom' => '8px',
                'padding-left' => '24px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'btn_large_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Large Button', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('Setting Font and Spacing for Large button, output class is btn-large [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'btn_large_font',
            'type' => 'typography',
            'title' => esc_html__('Large Button Font', 'am-logistics'),
            'subtitle' => esc_html__('Controls the font styles for the Large button', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '20px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
                'line-height' => '25px',
                'font-family' => 'Roboto',
                'font-weight' => 700,
                'font-backup' => 'Arial, Helvetica, sans-serif',
            )
        ),
        array(
            'id' => 'btn_large_padding',
            'title' => esc_html__('Large Button Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 10px, 20px, 10px, 20px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '10px',
                'padding-right' => '30px',
                'padding-bottom' => '10px',
                'padding-left' => '30px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'btn_giant_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Giant Button', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('Setting Font and Spacing for Giant button, output class is btn-giant [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'btn_giant_font',
            'type' => 'typography',
            'title' => esc_html__('Giant Button Font', 'am-logistics'),
            'subtitle' => esc_html__('Controls the font styles for the Giant button', 'am-logistics'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '25px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
                'line-height' => '25px',
                'font-family' => 'Roboto',
                'font-weight' => 700,
                'font-backup' => 'Arial, Helvetica, sans-serif',
            )
        ),
        array(
            'id' => 'btn_giant_padding',
            'title' => esc_html__('Giant Button Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 10px, 20px, 10px, 20px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '15px',
                'padding-right' => '45px',
                'padding-bottom' => '15px',
                'padding-left' => '45px',
                'units' => 'px',
            )
        ),
    ),
);
$this->sections[] = array(
    'title' => esc_html__('Color', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'btn_primary_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Primary Button', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('This is a setting for Primary button, output class is btn-primary [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'btn_primary',
            'type' => 'link_color',
            'title' => esc_html__('Primary Button Background Color', 'am-logistics'),
            'subtitle' => esc_html__('Controls the background color for the Primary button', 'am-logistics'),
            'active' => false,
            'default' => array(
                'regular' => '#d10024',
                'hover' => '#333',
            )
        ),
        array(
            'id' => 'btn_primary_color',
            'type' => 'link_color',
            'title' => esc_html__('Primary Button Color', 'am-logistics'),
            'subtitle' => esc_html__('Controls the color for the Primary button', 'am-logistics'),
            'active' => false,
            'default' => array(
                'regular' => '#FFF',
                'hover' => '#FFF',
            )
        ),
        array(
            'id' => 'btn_secondary_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Secondary Button', 'am-logistics'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('This is a setting for Secondary button, output class is btn-secondary [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'btn_secondary',
            'type' => 'link_color',
            'title' => esc_html__('Secondary Button Background Color', 'am-logistics'),
            'subtitle' => esc_html__('Controls the background color for the secondary button', 'am-logistics'),
            'active' => false,
            'default' => array(
                'regular' => '#333',
                'hover' => '#CDCDCD',
            )
        ),
        array(
            'id' => 'btn_secondary_color',
            'type' => 'link_color',
            'title' => esc_html__('Secondary Button Color', 'am-logistics'),
            'subtitle' => esc_html__('Controls the color for the secondary button', 'am-logistics'),
            'active' => false,
            'default' => array(
                'regular' => '#FFF',
                'hover' => '#d10024',
            )
        ),
    ),
);

/**
 * Blog
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Blog', 'am-logistics'),
    'icon' => 'el el-file-edit',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the blog content area display at 100% width according to the window size. Turn off to follow site width.', 'am-logistics'),
            'id' => 'blog_layout_width',
            'type' => 'switch',
            'title' => esc_html__('100% Width Blog', 'am-logistics'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('Turn on to show the page title bar for the assigned blog page or archive pages', 'am-logistics'),
            'id' => 'blog_pt_bar',
            'type' => 'switch',
            'title' => esc_html__('Page Title Bar', 'am-logistics'),
            'default' => true,
        ),
        array(
            'title' => esc_html__('Blog Page Title', 'am-logistics'),
            'subtitle' => esc_html__('Controls the title text that displays in the page title bar of the assigned blog page.', 'am-logistics'),
            'id' => 'blog_pt',
            'type' => 'text',
            'default' => 'NEWS',
            'required' => array(0 => 'blog_pt_bar', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Blog Sub Title', 'am-logistics'),
            'subtitle' => esc_html__('Controls the subtitle text that displays in the page title bar of the assigned blog page.', 'am-logistics'),
            'id' => 'blog_pt_sub',
            'type' => 'text',
            'default' => '',
            'required' => array(0 => 'blog_pt_bar', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'blog_layout',
            'type' => 'select',
            'title' => esc_html__('Blog Layout', 'am-logistics'),
            'subtitle' => esc_html__('Controls the layout for the assigned blog page', 'am-logistics'),
            'options' => array(
                'medium' => 'Medium',
                'large' => 'Large',
            ),
            'default' => 'medium',
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'am-logistics'),
            'subtitle' => esc_html__('Controls the main sidebar for the Blog Layout', 'am-logistics'),
            'id' => 'blog_layout_sidebar',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'am-logistics'),
                'left' => esc_html__('Left Sidebar', 'am-logistics'),
                'right' => esc_html__('Right Sidebar', 'am-logistics'),
            ),
        ),
        array(
            'subtitle' => esc_html__('Turn on to background for sidebar the Blog Layout', 'am-logistics'),
            'id' => 'blog_layout_sidebar_bg',
            'type' => 'switch',
            'title' => esc_html__('Background style?', 'am-logistics'),
            'default' => false,
        ),
        array(
            'id' => 'blog_archive_layout',
            'type' => 'select',
            'title' => esc_html__('Blog Archive Layout', 'am-logistics'),
            'subtitle' => esc_html__('Controls the layout for the blog archive, tag and author pages.', 'am-logistics'),
            'options' => array(
                'medium' => 'Medium',
                'large' => 'Large',
            ),
            'default' => 'medium',
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'am-logistics'),
            'subtitle' => esc_html__('Controls the main sidebar for the blog archive, tag and author Layout', 'am-logistics'),
            'id' => 'blog_archive_layout_sidebar',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'am-logistics'),
                'left' => esc_html__('Left Sidebar', 'am-logistics'),
                'right' => esc_html__('Right Sidebar', 'am-logistics'),
            ),
        ),
        array(
            'subtitle' => esc_html__('Turn on to background for sidebar the blog archive, tag and author Layout', 'am-logistics'),
            'id' => 'blog_archive_layout_sidebar_bg',
            'type' => 'switch',
            'title' => esc_html__('Background style?', 'am-logistics'),
            'default' => false,
        ),
        array(
            'id' => 'blog_search_layout',
            'type' => 'select',
            'title' => esc_html__('Blog Search Layout', 'am-logistics'),
            'subtitle' => esc_html__('Controls the layout for the blog Search result pages.', 'am-logistics'),
            'options' => array(
                'medium' => 'Medium',
                'large' => 'Large',
            ),
            'default' => 'medium',
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'am-logistics'),
            'subtitle' => esc_html__('Controls the main sidebar for the blog search Layout', 'am-logistics'),
            'id' => 'blog_search_layout_sidebar',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'am-logistics'),
                'left' => esc_html__('Left Sidebar', 'am-logistics'),
                'right' => esc_html__('Right Sidebar', 'am-logistics'),
            ),
        ),
        array(
            'subtitle' => esc_html__('Turn on to background for sidebar on archive pages', 'am-logistics'),
            'id' => 'blog_search_layout_sidebar_bg',
            'type' => 'switch',
            'title' => esc_html__('Background style?', 'am-logistics'),
            'default' => false,
        ),
    )
);


/* Blog Meta */
$this->sections[] = array(
    'title' => esc_html__('Blog Meta', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Controls the pagination type for the assigned blog page', 'am-logistics'),
            'id' => 'blog_pagination',
            'type' => 'button_set',
            'title' => esc_html__('Pagination Type', 'am-logistics'),
            'default' => 'pagination',
            'options' => array(
                'pagination' => esc_html__('Pagination', 'am-logistics'),
                'button' => esc_html__('Load More Button', 'am-logistics'),
            )
        ),
        array(
            'title' => esc_html__('Excerpt Length', 'am-logistics'),
            'subtitle' => esc_html__('Controls the number of words in the post excerpts for the assigned blog page', 'am-logistics'),
            'id' => 'blog_excerpt',
            'type' => 'slider',
            "default" => 30,
            "min" => 0,
            "step" => 1,
            "max" => 500,
            'display_value' => 'text',
        ),
        array(
            'subtitle' => esc_html__('Turn on to show the Read More button for the blog page or archive pages', 'am-logistics'),
            'id' => 'blog_post_readmore',
            'type' => 'switch',
            'title' => esc_html__('Display Read More button', 'am-logistics'),
            'default' => true,
        ),
        array(
            'title' => esc_html__('Read More Text', 'am-logistics'),
            'subtitle' => esc_html__('Controls the text to displays in the Read More button', 'am-logistics'),
            'id' => 'blog_post_readmore_text',
            'type' => 'text',
            'default' => 'Read more',
            'required' => array(0 => 'blog_post_readmore', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Turn on to show the image / video for the blog page or archive pages', 'am-logistics'),
            'id' => 'blog_post_feature_media',
            'type' => 'switch',
            'title' => esc_html__('Featured Image / Video on Blog Page', 'am-logistics'),
            'default' => true,
        ),
        array(
            'title' => esc_html__('Post Title', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post title that goes below the featured image on the blog page or archive pages.', 'am-logistics'),
            'id' => 'blog_post_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Author Info', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the author info on the blog page or archive pages.', 'am-logistics'),
            'id' => 'blog_post_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Blog Date', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post meta date on the blog page or archive pages.', 'am-logistics'),
            'id' => 'blog_post_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Date Format', 'am-logistics'),
            'subtitle' => esc_html__('Controls the date format that displays in the post on the blog page or archive pages. http://codex.wordpress.org/Formatting_Date_and_Time', 'am-logistics'),
            'id' => 'blog_post_date_format',
            'type' => 'text',
            'default' => 'F j, Y',
            'required' => array(0 => 'blog_post_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Post Categories', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post meta categories on the blog page or archive pages.', 'am-logistics'),
            'id' => 'blog_post_categories',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Post Tags', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post meta tags on the blog page or archive pages.', 'am-logistics'),
            'id' => 'blog_post_tags',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Post Comments', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post meta comments on the blog page or archive pages.', 'am-logistics'),
            'id' => 'blog_post_comment',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Social Sharing Box', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the social sharing box on the blog page or archive pages.', 'am-logistics'),
            'id' => 'blog_post_social',
            'type' => 'switch',
            'default' => true,
        ),
    )
);

/* Single Posts */
$this->sections[] = array(
    'title' => esc_html__('Single Posts', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the single post content area display at 100% width according to the window size. Turn off to follow site width.', 'am-logistics'),
            'id' => 'blog_single_width',
            'type' => 'switch',
            'title' => esc_html__('100% Width Single Post', 'am-logistics'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'am-logistics'),
            'subtitle' => esc_html__('Controls the main sidebar for the single blog post', 'am-logistics'),
            'id' => 'blog_single_sidebar',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'am-logistics'),
                'left' => esc_html__('Left Sidebar', 'am-logistics'),
                'right' => esc_html__('Right Sidebar', 'am-logistics'),
            ),
        ),

        array(
            'title' => esc_html__('Featured Image / Video on Single Post', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display featured images and videos on single blog posts.', 'am-logistics'),
            'id' => 'blog_single_media',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Post Title', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post title that goes below the featured image area.', 'am-logistics'),
            'id' => 'blog_single_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Author Info Box', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the author info box below posts.', 'am-logistics'),
            'id' => 'blog_single_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Post Date', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post meta date.', 'am-logistics'),
            'id' => 'blog_single_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Date Format', 'am-logistics'),
            'subtitle' => esc_html__('Controls the date format that displays in the post. http://codex.wordpress.org/Formatting_Date_and_Time', 'am-logistics'),
            'id' => 'blog_single_date_format',
            'type' => 'text',
            'default' => 'F m, Y',
            'required' => array(0 => 'blog_single_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Post Categories', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post meta categories.', 'am-logistics'),
            'id' => 'blog_single_categories',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Post Tags', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the post meta tags.', 'am-logistics'),
            'id' => 'blog_single_tags',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Social Sharing Box', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the social sharing box.', 'am-logistics'),
            'id' => 'blog_single_social',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Previous/Next Pagination', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display the previous/next post pagination for single blog posts.', 'am-logistics'),
            'id' => 'blog_single_pagination',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Related Posts', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display related posts.', 'am-logistics'),
            'id' => 'blog_single_related',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Comments', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display comments.', 'am-logistics'),
            'id' => 'blog_single_comment',
            'type' => 'switch',
            'default' => true,
        ),
    ),
);
$this->sections[] = array(
    'title' => esc_html__('WooCommerce', 'am-logistics'),
    'icon' => 'el el-shopping-cart',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the Shop content area display at 100% width according to the window size. Turn off to follow site width.', 'am-logistics'),
            'id' => 'woo_width',
            'type' => 'switch',
            'title' => esc_html__('100% Width Shop', 'am-logistics'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'am-logistics'),
            'subtitle' => esc_html__('Controls the sidebar for the shop page', 'am-logistics'),
            'id' => 'woo_sidebar',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'am-logistics'),
                'left' => esc_html__('Left Sidebar', 'am-logistics'),
                'right' => esc_html__('Right Sidebar', 'am-logistics'),
            ),
        ),
        array(
            'title' => esc_html__('Select Sidebar', 'am-logistics'),
            'subtitle' => esc_html__('Select the sidebar for the shop page. The content of sidebar is assign from Widget', 'am-logistics'),
            'id' => 'woo_sidebar_type',
            'default' => 'shop',
            'type' => 'button_set',
            'options' => array(
                'main' => esc_html__('Main Sidebar', 'am-logistics'),
                'shop' => esc_html__('Shop Sidebar', 'am-logistics'),
            ),
            'required' => array(0 => 'woo_sidebar', 1 => '!=', 2 => 'none'),
        ),
        array(
            'title' => esc_html__('Sidebar Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'am-logistics'),
            'id' => 'woo_sidebar_size',
            'type' => 'slider',
            "default" => 3,
            "min" => 3,
            "step" => 1,
            "max" => 6,
            'display_value' => 'label',
            'required' => array(0 => 'woo_sidebar', 1 => '!=', 2 => 'none'),
        ),
        array(
            'subtitle' => esc_html__('Turn on to have Product sorting on the top', 'am-logistics'),
            'id' => 'woo_sorting',
            'type' => 'switch',
            'title' => esc_html__('Show Product Sorting?', 'am-logistics'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Product per row', 'am-logistics'),
            'subtitle' => esc_html__('Controls the number of product on the row', 'am-logistics'),
            'id' => 'woo_product_row',
            'type' => 'slider',
            "default" => 4,
            "min" => 2,
            "step" => 1,
            "max" => 4,
            'display_value' => 'label',
        ),
        array(
            'id' => 'woo_pt_background',
            'type' => 'background',
            'title' => esc_html__('Page Title Background', 'am-logistics'),
            'subtitle' => esc_html__('Controls the background of the page title for shop page.', 'am-logistics'),
            'default' => array(
                'background-color' => '#eeeeee',
                'background-image' => get_template_directory_uri() . '/assets/images/logistics-bg-page-title.jpg',
                'background-repeat' => '',
                'background-size' => '',
                'background-attachment' => '',
                'background-position' => ''
            )
        ),
        array(
            'title' => esc_html__('Default Product Page', 'am-logistics'),
            'subtitle' => esc_html__('Controls the URL to set default page on Breadcrumb[Input page ID: 101, 105,...]', 'am-logistics'),
            'id' => 'product_url',
            'type' => 'text',
            'default' => '5',
        ),
    ),
);

$this->sections[] = array(
    'title' => esc_html__('Single Product', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the single content area display at 100% width according to the window size. Turn off to follow site width.', 'am-logistics'),
            'id' => 'woo_single_width',
            'type' => 'switch',
            'title' => esc_html__('100% Width', 'am-logistics'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'am-logistics'),
            'subtitle' => esc_html__('Controls the main sidebar for the Product single page', 'am-logistics'),
            'id' => 'woo_single_sidebar',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'am-logistics'),
                'left' => esc_html__('Left Sidebar', 'am-logistics'),
                'right' => esc_html__('Right Sidebar', 'am-logistics'),
            ),
        ),
        array(
            'title' => esc_html__('Select Sidebar', 'am-logistics'),
            'subtitle' => esc_html__('Select the sidebar for the shop page. The content of sidebar is assign from Widget', 'am-logistics'),
            'id' => 'woo_single_sidebar_type',
            'default' => 'shop',
            'type' => 'button_set',
            'options' => array(
                'main' => esc_html__('Main Sidebar', 'am-logistics'),
                'shop' => esc_html__('Shop Sidebar', 'am-logistics'),
            ),
            'required' => array(0 => 'woo_single_sidebar', 1 => '!=', 2 => 'none'),
        ),
        array(
            'title' => esc_html__('Sidebar Width', 'am-logistics'),
            'subtitle' => esc_html__('Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'am-logistics'),
            'id' => 'woo_single_sidebar_size',
            'type' => 'slider',
            "default" => 3,
            "min" => 3,
            "step" => 1,
            "max" => 6,
            'display_value' => 'label',
            'required' => array(0 => 'woo_single_sidebar', 1 => '!=', 2 => 'none'),
        ),
        array(
            'title' => esc_html__('Featured Image / Video on Product', 'am-logistics'),
            'subtitle' => esc_html__('Turn on to display featured images and videos on product single page.', 'am-logistics'),
            'id' => 'woo_single_media',
            'type' => 'switch',
            'default' => true,
        ),
    ),
);
/* Social Links */
$this->sections[] = array(
    'title' => esc_html__('Social Media', 'am-logistics'),
    'icon' => 'el el-share-alt',
    'fields' => array(
        array(
            'id' => 'social_link_header_top',
            'type' => 'checkbox',
            'title' => esc_html__('Show in Header Top', 'am-logistics'),
            'subtitle' => esc_html__('Select Socials to show in header top', 'am-logistics'),
            'options' => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'google' => 'Google Plus',
                'pinterest' => 'Pinterest',
                'vimeo' => 'Vimeo',
                'youtube' => 'Youtube',
                'linkedin' => 'LinkedIn',
                'dribbble' => 'Dribbble',
                'rss' => 'RSS',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'google' => '1',
                'pinterest' => '1',
                'vimeo' => '1',
            )
        ),
        array(
            'id' => 'social_link_copyright',
            'type' => 'checkbox',
            'title' => esc_html__('Show in Copyright Bar', 'am-logistics'),
            'subtitle' => esc_html__('Select Socials to show in Copyright bar', 'am-logistics'),
            'options' => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'google' => 'Google Plus',
                'pinterest' => 'Pinterest',
                'vimeo' => 'Vimeo',
                'instagram' => 'Instagram',
                'youtube' => 'Youtube',
                'linkedin' => 'LinkedIn',
                'dribbble' => 'Dribbble',
                'rss' => 'RSS',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'google' => '1',
                'vimeo' => '1',
            )
        ),
        array(
            'id' => 'social_link_blog',
            'type' => 'sortable',
            'mode' => 'checkbox',
            'title' => esc_html__('Social Share Box', 'am-logistics'),
            'subtitle' => esc_html__('Controls the social share box on the blog post', 'am-logistics'),
            'options' => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'pinterest' => 'Pinterest',
                'google' => 'Google Plus',
                'linkedin' => 'LinkedIn',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'pinterest' => '1',
                'google' => '1',
                'linkedin' => '1',
            )
        ),
    )
);
$this->sections[] = array(
    'title' => esc_html__('Social Links', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Input the Facebook Link', 'am-logistics'),
            'id' => 'facebook',
            'type' => 'text',
            'title' => esc_html__('Facebook Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Twitter Link', 'am-logistics'),
            'id' => 'twitter',
            'type' => 'text',
            'title' => esc_html__('Twitter Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Youtube Link', 'am-logistics'),
            'id' => 'youtube',
            'type' => 'text',
            'title' => esc_html__('Youtube Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Vimeo Link', 'am-logistics'),
            'id' => 'vimeo',
            'type' => 'text',
            'title' => esc_html__('Vimeo Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Instagram Link', 'am-logistics'),
            'id' => 'instagram',
            'type' => 'text',
            'title' => esc_html__('Instagram Link', 'am-logistics'),
            'default' => '',
        ),
		array(
            'subtitle' => esc_html__('Input the Pinterest Link', 'am-logistics'),
            'id' => 'pinterest',
            'type' => 'text',
            'title' => esc_html__('Pinterest Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Google Plus Link', 'am-logistics'),
            'id' => 'google',
            'type' => 'text',
            'title' => esc_html__('Google+ Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Skype Link', 'am-logistics'),
            'id' => 'skype',
            'type' => 'text',
            'title' => esc_html__('Skype Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the LinkedIn Link', 'am-logistics'),
            'id' => 'linkedin',
            'type' => 'text',
            'title' => esc_html__('LinkedIn Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the RSS Link', 'am-logistics'),
            'id' => 'rss',
            'type' => 'text',
            'title' => esc_html__('RSS Link', 'am-logistics'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Yahoo Link', 'am-logistics'),
            'id' => 'yahoo',
            'type' => 'text',
            'title' => esc_html__('Yahoo Link', 'am-logistics'),
            'default' => '',
        ),
    )
);

$this->sections[] = array(
    'title' => esc_html__('VC Row Setting', 'am-logistics'),
    'icon' => 'el el-cogs',
    'fields' => array(
        array(
            'id'    => 'vc_margin_info_01',
            'type'  => 'info',
            'style' => 'success',
            'title' => esc_html__('Visual Composer Row Margin Style 01', 'am-logistics'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => esc_html__( 'This is a setting for VC Row Margin (Style 01), output class is <strong style="color: red;">zo-vc-row-margin-01</strong> [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'vc_row_margin_desktop_01',
            'title' => esc_html__('Desktop Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Desktop (screen >= 992px). Enter values including any valid CSS unit, ex: 120px, 100px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '120px',
                'margin-bottom'  => '100px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_margin_tablet_01',
            'title' => esc_html__('Tablet Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Tablet (screen 768px - 991px). Enter values including any valid CSS unit, ex: 80px, 60px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '80px',
                'margin-bottom'  => '60px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_margin_phone_01',
            'title' => esc_html__('Phone Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Phone (screen <=768px). Enter values including any valid CSS unit, ex: 50px, 30px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '50px',
                'margin-bottom'  => '30px',
                'units'          => 'px',
            )
        ),
        array(
            'id'    => 'vc_margin_info_02',
            'type'  => 'info',
            'style' => 'success',
            'title' => esc_html__('Visual Composer Row Margin Style 02', 'am-logistics'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => esc_html__( 'This is a setting for VC Row Margin (Style 02), output class is <strong style="color: red;">zo-vc-row-margin-02</strong> [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'vc_row_margin_desktop_02',
            'title' => esc_html__('Desktop Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Desktop (screen >= 992px). Enter values including any valid CSS unit, ex: 100px, 80px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '100px',
                'margin-bottom'  => '80px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_margin_tablet_02',
            'title' => esc_html__('Tablet Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Tablet (screen 768px - 991px). Enter values including any valid CSS unit, ex: 60px, 50px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '80px',
                'margin-bottom'  => '60px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_margin_phone_02',
            'title' => esc_html__('Phone Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Phone (screen <=768px). Enter values including any valid CSS unit, ex: 40px, 30px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '50px',
                'margin-bottom'  => '30px',
                'units'          => 'px',
            )
        ),
        array(
            'id'    => 'vc_margin_info_03',
            'type'  => 'info',
            'style' => 'success',
            'title' => esc_html__('Visual Composer Row Margin Style 03', 'am-logistics'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => esc_html__( 'This is a setting for VC Row Margin (Style 03), output class is <strong style="color: red;">zo-vc-row-margin-03</strong> [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'vc_row_margin_desktop_03',
            'title' => esc_html__('Desktop Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Desktop (screen >= 992px). Enter values including any valid CSS unit, ex: 100px, 80px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '80px',
                'margin-bottom'  => '80px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_margin_tablet_03',
            'title' => esc_html__('Tablet Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Tablet (screen 768px - 991px). Enter values including any valid CSS unit, ex: 60px, 50px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '50px',
                'margin-bottom'  => '50px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_margin_phone_03',
            'title' => esc_html__('Phone Margin', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom margin for VC Row on the Phone (screen <=768px). Enter values including any valid CSS unit, ex: 40px, 30px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top'     => '30px',
                'margin-bottom'  => '30px',
                'units'          => 'px',
            )
        ),
    )
);

$this->sections[] = array(
    'title' => esc_html__('VC Row Padding', 'am-logistics'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'    => 'vc_padding_info_01',
            'type'  => 'info',
            'style' => 'success',
            'title' => esc_html__('Visual Composer Row Padding Style 01', 'am-logistics'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => esc_html__( 'This is a setting for VC Row Padding (Style 01), output class is <strong style="color: red;">zo-vc-row-padding-01</strong> [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'vc_row_padding_desktop_01',
            'title' => esc_html__('Desktop Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom Padding for VC Row on the Desktop (screen >= 992px). Enter values including any valid CSS unit, ex: 100px, 80px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '100px',
                'padding-bottom'  => '100px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_padding_tablet_01',
            'title' => esc_html__('Tablet Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for VC Row on the Tablet (screen 768px - 991px). Enter values including any valid CSS unit, ex: 60px, 50px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '70px',
                'padding-bottom'  => '70px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_padding_phone_01',
            'title' => esc_html__('Phone Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for VC Row on the Phone (screen <=768px). Enter values including any valid CSS unit, ex: 40px, 30px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '60px',
                'padding-bottom'  => '40px',
                'units'          => 'px',
            )
        ),
        array(
            'id'    => 'vc_padding_info_02',
            'type'  => 'info',
            'style' => 'success',
            'title' => esc_html__('Visual Composer Row Padding Style 02', 'am-logistics'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => esc_html__( 'This is a setting for VC Row padding (Style 02), output class is <strong style="color: red;">zo-vc-row-padding-02</strong> [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'vc_row_padding_desktop_02',
            'title' => esc_html__('Desktop Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for VC Row on the Desktop (screen >= 992px). Enter values including any valid CSS unit, ex: 100px, 80px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '80px',
                'padding-bottom'  => '80px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_padding_tablet_02',
            'title' => esc_html__('Tablet Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for VC Row on the Tablet (screen 768px - 991px). Enter values including any valid CSS unit, ex: 60px, 50px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '60px',
                'padding-bottom'  => '60px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_padding_phone_02',
            'title' => esc_html__('Phone Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for VC Row on the Phone (screen <=768px). Enter values including any valid CSS unit, ex: 40px, 30px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '40px',
                'padding-bottom'  => '40px',
                'units'          => 'px',
            )
        ),
        array(
            'id'    => 'vc_padding_info_03',
            'type'  => 'info',
            'style' => 'success',
            'title' => esc_html__('Visual Composer Row Padding Style 03', 'am-logistics'),
            'icon'  => 'el-icon-info-sign',
            'desc'  => esc_html__( 'This is a setting for VC Row padding (Style 03), output class is <strong style="color: red;">zo-vc-row-padding-03</strong> [You can using that class anywhere on the website]', 'am-logistics'),
        ),
        array(
            'id' => 'vc_row_padding_desktop_03',
            'title' => esc_html__('Desktop Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for VC Row on the Desktop (screen >= 992px). Enter values including any valid CSS unit, ex: 100px, 80px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '60px',
                'padding-bottom'  => '60px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_padding_tablet_03',
            'title' => esc_html__('Tablet Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for VC Row on the Tablet (screen 768px - 991px). Enter values including any valid CSS unit, ex: 60px, 50px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '40px',
                'padding-bottom'  => '40px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'vc_row_padding_phone_03',
            'title' => esc_html__('Phone Padding', 'am-logistics'),
            'subtitle' => esc_html__('Controls the top/bottom padding for VC Row on the Phone (screen <=768px). Enter values including any valid CSS unit, ex: 40px, 30px.', 'am-logistics'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top'     => '30px',
                'padding-bottom'  => '30px',
                'units'          => 'px',
            )
        ),
    )
);
$this->sections[] = array(
    'title' => esc_html__('Pricing Table', 'am-logistics'),
    'icon' => 'el-usd',
    'fields' => array(
        array(
            'id' => 'pricing_table_type',
            'type' => 'sortable',
            'mode' => 'text',
            'title' => esc_html__('Label for Pricing Type', 'am-logistics'),
            'subtitle' => esc_html__('Controls the text to display on the table type', 'am-logistics'),
            'options' => array(
                '7' => 'Weekly',
                'month' => 'Monthly',
                'three' => '3 Months',
                'six' => '6 Months',
                'year' => 'Yearly',
            ),
            'default' => array(
                '7' => '/ Weekly',
                'month' => '/ Monthly',
                'three' => '/ 3 Months',
                'six' => '/ 6 Months',
                'year' => '/ Yearly',
            )
        ),
    )
);
/**
 * Custom CSS
 *
 * extra css for customer.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Custom CSS', 'am-logistics'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => esc_html__('CSS Code', 'am-logistics'),
            'subtitle' => esc_html__('create your css code here.', 'am-logistics'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);

/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Animations', 'am-logistics'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable animation parallax for images...', 'am-logistics'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => esc_html__('Images Paralax', 'am-logistics'),
            'default' => true
        ),
    )
);

