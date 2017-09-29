<?php

/**
 * Shortcode handler
 */
$c = new EP_Advanced_Accordion();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( 'ep-accordion-' . $c::$ID . $class)
) );
?>

<h3>Accordion ID: <?php echo $c::$ID; ?></h3>
<div <?php echo $atts; ?>>
	<?php echo $content; ?>
</div>
