<?php

/**
 * Element Definition
 */

class EP_Post_List extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Post List' ),
      'autofocus' => array(
				'categorie' => '',
    	),
   'icon_group' => $this->icon_group
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
			)),
			'category' => $this->control(array(
				'type' => 'categories',
				'tax' => 'product_cat'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
