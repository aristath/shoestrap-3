<?php

add_theme_support( 'custom-background' );

// Determine if the user is using the advanced builder or not
$advanced_builder = get_option('shoestrap_advanced_compiler');
// Turn off the advanced builder on multisite
if ( is_multisite() && !is_super_admin() ) {
  $advanced_builder == '';
}

require_once locate_template( '/lib/customizer/functions/textarea-control.php' );     // Textarea Control

require_once locate_template( '/lib/customizer/navbar/functions.php' );               // NavBar Customizer
require_once locate_template( '/lib/customizer/hero/functions.php' );                 // Hero Customizer
require_once locate_template( '/lib/customizer/typography/functions.php' );           // Typography Customizer
require_once locate_template( '/lib/customizer/background/functions.php' );           // Background Customizer
require_once locate_template( '/lib/customizer/logo/functions.php' );                 // Logo Customizer
require_once locate_template( '/lib/customizer/header/functions.php' );               // Header Customizer
require_once locate_template( '/lib/customizer/layout/functions.php' );               // Layout Customizer
require_once locate_template( '/lib/customizer/social/functions.php' );               // Social Customizer
require_once locate_template( '/lib/customizer/footer/functions.php' );               // Footer Customizer
require_once locate_template( '/lib/customizer/advanced/functions.php' );             // Advanced Customizer

require_once locate_template( '/lib/customizer/functions/remove-controls.php' );      // Extra Functions for the customizer
require_once locate_template( '/lib/customizer/functions/login.php' );                // Login screen customizations
require_once locate_template( '/lib/customizer/functions/color-functions.php' );      // Color functions

// Apply the selected styles:
require_once locate_template( '/lib/customizer/header/styles.php' );                  // Branding (header) region, containing the logo etc.
require_once locate_template( '/lib/customizer/background/styles.php' );              // Page and wrap background

if ( $advanced_builder != 1 ) {
  require_once locate_template( '/lib/customizer/navbar/styles.php' );                // NavBar styles
  require_once locate_template( '/lib/customizer/typography/styles.php' );            // Typography styles
  require_once locate_template( '/lib/customizer/buttons/styles.php' );               // Buttons styles
}
require_once locate_template( '/lib/customizer/hero/styles.php' );                    // Hero styles
require_once locate_template( '/lib/customizer/social/styles.php' );                  // Social Sharing Styles

if ( $advanced_builder == 1 ) {
  require_once locate_template( '/lib/customizer/custom-builder/custom-builder.php'); // Custom Bootstrap Builder
}
