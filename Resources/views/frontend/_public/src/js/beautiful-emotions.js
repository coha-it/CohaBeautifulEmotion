function playVideo() {
	$('video[autoplay]').each(function(i, video) {
	   var $vid = $(video);
	   var vid = $vid[0];
	   $vid.off('ended');
	   if(vid.load) {
	   		vid.load();
	   }
	   if(vid.play) {
	   		vid.play();
	   }
	});
}

// ON Document Ready
jQuery(document).ready(function ($)
{

	$(document).on("click", 'a[href*="#"]', function(e) { 
		e.preventDefault();
		var target = this.hash;
		var $target = $(target);
		$('html, body').stop().animate({
			'scrollTop': $target.offset().top
		}, 900, 'swing', function() {
			window.location.hash = target;
		});
	});

	// On Ajax-Complete
	$( document ).ajaxComplete(function()
	{
		playVideo();
	});

});