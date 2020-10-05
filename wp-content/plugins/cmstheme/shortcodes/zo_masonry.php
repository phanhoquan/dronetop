<?php
vc_map(
	array(
		"name" => __("ZO Masonry", 'cmstheme'),
	    "base" => "zo_masonry",
	    "class" => "vc-zo-masonry",
	    "category" => __("ZoTheme Shortcodes", 'cmstheme'),
	    "params" => array(
	    	array(
	            "type" => "loop",
	            "heading" => __("Source",'cmstheme'),
	            "param_name" => "source",
	            'settings' => array(
	                'size' => array('hidden' => false, 'value' => 10),
	                'order_by' => array('value' => 'date')
	            ),
	            "group" => __("Source Settings", 'cmstheme'),
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns XS Devices",'cmstheme'),
	            "param_name" => "col_xs",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 1,
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns SM Devices",'cmstheme'),
	            "param_name" => "col_sm",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 2,
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns MD Devices",'cmstheme'),
	            "param_name" => "col_md",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 3,
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns LG Devices",'cmstheme'),
	            "param_name" => "col_lg",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 4,
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Filter on Masonry",'cmstheme'),
	            "param_name" => "filter",
	            "value" => array(
                    "Disable" => 0,
	            	"Enable" => 1
	            ),
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Grid item margin",'cmstheme'),
                "param_name" => "margin",
                "value" => 0,
                "group" => __("Grid Settings", 'cmstheme')
            ),
            array(
                "type" => "textfield",
                "heading" => __("Aspect ratio",'cmstheme'),
                "description" => __("The ratio of width to height",'cmstheme'),
                "param_name" => "ratio",
                "value" => 0.5,
                "group" => __("Grid Settings", 'cmstheme')
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",'cmstheme'),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("",'cmstheme'),
	            "group" => __("Template", 'cmstheme')
	        ),
            array(
                "type" => "dropdown",
                "heading" => __("Title Size", 'cmstheme'),
                "param_name" => "zo_title_size",
                "value" => array(
                    "H2" => "h2",
                    "H3" => "h3",
                    "H4" => "h4",
                    "H5" => "h5",
                    "H6" => "h6"
                ),
                "group" => __("Template", 'cmstheme'),
            ),
	    	array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "shortcode" => "zo_masonry",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",'cmstheme'),
	            "group" => __("Template", 'cmstheme'),
	        )
	    )
	)
);
//Masonry settings global
global $zo_masonry;
$zo_masonry = array();
class WPBakeryShortCode_zo_masonry extends ZoShortcode{
	protected function content($atts, $content = null){
        $html_id = zoHtmlID('zo-masonry');
        $source = $atts['source'];
        list($args, $wp_query) = vc_build_loop_query($source);
        $atts['cat'] = isset($args['cat']) ? $args['cat']: '';
        /* get posts */
        $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

        if($paged > 1){
            $args['paged'] = $paged;
            $wp_query = new WP_Query($args);
        }

        $atts['posts'] = $wp_query;

        $grid = shortcode_atts(array(
            'col_lg' => 4,
            'col_md' => 3,
            'col_sm' => 2,
            'col_xs' => 1,
            'layout' => 'basic',
            'margin' => 0,
            'ratio' => 0.5,
            'zo_template' => 'zo_masonry.php'
        ), $atts);

        $atts['item_class'] = "zo-masonry-item";

        $class = isset($atts['class'])?$atts['class']:'';
        $atts['template'] = 'template-'.str_replace('.php','',$atts['zo_template']). ' '. $class;
        $atts['post_id'] = get_the_ID();
        $atts['html_id'] = $html_id;
        //Masonry Settings
        global $zo_masonry;
        $zo_masonry[$html_id] = array(
            'post_id' => get_the_ID(),
            'margin' => (int)$atts['margin'],
            'ratio' => (float)$atts['ratio'],
            'xs_cols' => (int)$grid['col_xs'],
            'sm_cols' => (int)$grid['col_sm'],
            'md_cols' => (int)$grid['col_md'],
            'lg_cols' => (int)$grid['col_lg'],
        );

        wp_localize_script('zo-masonry', "zoMasonry", $zo_masonry);
        wp_enqueue_script('zo-masonry');

        if( current_user_can( 'manage_options' )  ) {
            wp_enqueue_script('jquery-ui-resizable');
            wp_enqueue_style('zo-jquery-ui');
            wp_localize_script('zo-masonry-admin', 'zo_admin', array('ajaxurl' => admin_url('admin-ajax.php')));
            //wp_enqueue_script('admin');
            wp_enqueue_script('zo-masonry-admin');
        }
		return parent::content($atts, $content);
	}
}

if( !function_exists('zo_masonry_callback') ) {
    /**
     * Masonry Callback Function
     * Using for save item size
     */
    function zo_masonry_callback()
    {
        $postID = $_POST['pid'];
        $id = str_replace('-', '_', $_POST['id']);
        $item = $_POST['item'];
        $width = $_POST['width'];
        $height = $_POST['height'];
        $data = json_encode(array(
            'item' => $item,
            'width' => $width,
            'height' => $height
        ));
        $result = get_post_meta($postID, '_zo_masonry_' . $id . $item, true);
        if ($result == '') {
            delete_post_meta($postID, '_zo_masonry_' . $id . $item);
            add_post_meta($postID, '_zo_masonry_' . $id . $item, $data);
        } else {
            update_post_meta($postID, '_zo_masonry_' . $id . $item, $data);
        }
        wp_send_json(array(
            'status' => 200,
            'msg' => 'success',
        ));
    }
}

add_action('wp_ajax_zo_masonry_save', 'zo_masonry_callback');


if( !function_exists('zo_masonry_size') ) {
    /**
     * Get Masonry Item size
     *
     * @return array(width,height)
     */
    function zo_masonry_size($postID, $id, $item) {
        $id = str_replace('-', '_', $id);
        $result = get_post_meta($postID , '_zo_masonry_' . $id  . $item, true);
        if( $result ) {
            return json_decode($result, true);
        }
        return array(
            'width' => 1,
            'height' => 1
        );
    }
}
