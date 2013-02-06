<?php

/*
 * Applies the styles to the navbar.
 */
function shoestrap_navbar_css(){
  // Get the customizer settings
  $header_bg_color      = get_theme_mod( 'shoestrap_header_backgroundcolor' );
  $navbar_color         = get_theme_mod( 'shoestrap_navbar_color' );
  $navbar_textcolor     = get_theme_mod( 'shoestrap_navbar_textcolor' );
  $navbar_logo_padding  = get_theme_mod( 'shoestrap_navbar_logo_padding' );
  $navbar_no_gradient   = get_theme_mod( 'shoestrap_navbar_no_gradient' );
  
  // Make sure colors are properly formatted
  $header_bg_color  = '#' . str_replace( '#', '', $header_bg_color );
  $navbar_color     = '#' . str_replace( '#', '', $navbar_color );
  $navbar_textcolor = '#' . str_replace( '#', '', $navbar_textcolor );
  
  // Make sure the padding is properly formatted
  if ( $navbar_logo_padding >= 1 ) {} else { $navbar_logo_padding = 0; }
  
  // Apply proper padding for logos
  $styles = '<style>';
  if ( get_theme_mod( 'shoestrap_logo' ) ) {
    if ( get_theme_mod( 'shoestrap_header_mode' ) == 'navbar' ) {
      '.navbar a.brand{padding: 5px 20px 5px;}';
    }
  }
  
  // Navbar colors
  $styles .= '.navbar-inner, #main-subnav.subnav-fixed, .navbar-inner .dropdown-menu{';
  $styles .= 'background-color:' . $navbar_color . '!important;';
  if ( $navbar_no_gradient != 1 ) {
    $styles .= 'background-image: -moz-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
    $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $navbar_color . '), to(' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ')) !important;';
    $styles .= 'background-image: -webkit-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
    $styles .= 'background-image: -o-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
    $styles .= 'background-image: linear-gradient(to bottom, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
    $styles .= 'filter: e(%("progid:DXImageTransform.Microsoft.gradient(startColorstr="%d", endColorstr="%d", GradientType=0)",argb(' . $navbar_color . '),argb(' . shoestrap_adjust_brightness( $navbar_color, -10 ) . '))) !important;';
    $styles .= 'border: 1px solid ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
  } else {
    $styles .= 'background-image: -moz-linear-gradient(top, ' . $navbar_color . ', ' . $navbar_color . ') !important;';
    $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $navbar_color . '), to(' . $navbar_color . ')) !important;';
    $styles .= 'background-image: -webkit-linear-gradient(top, ' . $navbar_color . ', ' . $navbar_color . ') !important;';
    $styles .= 'background-image: -o-linear-gradient(top, ' . $navbar_color . ', ' . $navbar_color . ') !important;';
    $styles .= 'background-image: linear-gradient(to bottom, ' . $navbar_color . ', ' . $navbar_color . ') !important;';
    $styles .= 'filter: e(%("progid:DXImageTransform.Microsoft.gradient(startColorstr="%d", endColorstr="%d", GradientType=0)",argb(' . $navbar_color . '),argb(' . $navbar_color . '))) !important;';
    $styles .= 'border: 1px solid ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
  }

  // Navbar Padding
  $styles .= 'padding:' . $navbar_logo_padding . 'px;}';
  
  // Navbar Dropdown colors
  $styles .= '.navbar-inner .dropdown-menu{padding: 0;}';
  
  // Navbar Button colors
  $styles .= '.btn.btn-navbar{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -40 ) . ';';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 40 ) . ';';
  }
  $styles .= '}';
  
  $styles .= '.btn.btn-navbar:hover, .btn.btn-navbar:active, .btn.btn-navbar:enabled{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -30 ) . ';';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 30 ) . ';';
  }
  $styles .= '}';
  
  // Navbar menu items text-color and active menu styling
  $styles .= '.navbar-inner a, .navbar-inner .brand, .navbar .nav > li > a{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
    }
  } else {
    $styles .= 'color: ' . $navbar_textcolor . ';';
  }
  $styles .= 'text-shadow: 0 1px 0 ' . shoestrap_adjust_brightness( $navbar_color, -15 ) . ';}';
  $styles .= '.navbar-inner a:hover, .navbar-inner .brand:hover, .navbar .nav > li > a:hover{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -200 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 200 ) . ';';
    }
  } else {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, -20 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, 20 ) . ';';
    }
  }
  $styles .= 'text-shadow: 0 1px 0 ' . shoestrap_adjust_brightness( $navbar_color, -15 ) . ';}';
  $styles .= '.navbar .nav > .active > a, .navbar .nav > .active > a:hover, .navbar .nav > .active > a:focus{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 130) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -180 ) . ';';
      $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 180 ) . ';';
      $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, 30 ) . ';';
    }
  } else {
    if ( shoestrap_get_brightness( $navbar_color ) >= 130) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, -30 ) . ';';
      $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, 300 ) . ';';
      $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, 30 ) . ';';
    }
  }
  $styles .= 'text-shadow: 0 1px 0 ' . shoestrap_adjust_brightness( $navbar_color, -15 ) . ';}';
  
  // Destroy active menu item background when user has added padding
  if ( $navbar_logo_padding >= 1 ) {
    $styles .= '.navbar .nav > .active > a, .navbar .nav > .active > a:hover, .navbar .nav > .active > a:focus{';
    $styles .= 'background-color:none; background-color:transparent;';
    $styles .= '-webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none;}';
  }

  $styles .= '</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_navbar_css_cache() {
  $data = get_transient( 'shoestrap_navbar_css' );
  if ( $data === false ) {
    $data = shoestrap_navbar_css();
    set_transient( 'shoestrap_navbar_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_navbar_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_navbar_css_cache_reset() {
  delete_transient( 'shoestrap_navbar_css' );
  shoestrap_navbar_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_navbar_css_cache_reset' );

/*
 * Applies the styles to the navbar dropdowns.
 */
function shoestrap_navbar_dropdown_css(){
  $advanced_builder = get_option('shoestrap_advanced_compiler');
  $header_bg_color  = get_theme_mod( 'shoestrap_header_backgroundcolor' );
  if ( $advanced_builder != 1 ) {
    $navbar_color   = get_theme_mod( 'shoestrap_navbar_color' );
  } else {
    $navbar_color   = get_theme_mod( 'strp_cb_navbar_background' );
  }
  $navbar_textcolor = get_theme_mod( 'shoestrap_navbar_textcolor' );
  
  
  // Make sure colors are properly formatted
  $header_bg_color  = '#' . str_replace( '#', '', $header_bg_color );
  $navbar_color     = '#' . str_replace( '#', '', $navbar_color );
  $navbar_textcolor = '#' . str_replace( '#', '', $navbar_textcolor );
  
  $styles = '<style>';
  $styles .= '.navbar-inner ul.dropdown-menu{';
  $styles .= 'background-color:' . $navbar_color . '!important;';
  $styles .= 'background-image: -moz-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
  $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $navbar_color . '), to(' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ')) !important;';
  $styles .= 'background-image: -webkit-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
  $styles .= 'background-image: -o-linear-gradient(top, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
  $styles .= 'background-image: linear-gradient(to bottom, ' . $navbar_color . ', ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ') !important;';
  $styles .= 'filter: e(%("progid:DXImageTransform.Microsoft.gradient(startColorstr="%d", endColorstr="%d", GradientType=0)",argb(' . $navbar_color . '),argb(' . shoestrap_adjust_brightness( $navbar_color, -10 ) . '))) !important;';
  $styles .= 'border: 1px solid ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';}';
  
  $styles .= '.navbar .nav > li > .dropdown-menu::before{border-bottom: 7px solid ' . $navbar_color . ';}';
  $styles .= '.navbar .nav > li > .dropdown-menu::after{border-bottom: 6px solid ' . $navbar_color . ';}';
  
  $styles .= '.navbar-inner .dropdown-menu li > a, .navbar-inner .dropdown-menu li > a:hover, .navbar-inner .dropdown-menu li > a:focus, .navbar-inner .dropdown-submenu:hover > a{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
    }
  } else {
    $styles .= 'color: ' . $navbar_textcolor . ';';
  }
  $styles .= '}';
  
  $styles .= '.navbar .nav li.dropdown.open > .dropdown-toggle, .navbar .nav li.dropdown.active > .dropdown-toggle, .navbar .nav li.dropdown.open.active > .dropdown-toggle{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 130) {
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -180 ) . ';';
    $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, -40 ) . ';';
  } else {
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 180 ) . ';';
    $styles .= 'background-color: ' . shoestrap_adjust_brightness( $navbar_color, 50 ) . ';';
  }
  $styles .= 'text-shadow: 0 1px 0 ' . shoestrap_adjust_brightness( $navbar_color, -15 ) . ';}';
  $styles .= '.navbar .nav li.dropdown > .dropdown-toggle .caret, .navbar .nav li.dropdown.open > .dropdown-toggle .caret, .navbar .nav li.dropdown.active > .dropdown-toggle .caret, .navbar .nav li.dropdown.open.active > .dropdown-toggle .caret{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160) {
    $styles .= 'border-top-color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
    $styles .= 'border-bottom-color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
  } else {
    $styles .= 'border-top-color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
    $styles .= 'border-bottom-color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
  }
  $styles .= '}';
  $styles .= '.dropdown-menu .active > a, .dropdown-menu .active > a:hover{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -100 ) . ';';
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 10 ) . ' !important;';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 100 ) . ';';
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -10 ) . ' !important;';
  }
  if ( strlen( $navbar_textcolor ) >= 6 ) {
    $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_textcolor, -10 ) . ' !important;';
  }
  $styles .= '}';
  $styles .= '.dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -30 ) . ';';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 30 ) . ';';
  }
  $styles .= '}';
  if ( shoestrap_get_brightness( $header_bg_color ) >= 130 ) {
    $styles .= '.dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a{color: #222;}';
  }
  $styles .= '</style>';
  
  return $styles;
}


