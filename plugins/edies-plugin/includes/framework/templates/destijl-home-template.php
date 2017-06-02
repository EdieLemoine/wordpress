<?php
get_header();

function edit_button() {
  if ( is_user_logged_in() ) {
    echo do_shortcode('[x_button class="x-btn-global adminbtn" href="' . get_edit_post_link( $post->ID ) . '"]Bewerken[/x_button]');
  }
}

$args = array(
  'post_type' => 'post',
  'per_page' => -1,
  'order' => ASC,
  'meta_key' => 'order',
  'orderby' => 'meta_value'
  // 'meta_query' => array(
  //   array(
  //     'key' => 'order'
  //   )
  // )
);

$query = new WP_Query($args);

$i = 1; ?>

<div id="ep-top">
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    $i++;

    $id = $post->post_name; ?>

    <div class="ep-row" id="<?php echo $id ?>">
      <?php if ( get_field('order') == 000 ) : ?>
        <div class="ep ep-2-5 ep-bg-image">
          <?php while ( have_rows('fotos') ) : the_row();
            if ( get_sub_field('foto') ) :
              echo '<div class="bg-image" style="background-image: url(' . get_sub_field('foto') . ');"></div>';
            endif;
          endwhile; ?>
        </div>
        <div class="ep ep-3-5">
          <div class="ep ep-2-5 bg3 ep-text">
            <div class="x-column x-1-1 x-container max width">
              <?php if ( get_the_title() ) { echo '<h2 class="ep-heading">' . get_the_title() . '</h2>'; } ?>
              <?php if ( is_user_logged_in() ) : ?>
                <script>
                  jQuery( function($) {
                    $( '#adminbtnremover' ).click(function(){
                      $( '.adminbtn' ).fadeOut(200);
                      $( this ).fadeOut(2000);
                    });
                  });
                </script>
                <a class="x-btn x-btn-global" href="#" id="adminbtnremover">Verwijder knoppen</a>
              <?php endif; ?>
            </div>
          </div>
          <div class="ep ep-3-5 bg1 ep-text">
            <div class="x-column x-1-1 x-container max width">
              <?php the_content(); ?>
              <?php edit_button(); ?>
            </div>
          </div>
        </div>

      <?php elseif ( !get_field( 'adress' ) and !get_field( 'architect' ) and !get_field( 'jaartal') ) : // Plain text rows ?>
        <div class="ep bg3 ep-text">
          <div class="x-container max width">
            <?php if ( get_the_title() ) { echo '<h2 class="ep-heading">' . get_the_title() . '</h2>'; } ?>
            <?php the_content(); ?>
            <?php edit_button(); ?>
          </div>
        </div>

      <?php else : // Places with image(s) and address ?>
        <div class="ep ep-2-5 bg0 ep-text">
          <div class="x-container max width">
            <?php if ( get_the_title() ) { echo '<h2 class="ep-heading">' . get_the_title() . '</h2>'; } ?>
            <h3 class="ep-subtitle">
              <?php
              if ( get_field('adress') ) { echo get_field('adress' ); }
              if ( get_field('architect') ) { echo ' | ' . get_field('architect' ); }
              if ( get_field('jaartal') ) { echo ' | ' . get_field('jaartal' ); }
              ?>
            </h3>
            <?php the_content(); ?>
            <?php edit_button(); ?>
          </div>
        </div>
        <div class="ep ep-3-5 bg2 ep-image">
          <?php if( have_rows('fotos') ) :
            $slides = '';
            $count = 0;

            while ( have_rows('fotos') ) : the_row();
              if ( get_sub_field('foto') ) :
                $count++;
              endif;
            endwhile;

            while ( have_rows('fotos') ) : the_row();
              if ( get_sub_field('foto') ) :

                if ($count > 1) :
                  $slides .= '[ep-slider-item image="' . get_sub_field('foto') . '"]';
                else :
                  echo '<div class="ep-bg-image" style="background-image: url(' . get_sub_field('foto') . ');"><a class="ep-lightbox-trigger" href="'.get_sub_field('foto').'"></a></div>';
                endif;

              endif;
            endwhile;

            if ( $slides != '' ) :
              do_shortcode( '[ep-slider]' . $slides . '[/ep-slider]');
            endif;

          else : ?>
            <h2 class="h4"><?php the_title() ?></h2>
            <?php edit_button(); ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      </div>

  <?php endwhile; wp_reset_postdata(); endif; ?>
</div>

<div id="ep-content">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php x_link_pages(); ?>
  <?php endwhile;
  wp_reset_postdata(); ?>
</div>

<div id="ep-footer">
<?php get_footer(); ?>
</div>
