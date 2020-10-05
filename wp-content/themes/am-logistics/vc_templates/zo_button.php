<?php
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $button = '';

    $btn_class = $atts['class'];
    $btn_align = 'text-align: ' . $atts['align'] . ';';
    $css_inline ='style="';
    if(!empty($atts['padding_top']) && is_numeric($atts['padding_top'])){
        $css_inline.= 'padding-top: ' . esc_attr($atts['padding_top']) . 'px;';
    }
    if(!empty($atts['padding_right']) && is_numeric($atts['padding_right'])){
        $css_inline.= 'padding-right: ' . esc_attr($atts['padding_right']) . 'px;';
    }
    if(!empty($atts['padding_bottom']) && is_numeric($atts['padding_bottom'])){
        $css_inline.= 'padding-bottom: ' . esc_attr($atts['padding_bottom']) . 'px;';
    }
    if(!empty($atts['padding_left']) && is_numeric($atts['padding_left'])){
        $css_inline.= 'padding-left: ' . esc_attr($atts['padding_left']) . 'px;';
    }
    if(!empty($atts['radius']) && is_numeric($atts['radius'])){
        $css_inline.= 'border-radius: ' . esc_attr($atts['radius']) . 'px;';
    }
    if(!empty($atts['font_weight'])){
        $css_inline.= 'font-weight: ' . esc_attr($atts['font_weight']) . ';';
    }

    $onmouseenter = '';
    $onmouseleave = '';
    if(!empty($atts['button_style']) && $atts['button_style']=='custom'){
        if(!empty($atts['bg_color'])){
            $onmouseleave.= 'this.style.backgroundColor=\'' . esc_attr($atts['bg_color']) . '\';';
            $css_inline.= 'background-color:' . esc_attr($atts['bg_color']) . ';';
        }else{
            $onmouseleave.= 'this.style.backgroundColor=\'transparent\';';
            $css_inline.= 'background-color: transparent;';
        }
        if(!empty($atts['text_color'])){
            $onmouseleave.= 'this.style.color=\'' . esc_attr($atts['text_color']) . '\';';
            $css_inline.= 'color:' . esc_attr($atts['text_color']) . ';';
        }
        if(!empty($atts['bg_hover_color'])){
            $onmouseenter.= 'this.style.backgroundColor=\'' . esc_attr($atts['bg_hover_color']) . '\';';
        }else{
            $onmouseenter.= 'this.style.backgroundColor=\'transparent\';';
        }
        if(!empty($atts['text_hover_color'])){
            $onmouseenter.= 'this.style.color=\'' . esc_attr($atts['text_hover_color']) . '\';';
        }
    }else{
        $btn_class.= ' ' . $atts['button_style'];
    }

    if(!empty($atts['stroke']) && is_numeric($atts['stroke'])){
        if(!empty($atts['stroke_color'])){
            $css_inline.= 'border-width:' . esc_attr($atts['stroke']) . 'px;';
            $css_inline.= 'border-color:' . esc_attr($atts['stroke_color']) . ';';
            $css_inline.= 'border-style: solid;';
            $onmouseleave.= 'this.style.borderColor=\'' . esc_attr($atts['stroke_color']) . '\';';
        }
        if(!empty($atts['stroke_hover_color'])){
            $onmouseenter.= 'this.style.borderColor=\'' . esc_attr($atts['stroke_hover_color']) . '\';';
        }
        $btn_class.= ' stroke-' . $atts['stroke'];
    }
    else{
        $css_inline.= 'border: unset;';
    }
    if(!empty($atts['button_size'])){
        $btn_class.= ' btn-' . $atts['button_size'];
    }

    $css_inline.='"';
?>
<div class="zo-button-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" style="<?php echo esc_attr($btn_align);?>">
    <?php
    if($atts['is_icon']=='yes'){
        if($atts['icon_align']=='left'){
            $atts['text'] = '<i class="' . esc_attr($iconClass) . '"></i>' . $atts['text'];
        }else{
            $atts['text'] .= '<i class="' . esc_attr($iconClass) . '"></i>';
        }
    }
    if ( !empty($atts['link']) && preg_match('/url/',$atts['link'])) {
        $link = zo_build_link( $atts['link'] );
        $button = '<a href="' . esc_url( $link['url'] ) . '"'
            . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
            . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
            . ' class="zo-button ' . $btn_class . '" ' . $css_inline
            . ' onmouseenter = "' . $onmouseenter . '"'
            . ' onmouseleave = "' . $onmouseleave . '"'
            . '>' . $atts['text'] . '</a>';
    }else{
        $button = '<button'
            . ' class="zo-button ' . $btn_class . '" ' . $css_inline
            . ' onmouseenter = "' . $onmouseenter . '"'
            . ' onmouseleave = "' . $onmouseleave . '"'
            . '>' . $atts['text'] . '</button>';
    }
    echo do_shortcode($button);
    ?>
</div>
