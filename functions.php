<?php
if($_GET['debug'] = '1')
{
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
	set_time_limit (6000);
}
/**
 * Twenty Thirteen functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/**
 * Sets up the content width value based on the theme's design.
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Adds support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Twenty Thirteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentythirteen', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Main Menu', 'twentythirteen' ) );
	register_nav_menu( 'footer', __( 'Footer Menu', 'twentythirteen' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueues scripts and styles for front end.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_scripts_styles() {
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );

	// Add Open Sans and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links cf">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*
* @return void
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns the URL from the post.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extends the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjusts content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );

//     __  ___                        __   
//    /  |/  /_  __   _________  ____/ /__ 
//   / /|_/ / / / /  / ___/ __ \/ __  / _ \
//  / /  / / /_/ /  / /__/ /_/ / /_/ /  __/
// /_/  /_/\__, /   \___/\____/\__,_/\___/ 
//        /____/                           

require_once 'includes/__.php';
require_once 'includes/widget_featured_post.php';
require_once 'includes/widget_featured_event.php';
require_once 'includes/widget_e_newsletter.php';
require_once 'includes/widget_twitter.php';
require_once 'includes/widget_shortcode.php';

// ==============================================================
// HOOKS
// ==============================================================
add_image_size('slider-image', 1300, 419, true);
add_action('wp_enqueue_scripts', 'customScriptsAndStyles');
add_action('widgets_init', 'widgetsInit');
add_filter('excerpt_more', 'newExcerptMore');

$ccollection_social_networks = new Controls\ControlsCollection(
	array(		
		new Controls\Text('Twitter URL', array('default-value' => 'http://www.twitter.com/whitehouse'), array('placeholder' => 'Enter your twitter account URL')),
		new Controls\Text('Facebook URL', array('default-value' => 'http://www.facebook.com/whitehouse'), array('placeholder' => 'Enter your facebook page URL')),
		new Controls\Text('Linkedin URL', array('default-value' => 'http://www.linkedin.com'), array('placeholder' => 'Enter your linkedin account URL')),
		new Controls\Text('Donate URL', array(), array('placeholder' => 'Enter your donate URL'))
	)
);

$ccollection_main_slider = new Controls\ControlsCollection(
	array(
		new Controls\Text('Slider delay', array('default-value' => '5'), array('placeholder' => 'Delay')),
		new Controls\Text('Count slides', array('default-value' => '5'), array('placeholder' => 'Count'))
	)
);

$ccollection_slider_urls = new Controls\ControlsCollection(
	array(
		new Controls\Text('Lern more url', array('default-value' => '#'), array('placeholder' => 'Learn moer'))
	)
);

$ccollection_event = new Controls\ControlsCollection(
	array(
		new Controls\Text('Destination URL', array('default-value' => '#'), array('placeholder' => 'Destination URL')),
		new Controls\Text('Event date', array('show_description' => TRUE, 'description' => 'Please enter date in MySQL format Y-m-d. Example: 2014-08-23'), array('placeholder' => 'Enter event date')),
		new Controls\Checkbox('Featured', array('label' => 'Featured event'))
	)
);

$ccollection_twitter = new Controls\ControlsCollection(
	array(		
		new Controls\Text('Account', array('default-value' => 'whitehouse'), array('placeholder' => 'Twitter user')),
		new Controls\Text('Tweet count', array('default-value' => 5), array('placeholder' => 'Count')),
		new Controls\Text('Rotator delay', array('default-value' => 5), array('placeholder' => 'Twitter rotator delay')),
		new Controls\Text('Consumer key', array('default-value' => 'aMY4Zsnn2KYi5TZkTCr9NlMuF'), array('placeholder' => 'Cunsumer key')),
		new Controls\Text('Consumer secret', array('default-value' => 'vxkz9T7QQWUmqnJbkf7Eg8aHvFOCdcSMVMZrfbUPdNbw7nuYx9'), array('placeholder' => 'Consumer secret')),
		new Controls\Text('OAuth token', array('default-value' => '2717095358-aRUmevpNvioRb52xkFYls0Q7ldf9cIo2PjJzsqG'), array('placeholder' => 'Token')),
		new Controls\Text('OAuth token secret', array('default-value' => 'woklRm4IAnMK5dEkXCAlSboirK4qlUmYcYNkRVddPIbl4'), array('placeholder' => 'Token secret'))
	)
);

$ccollection_facebook = new Controls\ControlsCollection(
	array(
		new Controls\Text('Page', array('defult-value' => 'whitehouse'), array('placeholder' => 'Enter facebook page')),
		new Controls\Text('Count', array('defult-value' => '3'), array('placeholder' => 'Post per feed')),
		new Controls\Text('App id', array('defult-value' => '802383316448078'), array('placeholder' => 'Enter app id')),
		new Controls\Text('App key', array('defult-value' => '970b61246640d52ac45bfa8bf596e6d5'), array('placeholder' => 'Enter app key')),
	)
);

$section_social_networks = new Admin\Section('Social networks', array('prefix' => 'sn_'), $ccollection_social_networks);
$section_main_slider     = new Admin\Section('Main slider options', array('prefix' => 'mso_'), $ccollection_main_slider);
$section_twitter         = new Admin\Section('Twitter rotator', array('prefix' => 'tw_r_'), $ccollection_twitter);
$section_facebook        = new Admin\Section('Facebook feed', array('prefix' => 'fb_'), $ccollection_facebook);

$theme_settings          = new Admin\Page('Theme settings', array(), array($section_social_networks, $section_main_slider, $section_twitter, $section_facebook ));
$post_type_slider        = new Admin\PostType('Slider', array('icon_code' => 'f03e', 'supports' => array('title', 'editor', 'thumbnail', 'excerpt')));
$post_type_event         = new Admin\PostType('Event', array('icon_code' => 'f073'));
$meta_box_event          = new Admin\MetaBox('Additional event options', array('post_type' => 'event', 'prefix' => 'aeo_'), $ccollection_event);
$meta_box_slider         = new Admin\MetaBox('Additional options', array('post_type' => 'slider'), $ccollection_slider_urls);

$facebook_feed = new FacebookFeed();

/**
 * Add some Scripts or Styles
 */
