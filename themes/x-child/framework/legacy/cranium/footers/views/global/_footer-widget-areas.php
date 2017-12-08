<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER-WIDGET-AREAS.PHP
// -----------------------------------------------------------------------------
// Outputs the widget areas for the footer.
// =============================================================================

$n = ep_get_option( 'footer__top_widgets' ); ?>

<?php if ( ep_get_option( 'footer__top_enabled') ) : ?>

  <footer id="footer" class="x-colophon top" role="contentinfo">
    <div class="ep-row ep-l-fd-col-rev">
      <?php if ( ep_get_option_check( 'footer__top_parts', 'map' ) ) : ?>
        <?php $n = $n + 1; ?>
        <div class="ep-1-<?php echo $n; ?>">
          <?php echo do_shortcode('[ep-custom-map]'); ?>
        </div>
      <?php endif; ?>
      <?php

      $i = 0; while ( $i < $n ) : $i++;

        echo '<div class="ep-1-' . $n . '"><div class="x-container max width">';
          dynamic_sidebar( 'footer-' . $i );
        echo '</div></div>';

      endwhile;

      ?>
    </div>
  </footer>

<?php endif; ?>

<?php $n = ep_get_option( 'footer__bottom_widgets' ); ?>

<?php if ( ep_get_option( 'footer__bottom_enabled') ) : ?>

  <footer id="footer-bottom" class="x-colophon bottom">
    <?php if ( $n != 0 ) : ?>
      <div class="x-container max width">
        <?php
        $i = 4; while ( $i < $n + 4 ) : $i++;

          echo '<div class="ep-1-' . $n . '"><div class="x-container max width">';
            dynamic_sidebar( 'footer-' . $i );
          echo '</div></div>';

        endwhile;
        ?>
      </div>
    <?php endif; ?>
    <?php if ( ep_get_option_check( 'footer__bottom_parts', 'social' ) or ep_get_option_check( 'footer__bottom_parts', 'menu' ) ) : ?>
      <div class="x-container max width">
        <?php

        if ( ep_get_option_check( 'footer__bottom_parts', 'social' ) ) :
          echo do_shortcode( '[ep-social]' );
        endif;

        if ( ep_get_option_check( 'footer__bottom_parts', 'menu' ) ) :
          x_get_view( 'global', '_nav', 'footer' );
        endif;

        ?>
      </div>
    <?php endif; ?>
  </footer>

<?php endif; ?>

<?php if ( ep_get_option( 'footer__bar_enabled') ) : ?>
  <footer class="x-colophon bar">
    <div class="x-colophon-content">
      <?php echo do_shortcode( ep_get_option( 'footer__bar_content' ) ); ?>
    </div>
  </footer>
<?php endif; ?>
