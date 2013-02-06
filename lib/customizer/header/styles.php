<?php

/*
 * Applies css to the branding area (extra header).
 */
function shoestrap_branding_css() {
  $header_bg_color        = get_theme_mod( 'shoestrap_header_backgroundcolor' );
  $header_sitename_color  = get_theme_mod( 'shoestrap_header_textcolor' );
  
  // Make sure colors are properly formatted
  $header_bg_color        = '#' . str_replace( '#', '', $header_bg_color );
  $header_sitename_color  = '#' . str_replace( '#', '', $header_sitename_color );
  
  $styles = '<style>';
  $styles .= '.logo-wrapper{background: ' . $header_bg_color . ';}';
  $styles .= '.logo-wrapper .logo a{color: ' . $header_sitename_color . ';}';
  $styles .= '</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_branding_css_cache() {
  $data = get_transient( 'shoestrap_branding_css' );
  if ( $data === false ) {
    $data = shoestrap_branding_css();
    set_transient( 'shoestrap_branding_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_branding_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_branding_css_cache_reset() {
  delete_transient( 'shoestrap_branding_css' );
  shoestrap_branding_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_branding_css_cache_reset' );
