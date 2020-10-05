<?php
global $logistics_data;
$logistics_meta_box = logistics_post_meta();
$container='container';
if(!empty($logistics_meta_box['footer_width'])){
    if ($logistics_meta_box['footer_width'] == 'on') {
        $container = 'container-fluid';
    }
}else{
    if(isset($logistics_data['footer_width']) && $logistics_data['footer_width']){
        $container='container-fluid';
    }
}
if(!empty($logistics_meta_box['footer_widget'])){
    if ($logistics_meta_box['footer_widget'] == 'on') {
        $logistics_data['footer_widgets'] = 1;
    } else {
        $logistics_data['footer_widgets'] = 0;
    }
}

if(!empty($logistics_meta_box['footer_copyright'])){
    if ($logistics_meta_box['footer_copyright'] == 'on') {
        $logistics_data['footer_copyright'] = 1;
    } else {
        $logistics_data['footer_copyright'] = 0;
    }
}
$columns = (int) $logistics_data['footer_column'];
$has_sidebar = 0;
for($i=1; $i< $columns+1 ; $i++){
    if (is_active_sidebar('footer-sidebar-' . $i)){
        $has_sidebar=1;
        break;
    }
}
$ft_cp_transparent = 'ft-cp-no-transparent';
if (!empty($logistics_data['footer_widgets']) && $logistics_data['footer_widgets'] && $has_sidebar){
	$ft_cp_transparent = '';
}
?>
<?php if (!empty($logistics_data['footer_widgets']) && $logistics_data['footer_widgets'] && $has_sidebar){ ?>
<div id="zo-footer" class="zo-footer">
    <div class="<?php echo esc_attr($container);?>">
        <footer id="zo-footer-content">
            <?php
                if($columns==1){
                    $small_column = 12;
                }else{
                    $small_column = 6;
                }
            ?>
            <div class="zo-footer-columns zo-footer-columns-<?php echo esc_attr($columns); ?> zo-footer-widget-area row">
                <?php for($i=1; $i<7; $i++) :
                    if($i <= $columns){
                        $medium_size = $logistics_data['footer_column_' . $i];
                        ?>
                        <div class="zo-footer-column<?php echo ( $i == $columns ) ? ' zo-footer-column-last' : ''; ?> col-lg-<?php echo esc_attr($medium_size); ?> col-md-<?php echo esc_attr($medium_size); ?> col-sm-<?php echo esc_attr($small_column);?>">
                        <?php if (is_active_sidebar('footer-sidebar-' . $i)) dynamic_sidebar('footer-sidebar-' . $i); ?>
                        </div>
                <?php } endfor; ?>
			</div>
        </footer>
    </div>
</div>
<?php } ?>
<?php if(!empty($logistics_data['footer_copyright'])) {?>
<div id="zo-footer-copyright" class="zo-footer-copyright <?php echo esc_attr($ft_cp_transparent); ?>">
	<div class="<?php echo esc_attr($container);?>">
		<footer>
			<?php if(!empty($logistics_data['footer_copyright_extra'])){
				if(!empty($logistics_data['footer_copyright_alignment']) && !empty($logistics_data['footer_copyright_extra_position']) && $logistics_data['footer_copyright_alignment']!='right' && $logistics_data['footer_copyright_extra_position']!='above'){?>
					<div class="zo-footer-copyright-notice">
						<div><?php if(!empty($logistics_data['footer_copyright_text'])) echo html_entity_decode( $logistics_data['footer_copyright_text'] ); ?></div>
					</div>
					<div class="zo-copyright-secondary">
						<?php
							if(!empty($logistics_data['footer_copyright_extra'])){
								if($logistics_data['footer_copyright_extra']==1) {
									echo logistics_footer_social();
								}else{
									if (is_active_sidebar('copyright-extra')) dynamic_sidebar('copyright-extra');
								}
							}
						?>
					</div>
				<?php }else{ ?>
					<div class="zo-copyright-secondary">
						<?php
							if(!empty($logistics_data['footer_copyright_extra'])){
								if($logistics_data['footer_copyright_extra']==1) {
									echo logistics_footer_social();
								}else{
									if (is_active_sidebar('copyright-extra')) dynamic_sidebar('copyright-extra');
								}
							}
						?>
					</div>
					<div class="zo-footer-copyright-notice">
						<div><?php if(!empty($logistics_data['footer_copyright_text'])) echo html_entity_decode( $logistics_data['footer_copyright_text'] ); ?></div>
					</div>
				<?php } ?>
			<?php }else{?>
			<div class="zo-footer-copyright-notice">
				<div><?php if(!empty($logistics_data['footer_copyright_text'])) echo html_entity_decode( $logistics_data['footer_copyright_text'] ); ?></div>
			</div>
			<?php } ?>
		</footer>
	</div>
</div>
<?php } ?>