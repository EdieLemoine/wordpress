jQuery(function($) {
	// $(document).on('click', '.nav-tab-wrapper a', function() {
	// 	$('section').hide();
	// 	$('section').eq($(this).index()).show();
	// 	return false;
	// })
	$('.menu-item').each(function(){
		endLocation = $(this).find('.item-controls');

		deleteButton = $(this).find('.item-delete');

		deleteButton.css({"margin": "0",
		"float": "none",
		"color": "red"});
		deleteButton.html("\u2716");
		deleteButton.prependTo(endLocation).wrapAll('<span class="item-type"></span>');
	});
});
