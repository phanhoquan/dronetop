<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 * @author ZoTheme
 */
get_header();

	$logistics_meta_box = logistics_post_meta();

	$container = 'container-fluid';
	if (!empty($logistics_meta_box['content_width'])) {
		$container = $logistics_meta_box['content_width'];
	}
	if (!class_exists('Vc_Manager')) {
		$container = 'container';
	}
	$page_id = get_the_ID();
	$marvis_cart_page = get_option( 'woocommerce_cart_page_id' );
	$marvis_checkout_page = get_option( 'woocommerce_checkout_page_id' );
	$marvis_pay_page = get_option( 'woocommerce_pay_page_id' );
	$marvis_thanks_page = get_option( 'woocommerce_thanks_page_id' );
	$marvis_myaccount_page = get_option( 'woocommerce_myaccount_page_id' );
	$marvis_address_page = get_option( 'woocommerce_edit_address_page_id' );
	$marvis_order_page = get_option( 'woocommerce_view_order_page_id' );
	$unit_test = logistics_data_theme_options('unit_test');
	if($page_id == $marvis_cart_page || $page_id == $marvis_checkout_page || $page_id == $marvis_pay_page || $page_id == $marvis_thanks_page || $page_id == $marvis_myaccount_page || $page_id == $marvis_address_page || $page_id == $marvis_order_page || $unit_test){
		$container = 'container';
	}

	$content_size = 12;
	$sidebar_size = 0;
	$sidebar = '';
	$had_sidebar ='';
	if(!empty($logistics_meta_box['content_sidebar'])){
		if($logistics_meta_box['content_sidebar']=='default'){
			$sidebar = 'none';
		}else{
			$sidebar = $logistics_meta_box['content_sidebar'];
			if(!empty($logistics_meta_box['content_sidebar_size'])){
				$sidebar_size = (int)$logistics_meta_box['content_sidebar_size'];
			}else{
				$sidebar_size = logistics_get_sidebar_width();
			}
		}
	}

	$main_content = '';
	if ($sidebar_size) {
		$content_size = 12 - (int)$sidebar_size;
		$main_content.= 'col-xs-12 col-sm-' . $content_size . ' col-md-' . $content_size . ' col-lg-' . $content_size;
		$had_sidebar = 'zo-content-sidebar';
	}

	if(!empty($logistics_meta_box['content_sidebar_style']) && $sidebar_size) {
?>
		<div class="zo-sidebar-background <?php echo 'zo-sidebar-' . esc_attr($sidebar) . '-' . esc_attr($sidebar_size) . ' ' .'zo-sidebar-' . esc_attr($sidebar) . ' zo-sidebar-' . esc_attr($container);?>">
<?php
	}
?>
	<div id="page-default" class="<?php echo esc_attr($container); ?>">
		<div id="primary">
			<div id="zo-content" class="<?php echo esc_attr($main_content) . ' ' . esc_attr($had_sidebar); ?>">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('single-templates/content', 'page'); ?>
					<?php //comments_template('', true); ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div>

<?php get_footer(); ?>
