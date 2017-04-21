<?php

/**
 * Element Definition
 */

class EP_Advanced_Accordion extends Edies_Plugin {

	public function ui() {
		return array(
      'title' => $this->text( 'Advanced Accordion' ),
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
