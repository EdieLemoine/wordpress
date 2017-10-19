<?php

/**
 * Element Definition
 */

class EP_Advanced_Accordion_Item extends EP_Advanced_Accordion {
	static $staticID;

	public function __construct() {
		$this->getStaticID();
	}

	public function ui() {
		return array(
      'title' => __ep( 'Advanced Accordion Item', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
    	'icon_group' => 'advanced-accordion-item'
    );
	}

	public function getStaticID() {
		return 'ep-advanced-accordion-' . $this::$staticID++;
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
			$atts['type'] = $parent['type'];
			$atts['direction'] = $parent['direction'];
    }
    return $atts;
	}
}
