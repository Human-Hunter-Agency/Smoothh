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
            <div class="swiper-nav w-28  h-20 hidden lg:flex gap-5 !absolute !top-auto !bottom-[-100px] left-[50%] -translate-x-1/2">
                <div class="swiper-button-prev rotate-180 scale-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="40" viewBox="0 0 39 40" fill="none">
                        <path d="M19.6177 38.1958C9.57757 38.1958 1.43846 30.0567 1.43846 20.0166C1.43846 9.97651 9.57757 1.8374 19.6177 1.8374C29.6578 1.8374 37.7969 9.97651 37.7969 20.0166C37.7969 30.0567 29.6578 38.1958 19.6177 38.1958Z" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20.1627 28.7426L28.8887 20.0165L20.1627 11.2905" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.8917 20.0171H28.3438" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="swiper-button-next scale-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="40" viewBox="0 0 39 40" fill="none">
                        <path d="M19.6177 38.1958C9.57757 38.1958 1.43846 30.0567 1.43846 20.0166C1.43846 9.97651 9.57757 1.8374 19.6177 1.8374C29.6578 1.8374 37.7969 9.97651 37.7969 20.0166C37.7969 30.0567 29.6578 38.1958 19.6177 38.1958Z" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20.1627 28.7426L28.8887 20.0165L20.1627 11.2905" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.8917 20.0171H28.3438" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>