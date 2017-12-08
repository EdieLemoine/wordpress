<?php

/**
 * Element Definition
 */

class EP_El_Shortcode extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Shortcode' ),
    	'icon_group' => 'el-shortcode'
    );
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
		  'common' => array(
		    '!style'
		  ),
		  'shortcode' => array(),
		  'atts' => $this->control(array(
				'title' => 'Attributes',
				'type' => 'text'
			))
		);

		$this->controls['shortcode'] = array(
			'type' => 'select',
			'context' => 'content',
			'ui' => array(
				'title' => __ep("Shortcode")
			),
			'options' => array()
		);

		$entries = [];
		// $prevletter = null;

		global $shortcode_tags;
		$shortcodes = $shortcode_tags;
		ksort( $shortcodes );

		foreach ( $shortcodes as $name => $value ) {
			// $firstletter = substr( $name, 0, 1);
			// if ( $firstletter != $prevletter ) :
			// 	$entries[] = array(
			// 		'value' => 'disabled',
			// 		'label' => strtoupper($firstletter)
			// 	);
      //
			// 	// $entries[] = "<option disabled>" . strtoupper( $firstletter ) . "</option>";
			// endif;

			$entries[] = array(
				'value' => $name,
				'label' => $name
			);
			// $prevletter = $firstletter;
		}

		$this->controls['shortcode']['options'] = array(
			'choices' => $entries
		);

		$this->defaults = $this->add_defaults( $this->controls );
		// pretty_print($this->controls);
		return $this->controls;
	}
}
