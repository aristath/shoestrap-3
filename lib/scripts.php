<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/bootstrap.css
 * 2. /theme/assets/css/bootstrap-responsive.css
 * 3. /theme/assets/css/app.css
 * 4. /child-theme/style.css (if a child theme is activated)
 *
 * Enqueue scripts in the following order:
 * 1. /theme/assets/js/vendor/modernizr-2.6.2.min.js  (in head.php)
 * 2. jquery-1.9.0.min.js via Google CDN              (in head.php)
 * 3. /theme/assets/js/vendor/bootstrap.min.js
 * 4. /theme/assets/js/main.js
 */

function shoestrap_scripts() {
  $shoestrap_responsive = get_theme_mod( 'shoestrap_responsive' );
  $preset               = get_theme_mod( 'shoestrap_general_presets' );

  wp_enqueue_style('shoestrap_app', get_template_directory_uri() . '/assets/css/app.css', false, null);
  
  if ( $shoestrap_responsive != '0' ) {
    wp_enqueue_style('shoestrap_app_responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, null);
  }

  // Load style.css from child theme
  if (is_child_theme()) {
    wp_enqueue_style('shoestrap_child', get_stylesheet_uri(), false, null);
  }

  // jQuery is loaded in header.php using the same method from HTML5 Boilerplate:
  // Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '', '', '1.9.0', false);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('shoestrap_bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', false, null, false);
  wp_register_script('shoestrap_main', get_template_directory_uri() . '/assets/js/main.js', false, null, false);
  wp_enqueue_script('shoestrap_bootstrap');
  wp_enqueue_script('shoestrap_main');
}

add_action('wp_enqueue_scripts', 'shoestrap_scripts', 100);

function shoestrap_remove_script_version( $src ){
  $parts = explode( '?', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', 'shoestrap_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'shoestrap_remove_script_version', 15, 1 );
