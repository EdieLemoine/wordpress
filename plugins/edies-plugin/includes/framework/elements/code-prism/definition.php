<?php

/**
 * Element Definition
 */

class EP_Code_Prism extends EP_Element_Base {
	public $controls;
	public $defaults;
	public $preserve_content = true;

	public function __construct() {
		$this->controls = ( $this->controls ) ?: $this->add_controls();
	}

	// UI
	public function ui() {
		return array(
      'title' => __ep( 'Code' ),
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
			'title' => $this->control( array(
				'type' => 'text',
				'title' => 'Title'
			)),
			'code_content' => $this->control(array(
				'type' => 'code',
				'title' => "Content"
			) ),
			'language' => $this->control(array(
				'type' => 'select',
				'title' => 'Language',
				'options' => array(
					'php' => 'PHP',
					'js' => 'JavaScript',
					'scss' => 'Sass/SCSS',
					'css' => 'CSS',
					'html' => 'HTML'
				)
			))
		);

		$this->defaults = $this->add_defaults( $this->controls );
		return $this->controls;
	}
}
