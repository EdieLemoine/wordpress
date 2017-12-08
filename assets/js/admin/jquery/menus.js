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
