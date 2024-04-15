<?php

/** Template to display 'Lista produktów' - list_products */

?>


<div class="container mb-10">
    <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-10 sm:gap-y-14 xl:gap-[90px]">
        <?php
        $args = array(
            'post_type'      => 'product',
        );

        $loop = new WP_Query($args);

        while ($loop->have_posts()) : $loop->the_post();
            global $product;

        ?>
            <li class="flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl">
                <div class="relative overflow-hidden rounded-t-[14px] w-full !h-[190px] md:!h-[220px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
                    <?php echo woocommerce_get_product_thumbnail() ?>
                    <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
                </div>
                <div class="flex-1 p-3 md:p-6">
                    <div class="flex gap-2.5 md:gap-5 justify-between mb-5">
                        <h4 class="text-lg md:text-xl text-primary font-semibold">
                            <?php echo get_the_title() ?>
                        </h4>
                        <?php if (is_user_logged_in()) : ?>
                            <span class="text-lg md:text-xl">
                                <?php echo wc_price(wc_get_price_excluding_tax($product))?> netto
                            </span>
                        <?php endif; ?>
                    </div>
                    <p class="text-sm md:text-base prose-strong:font-semibold">
                        <?php echo $product->get_short_description() ?>
                    </p>
                </div>
                <a href="<?php echo get_permalink() ?>" class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary hover:bg-secondary transition duration-200">
                    Zobacz produkt
                </a>
            </li>
        <?php endwhile;

        wp_reset_query();
        ?>
    </ul>
</div>