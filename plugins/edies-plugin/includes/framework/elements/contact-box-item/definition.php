<?php

/**
 * Element Definition
 */

class EP_Contact_Box_Item extends EP_Contact_Box {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title'       => __ep( 'Contact box', 'edies-plugin' ),
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
		if ( !is_null( $parent ) ) {
			$atts['ani_bar_toggle'] = $parent['ani_bar_toggle'];
    }
		return $atts;
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
			'common' => array(
		    '!style',
		    '!id',
		    '!class'
		  ),
		  'title' => $this->control(array(
				'type' => 'title'
			)),
		  'icon' => $this->control(array(
				'type' => 'icon'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
