<?php

class EP_Plugins extends Edies_Plugin {

  function __construct() {

    if ( defined( 'ACTIVE_WOOCOMMERCE' ) ) :
      add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
    endif;
  }

  // Changes woocommerce breadcrumb defaults
  public function woocommerce_breadcrumb_defaults( $defaults ) {
    $defaults['wrap_before'] = '<div class="x-breadcrumbs">';
    $defaults['wrap_after'] = '</div>';
    $defaults['delimiter'] = '<span class="delimiter"><i class="x-icon-angle-right" data-x-icon=""></i></span>';

    return $defaults;
  }
}
