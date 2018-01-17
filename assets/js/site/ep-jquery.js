jQuery(function($) {
if ($('body').hasClass('single-product')) {
  inputZaagverlies = $('input#zaagverlies');
  inputM2Nodig = $('input#m2');
  zaagverlies = false;

  function price(num) {
    return "&euro; " + num.toLocaleString('nl-NL', { minimumFractionDigits: 2 });
  }
  function round(num, dec) {
    power = Math.pow( 10, dec );
    return Math.round( num * power) / power;
  }

  function calculateAmount() {

    nodig = $(inputM2Nodig).val();

    if ( zaagverlies ) {
      nodig = nodig * 1.05;
    }
    pakken = Math.ceil(nodig / fw_vierkantemeter);
    $('#pakken').html( pakken + " (" + round(fw_vierkantemeter * pakken, 2) + " m²)" );
    $('#prijs').html( price( round( pakken * fw_prijs, 2 )) );

    $('input[name=quantity]').val(pakken);
  }

  inputZaagverlies.click(function(){
    zaagverlies = inputZaagverlies.prop('checked');
    calculateAmount();
  });

  inputM2Nodig.bind('keyup mouseup mousewheel', function () {
    calculateAmount();
  });

  calculateAmount();

  // $( '#addtobasket' ).click( function() {
  //   aantal = $( '.input-text.qty.text' ).val();
  //   if ( aantal != '' ) {
  //     $.get( '/cart/?add-to-cart=' + productID + '&quantity=' + aantal, function() {
  //       console.log( "product added " + aantal );
  //     } )
  //   }
  // } );
}

$(document).ready(function(){
   $(document).on( 'click', 'form .ep-btn', function() {
     var form = $(this).closest( 'form' );
     $(this).addClass('submitting');
     form.submit();
   });

   $('.wpcf7').on( 'wpcf7submit', function() {
     console.log('submitted');
     $('.wpcf7 a').removeClass('submitting');
   });
});

if ( $('.ep-grid').length > 0 ) {
  checkGrid();

  $(window).resize(function(){
    checkGrid();
  });

  function checkGrid() {
    $('.ep-grid-item').each(function(){
      $(this).css({ 'height': $(this).outerWidth() });
    });
  }
}

//   function resizeDivs() {
//     var divs = $(".ep-1-3, .ep-2-3");
//     divs.css('height', 'auto');
//
//     if ( $(window).width() > 979 ) {
// 			console.log('true');
//
//       for (var i = 0; i < divs.length; i += 2) {
//         var twoDivs = divs.slice(i, i + 2);
//         var maxHeight = 0;
//         var innerDivs = $(twoDivs).children('.x-container');
//
//         $(innerDivs).each(function() {
//           if ($(this).height() > maxHeight) {
//             maxHeight = $(this).height();
//           }
//         });
//         twoDivs.height(maxHeight);
//       }
//     }
//   }
//
//   $(window).resize(function() {
//     resizeDivs();
//   });
//
//   resizeDivs();

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

$(document).on('click', 'a[href^="#"]', function (e) {
  e.preventDefault();

  if ( $.attr(this, 'href').length > 1 ) {
    $('html, body').animate({
      scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
  }
});

});