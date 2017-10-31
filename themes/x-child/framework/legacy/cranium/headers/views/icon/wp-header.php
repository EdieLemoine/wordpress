<?php

// =============================================================================
// VIEWS/ICON/WP-HEADER.PHP
// -----------------------------------------------------------------------------
// Header output for Icon.
// =============================================================================

?>

<?php x_get_view( 'global', '_header' ); ?>

  <?php x_get_view( 'global', '_slider-above' ); ?>

  <header class="<?php x_masthead_class(); ?>" role="banner">
    <?php x_get_view( 'global', '_topbar' ); ?>
    <?php x_get_view( 'global', '_navbar' ); ?>
  </header>

  <?php x_get_view( 'global', '_slider-below' ); ?>
