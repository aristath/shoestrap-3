<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

	<!--[if lt IE 8]>
		<div class="alert alert-warning">
			<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
		</div>
	<![endif]-->

	<?php

	if ( defined( 'SHOESTRAP_BOXED' ) )
		echo '<div class="container boxed-container">';

	do_action( 'get_header' );

	do_action( 'shoestrap_pre_navbar' );

	if ( SHOESTRAP_NAV_MODE != 'pills' ) {
		if ( !has_action( 'shoestrap_header_top_navbar_override' ) )
			get_template_part( 'templates/header-top-navbar' );
		else
			do_action( 'shoestrap_header_top_navbar_override' );
	} else {
		if ( !has_action( 'shoestrap_header_override' ) )
			get_template_part( 'templates/header' );
		else
			do_action( 'shoestrap_header_override' );
	}

	do_action( 'shoestrap_post_navbar' );

	if ( defined( 'SHOESTRAP_BOXED' ) )
		echo '</div>';

	if ( defined( 'SHOESTRAP_NAV_MODE' ) && SHOESTRAP_NAV_MODE == 'left')
		echo '<section class="static-menu-main ' . SHOESTRAP_STATIC_LEFT_BREAKPOINT . ' col-static-' . ( 12 - SHOESTRAP_LAYOUT_SECONDARY_WIDTH ) . '">';

	if ( has_action( 'shoestrap_below_top_navbar' ) ) {
		echo '<div class="before-main-wrapper">';
		do_action('shoestrap_below_top_navbar');
		echo '</div>';
	}

	do_action('shoestrap_pre_wrap');
	do_action('shoestrap_breadcrumbs');
	do_action('shoestrap_header_media');

	echo '<div class="wrap main-section ' . SHOESTRAP_CONTAINER_CLASS . '" role="document">';

	do_action('shoestrap_pre_content');

	?>

	<div class="content">
		<div class="row bg">
			<?php do_action('shoestrap_pre_main'); ?>

			<?php if ( defined( 'SHOESTRAP_SECTION_CLASS_WRAPPER' ) ) : ?>
				<div class="mp_wrap <?php echo SHOESTRAP_SECTION_CLASS_WRAPPER ?>"><div class="row">
			<?php endif; ?>

			<main class="main <?php echo SHOESTRAP_SECTION_CLASS_MAIN; ?>" <?php if ( is_home() ) { echo 'id="home-blog"'; } ?> role="main">
				<?php include roots_template_path(); ?>
			</main><!-- /.main -->

			<?php do_action('shoestrap_after_main'); ?>

				<?php if ( ( SHOESTRAP_LAYOUT != 0 && ( roots_display_sidebar() ) ) || ( is_front_page() && defined( 'SHOESTRAP_SIDEBAR_ON_FRONT' ) && SHOESTRAP_LAYOUT != 0 ) ) : ?>
					<?php if ( !is_front_page() || ( is_front_page() && defined( 'SHOESTRAP_SIDEBAR_ON_FRONT' ) ) ) : ?>
						<aside class="sidebar <?php echo SHOESTRAP_SECTION_CLASS_PRIMARY; ?>" role="complementary">
							<?php
								if ( !has_action( 'shoestrap_sidebar_override' ) )
									include roots_sidebar_path();
								else
									do_action( 'shoestrap_sidebar_override' );
							?>
						</aside><!-- /.sidebar -->
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( defined( 'SHOESTRAP_SECTION_CLASS_WRAPPER' ) ) : ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( SHOESTRAP_LAYOUT >= 3 && is_active_sidebar( 'sidebar-secondary' ) ) : ?>
					<?php if ( !is_front_page() || ( is_front_page() && defined( 'SHOESTRAP_SIDEBAR_ON_FRONT' ) ) ) : ?>
						<aside class="sidebar secondary <?php echo SHOESTRAP_SECTION_CLASS_SECONDARY; ?>" role="complementary">
							<?php dynamic_sidebar( 'sidebar-secondary' ); ?>
						</aside><!-- /.sidebar -->
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div><!-- /.content -->
		<?php do_action('shoestrap_after_content'); ?>
	</div><!-- /.wrap -->
	<?php

	do_action('shoestrap_after_wrap');

	if ( defined( 'SHOESTRAP_BOXED' ) )
		echo '<div class="container boxed-container">';

	do_action('shoestrap_pre_footer');

	if ( !has_action( 'shoestrap_footer_override' ) )
		get_template_part('templates/footer');
	else
		do_action( 'shoestrap_footer_override' );

	do_action('shoestrap_after_footer');

	if ( defined( 'SHOESTRAP_BOXED' ) )
		echo '</div>';

	if ( defined( 'SHOESTRAP_NAV_MODE' ) && SHOESTRAP_NAV_MODE == 'left')
		echo '</section>';

	wp_footer();

	?>
</body>
</html>