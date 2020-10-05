<?php

global $zo_html_id;

if (empty($zo_html_id)) {
    $zo_html_id = array();
}
/**
 * Require libraries if needed.
 *
 * @access public
 *
 */
if(!class_exists('Aq_Resize')) {
	require_once(ZO_LIBRARIES.'aq_resizer.php');
}

if(!function_exists('zo_image_resize')) {
    /**
     * This is just a tiny wrapper function for the class above so that there is no
     * need to change any code in your own WP themes. Usage is still the same :)
     * @param $url
     * @param null $width
     * @param null $height
     * @param null $crop
     * @param bool $single
     * @param bool $upscale
     * @return array|bool|string
     * @throws Aq_Exception
     * @throws Exception
     */
    function zo_image_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
        $aq_resize = Aq_Resize::getInstance();
        return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale );
    }
}

if( !function_exists('zo_base_encode') ) {
	/*
	 * @param string The data to encode.
	 */
	function zo_base_encode( $str ) {
		return base64_decode($str);
	}
}

if(!function_exists('zo_parse_multi_attribute')) {
    function zo_parse_multi_attribute( $value, $default = array() ) {
        $result = $default;
        $params_pairs = explode( '|', $value );
        if ( ! empty( $params_pairs ) ) {
            foreach ( $params_pairs as $pair ) {
                $param = preg_split( '/\:/', $pair );
                if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
                    $result[ $param[0] ] = rawurldecode( $param[1] );
                }
            }
        }
        return $result;
    }
}
if(!function_exists('zo_build_link')) {
    function zo_build_link( $value ) {
        return zo_parse_multi_attribute( $value, array( 'url' => '', 'title' => '', 'target' => '' ) );
    }
}
/** ZO CUSTOM THUMBNAIL **/
add_theme_support('post-thumbnails');
add_action( 'after_setup_theme', 'zo_custom_thumbnail_size' );
function zo_custom_thumbnail_size(){
    add_image_size( 'thumb-small', 200, 200, true ); // Hard crop to exact dimensions (crops sides or top and bottom)
    add_image_size( 'thumb-medium', 540, 9999 ); // Crop to 520px width, unlimited height
    add_image_size( 'thumb-large', 720, 540 ); // Soft proprtional crop to max 720px width, max 480px height
}

function zo_ColumnWidthToSpan( $screen = 'vc_col-lg-', $width ) {
	preg_match( '/(\d+)\/(\d+)/', $width, $matches );
	if ( ! empty( $matches ) ) {
		$part_x = (int) $matches[1];
		$part_y = (int) $matches[2];
		if ( $part_x > 0 && $part_y > 0 ) {
			$value = ceil( $part_x / $part_y * 12 );
			if ( $value > 0 && $value <= 12 ) {
				$width = $screen . $value;
			}
		}
	}
	return $width;
}

function zoGetCategoriesByPostID($post_ID = null,$taxo = 'category'){
    $term_cats = array();
    $categories = get_the_terms($post_ID,$taxo);
    if($categories){
        foreach($categories as $category){
            $term_cats[] = get_term( $category, $taxo );
        }
    }
    return $term_cats;
}

/**
 * Generator unique html id
 * @param type $id : string
 * @return mixed|string|type
 */
function zoHtmlID($id) {
    global $zo_html_id;
    $id = str_replace(array('_'), '-', $id);
    if (isset($zo_html_id[$id])) {
        $count = count($zo_html_id[$id]);
        $zo_html_id[$id][$count] = 1;
        $count++;
        return $id . '-' . $count;
    } else {
        $zo_html_id[$id] = array(1);
        return $id;
    }
}

function zoFileScanDirectory($dir, $mask, $options = array(), $depth = 0) {
    $options += array(
        'nomask' => '/(\.\.?|CSV)$/',
        'callback' => 0,
        'recurse' => TRUE,
        'key' => 'uri',
        'min_depth' => 0,
    );

    $options['key'] = in_array($options['key'], array('uri', 'filename', 'name')) ? $options['key'] : 'uri';
    $files = array();
    if (is_dir($dir) && $handle = opendir($dir)) {
        while (FALSE !== ($filename = readdir($handle))) {
        	if (!preg_match($options['nomask'], $filename) && $filename[0] != '.') {
                $uri = "$dir/$filename";
                if (is_dir($uri) && $options['recurse']) {
                    // Give priority to files in this folder by merging them in after any subdirectory files.
                    $files = array_merge(zoFileScanDirectory($uri, $mask, $options, $depth + 1), $files);
                } elseif ($depth >= $options['min_depth'] && preg_match($mask, $filename)) {
                    // Always use this match over anything already set in $files with the
                    // same $$options['key'].
                    $file = new stdClass();
                    $file->uri = $uri;
                    $file->filename = $filename;
                    $file->name = pathinfo($filename, PATHINFO_FILENAME);
                    $files[$filename] = $file;
                }
            }
        }
        closedir($handle);
    }
    return $files;
}
?>
