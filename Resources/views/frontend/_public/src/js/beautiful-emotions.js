function playVideo() {
	$('video[autoplay]').each(function(i, video) {
	   var $vid = $(video);
	   var vid = $vid[0];
	   $vid.off('ended');
	   if(typeof vid.load === "function") {
	   		vid.load();
	   }
	   if(typeof vid.play === "function") {
	   		vid.play();
	   }
	});
}

// ON Document Ready
jQuery(document).ready(function ($)
{

	$(document).on("click", 'a[href*="#"]', function(e) { 
		var target = this.hash;
		var $target = $(target);

		// If Target
		if($target) {
			// if the Target is a display-only-target
			if($target.hasClass('only-target')) 
			{
				//e.preventDefault();
				window.location.hash = target;
				$('html, body').stop().animate({
					'scrollTop': $target.offset().top
				}, 700, 'swing');
			} 
			else {
				e.preventDefault();
				if($target.offset()) {
					$('html, body').stop().animate({
						'scrollTop': $target.offset().top
					}, 900, 'swing', function() {
						window.location.hash = target;
					});
				}
			}
		}

	});

	// On Ajax-Complete
	$( document ).ajaxComplete(function()
	{
		// playVideo();
	});

});