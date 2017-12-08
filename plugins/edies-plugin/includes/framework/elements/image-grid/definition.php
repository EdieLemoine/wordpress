<?php

/**
 * Element Definition
 */

class EP_Image_Grid extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Image Grid' ),
      'autofocus' => array(
				'categorie' => '',
    	),
    	'icon_group' => 'product-list'
    );
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
		  'common' => array(
		    '!style'
		  ),
		  'post_type' => $this->control(array(
				'type' => 'post_type',
				'default' => 'product'
			)),
		  'per_page' => $this->control(array(
				'title' => 'Per page',
				'type' => 'number'
			)),
			'orderby' => $this->control(array(
				'type' => 'order_by'
			)),
			'order' => $this->control(array(
				'type' => 'order'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
