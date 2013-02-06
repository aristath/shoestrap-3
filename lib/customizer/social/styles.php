<?php

/*
 * Apply any css needed for the social sharing buttons.
 */
function shoestrap_social_share_styles() {
  $background   = get_theme_mod( 'shoestrap_background_color' );
  $googleplus   = get_theme_mod( 'shoestrap_gplus_on_posts' );
  $facebook     = get_theme_mod( 'shoestrap_facebook_on_posts' );
  $twitter      = get_theme_mod( 'shoestrap_twitter_on_posts' );
  $linkedin     = get_theme_mod( 'shoestrap_linkedin_on_posts' );
  $pinterest    = get_theme_mod( 'shoestrap_pinterest_on_posts' );
  
  // The number of networks.
  $networks_nr = $googleplus + $facebook + $twitter + $linkedin + $pinterest;
  
  if ( get_option('shoestrap_advanced_compiler') ) {
  	$btn_color = get_theme_mod( 'strp_cb_btn_primary' );
  }else{
  $btn_color = get_theme_mod( 'shoestrap_buttons_color' );
  }
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
  
  $startColor = $btn_color;
  $endColor   = $btnColorHighlight;

  $styles = '<style type="text/css">';
  $styles .= '.sharrre .box:hover{';
  $styles .= 'padding-right:' . ( $networks_nr * 30 + 40 ) . 'px;}';
  $styles .= '.sharrre .middle a:hover{text-decoration:none;}';
  $styles .= '.sharrre .box:hover .middle{width:' . ( $networks_nr * 30 ) . 'px;}';
  if ( shoestrap_get_brightness( $btn_color ) >= 160 ) {
    $styles .= '.sharrre, .sharrre .middle a{color: #333;}';
    $styles .= '.sharrre .middle{background:' . shoestrap_adjust_brightness( $btn_color, -10 ) . ';}';
    $styles .= '.sharrre .right{background:' . $background . ';';
    $styles .= 'color: ' . shoestrap_adjust_brightness( $btn_color, -60 ) . ';}';
  } else {
    $styles .= '.sharrre, .sharrre .middle a{color: #fff;}';
    $styles .= '.sharrre .middle{background:' . shoestrap_adjust_brightness( $btn_color, 10 ) . ';}';
    $styles .= '.sharrre .right{background:' . $background . ';';
    $styles .= 'color:' . shoestrap_adjust_brightness( $btn_color, 60 ) . ';}';
  }
  $styles .= '.sharrre .box{';
  $styles .= 'background: ' . shoestrap_mix_colors( $startColor, $endColor, 60 ) . ';';
  $styles .= 'background-image: -moz-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
  $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $startColor . '), to(' . $endColor . '));';
  $styles .= 'background-image: -webkit-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
  $styles .= 'background-image: -o-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
  $styles .= 'background-image: linear-gradient(to bottom, ' . $startColor . ', ' . $endColor . ');';
  $styles .= 'background-repeat: repeat-x;';
  $styles .= '*background-color: ' . $endColor . ';}';
  $styles .= '</style>';
  
  return $styles;
}
add_action( 'wp_head', 'shoestrap_social_share_styles' );

/*
 * Set cache for 24 hours
 */
function shoestrap_social_share_styles_cache() {
  $data = get_transient( 'shoestrap_social_share_styles' );
  if ( $data === false ) {
    $data = shoestrap_social_share_styles();
    set_transient( 'shoestrap_social_share_styles', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_social_share_styles_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_social_share_styles_cache_reset() {
  delete_transient( 'shoestrap_social_share_styles' );
  shoestrap_social_share_styles_cache();
}
add_action( 'customize_preview_init', 'shoestrap_social_share_styles_cache_reset' );
