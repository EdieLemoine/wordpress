<?php

// =============================================================================
// VIEWS/INTEGRITY/_BREADCRUMBS.PHP
// -----------------------------------------------------------------------------
// Breadcrumb output for Integrity.
// =============================================================================

?>

<?php if ( ! is_front_page() ) : ?>
  <?php if ( x_get_option( 'x_breadcrumb_display' ) == '1' ) : ?>

    <div class="x-breadcrumb-wrap">
      <div class="x-container max width">
        <?php

        if ( is_woocommerce() ):
          woocommerce_breadcrumb();
        else :
          x_breadcrumbs();
        endif;

        if ( is_single() || x_is_portfolio_item() ) :
          x_entry_navigation();
        endif;

        ?>
      </div>
    </div>

  <?php endif; ?>
<?php endif; ?>
