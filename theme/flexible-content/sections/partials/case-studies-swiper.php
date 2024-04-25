<?php
/** Template to display inner case-studies swiper */

    if (isset($args['posts']) && !empty($args['posts'])) {
        $posts = $args['posts'];
    }else{
        $posts_args = array(
            'post_type' => 'case-study',
            'numberposts' => 5,
            'orderby' => 'date',
            'order' => 'DESC',
            'exclude' => get_post_type(get_the_ID()) == 'case-study' ? get_the_ID() : '',
        );
        $posts = get_posts($posts_args);
    }

?>

<div class="relative z-0 w-full overflow-hidden !pb-5">
        <?php if ($posts) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
                <div class="swiper-wrapper">
                    <?php foreach($posts as $post) : ?>
                        <a href="<?php echo get_permalink($post->ID) ?>" class="group swiper-slide !h-auto !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">
                            <div class="w-full relative mb-5 rounded-t-[14px] overflow-hidden">
                                <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" class="object-cover w-full !h-[190px] md:!h-[220px]" >
                                <span class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></span>
                            </div>
                            <div class="text-center p-3 md:p-6 !pt-0">
                                <?php if ($post -> post_title) : ?>
                                    <h3 class="text-base md:text-xl text-primary mb-9 font-semibold"><?php echo $post -> post_title; ?></h3>
                                <?php endif; ?>
                                <p class="text-sm md:text-base italic font-medium"><?php echo get_the_excerpt($post->ID); ?></p>
                            </div>
                            <span class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary group-hover:bg-secondary transition duration-200" ><?php esc_html_e('Read more','smoothh') ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev">
                    <svg width="12" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M-0.00195312 8.99988L11.998 0.33962L11.998 17.6601L-0.00195312 8.99988Z" fill="white"/>
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg width="12" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 9L0 17.6603V0.339746L12 9Z" fill="white"/>
                    </svg>
                </div>
            </div>
        <?php endif; ?>
    </div>