<?php
    $button = '';
    /* Custom style Heading */
    $zo_heading_main = '';
    $zo_heading_main.= 'text-align: ' . $atts['align'] . ';';
    if(!empty($atts['font_size']) && is_numeric($atts['font_size'])){
        $zo_heading_main.= 'font-size:' . $atts['font_size'] . 'px;';
    }
    if(!empty($atts['line_height']) && is_numeric($atts['line_height'])){
        $zo_heading_main.= 'line-height:' . $atts['line_height'] . 'px;';
    }
    if(!empty($atts['heading_color'])){
        $zo_heading_main.= 'color:' . $atts['heading_color'] . ';';
    }
    //Border color
    if(!empty($atts['heading_border_color']) && ($atts['heading_style'] == 'zo-heading-leadline' || $atts['heading_style'] == 'zo-heading-underline')){
        $zo_heading_main.= 'border-color:' . $atts['heading_border_color'] . ';';
    }
    if(!empty($atts['heading_style']) && $atts['heading_style'] == 'zo-heading-fill' && !empty($atts['heading_fill_color'])){
        $zo_heading_main.= 'background-color:' . $atts['heading_fill_color'] . ';';
    }
    //Add span
    if(!empty($atts['heading_highlight_border_color'])){
        $atts['text'] = '<span style="border-color:' . $atts['heading_highlight_border_color'] . ';">' . $atts['text'] . '</span>';
    }elseif(!empty($atts['heading_style']) && $atts['heading_style'] == 'zo-heading-fill-block' && !empty($atts['heading_fill_color'])){
        $atts['text'] = '<span style="background:' . $atts['heading_fill_color'] . ';">' . $atts['text'] . '</span>';
    }else{
        $atts['text'] = '<span>' . $atts['text'] . '</span>';
    }
    if(!empty($zo_heading_main)){
        $zo_heading_main = 'style="' . $zo_heading_main . '"';
    }
    /* Custom style sub heading */
    $zo_heading_sub = '';
    $zo_heading_sub.= 'text-align: ' . $atts['sub_align'] . ';';
    if(!empty($atts['sub_font_size']) && is_numeric($atts['sub_font_size'])){
        $zo_heading_sub.=  'font-size:' . $atts['sub_font_size'] . 'px;';
    }
    if(!empty($atts['sub_line_height']) && is_numeric($atts['sub_line_height'])){
        $zo_heading_sub.=  'line-height:' . $atts['sub_line_height'] . 'px;';
    }
    if(!empty($atts['sub_color'])){
        $zo_heading_sub.= 'color:' . $atts['sub_color'] . ';';
    }
    if(!empty($zo_heading_sub)){
        $zo_heading_sub = 'style="' . $zo_heading_sub . '"';
    }
    // Custom style button
    $zo_heading_button = 'style="text-align: ' . $atts['link_button_align'] . ';"';
    $heading_style = '';
    if(!empty($atts['heading_style'])){
        $heading_style = $atts['heading_style'];
    }

?>
<div class="zo-heading-wraper <?php echo esc_attr($atts['class']) . ' ' . esc_attr($atts['template']) . ' ' . esc_attr($heading_style);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
        if($atts['is_title'] && !empty($atts['title_number'])){
            $atts['text'] = '<span class = "zo-heading-title-number">' . $atts['title_number'] . '</span>' . $atts['text'];
        }
        if ( !empty($atts['link']) && preg_match('/url/',$atts['link'])) {
            $link = zo_build_link( $atts['link'] );
            if($atts['link_heading']=='yes'){
                $atts['text'] = '<a href="' . esc_url( $link['url'] ) . '"'
                    . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
                    . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
                    . '>' . $atts['text'] . '</a>';
            }
            if($atts['link_button']=='yes'){
                $button = '<a href="' . esc_url( $link['url'] ) . '"'
                    . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
                    . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
                    . ' class="' . $atts['link_button_class'] . '"'
                    . '>' . $link['title'] . '</a>';
            }
        }
        if($atts['is_sub']=='yes' && !empty($atts['sub_text'])){
            if($atts['sub_position']=='above'){
                echo '<' . $atts['sub_element'] . ' ' . $zo_heading_sub . ' class="zo-heading-sub">' . $atts['sub_text'] . '</' . $atts['sub_element'] . '>';
                echo '<' . $atts['element'] . ' ' . $zo_heading_main  . ' class="zo-heading-main">' . $atts['text'] . '</' . $atts['element'] . '>';
            }else{
                echo '<' . $atts['element'] . ' ' . $zo_heading_main  . ' class="zo-heading-main">' . $atts['text'] . '</' . $atts['element'] . '>';
                echo '<' . $atts['sub_element'] . ' ' . $zo_heading_sub . ' class="zo-heading-sub">' . $atts['sub_text'] . '</' . $atts['sub_element'] . '>';
            }
        }else{
            echo '<' . $atts['element'] . ' ' . $zo_heading_main . ' class="zo-heading-main">' . $atts['text'] . '</' . $atts['element'] . '>';
        }
        if($atts['link_button']=='yes' && !empty($button)){
            echo '<div ' . $zo_heading_button . ' class="zo-heading-button">' . $button . '</div>';
        }
    ?>
</div>
