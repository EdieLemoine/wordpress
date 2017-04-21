<?php

/**
 * Element Definition
 */

class EP_Custom_Map {
	public $preserve_content = true;

	public function __construct() {

	}

	public function ui() {
		return array(
      'title'       => __( 'Custom Map', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
    	'icon_group' => 'custom-map'
    );
	}

	public function getStaticID() {
		static $staticID = 0;
		$staticID++;

		return 'ep-map' . $staticID;
	}

	public function flags() {
		return array(
			'dynamic_child' => true
		);
	}
}
