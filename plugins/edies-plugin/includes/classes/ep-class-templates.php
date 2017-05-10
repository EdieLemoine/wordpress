<?php

class EP_Templates extends Edies_Plugin {
	protected $version;

  public function __construct( $version ) {
    $this->version = $version;
	}

	public function set_single_template( $template ) {
		if ( get_post_type() == 'ep-kraam' OR get_post_type() == 'ep-winkel' ) {
      $template = 'ep-vendor-template.php';

			$template = DIR_TEMPLATES . $template;
    }
    return $template;
	}

	public function set_archive_template( $template ) {
		if ( is_tax( 'winkel-cat' ) OR is_tax( 'kraam-cat' ) ) {
      $template = 'ep-category-template.php';

			$template = DIR_TEMPLATES . $template;
    }
    return $template;
	}
}
