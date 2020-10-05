<?php

/**
 * Auto create css from Meta Options.
 *
 * @author ZoTheme
 * @version 1.0.0
 */
class CMS_DynamicCss {

    function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'generate_css'), 99);
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css() {
        global $logistics_data, $logistics_base;
        $css = $this->css_render();
        $css = $logistics_base->compressCss($css);
        wp_add_inline_style('logistics-static', $css);

    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render() {
        global $logistics_data;
        $logistics_meta_box = logistics_post_meta();
        ob_start();
        /* Custom Css. */
        if (isset($logistics_data['custom_css'])) {
            echo wp_filter_nohtml_kses(trim($logistics_data['custom_css'])) . "\n";
        }
        $result = '';
        // LAYOUT
        if (!empty($logistics_data['body_background'])) {
            $body_bg = array();
            $body_bg = $logistics_data['body_background'];
            if (!empty($logistics_meta_box['page_body_bg_color'])) {
                $body_bg['background-color'] = ($logistics_meta_box['page_body_bg_color']);
            }
            if (!empty($logistics_meta_box['page_body_bg_image'])) {
                $body_bg['background-image'] = esc_url($logistics_meta_box['page_body_bg_image']);
                if (!empty($logistics_meta_box['page_body_bg_repeat'])) {
                    $body_bg['background-repeat'] = ($logistics_meta_box['page_body_bg_repeat']);
                }
                if (!empty($logistics_meta_box['page_body_bg_size'])) {
                    $body_bg['background-size'] = ($logistics_meta_box['page_body_bg_size']);
                }
                if (!empty($logistics_meta_box['page_body_bg_attachment'])) {
                    $body_bg['background-attachment'] = ($logistics_meta_box['page_body_bg_attachment']);
                }
                if (!empty($logistics_meta_box['page_body_bg_position'])) {
                    $body_bg['background-position'] = ($logistics_meta_box['page_body_bg_position']);
                }
            }
            $result.= 'body{' . logistics_general_background($body_bg) . '}';
        }

        // BOXED BACKGROUND
        if (!empty($logistics_data['body_boxed_background'])) {
            $boxed_bg = array();
            $boxed_bg = $logistics_data['body_boxed_background'];
            if (!empty($logistics_meta_box['page_boxed_bg_color'])) {
                $body_bg['background-color'] = ($logistics_meta_box['page_boxed_bg_color']);
            }
            if (!empty($logistics_meta_box['page_boxed_image'])) {
                $body_bg['background-image'] = esc_url($logistics_meta_box['page_boxed_image']);
            }
            $result.= 'body.zo-boxed #page{' . logistics_general_background($boxed_bg) . '}';
        }
	    $result.= '@media (min-width: 992px) {';
			/* Custom Menu Color */
			if(!empty($logistics_meta_box['header_menu_custom_color'])){
				if (!empty($logistics_meta_box['header_menu_color'])) {
					$result.= ".zo-header-navigation .nav-menu > li,
					.zo-header-navigation .nav-menu > li > a,
					.widget_cart_search_wrap a {
						color: " . ($logistics_meta_box['header_menu_color']) . ";
					}";
				}
				if (!empty($logistics_meta_box['header_menu_color_hover'])) {
					$result.= ".zo-header-navigation .nav-menu > li:hover,
					.zo-header-navigation .nav-menu > li:hover > a,
					.widget_cart_search_wrap a:hover {
						color:" . ($logistics_meta_box['header_menu_color_hover']) . ";
					}";
					$result.= ".zo-header-navigation .nav-menu > li:hover {
						border-bottom-color: " . ($logistics_meta_box['header_menu_color_hover']) . ";
					}";
				}
				if (!empty($logistics_meta_box['header_menu_color_active'])) {
					$result.= ".zo-header-navigation .nav-menu > li.current-menu-item,
					.zo-header-navigation .nav-menu > li.current-menu-ancestor,
					.zo-header-navigation .nav-menu > li.current_page_item,
					.zo-header-navigation .nav-menu > li.current_page_ancestor,
					.zo-header-navigation .nav-menu > li.current-menu-parent,
					.zo-header-navigation .nav-menu > li.current-menu-item > a,
					.zo-header-navigation .nav-menu > li.current-menu-ancestor > a,
					.zo-header-navigation .nav-menu > li.current_page_item > a,
					.zo-header-navigation .nav-menu > li.current_page_ancestor > a,
					.zo-header-navigation .nav-menu > li.current-menu-parent > a,
					.widget_cart_search_wrap a:active,
					.widget_cart_search_wrap a:focus {
						color:" . ($logistics_meta_box['header_menu_color_active']) . ";

					}";
				}
				if (!empty($logistics_meta_box['header_sub_menu_color'])) {
					$result.= ".zo-header-navigation .nav-menu > li ul li,
					.zo-header-navigation .nav-menu > li ul li > a {
						color:" . ($logistics_meta_box['header_sub_menu_color']) . ";
					}";
				}
				if (!empty($logistics_meta_box['header_sub_menu_color_hover'])) {
					$result.= ".zo-header-navigation .nav-menu > li li > a:focus,
					.zo-header-navigation .nav-menu > li ul li:hover,
					.zo-header-navigation .nav-menu > li ul li.current-menu-item,
					.zo-header-navigation .nav-menu > li ul li.current-menu-parent,
					.zo-header-navigation .nav-menu > li ul li.current-menu-ancestor,
					.zo-header-navigation .nav-menu > li ul li.current_page_item,
					.zo-header-navigation .nav-menu > li ul li:hover > a,
					.zo-header-navigation .nav-menu > li ul li.current-menu-item > a,
					.zo-header-navigation .nav-menu > li ul li.current-menu-parent > a,
					.zo-header-navigation .nav-menu > li ul li.current-menu-ancestor > a,
					.zo-header-navigation .nav-menu > li ul li.current_page_item > a {
						color:" . ($logistics_meta_box['header_sub_menu_color_hover']) . ";
					}";
				}
			}
			if(!empty($logistics_meta_box['header_collapsed_color'])){
				$result.= '.zo-collapsed-button span{';
				$result.= 'background: ' . ($logistics_meta_box['header_collapsed_color']) . ';';
				$result.= '}';
				$result.= '.zo-collapsed-button span:before{';
				$result.= 'background: ' . ($logistics_meta_box['header_collapsed_color']) . ';';
				$result.= '}';
				$result.= '.zo-collapsed-button span:after{';
				$result.= 'background: ' . ($logistics_meta_box['header_collapsed_color']) . ';';
				$result.= '}';
			}
		$result.= '}';
        //Header Style 01
		$result.= '@media (min-width: 992px) {';
			$header_bg = array();
			if (!empty($logistics_data['header_01_bg_image'])) {
				$header_bg = $logistics_data['header_01_bg_image'];
				$header_bg['background-color'] = '#FFFFFF';
				if (!empty($logistics_meta_box['header_bg_color'])) {
					$header_bg['background-color'] = ($logistics_meta_box['header_bg_color']);
				} elseif (!empty($logistics_data['header_01_bg_color'])) {
					$header_bg['background-color'] = $logistics_data['header_01_bg_color']['rgba'];
				}
				if (!empty($logistics_meta_box['header_bg_image'])) {
					$header_bg['background-image'] = esc_url($logistics_meta_box['header_bg_image']);
					if (!empty($logistics_meta_box['header_bg_repeat'])) {
						$header_bg['background-repeat'] = ($logistics_meta_box['header_bg_repeat']);
					}
					if (!empty($logistics_meta_box['header_bg_size'])) {
						$header_bg['background-size'] = ($logistics_meta_box['header_bg_size']);
					}
					if (!empty($logistics_meta_box['header_bg_attachment'])) {
						$header_bg['background-attachment'] = ($logistics_meta_box['header_bg_attachment']);
					}
					if (!empty($logistics_meta_box['header_bg_position'])) {
						$header_bg['background-position'] = ($logistics_meta_box['header_bg_position']);
					}
				}
                $result.= '#zo-header.header-style-01 {' . logistics_general_background($header_bg) . '}';
			}
			if (!empty($logistics_meta_box['header_transparent'])) {
				if ($logistics_meta_box['header_transparent'] == 'on') {
                    $logistics_data['header_01_transparent'] = 1;
				}else{
                    $logistics_data['header_01_transparent'] = 0;
                }
                if (!empty($logistics_meta_box['header_transparent_full'])){
                    if ($logistics_meta_box['header_transparent_full'] == 'on'){
                        $logistics_data['header_01_transparent_bg_color_full'] = 1;
                    }else{
                        $logistics_data['header_01_transparent_bg_color_full'] = 0;
                    }
                }
			}
            if (!empty($logistics_data['header_01_transparent']) && !empty($logistics_data['header_01_transparent_bg_color'])) {
                if(!empty($logistics_data['header_01_transparent_bg_color_full'])){
                    if($logistics_data['header_01_transparent_bg_color']['alpha']==0){
                        $result.= '#zo-header:not(.header-sticky.affix).header-style-01.header-transparent{ background-color: rgba(' . $logistics_data['header_01_transparent_bg_color']['rgba'] . ','. $logistics_data['header_01_transparent_bg_color']['alpha'] .');';
                        //Border top
                        if(!empty($logistics_data['header_01_transparent_border_top'])){
                            if($logistics_data['header_01_transparent_border_color']['alpha']==0){
                                $result.= 'border-top: ' . $logistics_data['header_01_transparent_border_top'] . 'px solid ' .  'rgba(' . $logistics_data['header_01_transparent_border_color']['rgba'] . ','. $logistics_data['header_01_transparent_border_color']['alpha'] .');';
                            }else{
                                $result.= 'border-top: ' . $logistics_data['header_01_transparent_border_top'] . 'px solid ' .  $logistics_data['header_01_transparent_border_color']['rgba'] . ';';
                            }
                        }
                        //Border bottom
                        if(!empty($logistics_data['header_01_transparent_border_bottom'])){
                            if($logistics_data['header_01_transparent_border_color']['alpha']==0){
                                $result.= 'border-bottom: ' . $logistics_data['header_01_transparent_border_bottom'] . 'px solid ' .  'rgba(' . $logistics_data['header_01_transparent_border_color']['rgba'] . ','. $logistics_data['header_01_transparent_border_color']['alpha'] .');';
                            }else{
                                $result.= 'border-bottom: ' . $logistics_data['header_01_transparent_border_bottom'] . 'px solid ' .  $logistics_data['header_01_transparent_border_color']['rgba'] . ';';
                            }
                        }
                        $result.= '}';
                    }else{
                        $result.= '#zo-header:not(.header-sticky.affix).header-style-01.header-transparent{ background-color: ' . $logistics_data['header_01_transparent_bg_color']['rgba'] . ';';
                        //Border top
                        if(!empty($logistics_data['header_01_transparent_border_top'])){
                            if($logistics_data['header_01_transparent_border_color']['alpha']==0){
                                $result.= 'border-top: ' . $logistics_data['header_01_transparent_border_top'] . 'px solid ' .  'rgba(' . $logistics_data['header_01_transparent_border_color']['rgba'] . ','. $logistics_data['header_01_transparent_border_color']['alpha'] .');';
                            }else{
                                $result.= 'border-top: ' . $logistics_data['header_01_transparent_border_top'] . 'px solid ' .  $logistics_data['header_01_transparent_border_color']['rgba'] . ';';
                            }
                        }
                        //Border bottom
                        if(!empty($logistics_data['header_01_transparent_border_bottom'])){
                            if($logistics_data['header_01_transparent_border_color']['alpha']==0){
                                $result.= 'border-bottom: ' . $logistics_data['header_01_transparent_border_bottom'] . 'px solid ' .  'rgba(' . $logistics_data['header_01_transparent_border_color']['rgba'] . ','. $logistics_data['header_01_transparent_border_color']['alpha'] .');';
                            }else{
                                $result.= 'border-bottom: ' . $logistics_data['header_01_transparent_border_bottom'] . 'px solid ' .  $logistics_data['header_01_transparent_border_color']['rgba'] . ';';
                            }
                        }
                        $result.= '}';
                    }
                }else{
                    if (!empty($logistics_data['header_01_transparent_padding'])) {
                        $result.= '@media (min-width: 992px){';
                            $result.= '#zo-header.header-style-01 {';
                            $result.= logistics_general_padding($logistics_data['header_01_transparent_padding']);
                            $result.= '}';
                        $result.= '}';
                    }
                    if($logistics_data['header_01_transparent_bg_color']['alpha']==0){
                        $result.= '#zo-header:not(.header-sticky.affix).header-style-01.header-transparent .zo-header-main{ background-color: rgba(' . $logistics_data['header_01_transparent_bg_color']['rgba'] . ','. $logistics_data['header_01_transparent_bg_color']['alpha'] .');margin: 0;}';
                    }else{
                        $result.= '#zo-header:not(.header-sticky.affix).header-style-01.header-transparent .zo-header-main{ background-color: ' . $logistics_data['header_01_transparent_bg_color']['rgba'] . ';margin: 0;}';
                    }
                }
            }
			if(!empty($logistics_meta_box['header_menu_alignment'])){
				$result.= '#zo-header.header-style-01 .zo-header-secondary .nav-menu{';
					$result.= 'text-align: ' . $logistics_meta_box['header_menu_alignment'] . ';';
				$result.= '}';
			}elseif(!empty($logistics_data['header_01_menu_alignment'])){
				$result.= '#zo-header.header-style-01 .zo-header-secondary .nav-menu{';
					$result.= 'text-align: ' . $logistics_data['header_01_menu_alignment'] . ';';
				$result.= '}';
			}
		$result.= '}';
        //End Header Style 01
        $pt_bg = array();
        if (!empty($logistics_data['pt_background'])) {
            $pt_bg = $logistics_data['pt_background'];
            if (!empty($logistics_meta_box['page_title_bg_color'])) {
                $pt_bg['background-color'] = ($logistics_meta_box['page_title_bg_color']);
            }
            if (!empty($logistics_meta_box['page_title_bg_image'])) {
                $pt_bg['background-image'] = esc_url($logistics_meta_box['page_title_bg_image']);
                if (!empty($logistics_meta_box['page_title_bg_repeat'])) {
                    $pt_bg['background-repeat'] = ($logistics_meta_box['page_title_bg_repeat']);
                }
                if (!empty($logistics_meta_box['page_title_bg_size'])) {
                    $pt_bg['background-size'] = ($logistics_meta_box['page_title_bg_size']);
                }
                if (!empty($logistics_meta_box['page_title_bg_attachment'])) {
                    $pt_bg['background-attachment'] = ($logistics_meta_box['page_title_bg_attachment']);
                }
                if (!empty($logistics_meta_box['page_title_bg_position'])) {
                    $pt_bg['background-position'] = ($logistics_meta_box['page_title_bg_position']);
                }
            }else{
                if(!empty($logistics_meta_box['page_title_bg_color'])){
                    $pt_bg['background-image'] = '';
                }
            }
        }
        if (!empty($logistics_meta_box['page_title_text_alignment']) && $logistics_meta_box['page_title_text_alignment'] != 'default') {
            $logistics_data['pt_alignment'] = $logistics_meta_box['page_title_text_alignment'];
        }
        if (!empty($logistics_meta_box['page_title_text_horizontal_alignment']) && $logistics_meta_box['page_title_text_horizontal_alignment'] != 'default') {
            $logistics_data['pt_vertical_alignment'] = $logistics_meta_box['page_title_text_horizontal_alignment'];
            if (!empty($logistics_meta_box['page_title_text_padding_top']) && is_numeric($logistics_meta_box['page_title_text_padding_top'])) {
                $logistics_data['pt_text_padding']['padding-top'] = $logistics_meta_box['page_title_text_padding_top'] . 'px';
            }
            if (!empty($logistics_meta_box['page_title_text_padding_bottom']) && is_numeric($logistics_meta_box['page_title_text_padding_bottom'])) {
                $logistics_data['pt_text_padding']['padding-bottom'] = $logistics_meta_box['page_title_text_padding_bottom'] . 'px';
            }
        }
        if (!empty($logistics_meta_box['page_title_breadcrumb_display']) && $logistics_meta_box['page_title_breadcrumb_display'] != 'default') {
            $logistics_data['pt_breadcrumb'] = $logistics_meta_box['page_title_breadcrumb_display'];
        }
        if (!empty($logistics_meta_box['page_title_breadcrumb_position']) && $logistics_meta_box['page_title_breadcrumb_position'] != 'default') {
            $logistics_data['pt_breadcrumb_position'] = $logistics_meta_box['page_title_breadcrumb_position'];
        }

        //PAGE TITLE
        $result.= '#zo-page-element-wrap {';
        // Background
        $result.= logistics_general_background($pt_bg);

        // Page Title Margin
        $result.= logistics_general_margin($logistics_data['pt_margin']);

        // Page Title Height
        if (!empty($logistics_data['pt_vertical_alignment']) && $logistics_data['pt_vertical_alignment'] == 'middle') {
            if (!empty($logistics_meta_box['page_title_height']) && is_numeric($logistics_meta_box['page_title_height'])) {
                $result.= 'height: ' . ($logistics_meta_box['page_title_height']) . 'px;';
            } else {
                if (!empty($logistics_data['pt_height']))
                    $result.= 'height: ' . ($logistics_data['pt_height']) . 'px;';
            }
        }else {
            if (!empty($logistics_meta_box['page_title_height']) && is_numeric($logistics_meta_box['page_title_height'])) {
                $result.= 'min-height: ' . ($logistics_meta_box['page_title_height']) . 'px;';
            } else {
                if (!empty($logistics_data['pt_height']))
                    $result.= 'min-height: ' . ($logistics_data['pt_height']) . 'px;';
            }
        }

        // Page Title Border
        if(empty($logistics_meta_box['page_title_border']) || (!empty($logistics_meta_box['page_title_border']) && ($logistics_meta_box['page_title_border'] == 'default' || $logistics_meta_box['page_title_border'] == 'true'))){
            if (!empty($logistics_data['pt_border_color'])) {
                if (!empty($logistics_data['pt_border_width_top'])) {
                    $result.= 'border-top: ' . $logistics_data['pt_border_width_top'] . 'px solid ' . $logistics_data['pt_border_color'] . ';';
                }
                if (!empty($logistics_data['pt_border_width_bottom'])) {
                    $result.= 'border-bottom: ' . $logistics_data['pt_border_width_bottom'] . 'px solid ' . $logistics_data['pt_border_color'] . ';';
                }
            }
        }
        $result.= '}';

        $result.= '@media(max-width: 991px) {';
        $result.= '#zo-page-element-wrap {';
        // Page Title Margin Tablet
        $result.= logistics_general_margin($logistics_data['pt_margin_tablet']);
        //Page Title Mobile Height
        if (!empty($logistics_data['pt_vertical_alignment']) && $logistics_data['pt_vertical_alignment'] == 'middle') {
            if (!empty($logistics_meta_box['page_title_mobile_height']) && is_numeric($logistics_meta_box['page_title_mobile_height'])) {
                $result.= 'height: ' . ($logistics_meta_box['page_title_mobile_height']) . 'px;';
            } else {
                if (!empty($logistics_data['pt_mobile_height'])) {
                    $result.= 'height: ' . ($logistics_data['pt_mobile_height']) . 'px;';
                }
            }
        } else {
            if (!empty($logistics_meta_box['page_title_mobile_height']) && is_numeric($logistics_meta_box['page_title_mobile_height'])) {
                $result.= 'min-height: ' . ($logistics_meta_box['page_title_mobile_height']) . 'px;';
            } else {
                if (!empty($logistics_data['pt_mobile_height'])) {
                    $result.= 'min-height: ' . ($logistics_data['pt_mobile_height']) . 'px;';
                }
            }
        }
        $result.= '}';
        $result.= '}';

        $result.= '@media(max-width: 767px) {';
        $result.= '#zo-page-element-wrap {';
        // Page Title Margin Phone
        $result.= logistics_general_margin($logistics_data['pt_margin_phone']);

        $result.= '}';
        $result.= '}';

        if (!empty($logistics_data['pt_alignment'])) {

            if ($logistics_data['pt_alignment'] != 'center' && $logistics_data['pt_breadcrumb'] != 'none' && $logistics_data['pt_breadcrumb_position'] == 'symmetric') {
                $result.= '#zo-page-element-wrap .zo-page-title-content{ display: table;width: 100%;}';
                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text{';
                $result.= 'width: 60%; display: table-cell;';
                $result.= '}';
                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary{';
                $result.= 'width: 40%; display: table-cell;';
                $result.= '}';
            }

            if ($logistics_data['pt_alignment'] == 'right') {
                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: right;}';
                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary {text-align: left;}';
            } elseif ($logistics_data['pt_alignment'] == 'left') {
                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: left;}';
                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary {text-align: right;}';
            } else {
                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: center;}';
            }
        }
        if (!empty($logistics_data['pt_vertical_alignment'])) {
            if ($logistics_data['pt_vertical_alignment'] == 'middle') {
                $result.= '#zo-page-element-wrap .zo-page-title-container{';
                $result.= 'height: 100%;';
                $result.= '}';

                $result.= '#zo-page-element-wrap .zo-page-title-content{';
                $result.= 'height: 100%; display: table;width: 100%;';
                $result.= '}';

                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text,';
                $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary{';
                $result.= 'vertical-align: middle; display: table-cell;position: relative;z-index: 1;';
                $result.= '}';
            } elseif ($logistics_data['pt_vertical_alignment'] == 'custom') {
                $result.= '#zo-page-element-wrap .zo-page-title-container{';
                if (!empty($logistics_data['pt_text_padding']['padding-top']))
                    $result.= 'padding-top: ' . $logistics_data['pt_text_padding']['padding-top'] . ';';
                if (!empty($logistics_data['pt_text_padding']['padding-bottom']))
                    $result.= 'padding-bottom: ' . $logistics_data['pt_text_padding']['padding-bottom'] . ';';
                $result.= '}';
            }
        }

        // FOOTER
        $footer_bg = array();
        if (!empty($logistics_data['footer_background'])) {
            $footer_bg = $logistics_data['footer_background'];
            if (!empty($logistics_meta_box['footer_bg_color'])) {
                $footer_bg['background-color'] = ($logistics_meta_box['footer_bg_color']);
            }
            if (!empty($logistics_meta_box['footer_bg_image'])) {
                $footer_bg['background-image'] = esc_url($logistics_meta_box['footer_bg_image']);
            }else{
                if(!empty($logistics_meta_box['footer_bg_color'])){
                    $footer_bg['background-image'] = '';
                }
            }
            if (!empty($logistics_meta_box['footer_bg_repeat'])) {
                $footer_bg['background-repeat'] = ($logistics_meta_box['footer_bg_repeat']);
            }
            if (!empty($logistics_meta_box['footer_bg_size'])) {
                $footer_bg['background-size'] = ($logistics_meta_box['footer_bg_size']);
            }
            if (!empty($logistics_meta_box['footer_bg_attachment'])) {
                $footer_bg['background-attachment'] = ($logistics_meta_box['footer_bg_attachment']);
            }
            if (!empty($logistics_meta_box['footer_bg_position'])) {
                $footer_bg['background-position'] = ($logistics_meta_box['footer_bg_position']);
            }
            $result.= '#zo-footer {';

            // Background
            $result.= logistics_general_background($footer_bg);
            // Footer Content Borders
            if (!empty($logistics_data['footer_border_color'])) {
                if (!empty($logistics_data['footer_border_width_top'])) {
                    $result.= 'border-top: ' . $logistics_data['footer_border_width_top'] . 'px solid ' . $logistics_data['footer_border_color'] . ';';
                }
            }
            $result.= '}';
        }

        if (!empty($logistics_meta_box['footer_copyright_bg_color'])) {
            $result.= '#zo-footer-copyright {';
            $result.= 'background-color: ' . ($logistics_meta_box['footer_copyright_bg_color']) . ';';
            $result.= '}';
        } else {
            if (!empty($logistics_data['footer_copyright_background'])) {
                $result.= '#zo-footer-copyright {';
                $result.= 'background-color: ' . ($logistics_data['footer_copyright_background']) . ';';
                $result.= '}';
            }
        }
        // Background color

        /* Start Page Title */
        if (!empty($logistics_meta_box['page_title']) && $logistics_meta_box['page_title'] == 'on') {
            $result.= "#zo-page-element-wrap {";
            if (!empty($logistics_meta_box['page_title_height'])) {
                $result.= 'height: ' . ($logistics_meta_box['page_title_height']) . 'px;';
            }
            if (!empty($logistics_meta_box['page_title_background_color'])) {
                $result.= 'background-color: ' . ($logistics_meta_box['page_title_background_color']) . ';';
            }
            if (!empty($logistics_meta_box['page_title_background_image'])) {
                $result.= "background-image: url('" . esc_url(wp_get_attachment_image_src($logistics_meta_box['page_title_background_image'], 'full')[0]) . "');";
            }
            if (!empty($logistics_meta_box['page_title_background_repeat'])) {
                $result.= 'background-repeat:' . ($logistics_meta_box['page_title_background_repeat']) . ' ;';
            }
            if (!empty($logistics_meta_box['page_title_background_position'])) {
                $result.= 'background-position: ' . ($logistics_meta_box['page_title_background_position']) . ';';
            }
            if (!empty($logistics_meta_box['page_title_background_cover'])) {
                $result.= 'background-size:' . ($logistics_meta_box['page_title_background_cover']) . ' ;';
            }
            if (!empty($logistics_meta_box['page_title_background_fixed'])) {
                $result.= 'background-attachment:' . ($logistics_meta_box['page_title_background_fixed']) . ' ;';
            }
            if (!empty($logistics_meta_box['page_title_margin'])) {
                $result.= "margin: " . ($logistics_meta_box['page_title_margin']) . ";";
            }
            $result.= "}\n";

            /* Page Title Text */
            if (!empty($logistics_meta_box['page_title_text_bar']) && $logistics_meta_box['page_title_text_bar'] == 'on') {
                if (!empty($logistics_meta_box['page_title_text_alignment'])) {
                    if ($logistics_meta_box['page_title_text_alignment'] != 'center' && !empty($logistics_meta_box['page_title_breadcrumb_display']) &&
                            $logistics_meta_box['page_title_breadcrumb_display'] != 'none' && !empty($logistics_meta_box['page_title_breadcrumb_position']) && $logistics_meta_box['page_title_breadcrumb_position'] == 'symmetric') {
                        $result.= '#zo-page-element-wrap .zo-page-title-content{ display: table;width: 100%;}';
                        $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text{';
                        $result.= 'width: 60%; display: table-cell;';
                        $result.= '}';
                        $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary{';
                        $result.= 'width: 40%; display: table-cell;';
                        $result.= '}';
                    }
                    if ($logistics_meta_box['page_title_text_alignment'] == 'right') {
                        $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: right;}';
                        $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary {text-align: left;}';
                    } else if ($logistics_meta_box['page_title_text_alignment'] == 'left') {
                        $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: left;}';
                        $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary {text-align: right;}';
                    } elseif($logistics_meta_box['page_title_text_alignment'] == 'center'){
                        $result.= '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: center;}';
                    }
                }
            }
        }

        $result.= '@media (min-width: 1280px) {';
        //Page padding
        if(!empty($logistics_meta_box['layout_padding'])){
            $result.= '#page{
				padding: ' . ($logistics_meta_box['layout_padding']) . ';
			}';
            $padding = $logistics_meta_box['layout_padding'];
            $padding = explode(" ", $padding);
            if(count($padding) == 1){
                $padding_size = str_replace("px", "" ,$padding[0]);
                $main_width = $padding_size*2;
                $result.= '#page #zo-header:not(.header-sticky.affix){
					width: calc(100% - ' . $main_width . 'px);
					top: ' .  $padding_size . 'px;
				}';
                $result.= '#page #zo-header.header-sticky.affix{
					width: calc(100% - ' . $main_width . 'px);
					left: ' .  $padding_size . 'px;
				}';
            }else{

            }
        }else{
            if(!empty($logistics_data['body_padding'])){
                $result.= '#page{ ';
                $result.= 'position: relative;';
                $result.= logistics_general_padding($logistics_data['body_padding']);
                $result.= '}';
            }
        }
        $result.= '}';

        //Custom fonts
        if(!empty($logistics_meta_box['body_font'])){
            $result.= 'body #page{ font-family: "' . ($logistics_meta_box['body_font']) . '";}';
        }

        if(!empty($logistics_meta_box['h1_font'])){
            $result.= 'body h1{ font-family: "' . ($logistics_meta_box['h1_font']) . '";}';
        }

        if(!empty($logistics_meta_box['h2_font'])){
            $result.= 'body h2{ font-family: "' . ($logistics_meta_box['h2_font']) . '";}';
        }

        if(!empty($logistics_meta_box['h3_font'])){
            $result.= 'body h3{ font-family: "' . ($logistics_meta_box['h3_font']) . '";}';
        }

        if(!empty($logistics_meta_box['h4_font'])){
            $result.= 'body h4{ font-family: "' . ($logistics_meta_box['h4_font']) . '";}';
        }

        if(!empty($logistics_meta_box['h5_font'])){
            $result.= 'body h5{ font-family: "' . ($logistics_meta_box['h5_font']) . '";}';
        }

        if(!empty($logistics_meta_box['h6_font'])){
            $result.= 'body h6{ font-family: "' . ($logistics_meta_box['h6_font']) . '";}';
        }
        echo $result;
        return ob_get_clean();
    }
}

new CMS_DynamicCss();
