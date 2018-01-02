<?php

/**
 * Element Definition
 */

class EP_Custom_Map extends EP_Element_Base {
	public static $staticID = 0;
	public $controls;
	public $defaults;

	public function __construct() {
		$this::$staticID++;
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	public function ui() {
		return array(
      'title'       => __ep( 'Custom Map', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
   		'icon_group' => $this->icon_group
    );
	}

	public function flags() {
		return array(
			'dynamic_child' => true
		);
	}

	public function add_controls() {
		$this->controls = array(
			'common' => array(
				'!style'
			),
			'post_type' => $this->control(array(
				'type' => 'post_type'
			)),
			'zoom' => $this->control(array(
				'title' => 'Zoom level',
				'type' => 'number',
				'default' => 14
			)),
			'scroll' => $this->control(array(
				'title' => 'Scroll',
				'type' => 'toggle'
			)),
			'spinner_toggle' => $this->control(array(
				'title' => 'Spinner',
				'type' => 'toggle'
			)),
			'spinner' => $this->control(array(
				'title' => 'Spinner URL',
				'type' => 'text',
				'condition' => 'spinner_toggle'
			)),
			'center' => $this->control(array(
				'title' => 'Center',
				'type' => 'text',
				'default' => '52.3745291, 4.7585319'
			)),
			'height' => $this->control(array(
				'title' => 'Height',
				'type' => 'text',
				'default' => '50vh'
			)),

			'snazzy_style' => array(
				'type' => 'textarea',
				'ui' => array(
					'title' => __ep( 'Snazzy JSON' ),
					'tooltip' => __ep( 'Paste JSON code from snazzymaps here.' )
				),
				'context' => 'content',
				'monospace' => true
			)
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
