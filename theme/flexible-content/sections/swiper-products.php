<?php

/** Template to display 'Swiper z produktami' - swiper_products */

$header = $args['header'];
$description = $args['description'];

if (isset($args['products_list']) && !empty($args['products_list'])) {
    $products = $args['products_list'];
    foreach ($products as &$product) {
        $product = wc_get_product_object('variable', $product->ID);
    }
} else {
    $products_args = array(
        'limit' => 10,
        'orderby' => 'date',
        'order' => 'DESC',
        'exclude' => get_post_type(get_the_ID()) == 'product' ? get_the_ID() : '',
        'visibility' => 'visible',
    );
    $products = wc_get_products($products_args);
}
?>

<section class="relative py-10 mb:py-[60px] md:pt-[70px] md:!pb-[70px]">
    <div class="z-[-1] w-[100%] lg:w-[88%] h-full absolute top-0 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>
    <div class="container">
        <?php if ($header) : ?>
            <div class="relative z-0">
                <div class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo $header; ?>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="mx-auto max-w-[900px] mb-12 text-[16px] font-normal leading-[26px]">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php get_template_part('flexible-content/sections/partials/products-swiper-wrapper', '', array('products' => $products,'styles_basic' => true)); ?>
</section>