<?php

/**
 * Element Definition
 */

class Custom_Map {

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
		echo $staticID;
		$staticID++;
	}

}
