<?php

/**
 * Element Definition
 */

class EP_Custom_Map_Item {

	public function ui() {
		return array(
      'title'       => __ep( 'Custom map item', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
   'icon_group' => $this->icon_group
    );
	}

	public function getStaticID() {
		static $staticID = 0;
		$staticID++;

		return 'ep-map' . $staticID;
	}

	public function flags() {
		return array(
			'child' => true,
		);
	}

	public function register_shortcode() {
		return false;
	}

	public function update_build_shortcode_atts( $atts ) {
		return $atts;
	}
}
