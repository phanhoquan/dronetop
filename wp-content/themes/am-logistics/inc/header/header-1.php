<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
global $logistics_data;
$logistics_meta_box = logistics_post_meta();
$container = 'container-fluid';
if (!empty($logistics_meta_box['header_width'])) {
    if ($logistics_meta_box['header_width'] == 'off') {
        $container = 'container';
    }
} else {
    if (isset($logistics_data['header_01_wide_boxed']) && !$logistics_data['header_01_wide_boxed']) {
        $container = 'container';
    }
}
$transparent = '';
if (!empty($logistics_meta_box['header_transparent'])) {
    if ($logistics_meta_box['header_transparent'] == 'on') {
        $transparent = 'header-transparent';
    }
} else {
    if (isset($logistics_data['header_01_transparent']) && $logistics_data['header_01_transparent']) {
        $transparent = 'header-transparent';
    }
}
$logo_position = 'left';
if(!empty($logistics_data['header_01_logo_position']) && $logistics_data['header_01_logo_position'] == 'right'){
    $logo_position = 'right';
}
$logo = get_template_directory_uri() . '/assets/logo.png';
if (!empty($logistics_meta_box['header_logo'])) {
    $logo = $logistics_meta_box['header_logo'];
} else {
    if (!empty($logistics_data['header_01_main_logo']['url']))
        $logo = $logistics_data['header_01_main_logo']['url'];
}
?>


<?php
    // Header Top
    $header_top = '';
    if(!empty($logistics_meta_box['header_top'])){
        if($logistics_meta_box['header_top']=='on'){
            get_template_part('inc/header/header', 'top');
            $header_top = 'has-header-top';
        }
    }else{
        if(!empty($logistics_data['header_01_top'])){
            get_template_part('inc/header/header', 'top');
            $header_top = 'has-header-top';
        }
    }
    $header_sticky = '';
    if(!empty($logistics_meta_box['header_sticky'])){
        if($logistics_meta_box['header_sticky']=='on'){
            $header_sticky = ' header-sticky';
        }
    }else{
        if(!empty($logistics_data['header_01_sticky'])){
            $header_top = ' header-sticky';
        }
    }
    if(!$logistics_data['menu_sticky_mobile']){
        $header_sticky .= ' unsticky-mobile';
    }
?>
<!-- Header -->
<div id="zo-header" class="zo-main-header header-style-01 <?php echo esc_attr($transparent) . ' ' . esc_attr($header_top);?><?php echo esc_attr($header_sticky);?>">
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row zo-header-main">
        <?php if($logo_position=='left') { ?>
            <div id="zo-header-logo" class="zo-header-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="zo-main-logo" alt="" src="<?php echo esc_url($logo); ?>">
                    <?php echo logistics_logo_phone(); ?>
                    <?php echo logistics_page_header_sticky_logo(); ?>
                </a>
            </div>
            <?php }?>
        <div class="zo-header-secondary">
        <?php if (is_active_sidebar('navigation-right-sidebar')): ?>
        <div class="zo-header-navigation-left">
            <?php endif; ?>
            <div class="zo-header-navigation">
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    $attr = array(
                        'menu' => logistics_menu_location(),
                        'items_wrap' => '<ul class="nav-menu menu-main-menu">%3$s</ul>',
                    );
                    $menu_locations = get_nav_menu_locations();
                    if (!empty($menu_locations['primary'])) {
                        $attr['theme_location'] = 'primary';
                    }
                    /* enable mega menu. */
                    if (class_exists('HeroMenuWalker')) {
                        $attr['walker'] = new HeroMenuWalker();
                    }
                    /* main nav. */
                    wp_nav_menu($attr);
                    ?>
                    <button type="button" class=" d_btn clnau d_seach_btn toggle_seach cspoint destop"><i class="fa fa-search"></i></button>
                </nav>
            </div>
            </div>
            <button type="button" class=" d_btn clnau d_seach_btn toggle_seach cspoint mobile"><i class="fa fa-search"></i></button>
            <div id="zo-menu-mobile" class="collapse navbar-collapse"><span></span></div>
        </div>
        <?php echo do_shortcode('[wcas-search-form]'); ?>
    </div>
</div>
<!-- Header-->
