<?php

class FeaturedEvent extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct('featured_event', __('Featured event'), array( 'description' => __('Add a featured event to sidebar.'), 'classname' => 'widget-events'));
	}

	function widget($args, $instance) 
	{
		$featured_event = getFeaturedEvent();
		if($featured_event)
		{
			echo $args['before_widget'];
			?>
			<div class="date"><?php echo date('F j', strtotime(get_post_meta($featured_event->ID, 'aeo_event_date', TRUE))); ?></div>
			<h3><?php echo $featured_event->post_title; ?></h3>
			<p><?php echo $featured_event->post_content; ?></p>
			<?php
			echo $args['after_widget'];
		}
	}

	function update( $new_instance, $old_instance ) 
	{
		return $instance;
	}

	function form( $instance ) 
	{
		?>
		<p>
			<h3>This widget does not have the settings</h3>
		</p>
		<?php
	}
}