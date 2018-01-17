<?php

function ep_atts( $atts ) {
  $arr = '';
  foreach ( $atts as $key => $value ) {
    if ( $value != '' )
      $arr .=  $key . "=\"$value\"" . PHP_EOL;
  }
  return $arr;
}

function ep_part( $part ) {
  $file = PATH_FRAMEWORK . '/parts/ep-' . $part . '.php';

  if ( file_exists( $file ) ) :
    require_once $file;
    $classname = 'EP_Part_' . ucwords( $part );
    return new $classname();
  endif;
}

function ep_button( $link = null, $text = "Bewerken" ) {
  if ($link == null) :
    if ( is_user_logged_in() ):
      global $post;
      $link = get_edit_post_link( $post->ID );
    else :
      return;
    endif;
  endif;

  echo do_shortcode( "[eps_button href='$link']" . $text . "[/eps_button]" );
}

function pretty_print($string) {
  echo '<pre class="language-markup"><code>';
  print_r( $string );
  echo '</code></pre>';
}

function __ep( $string, $slug = null ) {

  if ( $slug == null ) :
    $slug = "edies-plugin";
  endif;

  return __( $string, $slug );
}

function _eep( $string, $slug = null ) {
  echo __ep( $string, $slug );
}
function convert_dash( $string ) {
  return str_replace('-', '_', $string);
}

function truncate( $string, $length, $dots = "..." ) {
  return ( strlen( $string ) > $length ) ? substr( $string, 0, $length - strlen( $dots ) ) . $dots : $string;
}

function ep_get_option( $option ) {
  return get_option( "ep_settings_" . $option );
}

function ep_option( $option ) {
  echo ep_get_option( $option );
}

function ep_get_option_check( $option, $part ) {
  return (ep_get_option($option) and array_key_exists($part, ep_get_option( $option )) and ep_get_option( $option )[$part]);
}

function weekdays( $initial = true, $echo = false ) {
	global $wp_locale;

  // TODO: make this run after init so new class isn't needed
  $ep_locale = new WP_Locale;

	$week = array();

	for ( $wdcount = 0; $wdcount <= 6; $wdcount++ ) {
		$week[] = $ep_locale->get_weekday( ( $wdcount + 1 ) % 7 );
	}

  if ( $echo )
    echo $week;
  else
    return $week;
}

function ep_options_list() {
  global $ep_options;
  return $ep_options;
}
