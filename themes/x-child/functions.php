<?php

// Enqueue (or not) the parent stylesheet
// add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

// Load custom js
add_action( 'wp_enqueue_scripts', 'load_scripts', 99999 );
define( "THEME_URL", trailingslashit( get_stylesheet_directory_uri() ) );
define( "THEME_PATH", trailingslashit( get_stylesheet_directory() ) );

function add_script( $name, $file, $deps = '', $footer = true ) {
  $time = !filemtime( THEME_PATH . "dist/js/" . $file ) ? "" : '?date=' . filemtime( THEME_PATH . "/dist/js/" . $file );
  return wp_register_script( $name, THEME_URL . "dist/js/" . $file . $time, $deps, null, $footer );
}

function load_scripts() {
  wp_enqueue_style( 'ep-child', THEME_URL . "style.css?date=" . filemtime( THEME_PATH . 'style.css' ) );

  add_script( 'ep-javascript', 'ep-javascript.min.js' );
  add_script( 'ep-jquery', 'ep-jquery.min.js', array( 'jquery' ) );

  wp_enqueue_script( 'ep-javascript' );
  wp_enqueue_script( 'ep-jquery' );
}

function ep_catalog_archive_size( $shop_catalog ) {
	return array( 400, 400 );
}

add_filter( 'subcategory_archive_thumbnail_size', 'ep_catalog_archive_size', 10, 1 );
