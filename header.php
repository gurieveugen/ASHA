<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
<script charset="utf-8" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/css_browser_selector.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.formstyler.js"></script>
<script>
	(function($) {
	$(function() {
		$('input').styler();
	})
	})(jQuery)
</script>
</head>

<body <?php body_class(); ?>>
<div class="global-box cf">
  <header id="header" class="cf">
    <div class="center-box">
		  <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="top-header">
			  <a href="#" class="login-link">MEMBER LOGIN</a>
				<ul class="share-header">
				  <li class="tweet"><a href="#">tweet</a></li>
					<li class="facebook"><a href="#">facebook</a></li>
					<li class="in"><a href="#">in</a></li>
				</ul>
				<a href="#" class="btn-donate">DONATE</a>
			</div>
			
			<nav class="main-menu cf">
			  <div class="search-box">
				  <a href="#" class="btn-search">Search</a>
				</div>
			  <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
			</nav>
		</div>
	</header>
	
	<section id="content-section" class="cf">