/*
 * Set cache for 24 hours
 */
function shoestrap_navbar_dropdown_css_cache() {
  $data = get_transient( 'shoestrap_navbar_dropdown_css' );
  if ( $data === false ) {
    $data = shoestrap_navbar_dropdown_css();
    set_transient( 'shoestrap_navbar_dropdown_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_navbar_dropdown_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_navbar_dropdown_css_cache_reset() {
  delete_transient( 'shoestrap_navbar_dropdown_css' );
  shoestrap_navbar_dropdown_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_navbar_dropdown_css_cache_reset' );

/*
 * The below script allows our extra navbar
 * to be fixed on the top of the page
 * when users scroll down.
 */
function shoestrap_subnav_script() {
  $navbar     = get_theme_mod( 'shoestrap_extra_display_navigation' );
  $navbar_top = get_theme_mod( 'shoestrap_navbar_top' );
  if ( $navbar == 1 && $navbar_top == 0 ) { ?>
    <script>
    !function ($) { $(function(){
      // fix sub nav on scroll
      var $win = $(window)
        , $nav = $('#main-subnav')
        , navTop = $('#main-subnav').length && $('#main-subnav').offset().top - 40
        , isFixed = 0
  
      processScroll()
  
      $win.on('scroll', processScroll)
  
      function processScroll() {
        var i, scrollTop = $win.scrollTop()
        if (scrollTop >= navTop && !isFixed) {
          isFixed = 1
          $nav.addClass('subnav-fixed')
        } else if (scrollTop <= navTop && isFixed) {
          isFixed = 0
          $nav.removeClass('subnav-fixed')
        }
      }
    })
  }(window.jQuery)
  </script>
  <?php }
}
add_action( 'wp_head', 'shoestrap_subnav_script' );

function shoestrap_top_megamenu_css() {
  $navbar_color     = get_theme_mod( 'shoestrap_navbar_color' );
  $navbar_textcolor = get_theme_mod( 'shoestrap_navbar_textcolor' );
  
  $navbar_color     = '#' . str_replace( '#', '', $navbar_color );
  $navbar_textcolor = '#' . str_replace( '#', '', $navbar_textcolor );

  $styles = '<style>';
  
  $styles .= '.top-megamenu{';
  if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, -20 ) . ';';
  } else {
    $styles .= 'background: ' . shoestrap_adjust_brightness( $navbar_color, 20 ) . ';';
  }
  $styles .= '}';

  $styles .= '.top-megamenu, .top-megamenu a{';
  if ( strlen( $navbar_textcolor ) < 6 ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, -160 ) . ';';
    } else {
      $styles .= 'color: ' . shoestrap_adjust_brightness( $navbar_color, 160 ) . ';';
    }
  } else {
    $styles .= 'color: ' . $navbar_textcolor . ';';
  }
  $styles .= '}';
  
  $styles .= '</style>';
  
  return $styles;
}

/*
 * Set cache for 24 hours
 */
function shoestrap_top_megamenu_css_cache() {
  $data = get_transient( 'shoestrap_top_megamenu_css' );
  if ( $data === false ) {
    $data = shoestrap_top_megamenu_css();
    set_transient( 'shoestrap_top_megamenu_css', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'wp_head', 'shoestrap_top_megamenu_css_cache', 199 );

/*
 * Reset cache when in customizer
 */
function shoestrap_top_megamenu_css_cache_reset() {
  delete_transient( 'shoestrap_top_megamenu_css' );
  shoestrap_top_megamenu_css_cache();
}
add_action( 'customize_preview_init', 'shoestrap_top_megamenu_css_cache_reset' );
