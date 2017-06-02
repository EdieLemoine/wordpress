jQuery( function($){

  $( '.ep-lightbox-trigger' ).click( function(e) {
    e.preventDefault();

    var imageSrc = $(this).attr('href');
    if ( $( '#ep-lightbox' ).length > 0 ) {
      $( '#ep-lightbox-content' ).html( '<img class="ep-lightbox" src="' + imageSrc +'" />' );
      $( '#ep-lightbox' ).fadeIn( 300 );
    }
    else {
    	var lightbox =
    	'<div id="ep-lightbox">' +
    		'<div id="ep-lightbox-content">' +
    			'<img src="' + imageSrc +'" />' +
    		'</div>' +
    	'</div>';

    	$('body').append( lightbox );
    }
  });

  $( '#ep-lightbox' ).live('click', function() {
	   $( '#ep-lightbox' ).fadeOut( 300 );
  });
});
