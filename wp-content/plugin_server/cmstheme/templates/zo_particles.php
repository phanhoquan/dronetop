<?php $class = '';
if(!empty($atts['class'])){
    $class = $atts['class'];
}
?>
<div
	class="zo-particles <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($class);?>"
	id="<?php echo esc_attr($atts['html_id']);?>" 
	style="height: <?php echo esc_attr($atts['height']);?><?php if(!empty($atts['unit_height'])) echo esc_attr($atts['unit_height']); else echo 'px';?>;">
</div>
