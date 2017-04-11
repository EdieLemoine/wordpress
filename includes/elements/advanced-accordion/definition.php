<?php

/**
 * Element Definition
 */

class EP_Advanced_Accordion {

	public function ui() {
		return array(
      'title' => __( 'Advanced Accordion', 'edies-plugin' ),
    	'icon_group' => 'advanced-accordion'
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
