<?php

/**
 * Shortcode handler
 */
$ep_class = new EP_Masonry_Grid();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim('ep-advanced-accordion ' . $class)
) );

$args = array(
  'post_type' => $post_type,
  'per_page' => $per_page
);

$query = new WP_Query($args);
if ( $columns_auto == 1 ):
	$count = $query->post_count();

 	if ( $count % 4 == 0 ):
		$cols = 4;
	elseif ( $count % 3 == 0 ):
		$cols = 3;
	elseif ( $count % 2 == 0 ):
		$cols = 2;
	else:
		$cols = 3;
	endif;
else:
	$cols = $columns;
endif;

?>
<div <?php echo $atts ?>>
	<?php if ( $query->have_posts() ) :  ?>
    <div class="ep-grid-list cols-<?php echo $cols ?> cf">
	    <?php while ( $query->have_posts() ) : $query->the_post();?>
				<img src="<?php the_post_thumbnail_url('large') ?>">
	    <?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
  <?php endif; ?>
</div>
