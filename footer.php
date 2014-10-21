<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

$btn_twitter  = (string) get_option('sn_twitter_url');
$btn_facebook = (string) get_option('sn_facebook_url');
$btn_linkedin = (string) get_option('sn_linkedin_url');
$btn_donate   = (string) get_option('sn_donate_url');
$btn_mail     = (string) get_bloginfo('admin_email');

$buttons = array(
	!empty($btn_twitter) ? sprintf('<li class="tweet"><a href="%s" target="_blank">tweet</a></li>', $btn_twitter) : '',
	!empty($btn_facebook) ? sprintf('<li class="facebook"><a href="%s" target="_blank">facebook</a></li>', $btn_facebook) : '',
	!empty($btn_linkedin) ? sprintf('<li class="in"><a href="%s" target="_blank">in</a></li>', $btn_linkedin) : '',
	!empty($btn_mail) ? sprintf('<li class="mail"><a href="mailto:%s" target="_blank">mail</a></li>', $btn_mail) : '',
);

?>

	</section>
	
	<footer id="footer" class="cf">
	    <?php get_sidebar('footer'); ?>
		
		<div class="center-box">
			<ul class="share-footer">
				<?php echo implode('', $buttons); ?>
			</ul>
			
		  <nav class="footer-menu cf">
			  <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false ) ); ?>
			</nav>
			<p> © 2014 American SCHOOL HEALTH Association</p>
		</div>
	</footer>
</div>

	<?php wp_footer(); ?>
</body>
</html>