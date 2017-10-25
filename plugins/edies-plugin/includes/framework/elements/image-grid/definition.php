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
    	'icon_group' => 'image-grid'
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
		  'complex' => $this->control(array(
				'title' => 'Toggle complex output',
				'type' => 'toggle'
			)),
		  'x' => $this->control(array(
				'title' => 'X ratio',
				'type' => 'number',
				'condition' => 'complex',
				'default' => 4
			)),
		  'y' => $this->control(array(
				'title' => 'Y ratio',
				'type' => 'number',
				'condition' => 'complex',
				'default' => 3
			)),
		  'orderby' => $this->control(array(
				'type' => 'order_by'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
