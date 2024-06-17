<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
			get_template_part('template-parts/content/content', 'page');

			$sections = get_field('sections');
			$no_fade_sections = ['hero'];

			if ($sections) :
				foreach ($sections as $section) : 
					$template = str_replace('_', '-', $section['acf_fc_layout']);
					?>
					<div <?php if (!in_array($template,$no_fade_sections)) { echo 'data-aos="fade" data-aos-delay="50"'; }?> >
						<?php
						$section_visible = $section['isSectionVisible'];
						if (isset($section_visible) && $section_visible == true) {
							get_template_part('flexible-content/sections/' . $template, '', $section);
						} ?>
					</div>
		<?php
				endforeach;
			endif;


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
