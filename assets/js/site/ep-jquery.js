jQuery(function($) {
$(document).ready(function(){
   $(document).on( 'click', 'form a.x-btn', function() {
     var form = $(this).closest( 'form' );
     form.submit();
   });
});

function calc_page() {
  var top = $( '#ep-top' );
  var content = $( '#ep-content' );
  var footer = $( '#ep-footer' );

	function scrollFooter( scrollPos, footerHeight ) {
    if ( scrollPos >= footerHeight ) {
      $( footer ).css({
        bottom: '0'
      });
    }
    else {
      $( footer ).css({
        bottom: '-' + footerHeight + 'px'
      });
    }
	}

	if ( $( window ).width() > 979 ) {
		var windowHeight = $( window ).height();
		var footerHeight = $( footer ).height();
		var contentHeight = windowHeight + $( content ).height() + $( footer ).height() - $( '#wpadminbar' ).height();

    $( '#ep-parallax-outer, #ep-parallax-inner' ).css( {
			height: contentHeight + 'px'
		});

    $( top ).css( {
			height: windowHeight + 'px'
		});

    $( '.ep-parallax-wrapper' ).css( {
			'margin-top': windowHeight + 'px'
		});

    scrollFooter( window.scrollY, footerHeight );

    $( window ).scroll( function() {
			var scrollPos = window.scrollY;

			$( '#ep-parallax-inner' ).css( {
				top: '-' + scrollPos + 'px'
			});

      $( top ).css( {
				'background-position-y': 50 - 100 * scrollPos / contentHeight + '%'
			});

      scrollFooter( scrollPos, footerHeight );
		});
	}
  else {
    $( '#ep-parallax-inner' ).css( {
      top: ''
    });

    $( top ).css( {
      'background-position-y': ''
    });
    $( '#ep-parallax-outer, #ep-parallax-inner' ).css( {
      height: ''
    });

    $( top ).css( {
      height: ''
    });

    $( '.ep-parallax-wrapper' ).css( {
      'margin-top': ''
    });
  }
}

$( window ).resize(function(){
  calc_page();
});

$(window).load(function(){
  calc_page();
});

});