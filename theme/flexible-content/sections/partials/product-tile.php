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

$styles_basic = false;
if (isset($args['styles_basic']) && !empty($args['styles_basic'])) {
    $styles_basic = $args['styles_basic'];
}
?>

<?php
if ($product && $styles_basic) : ?>

    <a href="<?php echo get_permalink($product->get_id()) ?>" class="bg-white shadow-2xl !flex items-center flex-col rounded-2xl group  <?php if ($is_swiper_slide) : ?> swiper-slide !h-auto opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100 <?php else : ?> h-full<?php endif ?>">
        <div class="relative flex items-center justify-center overflow-hidden rounded-t-[14px] w-full !h-[140px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
            <div class="z-0 absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
            <h4 class="p-6 z-[1] relative text-center text-lg md:text-[28px] text-white font-semibold">
                <?php echo get_the_title($product->get_id()) ?>
            </h4>
        </div>
        <div class="w-full flex-1 p-3 md:p-6">
            <div class="mb-8 text-sm md:text-base prose-strong:font-semibold">
                <?php echo $product->get_short_description() ?>
            </div>
        </div>
        <span class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-secondary group-hover:bg-primary transition duration-200">
            <?php $product->is_downloadable() ? esc_html_e('Download e-book', 'smoothh') : esc_html_e('Show product', 'smoothh'); ?>
        </span>
    </a>

<?php elseif ($product && !$styles_basic) : ?>

    <a href="<?php echo get_permalink($product->get_id()) ?>" class="!flex flex-col shadow-xl rounded-2xl group  <?php if ($is_swiper_slide) : ?> swiper-slide !h-auto opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100 <?php else : ?> h-full<?php endif ?>">
        <div class="relative overflow-hidden rounded-t-[14px] w-full !h-[190px] md:!h-[220px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
            <?php echo $product->get_image() ?>
            <div class="absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
        </div>
        <div class="relative w-full min-h-[450px] flex-1 p-6 flex flex-col justify-between ">
            
            <div class="mb-5 flex flex-col">
                <h4 class="text-lg md:text-xl text-primary font-bold mb-5">
                    <?php echo get_the_title($product->get_id()) ?>
                </h4>
                <p class="text-sm md:text-base prose-strong:font-semibold">
                    <?php echo $product->get_short_description() ?>
                </p>
            </div>

            <div>
                <div class="flex text-lg md:text-xl flex-wrap shrink-0">
                    <?php
                    $has_variable_price = get_field('variable_price', $product->get_id());
                    $is_hourly = get_field('product_hourly');
                    if (isset($has_variable_price) && $has_variable_price) :
                    ?>
                        <span class="text-foreground font-normal text-base leading-loose mr-1"><?php esc_html_e('From', 'smoothh') ?></span>
                    <?php endif ?>
                    <div class="flex flex-col items-end mr-2 whitespace-nowrap font-bold">
                        <span>
                            <?php echo number_format(wc_get_price_excluding_tax($product), wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator()) . ' ' . get_woocommerce_currency_symbol() ?>
                        </span>
                        <?php if (has_sale($product)) : ?>
                            <span class="!text-lg !leading-4 h-5 text-black opacity-50 line-through font-normal">
                                <?php echo get_product_regular_price_formatted($product); ?>
                            </span>
                        <?php endif ?>
                    </div>
                    <span class="font-bold"><?php esc_html_e('net', 'smoothh') ?><?php if ($is_hourly) {
                                                                                        echo '/h';
                                                                                    } ?></span>
                </div>
                <span class="block mb-5 text-sm md:text-base mt-1.5 md:mt-0.5 whitespace-nowrap"> <?php echo get_product_tax_formatted($product);; ?></span>
                <span class="block w-[220px] rounded-[14px] text-[16px] text-center font-bold py-3 px-7 text-white bg-secondary group-hover:bg-primary transition duration-200">
                    <?php $product->is_downloadable() ? esc_html_e('Download e-book', 'smoothh') : esc_html_e('Choose', 'smoothh'); ?>
                </span>
            </div>
        </div>
    </a>
<?php endif ?>