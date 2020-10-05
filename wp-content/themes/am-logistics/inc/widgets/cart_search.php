<?php

class logistics_Widget_Cart_Search extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'widget_cart_search', // Base ID
            esc_html__('Zo Cart & Search', 'am-logistics'), // Name
            array('description' => esc_html__("Display the user's Cart and Search form in the sidebar.", 'am-logistics'),) // Args
        );
    }
    function widget($args, $instance) {
        extract(shortcode_atts($instance,$args));
        //if ( is_cart() || is_checkout() ) return;
        $title = apply_filters('widget_title', empty( $instance['title'] ) ?'' : $instance['title'], $instance, $this->id_base );
        $show_cart = isset($instance['show_cart']) ? $instance['show_cart'] : 0;
        $show_search = isset($instance['show_search']) ? $instance['show_search'] : 1;
        $hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
        ob_start();
		echo isset($before_widget)?$before_widget:'';
		$before_title = isset($before_title)?$before_title:'';
		$after_title = isset($after_title)?$after_title:'';
        if ( $title ) echo do_shortcode($before_title . $title . $after_title);
        $total = 0;
        global $woocommerce;
        ?>
        <div class="widget_cart_search_wrap">

			<?php if($woocommerce && $show_cart):?>
				<div class="widget_cart_search_wrap_item shopping_cart_dropdown_wrap">
                    <a href="javascript:void(0)" class="icon icon_cart_wrap" data-display=".shopping_cart_dropdown" data-no_display=".widget_searchform_content">
                        <i class="fa fa-shopping-cart cart-icon"></i>
                        <span class="cart_total"><?php echo do_shortcode($woocommerce?' '.$woocommerce->cart->get_cart_contents_count():'');?></span>
                    </a>
                    <div class="shopping_cart_dropdown">
                        <div class="shopping_cart_dropdown_inner">
                            <?php
                            $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
                            ?>
                            <ul class="cart_list product_list_widget">

                                <?php if ( !$cart_is_empty ) : ?>

                                    <?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

                                        $_product = $cart_item['data'];

                                        // Only display if allowed
                                        if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
                                            continue;
                                        }

                                        // Get price
                                        $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_excluding_tax($_product);

                                        $product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
                                        $remove_link = '<a href="' . esc_url($woocommerce->cart->get_remove_url($cart_item_key)) . '"> &times; </a>';
                                        ?>

                                        <li class="cart-list clearfix">
                                            <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
                                                <?php echo do_shortcode($_product->get_image()); ?>
                                            </a>
                                            <div class="cart-list-info">
                                                <h3 class="title"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></h3>
                                                <?php echo do_shortcode($product_price); ?>
                                                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( 'QTY: %s %s', $cart_item['quantity'], $remove_link) . '</span>', $cart_item, $cart_item_key ); ?>
                                            </div>
                                        </li>

                                    <?php endforeach; ?>

                                <?php else : ?>

                                    <li class="cart-list clearfix empty"><?php esc_html_e( 'No products in the cart.', 'am-logistics' ); ?></li>

                                <?php endif; ?>

                            </ul>

                            <?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
                                <div class="cart-total">
                                    <span class="total"><?php esc_html_e( 'Sub Total', 'am-logistics' ); ?>:<span><?php echo do_shortcode($woocommerce->cart->get_cart_subtotal()); ?></span></span>
                                    <a href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" class="btn btn-primary btn-checkout"><?php esc_html_e( 'Process To Checkout', 'am-logistics'); ?></a>
                                    <a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="btn btn-cart"><?php esc_html_e( 'View Shopping Cart', 'am-logistics'); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div><!--end shopping_cart_dropdown-->
				</div><!-- end shopping_cart_dropdown_wrap-->
            <?php endif;?>

			<?php if($show_search):?>
				<div class="widget_cart_search_wrap_item widget_searchform_content_wrap">
                    <a href="javascript:void(0)" class="icon icon_search_wrap" data-display=".widget_searchform_content" data-no_display=".shopping_cart_dropdown"><i class="fa fa-search search-icon"></i></a>
                    <div class="widget_searchform_content">
                        <form method="get" action="<?php echo esc_url( home_url( '/'  ) );?>">
                            <input type="text" value="<?php echo get_search_query();?>" name="s" placeholder="<?php esc_html_e( 'Search...', 'am-logistics' );?>" />
                            <input type="submit" value="<?php esc_html_e( 'Search', 'am-logistics' );?>" />
                            <?php if($woocommerce):?>
                                <?php if(is_woocommerce()):?>
                                    <input type="hidden" name="post_type" value="product" />
                                <?php endif;?>
                            <?php endif;?>
                        </form>
                    </div>
				</div><!-- end widget_searchform_content_wrap -->
            <?php endif;?>
        </div>
		<?php
        echo isset($after_widget)?$after_widget:'';
        echo ob_get_clean();
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['show_cart'] = $new_instance['show_cart'];
        $instance['show_search'] = $new_instance['show_search'];
		return $instance;
    }
    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $show_cart = isset($instance['show_cart']) ? $instance['show_cart'] : 0;
        $show_search = isset($instance['show_search']) ? $instance['show_search'] : 1;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'am-logistics' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_url($this->get_field_id('show_cart')); ?>"><?php esc_html_e( 'Show Cart:', 'am-logistics' ); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('show_cart')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('show_cart')); ?>">
				<option value="0" <?php selected($show_cart,0); ?>><?php echo esc_html__('No','am-logistics'); ?></option>
				<option value="1" <?php selected($show_cart,1); ?>><?php echo esc_html__('Yes','am-logistics'); ?></option>
			</select>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('show_search')); ?>"><?php esc_html_e( 'Show Search:', 'am-logistics' ); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('show_search')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('show_search')); ?>">
				<option value="0" <?php selected($show_search,0); ?>><?php echo esc_html__('No','am-logistics'); ?></option>
				<option value="1" <?php selected($show_search,1); ?>><?php echo esc_html__('Yes','am-logistics'); ?></option>
			</select>
        </p>
    <?php

    }
}

