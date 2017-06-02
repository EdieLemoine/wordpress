<?php

/**
 * Shortcode handler
 */
$c = new EP_Image_Grid();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( 'ep-grid ' . ( $complex? 'complex' : 'simple' ) )
) );

$args = array(
  'post_type' => $post_type,
  'posts_per_page' => $per_page
);

$query = new WP_Query($args);

$count = $query->post_count();
if ( $columns_auto == 1 ):

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
endif; ?>
<div <?php echo $atts ?> ep-x="<?php echo $x; ?>" ep-y="<?php echo $y; ?>">
  <?php if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			$image = get_the_post_thumbnail_url( null, 'large');
			$content = $c->truncate( wp_strip_all_tags( get_the_excerpt(), true ), 80 );
			if ( $complex ) : ?>
				<a class="ep ep_1-<?php echo $cols ?>" href="<?php echo get_permalink() ?>" >
					<div class="ep-text">
						<h2><?php echo get_the_title(); ?></h2>
				    <p><?php echo $content; ?></p>
					</div>
					<div class="ep-bg-image" style="background-image: url('<?php echo $image ?>');">
						<div class="ep-overlay"></div>
					</div>
				</a>
			<?php else : ?>
				<img src="<?php echo $image ?>">
			<?php endif; ?>
    <?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
  <?php endif; ?>
</div>
