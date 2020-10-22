<?php
/**
 * Zo Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.3
 */
/* Add base functions */
require( get_template_directory() . '/inc/base.class.php' );

/* Add theme options. */
require( get_template_directory() . '/inc/options/functions.php' );

/* Add custom vc params. */
if (class_exists('Vc_Manager')) {
    /* Add theme elements */
    add_action('init', 'logistics_vc_params');
    function logistics_vc_params() {
        require( get_template_directory() . '/vc_params/vc_rows.php' );
        require( get_template_directory() . '/vc_params/vc_column.php' );
    }
}

/* Add Meta Core Options */
if (is_admin()) {
    /* Add meta options */
    require( get_template_directory() . '/inc/options/meta.options.php' );
    /* Tmp plugins. */
    require( get_template_directory() . '/inc/options/require.plugins.php' );
	/* Add presets color */
	require( get_template_directory() . '/inc/options/presets.php' );
}

/* Add SCSS */
if (!class_exists('scssc')) {
    require( get_template_directory() . '/inc/scssphp/scss.inc.php' );
}

/* Add Template functions */
require( get_template_directory() . '/inc/template.functions.php' );

/* Static css. */
require( get_template_directory() . '/inc/dynamic/static.css.php' );

/* Dynamic css */
require( get_template_directory() . '/inc/dynamic/dynamic.css.php' );


/* Add mega menu */
add_action('init', 'logistics_set_init');
function logistics_set_init() {
    if (!class_exists('HeroMenuWalker')) {
        require( get_template_directory() . '/inc/megamenu/mega-menu.php' );
    }
}

/* Add widgets */
require( get_template_directory() . '/inc/widgets/cart_search.php' );
require( get_template_directory() . '/inc/widgets/instagram.php' );
require( get_template_directory() . '/inc/widgets/social.php' );
require( get_template_directory() . '/inc/widgets/recent-posts-widget-with-thumbnails.php' );
require( get_template_directory() . '/inc/widgets/flickr-badges-widget.php' );
require( get_template_directory() . '/inc/widgets/tweets.php' );
require( get_template_directory() . '/inc/widgets/options.php' );

// Set up the content width value based on the theme's design and stylesheet.
if (!isset($content_width))
    $content_width = 625;

/*
 * Limit Words
 */
if (!function_exists('logistics_limit_words')) {

    function logistics_limit_words($string, $word_limit) {
        $words = explode(' ', strip_tags($string), ($word_limit + 1));
        if (count($words) > $word_limit) {
            array_pop($words);
        }
        return apply_filters('the_excerpt', implode(' ', $words));
    }

}

/**
 * Happy Pet Setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Happy Pet supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Happy Pet 1.0
 */
function logistics_setup() {
    /*
     * Makes Happy Pet available for translation.
     *
     * Translations can be added to the /languages/ directory.
     * If you're building a theme based on Less, use a find and replace
     * to change 'am-logistics' to the name of your theme in all the template files.
     */
    load_theme_textdomain('am-logistics', get_template_directory() . '/languages');

    // Adds title tag
    add_theme_support("title-tag");


    // Adds custom header
    add_theme_support('custom-header');

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    // This theme supports a variety of post formats.
    add_theme_support('post-formats', array('video', 'audio', 'gallery', 'link', 'quote',));

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', esc_html__('Primary Menu', 'am-logistics'));
    register_nav_menu('top_navigation', esc_html__('Header Top Menu', 'am-logistics'));
    register_nav_menu( 'left_menu', esc_html__( 'Primary Left Menu', 'am-logistics' ) );
	register_nav_menu( 'right_menu', esc_html__( 'Primary Right Menu', 'am-logistics' ) );
	register_nav_menu( 'vertical_menu', esc_html__( 'Vertical Menu', 'am-logistics' ) );

    /*
     * This theme supports custom background color and image,
     * and here we also set up the default background color.
     */
    add_theme_support('custom-background', array(
        'default-color' => 'e6e6e6',
    ));

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(624, 9999); // Unlimited height, soft crop
}
add_action('after_setup_theme', 'logistics_setup');

