<?php

/**
 * Element Definition
 */

class EP_Masonry_Grid extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	public function ui() {
		return array(
      'title' => __ep( 'Masonry Grid' ),
    	'icon_group' => $this->icon_group
    );
	}

	public function add_controls() {
		$this->controls = array(
			'common' => array(
				'!style'
			),
			'title_toggle' => $this->control(array(
				'title' => 'Toggle Heading',
				'type' => 'toggle'
			)),
			'columns' => $this->control(array(
				'title' => 'Columns',
				'type' => 'number'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
