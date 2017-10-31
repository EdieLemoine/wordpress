jQuery(function($) {
  function siteFooter() {
    if ( ( $('#ep-top').height() + $('#ep-footer').height()) < $(window).height() ) {
      $('#ep-top, #ep-top .ep').css({
        "min-height": $(window).height() - $('#ep-footer').height()
      });
    }
    else {
      $('#ep-top, #ep-top .ep').removeAttr( 'style' );
    }

    $('#ep-top').css({
      "margin-bottom": $('#ep-footer').height()
    });
  };

  $(document).ready(function() {
    siteFooter();

    $(window).on('resize', siteFooter ) ;
  });
});
