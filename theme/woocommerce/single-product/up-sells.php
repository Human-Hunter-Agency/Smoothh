<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if ($upsells) : ?>

    <section class="relative py-10 mb:py-[60px]">

        <?php
        $heading = apply_filters('woocommerce_product_upsells_products_heading', __('You may also like&hellip;', 'woocommerce'));

        if ($heading) :
        ?>
            <div class="container">
                <div class="relative z-0">
                    <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                        <?php echo esc_html($heading); ?>
                    </h2>
                </div>
            </div>
        <?php endif; ?>


        <div class="relative z-0 w-full overflow-hidden !pb-5">
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
                <div class="swiper-wrapper">

                    <?php foreach ($upsells as $upsell ) : ?>
                        <div class="swiper-slide !h-auto !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">
                            <div class="relative overflow-hidden rounded-t-[14px] w-full !h-[190px] md:!h-[220px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
                                <?php echo $upsell ->get_image() ?>
                                <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
                            </div>
                            <div class="flex-1 p-3 md:p-6">
                                <div class="flex gap-2.5 md:gap-5 justify-between mb-5">
                                    <h4 class="text-lg md:text-xl text-primary font-semibold">
                                        <?php echo get_the_title($upsell ->get_id()) ?>
                                    </h4>
                                    <?php if (is_user_logged_in()) : ?>
                                        <span class="text-lg md:text-xl">
                                            <?php echo number_format( wc_get_price_excluding_tax($upsell), wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator()) ?> netto
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-sm md:text-base prose-strong:font-semibold">
                                    <?php echo $upsell ->get_short_description() ?>
                                </p>
                            </div>
                            <a href="<?php echo get_permalink($upsell ->get_id()) ?>" class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary hover:bg-secondary transition duration-200">
                                <?php esc_html_e('Show product','smoothh') ?>
                            </a>
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
    </section>
<?php
endif;
