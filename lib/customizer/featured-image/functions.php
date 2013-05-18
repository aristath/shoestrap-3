<?php

/*
 * Creates the section, settings and controls for the customizer
 */
function shoestrap_feat_image_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_feat_image', 'title' => __( 'Featured Image', 'shoestrap' ), 'priority' => 11 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $feat_img_enabling_help           = __( 'Enable the display of featured images on post archives (such as categories, tags and posts lists in general), as well as on the top of single posts - you have the option to set the image on top (default), left or right of the archives and posts. only make ONE selection for the archives and for the single post!', 'shoestrap' );
  $feat_img_archive_dimentions_help = __( 'Select image placement and define the dimentions (width & height) of the image to be displayed on post archives. Please note that images will be resized and cropped to the specified size, so larger images will work best.', 'shoestrap' );
  $feat_img_post_dimentions_help    = __( 'Select image placement and define the dimentions (width & height) of the image to be displayed on single posts. Please note that images will be resized and cropped to the specified size, so larger images will work best.', 'shoestrap' );

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive',                'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_left',           'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_right',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post',                   'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_left',              'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_right',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_width',          'default' => 1200 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_height',         'default' => 350 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_left_width',     'default' => 200 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_left_height',    'default' => 100 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_right_width',    'default' => 200 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_right_height',   'default' => 100 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_width',             'default' => 1200 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_height',            'default' => 350 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_left_width',        'default' => 200 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_left_height',       'default' => 100 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_right_width',       'default' => 200 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_right_height',      'default' => 100 );

  $settings[] = array( 'slug' => 'shoestrap_feat_img_enabling_help',          'default' => $feat_img_enabling_help );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_dimentions_help','default' => $feat_img_archive_dimentions_help );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_dimantions_help',   'default' => $feat_img_post_dimentions_help );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Text Controls
  $text_controls    = array();
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_width',         'label' => 'Image width (archives top)',         'section' => 'shoestrap_feat_image',  'priority' => 4 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_height',        'label' => 'Image height (archives top)',        'section' => 'shoestrap_feat_image',  'priority' => 5 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_left_width',    'label' => 'Image width (archives left)',        'section' => 'shoestrap_feat_image',  'priority' => 7 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_left_height',   'label' => 'Image height (archives left)',       'section' => 'shoestrap_feat_image',  'priority' => 8 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_right_width',   'label' => 'Image width (archives right)',       'section' => 'shoestrap_feat_image',  'priority' => 10 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_right_height',  'label' => 'Image height (archives right)',      'section' => 'shoestrap_feat_image',  'priority' => 11 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_width',            'label' => 'Image width (single posts top)',     'section' => 'shoestrap_feat_image',  'priority' => 14 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_height',           'label' => 'Image height (single posts top)',    'section' => 'shoestrap_feat_image',  'priority' => 15 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_left_width',       'label' => 'Image width (single posts left)',    'section' => 'shoestrap_feat_image',  'priority' => 17 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_left_height',      'label' => 'Image height (single posts left)',   'section' => 'shoestrap_feat_image',  'priority' => 18 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_right_width',      'label' => 'Image width (single posts right)',   'section' => 'shoestrap_feat_image',  'priority' => 20 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_right_height',     'label' => 'Image height (single posts right)',  'section' => 'shoestrap_feat_image',  'priority' => 21 );
  
   // Checkbox Controls
  $checkbox_controls = array();
  $checkbox_controls[] = array( 'setting' => 'shoestrap_feat_img_archive',        'label' => 'Show featured images on archives top?',           'section' => 'shoestrap_feat_image',  'priority' => 3 );
  $checkbox_controls[] = array( 'setting' => 'shoestrap_feat_img_archive_left',   'label' => 'Show featured images on archives left?',       'section' => 'shoestrap_feat_image',  'priority' => 6 );
  $checkbox_controls[] = array( 'setting' => 'shoestrap_feat_img_archive_right',  'label' => 'Show featured images on archives right?',      'section' => 'shoestrap_feat_image',  'priority' => 9 );
  $checkbox_controls[] = array( 'setting' => 'shoestrap_feat_img_post',           'label' => 'Show featured images on single posts top?',       'section' => 'shoestrap_feat_image',  'priority' => 13 );
  $checkbox_controls[] = array( 'setting' => 'shoestrap_feat_img_post_left',      'label' => 'Show featured images on single posts left?',   'section' => 'shoestrap_feat_image',  'priority' => 16 );
  $checkbox_controls[] = array( 'setting' => 'shoestrap_feat_img_post_right',     'label' => 'Show featured images on single posts right?',  'section' => 'shoestrap_feat_image',  'priority' => 19 );

  $help_controls    = array();
  $help_controls[]  = array( 'setting' => 'shoestrap_feat_img_enabling_help',           'label' => $feat_img_enabling_help,            'section' => 'shoestrap_feat_image', 'priority' => 1 );
  $help_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_dimentions_help', 'label' => $feat_img_archive_dimentions_help,  'section' => 'shoestrap_feat_image', 'priority' => 2 );
  $help_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_dimantions_help',    'label' => $feat_img_post_dimentions_help,     'section' => 'shoestrap_feat_image', 'priority' => 12 );

  foreach ( $checkbox_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'checkbox',
      'priority'    => $control['priority'],
    ));
  }
  
 foreach ( $text_controls as $control) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'text',
      'priority'    => $control['priority']
    ));
  }

  foreach ( $help_controls as $control ) {
    $wp_customize->add_control( new Shoestrap_Customize_Label_Control( $wp_customize, $control['setting'], array(
      'label'       => $control['label'],
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'priority'    => $control['priority'],
    )));
  }

}
add_action( 'customize_register', 'shoestrap_feat_image_customizer' );

