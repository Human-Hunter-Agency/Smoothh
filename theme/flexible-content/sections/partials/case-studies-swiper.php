<?php

/** Template to display inner case-studies swiper */

if (isset($args['posts']) && !empty($args['posts'])) {
    $posts = $args['posts'];
} else {
    $posts_args = array(
        'post_type' => 'case-study',
        'numberposts' => 5,
        'orderby' => 'date',
        'order' => 'DESC',
        'exclude' => get_post_type(get_the_ID()) == 'case-study' ? get_the_ID() : '',
        'visibility' => 'visible',
    );
    $posts = get_posts($posts_args);
}

?>

<div class="relative z-0 w-full overflow-hidden !pb-20">
    <?php if ($posts) : ?>
        <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
            <div class="swiper-wrapper xl:!transform-none xl:!flex-wrap">
                <?php foreach ($posts as $post) : ?>
                    <a href="<?php echo get_permalink($post->ID) ?>" class="group swiper-slide !h-auto pb-5 !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100 _drop-shadow-lg shadow-xl lg:shadow-2xl">
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