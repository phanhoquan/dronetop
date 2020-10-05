<?php
class logistics_Flickr_Badges_Widget extends WP_Widget {

	var $prefix;


	/**
	 * Set up the widget's unique name, ID, class, description, and other options
	 * @since 1.2.1
	**/
	function __construct() {

		// Set default variable for the widget instances
		$this->prefix = 'zoflickr';

		// Set up the widget control options
		$control_options = array(
			'width' => 444,
			'height' => 350,
			'id_base' => $this->prefix
		);

		// Add some informations to the widget
		$widget_options = array('classname' => 'widget_flickr', 'description' => esc_html__( 'Displays a Flickr photo stream from an ID', 'am-logistics' ) );

		// Create the widget
        parent::__construct($this->prefix, esc_html__('Zo Flickr Favorite', 'am-logistics'), $widget_options, $control_options );

		// Load additional scripts and styles file to the widget admin area
		add_action( 'load-widgets.php', array(&$this, 'widget_admin') );

		// Load the widget stylesheet for the widgets screen.
		if ( is_active_widget(false, false, $this->id_base, true) && !is_admin() ) {
			wp_enqueue_style( 'zo-flickr', get_template_directory_uri() . '/inc/widgets/css/widget.css', false, 0.7, 'screen' );
			add_action( 'wp_head', array( &$this, 'print_script' ) );
		}
	}


	/**
	 * Push all script and style from the widget "Custom Style & Script" box.
	 * @since 1.2.1
	**/
	function print_script() {
		$settings = $this->get_settings();
		foreach ( $settings as $key => $setting ){
			if ( !empty( $setting['custom'] ) )
				echo do_shortcode($setting['custom']);
		}
	}


	/**
	 * Push additional script and style files to the widget admin area
	 * @since 1.2.1
	**/
	function widget_admin() {
		wp_enqueue_style( 'zo-flickr-admin', get_template_directory_uri() . '/inc/widgets/css/dialog.css' );
		wp_enqueue_script( 'zo-flickr-admin', get_template_directory_uri() . '/inc/widgets/js/jquery.dialog.js' );
	}




	/**
	 * Outputs another item
	 * @since 1.2.2
	 */
	function fes_load_utility() {
		// Check the nonce and if not isset the id, just die.
		//$nonce = $_POST['nonce'];
		//if ( ! wp_verify_nonce( $nonce, 'fes-nonce' ) )
		//	die();

		if ( false === ( $res = get_transient( '_premium_plugins' ) ) ) {

			$request = wp_remote_get( "http://marketplace.envato.com/api/edge/collection:4204349.json" );

			if ( ! is_wp_error( $request ) )
				$res = json_decode( wp_remote_retrieve_body( $request ) );

			set_transient( '_premium_plugins', $res, 60*60*24*7 ); // cache for a week
		}

		if( isset( $res->collection ) )
			foreach( $res->collection as $item )
				echo "<a href='{$item->url}?ref=zourbuth'><img src='{$item->thumbnail}'></a>&nbsp;";
	}


