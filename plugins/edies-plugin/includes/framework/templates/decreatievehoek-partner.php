<?php get_header(); ?>
<!-- <div class="ep-breadcrumbs">
  <div class="x-container max width"> -->
    <?php


    // function breadcrumbs() {
    //   ob_start();
    //   x_breadcrumbs();
    //   $output = ob_get_contents();
    //   ob_end_clean();
    //
    //   $output = preg_replace( '/\/partners/', '#partners', $output );
    //
    //   return $output;
    // }
    //
    // echo breadcrumbs();

    ?>
  <!-- </div>
</div> -->
  <div class="x-main full" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="x-section">

          <div class="x-container max width">
            <div class="ep-row">
              <h1 class="h2"><?php echo the_title(); ?></h1>
            </div>
            <div class="ep-row">

              <div class="ep-col ep-4-5">
                <?php echo the_content(); ?>
              </div>
              <div class="ep-col ep-1-5">
                <?php if ( get_field( 'website' ) ) :
                  echo '<i class="fa fa-fw fa-link"></i><a href="' . trailingslashit( get_field('website') ) . '">' . parse_url( get_field( 'website' ) )[ 'host' ] . '</a>';
                endif; ?>
              </div>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
<?php get_footer(); ?>
