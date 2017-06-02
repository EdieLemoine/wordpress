jQuery(function($) {
	$(document).ready(function(){

		function calcSliders() {
			console.log('Calculating sliders');
			$( '.ep-slider' ).each(function() {
				// Resets sizes before recalculating
				$( this ).css( {
					width: '100%',
					height: '100%'
				} );
				$( ul ).css( {
					width: '0'
				});

				var ul = $( this ).children( 'ul' );
				var li = $( ul).children( 'li' );

				var prev = $( this ).children( '.prev' );
				var next = $( this ).children( '.next' );

				// TODO: turn interval on and off based on scrollpos
				// var scrollTimer = null;
				//
				// $(window).scroll(function(){
				// 	if ( scrollTimer ) {
				// 		clearTimeout( scrollTimer );
				// 	}
				// 	scrollTimer = setTimeout( scrollFunction, 500 );
				// });
				//
				// function scrollFunction() {
				// 	var auto = null;
				// 	console.log( slider );
				//
				// 	if ( $( slider ).scrollTop() > 0 ) {
				// 		auto = setInterval( moveRight, 3000 );
				// 	} else {
				// 		auto = false;
				// 	}
				// }

				var slideCount = $( li ).length;
				var slideWidth = $( li ).width();
				var slideHeight = $( li ).height();
				var sliderUlWidth = slideCount * slideWidth;

				$( this ).css( {
					width: slideWidth,
					height: slideHeight
				} );

				$( ul ).css( {
					width: sliderUlWidth,
				} );

				function moveLeft() {
					$( ul ).animate( {
						left: +slideWidth
					}, 500, function() {
						$( ul ).children( 'li:last-child' ).prependTo( ul );
						$( ul ).css( 'left', '' );
					} );
				};

				function moveRight() {
					$( ul ).animate( {
						left: -slideWidth,
					}, 500, function() {
						$( ul ).children( 'li:first-child' ).appendTo( ul );
						$( ul ).css( 'left', '' );
					} );
				};

				$( prev ).click( function() {
					moveLeft();
				} );

				$( next ).click( function() {
					moveRight();
				} );
			});
		}

		calcSliders();

		var resizeTimer = null;

		$(window).resize( function() {
			if ( resizeTimer ) {
				clearTimeout( resizeTimer );
			}
			resizeTimer = setTimeout( calcSliders, 50 );
		});
	});
});
