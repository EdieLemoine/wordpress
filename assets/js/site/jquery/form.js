$(document).ready(function(){
   $(document).on( 'click', 'form a.x-btn', function() {
     var form = $(this).closest( 'form' );
     form.submit();
   });
});
