<?php

// =============================================================================
// VIEWS/INTEGRITY/WOOCOMMERCE.PHP
// -----------------------------------------------------------------------------
// WooCommerce page output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>
<div class="x-section">

  <div class="x-container max width">

      <?php woocommerce_content(); ?>

  </div>
  <?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
