<section id="posts-related" class="container mt-10 mb-20 md:my-20">
	<h2 class="text-3xl md:text-5xl text-bold font-bold mb-10 md:mb-14 text-center">Zobacz pozostałe materiały eksperckie z naszego bloga</h2>
	<ul class="p-2 rounded-2xl bg-[#F2F2F2] flex items-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-5 md:mb-10">
		<?php
		$categories = get_categories();
		$i = 0;
		foreach ($categories as $category) : ?>
			<li class="flex-1">
				<button data-js-tab-btn="<?php echo $category->term_id; ?>" class="<?php if($i++ === 0){echo 'active';} ?> tab-btn"><?php echo $category->name ?></button>
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
		<div class="w-full relative min-h-32 <?php if ($i !== 0) {echo 'hidden';} ?>" data-js="<?php echo 'tab-content-' . $category->term_id; ?>">
			<ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-10 sm:gap-y-14 xl:gap-x-[90px] xl:gap-y-20">
			<?php if ($i === 0) :
				++$i;
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
				endif;
			?>
			</ul>
				<div class="w-full p-10 hidden" data-js="<?php echo 'tab-loader-' . $category->term_id; ?>">
					<span class="mx-auto block size-7 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
				</div>
				<button data-js="<?php echo 'tab-loadmore-' . $category->term_id; ?>" class="<?php if (($count <= $visible_posts) || ($i > 1)) {echo '!hidden';} ?> flex mx-auto mt-14 gap-4 items-center rounded-2xl text-base font-bold py-[15px] px-5 md:px-8 text-white bg-gradient-to-b from-primary to-secondary transition duration-200 disabled:pointer-events-none disabled:opacity-80">
					Więcej wpisów
					<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
                        <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
                    </svg>
                </button>
		</div>
		
	<?php endforeach; ?>
</section>