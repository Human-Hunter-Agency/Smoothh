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
$logoHeaderTitle = get_field('product_sections_settings' , 'option')['header_logos'];
$logoHeaderDescription = get_field('product_sections_settings' , 'option')['description_logos'];

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<meta itemprop="headline" content="<?php the_title(); ?>">
	<meta itemprop="url" content="<?php echo get_permalink(); ?>">
	<?php if ($author) : ?>
		<meta itemprop="author" content="<?php echo esc_html($author); ?>">
	<?php endif; ?>
	<meta itemprop="datePublished" content="<?php the_time('c'); ?>">
	<?php if (get_post_thumbnail_id($post->ID)) : ?>
		<meta itemprop="image" content="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0] ?>">
	<?php endif; ?>

	<div class="relative w-full h-[300px] md:h-[400px] flex flex-col items-center justify-center mb-[50px] md:mb-[100px]">
		<?php if (function_exists('yoast_breadcrumb')) : ?>
			<div class="breadcrumbs-container absolute top-0 inset-x-0">
				<?php yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-banner">', '</div>'); ?>
			</div>

		<?php endif; ?>

		<?php smoothh_post_thumbnail(); ?>

		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/80"></div>

		<div class="relative z-0 flex flex-col items-center justify-center container">
			<?php the_title('<h1 class="text-5xl md:text-[46px] leading-tight text-center text-bold text-white font-bold">', '</h1>'); ?>
		</div>
	</div>


	<div class="container flex flex-col md:flex-row gap-5 md:gap-10 lg:gap-[60px] [&_div_.wp-block-image]:rounded-[15px] [&_div_.wp-block-image]:overflow-hidden">
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
		<aside class="md:basis-[30%] lg:shrink-0 relative">
			<div class="aside-container py-8 px-6 border-[1px] border-primary rounded-[15px] md:sticky top-[115px]">
				<h5 class="mb-5 md:mb-8 text-2xl md:text-[22px] font-semibold text-primary"><?php esc_html_e('The most important information', 'smoothh'); ?></h5>
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
	<h2 class="container text-3xl md:text-5xl text-bold font-extrabold mb-5 md:mb-14 text-center"><?php echo $headerPostRelated; ?></h2>

	<?php
	get_template_part('flexible-content/sections/partials/case-studies-swiper', '');
	?>
</section>

<section id="clients-logos">
	<?php get_template_part('flexible-content/sections/swiper-customer-logos', '', array('header' => $logoHeaderTitle , 'description' => $logoHeaderDescription)); ?>
</section>

<section class="cta container mx-auto relative">
	<?php if ($cta) :
		$header = $cta['header'];
		$button = $cta['button'];
	?>
		<div class="mx-auto w-full -mb-20 px-4 md:px-8 lg:px-24 py-8 md:py-14 flex flex-col md:flex-row gap-2 items-center justify-between drop-shadow-2xl rounded-3xl bg-gradient-to-b from-secondary to-primary">
			<?php if ($header) : ?>
				<div>
					<h3 class="mb-0 text-xl sm:text-2xl md:text-3xl lg:text-5xl text-bold text-white font-bold text-left"><?php echo $header; ?></h3>
				</div>
			<?php endif; ?>

			<?php if ($button) :
				$btn_url = $button['url'];
				$btn_title = $button['title'];
				$btn_target = $button['target'] ? $button['target'] : '_self';
			?>
				<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="rounded-3xl text-lg md:text-xl font-semibold md:font-bold py-2 px-5 md:px-12 border-[1px] border-white text-white bg-transparent hover:bg-white/20 transition duration-200"><?php echo esc_html($btn_title); ?></a>
			<?php endif; ?>

		</div>
	<?php endif; ?>
</section>
