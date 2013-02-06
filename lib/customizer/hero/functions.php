<?php

/*
 * Adds settings to the customizer
 */
function shoestrap_hero_customizer( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_hero',              'title' => __( 'Hero', 'shoestrap' ),             'priority' => 6 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }
  
  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_hero_title',                'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_hero_content',              'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_hero_cta_text',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_hero_cta_link',             'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_hero_cta_color',            'default' => '#0066bb' );
  $settings[] = array( 'slug' => 'shoestrap_hero_background',           'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_hero_background_color',     'default' => '#333333' );
  $settings[] = array( 'slug' => 'shoestrap_hero_textcolor',            'default' => '#ffffff' );
  $settings[] = array( 'slug' => 'shoestrap_hero_visibility',           'default' => 'front' );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  /*
   * Color Controls
   */
  $color_controls   = array();
  
  // Call to Action Button Color (Hero Region)
  $color_controls[] = array( 'setting' => 'shoestrap_hero_cta_color',         'label' => 'Call To Action Button Color',     'section' => 'shoestrap_hero',    'priority' => 5 );
  // Hero Region Background Color
  $color_controls[] = array( 'setting' => 'shoestrap_hero_background_color',  'label' => 'Hero Region Background Color',    'section' => 'shoestrap_hero',    'priority' => 7 );
  // Hero Region Text Color
  $color_controls[] = array( 'setting' => 'shoestrap_hero_textcolor',         'label' => 'Hero Region Text Color',          'section' => 'shoestrap_hero',    'priority' => 8 );
  
  /*
   * Image Controls
   */
  $image_controls = array();
  // Hero Region Background Image
  $image_controls[] = array( 'setting' => 'shoestrap_hero_background','label' => 'Hero Background Image',   'section' => 'shoestrap_hero',  'priority' => 6 );
  
  /*
   * Dropdown (Select) Controls
   */
  $select_controls = array();
  // Visibility of the hero region (frontpage only or site-wide)
  $select_controls[] = array( 'setting' => 'shoestrap_hero_visibility',         'label' => 'Hero Region Visibility',          'section' => 'shoestrap_hero',        'priority' => 9, 'choises' => array( 'front' => __( 'Frontpage', 'shoestrap' ), 'site' => __( 'Site-Wide', 'shoestrap' ) ) );
  
  // Text Controls
  $text_controls = array();
  // Title of the Hero Region
  $text_controls[]  = array( 'setting' => 'shoestrap_hero_title',         'label' => 'Title',                       'section' => 'shoestrap_hero',        'priority' => 1 );
  // Text (label) of the Call To Action Button on the Hero Region
  $text_controls[]  = array( 'setting' => 'shoestrap_hero_cta_text',      'label' => 'Call To Action Button Text',  'section' => 'shoestrap_hero',        'priority' => 3 );
  // Link of the Call To Action Button on the Hero Region
  $text_controls[]  = array( 'setting' => 'shoestrap_hero_cta_link',      'label' => 'Call To Action Button Link',  'section' => 'shoestrap_hero',        'priority' => 4 );
  
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

  foreach ( $image_controls as $control ) {
    $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => __( $control['label'], 'shoestrap' ),
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority']
      )
    ));
  }
  
  foreach ( $select_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'select',
      'priority'    => $control['priority'],
      'choices'     => $control['choises']
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

  // Content of the Hero Region
  $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'shoestrap_hero_content', array(
    'label'       => 'Content',
    'section'     => 'shoestrap_hero',
    'settings'    => 'shoestrap_hero_content',
    'priority'    => 2,
  )));
}
add_action( 'customize_register', 'shoestrap_hero_customizer' );

function shoestrap_hero_content() {
  $herotitle        = get_theme_mod( 'shoestrap_hero_title' );
  $herocontent      = get_theme_mod( 'shoestrap_hero_content' );
  $cta_text         = get_theme_mod( 'shoestrap_hero_cta_text' );
  $cta_link         = get_theme_mod( 'shoestrap_hero_cta_link' );
  $hero_visibility  = get_theme_mod( 'shoestrap_hero_visibility' );

  $hero = false;
  if ( $hero_visibility == 'front' ) {
    if ( is_front_page() ) {
      if ( !empty( $herotitle ) )                   { $hero = true; }
      if ( !empty( $herocontent ) )                 { $hero = true; }
      if ( !empty( $cta_text ) )                    { $hero = true; }
      if ( has_action( 'shoestrap_hero_inside' ) )  { $hero = true; }
    }
  } else {
      if ( !empty( $herotitle ) )                   { $hero = true; }
      if ( !empty( $herocontent ) )                 { $hero = true; }
      if ( !empty( $cta_text ) )                    { $hero = true; }
      if ( has_action( 'shoestrap_hero_inside' ) )  { $hero = true; }
  }

  if ($hero == true) { ?>
    <div class="jumbotron masthead">
      <div class="container">
        <?php do_action('shoestrap_hero_inside'); ?>

        <h1 class="hero-title"><?php echo $herotitle; ?></h1>
        <p class="hero-content"><?php echo $herocontent; ?></p>
        <?php if ( !empty( $cta_text ) ) { ?>
          <p class="hero-button">
            <a class="btn" href="<?php echo $cta_link; ?>">
              <?php echo $cta_text; ?>
            </a>
          </p>
        <?php } ?>

      </div>
    </div>
  <?php }
}
add_action( 'shoestrap_hero', 'shoestrap_hero_content' );