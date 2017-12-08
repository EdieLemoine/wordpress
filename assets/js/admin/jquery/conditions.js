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
    // console.log(conditions);
    bool = [];
    $( conditions ).each( function() {
      bool.push( $( "#" + this[0] ).val() === this[1] );
    });

    bool = allTrue(bool);

    epSetVisibility( parent, bool );
  });
};

function epSetVisibility( parent, bool ) {
  if ( bool ) {
    $(parent).closest('tr').fadeIn('fast').addClass('yes');
    $(parent).closest('input, select, textarea').prop('disabled', false);
  }
  else {
    $(parent).closest('tr').fadeOut('fast').addClass('no');
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
