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

	public function flags() {
		return array(
			'child' => true,
		);
	}

	public function update_build_shortcode_atts( $atts ) {
		if ( ! is_null( $parent ) ) {
			$atts['ani_bar_toggle'] = $parent['ani_bar_toggle'];
    }
		return $atts;
	}
}
