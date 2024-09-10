<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Smoothh
 */

get_header();
?>

	<section id="primary">
		<main id="main">

			<div class="prose container text-center py-20">
				<span class="text-4xl md:text-6xl text-primary font-semibold">404</span>
				<h1 class="mx-auto max-w-3xl"><?php esc_html_e( 'Page Not Found', 'smoothh' ); ?></h1>
				<p class="mx-auto max-w-3xl"><?php esc_html_e( 'This page could not be found. It might have been removed or renamed, or it may never have existed.', 'smoothh' ); ?></p>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
