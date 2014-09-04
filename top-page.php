
		  <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		  <figure><?php the_post_thumbnail(); ?></figure>
			<?php else : ?>
			<figure><img src="<?php echo get_template_directory_uri(); ?>/images/upload/header_page.jpg" alt=" "></figure>
			<?php endif; ?>
			<nav class="crumbs-nav">
				<?php the_breadcrumb(); ?>
			  <!-- <span>HOME</span> &gt; <a href="#">INTERIOR PAGE HEADLINE</a> -->
			</nav>
