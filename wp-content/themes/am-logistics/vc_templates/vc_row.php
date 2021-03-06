<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $parallax_speed_bg
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $parallax_speed_bg = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $overlay_row = '';
$output = $after_output = $css_animation = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
    $css_classes[] = 'vc_row-fluid';
	if ( 'stretch_row_content' === $full_width ) {
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$css_classes[] = 'vc_row-no-padding';
	}
    $after_output .= '<div class="vc_row-full-width"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = ' vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = ' vc_row-o-columns-' . $columns_placement;
	}
}

$css_row_flex = array();
if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_row_flex[] = ' vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_row_flex[] = ' vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_row_flex[] = ' vc_row-flex';
}

/**
 * Video Background
 */
$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = ' vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty ( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$stylesheet = array();

/**
 * Animation
 */
if ($animation) {
    wp_enqueue_script( 'waypoints');
	$stylesheet[] = 'animation-delay:'.$animation_delay.';-webkit-animation-delay:'.$animation_delay.';-o-animation-delay:'.$animation_delay.';';
	$wrapper_attributes[] = 'data-zo-animation="'.$animation.'"';
	$css_classes[] = 'zo-animation';
}

/**
 * Background Overlay
 */
$html_overlay_row = '';
if($overlay_row == 'yes') {
    $html_overlay_row .= '<div class="zo-overlay-color" style="background-color: '.$row_overlay_color.'; "></div>';
	$css_classes[] = 'row-overlay-color';
}
if(!empty($atts['row_margin'])){
	$css_classes[] = $atts['row_margin'];
}
if(!empty($atts['row_padding'])){
	$css_classes[] = $atts['row_padding'];
}
if(!empty($background_position)) {
	$stylesheet[] = "background-position: {$background_position} !important;";
}
if(!empty($background_attachment)) {
	$stylesheet[] = "background-attachment: {$background_attachment} !important;";
}
/**
 * Get css classes
 */
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' style="'. implode('', $stylesheet) .'">';
$output .= $html_overlay_row;
if ( empty( $full_width ) ) {
	$output .= '<div class="container">';
} else {
	$output .= '<div class="container-fluid">';
}
$output .= '<div class="row vc_row '. implode(' ', $css_row_flex) .'">';

$output .= wpb_js_remove_wpautop( $content );

$output .= '</div></div>';
$output .= '</div>';
$output .= $after_output;

echo do_shortcode($output);
