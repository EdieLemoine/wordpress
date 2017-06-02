<?php

/**
 * Element Definition
 */

class EP_Masonry_Grid extends EP_Element_Base {

	public function __construct(){}

	public function ui() {
		return array(
      'title' => $this->__( 'Masonry Grid' ),
    	'icon_group' => $this->icon_group
    );
	}

	// public function flags() {
	// 	return array(
	// 		'dynamic_child' => true
	// 	);
	// }
	//
	// public function register_shortcode() {
  // 	return false;
  // }
	//
	// public function update_build_shortcode_atts( $atts ) {
	// 	$atts['content'] = count( $atts['elements'] );
	// 	return $atts;
	// }
}
