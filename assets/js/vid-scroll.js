$(function () {
	
	var vid = $('.video');
	
    var top = vid.offset().top*1 - parseFloat(vid.css('margin-top').replace(/auto/, 0));
	
	$(window).on('scroll', function(event) {
		// what the y position of the scroll is
		
		var y = $(this).scrollTop();

		// whether that's below the form
		if (y >= top) {
			// if so, ad the fixed class
			if ( vid.is('.aside') ) {
				return;
			}
			vid.addClass('aside');
			$('.close-vid').removeClass('hidden')
		} else {
			// otherwise remove it
			vid.removeClass('aside');
			vid.removeClass('hidden');
			$('.close-vid').addClass('hidden')
		}
	});
	
	$(function (){
		$('.close-vid').click(function(){
			
			$('.video').removeClass('aside').addClass('hidden');
			$('.this').addClass('hidden');
		})
	});
	
	
});