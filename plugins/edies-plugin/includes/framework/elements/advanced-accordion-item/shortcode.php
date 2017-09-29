<?php

/**
 * Shortcode handler
 */
$c = new EP_Advanced_Accordion_Item();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( "tab " . $class )
) );

$number = 'tab-' . $c::$staticID;

if ( ! $c->convert_bool( $type ) ) {
	$type = 'checkbox';
}
else {
	$type = 'radio';
}

$input = cs_atts( array(
	'type' => $type,
	'id' => $number,
	'name' => 'tabs'
));

?>

<div <?php echo $atts ?>>
	<input <?php echo $input; ?> />
	<label for="<?php echo $number; ?>"><?php echo $title; ?></label>
	<div class="tab-content">
		<div class="tab-content-inner">
			<?php echo $content; ?>
		</div>
	</div>
</div>
