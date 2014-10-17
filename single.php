<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	  <div class="top-page cf">
	    <?php include TEMPLATEPATH . '/top-page.php'; ?>	
			<header>
			  <h1><?php printf( __( 'Tag Archives: %s', 'twentythirteen' ), single_tag_title( '', false ) ); ?></h1>
			</header>
		</div>
		
    <div class="center-box">
		  <div class="left-page">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>

			</div>

<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>