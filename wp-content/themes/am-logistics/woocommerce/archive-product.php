<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
global $product, $wp_query;
$container = 'container';
if(!empty($logistics_data['woo_width'])){
    $container = 'container-fluid';
}
$sidebar = 'none';
if(!empty($logistics_data['woo_sidebar'])){
    $sidebar = $logistics_data['woo_sidebar'];
}
$sidebar_size = 3;
if(!empty($logistics_data['woo_sidebar_size'])){
    $sidebar_size = $logistics_data['woo_sidebar_size'];
}
$sidebar_type = 'main';
if(!empty($logistics_data['woo_sidebar_type'])){
    $sidebar_type = $logistics_data['woo_sidebar_type'];
}
$content_size = 12;
if($sidebar != 'none'){
    $content_size = 12 - (int)$sidebar_size;
};
$product_cate="";
if($wp_query){
	$product_cate= $wp_query->query_vars['term'];
}
$content_class = 'col-xs-12 col-sm-' . $content_size . ' col-md-' . $content_size . ' col-lg-' . $content_size;
$sidebar_class = 'col-xs-12 col-sm-' . $sidebar_size . ' col-md-' . $sidebar_size . ' col-lg-' . $sidebar_size;
get_header( 'shop' ); ?>
<div class="<?php echo esc_attr($container);?>">
    <div class="row">
        <?php if($sidebar == 'left') { ?>
            <div class="sidebar-area <?php echo esc_attr($sidebar_class);?>">
                <?php
										if($sidebar_type == 'main'){
											if(is_active_sidebar('sidebar-1')) dynamic_sidebar('sidebar-1');
										}else{
											if(is_active_sidebar('shop-sidebar')) dynamic_sidebar('shop-sidebar');
										}
									?>
            </div>
        	<?php } ?>

      <div class="main-content <?php echo esc_attr($content_class);?>">
				<?php if ( have_posts() ) : ?>

				<div class="col-sm-12">
					<div class="header-title-product">
						<h3>
							<?php 
							if($product_cate){
								echo str_replace("-"," ",$product_cate);
							}else{
								esc_html_e('List all products', 'am-logistics');
							}
							?>
						</h3>
					</div>
				</div>

				<?php if(!empty($logistics_data['woo_sorting'])){ ?>
					<div class="col-sm-12 woo_sorting">
						<?php do_action( 'woocommerce_before_shop_loop' ); ?>
					</div>
				<?php } ?>

					<?php woocommerce_product_loop_start(); ?>
					<?php woocommerce_product_subcategories(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php wc_get_template_part( 'content', 'product' ); ?>
						<?php endwhile; // end of the loop. ?>
					<?php woocommerce_product_loop_end(); ?>
					<?php echo logistics_paging_nav($wp_query)?>
				<div class="col-sm-12 laster-new-wraps">
						<div class="header-title-product top-0">
							<h3><?php esc_html_e('List news', 'am-logistics'); ?></h3>
						</div>
					<?php echo do_shortcode('[laster_news]'); ?>
				</div>

				<div class="col-sm-12">
						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
							<?php wc_get_template( 'loop/no-products-found.php' ); ?>
						<?php endif; ?>
        </div>

        <?php if($sidebar == 'right'){ ?>
            <div class="sidebar-area <?php echo esc_attr($sidebar_class);?>">
                <?php
					if($sidebar_type == 'main'){
						if(is_active_sidebar('sidebar-1')) dynamic_sidebar('sidebar-1');
					}else{
						if(is_active_sidebar('shop-sidebar')) dynamic_sidebar('shop-sidebar');
					}
				?>
      </div>
      <?php } ?>
				<?php do_action( 'woocommerce_after_main_content' ); ?>
    </div>
</div>

<?php get_footer( 'shop' ); ?>
