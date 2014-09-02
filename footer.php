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
	!empty($btn_mail) ? sprintf('<li class="mail"><a href="%s" target="_blank">mail</a></li>', $btn_mail) : '',
);

?>

	</section>
	
	<footer id="footer" class="cf">
    <aside class="sidebar-footer cf">
		  <div class="center-box">
			  <div class="widget-footer">
				  <h3>About</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod vestibulum tellus sed sollicitudin. Vestibulum cursus venenatis vestibulum. Ut ut magna tempor, accumsan orci vel, mollis tortor. Praesent eu bibendum orci. Vestibulum ullamcorper malesuada ipsum sit amet malesuada.</p>
				</div>
				
				<div class="widget-footer">
				  <h3>Recent News</h3>
					<p><strong>News Item Number 1</strong><br>AUGUST 2, 2014</p>
					<p><strong>News Item Number 2</strong><br>AUGUST 2, 2014</p>
					<p><strong>News Item Number 2</strong><br>AUGUST 2, 2014</p>
				</div>
				
				<div class="widget-footer">
				  <h3>Contact Us</h3>
					<p><strong>American School Health Association</strong><br>1760 Old Meadow Road, Suite 500<br>McLean, VA 22102</p>
					<p><strong>Phone</strong> 703-506-7675<br><strong>Fax:</strong> 703-506-3266</p>
					<p><strong>Email:</strong> <a href="mailto:info@ashaweb.org">info@ashaweb.org</a></p>
				</div>
			</div>
		</aside>
		
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