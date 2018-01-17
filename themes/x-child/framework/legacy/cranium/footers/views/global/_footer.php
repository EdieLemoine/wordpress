<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER.PHP
// -----------------------------------------------------------------------------
// Includes the wp_footer() hook and closes out the <body> and <html> tags.
// =============================================================================

?>


    <?php do_action( 'x_before_site_end' ); ?>

  </div> <!-- /.site -->


</div> <!-- /.x-root -->
<?php wp_footer(); ?>

<?php do_action( 'x_after_site_end' ); ?>
<?php do_action( 'ep_end_body' ); ?>
</body>
</html>
