<?php

/**
 * Element Definition
 */

class EP_Advanced_Button extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Advanced Button', 'edies-plugin' ),
    	'icon_group' => 'advanced-button'
    );
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
			'common' => array(
				'!style'
			),
			'button_style' => array(
				'type' => 'select',
				'ui' => array(
					'title' => __ep( 'Button style', 'edies-plugin' )
				),
				'options' => array(
					'choices' => array(
						array( 'label' => 'Simple', 'value' => 'simple' ),
						array( 'label' => 'Custom', 'value' => 'custom' )
					)
				),
				'default' => 'simple'
			),
			'link_type' => array(
				'type' => 'select',
				'ui' => array(
					'title' => __ep( 'Link type', 'edies-plugin' )
				),
				'options' => array(
					'choices' => array(
						array( 'label' => __ep( 'Post', 'edies-plugin' ), 'value' => 'post' ),
						array( 'label' => __ep( 'Custom', 'edies-plugin' ), 'value' => 'custom' ),
					)
				),
				'default' => 'post'
			),
			'post_type' => $this->control( array(
				'type' => 'post_type',
				'condition' => array( 'link_type', 'post' )
			)),
			'link' => $this->control( array(
				'title' => 'Link',
				'type' => 'text',
				'condition' => array( 'link_type', 'custom' )
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
