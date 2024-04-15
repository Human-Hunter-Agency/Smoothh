<section class="relative pb-10 mb:pb-[60px]">

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

                    <?php
                    $args = array(
                        'post_type'      => 'product',
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                    ?>
                        <div class="swiper-slide !h-auto !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">
                            <div class="relative overflow-hidden rounded-t-[14px] w-full !h-[190px] md:!h-[220px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
                                <?php echo $related_product->get_image() ?>
                                <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
                            </div>
                            <div class="flex-1 p-3 md:p-6">
                                <div class="flex gap-2.5 md:gap-5 justify-between mb-5">
                                    <h4 class="text-lg md:text-xl text-primary font-semibold">
                                        <?php echo get_the_title($related_product->get_id()) ?>
                                    </h4>
                                    <?php if (is_user_logged_in()) : ?>
                                        <span class="text-lg md:text-xl">
                                            <?php echo wc_price(wc_get_price_excluding_tax($related_product)) ?> netto
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-sm md:text-base prose-strong:font-semibold">
                                    <?php echo $related_product->get_short_description() ?>
                                </p>
                            </div>
                            <a href="<?php echo get_permalink($related_product->get_id()) ?>" class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary hover:bg-secondary transition duration-200">
                                Zobacz produkt
                            </a>
                        </div>
                        <?php endwhile;
                            wp_reset_query();
                        ?>

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
    </section>