jQuery(function($) {
  $(document).ready(function() {
    siteFooter();

  	$(window).resize(function() {
  		siteFooter();
  	});

  	function siteFooter() {
  		$('#ep-top').css({
  			"margin-bottom" : $('#ep-footer').height()
  		});
  	};
  });
});
