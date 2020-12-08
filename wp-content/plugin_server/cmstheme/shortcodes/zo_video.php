<?php
vc_map(
	array(
		"name" => __("ZO Single Video", 'cmstheme'),
	    "base" => "zo_video",
	    "class" => "vc-zo-video",
		"content_element" => true,
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
		    array(
			    "type" => "textfield",
			    "heading" => __("Video URL",'cmstheme'),
			    "param_name" => "video_url",
			    "value" => "",
			    "group" => __("Settings", 'cmstheme'),
			    "description" => esc_html__('Just support Youtube, Vimeo host')
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Video Width",'cmstheme'),
			    "param_name" => "video_width",
			    "value" => "100%",
			    "group" => __("Settings", 'cmstheme')
		    ),
		    array(
			    "type" => "textfield",
			    "heading" => __("Video Height",'cmstheme'),
			    "param_name" => "video_height",
			    "value" => "100%",
			    "group" => __("Settings", 'cmstheme')
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Custom Thumbnail",'cmstheme'),
			    "param_name" => "thumbnail_custom",
			    "value" => array(
				    "Disable" => "disable",
				    "Enable" => "enable"
			    ),
			    "group" => __("Settings", 'cmstheme')
		    ),
		    array(
			    "type" => "attach_image",
			    "heading" => __("Thumbnail Image",'cmstheme'),
			    "param_name" => "thumbnail_url",
			    "dependency" => array(
				    "element" => "thumbnail_custom",
				    "value" => "enable"
			    ),
			    "group" => __("Settings", 'cmstheme')
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Hide Controls",'cmstheme'),
			    "param_name" => "video_control",
			    "value" => array(
				    "Disable" => "disable",
				    "Enable" => "enable"
			    ),
			    "group" => __("Settings", 'cmstheme')
		    ),
		    array(
			    "type" => "dropdown",
			    "heading" => __("Hide Video Info",'cmstheme'),
			    "param_name" => "video_info",
			    "value" => array(
				    "Disable" => "disable",
				    "Enable" => "enable"
			    ),
			    "group" => __("Settings", 'cmstheme')
		    ),
	    	array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "shortcode" => "zo_video",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",'cmstheme'),
	            "group" => __("Template", 'cmstheme'),
	        )
	    )
	)
);
global $zo_video;
$zo_video = array();
class WPBakeryShortCode_zo_video extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'video_url' => '',
			'video_width' => '100%',
			'video_height' => '100%',
			'thumbnail_custom' => 'disable',
			'thumbnail_url'=> '',
			'video_control' => '',
			'video_info' => '',
			'zo_template' => 'zo_video.php'
		), $atts);
		$atts = array_merge($atts_extra,$atts);
		if (!empty($atts['thumbnail_url'])) {
			$attachment_image = wp_get_attachment_image_src($atts['thumbnail_url'], 'full');
			$atts['thumbnail_url'] = $attachment_image[0];
		}
		/* Load Zo Video */
		$atts['html_id'] = zoHtmlID('zo-video');
		$atts['video'] = $this->videoRender($atts);
		if( $atts['video']['type'] == 'youtube' ) {
			wp_enqueue_script('zo-video-youtube', '//www.youtube.com/player_api', array('jquery'), '1.0.0');
		}
		if( $atts['video']['type'] == 'vimeo' ) {
			wp_enqueue_script('zo-video-vimeo', 'https://f.vimeocdn.com/js/froogaloop2.min.js', array('jquery'), '1.0.0');
		}
		wp_enqueue_script('zo-video-play', ZO_JS. 'zo.video.js', array('jquery'), '1.0.0');
		return parent::content($atts, $content);
	}

	/**
	 * Render Video Player
	 * @param $atts
	 * @return string
	 */
	private function videoRender($atts) {
		$control = "enable" === $atts['video_control'] ? 1 : 0;
		$info = ("enable" === $atts['video_info']) ? 0 : 1;
		$wrapid = $atts['html_id'];
		$height = $atts['video_height'];
		$width = $atts['video_width'];

		$youtube = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
		$vimeo = '#(videos|video|channels|\.com)\/([\d]+)#';
		$type = NULL;
		if( preg_match( $youtube,$atts['video_url'], $url) ) {
			$videoID = $url[1];
			$type = "youtube";
			$videoURL = 'https://www.youtube.com/embed/'.$videoID.'?enablejsapi=1&controls='.$control.'&showinfo='.$info;
		} elseif(preg_match($vimeo, $atts['video_url'], $url) ) {
			$videoID = $url[2];
			$type = "vimeo";
			$videoURL = 'https://player.vimeo.com/video/'.$videoID.'?api=1&player_id='.$wrapid.'-player&controls='.$control.'&showinfo='.$info;
		}
		return array(
			'url' => '<iframe id="'.$wrapid.'-player" class="zo-video-player" style="height:'.$height.';width:'.$width.';" src="'.$videoURL.'"></iframe>',
			'type' => $type
		);
	}
}
