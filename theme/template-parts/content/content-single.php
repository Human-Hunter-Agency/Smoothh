<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smoothh
 */

$title = get_field('title');
$author = get_field('author');
$cta = get_field('cta');
?>

<article id="post-<?php the_ID(); ?>" data-js-post-id="<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
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

		<?php smoothh_post_thumbnail(); ?>

		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-secondary to-primary opacity-80"></div>

		<div class="relative z-0 flex flex-col items-center justify-center container">
			<?php the_title('<h1 class="text-5xl md:text-[66px] leading-tight text-center text-bold text-white font-bold">', '</h1>'); ?>
		</div>
	</div>


	<div class="container flex flex-col md:flex-row md:justify-between gap-5 md:gap-10 lg:gap-[60px]">
		<div <?php smoothh_content_class('entry-content'); ?>>
			<div class="mb-5 md:mb-6">
				<?php if ($title) : ?>
					<h2 class="!text-2xl font-bold text-primary !mb-1 !mt-0"><?php echo esc_html($title) ?></h2>
				<?php endif; ?>
				<span class="italic">
					<?php
					if ($author) {
						echo __('Author: ', 'smoothh') . $author . ' / ';
					}
					$post_time = get_post_time();
					$formatted_time = date('d.m.Y', $post_time);
					echo __('Date published: ', 'smoothh') . $formatted_time
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
		<aside class="md:basis-[30%] lg:shrink-0 ">
			<div class="py-8 px-6 rounded-2xl border-[1px] border-primary md:sticky top-[115px]">
				<h5 class="mb-5 md:mb-8 text-2xl md:text-[22px] font-semibold text-primary"><?php esc_html_e('Post categories', 'smoothh'); ?></h5>
				<ul class="list-none">
					<?php
					$blog_page_id = 20;
					$categories = get_categories();

					foreach ($categories as $cat) :
						#wp_list_categories(array('title_li' => '')) 
					?>
						<li class="mb-4 md:mb-6">
							<a href="<?php echo get_permalink($blog_page_id) . '?tab=' . $cat->slug ?>" class="font-bold text-base md:text-[20px] transition duration-200 hover:text-primary"><?php echo $cat->name ?></a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</aside>
	</div>

</article><!-- #post-${ID} -->

<?php get_template_part('flexible-content/sections/blog-posts') ?>

<?php if ($cta) :
	$background = $cta['background'];
	if (isset($background) && isset($background['url']) && $background['url']) {
		$bg_url = $background['url'];
	}
	$header = $cta['header'];
	$button = $cta['button'];
?>
	<div class="relative w-full flex flex-col items-center justify-center py-10 md:py-[70px]">

		<?php if (isset($bg_url)) : ?>
			<?php echo smoothh_img_responsive($background, 'absolute inset-0 -z-20 object-cover h-full w-full', null, 'lazy'); ?>

		<?php endif; ?>

		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/70"></div>

		<div class="relative z-0 flex flex-col items-center justify-center container">
			<?php if (isset($header)) : ?>
				<h3 class="text-3xl md:text-5xl text-bold text-white font-bold mb-9"><?php echo esc_html($header); ?></h1>
				<?php endif; ?>

				<?php if (isset($button) && $button) :
					$btn_url = $button['url'];
					$btn_title = $button['title'];
					$btn_target = $button['target'] ? $button['target'] : '_self';
				?>
					<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="rounded-[14px] text-[13px] font-bold py-2 px-7 md:px-[70px] border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200"><?php echo esc_html($btn_title); ?></a>
				<?php endif; ?>
		</div>

	</div>
<?php endif; ?>