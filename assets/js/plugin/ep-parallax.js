jQuery(function($) {
  $(document).ready(function() {
    siteFooter();

  	$(window).resize(function() {
  		siteFooter();
  	});

  	function siteFooter() {
      //
      if ( ( $('#ep-top').height() + $('#ep-footer').height()) < $(window).innerHeight() ) {
        console.log('true');
        $('#ep-top, #ep-top .ep').css({
          "min-height": $(window).innerHeight() - $('#ep-footer').height()
        });
      }
      else {
        $('#ep-top, #ep-top .ep').removeAttr( 'style' );
      }

  		$('#ep-top').css({
  			"margin-bottom": $('#ep-footer').height()
  		});
  	};
  });
});
