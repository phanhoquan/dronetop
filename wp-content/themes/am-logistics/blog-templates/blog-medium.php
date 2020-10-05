
<?php
/* Start the Loop */
global $logistics_data;

while ( have_posts() ) : the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser blog-medium'); ?>>
        <div class="row">
            <div class="zo-blog-media col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <?php
            switch(get_post_format()){
                case '':
                    if(!empty($logistics_data['blog_post_feature_media']) && has_post_thumbnail()){?>
                        <div class="zo-blog-image">
                            <?php
                                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                $attachment_full_image = $attachment_image[0];
                                $image_resize = zo_image_resize($attachment_full_image, 320, 200, true );
                            ?>
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                                <?php 
                                if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)){
                                    echo '<img src="'. esc_url($image_resize) .'" alt="' . get_the_title() . '">';
                                }else{
                                 echo '<img src="' . esc_url(ZO_IMAGES . 'no-image.jpg') . '" alt="' . get_the_title() . '" />';
                                }
                                
                                // the_post_thumbnail(  'full' );
                                
                                ?>
                            </a>
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
                        echo '<div class="zo-blog-image zo-blog-gallery">';
                        echo logistics_archive_gallery('full');

                        echo '</div>';
                    }
                    break;
                case 'audio':
                    echo '<div class="zo-blog-audio">';
                    if(has_post_thumbnail()) {
                        ?>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                            <?php the_post_thumbnail(  'full' ); ?>
                        </a>
                        <?php
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
                        echo '<div class="zo-blog-quote">';
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
            <div class="zo-blog-detail col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php if(!empty($logistics_data['blog_post_title'])){?>
                <h3 class="zo-blog-title">
                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a>
                </h3>
                <?php }?>
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
                <div class="zo-blog-content">
                    <?php
                    if(get_post_type( get_the_ID() ) != 'page'):
                        the_excerpt();
                    endif;
                    ?>
                </div>
                <div class="zo-blog-link row">
                    <div class="zo-blog-readmore col-xs-5">
                        <?php if(!empty($logistics_data['blog_post_readmore'])){?>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                            <?php if(!empty($logistics_data['blog_post_readmore_text']))
                                    echo esc_attr($logistics_data['blog_post_readmore_text']);
                                else
                                    echo esc_html__('Read More', 'am-logistics'); ?>
                        </a>
                        <?php }?>
                    </div>
                    <div class="zo-blog-social col-xs-7">
                        <?php if(!empty($logistics_data['blog_post_social'])){?>
                            <?php echo logistics_social_share(); ?>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php
endwhile;

logistics_paging_nav();
?>