/**
 * Get post meta data.
 * @author ZoTheme
 * @return mixed|NULL
 */
function logistics_post_meta_data() {
    global $post;

    if (!isset($post->ID))
        return null;

    $post_meta = json_decode(get_post_meta($post->ID, '_zo_meta_data', true));

    if (empty($post_meta))
        return null;

    foreach ($post_meta as $key => $meta) {
        $post_meta->$key = rawurldecode($meta);
    }

    return $post_meta;
}

/**
 * Enqueue scripts and styles for front-end.
 * @author ZoTheme
 * @since ZoTheme 1.0
 */

function logistics_scripts_styles() {

    global $logistics_data, $wp_styles, $wp_scripts;
    $logistics_meta_box = logistics_post_meta();
	$logistics_header_layout = !empty($logistics_data['header_layout']) ? $logistics_data['header_layout'] : '';
	$logistics_header_layout = (!empty($logistics_meta_box['header_layout']) && $logistics_meta_box['header_layout'] != 'default') ? $logistics_meta_box['header_layout'] : $logistics_header_layout;
	$logistics_header_01_transparent = !empty($logistics_data['header_01_transparent']) ? $logistics_data['header_01_transparent'] : '';
	$logistics_header_01_transparent = !empty($logistics_meta_box['header_transparent']) ? $logistics_meta_box['header_transparent'] : $logistics_header_01_transparent;
	/** theme options. */
    $script_options = array(
        //'header_01_sticky' => $header_01_sticky,
        'menu_sticky_tablets' => !empty($logistics_data['menu_sticky_tablets']) ? $logistics_data['menu_sticky_tablets'] : '',
        'menu_sticky_mobile' => !empty($logistics_data['menu_sticky_mobile']) ? $logistics_data['menu_sticky_mobile'] : '',
        'paralax' => !empty($logistics_data['paralax']) ? $logistics_data['paralax'] : '',
        'back_to_top' => !empty($logistics_data['footer_botton_back_to_top']) ? $logistics_data['footer_botton_back_to_top'] : '',
        'pt_parallax' => !empty($logistics_data['pt_parallax']) ? $logistics_data['pt_parallax'] : '',
		'header_layout' => $logistics_header_layout,
		'header_01_transparent' => $logistics_header_01_transparent,
		'ajaxurl' => esc_url(admin_url('admin-ajax.php'))
    );

    /* ------------------------------------- JavaScript --------------------------------------- */
    /* Adds JavaScript Bootstrap. */
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.5');

    /* Sicky header */
    wp_enqueue_script('header-sticky', get_template_directory_uri() . '/assets/js/sticky.js', array('jquery','bootstrap'), '1.0.0', true);

    /* Add main.js */
    wp_enqueue_script('logistics-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.3', true);
    wp_localize_script('logistics-main', 'ZOOptions', $script_options);

    /* Add menu.js */
    wp_enqueue_script('logistics-menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '1.0.3', true);
     /* Add menu.js */
     wp_enqueue_script('slick-car', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.3', true);
    
    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    /* ------------------------------------- Stylesheet --------------------------------------- */
    /** --------------------------libs--------------------------------- */

    /* Loads Bootstrap stylesheet. */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');

    /* Loads Bootstrap stylesheet. */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.5.0');

    /** --------------------------custom------------------------------- */
    /* Loads our main stylesheet. */
    wp_enqueue_style('logistics-style', get_stylesheet_uri(), array('bootstrap'));

    /* Loads the Internet Explorer specific stylesheet. */
    wp_enqueue_style('ie-9', get_template_directory_uri() . '/assets/css/ie.css', array('logistics-style'), '20121010');
    $wp_styles->add_data('ie-9', 'conditional', 'lt IE 9');

    /* Load widgets scripts */
    wp_enqueue_script('widget_scripts', get_template_directory_uri() . '/inc/widgets/widgets.js');
    wp_enqueue_style('widget_scripts', get_template_directory_uri() . '/inc/widgets/widgets.css');

    /* Load style */
    $presets = !empty($logistics_data['presets_color']) ? (int)$logistics_data['presets_color'] : '';
    $presets = !empty($logistics_meta_box['presets_color']) ? (int)$logistics_meta_box['presets_color'] : $presets;
    if ($presets > 0) {
        wp_enqueue_style('logistics-static', get_template_directory_uri() . '/assets/css/presets-' . $presets . '.css', array('logistics-style'), '1.0.3');
    } else {
        wp_enqueue_style('logistics-static', get_template_directory_uri() . '/assets/css/static.css', array('logistics-style'), '1.0.3');
    }
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.3');
	$rtl = !empty($logistics_data['rtl_layout']) ? $logistics_data['rtl_layout'] : '';
	if($rtl)
		wp_enqueue_style('logistics-rtl', get_template_directory_uri() . '/rtl.css', array('logistics-style'), '1.0.3');

    /**
     * IE Fallbacks
     */
    wp_enqueue_script('ie_html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), false, '3.7.2');
    $wp_scripts->add_data('ie_html5shiv', 'conditional', 'lt IE 9');
    wp_enqueue_script('ie_respond', get_template_directory_uri() . '/assets/js/respond.min.js', array(), false, '1.4.2');
    $wp_scripts->add_data('ie_respond', 'conditional', 'lt IE 9');
}

add_action('wp_enqueue_scripts', 'logistics_scripts_styles');

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since ZoTheme
 */
function logistics_widgets_init() {

    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'am-logistics'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'am-logistics'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Top Sidebar 1', 'am-logistics'),
        'id' => 'header-top-sidebar-1',
        'description' => esc_html__('Appears when using the optional Header setting from Theme options', 'am-logistics'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Top Sidebar 2', 'am-logistics'),
        'id' => 'header-top-sidebar-2',
        'description' => esc_html__('Appears when using the optional Header setting from Theme options', 'am-logistics'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 1', 'am-logistics'),
        'id' => 'footer-sidebar-1',
        'description' => esc_html__('Appears when using the optional Footer column greater equal 1', 'am-logistics'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 2', 'am-logistics'),
        'id' => 'footer-sidebar-2',
        'description' => esc_html__('Appears when using the optional Footer column greater equal 2', 'am-logistics'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 3', 'am-logistics'),
        'id' => 'footer-sidebar-3',
        'description' => esc_html__('Appears when using the optional Footer column greater equal 3', 'am-logistics'),
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 4', 'am-logistics'),
        'id' => 'footer-sidebar-4',
        'description' => esc_html__('Appears when using the optional Footer column greater equal 4', 'am-logistics'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 5', 'am-logistics'),
        'id' => 'footer-sidebar-5',
        'description' => esc_html__('Appears when using the optional Footer column greater equal 5', 'am-logistics'),
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 6', 'am-logistics'),
        'id' => 'footer-sidebar-6',
        'description' => esc_html__('Appears when using the optional Footer column equal 6', 'am-logistics'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Copyright Extra Sidebar', 'am-logistics'),
        'id' => 'copyright-extra',
        'description' => esc_html__('Appears when using the optional Footer Copyright Extra enabled', 'am-logistics'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Bottom Right', 'am-logistics'),
        'id' => 'sidebar-10',
        'description' => esc_html__('Appears when using the optional Footer Bottom with a page set as Footer Bottom right', 'am-logistics'),
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'logistics_widgets_init');

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.3
 */
function logistics_page_menu_args($args) {
    if (!isset($args['show_home']))
        $args['show_home'] = true;
    return $args;
}

add_filter('wp_page_menu_args', 'logistics_page_menu_args');

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.3
 * @param null $query
 */
function logistics_paging_nav($query = null) {
  
    // Don't print empty markup if there's only one page.
    if ($query) {
        $zo_query = $query;

    } else {
        $zo_query = $GLOBALS['wp_query'];
    }
    if ($zo_query->max_num_pages < 2) {
        return;
    }

    $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
    $pagenum_link = html_entity_decode(get_pagenum_link());
    $query_args = array();
    $url_parts = explode('?', $pagenum_link);

    if (isset($url_parts[1])) {
        wp_parse_str($url_parts[1], $query_args);
    }

    $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
    $pagenum_link = trailingslashit($pagenum_link) . '%_%';

    $format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links(array(
        'base' => $pagenum_link,
        'format' => $format,
        'total' => $zo_query->max_num_pages,
        'current' => $paged,
        'mid_size' => 1,
        'add_args' => array_map('urlencode', $query_args),
        'prev_text' => wp_kses(__('<i class="fa fa-angle-double-left"></i>', 'am-logistics'),array('i'=>array('class'=>array()))),
        'next_text' => wp_kses(__('<i class="fa fa-angle-double-right"></i>', 'am-logistics'),array('i'=>array('class'=>array()))),
    ));

    if ($links) :
        ?>
        <nav class="navigation paging-navigation clearfix">
            <div class="pagination loop-pagination">
                <?php echo balanceTags($links); ?>
            </div><!-- .pagination -->
        </nav><!-- .navigation -->
        <?php
    endif;
}

/**
 * Display navigation to next/previous post when applicable.
 *
 * @since 1.0.3
 */
function logistics_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);

    if (!$next && !$previous)
        return;
    ?>
    <nav class="navigation post-navigation" role="navigation">
        <div class="nav-links clearfix">
            <?php
				$prev_post = get_previous_post();
				if (!empty($prev_post)):
            ?>
					<a class="post-prev left" href="<?php echo get_permalink($prev_post->ID); ?>" title="<?php echo esc_attr($prev_post->post_title); ?>"><i class="fa fa-long-arrow-left"></i><span><?php echo esc_attr($prev_post->post_title); ?></span></a>
            <?php endif; ?>
            <?php
				$next_post = get_next_post();
				if (is_a($next_post, 'WP_Post')) :
			?>
					<a class="post-next right" href="<?php echo get_permalink($next_post->ID); ?>" title="<?php echo get_the_title($next_post->ID); ?>"><span><?php echo get_the_title($next_post->ID); ?></span><i class="fa fa-long-arrow-right"></i></a>
            <?php endif; ?>
        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}

/* Add Custom Comment */
function logistics_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_attr($tag) ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

		<?php if ('div' != $args['style']) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>

        <div class="comment-author-image vcard">
            <?php echo get_avatar($comment, 109); ?>
        </div>

        <div class="comment-main">
            <div class="comment-header">
                <?php printf(__('<span class="comment-author">%s</span>', 'am-logistics'), get_comment_author_link()); ?>
                <span class="comment-date">
                    <?php echo get_comment_time('F j, Y'); ?>
                </span>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'am-logistics'); ?></em>
                <?php endif; ?>
            </div>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
            <div class="reply">
                <?php
					comment_reply_link(
						array_merge($args, array(
							'add_below' => $add_below,
							'depth' => $depth,
							'max_depth' => $args['max_depth'])
						)
					);
                ?>
                <i class="fa fa-mail-forward"></i>
            </div>
        </div>

        <?php if ('div' != $args['style']) : ?>
			</div>
		<?php endif; ?>
    <?php
}

/* End Custom Comment */

/**
 * Ajax post like.
 *
 * @since 1.0.3
 */
function logistics_post_like_callback() {

    $post_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    $likes = null;

    if ($post_id && !isset($_COOKIE['zo_post_like_' . $post_id])) {

        /* get old like. */
        $likes = get_post_meta($post_id, '_zo_post_likes', true);

        /* check old like. */
        $likes = $likes ? $likes : 0;

        $likes++;

        /* update */
        update_post_meta($post_id, '_zo_post_likes', $likes);

        /* set cookie. */
        setcookie('zo_post_like_' . $post_id, $post_id, time() * 20, '/');
    }

    echo esc_attr($likes);

    die();
}
add_action('wp_ajax_zo_post_like', 'logistics_post_like_callback');
add_action('wp_ajax_nopriv_zo_post_like', 'logistics_post_like_callback');

/**
 * Count post view.
 *
 * @since 1.0.3
 */
function logistics_set_count_view() {
    global $post;

    if (is_single() && !empty($post->ID) && !isset($_COOKIE['zo_post_view_' . $post->ID])) {

        $views = get_post_meta($post->ID, '_zo_post_views', true);

        $views = $views ? $views : 0;

        $views++;

        update_post_meta($post->ID, '_zo_post_views', $views);

        /* set cookie. */
        // setcookie('zo_post_view_' . $post->ID, $post->ID, time() + 3000);
    }
}
add_action('wp', 'logistics_set_count_view');

/**
 * Get Post view
 * @return int|mixed
 */
function logistics_get_count_view() {
    global $post;

    $views = get_post_meta($post->ID, '_zo_post_views', true);

    $views = $views ? $views : 0;
    return $views;
}

/* Filter Search results */

// function logistics_searchfilter($query) {
//     if ($query->is_search && !is_admin()) {
//         $query->set('post_type', array('post'));
//     }
//     return $query;
// }
// add_filter('pre_get_posts', 'logistics_searchfilter');

if (function_exists('zo_image_resize')) {
    /**
     * Crop Image Size  || zo_image_resize is functions cmstheme's plugin
     *
     * @param null $width
     * @param null $height
     * @param null $crop
     * @param bool $single
     * @param bool $upscale
     * @return null|string
     */
    function logistics_post_thumbnail($id = null, $width = null, $height = null, $crop = null, $single = true, $upscale = false) {
        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
        $url = zo_image_resize($image_url[0], $width, $height, $crop, $single, $upscale);
        return do_shortcode('<img src="' . esc_url($url) . '" alt="' . get_the_title() . '" />');
    }
}
add_filter('use_block_editor_for_post', '__return_false');

// add_action( 'woocommerce_after_shop_loop_item_title', array( WC_Wishlists_Plugin, 'add_to_wishlist_button' ), 10 );
if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_add_wishlist_to_loop' ) ){
    function yith_wcwl_add_wishlist_to_loop(){
        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
    }
    add_action( 'woocommerce_after_shop_loop_item', 'yith_wcwl_add_wishlist_to_loop', 10 );
}

function logistics_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'logistics_add_woocommerce_support' );

add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {
    if( $product->is_type('variable')){
        $percentages = array();
        // Get all variation prices
        $prices = $product->get_variation_prices();
        // Loop through variation prices
        foreach( $prices['price'] as $key => $price ){
            // Only on sale variations
            if( $prices['regular_price'][$key] !== $price ){
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100),2);
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();
        $percentage    = round(100 - ($sale_price / $regular_price * 100),2) . '%';
        
    }
    return '<span class="onsale">' . esc_html__( 'SALE', 'woocommerce' ) . ' ' . $percentage . '</span>';
}

function create_shortcode_laster_news() {
    $query_args = array(
        'posts_per_page' => "-1",
        'post_type' => 'post',
		'order' => 'DESC',
    	'orderby' => 'date',
    );
    $the_query = new WP_Query( $query_args );
    ob_start();
    if ( $the_query->have_posts() ) :
			echo '<div class="customer-review">';
			while ( $the_query->have_posts() ) :
			$the_query->the_post();?>
			<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
				<div class="item-review">
                    <div class="zo-blog-image">
                        <?php
                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                            $attachment_full_image = $attachment_image[0];
                            $image_resize = zo_image_resize($attachment_full_image, 320, 200, true );
                        ?>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                            <?php 
                            if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)){
                                echo '<img src="'. esc_url($image_resize) .'" alt="' . get_the_title() . '">';
                            }else{
                                echo '<img src="' . esc_url(ZO_IMAGES . 'no-image.jpg') . '" alt="' . get_the_title() . '" />';
                            }
                            ?>
                        </a>
                    </div>
                    <div class="zo-blog-meta">
                        <ul>
                            <li class="zo-single-author">
                                <?php the_author_link(); ?>
                            </li>
                            <li class="zo-single-date">
                                <?php
                                $date_format = 'M.d, Y';
                                echo get_the_date($date_format); ?>
                            </li>
                            <li class="zo-blog-comment">
                                <a href="<?php the_permalink(); ?>#comment"><?php echo comments_number('0','1','%'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <h5> 
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a>
                    </h5>
                    <div class="zo-blog-content">
                        <?php
                        if(get_post_type( get_the_ID() ) != 'page'):
                            the_excerpt();
                        endif;
                        ?>
                    </div>
				</div>
		<?php endwhile;
        echo '</div>';
        echo '<div class="view-all"><a href='.get_permalink( get_page_by_path( 'news' )).'>View All</a></div>';
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}
add_shortcode('laster_news', 'create_shortcode_laster_news');

add_action('after_setup_theme', function() {
    add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 ); // add pagination back
});

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 12 );
function new_loop_shop_per_page( $products ) {
  // Return the number of products you wanna show per page.
  $products = 12;
  return $products;
}

function create_shortcode_list_product_category($cat) {
    global $product;
    $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'product_cat' => $cat["category"],
        'orderby'        => 'meta_value_num',
        'order'          => 'desc',
        'meta_key'       => '_wc_average_rating'
    );

    $the_query = new WP_Query( $query_args );
    ob_start();
    if ( $the_query->have_posts() ) :
			echo '<div class="product-menu">';
			while ( $the_query->have_posts() ) :
			$the_query->the_post();?>
			<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
				<div class="item-review">
                    <div class="zo-blog-image">
                        <?php
                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                            $attachment_full_image = $attachment_image[0];
                            $image_resize = zo_image_resize($attachment_full_image, 120, 120, true );
                        ?>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                            <?php 
                            if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)){
                                echo '<img src="'. esc_url($image_resize) .'" alt="' . get_the_title() . '">';
                            }else{
                                echo '<img src="' . esc_url(ZO_IMAGES . 'no-image.jpg') . '" alt="' . get_the_title() . '" />';
                            }
                            ?>
                        </a>
                    </div>
                    <div class="info-right">
                        <h5> 
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a>
                        </h5>
                        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                        <div class="review-product">
                            <span><?php esc_html_e('View: ', 'am-logistics'); ?><?php echo logistics_get_count_view(); ?>/<?php esc_html_e('Comments: ', 'am-logistics'); ?> <?php echo comments_number('0','1','%');?></span>
                        </div>
                    </div>
				</div>
		<?php endwhile;
        echo '</div>';
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}
add_shortcode('list_product_category', 'create_shortcode_list_product_category');


