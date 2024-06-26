<?php

/** Template to display 'Lista kategorii produktów' - list_product_categories */

$header = $args['header'];
?>


<div class="container mb-10">
    <?php if ($header) : ?>
        <div class="mx-auto max-w-[1100px] text-center font-bold text-2xl md:text-3xl lg:text-[46px] lg:leading-[55px] mb-9">
            <?php echo $header; ?>
        </div>
    <?php endif; ?>

    <?php
    $args = array(
        'taxonomy'     => 'product_cat',
        'title_li'     => '',
        'hide_empty'   => 1,
        'exclude'      => array(29)
    );
    $all_categories = get_categories($args);

    if ($all_categories) : ?>

        <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-10 sm:gap-y-14 xl:gap-[90px]">
            <?php
            foreach ($all_categories as $cat) :
                $products = wc_get_products(array(
                    'category' => array($cat->slug),
                ));

                $min_price_product = null;

                foreach ($products as $product) {
                    $price_excluding_tax = wc_get_price_excluding_tax($product);

                    if ($min_price_product === null || $price_excluding_tax < wc_get_price_excluding_tax($min_price_product)) {
                        $min_price_product = $product;
                    }
                }

            ?>
                <li>
                    <a href="<?php echo get_term_link($cat->term_id, 'product_cat'); ?>" class="group h-full flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl">
                        <div class="relative overflow-hidden rounded-t-[14px] w-full !h-[190px] md:!h-[220px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
                            <?php
                            $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                            echo wp_get_attachment_image($thumbnail_id, 'medium', false, array('loading' => 'lazy', 'alt' => $cat->name)); ?>
                            <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
                        </div>
                        <div class="w-full flex-1 p-3 md:p-6">
                            <div class="flex flex-col gap-2 justify-between mb-5">
                                <h4 class="text-lg md:text-xl text-primary font-semibold">
                                    <?php echo $cat->name ?>
                                </h4>
                            </div>
                            <p class="text-sm md:text-base prose-strong:font-semibold">
                                <?php echo $cat->description ?>
                            </p>
                        </div>
                        <span class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary group-hover:bg-secondary transition duration-200">
                            <?php esc_html_e('Show products', 'smoothh') ?>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
</div>