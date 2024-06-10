<?php

/** Template to display 'Swiper z produktami' - swiper_products */

$header = $args['header'];

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

<section class="relative py-10 mb:py-[60px] md:pt-[70px]">

    <?php if ($header) : ?>
        <div class="container">
            <div class="relative z-0">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'flexible-content/sections/partials/products-swiper-wrapper', '', array('products' => $products) ); ?>
</section>