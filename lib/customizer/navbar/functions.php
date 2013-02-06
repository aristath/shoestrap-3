<?php

/*
 * Adds settings to the customizer
 */
function shoestrap_navbar_customizer( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_primary_navbar',    'title' => __( 'Primary Navbar', 'shoestrap' ),   'priority' => 3 );
  $sections[] = array( 'slug' => 'shoestrap_secondary_navbar',  'title' => __( 'Secondary Navbar', 'shoestrap' ), 'priority' => 4 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }
  
  /*
   * Customizer Settings
   */
  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_navbar_top',                'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_branding',           'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_logo',               'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_color',              'default' => '#ffffff' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_textcolor',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_social',             'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_p_navbar_searchbox',        'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_nav_pull',                  'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_social',             'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_logo_padding',       'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_original_logo',      'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_no_gradient',        'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_navbar_fixed',              'default' => '' );
  
  // Secondary NavBar Settings
  $settings[] = array( 'slug' => 'shoestrap_navbar_secondary',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_navbar2_loginlink',         'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_navbar2_social',            'default' => '' );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

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
  
  // Display the following controls only when user is NOT using the advanced controls
  if ( $advanced_builder != 1 ) {
    // Navbar background color
    $color_controls[] = array( 'setting' => 'shoestrap_navbar_color',           'label' => 'Navbar Color',                    'section' => 'shoestrap_primary_navbar',  'priority' => 5 );
  }
  // Navbar text color
  $color_controls[] = array( 'setting' => 'shoestrap_navbar_textcolor',       'label' => 'Navbar Text Color',               'section' => 'shoestrap_primary_navbar',            'priority' => 40 );
  
  /*
   * Checkbox Controls
   */
  $checkbox_controls = array();
  // Display Navbar on top
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_top',          'label' => 'Display NavBar on the top of the page', 'section' => 'shoestrap_primary_navbar',  'priority' => 1 );
  // Display Navbar Branding
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_branding',     'label' => 'Display Branding (Sitename or Logo)',   'section' => 'shoestrap_primary_navbar',  'priority' => 2 );
  // Display NavBar Logo
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_logo',         'label' => 'Use Logo (if available) for branding',  'section' => 'shoestrap_primary_navbar',  'priority' => 3 );
  // Display NavBar Social links
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_social',       'label' => 'Display Social Links in the Navbar',    'section' => 'shoestrap_primary_navbar',  'priority' => 6 );
  // Display Primary NavBar Searchbox
  $checkbox_controls[] = array( 'setting' => 'shoestrap_p_navbar_searchbox',  'label' => 'Display Search',                        'section' => 'shoestrap_primary_navbar',  'priority' => 7 );
  // NavBar Menu on the left/right selection
  $checkbox_controls[] = array( 'setting' => 'shoestrap_nav_pull',            'label' => 'Menu on the Right',                     'section' => 'shoestrap_primary_navbar',  'priority' => 15 );
  // NavBar Logo original size
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_original_logo','label' => 'Original Logo Size',                    'section' => 'shoestrap_primary_navbar',  'priority' => 20 );
  // No gradients on the NavBar
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_no_gradient',  'label' => 'Disable gradients',                     'section' => 'shoestrap_primary_navbar',  'priority' => 30 );
  // No gradients on the NavBar
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_fixed',        'label' => 'Fixed Positioning',                     'section' => 'shoestrap_primary_navbar',  'priority' => 32 );

  // Display Secondary Navbar
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar_secondary',    'label' => 'Display Secondary NavBar',              'section' => 'shoestrap_secondary_navbar','priority' => 1 );
  // Show/Hide the login link on the secondary navbar
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar2_loginlink',   'label' => 'Show Login/Logout Link',                'section' => 'shoestrap_secondary_navbar','priority' => 5 );
  // Display NavBar Social links on the secondary navbar
  $checkbox_controls[] = array( 'setting' => 'shoestrap_navbar2_social',      'label' => 'Display Social Links in the Navbar',    'section' => 'shoestrap_secondary_navbar','priority' => 6 );

  // Text Controls
  $text_controls = array();
  // Kigi padding
  $text_controls[]  = array( 'setting' => 'shoestrap_navbar_logo_padding',    'label' => 'Navbar Padding (px)',                   'section' => 'shoestrap_primary_navbar',  'priority' => 40 );
  

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
}
add_action( 'customize_register', 'shoestrap_navbar_customizer' );

function shoestrap_nav_class_pull() {
  if ( get_theme_mod( 'shoestrap_nav_pull' ) == '1' ) {
    $ul = 'nav pull-right';
  } else {
    $ul = 'nav';
  }
  return $ul;
}

function shoestrap_primary_navbar_searchbox() {
 
  $show_searchbox = get_theme_mod( 'shoestrap_p_navbar_searchbox' );
  if ( $show_searchbox == '1' ) { ?>
    <ul class="pull-right nav nav-collapse"><li>
    <?php do_action('shoestrap_pre_searchform'); ?>
    <form role="search" method="get" id="searchform" class="form-search navbar-search" action="<?php echo home_url('/'); ?>">
      <label class="hide" for="s"><?php _e('Search for:', 'shoestrap'); ?></label>
      <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query" placeholder="<?php _e('Search', 'shoestrap'); ?> <?php bloginfo('name'); ?>">
    </form>
    <?php do_action('shoestrap_after_searchform'); ?>
    </li></ul>
    <?php
  }
}
add_action( 'shoestrap_nav_top_right', 'shoestrap_primary_navbar_searchbox', 11 );

function shoestrap_primary_navbar_login_link() {
    
  $primary_login_link   = get_theme_mod( 'shoestrap_header_loginlink' );
  
  if ( is_user_logged_in() ) {
    $link  = wp_logout_url( get_permalink() );
    $label = __( 'Logout', 'shoestrap' );
  }
  else {
    $link  = wp_login_url( get_permalink() );
    $label = __( 'Login/Register', 'shoestrap' );
  }
  $content = '<ul class="pull-right nav nav-collapse">';
  $content .= '<li class="dropdown">';
  $content .= '<a href="#" class="pull-right dropdown-toggle" data-toggle="dropdown">';
  $content .= '<i class="icon-user"></i><b class="caret"></b>';
  $content .= '<ul class="dropdown-menu">';
  $content .= '<li>';
  $content .= '<a href="' . $link . '">' . $label . '</a>';
  $content .= '</li>';
  $content .= do_action( 'shoestrap_login_link_additions' );
  $content .= '</ul>';
  $content .= '</li></ul>';
  
  if ( $primary_login_link == 1 ) {
    echo $content;
  }
}
add_action( 'shoestrap_nav_top_right', 'shoestrap_primary_navbar_login_link', 11 );

function shoestrap_secondary_navbar_login_link() {
    
  $secondary_login_link = get_theme_mod( 'shoestrap_navbar2_loginlink' );
  
  if ( is_user_logged_in() ) {
    $link  = wp_logout_url( get_permalink() );
    $label = __( 'Logout', 'shoestrap' );
  }
  else {
    $link  = wp_login_url( get_permalink() );
    $label = __( 'Login/Register', 'shoestrap' );
  }
  $content = '<ul class="pull-right nav nav-collapse"><li><a class="pull-right login-link" href="' . $link . '">';
  $content .= '<i class="icon-user"></i> ' . $label;
  $content .= '</a></li></ul>';
  
  if ( $secondary_login_link != 0 ) {
    echo $content;
  }
}
add_action( 'shoestrap_secondary_nav_top_right', 'shoestrap_secondary_navbar_login_link', 11 );
