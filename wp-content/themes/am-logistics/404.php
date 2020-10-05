<?php

get_header();

?>
	<div id="page">
		<div id="main">
			<div id="primary" class="site-content">
				<div id="content" role="main" class="container">

					<article id="post-0" class="entry-error404 no-results not-found">
						<header class="entry-header">
							<div class="logistics-404">
								<h1><?php esc_html_e('404', 'am-logistics'); ?></h1>
							</div>
						</header>

						<div class="entry-content">
							<h2><?php esc_html_e('Opps! This page could not be found!', 'am-logistics'); ?></h2>
							<p><?php esc_html_e('Sorry bit the page you are looking for does exist, have been removed or name changed', 'am-logistics'); ?></p>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<a class="btn btn-white btn-home" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back To Homepage', 'am-logistics'); ?></a>
						</footer>
					</article><!-- #post-0 -->

				</div><!-- #content -->
			</div><!-- #primary -->
		</div><!-- #main -->
	</div><!-- #page -->
<?php
if (is_active_sidebar('bottom-sidebar')): ?>
	<div class="zo-single-bottom-sidebar">
		<?php dynamic_sidebar('bottom-sidebar'); ?>
	</div>
<?php endif; ?>
<?php get_footer();
