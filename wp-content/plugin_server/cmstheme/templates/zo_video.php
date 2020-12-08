<div class="zo-video-play-wrapper" id="<?php echo esc_attr($atts['html_id']); ?>">
	<?php if( empty($atts['video']['type']) ) : ?>
		<img src="<?php echo esc_url( $atts['thumbnail_url'] ); ?>" alt="" />
	<?php else : ?>
	<a class="play-button" href="#" title="Click to Play Video"
		data-player="<?php echo esc_attr($atts['html_id']); ?>-player"
		data-type="<?php echo $atts['video']['type']; ?>">
		<img src="<?php echo esc_url( $atts['thumbnail_url'] ); ?>" alt="" />
		<div class="zo-video-content">
			<?php do_shortcode($content); ?>
		</div>
	</a>
	<div class="video-player">
		<?php echo $atts['video']['url']; ?>
	</div>
	<?php endif; ?>
</div>