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
