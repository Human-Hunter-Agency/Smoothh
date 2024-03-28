<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Smoothh
 */

get_header();
?>

	<section id="primary" class="container flex flex-col md:flex-row gap-5 md:gap-10 lg:gap-[70px]">
		<main id="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span aria-hidden="true">' . __( 'Next Post', 'smoothh' ) . '</span> ' .
								'<span class="sr-only">' . __( 'Next post:', 'smoothh' ) . '</span> <br/>' .
								'<span>%title</span>',
							'prev_text' => '<span aria-hidden="true">' . __( 'Previous Post', 'smoothh' ) . '</span> ' .
								'<span class="sr-only">' . __( 'Previous post:', 'smoothh' ) . '</span> <br/>' .
								'<span>%title</span>',
						)
					);
				}

				// End the loop.
			endwhile;
			?>

		</main><!-- #main -->
		<aside>
			<ul class="list-none [&>li]:text-3xl font-semibold [&_.cat-item]:text-base md:[&_.cat-item]:text-xl [&_a]:transition [&_a]:duration-200 hover:[&_a]:text-primary">
				<?php wp_list_categories() ?>
			</ul>
		</aside>
	</section><!-- #primary -->

<?php
get_footer();
