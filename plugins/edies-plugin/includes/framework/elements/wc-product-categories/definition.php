<?php

/**
 * Element Definition
 */

class EP_WC_Product_Categories extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'WooCommerce Product Categories' ),
   'icon_group' => $this->icon_group
    );
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
		  'common' => array(
		    '!style'
		  ),
			'number' => $this->control(array(
				'title' => 'Number of categories to be displayed',
				'type' => 'text'
			)),
			'columns' => $this->control(array(
				'title' => 'Number of columns',
				'type' => 'text'
			)),
			'orderby' => $this->order_by(),
			'order' => $this->order(),
		  'hide_empty' => $this->control(array(
				'title' => 'Hide empty categories',
				'type' => 'toggle'
			)),
			'parent' => $this->control(array(
				'title' => "Parent (0 = top level)",
				'type' => 'text'
			)),
			'ids' => $this->control(array(
				'title' => "IDs to be displayed",
				'type' => 'text'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
