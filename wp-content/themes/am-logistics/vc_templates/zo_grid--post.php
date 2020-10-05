<?php
    /* get categories */
    $gap=0;
    if(isset($atts['item_gap']) && is_numeric($atts['item_gap'])){
	   $gap = (int) $atts['item_gap'];
    }
	$gap_left_right = $gap / 2;
	$item_style = '';
	$item_style .= 'padding-left: '. esc_attr($gap_left_right) .'px;';
	$item_style .= 'padding-right: '. esc_attr($gap_left_right) .'px;';
	$item_style .= 'margin-bottom: '. esc_attr($gap) .'px;';
?>
<div class="zo-grid-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
			$team_meta = logistics_post_meta();
            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" style="<?php echo esc_attr($item_style);?>">
				<div class="zo-grid-team">
					<div class="zo-grid-team-image">
                        <?php
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                        $attachment_full_image = $attachment_image[0];
                        $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                        echo '<a href="'. esc_url($image_resize) .'" title="' . get_the_title() . '">';
                        if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
							if($atts['image_size']=='custom'){
                                echo '<img src="'. esc_url($image_resize) .'" alt="' . get_the_title() . '"/>';
							}else{
								the_post_thumbnail($atts['image_size']);
                            }
                        echo '</a>';
                        else:
                            echo '<a href="'. esc_url(ZO_IMAGES . 'no-image.jpg') .'" alt="' . get_the_title() . '" >';
                            echo '<img src="'. esc_url(ZO_IMAGES . 'no-image.jpg') .'" alt="' . get_the_title() . '" />';
                            echo '</a>';
                        endif;
                    
                        $gallery = get_post_meta(get_the_ID(), 'gallery2', false);
							if(!empty($gallery)){
						?>
                            <?php
                                $i = 0;
                                foreach($gallery as $gallery_item){
                                    $attachment_image = wp_get_attachment_image_src( $gallery_item, 'full', false );
                                    $attachment_full_image = $attachment_image[ 0 ];
                                    $image_resize = zo_image_resize( $attachment_full_image, 540, 420, true );
                                    echo '<a class="d-none" href="'. esc_url($image_resize) .'" alt="' . get_the_title() . '">';
                                    echo '<img src="'. esc_attr($image_resize) .'" alt="' . get_the_title() . '">';
                                    echo"</a>";
                                ?>
                                <?php
                                    $i++;
                                }
                            ?>
                        <?php } ?>
					</div>
                    <div class="zo-team-overlay">
                        <?php echo '<' . $atts['title_element'] . ' class = "zo-grid-title" >';
                          the_title();
                        echo '</' . $atts['title_element'] . '>';?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

	<?php if(isset($atts['pagination']) && $atts['pagination']) {?>
		<nav class="navigation paging-navigation clearfix">
				<div class="pagination loop-pagination">
					<?php print($atts['pagination']); ?>
				</div><!-- .pagination -->
		</nav><!-- .navigation -->
	<?php }?>

    <?php
    wp_reset_postdata();
    ?>
</div>
