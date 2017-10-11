$(window).scroll(function(){
  // if ( $(window).scrollTop() > 0 ) {
  //   $('.x-navbar').addClass('x-navbar-fixed-top');
  // }
  // else {
  //   $('.x-navbar').removeClass('x-navbar-fixed-top');
  // }

  if ( $(window).scrollTop() > 0 ) {
    $('body').addClass('scrolled');
  }
  else {
    $('body').removeClass('scrolled');
  }

});
