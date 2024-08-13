<?php

/** Template to display 'Sekcja z kafelkami case study' - grid_case_study */

$section_ID = $args['section_ID'];
$header = $args['header'];


$posts = get_posts(array(
    'post_type'         => 'case-study',
    'numberposts'       => 9,
));

?>

<div id="<?php if ($section_ID) : echo $section_ID;
            endif; ?>" class="relative pb-10 pt-24 md:pt-28">

    <div class="container">
        <div class="relative z-0">
            <?php if ($header) : ?>
                <div class="mx-auto max-w-[960px] text-center !font-bold prose-strong:font-bold prose-strong:text-primary text-2xl md:text-3xl lg:text-[46px] lg:leading-[60px] mb-9 md:mb-[70px]">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <ul data-js-case-studies='container'>
				<div class="relative z-0 w-full overflow-hidden !pb-20">
					<?php if ($posts) : ?>
						<div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
							<div class="swiper-wrapper xl:!transform-none xl:!flex-wrap xl:gap-12">
								<?php foreach ($posts as $post) : ?>
									<a href="<?php echo get_permalink($post->ID) ?>" class="group swiper-slide !h-auto pb-5 !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100 _drop-shadow-lg shadow-xl lg:shadow-2xl xl:!basis-[calc(33%_-_40px)] xl:!mr-0">
										<div class="w-full relative rounded-t-[14px] overflow-hidden [&_img]:object-cover [&_img]:w-full [&_img]:!h-[190px] [&_img]:md:!h-[220px]">
											<?php echo wp_get_attachment_image(get_post_thumbnail_id($post), 'medium', false, array('loading' => 'lazy')); ?>
											<div class="absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
										</div>
										<div class="text-center p-3 md:p-6 !pt-0">
											<?php if ($post->post_title) : ?>
												<h3 class="bg-secondary rounded-[14px] p-2 -translate-y-1/2 text-base md:text-xl text-white mb-4 font-semibold"><?php echo $post->post_title; ?></h3>
											<?php endif; ?>
											<p class="text-sm md:text-base italic font-normal"><?php echo get_the_excerpt($post->ID); ?></p>
										</div>
										<span class="ml-0 mr-auto rounded-[14px] text-[16px] font-bold py-2 px-7 text-secondary  group-hover:text-primary transition duration-200"><?php esc_html_e('Read more', 'smoothh') ?><span class="ml-2">></span></span>
									</a>
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
            </ul>
            <div class="w-full px-10 py-20 hidden" data-js-case-studies="loader">
                <span class="mx-auto block size-10 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
            </div>
            <button data-js-case-studies="load-more" class=" flex mx-auto mt-14 gap-4 items-center text-[20px] font-bold py-[15px] px-5 md:px-8  hover:text-primary disabled:!opacity-20 transition-all duration-200 disabled:pointer-events-none ">
                <?php esc_html_e('More posts', 'smoothh'); ?>
            </button>
        </div>
    </div>
</div>
