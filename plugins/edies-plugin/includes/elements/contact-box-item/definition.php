<?php

/**
 * Element Definition
 */

class EP_Contact_Box_Item extends EP_Contact_Box {

	public function ui() {
		return array(
      'title'       => __( 'Contact box', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
    	'icon_group' => 'contact-box-item'
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
