<div class="posts-home cf">
	<div class="center-box">
		<ul>
			<?php
			if(is_active_sidebar('featured-posts-sidebar'))
			{
				dynamic_sidebar('featured-posts-sidebar');
			}
			?>
		</ul>
	</div>
</div>