function save_main_options_ajax( el ) {

  $( el ).closest('form').submit( function() {
    var b = $( this ).serialize();
    $.post( 'options.php', b ).error(
      function() {
        loading(false);
        $('#ep-update-notice').addClass( 'notice notice-error' ).prepend( '<p id="msg-text">An error occurred while saving your settings. (' + new Date().toLocaleTimeString() + ')</p>' );
      } ).success( function() {
        loading(false);
        $('#ep-update-notice').addClass( 'notice notice-success' ).children( "#msg-text" ).html( 'Settings saved. (' +     new Date().toLocaleTimeString() + ")" );
    } );
    loading(true);
    return false;
  } );
}

if ( $( 'body' ).hasClass( 'toplevel_page_edies-plugin-edies-plugin-admin' ) ) {
  $( 'input[type=submit]' ).click( function() {
    save_main_options_ajax( $( this ) );
  } );
}

$('#ep-update-notice .notice-dismiss').click(function(){
  $('#ep-update-notice').fadeOut('fast');
});

function loading( state ) {
  if ( state ) {
    $('#ep-update-notice').fadeOut('fast');
    $( ".wrap" ).fadeTo( "slow" , 0.35 );
    $('input').prop('disabled', true);
  }
  else {
    $('#ep-update-notice').fadeIn('fast');
    $( ".wrap" ).fadeTo( "fast" , 1 );
    $('input').prop('disabled', false);
  }
}
