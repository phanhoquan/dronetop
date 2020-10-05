<?php
class logistics_Base {
    public static function getPageTitle() {
        global $logistics_data;
        $logistics_meta_box =  logistics_post_meta();

        if (!is_archive()) {
            /* page. */
            if (is_page()) {
                /* custom title. */
                if (!empty($logistics_meta_box['page_title_text'])):
                    echo esc_attr($logistics_meta_box['page_title_text']);
                else :
                    the_title();
                endif;
                /* blog */
            } elseif (is_front_page() || is_home()) {
                if (!empty($logistics_data['blog_pt']))
                    echo esc_attr($logistics_data['blog_pt']);
                else
                    esc_html_e('Our Blog', 'am-logistics');
                /* search */
            }elseif (is_search()) {
                printf(__('Search Results for: %s', 'am-logistics'), '<span>' . get_search_query() . '</span>');
                /* 404 */
            } elseif (is_404()) {
                esc_html_e('404', 'am-logistics');
                /* other */
            } else {
                the_title();
            }
        } else {
            /* category. */
            if (is_category()) :
                single_cat_title();
            elseif (is_tag()) :
                /* tag. */
                single_tag_title();
            /* author. */
            elseif (is_author()) :
                printf(__('Author: %s', 'am-logistics'), '<span class="vcard">' . get_the_author() . '</span>');
            /* date */
            elseif (is_day()) :
                printf(__('Day: %s', 'am-logistics'), '<span>' . get_the_date() . '</span>');
            elseif (is_month()) :
                printf(__('Month: %s', 'am-logistics'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'am-logistics')) . '</span>');
            elseif (is_year()) :
                printf(__('Year: %s', 'am-logistics'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'am-logistics')) . '</span>');
            /* post format */
            elseif (is_tax('post_format', 'post-format-aside')) :
                esc_html_e('Asides', 'am-logistics');
            elseif (is_tax('post_format', 'post-format-gallery')) :
                esc_html_e('Galleries', 'am-logistics');
            elseif (is_tax('post_format', 'post-format-image')) :
                esc_html_e('Images', 'am-logistics');
            elseif (is_tax('post_format', 'post-format-video')) :
                esc_html_e('Videos', 'am-logistics');
            elseif (is_tax('post_format', 'post-format-quote')) :
                esc_html_e('Quotes', 'am-logistics');
            elseif (is_tax('post_format', 'post-format-link')) :
                esc_html_e('Links', 'am-logistics');
            elseif (is_tax('post_format', 'post-format-status')) :
                esc_html_e('Statuses', 'am-logistics');
            elseif (is_tax('post_format', 'post-format-audio')) :
                esc_html_e('Audios', 'am-logistics');
            elseif (is_tax('post_format', 'post-format-chat')) :
                esc_html_e('Chats', 'am-logistics');
            /* woocommerce */
            elseif (class_exists('Woocommerce') && is_woocommerce()):
                woocommerce_page_title();
            elseif (is_tax()):
                $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                echo esc_attr($term->name);
            else :
                /* other */
                //the_title();
            endif;
        }
    }

    /**
     * Breadcrumb
     *
     * @since 1.0.0
     */
    public static function getBreadCrumb($separator = '') {
        global $logistics_data, $post;
        echo '<ul class="breadcrumbs">';
        /* not front_page */
        if (!is_front_page()) {
            echo '<li><a href="';
            echo esc_url(home_url('/'));
            echo '">' . $logistics_data['breacrumb_prefix'];
            echo "</a></li>";
        }

        $params['link_none'] = '';

        /* category */
        if (is_category()) {
            $categories = get_the_category();
            $cats[] = '<li>';
            $count = 1;
            foreach ($categories as $cat) {
                $cats[] = '<a href="' . get_category_link($cat->term_id) . '" title="' . $cat->name . '">' . $cat->name . '</a>';
                if ($count < count($categories)) {
                    $cats[] = '<span class="zo-breadcrumb-categrory-space">,</span>';
                }
                $count++;
            }
            $cats[] = '</li>';
            echo join('', $cats);
        }
        /* tax */
        if (is_tax()) {
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $link = get_term_link($term);
            if(!empty($term->taxonomy)){
                if($term->taxonomy == 'portfolio_category'){
                    echo '<li>';
                    if(!empty($logistics_data['portfolio_url'])){
                        echo '<a href="' . get_home_url() . '?page_id=' . $logistics_data['portfolio_url'] . '">';
                    }
                    esc_html_e("Portfolio", 'am-logistics');
                    if(!empty($logistics_data['portfolio_url'])){
                        echo '</a>';
                    }
                    echo '</li>';
                }
                if($term->taxonomy == 'product_cat'){
                    echo '<li>';
                    if(!empty($logistics_data['product_url'])){
                        echo '<a href="' . get_home_url() . '?page_id=' . $logistics_data['product_url'] . '">';
                    }
                    esc_html_e("Products", 'am-logistics');
                    if(!empty($logistics_data['product_url'])){
                        echo '</a>';
                    }
                    echo '</li>';
                }
            }
        }
        /* home */
        /* page not front_page */
        if (is_page() && !is_front_page()) {
            $parents = array();
            $parent_id = $post->post_parent;
            while ($parent_id) :
                $page = get_page($parent_id);
                if ($params["link_none"])
                    $parents[] = get_the_title($page->ID);
                else
                    $parents[] = '<li><a href="' . get_permalink($page->ID) . '" title="' . get_the_title($page->ID) . '">' . get_the_title($page->ID) . '</a></li>' . $separator;
                $parent_id = $page->post_parent;
            endwhile;
            $parents = array_reverse($parents);
            echo join('', $parents);
            echo '<li>' . get_the_title() . '</li>';
        }

        /* single */
        if (is_single()) {
            $categories_1 = get_the_category($post->ID);
            if ($categories_1):
                foreach ($categories_1 as $cat_1):
                    $cat_1_ids[] = $cat_1->term_id;
                endforeach;
                $cat_1_line = implode(',', $cat_1_ids);
            endif;
            if (isset($cat_1_line) && $cat_1_line) {
                $categories = get_categories(array(
                    'include' => $cat_1_line,
                    'orderby' => 'id'
                ));
                if ($categories) :
                    $cats[] = '<li>';
                    $count = 1;
                    foreach ($categories as $cat) :
                        $cats[] = '<a href="' . get_category_link($cat->term_id) . '" title="' . $cat->name . '">' . $cat->name . '</a>';
                        if ($count < count($categories)) {
                            $cats[] = '<span class="zo-breadcrumb-categrory-space">,</span>';
                        }
                        $count++;
                    endforeach;
                    $cats[] = '</li>';
                    echo join('', $cats);
                endif;
            }
            //echo '<li>'.get_the_title().'</li>';
        }
        if ( is_singular( 'portfolio' ) ) {
            echo '<li>';
            if(!empty($logistics_data['portfolio_url'])){
                echo '<a href="' . get_home_url() . '?page_id=' . $logistics_data['portfolio_url'] . '">';
            }
            esc_html_e("Portfolio", 'am-logistics');
            if(!empty($logistics_data['portfolio_url'])){
                echo '</a>';
            }
            echo '</li>';
            echo '<li>';
            the_terms( get_the_ID(), 'portfolio_category', '', ', ' );
            echo '</li>';
        }
        if ( is_singular( 'product' ) ) {
            echo '<li>';
            if(!empty($logistics_data['product_url'])){
                echo '<a href="' . get_home_url() . '?page_id=' . $logistics_data['product_url'] . '">';
            }
            esc_html_e("Products", 'am-logistics');
            if(!empty($logistics_data['product_url'])){
                echo '</a>';
            }
            echo '</li>';
            echo '<li>';
            the_terms( get_the_ID(), 'product_cat', '', ', ' );
            echo '</li>';
        }
        if ( is_singular( 'team' ) ) {
            echo '<li>';
            esc_html_e("Team Member", 'am-logistics');
            echo '</li>';
        }
        /* tag */
        if (is_tag()) {
            echo '<li>' . "Tag: " . single_tag_title('', FALSE) . '</li>';
        }
        /* search */
        if (is_search()) {
            echo '<li>' . esc_html__("Search", 'am-logistics') . '</li>';
        }
        /* date */
        if (is_year()) {
            echo '<li>' . get_the_time('Y') . '</li>';
        }
        /* 404 */
        if (is_404()) {
            echo '<li>' . esc_html__("404 - Page not Found", 'am-logistics') . '</li>';
        }
        /* archive */
        if (is_archive() && is_post_type_archive()) {
            $title = post_type_archive_title('', false);
            echo '<li>' . $title . '</li>';
        }
        echo "</ul>";
    }

    /**
     * Get Shortcode From Content
     *
     * @param string $shortcode
     * @param string $content
     * @return unknown
     */
    public static function getShortcodeFromContent($shortcode = '', $content = '') {

        preg_match("/\[" . $shortcode . "(.*)/", $content, $matches);

        return !empty($matches[0]) ? $matches[0] : null;
    }

    /**
     * Get list name local fonts.
     *
     * @return multitype:unknown Ambigous <string, mixed>
     * @since 1.0.0
     */
    public static function getListLocalFontsName() {

        /* array fonts. */
        $localfonts = array();

        /* folder fonts. */
        $font_path = get_template_directory() . "/assets/fonts";
        foreach (glob($font_path. "/*.*", GLOB_BRACE) as $font) {
            $filename = basename($font);
            if (strpos($filename, ".ttf") !== false || strpos($filename, ".eot") !== false || strpos($filename, ".woff") !== false || strpos($filename, ".otf") !== false) {
                $filename = str_replace(array('.ttf', '.eot', '.woff', '.otf'), '', $filename);
                $localfonts[$filename] = $filename;
            }
        }

        return $localfonts;
    }

    public static function setTypographyLocal($name = '', $selecter = '', $dafault = '.local-font') {
        $font_url_1 = file_exists(get_template_directory() . "/assets/fonts/" . esc_attr($name) .'.eot') ? get_template_directory_uri() . "/assets/fonts/" . esc_attr($name) .'.eot' : '';
        $font_url_2 = file_exists(get_template_directory() . "/assets/fonts/" . esc_attr($name) .'.woff') ? get_template_directory_uri() . "/assets/fonts/" . esc_attr($name) .'.woff' : '';
        $font_url_3 = file_exists(get_template_directory() . "/assets/fonts/" . esc_attr($name) .'.ttf') ? get_template_directory_uri() . "/assets/fonts/" . esc_attr($name) .'.ttf' : '';
        $font_url_4 = file_exists(get_template_directory() . "/assets/fonts/" . esc_attr($name) .'.otf') ? get_template_directory_uri() . "/assets/fonts/" . esc_attr($name) .'.otf' : '';
        /* load font files. */
        if ($name) {
            echo "@include font-face($name, '{$font_url_1}', '{$font_url_2}', '{$font_url_3}', '{$font_url_4}');\n";
            /* add font selecter. */
            if ($selecter) {
                echo esc_attr($selecter) . ", " . $dafault . "{font-family:'" . esc_attr($name) . "';}\n";
            }
        }
    }

    /**
     * set google font for selecter.
     *
     * @param array $googlefont
     * @param string $selecter
     */
    public static function setGoogleFont($googlefont = array(), $selecter = '') {

        if (!empty($googlefont['font-family'])) {
            /* add font selecter. */
            if ($selecter) {
                echo esc_attr($selecter) . "{font-family:'" . esc_attr($googlefont['font-family']) . "';}";
            }
        }
    }

    /**
     * minimize CSS styles
     *
     * @since 1.1.0
     */
    public static function compressCss($buffer) {

        /* remove comments */
        $buffer = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $buffer);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace("	", " ", $buffer); //replace tab with space
        $arr = array("\r\n", "\r", "\n", "\t", "  ", "    ", "    ");
        $rep = array("", "", "", "", " ", " ", " ");
        $buffer = str_replace($arr, $rep, $buffer);
        /* remove whitespaces around {}:, */
        $buffer = preg_replace("/\s*([\{\}:,])\s*/", "$1", $buffer);
        /* remove last ; */
        $buffer = str_replace(';}', "}", $buffer);

        return $buffer;
    }

}

global $logistics_base;
$logistics_base = new logistics_Base();
