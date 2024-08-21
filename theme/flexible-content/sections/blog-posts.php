<?php
$header_data = get_field('blog_posts_data', 'option');
$header = $header_data['header'];
$description = $header_data['description'];
$hide_message_field = $args['hide_message_field'];

?>

<section id="posts-related" class="container mt-10 mb-20 md:my-20">
	<?php if ($header) : ?>
		<h2 class="mx-auto max-w-[1040px] mb-10 lg:mb-7 !text-2xl md:!text-4xl lg:!text-[46px] prose-strong:text-primary font-bold lg:!font-extrabold lg:leading-[55px] text-center"><?php echo $header; ?></h2>
	<?php endif; ?>
	<?php if ($description) : ?>
		<div class="prose-smoothh prose !font-light text-center mb-10 prose-h2:font-bold prose-h2:text-3xl prose-h2:md:text-5xl prose-h2:mb-9"><?php echo $description; ?></div>
	<?php endif; ?>
	<ul class="p-2 rounded-2xl flex items-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-5 md:mb-10">
		<?php
		$categories = get_categories();
		$i = 0;
		foreach ($categories as $category) : ?>
			<li class="flex-1">
				<button data-js-tab-btn="<?php echo $category->term_id; ?>" data-js-tab-slug="<?php echo $category->slug; ?>" class="<?php if ($i++ === 0) {echo 'active';} ?> tab-btn"><?php echo $category->name ?></button>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php
	$i = 0;
	foreach ($categories as $category) :
		$count = $category->category_count;
		$visible_posts = 6;
		$args = array(
			'category' => $category->term_id,
			'numberposts' => $visible_posts,
			'exclude' => get_the_ID()
		);
	?>
		<div class="w-full relative min-h-32 <?php if ($i !== 0) {
																						echo 'hidden';
																					} ?>" data-js="<?php echo 'tab-content-' . $category->term_id; ?>">
			<ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-14 sm:gap-y-14">
				<?php if ($i === 0) :
					++$i;
					$posts = get_posts($args);
					foreach ($posts as $post) : ?>
						<li class="post-tile">
							<a href="<?php echo get_permalink($post->ID); ?>">
								<?php
								$thumbnail_id = get_post_thumbnail_id($post);
								if (!$thumbnail_id) {
									echo '<img src="" />';
								} else {
									echo wp_get_attachment_image($thumbnail_id, 'medium', false, array('loading' => 'lazy', 'alt' => $post->post_title));
								}
								?>
								<div class="title-wrapper">
									<h3><?php echo $post->post_title; ?></h3>
								</div>
								<p><?php echo get_the_excerpt($post->ID); ?></p>
								<span href="<?php echo get_permalink($post->ID); ?>"><?php esc_html_e('Read more', 'smoothh'); ?><span class="!-ml-4">></span></span>
							</a>
						</li>

				<?php
					endforeach;
				endif;
				?>
			</ul>
			<div class="w-full px-10 py-20 hidden" data-js="<?php echo 'tab-loader-' . $category->term_id; ?>">
				<span class="mx-auto block size-10 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
			</div>
			<button data-js="<?php echo 'tab-loadmore-' . $category->term_id; ?>" class="<?php if (($count <= $visible_posts) || ($i > 1)) {echo '!hidden';} ?> flex mx-auto mt-14 gap-4 items-center text-[20px] font-bold py-[15px] px-5 md:px-8  hover:text-primary disabled:!opacity-20 transition-all duration-200 disabled:pointer-events-none ">
				<?php esc_html_e('More posts', 'smoothh'); ?>
			</button>
		</div>

	<?php endforeach; ?>
</section>
