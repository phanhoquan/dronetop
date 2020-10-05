<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $logistics_data;

$container = 'container';
if(!empty($logistics_data['woo_single_width'])){
    $container = 'container-fluid';
}
$sidebar = 'none';
if(!empty($logistics_data['woo_single_sidebar'])){
    $sidebar = $logistics_data['woo_single_sidebar'];
}
$sidebar_size = 3;
if(!empty($logistics_data['woo_single_sidebar_size'])){
    $sidebar_size = $logistics_data['woo_single_sidebar_size'];
}
$sidebar_type = 'main';
if(!empty($logistics_data['woo_single_sidebar_type'])){
    $sidebar_type = $logistics_data['woo_single_sidebar_type'];
}
$content_size = 12;
if($sidebar != 'none'){
    $content_size = 12 - (int)$sidebar_size;
}
$content_class = 'col-xs-12 col-sm-12 col-md-' . $content_size . ' col-lg-' . $content_size;
$sidebar_class = 'col-xs-12 col-sm-12 col-md-' . $sidebar_size . ' col-lg-' . $sidebar_size;

get_header( 'shop' ); ?>
<div class="<?php echo esc_attr($container);?>">
    <div class="row single-product">
        <?php if($sidebar == 'left'){?>
            <div class="<?php echo esc_attr($sidebar_class);?>">
                <?php if($sidebar_type == 'main'){
                    if(is_active_sidebar('sidebar-1')){
                        dynamic_sidebar('sidebar-1');
                    }
                }else{
                    if(is_active_sidebar('shop-sidebar')){
                        dynamic_sidebar('shop-sidebar');
                    }
                }?>
            </div>
        <?php }?>
       
        <div class="main-single-content <?php echo esc_attr($content_class);?>">
            <?php while ( have_posts() ) : the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <?php if($sidebar == 'right'){?>
            <div class="<?php echo esc_attr($sidebar_class);?>">
                <?php 
                    if(is_active_sidebar('sidebar-1')){
                        dynamic_sidebar('sidebar-1');
                    }
                    ?>
            </div>
        <?php }?>
    </div>
</div>

<?php get_footer( 'shop' ); ?>
