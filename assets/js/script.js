jQuery(function($){
  $(document).ready(function() {

    function resizeVendorbox() {
      $('.vendor-box.right').css('min-height', $('.vendor-left').height());
    }
    
    resizeVendorbox();

    $(window).resize(function(){
      resizeVendorbox();
    });
  });
});
