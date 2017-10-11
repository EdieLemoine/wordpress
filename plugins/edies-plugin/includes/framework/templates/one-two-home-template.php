<?php
// x_get_view( 'global', '_header' );
get_header();

$intro = get_post(189);

$args = array(
  'post_type' => 'post',
  'orderby' => 'menu_order',
  'per_page' => -1,
  'order' => 'ASC',
  'category_name' => 'homepage'
);

$query = new WP_Query( $args );

$parallax = ep_part( 'parallax' );

// $parallax->open(); ?>

<div id="ep-top">
  <div id="ep-intro">
    <div class="intro-inner">
      <div class="intro">
        <?php echo do_shortcode('[x_custom_headline level="h2" looks_like="h3" accent="false"]Hey, wij zijn OneTwo Link.[/x_custom_headline][x_text_type prefix="Wij bouwen " strings="WEBSITES|CAMPAGNES|LOGOS|MERKEN|CONNECTIES" suffix="" tag="h2" type_speed="35" start_delay="0" back_speed="60" back_delay="2000" loop="true" show_cursor="true" cursor="|" looks_like="h1"]'); ?>
      </div>
    </div>
  </div>
  <div id="ep-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php x_link_pages(); ?>
    <?php endwhile; ?>

    <?php $i = 0;

    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : $query->the_post();
        $i++;

        $row = array(
          'class' => 'ep-row',
          'id' => $post->post_name
        );

        $text = array(
          'class' => 'ep ep-2-5 ep-text'
        );

        $bg = array(
          'class' => 'ep ep-3-5 ep-bg-image',
          'style' => 'background-image: url(' . get_the_post_thumbnail_url( $post, 'full' ) . ');'
        );

        if ( $i % 2 === 0 ) :
          $text['class'] .= ' bg1';
        else :
          $text['class'] .= ' bg3';
        endif;

        ?>
        <div <?php ep_atts( $row ) ?>>
          <?php if ( get_the_post_thumbnail_url() ) : ?>
            <div <?php ep_atts( $bg ) ?>>
              <a href="<?php echo get_the_permalink() ?>">
                <h1 class="ep-heading"><?php strtolower( the_title() ) . '.'; ?></h1>
              </a>
            </div>
          <?php endif; ?>
          <div <?php ep_atts( $text ) ?>>
            <div class="x-container max width">
              <h1 class="ep-heading"><?php the_title(); ?></h1>
              <?php the_content(); ?>
              <div class="ep-btn-group">
                <?php ep_button();

                while ( have_rows( 'buttons' ) ) : the_row();
                  ep_button( get_sub_field('link'), get_sub_field('text') );
                endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</div>
<div id="ep-footer">
  <h1>ep-footer</h1>
<?php get_footer(); ?>
</div>
<?php // $parallax->close(); ?>
