<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

?>
			<aside class="sidebar-right">
			  <div class="widget-events cf">
				  <div class="date">OCTOBER 9-11</div>
					<h3>Featured Event Headline</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod vestilum tellus sed sollicitudin. </p>
				</div>
				
				<div class="widget-newsletter cf">
				  <h3>Sign up for our E-newsletter</h3>
					<form>
					  <p><input type="text" value="Name" class="txt"></p>
						<p><input type="text" value="Email" class="txt"></p>
						<p><input type="submit" value="submit" class="submit"></p>
					</form>
				</div>
				
				<div class="widget-post cf">
				  <figure><img src="<?php echo get_template_directory_uri(); ?>/images/upload/img_04.jpg" alt=" "></figure>
					<h2><a href="#">Featured Post Headline</a></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod m tellus sed sollicitudin. Vestibulum cursus venenatis vestibulum. </p>
					<a href="#" class="more">Learn more</a>
				</div>
				
				<div class="widget-tweet cf">
				  <nav>
					  <a href="#" class="prev">prev</a>
						<a href="#" class="next">next</a>
					</nav>
					
					<aside>
					  <ul>
						  <li>
							  <p>Cukjm sociis nato nati bus et is parturient monteseu tortor raesent as nato nati bus et is parturiccumsan.</p>
								<span><a href="#">#samplehashtag</a>  #example</span>
								<span>9:00 AM  April 3</span>
							</li>
							
							<li>
							  <p>Cukjm sociis nato nati bus et is parturient monteseu tortor raesent as nato nati bus et is parturiccumsan.</p>
								<span><a href="#">#samplehashtag</a>  #example</span>
								<span>9:00 AM  April 3</span>
							</li>
						</ul>
					</aside>
				</div>
				
				<div class="widget-recentpost cf">
				  <h3>Recent Posts</h3>
					<ul>
					  <li><a href="#">Recent Post Headline</a></li>
					  <li><a href="#">Second Recent Post Headline</a></li>
					  <li><a href="#">The Third Recent Post Headline Has a Very Long Title</a></li>
					  <li><a href="#">Recent Post Headline Four</a></li>
					  <li><a href="#">Recent Post Headline Five</a></li>
					  <li><a href="#">Recent Post Headline Six</a></li>
					  <li><a href="#">Recent Post Headline Seven</a></li>
					  <li><a href="#">Recent Post Headline Eight</a></li>
					</ul>
				</div>
				
				<div class="widget-categories cf">
				  <h3>Categories</h3>
					<ul>
					  <li><a href="#">Category One</a></li>
					  <li><a href="#">Category Two</a></li>
					  <li><a href="#">Category With a Long Title</a></li>
					  <li><a href="#">Category Four</a></li>
					  <li><a href="#">Category Five</a></li>
					  <li><a href="#">Category Six</a></li>
					  <li><a href="#">Category Seven</a></li>
					</ul>
				</div>
			</aside>
