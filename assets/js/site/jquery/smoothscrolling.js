$(document).on('click', 'a[href^="#"]', function (e) {
  e.preventDefault();

  if ( $.attr(this, 'href').length > 1 ) {
    $('html, body').animate({
      scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
  }
});
