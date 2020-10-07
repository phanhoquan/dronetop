<?php

add_filter('rwmb_meta_boxes', 'exam_meta_boxes');

function exam_meta_boxes($meta_boxes) {
    $menus = array();
    $menus[''] = 'Default';
    $obj_menus = wp_get_nav_menus();
    foreach ($obj_menus as $obj_menu) {
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }
    $meta_boxes[] = array(
        'title' => esc_html__('Page Settings', 'am-logistics'),
        'post_types' => 'page',
        'tabs' => array(
            'layout' => array(
                'label' => esc_html__('Layout', 'am-logistics'),
                'icon' => 'fa fa-columns'
            ),
            'color' => array(
                'label' => esc_html__('Color', 'am-logistics'),
                'icon' => 'fa fa-eyedropper'
            ),
            'header' => array(
                'label' => esc_html__('Header', 'am-logistics'),
                'icon' => 'fa fa-header'
            ),
            'menu' => array(
                'label' => esc_html__('Menu', 'am-logistics'),
                'icon' => 'fa fa-bars'
            ),
            'page_title' => array(
                'label' => esc_html__('Page Title', 'am-logistics'),
                'icon' => 'fa fa-text-width'
            ),
            'content' => array(
                'label' => esc_html__('Content', 'am-logistics'),
                'icon' => 'fa fa-newspaper-o'
            ),
            'footer' => array(
                'label' => esc_html__('Footer', 'am-logistics'),
                'icon' => 'fa fa-credit-card'
            ),
            'font' => array(
                'label' => esc_html__('Fonts', 'am-logistics'),
                'icon' => 'fa fa-font'
            ),
        ),
        'tab_style' => 'left',
        'fields' => array(
            // Layout tab
            array(
                'id' => 'presets_color',
                'name' => esc_html__('Color', 'am-logistics'),
                'type' => 'image_select',
                'options' => array(
					'' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-default.jpg',
					'0' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-0.jpg',
					'1' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-1.jpg',
					'2' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-2.jpg',
					'3' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-3.jpg',
					'4' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-4.jpg',
					'5' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-5.jpg',
					'6' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-6.jpg',
					'7' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-7.jpg',
					'8' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-8.jpg',
					'9' => get_template_directory_uri() . '/inc/options/images/presets/pr-c-9.jpg',
                ),
                'std' => '',
                'tab' => 'color',
            ),
            array(
                'id' => 'page_layout',
                'name' => esc_html__('Layout', 'am-logistics'),
                'type' => 'select',
                'options' => array('0' => 'Default', 'wide' => 'Wide', 'boxed' => 'Boxed'),
                'desc' => esc_html__('Select boxed or wide layout (Default by theme option, Boxed width define by theme option).', 'am-logistics'),
                'tab' => 'layout',
            ),
			array(
				'id' => 'layout_padding',
				'name' => esc_html__('Page Padding','am-logistics'),
                'desc' => esc_html__('Controls the padding for page content when using 100% site width or 100% width page layout. Enter value including any valid CSS unit, ex: 20px 20px 20px 20px','am-logistics'),
				'type' => 'text',
				'tab' 	=> 'layout',
			),
            array(
                'id' => 'page_body_bg_color',
                'name' => esc_html__('Body Background Color', 'am-logistics'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the body background. Hex code, ex: #000', 'am-logistics'),
                'tab' => 'layout',
            ),
            array(
                'id' => 'page_body_bg_image',
                'name' => esc_html__('Body Background Image', 'am-logistics'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'am-logistics'),
                'tab' => 'layout',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image position', 'am-logistics'),
                "id" => "page_body_bg_position",
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                    "center bottom" => "Center Bottom"
                ),
                'tab' => 'layout',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Attachment", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image attachment.', 'am-logistics'),
                "id" => "page_body_bg_attachment",
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                ),
                'tab' => 'layout',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image size.', 'am-logistics'),
                "id" => "page_body_bg_size",
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                ),
                'tab' => 'layout',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'am-logistics'),
                'desc' => esc_html__('Select how the background image repeats.', 'am-logistics'),
                "id" => "page_body_bg_repeat",
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                ),
                'tab' => 'layout',
            ),
            array(
                'id' => 'page_boxed_bg_color',
                'name' => esc_html__('Boxed Background Color', 'am-logistics'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the body background. Hex code, ex: #000', 'am-logistics'),
                'tab' => 'layout',
            ),
            array(
                'id' => 'page_boxed_image',
                'name' => esc_html__('Boxed Background Image', 'am-logistics'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'am-logistics'),
                'tab' => 'layout',
            ),
            // End Layout tab
            // Header Tab
            array(
                'id' => 'header_layout',
                'name' => esc_html__('Header Layout', 'am-logistics'),
                'desc' => esc_html__('Choose header layout.', 'am-logistics'),
                'type' => 'image_select',
                'options' => array(
                    'default' => get_template_directory_uri() . '/assets/images/logistics-header-default.jpg',
                    '1' => get_template_directory_uri() . '/assets/images/logistics-header-01.png',
                    '2' => get_template_directory_uri() . '/assets/images/logistics-header-02.png',
                ),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_width',
                'name' => esc_html__('Full Width (100%)', 'am-logistics'),
                'desc' => esc_html__('Choose to set header width to 100% of the browser width. Select "No" for site width.', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_top',
                'name' => esc_html__('Show Header Top Bar', 'am-logistics'),
                'desc' => esc_html__('Turn on Header Top Bar on this header. [Header Top Bar is setting from Header Top secsion on the Theme options]', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_transparent',
                'name' => esc_html__('Header Transparent', 'am-logistics'),
                'desc' => esc_html__('Choose Yes to have the header transparent', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_transparent_full',
                'name' => esc_html__('Header Transparent Full', 'am-logistics'),
                'desc' => esc_html__('Choose Yes to have the header transparent full', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),

			array(
                'id' => 'border_bottom_header_top',
                'name' => esc_html__('Border Bottom Header Top', 'am-logistics'),
                'desc' => esc_html__('Choose Yes to have the border bottom header top [All settings from Theme option]', 'am-logistics'),
                'type' => 'select',
                'options' => array('default' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
			array(
                "type" => "select",
                "name" => esc_html__("Custom Border", 'am-logistics'),
                'desc' => esc_html__('Controls the Border for Header Top of this page. If No, the border showing from theme option. Yes will get the bellow border setting', 'am-logistics'),
                "id" => "header_top_custom_border_bottom",
                "options" => array(
                   'yes' => 'Yes',
				   'no' => 'No'
                ),
                'tab' => 'header',
            ),
			array(
				'desc' => esc_html__('Default Width 100%.', 'am-logistics'),
				'id' => 'border_bottom_header_top_full_width',
				'type' => 'select',
				'name' => esc_html__('Border Bottom Full Width', 'am-logistics'),
				"options" => array(
                   'yes' => 'Yes',
				   'no' => 'No'
                ),
				'tab' => 'header',
			),
			array(
				'name' => esc_html__('Border bottom Height', 'am-logistics'),
				'desc' => esc_html__('Controls the min height of the border bottom header top', 'am-logistics'),
				'id' => 'border_bottom_height_header_top',
				'type' => 'slider',
				"default" => 0,
				"min" => 0,
				"step" => 1,
				"max" => 40,
				'display_value' => 'label',
				'tab' => 'header',
			),
			array(
				'name' => esc_html__('Border Bottom  Header Top.', 'am-logistics'),
				'id' => 'border_bottom_color_header_top',
				'type' => 'color',
                'rgba' => true,
                'default' => '',
                'desc' => esc_html__('Controls the border  color for the header top.', 'am-logistics'),
                'tab' => 'header',
			),
            array(
                'id' => 'header_sticky',
                'name' => esc_html__('Header Sticky', 'am-logistics'),
                'desc' => esc_html__('Choose Yes to have the header sticky [All settings from Theme option]', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_bg_color',
                'name' => esc_html__('Header Background Color', 'am-logistics'),
                'type' => 'color',
                'rgba' => true,
                'default' => '',
                'desc' => esc_html__('Controls the background color for the header.', 'am-logistics'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_bg_image',
                'name' => esc_html__('Header Background Image', 'am-logistics'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'am-logistics'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_vertical_postion',
                'name' => esc_html__('Header Vertical Position', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'left' => 'Left', 'right' => 'Right'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_vertical_style',
                'name' => esc_html__('Header Vertical Style', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 1 => 'Style 1', 2 => 'Style 2'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_logo',
                'name' => esc_html__('Custom Logo', 'am-logistics'),
                'desc' => esc_html__('Select a logo for this page. If empty, it will show logo from theme option', 'am-logistics'),
                'type' => 'file_input',
                'tab' => 'header',
            ),
            array(
                'id' => 'header_logo_margin',
                'name' => esc_html__('Logo Margin', 'am-logistics'),
                'desc' => esc_html__('Enter the margin for the logo [Unit CSS margin, ex: 20px 30px 20px 30px]', 'am-logistics'),
                'type' => 'text',
                'tab' => 'header',
            ),
            //MENU
            array(
                'id' => 'primary',
                'name' => esc_html__('Main Navigation Menu', 'am-logistics'),
                'desc' => esc_html__('Select which menu displays on this page.', 'am-logistics'),
                'type' => 'select',
                'options' => $menus,
                'tab' => 'menu',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Menu Alignment", 'am-logistics'),
                'desc' => esc_html__('Controls the menu alignment', 'am-logistics'),
                "id" => "header_menu_alignment",
                "options" => array(
                    "" => "Default",
                    "left" => "Left",
                    "center" => "Center",
                    "right" => "Right"
                ),
                'tab' => 'menu',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Menu Left Alignment", 'am-logistics'),
                'desc' => esc_html__('Controls the menu left alignment. Only for Header Style 03', 'am-logistics'),
                "id" => "header_menu_left_alignment",
                "options" => array(
                    "" => "Default",
                    "left" => "Left",
                    "center" => "Center",
                    "right" => "Right"
                ),
                'tab' => 'menu',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Menu Right Alignment", 'am-logistics'),
                'desc' => esc_html__('Controls the menu right alignment. Only for Header Style 03', 'am-logistics'),
                "id" => "header_menu_right_alignment",
                "options" => array(
                    "" => "Default",
                    "left" => "Left",
                    "center" => "Center",
                    "right" => "Right"
                ),
                'tab' => 'menu',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Custom Menu Color", 'am-logistics'),
                'desc' => esc_html__('Controls the color for Menu of this page. If No, the menu color showing from theme option. Yes will get the bellow color setting', 'am-logistics'),
                "id" => "header_menu_custom_color",
                "options" => array(
                    "" => "No",
                    "yes" => "Yes"
                ),
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color',
                'name' => esc_html__('Menu Color - First Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color_hover',
                'name' => esc_html__('Menu Hover - First Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color_active',
                'name' => esc_html__('Menu Active - First Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_sub_menu_color',
                'name' => esc_html__('Menu Color - Sub Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_sub_menu_color_hover',
                'name' => esc_html__('Menu Hover Active - Sub Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_collapsed_color',
                'name' => esc_html__('Collapse Icon Color', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            //Page Title
            array(
                'id' => 'page_title',
                'name' => esc_html__('Page Title', 'am-logistics'),
                'desc' => esc_html__('Choose to show or hide the page title bar.', 'am-logistics'),
                'type' => 'select',
                'options' => array('on' => 'Show', 'off' => 'Hide'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_width',
                'name' => esc_html__('100% Page Title Width', 'am-logistics'),
                'desc' => esc_html__('Choose to set the page title content to 100% of the browser width. Select "No" for site width. Only works with wide layout mode.', 'am-logistics'),
                'type' => 'select',
                'options' => array('default' => 'Default', 'true' => 'Yes', 'false' => 'No'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_border',
                'name' => esc_html__('Show Border', 'am-logistics'),
                'desc' => esc_html__('Choose to set the page title border. (Border style on the theme option)', 'am-logistics'),
                'type' => 'select',
                'options' => array('default' => 'Default', 'true' => 'Yes', 'false' => 'No'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_height',
                'name' => esc_html__('Page Title Height', 'am-logistics'),
                'desc' => esc_html__('Set the height of the page title bar. In pixels ex: 100px.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_mobile_height',
                'name' => esc_html__('Page Title Mobile Height', 'am-logistics'),
                'desc' => esc_html__('Set the height of the page title bar on mobile. In pixels ex: 100px.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_bg_color',
                'name' => esc_html__('Page Title Background Color', 'am-logistics'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the page title. Hex code, ex: #000', 'am-logistics'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_bg_image',
                'name' => esc_html__('Page Title Background Image', 'am-logistics'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'am-logistics'),
                'tab' => 'page_title',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image position', 'am-logistics'),
                "id" => "page_title_bg_position",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                )
            ),
            array(
                "type" => "select",
                'desc' => esc_html__('Choose to have the background image attachment.', 'am-logistics'),
                "id" => "page_title_bg_attachment",
                'tab' => 'page_title',
                "name" => esc_html__("Background Attachment", 'am-logistics'),
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                )
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image size.', 'am-logistics'),
                "id" => "page_title_bg_size",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                )
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'am-logistics'),
                'desc' => esc_html__('Select how the background image repeats.', 'am-logistics'),
                "id" => "page_title_bg_repeat",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                ),
            ),
            array(
                'id' => 'page_title_text_bar',
                'name' => esc_html__('Page Title Text', 'am-logistics'),
                'desc' => esc_html__('Choose to show or hide the page title bar text.', 'am-logistics'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array('on' => 'Show', 'off' => 'Hide'),
            ),
            array(
                'id' => 'page_title_text_alignment',
                'name' => esc_html__('Text Alignment', 'am-logistics'),
                'desc' => esc_html__('Choose the title and subhead text alignment.', 'am-logistics'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'am-logistics'),
                    'left' => esc_html__('Left', 'am-logistics'),
                    'center' => esc_html__('Center', 'am-logistics'),
                    'right' => esc_html__('Right', 'am-logistics'),
                )
            ),
            array(
                'id' => 'page_title_text_horizontal_alignment',
                'name' => esc_html__('Text Horizotal Alignment', 'am-logistics'),
                'desc' => esc_html__('Choose the title and subhead text horizotal alignment.', 'am-logistics'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'am-logistics'),
                    'middle' => esc_html__('Middle', 'am-logistics'),
                    'custom' => esc_html__('Custom Padding', 'am-logistics'),
                )
            ),
            array(
                'id' => 'page_title_text_padding_top',
                'name' => esc_html__('Padding Top', 'am-logistics'),
                'desc' => esc_html__('Set the padding top of the page title text. In pixels ex: 100.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_text_padding_bottom',
                'name' => esc_html__('Padding Bottom', 'am-logistics'),
                'desc' => esc_html__('Set the padding bottom of the page title text. In pixels ex: 100.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_text',
                'name' => esc_html__('Page Title Custom Text', 'am-logistics'),
                'desc' => esc_html__('Insert custom text for the page title bar.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_sub_text',
                'name' => esc_html__('Page Title Custom Sub Text', 'am-logistics'),
                'desc' => esc_html__('Insert custom subhead text for the page title bar.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_breadcrumb_display',
                'name' => esc_html__('Breadcrumbs', 'am-logistics'),
                'desc' => esc_html__('Choose to display the breadcrumbs, sidebar or none.', 'am-logistics'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'am-logistics'),
                    'none' => esc_html__('None', 'am-logistics'),
                    'breadcrumb' => esc_html__('Breadcrumbs', 'am-logistics'),
                    'sidebar' => esc_html__('Page Title Sidebar', 'am-logistics'),
                )
            ),
            array(
                'id' => 'page_title_breadcrumb_position',
                'name' => esc_html__('Breadcrumbs Position', 'am-logistics'),
                'desc' => esc_html__('Controls where to displays in the Page Title area. (Symmetric is not avalaible when Page Title Text Alignment center)', 'am-logistics'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_html__('Default', 'am-logistics'),
                    'bellow' => esc_html__('Bellow', 'am-logistics'),
                    'above' => esc_html__('Above', 'am-logistics'),
                    'symmetric' => esc_html__('Symmetric', 'am-logistics'),
                ),
                'tab' => 'page_title',
            ),
            //Content
            array(
                'id' => 'content_width',
                'name' => esc_html__('Content Width', 'am-logistics'),
                'desc' => esc_html__('Choose the content width, Container is standard width (1170px), Container Fluid is full content width by Layout', 'am-logistics'),
                'type' => 'select',
                'options' => array('container' => 'Container', 'container-fluid' => 'Container Fluid'),
                'tab' => 'content',
                'std' => 'container',
            ),
            array(
                'id' => 'content_sidebar',
                'name' => esc_html__('Sidebar', 'am-logistics'),
                'desc' => esc_html__('Choose the main sidebar for the content, default is full width content (no sidebar). Sidebar width is define from theme option', 'am-logistics'),
                'type' => 'image_select',
                'options' => array(
                    'default' => get_template_directory_uri() . '/assets/images/logistics-no-sidebar.jpg',
                    'left' => get_template_directory_uri() . '/assets/images/logistics-left-sidebar.jpg',
                    'right' => get_template_directory_uri() . '/assets/images/logistics-right-sidebar.jpg',
                ),
                'std' => 'default',
                'tab' => 'content',
            ),
            array(
                'id' => 'content_sidebar_size',
                'name' => esc_html__('Sidebar Size', 'am-logistics'),
                'desc' => esc_html__('Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'am-logistics'),
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('Theme Default', 'am-logistics'),
                    '3' => esc_html__('3 Columns', 'am-logistics'),
                    '4' => esc_html__('4 Columns', 'am-logistics'),
                    '5' => esc_html__('5 Columns', 'am-logistics'),
                    '6' => esc_html__('6 Columns', 'am-logistics'),
                ),
                'std' => '0',
                'tab' => 'content',
            ),
            array(
                'id' => 'content_sidebar_offset',
                'name' => esc_html__('Content Offset', 'am-logistics'),
                'desc' => esc_html__('Controls the offset for post content, it is only apply for content without sidebar', 'am-logistics'),
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('No Offset', 'am-logistics'),
                    '1' => esc_html__('1 Column', 'am-logistics'),
                    '2' => esc_html__('2 Columns', 'am-logistics'),
                    '3' => esc_html__('3 Columns', 'am-logistics'),
                ),
                'std' => '0',
                'tab' => 'content',
            ),
            array(
                'id' => 'content_sidebar_style',
                'name' => esc_html__('Sidebar Style', 'am-logistics'),
                'desc' => esc_html__('Controls the style of sidebar', 'am-logistics'),
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('Default', 'am-logistics'),
                    '1' => esc_html__('Background Sidebar', 'am-logistics'),
                ),
                'std' => '0',
                'tab' => 'content',
            ),
            //Footer
            array(
                'id' => 'footer_width',
                'name' => esc_html__('100% Footer Width', 'am-logistics'),
                'desc' => esc_html__('Choose to set footer width to 100% of the browser width. Select "No" for site width.', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_widget',
                'name' => esc_html__('Display Footer Widget Area', 'am-logistics'),
                'desc' => esc_html__('Choose to show or hide the footer widget area.', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_bg_color',
                'name' => esc_html__('Footer Background Color', 'am-logistics'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the footer. Hex code, ex: #000', 'am-logistics'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_bg_image',
                'name' => esc_html__('Footer Background Image', 'am-logistics'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'am-logistics'),
                'tab' => 'footer',
                'clone' => false,
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image position', 'am-logistics'),
                "id" => "footer_bg_position",
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                    "center bottom" => "Center Bottom"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Attachment", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image attachment.', 'am-logistics'),
                "id" => "footer_bg_attachment",
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image size.', 'am-logistics'),
                "id" => "footer_bg_size",
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'am-logistics'),
                'desc' => esc_html__('Select how the background image repeats.', 'am-logistics'),
                "id" => "footer_bg_attachment",
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                ),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_copyright',
                'name' => esc_html__('Display Copyright', 'am-logistics'),
                'desc' => esc_html__('Choose to show or hide the copyright area.', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_copyright_bg_color',
                'name' => esc_html__('Copyright Background Color', 'am-logistics'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the copyright. Hex code, ex: #000', 'am-logistics'),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Body Font", 'am-logistics'),
                'desc' => esc_html__('Choose the font you want. Include all tag elements', 'am-logistics'),
                "id" => "body_font",
                "options" => array(
                    "" => "Theme Default",
                    "Inconsolata" => "Inconsolata",
                    "Oswald" => "Oswald",
                    "Dosis" => "Dosis",
                    "Cormorant Garamond" => "Cormorant Garamond"
                ),
                'tab' => 'font',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("H1 Font", 'am-logistics'),
                'desc' => esc_html__('Choose the font you want to apply for H1', 'am-logistics'),
                "id" => "h1_font",
                "options" => array(
                    "" => "Theme Default",
                    "Inconsolata" => "Inconsolata",
                    "Oswald" => "Oswald",
                    "Dosis" => "Dosis",
                    "Cormorant Garamond" => "Cormorant Garamond"
                ),
                'tab' => 'font',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("H2 Font", 'am-logistics'),
                'desc' => esc_html__('Choose the font you want to apply for H2', 'am-logistics'),
                "id" => "h2_font",
                "options" => array(
                    "" => "Theme Default",
                    "Inconsolata" => "Inconsolata",
                    "Oswald" => "Oswald",
                    "Dosis" => "Dosis",
                    "Cormorant Garamond" => "Cormorant Garamond"
                ),
                'tab' => 'font',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("H3 Font", 'am-logistics'),
                'desc' => esc_html__('Choose the font you want to apply for H3', 'am-logistics'),
                "id" => "h3_font",
                "options" => array(
                    "" => "Theme Default",
                    "Inconsolata" => "Inconsolata",
                    "Oswald" => "Oswald",
                    "Dosis" => "Dosis",
                    "Cormorant Garamond" => "Cormorant Garamond"
                ),
                'tab' => 'font',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("H4 Font", 'am-logistics'),
                'desc' => esc_html__('Choose the font you want to apply for H4', 'am-logistics'),
                "id" => "h4_font",
                "options" => array(
                    "" => "Theme Default",
                    "Inconsolata" => "Inconsolata",
                    "Oswald" => "Oswald",
                    "Dosis" => "Dosis",
                    "Cormorant Garamond" => "Cormorant Garamond"
                ),
                'tab' => 'font',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("H5 Font", 'am-logistics'),
                'desc' => esc_html__('Choose the font you want to apply for H5', 'am-logistics'),
                "id" => "h5_font",
                "options" => array(
                    "" => "Theme Default",
                    "Inconsolata" => "Inconsolata",
                    "Oswald" => "Oswald",
                    "Dosis" => "Dosis",
                    "Cormorant Garamond" => "Cormorant Garamond"
                ),
                'tab' => 'font',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("H6 Font", 'am-logistics'),
                'desc' => esc_html__('Choose the font you want to apply for H6', 'am-logistics'),
                "id" => "h5_font",
                "options" => array(
                    "" => "Theme Default",
                    "Inconsolata" => "Inconsolata",
                    "Oswald" => "Oswald",
                    "Dosis" => "Dosis",
                    "Cormorant Garamond" => "Cormorant Garamond"
                ),
                'tab' => 'font',
            ),
        ),
    );
    $meta_boxes[] = array(
        'title' => esc_html__('Post Settings', 'am-logistics'),
        'post_types' => 'post',
        'tabs' => array(
            'layout' => array(
                'label' => esc_html__('Layout', 'am-logistics'),
                'icon' => 'fa fa-columns'
            ),
            'header' => array(
                'label' => esc_html__('Header', 'am-logistics'),
                'icon' => 'fa fa-header'
            ),
            'menu' => array(
                'label' => esc_html__('Menu', 'am-logistics'),
                'icon' => 'fa fa-bars'
            ),
            'page_title' => array(
                'label' => esc_html__('Page Title', 'am-logistics'),
                'icon' => 'fa fa-text-width'
            ),
            'content' => array(
                'label' => esc_html__('Content', 'am-logistics'),
                'icon' => 'fa fa-newspaper-o'
            ),
            'footer' => array(
                'label' => esc_html__('Footer', 'am-logistics'),
                'icon' => 'fa fa-credit-card'
            ),
        ),
        'tab_style' => 'left',
        'fields' => array(
            // Layout tab
            array(
                'id' => 'post_layout',
                'name' => esc_html__('Layout', 'am-logistics'),
                'type' => 'select',
                'options' => array('0' => 'Default', 'full_image' => 'Full Width Media'),
                'desc' => esc_html__('Select a Layout you want view for single post', 'am-logistics'),
                'tab' => 'layout',
            ),
            // End Layout tab
            // Header Tab
            array(
                'id' => 'header_layout',
                'name' => esc_html__('Header Layout', 'am-logistics'),
                'desc' => esc_html__('Choose header layout.', 'am-logistics'),
                'type' => 'image_select',
                'options' => array(
                    'default' => get_template_directory_uri() . '/assets/images/logistics-header-default.jpg',
                    '1' => get_template_directory_uri() . '/assets/images/logistics-header-01.jpg',
                    '2' => get_template_directory_uri() . '/assets/images/logistics-header-02.jpg',
                ),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_width',
                'name' => esc_html__('Full Width Header (100%)', 'am-logistics'),
                'desc' => esc_html__('Choose to set header width to 100% of the browser width. Select "No" for site width.', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_top',
                'name' => esc_html__('Show  Bar', 'am-logistics'),
                'desc' => esc_html__('Turn on Header Top Bar on this header. [Header Top Bar is setting from Header Top secsion on the Theme options]', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_transparent',
                'name' => esc_html__('Header Transparent', 'am-logistics'),
                'desc' => esc_html__('Choose Yes to have the header transparent', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_transparent_full',
                'name' => esc_html__('Header Transparent Full', 'am-logistics'),
                'desc' => esc_html__('Choose Yes to have the header transparent full', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_sticky',
                'name' => esc_html__('Header Sticky', 'am-logistics'),
                'desc' => esc_html__('Choose Yes to have the header sticky [All settings from Theme option]', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_bg_color',
                'name' => esc_html__('Header Background Color', 'am-logistics'),
                'type' => 'color',
                'rgba' => true,
                'default' => '',
                'desc' => esc_html__('Controls the background color for the header.', 'am-logistics'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_bg_image',
                'name' => esc_html__('Header Background Image', 'am-logistics'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'am-logistics'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_logo',
                'name' => esc_html__('Custom Logo', 'am-logistics'),
                'desc' => esc_html__('Select a logo for this page. If empty, it will show logo from theme option', 'am-logistics'),
                'type' => 'file_input',
                'tab' => 'header',
            ),
            //MENU
            array(
                'id' => 'primary',
                'name' => esc_html__('Main Navigation Menu', 'am-logistics'),
                'desc' => esc_html__('Select which menu displays on this page.', 'am-logistics'),
                'type' => 'select',
                'options' => $menus,
                'tab' => 'menu',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Menu Alignment", 'am-logistics'),
                'desc' => esc_html__('Controls the menu alignment', 'am-logistics'),
                "id" => "header_menu_alignment",
                "options" => array(
                    "" => "Default",
                    "left" => "Left",
                    "center" => "Center",
                    "right" => "Right"
                ),
                'tab' => 'menu',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Menu Left Alignment", 'am-logistics'),
                'desc' => esc_html__('Controls the menu left alignment. Only for Header Style 03', 'am-logistics'),
                "id" => "header_menu_left_alignment",
                "options" => array(
                    "" => "Default",
                    "left" => "Left",
                    "center" => "Center",
                    "right" => "Right"
                ),
                'tab' => 'menu',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Menu Right Alignment", 'am-logistics'),
                'desc' => esc_html__('Controls the menu right alignment. Only for Header Style 03', 'am-logistics'),
                "id" => "header_menu_right_alignment",
                "options" => array(
                    "" => "Default",
                    "left" => "Left",
                    "center" => "Center",
                    "right" => "Right"
                ),
                'tab' => 'menu',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Custom Menu Color", 'am-logistics'),
                'desc' => esc_html__('Controls the color for Menu of this page. If No, the menu color showing from theme option. Yes will get the bellow color setting', 'am-logistics'),
                "id" => "header_menu_custom_color",
                "options" => array(
                    "" => "No",
                    "yes" => "Yes"
                ),
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color',
                'name' => esc_html__('Menu Color - First Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color_hover',
                'name' => esc_html__('Menu Hover - First Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color_active',
                'name' => esc_html__('Menu Active - First Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_sub_menu_color',
                'name' => esc_html__('Menu Color - Sub Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_sub_menu_color_hover',
                'name' => esc_html__('Menu Hover Active - Sub Level', 'am-logistics'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            //Page Title
            array(
                'id' => 'page_title',
                'name' => esc_html__('Page Title', 'am-logistics'),
                'desc' => esc_html__('Choose to show or hide the page title bar.', 'am-logistics'),
                'type' => 'select',
                'options' => array('on' => 'Show', 'off' => 'Hide'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_width',
                'name' => esc_html__('100% Page Title Width', 'am-logistics'),
                'desc' => esc_html__('Choose to set the page title content to 100% of the browser width. Select "No" for site width. Only works with wide layout mode.', 'am-logistics'),
                'type' => 'select',
                'options' => array('default' => 'Default', 'true' => 'Yes', 'false' => 'No'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_border',
                'name' => esc_html__('Show Border', 'am-logistics'),
                'desc' => esc_html__('Choose to set the page title border. (Border style on the theme option)', 'am-logistics'),
                'type' => 'select',
                'options' => array('default' => 'Default', 'true' => 'Yes', 'false' => 'No'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_height',
                'name' => esc_html__('Page Title Height', 'am-logistics'),
                'desc' => esc_html__('Set the height of the page title bar. In pixels ex: 100px.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_mobile_height',
                'name' => esc_html__('Page Title Mobile Height', 'am-logistics'),
                'desc' => esc_html__('Set the height of the page title bar on mobile. In pixels ex: 100px.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_bg_color',
                'name' => esc_html__('Page Title Background Color', 'am-logistics'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the page title. Hex code, ex: #000', 'am-logistics'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_bg_image',
                'name' => esc_html__('Page Title Background Image', 'am-logistics'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'am-logistics'),
                'tab' => 'page_title',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image position', 'am-logistics'),
                "id" => "page_title_bg_position",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                )
            ),
            array(
                "type" => "select",
                'desc' => esc_html__('Choose to have the background image attachment.', 'am-logistics'),
                "name" => esc_html__("Background Attachment", 'am-logistics'),
                "id" => "page_title_bg_attachment",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                )
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image size.', 'am-logistics'),
                "id" => "page_title_bg_size",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                )
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'am-logistics'),
                'desc' => esc_html__('Select how the background image repeats.', 'am-logistics'),
                "id" => "page_title_bg_repeat",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                ),
            ),
            array(
                'id' => 'page_title_text_bar',
                'name' => esc_html__('Page Title Text', 'am-logistics'),
                'desc' => esc_html__('Choose to show or hide the page title bar text.', 'am-logistics'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array('on' => 'Show', 'off' => 'Hide'),
            ),
            array(
                'id' => 'page_title_text_alignment',
                'name' => esc_html__('Text Alignment', 'am-logistics'),
                'desc' => esc_html__('Choose the title and subhead text alignment.', 'am-logistics'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'am-logistics'),
                    'left' => esc_html__('Left', 'am-logistics'),
                    'center' => esc_html__('Center', 'am-logistics'),
                    'right' => esc_html__('Right', 'am-logistics'),
                )
            ),
            array(
                'id' => 'page_title_text_horizontal_alignment',
                'name' => esc_html__('Text Horizotal Alignment', 'am-logistics'),
                'desc' => esc_html__('Choose the title and subhead text horizotal alignment.', 'am-logistics'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'am-logistics'),
                    'middle' => esc_html__('Middle', 'am-logistics'),
                    'custom' => esc_html__('Custom Padding', 'am-logistics'),
                )
            ),
            array(
                'id' => 'page_title_text_padding_top',
                'name' => esc_html__('Padding Top', 'am-logistics'),
                'desc' => esc_html__('Set the padding top of the page title text. In pixels ex: 100.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_text_padding_bottom',
                'name' => esc_html__('Padding Bottom', 'am-logistics'),
                'desc' => esc_html__('Set the padding bottom of the page title text. In pixels ex: 100.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_text',
                'name' => esc_html__('Page Title Custom Text', 'am-logistics'),
                'desc' => esc_html__('Insert custom text for the page title bar.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_sub_text',
                'name' => esc_html__('Page Title Custom Sub Text', 'am-logistics'),
                'desc' => esc_html__('Insert custom subhead text for the page title bar.', 'am-logistics'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_breadcrumb_display',
                'name' => esc_html__('Breadcrumbs', 'am-logistics'),
                'desc' => esc_html__('Choose to display the breadcrumbs, sidebar or none.', 'am-logistics'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'am-logistics'),
                    'none' => esc_html__('None', 'am-logistics'),
                    'breadcrumb' => esc_html__('Breadcrumbs', 'am-logistics'),
                    'sidebar' => esc_html__('Page Title Sidebar', 'am-logistics'),
                )
            ),
            array(
                'id' => 'page_title_breadcrumb_position',
                'name' => esc_html__('Breadcrumbs Position', 'am-logistics'),
                'desc' => esc_html__('Controls where to displays in the Page Title area. (Symmetric is not avalaible when Page Title Text Alignment center)', 'am-logistics'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_html__('Default', 'am-logistics'),
                    'bellow' => esc_html__('Bellow', 'am-logistics'),
                    'above' => esc_html__('Above', 'am-logistics'),
                    'symmetric' => esc_html__('Symmetric', 'am-logistics'),
                ),
                'tab' => 'page_title',
            ),
            //Content
            array(
                'id' => 'content_width',
                'name' => esc_html__('Content Width', 'am-logistics'),
                'desc' => esc_html__('Choose the content width, Container is standard width (1170px), Container Fluid is full content width by Layout', 'am-logistics'),
                'type' => 'select',
                'options' => array('container' => 'Container', 'container-fluid' => 'Container Fluid'),
                'tab' => 'content',
                'std' => 'container',
            ),
            array(
                'id' => 'content_sidebar',
                'name' => esc_html__('Sidebar', 'am-logistics'),
                'desc' => esc_html__('Choose the main sidebar for the content, default is full width content (no sidebar). Sidebar width is define from theme option', 'am-logistics'),
                'type' => 'image_select',
                'options' => array(
                    'default' => get_template_directory_uri() . '/assets/images/logistics-no-sidebar.jpg',
                    'left' => get_template_directory_uri() . '/assets/images/logistics-left-sidebar.jpg',
                    'right' => get_template_directory_uri() . '/assets/images/logistics-right-sidebar.jpg',
                ),
                'std' => 'default',
                'tab' => 'content',
            ),
            array(
                'id' => 'content_sidebar_size',
                'name' => esc_html__('Sidebar Size', 'am-logistics'),
                'desc' => esc_html__('Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'am-logistics'),
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('Theme Default', 'am-logistics'),
                    '3' => esc_html__('3 Columns', 'am-logistics'),
                    '4' => esc_html__('4 Columns', 'am-logistics'),
                    '5' => esc_html__('5 Columns', 'am-logistics'),
                    '6' => esc_html__('6 Columns', 'am-logistics'),
                ),
                'std' => '0',
                'tab' => 'content',
            ),
            array(
                'id' => 'content_sidebar_offset',
                'name' => esc_html__('Content Offset', 'am-logistics'),
                'desc' => esc_html__('Controls the offset for post content, it is only apply for content without sidebar', 'am-logistics'),
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('No Offset', 'am-logistics'),
                    '1' => esc_html__('1 Column', 'am-logistics'),
                    '2' => esc_html__('2 Columns', 'am-logistics'),
                    '3' => esc_html__('3 Columns', 'am-logistics'),
                ),
                'std' => '0',
                'tab' => 'content',
            ),
            array(
                'id' => 'content_sidebar_style',
                'name' => esc_html__('Sidebar Style', 'am-logistics'),
                'desc' => esc_html__('Controls the style of sidebar', 'am-logistics'),
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('Default', 'am-logistics'),
                    '1' => esc_html__('Background Sidebar', 'am-logistics'),
                ),
                'std' => '0',
                'tab' => 'content',
            ),
            array(
                'id' => 'footer_width',
                'name' => esc_html__('100% Footer Width', 'am-logistics'),
                'desc' => esc_html__('Choose to set footer width to 100% of the browser width. Select "No" for site width.', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_widget',
                'name' => esc_html__('Display Footer Widget Area', 'am-logistics'),
                'desc' => esc_html__('Choose to show or hide the footer widget area.', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_bg_color',
                'name' => esc_html__('Footer Background Color', 'am-logistics'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the footer. Hex code, ex: #000', 'am-logistics'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_bg_image',
                'name' => esc_html__('Footer Background Image', 'am-logistics'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'am-logistics'),
                'tab' => 'footer',
                'clone' => false,
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image position', 'am-logistics'),
                "id" => "footer_bg_position",
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                    "center bottom" => "Center Bottom"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Attachment", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image attachment.', 'am-logistics'),
                "id" => "footer_bg_attachment",
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'am-logistics'),
                'desc' => esc_html__('Choose to have the background image size.', 'am-logistics'),
                "id" => "footer_bg_size",
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'am-logistics'),
                'desc' => esc_html__('Select how the background image repeats.', 'am-logistics'),
                "id" => "footer_bg_attachment",
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                ),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_copyright',
                'name' => esc_html__('Display Copyright', 'am-logistics'),
                'desc' => esc_html__('Choose to show or hide the copyright area.', 'am-logistics'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_copyright_bg_color',
                'name' => esc_html__('Copyright Background Color', 'am-logistics'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the copyright. Hex code, ex: #000', 'am-logistics'),
                'tab' => 'footer',
            ),
        ),
    );
    $meta_boxes[] = array(
        'title' => esc_html__('Add Link Product Cart', 'am-logistics'),
        'post_types' => 'product',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'id' => 'link_product_cart',
                'name' => esc_html__('Add Link Product Cart', 'am-logistics'),
                'type' => 'text',
                // Placeholder
                'placeholder' => 'Enter something here',

            ),
            ),
        );
    return $meta_boxes;
}

?>
