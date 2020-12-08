<?php
/**
 * Compare related products template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Compare
 * @version 1.0.0
 */

global $product;
$terms = get_the_terms( $product->get_id(), 'product_cat' );

$css_class_for_related_products_wrapper = apply_filters( 'yith_woocompare_css_class_for_related_products_wrapper','related-products' );
?>
<div id="yith-woocompare-related" class="woocommerce yith-woocompare-related" data-iframe="<?php echo esc_attr( $iframe ) ?>">
	<h3 class="yith-woocompare-related-title"><?php echo esc_html( $related_title ) ?></h3>
	<div class="yith-woocompare-related-wrapper">
		<ul class="<?php echo $css_class_for_related_products_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
			<?php foreach( $products as $product_id ) : $product = wc_get_product( $product_id ); ?>
				<li class="ralated-product">
					<?php
					do_action( 'yith_woocompare_before_single_related_product' );
					?>
						<a href="<?php echo esc_url( $product->get_permalink() ); ?>" target="_blank">
							<div class="product-image">
								<?php
								wc_get_template( 'loop/sale-flash.php' );
								echo $product->get_image('shop_catalog'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>
							</div>
						</a>
						<div class="list-category">
							<?php 
									foreach ($terms as $term) {
											$category_link = sprintf( 
													'<a href="%1$s" alt="%2$s" target="_blank">%3$s</a>',
													esc_url( get_category_link( $term->term_id ) ),
													esc_attr( sprintf( __( 'View all posts in %s', 'am-logistics' ), $term->name ) ),
													esc_html( $term->name )
											);
											echo sprintf( esc_html__( '%s', 'am-logistics' ), $category_link );
									}
							?>
						</div>
						<h3 class="product-title">
							<a href="<?php echo esc_url( $product->get_permalink() ); ?>" target="_blank">
								<?php echo esc_html( $product->get_title() ); ?>
							</a>
						</h3>
						<div class="product-price">
							<?php echo wp_kses_post( $product->get_price_html() ); ?>
						</div>
					<!-- <div class="woocommerce add-to-cart">
						<?php //woocommerce_template_loop_add_to_cart(); ?>
					</div> -->

					<?php 
						$button_text = $product->add_to_cart_text();
						$link_product_cart = $product->add_to_cart_url();
						if(!empty($link_product_cart)){
								$link_product_cart_detail=$link_product_cart;
								$text_Button_text=$button_text;
						}else if("Add to cart"===$button_text){
								$text_Button_text="Go To Shop";
						}else{
								$link_product_cart_detail="#";
								$text_Button_text="Go To Shop";
						}
					?>
					<?php
					do_action( 'yith_woocompare_after_single_related_product' );
					?>
						<?php
							$rating = function_exists( 'wc_get_rating_html' ) ? wc_get_rating_html( $product->get_average_rating() ) : $product->get_rating_html();
							echo $rating != '' ?wp_kses_post( $rating ): '';
						?>
					 <div class="zo-product-overlays">
							<a class="quick-view" target="_blank" href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>"><i class="fa fa-comment" aria-hidden="true"></i>
								<div class="tooltipp"><?php echo comments_number('0','1','%');?> <?php esc_html_e(' Comments', 'am-logistics'); ?></div>
							</a>
							<?php echo do_shortcode('[yith_compare_button product="' . $product_id .' type="button"]' ); ?> 
							<a rel="nofollow" target="_blank" href="<?php echo $link_product_cart_detail;?>" class="button product_type_simple add_to_cart_button"><?php echo $text_Button_text; ?></a>
							<button class="quick-view" tabindex="-1">
								<a class="quick-view" target="_blank" href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>"><i class="fa fa-eye"></i></a>
								<span class="tooltipp">
									<?php echo logistics_get_count_view(); ?><?php esc_html_e(' View', 'am-logistics'); ?>
								</span>
							</button>
        </div>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php if( count( $products ) >= get_option( 'yith-woocompare-related-visible-num', 4 ) && get_option( 'yith-woocompare-related-navigation', 'yes' ) == 'yes' ) : ?>
			<div class="related-slider-nav">
				<div class="related-slider-nav-prev"></div>
				<div class="related-slider-nav-next"></div>
			</div>
		<?php endif ?>

	</div>
</div>
