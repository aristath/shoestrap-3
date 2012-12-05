<?php

/*
 * Calculates the classes of the main area, main sidebar and secondary sidebar
 */
function shoestrap_sidebar_class_calc_pre_cache( $target ) {
  $first  = get_theme_mod( 'shoestrap_aside_width' );
  $second = get_theme_mod( 'shoestrap_secondary_width' );
  $layout = get_theme_mod( 'shoestrap_layout' );
  
  // If secondary sidebar is empty, ignore it.
  if ( !is_active_sidebar( 'sidebar-secondary' ) ) {
    if ( $first == '2' ) {
      $main    = 'span10';
      $primary = 'span2';
    } elseif ( $first == '3' ) {
      $main    = 'span9';
      $primary = 'span3';
    } elseif ( $first == '5' ) {
      $main    = 'span7';
      $primary = 'span5';
    } elseif ( $first == '6' ) {
      $main    = 'span6';
      $primary = 'span6';
    } else { // default value
      $main    = 'span8';
      $primary = 'span4';
    }
  // If secondary sidebar is not empty, do not ignore it.
  } else {
    if ( $second == '2' ) {
      if ( $first == '2' ) {
        $main      = 'span8';
        $primary   = 'span2';
        $secondary = 'span2';
      } elseif ( $first == '3' ) {
        $main      = 'span7';
        $primary   = 'span3';
        $secondary = 'span2';
      } elseif ( $first == '5' ) {
        $main      = 'span5';
        $primary   = 'span5';
        $secondary = 'span2';
      } elseif ( $first == '6' ) {
        $main      = 'span4';
        $primary   = 'span6';
        $secondary = 'span2';
      } else {
        $main      = 'span6';
        $primary   = 'span4';
        $secondary = 'span2';
      }
    } elseif ( $second == '3' ) {
      if ( $first == '2' ) {
        $main      = 'span7';
        $primary   = 'span2';
        $secondary = 'span3';
      } elseif ( $first == '3' ) {
        $main      = 'span6';
        $primary   = 'span3';
        $secondary = 'span3';
      } elseif ( $first == '5' ) {
        $main      = 'span4';
        $primary   = 'span5';
        $secondary = 'span3';
      } elseif ( $first == '6' ) {
        $main      = 'span3';
        $primary   = 'span6';
        $secondary = 'span3';
      } else {
        $main      = 'span5';
        $primary   = 'span4';
        $secondary = 'span3';
      }
    } elseif ( $second == '4' ) {
      if ( $first == '2' ) {
        $main      = 'span6';
        $primary   = 'span2';
        $secondary = 'span4';
      } elseif ( $first == '3' ) {
        $main      = 'span5';
        $primary   = 'span3';
        $secondary = 'span4';
      } elseif ( $first == '5' ) {
        $main      = 'span3';
        $primary   = 'span5';
        $secondary = 'span4';
      } elseif ( $first == '6' ) {
        $main      = 'span2';
        $primary   = 'span6';
        $secondary = 'span4';
      } else {
        $main      = 'span4';
        $primary   = 'span4';
        $secondary = 'span4';
      }
    }
  }
  
  // If the layout is "Main only", the main area should have a class of span12
  if ( $layout == 'm' ) {
    $main = 'span12';
  }
  
  // If the layout contains only the main area and primary sidebar, ignore the secondary sidebar width
  if ( in_array( $layout, array( 'mp', 'pm' ) ) ) {
    $main = 'span' . ( 12 - $first );
  }
  
  // If the layout contains only the main area and secondary sidebar, ignore the primary sidebar width
  if ( in_array( $layout, array( 'ms', 'sm' ) ) ) {
    $main = 'span' . ( 12 - $second );
  }
  
  if ( $target == 'primary' ) {
    // return the primary class
    $class = $primary;
  } elseif ( $target == 'secondary' ) {
    // return the secondary class
    $class = $secondary;
  } else {
    // return the main class
    $class = $main;
  }
  
  return $class;
}

function shoestrap_sidebar_class_calc( $target, $offset = '', $echo = false ) {
  $main      = get_transient( 'shoestrap_sidebar_class_main' );
  $primary   = get_transient( 'shoestrap_sidebar_class_primary' );
  $secondary = get_transient( 'shoestrap_sidebar_class_secondary' );

  if ( $main === false ) {
    $main = shoestrap_sidebar_class_calc_pre_cache( 'main' );
    set_transient( 'shoestrap_sidebar_class_main', $main, 3600 * 24 );
  }

  if ( $primary === false ) {
    $primary = shoestrap_sidebar_class_calc_pre_cache( 'primary' );
    set_transient( 'shoestrap_sidebar_class_primary', $main, 3600 * 24 );
  }

  if ( $secondary === false ) {
    $secondary = shoestrap_sidebar_class_calc_pre_cache( 'secondary' );
    set_transient( 'shoestrap_sidebar_class_secondary', $main, 3600 * 24 );
  }

  if ( $target == 'primary' ) {
    // return the primary class
    $class = $primary;
  } elseif ( $target == 'secondary' ) {
    // return the secondary class
    $class = $secondary;
  } else {
    // return the main class
    $class = $main;
  }
  
  // Echo or return the result.
  if ( $echo ) {
    echo $class;
  } else {
    return $class;
  }
}


/*
 * If any css should be applied to fix the layout, enter it here.
 */
function shoestrap_sidebars_positioning_css() {
  
  $shoestrap_layout = get_theme_mod( 'shoestrap_layout' );
  
  if ( $shoestrap_layout == 'pm' ) {
    $css = '#main{float: right;}';
  } elseif ( $shoestrap_layout == 'sm' ) {
    $css = '#main{float: right;}';
  } elseif ( $shoestrap_layout == 'mps' ) {
    $css = '#secondary{float: right;}';
  } elseif ( $shoestrap_layout == 'msp' ) {
    $css = '#sidebar{float: right;}';
  } elseif ( $shoestrap_layout == 'pms' ) {
    $css = '#main, #secondary{float: right;} .m_p_wrap{float: left;}';
  } elseif ( $shoestrap_layout == 'psm' ) {
    $css = '#main{float: right;}';
  } elseif ( $shoestrap_layout == 'smp' ) {
    $css = '.m_p_wrap{float: right;}';
  } elseif ( $shoestrap_layout == 'spm' ) {
    $css = '.m_p_wrap, #main{float: right;}';
  } else {
    $css = '';
  } ?>
  <style> <?php echo $css; ?> </style>
  <?php
}
add_action( 'wp_head', 'shoestrap_sidebars_positioning_css' );

/*
 * Set cache for 24 hours
 */
function shoestrap_sidebars_positioning_css_cache() {
  $data = get_transient( 'shoestrap_sidebars_positioning_css' );
  if ( $data === false ) {
    $data = shoestrap_sidebars_positioning_css();
    set_transient( 'shoestrap_sidebars_positioning_css', $data, 3600 * 24 );
  }
  echo $data;
}

/*
 * Reset cache when in customizer
 */
function shoestrap_sidebars_positioning_css_cache_reset() {
  delete_transient( 'shoestrap_sidebars_positioning_css' );
  shoestrap_sidebars_positioning_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_sidebars_positioning_css_cache_reset' );
