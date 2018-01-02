<?php

/**
 * Element Definition
 */

class EP_Contact_Box extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Contact box group' ),
      'autofocus' => array(
				'height' => '',
    	),
   		'icon_group' => $this->icon_group
    );
	}

	// Flags
	public function flags() {
		return array(
			'dynamic_child' => true
		);
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
			'common' => array(
		    '!style'
		  ),
		  'elements' => array(
		    'type' => 'sortable',
		    'ui' => array(
		      'title' => __ep( 'Contact boxes')
		    ),
		    'options' => array(
		      'element' => 'contact-box-item',
		      'newTitle' => __ep( 'Contact box %s'),
		      'floor'   => 0,
		    )
		  ),
		  'ani_bar_toggle' => $this->control( array(
				'type' => 'ani_bar_toggle'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
