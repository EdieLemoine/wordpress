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

function ep_button( $link = null, $text = "Lees verder", $class = null ) {
  global $post;

  if ($link == null) :
    if ( get_permalink($post->ID) ) :
      $link = get_permalink($post->ID);
    elseif ( is_user_logged_in() ):
      $link = get_edit_post_link( $post->ID );
      $text = "Bewerken";
    else :
      return;
    endif;
  endif;

  $array = array(
    'href' => $link
  );

  if ( $class )
    $array['class'] = $class;

  echo eps_button( $array, $text );
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

function ep_getlatlng( $string ) {
  if ( $string )
    if ( is_array( $string ) ) :
      foreach ($string as $key) {
        $arr[] = ep_getlatlng( $key );
      }
      return $arr;
    else :
      $arr = explode( ',', str_replace( ' ', '', $string ) );

      $string = [];
      $string['lat'] = floatval($arr[0]);
      $string['lng'] = floatval($arr[1]);
    endif;
  return $string;
}

function ep_bgimg( $url ) {
  echo "style='background-image: url(\"$url\")'";
}

function ep_query_args() {
  $array = array(
    'post_type' => 'post',
    'posts_per_page' => -1,

    'order' => 'DESC',
    'orderby' => 'title',

    'author' => '',
    'author_name' => '',
    'author__in' => '',
    'author__not_in' => '',

    'cat' => '',
    'category_name' => '',
    'category__and' => '',
    'category__in' => '',
    'category__not_in' => '',

    'tag' => '',
    'tag_id' => '',
    'tag__and' => '',
    'tag__in' => '',
    'tag__not_in' => '',
    'tag_slug__and' => '',
    'tag_slug__in' => '',
  );

  return $array;
}
