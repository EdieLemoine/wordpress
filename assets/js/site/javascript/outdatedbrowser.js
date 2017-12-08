function addLoadEvent( func ) {
  var oldonload = window.onload;
  if ( typeof window.onload != 'function' ) {
    window.onload = func;
  } else {
    window.onload = function() {
      if ( oldonload ) {
        oldonload();
      }
      func();
    }
  }
}
//call plugin function after DOM ready
addLoadEvent( function() {
  outdatedBrowser({
    lowerThan: "IE11"
  });
} );
