// TODO: Make it work with multiple .bg-black elements
function elementScrolled( elem ) {
  var docViewTop = $(window).scrollTop();
  var elemTop = $(elem).offset().top;
  var elemHeight = $(elem).outerHeight();
  var docViewBottom = elemTop + elemHeight;

  return (( docViewTop <= docViewBottom ) && ( elemTop <= docViewTop ));
}

function checkScrollPos() {
  if ( $(window).scrollTop() > 0 ) {
    $('body').addClass('scrolled');
  }
  else {
    $('body').removeClass('scrolled');
    $('.x-nav-wrap.mobile').removeClass('in');
  }

  $('.bg-dark').each(function(){
    if (elementScrolled( $(this) )) {
      $('body').addClass('invert');
    }
    else {
      $('body').removeClass('invert');
    }
  });
}



if ($('body').hasClass('home')) {
  $(window).scroll(function(){
    checkScrollPos();
  });

  checkScrollPos();
}

$('.x-btn-navbar').click(function( e ){
  e.preventDefault();
});
