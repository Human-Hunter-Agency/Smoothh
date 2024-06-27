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

if ($related_products) : ?>

    <section class="relative pb-10 mb:pb-[60px]">

        <?php
        $heading = apply_filters('woocommerce_product_related_products_heading', __('Related ', 'woocommerce'));
        $headingColored = apply_filters('woocommerce_product_related_products_heading', __('products', 'woocommerce'));

        if ($heading) :
        ?>
            <div class="container">
                <div class="relative z-0">
                    <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                        <?php echo esc_html($heading); ?><span class="text-primary"><?php echo esc_html($headingColored); ?></span>
                    </h2>
                </div>
            </div>
        <?php endif; ?>

        <?php get_template_part('flexible-content/sections/partials/products-swiper-wrapper', '', array('products' => $related_products)); ?>

    </section>
<?php
endif;
