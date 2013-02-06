<?php

/*
 * ADVANCED
 * 
 * The advanced section allow users to enter their own css and/or scripts
 * and place them either in the head or the footer of the page.
 * These are textarea controls that we created in the beginning of this file.
 * 
 * CAUTION:
 * Using this can be potentially dangerous for your site.
 * Any content you enter here will be echoed with minimal checks 
 * so you should be careful of your code.
 * 
 * To add css rules you must write <style>....your styles here...</style>
 * To add a script you should write <script>....your styles here...</script>
 * 
 */

function shoestrap_advanced_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_advanced',          'title' => __( 'Advanced', 'shoestrap' ),         'priority' => 9 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_advanced_head',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_advanced_footer',           'default' => '' );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Header scripts (css/js)
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_advanced_head', array(
    'label'       => 'Header Scripts (CSS/JS)',
    'section'     => 'shoestrap_advanced',
    'settings'    => 'shoestrap_advanced_head',
    'priority'    => 1,
  )));

  // Footer scripts (css/js)
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_advanced_footer', array(
    'label'       => 'Footer Scripts (CSS/JS)',
    'section'     => 'shoestrap_advanced',
    'settings'    => 'shoestrap_advanced_footer',
    'priority'    => 2,
  )));
}
add_action( 'customize_register', 'shoestrap_advanced_customizer' );

/*
 * If the user has entered any scripts in the 'head' control
 * of the advanced section of the customizer, then his content will be 
 * echoed in the <head> of our page.
 * 
 * CAUTION:
 * Anything users enter in the advanced section will not be filtered.
 */
function shoestrap_custom_header_scripts() {
  $header_scripts = get_theme_mod( 'shoestrap_advanced_head' );
  echo $header_scripts;
}
add_action( 'wp_head', 'shoestrap_custom_header_scripts', 200 );

/*
 * If the user has entered any scripts in the 'head' control
 * of the advanced section of the customizer, then his content will be 
 * echoed in the footer of our page.
 * 
 * CAUTION:
 * Anything users enter in the advanced section will not be filtered.
 */
function shoestrap_custom_footer_scripts() {
  $footer_scripts = get_theme_mod( 'shoestrap_advanced_footer' );
  echo $footer_scripts;
}
add_action( 'shoestrap_after_footer', 'shoestrap_custom_footer_scripts', 200 );
