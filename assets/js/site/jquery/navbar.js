// TODO: Make it work with multiple .bg-black elements
function elementScrolled( elem ) {
  var docViewTop = $(window).scrollTop();
  var elemTop = $(elem).offset().top;
  var elemHeight = $(elem).outerHeight();
  var docViewBottom = elemTop + elemHeight;

  return (( docViewTop <= docViewBottom ) && ( elemTop <= docViewTop ));
}

function checkScrollPos() {

  if ( $(window).scrollTop() > $('.masthead').offset().top ) {
    $('body').addClass('scrolled');
  }
  else {
    $('body').removeClass('scrolled');
    if ( $('.x-nav-wrap.desktop').css('display') != 'none' ) {
      $('.x-nav-wrap.mobile').removeClass('in');
    }
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

$(document).ready(function(){
  if ($('body').hasClass('home')) {
    $(window).scroll(function(){
      checkScrollPos();
    });

    checkScrollPos();
  }
});

$('.x-btn-navbar').click(function( e ){
  e.preventDefault();
  $('.x-nav-wrap.mobile').toggleClass('collapse');
});

// $( '.x-nav-wrap.mobile' ).mouseleave( function() {
//   console.log('Mouse leave');
//   setTimeout( function() {
//     console.log('timeout function');
//     $('.x-btn-navbar').click();
//   }, 400 );
// });
