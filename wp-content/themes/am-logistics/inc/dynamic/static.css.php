<?php
/**
 * Auto create .css file from Theme Options
 * @author CMSTheme
 * @version 1.0.0
 */
class CMS_StaticCss {

    public $scss;

    function __construct() {
        global $logistics_data;

        /* scss */
        $this->scss = new scssc();
        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');
        add_action('wp_enqueue_scripts', array($this, 'generate_file'));
    }

    /**
     * scss compile
     * @since 1.0.0
     * @return string
     */
    public function compile() {
	    /* compile scss to css */
	    $scss = '@import "master.scss";';
	    $scss .= $this->generate_options();
	    return $this->scss->compile($scss);
	}

    /**
     * generate css file.
     * @since 1.0.0
     */
    public function generate_file() {
        global $logistics_data;
	    $logistics_meta_box = array();
	    $preset = array();
	    if(is_singular()){
	      $logistics_meta_box = logistics_post_meta();
	      $preset_key = isset($logistics_meta_box['presets_color'])? $logistics_meta_box['presets_color'] : $logistics_data['presets_color'];
	      $preset = get_option("_zo_data_preset_" . $preset_key, null);
	      $preset = json_decode($preset, true);
	      if(is_array($preset)){
	        $logistics_data = array_merge($logistics_data, $preset);
	      }
	    }else{
	      $preset = get_option("_zo_data_preset_" . $logistics_data['presets_color'], null);
	      $preset = json_decode($preset, true);
	    }
	    if(is_array($preset)){
	      foreach($preset as $key => $value){
	        if(!is_array($logistics_data[$key])){
	          $this->setVariable($key, $logistics_data[$key]);
	        }else{
	          foreach($logistics_data[$key] as $key_2 => $value_2){
	            if(!is_array($value_2)){
	              $this->setVariable($key . '_' .$key_2, $value_2);
	            }
	          }
	        }
	      }
	    }
	    if (!empty($logistics_data)) {
	      require_once(ABSPATH . 'wp-admin/includes/file.php');
	      WP_Filesystem();
	      global $wp_filesystem;

	      $file = "static.css";
	      if (isset($logistics_meta_box['presets_color']) && $logistics_meta_box['presets_color']) {
	        $file = "presets-" . $logistics_meta_box['presets_color'] . ".css";
	      }elseif (isset($logistics_data['presets_color']) && $logistics_data['presets_color']) {
	        $file = "presets-" . $logistics_data['presets_color'] . ".css";
	      }
	      $css_file = get_template_directory() . '/assets/css/' . $file;
	      if(!is_file($css_file) || (!empty($logistics_data['REDUX_LAST_SAVE']) && filemtime($css_file) < $logistics_data['REDUX_LAST_SAVE'])){
	        if (!$wp_filesystem->put_contents($css_file, $this->compile(), 0644)) {
	          // esc_html_e('Error saving file!', 'am-logistics');
	        }
	      }else{
	        $update = FALSE;
	        foreach (glob(get_template_directory() . '/assets/scss/*.scss') as $filename) {
	          if(filemtime($filename) > filemtime($css_file)){
	            $update = TRUE;
	            break;
	          }
	        }
	        if($update){
	          if (!$wp_filesystem->put_contents($css_file, $this->compile(), 0644)) {
	            // esc_html_e('Error saving file!', 'am-logistics');
	          }
	        }
	      }
	    }
    }

    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function generate_options() {
        global $logistics_data, $logistics_base;
        ob_start();

        /* Local Fonts */
        $logistics_base->setTypographyLocal($logistics_data['local-fonts-1'], $logistics_data['local-fonts-selector-1'], '.local-font-1');
        $logistics_base->setTypographyLocal($logistics_data['local-fonts-2'], $logistics_data['local-fonts-selector-2'], '.local-font-2');
        /* Extra Fonts */
        $logistics_base->setGoogleFont($logistics_data['google-font-1'], wp_filter_nohtml_kses($logistics_data['google-font-selector-1']));
        $logistics_base->setGoogleFont($logistics_data['google-font-2'], wp_filter_nohtml_kses($logistics_data['google-font-selector-2']));
        $logistics_base->setGoogleFont($logistics_data['google-font-3'], wp_filter_nohtml_kses($logistics_data['google-font-selector-3']));

        $this->setVariable('primary_color', $logistics_data['primary_color'], '#fcc403');
        $this->setVariable('secondary_color', $logistics_data['secondary_color'], '#333333');
        $this->setVariable('link_color', $logistics_data['link_color']['regular'], '#333333');
        $this->setVariable('link_color_hover', $logistics_data['link_color']['hover'], '#fcc403');
        $this->setVariable('gradient_one', $logistics_data['gradient_color']['regular'], '#90defb');
        $this->setVariable('gradient_two', $logistics_data['gradient_color']['hover'], '#43cbfd');
        $this->setVariable('gradient_three', $logistics_data['gradient_color']['active'], '#e991fc');
        // Page Layout
        $width = 1170;
        $result = '';
        if (!empty($logistics_data['body_width']) && is_numeric($logistics_data['body_width'])) {
            $width = (int) $logistics_data['body_width'];
        }
        $result.= '@media(min-width: 1170px) {';
        $result.= 'body.zo-boxed #page{';
        $result.= 'width: ' . $width . 'px;';
        $result.= '}';
        $result.= 'body.zo-boxed #page .header-sticky.affix{';
        $result.= 'width: ' . $width . 'px;';
        $result.= 'max-width: 100%;';
        $result.= '}';
        $result.= 'body.zo-boxed #page .header-transparent{';
        $result.= 'width: ' . $width . 'px;';
        $result.= 'max-width: 100%;';
        $result.= '}';
        $result.= '}';

        /* ==========================================================================
          Header 01
          ========================================================================== */
        if (!empty($logistics_data['header_01_padding_large'])) {
            $result.= '@media (min-width: 1400px){';
                $result.= '#zo-header.header-style-01 {';
                // Padding
                if (!empty($logistics_data['header_01_padding_large']['padding-top'])) {
                    $result.= 'padding-top: ' . ($logistics_data['header_01_padding_large']['padding-top']) . ';';
                }
                if (!empty($logistics_data['header_01_padding_large']['padding-left'])) {
                    $result.= 'padding-left: ' . ($logistics_data['header_01_padding_large']['padding-left']) . ';';
                }
                if (!empty($logistics_data['header_01_padding_large']['padding-bottom'])) {
                    $result.= 'padding-bottom: ' . ($logistics_data['header_01_padding_large']['padding-bottom']) . ';';
                }
                if (!empty($logistics_data['header_01_padding_large']['padding-right'])) {
                    $result.= 'padding-right: ' . ($logistics_data['header_01_padding_large']['padding-right']) . ';';
                }
                $result.= '}';
            $result.= '}';
        }


        //SETTING LOGO
        $logo_width = 250;
        $full_logo_width = 250;
        if(!empty($logistics_data['header_01_logo_width'])){
            $logo_width = $logistics_data['header_01_logo_width'];
            $full_logo_width = $logistics_data['header_01_logo_width'] + 5;
        }

		if($logistics_data['pg_typography']) {
			$result.= '#zo-page-element-wrap .zo-page-title-text h1 {';
				$result.= logistics_general_typography($logistics_data['pg_typography']);
			$result.= '}';
		}

		$result.= '@media (min-width: 992px){';
			if (!empty($logistics_data['header_01_padding'])) {
				$result.= '#zo-header.header-style-01 {';
					// Padding
					if (!empty($logistics_data['header_01_padding']['padding-top'])) {
						$result.= 'padding-top: ' . ($logistics_data['header_01_padding']['padding-top']) . ';';
					}
					if (!empty($logistics_data['header_01_padding']['padding-left'])) {
						$result.= 'padding-left: ' . ($logistics_data['header_01_padding']['padding-left']) . ';';
					}
					if (!empty($logistics_data['header_01_padding']['padding-bottom'])) {
						$result.= 'padding-bottom: ' . ($logistics_data['header_01_padding']['padding-bottom']) . ';';
					}
					if (!empty($logistics_data['header_01_padding']['padding-right'])) {
						$result.= 'padding-right: ' . ($logistics_data['header_01_padding']['padding-right']) . ';';
					}
				$result.= '}';
			}
			if (!empty($logistics_data['header_01_logo_margin'])) {
				$result.= '#zo-header.header-style-01 #zo-header-logo{
					display: inline-block;';
					// Margin
					if (!empty($logistics_data['header_01_logo_margin']['margin-top'])) {
						$result.= 'margin-top: ' . ($logistics_data['header_01_logo_margin']['margin-top']) . ';';
					}
					if (!empty($logistics_data['header_01_logo_margin']['margin-left'])) {
						$result.= 'margin-left: ' . ($logistics_data['header_01_logo_margin']['margin-left']) . ';';
						$full_logo_width = $full_logo_width + str_replace('px','',$logistics_data['header_01_logo_margin']['margin-left']);
					}
					if (!empty($logistics_data['header_01_logo_margin']['margin-bottom'])) {
						$result.= 'margin-bottom: ' . ($logistics_data['header_01_logo_margin']['margin-bottom']) . ';';
					}
					if (!empty($logistics_data['header_01_logo_margin']['margin-right'])) {
						$result.= 'margin-right: ' . ($logistics_data['header_01_logo_margin']['margin-right']) . ';';
						$full_logo_width = $full_logo_width + str_replace('px','',$logistics_data['header_01_logo_margin']['margin-right']);
					}
                    $result.= 'width: ' . $logo_width . 'px;';
				$result.= '}';
			}
			if($logo_width){
				$result.= '#zo-header.header-style-01 #zo-header-logo{
					"width: ' . $logo_width . 'px";
				}';
			}
			if (!empty($logistics_data['header_01_logo_position'])) {
				$result.= '#zo-header.header-style-01 .zo-header-secondary{
					display: inline-block;
					width: calc(100% - ' . $full_logo_width . 'px );
				}';
			}
			if (!empty($logistics_data['header_01_menu_height'])) {
				$result.= '.header-style-01:not(.affix) .zo-header-navigation .nav-menu > li > a,
					.header-style-01:not(.affix) .widget_cart_search_wrap_item > a.icon,
					.header-style-01:not(.affix) .zo-header-secondary .header-top-contact {';
					$result.= 'line-height: ' . ($logistics_data['header_01_menu_height']) . 'px;';
				$result.= '}';
			}
			if (!empty($logistics_data['header_01_menu_padding'])) {
				$result.= '#zo-header.header-style-01 .zo-header-navigation .nav-menu {';
				if(!empty($logistics_data['header_01_menu_padding']['padding-left'])){
					$result.= 'padding-left: ' . $logistics_data['header_01_menu_padding']['padding-left'] . ';';
				}
				if(!empty($logistics_data['header_01_menu_padding']['padding-right'])){
					$result.= 'padding-right: ' . $logistics_data['header_01_menu_padding']['padding-right'] . ';';
				}
				$result.= '}';
			}
			if (!empty($logistics_data['header_01_menu_item_padding'])) {
				$result.= '#zo-header.header-style-01 .zo-header-navigation .nav-menu > li {
					padding-right: ' . $logistics_data['header_01_menu_item_padding'] . 'px;
				}';
			}
			if (empty($logistics_data['header_01_menu_indicator']) || $logistics_data['header_01_menu_indicator'] == false) {
				$result.= '#zo-header.header-style-01 .zo-header-navigation .zo-menu-toggle {
					display: none;
				}';
			}
			if(!empty($logistics_data['header_01_menu_typography_first_level'])){
				$result.= '.header-style-01 .zo-header-navigation .nav-menu > li > a {';
					if(!empty($logistics_data['header_01_menu_typography_first_level']['font-family'])){
						$result.= 'font-family:' . ($logistics_data['header_01_menu_typography_first_level']['font-family']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_first_level']['font-backup'])){
						$result.= 'font-backup:' . ($logistics_data['header_01_menu_typography_first_level']['font-backup']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_first_level']['font-style'])){
						$result.= 'font-style:' . ($logistics_data['header_01_menu_typography_first_level']['font-style']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_first_level']['subsets'])){
						$result.= 'subsets:' . ($logistics_data['header_01_menu_typography_first_level']['subsets']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_first_level']['text-transform'])){
						$result.= 'text-transform:' . ($logistics_data['header_01_menu_typography_first_level']['text-transform']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_first_level']['font-size'])){
						$result.= 'font-size:' . ($logistics_data['header_01_menu_typography_first_level']['font-size']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_first_level']['font-weight'])){
						$result.= 'font-weight:' . ($logistics_data['header_01_menu_typography_first_level']['font-weight']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_first_level']['letter-spacing'])){
						$result.= 'letter-spacing:' . ($logistics_data['header_01_menu_typography_first_level']['letter-spacing']).';';
					}
				$result.= '}';
			}
			if(!empty($logistics_data['header_01_menu_typography_sub_level'])) {
				$result.= '.header-style-01 .nav-menu > li ul a , .header-style-01 .nav-menu > ul > li ul a {';
					if(!empty($logistics_data['header_01_menu_typography_sub_level']['font-family'])){
						$result.= 'font-family:' . ($logistics_data['header_01_menu_typography_sub_level']['font-family']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_sub_level']['font-backup'])){
						$result.= 'font-backup:' . ($logistics_data['header_01_menu_typography_sub_level']['font-backup']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_sub_level']['font-style'])){
						$result.= 'font-style:' . ($logistics_data['header_01_menu_typography_sub_level']['font-style']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_sub_level']['subsets'])){
						$result.= 'subsets:' . ($logistics_data['header_01_menu_typography_sub_level']['subsets']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_sub_level']['text-transform'])){
						$result.= 'text-transform:' . ($logistics_data['header_01_menu_typography_sub_level']['text-transform']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_sub_level']['font-size'])){
						$result.= 'font-size:' . ($logistics_data['header_01_menu_typography_sub_level']['font-size']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_sub_level']['font-weight'])){
						$result.= 'font-weight:' . ($logistics_data['header_01_menu_typography_sub_level']['font-weight']).';';
					}
					if(!empty($logistics_data['header_01_menu_typography_sub_level']['letter-spacing'])){
						$result.= 'letter-spacing:' . ($logistics_data['header_01_menu_typography_sub_level']['letter-spacing']).';';
					}
				$result.= '}';
			}
			if(!empty($logistics_data['header_01_right_sidebar_width'])){
				$sidebar = 0;
				$menu_width = 0;
				if(!empty($logistics_data['header_01_right_sidebar'])){
					$sidebar = $logistics_data['header_01_right_sidebar_width'];
					$menu_width = $sidebar + 10;
				}
				$result.= '#zo-header.header-style-01 .zo-header-secondary .zo-header-navigation-left {';
					$result.= 'width: calc( 100% - ' . $menu_width . 'px );';
				$result.= '}';
				$result.= '#zo-header.header-style-01 .zo-header-secondary .zo-header-navigation-right {';
					$result.= 'width: ' . $sidebar . 'px;';
				$result.= '}';
			}
		$result.= '}';
		if (!empty($logistics_data['header_01_logo_position']) && $logistics_data['header_01_logo_position'] == 'right') {
			$result.= '#zo-menu-mobile {
				position: absolute;
				left: 0;
				top: 50%;
				transform: translateY(-50%);
				-webkit-transform: translateY(-50%);
				-moz-transform: translateY(-50%);
			}';
		} else {
			$result.= '#zo-menu-mobile {
				position: absolute;
				right: 0;
				top: 50%;
				transform: translateY(-50%);
				-webkit-transform: translateY(-50%);
				-moz-transform: translateY(-50%);
			}';
		}
		/* ==========================================================================
          End Header 01
          ========================================================================== */
		/* ==========================================================================
          Header Sticky
          ========================================================================== */
        if (!empty($logistics_data['sticky_header_bg_image'])) {
            $result.= '#zo-header.header-sticky.affix {';
				$sticky_bg = $logistics_data['sticky_header_bg_image'];
				$result.= logistics_general_background($sticky_bg);
				if (!empty($logistics_data['sticky_header_bg_color'])) {
					$result.= 'background-color:' . $logistics_data['sticky_header_bg_color']['rgba'] . ';';
				} else {
					$result.= 'background-color: #FFFFFF;';
				}
            $result.= '}';
        }
		// Padding
		if(isset($logistics_data['sticky_header_padding'])){
			$result.= '#zo-header.header-sticky.affix {';
				if (isset($logistics_data['sticky_header_padding']['padding-top']))
					$result.= 'padding-top: ' . (int)($logistics_data['sticky_header_padding']['padding-top']) . ';';
				if (!empty($logistics_data['sticky_header_padding']['padding-left']))
					$result.= 'padding-left: ' . (int)($logistics_data['sticky_header_padding']['padding-left']) . ';';
				if (isset($logistics_data['sticky_header_padding']['padding-bottom']))
					$result.= 'padding-bottom: ' . (int)($logistics_data['sticky_header_padding']['padding-bottom']) . ';';
				if (!empty($logistics_data['sticky_header_padding']['padding-right']))
					$result.= 'padding-right: ' . (int)($logistics_data['sticky_header_padding']['padding-right']) . ';';
			$result.= '}';
		}

        if(!empty($logistics_data['sticky_collapse_color'])){
            $result.= '#zo-header.header-sticky.affix .zo-collapsed-button span{';
            $result.= 'background: ' . ($logistics_data['sticky_collapse_color']) . ';';
            $result.= '}';
            $result.= '#zo-header.header-sticky.affix .zo-collapsed-button.close span{';
            $result.= 'background: transparent;';
            $result.= '}';
            $result.= '#zo-header.header-sticky.affix .zo-collapsed-button span:before{';
            $result.= 'background: ' . ($logistics_data['sticky_collapse_color']) . ';';
            $result.= '}';
            $result.= '#zo-header.header-sticky.affix .zo-collapsed-button span:after{';
            $result.= 'background: ' . ($logistics_data['sticky_collapse_color']) . ';';
            $result.= '}';
        }
        //SETTING STICKY LOGO
        if (!empty($logistics_data['sticky_logo_margin'])) {
            $result.= '#zo-header.header-sticky.affix #zo-header-logo{';
            // Margin
            if (!empty($logistics_data['sticky_logo_margin']['margin-top'])) {
                $result.= 'margin-top: ' . ($logistics_data['sticky_logo_margin']['margin-top']) . ';';
            }
            if (!empty($logistics_data['sticky_logo_margin']['margin-left'])) {
                $result.= 'margin-left: ' . ($logistics_data['sticky_logo_margin']['margin-left']) . ';';
            }
            if (!empty($logistics_data['sticky_logo_margin']['margin-bottom'])) {
                $result.= 'margin-bottom: ' . ($logistics_data['sticky_logo_margin']['margin-bottom']) . ';';
            }
            if (!empty($logistics_data['sticky_logo_margin']['margin-right'])) {
                $result.= 'margin-right: ' . ($logistics_data['sticky_logo_margin']['margin-right']) . ';';
            }
            $result.= '}';
        }
        if (!empty($logistics_data['sticky_logo']['url'])) {
            $result.= '#zo-header.header-sticky.affix .zo-main-logo{
                    display: none;
            }';
        }
        //MENU STICKY HEIGHT
        if (!empty($logistics_data['sticky_nav_height'])) {
            $result.= '#zo-header.header-sticky.affix .nav-menu > li > a,
				#zo-header.header-sticky.affix #zo-header-navigation-right {';
				$result.= 'line-height: ' . ($logistics_data['sticky_nav_height']) . 'px;';
            $result.= '}';
			$result.= '#zo-header.header-sticky.affix .zo-collapsed-button {
				height: '. ($logistics_data['sticky_nav_height']) .'px;
			}';
            $result.= '#zo-header.header-style-03.header-sticky.affix .zo-header-navigation .nav-menu > li > a,
                #zo-header.header-style-03.header-sticky.affix .widget_cart_search_wrap_item > a.icon {
                line-height: ' . ($logistics_data['sticky_nav_height']) . 'px;
            }';
        }
		/* ==========================================================================
          End Header Sticky
          ========================================================================== */


		/* ==========================================================================
          Color Main Menu
          ========================================================================== */
		$result.= '@media (min-width: 992px){';
			if (!empty($logistics_data['preset_menu_color']) && !empty($logistics_data['preset_menu_color']['regular'])) {
				$result.= ".zo-header-navigation .nav-menu > li,
					.zo-header-navigation .nav-menu > li > a,
					.widget_cart_search_wrap a {
							color: " . ($logistics_data['preset_menu_color']['regular']) . ";
					}";
			}
			//Hover color
			if (!empty($logistics_data['preset_menu_color']) && !empty($logistics_data['preset_menu_color']['hover'])) {
				$result.= ".zo-header-navigation .nav-menu > li:hover,
				.zo-header-navigation .nav-menu > li:hover > a,
				.widget_cart_search_wrap a:hover {
					color:" . ($logistics_data['preset_menu_color']['hover']) . ";
				}";
			}
			//Active color
			if (!empty($logistics_data['preset_menu_color']) && !empty($logistics_data['preset_menu_color']['active'])) {
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
					color:" . ($logistics_data['preset_menu_color']['active']) . ";
				}";
			}
			/* Sub Menu */
			if (!empty($logistics_data['preset_menu_child_color']) && !empty($logistics_data['preset_menu_child_color']['regular'])) {
				$result.= ".zo-header-navigation .nav-menu > li ul li,
				.zo-header-navigation .nav-menu > li ul li > a {
					color:" . ($logistics_data['preset_menu_child_color']['regular']) . ";
				}";
			}
			if (!empty($logistics_data['preset_menu_child_color']) && !empty($logistics_data['preset_menu_child_color']['hover'])) {
				$result.= ".zo-header-navigation .nav-menu > li ul a:focus,
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
					color:" . ($logistics_data['preset_menu_child_color']['hover']) . ";
				}";
			}
            if(!empty($logistics_data['dropdown_menu_bg_color'])){
                $result.= '.nav-menu > li ul.sub-menu{';
                $result.= 'background-color:' . $logistics_data['dropdown_menu_bg_color']['rgba'] . ';';
                if(!empty($logistics_data['dropdown_menu_padding'])){
                    if(!empty($logistics_data['dropdown_menu_padding']['padding-top']))
						$result.= 'padding-top: '. ($logistics_data['dropdown_menu_padding']['padding-top']) .';';
					if(!empty($logistics_data['dropdown_menu_padding']['padding-right']))
						$result.= 'padding-right: '. ($logistics_data['dropdown_menu_padding']['padding-right']) .';';
					if(!empty($logistics_data['dropdown_menu_padding']['padding-bottom']))
						$result.= 'padding-bottom: '. ($logistics_data['dropdown_menu_padding']['padding-bottom']) .';';
					if(!empty($logistics_data['dropdown_menu_padding']['padding-left']))
						$result.= 'padding-left: '. ($logistics_data['dropdown_menu_padding']['padding-left']) .';';
                }
                if(!empty($logistics_data['dropdown_menu_border_color']) && !empty($logistics_data['dropdown_menu_border_width'])){
                    $result.= 'border-top: ' . ($logistics_data['dropdown_menu_border_width']) . 'px solid ';
                    if(!empty($logistics_data['dropdown_menu_border_color']['rgba']))
                        $result.= ($logistics_data['dropdown_menu_border_color']['rgba']) . ';';
                    else
                        $result.= ($logistics_data['primary_color']) . ';';
                }
                if(!empty($logistics_data['dropdown_menu_width'])){
                    $result.= 'min-width: ' . ($logistics_data['dropdown_menu_width']) . 'px;';
                }
                $result.= '}';
            }
            if(!empty($logistics_data['dropdown_menu_border_color']) && !empty($logistics_data['dropdown_menu_border_width'])){
                $result.= '.nav-menu > li ul.sub-menu li ul.sub-menu {';
                $result.= 'margin-top: -' . ($logistics_data['dropdown_menu_border_width']) . 'px;';
                $result.= '}';
            }
            if(!empty($logistics_data['dropdown_menu_line_height'])){
                $result.= '.nav-menu > li ul.sub-menu li a{';
                $result.= 'line-height: ' . ($logistics_data['dropdown_menu_line_height']) . 'px;';
                if(!empty($logistics_data['dropdown_menu_border_color_item']) && !empty($logistics_data['dropdown_menu_border_width_item'])){
                    $result.= 'border-bottom: ' . ($logistics_data['dropdown_menu_border_width_item']) . 'px solid ' . ($logistics_data['dropdown_menu_border_color_item']['rgba']) . ';';
                }
                if(!empty($logistics_data['dropdown_menu_alignment'])){
                    $result.= 'text-align: ' . ($logistics_data['dropdown_menu_alignment']) . ';';
                }
                $result.= '}';
            }
            if(!empty($logistics_data['dropdown_menu_bg_color_item'])){
                $result.= '.nav-menu > li ul.sub-menu li:hover.no_group{';
                $result.= 'background-color:' . $logistics_data['dropdown_menu_bg_color_item']['rgba'] . ';';
                $result.= '}';
            }
		$result.= '}';

        /* Sticky Menu */
        if (!empty($logistics_data['sticky_menu_color_first_level']['regular'])) {
            $result.= ".header-sticky.affix .zo-header-navigation .nav-menu > li,
			.header-sticky.affix .zo-header-navigation .nav-menu > li > a,
			.header-sticky.affix .widget_cart_search_wrap a {
				color:" . ($logistics_data['sticky_menu_color_first_level']['regular']) . ";
			}";
        }
        if (!empty($logistics_data['sticky_menu_color_first_level']['hover'])) {
            $result.= ".header-sticky.affix .zo-header-navigation .nav-menu > li:hover,
			.header-sticky.affix .zo-header-navigation .nav-menu > li:hover > a,
			.header-sticky.affix .widget_cart_search_wrap a:hover {
				color:" . ($logistics_data['sticky_menu_color_first_level']['hover']) . ";
			}";
            $result.= ".header-sticky.affix .nav-menu > li:hover {
				border-bottom-color: " . ($logistics_data['sticky_menu_color_first_level']['hover']) . ";
			}";
        }
        if (!empty($logistics_data['sticky_menu_color_first_level']['active'])) {
            $result.= ".header-sticky.affix .zo-header-navigation .nav-menu > li.current-menu-item,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current-menu-ancestor,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current_page_item,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current_page_ancestor,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current-menu-parent,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current-menu-item > a,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current-menu-ancestor > a,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current_page_item > a,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current_page_ancestor > a,
			.header-sticky.affix .zo-header-navigation .nav-menu > li.current-menu-parent > a,
			.header-sticky.affix .widget_cart_search_wrap a:active,
			.header-sticky.affix .widget_cart_search_wrap a:focus {
				color:" . ($logistics_data['sticky_menu_color_first_level']['active']) . ";
			}";
        }
        /* Sub Menu */
        if (!empty($logistics_data['sticky_menu_color_sub_level']['regular'])) {
            $result.= ".header-sticky.affix .zo-header-navigation .nav-menu > li ul li,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li > a {
				color:" . ($logistics_data['sticky_menu_color_sub_level']['regular']) . ";
			}";
        }
        if (!empty($logistics_data['sticky_menu_color_sub_level']['hover'])) {
            $result.= ".header-sticky.affix .zo-header-navigation .nav-menu > li ul a:focus,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li:hover,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li.current-menu-item,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li.current-menu-parent,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li.current-menu-ancestor,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li.current_page_item,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li:hover > a,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li.current-menu-item > a,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li.current-menu-parent > a,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li.current-menu-ancestor > a,
			.header-sticky.affix .zo-header-navigation .nav-menu > li ul li.current_page_item > a {
				color:" . ($logistics_data['sticky_menu_color_sub_level']['hover']) . ";
			}";
        }
        if (!empty($logistics_data['sticky_menu_color_sub_level']['active'])) {
            $result.= ".header-sticky.affix .zo-header-navigation .nav-menu > li ul a:focus {
				color:" . ($logistics_data['sticky_menu_color_sub_level']['active']) . ";
			}";
        }
        /* ==========================================================================
          End Color Main Menu
          ========================================================================== */



		/* ==========================================================================
          Header Phone
          ========================================================================== */
		$result.= '@media (max-width: 991px){';
			if(!empty($logistics_data['header_phone_height'])){
				$result.= '#zo-header, #zo-menu-mobile{
					height: '. ($logistics_data['header_phone_height']) .'px !important;
					line-height: '. ($logistics_data['header_phone_height']) .'px !important;
				}';
                $result.= '#zo-header .zo-header-logo .header-phone-logo{';
                $result.= 'max-height:' . ($logistics_data['header_phone_height']) .'px;';
                $result.= '}';
				if (!empty($logistics_data['header_top_height']) && empty($logistics_data['header_top_phone'])) {
					$result.= '.zo-header-navigation{';
					$result.= 'top: calc(' . ($logistics_data['header_phone_height']) .'px + '. ($logistics_data['header_top_height']) .'px);';
					$result.= '}';
					$result.= '.admin-bar .zo-header-navigation{';
					$result.= 'top: calc(32px + ' . ($logistics_data['header_phone_height']) .'px + '. ($logistics_data['header_top_height']) .'px);';
					$result.= '}';
				}
				else{
					$result.= '.zo-header-navigation{';
					$result.= 'top: ' . ($logistics_data['header_phone_height']) .'px;';
					$result.= '}';
					$result.= '.admin-bar .zo-header-navigation{';
					$result.= 'top: calc(32px + ' . ($logistics_data['header_phone_height']) .'px);';
					$result.= '}';
				}
			}

			if(!empty($logistics_data['header_phone_frame_width']) && (int)$logistics_data['header_phone_frame_width'] > 0){
				$result.= '.zo-header-navigation {';
				$result.= 'width: '. ($logistics_data['header_phone_frame_width']) .'px !important;';
				$result.= '}';
			}
			if(!empty($logistics_data['header_phone_frame_height']) && (int)$logistics_data['header_phone_frame_height'] > 0){
				$result.= '.zo-header-navigation {';
				$result.= 'height: '. ($logistics_data['header_phone_frame_height']) .'px !important;';
				$result.= '}';
			}

			if(!empty($logistics_data['header_phone_logo_margin'])) {
				$result.= '#zo-header #zo-header-logo {';
					if(!empty($logistics_data['header_phone_logo_margin']['margin-top']))
						$result.= 'margin-top: '. ($logistics_data['header_phone_logo_margin']['margin-top']) .';';
					if(!empty($logistics_data['header_phone_logo_margin']['margin-right']))
						$result.= 'margin-right: '. ($logistics_data['header_phone_logo_margin']['margin-right']) .';';
					if(!empty($logistics_data['header_phone_logo_margin']['margin-bottom']))
						$result.= 'margin-bottom: '. ($logistics_data['header_phone_logo_margin']['margin-bottom']) .';';
					if(!empty($logistics_data['header_phone_logo_margin']['margin-left']))
						$result.= 'margin-left: '. ($logistics_data['header_phone_logo_margin']['margin-left']) .';';
				$result.= '}';
			}

			$header_phone_bg_color = !empty($logistics_data['header_phone_bg_color']['color']) ? $logistics_data['header_phone_bg_color']['color'] : '';
			$header_phone_bg_color = !empty($logistics_data['header_phone_bg_color']['rgba']) ? $logistics_data['header_phone_bg_color']['rgba'] : $header_phone_bg_color;
			if($header_phone_bg_color){
				$result.= '#zo-header{
					background: '. ($header_phone_bg_color) .' !important;
				}';
			}

			$header_phone_navigation_bg_color = !empty($logistics_data['header_phone_navigation_bg_color']['color']) ? $logistics_data['header_phone_navigation_bg_color']['color'] : '';
			$header_phone_navigation_bg_color = !empty($logistics_data['header_phone_navigation_bg_color']['rgba']) ? $logistics_data['header_phone_navigation_bg_color']['rgba'] : $header_phone_bg_color;
			if($header_phone_navigation_bg_color){
				$result.= '#zo-header .zo-header-navigation {
					background: '. ($header_phone_navigation_bg_color) .' !important;
				}';
			}

			if(!empty($logistics_data['header_phone_navigation_padding'])){
				$result.= '.zo-header-navigation .nav-menu {';
					if(!empty($logistics_data['header_phone_navigation_padding']['padding-top']))
						$result.= 'padding-top: '. ($logistics_data['header_phone_navigation_padding']['padding-top']) .';';
					if(!empty($logistics_data['header_phone_navigation_padding']['padding-right']))
						$result.= 'padding-right: '. ($logistics_data['header_phone_navigation_padding']['padding-right']) .';';
					if(!empty($logistics_data['header_phone_navigation_padding']['padding-bottom']))
						$result.= 'padding-bottom: '. ($logistics_data['header_phone_navigation_padding']['padding-bottom']) .';';
					if(!empty($logistics_data['header_phone_navigation_padding']['padding-left']))
						$result.= 'padding-left: '. ($logistics_data['header_phone_navigation_padding']['padding-left']) .';';
				$result.= '}';
			}
			if(!empty($logistics_data['header_phone_frame_width']) && (int)$logistics_data['header_phone_frame_width'] > 0){
				$result.= '.zo-header-navigation {';
				$result.= 'width: '. ($logistics_data['header_phone_frame_width']) .'px !important;';
				$result.= '}';
			}
			if(!empty($logistics_data['header_phone_frame_height']) && (int)$logistics_data['header_phone_frame_height'] > 0){
				$result.= '.zo-header-navigation {';
				$result.= 'height: '. ($logistics_data['header_phone_frame_height']) .'px !important;';
				$result.= '}';
			}
			if(!empty($logistics_data['header_phone_item_menu_border'])){
				$result.= '.zo-header-navigation .nav-menu li {';
					if($logistics_data['header_phone_item_menu_border']['border-color'])
						$result.= 'border-top-color: '. ($logistics_data['header_phone_item_menu_border']['border-color']) .';';
					if($logistics_data['header_phone_item_menu_border']['border-style'])
						$result.= 'border-top-style: '. ($logistics_data['header_phone_item_menu_border']['border-style']) .';';
					if($logistics_data['header_phone_item_menu_border']['border-top'])
						$result.= 'border-top-width: '. ($logistics_data['header_phone_item_menu_border']['border-bottom']) .';';
				$result.= '}';
			}

			if(!empty($logistics_data['header_phone_icon_color']['regular'])){
				$result.= '.widget_cart_search_wrap a{
					color: '. ($logistics_data['header_phone_icon_color']['regular']) .';
				}';
				$result.= '#zo-menu-mobile span, #zo-menu-mobile span:before, #zo-menu-mobile span:after {
					background: '. ($logistics_data['header_phone_icon_color']['regular']) .';
				}';
			}

			if(!empty($logistics_data['header_phone_icon_color']['hover'])){
				$result.= '.widget_cart_search_wrap a:hover {';
					$result.= 'color: '. ($logistics_data['header_phone_icon_color']['hover']) .';';
				$result.= '}';
			}

			if(!empty($logistics_data['header_phone_icon_color']['active'])){
				$result.= '.widget_cart_search_wrap a:focus {';
					$result.= 'color: '. ($logistics_data['header_phone_icon_color']['active']) .';';
				$result.= '}';
			}

			if(!empty($logistics_data['header_phone_menu_first_level'])) {
				$result.= '.zo-header-navigation .nav-menu > li > a {';
					if(!empty($logistics_data['header_phone_menu_first_level']['font-family'])){
						$result.= 'font-family:' . ($logistics_data['header_phone_menu_first_level']['font-family']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['font-backup'])){
						$result.= 'font-backup:' . ($logistics_data['header_phone_menu_first_level']['font-backup']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['font-style'])){
						$result.= 'font-style:' . ($logistics_data['header_phone_menu_first_level']['font-style']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['subsets'])){
						$result.= 'subsets:' . ($logistics_data['header_phone_menu_first_level']['subsets']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['text-align'])){
						$result.= 'text-align:' . ($logistics_data['header_phone_menu_first_level']['text-align']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['text-transform'])){
						$result.= 'text-transform:' . ($logistics_data['header_phone_menu_first_level']['text-transform']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['font-size'])){
						$result.= 'font-size:' . ($logistics_data['header_phone_menu_first_level']['font-size']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['font-weight'])){
						$result.= 'font-weight:' . ($logistics_data['header_phone_menu_first_level']['font-weight']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['line-height'])){
						$result.= 'line-height:' . ($logistics_data['header_phone_menu_first_level']['line-height']).';';
					}
					if(!empty($logistics_data['header_phone_menu_first_level']['letter-spacing'])){
						$result.= 'letter-spacing:' . ($logistics_data['header_phone_menu_first_level']['letter-spacing']).';';
					}
				$result.= '}';
				if(!empty($logistics_data['header_phone_menu_first_level']['line-height'])){
					$result.= '.zo-header-navigation .nav-menu > li {
						line-height:' . ($logistics_data['header_phone_menu_first_level']['line-height']).';
					}';
				}
				if(!empty($logistics_data['header_phone_menu_first_level']['text-align'])){
					$result.= '.zo-header-navigation .nav-menu > li {
						text-align:' . ($logistics_data['header_phone_menu_first_level']['text-align']).';
					}';
				}
			}

			if(!empty($logistics_data['header_phone_first_level_color']['regular'])){
				$result.= ".zo-header-navigation .nav-menu > li,
					.zo-header-navigation .nav-menu > li > a {
							color: " . ($logistics_data['header_phone_first_level_color']['regular']) . ";
				}";
			}

			if (!empty($logistics_data['header_phone_first_level_color']) && !empty($logistics_data['header_phone_first_level_color']['hover'])) {
				$result.= ".zo-header-navigation .nav-menu > li:hover,
				.zo-header-navigation .nav-menu > li:hover > a {
					color:" . ($logistics_data['header_phone_first_level_color']['hover']) . ";
				}";
			}

			if (!empty($logistics_data['header_phone_first_level_color']) && !empty($logistics_data['header_phone_first_level_color']['active'])) {
				$result.= ".zo-header-navigation .nav-menu > li.current-menu-item,
				.zo-header-navigation .nav-menu > li.current-menu-ancestor,
				.zo-header-navigation .nav-menu > li.current_page_item,
				.zo-header-navigation .nav-menu > li.current_page_ancestor,
				.zo-header-navigation .nav-menu > li.current-menu-parent,
				.zo-header-navigation .nav-menu > li.current-menu-item > a,
				.zo-header-navigation .nav-menu > li.current-menu-ancestor > a,
				.zo-header-navigation .nav-menu > li.current_page_item > a,
				.zo-header-navigation .nav-menu > li.current_page_ancestor > a,
				.zo-header-navigation .nav-menu > li.current-menu-parent > a {
					color:" . ($logistics_data['header_phone_first_level_color']['active']) . ";
				}";
			}

			if(!empty($logistics_data['header_phone_menu_sub_level'])) {
				$result.= '.zo-header-navigation .nav-menu > li li a {';
					if(!empty($logistics_data['header_phone_menu_sub_level']['font-family'])){
						$result.= 'font-family:' . ($logistics_data['header_phone_menu_sub_level']['font-family']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['font-backup'])){
						$result.= 'font-backup:' . ($logistics_data['header_phone_menu_sub_level']['font-backup']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['font-style'])){
						$result.= 'font-style:' . ($logistics_data['header_phone_menu_sub_level']['font-style']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['subsets'])){
						$result.= 'subsets:' . ($logistics_data['header_phone_menu_sub_level']['subsets']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['text-align'])){
						$result.= 'text-align:' . ($logistics_data['header_phone_menu_sub_level']['text-align']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['text-transform'])){
						$result.= 'text-transform:' . ($logistics_data['header_phone_menu_sub_level']['text-transform']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['font-size'])){
						$result.= 'font-size:' . ($logistics_data['header_phone_menu_sub_level']['font-size']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['font-weight'])){
						$result.= 'font-weight:' . ($logistics_data['header_phone_menu_sub_level']['font-weight']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['line-height'])){
						$result.= 'line-height:' . ($logistics_data['header_phone_menu_sub_level']['line-height']).';';
					}
					if(!empty($logistics_data['header_phone_menu_sub_level']['letter-spacing'])){
						$result.= 'letter-spacing:' . ($logistics_data['header_phone_menu_sub_level']['letter-spacing']).';';
					}
				$result.= '}';
				if(!empty($logistics_data['header_phone_menu_sub_level']['line-height'])){
					$result.= '.zo-header-navigation .nav-menu > li li {
						line-height:' . ($logistics_data['header_phone_menu_sub_level']['line-height']).';
					}';
				}
				if(!empty($logistics_data['header_phone_menu_sub_level']['text-align'])){
					$result.= '.zo-header-navigation .nav-menu > li li {
						text-align:' . ($logistics_data['header_phone_menu_sub_level']['text-align']).';
					}';
				}
			}

			if (!empty($logistics_data['header_phone_sub_level_color']['regular'])) {
				$result.= ".zo-header-navigation .nav-menu > li ul li,
				.zo-header-navigation .nav-menu > li ul li > a {
					color:" . ($logistics_data['header_phone_sub_level_color']['regular']) . ";
				}";
			}

			if (!empty($logistics_data['header_phone_sub_level_color']['hover'])) {
				$result.= ".zo-header-navigation .nav-menu > li ul li:hover,
				.zo-header-navigation .nav-menu > li ul li:hover > a {
					color:" . ($logistics_data['header_phone_sub_level_color']['hover']) . ";
				}";
			}

			if (!empty($logistics_data['header_phone_sub_level_color']['active'])) {
				$result.= ".zo-header-navigation .nav-menu > li ul a:focus,
				.zo-header-navigation .nav-menu > li ul li.current-menu-item,
				.zo-header-navigation .nav-menu > li ul li.current-menu-parent,
				.zo-header-navigation .nav-menu > li ul li.current-menu-ancestor,
				.zo-header-navigation .nav-menu > li ul li.current_page_item,
				.zo-header-navigation .nav-menu > li ul li.current-menu-item > a,
				.zo-header-navigation .nav-menu > li ul li.current-menu-parent > a,
				.zo-header-navigation .nav-menu > li ul li.current-menu-ancestor > a,
				.zo-header-navigation .nav-menu > li ul li.current_page_item > a {
					color:" . ($logistics_data['header_phone_sub_level_color']['active']) . ";
				}";
			}

			$sub_menu_bg = !empty($logistics_data['header_phone_sub_level_bg']['color']) ? $logistics_data['header_phone_sub_level_bg']['color'] : '';
			$sub_menu_bg = !empty($logistics_data['header_phone_sub_level_bg']['rgba']) ? $logistics_data['header_phone_sub_level_bg']['rgba'] : $sub_menu_bg;
			if ($sub_menu_bg) {
				$result.= ".zo-header-navigation .nav-menu > li ul.sub-menu {
					background:" . ($sub_menu_bg) . ";
				}";
			}
		$result.= '}';
		$result.= '@media (max-width: 783px){';
			if(!empty($logistics_data['header_phone_height'])){
				if (!empty($logistics_data['header_top_height'])) {
					$result.= '.admin-bar .zo-header-navigation.show-menu{';
					$result.= 'top: calc(46px + ' . ($logistics_data['header_phone_height']) .'px + ' .($logistics_data['header_top_height']).'px);';
					$result.= '}';
				}
				else{
					$result.= '.admin-bar .zo-header-navigation.show-menu{';
					$result.= 'top: calc(46px + ' . ($logistics_data['header_phone_height']) .'px);';
					$result.= '}';
				}
			}
		$result.= '}';
		$result.= '@media (max-width: 767px){';
			$result.= '.admin-bar .zo-header-navigation.show-menu{';
			$result.= 'top: calc(46px + ' . ($logistics_data['header_phone_height']) .'px);';
			$result.= '}';
			$result.= '.zo-header-navigation.show-menu{';
			$result.= 'top: ' . ($logistics_data['header_phone_height']) .'px;';
			$result.= '}';
		$result.= '}';
        /* ==========================================================================
          End Header Phone
          ========================================================================== */



        /* ==========================================================================
          Start Footer
          ========================================================================== */
        if (!empty($logistics_data['footer_padding'])) {
            $result.= '#zo-footer{';
            // Padding
            if (!empty($logistics_data['footer_padding']['padding-top'])) {
                $result.= 'padding-top: ' . ($logistics_data['footer_padding']['padding-top']) . ';';
            }
            if (!empty($logistics_data['footer_padding']['padding-left'])) {
                $result.= 'padding-left: ' . ($logistics_data['footer_padding']['padding-left']) . ';';
            }
            if (!empty($logistics_data['footer_padding']['padding-bottom'])) {
                $result.= 'padding-bottom: ' . ($logistics_data['footer_padding']['padding-bottom']) . ';';
            }
            if (!empty($logistics_data['footer_padding']['padding-right'])) {
                $result.= 'padding-right: ' . ($logistics_data['footer_padding']['padding-right']) . ';';
            }

            $result.= '}';
        }
		//foorter color link
        if (!empty($logistics_data['footer_link_color'])) {
            $result.= '#zo-footer #zo-footer-content .zo-footer-column a{';
                if (!empty($logistics_data['footer_link_color']['regular'])) {
                    $result.= 'color:' . $logistics_data['footer_link_color']['regular'] . ';';
                }
            $result.= '}';

            $result.= '#zo-footer #zo-footer-content .zo-footer-column a:hover{';
                if (!empty($logistics_data['footer_link_color']['hover'])) {
                    $result.= 'color:' . $logistics_data['footer_link_color']['hover'] . ';';
                }
            $result.= '}';
        }
