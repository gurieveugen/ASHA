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

$featured_event = getFeaturedEvent();
?>
		
		<div class="enewsletter-home">
			<?php echo do_shortcode('[contact-form-7 id="72" title="Sign up for our E-newsletter"]'); ?>
		</div>
		
		<?php
		if($featured_event)
		{
		?>
			<div class="event-home cf">
				<header>
					<h2><?php echo $featured_event->post_title; ?></h2>
				</header>
				<div class="date"><?php echo date('F j', strtotime(get_post_meta($featured_event->ID, 'aeo_event_date', TRUE))); ?></div>
				<p><?php echo $featured_event->post_content; ?></p>
			</div>
		<?php
		}
		?>
		
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
		</div>
<?php get_footer(); ?>