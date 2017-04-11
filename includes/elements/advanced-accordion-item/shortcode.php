<?php

/**
 * Shortcode handler
 */

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( 'x-accordion-group ' . $class )
) );
?>

<div <?php echo $atts ?> data-cs-collapse-group="">
  <div class="x-accordion-heading">
    <a class="ep-accordion-toggle collapsed" data-cs-collapse-toggle="">
			<span <?php if ( $title_toggle == true ): echo 'class="h5 man"'; endif; ?> >
				<?php echo $title ?>
			</span>
    </a>
  </div>
  <div class="x-accordion-body collapse cf" data-cs-collapse-content="">
    <div class="x-accordion-inner cf">
			<div class="ep-accordion-left x-column x-2-3">
				<?php echo $content; ?>
				<?php if ( $link ) : ?>
					<a href="<?php echo $link; ?>" class="x-btn x-btn-global mtl">Lees meer</a>
				<?php endif; ?>
			</div>
			<?php if ( $image ) : ?>
			<div class="ep-accordion-right x-column x-1-3" style="height:100%;background-image:url('<?php echo $image; ?>')" >
			</div>
		<?php endif; ?>
    </div>
  </div>
</div>
