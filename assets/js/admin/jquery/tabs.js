if ( hash = window.location.hash ) {
  $('a').removeClass('active');
  $('.settings-section').removeClass('active-section');
  
  $('a[href='+hash+']').addClass('active');
  $(hash).addClass('active-section');
}

$("#ep-settings-tabs a").click(function( e ){
  e.preventDefault();

  $('.settings-section').removeClass('active-section');
  $('a').removeClass('active');

  var hash = $(this).attr('href');

  window.location.hash = hash;

  $(this).addClass('active');
  $(hash).addClass('active-section');
});

$('.settings-section').css('min-height', $("#ep-settings-tabs").outerHeight() );
