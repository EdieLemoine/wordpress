<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER-WIDGET-AREAS.PHP
// -----------------------------------------------------------------------------
// Outputs the widget areas for the footer.
// =============================================================================

$n = x_get_option( 'x_footer_widget_areas' );

?>

<?php if ( $n != 0 ) : ?>

  <footer class="x-colophon top" role="contentinfo">
    <div class="x-container max width">
      <?php


      $i = 0; while ( $i < $n ) : $i++;

        $last = ( $i == $n ) ? ' last' : '';

        echo '<div class="x-column x-md x-1-' . $n . $last . '">';
          dynamic_sidebar( 'footer-' . $i );
        echo '</div>';

      endwhile;

      ?>
    </div>
  </footer>

  <footer class="x-colophon bottom">
      <div class="x-container max width">
        <?php
        if ( x_get_option( 'x_footer_social_display' ) == '1' ) :
          x_social_global();
        endif;

        if ( x_get_option( 'x_footer_menu_display' ) == '1' ) :
          x_get_view( 'global', '_nav', 'footer' );
        endif;
        ?>
      </div>
  </footer>

  <footer class="x-colophon bar">
    <div class="x-container max width">
      <div class="x-colophon-content">
        <?php echo __( "Ontworpen en gerealiseerd door <a href='http://demediagroep.nl/'>De Media Groep</a>",'edie-custom' ) ?>
      </div>
    </div>
  </footer>

<?php endif; ?>
