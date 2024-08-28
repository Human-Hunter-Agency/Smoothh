<?php

/** Template to display 'Sekcja z kafelkami case study' - grid_case_study */

$section_ID = $args['section_ID'];
$header = $args['header'];

$visible_posts = 6;
$posts = get_posts(array(
    'post_type'         => 'case-study',
    'numberposts'       => 5,
));

?>

<div id="<?php if ($section_ID) : echo $section_ID;
            endif; ?>" class="relative pb-10 pt-24 md:pt-28">

    <div class="container">
            <?php if ($header) : ?>
                <div class="mx-auto max-w-[960px] text-center font-extrabold prose-strong:font-extrabold prose-strong:text-primary text-2xl md:text-3xl lg:text-[46px] lg:leading-[60px] mb-9 md:mb-[70px]">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
		<div class="pb-20">
			<?php if ($posts) : ?>
					<div data-js-case-studies-grid='container' class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-14 sm:gap-y-14">
						<?php foreach ($posts as $post) : ?>
							<a href="<?php echo get_permalink($post->ID) ?>" class="group !h-auto pb-5 !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl shadow-xl lg:shadow-2xl">
								<div class="w-full relative rounded-t-[14px] overflow-hidden [&_img]:object-cover [&_img]:w-full [&_img]:!h-[190px] [&_img]:md:!h-[220px]">
									<?php echo wp_get_attachment_image(get_post_thumbnail_id($post), 'medium', false, array('loading' => 'lazy')); ?>
									<div class="absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
								</div>
								<div class="text-center p-3 md:p-6 !pt-0">
									<?php if ($post->post_title) : ?>
										<h3 class="bg-secondary rounded-[14px] p-2 -translate-y-1/2 text-base md:text-[20px] text-white mb-4 font-bold"><?php echo $post->post_title; ?></h3>
									<?php endif; ?>
									<p class="text-sm md:text-base italic font-normal"><?php echo get_the_excerpt($post->ID); ?></p>
								</div>
								<span class="ml-0 mr-auto rounded-[14px] text-[16px] font-bold py-2 px-7 text-secondary  group-hover:text-primary transition duration-200"><?php esc_html_e('Read more', 'smoothh') ?><span class="ml-2">></span></span>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="w-full px-10 py-20 hidden" data-js-case-studies-grid="loader">
				<span class="mx-auto block size-10 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
			</div>
			<button data-js-case-studies-grid="load-more" class="<?php if ((count($posts) <= $visible_posts)) {echo '!hidden';} ?> flex mx-auto xl:mt-14 gap-4 items-center text-[20px] font-bold py-[15px] px-5 md:px-8  hover:text-primary disabled:!opacity-20 transition-all duration-200 disabled:pointer-events-none ">
				<?php esc_html_e('More posts', 'smoothh'); ?>
			</button>
		</div>
	</div>
</div>

