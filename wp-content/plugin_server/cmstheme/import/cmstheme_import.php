<?php
/**
*
* Plugin Name: CMS Theme Import Sample Data
* Plugin URI: http://demo.cms-theme.net
* Description: This plugin is provide import functionaly help to import sample data.
* Version: 1.0.0
* Author: CMS Theme
* Author URI: http://themeforest.net/user/cms-theme
* Copyright 2015 cms-theme.net. All rights reserved.
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action('admin_menu', 'cmstheme_import_menu');
add_action('wp_ajax_cmstheme_import_copy_file', 'cmstheme_import_copy_file');
add_action('wp_ajax_cmstheme_import_import_data', 'cmstheme_import_import_data');

function cmstheme_import_menu(){
	add_submenu_page(
		'themes.php', //parent_slug
		esc_html__('Install Demos', 'cmstheme'), //page_title
		esc_html__('Install Demos', 'cmstheme'), //menu_title
		'manage_options', //capability
		'cmstheme_import', //slug
		'cmstheme_import_do_import' //function
    );
}

function cmstheme_import_do_import(){
	$demo = isset($_POST['demo']) ? $_POST['demo'] : false;
	if($demo){
		//Do import
		wp_register_script('cmstheme-import-script', plugin_dir_url( __FILE__ ) . 'assets/js/import.js', array( 'jquery' ), '1.1.0', true );
        wp_enqueue_script('cmstheme-import-script' );
        $files = array();
        foreach(file(get_template_directory() . '/sample-data/' . $demo . '/media.txt') as $file){
        	if(!empty($file)){
        		$files[] = str_replace(array(PHP_EOL, "\n", "\r"), '', $file);
        	}
        };
        wp_localize_script( 'cmstheme-import-script', 'demo', array('demo' => $demo, 'files' => $files, 'source_url' => $_POST['source_url']));
        echo '<div class="wrap tp-app">';
        echo '<h2>Import Demo</h2>';
        echo '<span class="copy-image">1. Download Image</span><br/><span class="import-data">2. Import Data</span>';
        echo '</div>';
	}else{
		//Choose Demo
		wp_register_style('cmstheme-import-css', plugin_dir_url(__FILE__) . 'assets/css/cmstheme-import.min.css', '1.1.0');
        wp_enqueue_style('cmstheme-import-css');
		require_once get_template_directory() . '/sample-data/demo-list.php';
		echo '<div class="wrap tp-app">';
		echo '<h2>Select Demo to import</h2>';
		echo '<div class="notice notice-warning"><h3 style="color: #8a6d3b">Important!</h3> <p style="color: #8a6d3b">All contents and files will be remove during import process. Please make sure you have backed up before do import action!<br/> To remove Import Demos function, add <pre>define(\'CMS_REMOVE_IMPORT\', true);</pre> to wp-config.php</p></div>';
		foreach ($demo_list as $key => $demo) {
			echo '<div class="import-block">';
            echo '<img src="' . get_template_directory_uri() . '/sample-data/' . $key . '/screenshot.png"/>';
            echo '<div class="import-form">';
                echo '<form id="cmstheme-import-form" name="post" action="" method="post" autocomplete="off">';
                    echo '<input type="hidden" name="source_url" value="' . $demo['demo'] .'">';
                    echo '<input type="hidden" name="demo" value="' . $key .'">';
                    echo '<h2 class="import-title">' . $demo['title'];
                    echo '<input type="submit" id="import-btn-submit" class="button button-primary button-large" name="submit" value="Install">';
                    echo '<a class="button button-primary button-large" href="' . $demo['demo'] . '" target="_blank">Preview</a>';
                    echo '</h2>';
                echo '</form>';
            echo '</div>';
        echo '</div>';
		}
		echo '</div>';
	}
}

function cmstheme_import_copy_file(){
	$source = $_POST['file'];
	$filename = basename($source);
	$tmp = explode('wp-content/uploads', $source);
	$folder = ABSPATH . 'wp-content/uploads' . dirname($tmp[1]);
	//wp_send_json(array('status' => 'ok', 'msg' => 'skip'));
	require_once(ABSPATH . 'wp-admin/includes/file.php');
  	if(wp_mkdir_p($folder)){
  		$timeout = 1000;
  		$tmpfile = download_url($source, $timeout);
  		copy($tmpfile, $folder . '/' . $filename);
  		unlink($tmpfile);
  		$filetype = wp_check_filetype($filename, null);
  		$wp_upload_dir = wp_upload_dir();
  		$attachment = array(
			'guid' => $wp_upload_dir['url'] . '/' . $filename,
	       	'post_mime_type' => $filetype['type'],
	       	'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
	       	'post_content' => '',
	       	'post_status' => 'inherit'
    	);
    	$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
    	require_once( ABSPATH . 'wp-admin/includes/image.php' );
    	$attach_data = wp_generate_attachment_metadata( $attach_id, $folder . '/' . $filename );
			wp_update_attachment_metadata( $attach_id, $attach_data );
  	}else{
  		wp_send_json(array('status' => 'failed', 'msg' => 'Could not create folder: .' . $folder));
  	};
  	wp_send_json(array('status' => 'ok', 'msg' => $folder . '/' . $filename));
}

function cmstheme_import_import_data(){
	$demo = get_template_directory() . '/sample-data/' . $_POST['demo'];
	global $wpdb;
	$oldUrl = $_POST['source_url'];
	$newUrl = rtrim(get_site_url(), '/');
	$site_lang = get_locale();
	foreach (glob($demo . '/data/*.txt') as $file) {
		$find = array($oldUrl, str_replace('/', '\/', $oldUrl), str_replace(array(':', '/'), array('%3A', '%2F'), $oldUrl));
		$replace = array($newUrl, str_replace('/', '\/', $newUrl), str_replace(array(':', '/'), array('%3A', '%2F'), $newUrl));
		$data = file($file);
		$query = '';
		foreach($data as $line){
			$line = str_replace(array(PHP_EOL, "\n", "\r"), '', $line);
			$query .= $line;
			if (substr(trim($line), -1, 1) == ';'){
				$query = str_replace($find, $replace, $query);
				$query = str_replace('`wp_', "`{$wpdb->prefix}", $query);
				$query = cmstheme_import_fix_serialization($query);
				if($wpdb->query($query) === false){
					wp_send_json(array('status' => 'failed', 'msg' => 'Import failed. ' . $query));
				}
				$query = '';
			}
		}
	}
	//Update site language
	add_option('WPLANG', $site_lang, true );
	if ($wpdb->prefix != 'wp_'){
		$query = "DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE '%{$wpdb->prefix}%'";
		$wpdb->query($query);
		$query = "UPDATE {$wpdb->prefix}options SET option_name = REPLACE(option_name, 'wp_', '{$wpdb->prefix}') WHERE option_name LIKE '%wp_%'";
		if($wpdb->query($query) == false){
			wp_send_json(array('status' => 'failed', 'msg' => 'Import failed. ' . $query));
		}
	}
	if ((extension_loaded('gd') && function_exists('gd_info')) == false) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		$query_images_args = array(
		    'post_type'      => 'attachment',
		    'post_mime_type' => 'image',
		    'post_status'    => 'inherit',
		    'posts_per_page' => - 1,
		);
		$query_images = new WP_Query( $query_images_args );
		foreach ( $query_images->posts as $image ) {
				$attach_data = wp_get_attachment_metadata($image->ID);
				unset($attach_data['sizes']);
				wp_update_attachment_metadata( $image->ID, $attach_data );
		}
	}
	wp_send_json(array('status' => 'ok', 'msg' => 'Done.', 'queries' => $queries));
}

function cmstheme_import_unescape_mysql($value) {
	return str_replace(array("\\\\", "\\0", "\\n", "\\r", "\Z",  "\'", '\"','\'\''),
					   array("\\",   "\0",  "\n",  "\r",  "\x1a", "'", '"','\''),
					   $value);
}
// Fix strange behaviour if you have escaped quotes in your replacement
function cmstheme_import_unescape_quotes($value) {
	return str_replace('\"', '"', $value);
}

// Fix Serialization
function cmstheme_import_fix_serialization($data) {
	//if(version_compare(phpversion(),  "7.0.0") >= 0){
	return preg_replace_callback('!s:(\d+):([\\\\]?"[\\\\]?"|[\\\\]?"((.*?)[^\\\\])[\\\\]?");!',
  	function($matches){
      if(!isset($matches[3])){
          $matches[3] = '';
      }
      return 's:'.strlen(cmstheme_import_unescape_mysql($matches[3])).':"'.cmstheme_import_unescape_quotes($matches[3]).'";';
  }, $data);
	//}
	//return preg_replace('!s:(\d+):([\\\\]?"[\\\\]?"|[\\\\]?"((.*?)[^\\\\])[\\\\]?");!e', "'s:'.strlen(cmstheme_import_unescape_mysql('$3')).':\"'.cmstheme_import_unescape_quotes('$3').'\";'", $data);
}
