console.log('Testing - ERM PLUGIN');

// min height css

jQuery('.erm-btn').click(function(){
	height = jQuery(window).height();
	jQuery('.erm-popup').css({
		'min-height': height+'px'
	})
})

jQuery(window).resize(function(){
	height = jQuery(window).height();
	jQuery('.erm-popup').css({
		'min-height': height+'px'
	})
})
