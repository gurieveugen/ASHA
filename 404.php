<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	  <div class="top-page cf">
	    <?php include TEMPLATEPATH . '/top-page.php'; ?>	
			<header>
			  <h1><?php _e( 'Not found', 'twentythirteen' ); ?></h1>
			</header>
		</div>

    <div class="center-box">
		  <div class="left-page">

			<header class="page-header">
				<h1 class="page-title"></h1>
			</header>

				<article class="post-page">
					<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentythirteen' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

					<?php get_search_form(); ?>
				</article><!-- #post -->
			</div>

<?php get_sidebar(); ?>
		</div>

<?php get_footer(); ?>