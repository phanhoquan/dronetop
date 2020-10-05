<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label', 'am-logistics' ); ?></label>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_html_e('Search . . .', 'am-logistics')?>" />
        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'am-logistics' ); ?>" />
    </div>
</form>
