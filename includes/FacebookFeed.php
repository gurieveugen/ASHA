<?php

class FacebookFeed{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct()
	{
		// ==============================================================
		// Actions & Filters
		// ==============================================================
		add_action( 'wp_enqueue_scripts', array(&$this, 'scriptsAndStyles') );
		// ==============================================================
		// Shortcodes
		// ==============================================================
		add_shortcode( 'facebook-feed', array(&$this, 'displayFeed') );
	}	                                             

	/**
	 * Display facebook feed
	 * @return string --- HTML code
	 */
	public function displayFeed()
	{
		ob_start();
		?>
		<ul class="facebook-post cf">
		</ul>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	/**
	 * Add custom scripts and styles
	 */
	public function scriptsAndStyles()
	{
		wp_enqueue_script( 'string-format', get_template_directory_uri().'/js/string.format.js', array('jquery') );
		wp_enqueue_script( 'facebook-feed', get_template_directory_uri().'/js/facebook.js', array('jquery', 'string-format') );

		wp_localize_script( 
			'facebook-feed', 
			'facebook_feed', 
			array(
				'page'    => (string) get_option('fb_page'),
				'count'   => (string) get_option('fb_count'),
				'app_id'  => (string) get_option('fb_app_id'),
				'app_key' => (string) get_option('fb_app_key'),
			) 
		);
	}
}