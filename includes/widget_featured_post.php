<?php

class FeaturedPost extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct('featured_post', __('Featured post'), array( 'description' => __('Add a featured post to sidebar.'), 'classname' => 'widget-post'));
	}

	function widget($args, $instance) 
	{
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];

		$url        = !empty($instance['url']) ? $instance['url'] : '#';
		$learn_more = sprintf('<a class="more" href="%s">Learn more</a>', $url);
		$title      = !empty($instance['title']) ? sprintf('<h2><a href="%s">%s</a></h2>', $url, $instance['title']) : '';
		$subtitle   = $deal->meta['deal_sub_title'] != '' ? $deal->meta['deal_sub_title'] : '';
		?>		
		<?php if(!empty($instance['image_url'])) printf('<figure><img alt=" " src="%s"></figure>', $instance['image_url']);	?>			
		<header>
			<?php echo $title; ?>
		</header>
		<?php if(!empty($instance['description'])) printf('<p>%s</p>', $instance['description']); ?>
		<?php echo $learn_more; ?>
		
		<?php

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['title']       = strip_tags(stripslashes($new_instance['title']));
		$instance['url']         = $new_instance['url'];
		$instance['description'] = strip_tags($new_instance['description']);
		$instance['image_url']   = strip_tags($new_instance['image_url']);
		return $instance;
	}

	function form( $instance ) 
	{
		$arr['title']       = $instance['title'] ? $instance['title'] : '';
		$arr['url']         = $instance['url'] ? $instance['url'] : '';
		$arr['description'] = $instance['description'] ? $instance['description'] : '';
		$arr['image_url']   = $instance['image_url'] ? $instance['image_url'] : '';

		extract($arr);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Destination URL:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" value="<?php echo $url; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_url'); ?>"><?php _e('Image SRC (URL):') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php echo $image_url; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:') ?></label>
			<textarea name="<?php echo $this->get_field_name('description'); ?>" class="widefat" id="<?php echo $this->get_field_id('description'); ?>" cols="30" rows="10"><?php echo $description; ?></textarea>
		</p>
		<?php
	}
}