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

$btn_twitter  = (string) get_option('sn_twitter_url');
$btn_facebook = (string) get_option('sn_facebook_url');
$btn_linkedin = (string) get_option('sn_linkedin_url');
$btn_youtube  = (string) get_option('sn_youtube_url');
$btn_donate   = (string) get_option('sn_donate_url');

$buttons = array(
	!empty($btn_twitter) ? sprintf('<li class="tweet"><a href="%s" target="_blank">tweet</a></li>', $btn_twitter) : '',
	!empty($btn_facebook) ? sprintf('<li class="facebook"><a href="%s" target="_blank">facebook</a></li>', $btn_facebook) : '',
	!empty($btn_linkedin) ? sprintf('<li class="in"><a href="%s" target="_blank">in</a></li>', $btn_linkedin) : '',
	!empty($btn_youtube) ? sprintf('<li class="youtube"><a href="%s" target="_blank">youtube</a></li>', $btn_youtube) : '',	
);

$btn_donate   = !empty($btn_donate) ? sprintf('<a href="%s" class="btn-donate" target="_blank">DONATE</a>', $btn_donate) : '';

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
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "f64403eb-eba6-4027-9f28-f13988c3b952", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
	(function($) {
	$(function() {
		$('input').styler();
	})
	})(jQuery)
</script>
</head>

<body <?php body_class(); ?>>
<!-- Place this portion of the code in the header or footer of the website -->


<script type="text/javascript">var p="http",d="static";if(document.location.protocol=="https:"){p+="s";d="engine";}var z=document.createElement("script");z.type="text/javascript";z.async=true;z.src=p+"://"+d+".multiview.com/ados.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(z,s);</script>
<script type="text/javascript">
var ados = ados || {};
ados.run = ados.run || [];
ados.run.push(function() {
/* load placement for account: Multiview, site: ASHAORGweb - American School Health Association - MultiWeb, size: 728x90 - Leaderboard, zone: ASHAORGweb - Leaderboard*/
ados_add_placement(4466, 58262, "mvLeaderboard", 4).setZone(62691);
ados_setDomain('engine.multiview.com');
ados_load();
});</script>



<!-- Place this code where the box Ad is to appear on the site -->

<div class="global-box cf">
	<div id="mvLeaderboard" style="text-align:center;"></div>
  <header id="header" class="cf">
    <div class="center-box">
		  <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="top-header">
			  	<a href="<?php echo wp_login_url(); ?>" class="login-link">MEMBER LOGIN</a>
				<ul class="share-header">
					<?php echo implode('', $buttons); ?>
				</ul>
				<?php echo $btn_donate; ?>
			</div>
			
			<nav class="main-menu cf">
			  	<div class="search-box" style="position: relative;">
					<a href="#" class="btn-search" onclick="searchBoxShow(event)">Search</a>
					<div id="modal-search">
						<?php get_search_form(TRUE); ?>
					</div>
				</div>
			  <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
			</nav>
		</div>
	</header>
	
	<section id="content-section" class="cf">