function logistics_register_cart_search_widget() {
    register_widget('logistics_Widget_Cart_Search');
}
add_action('widgets_init', 'logistics_register_cart_search_widget');


add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_content');
if(!function_exists('woocommerce_header_add_to_cart_fragment')){
    function woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        ob_start();
        ?>
        <span class="cart_total"><?php echo do_shortcode($woocommerce->cart->cart_contents_count); ?></span>
        <?php
        $fragments['span.cart_total'] = ob_get_clean();
        return $fragments;
    }
}
if(!function_exists('woocommerce_header_add_to_cart_content')){
    function woocommerce_header_add_to_cart_content( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <div class="shopping_cart_dropdown">
        <div class="shopping_cart_dropdown_inner">
            <?php
            $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
            ?>
            <ul class="cart_list product_list_widget">

                <?php if ( !$cart_is_empty ) : ?>

                    <?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

                        $_product = $cart_item['data'];

                        // Only display if allowed
                        if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
                            continue;
                        }

                        // Get price
                        $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_excluding_tax($_product);

                        $product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
                        $remove_link = '<a href="' . esc_url($woocommerce->cart->get_remove_url($cart_item_key)) . '"> &times; </a>';
                        ?>

                        <li class="cart-list clearfix">
                            <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
                                <?php echo do_shortcode($_product->get_image()); ?>
                            </a>
                            <div class="cart-list-info">
                                <h3 class="title"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></h3>
                                <?php echo do_shortcode($product_price); ?>
                                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( 'QTY: %s %s', $cart_item['quantity'], $remove_link) . '</span>', $cart_item, $cart_item_key ); ?>
                            </div>
                        </li>

                    <?php endforeach; ?>

                <?php else : ?>

                    <li class="cart-list clearfix empty"><?php esc_html_e( 'No products in the cart.', 'am-logistics' ); ?></li>

                <?php endif; ?>

            </ul>
            <?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
                <div class="cart-total">
                    <span class="total"><?php esc_html_e( 'Sub Total', 'am-logistics' ); ?>:<span><?php echo do_shortcode($woocommerce->cart->get_cart_subtotal()); ?></span></span>
                    <a href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" class="btn btn-primary btn-checkout"><?php esc_html_e( 'Process To Checkout', 'am-logistics'); ?></a>
                    <a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="btn btn-cart"><?php esc_html_e( 'View Shopping Cart', 'am-logistics'); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    $fragments['div.shopping_cart_dropdown'] = ob_get_clean();
    return $fragments;
}
}
?>
