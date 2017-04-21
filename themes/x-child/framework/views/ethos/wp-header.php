<?php

// =============================================================================
// VIEWS/ETHOS/WP-HEADER.PHP
// -----------------------------------------------------------------------------
// Header output for Ethos.
// =============================================================================

// Line 25: <?php x_get_view( 'global', '_slider-above' ); (close php tag)
// Line 34: <?php x_get_view( 'global', '_slider-below' ); (close php tag)
// Replace with:
//
//   <?php
//   echo ‘<div class=”x-slider-revolution-container (ABOVE/BELOW)>’;
//   echo do_shortcode( ‘[rev_slider (NAME))]’ );
//   echo ‘</div>’;
//   (close php tag)
//
// To add a slider on every page

?>

<?php x_get_view( 'global', '_header' ); ?>

<?php x_get_view( 'global', '_slider-above' ); ?>

<header class="<?php x_masthead_class(); ?>" role="banner">
  <?php x_get_view( 'ethos', '_post', 'carousel' ); ?>
  <?php x_get_view( 'global', '_topbar' ); ?>
  <?php x_get_view( 'global', '_navbar' ); ?>
  <?php x_get_view( 'ethos', '_breadcrumbs' ); ?>
</header>

<?php x_get_view( 'global', '_slider-below' ); ?>

<?php x_get_view( 'ethos', '_landmark-header' ); ?>
