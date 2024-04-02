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
<section class="container mt-10 md:mt-20">
	<h2 class="text-3xl md:text-5xl text-bold font-bold mb-5 md:mb-10 text-center">Zobacz pozostałe materiały eksperckie z naszego bloga</h2>
	<ul class="p-2 rounded-2xl bg-[#F2F2F2] flex items-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-5 md:mb-10">
		<?php
		$categories = get_categories();
		foreach ($categories as $category) : ?>
			<li class="flex-1">
				<button data-js="<?php echo 'tab-btn-' . $category->term_id; ?>" class="w-full px-5 py-2 font-semibold rounded-[10px] text-base bg-white text-primary hover:bg-primary/10 transition duration-300 whitespace-nowrap"><?php echo $category->name ?></button>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
	$i = 0;
	foreach ($categories as $category) :
		$args = array(
			'category' => $category->term_id,
			'numberposts' => 6,
			'exclude' => get_the_ID()
		);
	?>
		<div class="w-full relative min-h-32 <?php if ($i !== 0) {echo 'hidden';} ?>" data-js="<?php echo 'tab-content-' . $category->term_id; ?>">
			<?php 
			if ($i === 0) :
				++$i;
				$posts = get_posts($args);
				foreach ($posts as $post) : ?>
				<div>
					<h4><?php echo $post->post_title; ?></h4>
					<p><?php echo get_the_excerpt($post->ID); ?></p>
				</div>
			
			<?php
				endforeach;
			endif;
			?>
		</div>
		
	<?php endforeach; ?>
</section>

<?php
/* CTA */

	$cta = get_field('cta');
	echo $cta;
	if ($cta) {
		$background = $cta['background'];
		if ($background['url']) {
			$bg_url = $background['url'];
		}
		$header = $cta['header'];
		$button = $cta['button'];
	}

?>

<div class="relative w-full flex flex-col items-center justify-center py-10 md:py-[70px]">

    <?php if (isset($bg_url)) : ?>
        <img src="<?php echo $bg_url; ?>" class="absolute inset-0 -z-20 object-cover h-full w-full" >
    <?php endif; ?>

    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/70"></div>

    <div class="relative z-0 flex flex-col items-center justify-center container">
        <?php if ($header) : ?>
            <h3 class="text-3xl md:text-5xl text-bold text-white font-bold mb-9" ><?php echo esc_html($header); ?></h1>
        <?php endif; ?>

        <?php if( $button ): 
            $btn_url = $button['url'];
            $btn_title = $button['title'];
            $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="rounded-[14px] text-[13px] font-bold py-2 px-7 md:px-[70px] border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200" ><?php echo esc_html( $btn_title ); ?></a>
        <?php endif; ?>
    </div>

</div>

<?php
get_footer();
