<?php
/**
 * Template Name: One Page Site
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

				$exclude = '44, 47, 45, 46';

				$args = array(
					'post_type' => 'page',
					'order' => 'ASC',
					'sort_column' => 'menu_order',
					'exclude' => $exclude,
					'post_status' => 'publish'
				);
				$pages = get_pages( $args );
				
				foreach ($pages as $post)
				{
					setup_postdata( $post );
					get_template_part('content', 'page');
				}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>