<?php

/**
 * Shortcode handler
 */
$c = new EP_Image_Grid();

if ( $complex == 1 ) :
	$class .= ' ep-complex ';
else :
	$class .= ' ep-simple ';
endif;

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( 'ep-grid ' . $class)
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
endif;

$image = the_post_thumbnail_url('large');
?>

<div <?php echo $atts ?>>
  <?php if ( $query->have_posts() ) : ?>
    <div class="ep-grid" posts="<?php echo $count; ?>">
	    <?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php if ( $complex == 1 ) : ?>
					<a class="ep ep-1-<?php echo $cols ?>" href="<?php echo get_permalink() ?>" >
			      <div class="ep-grid-item">
							<div class="ep-grid-text-wrap">
								<h2 class="man"><?php echo get_the_title(); ?></h2>
			        	<p class="man"><?php echo $c->truncate( wp_strip_all_tags( get_the_excerpt(), true ), 80 ); ?></p>
							</div>
							<div class="bg-image"
							<?php ( $image )?: "style=\"background-image: url($image);\"" ?>>
								<div class="ep-overlay"></div>
							</div>
			      </div>
					</a>
				<?php else : ?>
					<img src="<?php the_post_thumbnail_url('large') ?>">
				<?php endif; ?>
	    <?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
  <?php endif; ?>
</div>
