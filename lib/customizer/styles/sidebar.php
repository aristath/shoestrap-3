<?php

/*
 * Calculates the classes of the main area, main sidebar and secondary sidebar
 */
function shoestrap_sidebar_class_calc( $target, $offset = '', $echo = false ) {
  $first  = get_theme_mod( 'shoestrap_aside_width' );
  $second = get_theme_mod( 'shoestrap_secondary_width' );
  $layout = get_theme_mod( 'shoestrap_layout' );
  
  // If secondary sidebar is empty, ignore it.
  if ( !is_active_sidebar( 'sidebar-secondary' ) ) {
    $main      = 'span' . ( 12 - $first );
    $primary   = 'span' . $first;
  // If secondary sidebar is not empty, do not ignore it.
  } else {
    $main      = 'span' . ( 12 - $first - $second );
    $primary   = 'span' . $first;
    $secondary = 'span' . $second;
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
  
  // Overrides main region class when selected template is page-full.php
  if ( is_page_template('page-full.php') ) {
    $main = 'span12';
  }

  // Overrides main and primary region classes when selected template is page-primary-sidebar.php
  if ( is_page_template('page-primary-sidebar.php') ) {
    $main      = 'span' . ( 12 - $first );
    $primary   = 'span' . $first;
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
  
  // if we've selected an offset, add it here.
  if ( $offset ) {
    $class = $class . ' offset' . $offset;
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
