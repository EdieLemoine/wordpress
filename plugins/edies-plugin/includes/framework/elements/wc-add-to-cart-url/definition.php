<?php

/**
 * Element Definition
 */

class EP_WC_Add_To_Cart_Url extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'WooCommerce Add To Cart URL' ),
   		'icon_group' => $this->icon_group,
			'icon' => 'woocommerce'
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
