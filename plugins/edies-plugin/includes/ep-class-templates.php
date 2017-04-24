<?php

class Edies_Plugin_Templates {
	protected $templates;
	protected $dir;
  private $version;

  public function __construct( $version ) {
    $this->version = $version;
		$this->dir = plugin_dir_path( __FILE__ ) . '/templates/';
	}

	public function set_single_template( $template ) {
		if ( get_post_type() == 'ep-kraam' OR get_post_type() == 'ep-winkel' ) {
      $template = 'ep-vendor-template.php';

			$template = $this->dir . $template;
    }
    return $template;
	}

	public function set_archive_template( $template ) {
		if ( is_tax( 'winkel-cat' ) OR is_tax( 'kraam-cat' ) ) {
      $template = 'ep-category-template.php';
			
			$template = $this->dir . $template;
    }
    return $template;
	}
}
