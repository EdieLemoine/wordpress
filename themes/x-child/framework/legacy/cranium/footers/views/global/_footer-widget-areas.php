<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER-WIDGET-AREAS.PHP
// -----------------------------------------------------------------------------
// Outputs the widget areas for the footer.
// =============================================================================

$map1 = ep_get_option_check( 'footer__top_parts', 'map' );
$map2 = ep_get_option_check( 'footer__bottom_parts', 'map' );

$n1 = ep_get_option( 'footer__top_widgets' );
$n2 = ep_get_option( 'footer__bottom_widgets' );

function footer_map( $index, $atts = "" ) {
  $map  = "<div class='ep-1-$index ep-footer-map'>";
  $map .= do_shortcode( "[eps_custom_map $atts]" );
  $map .= "</div>";

  echo $map;
}

?>

<?php if ( ep_get_option( 'footer__top_enabled') ) : ?>
  <footer id="footer" class="x-colophon top">
    <?php

    if ( $map1 and ep_get_option( 'footer__top_map-position' ) == 'before' ) :
      footer_map( $n1 + 1 );
    endif;

    ?>
    <div class="x-container max width">
      <div class="ep-row ep-l-fd-col-rev">
        <?php

        $i = 0;

        while ( $i < $n1 ) : $i++;
          echo '<div class="ep-1-' . $n1 . ' ep-widget-area"><div class="x-container max width">';
            dynamic_sidebar( 'ep-top-footer-' . $i );
          echo '</div></div>';
        endwhile;

        ?>
      </div>
    </div>
    <?php

    if ( $map1 and ep_get_option( 'footer__top_map-position' ) == 'after' ) :
      footer_map( $n1 + 1 );
    endif;

    ?>
  </footer>
<?php endif; ?>

<?php if ( ep_get_option( 'footer__bottom_enabled') ) : ?>
  <footer id="footer-bottom" class="x-colophon bottom">
    <?php if ( $n2 != 0 ) : ?>
      <!-- <div class="x-container max width"> -->
        <?php
        if ( $map2 and ep_get_option( 'footer__bottom_map-position' ) == 'before' ) :
          footer_map( $n2 + 1 );
        endif;
        ?>

        <div class="x-container max width">
          <div class="ep-row ep-l-fd-col-rev">
            <?php
              $i = 0; while ( $i < $n2) : $i++;

                echo '<div class="ep-1-' . $n2 . ' ep-widget-area"><div class="x-container max width">';
                  dynamic_sidebar( 'ep-bottom-footer-' . $i );
                echo '</div></div>';

              endwhile;
              ?>
            </div>
          </div>
          <?php

        if ( $map2 and ep_get_option( 'footer__bottom_map-position' ) == 'after' ) :
          footer_map( $n2 + 1 );
        endif;
        ?>
      <!-- </div> -->
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
<?php $content_class = ep_get_option( 'footer__bar_font' ); ?>
<?php if ( ep_get_option( 'footer__bar_enabled') ) : ?>
  <footer class="x-colophon bar">
    <div class="x-colophon-content <?php echo $content_class; ?>">
      <?php echo do_shortcode( ep_get_option( 'footer__bar_content' ) ); ?>
    </div>
  </footer>
<?php endif; ?>
