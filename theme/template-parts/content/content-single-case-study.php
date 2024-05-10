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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<meta itemprop="headline" content="<?php the_title(); ?>">
	<meta itemprop="url" content="<?php echo get_permalink(); ?>">
	<?php if ($author) : ?>
		<meta itemprop="author" content="<?php echo esc_html($author); ?>">
	<?php endif; ?>
	<meta itemprop="datePublished" content="<?php the_time('c'); ?>">
	<?php if (get_post_thumbnail_id( $post->ID )) : ?>
		<meta itemprop="image" content="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0] ?>">
	<?php endif; ?>

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
		<aside class="md:basis-1/4 lg:shrink-0 relative">
			<div class="aside-container p-5 border-[1px] border-[#888888] rounded-[15px] md:sticky top-[115px]">
				<h5 class="mb-5 md:mb-9 text-2xl md:text-3xl font-semibold"><?php esc_html_e('The most important information', 'smoothh'); ?></h5>
				<div class="case-study-info-box">
					<p><span class="font-bold"><?php esc_html_e('Client: ', 'smoothh'); ?></span><?php echo $client; ?></p>
					<p class="mb-4"><span class="font-bold"><?php esc_html_e('Date: ', 'smoothh'); ?></span><?php echo $formatted_time; ?></p>
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
	get_template_part('flexible-content/sections/partials/case-studies-swiper', '');
	?>
</section>

<section id="clients-logos">
	<?php get_template_part('flexible-content/sections/swiper-customer-logos', '', array('header' => $logoHeader,'description'=> false));?>
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