<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Mercury already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
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
	if($settings['blog_archive_layout_sidebar']!='none'){
		$content_size = 12 - $sidebar_size;
	}
	$container = 'container';

	if(!empty($settings['blog_archive_layout_sidebar_bg']) && $sidebar_size) {

?>
		<div class="zo-sidebar-background <?php echo 'zo-sidebar-' . esc_attr($settings['blog_archive_layout_sidebar']) . '-' . esc_attr($sidebar_size) . ' ' .'zo-sidebar-' . esc_attr($settings['blog_archive_layout_sidebar']) . ' zo-sidebar-' . esc_attr($container);?>">
<?php
	}
?>

<div class="container">
    <div class="row">
        
        <section id="zo-content" class="archive-content col-xs-12 col-sm-<?php echo esc_attr($content_size);?> col-md-<?php echo esc_attr($content_size);?> col-lg-<?php echo esc_attr($content_size);?>">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>

                <?php get_template_part( 'blog-templates/blog', $settings['blog_archive_layout'] ); ?>

            <?php else : ?>
                <?php get_template_part( 'single-templates/content', 'none' ); ?>
            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->
       
    </div>
</div>

<?php
	if(!empty($settings['blog_archive_layout_sidebar']) && $sidebar_size) {
?>
		</div>
<?php
	}
?>

<?php if (is_active_sidebar('body-bottom-sidebar')): ?>
    <div class="zo-content-bottom-sidebar">
		<?php dynamic_sidebar('body-bottom-sidebar'); ?>
    </div>
<?php endif; ?>

<?php

get_footer();
