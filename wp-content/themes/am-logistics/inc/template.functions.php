<?php

/**
 * Page title template
 * @since 1.0.0
 * @author CMSTheme
 */

//Load header top contact
function logistics_header_top_contact($contact = array()) {
    $result = '';
    $result.= '<ul class="header-top-contact">';
    if (!empty($contact['contact_address'])) {
        $result.= '<li class="contact-address">' . $contact['contact_address'] . '</li>';
    }
    if (!empty($contact['contact_phone'])) {
        $result.= '<li class="contact-phone"><i class="fa fa-phone"></i> ' . $contact['contact_phone'] . '</li>';
    }
    if (!empty($contact['contact_email'])) {
        $result.= '<li class="contact-email"><i class="fa fa-envelope"></i> '
        . '<a href="mailto:' . $contact['contact_email'] . '" title ="Email">' . $contact['contact_email']
        . '</a></li>';
    }
    $result.= '</ul>';
    return $result;
}

//Load social links
function logistics_header_top_social() {
    global $logistics_data;
    $result = '';
    $socials = $logistics_data['social_link_header_top'];
    $result.= '<ul class="header-top-social">';
    foreach ($socials as $social => $key) {
        if (isset($logistics_data[$social]) && $key) {
            $result.= '<li class="' . $social . '">';
            $result.= '<a href="' . $logistics_data[$social] . '" title="' . $social . '">';
            $result.= '<i class="fa fa-' . $social . '"></i>';
            $result.= '</a></li>';
        }
    }
    $result.= '</ul>';
    return $result;
}

//Load social links
function logistics_footer_social() {
    global $logistics_data;
    $result = '';
    $socials = $logistics_data['social_link_copyright'];
    $result.= '<ul class="footer-social">';
    foreach ($socials as $social => $key) {
        if (isset($logistics_data[$social]) && $key) {
            $result.= '<li class="' . $social . '">';
            $result.= '<a href="' . $logistics_data[$social] . '" title="' . $social . '" target="_blank">';
            $result.= '<i class="fa fa-' . $social . '"></i>';
            $result.= '</a></li>';
        }
    }
    $result.= '</ul>';
    return $result;
}

//Load Header top navigation
function logistics_header_top_navigation() {
    $attr = array(
        'menu' => logistics_menu_location(),
        'menu_class' => 'nav-menu header-top-navigation',
    );
    $menu_locations = get_nav_menu_locations();
    if (!empty($menu_locations['top_navigation'])) {
        $attr['theme_location'] = 'top_navigation';
    }
    wp_nav_menu($attr);
}

//Load Page title
function logistics_page_title() {
    global $logistics_data;
    $logistics_meta_box = logistics_post_meta();
    $settings = array();
    //get theme options
    $settings = logistics_page_title_default($logistics_meta_box);
    if (is_page()) {
        if (!empty($logistics_meta_box['page_title'])) {
			if(($logistics_meta_box['page_title'] == 'on')) {
				//get page options
				$settings = logistics_page_title_page($settings, $logistics_meta_box);
				logistics_page_title_content($settings);
			}
        }else if(!isset($logistics_meta_box['page_title'])) {
			$settings = logistics_page_title_page($settings, $logistics_meta_box);
            logistics_page_title_content($settings);
		}
    } else {
        /* Page title post */
        if (is_home()) {
            if (isset($logistics_data['blog_pt_bar']) && empty($logistics_data['blog_pt_bar'])) {
                return;
            } elseif (!empty($logistics_data['blog_pt_bar'])) {
                $settings = logistics_page_title_blog($settings, $logistics_data);
                logistics_page_title_content($settings);
            }
        } else if(is_singular( array('post','portfolio' ))){
            if (empty($logistics_meta_box['page_title'])) {
                $settings = logistics_page_title_page($settings, $logistics_meta_box);
                logistics_page_title_content($settings);
            }elseif($logistics_meta_box['page_title'] != 'off'){
                $settings = logistics_page_title_page($settings, $logistics_meta_box);
                logistics_page_title_content($settings);
            }
        }else{
            logistics_page_title_content($settings);
        }
    }
}

/**
 * Get page title default from theme options.
 *
 * @author ZoTheme
 */
function logistics_page_title_default($logistics_meta_box = array()) {
    global $logistics_data;
    $settings = array();
    //Page Title Settings
    $settings['pt_width'] = !empty($logistics_data['pt_width']) ? (int) $logistics_data['pt_width'] : 0;
    $settings['pt_layout'] = !empty($logistics_data['pt_layout']) ? (int) $logistics_data['pt_layout'] : 1;
    $settings['pt_parallax'] = !empty($logistics_data['pt_parallax']) ? (int) $logistics_data['pt_parallax'] : 0;
    $settings['pt_alignment'] = !empty($logistics_data['pt_alignment']) ? $logistics_data['pt_alignment'] : 'left';
    $settings['pt_vertical_alignment'] = !empty($logistics_data['pt_vertical_alignment']) ? $logistics_data['pt_vertical_alignment'] : 'middle';
    $settings['pt_breadcrumb'] = !empty($logistics_data['pt_breadcrumb']) ? $logistics_data['pt_breadcrumb'] : 'breadcrumb';
    $settings['pt_breadcrumb_position'] = !empty($logistics_data['pt_breadcrumb_position']) ? $logistics_data['pt_breadcrumb_position'] : 'bellow';
    $settings['breacrumb_prefix'] = !empty($logistics_data['breacrumb_prefix']) ? $logistics_data['breacrumb_prefix'] : '';
    if (!empty($logistics_meta_box['page_title_sub_text'])) {
        $settings['pt_sub'] = $logistics_meta_box['page_title_sub_text'];
    } else {
        $settings['pt_sub'] = !empty($logistics_data['pt_sub']) ? $logistics_data['pt_sub'] : '';
    }
    return $settings;
}