	/**
	 * Push the widget stylesheet widget.css into widget admin page
	 * @since 1.2.1
	**/
	function widget( $args, $instance ) {
		extract( $args );

		// Set up the arguments for wp_list_categories().
		$cur_arg = array(
			'title'			=> !empty($instance['title']) ? $instance['title']: '',
			'api_key'		=> !empty($instance['api_key']) ? $instance['api_key'] : '',
			'flickr_id'		=> !empty($instance['flickr_id']) ? $instance['flickr_id'] : '',
			'count'			=> !empty($instance['count']) ? (int) $instance['count'] : '',
			'width'			=> isset( $instance['width'] ) ? (int) $instance['width'] : 100,
			'height'			=> isset( $instance['height'] ) ? (int) $instance['height'] : 100,
		);

		extract( $cur_arg );

		// print the before widget
		echo do_shortcode($before_widget);

		if ( $title )
			echo do_shortcode($before_title . $title . $after_title);

		// Get the user direction, rtl or ltr
		if ( function_exists( 'is_rtl' ) )
			$dir = is_rtl() ? 'rtl' : 'ltr';

		// Wrap the widget
		if ( ! empty( $instance['intro_text'] ) )
			echo '<p>' . do_shortcode( $instance['intro_text'] ) . '</p>';

		echo "<div class='flickr-badge-wrapper zframe-flickr-wrap-$dir count-$count'>";

			if($api_key && $flickr_id){
				#
				# build the API URL to call
				#
				$params = array(
					'api_key'	=> $api_key,
					'user_id'   => $flickr_id,
					'per_page'	=> $count,
					'method'	=> 'flickr.favorites.getList',
					'format'	=> 'php_serial',
					'page'		=> 1
				);
				$encoded_params = array();
				foreach ($params as $k => $v){
					$encoded_params[] = urlencode($k).'='.urlencode($v);
				}
				$html_id = function_exists('zoHtmlID') ? zoHtmlID('flickr-favorite') : 'flickr-favorite';

				#
				# call the API and decode the response
				#
				require_once(ABSPATH . 'wp-admin/includes/file.php');
				WP_Filesystem();
				global $wp_filesystem;
				$url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
				$rsp = $wp_filesystem->get_contents( $url );
				$rsp_obj = unserialize($rsp);
				if($rsp_obj['stat'] == 'ok'){
					foreach($rsp_obj['photos']['photo'] as $photo){
						echo '<div class="image_wrap">';
							$image_full = 'https://farm'. esc_attr($photo['farm']) .'.staticflickr.com/'. esc_attr($photo['server']) .'/'. esc_attr($photo['id']) .'_'. esc_attr($photo['secret']) .'.jpg';
							echo '<a href="'. esc_url($image_full) .'" class="prettyPhoto" rel="prettyPhoto['. esc_attr($html_id) .']"><img width="'. esc_attr($width) .'" height="'. esc_attr($height) .'" src="'. esc_url($image_full) .'" alt="'. esc_attr($photo['title']) .'"/></a>';
						echo '</div>';
					}
				}else {
					esc_html_e("Call failed, api.flickr.com can't connect.", 'am-logistics');
				}
			}else{
				esc_html_e('Please enter API Key and Flickr user ID.', 'am-logistics');
			}

		echo '</div>';



		if ( ! empty( $instance['outro_text'] ) )
			echo '<p>' . do_shortcode( $instance['outro_text'] ) . '</p>';

		// Print the after widget
		echo do_shortcode($after_widget);
	}



	/**
	 * Widget update functino
	 * @since 1.2.1
	**/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['api_key'] 			= strip_tags($new_instance['api_key']);
		$instance['flickr_id'] 		= strip_tags($new_instance['flickr_id']);
		$instance['count'] 			= (int) $new_instance['count'];
		$instance['width']			= strip_tags($new_instance['width']);
		$instance['height']			= strip_tags($new_instance['height']);
		$instance['title']			= strip_tags($new_instance['title']);
		$instance['tab']			= $new_instance['tab'];
		$instance['intro_text'] 	= $new_instance['intro_text'];
		$instance['outro_text']		= $new_instance['outro_text'];
		$instance['custom']			= $new_instance['custom'];

