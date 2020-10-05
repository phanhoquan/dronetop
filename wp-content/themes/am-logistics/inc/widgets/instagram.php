<?php
class logistics_Instagram_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'logistics_instagram_widget', // Base ID
            esc_html__('Zo Instagram', 'am-logistics'), // Name
            array('description' => esc_html__('Zo Instagram Widget', 'am-logistics'),) // Args
        );
    }

    function widget($args, $instance) {
        extract($args);

        $title 			= empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
        $username 		= empty($instance['username']) ? '' : $instance['username'];
        $api 			= empty($instance['api']) ? '' : $instance['api'];
        $limit 			= empty($instance['number']) ? 9 : $instance['number'];
        $columns 		= empty($instance['columns']) ? 3 : $instance['columns'];
        $show_title 	= empty($instance['show_title']) ? '' : $instance['show_title'];
        $size 			= empty($instance['size']) ? 'thumbnail' : $instance['size'];
        $target 		= empty($instance['target']) ? 'popup' : $instance['target'];
        $extra_class 	= empty($instance['extra_class']) ? '' : $instance['extra_class'];
        switch ($columns) {
            case 1:
                $column_class = "col-xs-12 col-sm-12 col-md-12 col-lg-12";
                break;
            case 2:
                $column_class = "col-xs-6 col-sm-6 col-md-6 col-lg-6";
                break;
            case 3:
                $column_class = "col-xs-4 col-sm-4 col-md-4 col-lg-4";
                break;
            case 4:
                $column_class = "col-xs-3 col-sm-3 col-md-3 col-lg-3";
                break;
            default:
                $column_class = "col-xs-4 col-sm-4 col-md-4 col-lg-4";
        }
        echo do_shortcode($before_widget);

        if (!empty($title))	echo do_shortcode($before_title . $title . $after_title);

        if ($username && $api) {

			$endpoint = 'media';
			$params = array(
				'access_token' => $api,
				'count' => $limit,
			);
			$secret = '6dc1787668c64c939929c17683d7cb74';

			$sig = $this->generate_sig($endpoint, $params, $secret);

			$apiCall = 'https://api.instagram.com/v1/users/'. esc_attr($username) .'/media/recent?access_token='. esc_attr($api) .'&count='. esc_attr($limit) .'&sig=' . esc_attr($sig);

			#
			# call the API and decode the response
			#
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			WP_Filesystem();
			global $wp_filesystem;
			$url = $apiCall;

			$recent_media = json_decode($wp_filesystem->get_contents( $url ));

			$recent_media_status = $recent_media->meta->code;

			if($recent_media_status === 400){
				echo esc_attr($recent_media->meta->error_message);
			}else {
				//wp_enqueue_style('prettyPhoto-css', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), '3.1.6');
				//wp_enqueue_script('prettyPhoto-js', get_template_directory_uri() . '/assets/js/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.6');
				$recent_media_data = $recent_media->data;
				echo '<div class="zo-instagram '. esc_attr($extra_class) .'"><div class="row">';
				foreach($recent_media_data as $item){
					$link = $item->link;
					$title = $item->caption->text;
					$image_url_full = $item->images->standard_resolution->url;
					$image_url = '';
					if($size == 'thumbnail') {
						$image_url = $item->images->thumbnail->url;
					}else if($size == 'medium'){
						$image_url = $item->images->low_resolution->url;
					}else {
						$image_url = $item->images->standard_resolution->url;
					}
					?>

						<div class="zo-item <?php echo esc_attr($column_class);?>">
							<?php if($show_title) {?>
								<div class="item-title"><?php echo esc_attr($title);?></div>
							<?php }?>

							<div class="item-image">
								<?php
									if($target == 'popup') {
								?>
										<a href="<?php echo esc_url($image_url_full);?>"  data-gallery="prettyPhoto[pp_gal]">
											<img src="<?php echo esc_url($image_url);?>" alt="<?php echo esc_attr($title);?>">
										</a>
								<?php
									}else{
								?>
										<a href="<?php echo esc_url($link);?>" target="_blank">
											<img src="<?php echo esc_url($image_url);?>" alt="<?php echo esc_attr($title);?>">
										</a>
								<?php
									}
								?>
							</div>
						</div>

					<?php
				}
				echo '</div></div>';
			}
        }

		if($target == 'popup') {
			?>
				<script type="text/javascript" charset="utf-8">
					/*jQuery(document).ready(function(){
						"use strict";
						jQuery(".zo-instagram a[rel^='prettyPhoto']").prettyPhoto({
							show_title: false,
						});
					});*/
				</script>
			<?php
		}

        echo do_shortcode($after_widget);
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['username'] = trim(strip_tags($new_instance['username']));
        $instance['api'] = trim(strip_tags($new_instance['api']));
        $instance['number'] = !absint($new_instance['number']) ? 9 : $new_instance['number'];
        $instance['columns'] = !absint($new_instance['columns']) ? 3 : $new_instance['columns'];
        $instance['size'] = ($new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'medium' || $new_instance['size'] == 'large') ? $new_instance['size'] : 'thumbnail';
        $instance['show_title'] = $new_instance['show_title'] ? $new_instance['show_title'] : '';
        $instance['target'] = ($new_instance['target'] == 'popup' || $new_instance['target'] == '_blank') ? $new_instance['target'] : 'popup';
        $instance['extra_class'] = $new_instance['extra_class'];

        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance,
			array(
				'title' => esc_html__('Instagram', 'am-logistics'),
				'username' => '',
				'api' => '',
				'number' => 9,
				'columns' => 3,
				'show_title' => '',
				'size' => 'thumbnail',
				'target' => 'popup'
			)
		);
        $title = esc_attr($instance['title']);
        $username = esc_attr($instance['username']);
        $api = esc_attr($instance['api']);
        $number = absint($instance['number']);
        $columns = absint($instance['columns']);
        $show_title = esc_attr($instance['show_title']);
        $size = esc_attr($instance['size']);
        $target = esc_attr($instance['target']);
        $extra_class = isset($instance['extra_class']) ? esc_attr($instance['extra_class']) : '';
        ?>
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
				<?php esc_html_e('Title: ', 'am-logistics'); ?>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>

        <p>
			<label for="<?php echo esc_attr($this->get_field_id('username')); ?>">
				<?php esc_html_e('User ID: ', 'am-logistics'); ?>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('username')); ?>" name="<?php echo esc_attr($this->get_field_name('username')); ?>" type="text" value="<?php echo esc_attr($username); ?>" />
				<div><?php echo wp_kses(__('Get User ID <a href="https://smashballoon.com/instagram-feed/find-instagram-user-id/"  target="_blank">Here</a>','am-logistics'), array('a'=> array( 'href' => array(), 'target' => array() )));?></div>
			</label>
		</p>

        <p>
			<label for="<?php echo esc_attr($this->get_field_id('api')); ?>">
			<?php esc_html_e('Access Token: ', 'am-logistics'); ?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('api')); ?>" name="<?php echo esc_attr($this->get_field_name('api')); ?>" type="text" value="<?php echo esc_attr($api); ?>" /></label>
			<div><?php echo wp_kses(__('You must <a href="http://instagram.com/developer/authentication/" target="_blank">Register a New Client</a> & Get access token <a href="https://www.youtube.com/watch?v=LkuJtIcXR68" target="_blank">Here</a>','am-logistics'), array('a'=> array( 'href' => array(), 'target' => array() )));?></div>
		</p>

        <p>
			<label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
				<?php esc_html_e('Number of photos: ', 'am-logistics'); ?>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
			</label>
		</p>

        <p>
			<label for="<?php echo esc_attr($this->get_field_id('columns')); ?>">
				<?php esc_html_e('Columns: ', 'am-logistics'); ?>
				<select id="<?php echo esc_attr($this->get_field_id('columns')); ?>" name="<?php echo esc_attr($this->get_field_name('columns')); ?>" class="widefat">
					<option value="1" <?php selected('1', $columns) ?>><?php esc_html_e('1', 'am-logistics'); ?></option>
					<option value="2" <?php selected('2', $columns) ?>><?php esc_html_e('2', 'am-logistics'); ?></option>
					<option value="3" <?php selected('3', $columns) ?>><?php esc_html_e('3', 'am-logistics'); ?></option>
					<option value="4" <?php selected('4', $columns) ?>><?php esc_html_e('4', 'am-logistics'); ?></option>
				</select>
			</label>
		</p>

        <p>
			<label for="<?php echo esc_attr($this->get_field_id('show_title')); ?>"><?php esc_html_e('Show title', 'am-logistics'); ?>:</label>
            <select id="<?php echo esc_attr($this->get_field_id('show_title')); ?>" name="<?php echo esc_attr($this->get_field_name('show_title')); ?>" class="widefat">
                <option value="" <?php selected('', $show_title) ?>><?php esc_html_e('No', 'am-logistics'); ?></option>
                <option value="1" <?php selected('1', $show_title) ?>><?php esc_html_e('Yes', 'am-logistics'); ?></option>
            </select>
        </p>

        <p>
			<label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Photo size', 'am-logistics'); ?>:</label>
            <select id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>" class="widefat">
                <option value="thumbnail" <?php selected('thumbnail', $size) ?>><?php esc_html_e('Thumbnail', 'am-logistics'); ?></option>
                <option value="medium" <?php selected('medium', $size) ?>><?php esc_html_e('Medium', 'am-logistics'); ?></option>
                <option value="large" <?php selected('large', $size) ?>><?php esc_html_e('Large', 'am-logistics'); ?></option>
            </select>
        </p>

        <p>
			<label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php esc_html_e('Open links in', 'am-logistics'); ?>:</label>
            <select id="<?php echo esc_attr($this->get_field_id('target')); ?>" name="<?php echo esc_attr($this->get_field_name('target')); ?>" class="widefat">
                <option value="popup" <?php selected('popup', $target) ?>><?php esc_html_e('Popup', 'am-logistics'); ?></option>
                <option value="_blank" <?php selected('_blank', $target) ?>><?php esc_html_e('New window (_blank)', 'am-logistics'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('extra_class')); ?>">Extra Class:</label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('extra_class')); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php echo esc_attr($extra_class); ?>" />
        </p>
    <?php

    }

	function generate_sig($endpoint, $params, $secret) {
		$sig = $endpoint;
		ksort($params);
		foreach ($params as $key => $val) {
			$sig .= "|$key=$val";
		}
		return hash_hmac('sha256', $sig, $secret, false);
	}
}


function logistics_register_instagram_widget() {
    register_widget('logistics_Instagram_Widget');
}
add_action('widgets_init', 'logistics_register_instagram_widget');
