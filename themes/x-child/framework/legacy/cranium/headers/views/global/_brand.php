<?php

// =============================================================================
// VIEWS/GLOBAL/_BRAND.PHP
// -----------------------------------------------------------------------------
// Outputs the brand.
// =============================================================================

$site_name        = get_bloginfo( 'name' );
$site_description = get_bloginfo( 'description' );
$logo             = x_make_protocol_relative( x_get_option( 'x_logo' ) );
$img_class        = !strpos( $logo, '.svg' ) ?: 'style-svg';
$site_logo        = "<img class='$img_class' src='$logo' alt='$site_description'>";

?>

<?php echo '<h1 class="visually-hidden">' . $site_name . '</h1>'; ?>

<a href="<?php echo home_url( '/' ); ?>" class="<?php x_brand_class(); ?>" title="<?php echo $site_description; ?>">
  <?php echo ( $logo == '' ) ? $site_name : $site_logo; ?>
</a>
