<?php

/**
 * Element Definition
 */

class EP_Advanced_Accordion_Item extends EP_Advanced_Accordion {
	static $staticID;
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
		$this->getStaticID();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Advanced Accordion Item', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
   'icon_group' => $this->icon_group
    );
	}

	// Get Static ID
	public function getStaticID() {
		return 'ep-advanced-accordion-' . $this::$staticID++;
	}

	// Flags
	public function flags() {
		return array(
			'child' => true
		);
	}

	// Build Shortcode Atts
	public function update_build_shortcode_atts( $atts, $parent ) {
		if ( ! is_null( $parent ) ) {
			$atts['title_toggle'] = $parent['title_toggle'];
			$atts['columns'] = $parent['columns'];
			$atts['type'] = $parent['type'];
			$atts['direction'] = $parent['direction'];
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
			'title' => $this->control( array(
				'type' => 'title',
				'default' => __ep( 'Accordion Item' )
			)),
			'content' => $this->control( array(
				'title' => 'Content',
				'type' => 'editor'
			)),
			'image_toggle' => $this->control( array(
				'title' => 'Image',
				'type' => 'toggle'
			)),
			'image' => $this->control( array(
				'title' => 'Image',
				'type' => 'image',
				'condition' => 'image_toggle'
			)),
			'link_toggle' => $this->control( array(
				'title' => 'Link',
				'type' => 'toggle'
			)),
			'link' => $this->control( array(
				'title' => 'Link',
				'type' => 'text',
				'condition' => 'link_toggle'
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
