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
$shortDescription = get_field('krotki_opis');
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
			<div class="aside-container p-5 border-[1px] border-[#888888] rounded-[15px]">
				<h5 class="mb-5 md:mb-9 text-2xl md:text-3xl font-semibold">Najważniejsze informacje</h5>
				<div class="case-study-info-box">
					<p><span class="font-bold">Klient: </span><?php echo $client; ?></p>
					<p class="mb-4"><span class="font-bold">Data: </span><?php echo $formatted_time; ?></p>
					<p><span class="font-bold">Parametr: </span><?php echo $param1; ?></p>
					<p class="mb-4"><span class="font-bold">Parametr: </span><?php echo $param2; ?></p>
					<p><?php echo $shortDescription; ?></p>
				</div>
			</div>
		</aside>
	</div>

</article><!-- #post-${ID} -->

<section id="posts-related" class="relative py-10 md:py-[60px] mb:pb-[60px]">
	<h2 class="text-3xl md:text-5xl text-bold font-bold mb-5 md:mb-10 text-center">Zobacz pozostałe case study ze zrealizowanych przez SMOOTHH® projektów rekrutacyjnych:</h2>

	<?php
	$args = array(
		'post_type' => 'case-study',
		'numberposts' => 5,
		'exclude' => get_the_ID()
	);
	?>

	<div class="relative z-0 w-full overflow-hidden !pb-5">
		<?php if ($posts) : ?>
			<div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
				<div class="swiper-wrapper">
					<?php foreach ($posts as $post) : ?> ?>
						<div class="swiper-slide !h-auto !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">
							<?php if (get_the_post_thumbnail_url($post->ID)) : ?>
								<div class="w-full relative mb-5 rounded-t-[14px] overflow-hidden">
									<img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="<?php echo $post->post_title; ?>">
									<div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
								</div>
							<?php endif; ?>
							<div class="text-center p-3 md:p-6 !pt-0">
								<?php if ($post->post_title) : ?>
									<h3 class="text-base md:text-xl text-primary mb-9 font-semibold"><?php echo $post->post_title; ?></h3>
								<?php endif; ?>
								<?php if (get_the_excerpt($post->ID)) : ?>
									<p class="text-sm md:text-base italic font-medium"><?php echo get_the_excerpt($post->ID); ?></p>
								<?php endif; ?>
							</div>
							<?php if (get_permalink($post->ID)) : ?>
								<a href="<?php echo get_permalink($post->ID); ?>" class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary hover:bg-secondary transition duration-200">Czytaj więcej></a>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-button-prev">
					<svg width="12" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M-0.00195312 8.99988L11.998 0.33962L11.998 17.6601L-0.00195312 8.99988Z" fill="white" />
					</svg>
				</div>
				<div class="swiper-button-next">
					<svg width="12" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 9L0 17.6603V0.339746L12 9Z" fill="white" />
					</svg>
				</div>
			</div>
		<?php endif; ?>
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