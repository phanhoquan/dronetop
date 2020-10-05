<?php
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );

function woo_archive_custom_cart_button_text() {
    return esc_html__( 'Add to cart', 'am-logistics' );
}