/*
 * Adds the featured image on post archives
 */
function shoestrap_add_featured_image_on_archives() {
  // Get the customizer options
  $archive_feat_img_toggle  = get_theme_mod( 'shoestrap_feat_img_archive', 1 );
  $archive_feat_img_width   = get_theme_mod( 'shoestrap_feat_img_archive_width', 550 );
  $archive_feat_img_height  = get_theme_mod( 'shoestrap_feat_img_archive_height', 330 );

  $url    = wp_get_attachment_url( get_post_thumbnail_id() );
  $width  = $archive_feat_img_width;
  $height = $archive_feat_img_height;
  $crop   = true;
  $retina = false;

  if ( $archive_feat_img_toggle == 1 ) {
    if ( '' != get_the_post_thumbnail() ) {
      // Call the resizing function (returns an array)
      $image = shoestrap_image_resize( $url, $width, $height, $crop, $retina );

      echo '<div class="featured-image><a href="' . get_permalink() . '"><img src="' . $image['url'] . '" /></a></div>';
    }
  }
}
add_action( 'shoestrap_entry_summary_begin', 'shoestrap_add_featured_image_on_archives', 40 );

/*
 * Adds the featured image on the left of post archives
 */
function shoestrap_add_featured_image_on_archives_left() {
  // Get the customizer options
  $archive_feat_img_toggle  = get_theme_mod( 'shoestrap_feat_img_archive_left', 1 );
  $archive_feat_img_width   = get_theme_mod( 'shoestrap_feat_img_archive_left_width', 200 );
  $archive_feat_img_height  = get_theme_mod( 'shoestrap_feat_img_archive_left_height', 100 );

  $url    = wp_get_attachment_url( get_post_thumbnail_id() );
  $width  = $archive_feat_img_width;
  $height = $archive_feat_img_height;
  $crop   = true;
  $retina = false;

  if ( $archive_feat_img_toggle == 1 ) {
    if ( '' != get_the_post_thumbnail() ) {
      // Call the resizing function (returns an array)
      $image = shoestrap_image_resize( $url, $width, $height, $crop, $retina );

      echo '<div class="featured-image pull-left" style="padding: 5px 10px 10px 0;"><a href="' . get_permalink() . '"><img src="' . $image['url'] . '" /></a></div>';
    }
  }
}
add_action( 'shoestrap_entry_summary_begin', 'shoestrap_add_featured_image_on_archives_left', 40 );

/*
 * Adds the featured image on the left of post archives
 */
