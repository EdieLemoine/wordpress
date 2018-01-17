$(document).ready(function(){
   $(document).on( 'click', 'form .ep-btn', function() {
     var form = $(this).closest( 'form' );
     $(this).addClass('submitting');
     form.submit();
   });

   $('.wpcf7').on( 'wpcf7submit', function() {
     console.log('submitted');
     $('.wpcf7 a').removeClass('submitting');
   });
});
