<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $logistics_data;

$product_row = 4;
if(!empty($logistics_data['woo_product_row'])){
    $product_row = 12/(int)$logistics_data['woo_product_row'];
}
$col_css = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$terms = get_the_terms( $product->get_id(), 'product_cat' );
$link_product_cart = rwmb_meta('link_product_cart');
if(!empty($link_product_cart)){
    $link_product_cart_detail=$link_product_cart;
}else{
    $link_product_cart_detail="#";
}
?>
<div class="zo-product-item <?php echo esc_attr($col_css);?>">
    <div <?php post_class(); ?>>
        <div class="zo-product-image">
            <a href="<?php the_permalink(); ?>" title="<?php esc_html_e('View detail', 'am-logistics'); ?>">
               <?php
                woocommerce_show_product_loop_sale_flash();
                $image_resize = '';
                if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                    $attachment_full_image = $attachment_image[0];
                    if( function_exists('zo_image_resize') ) {
                        $image_resize = zo_image_resize($attachment_full_image, 240, 180, true);
                    } else {
                        $image_resize = $attachment_full_image;
                    }
                endif;
				?>
				<img src="<?php echo $image_resize; ?>" alt="<?php the_title(); ?>">
            </a>
        </div>
        <div class="list-category">
       <?php 
            foreach ($terms as $term) {
                $category_link = sprintf( 
                    '<a href="%1$s" alt="%2$s">%3$s</a>',
                    esc_url( get_category_link( $term->term_id ) ),
                    esc_attr( sprintf( __( 'View all posts in %s', 'am-logistics' ), $term->name ) ),
                    esc_html( $term->name )
                );
                echo sprintf( esc_html__( '%s', 'am-logistics' ), $category_link );
            }
        ?>
        </div>
        <h3 class="product-title">
            <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
            <?php echo do_shortcode($product->get_title()); ?>
         </a>
        </h3>
        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
         <div class="zo-product-overlays">
         <a rel="nofollow" href="<?php echo $link_product_cart_detail;?>"  target="_blank" class="button product_type_simple add_to_cart_button"><?php esc_html_e('Add to cart', 'am-logistics'); ?></a>
            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            <button class="quick-view" tabindex="-1">
            <a class="quick-view" href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>"><i class="fa fa-eye"></i></a>
             <span class="tooltipp"><?php echo logistics_get_count_view(); ?><?php esc_html_e(' View', 'am-logistics'); ?></span>
            </button>
        </div>
    </div>
</div>
