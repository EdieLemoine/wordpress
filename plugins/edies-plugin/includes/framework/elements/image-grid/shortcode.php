<?php

/**
	* Shortcode handler
*/

$c = new EP_Image_Grid();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( 'ep-grid ' . ( $complex? 'ep-complex' : 'ep-simple' ) )
) );

$args = array(
  'post_type' => $post_type,
  'posts_per_page' => $per_page,
	'orderby' => $orderby,
	'order' => $order
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
	<div class="ep-row">
	  <?php if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$image = get_the_post_thumbnail_url( null, 'large');
				$content = truncate( wp_strip_all_tags( get_the_excerpt(), true ), 80 );
				if ( $complex ) : ?>
					<a class="ep ep-1-<?php echo $cols ?>" href="<?php echo get_permalink() ?>" >
						<div class="ep-grid-inner">
							<div class="ep-text">
								<h2><?php echo get_the_title(); ?></h2>
						    <p><?php echo $content; ?></p>
							</div>
							<div class="ep-bg-image" style="background-image: url('<?php echo $image ?>');">
								<div class="ep-overlay"></div>
							</div>
						</div>
					</a>
				<?php else : ?>
					<div class="ep-grid-item  ep-1-<?php echo $cols ?>">
						<a href="<?php echo get_permalink() ?>" class="ep-grid-item-inner">
							<h3><?php echo get_the_title(); ?></h3>
							<img src="<?php echo $image ?>">
						</a>
					</div>
				<?php endif; ?>
	    <?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
	  <?php endif; ?>
	</div>
</div>
