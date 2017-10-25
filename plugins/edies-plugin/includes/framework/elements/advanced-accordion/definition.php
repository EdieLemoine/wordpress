<?php

/**
 * Element Definition
 */

class EP_Advanced_Accordion extends EP_Element_Base {
	static $ID;
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
		$this::$ID++;
	}

	// UI
	public function ui() {
		return array(
			'title' => __ep( 'Advanced Accordion' ),
			'icon_group' => 'edies-plugin'
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
					'title' => __ep('Accordion Items')
				),
				'options' => array(
					'element' => 'advanced-accordion-item',
					'newTitle' => __ep('Accordion item %s'),
					'floor' => 1,
					'title_field' => 'title'
				)
			),
			'title_toggle' => $this->control( array(
				'title' => 'Toggle Heading',
				'type' => 'toggle'
			)),
			'type' => $this->control( array(
				'title' => 'Multiple/single',
				'type' => 'toggle'
			)),
			'direction' => $this->control( array(
				'title' => 'Vertical/horizontal',
				'type' => 'toggle'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
