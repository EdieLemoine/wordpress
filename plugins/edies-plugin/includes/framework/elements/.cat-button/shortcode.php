<?php

/**
 * Shortcode handler
 */



$atts = cs_atts( array(
	'id' => $id,
	'class' => "cat-button",
	'style' => $style
) );

?>

<div <?php echo $atts ?>>
	<a href="<?php echo $url ?>">
		<h2 class="h-custom-headline cs-ta-center">
			<?php echo $heading ?>
		</h2>
		<div class="cat blackbar">
			<span><?php echo $subtitle ?></span>
		</div>
		<div class="cat-img-wrapper">
			<img class="cat-img x-img-circle" src="<?php echo $image ?>" alt="<?php echo $heading ?>" />
		</div>
	</a>
</div>
