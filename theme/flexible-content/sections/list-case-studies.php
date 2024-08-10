<?php

/** Template to display 'Lista Case Studies' - list_case_studies */

$section_ID = $args['section_ID'];
$header = $args['header'];

$posts = get_posts(array(
    'post_type'         => 'case-study',
    'numberposts'       => 3,
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
            <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-14 sm:gap-y-14" data-js-case-studies='container'>
                <?php foreach ($posts as $post) : ?>
                    <li class="_post-tile">
                        <a href="<?php echo get_permalink($post->ID); ?>" class="group h-full flex items-center flex-col bg-white rounded-[14px] shadow-2xl">
                            <div class="relative flex items-center justify-center rounded-t-[14px] overflow-hidden w-full !h-[140px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
                                <div class="hidden z-0 absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
                                <h4 class="p-6 z-[1] relative text-center text-lg md:text-[28px] text-white font-semibold"><?php echo $post->post_title; ?></h4>
                                <div class="about p-[24px_30px] text-center">
                                    <p class="font-medium"><?php echo esc_html_e('Success fee:', 'smoothh'); ?><span class="text-primary"><?php echo $post->retainer_fee; ?></span></p>
                                </div>

                                <span href="<?php echo get_permalink($post->ID); ?>"><?php esc_html_e('Read more', 'smoothh'); ?><span class="!-ml-4">></span></span>
                            </div>
                        </a>
                    </li>
                <?php
                endforeach;
                ?>
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