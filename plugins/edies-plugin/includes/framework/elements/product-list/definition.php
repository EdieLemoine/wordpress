<?php

/**
 * Element Definition
 */

class EP_Product_List extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Product List' ),
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
				'type' => 'post_type'
			)),
		  'per_page' => $this->control(array(
				'title' => 'Per page',
				'type' => 'number'
			)),
		  'columns_auto' => $this->control(array(
				'title' => 'Automatic columns',
				'type' => 'toggle'
			)),
		  'columns' => $this->control(array(
				'title' => 'Columns',
				'type' => 'number',
				'condition' => '!columns_auto'
			)),
		  'style' => $this->control(array(
				'title' => 'Style',
				'type' => 'select',
				'options' => array(
					'choices' => array(
						array( 'label' => 'Simple', 'value' => 'simple' ),
						array( 'label' => 'Custom', 'value' => 'custom' )
					)
				),
				'default' => 'simple'
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
