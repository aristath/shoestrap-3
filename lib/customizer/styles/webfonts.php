<?php

/*
 * Apply the webfont to the selected elements.
 */
function shoestrap_typography_css() {
  $webfont        = get_theme_mod( 'shoestrap_google_webfonts' ); 
  $assign_webfont = get_theme_mod( 'shoestrap_webfonts_assign' );
  ?>
  <style>
    <?php if ( $assign_webfont == 'sitename' ) { ?>
      .brand {
    <?php } elseif ( $assign_webfont == 'headers' ) { ?>
      .brand, h1, h2, h3, h4, h5 {
    <?php } else { ?>
      body, input, button, select, textarea, .search-query {
    <?php } ?>
        font-family: '<?php echo $webfont; ?>';
      }
  </style>
<?php }
add_action( 'wp_head', 'shoestrap_typography_css', 200 );

/*
 * Extract the name of the webfont and enqueue its style.
 */
function shoestrap_typography_webfont() {
  $webfont 		  		 = get_theme_mod( 'shoestrap_google_webfonts' );
  $webfont_weight 		 = get_theme_mod( 'shoestrap_webfonts_weight' );
  $webfont_character_set = get_theme_mod( 'shoestrap_webfonts_character_set' );
  
  $f       = strlen( $webfont );
  if ($f > 3){
    $webfontname = str_replace( ' ', '+', $webfont );
    
	//echo "<link href='http://fonts.googleapis.com/css?family=" . $webfont . ":".$webfont_weight."' rel='stylesheet' type='text/css'>";
	echo '<link href="http://fonts.googleapis.com/css?family=' . $webfontname . ':' . $webfont_weight . '&subset=' . $webfont_character_set . '" rel="stylesheet" type="text/css">';
	
  }
}
add_action( 'wp_head', 'shoestrap_typography_webfont', 201 );