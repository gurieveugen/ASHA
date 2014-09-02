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

get_header(); 

$slider_count = intval(get_option('mso_count_slides'));
$slider_count = $slider_count ? $slider_count : 5;

$slidermain    = new SliderMain(array('posts_per_page' => $slider_count));
$slidertwitter = new SliderTwitter();

echo $slidermain->getHTML();
?>
		
		<div class="enewsletter-home">
			<?php echo do_shortcode('[contact-form-7 id="72" title="Sign up for our E-newsletter"]'); ?>
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
		<?php echo $slidertwitter->getHTML(); ?>
		  <!-- <div class="center-box">
			  <aside>
				  <ul class="slides">
					  <li>
						  <p>Cukjm sociis nato nati bus et is parturient monteseu tortor raesent as nato nati bus et is parturiccumsan.</p>
						  <span><a href="#">#samplehashtag</a>  #example  |  9:00 AM  April 3</span>
						</li>
						<li>
						  <p>2 Cukjm sociis nato nati bus et is parturient monteseu tortor raesent as nato nati bus et is parturiccumsan.</p>
						  <span><a href="#">#samplehashtag</a>  #example  |  9:00 AM  April 3</span>
						</li>
						<li>
						  <p>3 Cukjm sociis nato nati bus et is parturient monteseu tortor raesent as nato nati bus et is parturiccumsan.</p>
						  <span><a href="#">#samplehashtag</a>  #example  |  9:00 AM  April 3</span>
						</li>
					</ul>
				</aside>
				
				<nav>
				  	<a href="prev" onclick="actionSlide(event, this);" class="prev">prev</a>
					<a href="next" onclick="actionSlide(event, this);" class="next">next</a>
				</nav>
			</div> -->
		</div>
<?php get_footer(); ?>