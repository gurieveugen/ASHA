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
	<?php
	if(is_active_sidebar('right-sidebar'))
	{
		dynamic_sidebar('right-sidebar');
	}
	?>  
</aside>
