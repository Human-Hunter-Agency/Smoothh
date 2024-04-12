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
$client = get_field('client');
$parametersList = get_field('parameters');
$shortDescription = get_field('short_description');
$headerPostRelated = get_field('header_post_related');
$cta = get_field('cta');
$logoHeader = get_field('header_clients_logos');
$client_logos = get_field('client_logos', 'option');
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
			<div class="aside-container p-5 border-[1px] border-[#888888] rounded-[15px]">
				<h5 class="mb-5 md:mb-9 text-2xl md:text-3xl font-semibold">Najważniejsze informacje</h5>
				<div class="case-study-info-box">
					<p><span class="font-bold">Klient: </span><?php echo $client; ?></p>
					<p class="mb-4"><span class="font-bold">Data: </span><?php echo $formatted_time; ?></p>
					<?php if ($parametersList) : ?>
						<ul class="mb-4">
							<?php foreach ($parametersList as $parameter) : ?>
								<li>
									<p><span class="font-bold"><?php echo $parameter['title'] . ': ' ?></span><?php echo $parameter['description']; ?></p>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<p><?php echo $shortDescription; ?></p>
				</div>
			</div>
		</aside>
	</div>

</article><!-- #post-${ID} -->

<section id="posts-related" class="relative py-10 md:py-[120px] mb:pb-[60px]">
	<h2 class="container text-3xl md:text-5xl text-bold font-bold mb-5 md:mb-14 text-center"><?php echo $headerPostRelated; ?></h2>

	<?php
	$args = array(
		'post_type' => 'case-study',
		'numberposts' => 5,
		'orderby' => 'date',
		'order' => 'DESC',
		'exclude' => get_post_type(get_the_ID()) == 'case-study' ? get_the_ID() : '',
	);
	$posts = get_posts($args);


	get_template_part('flexible-content/sections/partials/case-studies-swiper', '', array('posts' => $posts));
	?>
</section>

<section id="clients-logos">
	<?php if ($client_logos) : ?>
		<div class="relative py-10 md:py-20">
			<div class="container">
				<h2 class="container text-3xl md:text-5xl text-bold font-bold mb-5 md:mb-14 text-center"><?php echo $logoHeader; ?></h2>
				<div class="flex flex-wrap gap-5 justify-center items-center">
					<?php foreach ($client_logos as $logo) : ?>
						<img class="object-contain grayscale w-[76px] md:w-36 xl:w-[188px]" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" alt="<?php echo $logo['title']; ?>" />
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>

<section class="cta">
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
</section>