<?php

if ( !defined( 'SHOESTRAP_LAYOUT' ) )
	define( 'SHOESTRAP_LAYOUT', 1 );

if ( !defined( 'SHOESTRAP_CSS_URL' ) )
	define( 'SHOESTRAP_CSS_URL', get_template_directory_uri() . '/assets/css/style-default.css' );

if ( !defined( 'SHOESTRAP_NAV_MODE' ) )
	define( 'SHOESTRAP_NAV_MODE', 'normal' );

if ( !defined( 'SHOESTRAP_CONTAINER_CLASS' ) )
	define( 'SHOESTRAP_CONTAINER_CLASS', 'container' );

if ( !defined( 'SHOESTRAP_NAVBAR_CONTAINER_CLASS' ) )
	define( 'SHOESTRAP_NAVBAR_CONTAINER_CLASS', 'container' );

if ( !defined( 'SHOESTRAP_NAVBAR_CLASS' ) )
	define( 'SHOESTRAP_NAVBAR_CLASS', ' navbar-static-top' );

// require_once locate_template('/lib/dependencies/dependencies.php');           // Utility functions

/**
 * Roots includes
 */
require_once locate_template('/lib/utils.php');           // Utility functions
require_once locate_template('/lib/init.php');            // Initial theme setup and constants
require_once locate_template('/lib/wrapper.php');         // Theme wrapper class
require_once locate_template('/lib/sidebar.php');         // Sidebar class
require_once locate_template('/lib/config.php');          // Configuration
require_once locate_template('/lib/titles.php');          // Page titles
require_once locate_template('/lib/cleanup.php');         // Cleanup
require_once locate_template('/lib/nav.php');             // Custom nav modifications
require_once locate_template('/lib/gallery.php');         // Custom [gallery] modifications
require_once locate_template('/lib/comments.php');        // Custom comments modifications
require_once locate_template('/lib/relative-urls.php');   // Root relative URLs
require_once locate_template('/lib/widgets.php');         // Sidebars and widgets
require_once locate_template('/lib/scripts.php');         // Scripts and stylesheets