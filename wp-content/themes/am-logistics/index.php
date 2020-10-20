<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
get_header();

	$settings = logistics_get_blog_setting();
	$sidebar_size = (int)$settings['body_sidebar_size'];
	$content_size = 12;
	if($settings['blog_layout_sidebar']!='none'){
		$content_size = 12 - $sidebar_size;
	}
	$container = 'container';

	if(!empty($settings['blog_layout_sidebar_bg']) && $sidebar_size){
?>
		<div class="zo-sidebar-background <?php echo 'zo-sidebar-' . esc_attr($settings['blog_layout_sidebar']) . '-' . esc_attr($sidebar_size) . ' ' .'zo-sidebar-' . esc_attr($settings['blog_layout_sidebar']) . ' zo-sidebar-' . esc_attr($container);?>">
<?php
	}
?>

<div class="<?php echo esc_attr($settings['blog_layout_width']);?>">
    <div class="header-title-product top-0 mb-40">
        <h3>
            <?php esc_html_e('NEWS', 'am-logistics');?>
        </h3>
    </div>
    <div class="row">
        
    <?php if($settings['blog_layout_sidebar'] == 'left'){?>
            <div class="zo-sidebar-col col-xs-12 col-sm-<?php echo esc_attr($sidebar_size);?> col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <div id="zo-content" class="blog-news col-xs-12 col-sm-<?php echo esc_attr($content_size);?> col-md-<?php echo esc_attr($content_size);?> col-lg-<?php echo esc_attr($content_size);?>">
           
        <div id="content" role="main">
                <?php if ( have_posts() ) : ?>
                    <?php get_template_part( 'blog-templates/blog', $settings['blog_layout'] ); ?>
                <?php else : ?>

                    <article id="post-0" class="post no-results not-found">

                        <?php if ( current_user_can( 'edit_posts' ) ) :
                            // Show a different message to a logged-in user who can add posts.
                            ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php esc_html_e( 'No posts to display', 'am-logistics' ); ?></h1>
                            </header>

                            <div class="entry-content">
                                <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'am-logistics' ), admin_url( 'post-new.php' ) ); ?></p>
                            </div><!-- .entry-content -->

                        <?php else :
                            // Show the default message to everyone else.
                            ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'am-logistics' ); ?></h1>
                            </header>

                            <div class="entry-content">
                                <p><?php esc_html_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'am-logistics' ); ?></p>
                                <?php get_search_form(); ?>
                            </div><!-- .entry-content -->
                        <?php endif; // end current_user_can() check ?>

                    </article><!-- #post-0 -->

                <?php endif; // end have_posts() check ?>

            </div><!-- #content -->
        </div><!-- #primary -->

        <?php if($settings['blog_layout_sidebar'] == 'right'){?>
            <div class="zo-sidebar-col col-xs-12 col-sm-<?php echo esc_attr($sidebar_size);?> col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
    </div>
</div>

<?php if(!empty($settings['blog_layout_sidebar_bg']) && $sidebar_size){?>
	</div>
<?php } ?>

<?php

get_footer();
