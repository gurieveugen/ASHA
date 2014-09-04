<?php

class TwitterWidget extends WP_Widget{
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	private $args;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct('twitter', __('Twitter rotator'), array( 'description' => __('Add a twitter rotator to sidebar.'), 'classname' => 'widget-tweet'));
		$this->args = array(
			'count'              => get_option('tw_r_tweet_count'),
			'account'            => get_option('tw_r_account'),
			'consumer_key'       => get_option('tw_r_consumer_key'),
			'consumer_secret'    => get_option('tw_r_consumer_secret'),
			'oauth_token'        => get_option('tw_r_oauth_token'),
			'oauth_token_secret' => get_option('tw_r_oauth_token_secret')
		);
	}

	function widget($args, $instance) 
	{
		$twitter = new \sdk\TwitterOAuth\TwitterOAuth(	
			$this->args['consumer_key'],
			$this->args['consumer_secret'],
			$this->args['oauth_token'],
			$this->args['oauth_token_secret']
		);

		$count  = intval($this->args['count']);
		$user   = $this->args['account'];	
		$query  = sprintf('https://api.twitter.com/1.1/statuses/user_timeline.json?count=%s&screen_name=%s', $count, urlencode($user));
		$tweets = (array) $twitter->get($query);

		if(count($tweets))
		{
			echo $args['before_widget'];
			?>
			<nav>
				<a href="prev" onclick="actionSlide(event, this);" class="prev">prev</a>
				<a href="next" onclick="actionSlide(event, this);" class="next">next</a>
			</nav>
			<aside>
			<ul>
			<?php
			foreach ($tweets as &$tweet) 
			{
				echo $this->wrapSlide($tweet);
			}
			?>
			</ul>
			</aside>
			<?php
			echo $args['after_widget'];
		}
		else echo $this->noSlideHTML();
		
	}

	/**
	 * Wrap single slide to HTML
	 * @param  object $slide --- post object
	 * @return string        --- HTML code
	 */
	public function wrapSlide($slide)
	{
	    ob_start();
	   	$time  = date('g:i a F j', strtotime($slide->created_at));
	   	$hashs = $this->wrapHashTags($slide);
	   	$hashs = empty($hashs) ? '' : $hashs;

	    ?>
		<li>
			<p><?php echo $slide->text; ?></p>
			<span><?php echo $hashs; ?></span>
			<span><?php echo $time; ?></span>
		</li>
	    <?php

	    $var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}

	/**
	 * Wrap hash tags to HTML code
	 * @param  object $tweet --- single tweet
	 * @return string        --- HTML code
	 */
	private function wrapHashTags($tweet)
	{
		$res = array();
		if(is_array($tweet->entities->hashtags))
		{
			foreach ($tweet->entities->hashtags as $tag) 
			{
				$res[] = sprintf('<a href="https://twitter.com/hashtag/%1$s?src=hash">#%1$s</a>', $tag->text);
			}
		}
		return implode('', $res);
	}

	/**
	 * Display this if slides not found
	 * @return string --- HTML code
	 */
	private function noSlideHTML()
	{
		return sprintf('<span>%s</span>', __('You haven\'t any tweet!'));
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