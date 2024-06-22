<?php

/** Template to display products swiper */

$products = null;
if (isset($args['products']) && !empty($args['products'])) {
    $products = $args['products'];
}

?>
<?php if ($products) : ?>
    <div class="relative z-0 w-full overflow-hidden !pb-5 lg:!pb-20">
        <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
            <div class="swiper-wrapper">
                <?php foreach ($products as $product) : ?>
                    <?php get_template_part('flexible-content/sections/partials/product-tile', '', array('product' => $product, 'swiper' => true)); ?>
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
<?php endif ?>