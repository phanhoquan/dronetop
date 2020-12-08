<?php
?>
<div class="zo-countdown <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($atts['class']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-count-down container-fluid">
        <span class="zo-countdown-hidden"><?php echo esc_attr($atts['year']) .'/'. esc_attr($atts['month']) .'/'. esc_attr($atts['day']);?></span>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 zo-count-down-days">
            <div class="zo-count-down-wrap">
                <div class="zo-count-down-number">0</div>
                <div class="zo-count-down-label">
                    <?php echo esc_html__('Hours','cmstheme');?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 zo-count-down-hours">
            <div class="zo-count-down-wrap">
                <div class="zo-count-down-number">0</div>
                <div class="zo-count-down-label">
                    <?php echo esc_html__('Hours','cmstheme');?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 zo-count-down-minutes">
            <div class="zo-count-down-wrap">
                <div class="zo-count-down-number">0</div>
                <div class="zo-count-down-label">
                    <?php echo esc_html__('Hours','cmstheme');?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 zo-count-down-seconds">
            <div class="zo-count-down-wrap">
                <div class="zo-count-down-number">0</div>
                <div class="zo-count-down-label">
                    <?php echo esc_html__('Hours','cmstheme');?>
                </div>
            </div>
        </div>
    </div>
</div>