function customScriptsAndStyles()
{
	// ==============================================================
	// Add scripts
	// ==============================================================
	wp_enqueue_script("jquery"); 
	wp_enqueue_script('css_browser_selector', get_template_directory_uri().'/js/css_browser_selector.js', array('jquery'));
	wp_enqueue_script('formstyler', get_template_directory_uri().'/js/jquery.formstyler.js', array('jquery'));
	wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'));
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery', 'flexslider'));
	wp_enqueue_script('boxer', get_template_directory_uri().'/js/jquery.fs.boxer.js', array('jquery'));
	// ==============================================================
	// Add styles
	// ==============================================================
	wp_enqueue_style('boxer', get_template_directory_uri().'/css/jquery.fs.boxer.css');
	// ==============================================================
	// Add some veriables 
	// ==============================================================
	
	$slider_delay  = intval(get_option('mso_slider_delay'));
	$slider_count  = intval(get_option('mso_count_slides'));
	$rotator_delay = intval(get_option('tw_r_rotator_delay'));
	$slider_delay  = $slider_delay ? $slider_delay : 5;
	$slider_count  = $slider_count ? $slider_count : 5;
	$rotator_delay = $rotator_delay ? $rotator_delay : 5;

	$l10n = array(
		'slider_delay'           => $slider_delay,
		'slider_count'           => $slider_count,
		'slider'                 => '.slider-home aside',
		'twitter_rotator'        => '.center-box aside',
		'twitter_rotator_widget' => '.widget-tweet aside',
		'rotator_delay'          => $rotator_delay,
		'facebook_page'          => (string) get_option( 'sn_facebook_page' )
	);

	wp_localize_script('main', 'defaults', $l10n );
}

/**
 * Get featured Event
 * @return mixed --- post object if success | false if not
 */
function getFeaturedEvent()
{
	$args = array(
		'posts_per_page'   => 1,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_query' 	   => array(
			array(
				'key'   => 'aeo_featured',
				'value' => 'on'
			)
		),
		'post_type'        => 'event',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);

	$posts = get_posts($args);
	if(count($posts)) return $posts[0];
	return false;
}

/**
 * Register custom sidebar
 */
function widgetsInit()
{
	register_sidebar(array(
			'name'          => __( 'Featured posts Sidebar', 'ASHA' ),
			'id'            => 'featured-posts-sidebar',
			'description'   => __( 'Sidebar for featured posts', 'ASHA' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s"><article>',
			'after_widget'  => '</article></li>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>'
		) 
	);

	register_sidebar(array(
			'name'          => __( 'Footer Sidebar', 'ASHA' ),
			'id'            => 'footer-sidebar',
			'description'   => __( 'The footer sidebar', 'ASHA' ),
			'before_widget' => '<div id="%1$s" class="widget-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) 
	);

	register_sidebar(array(
			'name'          => __( 'Right Sidebar', 'ASHA' ),
			'id'            => 'right-sidebar',
			'description'   => __( 'The right sidebar', 'ASHA' ),
			'before_widget' => '<div id="%1$s" class="cf %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) 
	);

	register_widget('FeaturedPost');
	register_widget('FeaturedEvent');
	register_widget('ENewsletter');
	register_widget('TwitterWidget');
	register_widget('WShortCode');
}

function the_breadcrumb() 
{
    if (!is_front_page()) 
    {
        echo '<a href="';
        echo get_option('home');
        echo '">HOME';
        echo "</a> » ";
        if (is_category() || is_single()) 
        {
            the_category(' ');
            if (is_single()) 
            {
                echo "  &#x3E; ";
                the_title();
            }
        } 
        else if (is_page()) 
        {
            echo the_title();
        }
        else if (is_home())
        {
        	echo 'Blog';
        }
        else if(is_search())
        {
        	echo get_search_query();
        }
    }
    else 
    {
        echo 'HOME';
    }
}

function newExcerptMore( $more ) 
{
	return '<a href="'.get_permalink().'" class="more">READ MORE &#x3E;&#x3E;</a>';
}

function ashaComment($comment, $args, $depth) 
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<article id="div-comment-<?php comment_ID() ?>">
	<?php endif; ?>
	<figure><?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?></figure>
	<div class="txt">
	<p><?php printf( __( '<span class="autor"><a href="%s">%s</span></a>' ), htmlspecialchars( get_comment_link( $comment->comment_ID ) ), get_comment_author() ); ?> | 
		<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( '(Edit)' ), '  ', '' );?></p>
		<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	  <?php endif; ?>
	  <?php comment_text(); ?>
	  <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
  </div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</article>
	<?php endif; ?>
<?php
}













