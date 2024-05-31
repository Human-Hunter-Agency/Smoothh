<?php

/** Template to display products swiper tile */

$product = null;
if (isset($args['product']) && !empty($args['product'])) {
    $product = $args['product'];
}

$is_swiper_slide = false;
if (isset($args['swiper']) && !empty($args['swiper'])) {
    $is_swiper_slide = $args['swiper'];
}
?>

<?php if ($product) : ?>

    <a href="<?php echo get_permalink($product->get_id()) ?>" class="!flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl group  <?php if ($is_swiper_slide) : ?> swiper-slide !h-auto opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100 <?php else : ?> h-full<?php endif ?>">
        <div class="relative overflow-hidden rounded-t-[14px] w-full !h-[190px] md:!h-[220px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
            <?php echo $product->get_image() ?>
            <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
        </div>
        <div class="w-full flex-1 p-3 md:p-6">
            <div class="flex flex-col gap-2 justify-between mb-5">
                <h4 class="text-lg md:text-xl text-primary font-semibold">
                    <?php echo get_the_title($product->get_id()) ?>
                </h4>
                <?php // if (is_user_logged_in() || is_prod_guest_available($product)) : 
                ?>
                <div class="flex text-lg md:text-xl flex-wrap shrink-0">
                    <?php
                    $has_variable_price = get_field('variable_price', $product->get_id());
                    $is_hourly = get_field('product_hourly');
                    if (isset($has_variable_price) && $has_variable_price) :
                    ?>
                        <span class="text-foreground font-normal text-base leading-loose mr-1"><?php esc_html_e('From', 'smoothh') ?></span>
                    <?php endif ?>
                    <div class="flex flex-col items-end mr-2 whitespace-nowrap">
                        <span>
                            <?php echo number_format(wc_get_price_excluding_tax($product), wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator()) . ' ' . get_woocommerce_currency_symbol() ?>
                        </span>
                        <?php if (has_sale($product)) : ?>
                            <span class="!text-lg !leading-4 h-5 text-black opacity-50 line-through font-normal">
                                <?php echo '( ' . wc_price(wc_get_price_including_tax($product)) ?> <?php echo esc_html_e('gross', 'smoothh') . ' )'; ?>
                            </span>
                        <?php endif ?>
                    </div>
                    <span><?php esc_html_e('net', 'smoothh') ?><?php if ($is_hourly) {echo '/h';} ?></span>
                    <span class="ml-2 text-sm md:text-base mt-1.5 md:mt-0.5 whitespace-nowrap"> <?php echo '( ' . wc_price(wc_get_price_including_tax($product)) ?> <?php echo esc_html_e('gross', 'smoothh') . ' )'; ?></span>
                </div>
                <?php //endif; 
                ?>
            </div>
            <p class="text-sm md:text-base prose-strong:font-semibold">
                <?php echo $product->get_short_description() ?>
            </p>
        </div>
        <span class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary group-hover:bg-secondary transition duration-200">
            <?php esc_html_e('Show product', 'smoothh') ?>
        </span>
    </a>

<?php endif ?>