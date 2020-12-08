<?php
vc_map(
	array(
		"name" => __("ZO Grid", 'cmstheme'),
	    "base" => "zo_grid",
	    "class" => "vc-zo-grid",
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
	            "heading" => __("Layout Type",'cmstheme'),
	            "param_name" => "layout",
	            "value" => array(
	            	"Basic" => "basic",
	            	"Masonry" => "masonry",
	            	),
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Full Width?",'cmstheme'),
	            "param_name" => "grid_width",
	            "value" => array(
	            	"Yes" => "true",
	            	"No" => "false",
	            	),
	            "group" => __("Grid Settings", 'cmstheme'),
                "std" => 'false',
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns XS Devices",'cmstheme'),
	            "param_name" => "col_xs",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,5,6,12),
	            "std" => 1,
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns SM Devices",'cmstheme'),
	            "param_name" => "col_sm",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,5,6,12),
	            "std" => 2,
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns MD Devices",'cmstheme'),
	            "param_name" => "col_md",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,5,6,12),
	            "std" => 3,
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns LG Devices",'cmstheme'),
	            "param_name" => "col_lg",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,5,6,12),
	            "std" => 4,
	            "group" => __("Grid Settings", 'cmstheme')
	        ),
            array(
                "type" => "dropdown",
                "heading" => __("Image size",'cmstheme'),
                "param_name" => "image_size",
                "value" => array(
                        "Small (200x200px: Hard crop to exact dimensions)" => "thumb-small",
                        "Medium (Crop to 520px width, unlimited height)" => "thumb-medium",
                        "Large (Soft proprtional crop to max 720px width, max 480px height)" => "thumb-large",
                        "Full (No resize)" => "full",
                        "Custom size" => "custom",
                ),
                "std" => "thumb-medium",
                "description" => __("Select the Image size you want to re-size",'cmstheme'),
            ),
            array(
	            "type" => "textfield",
	            "heading" => __("Image Width",'cmstheme'),
	            "param_name" => "image_width",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => "200",
	            "description" => __("Input image width",'cmstheme'),
                "dependency" => array(
	            	"element" => "image_size",
	            	"value" => "custom"
                ),
	        ),
            array(
	            "type" => "textfield",
	            "heading" => __("Image Height",'cmstheme'),
	            "param_name" => "image_height",
                "edit_field_class" => "vc_col-sm-6 vc_column",
	            "value" => "200",
	            "description" => __("Input image height",'cmstheme'),
                "dependency" => array(
	            	"element" => "image_size",
	            	"value" => "custom"
                ),
	        ),
			array(
				"type" => "dropdown",
                "heading" => __("Display Pagination",'cmstheme'),
                "param_name" => "display_pagination",
                "edit_field_class" => "vc_col-sm-6 vc_column",
				"value" => array(
					"Disable" => false,
					"Enable" => true
				),
				"std" => true
			),
			array(
				"type" => "textfield",
                "heading" => __("GAP",'cmstheme'),
                "param_name" => "item_gap",
                "edit_field_class" => "vc_col-sm-6 vc_column",
				"value" => "30",
	            "description" => __("Ex: enter 30.",'cmstheme'),
			),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Filter on Masonry",'cmstheme'),
	            "param_name" => "filter",
	            "value" => array(
                    "Disable" => 0,
	            	"Enable" => 1
	            ),
	            "dependency" => array(
	            	"element" => "layout",
	            	"value" => "masonry"
                ),
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
                "heading" => __("Title Element",'cmstheme'),
                "param_name" => "title_element",
                "edit_field_class" => "vc_col-sm-6 vc_column",
                "value" => array(
                        "H2" => "h2",
                        "H3" => "h3",
                        "H4" => "h4",
                        "H5" => "h5",
                        "H6" => "h6"
                ),
                "std" => "h3",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Title Link",'cmstheme'),
                "param_name" => "title_link",
                "edit_field_class" => "vc_col-sm-6 vc_column",
                "value" => array(
                        "Yes" => 1,
                        "No" => 0
                ),
                "std" => 1,
                "description" => __("Link to single post",'cmstheme'),
            ),
            array(
	            "type" => "textfield",
	            "heading" => __("Number of words",'cmstheme'),
	            "param_name" => "num_words",
	            "value" => "15",
	            "description" => __("The value trims text to a certain number of words and returns the trimmed text for post content.",'cmstheme'),
	        ),
	    	array(
	            "type" => "zo_template",
	            "param_name" => "zo_template",
	            "shortcode" => "zo_grid",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",'cmstheme'),
	            "group" => __("Template", 'cmstheme'),
	        )
	    )
	)
);
class WPBakeryShortCode_zo_grid extends ZoShortcode{
	protected function content($atts, $content = null){
		wp_enqueue_script('zo-grid-pagination',ZO_JS.'zogrid.pagination.js',array('jquery'),'1.0.0',true);
        $html_id = zoHtmlID('zo-grid');
        $source = $atts['source'];
        list($args, $wp_query) = vc_build_loop_query($source);

        $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

	    if($paged > 1){
	    	$args['paged'] = $paged;
	    	$wp_query = new WP_Query($args);
	    }
        $atts['cat'] = isset($args['cat'])?$args['cat']:'';
        /* get posts */
        $atts['posts'] = $wp_query;
        $grid = shortcode_atts(array(
            'col_lg' => 4,
            'col_md' => 3,
            'col_sm' => 2,
            'col_xs' => 1,
            'layout' => 'basic',
            'grid_width' => 'false',
	        'zo_template' => 'zo_grid.php',
            'image_size' => 'thumb-medium',
            'image_height' => '200',
            'image_width' => '200',
            'item_gap' => '30',
            'title_element' => 'h3',
            'title_link' => 1,
            'num_words' => '15',
                ), $atts);
        $col_lg = $grid['col_lg'] == 5 ? '2-zo' : 12 / $grid['col_lg'];
        $col_md = $grid['col_md'] == 5 ? '2-zo' : 12 / $grid['col_md'];
        $col_sm = $grid['col_sm'] == 5 ? '2-zo' : 12 / $grid['col_sm'];
        $col_xs = $grid['col_xs'] == 5 ? '2-zo' : 12 / $grid['col_xs'];
        $atts['item_class'] = " col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
        $atts['grid_class'] = "";
        $atts['image_size'] = $grid['image_size'];
        $atts['image_height'] = $grid['image_height'];
        $atts['image_width'] = $grid['image_width'];
        $atts['item_gap'] = $grid['item_gap'];
        $atts['title_element'] = $grid['title_element'];
        $atts['title_link'] = $grid['title_link'];
        $atts['num_words'] = $grid['num_words'];
		if(!empty($atts['display_pagination'])){
			$big = 999999999;
			$atts['pagination'] = paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => ( ( get_option( 'permalink_structure' ) && ! $wp_query->is_search ) || ( is_home() && get_option( 'show_on_front' ) !== 'page' && ! get_option( 'page_on_front' ) ) ) ? '?paged=%#%' : '&paged=%#%', // %#% will be replaced with page number
				'current' => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
				'mid_size' => 1,
				'total' => $wp_query->max_num_pages,
				'prev_text' => wp_kses(__( '<i class="fa fa-angle-left"></i>', 'ori' ), array( 'i' => array( 'class' => array() ) ) ),
				'next_text' => wp_kses(__( '<i class="fa fa-angle-right"></i>', 'ori' ), array( 'i' => array( 'class' => array() ) ) ),
			));
		}
        $class = isset($atts['class'])?$atts['class']:'';
        if(!empty($atts['grid_width']) && $atts['grid_width']=='true'){
            $class .= ' container-fluid';
        }else{
            $class .= ' container';
        }
        $atts['template'] = 'template-'.str_replace('.php','',$atts['zo_template']). ' '. $class;
        if ($grid['layout'] == 'masonry') {
            wp_enqueue_script('zo-jquery-shuffle');
            $atts['grid_class'] .= " zo-grid-{$grid['layout']}";
        }else{
            $atts['grid_class'] .= " zo-lg-" . $grid['col_lg'] . "cols";
            $atts['grid_class'] .= " zo-md-" . $grid['col_md'] . "cols";
            $atts['grid_class'] .= " zo-sm-" . $grid['col_sm'] . "cols";
            $atts['grid_class'] .= " zo-xs-" . $grid['col_xs'] . "cols";
        }
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}
