<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package zo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
        <div class="st-comments-wrap clearfix">
            <ol class="comment-list">
				<?php wp_list_comments( 'type=comment&callback=logistics_comment' ); ?>
			</ol>
			<?php
				$post_trackbacks = get_comments(array('type' => 'trackback','post_id' => $post->ID));
				$post_pingbacks = get_comments(array('type' => 'pingback','post_id' => $post->ID));
			?>
			<?php if($post_trackbacks || $post_pingbacks) : ?>
			<h4 class="comments-title"><?php esc_html_e('Pingbacks And Trackbacks', 'am-logistics');?></h4>
			<ol>
			  <?php foreach ($comments as $comment) : ?>
			  <?php $comment_type = get_comment_type(); ?>
			  <?php if($comment_type != 'comment') { ?>
			  <li><?php comment_author_link() ?></li>
			  <?php } ?>
			  <?php endforeach; ?>
			</ol>
			<?php endif; ?>
			<?php echo logistics_comment_nav(); ?>
        </div>
	<?php endif; // have_comments() ?>

	<?php
	$commenter = wp_get_current_commenter();
	$allowed_html = array(
		"span" => array(),
	);
	$req = get_option( 'require_name__mail' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$args = array(
		'id_form'           => 'commentform',
		'id_submit'         => 'submit',
		'title_reply'       => wp_kses(__( '<span>Leave a comment</span>','am-logistics'), $allowed_html),
		'title_reply_to'    => esc_html__( 'Post to Reply %s','am-logistics'),
		'cancel_reply_link' => esc_html__( 'Cancel Reply','am-logistics'),
		'label_submit'      => esc_html__( 'Post Comment','am-logistics'),
		'class_submit'  => 'btn btn-primary',
		'comment_notes_before' => '',
		'fields' => apply_filters( 'comment_form_default_fields', array(

				'author' =>
					'<p class="comment-form-author">'.
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . esc_attr($aria_req) . ' placeholder="'.__('Name','am-logistics').'"/></p>',

				'email' =>
					'<p class="comment-form-email">'.
					'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . esc_attr($aria_req) . ' placeholder="'.__('Email','am-logistics').'"/></p>',
			)
		),
		'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.__('Your Message','am-logistics').'" aria-required="true"></textarea></p>'
	);
	comment_form($args);
	?>

</div><!-- #comments -->
