<?php

/** Template to display 'Swiper z produktami z tłem' - swiper_products_bg */

$header = $args['header'];

if (isset($args['products_list']) && !empty($args['products_list'])) {
    $products = $args['products_list'];
} else {
    $products_args = array(
        'post_type' => 'product',
        'numberposts' => 10,
        'orderby' => 'date',
        'order' => 'DESC',
        'exclude' => get_post_type(get_the_ID()) == 'product' ? get_the_ID() : '',
    );
    $products = get_posts($products_args);
}

?>

<div class="relative py-10 md:pt-[50px] md:pb-[60px] bg-gradient-to-b from-secondary to-primary">
    <?php if ($header) : ?>
        <div class="container">
            <div class="relative z-0">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14 text-white">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        </div>
    <?php endif; ?>

    <div class="relative z-0 w-full overflow-hidden !pb-5">
        <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
            <div class="swiper-wrapper">
                <?php foreach ($products as $product) : ?>
                    <div class="swiper-slide !h-auto !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">

                    </div>
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
    </div>
</div>