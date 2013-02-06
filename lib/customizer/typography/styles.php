<?php

/*
 * CSS needed to apply the selecte styles to text elements.
 */
function shoestrap_text_css() {
  $background_color = get_theme_mod( 'shoestrap_background_color' );
  $link_color       = get_theme_mod( 'shoestrap_link_color' );
  $text_color       = get_theme_mod( 'shoestrap_text_color' );
  
  // Make sure colors are properly formatted
  $background_color = '#' . str_replace( '#', '', $background_color );
  $link_color       = '#' . str_replace( '#', '', $link_color );
  $text_color       = '#' . str_replace( '#', '', $text_color );
  
  $styles = '<style>';
  // General links styling
  $styles .= 'a, a.active, a:hover, a.hover, a.visited, a:visited, a.link, a:link{ color: ' . $link_color . ';}';
  // Text styling
  if ( strlen( $text_color ) < 6 ) {
    if ( shoestrap_get_brightness( $background_color ) >= 100 ) {
      $styles .= '#wrap { color: #333; }';
    } else {
      '#wrap { color: #f7f7f7; }';
    }
  } else {
    $styles .= '#wrap{ color: ' . $text_color . '; }';
  }
  $styles .= '</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_text_css_cache() {
  $data = get_transient( 'shoestrap_text_css' );
  if ( $data === false ) {
    $data = shoestrap_text_css();
    set_transient( 'shoestrap_text_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_text_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_text_css_cache_reset() {
  delete_transient( 'shoestrap_text_css' );
  shoestrap_text_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_text_css_cache_reset' );

/*
 * Apply the webfont to the selected elements.
 */
function shoestrap_typography_css() {
  $webfont        = get_theme_mod( 'shoestrap_google_webfonts' ); 
  $assign_webfont = get_theme_mod( 'shoestrap_webfonts_assign' );
  
  $styles = '<style>';
  if ( $assign_webfont == 'sitename' ) {
    $styles .= '.brand {';
  } elseif ( $assign_webfont == 'headers' ) {
    $styles .= '.brand, h1, h2, h3, h4, h5 {';
  } else {
    $styles .= 'body, input, button, select, textarea, .search-query {';
  }
  $styles .= 'font-family: ' . $webfont . ';}</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_typography_css_cache() {
  $data = get_transient( 'shoestrap_typography_css' );
  if ( $data === false ) {
    $data = shoestrap_typography_css();
    set_transient( 'shoestrap_typography_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_typography_css_cache', 201 );

/*
 * Reset cache when in customizer
 */
function shoestrap_typography_css_cache_reset() {
  delete_transient( 'shoestrap_typography_css' );
  shoestrap_typography_webfont_cache();
}
add_action( 'customize_preview_init', 'shoestrap_typography_css_cache_reset' );

/*
 * Extract the name of the webfont and enqueue its style.
 */
function shoestrap_typography_webfont() {
  $webfont           = get_theme_mod( 'shoestrap_google_webfonts' );
  $webfont_weight      = get_theme_mod( 'shoestrap_webfonts_weight' );
  $webfont_character_set = get_theme_mod( 'shoestrap_webfonts_character_set' );
  
  $f       = strlen( $webfont );
  if ($f > 3){
    $webfontname = str_replace( ' ', '+', $webfont );
    
  return '<link href="http://fonts.googleapis.com/css?family=' . $webfontname . ':' . $webfont_weight . '&subset=' . $webfont_character_set . '" rel="stylesheet" type="text/css">';
  
  }
}

/*
 * Set cache for 24 hours
 */
function shoestrap_typography_webfont_cache() {
  $data = get_transient( 'shoestrap_typography_webfont' );
  if ( $data === false ) {
    $data = shoestrap_typography_webfont();
    set_transient( 'shoestrap_typography_webfont', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_typography_webfont_cache', 201 );

/*
 * Reset cache when in customizer
 */
function shoestrap_typography_webfont_cache_reset() {
  delete_transient( 'shoestrap_typography_webfont' );
  shoestrap_typography_webfont_cache();
}
add_action( 'customize_preview_init', 'shoestrap_typography_webfont_cache_reset' );

