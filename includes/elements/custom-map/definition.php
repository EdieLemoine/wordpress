<?php

/**
 * Element Definition
 */

class Portfolio_Block {

	public function ui() {
		return array(
      'title'       => __( 'Portfolio Block', 'edies-plugin' ),
      'autofocus' => array(
				'height' => '',
    	),
    	'icon_group' => 'portfolio-block'
    );
	}

	public function getStaticID() {
		static $staticID = 0;
		echo $staticID;
		$staticID++;
	}

}
