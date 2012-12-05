<?php

/*
 * Applies the background to the footer.
 */
function shoestrap_footer_css() {
  $footer_color = get_theme_mod( 'shoestrap_footer_background_color' );
  
  // Make sure colors are properly formatted
  $footer_color = '#' . str_replace( '#', '', $footer_color );
  
  $styles = '<style>';
  $styles .= '#footer-wrapper{ background: ' . $footer_color . ';}';
  if ( shoestrap_get_brightness( $footer_color ) >= 160 ) {
    $styles .= '#footer-wrapper{ color: ' . shoestrap_adjust_brightness( $footer_color, -150 ) . ';}';
    $styles .= '#footer-wrapper a{ color: ' . shoestrap_adjust_brightness( $footer_color, -180 ) . ';}';
  } else {
    $styles .= '#footer-wrapper{ color: ' . shoestrap_adjust_brightness( $footer_color, 150 ) . ';}';
    $styles .= '#footer-wrapper a{color: ' . shoestrap_adjust_brightness( $footer_color, 180 ) . ';}';
  }
  $styles .= '</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_footer_css_cache() {
  $data = get_transient( 'shoestrap_footer_css' );
  if ( $data === false ) {
    $data = shoestrap_footer_css();
    set_transient( 'shoestrap_footer_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_footer_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_footer_css_cache_reset() {
  delete_transient( 'shoestrap_footer_css' );
  shoestrap_footer_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_footer_css_cache_reset' );
