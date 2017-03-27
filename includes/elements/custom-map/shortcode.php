<?php

/**
 * Shortcode handler
 */

getStaticID();


$atts = cs_atts( array(
	'id' => $id . 'map' . $staticID,
	'class' => $title,
	'style' => 'height: ' . $height . ';' . $style
) );


?>

<div <?php echo $atts ?>>
	<h5>test</h5>
</div>
