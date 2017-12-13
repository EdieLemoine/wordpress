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
