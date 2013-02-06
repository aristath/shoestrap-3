<?php

/*
 * Applies css to the buttons.
 */
function shoestrap_buttons_css() {
  $btn_color = get_theme_mod( 'shoestrap_buttons_color' );

  // Make sure colors are properly formatted
  $btn_color = '#' . str_replace( '#', '', $btn_color );
  
  // if no color has been selected, set to #0066cc. This prevents errors with the php-less compiler.
  if ( strlen( $btn_color ) < 3 ) {
    $btn_color = '#0066cc';
  }
  if ( get_theme_mod( 'shoestrap_flat_buttons' ) == 1 ) {
    $btnColorHighlight = $btn_color;
  } else {
    $btnColorHighlight = shoestrap_adjust_brightness( $btn_color, -63 );
  }
  
  if ( shoestrap_get_brightness( $btn_color ) <= 160) {
    $textColor = '#ffffff';
  } else {
    $textColor = '#333333';
  }
  
  $startColor = $btn_color;
  $endColor   = $btnColorHighlight;
  
  $styles = '<style>';
  $styles .= '.btn, .btn-primary, a.btn, a.btn-primary{';
  $styles .= 'color: ' . $textColor . ';';
  $styles .= 'background-color: ' . shoestrap_mix_colors( $startColor, $endColor, 60 ) . ';';
  $styles .= 'background-image: -moz-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
  $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $startColor . '), to(' . $endColor . '));';
  $styles .= 'background-image: -webkit-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
  $styles .= 'background-image: -o-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
  $styles .= 'background-image: linear-gradient(to bottom, ' . $startColor . ', ' . $endColor . ');';
  $styles .= 'background-repeat: repeat-x;';
  $styles .= '*background-color: ' . $endColor . ';}';
  $styles .= '.btn:hover, .btn-primary:hover, .btn-primary:active, .btn::active, .btn-primary.active .btn.active, .btn-primary.disabled, .btn.disabled, .btn-primary[disabled] .btn[disabled] {';
  $styles .= 'color: ' . $textColor . ';';
  $styles .= 'background-color: ' . $endColor . ';';
  $styles .= '*background-color: ' . shoestrap_adjust_brightness( $endColor, -12 ) . ';}';
  $styles .= 'a.btn-success, a.btn-info, a.btn-warning, a.btn-error, a.btn-inverse{color: #fff;}';
  $styles .= '</style>';

    
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_buttons_css_cache() {
  $data = get_transient( 'shoestrap_buttons_css' );
  if ( $data === false ) {
    $data = shoestrap_buttons_css();
    set_transient( 'shoestrap_buttons_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_buttons_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_buttons_css_cache_reset() {
  delete_transient( 'shoestrap_buttons_css' );
  shoestrap_buttons_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_buttons_css_cache_reset' );

