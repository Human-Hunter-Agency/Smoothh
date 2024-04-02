<?php

/**
 * Template part for displaying single case study posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smoothh
 */

$title = get_field('title');
$author = get_field('author');
$client = get_field('klient');
$param1 = get_field('parametr_1');
$param2 = get_field('parametr_2');
$customer_logos = get_field('customer_logos');
$cta = get_field('cta');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="relative w-full h-[300px] md:h-[600px] flex flex-col items-center justify-center mb-[50px] md:mb-[100px]">

		<?php smoothh_post_thumbnail(); ?>

		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/80"></div>

		<div class="relative z-0 flex flex-col items-center justify-center container">
			<?php the_title('<h1 class="text-5xl md:text-[66px] leading-tight text-center text-bold text-white font-bold">', '</h1>'); ?>
		</div>
	</div>


	<div class="container flex flex-col md:flex-row gap-5 md:gap-10 lg:gap-[60px]">
		<div <?php smoothh_content_class('entry-content'); ?>>
			<div class="mb-5 md:mb-6">
				<?php if ($title) : ?>
					<h2 class="!text-2xl font-bold text-primary !mb-1 !mt-0"><?php echo esc_html($title) ?></h2>
				<?php endif; ?>
				<span class="italic">
					<?php
					if ($author) {
						echo $author . ' / ';
					}
					$post_time = get_post_time();
					$formatted_time = date('d.m.Y', $post_time);
					echo 'Data publikacji: ' . $formatted_time
					?>
				</span>
			</div>
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__('Continue reading<span class="sr-only"> "%s"</span>', 'smoothh'),
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
		<aside class="md:basis-1/4 lg:shrink-0 ">
			<h5 class="mb-5 md:mb-9 text-2xl md:text-3xl font-semibold">Najważniejsze informacje</h5>
			<div class="case-study-info-box">
				<p><span class="font-bold">Klient: </span><?php echo $client; ?></p>
				<p class="mb-4"><span class="font-bold">Data: </span><?php echo $formatted_time; ?></p>
				<p><span class="font-bold">Parametr: </span><?php echo $param1; ?></p>
				<p class="mb-4"><span class="font-bold">Parametr: </span><?php echo $param2; ?></p>
				<p>Nulla id tellus scelerisque, fringilla ex vitae, cursus tortor. Pellentesque vitae auctor dolor. Donec rhoncus risus eget scelerisque bibendum. Aliquam erat volutpat. Integer nec orci congue libero ultrices placerat ut quis mi. Praesent nec accumsan massa, nec laoreet dolor. Aliquam erat volutpat. Integer nec orci congue libero ultrices placerat ut quis mi. Praesent nec accumsan massa, nec laoreet dolor. </p>
			</div>
		</aside>
	</div>

</article><!-- #post-${ID} -->

<section id="posts-related" class="container my-10 md:mt-20 md:mb-16">
	<h2 class="text-3xl md:text-5xl text-bold font-bold mb-5 md:mb-10 text-center">Zobacz pozostałe case study ze zrealizowanych przez SMOOTHH® projektów rekrutacyjnych:</h2>

	<?php
	$visible_posts = 3;
	$args = array(
		'post_type' => 'case-study',
		'numberposts' => $visible_posts,
		'exclude' => get_the_ID()
	);
	?>
	<div class="w-full relative min-h-32">
		<ul class="swiper-wrapper xl:!gap-y-20 xl:!gap-x-[90px] xl:!flex-wrap xl:!transform-none">
			<?php
			$posts = get_posts($args);
			foreach ($posts as $post) : ?>
				<li class="post-tile">
					<img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php echo $post->post_title; ?>">
					<h3><?php echo $post->post_title; ?></h3>
					<p><?php echo get_the_excerpt($post->ID); ?></p>
					<a href="<?php echo get_permalink($post->ID); ?>">Czytaj więcej</a>
				</li>
			<?php
			endforeach;
			?>
		</ul>
		<div class="w-full p-10 hidden" data-js="<?php echo 'tab-loader-' . $category->term_id; ?>">
			<span class="mx-auto block size-7 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
		</div>
	</div>
</section>

<?php if ($cta) :
	$background = $cta['background'];
	if ($background['url']) {
		$bg_url = $background['url'];
	}
	$header = $cta['header'];
	$button = $cta['button'];
?>
	<div class="relative w-full flex flex-col items-center justify-center py-10 md:py-[70px]">

		<?php if (isset($bg_url)) : ?>
			<img src="<?php echo $bg_url; ?>" class="absolute inset-0 -z-20 object-cover h-full w-full">
		<?php endif; ?>

		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/70"></div>

		<div class="relative z-0 flex flex-col items-center justify-center container">
			<?php if (isset($header)) : ?>
				<h3 class="text-3xl md:text-5xl text-bold text-white font-bold mb-9"><?php echo esc_html($header); ?></h1>
				<?php endif; ?>

				<?php if (isset($button)) :
					$btn_url = $button['url'];
					$btn_title = $button['title'];
					$btn_target = $button['target'] ? $button['target'] : '_self';
				?>
					<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="rounded-[14px] text-[13px] font-bold py-2 px-7 md:px-[70px] border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200"><?php echo esc_html($btn_title); ?></a>
				<?php endif; ?>
		</div>

	</div>
<?php endif; ?>