		return $instance;
	}



	/**
	 * Widget form function
	 * @since 1.2.1
	**/
	function form( $instance ) {
		// Set up the default form values.
		$defaults = array(
			'title'			=> esc_attr__( 'Flickr Widget', 'am-logistics' ),
			'api_key'			=> 'user',
			'flickr_id'		=> '', // 71865026@N00
			'count'			=> 9,
			'width'			=> 100,
			'height'		=> 100,
			'tab'			=> array( 0 => true, 1 => false, 2 => false, 3 => false ),
			'intro_text'	=> '',
			'outro_text'	=> '',
			'custom'		=> ''
		);

		/* Merge the user-selected arguments with the defaults. */
		$instance = wp_parse_args( (array) $instance, $defaults );
		$tabs = array(
			__( 'General', 'am-logistics' ),
			__( 'Customs', 'am-logistics' ),
		);

		?>
		<div id="fbw-<?php echo esc_attr($this->id) ; ?>" class="totalControls tabbable tabs-left">
			<ul class="nav nav-tabs">
				<?php foreach ($tabs as $key => $tab ) : ?>
					<li class="fes-<?php echo esc_attr($key); ?> <?php echo esc_attr($instance['tab'][$key] ? 'active' : '') ; ?>"><?php echo do_shortcode($tab); ?><input type="hidden" name="<?php echo esc_attr($this->get_field_name( 'tab' )); ?>[]" value="<?php echo esc_attr($instance['tab'][$key]); ?>" /></li>
				<?php endforeach; ?>
			</ul>

			<ul class="tab-content">
				<li class="tab-pane <?php if ( $instance['tab'][0] ) : ?>active<?php endif; ?>">
					<ul>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'am-logistics'); ?></label>
							<span class="controlDesc"><?php esc_html_e( 'Give the widget title, or leave it empty for no title.', 'am-logistics' ); ?></span>
							<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('api_key')); ?>"><?php esc_html_e( 'Flickr api key', 'am-logistics' ); ?></label>
							<span class="controlDesc"><?php printf( __( 'Get api ket at <a href="%s" target="_blank">here</a>.', 'am-logistics' ), esc_url('https://www.flickr.com/services/api/misc.api_keys.html')); ?></span>
							<input class="widefat" id="<?php echo esc_attr($this->get_field_id('api_key')); ?>" name="<?php echo esc_attr($this->get_field_name('api_key')); ?>" type="text" value="<?php echo esc_attr( $instance['api_key'] ); ?>" />
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>"><?php esc_html_e('Flickr user ID', 'am-logistics'); ?></label>
							<input id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" type="text" value="<?php echo esc_attr( $instance['flickr_id'] ); ?>" />
							<span class="controlDesc"><?php printf( __( 'Put the flickr ID here, go to <a href="%s" target="_blank">Flickr NSID Lookup</a> if you don\'t know your ID. Example: 71865026@N00', 'am-logistics' ), esc_url('http://goo.gl/PM6rZ')); ?></span>
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Number', 'am-logistics'); ?></label>
							<span class="controlDesc"><?php esc_html_e( 'Number of images to show', 'am-logistics' ); ?></span>
							<input class="column-last" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>" type="text" value="<?php echo esc_attr( $instance['count'] ); ?>" size="3" />
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('width_image')); ?>"><?php esc_html_e( 'Width: ', 'am-logistics' ); ?></label>
							<span class="controlDesc"><?php esc_html_e( 'Represents the width of the image', 'am-logistics' ); ?></span>
							<input class="widefat" id="<?php echo esc_attr($this->get_field_id('width')); ?>" name="<?php echo esc_attr($this->get_field_name('width')); ?>" type="text" value="<?php echo esc_attr( $instance['width'] ); ?>" size="3" />
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('height_image')); ?>"><?php esc_html_e( 'Height: ', 'am-logistics' ); ?></label>
							<span class="controlDesc"><?php esc_html_e( 'Represents the width of the image', 'am-logistics' ); ?></span>
							<input class="widefat" id="<?php echo esc_attr($this->get_field_id('height')); ?>" name="<?php echo esc_attr($this->get_field_name('height')); ?>" type="text" value="<?php echo esc_attr( $instance['height'] ); ?>" size="3" />
						</li>
					</ul>
				</li>

				<li class="tab-pane <?php if ( $instance['tab'][1] ) : ?>active<?php endif; ?>">
					<ul>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('intro_text')); ?>"><?php esc_html_e( 'Intro Text', 'am-logistics' ); ?></label>
							<span class="controlDesc"><?php esc_html_e( 'This option will display addtional text before the widget content and HTML supports.', 'am-logistics' ); ?></span>
							<textarea name="<?php echo esc_attr($this->get_field_name( 'intro_text' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'intro_text' )); ?>" rows="2" class="widefat"><?php echo esc_textarea($instance['intro_text']); ?></textarea>
						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('outro_text')); ?>"><?php esc_html_e( 'Outro Text', 'am-logistics' ); ?></label>
							<span class="controlDesc"><?php esc_html_e( 'This option will display addtional text after widget and HTML supports.', 'am-logistics' ); ?></span>
							<textarea name="<?php echo esc_attr($this->get_field_name( 'outro_text' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'outro_text' )); ?>" rows="2" class="widefat"><?php echo esc_textarea($instance['outro_text']); ?></textarea>

						</li>
						<li>
							<label for="<?php echo esc_attr($this->get_field_id('custom')); ?>"><?php esc_html_e( 'Custom Script & Stylesheet', 'am-logistics' ) ; ?></label>
							<span class="controlDesc"><?php esc_html_e( 'Use this box for additional widget CSS style of custom javascript. Current widget selector: ', 'am-logistics' ); ?><?php echo '<tt>#' . $this->id . '</tt>'; ?></span>
							<textarea name="<?php echo esc_attr($this->get_field_name( 'custom' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'custom' )); ?>" rows="5" class="widefat code"><?php echo htmlentities($instance['custom']); ?></textarea>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<?php
	}
}

function logistics_register_Flickr_Badges_Widget() {
    register_widget('logistics_Flickr_Badges_Widget');
}
add_action('widgets_init', 'logistics_register_Flickr_Badges_Widget');
