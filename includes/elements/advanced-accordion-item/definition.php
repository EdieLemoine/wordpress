<?php

/**
 * Element Definition
 */

class EP_Advanced_Accordion_Item {

	public function ui() {
		return array(
      'title'       => __( 'Advanced Accordion Item', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
    	'icon_group' => 'advanced-accordion-item'
    );
	}

	public function flags() {
		return array(
			'child' => true
		);
	}

	public function update_build_shortcode_atts( $atts, $parent ) {

		if ( ! is_null( $parent ) ) {
      $atts['title_toggle'] = $parent['title_toggle'];
    }
    return $atts;
	}
}
