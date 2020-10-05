<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */

get_header();
	$settings = logistics_get_blog_single_setting();
	$sidebar_size = (int)$settings['body_sidebar_size'];
	$content_size = 12;
	$offset = 0;
	if($settings['blog_single_sidebar']!='none'){
		$content_size = 12 - $sidebar_size;
	}
	$container = 'container';
	$content_class = '';
//	echo "<pre>";
//	var_dump($settings);
	if($offset){
		$content_class.= 'col-xs-12 col-sm-12';
		$content_class.= ' col-sm-offset-' . $offset;
		$content_class.= ' col-md-' . $content_size;
		$content_class.= ' col-md-offset-' . $offset;
		$content_class.= ' col-lg-' . $content_size;
		$content_class.= ' col-lg-offset-' . $offset;
	}else{
		$content_class.= 'col-xs-12 col-sm-12';
		$content_class.= ' col-md-' . $content_size;
		$content_class.= ' col-lg-' . $content_size;
	}
	if(!empty($settings['blog_layout_sidebar_bg']) && $sidebar_size){ ?>
		<div class="zo-sidebar-background <?php echo 'zo-sidebar-' . esc_attr($settings['blog_single_sidebar']) . '-' . esc_attr($sidebar_size) . ' ' .'zo-sidebar-' . esc_attr($settings['blog_single_sidebar']) . ' zo-sidebar-' . esc_attr($container);?>">
<?php
	}
 if(!empty($post_meta['content_width'])){
        $settings['blog_single_width'] = $post_meta['content_width'];
    }
?>
<div class="zo-blog-body <?php echo esc_attr($settings['blog_single_width']);?>">
        <div class="row">
		<?php if($settings['blog_single_sidebar'] == 'left'){?>
            <div class="zo-sidebar-col col-xs-12 col-sm-12 col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <div class="<?php echo esc_attr($content_class) ?> zo-blog-single">
			<?php while ( have_posts() ) : the_post();
				$team_meta = logistics_post_meta();
			?>
			<!-- #content -->
				<div class="zo-blog-detail-single">
				<?php
							if(empty($post_meta['post_layout'])){
								switch(get_post_format()){
									case '':
										if(!empty($settings['blog_single_media']) && has_post_thumbnail()){
											echo '<div class="zo-blog-image">';
											the_post_thumbnail(  'full' );

											echo '</div>';
										}
										$content = get_the_content();
										break;
									case 'video':
										if(!empty($settings['blog_single_media'])){
											echo '<div class="zo-blog-video">';
											echo logistics_archive_video();
											echo '</div>';
										}
										$content = apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[video(.*)](.*)\[\/video\]/'), '', get_the_content(), 1));
										break;
									case 'gallery':
										if(!empty($settings['blog_single_media'])){
											echo '<div class="zo-blog-gallery">';
											echo logistics_archive_gallery('full');
											echo '</div>';
										}
										$content = apply_filters('the_content', preg_replace('/\[gallery.*ids=.(.*).\]/', '', get_the_content()));
										break;
									case 'audio':
										echo '<div class="zo-blog-audio">';
										// Check image
										if(has_post_thumbnail()) {
											echo '<div class="zo-blog-audio zo-image-media">';
										   ?>
											<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
										<?php
										}
										else {
											echo '<div class="zo-blog-audio">';
										}
										echo logistics_archive_audio();
										echo '</div>';
										$content = apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[audio(.*)](.*)\[\/audio\]/'), '', get_the_content(), 1));
										break;
									case 'link':
										echo '<div class="zo-blog-link">';
										echo logistics_archive_link();
										echo '</div>';
										$content = apply_filters('the_content', preg_replace('/<a(.*)href=\"(.*)\"(.*)<\/a>/', '', get_the_content()));
										break;
									case 'quote':
										if(has_post_thumbnail()) {
											echo '<div class="zo-blog-quote zo-image-media">';
											?>
											<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
											<?php

										}
										else {
											echo '<div class="zo-blog-quote">';

										}
										 echo logistics_archive_quote();
										echo '</div>';
										$content = apply_filters('the_content', preg_replace('/<blockquote>(.*)<\/blockquote>/', '', get_the_content()));
										break;
								}
							}
						?>
				<div class="zo-blog-meta">
					<ul>
						<?php if(!empty($settings['blog_single_date'])) { ?>
							<?php if(!empty($settings['blog_single_author'])) { ?>
						<li class="zo-single-author">
							<?php echo get_the_author(); ?>
						</li>
						<?php }?>
						<li class="zo-single-date">
							<?php $date_format = 'M.d, Y';
							if(!empty($settings['blog_single_date_format'])){
								$date_format = $settings['blog_single_date_format'];
							}
							echo get_the_date($date_format); ?>
						</li>
						<?php } ?>
						
						<?php if(!empty($settings['blog_single_categories'])) { ?>
						<li class="zo-single-categories">
							<?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?>
						</li>
						<?php } ?>
						<?php if(!empty($settings['blog_single_tags'])) { ?>
						<li class="zo-single-tags">
							<?php the_tags('', ', '); ?>
						</li>
						<?php }?>
					</ul>
						</div>
				</div>
				<div class="zo-blog-single-content">
					<?php if(!empty($settings['blog_single_title'])) {?>
						<h3 class="zo-team-title"><?php the_title(); ?></h3>
					<?php }?>
				<?php the_content(); ?>
			    <?php if(!empty($settings['blog_single_social'])){?>
					<div class="zo-single_social">
						<?php echo logistics_social_share();?>
					</div>
				<?php }?>
				  <?php if($settings['blog_single_pagination'] == 1 ) {
					logistics_post_nav();
				  }?>
				  <div class="zo-blog-count-comment">

						<?php if(!empty($settings['blog_single_comment'])){
						   echo comments_number('0','1','%');
						   esc_html_e(" Comment", 'am-logistics');
						};?>
				  </div>
				<?php if(!empty($settings['blog_single_comment'])){?>
					<div class="zo-blog-single-comment">
						<?php comments_template( '', true ); ?>
					</div>
				<?php }?>
				</div><!-- #content -->
			<?php endwhile; // end of the loop. ?>
        </div>
		<?php if($settings['blog_single_sidebar'] == 'right'){?>
            <div class="zo-sidebar-col col-xs-12 col-sm-12 col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
	</div>
</div>

<?php

get_footer();
