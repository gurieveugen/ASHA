<?php

abstract class Slider{
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	protected $args; 
	protected $slider_class; 

	//                     __ __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct($args, $slider_class = 'slider-home cf')
	{
		$this->slider_class = $slider_class;
		$this->args         = array_merge($this->args, $args);
	}          

	/**
	 * Get slider HTML
	 * @return string --- HTML code
	 */
	public function getHTML()
	{
		$slides = $this->getSlides();
		if(count($slides))
		{
			foreach ($slides as &$slide) 
			{
				$html[] = $this->wrapSlide($slide);
			}
			return $this->wrapSlider(implode('', $html));
		}
		return $this->noSlideHTML();
	}     

	/**
	 * Wrap slides to HTML
	 * @param  string $slides --- slides HTML
	 * @return string         --- HTML code
	 */
	private function wrapSlider($slides)
	{
		ob_start();
		?> 
	    <div class="<?php echo $this->slider_class; ?>">
			<aside>
				<ul class="slides">					
					<?php
					echo $slides;
					?>
				</ul>
			</aside>
				
			<nav>
				<a href="prev" onclick="actionSlide(event, this);" class="prev">prev</a>
				<a href="next" onclick="actionSlide(event, this);" class="next">next</a>
			</nav>
		</div>
		<?php

		$var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}

	/**
	 * Display this if slides not found
	 * @return string --- HTML code
	 */
	private function noSlideHTML()
	{
		return sprintf('<span>%s</span>', __('You haven\'t created any slide!'));
	}    

	/**
	 * Get all slides
	 * @return array --- slides
	 */
	abstract public function getSlides();
	/**
	 * Wrap single slide
	 * @param  mixed $slide --- single slide
	 * @return string       --- HTML code
	 */
	abstract public function wrapSlide($slide);                          
}	