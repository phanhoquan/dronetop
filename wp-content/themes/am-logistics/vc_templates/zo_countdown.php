<?php
$current_year = date('Y');
if(empty($atts['day']) || !is_numeric($atts['day']) || $atts['day'] < 1 || $atts['day'] > 31 || empty($atts['month']) || !is_numeric($atts['month']) || $atts['month'] < 1 || $atts['month'] > 12 || empty($atts['year']) || !is_numeric($atts['year']) || $atts['year'] < $current_year){
    echo esc_html__('Please enter correct Day/Month/Year','am-logistics');
    return;
}
$font_class = '';
if(!empty($atts['local_font'])){
    $font_class = $atts['local_font'];
}
$time_style='';
if(!empty($atts['time_color'])){
    $time_style.= 'color: ' . $atts['time_color'] .';';
}
$label_style='';
if(!empty($atts['label_color'])){
    $label_style.= 'color: ' . $atts['label_color'] .';';
}
?>
<div class="zo-countdown <?php echo esc_attr($atts['template']);?> <?php if(!empty($atts['class'])) echo esc_attr($atts['class']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-count-down container-fluid">
        <span class="zo-countdown-hidden"><?php echo esc_attr($atts['year']) .'/'. esc_attr($atts['month']) .'/'. esc_attr($atts['day']);?></span>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 zo-count-down-days">
            <div class="zo-count-down-wrap">
                <div class="zo-count-down-number <?php echo esc_attr($font_class);?>" style="<?php echo esc_attr($time_style);?>">0</div>
                <div class="zo-count-down-label" style="<?php echo esc_attr($label_style);?>">
                    <?php echo esc_html__('Ngày','am-logistics');?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 zo-count-down-hours">
            <div class="zo-count-down-wrap">
                <div class="zo-count-down-number <?php echo esc_attr($font_class);?>" style="<?php echo esc_attr($time_style);?>">0</div>
                <div class="zo-count-down-label" style="<?php echo esc_attr($label_style);?>">
                    <?php echo esc_html__('Giờ','am-logistics');?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 zo-count-down-minutes">
            <div class="zo-count-down-wrap">
                <div class="zo-count-down-number <?php echo esc_attr($font_class);?>" style="<?php echo esc_attr($time_style);?>">0</div>
                <div class="zo-count-down-label" style="<?php echo esc_attr($label_style);?>">
                    <?php echo esc_html__('Phút','am-logistics');?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 zo-count-down-seconds">
            <div class="zo-count-down-wrap">
                <div class="zo-count-down-number <?php echo esc_attr($font_class);?>" style="<?php echo esc_attr($time_style);?>">0</div>
                <div class="zo-count-down-label" style="<?php echo esc_attr($label_style);?>">
                    <?php echo esc_html__('Giây','am-logistics');?>
                </div>
            </div>
        </div>
    </div>
</div>
