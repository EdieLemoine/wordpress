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
