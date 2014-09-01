<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	  <div class="top-page cf">
	    <?php include TEMPLATEPATH . '/top-page.php'; ?>	
			<header>
			  <h1><?php the_title(); ?></h1>
			</header>
		</div>
		
    <div class="center-box">
		  <div class="left-page">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>"  class="post-page">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</article><!-- #post -->

			<?php endwhile; ?>

			</div>

<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>