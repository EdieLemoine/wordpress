<?php

class EP_Dashboard extends Edies_Plugin {

  public function __construct() {
  }

  // PAGES
  public function add_menu_pages() {
    add_menu_page(
      __ep( 'Overview' ),
      __ep( 'Edie&#39;s Plugin' ),
      'manage_options',
      'edies-plugin/edies-plugin-admin.php',
      array( new EP_Settings, 'page_callback'),
      'dashicons-carrot',
      3
    );
  }

  public function admin_bar_menu( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->add_node( array(
      'id' => 'edies-plugin',
      'title' => '<span class="ab-icon"></span><span class="ab-label"></span>',
      'href' => get_site_url() . '/wp-admin/admin.php?page=edies-plugin/edies-plugin-admin.php',
      'meta' => array(
        'class' => 'bg-color'
      )
    ));
  }

  public function add_sidebars() {
    $areas = [
      "top" => ep_get_option( 'footer__top_widgets' ),
      "bottom" => ep_get_option( 'footer__bottom_widgets' )
    ];

    foreach ($areas as $area => $num) {
      for ($i=1; $i <= $num; $i++) {
        register_sidebar(
          array (
            'name' => __ep( ucwords( $area ) . " footer" ) . ' ' . $i,
            'id' => "ep-$area-footer-$i",
            'description' => __ep( "Widgetized $area footer area" ) . ' ' . $i,
            'class' => "ep",
            'before_widget' => '<div class="widget-content %1$s %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
          )
        );
      }
    }
  }

  public function add_post_types() {
    register_post_type(
      'ep-slides',
      array(
        'labels' => array(
          'name' => __ep( 'Slides' ),
          'singular_name' => __ep( 'Slide' ),
        ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'menu_icon' => 'dashicons-slides',
        'show_in_nav_menus' => false,
        'show_in_menu' => 'edies-plugin/edies-plugin-admin.php',
      )
    );
    register_post_type(
      'ep-portfolio',
      array(
        'labels' => array(
          'name' => __ep( 'Portfolio Items' ),
          'menu_name' => __ep( 'Portfolio' ),
          'singular_name' => __ep( 'Portfolio Item' ),
        ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'menu_icon' => 'dashicons-portfolio',
        'show_in_nav_menus' => false,
        'show_in_menu' => 'edies-plugin/edies-plugin-admin.php',
      )
    );
    register_post_type(
      'ep-partners',
      array(
        'labels' => array(
          'name' => __ep( 'Partners' ),
          'menu_name' => __ep( 'Partners' ),
          'singular_name' => __ep( 'Partner' ),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon' => 'dashicons-id-alt',
        'show_in_menu' => 'edies-plugin/edies-plugin-admin.php',
        'rewrite' => array(
          'slug' => 'partners'
        )
      )
    );
  }
}
