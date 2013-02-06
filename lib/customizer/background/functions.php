<?php

/*
 * Adds settings to the customizer
 */
function shoestrap_background_customizer( $wp_customize ){
  
  // Adds compatibility with wordpress's default background color control.
  $background_color = get_theme_mod( 'background_color' );
  $background_color = '#' . str_replace( '#', '', $background_color );
  set_theme_mod( 'background_color', get_theme_mod( 'shoestrap_background_color' ) );
  
  $settings   = array();
  // Color Settings
  $settings[] = array( 'slug' => 'shoestrap_background_color',          'default' => $background_color );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Remove the default "background" control
  $wp_customize->remove_control( 'background_color' );
  
  // Determine if the user is using the advanced builder or not
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  // Turn off the advanced builder on multisite
  if ( is_multisite() && !is_super_admin() ) {
    $advanced_builder == '';
  }
  
  /*
   * Color Controls
   */
  $color_controls   = array();
  
  // Background Color
  $color_controls[] = array( 'setting' => 'shoestrap_background_color',       'label' => 'Background Color',                'section' => 'colors',            'priority' => 1 );
  
  foreach( $color_controls as $control ){
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => __( $control['label'], 'shoestrap' ),
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority'],
      )
    ));
  }
}
add_action( 'customize_register', 'shoestrap_background_customizer' );
