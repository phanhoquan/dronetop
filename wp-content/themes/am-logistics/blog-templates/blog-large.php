<?php
/* Start the Loop */
global $logistics_data;

while ( have_posts() ) : the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser blog-large'); ?>>
        <div class="zo-blog-media">
        <?php
        switch(get_post_format()){
            case '':
                if(!empty($logistics_data['blog_post_feature_media']) && has_post_thumbnail()){?>
                    <div class="zo-blog-image">
						<?php the_post_thumbnail(  'full' ); ?>
                    </div>
                <?php }
                break;
            case 'video':
                if(!empty($logistics_data['blog_post_feature_media'])){
                    echo '<div class="zo-blog-video">';
                    echo logistics_archive_video();
                    echo '</div>';
                }
                break;
            case 'gallery':
                if(!empty($logistics_data['blog_post_feature_media'])){
                    echo '<div class="zo-blog-gallery">';
                    echo logistics_archive_gallery('full');
                    ?>
                    <?php
                    echo '</div>';
                }
                break;
            case 'audio':

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
                break;
            case 'link':
                echo '<div class="zo-blog-link">';
                echo logistics_archive_link();
                echo '</div>';
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
                break;
        }?>
        </div>
		<?php
			if(!empty($logistics_data['blog_post_title'])){
				$title = get_the_title() ? get_the_title() : get_the_date('M.d, Y');
			?>
			<div class="zo-blog-meta">
				<ul>
					<?php if(!empty($logistics_data['blog_post_author'])){?>
						<li class="zo-blog-author">
							<?php the_author_link(); ?>
						</li>
					<?php }?>
					<?php if(!empty($logistics_data['blog_post_date'])){?>
						<li class="zo-blog-date">
							<?php
							$date_format = 'M.d, Y';
							if(!empty($logistics_data['blog_post_date_format'])){
								$date_format = $logistics_data['blog_post_date_format'];
							}
							echo get_the_date($date_format); ?>
						</li>
					<?php }?>
					<?php if(!empty($logistics_data['blog_post_categories'])){?>
						<li class="zo-blog-category">
							<?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
						</li>
					<?php }?>
					<?php if(has_tag() && !empty($logistics_data['blog_post_tags'])){ ?>
						<li class="zo-blog-tag"><?php the_tags('', ', '); ?></li>
					<?php } ?>
					<?php if(!empty($logistics_data['blog_post_comment'])){?>
						<li class="zo-blog-comment">
							<a href="<?php the_permalink(); ?>#comment"><?php echo comments_number('0','1','%'); ?></a><?php echo esc_html__(' Comments', 'am-logistics'); ?>
						</li>
					<?php }?>
				</ul>
			</div>
		<?php
			}
		?>
        <div class="zo-blog-detail">
            <h3 class="zo-blog-title">
                <a title="<?php echo esc_attr($title); ?>" href="<?php the_permalink() ?>" rel=""><?php echo esc_attr($title); ?></a>
            </h3>
            <div class="zo-blog-content">
                <?php
					if(get_post_type( get_the_ID() ) != 'page'):
						the_excerpt();
					endif;
					wp_link_pages( array(
						'before'      => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'am-logistics' ) . '</span>',
						'after'       => '</p>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
                ?>
            </div>
            <div class="zo-blog-link row">
                <div class="zo-blog-readmore col-xs-12">
                    <?php if(!empty($logistics_data['blog_post_readmore'])){?>
                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                        <?php if(!empty($logistics_data['blog_post_readmore_text']))
                                echo esc_attr($logistics_data['blog_post_readmore_text']);
                            else
                                echo esc_html__('[Read more]', 'am-logistics'); ?>
                    </a>
                    <?php }?>
                </div>
                <div class="zo-blog-social col-xs-12">
                    <?php if(!empty($logistics_data['blog_post_social'])){?>
                        <?php echo logistics_social_share(); ?>
                    <?php }?>
                </div>
            </div>
        </div>
    </article>
<?php
endwhile;
logistics_paging_nav();
