<?php

class SliderMain extends Slider{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct($args, $slider_class = 'slider-home cf')
	{
		$this->args = array(
			'posts_per_page'   => 5,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'slider',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		parent::__construct($args, $slider_class);
	}	                                          

	/**
	 * Get all slides
	 * @return array - slides
	 */
	public function getSlides()
	{
		$res    = array();
		$slides = get_posts($this->args);
		if(count($slides))
		{
			foreach ($slides as &$slide) 
			{
				if(has_post_thumbnail($slid->ID))
				{
					$res[] = $slide;
				}
			}
		}
		return $res;
	}   

	/**
	 * Wrap single slide to HTML
	 * @param  object $slide --- post object
	 * @return string        --- HTML code
	 */
	public function wrapSlide($slide)
	{
	    ob_start();
	    $thumb      = wp_get_attachment_image_src(get_post_thumbnail_id($slide->ID), 'slider-image');
	    $thumb      = is_array($thumb) ? $thumb[0] : 'http://placehold.it/1300x419';
	    $learn_more = get_post_meta($slide->ID, 'additional_options_lern_more_url', true);
	    $learn_more = $learn_more ? $learn_more : '#';

	    ?>
	    <li>
	    	<figure><img src="<?php echo $thumb; ?>" alt="<?php echo $slide->post_title; ?>"></figure>
	    	<div class="txt">
	    		<h3><?php echo $slide->post_title; ?></h3>
	    		<a href="<?php echo $learn_more; ?>" class="more">Learn more</a>
	    	</div>
	    </li>
	    <?php

	    $var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}
}