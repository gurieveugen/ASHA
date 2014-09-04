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
		
		<?php get_sidebar('featured_posts'); ?>
		
		<div class="tweet-home cf">
		<?php echo $slidertwitter->getHTML(); ?>
		</div>
<?php get_footer(); ?>