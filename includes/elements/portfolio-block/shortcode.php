<?php

/**
 * Shortcode handler
 */

getStaticID();


$atts = cs_atts( array(
	'id' => $id . 'map' . $staticID,
	'class' => "custom-map cf " . $title . $class,
	'style' => 'height: ' . $height . ';' . $style
) );


?>

<div <?php echo $atts ?>>

</div>
