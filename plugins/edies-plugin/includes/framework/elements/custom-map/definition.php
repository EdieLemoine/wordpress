<?php

/**
 * Element Definition
 */

class EP_Custom_Map extends EP_Element_Base {
	public static $staticID = 0;

	public function __construct() {
		$this::$staticID++;
	}

	public function ui() {
		return array(
      'title'       => __ep( 'Custom Map', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
    	'icon_group' => 'edies-plugin'
    );
	}

	public function flags() {
		return array(
			'dynamic_child' => true
		);
	}
}
