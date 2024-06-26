<?php

/** Template to display 'Lista kategorii produktów' - list_product_categories */

$header = $args['header'];
?>

<div class="relative">
    <div data-calc-bg="" class="z-[-1] w-[100%] lg:w-[85%] h-full absolute top-80 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>

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
                        <a href="<?php echo get_term_link($cat->term_id, 'product_cat'); ?>" class="group h-full flex items-center flex-col bg-white shadow-2xl">
                            <div class="relative flex items-center justify-center overflow-hidden rounded-t-[14px] w-full !h-[140px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
                                <div class="z-0 absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
                                <h4 class="p-6 z-[1] relative text-center text-lg md:text-[28px] text-white font-semibold">
                                    <?php echo $cat->name ?>
                                </h4>
                            </div>
                            <div class="w-full flex-1 p-3 md:p-6">
                                <p class="text-center text-sm md:text-base prose-strong:font-semibold">
                                    <?php echo $cat->description ?>
                                </p>
                            </div>
                            <span class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-secondary group-hover:bg-primary transition duration-200">
                                <?php esc_html_e('Show products', 'smoothh') ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
    </div>
</div>