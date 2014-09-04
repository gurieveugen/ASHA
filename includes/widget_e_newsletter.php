<?php

class ENewsletter extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct('e-newsletter', __('Sign up for our E-newsletter'), array( 'description' => __('Add a signup form to sidebar.'), 'classname' => 'widget-newsletter'));
	}

	function widget($args, $instance) 
	{
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$short_code        = !empty($instance['short_code']) ? $instance['short_code'] : '';

		if($short_code)
		{
			echo $args['before_widget'];
			?>
			<h3><?php echo $instance['title']; ?></h3>
			<?php echo do_shortcode($short_code); ?>
			<?php
			echo $args['after_widget'];
		}
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['title']      = strip_tags(stripslashes($new_instance['title']));
		$instance['short_code'] = $new_instance['short_code'];
		return $instance;
	}

	function form( $instance ) 
	{
		$arr['title']      = $instance['title'] ? $instance['title'] : '';
		$arr['short_code'] = $instance['short_code'] ? $instance['short_code'] : '';

		extract($arr);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('short_code'); ?>"><?php _e('Destination URL:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('short_code'); ?>" name="<?php echo $this->get_field_name('short_code'); ?>" value="<?php echo $short_code; ?>" />
		</p>
		<?php
	}
}