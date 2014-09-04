jQuery(window).load(function() {
	var slider_delay  = parseInt(defaults.slider_delay);
	var rotator_delay = parseInt(defaults.rotator_delay);

	slider_delay  = slider_delay > 0 ? slider_delay : 5;
	rotator_delay = rotator_delay > 0 ? rotator_delay : 5;
	
	// ==============================================================
	// Main slider
	// ==============================================================
	jQuery(defaults.slider).flexslider({
		animation: "slide",
		slideshowSpeed: slider_delay*1000,
		controlNav: false,
		directionNav: false
	});
	// ==============================================================
	// Twitter rotator
	// ==============================================================
	jQuery(defaults.twitter_rotator).flexslider({
		animation: "slide",
		slideshowSpeed: rotator_delay*1000,
		controlNav: false,
		directionNav: false
	});

	jQuery(defaults.twitter_rotator_widget).flexslider({
		animation: "slide",
		selector: "ul > li",
		slideshowSpeed: rotator_delay*1000,
		controlNav: false,
		directionNav: false
	});

	// ==============================================================
	// Remove field notification
	// ==============================================================
	jQuery('.wpcf7-form-control-wrap').mouseenter(function(){
		if(jQuery(this).find('span.wpcf7-not-valid-tip').length)
		{
			jQuery(this).find('span.wpcf7-not-valid-tip').fadeOut(200);
		}
	});
	// ==============================================================
	// Boxer open
	// ==============================================================
	jQuery(".boxer").boxer();
});

/**
 * Action slide
 * NEXT OR PREV
 * @param  object event --- event object
 * @param  object obj   --- obj which clicked
 */
function actionSlide(event, obj)
{
	var action = jQuery(obj);
	var href   = action.attr('href');
	
	action.parent().parent().find('aside').flexslider(href);
	event.preventDefault();
}

function searchBoxShow(event)
{
	var message = jQuery('#modal-search');
	if (message.css('display') != 'block') 
	{
		message.show();

		var firstClick = true;
		jQuery(document).bind('click.modal_search', function(e) {
			if (!firstClick && jQuery(e.target).closest('#modal-search').length == 0) 
			{
				message.hide();
				jQuery(document).unbind('click.modal_search');
			}
			firstClick = false;
		});
	}
	event.preventDefault();
}

