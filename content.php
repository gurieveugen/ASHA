<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

			  <article id="post-<?php the_ID(); ?>" class="blog-post cf">
				  <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
					<figure class="top-img"><?php the_post_thumbnail(); ?></figure>
					<?php endif; ?>
					
					<div class="entry">
					  <?php if ( !is_single() ) : ?>
					  <header>
						  <h2 class="tit"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					  </header>
						<?php endif; // is_single() ?>
						<?php if ( is_single() ) : ?>
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						<?php else : ?>
						<?php the_excerpt(); ?> 
						<?php endif; // is_single() ?>
						<footer>
							<span><?php echo get_the_date('d M, Y'); ?></span>
							<span class="comments"><?php comments_number( '0', '1', '%' ); ?></span>
							<span class="autor"><?php the_author(); ?></span>
							<span class="categories"><?php the_category(', '); ?></span>
						</footer>						
					</div>
					
					<?php if ( is_single() ) : ?>
					<div class="share-post cf">
						<h4>Share this:</h4>
						<span class='st_facebook_hcount' displayText='Facebook'></span>
						<span class='st_twitter_hcount' displayText='Tweet'></span>
						<span class='st_pinterest_hcount' displayText='Pinterest'></span>
						<!-- <ul>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/upload/test_01.gif" alt=" " style="display:block;"></a></li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/upload/test_02.gif" alt=" " style="display:block;"></a></li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/upload/test_03.gif" alt=" " style="display:block;"></a></li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/upload/test_04.gif" alt=" " style="display:block;"></a></li>
						</ul> -->
					</div>					
					<?php endif; // is_single() ?>
				</article>
				
