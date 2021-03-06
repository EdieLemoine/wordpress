<?php

/**
 * Element Definition
 */

class EP_Masonry_Grid_Item extends EP_Masonry_Grid {

	public function ui() {
		return array(
      'title' => __ep('Advanced Accordion Item'),
      'autofocus' => array(
				'height' => '',
    	),
   		'icon_group' => $this->icon_group
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
			$atts['columns'] = $parent['columns'];
    }
    return $atts;
	}
}
