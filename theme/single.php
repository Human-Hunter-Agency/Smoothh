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

<section id="primary">
	<main id="main">

		<?php
		/* Start the Loop */
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content/content', 'single');

		// End the loop.
		endwhile;
		?>

	</main><!-- #main -->

</section><!-- #primary -->
<section class="container">
	<h2 class="text-3xl md:text-5xl text-bold font-bold mb-5 md:mb-10 text-center">Zobacz pozostałe materiały eksperckie z naszego bloga</h2>
	<ul class="p-2 rounded-full bg-[#F2F2F2] flex items-center gap-2 max-w-screen-md mx-auto mb-5 md:mb-10">
		<?php
		$categories = get_categories();
		foreach ($categories as $category) : ?>
			<li>
				<button class="px-5 rounded-2xl text-base bg-white text-primary hover:bg-primary/20 transition duration-300"><?php echo $category->name ?></button>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
		foreach ($categories as $category) : ?>
			<div>
				<?php echo $category->name ?> content
			</div>
		<?php endforeach; ?>
</section>

<?php
get_footer();
