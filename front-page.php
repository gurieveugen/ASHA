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

    <div class="slider-home cf">
		  <aside>
			  <ul>
				  <li>
					  <figure><img src="<?php echo get_template_directory_uri(); ?>/images/upload/img_01.jpg" alt=" "></figure>
						<div class="txt">
						  <h3>Connecting Health & Learning</h3>
							<a href="#" class="more">Learn more</a>
						</div>
					</li>
					
					<li>
					  <figure><img src="<?php echo get_template_directory_uri(); ?>/images/upload/img_01.jpg" alt=" "></figure>
						<div class="txt">
						  <h3>Connecting Health & Learning</h3>
							<a href="#" class="more">Learn more</a>
						</div>
					</li>
				</ul>
			</aside>
			
			<nav>
			  <a href="#" class="prev">prev</a>
				<a href="#" class="next">next</a>
			</nav>
		</div>
		
		<div class="enewsletter-home">
		  <form>
		    <span class="icon-mail">mail</span>
			  <label>Sign up for our E-newsletter</label>
			  <input type="text" value="Name" class="txt">
				<input type="text" value="Email" class="txt">
				<input type="submit" value="submit" class="submit">
			</form>
		</div>
		
		<div class="event-home cf">
			<header>
				<h2>Featured Event Headline</h2>
			</header>
			<div class="date">OCTOBER 9-11</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod vestibulum tellus sed sollicitudin. Vestibulum cursus venenatis vestibulum. Ut ut magna tempor, accumsan orci vel, mollis tortor. Praesent eu bibendum orci. Vestibulum ullamcorper malesuada ipsum sit amet malesuada.</p>
		</div>
		
		<div class="posts-home cf">
		  <div class="center-box">
			  <ul>
				  <li>
					  <article>
						  <figure><img src="<?php echo get_template_directory_uri(); ?>/images/upload/img_02.jpg" alt=" "></figure>
							<header>
							  <h2><a href="#">Featured Post Headline</a></h2>
							</header>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod m tellus sed sollicitudin. Vestibulum cursus venenatis vestibulum.</p>
							<a href="#" class="more">Learn more</a>
						</article>
					</li>
					
					<li>
					  <article>
						  <figure><img src="<?php echo get_template_directory_uri(); ?>/images/upload/img_03.jpg" alt=" "></figure>
							<header>
							  <h2><a href="#">Featured Post Headline</a></h2>
							</header>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod m tellus sed sollicitudin. Vestibulum cursus venenatis vestibulum.</p>
							<a href="#" class="more">Learn more</a>
						</article>
					</li>
					
					<li>
					  <article>
						  <figure><img src="<?php echo get_template_directory_uri(); ?>/images/upload/img_04.jpg" alt=" "></figure>
							<header>
							  <h2><a href="#">Featured Post Headline</a></h2>
							</header>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod m tellus sed sollicitudin. Vestibulum cursus venenatis vestibulum.</p>
							<a href="#" class="more">Learn more</a>
						</article>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="tweet-home cf">
		  <div class="center-box">
			  <aside>
				  <ul>
					  <li>
						  <p>Cukjm sociis nato nati bus et is parturient monteseu tortor raesent as nato nati bus et is parturiccumsan.</p>
						  <span><a href="#">#samplehashtag</a>  #example  |  9:00 AM  April 3</span>
						</li>
						<li>
						  <p>Cukjm sociis nato nati bus et is parturient monteseu tortor raesent as nato nati bus et is parturiccumsan.</p>
						  <span><a href="#">#samplehashtag</a>  #example  |  9:00 AM  April 3</span>
						</li>
						<li>
						  <p>Cukjm sociis nato nati bus et is parturient monteseu tortor raesent as nato nati bus et is parturiccumsan.</p>
						  <span><a href="#">#samplehashtag</a>  #example  |  9:00 AM  April 3</span>
						</li>
					</ul>
				</aside>
				
				<nav>
				  <a href="#" class="prev">prev</a>
					<a href="#" class="next">next</a>
				</nav>
			</div>
		</div>
<?php get_footer(); ?>