function shoestrap_add_featured_image_on_archives_right() {
  // Get the customizer options
  $archive_feat_img_toggle  = get_theme_mod( 'shoestrap_feat_img_archive_right', 1 );
  $archive_feat_img_width   = get_theme_mod( 'shoestrap_feat_img_archive_right_width', 200 );
  $archive_feat_img_height  = get_theme_mod( 'shoestrap_feat_img_archive_right_height', 100 );

  $url    = wp_get_attachment_url( get_post_thumbnail_id() );
  $width  = $archive_feat_img_width;
  $height = $archive_feat_img_height;
  $crop   = true;
  $retina = false;

  if ( $archive_feat_img_toggle == 1 ) {
    if ( '' != get_the_post_thumbnail() ) {
      // Call the resizing function (returns an array)
      $image = shoestrap_image_resize( $url, $width, $height, $crop, $retina );

      echo '<div class="featured-image pull-right" style="padding: 5px 0 10px 10px;"><a href="' . get_permalink() . '"><img src="' . $image['url'] . '" /></a></div>';
    }
  }
}
add_action( 'shoestrap_entry_summary_begin', 'shoestrap_add_featured_image_on_archives_right', 40 );

/*
 * Adds the featured image on top of single posts
 */
function shoestrap_add_featured_image_on_posts() {
  // Get the customizer options
  $post_feat_img_toggle = get_theme_mod( 'shoestrap_feat_img_post', 1 );
  $post_feat_img_width  = get_theme_mod( 'shoestrap_feat_img_post_width', 550 );
  $post_feat_img_height = get_theme_mod( 'shoestrap_feat_img_post_height', 330 );

  $url    = wp_get_attachment_url( get_post_thumbnail_id() );
  $width  = $post_feat_img_width;
  $height = $post_feat_img_height;
  $crop   = true;
  $retina = false;

  if ( $post_feat_img_toggle == 1 ) {
    if ( '' != get_the_post_thumbnail() ) {
      // Call the resizing function (returns an array)
      $image = shoestrap_image_resize( $url, $width, $height, $crop, $retina );

      echo '<div class="featured-image><a href="' . get_permalink() . '"><img src="' . $image['url'] . '" /></a></div>';
    }
  }
}
add_action( 'shoestrap_before_the_content', 'shoestrap_add_featured_image_on_posts', 40 );

/*
 * Adds the featured image on the left single posts
 */
function shoestrap_add_featured_image_on_posts_left() {
  // Get the customizer options
  $post_feat_img_toggle = get_theme_mod( 'shoestrap_feat_img_post_left', 1 );
  $post_feat_img_width  = get_theme_mod( 'shoestrap_feat_img_post_left_width', 200 );
  $post_feat_img_height = get_theme_mod( 'shoestrap_feat_img_post_left_height', 100 );

  $url    = wp_get_attachment_url( get_post_thumbnail_id() );
  $width  = $post_feat_img_width;
  $height = $post_feat_img_height;
  $crop   = true;
  $retina = false;

  if ( $post_feat_img_toggle == 1 ) {
    if ( '' != get_the_post_thumbnail() ) {
      // Call the resizing function (returns an array)
      $image = shoestrap_image_resize( $url, $width, $height, $crop, $retina );

      echo '<div class="featured-image pull-left" style="padding: 5px 10px 10px 0;"><a href="' . get_permalink() . '"><img src="' . $image['url'] . '" /></a></div>';
    }
  }
}
add_action( 'shoestrap_before_the_content', 'shoestrap_add_featured_image_on_posts_left', 40 );

/*
 * Adds the featured image on the right single posts
 */
function shoestrap_add_featured_image_on_posts_right() {
  // Get the customizer options
  $post_feat_img_toggle = get_theme_mod( 'shoestrap_feat_img_post_right', 1 );
  $post_feat_img_width  = get_theme_mod( 'shoestrap_feat_img_post_right_width', 200 );
  $post_feat_img_height = get_theme_mod( 'shoestrap_feat_img_post_right_height', 100 );

  $url    = wp_get_attachment_url( get_post_thumbnail_id() );
  $width  = $post_feat_img_width;
  $height = $post_feat_img_height;
  $crop   = true;
  $retina = false;

  if ( $post_feat_img_toggle == 1 ) {
    if ( '' != get_the_post_thumbnail() ) {
      // Call the resizing function (returns an array)
      $image = shoestrap_image_resize( $url, $width, $height, $crop, $retina );

      echo '<div class="featured-image pull-right" style="padding: 5px 0 10px 10px;"><a href="' . get_permalink() . '"><img src="' . $image['url'] . '" /></a></div>';
    }
  }
}
add_action( 'shoestrap_before_the_content', 'shoestrap_add_featured_image_on_posts_right', 40 );