function logistics_page_title_page($settings = array(), $logistics_meta_box = array()) {
    if (!empty($logistics_meta_box['page_title_width']) && $logistics_meta_box['page_title_width'] != 'default') {
        $settings['pt_width'] = $logistics_meta_box['page_title_width'];
    }
    if (!empty($logistics_meta_box['page_title_text_alignment']) && $logistics_meta_box['page_title_text_alignment'] != 'default') {
        $settings['pt_alignment'] = $logistics_meta_box['page_title_text_alignment'];
    }
    if (!empty($logistics_meta_box['page_title_text_horizontal_alignment']) && $logistics_meta_box['page_title_text_horizontal_alignment'] != 'default') {
        $settings['pt_vertical_alignment'] = $logistics_meta_box['page_title_text_horizontal_alignment'];
    }
    if (!empty($logistics_meta_box['page_title_breadcrumb_display']) && $logistics_meta_box['page_title_breadcrumb_display'] != 'default') {
        $settings['pt_breadcrumb'] = $logistics_meta_box['page_title_breadcrumb_display'];
    }
    if (!empty($logistics_meta_box['page_title_breadcrumb_position']) && $logistics_meta_box['page_title_breadcrumb_position'] != 'default') {
        $settings['pt_breadcrumb_position'] = $logistics_meta_box['page_title_breadcrumb_position'];
    }
    return $settings;
}

function logistics_page_title_blog($settings = array(), $logistics_data) {
    if (!empty($logistics_data['blog_layout_width'])) {
        $settings['pt_width'] = $logistics_data['blog_layout_width'];
    }
    if (!empty($logistics_data['blog_pt_sub'])) {
        $settings['pt_sub'] = $logistics_data['blog_pt_sub'];
    }
    return $settings;
}

