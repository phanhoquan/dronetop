<?php
class logistics_Options_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'logistics_options_widget', // Base ID
            esc_html__('Zo Options', 'am-logistics'), // Name
            array('description' => esc_html__('Zo Options - Show color, header style and demo...', 'am-logistics'),) // Args
        );
    }

    function widget($args, $instance) {
        extract($args);
        $show_option = isset($instance['show_option']) ? $instance['show_option'] : 0;
        echo balanceTags($before_widget);

			if (!empty($title)) echo balanceTags($before_title . $title . $after_title);

			global $logistics_data, $logistics_meta_box;

			$presets_color = $logistics_data['presets_color'];
			if(isset($logistics_meta_box->_zo_presets_color) && $logistics_meta_box->_zo_presets_color){
				$presets_color = $logistics_meta_box->_zo_presets_color;
			}

			$arr_color = array(
				'1' => '#43cbfd',
				'2' => '#ff4421',
				'3' => '#f6bb17',
				'4' => '#f10f24',
				'5' => '#8d57d1',
				'6' => '#f36510',
				'7' => '#1e6bf1',
				'8' => '#c0392b',
				'9' => '#63bc0d',
				'10' => '#f1505b',
			);
		?>

			<div id="style_selector">
				<ul class="control-option">
					<li>
						<a href="javascript:void(0)" class="style-toggle close" style="background: <?php echo esc_attr($arr_color[$presets_color]);?>;">
							<span><?php esc_html_e('OPTIONS', 'am-logistics');?></span>
							<i class="fa fa-cog"></i>
						</a>
					</li>
					<li>
						<a href="https://zotheme.gitbooks.io/less-documentation/" target="_blank" title="Less Documentation">
							<span><?php esc_html_e('DOCUMENTATION', 'am-logistics');?></span>
							<i class="fa fa-book" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="https://support.drupalexp.com/tickets" target="_blank" title="Support System">
							<span><?php esc_html_e('SUPPORT', 'am-logistics');?></span>
							<i class="fa fa-life-ring" aria-hidden="true"></i>
						</a>
					</li>
					<li style="background: #8d57d1;">
						<a href="https://themeforest.net/item/less-responsive-multipurpose-creative-business-wordpress-theme/17252096?ref=zotheme&license=regular&open_purchase_for_item_id=17252096&purchasable=source" target="_blank" title="Buy now">
							<span><?php esc_html_e('BUY THEME', 'am-logistics');?></span>
							<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
						</a>
					</li>
				</ul>

				<div id="style_selector_container">
                    <?php if( $show_option ) { ?>
					<div class="box-title"><?php esc_html_e('PRESET COLOR', 'am-logistics'); ?></div>
					<div class="predefined">
						<a href="javascript:void(0);" class="preset1 <?php echo ($presets_color=='1')?'active':'';?>" id="1" data-color="#43cbfd"></a>
						<a href="javascript:void(0);" class="preset2 <?php echo ($presets_color=='2')?'active':'';?>" id="2" data-color="#ff4421"></a>
						<a href="javascript:void(0);" class="preset3 <?php echo ($presets_color=='3')?'active':'';?>" id="3" data-color="#f6bb17"></a>
						<a href="javascript:void(0);" class="preset4 <?php echo ($presets_color=='4')?'active':'';?>" id="4" data-color="#f10f24"></a>
						<a href="javascript:void(0);" class="preset5 <?php echo ($presets_color=='5')?'active':'';?>" id="5" data-color="#8d57d1"></a>
						<a href="javascript:void(0);" class="preset6 <?php echo ($presets_color=='6')?'active':'';?>" id="6" data-color="#f36510"></a>
						<a href="javascript:void(0);" class="preset7 <?php echo ($presets_color=='7')?'active':'';?>" id="7" data-color="#1e6bf1"></a>
						<a href="javascript:void(0);" class="preset8 <?php echo ($presets_color=='8')?'active':'';?>" id="8" data-color="#c0392b"></a>
						<a href="javascript:void(0);" class="preset9 <?php echo ($presets_color=='9')?'active':'';?>" id="9" data-color="#63bc0d"></a>
						<a href="javascript:void(0);" class="preset10 <?php echo ($presets_color=='10')?'active':'';?>" id="10" data-color="#f1505b"></a>
					</div>
					<div class="box-title"><?php esc_html_e('PRESET HEADER', 'am-logistics'); ?></div>
					<div class="header-demo">
						<a href="<?php echo esc_url(home_url('/'));?>" 		title="<?php esc_html_e('STYLE 1', 'am-logistics');?>">			<?php esc_html_e('STYLE 1', 'am-logistics');?></a>
						<a href="<?php echo esc_url(get_page_link(15));?>" 	title="<?php esc_html_e('STYLE 2', 'am-logistics');?>">			<?php esc_html_e('STYLE 2', 'am-logistics');?></a>
						<a href="<?php echo esc_url(get_page_link(17));?>" 	title="<?php esc_html_e('STYLE 3', 'am-logistics');?>">			<?php esc_html_e('STYLE 3', 'am-logistics');?></a>
						<a href="<?php echo esc_url(get_page_link(426));?>" title="<?php esc_html_e('STYLE 4', 'am-logistics');?>">			<?php esc_html_e('STYLE 4', 'am-logistics');?></a>
						<a href="<?php echo esc_url(get_page_link(453));?>" title="<?php esc_html_e('STYLE 5', 'am-logistics');?>">			<?php esc_html_e('STYLE 5', 'am-logistics');?></a>
						<a href="<?php echo esc_url(get_page_link(541));?>" title="<?php esc_html_e('STYLE VERTICAL', 'am-logistics');?>">	<?php esc_html_e('VERTICAL', 'am-logistics');?></a>
					</div>
                    <?php } // End Show Options ?>
					<div class="box-title"><?php esc_html_e('CHOOSE OUR DEMO', 'am-logistics'); ?></div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=2" title="<?php esc_html_e('Creative Style 01', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-1.jpg');?>" alt="<?php esc_html_e('Creative Style 01', 'am-logistics');?>">
							<span><?php esc_html_e('Creative Style 01','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=15" title="<?php esc_html_e('Creative Style 02', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-2.jpg');?>" alt="<?php esc_html_e('Creative Style 02', 'am-logistics');?>">
							<span><?php esc_html_e('Creative Style 02','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=541" title="<?php esc_html_e('Creative Style 03', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-3.jpg');?>" alt="<?php esc_html_e('Creative Style 03', 'am-logistics');?>">
							<span><?php esc_html_e('Creative Style 03','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=24" title="<?php esc_html_e('Agency Style 01', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-4.jpg');?>" alt="<?php esc_html_e('Agency Style 01', 'am-logistics');?>">
							<span><?php esc_html_e('Agency Style 01','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=453" title="<?php esc_html_e('Agency Style 02', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-5.jpg');?>" alt="<?php esc_html_e('Agency Style 02', 'am-logistics');?>">
							<span><?php esc_html_e('Agency Style 02','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=607" title="<?php esc_html_e('Agency Style 03', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-6.jpg');?>" alt="<?php esc_html_e('Agency Style 03', 'am-logistics');?>">
							<span><?php esc_html_e('Agency Style 03','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=17" title="<?php esc_html_e('Business Style 01', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-7.jpg');?>" alt="<?php esc_html_e('Business Style 01', 'am-logistics');?>">
							<span><?php esc_html_e('Business Style 01','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=426" title="<?php esc_html_e('Agency Style 02', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-8.jpg');?>" alt="<?php esc_html_e('Business Style 02', 'am-logistics');?>">
							<span><?php esc_html_e('Business Style 02','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-finance" title="<?php esc_html_e('Niche: Finance', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-9.jpg');?>" alt="<?php esc_html_e('Niche: Finance', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Finance','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-law" title="<?php esc_html_e('Niche: Law', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-10.jpg');?>" alt="<?php esc_html_e('Niche: Law', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Law','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-medical" title="<?php esc_html_e('Niche: Medical', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-11.jpg');?>" alt="<?php esc_html_e('Niche: Medical', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Medical','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-construction" title="<?php esc_html_e('Niche: Construction', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-12.jpg');?>" alt="<?php esc_html_e('Niche: Construction', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Construction','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-architecture" title="<?php esc_html_e('Niche: Architecture', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-13.jpg');?>" alt="<?php esc_html_e('Niche: Architecture', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Architecture','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-restaurant" title="<?php esc_html_e('Niche: Restaurant', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-14.jpg');?>" alt="<?php esc_html_e('Niche: Restaurant', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Restaurant','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less?page_id=458" title="<?php esc_html_e('Freelancer', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-15.jpg');?>" alt="<?php esc_html_e('Freelancer', 'am-logistics');?>">
							<span><?php esc_html_e('Freelancer','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-fashion" title="<?php esc_html_e('Niche: Fashion', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-23.jpg');?>" alt="<?php esc_html_e('Niche: Fashion', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Fashion','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-blog" title="<?php esc_html_e('Niche: Blog Style 01', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-21.jpg');?>" alt="<?php esc_html_e('Niche: Blog Style 01', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Blog Style 01','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-cleaning" title="<?php esc_html_e('Niche: Blog Style 02', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-22.jpg');?>" alt="<?php esc_html_e('Niche: Blog Style 02', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Blog Style 02','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-organic-food" title="<?php esc_html_e('Niche: Organic Food', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-24.jpg');?>" alt="<?php esc_html_e('Niche: Organic Food', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Organic Food','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-spa" title="<?php esc_html_e('Niche: Spa & Beauty', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-26.jpg');?>" alt="<?php esc_html_e('Niche: Spa & Beauty', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Spa & Beauty','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-equestrian" title="<?php esc_html_e('Niche: Equestrian', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-25.jpg');?>" alt="<?php esc_html_e('Niche: Equestrian', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Equestrian','am-logistics');?></span>
						</a>
					</div>
					<div class="demos">
						<a target="_blank" href="http://demo.cms-theme.net/wordpress/less-corporate" title="<?php esc_html_e('Niche: Corporate', 'am-logistics');?>">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/images/demo/less-landing-home-thumb-corporate.jpg');?>" alt="<?php esc_html_e('Niche: Corporate', 'am-logistics');?>">
							<span><?php esc_html_e('Niche: Corporate','am-logistics');?></span>
						</a>
					</div>
				</div>
			</div>

		<?php

        echo balanceTags($after_widget);
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['show_option'] = $new_instance['show_option'];
        return $instance;
    }

    function form( $instance ) {

        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $show_option = isset($instance['show_option']) ? esc_attr($instance['show_option']) : '';
	?>

        <p>
			<label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'am-logistics' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
            <label for="<?php echo esc_url($this->get_field_id('show_option')); ?>"><?php esc_html_e( 'Show Option:', 'am-logistics' ); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('show_option')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('show_option')); ?>">
				<option value="0" <?php selected($show_option,0); ?>><?php echo esc_html__('No','am-logistics'); ?></option>
				<option value="1" <?php selected($show_option,1); ?>><?php echo esc_html__('Yes','am-logistics'); ?></option>
			</select>
        </p>

    <?php
    }

}

function logistics_presets_selector_scripts(){
	wp_enqueue_style('less-options-widgets-css', get_template_directory_uri() . '/inc/widgets/css/presets.css');
	wp_enqueue_script('less-jquery-cookie', get_template_directory_uri()  . '/inc/widgets/js/jquery_cookie.min.js', array( 'jquery' ), '1.4.0', true);
	wp_enqueue_script('less-options-widgets-js', get_template_directory_uri() . '/inc/widgets/js/presets.js', array( 'jquery' ), '1.4.0', true);
	wp_localize_script('less-options-widgets-js', 'ZOPreset', array('theme_url' => get_template_directory_uri()) );
}

add_action( 'wp_enqueue_scripts', 'logistics_presets_selector_scripts' );

/**
* Class CS_Social_Widget
*/

function logistics_register_options_widget() {
    register_widget('logistics_Options_Widget');
}

add_action('widgets_init', 'logistics_register_options_widget');
