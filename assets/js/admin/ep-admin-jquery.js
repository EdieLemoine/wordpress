jQuery(function($) {
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

function conditionCheck() {
  $('.ep-condition-helper').each( function() {
    cond = $(this).attr( 'condition' );
    conditions = [];
    parent = "#" + $(this).attr('id');

    $( cond.split( ';' ) ).each(function(){
      if ( this != '' ) {
        conditions.push( this.split( '=' ) );
      }
    });

    bool = [];

    $( conditions ).each( function() {
      value = this[1];
      element = "#" + this[0];

      // In case it's a checkbox or radio
      if ( ! $( element ).val() ) {
        // In case there are multiple values required
        if ( value.indexOf( ',' ) >= 0 ) {
          values = value.split( ',' );
          $(values).each(function() {
            // $.trim in case values are comma separated with spaces
            bool.push( $( element ).find( 'input[name$="['+$.trim(this)+']"]' ).attr( 'checked' ) );
          });
        }
        else {
          bool.push( $( element ).find( 'input[name$="['+value+']"]' ).attr( 'checked' ) );
        }
      }
      // All other cases
      else {
        // Handle negative conditions
        if ( value.indexOf( '!' ) >= 0 ) {
          bool.push( $( element ).val() !== value.replace( '!', '' ) );
        }
        else {
          bool.push( $( element ).val() === value );
        }
      }
    });

    // Hide or show element based on whether all conditions are met or not
    epSetVisibility( parent, allTrue( bool ) );
  });
};

function epSetVisibility( parent, bool ) {
  if ( bool ) {
    $(parent).closest('tr').fadeIn('fast');
    $(parent).closest('input, select, textarea').prop('disabled', false);
  }
  else {
    $(parent).closest('tr').fadeOut('fast');
    $(parent).closest('input, select, textarea').prop('disabled', true);
  }
}

function allTrue( arr ) {
  for(var o in arr) {
    if(!arr[o]) {
      return false;
    }
  }
  return true;
}

$( 'input, select, textarea' ).on( 'change', function() {
  conditionCheck();
});

conditionCheck();

function createDeleteButton() {
  $( '.menu > .menu-item' ).each(function(){
    if ( !$( this ).find ( '.item-controls .item-delete' ).length > 0 ) {
      $( this ).find( '.item-edit' )
      .before(
        $(this).find( '.item-delete' )
        .clone()
        .wrap( "<span class='submitbox item-type'>" ).parent()
      );
    }
  });
}

createDeleteButton();

$('input').click(function(){
  setTimeout( createDeleteButton, 1000 );
});

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

});