function logistics_page_title_content($settings = array()) {
    global $logistics_base;
    $pa_class = '';
    $pa_style = '';
    if ((int) $settings['pt_parallax'] == 1) {
        $pa_class = "logistics_header_parallax";
        $pa_style = 'style="background-position: 50% 0;background-attachment:fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"';
    }
    if(!empty($settings['pt_layout'])){
        $pa_class.= ' zo-page-title-style-0' . $settings['pt_layout'];
    }
    $container = 'container';
    if ($settings['pt_width']) {
        $container = 'container-fluid';
    }
    ?>
    <div id="zo-page-element-wrap" class="<?php
    echo esc_attr($pa_class);
    echo ' ' . $settings['pt_breadcrumb_position'];
    ?>" <?php echo do_shortcode($pa_style); ?>>
        <div class="<?php echo esc_attr($container); ?> zo-page-title-container">
            <div class="zo-page-title-content">
                <?php if ($settings['pt_alignment'] == 'left' && $settings['pt_breadcrumb_position'] == 'symmetric') { ?>
                    <div class="zo-page-title-text">
                        <h1><?php $logistics_base->getPageTitle(); ?></h1>
                        <?php
                        if ($settings['pt_sub'] != '')
                            echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';
                        ?>
                    </div>
                    <?php
                    if ($settings['pt_breadcrumb'] != 'none') {
                        logistics_page_title_breadcrumb($settings['pt_breadcrumb'], 'zo-page-title-secondary');
                    }
                } elseif ($settings['pt_alignment'] == 'right' && $settings['pt_breadcrumb_position'] == 'symmetric') {
                    if ($settings['pt_breadcrumb'] != 'none') {
                        logistics_page_title_breadcrumb($settings['pt_breadcrumb'], 'zo-page-title-secondary');
                    }
                    ?>
                    <div class="zo-page-title-text">
                        <h1><?php $logistics_base->getPageTitle(); ?></h1>
                        <?php
                        if ($settings['pt_sub'] != '')
                            echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';
                        ?>
                    </div>
                <?php }else { //Align center    ?>
                    <div class="zo-page-title-text">
                        <?php if ($settings['pt_breadcrumb_position'] != 'above') { ?>
                            <h1><?php $logistics_base->getPageTitle(); ?></h1>
                            <?php
                            if ($settings['pt_sub'] != '')
                                echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';
                            ?>
                            <?php
                            if ($settings['pt_breadcrumb'] != 'none') {
                                logistics_page_title_breadcrumb($settings['pt_breadcrumb'], 'zo-page-title-secondary-bellow');
                            }
                        } else {
                            if ($settings['pt_breadcrumb'] != 'none') {
                                logistics_page_title_breadcrumb($settings['pt_breadcrumb'], 'zo-page-title-secondary-above');
                            }
                            ?>
                            <h1><?php $logistics_base->getPageTitle(); ?></h1>
                            <?php
                            if ($settings['pt_sub'] != '')
                                echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
}

/*
 *  general breadcrumb
 *  @author ZoTheme
 */
function logistics_page_title_breadcrumb($breadcrumb_type = 'breadcrumb', $class = 'zo-page-title-secondary') {
    global $logistics_base;
    if ($breadcrumb_type == 'breadcrumb') {?>
        <div id="breadcrumb-text" class="<?php echo esc_attr($class); ?> breadcrumb-text">
            <?php $logistics_base->getBreadCrumb(); ?>
        </div>
        <?php } else { ?>
        <div id="zo-page-title-secondary" class="<?php echo esc_attr($class); ?> zo-page-title-custom-widget">
            <?php if (is_active_sidebar('page-title-sidebar')) {
                dynamic_sidebar('page-title-sidebar');
            }?>
        </div>
        <?php
    }
}

/**
 * Get Header Layout.
 * @author ZoTheme
 */
function logistics_header() {
    global $logistics_data;
    $logistics_meta_box = logistics_post_meta();

    /* header for page */
    if (!empty($logistics_meta_box['header_layout']) && $logistics_meta_box['header_layout'] != 'default') {
        $logistics_data['header_layout'] = $logistics_meta_box['header_layout'];
    }
    /* load template. */
    get_template_part('inc/header/header', $logistics_data['header_layout']);
}

/**
 * Get Footer Layout.
 * @author ZoTheme
 */
function logistics_footer() {
    global $logistics_data;
    /* Footer for page */
    $logistics_data['footer_layout'] = '';
    /* load template. */
    get_template_part('inc/footer/footer', $logistics_data['footer_layout']);
}

/**
 * Sticky menu
 * @author ZoTheme
 */
function logistics_page_header_sticky_logo() {
    global $logistics_data;
    $logistics_meta_box = logistics_post_meta();
    $logo = isset($logistics_data['sticky_logo']['url']) ? $logistics_data['sticky_logo']['url'] : '';
    if (!empty($logo)) {
        $logo = '<img class="zo-sticky-logo" src="' . esc_url($logo) . '" alt="' . esc_html__( 'Home' , 'am-logistics' ) . '"/>';
    }
    return $logo;
}

/**
 * Logo on phone
 * @author ZoTheme
 */
function logistics_logo_phone() {
    global $logistics_data;
    //default logo
    $logo = get_template_directory_uri() . '/assets/images/logistics-logo-phone.png';;
    if(!empty($logistics_data['header_phone_logo']['url'])){
        $logo = $logistics_data['header_phone_logo']['url'];
    }
    $logo = '<img class="header-phone-logo" src="' . esc_url($logo) . '" alt="' . esc_html__( 'Home' , 'am-logistics' ) . '"/>';
    return $logo;
}


function logistics_general_background($setting = array()) {
    $css = '';
    if (!empty($setting['background-color'])) {
        $css .= 'background-color: ' . esc_attr($setting['background-color']) . ';';
    }
    if (!empty($setting['background-image'])) {
        $css .= 'background-image: url("' . esc_attr($setting['background-image']) . '");';
    }
    if (!empty($setting['background-repeat'])) {
        $css .= 'background-repeat: ' . esc_attr($setting['background-repeat']) . ';';
    }
    if (!empty($setting['background-position'])) {
        $css .= 'background-position: ' . esc_attr($setting['background-position']) . ';';
    }
    if (!empty($setting['background-size'])) {
        $css .= 'background-size: ' . esc_attr($setting['background-size']) . ';';
    }
    if (!empty($setting['background-attachment'])) {
        $css .= 'background-attachment: ' . esc_attr($setting['background-attachment']) . ';';
    }
    return $css;
}

function logistics_general_typography($setting = array()) {
    $css = '';
    if (!empty($setting['font-family'])) {
        $css .= 'font-family: ' . esc_attr($setting['font-family']);
        if (!empty($setting['font-backup'])) {
            $css .= ',' . esc_attr($setting['font-backup']) . '';
        }
        $css .= ';';
    }
    if (!empty($setting['font-weight'])) {
        $css .= 'font-weight: ' . esc_attr($setting['font-weight']) . ';';
    }
    if (!empty($setting['font-size'])) {
        $css .= 'font-size: ' . esc_attr($setting['font-size']) . ';';
    }
    if (!empty($setting['text-align'])) {
        $css .= 'text-align: ' . esc_attr($setting['text-align']) . ';';
    }
    if (!empty($setting['text-transform'])) {
        $css .= 'text-transform: ' . esc_attr($setting['text-transform']) . ';';
    }
    if (!empty($setting['line-height'])) {
        $css .= 'line-height: ' . esc_attr($setting['line-height']) . ';';
    }
    if (!empty($setting['color'])) {
        $css .= 'color: ' . esc_attr($setting['color']) . ';';
    }
    if (!empty($setting['letter-spacing'])) {
        $css .= 'letter-spacing: ' . esc_attr($setting['letter-spacing']) . ';';
    }
    return $css;
}

function logistics_calc_font_size($font_size = '0', $sensitivity = 100) {
    $font_size = str_replace('px', '', $font_size);
    $font_size = (int) $font_size;
    $new_size = 0;
    if ($sensitivity >= 100) {
        $new_size = (int) ($font_size * ($sensitivity - 100)) / 100 + $font_size;
    } else {
        $new_size = (int) ($font_size * $sensitivity) / 100;
    }
    return $new_size . 'px';
}

/**
 * Get menu location ID.
 *
 * @param string $option
 * @return NULL
 */
function logistics_menu_location($option = 'primary') {
    $logistics_meta_box = logistics_post_meta();
    /* get menu id from page setting */
    return (!empty($logistics_meta_box[$option])) ? $logistics_meta_box[$option] : null;
}

function logistics_get_page_loading() {
    global $logistics_data;
    $result = '';
    if (!empty($logistics_data['enable_page_loadding'])) {
        $result.= '<div id="zo-loadding">';
		if(!empty($logistics_data['page_loadding_style'])){
			switch ($logistics_data['page_loadding_style']) {
				case '5':
					$result.= '
						<div class="l-wrapper">
							<svg viewBox="0 0 120 120" version="1.1" xmlns="https://preview.codepad.co/redirect?url=http://www.w3.org/2000/svg" xmlns:xlink="https://preview.codepad.co/redirect?url=http://www.w3.org/1999/xlink">
								<symbol id="s--circle">
									<circle r="10" cx="20" cy="20"></circle>
								</symbol>
								<g class="g-circles g-circles--v4">
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
								</g>
							</svg>
						</div>
					';
					break;
				case '4':
					$result.= '
						<div class="l-wrapper">
							<svg viewBox="0 0 120 120" version="1.1" xmlns="https://preview.codepad.co/redirect?url=http://www.w3.org/2000/svg" xmlns:xlink="https://preview.codepad.co/redirect?url=http://www.w3.org/1999/xlink">
								<symbol id="s--circle">
									<circle r="10" cx="20" cy="20"></circle>
								</symbol>
								<g class="g-circles g-circles--v3">
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
									<g class="g--circle">
										<use xlink:href="#s--circle" class="u--circle"/>
									</g>
								</g>
							</svg>
						</div>
					';
					break;
				case '3':
					$result.= '
						<div class="l-wrapper">
							<svg viewBox="0 0 120 120" version="1.1" xmlns="https://preview.codepad.co/redirect?url=http://www.w3.org/2000/svg" xmlns:xlink="https://preview.codepad.co/redirect?url=http://www.w3.org/1999/xlink">
							  <symbol id="s--circle">
								<circle r="10" cx="20" cy="20"></circle>
							  </symbol>
							  <g class="g-circles g-circles--v2">
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
								<g class="g--circle">
								  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#s--circle" class="u--circle"></use>
								</g>
							  </g>
							</svg>
						 </div>
					';
					break;
				case '2':
					$result.= '<div class="ball"></div>';
					break;
				default:
					$result.= '<div class="loader"></div>';
					break;
			}
		}
        $result.= '</div>';
    }
    return $result;
}

/**
 * Add body layout
 *
 * @author CmsTheme
 * @since 1.0.0
 */
add_filter('body_class', function($classes) {
    global $logistics_data;
    $logistics_meta_box = logistics_post_meta();
    if (!empty($logistics_meta_box['page_layout']) && $logistics_meta_box['page_layout'] != '0') {
        //Page option
        if ($logistics_meta_box['page_layout'] == 'boxed') {
            array_push($classes, 'zo-boxed');
        } else {
            array_push($classes, 'zo-wide');
        }
    } else {
        //Theme option
        if (isset($logistics_data['body_layout']) && $logistics_data['body_layout'] == 'boxed') {
            array_push($classes, 'zo-boxed');
        } else {
            array_push($classes, 'zo-wide');
        }
    }
    if (!empty($logistics_meta_box['page_dark'])) {
        array_push($classes, 'zo-dark');
    } else {
        if (isset($logistics_data['body_layout_dark']) && $logistics_data['body_layout_dark']) {
            array_push($classes, 'zo-dark');
        }
    }
    if(!empty($logistics_data["page_class"])){
        array_push($classes, $logistics_data["page_class"]);
    }

	if(!empty($logistics_data["rtl_layout"]))
		array_push($classes, 'rtl');

	$header_layout = !empty($logistics_data['header_layout']) ? $logistics_data['header_layout']: '';
	$header_layout = !empty($logistics_meta_box['header_layout']) ? $logistics_meta_box['header_layout']: $header_layout;
    return $classes;
});

/**
 * Media Audio.
 *
 * @param string $before
 * @param string $after
 * @return bool|string
 */
function logistics_archive_audio() {
    global $logistics_base, $logistics_data;
    /* get shortcode audio. */
    $shortcode = $logistics_base->getShortcodeFromContent('audio', get_the_content());

    if ($shortcode) {
        return do_shortcode($shortcode);
    }
    return false;
}

/**
 * Media Video.
 * @return bool|string
 */
function logistics_archive_video() {

    global $wp_embed, $logistics_base, $logistics_data;
    /* Get Local Video */
    $local_video = $logistics_base->getShortcodeFromContent('video', get_the_content());

    /* Get Youtobe or Vimeo */
    $remote_video = $logistics_base->getShortcodeFromContent('embed', get_the_content());

    if ($local_video) {
        /* view local. */
        return do_shortcode($local_video);
    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        return do_shortcode($wp_embed->run_shortcode($remote_video));
    }
    return false;
}

/**
 * Gallerry Images
 *
 * @author ZoTheme
 * @since 1.0.0
 * @param string $image_size
 * @return bool|string
 */
function logistics_archive_gallery($image_size = 'full') {
    global $logistics_base, $logistics_data;
    $result = '';
    /* get shortcode gallery. */
    $shortcode = $logistics_base->getShortcodeFromContent('gallery', get_the_content());
    if ($shortcode != '') {
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);

        if (!empty($ids)) {

            $array_id = explode(",", $ids[1]);
            ob_start();
            $result.= '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
                $result.= '<div class="carousel-inner">';
                    $i = 0;
                    foreach ($array_id as $image_id):
                        $attachment_image = wp_get_attachment_image_src($image_id, $image_size, false);
                        if ($attachment_image[0] != ''):
                            $result.= '<div class="item ';
                            if ($i == 0) {
                                $result.= 'active';
                            }
                            $result.= '">';
                            $result.= '<img style="width:100%;" data-src="holder.js" src="' . esc_url($attachment_image[0]) . '" alt="" />';
                                $result.= '<div class="zo-grid-overlay">';
                                    $result.= '<a class="zo-grid-pretty" href="' . esc_url($attachment_image[0]). '" data-gallery="prettyPhoto[pp_gal]">
                                        <span></span>
                                    </a>
                                </div>
                            </div>';
                            $i++;
                        endif;
                    endforeach;
                $result.= '</div>';
                $result.= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>';
            ob_get_clean();
        } else {
            return false;
        }
    } elseif (has_post_thumbnail()) {
        return get_the_post_thumbnail($image_size);
    }
    return $result;
}

/**
 * Quote Text.
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function logistics_archive_quote() {
    global $logistics_data;
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);

    if (!empty($blockquote[0])) {
        return do_shortcode($blockquote[0]);
    }
    return false;
}

/**
 * Post link
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function logistics_archive_link() {
    /* get text. */
    preg_match("/<a(.*)href=\"(.*)\"(.*)<\/a>/", get_the_content(), $link);
    if (!empty($link[0])) {
        return do_shortcode($link[0]);
    }
    return false;
}

