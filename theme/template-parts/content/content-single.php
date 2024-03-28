<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smoothh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	<?php smoothh_post_thumbnail(); ?>

	<div <?php smoothh_content_class( 'entry-content' ); ?>>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'smoothh' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		?>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->
