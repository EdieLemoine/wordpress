<?php

/**
 * Shortcode handler
 */

$atts = cs_atts( array(
	'id' => $id,
	'class' => 'ep-contactbox ' . $class
) );

?>

<div <?php echo $atts ?>>
	<?php echo $content ?>
</div>