// Woocommerce rating stars always
add_filter('woocommerce_product_get_rating_html', 'your_get_rating_html', 10, 2);

function your_get_rating_html($rating_html, $rating) {
  if ( $rating > 0 ) {
    $title = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
  } else {
    $title = 'Not yet rated';
    $rating = 0;
  }

  $rating_html  = '<div class="star-rating" title="' . $title . '">';
  $rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . __( 'out of 5', 'woocommerce' ) . '</span>';
  $rating_html .= '</div>';
  return $rating_html;
}
add_filter( 'wc_product_sku_enabled', '__return_false' );

function custom_remove_all_quantity_fields( $return, $product ) {return true;}
add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );


add_filter( 'woocommerce_catalog_orderby', 'options_rename_default_sorting_options' );
 
function options_rename_default_sorting_options( $options ){
    unset( $options[ 'popularity' ] ); // remove
	$options[ 'post_views' ] = 'Sort by popularity';
	return $options;
}

function wpum_custom_redirect_to_homepage( $url ) {
    return home_url();
}
add_filter( 'wpum_get_login_redirect', 'wpum_custom_redirect_to_homepage' );

// Update CSS within in Admin
function admin_style() {
    wp_enqueue_style('admin-styles-custom-css', get_template_directory_uri().'/assets/css/admin.css');
  }
  add_action('admin_enqueue_scripts', 'admin_style');

  add_filter( 'wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2 );

function wti_loginout_menu_link( $items, $args ) {
   if ($args->theme_location == 'primary') {
      if (is_user_logged_in()) {
         $items .= '<li class="right menu-logout"><a href="'. wp_logout_url( home_url() ) .'">'. __("Log Out") .'</a></li>';
      }
   }
   return $items;
}

add_filter('woocommerce_save_account_details_required_fields', 'wc_save_account_details_required_fields' );
function wc_save_account_details_required_fields( $required_fields ){
    unset( $required_fields['account_display_name'] );
    return $required_fields;
}

