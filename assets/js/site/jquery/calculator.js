if ($('body').hasClass('woocommerce')) {
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