//		foorter color;
		if (!empty($logistics_data['footer_font_color'])) {
            $result.= '#zo-footer #zo-footer-content .zo-footer-column p{';
                if (!empty($logistics_data['footer_font_color'])) {
                    $result.= 'color:' . $logistics_data['footer_font_color'] . ';';
                }
            $result.= '}';

            $result.= '#zo-footer #zo-footer-content .zo-footer-column span{';
                if (!empty($logistics_data['footer_font_color'])) {
                    $result.= 'color:' . $logistics_data['footer_font_color']. ';';
                }
            $result.= '}';
			 $result.= '#zo-footer #zo-footer-content .zo-footer-column li{';
                if (!empty($logistics_data['footer_font_color'])) {
                    $result.= 'color:' . $logistics_data['footer_font_color']. ';';
                }
            $result.= '}';
			$result.= '#zo-footer #zo-footer-content .zo-footer-column{';
                if (!empty($logistics_data['footer_font_color'])) {
                    $result.= 'color:' . $logistics_data['footer_font_color']. ';';
                }
            $result.= '}';
        }

		if (!empty($logistics_data['footer_copyright_alignment']) && !empty($logistics_data['footer_copyright_extra_position']) && $logistics_data['footer_copyright_alignment'] != 'center' && $logistics_data['footer_copyright_extra_position'] == 'symmetric') {
           $result.= '#zo-footer-copyright footer{ display: table; width: 100%;}';
           $result.= '#zo-footer-copyright .zo-footer-copyright-notice{ display: table-cell; width: 60%;}';
           $result.= '#zo-footer-copyright .zo-copyright-secondary{ display: table-cell; width: 40%;}';
        }
       if (!empty($logistics_data['footer_copyright_alignment']) && $logistics_data['footer_copyright_alignment'] == 'center') {
            $result.= '#zo-footer-copyright{ text-align: center;}';
        }

		// Footer Copyright Borders
        if (!empty($logistics_data['footer_copyright_padding'])) {
            $result.= '#zo-footer-copyright {';
		/* Copyright Font Color */
          if (!empty($logistics_data['footer_copyright_font_color'])) {
               $result.= 'color: ' . $logistics_data['footer_copyright_font_color'] . ';';
           }
           /* Copyright Link Color */
          if (!empty($logistics_data['footer_copyright_link_color'])) {
               $result.= 'a {color: ' . $logistics_data['footer_copyright_link_color'] . ';}';
            }
		$result.= '}';

        }
		//border top copyright
		if(!empty($logistics_data['copyright_border_full_width'])=='true'){
			if (!empty($logistics_data['footer_copyright_padding'])) {
				$result.= '#zo-footer-copyright .container{';
				if (!empty($logistics_data['footer_copyright_padding']['padding-top'])) {
					   $result.= 'padding-top: ' . ($logistics_data['footer_copyright_padding']['padding-top']) . ';';
				   }
				   if (!empty($logistics_data['footer_copyright_padding']['padding-left'])) {
						$result.= 'padding-left: ' . ($logistics_data['footer_copyright_padding']['padding-left']) . ';';
					}
				   if (!empty($logistics_data['footer_copyright_padding']['padding-bottom'])) {
					   $result.= 'padding-bottom: ' . ($logistics_data['footer_copyright_padding']['padding-bottom']) . ';';
				   }
				   if (!empty($logistics_data['footer_copyright_padding']['padding-right'])) {
					   $result.= 'padding-right: ' . ($logistics_data['footer_copyright_padding']['padding-right']) . ';';
				  }
				$result.= '}';

				$result.= '#zo-footer-copyright .container:before{';
				// Footer Content Borders
				if (!empty($logistics_data['footer_copyright_border_color'])) {
					if (!empty($logistics_data['footer_copyright_border_width_top'])) {
						$result.= 'border-top: ' . $logistics_data['footer_copyright_border_width_top'] . 'px solid ' . $logistics_data['footer_copyright_border_color'] . ';';
					}
				}
				$result.= '}';
			}
		}
		else{
			if (!empty($logistics_data['footer_copyright_padding'])) {
				$result.= '#zo-footer-copyright{';
				if (!empty($logistics_data['footer_copyright_padding']['padding-top'])) {
					   $result.= 'padding-top: ' . ($logistics_data['footer_copyright_padding']['padding-top']) . ';';
				   }
				   if (!empty($logistics_data['footer_copyright_padding']['padding-left'])) {
						$result.= 'padding-left: ' . ($logistics_data['footer_copyright_padding']['padding-left']) . ';';
					}
				   if (!empty($logistics_data['footer_copyright_padding']['padding-bottom'])) {
					   $result.= 'padding-bottom: ' . ($logistics_data['footer_copyright_padding']['padding-bottom']) . ';';
				   }
				   if (!empty($logistics_data['footer_copyright_padding']['padding-right'])) {
					   $result.= 'padding-right: ' . ($logistics_data['footer_copyright_padding']['padding-right']) . ';';
				  }
				// Footer Content Borders
				if (!empty($logistics_data['footer_copyright_border_color'])) {
					if (!empty($logistics_data['footer_copyright_border_width_top'])) {
						$result.= 'border-top: ' . $logistics_data['footer_copyright_border_width_top'] . 'px solid ' . $logistics_data['footer_copyright_border_color'] . ';';
					}
				}
				$result.= '}';
			}
		}
        /* End Footer */

 		// TYPOGRAPHY
        if (!empty($logistics_data['font_h1'])) {
            $result.= 'body h1{';
            $result.= logistics_general_typography($logistics_data['font_h1']);
            if (!empty($logistics_data['font_h1_margin'])) {
                $result.= 'margin-top:' . $logistics_data['font_h1_margin']['margin-top'] . ';';
                $result.= 'margin-bottom:' . $logistics_data['font_h1_margin']['margin-bottom'] . ';';
            }
            $result.= '}';
        }

        if (!empty($logistics_data['font_h2'])) {
            $result.= 'body h2{';
            $result.= logistics_general_typography($logistics_data['font_h2']);
            if (!empty($logistics_data['font_h2_margin'])) {
                $result.= 'margin-top:' . $logistics_data['font_h2_margin']['margin-top'] . ';';
                $result.= 'margin-bottom:' . $logistics_data['font_h2_margin']['margin-bottom'] . ';';
            }
            $result.= '}';
        }

        if (!empty($logistics_data['font_h3'])) {
            $result.= 'body h3{';
            $result.= logistics_general_typography($logistics_data['font_h3']);
            if (!empty($logistics_data['font_h3_margin'])) {
                $result.= 'margin-top:' . $logistics_data['font_h3_margin']['margin-top'] . ';';
                $result.= 'margin-bottom:' . $logistics_data['font_h3_margin']['margin-bottom'] . ';';
            }
            $result.= '}';
        }

        if (!empty($logistics_data['font_h4'])) {
            $result.= 'body h4{';
            $result.= logistics_general_typography($logistics_data['font_h4']);
            if (!empty($logistics_data['font_h4_margin'])) {
                $result.= 'margin-top:' . $logistics_data['font_h4_margin']['margin-top'] . ';';
                $result.= 'margin-bottom:' . $logistics_data['font_h4_margin']['margin-bottom'] . ';';
            }
            $result.= '}';
        }

        if (!empty($logistics_data['font_h5'])) {
            $result.= 'body h5{';
            $result.= logistics_general_typography($logistics_data['font_h5']);
            if (!empty($logistics_data['font_h5_margin'])) {
                $result.= 'margin-top:' . $logistics_data['font_h5_margin']['margin-top'] . ';';
                $result.= 'margin-bottom:' . $logistics_data['font_h5_margin']['margin-bottom'] . ';';
            }
            $result.= '}';
        }

        if (!empty($logistics_data['font_h6'])) {
            $result.= 'body h6{';
            $result.= logistics_general_typography($logistics_data['font_h6']);
            if (!empty($logistics_data['font_h6_margin'])) {
                $result.= 'margin-top:' . $logistics_data['font_h6_margin']['margin-top'] . ';';
                $result.= 'margin-bottom:' . $logistics_data['font_h6_margin']['margin-bottom'] . ';';
            }
            $result.= '}';
        }

        if (!empty($logistics_data['mobile_heading']) && !empty($logistics_data['mobile_heading_sensitivity'])) {
            $scale = (int) $logistics_data['mobile_heading_sensitivity'];
            $result.= '@media(max-width: 767px) {';
            if (!empty($logistics_data['font_h1']) && !empty($logistics_data['mobile_heading_tags']['1'])) {
                $result.= 'body h1{ font-size: ' . logistics_calc_font_size($logistics_data['font_h1']['font-size'], $scale) . ';}';
            }
            if (!empty($logistics_data['font_h2']) && !empty($logistics_data['mobile_heading_tags']['2'])) {
                $result.= 'body h2{ font-size: ' . logistics_calc_font_size($logistics_data['font_h2']['font-size'], $scale) . ';}';
            }
            if (!empty($logistics_data['font_h3']) && !empty($logistics_data['mobile_heading_tags']['3'])) {
                $result.= 'body h3{ font-size: ' . logistics_calc_font_size($logistics_data['font_h3']['font-size'], $scale) . ';}';
            }
            if (!empty($logistics_data['font_h4']) && !empty($logistics_data['mobile_heading_tags']['4'])) {
                $result.= 'body h4{ font-size: ' . logistics_calc_font_size($logistics_data['font_h4']['font-size'], $scale) . ';}';
            }
            if (!empty($logistics_data['font_h5']) && !empty($logistics_data['mobile_heading_tags']['5'])) {
                $result.= 'body h5{ font-size: ' . logistics_calc_font_size($logistics_data['font_h5']['font-size'], $scale) . ';}';
            }
            if (!empty($logistics_data['font_h6']) && !empty($logistics_data['mobile_heading_tags']['6'])) {
                $result.= 'body h6{ font-size: ' . logistics_calc_font_size($logistics_data['font_h6']['font-size'], $scale) . ';}';
            }
            $result.= '}';
        }
        //BUTTON
        if (!empty($logistics_data['btn_primary'])) {
            $result.= '.btn-primary{';
            if (!empty($logistics_data['btn_primary']['regular'])) {
                $result.= 'background:' . $logistics_data['btn_primary']['regular'] . ';';
            }
            if (!empty($logistics_data['btn_primary_color']['regular'])) {
                $result.= 'color:' . $logistics_data['btn_primary_color']['regular'] . ';';
            }
            $result.= '}';
            $result.= '.btn-primary:hover{';
            if (!empty($logistics_data['btn_primary']['hover'])) {
                $result.= 'background:' . $logistics_data['btn_primary']['hover'] . ';';
            }
            if (!empty($logistics_data['btn_primary_color']['hover'])) {
                $result.= 'color:' . $logistics_data['btn_primary_color']['hover'] . ';';
            }
            $result.= '}';
        }
        if (!empty($logistics_data['btn_secondary'])) {
            $result.= '.btn-secondary{';
            if (!empty($logistics_data['btn_secondary']['regular'])) {
                $result.= 'background:' . $logistics_data['btn_secondary']['regular'] . ';';
            }
            if (!empty($logistics_data['btn_secondary_color']['regular'])) {
                $result.= 'color:' . $logistics_data['btn_secondary_color']['regular'] . ';';
            }
            $result.= '}';
            $result.= '.btn-secondary:hover{';
            if (!empty($logistics_data['btn_secondary']['hover'])) {
                $result.= 'background:' . $logistics_data['btn_secondary']['hover'] . ';';
            }
            if (!empty($logistics_data['btn_secondary_color']['hover'])) {
                $result.= 'color:' . $logistics_data['btn_secondary_color']['hover'] . ';';
            }
            $result.= '}';
        }
        //btn-tiny
        $result.= '.btn-tiny{';
        if (!empty($logistics_data['btn_tiny_padding'])){
            // Padding
            if (!empty($logistics_data['btn_tiny_padding']['padding-top'])) {
                $result.= 'padding-top: ' . ($logistics_data['btn_tiny_padding']['padding-top']) . ';';
            }
            if (!empty($logistics_data['btn_tiny_padding']['padding-left'])) {
                $result.= 'padding-left: ' . ($logistics_data['btn_tiny_padding']['padding-left']) . ';';
            }
            if (!empty($logistics_data['btn_tiny_padding']['padding-bottom'])) {
                $result.= 'padding-bottom: ' . ($logistics_data['btn_tiny_padding']['padding-bottom']) . ';';
            }
            if (!empty($logistics_data['btn_tiny_padding']['padding-right'])) {
                $result.= 'padding-right: ' . ($logistics_data['btn_tiny_padding']['padding-right']) . ';';
            }
        }
        if (!empty($logistics_data['btn_tiny_font'])) {
            $result.= logistics_general_typography($logistics_data['btn_tiny_font']);
        }
        $result.= '}';
        if (!empty($logistics_data['btn_tiny_padding'])){
            $result.= logistics_general_button_stroke($logistics_data['btn_tiny_padding'], 'btn-tiny','1');
            $result.= logistics_general_button_stroke($logistics_data['btn_tiny_padding'], 'btn-tiny','2');
            $result.= logistics_general_button_stroke($logistics_data['btn_tiny_padding'], 'btn-tiny','3');
            $result.= logistics_general_button_stroke($logistics_data['btn_tiny_padding'], 'btn-tiny','4');
            $result.= logistics_general_button_stroke($logistics_data['btn_tiny_padding'], 'btn-tiny','5');
            $result.= logistics_general_button_stroke($logistics_data['btn_tiny_padding'], 'btn-tiny','6');
        }
        //btn-small
        $result.= '.btn-small{';
        if (!empty($logistics_data['btn_small_padding'])) {
            // Padding
            if (!empty($logistics_data['btn_small_padding']['padding-top'])) {
                $result.= 'padding-top: ' . ($logistics_data['btn_small_padding']['padding-top']) . ';';
            }
            if (!empty($logistics_data['btn_small_padding']['padding-left'])) {
                $result.= 'padding-left: ' . ($logistics_data['btn_small_padding']['padding-left']) . ';';
            }
            if (!empty($logistics_data['btn_small_padding']['padding-bottom'])) {
                $result.= 'padding-bottom: ' . ($logistics_data['btn_small_padding']['padding-bottom']) . ';';
            }
            if (!empty($logistics_data['btn_small_padding']['padding-right'])) {
                $result.= 'padding-right: ' . ($logistics_data['btn_small_padding']['padding-right']) . ';';
            }
        }
        if (!empty($logistics_data['btn_small_font'])) {
            $result.= logistics_general_typography($logistics_data['btn_small_font']);
        }
        $result.= '}';
        if (!empty($logistics_data['btn_small_padding'])){
            $result.= logistics_general_button_stroke($logistics_data['btn_small_padding'], 'btn-small','1');
            $result.= logistics_general_button_stroke($logistics_data['btn_small_padding'], 'btn-small','2');
            $result.= logistics_general_button_stroke($logistics_data['btn_small_padding'], 'btn-small','3');
            $result.= logistics_general_button_stroke($logistics_data['btn_small_padding'], 'btn-small','4');
            $result.= logistics_general_button_stroke($logistics_data['btn_small_padding'], 'btn-small','5');
            $result.= logistics_general_button_stroke($logistics_data['btn_small_padding'], 'btn-small','6');
        }
        //btn-medium
        $result.= '.btn-medium{';
        if (!empty($logistics_data['btn_medium_padding'])) {
            // Padding
            if (!empty($logistics_data['btn_medium_padding']['padding-top'])) {
                $result.= 'padding-top: ' . ($logistics_data['btn_medium_padding']['padding-top']) . ';';
            }
            if (!empty($logistics_data['btn_medium_padding']['padding-left'])) {
                $result.= 'padding-left: ' . ($logistics_data['btn_medium_padding']['padding-left']) . ';';
            }
            if (!empty($logistics_data['btn_medium_padding']['padding-bottom'])) {
                $result.= 'padding-bottom: ' . ($logistics_data['btn_medium_padding']['padding-bottom']) . ';';
            }
            if (!empty($logistics_data['btn_medium_padding']['padding-right'])) {
                $result.= 'padding-right: ' . ($logistics_data['btn_medium_padding']['padding-right']) . ';';
            }
        }
        if (!empty($logistics_data['btn_medium_font'])) {
            $result.= logistics_general_typography($logistics_data['btn_medium_font']);
        }
        $result.= '}';
        if (!empty($logistics_data['btn_medium_padding'])){
            $result.= logistics_general_button_stroke($logistics_data['btn_medium_padding'], 'btn-medium','1');
            $result.= logistics_general_button_stroke($logistics_data['btn_medium_padding'], 'btn-medium','2');
            $result.= logistics_general_button_stroke($logistics_data['btn_medium_padding'], 'btn-medium','3');
            $result.= logistics_general_button_stroke($logistics_data['btn_medium_padding'], 'btn-medium','4');
            $result.= logistics_general_button_stroke($logistics_data['btn_medium_padding'], 'btn-medium','5');
            $result.= logistics_general_button_stroke($logistics_data['btn_medium_padding'], 'btn-medium','6');
        }
        //btn-large
        $result.= '.btn-large{';
        if (!empty($logistics_data['btn_large_padding'])) {
            // Padding
            if (!empty($logistics_data['btn_large_padding']['padding-top'])) {
                $result.= 'padding-top: ' . ($logistics_data['btn_large_padding']['padding-top']) . ';';
            }
            if (!empty($logistics_data['btn_large_padding']['padding-left'])) {
                $result.= 'padding-left: ' . ($logistics_data['btn_large_padding']['padding-left']) . ';';
            }
            if (!empty($logistics_data['btn_large_padding']['padding-bottom'])) {
                $result.= 'padding-bottom: ' . ($logistics_data['btn_large_padding']['padding-bottom']) . ';';
            }
            if (!empty($logistics_data['btn_large_padding']['padding-right'])) {
                $result.= 'padding-right: ' . ($logistics_data['btn_large_padding']['padding-right']) . ';';
            }
        }
        if (!empty($logistics_data['btn_large_font'])) {
            $result.= logistics_general_typography($logistics_data['btn_large_font']);
        }
        $result.= '}';
        if (!empty($logistics_data['btn_large_padding'])){
            $result.= logistics_general_button_stroke($logistics_data['btn_large_padding'], 'btn-large','1');
            $result.= logistics_general_button_stroke($logistics_data['btn_large_padding'], 'btn-large','2');
            $result.= logistics_general_button_stroke($logistics_data['btn_large_padding'], 'btn-large','3');
            $result.= logistics_general_button_stroke($logistics_data['btn_large_padding'], 'btn-large','4');
            $result.= logistics_general_button_stroke($logistics_data['btn_large_padding'], 'btn-large','5');
            $result.= logistics_general_button_stroke($logistics_data['btn_large_padding'], 'btn-large','6');
        }
        //btn-giant
        $result.= '.btn-giant{';
        if (!empty($logistics_data['btn_giant_padding'])) {
            // Padding
            if (!empty($logistics_data['btn_giant_padding']['padding-top'])) {
                $result.= 'padding-top: ' . ($logistics_data['btn_giant_padding']['padding-top']) . ';';
            }
            if (!empty($logistics_data['btn_giant_padding']['padding-left'])) {
                $result.= 'padding-left: ' . ($logistics_data['btn_giant_padding']['padding-left']) . ';';
            }
            if (!empty($logistics_data['btn_giant_padding']['padding-bottom'])) {
                $result.= 'padding-bottom: ' . ($logistics_data['btn_giant_padding']['padding-bottom']) . ';';
            }
            if (!empty($logistics_data['btn_giant_padding']['padding-right'])) {
                $result.= 'padding-right: ' . ($logistics_data['btn_giant_padding']['padding-right']) . ';';
            }
        }
        if (!empty($logistics_data['btn_giant_font'])) {
            $result.= logistics_general_typography($logistics_data['btn_giant_font']);
        }

        $result.= '}';
        if (!empty($logistics_data['btn_giant_padding'])){
            $result.= logistics_general_button_stroke($logistics_data['btn_giant_padding'], 'btn-giant','1');
            $result.= logistics_general_button_stroke($logistics_data['btn_giant_padding'], 'btn-giant','2');
            $result.= logistics_general_button_stroke($logistics_data['btn_giant_padding'], 'btn-giant','3');
            $result.= logistics_general_button_stroke($logistics_data['btn_giant_padding'], 'btn-giant','4');
            $result.= logistics_general_button_stroke($logistics_data['btn_giant_padding'], 'btn-giant','5');
            $result.= logistics_general_button_stroke($logistics_data['btn_giant_padding'], 'btn-giant','6');
        }
        if (!empty($logistics_data['breacrumb_typography'])) {
            $result.= '#breadcrumb-text,  #breadcrumb-text a{';
            $result.= logistics_general_typography($logistics_data['breacrumb_typography']);
            $result.= '}';
        }

        // VC Row Margin Style 01
        if(!empty($logistics_data['vc_row_margin_desktop_01'])){
            $result.= '.zo-vc-row-margin-01{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_desktop_01']);
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_margin_tablet_01'])){
            $result.= '@media (min-width: 768px) and (max-width: 991px) {';
            $result.= '.zo-vc-row-margin-01{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_tablet_01']);
            $result.= '}';
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_margin_phone_01'])){
            $result.= '@media(max-width: 767px) {';
            $result.= '.zo-vc-row-margin-01{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_phone_01']);
            $result.= '}';
            $result.= '}';
        }
        // VC Row Margin Style 02
        if(!empty($logistics_data['vc_row_margin_desktop_02'])){
            $result.= '.zo-vc-row-margin-02{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_desktop_02']);
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_margin_tablet_02'])){
            $result.= '@media (min-width: 768px) and (max-width: 991px) {';
            $result.= '.zo-vc-row-margin-02{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_tablet_02']);
            $result.= '}';
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_margin_phone_02'])){
            $result.= '@media(max-width: 767px) {';
            $result.= '.zo-vc-row-margin-02{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_phone_02']);
            $result.= '}';
            $result.= '}';
        }
        // VC Row Margin Style 03
        if(!empty($logistics_data['vc_row_margin_desktop_03'])){
            $result.= '.zo-vc-row-margin-03{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_desktop_03']);
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_margin_tablet_03'])){
            $result.= '@media (min-width: 768px) and (max-width: 991px) {';
            $result.= '.zo-vc-row-margin-03{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_tablet_03']);
            $result.= '}';
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_margin_phone_03'])){
            $result.= '@media(max-width: 767px) {';
            $result.= '.zo-vc-row-margin-03{';
            $result.= logistics_general_margin($logistics_data['vc_row_margin_phone_03']);
            $result.= '}';
            $result.= '}';
        }
        // VC Row Padding Style 01
        if(!empty($logistics_data['vc_row_padding_desktop_01'])){
            $result.= '.zo-vc-row-padding-01{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_desktop_01']);
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_padding_tablet_01'])){
            $result.= '@media (min-width: 768px) and (max-width: 991px) {';
            $result.= '.zo-vc-row-padding-01{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_tablet_01']);
            $result.= '}';
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_padding_phone_01'])){
            $result.= '@media(max-width: 767px) {';
            $result.= '.zo-vc-row-padding-01{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_phone_01']);
            $result.= '}';
            $result.= '}';
        }
        // VC Row padding Style 02
        if(!empty($logistics_data['vc_row_padding_desktop_02'])){
            $result.= '.zo-vc-row-padding-02{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_desktop_02']);
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_padding_tablet_02'])){
            $result.= '@media (min-width: 768px) and (max-width: 991px) {';
            $result.= '.zo-vc-row-padding-02{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_tablet_02']);
            $result.= '}';
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_padding_phone_02'])){
            $result.= '@media(max-width: 767px) {';
            $result.= '.zo-vc-row-padding-02{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_phone_02']);
            $result.= '}';
            $result.= '}';
        }
        // VC Row padding Style 03
        if(!empty($logistics_data['vc_row_padding_desktop_03'])){
            $result.= '.zo-vc-row-padding-03{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_desktop_03']);
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_padding_tablet_03'])){
            $result.= '@media (min-width: 768px) and (max-width: 991px) {';
            $result.= '.zo-vc-row-padding-03{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_tablet_03']);
            $result.= '}';
            $result.= '}';
        }
        if(!empty($logistics_data['vc_row_padding_phone_03'])){
            $result.= '@media(max-width: 767px) {';
            $result.= '.zo-vc-row-padding-03{';
            $result.= logistics_general_padding($logistics_data['vc_row_padding_phone_03']);
            $result.= '}';
            $result.= '}';
        }

        //WooCommerce
        if(!empty($logistics_data['woo_pt_background'])){
            $result.= '.woocommerce #zo-page-element-wrap {';
            $result.= logistics_general_background($logistics_data['woo_pt_background']);
            $result.= '}';
        }
        print $result;
        return ob_get_clean();
    }

    /*
    * Set SCSS variable
    */
    public function setVariable($name, $value, $default_value = null) {
        if (empty($value)) {
            $value = $default_value;
        }
        $this->scss->setVariables(array(
            $name => $value,
        ));
    }
}

new CMS_StaticCss();
