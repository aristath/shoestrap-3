<?php if ( !has_action( 'shoestrap_page_header_override' ) ) : ?>
	<?php get_template_part('templates/page', 'header'); ?>
<?php else : ?>
	<?php do_action( 'shoestrap_page_header_override' ); ?>
<?php endif; ?>

<?php do_action( 'shoestrap_index_begin' ); ?>

<?php if ( !have_posts() ) : ?>
	<div class="alert alert-warning">
		<?php _e('Sorry, no results were found.', 'roots'); ?>
	</div>
	<?php get_search_form(); ?>
<?php endif; ?>

<?php if ( !has_action( 'shoestrap_override_index_loop' ) ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'shoestrap_in_loop_start_action' ); ?>
		<?php do_action( 'shoestrap_before_the_content' ); ?>

		<?php if ( !has_action( 'shoestrap_content_override' ) ) : ?>
			<?php get_template_part( 'templates/content', get_post_format() ); ?>
		<?php else : ?>
			<?php do_action( 'shoestrap_content_override' ); ?>
		<?php endif; ?>

		<?php do_action( 'shoestrap_after_the_content' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php do_action( 'shoestrap_override_index_loop' ); ?>
<?php endif; ?>

<?php do_action( 'shoestrap_index_end' ); ?>

<?php if ( !defined( 'SHOESTRAP_PAGINATION_MODE' ) || SHOESTRAP_PAGINATION_MODE == 'pager' ) : ?>
	<?php if ($wp_query->max_num_pages > 1) : ?>
		<nav class="post-nav">
			<ul class="pager">
				<li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
				<li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
			</ul>
		</nav>
	<?php endif; ?>
<?php else : ?>
	<?php global $wp_query; ?>
	<?php if ( $wp_query->max_num_pages <= 1 ) return; ?>

	<nav class="pagination">
	<?php
		echo shoestrap_paginate_links( apply_filters( 'pagination_args', array(
			'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
			'format'    => '',
			'current'     => max( 1, get_query_var('paged') ),
			'total'     => $wp_query->max_num_pages,
			'prev_text'   => '<i class="el-icon-chevron-left"></i>',
			'next_text'   => '<i class="el-icon-chevron-right"></i>',
			'type'      => 'list',
			'end_size'    => 3,
			'mid_size'    => 3
		) ) );
	?>
	</nav>

<?php endif;