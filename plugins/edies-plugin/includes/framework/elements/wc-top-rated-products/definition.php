<?php

/**
 * Element Definition
 */

class EP_WC_Top_Rated_Products extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'WooCommerce Top Rated Products' ),
   'icon_group' => $this->icon_group
    );
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
		  'common' => array(
		    '!style'
		  ),
			'per_page' => $this->control(array(
				'title' => 'Number of products displayed per page',
				'type' => 'text'
			)),
			'columns' => $this->control(array(
				'title' => 'Number of columns',
				'type' => 'text'
			)),
			'orderby' => $this->control( 'orderby' ),
			'order' => $this->control( 'order' )
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
