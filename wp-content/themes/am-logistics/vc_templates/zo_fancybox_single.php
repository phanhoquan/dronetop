<?php
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $icon_css = '';
    $icon_css.= 'text-align: ' . $atts['icon_align'] . ';';
    if(!empty($atts['icon_font_size']) && is_numeric($atts['icon_font_size'])){
        $icon_css.= 'font-size:' . $atts['icon_font_size'] . 'px;';
    }
    /* Custom style title */
    $title_css = '';
    $title_css.= 'text-align: ' . $atts['title_align'] . ';';
    /* Content style title */
    $content_css = '';
    $content_css.= 'text-align: ' . $atts['content_align'] . ';';
    /* Custom style link */
    $link_css = '';
    if($atts['link_content']=='yes'){
        $link_css. 'text-align: ' . $atts['title_align'] . ';';
    }
    $style = '';
    if(!empty($atts['fancybox_style'])){
        $style = esc_attr($atts['fancybox_style']);
    }
    $link_tag = '';
    $read_more = '';
    if ( !empty($atts['link']) && preg_match('/url/',$atts['link'])) {
        $link = zo_build_link( $atts['link'] );
        $link_tag = '<a href="' . esc_url( $link['url'] ) . '"'
        . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
        . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' );
        if(!empty($atts['link_class'])){
            $read_more = $link_tag . ' class="' . $atts['link_class'] . '">' . esc_attr( $link['title'] ) .'</a>';
        }else{
            $read_more = $link_tag . '>' . esc_attr( $link['title'] ) .'</a>';
        }
        $link_tag.= '>';
    }
?>
<div class="zo-fancyboxes-wraper <?php echo esc_attr($atts['template']) . ' ' . $style ; ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-fancybox-item">
        <?php if($atts['icon_type']=='upload' && !empty($atts['image'])){
            echo '<div class="zo-fancybox-icon" style="'. $icon_css .'">';
            if ($atts['link_icon']=='yes' && !empty($link_tag)){
                echo balanceTags($link_tag);
            }
            if($atts['image_size']=='custom'){
                $attachment_image = wp_get_attachment_image_src($atts['image'], 'full', false);
                $attachment_full_image = $attachment_image[0];
                $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                echo '<img src="'. esc_url($image_resize) .'" alt="' . $atts['title_item'] . '">';
            }else{
                $attachment_image = wp_get_attachment_image_src($atts['image'], $atts['image_size']);
                $image_url = $attachment_image[0];
                echo '<img src="'. esc_url($image_url) .'" alt="' . $atts['title_item'] . '">';
            }
            if ($atts['link_icon']=='yes' && !empty($link_tag)){
                echo '</a>';
            }
            echo '</div>';
        ?>
        <?php } elseif(!empty($iconClass)){ ?>
            <div class="zo-fancybox-icon" style="<?php echo esc_attr($icon_css);?>">
                <?php
                    if ($atts['link_icon']=='yes' && !empty($link_tag)){
                        echo balanceTags($link_tag);
                    }
                ?>
                <i class="<?php echo esc_attr($iconClass);?>"></i>
                <?php
                    if ($atts['link_icon']=='yes' && !empty($link_tag)){
                        echo '</a>';
                    }
                ?>
            </div>
        <?php }?>
        <div class="zo-fancybox-body">
            <?php if($atts['title_item']):
                echo '<' . esc_attr($atts['title_element']) . ' class = "zo-fancybox-title" style="'. esc_attr($title_css) .'">';
                if($atts['link_title']=='yes' && !empty($link_tag)){
                    echo balanceTags($link_tag);
                    echo esc_attr($atts['title_item']) . '</a>';
                    echo '</' . esc_attr($atts['title_element']) .'>';
                }else{
                    echo esc_attr($atts['title_item']);
                    echo '</' . esc_attr($atts['title_element']) .'>';
                }?>
            <?php endif;?>
            <?php if($atts['content_item']):?>
                <div class="zo-fancybox-content" style="<?php echo esc_attr($content_css);?>">
                    <?php
                        echo do_shortcode($atts['content_item']);
                    ?>
                    <?php
                        if($atts['link_content']=='yes' && !empty($link_tag)){
                            echo '<div class="zo-fancybox-link">';
                            echo balanceTags($read_more);
                            echo '</div>';
                        }
                    ?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
