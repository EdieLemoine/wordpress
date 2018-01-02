
<?php get_header(); ?>

<div class="content">


<div class="x-section">
	<div class="x-container max width">

<?php

    if ( is_singular( 'product' ) ) :
      while ( have_posts() ) : the_post();
        wc_get_template_part( 'content', 'single-product' );
      endwhile;

    else :

      echo "<h1 class='page-title'>" . woocommerce_page_title(false) ."</h1>";
      do_action( 'woocommerce_archive_description' );

      if ( have_posts() ) :

				echo do_shortcode('[woof]');

        // before_shop_loop
        wc_print_notices();
        // woocommerce_result_count();

        woocommerce_product_loop_start();

        woocommerce_product_subcategories();

        while ( have_posts() ) : the_post();
          wc_get_template_part( 'content', 'product' );
        endwhile;

        woocommerce_product_loop_end();

        // woocommerce_after_shop_loop
        woocommerce_pagination();

      elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :

        do_action( 'woocommerce_no_products_found' );

      endif;

    endif; ?>
  </div></div>
  <?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
