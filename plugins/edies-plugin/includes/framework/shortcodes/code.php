<?php

function eps_code( $atts, $content ) {
  $atts = shortcode_atts( array(
    'language' => 'js',
    'class' => 'line-numbers',
    'title' => ''
  ), $atts);

  $atts['class'] = "language-" . $atts['language'] . " " . $atts['class'];

  wp_script_is( 'prism' ) ?: wp_enqueue_script( 'prism' );

  $new_atts = ep_atts(array(
    'class' => $atts['class'],
    'data-label' => $atts['title']
  ));

  ?> <pre <?php echo $new_atts; ?>>
    <code>
      <?php echo $content; ?>
    </code>
  </pre> <?php
}
