<?php

/**
 * Element Definition
 */

class EP_Adv_Button extends EP_Element_Base {
	public $controls;
	public $defaults;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Button' ),
      'autofocus' => array(
				'categorie' => '',
    	),
   		'icon_group' => $this->icon_group
    );
	}

	// Controls
	public function add_controls() {
		$this->controls = array(
		  'common' => array(
		    '!style'
		  ),
			'post_title' => $this->control( array(
				'type' => 'toggle',
				'title' => "Use post title",
				'default' => true,
				'condition' => array(
					'link_type' => 'post'
				)
			) ),
			'text' => $this->control( array(
				'type' => 'text',
				'condition' => array(
					'post_title' => false
				)
			) ),
			'link_type' => $this->control(array(
				'title' => "Link type",
				'type' => 'select',
				'options' => array(
					'custom' => 'Custom',
					'post' => 'Post'
				)
			)),
			'link' => $this->control(array(
				'title' => "Link",
				'type' => 'text',
				'default' => '#',
				'condition' => array(
					'link_type' => 'custom'
				)
			)),
			'post_type' => $this->control(array(
				'title' => "Post",
				'type' => 'post',
				'condition' => array(
					'link_type' => 'post'
				)
			)),
			'button_style' => $this->control(array(
				'title' => "Style",
				'type' => 'select',
				'options' => array(
					'global' => 'Global',
					'fill' => 'Fill',
					'transparent' => 'Transparent',
					'transparent-invert' => 'Transparent (invert)'
				)
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
