<?php

/*
 * Adds sections to the customizer
 */
function shoestrap_footer_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_footer',            'title' => __( 'Footer', 'shoestrap' ),           'priority' => 10 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_footer_background_color',   'default' => '#ffffff' );
  $settings[] = array( 'slug' => 'shoestrap_footer_text',               'default' => get_bloginfo( 'name' ) );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  /*
   * Color Controls
   */
  $color_controls   = array();
  
  // Footer Background Color
  $color_controls[] = array( 'setting' => 'shoestrap_footer_background_color','label' => 'Footer Background Color',         'section' => 'shoestrap_footer',  'priority' => 1 );
  
  // Text Controls
  $text_controls = array();
  // Footer Text
  $text_controls[]  = array( 'setting' => 'shoestrap_footer_text',        'label' => 'Footer Alternative Text',     'section' => 'shoestrap_footer',      'priority' => 2 );
  
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

  foreach ( $text_controls as $control) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'text',
      'priority'    => $control['priority']
    ));
  }
}
add_action( 'customize_register', 'shoestrap_footer_customizer' );

function shoestrap_footer_icon() { ?>
  <?php if (current_user_can( 'edit_theme_options' )){ ?>
    <style>
    </style>
    <div id="shoestrap_icon">
      <?php
      $current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      $href = add_query_arg( 'url', urlencode( $current_url ), wp_customize_url() ); ?>
      <a href="<?php echo $href; ?>"><i class="icon-cogs"></i></a>
    </div>
  <?php } ?>
  </div>
<?php }
add_action( 'shoestrap_after_footer', 'shoestrap_footer_icon' );
