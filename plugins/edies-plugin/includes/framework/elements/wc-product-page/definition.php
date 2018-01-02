<?php

/**
 * Element Definition
 */

class EP_WC_Product_Page extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'WooCommerce Product Page' ),
   'icon_group' => $this->icon_group
    );
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
		  'common' => array(
		    '!style'
		  ),
			'id' => $this->control(array(
				'title' => "ID",
				'type' => 'text'
			)),
			'sku' => $this->control(array(
				'title' => "SKU",
				'type' => 'text'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