/**
 * Get social share link
 *
 * @return string
 * @author ZoTheme
 * @since 1.0.0
 */
function logistics_social_share() {
    global $logistics_data;
    $result = '';
    if (!empty($logistics_data['blog_single_social']) && !empty($logistics_data['social_link_blog'])) {
        $socials = $logistics_data['social_link_blog'];
        $result.= '<ul class="social-list">';
            foreach ($socials as $key => $value) {
                if ($value) {
                    switch ($key) {
                        case 'facebook':
                            $result.= '<li class="box">';
                                $result.= '<a href="' . esc_url('https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink()). '" onclick="javascript:void window.open(this.href, \'\', \'width=600,height=300,resizable=true,left=200px,top=200px\');
                                        return false;"><i class="fa fa-facebook"></i>
                                </a>';
                            $result.= '</li>';
                            break;
                        case 'twitter':
                            $result.= '<li class="box">';
                                $result.= '<a href="' . esc_url('https://twitter.com/intent/tweet?text=' . get_the_permalink()). '" onclick="javascript:void window.open(this.href, \'\', \'width=600,height=300,resizable=true,left=200px,top=200px\');
                                        return false;"><i class="fa fa-twitter"></i>
                                </a>';
                            $result.= '</li>';
                            break;
                        case 'pinterest':
                            $result.= '<li class="box">';
                                $result.= '<a href="' . esc_url('http://pinterest.com/pin/create/button?url=' . get_the_permalink()). '" onclick="javascript:void window.open(this.href, \'\', \'width=600,height=300,resizable=true,left=200px,top=200px\');
                                        return false;"><i class="fa fa-pinterest-p"></i>
                                </a>';
                            $result.= '</li>';
                            break;
                        case 'linkedin':
                            $result.= '<li class="box">';
                                $result.= '<a href="' . esc_url('https://www.linkedin.com/cws/share?url=' . get_the_permalink()). '" onclick="javascript:void window.open(this.href, \'\', \'width=600,height=300,resizable=true,left=200px,top=200px\');
                                        return false;"><i class="fa fa-linkedin"></i>
                                </a>';
                            $result.= '</li>';
                            break;
                        case 'google':
                            $result.= '<li class="box">';
                                $result.= '<a href="' . esc_url('https://plus.google.com/share?url=' . get_the_permalink()). '" onclick="javascript:void window.open(this.href, \'\', \'width=600,height=300,resizable=true,left=200px,top=200px\');
                                        return false;"><i class="fa fa-google-plus"></i>
                                </a>';
                            $result.= '</li>';
                            break;
                    }
                }
            }
        $result.= '</ul>';
    }
    return $result;
}

function logistics_comment_nav() {
    $result = '';
	// Are there comments to navigate through?
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        $result.= '<nav class="navigation comment-navigation" role="navigation">';
            $result.= '<div class="nav-links">';
                if ($prev_link = get_previous_comments_link(__('Older Comments', 'am-logistics'))) :
                    $result.= '<div class="nav-previous">' . $prev_link . '</div>';
                endif;
                if ($next_link = get_next_comments_link(__('Newer Comments', 'am-logistics'))) :
                    $result.= '<div class="nav-previous">' . $next_link . '</div>';
                endif;
            $result.= '</div>';
        $result.= '</nav>';
    endif;
    return $result;
}

function logistics_data_theme_options($key) {
    global $logistics_data;
    return isset($logistics_data[$key]) ? $logistics_data[$key] : NULL;
}

function logistics_get_blog_search() {
    global $logistics_data;
    $settings = array(
        'blog_layout_width' => 'container',
        'blog_search_layout' => 'large',
        'blog_search_layout_sidebar' => 'none',
        'body_sidebar_size' => 3
    );
    if (!empty($logistics_data['blog_layout_width']) && $logistics_data['blog_layout_width']) {
        $settings['blog_layout_width'] = 'container-fluid';
    }
    if (!empty($logistics_data['blog_search_layout'])) {
        $settings['blog_search_layout'] = $logistics_data['blog_search_layout'];
    }
    if (!empty($logistics_data['blog_search_layout_sidebar'])) {
        $settings['blog_search_layout_sidebar'] = $logistics_data['blog_search_layout_sidebar'];
    }
    if (!empty($logistics_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $logistics_data['body_sidebar_size'];
    }
    return $settings;
}

function logistics_get_blog_setting() {
    global $logistics_data;
    $settings = array(
        'blog_layout_width' => 'container',
        'blog_layout' => 'large',
        'blog_layout_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'blog_archive_layout' => 'large',
        'blog_archive_layout_sidebar' => 'none',
        'blog_layout_sidebar_bg' => 0,
        'blog_archive_layout_sidebar_bg' => 0,
        'blog_search_layout_sidebar_bg' => 0,
    );
    if (!empty($logistics_data['blog_layout_width']) && $logistics_data['blog_layout_width']) {
        $settings['blog_layout_width'] = 'container-fluid';
    }
    if (!empty($logistics_data['blog_layout'])) {
        $settings['blog_layout'] = $logistics_data['blog_layout'];
    }
    if (!empty($logistics_data['blog_layout_sidebar'])) {
        $settings['blog_layout_sidebar'] = $logistics_data['blog_layout_sidebar'];
    }
    if (!empty($logistics_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $logistics_data['body_sidebar_size'];
    }
    if (!empty($logistics_data['blog_archive_layout'])) {
        $settings['blog_archive_layout'] = $logistics_data['blog_archive_layout'];
    }
    if (!empty($logistics_data['blog_archive_layout_sidebar'])) {
        $settings['blog_archive_layout_sidebar'] = $logistics_data['blog_archive_layout_sidebar'];
    }
    if (!empty($logistics_data['blog_layout_sidebar_bg'])) {
        $settings['blog_layout_sidebar_bg'] = $logistics_data['blog_layout_sidebar_bg'];
    }
    if (!empty($logistics_data['blog_archive_layout_sidebar_bg'])) {
        $settings['blog_archive_layout_sidebar_bg'] = $logistics_data['blog_archive_layout_sidebar_bg'];
    }
    if (!empty($logistics_data['blog_search_layout_sidebar_bg'])) {
        $settings['blog_search_layout_sidebar_bg'] = $logistics_data['blog_search_layout_sidebar_bg'];
    }
    return $settings;
}

function logistics_custom_excerpt_length($length) {
    global $logistics_data;
    if (!empty($logistics_data['blog_excerpt'])) {
        $length = (int) $logistics_data['blog_excerpt'];
    }
    return $length;
}
add_filter('excerpt_length', 'logistics_custom_excerpt_length', 999);

function logistics_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'logistics_excerpt_more');

function logistics_get_blog_single_setting() {
    global $logistics_data;
    $settings = array(
        'blog_single_width' => 'container',
        'blog_single_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'blog_single_media' => '',
        'blog_single_title' => '',
        'blog_single_author' => '',
        'blog_single_date' => '',
        'blog_single_date_format' => 'l, F j, Y',
        'blog_single_categories' => '',
        'blog_single_tags' => '',
        'blog_single_social' => '',
        'blog_single_pagination' => '',
        'blog_single_related' => '',
        'blog_single_comment' => ''
    );
    if (!empty($logistics_data['blog_single_width']) && $logistics_data['blog_single_width']) {
        $settings['blog_single_width'] = 'container-fluid';
    }
    if (!empty($logistics_data['blog_single_sidebar'])) {
        $settings['blog_single_sidebar'] = $logistics_data['blog_single_sidebar'];
    }
    if (!empty($logistics_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $logistics_data['body_sidebar_size'];
    }
    if (!empty($logistics_data['blog_single_media'])) {
        $settings['blog_single_media'] = $logistics_data['blog_single_media'];
    }
    if (!empty($logistics_data['blog_single_title'])) {
        $settings['blog_single_title'] = $logistics_data['blog_single_title'];
    }
    if (!empty($logistics_data['blog_single_author'])) {
        $settings['blog_single_author'] = $logistics_data['blog_single_author'];
    }
    if (!empty($logistics_data['blog_single_date'])) {
        $settings['blog_single_date'] = $logistics_data['blog_single_date'];
    }
    if (!empty($logistics_data['blog_single_date_format'])) {
        $settings['blog_single_date_format'] = $logistics_data['blog_single_date_format'];
    }
    if (!empty($logistics_data['blog_single_categories'])) {
        $settings['blog_single_categories'] = $logistics_data['blog_single_categories'];
    }
    if (!empty($logistics_data['blog_single_tags'])) {
        $settings['blog_single_tags'] = $logistics_data['blog_single_tags'];
    }
    if (!empty($logistics_data['blog_single_social'])) {
        $settings['blog_single_social'] = $logistics_data['blog_single_social'];
    }
    if (!empty($logistics_data['blog_single_pagination'])) {
        $settings['blog_single_pagination'] = $logistics_data['blog_single_pagination'];
    }
    if (!empty($logistics_data['blog_single_related'])) {
        $settings['blog_single_related'] = $logistics_data['blog_single_related'];
    }
    if (!empty($logistics_data['blog_single_comment'])) {
        $settings['blog_single_comment'] = $logistics_data['blog_single_comment'];
    }
    return $settings;
}

function logistics_get_portfolio_setting() {
    global $logistics_data;
    $settings = array(
        'portfolio_single_width' => 'container',
        'portfolio_single_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'portfolio_single_media' => '',
        'portfolio_single_title' => '',
        'portfolio_single_author' => '',
        'portfolio_single_client' => '',
        'portfolio_single_role' => '',
        'portfolio_single_date' => '',
        'portfolio_single_date_format' => 'l, F j, Y',
        'portfolio_single_categories' => '',
        'portfolio_single_social' => '',
        'portfolio_single_pagination' => '',
    );
    if (!empty($logistics_data['portfolio_single_width']) && $logistics_data['portfolio_single_width']) {
        $settings['portfolio_single_width'] = 'container-fluid';
    }
    if (!empty($logistics_data['portfolio_single_sidebar'])) {
        $settings['portfolio_single_sidebar'] = $logistics_data['portfolio_single_sidebar'];
    }
    if (!empty($logistics_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $logistics_data['body_sidebar_size'];
    }
    if (!empty($logistics_data['portfolio_single_media'])) {
        $settings['portfolio_single_media'] = $logistics_data['portfolio_single_media'];
    }
    if (!empty($logistics_data['portfolio_single_title'])) {
        $settings['portfolio_single_title'] = $logistics_data['portfolio_single_title'];
    }
    if (!empty($logistics_data['portfolio_single_author'])) {
        $settings['portfolio_single_author'] = $logistics_data['portfolio_single_author'];
    }
    if (!empty($logistics_data['portfolio_single_role'])) {
        $settings['portfolio_single_role'] = $logistics_data['portfolio_single_role'];
    }
    if (!empty($logistics_data['portfolio_single_client'])) {
        $settings['portfolio_single_client'] = $logistics_data['portfolio_single_client'];
    }
    if (!empty($logistics_data['portfolio_single_date'])) {
        $settings['portfolio_single_date'] = $logistics_data['portfolio_single_date'];
    }
    if (!empty($logistics_data['portfolio_single_date_format'])) {
        $settings['portfolio_single_date_format'] = $logistics_data['portfolio_single_date_format'];
    }
    if (!empty($logistics_data['portfolio_single_categories'])) {
        $settings['portfolio_single_categories'] = $logistics_data['portfolio_single_categories'];
    }
    if (!empty($logistics_data['portfolio_single_social'])) {
        $settings['portfolio_single_social'] = $logistics_data['portfolio_single_social'];
    }
    if (!empty($logistics_data['portfolio_single_pagination'])) {
        $settings['portfolio_single_pagination'] = $logistics_data['portfolio_single_pagination'];
    }
    return $settings;
}

function logistics_get_portfolio_archive_setting() {
    global $logistics_data;
    $settings = array(
        'portfolio_width' => 'container',
        'portfolio_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'portfolio_media' => '',
        'portfolio_title' => '',
        'portfolio_author' => '',
        'portfolio_client' => '',
        'portfolio_skill' => '',
        'portfolio_date' => '',
        'portfolio_date_format' => 'l, F j, Y',
        'portfolio_categories' => '',
    );
    if (!empty($logistics_data['portfolio_width']) && $logistics_data['portfolio_width']) {
        $settings['portfolio_width'] = 'container-fluid';
    }
    if (!empty($logistics_data['portfolio_sidebar'])) {
        $settings['portfolio_sidebar'] = $logistics_data['portfolio_sidebar'];
    }
    if (!empty($logistics_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $logistics_data['body_sidebar_size'];
    }
    if (!empty($logistics_data['portfolio_media'])) {
        $settings['portfolio_media'] = $logistics_data['portfolio_media'];
    }
    if (!empty($logistics_data['portfolio_title'])) {
        $settings['portfolio_title'] = $logistics_data['portfolio_title'];
    }
    if (!empty($logistics_data['portfolio_author'])) {
        $settings['portfolio_author'] = $logistics_data['portfolio_author'];
    }
    if (!empty($logistics_data['portfolio_client'])) {
        $settings['portfolio_client'] = $logistics_data['portfolio_client'];
    }
    if (!empty($logistics_data['portfolio_date'])) {
        $settings['portfolio_date'] = $logistics_data['portfolio_date'];
    }
    if (!empty($logistics_data['portfolio_date_format'])) {
        $settings['portfolio_date_format'] = $logistics_data['portfolio_date_format'];
    }
    if (!empty($logistics_data['portfolio_categories'])) {
        $settings['portfolio_categories'] = $logistics_data['portfolio_categories'];
    }
    return $settings;
}

/* Add social Author */
add_action('show_user_profile', 'logistics_show_extra_profile_fields');
add_action('edit_user_profile', 'logistics_show_extra_profile_fields');
function logistics_show_extra_profile_fields($user) {
    ?>
    <h3><?php esc_html_e('Social Pages: ', 'am-logistics'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="facebook"><?php esc_html_e('Facebook', 'am-logistics'); ?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Facebook.', 'am-logistics'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter"><?php esc_html_e('Twitter', 'am-logistics'); ?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Twitter.', 'am-logistics'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="linkedin"><?php esc_html_e('Linkedin', 'am-logistics'); ?></label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Linkedin.', 'am-logistics'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="google"><?php esc_html_e('Google +', 'am-logistics'); ?></label></th>
            <td>
                <input type="text" name="google" id="google" value="<?php echo esc_attr(get_the_author_meta('google', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Google +.', 'am-logistics'); ?></span>
            </td>
        </tr>
    </table>
    <?php
}

add_action('personal_options_update', 'logistics_save_extra_profile_fields');
add_action('edit_user_profile_update', 'logistics_save_extra_profile_fields');
function logistics_save_extra_profile_fields($user_id) {
    if (!current_user_can('edit_user', $user_id))
        return false;

    update_user_meta($user_id, 'twitter', $_POST['twitter']);
    update_user_meta($user_id, 'facebook', $_POST['facebook']);
    update_user_meta($user_id, 'linkedin', $_POST['linkedin']);
    update_user_meta($user_id, 'google', $_POST['google']);
}

/**
 * loadmore
 */
function logistics_masonry_loadmore() {

    $paged = ( $_POST['startPage']) ? $_POST['startPage'] : 1;
    $zo_data = $_POST['zo_data'];
    $order = (isset($zo_data['order'])) ? $zo_masonry['order'] : '';

    $args = array(
        'orderby' => $zo_data['orderby'],
        'order' => $order,
        'paged' => $paged,
        'post_status' => 'publish',
        'posts_per_page' => $zo_data['posts_per_page'],
        'post_type' => $zo_data['post_type']
    );

    $posts = new WP_Query($args);
    $size = ( isset($atts['layout']) && $atts['layout'] == 'basic') ? 'medium' : 'full';
    $taxo = 'portfolio-category';
    $tag = 'portfolio-tag';

    while ($posts->have_posts()) {
        $posts->the_post();
        $groups = array();
        $groups[] = '"all"';
        foreach (zoGetCategoriesByPostID(get_the_ID(), $taxo) as $category) {
            $groups[] = '"category-' . $category->slug . '"';
        }
        ?>
        <div class="zo-ajax zo-grid-item <?php echo esc_attr($zo_data['item_class']); ?>" data-groups='[<?php echo implode(',', $groups); ?>]'
             data-order-newest='<?php the_date(); ?>' data-order-title='<?php the_title(); ?>'>
                 <?php get_template_part('single-templates/portfolio/content', 'grid'); ?>
        </div>
        <?php
    }
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_logistics_masonry_loadmore', 'logistics_masonry_loadmore');
add_action('wp_ajax_nopriv_logistics_masonry_loadmore', 'logistics_masonry_loadmore');

function logistics_post_meta($post_id = null) {
    if($post_id == null && !is_singular()){
        return array();
    }elseif($post_id == null){
        $post_id = get_the_ID();
    }
    $arr = array();
    $temp = get_post_meta($post_id);
    if (is_array($temp)) {
        foreach ($temp as $key => $value) {
            if (count($value) == 1) {
                $arr[$key] = $value[0];
            } else {
                $arr[$key] = $value;
            }
        }
    }
    return $arr;
}

function logistics_get_sidebar_width() {
    global $logistics_data;
    $sidebar = 3;
    if (!empty($logistics_data['body_sidebar_size'])) {
        $sidebar = (int) $logistics_data['body_sidebar_size'];
    }
    return $sidebar;
}

function logistics_general_button_stroke($padding = array(), $btn='btn', $stroke = '1') {
    $css = '';
    $css.= '.' . $btn . '.stroke-' .$stroke. '{';
    if(!empty($padding['padding-top'])){
        $css.= 'padding-top: calc(' . esc_attr($padding['padding-top']) . ' - ' .$stroke. 'px);';
    }
    if(!empty($padding['padding-right'])){
        $css.= 'padding-right: calc(' . esc_attr($padding['padding-right']) . ' - ' .$stroke. 'px);';
    }
    if(!empty($padding['padding-bottom'])){
        $css.= 'padding-bottom: calc(' . esc_attr($padding['padding-bottom']) . ' - ' .$stroke. 'px);';
    }
    if(!empty($padding['padding-left'])){
        $css.= 'padding-left: calc(' . esc_attr($padding['padding-left']) . ' - ' .$stroke. 'px);';
    }
    $css.= '}';
    return $css;
}

function logistics_get_pricing_type($pricing_type = 'month'){
    global $logistics_data;
    $return = 'Mo';
    $types =$logistics_data['pricing_table_type'];
    if($pricing_type == '365'){
        $pricing_type = 'year';
    }
    if(is_array($types)){
        if(!empty($types[$pricing_type])){
            $return = $types[$pricing_type];
        }
    }
    return $return;
}

function logistics_general_margin($setting = array()){
    $css = '';
    if(!empty($setting['margin-top'])){
        $css .= 'margin-top:' . esc_attr($setting['margin-top']) . ' !important;';
    }
    if(!empty($setting['margin-right'])){
        $css .= 'margin-right:' . esc_attr($setting['margin-right']) . ' !important;';
    }
    if(!empty($setting['margin-bottom'])){
        $css .= 'margin-bottom:' . esc_attr($setting['margin-bottom']) . ' !important;';
    }
    if(!empty($setting['margin-left'])){
        $css .= 'margin-left:' . esc_attr($setting['margin-left']) . ' !important;';
    }
    return $css;
}

function logistics_general_padding($setting = array()){
    $css = '';
    if(!empty($setting['padding-top'])){
        $css .= 'padding-top:' . esc_attr($setting['padding-top']) . ' !important;';
    }
    if(!empty($setting['padding-right'])){
        $css .= 'padding-right:' . esc_attr($setting['padding-right']) . ' !important;';
    }
    if(!empty($setting['padding-bottom'])){
        $css .= 'padding-bottom:' . esc_attr($setting['padding-bottom']) . ' !important;';
    }
    if(!empty($setting['padding-left'])){
        $css .= 'padding-left:' . esc_attr($setting['padding-left']) . ' !important;';
    }
    return $css;
}

